<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\AdminPermission;
use App\Models\AdminMenu;

class AdminPermissionController extends Controller {

  protected $current = "admin_permission";


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
    if (isset($input['permission_name'])) {
      $return = AdminPermission::where("permission_name","LIKE",$input['permission_name']."%")->orderBy("id","ASC")->paginate($this->per_page);
      
    } else {
      $return = AdminPermission::orderBy("id","ASC")->paginate($this->per_page);
    }

    foreach ($return as $k => $v) {
      $return[$k]['permission'] = json_decode($v['permission_data'],true);
      $return[$k]['status_name'] = $this->status[$v['status']];
    }

    // 取得用戶資料
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "01");
      return redirect('/index');
    }

    $this->assign("data",$return);

    // 取得admin menu 資料
    $return = AdminMenu::where("status",1)->where("menu_value" , "<>", "")->get();
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "03");
      return redirect('/index');
    }

    $menu_array = array();
    foreach ($return as $k => $v) {
      // index 預設是打開, 所以不用加進來
      if ($v['menu_class'] != "index") {
        $menu_array[$v['menu_class']][] = $v['menu_value'];
      }
    }

    $this->assign("menu",$menu_array);

    // 取得權限資料
    $return = AdminPermission::where("status",1)->get();
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "03");
      return redirect('/index');
    }
    $this->assign("permission_data",$return);

    // 取得菜單語系
    $menu_lang = trans('admin.menu_lang');
    $this->assign("menu_lang",$menu_lang);
 		
    return view('admin_permission.index',$this->data);
  }

  // 創建權限
  public function create_permission(Request $request) {
    	
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    //////////////////

    $tmp = $input;
    unset($tmp['_token']);

    $return = AdminPermission::insert($tmp);
    if ($return === false) {
      $this->ajaxError("error_ajax_create_permission_" . "01");
    }

    $this->ajaxSuccess("success_ajax_create_permission_" . "01",);
    
  }

  // 取得權限資料
  public function get_permission(Request $request) {

    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    //////////////////

    $return = AdminPermission::where("id",$input['id'])->first();
    if ($return === false) {
      $this->ajaxError("error_ajax_get_admin_" . "01");
    }

    $this->ajaxSuccess("success_ajax_get_admin_" . "01",$return);
  }


  // 編輯權限資料
  public function edit_permission(Request $request) {
    	
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    //////////////////

    $tmp = array();
    $tmp['permission_name'] = $input['permission_name'];
    $tmp['permission_data'] = $input['permission_data'];
    $tmp['status'] = $input['status'];
  
    $return = AdminPermission::where("id",$input['id'])->update($tmp);
    if ($return === false) {
      $this->ajaxError("error_ajax_edit_permission_" . "01");
    }

    $this->ajaxSuccess("success_ajax_edit_permission_" . "01");
  }

    
}

