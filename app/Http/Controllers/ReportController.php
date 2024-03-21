<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Pv;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    // 首頁
    public function index(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $this->assign("search",$input);
        
        $session = Session::all();
        $this->assign("session", $session);

        //////////////////////////////////////


    // 查询每天、每个APPID、每个ACTION_TYPE的数量
    $return = Pv::select(
        DB::raw('DATE(FIRST_TIME) as date'),
        'APP_ID',
        'ACTION_TYPE',
        DB::raw('COUNT(*) as count')
    )
    ->groupBy('date', 'APP_ID', 'ACTION_TYPE')
    ->get();

    dd($return);
    // 处理统计结果
    foreach ($return as $statistic) {
        // $statistic->date 是日期
        // $statistic->APP_ID 是应用程序ID
        // $statistic->ACTION_TYPE 是操作类型
        // $statistic->count 是数量
        // 在这里可以根据需要处理统计结果，比如输出到视图或者返回给前端等
    }

        
        $this->assign("list",$return);
    	
    	return view('report.index',$this->data);
    }


}

