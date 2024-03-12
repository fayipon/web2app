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


class TranslateGoogleController extends Controller {

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

  public function index(Request $request) {
    return view('translate_google.index',$this->data);
  }

  // Sport
  public function sport(Request $request) {

    $this->crawler("translate_sport","translate/sport");

    $return = LsportSport::where("name_tw",null)->get();
    if ($return === false) {
      dd("return => false");
    }
    if (count($return) == 0) {
      dd("retun => null");
    }

    $list = $return;
    foreach ($list as $k => $v) {
      $id = $v['id'];
      $en = $v['name_en'];
      $data = $this->translate($en);
      
      echo "id => " . $id . "<br>";
      echo "name_en => " . $en . "<br>";
      echo "name_cn => " . $data['zh-CN'] . "<br>";
      echo "name_tw => " . $data['zh-TW'] . "<br><br>";

      LsportSport::where("id",$id)->update([
        "name_cn" => $data['zh-CN'],
        "name_tw" => $data['zh-TW']
      ]);
    }

    dd("success");

  }
  
  // League
  public function league(Request $request) {

    $this->crawler("translate_league","translate/league");

    $return = LsportLeague::where("name_tw",null)->get();
    if ($return === false) {
      dd("return => false");
    }
    if (count($return) == 0) {
      dd("retun => null");
    }

    $list = $return;
    foreach ($list as $k => $v) {
      $id = $v['id'];
      $en = $v['name_en'];
      $data = $this->translate($en);

      echo "id => " . $id . "<br>";
      echo "name_en => " . $en . "<br>";
      echo "name_cn => " . $data['zh-CN'] . "<br>";
      echo "name_tw => " . $data['zh-TW'] . "<br><br>";

      LsportLeague::where("id",$id)->update([
        "name_cn" => $data['zh-CN'],
        "name_tw" => $data['zh-TW']
      ]);
    }

    dd("success");
  }
  
  // team
  public function team(Request $request) {
    
    $this->crawler("translate_team","translate/team");

    $return = LsportTeam::where("name_tw",null)->get();
    if ($return === false) {
      dd("return => false");
    }
    if (count($return) == 0) {
      dd("retun => null");
    }

    $list = $return;
    foreach ($list as $k => $v) {
      $id = $v['id'];
      $en = $v['name_en'];
      $data = $this->translate($en);

      echo "id => " . $id . "<br>";
      echo "name_en => " . $en . "<br>";
      echo "name_cn => " . $data['zh-CN'] . "<br>";
      echo "name_tw => " . $data['zh-TW'] . "<br><br>";

      LsportTeam::where("id",$id)->update([
        "name_cn" => $data['zh-CN'],
        "name_tw" => $data['zh-TW']
      ]);
    }

    dd("success");
  }
  


  ////////////////////////////////////////

  // send Request to Lsport
  protected function translate($text) {

    $apiKey = 'AIzaSyDj66ewyyjPXA3s1-lpMF3mkZ9iuOdmujk'; 

    $targetLanguages = ['zh-CN', 'zh-TW']; 
    
    $translations = [];
    
    foreach ($targetLanguages as $targetLanguage) {
      // 构建API请求
      $url = 'https://translation.googleapis.com/language/translate/v2?key=' . $apiKey;
      $data = [
          'q' => $text,
          'target' => $targetLanguage
      ];

      $options = [
          'http' => [
              'header' => "Content-type: application/x-www-form-urlencoded\r\n",
              'method' => 'POST',
              'content' => http_build_query($data)
          ]
      ];

      $context = stream_context_create($options);
      $response = file_get_contents($url, false, $context);

      if ($response !== false) {
          // 解析响应
          $responseData = json_decode($response, true);
          
          if (isset($responseData['data']['translations'][0]['translatedText'])) {
              $translation = $responseData['data']['translations'][0]['translatedText'];
              $translations[$targetLanguage] = $translation;
          }
      }
    }

    return $translations;

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

