<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\AdminPermission;
use App\Models\AdminMenu;
use App\Models\AdminOperationLogs;

class AdminOperationController extends Controller {

  protected $current = "admin_operation";

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
      $return = AdminOperationLogs::where("account","LIKE",$input['account']."%")->orderBy("id","DESC")->paginate($this->per_page);
    } else {
      $return = AdminOperationLogs::orderBy("id","DESC")->paginate($this->per_page);
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

    return view('admin_operation.index',$this->data);
  }

}

