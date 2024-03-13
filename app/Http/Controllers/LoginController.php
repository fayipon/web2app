<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // 首頁
    public function index(Request $request) {
    	
    	return view('login.index',[]);
    }

    // 表单动作
    public function post(Request $request) {
    	
        
        $input = $this->getRequest($request);

        dd($input);
    	return view('login.index',[]);
    }
}

