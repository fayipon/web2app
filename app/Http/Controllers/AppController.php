<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\App;

class AppController extends Controller
{
    // 首頁
    public function index(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

        // 取得当前用户的应用列表
        $return = App::where("USER_ID",$session['user']['ID'])->get();
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/dashboard');
        }
        
        $this->assign("list",$return);
    	
    	return view('app.index',$this->data);
    }

    
    // 创建新应用
    public function create(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

    	
    	return view('app.create',$this->data);
    }
    
    // 创建新应用
    public function post(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

        $data = $input;
        unset($data['_token']);

        // 检查栏位
        $check_columns = [
            "APP_NAME",
            "APP_SORT_NAME",
            "APP_SETUP_ICON",
            "APP_DESKTOP_ICON",
            "APP_BROWSER_ICON",
            "APP_URL",
            "IS_APP_URL_EDIT",
            "IS_IFRAME",
            "SETUP_URL",
            "SETUP_DEV_NAME",
            "SETUP_RATE",
            "SETUP_RATE_P",
            "SETUP_SETUP_P",
            "SETUP_AGE",
            "SCREEN_TYPE",
            "APP_SCREEN",
            "APP_DESCRIPTION",
            "SETUP_TEMPLE",
            "IS_ANYWHERE_INSTALL",
            "MARK"
        ];

        foreach ($check_columns as $v) {
            if (!isset($data[$v]) || $data[$v] == "") {
                $this->error(__CLASS__, __FUNCTION__, "02");
                return redirect('/app');
            }
        }

        // 设定create_time , update_time, status 
        $data['CREATE_TIME'] = date("Y-m-d H:i:s");
        $data['UPDATE_TIME'] = date("Y-m-d H:i:s");
    	
        $data['STATUS'] = 1;

        // 判断APP 是否已用 目前只对URL判断
        $count = App::where("APP_URL",$data['APP_URL'])->count();
        if ($count > 0) {
            $this->error(__CLASS__, __FUNCTION__, "02");
            return redirect('/app');
        }

        // 填入APP
        $return = App::insert($data);
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/app');
        }
        
        $this->success(__CLASS__, __FUNCTION__, "01");
    	return view('app.create',$this->data);
    }
}

