<?php
/*

  Golang Socket Service , make broadcast message

*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\CrawlerScript;
use App\Models\LsportSport;
use App\Models\LsportFixture;
use App\Models\LsportLeague;
use App\Models\LsportMarket;
use App\Models\LsportMarketBet;
use App\Models\LsportTeam;


class TranslateController extends Controller {

  protected $lang_setting = [
    1 => 'en', // 英文
    18 => 'vi', // 越文
    19 => 'th', // 泰文
    21 => 'in', // 印尼
    5 => 'jp', // 日文
    17 => 'ko', // 韓文
    13 => 'cn', // 簡體中文
    16 => 'tw', // 繁體中文
  ];

  // Sport
  public function sport(Request $request) {

    $this->crawler("translate_sport","translate/sport");

    $return = LsportSport::where("name_tw",null)->get();
    if ($return === false) dd("success");
    if (count($return) == 0) dd("null");

    $ids = array();
    foreach ($return as $k => $v) {
      $ids[] = $v['sport_id'];
    }
    $return = $this->translate("SportIds",$ids);
    $data = $return['Body']['Sports'];

    foreach ($data as $k => $v) {
      $sport_id = $k;
      foreach ($v as $kk => $vv) {
        $lang = "name_" . $this->lang_setting[$vv['LanguageId']];
        $value = $vv['Value'];
        LsportSport::where("sport_id",$sport_id)->update([
          $lang => $value
        ]);
      }
    }

    dd("success");
  }
  
  // League
  public function league(Request $request) {

    $this->crawler("translate_league","translate/league");

    $return = LsportLeague::where("name_tw",null)->get();
    if ($return === false) dd("success");
    if (count($return) == 0) dd("null");

    $ids = array();
    foreach ($return as $k => $v) {
      $ids[] = $v['league_id'];
    }
    
    $return = $this->translate("LeagueIds",$ids);
    $data = $return['Body']['Leagues'];

    foreach ($data as $k => $v) {
      $sport_id = $k;
      foreach ($v as $kk => $vv) {
        $lang = "name_" . $this->lang_setting[$vv['LanguageId']];
        $value = $vv['Value'];
        LsportLeague::where("league_id",$sport_id)->update([
          $lang => $value
        ]);
      }
    }

    dd("success");
  }
  
  // team
  public function team(Request $request) {
    
    $this->crawler("translate_team","translate/team");

    $return = LsportTeam::where("name_tw",null)->get();
    if ($return === false) dd("success");
    if (count($return) == 0) dd("null");

    $ids = array();
    foreach ($return as $k => $v) {
      $ids[] = $v['team_id'];
    }
    
    $return = $this->translate("ParticipantIds",$ids);
    $data = $return['Body']['Participants'];

    foreach ($data as $k => $v) {
      $sport_id = $k;
      foreach ($v as $kk => $vv) {
        $lang = "name_" . $this->lang_setting[$vv['LanguageId']];
        $value = $vv['Value'];
        LsportTeam::where("team_id",$sport_id)->update([
          $lang => $value
        ]);
      }
    }

    dd("success");
  }
  


  ////////////////////////////////////////

  // send Request to Lsport
  protected function translate($key,$array) {

    $LSPORT_USERNAME = env('LSPORT_USERNAME');
    $LSPORT_PASSWORD = env('LSPORT_PASSWORD');
    $LSPORT_PACKAGEID = env('LSPORT_PACKAGEID_PREMATCH');

    $url = "https://stm-api.lsports.eu/Translation/Get";
    
    $data = [
      "UserName" => $LSPORT_USERNAME,
      "Password" => $LSPORT_PASSWORD,
      "PackageId" => $LSPORT_PACKAGEID,
      "Languages" => [1,5,13,16,17,18,19,21]
    ];

    $data[$key] = $array;

    $rawData = json_encode($data,true);
    $tmp = $this->api_curl($url,$rawData);
    $json = json_decode($tmp,true);
    return $json;
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

}

