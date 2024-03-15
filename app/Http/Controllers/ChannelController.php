<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\App;

class ChannelController extends Controller
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
    	
    	return view('channel.index',$this->data);
    }

    // 新增页
    public function create_page(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

    	return view('channel.create-page',$this->data);

    }

    // 新增
    public function create(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

        $data = $input;
        $data = $this->filiterUpper($data);

        
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
                $this->error(__CLASS__, __FUNCTION__, "01");
                return redirect('/app');
            }
        }

    }
}

