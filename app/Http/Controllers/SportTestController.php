<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Player;

class SportTestController extends Controller {

  protected $current = "agent_user";

  // 狀態值
  protected $status = array("暫停","啟用中");
    
  // 充值
  public function recharge(Request $request) {
    	
    $this->isLogin();

    //////////////////

    $user = Player::where("id",1)->first();
    
    $user_balance = $user['balance'];
    $after_balance = $user_balance + 10000;

    Player::where("id",1)->update([
      "balance" => $after_balance
    ]);
    return redirect('/');

  }
  // 玩家扣款
  public function withdraw(Request $request) {
    	
    $this->isLogin();

    //////////////////

    $user = Player::where("id",1)->first();
    
    $user_balance = $user['balance'];
    $after_balance = $user_balance - 10000;
    if ($after_balance < 0) {
      $after_balance = 0;
    }

    Player::where("id",1)->update([
      "balance" => $after_balance
    ]);
    return redirect('/');
  }

}

