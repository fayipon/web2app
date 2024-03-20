<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\App;

class MyAppController extends Controller
{
    // 首頁
    public function index($id) {

        $this->assign("id",$id);
        ///////////////////////////////////

        $return = App::where("ID",$id)->first();
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/');
        }
        
        // 配置
        $this->assign("app_url",$return['APP_URL']);
        
    	return view('my_app.index',$this->data);
    }
}

