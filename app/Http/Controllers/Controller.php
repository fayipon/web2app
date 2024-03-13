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


}
