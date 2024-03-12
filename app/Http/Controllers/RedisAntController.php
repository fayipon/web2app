<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;

use App\Models\Agent;
use App\Models\CrawlerScript;

use App\Models\LsportEvents;


class RedisAntController extends Controller {

  // 查看redis
  public function ant_redis(Request $request) {

    $this->crawler("redis_ant_quest","redis/ant_quest");

    $input = $this->getRequest($request);

    //////////////////////////////////////
    $redis = Redis::connection(); 

    // 從 Redis 讀取資料筆數
    
    $key = "lsport_inplay";
    $length[$key] = Redis::llen($key);

    $key = "lsport_prematch";
    $length[$key] = Redis::llen($key);
    
    $key = "broadcast";
    $length[$key] = Redis::llen($key);

    $key = "risk_config";
    $length[$key] = Redis::hlen($key);

    // 緩存賽事資料
    $key = "lsport_match_list";
    $length[$key] = Redis::hlen($key);

    // 緩存賽事資料
    $key = "lsport_risk_match_list";
    $length[$key] = Redis::hlen($key);
    
    // 輸出所有資料
    dd($length);

  }

  // 測試用
  public function foolball_tw(Request $request) {
    $key = "6046_tw";
    $data = Redis::hget('lsport_match_list', $key);

    dd($data);
  }

  // 從db 重發一次收到的event
  public function lsport_queue(Request $request) {

    $input = $this->getRequest($request);

    //////////////////////////////////////

    $id = $input['id'];
    $return = LsportEvents::where("id",$id)->first();
    if ($return === false) {
      dd($input,"ERROR_01");
    }

    $jsonString = $return['data'];
    
    $type = $input['type'];
    
    // 使用 lpush 将 JSON 字符串推送到 Redis 列表
    Redis::lpush('lsport_'.$type, $jsonString);

  }

  // 填入假資料測試用
  public function lsport_prematch_test(Request $request) {

    $jsonString = '{"Header":{"Type":1},"Body":{"Events":[{"Fixture":{"FixtureExtraData":[{"Name":"WithInPlay","Value":"true"},{"Name":"WithLivescore","Value":"true"},{"Name":"NumberOfPeriods","Value":"9"}],"LastUpdate":"2023-10-04T11:07:58.557745Z","League":{"Id":5540,"Name":"CPBL - Regular"},"Location":{"Id":104,"Name":"Taiwan"},"Participants":[{"Id":327587,"Name":"Uni Lions","Position":"1"},{"Id":51994905,"Name":"Fubon Guardians","Position":"2"}],"Sport":{"Id":154914,"Name":"Baseball"},"StartDate":"2023-10-04T10:35:00Z","Status":5,"Subscription":{"Status":1,"Type":2}},"FixtureId":11443563,"Livescore":null,"Markets":null}]}}';
    // 使用 lpush 将 JSON 字符串推送到 Redis 列表
    Redis::lpush('lsport_prematch', $jsonString);

    $jsonString = '{"Header":{"Type":1,"MsgSeq":4,"MsgGuid":"6095b7a4-ccab-4a0d-8a4c-7752799542f1","CreationDate":"2023-10-04T12:17:26.8328678Z","ServerTimestamp":1696421846832},"Body":{"Events":[{"Fixture":{"FixtureExtraData":[{"Name":"WithLivescore","Value":"true"},{"Name":"WithInPlay","Value":"true"},{"Name":"CancellationReason","Value":"Event Cancelled"},{"Name":"NumberOfPeriods","Value":"9"}],"LastUpdate":"2023-10-04T12:17:25.818099Z","League":{"Id":5540,"Name":"CPBL - Regular"},"Location":{"Id":104,"Name":"Taiwan"},"Participants":[{"Id":327587,"Name":"Uni Lions","Position":"1"},{"Id":51994905,"Name":"Fubon Guardians","Position":"2"}],"Sport":{"Id":154914,"Name":"Baseball"},"StartDate":"2023-10-04T10:35:00Z","Status":4,"Subscription":{"Status":1,"Type":1}},"FixtureId":11443563,"Livescore":null,"Markets":null}]}}';
    // 使用 lpush 将 JSON 字符串推送到 Redis 列表
    Redis::lpush('lsport_prematch', $jsonString);
  }

  // 填入假資料測試用
  public function lsport_inplay_test(Request $request) {

    $jsonString = '{"Header":{"Type":2,"MsgSeq":201,"MsgGuid":"f6788531-28b8-4de0-a8f4-5bc228286202","CreationDate":"2023-09-21T11:00:15.1391711Z","ServerTimestamp":1695294015139},"Body":{"Events":[{"Fixture":{"LastUpdate":"2023-09-21T11:00:15.1391711Z","League":null,"Location":null,"Participants":[{"Id":205814,"Name":"Tokyo Yakult Swallows","Position":"1"},{"Id":205812,"Name":"Chunichi Dragons","Position":"2"}],"Sport":{"Id":154914,"Name":"Baseball"},"Subscription":null},"FixtureId":11403183,"Livescore":{"LivescoreExtraData":[{"Name":"Strikes","Value":"2"},{"Name":"Turn","Value":"2"},{"Name":"Outs","Value":"2"},{"Name":"Balls","Value":"1"},{"Name":"Bases","Value":"1/1/0"}],"Periods":[{"Incidents":null,"IsConfirmed":true,"IsFinished":true,"Results":[{"Position":"1","Value":"0"},{"Position":"2","Value":"0"}],"SequenceNumber":1,"SubPeriods":null,"Type":1},{"Incidents":[{"IncidentType":27,"ParticipantPosition":"2","Period":2,"Results":[{"Position":"1","Value":"0"},{"Position":"2","Value":"2"}],"Seconds":-1}],"IsConfirmed":true,"IsFinished":true,"Results":[{"Position":"1","Value":"0"},{"Position":"2","Value":"2"}],"SequenceNumber":2,"SubPeriods":null,"Type":2},{"Incidents":[{"IncidentType":27,"ParticipantPosition":"1","Period":3,"Results":[{"Position":"1","Value":"1"},{"Position":"2","Value":"2"}],"Seconds":-1},{"IncidentType":27,"ParticipantPosition":"1","Period":3,"Results":[{"Position":"1","Value":"3"},{"Position":"2","Value":"2"}],"Seconds":-1}],"IsConfirmed":true,"IsFinished":true,"Results":[{"Position":"1","Value":"3"},{"Position":"2","Value":"0"}],"SequenceNumber":3,"SubPeriods":null,"Type":3},{"Incidents":[{"IncidentType":27,"ParticipantPosition":"2","Period":4,"Results":[{"Position":"1","Value":"3"},{"Position":"2","Value":"3"}],"Seconds":-1},{"IncidentType":27,"ParticipantPosition":"1","Period":4,"Results":[{"Position":"1","Value":"7"},{"Position":"2","Value":"3"}],"Seconds":-1}],"IsConfirmed":true,"IsFinished":true,"Results":[{"Position":"1","Value":"4"},{"Position":"2","Value":"1"}],"SequenceNumber":4,"SubPeriods":null,"Type":4},{"Incidents":null,"IsConfirmed":true,"IsFinished":true,"Results":[{"Position":"1","Value":"0"},{"Position":"2","Value":"0"}],"SequenceNumber":5,"SubPeriods":null,"Type":5},{"Incidents":null,"IsConfirmed":true,"IsFinished":false,"Results":[{"Position":"1","Value":"0"},{"Position":"2","Value":"0"}],"SequenceNumber":6,"SubPeriods":null,"Type":6}],"Scoreboard":{"CurrentPeriod":6,"Results":[{"Position":"1","Value":"7"},{"Position":"2","Value":"3"}],"Status":2,"Time":"-1"}},"Markets":null}]}}';
    // 使用 lpush 将 JSON 字符串推送到 Redis 列表
    Redis::lpush('lsport_inplay', $jsonString);
  }

  // 填入假資料測試用
  public function delay_order(Request $request) {

    $input = $this->getRequest($request);

    $player = $input['player'];
    $order = $input['order'];

    $jsonString = '{"action":"delay_order","player_id":' . $player . ',"order_id":' . $order . ',"status":2}';
    // 使用 lpush 将 JSON 字符串推送到 Redis 列表
    Redis::lpush('broadcast', $jsonString);
  }


  // 填入假資料測試用
  public function risk(Request $request) {
    
    $input = $this->getRequest($request);

    $sport_id = $input['sport'];
    $market_id = $input['market'];
    $pos = $input['pos'];

    $jsonString = '{"action":"risk_config","sport_id":'.$sport_id.', "market_id":'.$market_id.',"pos":'.$pos.',"status":1}';
    // 使用 lpush 将 JSON 字符串推送到 Redis 列表
    Redis::lpush('broadcast', $jsonString);
  }

  // redis 清空
  public function clean() {
    
    Redis::del('risk_config');
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

