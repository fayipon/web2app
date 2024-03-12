<?php
/******************

Result 開獎腳本

******************/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

use App\Models\CrawlerScript;
use App\Models\GameOrder;
use App\Models\Player;
use App\Models\PlayerBalanceLogs;

use App\Models\LsportSport;
use App\Models\LsportLeague;
use App\Models\LsportFixture;
use App\Models\LsportTeam;
use App\Models\LsportMarket;
use App\Models\LsportMarketBet;

class ResultController extends Controller {

  // 開獎 v2 , 一般及串關
  public function result(Request $request) {

    $this->crawler("result_result","result/result");

    /////////////////////////////////////

    // 取得所有未開獎注單 , status = 2 , is_result = 0
    $return = GameOrder::where("status",2)->where("is_result",0)->orderBy("fixture_id","ASC")->orderBy("sport_id","ASC")->get();
   // $return = GameOrder::where("id",149)->get();
    if ($return === false) {
      $this->ajaxError("error_result_01");
    }

    $order_data = $return;

    // 依注單依序處理
    foreach ($order_data as $k => $v) {

      $m_order = $v['m_order'];
      $m_id = $v['m_id'];
      $order_id = $v['id'];
      $sport_id = $v['sport_id'];
      $fixture_id = $v['fixture_id'];
      $market_id = $v['market_id'];
      $market_bet_id = $v['market_bet_id'];
      $bet_rate = $v['bet_rate'];
      $bet_amount = $v['bet_amount'];
      $market_priority = $v['market_priority'];

      ////////////////////////////////////////////////

      // 取得Market資料, 並讀取出開獎資料
      $market_bet_data = LsportMarketBet::where("bet_id",$market_bet_id)->first(); 
      if ($market_bet_data === false) {
        $this->ajaxError("error_result_04");
      }
      //settlement => -1 canceled , 1 lose , 2 win , 3 refund , 4 halflose , 5 halfwin
      $market_bet_settlement = $market_bet_data['settlement'];
      $market_bet_status = $market_bet_data['status'];

      // 如果狀態為未開 1 open , 2 Suspended , 3 settled , 3才能結算 
      if ($market_bet_status != 3) {
      //  continue;
      }
      if ($market_bet_settlement === null) {
        continue;
      }

      ////////////////////////////////////////////////

      // default score
      $home_team_score = 0;
      $away_team_score = 0;

      // 依據類型來取得注單比分資料
      $fixture_data = LsportFixture::where("fixture_id",$fixture_id)->first();
      if ($fixture_data === false) {
        $this->ajaxError("error_result_03");
      }

      $livingscoreExtradata = json_decode($fixture_data['livingscore_extradata'],true);
      $periods = json_decode($fixture_data['periods'],true);
      $scoreboard = json_decode($fixture_data['scoreboard'],true);
      
      $score_data = $this->getScore($sport_id, $market_priority, $periods, $scoreboard);
      if ($score_data === false) {  // 比賽資料未齊
        continue;
      }

      $home_team_score = $score_data[0];
      $away_team_score = $score_data[1];

      ////////////////////////////////////////////////

      $is_m_order = $v['m_order'];
      
      $result_amount = 0;
      $result_percent = null;

        // 體育投注
        switch ($market_bet_settlement) {
          case 1: // 輸
            $result_amount = 0;
            $result_percent = 0;
            break;
          case 2: // 贏
            $result_amount = $bet_amount*$bet_rate;
            $result_percent = 1;
            break;
          case 3: // 走水, 退款
            $result_amount = $bet_amount;
            $result_percent = 4;
            break;
          case -1: // 走水, 退款
            $result_amount = $bet_amount;
            $result_percent = 4;
            break;
          case 4: // 輸半
            $result_amount = $bet_amount*0.5;
            $result_percent = 3;
            break;
          case 5: // 贏半
            $bet_rate = 1+(($bet_rate-1)/2);
            $result_amount = $bet_amount*$bet_rate;
            $result_percent = 2;
            break;
          default : // 未知狀態
            $result_amount = false;
        }

        // 如果未開獎 略過
        if ($result_amount === false) {
          continue;
        }


        if ($is_m_order == 0) {
          // 一般注單
          
          // 計算active_bet , 一般注單限定
          $abs_result_amount = abs($result_amount - $bet_amount);
          $active_bet = $abs_result_amount; 
          if ($abs_result_amount >= $bet_amount) {
            $active_bet = $bet_amount;
          } 
          // 如果開獎結果為走水, 有效投注 =  0
          if ($market_bet_settlement == 3) {
            $active_bet = 0;
          }

          $update_data = [
              "result_amount"   => $result_amount,
              "active_bet"      => $active_bet,
              "result_percent"  => $result_percent,
              "home_team_score" => $home_team_score,
              "away_team_score" => $away_team_score,
              "is_result"       => 1,
              "status"          => 3
          ];
        } else {
          // 串關注單不改status
          $update_data = [
            "result_percent"  => $result_percent,
            "home_team_score" => $home_team_score,
            "away_team_score" => $away_team_score,
            "is_result"       => 1
          ];
        }
        

        // 更新注單
        $return = GameOrder::where("id",$order_id)->update($update_data);
        if ($return === false) {
            $this->ajaxError("error_result_05");
        }

    }

    ////////////////////////////////////////////////

      // 針對串關的處理流程
      $return = GameOrder::select('m_id', DB::raw('count(id) as total'))
      ->where("status",2)
      ->where("is_result",1)
      ->where("m_order",1)
      ->groupBy('m_id')
      ->get();

      if ($return === false) {
        $this->ajaxError("error_result_06");
      }

      $m_order_data = $return;

      // 依序取得m_id 下的所有order
      foreach ($m_order_data as $k => $v) {

        $m_id = $v['m_id'];
        $total = $v['total'];

        // 計算是否為m_order下所有注單 
        $count = GameOrder::where("m_id",$v['m_id'])->count();
        if ($count != $total) {
          // 若還有注單未開, 略過
          continue;
        }

        // 取得串關id下所有注單
        $return = GameOrder::where("m_id",$v['m_id'])->get();
        if ($return === false) {
          $this->ajaxError("error_result_07");
        }

        $order_list = $return;
        $tmp = array();
        foreach ($order_list as $kk => $vv) {

          $dd = array();
          $order_id = $vv['id'];
          $m_id = $vv['m_id'];
          $dd['id'] = $order_id;

          $bet_amount = $vv['bet_amount'];
          $bet_rate = $vv['bet_rate'];
          $result_percent = $vv['result_percent'];
 
          $result_rate = 1;
          switch ($result_percent) {
            case 0: // 輸
              $result_rate = 0;
              break;
            case 1: // 贏
              $result_rate = $bet_rate;
              break;
            case 2: // 贏半
              $result_rate = 1 + (($bet_rate-1)*0.5);
              break;
            case 3: // 輸半
              $result_rate = 0.5;
              break;
            case 4: // 走水, 退款
              $result_rate = 1;
              break;
            default : // 未知狀態
              $result_rate = false;
          }

          if ($result_rate === false) {
            continue;
          }

          $dd['rate'] = $result_rate + 0;
          $dd['result_percent'] = $result_percent;
          $dd['bet_amount'] = $bet_amount + 0;
          $tmp[$m_id][] = $dd;
        }

        // 計算綜合派獎結果
        $total_rate = 1;
        $bet_amount = false;
        $m_id = false;
        foreach ($tmp as $kk => $vv) {
          $m_id = $kk;
          foreach ($vv as $kkk => $vvv) {
            if ($bet_amount === false) {
              $bet_amount = $vvv['bet_amount'];
            }
            $rate = $vvv['rate'];
            $total_rate = $total_rate*$rate;
          }
        }

        // 更新串關注單資料
        foreach ($tmp as $kk => $vv) {
          $m_id = $kk;
          foreach ($vv as $kkk => $vvv) {
            $id = $vvv['id'];
            $result_percent = $vvv['result_percent'];

            $result_amount = $total_rate*$bet_amount;

            // 計算active_bet , 串關注單限定
            $abs_result_amount = abs($result_amount - $bet_amount);
            $active_bet = $abs_result_amount; 
            if ($abs_result_amount >= $bet_amount) {
              $active_bet = $bet_amount;
            }

            // 如果開獎結果為走水, 有效投注 =  0
            if ($result_percent == 4) {
              $active_bet = 0;
            }

            // 主注單
            if ($id != $m_id) {
              $result_amount = 0;
              $active_bet = 0;
            }

            $return = GameOrder::where("id",$id)->update([
              "result_amount" => $result_amount,
              "active_bet"    => $active_bet,
              "status"        => 3
            ]);
            if ($return === false) {
              $this->ajaxError("error_result_08");
            }
    
          }
        }
      }


      $this->ajaxSuccess("success_result_01");
  }

  // 派獎處理 , order status 3->4
  public function order(Request $request) {

    $this->crawler("result_order","result/order");

    /////////////////////////////////////

    // 取得注單資料 , status 為3的為 待過帳
    $return = GameOrder::where("status",3)->get();

    foreach ($return as $k => $v) {

      $user = Player::where("id",$v['player_id'])->first();
      $account = $user['account'];
      $currency_type =  $user['currency_type'];
      $change_amount = $v['result_amount'];
      $before_amount = $user['balance'];
      $after_amount = $before_amount + $change_amount;

      $tmp = false;
      if ($v['result_amount'] > 0) {
        // 創建帳變紀錄
        $tmp = array();
        $tmp['agent_id']        = $v['agent_id'];
        $tmp['player_id']       = $v['player_id'];
        $tmp['player']          = $account;
        $tmp['currency_type']   = $currency_type;
        $tmp['balance_type']            = "game_result";
        $tmp['change_balance']  = $change_amount;
        $tmp['before_balance']  = $before_amount;
        $tmp['after_balance']   = $after_amount;
        $tmp['create_time']     = time();
      }

      // 開始事務
        DB::beginTransaction();
        
        if ($tmp != false) {
          // 帳變紀錄
          $treturn = PlayerBalanceLogs::insert($tmp);
          if ($treturn === false) {
            DB::rollBack();
          }

          // 更改用戶餘額
          $treturn = Player::where("id",$v['player_id'])->update([
            "balance" => $after_amount
          ]);
          if ($treturn === false) {
            DB::rollBack();
          }
        }

        // 改變注單狀態 3=>4
        $treturn = GameOrder::where("id",$v['id'])->update([
          "status" => 4,
          "result_time" => time()
        ]);
        if ($treturn === false) {
          DB::rollBack();
        }

        DB::commit();
      // end 事務
       
    }
  }

  //////////////////////////////////////

  // 取得球類注單對應的分數
  protected function getScore($sport_id, $market_priority, $periods, $scoreboard) {
    // 判斷取上半場,或總分
    $market_priority_type = [
      154914 => [ // 棒球
        "1" => 0, // 棒球 全場獨贏
        "2" => 1, // 棒球 半場獨贏
        "3" => 0, // 棒球 全場讓分
        "4" => 1, // 棒球 半場讓分
        "5" => 0, // 棒球 全場大小
        "6" => 1,  // 棒球 上半場大小
        "7" => 0, // 棒球 全場單雙
        "8" => 0,  // 棒球 全场波膽
        "9" => 1  // 棒球 前五局獨贏
      ],
      48242 => [ // 籃球
        "101" => 2, // 籃球 全場獨贏
        "102" => 3, // 籃球 半場獨贏
        "103" => 2, // 籃球 全場讓分
        "104" => 3, // 籃球 半場讓分
        "105" => 2, // 籃球 全場大小
        "106" => 3,  // 籃球 上半場大小
        "107" => 2, // 籃球 全場單雙
        "108" => 3,  // 籃球 上半場單雙
        "109" => 6, // 籃球 1節獨贏
        "110" => 6,  // 籃球 1節讓分
        "111" => 6, // 籃球 1節大小
        "112" => 6,  // 籃球 1節單雙
        "113" => 7, // 籃球 2節獨贏
        "114" => 7,  // 籃球 2節讓分
        "115" => 7, // 籃球 2節大小
        "116" => 7,  // 籃球 2節單雙
        "117" => 8, // 籃球 3節獨贏
        "118" => 8,  // 籃球 3節讓分
        "119" => 8, // 籃球 3節大小
        "120" => 8,  // 籃球 3節單雙
        "121" => 9, // 籃球 4節獨贏
        "122" => 9,  // 籃球 4節讓分
        "123" => 9, // 籃球 4節大小
        "124" => 9  // 籃球 4節單雙
      ],
      6046 => [ // 足球
        "201" => 4, // 足球 全場獨贏
        "202" => 5, // 足球 半場獨贏
        "203" => 4, // 足球 全場讓分
        "204" => 5, // 足球 半場讓分
        "205" => 4, // 足球 全場大小
        "206" => 5,  // 足球 上半場大小 
        "207" => 5,  // 足球 上半場單雙
        "208" => 4  // 足球 全場單雙
      ],
      35232 => [ // 冰球
        "301" => 10, // 冰球 全場獨贏
        "302" => 10, // 冰球 全場讓球
        "303" => 10, // 冰球 全場大小
        "304" => 10, // 冰球 全場單雙
      ],
      131506 => [ // 美式足球
        "401" => 12, // 美式足球 全場獨贏
        "402" => 13, // 美式足球 上半場獨贏
        "403" => 12, // 美式足球 全場讓球
        "404" => 13, // 美式足球 上半場讓球
        "405" => 12, // 美式足球 全場大小
        "406" => 13, // 美式足球 上半場大小
        "407" => 12, // 美式足球 全場單雙
        "408" => 13, // 美式足球 上半場單雙
      ]
    ];

    $score_type = $market_priority_type[$sport_id][$market_priority];
    $tmp = array(0,0);
    
    switch ($score_type) {
      case 0: // 棒球取全場
        if ((!isset($scoreboard['Status'])) || ($scoreboard['Status'] != 3)) return false;
        foreach ($scoreboard['Results'] as $k => $v) {
          $pos = $v['Position']-1;
          $tmp[$pos] = $v['Value'];
        }
        break;
      case 1: // 棒球取半場
        foreach ($periods as $k => $v) {
          if (!isset($v['IsFinished']) || ($v['IsFinished'] !== true)) return false;
          $period_number = $v['Type'];
          if ($period_number <= 5) {  // 只取前五局
            foreach ($v['Results'] as $kk => $vv) {
              $pos = $vv['Position']-1;
              $tmp[$pos] += $vv['Value'];
            }
          }
        }
        break;
      case 2: // 籃球取全場
        if ((!isset($scoreboard['Status'])) || ($scoreboard['Status'] != 3)) return false;
        foreach ($scoreboard['Results'] as $k => $v) {
          $pos = $v['Position']-1;
          $tmp[$pos] = $v['Value'];
        }
        break;
      case 3: // 籃球取半場
        foreach ($periods as $k => $v) {
          if (!isset($v['IsFinished']) || ($v['IsFinished'] !== true)) return false;
          $period_number = $v['Type'];
          if ($period_number <= 2) {  // 只取前2節
            foreach ($v['Results'] as $kk => $vv) {
              $pos = $vv['Position']-1;
              $tmp[$pos] += $vv['Value'];
            }
          }
        }
        break;
      case 6: // 籃球取1場
        foreach ($periods as $k => $v) {
          if (!isset($v['IsFinished']) || ($v['IsFinished'] !== true)) return false;
          $period_number = $v['Type'];
          if ($period_number == 1) {  // 只取1節
            foreach ($v['Results'] as $kk => $vv) {
              $pos = $vv['Position']-1;
              $tmp[$pos] += $vv['Value'];
            }
          }
        }
        break;
      case 7: // 籃球取2場
        foreach ($periods as $k => $v) {
          if (!isset($v['IsFinished']) || ($v['IsFinished'] !== true)) return false;
          $period_number = $v['Type'];
          if ($period_number == 2) {  // 只取2節
            foreach ($v['Results'] as $kk => $vv) {
              $pos = $vv['Position']-1;
              $tmp[$pos] += $vv['Value'];
            }
          }
        }
        break;
      case 8: // 籃球取3場
        foreach ($periods as $k => $v) {
          if (!isset($v['IsFinished']) || ($v['IsFinished'] !== true)) return false;
          $period_number = $v['Type'];
          if ($period_number == 3) {  // 只取3節
            foreach ($v['Results'] as $kk => $vv) {
              $pos = $vv['Position']-1;
              $tmp[$pos] += $vv['Value'];
            }
          }
        }
        break;
      case 9: // 籃球取4場
        foreach ($periods as $k => $v) {
          if (!isset($v['IsFinished']) || ($v['IsFinished'] !== true)) return false;
          $period_number = $v['Type'];
          if ($period_number == 4) {  // 只取4節
            foreach ($v['Results'] as $kk => $vv) {
              $pos = $vv['Position']-1;
              $tmp[$pos] += $vv['Value'];
            }
          }
        }
        break;
      case 4: // 足球取全場
        if ((!isset($scoreboard['Status'])) || ($scoreboard['Status'] != 3)) return false;
        foreach ($scoreboard['Results'] as $k => $v) {
          $pos = $v['Position']-1;
          $tmp[$pos] = $v['Value'];
        }
        break;
      case 5: // 足球取半場
        foreach ($periods as $k => $v) {
          if (!isset($v['IsFinished']) || ($v['IsFinished'] !== true)) return false;
          $period_number = $v['Type'];
          if ($period_number == 10) {  // 只取上半場
            foreach ($v['Results'] as $kk => $vv) {
              $pos = $vv['Position']-1;
              $tmp[$pos] += $vv['Value'];
            }
          }
        }
        break;
        case 10: // 冰球取全場
          if ((!isset($scoreboard['Status'])) || ($scoreboard['Status'] != 3)) return false;
          foreach ($scoreboard['Results'] as $k => $v) {
            $pos = $v['Position']-1;
            $tmp[$pos] = $v['Value'];
          }
          break;
        case 11: // 冰球取半場
          foreach ($periods as $k => $v) {
            if (!isset($v['IsFinished']) || ($v['IsFinished'] !== true)) return false;
            $period_number = $v['Type'];
            if ($period_number == 10) {  // 只取上半場
              foreach ($v['Results'] as $kk => $vv) {
                $pos = $vv['Position']-1;
                $tmp[$pos] += $vv['Value'];
              }
            }
          }
          break;
          case 12: // 美足取全場
            if ((!isset($scoreboard['Status'])) || ($scoreboard['Status'] != 3)) return false;
            foreach ($scoreboard['Results'] as $k => $v) {
              $pos = $v['Position']-1;
              $tmp[$pos] = $v['Value'];
            }
            break;
          case 13: // 美足取半場
            foreach ($periods as $k => $v) {
              if (!isset($v['IsFinished']) || ($v['IsFinished'] !== true)) return false;
              $period_number = $v['Type'];
              if ($period_number <= 2) {  // 只取前2節
                foreach ($v['Results'] as $kk => $vv) {
                  $pos = $vv['Position']-1;
                  $tmp[$pos] += $vv['Value'];
                }
              }
            }
            break;
    }
    
    return $tmp;
  }


  //////////////////////////////////////////////////

  // crawler script 控制器
  protected function crawler($name , $url) {

    // 腳本停止
      $return = CrawlerScript::where("crawler_name",$name)->first();
      if ($return != null) {
        if ($return['status'] != 1) {
          exit();
        }
      }

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

    // curl get 
    protected function curl_get($url, $params) {
      
      // 產生request params
      foreach ($params as $k => $v) {
        $this->CONFIG[$k] = $v;
      }

      $request_str = http_build_query($this->CONFIG);
      $url = $url . "?" . $request_str;

      $reponse = $this->api_curl($url);

      $reponse = json_decode($reponse,true);
      if ($reponse == null) {
        return false;
      } 

      return $reponse;
    }

    // curl 類
    protected function api_curl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $output = curl_exec($ch);
        curl_close($ch);      

        return $output;
    }

}

