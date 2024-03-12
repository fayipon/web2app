<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

use App\Models\SystemConfig;
use App\Models\AdminMenu;
use App\Models\AdminPermission;
use App\Models\AdminOperationLogs;
//
class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;
    
    protected $data;
    
    protected $system_config; 
    protected $per_page = 10; 
    protected $skip = 0; 

	protected $host;
	protected $domain;
	protected $permission;
    
    public function __construct() {

    	$this->middleware(function ($request, $next) {

    		// system_config
    		$this->system_config();

			// 分頁處理
			$this->page($request);
    		
			$url = url()->current();
			$data = explode(".",$url);
			$this->domain = $data[1];

			$tmp = explode("/",$url);

			if (isset($tmp[3])) {
				$current_controller = $tmp[3];
			} else {
				$current_controller = "index";
			}
			
			if (isset($tmp[4])) {
				$current_model = $tmp[4];
			} else {
				$current_model = "index";
			}

    		$this->assign("domain", $this->domain);
    		$this->assign("controller", $current_controller);
    		$this->assign("model", $current_model);

			/////////////////////////////

			// 如果是登入狀態
			$is_login = Session::get('is_login', false);
			$data = array();
			if ($is_login) {
				$admin = Session::get('admin', false);
				if ($admin) {

					// 取得權限
					$return = AdminPermission::where("id",$admin['permission_id'])->first();
					$data = json_decode($return['permission_data'],true);

					// TODO 權限 status 為0時 （禁用）
				}
			} 

			$this->permission =  $data;

    		$this->assign("permission", $data);

			/////////////////////////////

    		return $next($request);
    	});
    }

    // 取得request
    protected function getRequest($request) {
    	
    	$input = $request->input();
    	
    	foreach ($input as $k => $v) {
    		$input[$k] = trim($v);
    	}
    	return $input;
    }
    
    // assign
    protected function assign($key, $value) {
    	$this->data[$key] = $value;
    }

    // system_config
    protected function system_config() {
    	$return = SystemConfig::where("status",1)->get();
    	$data = array();
    	foreach ($return as $k => $v) {
    		$data[$v['name']] = $v['value'];
    	}
    	
    	$this->system_config = $data;
    	$this->assign("system_config",$data);
    }
	
	// permission check
	protected function permission($current) {

		if (!in_array($current , $this->permission)) {
			session()->flash("error", "ERROR_PERMISSION");
			header("Location: /index");
			exit();
		}

	}

	// page 分頁方法
	protected function page($request) {
		if (isset($request['page']) && ($request['page'] != "")) {
			$skip = $this->per_page*$request['page'];
			$this->skip = $skip;
		}
	}
	///////////////////////////////////////////
    
    // success
    protected function success($class , $method , $num) {
    	
    	$class = str_replace("App\Http\Controllers\\", "", $class);
    	$class = str_replace("Controller", "", $class);
    	$class = strtolower($class);
    	
    	$msg = "SUCCESS_" . $class . "_" . $method . "_" . $num;
    	$msg = L($msg);
    	
    	session()->flash("success", $msg);
    }
    
    // error
    protected function error($class , $method , $num) {
    	
    	$class = str_replace("App\Http\Controllers\\", "", $class);
    	$class = str_replace("Controller", "", $class);
    	$class = strtolower($class);
    	
    	$msg = "ERROR_" . $class . "_" . $method . "_" . $num;
    	$msg = L($msg);
    	
    	session()->flash("error", $msg);
    }
    
    protected function ajaxSuccess($message = "",$data = array()) {
    	
    	$return = array();
    	$return['status'] = 1;
    	$return['data'] = $data;
    	$return['message'] = L($message,"ajax");
    	
    	echo json_encode($return);
    	exit();
    }
    
    // AJAX Error reponse
    protected function ajaxError($message = "", $data = array()) {
    	
    	$return = array();
    	$return['status'] = 0;
    	$return['data'] = $data;
    	$return['message'] = L($message,"ajax");
    	
    	echo json_encode($return);
    	exit();
    }

	// 判斷用戶是否為移動端
	protected function is_mobile() {
		if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
			$is_mobile = false;
		} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {

			if (isset($_SERVER['HTTP_SEC_CH_UA_PLATFORM'])) {
				// 這個是for chrome debug工具 切換用
				if (strpos($_SERVER['HTTP_SEC_CH_UA_PLATFORM'], 'Android') !== false) {
					$is_mobile = true;	
				} else {
					$is_mobile = false;
				}
			} else {
				$is_mobile = true;
			}
		} else {
			$is_mobile = false;
		}

		return $is_mobile;
	}
	
	// 檢查是否登入
	protected function isLogin() {

		$is_login = Session::get('is_login', false);

		if ($is_login === false) {
			Session::flush();
			header("Location: /login");
			exit();
		}
	
	}

	// 操作紀錄
	protected function operationLogs($action, $before, $after) {
		
		// 取得session
		$admin = Session::get('admin', false);

		$tmp = array();
		$tmp['action'] = $action;
		$tmp['account'] = $admin['account'];
		$tmp['before_data'] = json_encode($before,true);
		$tmp['after_data'] = json_encode($after,true);
		$tmp['create_time'] = date("Y-m-d H:i:s");
		$tmp['status'] = 1;

		AdminOperationLogs::insert($tmp);
	}

}
