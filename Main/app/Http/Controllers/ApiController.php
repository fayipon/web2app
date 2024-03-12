<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Agent;
use App\Models\Player;
use App\Models\PlayerOnline;
use App\Models\PlayerBalanceLogs;

class ApiController extends Controller {

    // 商戶
    protected $merchant;

    // 用戶
    protected $username;

    // 簽名
    protected $signature;


    // 首頁
    public function index(Request $request) {
    	
 		
      //////////////////

      echo "API INDEX";
    	// return view('api.index',$this->data);
    }

    /////////////////////////////////////////


}


