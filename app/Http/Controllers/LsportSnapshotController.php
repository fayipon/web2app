<?php
/******************

Lsport 非RMQ 腳本

******************/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

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
use App\Models\LsportEvents;

class LsportSnapshotController extends Controller {

  // 取得所有體育資料
  public function GetSport(Request $request) {

    $url = "https://stm-api.lsports.eu/Sports/Get";
    
    $extra_data = [
      "SportIds" => [154914,6046,48242,35232]
    ];

    $list = $this->sendLsportPrematchAPI($url, $extra_data);

    // 更新Lsport
    foreach ($list['Body']['Sports'] as $k => $v) {

      $count = LsportSport::where("sport_id",$v['Id'])->count();
      if ($count === false) {
        dd($count);
      }

      if ($count == 0) {
        $return = LsportSport::insert([
          "sport_id" => $v['Id'],
          "name_en" => $v['Name']
        ]);
        if ($return === false) {
          dd($return);
        }

        echo "sport => "    . $v['Id'] . "<br>";
        echo "name_en => "  . $v['Name'] . "<br>";
        echo "<br><br>";
      }

    }

    dd($list);
  }
  
  // 取得所有體育資料
  public function GetLeague(Request $request) {

    $url = "https://stm-api.lsports.eu/Leagues/Get";
    
    $extra_data = [
      "Sports" => [154914,6046,48242,35232]
    ];

    $list = $this->sendLsportPrematchAPI($url, $extra_data);

    // 更新Lsport
    foreach ($list['Body']['Leagues'] as $k => $v) {

      $count = LsportLeague::where("league_id",$v['Id'])->count();
      if ($count === false) {
        dd($count);
      }

      if ($count == 0) {
        $return = LsportLeague::insert([
          "league_id" => $v['Id'],
          "sport_id" => $v['SportId'],
          "name_en" => $v['Name']
        ]);
        if ($return === false) {
          dd($return);
        }

        echo "sport => "    . $v['SportId'] . "<br>";
        echo "league => "    . $v['Id'] . "<br>";
        echo "name_en => "  . $v['Name'] . "<br>";
        echo "<br><br>";
      }

    }
    dd($list);

  }

  // 手動補prematch資料
  public function GetPrematch(Request $request) {

    $url = "https://stm-snapshot.lsports.eu/PreMatch/GetEvents";
    
    $today_unix = strtotime("today");
    $yesterday_unix = $today_unix - (5 * 24 * 60 * 60);

    $extra_data = [
      "Sports" => [154914,6046,48242,35232],
      "FromDate" => $yesterday_unix,
      "ToDate" => $today_unix
    ];

    $list = $this->sendLsportPrematchAPI($url, $extra_data);

    // 更新Lsport
    foreach ($list['Body'] as $k => $v) {

      // fixture_id 
      $fixture_id = $v['FixtureId'];
      // sport_id 
      $sport_id = $v['Fixture']['Sport']['Id'];

      // fixture
      if (isset($v['Fixture'])) {
        $fixture_data = $v['Fixture'];
        $this->updateFixture($fixture_data, $fixture_id);
      }

      // live score
      if (isset($v['Livescore'])) {
        $livescore_data = $v['Livescore'];
        $this->updateLivescore($livescore_data, $fixture_id);
      }
      // markets
      if (isset($v['Markets'])) {
        $markets_data = $v['Markets'];
        $this->updateMarket($markets_data, $sport_id, $fixture_id);
      }
    }

    dd("SUCCESS");
  }
  
  // 手動補inplay資料
  public function GetInplay(Request $request) {
    $url = "https://stm-snapshot.lsports.eu/InPlay/GetEvents";
    
    $today_unix = strtotime("today");
    $yesterday_unix = $today_unix - (5 * 24 * 60 * 60);

    $extra_data = [
      "Sports" => [154914,6046,48242,35232],
      "FromDate" => $yesterday_unix,
      "ToDate" => $today_unix
    ];

    $list = $this->sendLsportInplayAPI($url, $extra_data);

    // 更新Lsport
    foreach ($list['Body'] as $k => $v) {

      // fixture_id 
      $fixture_id = $v['FixtureId'];
      // sport_id 
      $sport_id = $v['Fixture']['Sport']['Id'];

      // fixture
      if (isset($v['Fixture'])) {
        $fixture_data = $v['Fixture'];
        $this->updateFixture($fixture_data, $fixture_id);
      }

      // live score
      if (isset($v['Livescore'])) {
        $livescore_data = $v['Livescore'];
        $this->updateLivescore($livescore_data, $fixture_id);
      }
      // markets
      if (isset($v['Markets'])) {
        $markets_data = $v['Markets'];
        $this->updateMarket($markets_data, $sport_id, $fixture_id);
      }

    }

  }

  // 手動補 part 2 
  public function GetSubscribedMetaData(Request $request) {

    $url = "https://stm-api.lsports.eu/Fixtures/GetSubscribedMetaData?Username=cnwin88.aws@gmail.com&Password=Kp165393!&PackageId=1722&FromDate=10/26/2023&ToDate=10/31/2023";

    $return = file_get_contents($url);

    $data = json_decode($return, true);

    foreach ($data['Body']['SubscribedFixtures'] as $k => $v) {

      $fixture_id = $v['FixtureId'];
      $tmp_fixture_data = array();
      $tmp_fixture_data['fixture_id'] = $v['FixtureId'];
      $tmp_fixture_data['sport_id'] = $v['SportId'];
      $tmp_fixture_data['league_id'] = $v['LeagueId'];
      $tmp_fixture_data['start_time'] = strtotime($v['StartDate']);
      $tmp_fixture_data['last_update'] = strtotime($v['LastUpdate']);
      $tmp_fixture_data['status'] = $v['FixtureStatus'];

    dd($v['StartDate'] , $tmp_fixture_data['start_time']);
      foreach ($v['Participants'] as $kk => $vv) {
        if ($kk == 0) {
          $tmp_fixture_data['home_id'] = $vv['ParticipantId'];
        } else {
          $tmp_fixture_data['away_id'] = $vv['ParticipantId'];
        }
      }
      
      $count = LsportFixture::where("fixture_id",$fixture_id)->count();
      if ($count == 0) {
        $return = LsportFixture::insert($tmp_fixture_data);
        if ($return === false) {
          dd($return);
        }
      }

    }

    dd("success");
  }

  // 用log 補
  public function updateByLogs(Request $request) {

    $input = $this->getRequest($request);

    $data = json_decode($input['data'],true);

    $dump = array();

    // 先取得header type
    $EventType = $data['Header']['Type'];

    switch ($EventType) {
      case 1: // 聯賽處理
        $this->updateEvent1($data);
        $dump['EventType'] = $EventType;
        $dump['Event'] = 'fixture';
        break;
      case 2:
        dd($EventType, $data);
        break;
      case 3:
        $this->updateEvent3($data);
        $dump['EventType'] = $EventType;
        $dump['Event'] = 'market';
        break;
      default:
        dd("未知", $data);
    }


    dd("success",$dump);


  }
  //////////////////////////////////////////////////
  // 更新數據 By Logs

  protected function updateEvent1($data) {

    $time_zone = 8 * 3600;

    foreach ($data['Body']['Events'] as $k => $fixture_data) {

      $fixture_id = $fixture_data['FixtureId'];
      $tmp_fixture_data = array();
      $tmp_fixture_data['fixture_id'] = $fixture_data['FixtureId'];
      $tmp_fixture_data['sport_id'] = $fixture_data['Fixture']['Sport']['Id'] + 0;
      $tmp_fixture_data['league_id'] = $fixture_data['Fixture']['League']['Id'] + 0;
      $tmp_fixture_data['start_time'] = strtotime($fixture_data['Fixture']['StartDate']) + $time_zone;
      $tmp_fixture_data['last_update'] = strtotime($fixture_data['Fixture']['LastUpdate']) + $time_zone;
      $tmp_fixture_data['status'] = $fixture_data['Fixture']['Status'];
      foreach ($fixture_data['Fixture']['Participants'] as $kk => $vv) {
        if ($vv['Position'] == 1) {
          $tmp_fixture_data['home_id'] = $vv['Id'];
        }
        if ($vv['Position'] == 2) {
          $tmp_fixture_data['away_id'] = $vv['Id'];
        }
      }

      $count = LsportFixture::where("fixture_id",$fixture_id)->count();
      if ($count == 0) {
        LsportFixture::insert($tmp_fixture_data);
      }
    }
  }

  protected function updateEvent2($data) {

    $time_zone = 8 * 3600;

    foreach ($data['Body']['Events'] as $k => $fixture_data) {

      $fixture_id = $fixture_data['FixtureId'];
      $tmp_fixture_data = array();
      $tmp_fixture_data['fixture_id'] = $fixture_data['FixtureId'];
      $tmp_fixture_data['sport_id'] = $fixture_data['Fixture']['Sport']['Id'] + 0;
      $tmp_fixture_data['league_id'] = $fixture_data['Fixture']['League']['Id'] + 0;
      $tmp_fixture_data['start_time'] = strtotime($fixture_data['Fixture']['StartDate']) + $time_zone;
      $tmp_fixture_data['last_update'] = strtotime($fixture_data['Fixture']['LastUpdate']) + $time_zone;
      $tmp_fixture_data['status'] = $fixture_data['Fixture']['Status'];
      foreach ($fixture_data['Fixture']['Participants'] as $kk => $vv) {
        if ($vv['Position'] == 1) {
          $tmp_fixture_data['home_id'] = $vv['Id'];
        }
        if ($vv['Position'] == 2) {
          $tmp_fixture_data['away_id'] = $vv['Id'];
        }
      }

      $count = LsportFixture::where("fixture_id",$fixture_id)->count();
      if ($count == 0) {
        $date = date("Y-m-d H:i:s", $tmp_fixture_data['start_time']);
        dd($date);
        //LsportFixture::insert($tmp_fixture_data);
      }
    }
  }

  protected function updateEvent3($data) {

    $time_zone = 8 * 3600;

    $lsport_priority = trans('lsport.lsport_priority');
    $lsport_market_bet = trans('lsport.lsport_market_bet');

    foreach ($data['Body']['Events'] as $k => $v) {

      $fixture_id = $v['FixtureId'];
      // 取得sport_id
      $return = LsportFixture::where('fixture_id',$fixture_id)->first();
      if ($return === false) dd($return);
      if ($return == null) dd($return);
      
      $sport_id = $return['sport_id'];

      $market_data = $v['Markets'];

      // market 層
      foreach ($market_data as $kk => $vv) {

        $market_id = $vv['Id'];

        $market_priority = $lsport_priority[$sport_id][$market_id];

        $tmp_market = array();
        $tmp_market['fixture_id'] = $fixture_id;
        $tmp_market['market_id'] = $market_id;
        $tmp_market['priority'] = $market_priority['priority'];
        $tmp_market['name_en']   = $vv['Name'];
        $tmp_market['name_cn'] = $market_priority['cn'];
        $tmp_market['name_tw'] = $market_priority['tw'];
        $tmp_market['main_line']   = $vv['MainLine'];
        $tmp_market['status']   = 1;

        // 更新market 
        $count = LsportMarket::where("fixture_id",$fixture_id)
        ->where("market_id",$market_id)
        ->count();

        if ($count == 0) {
          $return = LsportMarket::insert($tmp_market);
          if ($return === false) {
            dd($return);
          }
        }

        // market bet 層
        $market_bet_data = $vv['Bets'];
        foreach ($market_bet_data as $kkk => $vvv) {

          $bet_id = $vvv['Id'];
          $last_update = strtotime($vvv['LastUpdate']);
    
          $tmp_market_bet = array();
          $tmp_market_bet['fixture_id'] = $fixture_id;
          $tmp_market_bet['market_id'] = $market_id;
          $tmp_market_bet['bet_id'] = $bet_id;
          $tmp_market_bet['base_line'] = $vvv['BaseLine'];
          $tmp_market_bet['line'] = $vvv['Line'];
          $tmp_market_bet['name_en'] = $vvv['Name'];
          $tmp_market_bet['price'] = $vvv['Price'];
          $tmp_market_bet['price_hk'] = $vvv['PriceHK'];
          $tmp_market_bet['start_price'] = $vvv['StartPrice'];
          $tmp_market_bet['provder_bet_id'] = $vvv['ProviderBetId'];
          $tmp_market_bet['status'] = $vvv['Status'];
          $tmp_market_bet['last_update'] = strtotime($vvv['LastUpdate']);
          
          // 處理 name_cn , name_tw
          $tmp_market_bet['name_cn'] = $vvv['Name'];
          $tmp_market_bet['name_tw'] = $vvv['Name'];
          if (isset($lsport_market_bet[$vvv['Name']])) {
            $tmp_market_bet['name_cn'] = $lsport_market_bet[$vvv['Name']]['cn'];
            $tmp_market_bet['name_tw'] = $lsport_market_bet[$vvv['Name']]['tw'];
          }

          // 更新market bet
          $count = LsportMarketBet::where("bet_id",$bet_id)->count();
          if ($count == 0) {
            $return = LsportMarketBet::where("last_update", "<", $last_update)->insert($tmp_market_bet);
            if ($return === false) {
              dd($return);
            }
          }
          
        }

      }
    }

  }


  //////////////////////////////////////////////////
  // 更新數據

  // update sport 
  protected function updateSport($data) {
    $id = $data['Id'];
    $name_en = $data['Name'];
    $count = LsportSport::where("id",$id)->count();
    if ($count == 0) {
      $return = LsportSport::insert([
        "sport_id" => $id,
        "name_en" => $name_en
      ]);
      if ($return === false) {
        return false;
      }
    }
    return true;
  }
  
  // update league 
  protected function updateLeague($data) {
    $id = $data['Id'];
    $name_en = $data['Name'];
    $count = LsportLeague::where("id",$id)->count();
    if ($count == 0) {
      $return = LsportLeague::insert([
        "league_id" => $id,
        "name_en" => $name_en
      ]);
      if ($return === false) {
        return false;
      }
    }
    return true;
  }

  // update Participants
  protected function updateParticipants($data) {

    foreach ($data as $k => $v) {

      $id = $data['Id'];
      $name_en = $data['Name'];

      $count = LsportTeam::where("id",$id)->count();
      if ($count == 0) {
        $return = LsportTeam::insert([
          "team_id" => $id,
          "name_en" => $name_en
        ]);
        if ($return === false) {
          return false;
        }
      }
    }
    return true;
  }

  // update fixture 
  protected function updateFixture($fixture_data, $fixture_id) {
    

    $tmp_fixture_data = array();
    $tmp_fixture_data['fixture_id'] = $fixture_id;
    $tmp_fixture_data['sport_id'] = $fixture_data['Sport']['Id'];
    $tmp_fixture_data['league_id'] = $fixture_data['League']['Id'];
    $tmp_fixture_data['start_time'] = strtotime($fixture_data['StartDate']);
    $tmp_fixture_data['last_update'] = strtotime($fixture_data['LastUpdate']);
    $tmp_fixture_data['status'] = $fixture_data['Status'];
    foreach ($fixture_data['Participants'] as $kk => $vv) {
      if ($vv['Position'] == 1) {
        $tmp_fixture_data['home_id'] = $vv['Id'];
      }
      if ($vv['Position'] == 2) {
        $tmp_fixture_data['away_id'] = $vv['Id'];
      }
    }

    // 先取得賽事
    $return = LsportFixture::where("fixture_id",$fixture_id)->first();
    if ($return === false) {
      return false;
    }

    $fixture_data = $return;
    if ($fixture_data == null) {

      $tmp_fixture_data['fixture_id'] = $fixture_id;
      $return = LsportFixture::insert($tmp_fixture_data);
      if ($return === false) {
        return false; 
      }
    } else {
      // last_update
      $last_update = $fixture_data['last_update'];

      // 判斷更新時間 , 比較新才更新
      $return = LsportFixture::where("fixture_id",$fixture_id)
      ->where("last_update", "<", $last_update)
      ->update($tmp_fixture_data);
      if ($return === false) {
        return false; 
      }
    }
  }

  // update league , ONLY UPDATE
  protected function updateLivescore($data, $fixture_id) {

    return;
    $scoreboard = json_encode($data['Scoreboard'],true);
    $periods = json_encode($data['Periods'],true);
    $livescore_extradata = json_encode($data['LivescoreExtraData'],true);

    $count = LsportFixture::where("fixture_id",$fixture_id)->count();
    if ($count == 1) {
      $return = LsportFixture::where("fixture_id",$fixture_id)->update([
        "scoreboard" => $scoreboard,
        "periods" => $periods,
        "livescore_extradata" => $livescore_extradata
      ]);
      if ($return === false) {
        return false; 
      }
    }
    return true;
  }

  // update market & bet 
  protected function updateMarket($data, $sport_id, $fixture_id) {

    $priority = [
      154914 => [ // 棒球
            226 => ["priority" => "1", "cn" => "全场独赢", "tw" => "全場獨贏"],
            342 => ["priority" => "3", "cn" => "全场让分", "tw" => "全場讓分"],
            28 => ["priority" => "5", "cn" => "全场大小", "tw" => "全場大小"],
            51 => ["priority" => "7", "cn" => "全场单双", "tw" => "全場單雙"],
            235 => ["priority" => "2", "cn" => "前五局独赢", "tw" => "前五局獨贏"],
            281 => ["priority" => "4", "cn" => "前五局让分", "tw" => "前五局讓分"],
            236 => ["priority" => "6", "cn" => "前五局大小", "tw" => "前五局大小"],
            602 => ["priority" => "8", "cn" => "全场波胆", "tw" => "全场波膽"],
            1618 => ["priority" => "9", "cn" => "前五局独赢", "tw" => "前五局獨贏"],
        ],
        48242 => [ // 籃球
            226 => ["priority" => "101", "cn" => "全场独赢", "tw" => "全場獨贏"],
            63 => ["priority" => "102", "cn" => "上半场独赢", "tw" => "上半場獨贏"],
            342 => ["priority" => "103", "cn" => "全场让球", "tw" => "全場讓球"],
            53 => ["priority" => "104", "cn" => "上半场让球", "tw" => "上半場讓球"],
            28 => ["priority" => "105", "cn" => "全场大小", "tw" => "全場大小"],
            77 => ["priority" => "106", "cn" => "上半场大小", "tw" => "上半場大小"],
            51 => ["priority" => "107", "cn" => "全场单双", "tw" => "全場單雙"],
            62 => ["priority" => "108", "cn" => "上半场单双", "tw" => "上半場單雙"],
            202 => ["priority" => "109", "cn" => "第1节独赢", "tw" => "第1節獨贏"],
            64 => ["priority" => "110", "cn" => "第1节让分", "tw" => "第1節讓分"],
            21 => ["priority" => "111", "cn" => "第1节大小", "tw" => "第1節大小"],
            72 => ["priority" => "112", "cn" => "第1节单双", "tw" => "第1節單雙"],
            203 => ["priority" => "113", "cn" => "第2节独赢", "tw" => "第2節獨贏"],
            65 => ["priority" => "114", "cn" => "第2节让分", "tw" => "第2節讓分"],
            45 => ["priority" => "115", "cn" => "第2节大小", "tw" => "第2節大小"],
            73 => ["priority" => "116", "cn" => "第2节单双", "tw" => "第2節單雙"],
            204 => ["priority" => "117", "cn" => "第3节独赢", "tw" => "第3節獨贏"],
            66 => ["priority" => "118", "cn" => "第3节让分", "tw" => "第3節讓分"],
            46 => ["priority" => "119", "cn" => "第3节大小", "tw" => "第3節大小"],
            74 => ["priority" => "120", "cn" => "第3节单双", "tw" => "第3節單雙"],
            205 => ["priority" => "121", "cn" => "第4节独赢", "tw" => "第4節獨贏"],
            67 => ["priority" => "122", "cn" => "第4节让分", "tw" => "第4節讓分"],
            47 => ["priority" => "123", "cn" => "第4节大小", "tw" => "第4節大小"],
            75 => ["priority" => "124", "cn" => "第4节单双", "tw" => "第4節單雙"],
        ],
        6046 => [ // 足球
            1 => ["priority" => "201", "cn" => "全场独赢", "tw" => "全場獨贏"],
            41 => ["priority" => "202", "cn" => "上半场独赢", "tw" => "上半場獨贏"],
            3 => ["priority" => "203", "cn" => "全场让分", "tw" => "全場讓分"],
            64 => ["priority" => "204", "cn" => "上半场让分", "tw" => "上半場讓分"],
            2 => ["priority" => "205", "cn" => "全场大小", "tw" => "全場大小"],
            21 => ["priority" => "206", "cn" => "上半场大小", "tw" => "上半場大小"],
            72 => ["priority" => "207", "cn" => "上半场单双", "tw" => "上半場單雙"],
            5 => ["priority" => "208", "cn" => "全场单双", "tw" => "全場單雙"],
        ],
        35232 => [ // 冰球
            226 => ["priority" => "301", "cn" => "全场独赢", "tw" => "全場獨贏"],
            342 => ["priority" => "302", "cn" => "全场让球", "tw" => "全場讓球"],
            28 => ["priority" => "303", "cn" => "全场大小", "tw" => "全場大小"],
            51 => ["priority" => "304", "cn" => "全场单双", "tw" => "全場單雙"],
        ],
    ];

    $bet_name = [
        "1" => [
            "cn" => "主",
            "tw" => "主",
        ],
        "2" => [
            "cn" => "客",
            "tw" => "客",
        ],
        "Over" => [
            "cn" => "大",
            "tw" => "大",
        ],
        "Under" => [
            "cn" => "小",
            "tw" => "小",
        ],
        "Odd" => [
            "cn" => "单",
            "tw" => "單",
        ],
        "Even" => [
            "cn" => "双",
            "tw" => "雙",
        ],
        "X" => [
            "cn" => "平",
            "tw" => "平",
        ],
    ];

    foreach ($data as $k => $v) {
      $market_id = $v['Id'];
      $priority_data = $priority[$sport_id][$market_id];

      ///////////////////////

      $market_data = array();
      $market_data['market_id'] = $market_id;
      $market_data['name_en'] = $v['Name'];
      $market_data['main_line'] = "";
      if (isset($v['MainLine'])) {
        $market_data['main_line'] = $v['MainLine'];
      }

      $market_data['priority'] = $priority_data['priority'];
      $market_data['name_cn'] = $priority_data['cn'];
      $market_data['name_tw'] = $priority_data['tw'];
     
      ///////////////////////
      // 處理 market

      $count = LsportMarket::where("fixture_id",$fixture_id)
      ->where("market_id",$market_id)
      ->count();
      if ($count == 0) {
        // 新增
        $return = LsportMarket::where("fixture_id",$fixture_id)
        ->where("market_id",$market_id)
        ->insert($market_data);
        if ($return === false) {
          return false; 
        }
      } else {
        // 更新
        $return = LsportMarket::where("fixture_id",$fixture_id)
        ->where("market_id",$market_id)
        ->update($market_data);
        if ($return === false) {
          return false; 
        }
      }
     
      ///////////////////////
      // 處理market- bet
      $market_bet = $v['Bets'];
      foreach ($market_bet as $kk => $vv) {
        $market_bet_data = array();

        $market_bet_id = $vv['Id'];
        $last_update = strtotime($vv['LastUpdate']);

        $market_bet_data['fixture_id'] = $fixture_id;
        $market_bet_data['market_id'] = $market_id;
        $market_bet_data['bet_id'] = $market_bet_id;
        $market_bet_data['status'] = $vv['Status'];
        $market_bet_data['settlement'] = $vv['Settlement'];
        $market_bet_data['provder_bet_id'] = $vv['ProviderBetId'];
        $market_bet_data['start_price'] = $vv['StartPrice'];
        $market_bet_data['price'] = $vv['Price'];
        $market_bet_data['price_hk'] = $vv['PriceHK'];
        $market_bet_data['last_update'] = $last_update;

        $market_bet_data['base_line'] = "";
        if (isset($vv['BaseLine'])) {
          $market_bet_data['base_line'] = $vv['BaseLine'];
        }
        $market_bet_data['line'] = "";
        if (isset($vv['Line'])) {
          $market_bet_data['line'] = $vv['Line'];
        }

        $market_bet_data['name_en'] = $vv['Name'];
        if (isset($bet_name[$vv['Name']])) {
          $bet_name_data = $bet_name[$vv['Name']];
          $market_bet_data['name_cn'] = $bet_name_data['cn'];
          $market_bet_data['name_tw'] = $bet_name_data['tw'];
        } else {
          $market_bet_data['name_cn'] = $vv['Name'];
          $market_bet_data['name_tw'] = $vv['Name'];
        }

        $count = LsportMarketBet::where("fixture_id",$fixture_id)
        ->where("market_id",$market_id)
        ->where("bet_id", $market_bet_id)
        ->count();
        if ($count == 0) {
          // 新增
          $return = LsportMarketBet::where("fixture_id",$fixture_id)
          ->where("market_id",$market_id)
          ->where("bet_id", $market_bet_id)
          ->insert($market_bet_data);
          if ($return === false) {
            return false; 
          }
        } else {
          // 更新
          $return = LsportMarketBet::where("fixture_id",$fixture_id)
          ->where("market_id",$market_id)
          ->where("bet_id", $market_bet_id)
          ->where("last_update", "<", $last_update)
          ->update($market_bet_data);
          if ($return === false) {
            return false; 
          }
        }
        
        
      }

    }
  }

  //////////////////////////////////////////////////

  // send Request to Lsport - Prematch
  protected function sendLsportPrematchAPI($url,$extra_data=array()) {

    $LSPORT_USERNAME = env('LSPORT_USERNAME');
    $LSPORT_PASSWORD = env('LSPORT_PASSWORD');
    $LSPORT_PACKAGEID = env('LSPORT_PACKAGEID_PREMATCH'); // PREMATCH

    $requestData = [
      "UserName" => $LSPORT_USERNAME,
      "Password" => $LSPORT_PASSWORD,
      "PackageId" => $LSPORT_PACKAGEID
    ];

    foreach ($extra_data as $k => $v) {
      $requestData[$k] = $v; 
    }
    
    $response = Http::withHeaders([
      'Content-Type' => 'application/json',
    ])->post($url, $requestData);

    // JSON decode
    $list = $response->json();

    return $list;
  }

  // send Request to Lsport - Inplay
  protected function sendLsportInplayAPI($url,$extra_data=array()) {

    $LSPORT_USERNAME = env('LSPORT_USERNAME');
    $LSPORT_PASSWORD = env('LSPORT_PASSWORD');
    $LSPORT_PACKAGEID = env('LSPORT_PACKAGEID_INPLAY'); // INPLAY

    $requestData = [
      "UserName" => $LSPORT_USERNAME,
      "Password" => $LSPORT_PASSWORD,
      "PackageId" => $LSPORT_PACKAGEID
    ];

    foreach ($extra_data as $k => $v) {
      $requestData[$k] = $v; 
    }
    
    $response = Http::withHeaders([
      'Content-Type' => 'application/json',
    ])->post($url, $requestData);

    // JSON decode
    $list = $response->json();
    return $list;
  }
    
  // curl 類
  protected function api_curl($url,$rawData) {
    $ch = curl_init();
        
    // 设置 cURL 选项
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, 1); // 设置为 POST 请求
    curl_setopt($ch, CURLOPT_POSTFIELDS, $rawData); // 设置原始请求体数据
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // 设置请求头，如果数据是 JSON 格式的话
        
    $output = curl_exec($ch);
    curl_close($ch);
        
    return $output;
  }
}

