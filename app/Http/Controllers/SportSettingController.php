<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;

use App\Models\LsportSport;
use App\Models\LsportMarket;
use App\Models\SystemConfig;

class SportSettingController extends Controller {

  protected $current = "sport_setting";

    
  // 首頁
  public function index(Request $request) {
    	
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();


    if (!isset($input['status'])) {
      $status = 'early';
      $input['status'] = 'early';
    } else {
      $status = $input['status'];
    }

    if (!isset($input['sport_id'])) {
      $sport_id = '6046';
      $input['sport_id'] = '6046';
    } else {
      $sport_id = $input['sport_id'];
    }

    $this->assign("search",$input);
    //////////////////////////

    // 取得體育
    $return = LsportSport::where("status",1)->get();
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "01");
    }

    $this->assign("sport_list",$return);

    ///////////////////////////
    // 取得配置
    $default_market_bet_llimit = json_decode($this->system_config['default_market_bet_llimit'], true);

    $data = array();
    foreach ($default_market_bet_llimit[$status][$sport_id] as $k => $v) {
      $market_id = $k;

      $return = LsportMarket::where("market_id",$market_id)->first();
      if ($return === false) {
        $this->error(__CLASS__, __FUNCTION__, "02");
      }
      $tmp = array();
      $tmp['status'] = $status;
      $tmp['sport_id'] = $sport_id;
      $tmp['market_id'] = $k;
      $tmp['market_name'] = $return['name_tw'];
      $tmp['setting'] = $v;

      $data[] = $tmp;
    }
    
    $this->assign("data",$data);

    return view('sport_setting.index',$this->data);
  }

  // 編輯
  public function edit(Request $request) {
    	
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    // 取得配置
    $default_market_bet_llimit = json_decode($this->system_config['default_market_bet_llimit'], true);

    $default_market_bet_llimit[$input['status']][$input['sport_id']][$input['market_id']] = $input['setting'];

    $json = json_encode($default_market_bet_llimit);

    $return = SystemConfig::where("name","default_market_bet_llimit")->update([
      "value" => $json
    ]);

    $this->ajaxSuccess("success_ajax_edit_sport_setting_01",$return);

  }

}

