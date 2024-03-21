<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    // 首頁
    public function index(Request $request) {
    	
        $this->isLogin();


        $input = $this->getRequest($request);
        $this->assign("search",$input);
        
        $session = Session::all();
        $this->assign("session", $session);

        //////////////////////////////////////


    	return view('dashboard.index',$this->data);
    }
}

