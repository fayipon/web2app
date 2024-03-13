<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class LoginController extends Controller
{
    // 首頁
    public function index(Request $request) {
    	
    	return view('login.index',[]);
    }

    // 表单动作
    public function post(Request $request) {
    	
        
        $input = $this->getRequest($request);

        //////////////////////////////////////

        $return = User::where("ACCOUNT",$input['account'])->first();
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/login');
        }
        
        if ($return === null) {
    		$this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/login');
        }


        // 判断密码是否一致
        if ($return['PASSWORD'] !== MD5($input['password'])) {
            $this->error(__CLASS__, __FUNCTION__, "02");
            return redirect('/login');
        }

        // 更新最后登入时间
        $return = User::where("ACCOUNT",$input['account'])->update([
            "UPDATE_TIME" => date("Y-m-d H:i:s")
        ]);
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "03");
            return redirect('/login');
        }

        // 保存至session
        unset($return['PASSWORD']);
    	Session::put("user",$return);
    	Session::put("is_login",1);
        Session::Save();

        // 操作纪录 TODO

        $this->success(__CLASS__, __FUNCTION__, "01");
        return redirect('/dashboard');
    }

    
    // test
    public function test(Request $request) {
    	
        $return = User::where("ACCOUNT","admin")->update([
            "PASSWORD" => MD5('123qwe')
        ]);

        dd($return);
    }

}

