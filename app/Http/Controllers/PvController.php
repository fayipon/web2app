<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

use App\Models\Channel;
use App\Models\Pv;
use App\Models\App;

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


    // api , ajax type
    public function api(Request $request) {

        $input = $this->getRequest($request);
        $session = Session::all();
        //////////////////////////////////////
        
        $cookie = $this->getUserData();

        $subDomain = $this->parseDomain();
        $fullUrl = $request->fullUrl();

        $return = App::where("SETUP_URL",$subDomain)->first();
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/');
        }
        
        // 将资料包装一下后填入
        $data = array(
            "COOKIE_ID" => $cookie['COOKIE_ID'],
            "APP_ID" => $return['APP_ID'],
            "SOURCE_URL" => $fullUrl,
            "DEVICE_TYPE" => $this->checkDevice($input['DEVICE']),
            "CHANNEL_ID" => $this->getChannelID($input['HOSTNAME']),
            "ACTION_TYPE" => $input['ACTION'],
            "FIRST_TIME" => $cookie['FIRST_TIME'],
            "CREATE_TIME" => $input['CURRENT_TIME'],
        );

        Pv::insert($data);

        $this->ajaxSuccess("SUCCESS_01");
    }

    // 检查设备
    protected function checkDevice($data) {

        return "iPhone";

    }

    // 用URL 获取Channel ID
    protected function getChannelID($url) {

        return 1;

    }

}

