<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\App;

class AppUrlController extends Controller
{
    // 首頁
    public function index(Request $request) {
    	
        $input = $this->getRequest($request);

        $this->assign("id",$input['id']);
        ///////////////////////////////////

        $return = App::where("ID",$input['id'])->first();
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/');
        }
        
        // 配置
        $this->assign("app_url",$return['APP_URL']);
        
    	return view('app_url.index',$this->data);
    }
}

