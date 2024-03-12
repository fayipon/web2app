<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\GameOrder;
use App\Models\Agent;
use App\Models\Player;

class SportReviewController extends Controller {

  protected $current = "game_review";
    
  // 首頁
  public function index(Request $request) {
    	
    $this->isLogin();

    $this->permission($this->current);
    
    //////////////////
    $return = GameOrder::where("status",1)->orderBy("id","DESC")->get();
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "01");
    }

    // 取得語系資料
    $order_status = trans('game.order_status');
    $order_type = trans('game.order_type');

    foreach ($return as $k => $v) {
      // 轉語系
      $return[$k]['status'] = $order_status[$v['status']];
      $return[$k]['type_id'] = $order_type[$v['type_id']];

      // 取得用戶,商戶帳號
      $tmp = Agent::where("id",$v['agent_id'])->first();
      $return[$k]['agent'] = $tmp['account'];
      
      $tmp = Player::where("id",$v['player_id'])->first();
      $return[$k]['player'] = $tmp['account'];

      // 計算投注金額
      $rate = $v['rate'];
      $return[$k]['bet_result'] = $v['bet_amount']*$rate;

      // 去小數點
      $return[$k]['bet_amount'] = $v['bet_amount']+0;
    }
    $this->assign("data",$return);
    
 		
    return view('game_review.index',$this->data);
  }

    
}

