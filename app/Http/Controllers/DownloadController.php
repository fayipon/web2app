<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DownloadController extends Controller
{
    // 首頁
    public function index(Request $request) {
    	
        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);
        
    	return view('download.index',$this->data);
    }
}

