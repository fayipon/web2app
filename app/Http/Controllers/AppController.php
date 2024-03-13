<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AppController extends Controller
{
    // 首頁
    public function index(Request $request) {
    	
    	return view('app.index',[]);
    }

    
    // 创建新应用
    public function create(Request $request) {
    	
    	return view('app.create',[]);
    }
}

