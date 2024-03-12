<?php
/******************

Lsport Notice 轉公告

******************/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

use App\Models\ClientMarquee;
use App\Models\LsportSport;
use App\Models\LsportLeague;
use App\Models\LsportFixture;
use App\Models\LsportTeam;
use App\Models\LsportRisk;

class LsportRiskController extends Controller {


  // 開發用, 用於補risk 資料
  // 將所有未結束比賽的資料, 補risk資料
  public function index(Request $request) {

    $input = $this->getRequest($request);

    //////////////////////////////////////////

    // 取得當前賽事 , status in 1,2,9
    $return = LsportFixture::whereIn("status",[1,2,9])->get();
    if ($return === false) {
      dd($return);
    }
    
    $fixture_list = $return;

    foreach ($fixture_list as $k => $v) {
      $sport_id = $v['sport_id'];
      $fixture_id = $v['fixture_id'];
      $league_id = $v['league_id'];

      $data = "[]";

      $count = LsportRisk::where("sport_id",$sport_id)
      ->where("league_id",$league_id)
      ->where("fixture_id",$fixture_id)
      ->count();

      if ($count == 0) {
        
        $default_fixture_status = $this->system_config['default_fixture_status'];

        LsportRisk::insert([
          "sport_id" => $sport_id,
          "league_id" => $league_id,
          "fixture_id" => $fixture_id,
          "data" => "[]",
          "status" => $default_fixture_status,
          "update_at" => time()
        ]);
      }
    
    }

    dd("success ");

  }

}

