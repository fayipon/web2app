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

        dd($return);
    }

    
    // test
    public function test(Request $request) {
    	
        $return = User::where("ACCOUNT","admin")->save([
            "PASSWORD" => MD5('123qwe')
        ]);

        dd($return);
    }

}

