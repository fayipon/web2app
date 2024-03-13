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
}

