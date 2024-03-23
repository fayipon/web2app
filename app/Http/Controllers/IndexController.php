<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\App;

class IndexController extends Controller
{
    // 首頁
    public function index(Request $request) {
    	
        $this->assign("version","demo0005");

        ///////////////////////////////////////

        $subDomain = $this->parseDomain();

        if ($subDomain == "chjdhbyk") {
    	    return view('index.index',$this->data);
        }

        $return = App::where("SETUP_URL",$subDomain)->first();
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/');
        }

        $this->assign("app_config",$return);

        // 模版1
    	return view('index.temple1',$this->data);
    }


    // push 测试
    public function test(Request $request) {
        
        $this->assign("version","ddd");

        // 模版1
    	return view('index.test',$this->data);

    }
}

