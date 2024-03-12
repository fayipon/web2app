<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use DB;
use App\Models\Agent;
use App\Models\AdminPermission;

class AgentUserController extends Controller {

  protected $current = "agent_user";

  // 狀態值
  protected $status = ["暫停","啟用中"];
    
  // 首頁
  public function index(Request $request) {
    	
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    $this->assign("search",$input);
    
    //////////////////
    // where condition
    $condition = array();
    if (isset($input['account'])) {
      $return = Agent::where("account","LIKE",$input['account']."%")->orderBy("id","ASC")->page($this->per_page);
    } else {
      $return = Agent::orderBy("id","ASC")->page($this->per_page);
    }

    // 取得用戶資料
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "01");
      return redirect('/index');
    }

    $this->assign("paginator",$return);
    $data = $return->items();

    // 語系
    $currency_type = trans('admin.currency_type');
    $this->assign("currency_type",$currency_type);

    $merchant_type = trans('admin.merchant_type');
    $this->assign("merchant_type",$merchant_type);
    
    $api_lang = trans('admin.api_lang');
    $this->assign("api_lang",$api_lang);

    foreach ($data as $k => $v) {
      $data[$k]['api_lang'] = $api_lang[$v['api_lang']];
      $data[$k]['currency_name'] = $currency_type[$v['currency_type']];
      $data[$k]['merchant_name'] = $merchant_type[$v['merchant_type']];
      $data[$k]['status_name'] = $this->status[$v['status']];
    }

    $this->assign("data",$data);

    return view('agent_user.index',$this->data);
  }

  // 取得後台用戶資料
  public function get_agent(Request $request) {

    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    //////////////////

    $return = Agent::where("id",$input['id'])->first();
    if ($return === false) {
      $this->ajaxError("error_ajax_get_agent_" . "01");
    }

    $this->ajaxSuccess("success_ajax_get_agent_" . "01",$return);
  }

  // 編輯後台用戶
  public function edit_agent(Request $request) {
    	
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    //////////////////
    
    $return = Agent::where("id",$input['id'])->first();
    if ($return === false) {
      $this->ajaxError("error_ajax_edit_agent_" . "01");
    }

    $tmp = array();
    $tmp['account'] = $return['account'];
    $tmp['email'] = $return['email'];
    $tmp['prefix'] = $return['prefix'];
    $tmp['api_lang'] = $return['api_lang'];
    $tmp['currency_type'] = $return['currency_type'];
    $tmp['merchant_type'] = $return['merchant_type'];
    $tmp['is_beta'] = $return['is_beta'];
    $tmp['status'] = $return['status'];
    $before_data = $tmp;

    //////////////////////////////////////////

    $tmp = array();
    $tmp['account'] = $input['account'];
    $tmp['email'] = $input['email'];
    $tmp['prefix'] = $input['prefix'];
    $tmp['api_lang'] = $input['api_lang'];
    $tmp['currency_type'] = $input['currency_type'];
    $tmp['merchant_type'] = $input['merchant_type'];
    $tmp['is_beta'] = $input['is_beta'];
    $tmp['status'] = $input['status'];
  
    $return = Agent::where("id",$input['id'])->update($tmp);
    if ($return === false) {
      $this->ajaxError("error_ajax_edit_agent_" . "02");
    }

    // 操作紀錄
    $this->operationLogs("edit_agent", $before_data, $tmp);

    $this->ajaxSuccess("success_ajax_edit_agent_" . "01");
  }

  // 創建後台用戶
  public function create_agent(Request $request) {
    	
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    //////////////////

    // 判斷帳號是否已用
    $return = Agent::where("account",$input['account'])->count();
    if ($return === false) {
      $this->ajaxError("error_ajax_create_agent_" . "01");
    }

    if ($return > 0) {
      $this->ajaxError("error_ajax_create_agent_" . "02");
    }

    $default_agent_limit = $this->system_config['default_agent_limit'];

    $tmp = array();
    $tmp['account'] = $input['account'];
    $tmp['email'] = $input['email'];
    $tmp['prefix'] = $input['prefix'];
    $tmp['currency_type'] = $input['currency_type'];
    $tmp['merchant_type'] = $input['merchant_type'];
    $tmp['limit_data'] = $default_agent_limit;
    $tmp['is_beta'] = $input['is_beta'];
    $tmp['white_list'] = "[]";
    $tmp['create_time'] = date("Y-m-d H:i:s");
    $tmp['last_login'] = date("Y-m-d H:i:s");
    $tmp['status'] = $input['status'];

    $return = Agent::insert($tmp);
    if ($return === false) {
      $this->ajaxError("error_ajax_create_agent_" . "03");
    }

    // 操作紀錄
    $this->operationLogs("create_agent", array(), $tmp);

    $this->ajaxSuccess("success_ajax_create_agent_" . "01");

  }

}

