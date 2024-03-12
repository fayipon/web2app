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
use App\Models\LsportNotice;

class LsportNoticeController extends Controller {

  public function index(Request $request) {

    $input = $this->getRequest($request);

    //////////////////////////////////////////

    $return = LsportNotice::where("status",0)->get();
    if ($return === false) {
      dd($return);
    }

    $notice_list = $return;

    foreach ($notice_list as $k => $v) {

      $notice_id = $v['id'];
      $sport_id = $v['sport_id'];
      $league_id = $v['league_id'];
      $fixture_id = $v['fixture_id'];
      $notice_type = $v['type'];
      $agent_lang = 'tw';

      // sport -----
      $sport_name = LsportSport::getName(['sport_id'=>$sport_id, 'api_lang'=>$agent_lang]);

      // league -----
      $league_name = LsportLeague::getName(['league_id'=>$league_id, 'api_lang'=>$agent_lang]);

      // fixture -----
      $return = LsportFixture::where('fixture_id', $fixture_id)->fetch();
      if ($return === false) {
          $this->ApiError("02");
      }

      $fixture = $return;
      $fixture_start_time = $fixture['start_time'];
      $home_team_id = $fixture['home_id'];
      $away_team_id = $fixture['away_id'];

      // team: home team -----
      $home_team_name = LsportTeam::getName(['team_id'=>$home_team_id, 'api_lang'=>$agent_lang]);

      // team: away team -----
      $away_team_name = LsportTeam::getName(['team_id'=>$away_team_id, 'api_lang'=>$agent_lang]);

      // 處理 Duplication of <FIXTURE_ID> 的翻譯問題
      if (strpos($notice_type, 'Duplication of') !== false) {
          $arr_notice_type = explode(' ', $notice_type);
          $notice_type = "{$arr_notice_type[0]} {$arr_notice_type[1]}";
          $fixture_id = $arr_notice_type[2];
      }

      $title = trans('notice.fixture_cancellation_reasons.'.'title:'.$notice_type, [
          'sport_name' => $sport_name,
          'league_name' => $league_name,
      ]);
      
      $fixture_start_time = date(
          trans('notice.fixture_cancellation_reasons.date_time_to_hour'),
          $fixture_start_time
      );

      $context = trans('notice.fixture_cancellation_reasons.'.$notice_type, [
          'sport_name' => $sport_name,
          'league_name' => $league_name,
          'fixture_start_time' => $fixture_start_time,
          'home_team_name' => $home_team_name,
          'away_team_name' => $away_team_name,
          'fixture_id' => $fixture_id,
      ]);


      ClientMarquee::insert([
          "sport_id" => $sport_id,
          "title" => $title,
          "marquee" => $context,
          "status" => 1,
          "create_time" => date("Y-m-d H:i:s"),
      ]);

      LsportNotice::where("id",$notice_id)->update([
        "status" => 1
      ]);


    }

  }

}

