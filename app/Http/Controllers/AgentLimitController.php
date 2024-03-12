<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Agent;

// use App\Models\AdminPermission;
// use App\Models\AntGameList;
use App\Models\LsportSport;

class AgentLimitController extends Controller {

    protected $current = "agent_user";

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

        $game_type = array();
        // $game_return = AntGameList::where("status",1)->get();
        $game_return = LsportSport::where("status", 1)->get();
        foreach($game_return as $k => $v) {
            $game_type[$v['id']] = $v['name_tw'];
        }
        $this->assign("game_type",$game_type);


        foreach ($data as $k => $v) {
            $data[$k]['api_lang'] = $api_lang[$v['api_lang']];
            $data[$k]['currency_name'] = $currency_type[$v['currency_type']];
            $data[$k]['merchant_name'] = $merchant_type[$v['merchant_type']];
            $data[$k]['status_name'] = $this->status[$v['status']];
        }

        $this->assign("data",$data);

        return view('agent_limit.index',$this->data);
    }

  // 取得後台用戶資料
    public function get_agent_limit(Request $request) {

        $this->isLogin();

        $this->permission($this->current);
        
        $input = $this->getRequest($request);
            $session = Session::all();

        //////////////////

        $return = Agent::where("id",$input['id'])->first();
        if ($return === false) {
        $this->ajaxError("error_ajax_get_agent_limit_" . "01");
        }

        $this->ajaxSuccess("success_ajax_get_agent_limit_" . "01",$return);
    }

  // 編輯後台用戶
    public function edit_agent_limit(Request $request) {
    	
        $this->isLogin();

        $this->permission($this->current);
        
        $input = $this->getRequest($request);
            $session = Session::all();

        //////////////////

        // 解析 data
        $input_data = explode(',', $input['data']);
        $data = array();

        foreach ($input_data as $k => $v) {

        // 略過空資料
        if ($v == "") {
            continue;
        }

        $tmp = explode('_', $v);

        $data[$tmp[1]][$tmp[4]][$tmp[2]] = $tmp[5];
        }

        $data = json_encode($data,true);


        $return = Agent::where("id",$input['id'])->first();
        if ($return === false) {
        $this->ajaxError("error_ajax_edit_agent_" . "01");
        }

        $tmp = array();
        $tmp['limit_data'] = $return['limit_data'];
        $before_data = $tmp;

        //////////////////////////////////////////

        $tmp = array();
        $tmp['limit_data'] = $data;
    
        $return = Agent::where("id",$input['id'])->update($tmp);
        if ($return === false) {
        $this->ajaxError("error_ajax_edit_agent_" . "02");
        }

        // 操作紀錄
        $this->operationLogs("edit_agent", $before_data, $tmp);

        $this->ajaxSuccess("success_ajax_edit_agent_" . "01");
    }

}

