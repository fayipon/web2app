<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Agent;
use App\Models\Player;
use App\Models\GameOrder;
use App\Models\GameResult;
use App\Models\LsportSport;
use App\Models\LsportMarketBet;
use App\Models\LsportFixture;

class SportOrderController extends Controller {

    protected $current = "agent_user";

    // 狀態值
    protected $status = array("已取消","等待成立","等待開獎","等待派獎","已開獎","等待審核");

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

        if (!isset($input['result'])) {
            $input['result'] = -1;
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

        if (isset($input['debug'])) {

        }
        
			$result = $input['result'];
			
            $model = GameOrder::whereColumn('m_id', '=', 'id');

			//////////////////////////////
			// Search 

			// result
			if ($result == -1) {		// 全部
				// do nothing
			} elseif ($result == 0) {	// 未結
				$model = $model->whereIn('status', [0,1,2,3,5]);
			} else {					// 已結
				$model = $model->where('status', 4);
			}

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

        $round_columns = ['bet_amount','result_amount','active_bet','bet_rate'];

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

                    // 取得market_bet name_en
                    $market_bet_id = $vvv['market_bet_id'];
                    $return = LsportMarketBet::where("bet_id",$market_bet_id)->fetch();
                    if ($return === false) {
                        $this->error(__CLASS__, __FUNCTION__, "03");
                    }
                    $tmp_bet_data['market_bet_name_en'] = $return['name_en'];

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

                // 處理 1/4分盤顯示
                $tmp_bet_data['market_bet_line'] = $this->displayMainLine($tmp_bet_data['market_bet_line']);
                    
                $tmp[$k]['bet_data'][] = $tmp_bet_data;
            }

        }

        $data['list'] = $tmp;

        $this->assign("lists",$data);

        return view('sport_order.index',$this->data);
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

}

