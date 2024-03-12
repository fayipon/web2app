<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin;

class LoginController extends Controller {
    
    // 首頁
    public function index(Request $request) {
 		
    	return view('login.index',$this->data);
    }

    // post request
    public function post(Request $request) {
        
    	$input = $this->getRequest($request);

		$session = Session::all();

    	/////////////////////////

        if (!isset($input['account']) || $input['account'] == "") {
    		$this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/login');
        }
        
        if (!isset($input['passwd']) || $input['passwd'] == "") {
    		$this->error(__CLASS__, __FUNCTION__, "02");
            return redirect('/login');
        }

        $input['account'] = strtolower(trim($input['account']));
        $input['passwd'] = MD5(trim($input['passwd']));

        // 取得用戶資料
        $return = Admin::where("account",$input['account'])->first();
        if ($return === false) {
    		$this->error(__CLASS__, __FUNCTION__, "03");
            return redirect('/login');
        }

        if ($return === null) {
    		$this->error(__CLASS__, __FUNCTION__, "03");
            return redirect('/login');
        }

        // 判斷密碼
        if ($return['password'] != $input['passwd']) {
    		$this->error(__CLASS__, __FUNCTION__, "03");
            return redirect('/login');
        }

        // 更新登入時間
        Admin::where("account",$input['account'])->update([
            "last_login" => date("Y-m-d H:i:s")
        ]);

        // 寫入session
    	Session::put("admin",$return);
    	Session::put("is_login",1);
        Session::Save();

        // 事件監聽
        $this->operationLogs("admin_login", array(), array());
      
        $this->success(__CLASS__, __FUNCTION__, "01");
        return redirect('/');

    }

    // 登出
    public function logout(Request $request) {

    	$input = $this->getRequest($request);

		$session = Session::all();

    	/////////////////////////
        
        // 事件監聽
        $this->operationLogs("admin_logout", array(), array());
      
    	Session::flush();
        return redirect('/login');

    }
}

