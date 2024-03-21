<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Pv;
use App\Models\App;
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
        $return = Pv::get();

        $list = array();
        // 处理统计结果
        foreach ($return as $k => $v) {
            $date = explode(" ", $v['CREATE_TIME']);
            $date = $date[0];

            dd($date);
            if ($v['APP_ID'] == "") {
                continue;
            }
            $app_id = $v['APP_ID'];
            

            $cc = App::where("ID",$app_id)->first();
            $list[$date][$app_id]['APP_NAME'] = $cc['APP_NAME'];
            $list[$date][$app_id]['DATE'] = $date;

            switch ($v['ACTION_TYPE']) {
                case "SETUP_01":
                    @$list[$date][$app_id]['SETUP_PAGE_PV']++;
                    break;
                case "SETUP_02":
                    @$list[$date][$app_id]['SETUP_COUNT']++;
                    break;
                case "SETUP_03":
                    @$list[$date][$app_id]['APP_PV']++;
                    break;
            }

            
        }
        
        $this->assign("list",$return);
    	
    	return view('report.index',$this->data);
    }


}

