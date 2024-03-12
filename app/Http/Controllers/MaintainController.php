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
use App\Models\LsportEvents;

class MaintainController extends Controller {

  public function LsportEvents(Request $request) {

    $this->crawler("maintain_lsport_events","maintain/lsport_events");

    /////////////////////////////////////
    // 取得日期
    $timestamp = time() - 7 * 24 * 60 * 60;

    LsportEvents::where('create_time', "<=", $timestamp)
    ->skip(0)
    ->take(10000) // 單次刪除上限
    ->delete();

  }

  public function GameOrder(Request $request) {

    $this->crawler("maintain_game_order","maintain/game_order");

    /////////////////////////////////////
    // 取得日期
    $timestamp = time() - 90 * 24 * 60 * 60;

    GameOrder::where('create_time', "<=", $timestamp)
    ->skip(0)
    ->take(10000) // 單次刪除上限
    ->delete();

  }

  public function PlayerBalanceLogs(Request $request) {

    $this->crawler("maintain_balance_logs","maintain/balance_logs");

    /////////////////////////////////////
    // 取得日期
    $timestamp = time() - 7 * 24 * 60 * 60;

    PlayerBalanceLogs::where('create_time', "<=", $timestamp)
    ->skip(0)
    ->take(10000) // 單次刪除上限
    ->delete();

  }

  public function LsportFixture(Request $request) {

    $this->crawler("maintain_lsport_fixture","maintain/lsport_fixture");

    /////////////////////////////////////
    // 取得日期
    $timestamp = time() - 30 * 24 * 60 * 60;

    // 先刪fixture
    $return = LsportFixture::where("start_time","<=",$timestamp)->delete();
    $fixture_data = $return;
    foreach ($fixture_data as $k => $v) {
      $fixture_id = $v['fixture_id'];

      // 再刪market 
      $return = LsportMarket::where("fixture_id",$fixture_id)->delete();
      
      // 再刪market bet 
      $return = LsportMarketBet::where("fixture_id",$fixture_id)->delete();
      
    }
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

}

