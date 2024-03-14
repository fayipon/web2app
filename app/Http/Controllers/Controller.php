<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;
	
    protected $data;
    

    // 取得request
    protected function getRequest($request) {
    	
    	$input = $request->input();
    	
    	foreach ($input as $k => $v) {
    		$input[$k] = trim($v);
    	}

		
    	return $input;
    }
    
	// 判断是否登入
	
	// 檢查是否登入
	protected function isLogin() {

		$is_login = Session::get('is_login', false);

		if ($is_login === false) {
			Session::flush();
			header("Location: /login");
			exit();
		}
	
	}

    // assign
    protected function assign($key, $value) {
    	$this->data[$key] = $value;
    }

    // success
    protected function success($class , $method , $num) {
    	
    	$class = str_replace("App\Http\Controllers\\", "", $class);
    	$class = str_replace("Controller", "", $class);
    	$class = strtolower($class);
    	
    	$msg = "SUCCESS_" . $class . "_" . $method . "_" . $num;
    	//$msg = L($msg);
    	
    	session()->flash("success", $msg);
    }
    
    // error
    protected function error($class , $method , $num) {
    	
    	$class = str_replace("App\Http\Controllers\\", "", $class);
    	$class = str_replace("Controller", "", $class);
    	$class = strtolower($class);
    	
    	$msg = "ERROR_" . $class . "_" . $method . "_" . $num;
    	//$msg = L($msg);
    	
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

	// 排除非大写的key值参数
	protected function filiterUpper($data) {
		foreach ($data as $k => $v) {
			if ($k != strtoupper($k)) {
				unset($data[$k]);
			}
		}

		return $data;

	}

}
