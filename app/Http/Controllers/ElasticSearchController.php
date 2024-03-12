<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

use App\Models\Admin;

class ElasticSearchController extends Controller {

  // 首頁
  public function index(Request $request) {
    	
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    $this->assign("search",$input);

    //////////////////

            // 获取要发送请求的URL
            $url = 'http://72.167.135.22:29200/es_game_order?pretty=true';


  }

    
}

