<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Agent;
use App\Models\Player;

class AgentPlayerController extends Controller {

  protected $current = "agent_player";

  // 狀態值
  protected $status = array("暫停","啟用中");
    
  // 首頁
  public function index(Request $request) {
    	
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    $this->assign("search",$input);

    //////////////////

    // 語系
    $currency_type = trans('admin.currency_type');
    $this->assign("currency_type",$currency_type);

    $merchant_type = trans('admin.merchant_type');
    $this->assign("merchant_type",$merchant_type);

    // where condition
    $condition = array();
    if (isset($input['account'])) {
      $return = Player::where("account","LIKE",$input['account']."%")->orderBy("id","ASC")->page($this->per_page);
    } else {
      $return = Player::orderBy("id","ASC")->page($this->per_page);
    }

    $this->assign("paginator",$return);
    $data = $return->items();

    // 取得用戶資料
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "01");
      return redirect('/index');
    }
    
    foreach ($data as $k => $v) {

      // 取得Agent 資料
      $tmp = Agent::where("id",$v['agent_id'])->fetch();

      $data[$k]['agent_account'] = $tmp['account'];
      $data[$k]['agent_email'] = $tmp['email'];
      $data[$k]['is_beta'] = $tmp['is_beta'];

      $data[$k]['currency_name'] = $currency_type[$v['currency_type']];
      $data[$k]['merchant_name'] = $merchant_type[$v['merchant_type']];
      $data[$k]['status_name'] = $this->status[$v['status']];
    }

    $this->assign("data",$data);

    return view('agent_player.index',$this->data);
  }

  // 取得玩家資料
  public function get_player(Request $request) {

    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    //////////////////

    $return = Player::where("id",$input['id'])->fetch();
    if ($return === false) {
      $this->ajaxError("error_ajax_get_player_" . "01");
    }

    $this->ajaxSuccess("success_ajax_get_player_" . "01",$return);
  }

  // 編輯後台用戶
  public function edit_player(Request $request) {
    	
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    //////////////////

    $return = Player::where("id",$input['id'])->first();
    if ($return === false) {
      $this->ajaxError("error_ajax_edit_player_" . "01");
    }

    $tmp = array();
    $tmp['account'] = $return['account'];
    $tmp['currency_type'] = $return['currency_type'];
    $tmp['merchant_type'] = $return['merchant_type'];
    $tmp['status'] = $return['status'];
    $before_data = $tmp;

    //////////////////////////////////////////

    $tmp = array();
    $tmp['account'] = $input['account'];
    $tmp['currency_type'] = $input['currency_type'];
    $tmp['merchant_type'] = $input['merchant_type'];
    $tmp['status'] = $input['status'];
  
    $return = Player::where("id",$input['id'])->update($tmp);
    if ($return === false) {
      $this->ajaxError("error_ajax_edit_player_" . "02");
    }

    // 操作紀錄
    $this->operationLogs("edit_player", $before_data, $tmp);

    $this->ajaxSuccess("success_ajax_edit_player_" . "01");
  }
    
}

