<?php
/******************

Lsport 賽事列表 - Redis腳本

******************/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use DB;

use App\Models\CrawlerScript;

// LSport
use App\Models\LsportFixture;
use App\Models\LsportLeague;
use App\Models\LsportSport;
use App\Models\LsportTeam;
use App\Models\LsportMarket;
use App\Models\LsportMarketBet;
use App\Models\LsportNotice;
use App\Models\LsportRisk;
use App\Models\GameOrder;

class LsportFixtureController extends Controller {


  public function test(Request $request) {

    ////////////////////
/*
    $fixture_id = 11851735;
    $market_id = 342;
    $return = LsportMarketBet::getMainLine([
      "fixture_id" => $fixture_id,
      "market_id" => $market_id
    ]);

    dd($return);
*/

    /////////////////////////////////////

    $sport_id = 48242;
    $agent_lang = 'tw';
    $time_zone = 0;

    $data = $this->getFixtureDataRisk($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////
    echo json_encode($data,true);
    exit();
    dd($data);

  }

  // 足
  public function MatchListFoolballTW(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 6046;
    $agent_lang = 'tw';
    $time_zone = 0;

    $data = $this->getFixtureData($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);

    Redis::hset('lsport_match_list', $key, $data);

    dd($key);
  }

  public function MatchListFoolballEN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 6046;
    $agent_lang = 'en';
    $time_zone = 0;

    $data = $this->getFixtureData($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_match_list', $key, $data);
    dd($key);
  }

  public function MatchListFoolballCN(Request $request) {
   
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 6046;
    $agent_lang = 'cn';
    $time_zone = 0;

    $data = $this->getFixtureData($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_match_list', $key, $data);
    dd($key);
  }
  
  // 風控用
  public function RiskMatchListFoolballTW(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 6046;
    $agent_lang = 'tw';
    $time_zone = 0;

    $data = $this->getFixtureDataRisk($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);

    Redis::hset('lsport_risk_match_list', $key, $data);

    dd($key);
  }

  public function RiskMatchListFoolballEN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 6046;
    $agent_lang = 'en';
    $time_zone = 0;

    $data = $this->getFixtureDataRisk($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_risk_match_list', $key, $data);
    dd($key);
  }

  public function RiskMatchListFoolballCN(Request $request) {
   
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 6046;
    $agent_lang = 'cn';
    $time_zone = 0;

    $data = $this->getFixtureDataRisk($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_risk_match_list', $key, $data);
    dd($key);
  }

  // 棒
  public function MatchListBaseballTW(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 154914;
    $agent_lang = 'tw';
    $time_zone = 0;

    $data = $this->getFixtureData($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_match_list', $key, $data);
    dd($key,$data);
  }

  public function MatchListBaseballEN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 154914;
    $agent_lang = 'en';
    $time_zone = 0;

    $data = $this->getFixtureData($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_match_list', $key, $data);
  }

  public function MatchListBaseballCN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 154914;
    $agent_lang = 'cn';
    $time_zone = 0;

    $data = $this->getFixtureData($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_match_list', $key, $data);
  }

  public function RiskMatchListBaseballTW(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 154914;
    $agent_lang = 'tw';
    $time_zone = 0;

    $data = $this->getFixtureDataRisk($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_risk_match_list', $key, $data);
    dd($key,$data);
  }

  public function RiskMatchListBaseballEN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 154914;
    $agent_lang = 'en';
    $time_zone = 0;

    $data = $this->getFixtureDataRisk($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_risk_match_list', $key, $data);
  }

  public function RiskMatchListBaseballCN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 154914;
    $agent_lang = 'cn';
    $time_zone = 0;

    $data = $this->getFixtureDataRisk($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_risk_match_list', $key, $data);
  }

  // 籃
  public function MatchListBasketballTW(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 48242;
    $agent_lang = 'tw';
    $time_zone = 0;

    $data = $this->getFixtureData($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_match_list', $key, $data);

    dd($data);
  }

  public function MatchListBasketballEN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 48242;
    $agent_lang = 'en';
    $time_zone = 0;

    $data = $this->getFixtureData($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_match_list', $key, $data);
  }

  public function MatchListBasketballCN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 48242;
    $agent_lang = 'cn';
    $time_zone = 0;

    $data = $this->getFixtureData($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_match_list', $key, $data);
  }

  public function RiskMatchListBasketballTW(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 48242;
    $agent_lang = 'tw';
    $time_zone = 0;

    $data = $this->getFixtureDataRisk($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_risk_match_list', $key, $data);
    echo $data;

  }

  public function RiskMatchListBasketballEN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 48242;
    $agent_lang = 'en';
    $time_zone = 0;

    $data = $this->getFixtureDataRisk($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_risk_match_list', $key, $data);
  }

  public function RiskMatchListBasketballCN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 48242;
    $agent_lang = 'cn';
    $time_zone = 0;

    $data = $this->getFixtureDataRisk($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_risk_match_list', $key, $data);
  }

  // 冰
  public function MatchListIcehockeyTW(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 35232;
    $agent_lang = 'tw';
    $time_zone = 0;

    $data = $this->getFixtureData($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_match_list', $key, $data);
  }

  public function MatchListIcehockeyEN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 35232;
    $agent_lang = 'en';
    $time_zone = 0;

    $data = $this->getFixtureData($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_match_list', $key, $data);
  }

  public function MatchListIcehockeyCN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 35232;
    $agent_lang = 'cn';
    $time_zone = 0;

    $data = $this->getFixtureData($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_match_list', $key, $data);
  }

  public function RiskMatchListIcehockeyTW(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 35232;
    $agent_lang = 'tw';
    $time_zone = 0;

    $data = $this->getFixtureDataRisk($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_risk_match_list', $key, $data);
  }

  public function RiskMatchListIcehockeyEN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 35232;
    $agent_lang = 'en';
    $time_zone = 0;

    $data = $this->getFixtureDataRisk($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_risk_match_list', $key, $data);
  }

  public function RiskMatchListIcehockeyCN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 35232;
    $agent_lang = 'cn';
    $time_zone = 0;

    $data = $this->getFixtureDataRisk($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_risk_match_list', $key, $data);
  }

  // 美
  public function MatchListAmericanFootballTW(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 131506;
    $agent_lang = 'tw';
    $time_zone = 0;

    $data = $this->getFixtureData($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_match_list', $key, $data);
  }

  public function MatchListAmericanFootballEN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 131506;
    $agent_lang = 'en';
    $time_zone = 0;

    $data = $this->getFixtureData($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_match_list', $key, $data);
  }

  public function MatchListAmericanFootballCN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 131506;
    $agent_lang = 'cn';
    $time_zone = 0;

    $data = $this->getFixtureData($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_match_list', $key, $data);
  }

  public function RiskMatchListAmericanFootballTW(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 131506;
    $agent_lang = 'tw';
    $time_zone = 0;

    $data = $this->getFixtureDataRisk($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_risk_match_list', $key, $data);
  }

  public function RiskMatchListAmericanFootballEN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 131506;
    $agent_lang = 'en';
    $time_zone = 0;

    $data = $this->getFixtureDataRisk($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_risk_match_list', $key, $data);
  }

  public function RiskMatchListAmericanFootballCN(Request $request) {
    
    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $sport_id = 131506;
    $agent_lang = 'cn';
    $time_zone = 0;

    $data = $this->getFixtureDataRisk($sport_id, $agent_lang, $time_zone);

    //////////////////////////////////////////

    $key = $sport_id . "_" . $agent_lang;
    $data = json_encode($data,true);
    Redis::hset('lsport_risk_match_list', $key, $data);
  }

  //////////////////////////

  protected function getFixtureData($sport_id, $agent_lang, $time_zone) {
    
    //////////////////////////////////////////

    //取2天內賽事
    $today = strtotime(date("Y-m-d 00:00:00", strtotime("-1 day"))); // 預設昨天
    $today_tomorrow_es = $today; 
    $after_tomorrow_es = $today + 3 * 24 * 60 * 60; 

    //////////////////////////////////////////
    // ES取得賽事

    $return = LsportFixture::query()
    ->from('lsport_fixture')
    ->where('start_time',">=", $today_tomorrow_es)
    ->where('start_time',"<", $after_tomorrow_es)
    ->whereIn('status',[1,2,9])
    ->whereIn('sport_id', function($query) use ($sport_id) {
        $query->select('sport_id')
              ->from('lsport_sport')
              ->where('sport_id', $sport_id)
              ->where('status', 1);
    })
    ->whereIn('league_id', function($query) {
        $query->select('league_id')
              ->from('lsport_league')
              ->where('status', 1);
    })
    ->whereIn('fixture_id', function($query) {
        $query->select('fixture_id')
              ->from('lsport_risk')
              ->where('status', 1);
    })
    ->orderBy("league_id", "ASC")
    ->orderBy("start_time","ASC")
    ->get();
    if ($return === false) {
        return false;
    }

    $fixture_data = $return;


    //////////////////////////////////////////
    
    $status_type = ["","early","living"];

    //////////////////////////////////////////
    $data_en = array();
    $data_cn = array();
    $data_tw = array();

      // default
      $data[$status_type[1]][$sport_id]['list'] = array();
      $data[$status_type[2]][$sport_id]['list'] = array();

      foreach ($fixture_data as $k => $v) {

          $sport_id = $v['sport_id'];
          $league_id = $v['league_id'];
          $fixture_id = $v['fixture_id'];
          $home_team_id = $v['home_id'];
          $away_team_id = $v['away_id'];
          $start_time = date("Y-m-d H:i:s",$v['start_time']+$time_zone);
          
          // 區分living, early
          $status = $v['status'];
          if ($status == 9) {
              $status = 2;
          }
          $status_type_name = $status_type[$status];
          
          // 取得球類
          $sport_name = LsportSport::getName(['sport_id' => $sport_id, "api_lang" => $agent_lang]);
          $data[$status_type_name][$sport_id]['sport_id'] = $sport_id;
          $data[$status_type_name][$sport_id]['sport_name'] = $sport_name;

          // 取得聯賽
          $league_name = LsportLeague::getName(['league_id' => $league_id, "api_lang" => $agent_lang]);
          $data[$status_type_name][$sport_id]['list'][$league_id]['league_id'] = $league_id;
          $data[$status_type_name][$sport_id]['list'][$league_id]['league_name'] = $league_name;

          // fixture columns
          $columns = ["fixture_id","start_time","status","last_update"];
          foreach ($columns as $kk => $vv) {
              if ($vv == "start_time") {
                  $v[$vv] = date("Y-m-d H:i:s",$v[$vv]+$time_zone);
              }
              $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id][$vv] = $v[$vv];
          }

          // home_team_name
          $team_name = LsportTeam::getName(['team_id' => $home_team_id, "api_lang" => $agent_lang]);
          $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['home_team_id'] = $home_team_id;
          $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['home_team_name'] = $team_name;

          // away_team_name
          $team_name = LsportTeam::getName(['team_id' => $away_team_id, "api_lang" => $agent_lang]);
          $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['away_team_id'] = $away_team_id;
          $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['away_team_name'] = $team_name;

          // 比分版資料
          $livescore_extradata = $v['livescore_extradata'];
          $periods = $v['periods'];
          $scoreboard = $v['scoreboard'];

          $parsed_periods = $this->getMatchPeriods($sport_id, $status, $scoreboard, $livescore_extradata);
          $parsed_scoreboard = $this->getMatchScoreboard($sport_id, $status, $periods, $scoreboard);

          $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['periods'] = $parsed_periods;
          $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['scoreboard'] = $parsed_scoreboard;

          // market_bet_count , set default = 0 
          $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['market_bet_count'] = 0;

          // order_by
          $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['order_by'] = strtotime($start_time);

          // 只讀列表所需id
          $market_list_id = [
              // 棒
              154914 => [226,342,28,51,235,281,236],
              // 籃
              48242 => [226,342,28,51,63,53,77],
              // 足
              6046 => [1,41,3,64,2,21],
              // 冰
              35232 => [226,342,28,51],
              // 美足
              131506 => [226,342,28,51,63,53,77,62]
          ];

          // 判定籃球是否走地,如果是, 則另外取得第1-4節
          if (($sport_id == '48242') && ($status == 2)) {
              $market_list_id[$sport_id] = [226,342,28,51,202,64,21,72,203,65,45,73,204,66,46,74,205,67,47,75];
          }

          // 取得market 
          $return = LsportMarket::where("fixture_id",$fixture_id)
          ->whereIn("market_id",$market_list_id[$sport_id])
          ->orderBy('market_id', 'ASC')
          ->list();
          if ($return === false) {
              return false;
          }

          $market_data = $return;
          foreach ($market_data as $kk => $vv) {
              $market_id = $vv['market_id'];
              $market_main_line = $vv['main_line'];
              $market_priority = $vv['priority'];

              // 設定market name
              $market_name = $vv['name_en'];
              if (isset($vv['name_'.$agent_lang]) && ($vv['name_'.$agent_lang] != null) && ($vv['name_'.$agent_lang] != "")) { 
                  $market_name = $vv['name_'.$agent_lang];
              } 

              // set data
              $tmp_market = array();
              $tmp_market['market_id'] = $market_id;
              $tmp_market['priority'] = $market_priority;
              $tmp_market['main_line'] = $market_main_line;
              $tmp_market['market_name'] = $market_name;
              $tmp_market['list'] = array();

              /////////////////////////////////////
              // 設定main_line

              $custom_mainline = true;
             // $custom_mainline = false;
              if ($custom_mainline) { // 自定義分盤規則
                  $return = LsportMarketBet::getMainLine([
                      "fixture_id" => $fixture_id,
                      "market_id" => $market_id
                  ]);

                  if ($return === false) {
                    return false;
                  }

                  if ($return === null) {
                      $tmp_market['main_line'] = $market_main_line;
                  } else {
                      $tmp_market['main_line'] = $return['base_line'];
                      $market_main_line = $return['base_line'];
                  }
              }
              
              // 處理1/4盤
              $tmp_market['main_line'] = $this->displayMainLine($tmp_market['main_line']);
              
              /////////////////////////////////////
              
              $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['list'][$market_id] = $tmp_market;

              // 取得market_bet
              $return = LsportMarketBet::where('fixture_id',$fixture_id)
              ->where("market_id",$market_id)
              ->where("base_line.keyword",'"'.$market_main_line.'"')  // main line 有時是空值, 要帶 "
              ->orderBy("name_en.keyword","ASC")
              ->list();
              if ($return === false) {
                return false;
              }

              $market_bet_data = $return;

              // 根據水位調整賠率
              $market_bet_data = $this->getAdjustedRate($status_type_name, $sport_id, $market_id, $market_bet_data);

              foreach ($market_bet_data as $kkk => $vvv) {

                  $market_base_line = $vvv['base_line'];
                  $market_bet_id = $vvv['bet_id'];

                  // TODO
                  $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['market_bet_count']++;

                  // 設定market_bet_name
                  $market_bet_name = $vvv['name_en'];
                  if (isset($vvv['name_'.$agent_lang]) && ($vvv['name_'.$agent_lang] != null) && ($vvv['name_'.$agent_lang] != "")) { 
                      $market_bet_name = $vvv['name_'.$agent_lang];
                  } 

                  // 處理1/4盤
                  $vvv['line'] = $this->displayMainLine($vvv['line']);
              
                  $tmp_data = array();
                  $tmp_data['market_bet_id'] = $market_bet_id;
                  $tmp_data['market_bet_name'] = $market_bet_name;
                  $tmp_data['market_bet_name_en'] = $vvv['name_en'];
                  $tmp_data['line'] = $vvv['line'];
                  $tmp_data['price'] = $vvv['price'];
                  $tmp_data['status'] = $vvv['status'];
                  $tmp_data['last_update'] = $vvv['last_update'];
                  
                  $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['list'][$market_id]['list'][] = $tmp_data;
              }
          }
      }

      return $data;
  }

  protected function getFixtureDataRisk($sport_id, $agent_lang, $time_zone) {
    
    //////////////////////////////////////////

    //取2天內賽事
    $today = strtotime(date("Y-m-d 00:00:00", strtotime("-1 day"))); // 預設昨天
    $today_tomorrow_es = $today; 
    $after_tomorrow_es = $today + 3 * 24 * 60 * 60; 

    //////////////////////////////////////////
    // ES取得賽事

    $return = LsportFixture::query()
    ->from('lsport_fixture')
    ->where('start_time',">=", $today_tomorrow_es)
    ->where('start_time',"<", $after_tomorrow_es)
    ->whereIn('status',[1,2,9])
    ->whereIn('sport_id', function($query) use ($sport_id) {
        $query->select('sport_id')
              ->from('lsport_sport')
              ->where('sport_id', $sport_id)
              ->where('status', 1);
    })
    ->whereIn('league_id', function($query) {
        $query->select('league_id')
              ->from('lsport_league')
              ->where('status', 1);
    })
    ->orderBy("league_id", "ASC")
    ->orderBy("start_time","ASC")
    ->get();
    if ($return === false) {
        return false;
    }

    $fixture_data = $return;


    //////////////////////////////////////////
    
    $status_type = ["","early","living"];

    //////////////////////////////////////////
    $data_en = array();
    $data_cn = array();
    $data_tw = array();

      // default
      $data[$status_type[1]][$sport_id]['list'] = array();
      $data[$status_type[2]][$sport_id]['list'] = array();

      foreach ($fixture_data as $k => $v) {

          $sport_id = $v['sport_id'];
          $league_id = $v['league_id'];
          $fixture_id = $v['fixture_id'];
          $home_team_id = $v['home_id'];
          $away_team_id = $v['away_id'];
          $start_time = date("Y-m-d H:i:s",$v['start_time']+$time_zone);
          
          // 區分living, early
          $status = $v['status'];
          if ($status == 9) {
              $status = 2;
          }
          $status_type_name = $status_type[$status];

          // 取得球類
          $sport_name = LsportSport::getName(['sport_id' => $sport_id, "api_lang" => $agent_lang]);
          $data[$status_type_name][$sport_id]['sport_id'] = $sport_id;
          $data[$status_type_name][$sport_id]['sport_name'] = $sport_name;

          // 取得聯賽
          $league_name = LsportLeague::getName(['league_id' => $league_id, "api_lang" => $agent_lang]);
          $data[$status_type_name][$sport_id]['list'][$league_id]['league_id'] = $league_id;
          $data[$status_type_name][$sport_id]['list'][$league_id]['league_name'] = $league_name;

          // fixture columns
          $columns = ["fixture_id","start_time","status","last_update"];
          foreach ($columns as $kk => $vv) {
              if ($vv == "start_time") {
                  $v[$vv] = date("Y-m-d H:i:s",$v[$vv]+$time_zone);
              }
              $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id][$vv] = $v[$vv];
          }

          // home_team_name
          $team_name = LsportTeam::getName(['team_id' => $home_team_id, "api_lang" => $agent_lang]);
          $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['home_team_id'] = $home_team_id;
          $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['home_team_name'] = $team_name;

          // away_team_name
          $team_name = LsportTeam::getName(['team_id' => $away_team_id, "api_lang" => $agent_lang]);
          $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['away_team_id'] = $away_team_id;
          $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['away_team_name'] = $team_name;

          // 取得LsportRisk的status
          $return = LsportRisk::where("fixture_id",$fixture_id)->first();
          $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['risk_status'] = $return['status'];
          

          // 比分版資料
          $livescore_extradata = $v['livescore_extradata'];
          $periods = $v['periods'];
          $scoreboard = $v['scoreboard'];

          $parsed_periods = $this->getMatchPeriods($sport_id, $status, $scoreboard, $livescore_extradata);
          $parsed_scoreboard = $this->getMatchScoreboard($sport_id, $status, $periods, $scoreboard);

          $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['periods'] = $parsed_periods;
          $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['scoreboard'] = $parsed_scoreboard;

          // market_bet_count , set default = 0 
          $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['market_bet_count'] = 0;

          // order_by
          $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['order_by'] = strtotime($start_time);

          // 只讀列表所需id
          $market_list_id = [
              // 棒
              154914 => [226,342,28,51,235,281,236],
              // 籃
              48242 => [226,342,28,51,63,53,77],
              // 足
              6046 => [1,41,3,64,2,21],
              // 冰
              35232 => [226,342,28,51],
              // 美足
              131506 => [226,342,28,51,63,53,77,62]
          ];

          // 判定籃球是否走地,如果是, 則另外取得第1-4節
          if (($sport_id == '48242') && ($status == 2)) {
              $market_list_id[$sport_id] = [226,342,28,51,202,64,21,72,203,65,45,73,204,66,46,74,205,67,47,75];
          }

          // 取得market 
          $return = LsportMarket::where("fixture_id",$fixture_id)
        //  ->whereIn("market_id",$market_list_id[$sport_id])   // 風控接口 會列出所有market
          ->orderBy('market_id', 'ASC')
          ->list();
          if ($return === false) {
              return false;
          }

          $market_data = $return;
          foreach ($market_data as $kk => $vv) {
              $market_id = $vv['market_id'];
              $market_main_line = $vv['main_line'];
              $market_priority = $vv['priority'];

              // 設定market name
              $market_name = $vv['name_en'];
              if (isset($vv['name_'.$agent_lang]) && ($vv['name_'.$agent_lang] != null) && ($vv['name_'.$agent_lang] != "")) { 
                  $market_name = $vv['name_'.$agent_lang];
              } 

              // set data
              $tmp_market = array();
              $tmp_market['market_id'] = $market_id;
              $tmp_market['priority'] = $market_priority;
              $tmp_market['main_line'] = $market_main_line;
              $tmp_market['market_name'] = $market_name;
              $tmp_market['list'] = array();

              /////////////////////////////////////
              // 設定main_line

              $custom_mainline = true;
           //   $custom_mainline = false;
              if ($custom_mainline) { // 自定義分盤規則
                  $return = LsportMarketBet::getMainLine([
                      "fixture_id" => $fixture_id,
                      "market_id" => $market_id
                  ]);

                  if ($return === false) {
                    return false;
                  }

                  if ($return === null) {
                      $tmp_market['main_line'] = $market_main_line;
                  } else {
                      $tmp_market['main_line'] = $return['base_line'];
                      $market_main_line = $return['base_line'];
                  }
              }
              
              // 處理1/4盤
              $tmp_market['main_line'] = $this->displayMainLine($tmp_market['main_line']);
              $tmp_market['base_main_line'] = $market_main_line;
              
              /////////////////////////////////////

              // 統計 market 的注數及下注額度
              $count_data = $this->getBetCountTotal($fixture_id, $market_id);

              $tmp_market['bet_total'] = $count_data;
              
              /////////////////////////////////////
              
              $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['list'][$market_id] = $tmp_market;

              // 取得market_bet
              $return = LsportMarketBet::where('fixture_id',$fixture_id)
              ->where("market_id",$market_id)
              ->orderBy("name_en.keyword","ASC")
              ->list();
              if ($return === false) {
                return false;
              }

              //////////////////////////////
              // dd

              $check_market_bet_lines = [];
              $market_bet_data = $return;
              $tmp_market_data = array();
              foreach ($market_bet_data as $kkk => $vvv) {
                
                  $active_market_bet = 0;

                  $market_bet_id = $vvv['bet_id'];
  
                  // 設定market_bet_name
                  $market_bet_name = $vvv['name_en'];
                  if (isset($vvv['name_'.$agent_lang]) && ($vvv['name_'.$agent_lang] != null) && ($vvv['name_'.$agent_lang] != "")) { 
                      $market_bet_name = $vvv['name_'.$agent_lang];
                  } 
  
                  $base_line = $vvv['base_line'];
                  $check_market_bet_lines[$base_line] = false;
  
                  $tmp_data = $vvv;
                  $tmp_data['line'] = $this->displayMainLine($vvv['line']);
  
                  $tmp_market_data['market_bet'][$base_line][] = $tmp_data;
                  
                  // 只要其中一個賠率status 為1 , 則顯示
                  if ($vvv['status'] == 1) { 
                      $check_market_bet_lines[$base_line] = true;
                  }
                  
                  $active_market_bet++;
              }
  
              // 移除已鎖的盤口
              if ($market_main_line != "") {  // 如果是無main line的 則不處理
                foreach ($tmp_market_data['market_bet'] as $k => $v) {
                  if (isset($check_market_bet_lines[$k])) {
                    if ($check_market_bet_lines[$k] === false) {
                        unset($tmp_market_data['market_bet'][$k]);
                    }
                  }
                }
              }
  
              // 順序排序
              ksort($tmp_market_data['market_bet']);
  
              $tmp_market_bet_data = array();

              // 盤口數量限制 ,
              if ($market_main_line != "") {
                  $keys = array_keys($tmp_market_data['market_bet']);
                  $position = array_search($market_main_line, $keys);
                  if ($position !== false) {
                      $result = [];
                      for ($i = max(0, $position - 2); $i <= min(count($keys) - 1, $position + 2); $i++) {
                          $result[$keys[$i]] = $tmp_market_data['market_bet'][$keys[$i]];
                      }
                      $tmp_market_bet_data = $result;
                  }
              } else {
                $tmp_market_bet_data = $tmp_market_data['market_bet'];
              }
  

              //////////////////////

              foreach ($tmp_market_bet_data as $kkk => $vvv) {
                

                // 根據水位調整賠率
                $dd_market_bet_data = $this->getAdjustedRate($status_type_name, $sport_id, $market_id, $vvv);

                foreach ($dd_market_bet_data as $kkkk => $vvvv) {

                    $market_base_line = $vvvv['base_line'];
                    $market_bet_id = $vvvv['bet_id'];
                    
                    // TODO
                    $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['market_bet_count']++;

                    // 設定market_bet_name
                    $market_bet_name = $vvvv['name_en'];
                    if (isset($vvvv['name_'.$agent_lang]) && ($vvvv['name_'.$agent_lang] != null) && ($vvvv['name_'.$agent_lang] != "")) { 
                        $market_bet_name = $vvvv['name_'.$agent_lang];
                    } 

                    // 處理1/4盤
                    $vvvv['line'] = $this->displayMainLine($vvvv['line']);
                
                    $tmp_data = array();
                    $tmp_data['market_bet_id'] = $market_bet_id;
                    $tmp_data['market_bet_name'] = $market_bet_name;
                    $tmp_data['market_bet_name_en'] = $vvvv['name_en'];
                    $tmp_data['line'] = $vvvv['line'];
                    $tmp_data['price'] = $vvvv['price'];
                    $tmp_data['status'] = $vvvv['status'];
                    $tmp_data['last_update'] = $vvvv['last_update'];
                    
                    $data[$status_type_name][$sport_id]['list'][$league_id]['list'][$fixture_id]['list'][$market_id]['list'][$market_base_line][] = $tmp_data;
                }
              }
          }
      }
      
      return $data;
  }

  protected function getMatchScoreboard($sport_id, $fixture_status, $periods, $scoreboard) {

    // 如果還未開賽就回傳null
    if ($fixture_status != 2) {
        return null;
    }

    //========================================
    // 處理傳入參數

    if (is_array($periods)) {
        $arr_periods = $periods;
    } else {
        // 如果參數是字串則json_decoe看看
        $arr_periods = json_decode($periods, true);
        // de不出東西就回傳false
        if (!is_array($arr_periods) && !$arr_periods) {
            return null;
        }
    }

    if (is_array($scoreboard)) {
        $arr_scoreboard = $scoreboard;
    } else {
        // 如果參數是字串則json_decoe看看
        $arr_scoreboard = json_decode($scoreboard, true);
        // de不出東西就回傳false
        if (!is_array($arr_scoreboard) && !$arr_scoreboard) {
            return null;
        }
    }

    //========================================

    $ret = array();

    // 處理總分
    $arr_results = $arr_scoreboard['Results'];
    foreach ($arr_results as $rk => $rv) {
        $pos = intval($rv['Position']);
        $total_score = intval($rv['Value']);
        //總分都是放在key=0的位置
        $ret[$pos][0] = $total_score;
    }

    // 各局得分
    // Position=40以上都不要計入
    foreach ($arr_periods as $pk => $pv) {
        $type = intval($pv['Type']);  // type=局數號碼
        $arr_results = $pv['Results'];
        foreach ($arr_results as $rk => $rv) {
            $pos = intval($rv['Position']);
            $score = intval($rv['Value']);
            if ($type <= 50) {  // 40 通常為加時，也要計入 (football的50是罰球)
                $ret[$pos][$type] = $score;
            }
        }
    }

    //陣列依key值ASC排序,因為有時候type=40的會出現在其他較小的type之前
    foreach ($ret as $rk => &$rv) {
        ksort($rv);
    }

    return $ret;

  }

  protected function getMatchPeriods($sport_id, $fixture_status, $scoreboard, $livescore_extradata) {

    // 如果還未開賽就回傳null
    $fixture_status = intval($fixture_status);

    if ($fixture_status != 2) {
        return null;
    }

    //========================================
    // 處理傳入參數

    if (is_array($scoreboard)) {
        $arr_scoreboard = $scoreboard;
    } else {
        // 如果參數是字串則json_decoe看看
        $arr_scoreboard = json_decode($scoreboard, true);
        // de不出東西就回傳false
        if (!is_array($arr_scoreboard) && !$arr_scoreboard) {
            return null;
        }
    }

    if (is_array($livescore_extradata)) {
        $arr_livescore_extradata = $livescore_extradata;
    } else {
        // 如果參數是字串則json_decoe看看
        $arr_livescore_extradata = json_decode($livescore_extradata, true);
        // de不出東西就回傳false
        if (!is_array($arr_livescore_extradata) && !$arr_livescore_extradata) {
            return null;
        }
    }

    //========================================

    // 以下ex.棒球
    $ret = array(
        "period" => null, // 第幾局
        // "turn" : 1, // 1為下, 2為上
        // "balls" : 1 // 壞球數, 
        // "strikes" : 1 , '' 好球數
        // "outs" : 1 , // 出局數
        // "bases" : "1/1/1"   // 1,2,3 壘是否有人
    );

    // 當前局數
    $ret['period'] = $arr_scoreboard['CurrentPeriod'];

    // 各種比賽狀態(好壞球數,壘包狀態等等)
    foreach ($arr_livescore_extradata as $k => $v) {
        $col_name = $v['Name'];
        $col_value = $v['Value'];
        $ret[$col_name] = $col_value;
    }

    return $ret;

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

  // 取得fixture_id , market_id 下的bet_count , bet_amount 
  protected function getBetCountTotal($fixture_id, $market_id) {

    $return = LsportMarketBet::select('name_en')
    ->where('fixture_id', $fixture_id)
    ->where('market_id', $market_id)
    ->groupBy('name_en')
    ->get();

    if ($return === false) {
      return null;
    }

    // 預設回傳格式
    $data = array();
    foreach ($return as $k => $v) {
      $name_en = $v['name_en'];
      $data[$name_en] = [
        "count" => 0,
        "total" => 0
      ];
    }

    //////////////////

    $return = GameOrder::select('market_bet_name', DB::raw('COUNT(*) as count'), DB::raw('SUM(bet_amount) as total_bet_amount'))
    ->where('fixture_id', $fixture_id)
    ->where('market_id', $market_id)
    ->where('status',2)
    ->groupBy('market_bet_name')
    ->get();

    if ($return === false) {
      return null;
    }

    foreach ($return as $k => $v) {
      $market_bet_name = $v['market_bet_name'];
      $count = $v['count'];
      $total = $v['total_bet_amount'];

      // 將market_bet_name 做映射
      $cc = $this->replace_market_name($market_bet_name);
      if ($cc !== false) {
        $market_bet_name = $cc;
      }
      
      $data[$market_bet_name]['count'] = $count;
      $data[$market_bet_name]['total'] = $total+0;
    }

    return $data;

  }

  protected function replace_market_name($market_bet_name) {
      $marketBetData = array(
        "1" => array(
            "cn" => "主",
            "tw" => "主"
        ),
        "2" => array(
            "cn" => "客",
            "tw" => "客"
        ),
        "Over" => array(
            "cn" => "大",
            "tw" => "大"
        ),
        "Under" => array(
            "cn" => "小",
            "tw" => "小"
        ),
        "Odd" => array(
            "cn" => "单",
            "tw" => "單"
        ),
        "Even" => array(
            "cn" => "双",
            "tw" => "雙"
        ),
        "X" => array(
            "cn" => "平",
            "tw" => "平"
        )
    );
    
    foreach ($marketBetData as $key => $valueArray) {
        if ($market_bet_name === $valueArray["cn"] || $market_bet_name === $valueArray["tw"]) {
            $result = $key; // 匹配到键
            break; // 找到匹配后可以退出循环
        }
    }
    
    if (isset($result)) {
        return $result;
    }

    return false;
  }

  // 計算 水位調整後的賠率
  protected function getAdjustedRate($status, $sport_id, $market_id, $data) {

    // 取得配置
    $default_market_bet_llimit = json_decode($this->system_config['default_market_bet_llimit'], true);
    
    // 沒有配置的
    if (!isset($default_market_bet_llimit[$status][$sport_id][$market_id])) {
      return $data;
    }

    $market_bet_rate = $default_market_bet_llimit[$status][$sport_id][$market_id];

    $tmp = array();
    foreach ($data as $k => $v) {
      $tmp[] = $v['price'];
    }

    if (count($tmp) >= 2) {
      $dd = $this->adjustNumbers($tmp, $market_bet_rate);
      foreach ($data as $k => $v) {
        $data[$k]['price'] = $dd[$k];
        $data[$k]['price'] = $data[$k]['price'] . "";
      }
    }

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
}
