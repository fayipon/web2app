<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class IndexController extends Controller
{
    // 首頁
    public function index(Request $request) {
    	
      $this->isLogin();
 		
    	return view('index.index',$this->data);
    }
}

