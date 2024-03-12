<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\AdminPermission;

class AdminUserController extends Controller {

  protected $current = "admin_user";

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
      $return = Admin::where("account","LIKE",$input['account']."%")->orderBy("id","ASC")->paginate($this->per_page);
    } else {
      $return = Admin::orderBy("id","ASC")->paginate($this->per_page);
    }

    // 取得用戶資料
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "01");
      return redirect('/index');
    }

    foreach ($return as $k => $v) {
      $tmp = AdminPermission::where("id",$v['permission_id'])->first();
      if ($tmp === false) {
        $this->error(__CLASS__, __FUNCTION__, "02");
        return redirect('/index');
      }
      
      $return[$k]['permission'] = $tmp['permission_name'];
      $return[$k]['status_name'] = $this->status[$v['status']];
    }

    $this->assign("data",$return);

    // 取得權限資料
    $return = AdminPermission::where("status",1)->get();
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "03");
      return redirect('/index');
    }
    $this->assign("permission_data",$return);

 		
    return view('admin_user.index',$this->data);
  }

  // 取得後台用戶資料
  public function get_admin(Request $request) {

    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    //////////////////

    $return = Admin::where("id",$input['id'])->first();
    if ($return === false) {
      $this->ajaxError("error_ajax_get_admin_" . "01");
    }

    $this->ajaxSuccess("success_ajax_get_admin_" . "01",$return);
  }

  // 編輯後台用戶
  public function edit_admin(Request $request) {
    	
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    //////////////////

    $return = Admin::where("id",$input['id'])->first();
    if ($return === false) {
      $this->ajaxError("error_ajax_edit_admin_" . "01");
    }

    $tmp = array();
    $tmp['account'] = $return['account'];
    $tmp['permission_id'] = $return['permission_id'];
    $tmp['status'] = $return['status'];
    $before_data = $tmp;

    //////////////////////////////////////////

    $tmp = array();
    $tmp['account'] = $input['account'];
    $tmp['permission_id'] = $input['permission'];
    $tmp['status'] = $input['status'];
  
    $return = Admin::where("id",$input['id'])->update($tmp);
    if ($return === false) {
      $this->ajaxError("error_ajax_edit_admin_" . "01");
    }

    // 操作紀錄
    $this->operationLogs("edit_admin", $before_data, $tmp);

    $this->ajaxSuccess("success_ajax_edit_admin_" . "01");
  }


  // 創建後台用戶
  public function create_admin(Request $request) {
    	
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    //////////////////

    // 判斷帳號是否已用
    $return = Admin::where("account",$input['account'])->count();
    if ($return === false) {
      $this->ajaxError("error_ajax_create_admin_" . "01");
    }

    if ($return > 0) {
      $this->ajaxError("error_ajax_create_admin_" . "02");
    }


    $tmp = array();
    $tmp['account'] = $input['account'];
    $tmp['password'] = MD5($input['password']);
    $tmp['permission_id'] = $input['permission'];
    $tmp['create_time'] = date("Y-m-d H:i:s");
    $tmp['last_login'] = date("Y-m-d H:i:s");
    $tmp['status'] = $input['status'];

    $return = Admin::insert($tmp);
    if ($return === false) {
      $this->ajaxError("error_ajax_create_admin_" . "03");
    }

    // 操作紀錄
    $this->operationLogs("create_admin", array(), $tmp);

    $this->ajaxSuccess("success_ajax_create_admin_" . "01");

  }

  // 暫停/啟用 , 後台帳號
  public function active_admin(Request $request) {
    	
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    //////////////////

    $return = Admin::where("id",$input['id'])->first();
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "01");
      return redirect('/admin/user');
    }

    if ($return['status'] == 1) {
      // 停用
      $return = Admin::where("id",$input['id'])->update([
        "status" => 0
      ]);
      if ($return === false) {
        $this->error(__CLASS__, __FUNCTION__, "02");
        return redirect('/admin/user');
      }
        
      // 操作紀錄
      $this->operationLogs("active_admin", array("status"=>1), array("status"=>0));

    } else {
      //啟用
      $return = Admin::where("id",$input['id'])->update([
        "status" => 1
      ]);
      if ($return === false) {
        $this->error(__CLASS__, __FUNCTION__, "03");
        return redirect('/admin/user');
      }

      // 操作紀錄
      $this->operationLogs("active_admin", array("status"=>0), array("status"=>1));
    }


    $this->success(__CLASS__, __FUNCTION__, "01");
    return redirect('/admin/user');

  }


    
}

