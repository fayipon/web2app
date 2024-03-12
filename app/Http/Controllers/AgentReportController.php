<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\Agent;
use App\Models\GameOrder;

class AgentReportController extends Controller {

  protected $current = "agent_report";
    
  // 首頁
  public function index(Request $request) {
    	
    $this->isLogin();

    $this->permission($this->current);
    
    $input = $this->getRequest($request);
		$session = Session::all();

    $this->assign("search",$input);

    //////////////////

    $return = $this->getReport();
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "01");
      return redirect('/index');
    }

    foreach ($return as $k => $v) {
      $agent_id = $v['agent_id'];

      $agent = Agent::where("id",$agent_id)->fetch();

      $columns = ["account","balance","currency_type","email","merchant_type","prefix"];
      foreach ($columns as $kk => $vv) {
        $return[$k][$vv] = $agent[$vv];
      }
    }

    $this->assign("data",$return);


    // 總計
    $return = $this->getReportTotal();
    if ($return === false) {
      $this->error(__CLASS__, __FUNCTION__, "01");
      return redirect('/index');
    }

    $this->assign("total",$return);


 		
    return view('agent_report.index',$this->data);
  }

  // 報表類處理
  protected function getReport() {
    
    $return = GameOrder::select(
      'agent_id',
      DB::raw('SUM(bet_amount) as total_bet_amount'),
      DB::raw('SUM(result_amount) as total_result_amount'),
      DB::raw('SUM(active_bet) as total_active_bet'),
      DB::raw('COUNT(*) as record_count'),
      DB::raw('COUNT(DISTINCT player_id) as players_count')
    )
    ->where("status",4)
    ->groupBy('agent_id')
    ->total();
    if ($return === false) {
      return false;
    }

    $list = array();
    foreach ($return['agent_id']['buckets'] as $k => $v) {
      
      $tmp = array();
      $tmp['agent_id']             = $v['key'];
      $tmp['record_count']         = $v['record_count']['value'];
      $tmp['total_result_amount']  = $v['total_result_amount']['value'];
      $tmp['total_bet_amount']     = $v['total_bet_amount']['value'];
      $tmp['total_active_bet']     = $v['total_active_bet']['value'];
      $tmp['players_count']        = $v['players_count']['value'];

      $list[] = $tmp;
    }

    return $list;
  }

  // 總total 報表類處理
  protected function getReportTotal() {
    
    $return = GameOrder::select(
      DB::raw('SUM(bet_amount) as total_bet_amount'),
      DB::raw('SUM(result_amount) as total_result_amount'),
      DB::raw('SUM(active_bet) as total_active_bet'),
      DB::raw('COUNT(*) as record_count'),
      DB::raw('COUNT(DISTINCT player_id) as players_count')
    )
    ->where("status",4)
    ->total();
    if ($return === false) {
      return false;
    }
      
    $tmp = array();
    $tmp['record_count']         = $return['record_count']['value'];
    $tmp['total_result_amount']  = $return['total_result_amount']['value'];
    $tmp['total_bet_amount']     = $return['total_bet_amount']['value'];
    $tmp['total_active_bet']     = $return['total_active_bet']['value'];
    $tmp['players_count']        = $return['players_count']['value'];

    return $tmp;
  }

    
}

