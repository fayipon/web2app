<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;

use App\Models\LsportSport;
use App\Models\LsportTeam;
use App\Models\LsportFixture;
use App\Models\LsportLeague;
use App\Models\LsportMarket;
use App\Models\LsportMarketBet;

use App\Models\GameRisk;
use App\Models\LsportRisk;

class SportRiskController extends Controller {

  protected $current = "sport_risk";
    
  // 首頁
  public function index(Request $request) {
    	
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    $this->assign("search",$input);
    
    return view('sport_risk.index',$this->data);
  }

  // 原始號源
  public function MatchIndex(Request $request) {

   // $this->isLogin();

   // $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    //////////////////
    $agent_lang = "tw";
    $sport_id = $input['sport_id'];

    ////////////////////////////////////////
    $key = $sport_id . "_" . $agent_lang;

    ////////////////////////////////////////

    $data = Redis::hget('lsport_risk_match_list', $key);
    $data = json_decode($data,true);

    foreach ($data as $k => $v) {
      foreach ($v as $sport_id => $sport) {
        foreach ($sport['list'] as $league_id => $league) {
          foreach ($league['list'] as $fixture_id => $fixture) {

            $return = LsportRisk::where("fixture_id",$fixture_id)->first();
            $risk_data = json_decode($return['data'],true);

            // 部份比賽, 沒有market
            if (!isset($fixture['list'])) {
              continue;
            }

            // 填入risk資料
            foreach ($fixture['list'] as $market_id => $market) {
              if (isset($data[$k][$sport_id]['list'][$league_id]['list'][$fixture_id]['list'][$market_id])) {
                $default_risk_data = [];
                if (isset($risk_data[$market_id])) {
                  $default_risk_data = $risk_data[$market_id];
                }
                $data[$k][$sport_id]['list'][$league_id]['list'][$fixture_id]['list'][$market_id]['risk'] = $default_risk_data;
              }
            }

          }
        }
      }
    }

    // gzip
    if (!isset($input['is_gzip']) || ($input['is_gzip']==1)) {  // 方便測試觀察輸出可以開關gzip
        $data = $this->gzip($data);
        $this->ApiSuccess($data, "01", true);
    } else {
        $this->ApiSuccess($data, "01", false);
    }
  }
  
  // 球種列表
  public function MatchSport(Request $request) {
      
    	$input = $this->getRequest($request);

        //---------------------------------
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

        ///////////////////////////////////

        $this->ApiSuccess($data, "01");

  }

  
  /////////////////////////////////
  // 以下是game risk 版本 已棄用

  // 設定config
  protected function setRedis($sport_id, $league_id, $fixture_id, $market_id, $updated_at,$pos) {

    // 主鍵名稱
    $mainKey = 'risk_config';
    $key = $sport_id . "_" . $match . "_" . $priority;
    $value = [
      "league_id" => $league_id,
      "fixture_id" => $fixture_id,
      "market_id" => $market_id,
      "pos" => $pos,
      "updated_at" => $updated_at
    ];
    $value = json_encode($value);
    
    Redis::hset($mainKey, $key, $value);
    //Redis::expire($mainKey, 600);

    // 同步數據庫
    $return = GameRisk::where("game_id",$game)->where("fixture_id",$fixture_id)->where("market_id",$market_id)->update([
      "data" => $pos
    ]);

  }

  /////////////////////////////////
  // 以下是lsport risk 版本

  // 審核賽事
  public function setFixtureEnable(Request $request) {

    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    //////////////////

    $fixture_id = $input['fixture_id'];
    $status     = $input['status'];
    
    // 更新
    $return = LsportRisk::where("fixture_id",$fixture_id)->update([
      "status" => $status
    ]);
    if ($return === false) {
      $this->ajaxError("error_ajax_fixture_enable_" . "01");
    }

    $this->ajaxSuccess("success_ajax_fixture_enable_" . "01", $return);

  }

  // 設定風控賠率
  public function setRisk(Request $request) {
    
    $input = $this->getRequest($request);
		$session = Session::all();

    //////////////////

    $fixture_id = $input['fixture_id'];
    $risk_data  = $input['risk_data'];

    //////////////////

    // encode後 更新
    $return = LsportRisk::where("fixture_id",$fixture_id)->update([
      "data" => $input['risk_data']
    ]);
    if ($return === false) {
      $this->ajaxError("error_ajax_set_risk_" . "02");
    }

    $this->ajaxSuccess("success_ajax_set_risk_" . "01");

  }

  /////////////////////////////////
  protected function gzip($data) {

      $data = json_encode($data, true);
      $compressedData = gzcompress($data);  // 使用 gzcompress() 函數進行壓縮
      $base64Data = base64_encode($compressedData);  // 使用 base64_encode() 函數進行 base64 編碼

      return $base64Data;
  }

  protected function ApiSuccess($data, $message, $is_gzip = false) {

    $tmp = array();
    $tmp['status'] = 1;
    $tmp['data'] = $data;
    $tmp['message'] = $message;
    $tmp['gzip'] = ($is_gzip == true);
    
    echo json_encode($tmp, true);
    exit();
  }

  protected function ApiError($message) {
      
      $tmp = array();
      $tmp['status'] = 0;
      $tmp['data'] = null;
      $tmp['message'] = $message;
      $tmp['gzip'] = 0;
      
      echo json_encode($tmp, true);
      exit();
  }

}

