<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller {
    
    // 首頁
    public function index(Request $request) {
    	
      $this->isLogin();
 		
      //////////////////
      
    	return view('index.index',$this->data);
    }

    
}

