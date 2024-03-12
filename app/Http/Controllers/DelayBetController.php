<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redis;

// LSport
use App\Models\LsportMarketBet;
use App\Models\LsportFixture;
use App\Models\LsportMarket;

use App\Models\Player;
use App\Models\Agent;
use App\Models\GameOrder;
use App\Models\PlayerBalanceLogs;
use App\Models\CrawlerScript;


class DelayBetController extends Controller {

    public function process(Request $request) {
      
        $this->crawler("delay_bet","result/delay_bet");

        //////////////////////////////////////////
        // 取出要處理的注單
        $return = GameOrder::where('status', 1)
        ->where('delay_time', '<=', time())
        ->orderBy('delay_time', 'ASC')
        ->orderBy('m_id', 'ASC')
        ->orderBy('id', 'ASC')
        ->get();

        // 取出注單失敗了
        if ($return === false) {
           $this->ajaxError("error_01");
        }

        $bets_to_proccess = $return;

        $arr_success = array();  // 儲存成功的bet ID
        $arr_failure = array();  // 儲存失敗的bet ID

        foreach ($bets_to_proccess as $k => $bet) {

            $bet_id = $bet['id'];
            $m_id = $bet['m_id'];
            $player_id = $bet['player_id'];
            $agent_id = $bet['agent_id'];
            $fixture_id = $bet['fixture_id'];  
            $sport_id = $bet['sport_id'];  
            $market_id = $bet['market_id'];
            $market_bet_id = $bet['market_bet_id'];
            $player_rate = $bet['bet_rate'];  //前端傳來的賠率
            $bet_amount = $bet['bet_amount'];  //投注金額

            // 是否自動接受更好的賠率(若不接受則在伺服器端賠率較佳時會退回投注)
            $is_better_rate = (!empty($bet['better_rate']));

            ////////////////////////////////
            // 取得賽事資料
            $return = LsportFixture::where('fixture_id', $fixture_id)->first();
            if ($return === false) {
                $this->ajaxError("error_02");
            }
            $fixture_status = $return['status'];

            $status_type = ["","early","living"];
            if ($fixture_status == 9) {
                $fixture_status = 2;
            }
            $status_type_name = $status_type[$fixture_status];

            //1
            // 檢查是否有應該為空的欄位裡面有東西
            $must_empty_cols = array('approval_time', 'bet_rate');
            foreach ($must_empty_cols as $ck => $col) {
                if (!empty($bet[$col])) {
                    
                    $this->ajaxError("error_02");
                }
            }

            //////////////////////////////////////////
            //2
            // 檢查用戶資料
            $player_data = Player::where("id", $player_id)->first();

            if ($player_data === false) {
                $this->ajaxError("error_03");
            }

            // 如果用戶已停用
            if ($player_data['status'] == 0) {
                $this->ajaxError("error_04");
            }

            // 檢查商戶資料
            $agent_data = Agent::where("id", $agent_id)->first();
            if ($agent_data === false) {
                $this->ajaxError("error_05");
            }

            // 如果商戶已停用
            if ($agent_data['status'] == 0) {
                $this->ajaxError("error_06");
            }

            //////////////////////////////////////////
            // 3
            // 取得賠率

            // 取得market_bet
            $return = LsportMarketBet::where('fixture_id',$fixture_id)->where("bet_id",$market_bet_id)->first();
            if ($return === false) {
                return false;
            }

            $market_bet_data = $return;
            
            /*
            $market_bet_data = $this->getAdjustedRate($status_type_name, $sport_id, $fixture_id, $market_id, $market_bet_id, $market_bet_line);
            */
            // 如果無配置 , 會回傳false
            ////////////////////////////////

            if ($market_bet_data === false) {

                // 退款 & 將注單status設為0
                $return = $this->refund($player_data, $bet_amount, $bet_id);
                $this->ajaxError("error_07");
            }

            ////////////////////////////////

            $current_market_bet_status = $market_bet_data['status'];
            $current_market_bet_rate = $market_bet_data['price'];
            $market_bet_line = $market_bet_data['base_line'];

                // 取得配置
                $default_market_bet_llimit = json_decode($this->system_config['default_market_bet_llimit'], true);
                
                // 沒有配置的
                if (!isset($default_market_bet_llimit[$status_type_name][$sport_id][$market_id])) {
                    $market_rate_limit = 0;
                } else {
                    $market_rate_limit = $default_market_bet_llimit[$status_type_name][$sport_id][$market_id];
                }

                // 計算水位
                $fix_data = $this->getAdjustedRate($fixture_id, $market_id, $market_bet_id, $market_bet_line, $market_rate_limit);
                if ($fix_data !== false) {
                    $current_market_bet_rate = $fix_data['price'];
                }

            // 賠率非開盤狀態 1开、2锁、3结算
            if (($current_market_bet_status != 1)) {

                // 退款 & 將注單status設為0
                $return = $this->refund($player_data, $bet_amount, $bet_id);
                $this->ajaxError("error_08");
            }

            // 判斷 is_better_rate
            if (($is_better_rate == 1) && ($current_market_bet_rate < $player_rate)) {

                // 退款 & 將注單status設為0
                $return = $this->refund($player_data, $bet_amount, $bet_id);
                $this->ajaxError("error_09");
            }

            //////////////////////////////////////////
            // 4
            // 更新資料

            // 取得代理的語系
            // $agent_lang = $this->getAgentLang($player_id);
            // $lang_col = 'name_' . $agent_lang;

            // 組合更新資料
            $update_order = array(
                'status' => 2,
                'approval_time' => time(),
                'bet_rate' => $current_market_bet_rate,
            );

            // 更新注單
            $return = GameOrder::where('id', $bet_id)->update($update_order);
            if ($return === false) {
                $this->ajaxError("error_10");
            }

            //////////////////////////////////////////
            // 5
            // 終於成功了

            // REDIS塞資料
            $jsonString = json_encode(array(
                'action' => 'delay_order',
                'player_id' => $player_data['id'],
                'order_id' => $bet_id,
                'status' => $update_order['status'],  // 更新後的注單status
            ));
            // 使用 lpush 将 JSON 字符串推送到 Redis 列表
            Redis::lpush('broadcast', $jsonString);

        }
        $this->ajaxSuccess("success_01");

    }

    // 遇到不接受較佳賠率的單時,或是賠率已關閉的要退款
    protected function refund($player_data, $bet_amount, $bet_id) {

            // 开始事务
            DB::beginTransaction();

            ////////////////////////////
            // 更新注單

            // 需要退款的不成立的注單要把status變成0
            $return = GameOrder::where('id', $bet_id)->update([
                'status' => 0
            ]);

            // 變更注單若失敗就返回不繼續進行退款
            if ($return === false) {
                // 回滾 =============
                DB::rollback();
                return false;
            }
            
            $player_id = $player_data['id'];
            $agent_id = $player_data['agent_id'];
            $player_account = $player_data['account'];
            $currency_type = $player_data['currency_type'];

            ////////////////////////////
            // 更新用戶點數
            $before_amount = $player_data['balance'];
            $change_amount = $bet_amount;
            $after_amount = $before_amount + $change_amount;

            $return = Player::where("id", $player_id)->update([
                "balance" => $after_amount
            ]);

            // 更新用戶點數餘額失敗
            if ($return === false) {
                // 回滾 =============
                DB::rollback();
                return false;
            }

            ////////////////////////////
            // 帳變
            $tmp = array();
            $tmp['agent_id'] = $agent_id;
            $tmp['player_id'] = $player_id;
            $tmp['player'] = $player_account;
            $tmp['currency_type'] = $currency_type;
            $tmp['balance_type'] = "delay_bet_refund";
            $tmp['change_balance'] = $change_amount;
            $tmp['before_balance'] = $before_amount;
            $tmp['after_balance'] = $after_amount;
            $tmp['create_time'] = time();

            // $new_log_id = PlayerBalanceLogs::insertGetId($tmp);
            PlayerBalanceLogs::insert($tmp);

            // 提交 =============
            DB::commit();

        return true;
    }
    
    // crawler script 控制器
    protected function crawler($name , $url) {

        // 紀錄啟動時間
        $return = CrawlerScript::where("crawler_name",$name)->count();

        // 如果無紀錄
        if ($return == 0) {
            $tmp = array();
            $tmp['crawler_name'] = $name;
            $tmp['crawler_url'] = $url;
            $tmp['begin_time'] = date("Y-m-d H:i:s");
            $tmp['last_update'] = date("Y-m-d H:i:s");
            $tmp['status'] = 1;
            CrawlerScript::insert($tmp);
        } else {
            CrawlerScript::where("crawler_name",$name)->update([
            'last_update' => date("Y-m-d H:i:s")
            ]);
        }
        
    }

    // 計算水位 , delay bet 版本
    protected function getAdjustedRate($fixture_id, $market_id, $market_bet_id, $market_bet_line, $market_rate_limit) {

        // 先取得marketBet 的 組合
        $return = LsportMarketBet::where('fixture_id',$fixture_id)
        ->where("market_id",$market_id)
        ->where("base_line.keyword",'"'.$market_bet_line.'"')  // main line 有時是空值, 要帶 "
        ->orderBy("name_en.keyword","ASC")
        ->list();
        if ($return === false) {
          return false;
        }

        $is_adjusted = true;
        $price = array();
        $data = null;

        // 判斷price 是否超過 $market_rate_limit
        foreach ($return as $k => $v) {
            $price[] = $v['price'];
            if ($v['bet_id'] == $market_bet_id) {
                $data = $v;
            }
        }

        $max_price = max($price);

        // 超過就不管 直接false
        if ($max_price > $market_rate_limit) {
            return false;
        }

        // 沒超過就處理, 然後回傳處理後的值
        $fix_rate = $market_rate_limit - $max_price;

        $data['price'] = $data['price']+$fix_rate;
        $data['price'] = $data['price'] . "";

        return $data;
    }
}