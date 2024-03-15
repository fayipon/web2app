<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

use App\Models\Channel;

class PvController extends Controller
{
    // 首頁
    public function index(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

        // 取得当前用户的应用列表
        $return = Channel::where("USER_ID",$session['user']['ID'])->get();
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/dashboard');
        }
        
        $this->assign("list",$return);
    	
    	return view('channel.index',$this->data);
    }

    // 测试用
    public function test(Request $request) {

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////
        
        $cookie_id = Cookie::get('COOKIE_ID');

        if ($cookie_id == null) {
            $cookie_id = session()->getId();
            $cookie_id = hash('sha256', $cookie_id);
            $cookie_id = substr($cookie_id, 0, 16);
            Cookie::queue('COOKIE_ID', $cookie_id, 60*24*12);
        }

        $cookie_id = session()->getId();
        $cookie_id = hash('sha256', $cookie_id);
        $cookie_id = substr($cookie_id, 0, 16);
        Cookie::queue('COOKIE_ID', $cookie_id, 60*24*12);
        
        dd($cookie_id);

        
    }

}

