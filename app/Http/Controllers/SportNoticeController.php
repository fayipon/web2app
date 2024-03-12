<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

use App\Models\Agent;
use App\Models\Player;

use App\Models\ClientMarquee;

class SportNoticeController extends Controller {

    protected $current = "sport_notice"; 
        
    // 首頁
    public function index(Request $request) {
            
        $this->isLogin();

        $this->permission($this->current);
        
        //////////////////
            
        $input = $this->getRequest($request);
        $session = Session::all();

        //////////////////

        $return = ClientMarquee::orderBy("id","DESC")
        ->orderBy("order_by","DESC")
        ->paginate($this->per_page);
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/sport/notice');
        }

        $this->assign("data",$return);

        return view('sport_notice.index',$this->data);
    } 

    // get_notice
    public function get_notice(Request $request) {
        $this->isLogin();

        $this->permission($this->current);
        
        //////////////////
            
        $input = $this->getRequest($request);
        $session = Session::all();

        //////////////////

        $notice_id = $input['id'];

        $return = ClientMarquee::where("id",$notice_id)->first();
        if ($return === false) {
          $this->ajaxError("error_ajax_get_notice_" . "01");
        }

        $this->ajaxSuccess("success_ajax_get_notice_" . "01",$return);
    }

    // edit_notice
    public function edit_notice(Request $request) {
        $this->isLogin();

        $this->permission($this->current);
        
        //////////////////
            
        $input = $this->getRequest($request);
        $session = Session::all();

        //////////////////

        $notice_id = $input['id'];

        $return = ClientMarquee::where("id",$notice_id)->update([
            "title" => $input['title'],
            "marquee" => $input['marquee'],
            "order_by" => $input['order_by'],
            "status" => $input['status']
        ]);
        if ($return === false) {
          $this->ajaxError("error_ajax_edit_notice_" . "01");
        }

        $this->ajaxSuccess("success_ajax_edit_notice_" . "01",$return);
    }


}

