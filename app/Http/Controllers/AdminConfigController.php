<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\AdminPermission;
use App\Models\SystemConfig;

class AdminConfigController extends Controller {

  protected $current = "admin_config";
    
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

    $return = SystemConfig::orderBy("id","ASC")->paginate($this->per_page);
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "01");
      return redirect('/index');
    }

    $status = array("暫停","啟用");
    foreach ($return as $k => $v) {

      $return[$k]['status_name'] = $status[$v['status']];

    }

    $this->assign("data",$return);

 		
    return view('admin_config.index',$this->data);
  }


  
  // 自增版本號
  public function increase_version(Request $request) {

    $return = SystemConfig::where("name","version")->first();
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "01");
      return redirect('/admin/config');
    }

    // 自增版本號
    $value = $return['value'];
    $value = explode("_",$value);
    $value[2]++;
    $value = implode("_",$value);

    $return = SystemConfig::where("name","version")->update([
      "value" => $value
    ]);
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "02");
      return redirect('/admin/config');
    }

    $this->success(__CLASS__, __FUNCTION__, "01");
    return redirect('/admin/config');

  }
    
}

