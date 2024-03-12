<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Support\Facades\Redis;

use App\Models\Agent;
use App\Models\Player;
use App\Models\PlayerBalanceLogs;
use App\Models\GameOrder;
use App\Models\GameResult;
use App\Models\LsportSport;
use App\Models\LsportFixture;
use App\Models\LsportMarketBet;
use App\Models\LsportRisk;

class RiskOrderController extends Controller {

  protected $current = "sport_riskorder";
    
  // 首頁
  public function index(Request $request) {
    	   
    
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
    $session = Session::all();

    //////////////////

    //---------------------------------
    // 取得代理的語系
    $agent_lang = "tw";

    // 取得體育列表
    $game_list = $this->MatchSport();
    $this->assign("game_list",$game_list);

    //////////////////////////////////////////

    if (!isset($input['page'])) {
        $input['page'] = 1;
    }

    if (!isset($input['refresh'])) {
      $input['refresh'] = 0;
    }

    if (!isset($input['sport_id'])) {
        $input['sport_id'] = "";
    }
    
    $this->assign("search",$input);
    //////////////////////////////////////////

    $page_limit = $this->per_page;
    $page = $input['page'];
    $skip = ($page-1)*$page_limit;

    //////////////////////////////////////////
    // 獲取注單資料

    $model = GameOrder::whereColumn('m_id', '=', 'id')->where('status', 5);

    //////////////////////////////
    // Search 

        // 精準搜尋 , id為主
        $search_columns = ["fixture_id", "sport_id", "market_id", "league_id", "m_id"];
        foreach ($search_columns as $k => $v) { 
            if (isset($input[$v]) && ($input[$v] != "")) {
                $model = $model->where($v, $input[$v]);
            }
        }

        // 模糊搜尋
        $search_columns = ["player_name", "agent_name", "league_name", "market_name","market_bet_name"];
        foreach ($search_columns as $k => $v) { 
            if (isset($input[$v]) && ($input[$v] != "")) {
                $model = $model->where($v, "like" , "%".$input[$v]."%");
            }
        }
          
    //////////////////////////////

    $count = $model->orderBy("id","DESC")->count();
    if ($count > 0) {
      $this->assign('refresh',0);
    } else {
      $this->assign('refresh',1);
    }

    $return = $model->orderBy("id","DESC")->paginate($this->per_page);

    if ($return === false) {
        $this->error(__CLASS__, __FUNCTION__, "01");
    }

    $order_data = $return;

    $this->assign("data",$order_data);

    $data = array();
    $tmp = array();

    /////////////////////////

    $columns = array(
        "id",
        "m_id",
        "bet_amount",
        "result_amount",
        "active_bet",
        "create_time",
        "result_time",
        "status"
    );

    $round_columns = ['bet_amount','result_amount','active_bet','player_rate','bet_rate'];

    foreach ($order_data as $k => $v) {
        foreach ($columns as $kk => $vv) {
            $tmp[$k][$vv] = $v[$vv]; 
        }
        
        // 轉時間格式
        $time_columns = ["start_time","create_time","approval_time","result_time"];
        foreach ($time_columns as $kkkk => $vvvv) {
            if (isset($tmp[$k][$vvvv])) { 
                $tmp[$k][$vvvv] = date("Y-m-d H:i:s",$tmp[$k][$vvvv]);
            }
        }

        $tmp[$k]['status'] = $v['status'];
        $tmp[$k]['m_order'] = $v['m_order'];

        $sport_id = $v["sport_id"];
        $home_team_id = $v["home_team_id"];
        $away_team_id = $v["away_team_id"];
        
        // 關於小數點處理
        foreach ($round_columns as $kkkk => $vvvv) {
            if (isset($tmp[$k][$vvvv])) {
                if ($tmp[$k][$vvvv] != null) {
                    $tmp[$k][$vvvv] = $tmp[$k][$vvvv]+0;
                //    $tmp[$k][$vvvv] = intval($tmp[$k][$vvvv]*100)/100;
                    $tmp[$k][$vvvv] = $tmp[$k][$vvvv]."";
                }
            }
        }

        // 有串關資料
        if ($v['m_order'] == 1) {

            $return = GameOrder::where("m_id", $v['m_id'])->list();
            if ($return === false) {
                $this->error(__CLASS__, __FUNCTION__, "02");
            }

            foreach ($return as $kkk => $vvv) {

                $tmp_bet_data = $vvv;

                $fixture_id = $vvv['fixture_id'];
                $sport_id = $vvv['sport_id'];
                $market_id = $vvv['market_id'];

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


                // 取得market_bet name_en
                $market_bet_id = $vvv['market_bet_id'];
                $return = LsportMarketBet::where("bet_id",$market_bet_id)->fetch();
                if ($return === false) {
                    $this->error(__CLASS__, __FUNCTION__, "03");
                }
                $tmp_bet_data['market_bet_name_en'] = $return['name_en'];

                //////////////////////////
                // 計算水位
                $current_market_bet_status = $return['status'];
                $current_market_bet_rate = $return['price'];
                $market_bet_line = $return['base_line'];
                

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

                $tmp_bet_data['bet_rate'] = $current_market_bet_rate;

                //////////////////////////

                // 取得賽事開始時間
                $fixture_id = $vvv['fixture_id'];
                $return = LsportFixture::where("fixture_id",$fixture_id)->fetch();
                if ($return === false) {
                    $this->error(__CLASS__, __FUNCTION__, "04");
                }
                $tmp_bet_data['start_time'] = $return['start_time'];
                
                // 轉時間格式
                $time_columns = ["start_time","create_time","approval_time","result_time"];
                foreach ($time_columns as $kkkk => $vvvv) {
                    if (isset($tmp_bet_data[$vvvv])) { 
                        $tmp_bet_data[$vvvv] = date("Y-m-d H:i:s",$tmp_bet_data[$vvvv]);
                    }
                }

                // 滾球/早盤字樣判定
                $market_type = 0;
                if ($return['start_time'] < strtotime($vvv['create_time'])) {
                    $market_type = 1;
                }
                $tmp_bet_data['market_type'] = $market_type;
                
                // 關於小數點處理
                foreach ($round_columns as $kkkk => $vvvv) {
                    if (isset($tmp_bet_data[$vvvv])) {
                        if ($tmp_bet_data[$vvvv] != null) {
                            $tmp_bet_data[$vvvv] = $tmp_bet_data[$vvvv]+0;
                        //    $tmp_bet_data[$vvvv] = intval($tmp_bet_data[$vvvv]*100)/100;
                            $tmp_bet_data[$vvvv] = $tmp_bet_data[$vvvv]."";
                        }
                    }
                }
                
                // 處理 1/4分盤顯示
                $tmp_bet_data['market_bet_line'] = $this->displayMainLine($tmp_bet_data['market_bet_line']);
                $tmp[$k]['bet_data'][] = $tmp_bet_data;
            }
        } else {
            
            $fixture_id = $v['fixture_id'];
            $return = LsportFixture::where("fixture_id",$fixture_id)->fetch();
            if ($return === false) {
                $this->error(__CLASS__, __FUNCTION__, "05");
            }

            $tmp_bet_data = $v;
            $tmp_bet_data['start_time'] = $return['start_time'];

            //////////////
            $fixture_status = $return['status'];
            $fixture_id = $v['fixture_id'];
            $sport_id = $v['sport_id'];
            $market_id = $v['market_id'];

            $status_type = ["","early","living"];
            if ($fixture_status == 9) {
                $fixture_status = 2;
            }
            $status_type_name = $status_type[$fixture_status];

            // 轉時間格式
            $time_columns = ["start_time","create_time","approval_time","result_time"];
            foreach ($time_columns as $kkkk => $vvvv) {
                if (isset($tmp_bet_data[$vvvv])) { 
                    $tmp_bet_data[$vvvv] = date("Y-m-d H:i:s",$tmp_bet_data[$vvvv]);
                }
            }

            // 滾球/早盤字樣判定
            $market_type = 0;
            if ($return['start_time'] < strtotime($v['create_time'])) {
                $market_type = 1;
            }
            $tmp_bet_data['market_type'] = $market_type;

            // 關於小數點處理
                foreach ($round_columns as $kkkk => $vvvv) {
                    if (isset($tmp_bet_data[$vvvv])) {
                        if ($tmp_bet_data[$vvvv] != null) {
                            $tmp_bet_data[$vvvv] = $tmp_bet_data[$vvvv]+0;
                            $tmp_bet_data[$vvvv] = $tmp_bet_data[$vvvv]."";
                        }
                    }
                }

            // 取得market_bet name_en
            $market_bet_id = $v['market_bet_id'];
            $return = LsportMarketBet::where("bet_id",$market_bet_id)->fetch();
            if ($return === false) {
                $this->error(__CLASS__, __FUNCTION__, "06");
            }
            $tmp_bet_data['market_bet_name_en'] = $return['name_en'];

                //////////////////////////
                // 計算水位
                $current_market_bet_status = $return['status'];
                $current_market_bet_rate = $return['price'];
                $market_bet_line = $return['base_line'];
                

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

                $tmp_bet_data['bet_rate'] = $current_market_bet_rate;

                //////////////////////////

            // 處理 1/4分盤顯示
            $tmp_bet_data['market_bet_line'] = $this->displayMainLine($tmp_bet_data['market_bet_line']);
                
            $tmp[$k]['bet_data'][] = $tmp_bet_data;
        }

    }

    $data['list'] = $tmp;

    $this->assign("lists",$data);

    $queryString = request()->getQueryString();

    $this->assign("query",$queryString);

    return view('risk_order.index',$this->data);
  }


  // 球種列表
  public function MatchSport() {
      
    // 取得代理的語系
    $agent_lang = "tw";
    $lang_col = 'name_' . $agent_lang;

    ///////////////////////////////////
    //  夾帶聯賽資料

    $league_mode = false;
    if (isset($input['league_mode'])) {
        $league_mode = true;
    }

    //---------------------------------
    // 取得球種資料
    $return = LsportSport::where('status', 1)->orderBy('id', 'ASC')->list();
    if ($return === false) {
        $this->ApiError("01");
    }

    $sports = $return;

    $data = array();
    foreach ($sports as $k => $v) {

        $sport_name = $v['name_en'];
        if ($v[$lang_col] != "") {
            $sport_name = $v[$lang_col];
        }

        if ($league_mode) {

            // 取得聯賽資料
            $return = LsportLeague::where("sport_id",$v['sport_id'])->where('status', 1)->orderBy('id', 'ASC')->list();
            if ($return === false) {
                $this->ApiError("02");
            }

            // league data
            $league_list = array();
            foreach ($return as $kk => $vv) {
                $tmp = array();
                $tmp['league_id'] = $vv['league_id'];
                $tmp['name'] = $vv['name_en'];
                if ($vv[$lang_col] != "") {
                    $tmp['name'] = $vv[$lang_col];
                }
                $league_list[] = $tmp;
            }
    
            $data[] = array(
                'sport_id' => $v['sport_id'],
                'name' => $sport_name,
                'league' => $league_list
            );
        } else {

            $data[] = array(
                'sport_id' => $v['sport_id'],
                'name' => $sport_name
            );
        }

    }

    return $data;

  }

  // 切換1/4 分盤顯示
  protected function displayMainLine($main_line) {

      // 分數處理
      $score = "";
      $hasSpace = strpos($main_line, ' ') !== false;
      if ($hasSpace) {
          $fields = explode(' ', $main_line);
          $main_line = $fields[0];
          $score = " " . $fields[1];
      }
      
      $number = (float)$main_line;
      $is_neg = false;
      if ($number < 0) {
          $is_neg = true;
      }

      $number = abs($number);

      $integerPart = floor($number); // 取整數部分
      $decimalPart = $number - $integerPart; // 取小數部分

      switch ($decimalPart) {
          case 0.25:
              $a = $integerPart;
              $b = $integerPart+0.5;
              $main_line = $a . "/" . $b;
              if ($is_neg) {  // 如果是負數
                  $main_line = "-".$main_line;
              }
              break;
          case 0.75:
              $a = $integerPart+0.5;
              $b = $integerPart+1;
              $main_line = $a . "/" . $b;
              if ($is_neg) {  // 如果是負數
                  $main_line = "-".$main_line;
              }
              break;
          default:
      }
      
      return $main_line.$score;
  }

  // 拒單
  public function cancel(Request $request) {
    	   
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
    $session = Session::all();

    $this->assign("search",$input);
    //////////////////

    $queryString = "";
    if (isset($input['o'])) {
      $queryString = "o=".$input['o'];
    }

    // 取得注單資料
    $return = GameOrder::where("m_id",$input['m_id'])->where("id",$input['m_id'])->first();
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "01");
      return redirect('/sport/riskorder?'.$queryString);
    }

    $order_data = $return;

    $this->riskOrdeUnlock($input['m_id']);

    // 如果注單狀態不為5
    if ($order_data['status'] != 5) {
      $this->error(__CLASS__, __FUNCTION__, "02");
      return redirect('/sport/riskorder?'.$queryString);
    }

    // 退回注單金額
    $bet_amount = $order_data['bet_amount'];
    $player_id = $order_data['player_id'];

    // 取得玩家資料
    $return = Player::where("id",$player_id)->first();
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "03");
      return redirect('/sport/riskorder?'.$queryString);
    }

    $player_data = $return;
    $before_balance = $player_data['balance'];
    $after_balance = $before_balance + $bet_amount;

    $tmp = array();
    $tmp['agent_id'] = $player_data['agent_id'];
    $tmp['player_id'] = $player_data['id'];
    $tmp['player'] = $player_data['account'];
    $tmp['currency_type'] = $player_data['currency_type'];
    $tmp['balance_type'] = "bet_refund";
    $tmp['change_balance'] = $bet_amount;
    $tmp['before_balance'] = $before_balance;
    $tmp['after_balance'] = $after_balance;
    $tmp['create_time'] = time();

    // 開始事務
    DB::beginTransaction();
      
      // 處理用戶金額
      $return = Player::where("id",$player_data['id'])->update([
        "balance" => $after_balance
      ]);
      if ($return === false) {
        $this->error(__CLASS__, __FUNCTION__, "04");
        DB::rollBack();
        return redirect('/sport/riskorder?'.$queryString);
      }
      
      // 產生帳變 
      PlayerBalanceLogs::insert($tmp);

      // 更新注單狀態 ,這邊是批次處理
      $return = GameOrder::where("m_id",$input['m_id'])->update([
        "status" => 0,
        "approval_time" => time()
      ]);

      if ($return === false) {
        $this->error(__CLASS__, __FUNCTION__, "05");
        DB::rollBack();
        return redirect('/sport/riskorder?'.$queryString);
      }

    DB::commit();
    
            // REDIS塞資料
            $jsonString = json_encode(array(
              'action' => 'delay_order',
              'player_id' => $player_data['id'],
              'order_id' => $order_data['m_id'],
              'status' => 0,  // 更新後的注單status
          ));
          // 使用 lpush 将 JSON 字符串推送到 Redis 列表
          Redis::lpush('broadcast', $jsonString);

    $this->success(__CLASS__, __FUNCTION__, "01");
    return redirect('/sport/riskorder?'.$queryString);
  }

  // 通過
  public function approval(Request $request) {
    	   
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
    $session = Session::all();

    //////////////////

    $queryString = "";
    if (isset($input['o'])) {
      $queryString = "o=".$input['o'];
    }

    $return = GameOrder::where("m_id",$input['m_id'])->where("id",$input['m_id'])->first();
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "01");
      return redirect('/sport/riskorder?'.$queryString);
    }

    if ($return['status'] != 5) {
      $this->error(__CLASS__, __FUNCTION__, "02");
      return redirect('/sport/riskorder?'.$queryString);
    }

    $market_bet_id = $return['market_bet_id'];
    $better_rate = $return['better_rate'];
    $player_rate = $return['player_rate'];
    $m_id = $return['m_id'];
    $player_id = $return['player_id'];
    $status = 2;

    $this->riskOrdeUnlock($input['m_id']);

    // 抓取market_bet
    $return = LsportMarketBet::where("bet_id",$market_bet_id)->first();
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "03");
      return redirect('/sport/riskorder?'.$queryString);
    }

    // 判斷玩法是否可下
    if ($return['status'] != 1) {
    //  $this->error(__CLASS__, __FUNCTION__, "04");
      $status = 0;
    }

    $current_price = $return['price'];

    // 取得調整水位後的賠率
    //dd($return);

    // 判斷 is_better_rate
    if (($better_rate == 1) && ($current_price < $player_rate)) {
    //  $this->error(__CLASS__, __FUNCTION__, "05");
      $status = 0;
    }

    // 更新
    $return = GameOrder::where("m_id",$input['m_id'])->update([
      "status" => $status,
      "bet_rate" => $current_price,
      "approval_time" => time()
    ]);

    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "06");
      return redirect('/sport/riskorder?'.$queryString);
    }
    
            // REDIS塞資料
            $jsonString = json_encode(array(
              'action' => 'delay_order',
              'player_id' => $player_id,
              'order_id' => $m_id,
              'status' => $status,  // 更新後的注單status
          ));
          // 使用 lpush 将 JSON 字符串推送到 Redis 列表
          Redis::lpush('broadcast', $jsonString);

    $this->success(__CLASS__, __FUNCTION__, "01");
    return redirect('/sport/riskorder?'.$queryString);
  }

    // 計算水位 , risk order 版本
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

    protected function adjustNumbers($numbers, $targetValue) {
        while (max($numbers) < $targetValue) {
            $maxValue = max($numbers);
            $diff = $targetValue - $maxValue;
            
            for ($i = 0; $i < count($numbers); $i++) {
                $numbers[$i] += $diff;
            }
        }
        
        return $numbers;
    }

    // 大單自動解鎖
    protected function riskOrdeUnlock($m_id) {

        // 先取得order 資料
        $return = GameOrder::where("m_id",$m_id)->get();
        if ($return === false) {
            return false;
        }

        $order_list = $return;

        foreach ($order_list as $k => $v) {
            $fixture_id = $v['fixture_id'];
            $market_id = $v['market_id'];
            
            $return = LsportRisk::where("fixture_id",$fixture_id)->first();
            if ($return === false) {
                return false;
            }

            $json = json_decode($return['data'],true);

            $json[$market_id] = [null,null];
            if ($market_id == 1) {  // 足球全場獨贏 , 1x2限定
                $json[$market_id] = [null,null,null];
            }
            
            $return = LsportRisk::where("fixture_id",$fixture_id)->update([
                "data" => $json
            ]);
            if ($return === false) {
                return false;
            }
        }

        return true;
    }
}

