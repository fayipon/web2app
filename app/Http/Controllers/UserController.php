<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Pv;

class UserController extends Controller
{
    // 首頁
    public function index(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $this->assign("search",$input);
        
        $session = Session::all();
        $this->assign("session", $session);

        //////////////////////////////////////

        // 取得当前用户的应用列表
        $return = Pv::orderBy("ID","DESC")->get();
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/dashboard');
        }
        
        $this->assign("list",$return);
    	
    	return view('user.index',$this->data);
    }


}

