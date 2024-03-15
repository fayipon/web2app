<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Channel;

class ChannelController extends Controller
{
    // 首頁
    public function index(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

        // 取得当前用户的应用列表
        $return = Channel::where("USER_ID",$session['user']['ID'])->get();
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/dashboard');
        }
        
        $this->assign("list",$return);
    	
    	return view('channel.index',$this->data);
    }

    // 新增页
    public function create_page(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

    	return view('channel.create-page',$this->data);

    }

    // 新增
    public function create(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

        $data = $input;
        $data = $this->filiterUpper($data);

        
        // 检查栏位
        $check_columns = [
            "CHANNEL_NAME"
        ];

        foreach ($check_columns as $v) {
            if (!isset($data[$v]) || $data[$v] == "") {
                $this->error(__CLASS__, __FUNCTION__, "01");
                return redirect('/channel');
            }
        }

        
        // 设定其他参数
        $data['USER_ID'] = $session['user']['ID'];
        $data['CREATE_TIME'] = date("Y-m-d H:i:s");
        $data['UPDATE_TIME'] = date("Y-m-d H:i:s");
    	
        $data['STATUS'] = 1;

        // 填入APP
        $return = Channel::insert($data);
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "03");
            return redirect('/channel');
        }
        
        $this->success(__CLASS__, __FUNCTION__, "01");
        return redirect('/channel');
    }

    // 编辑页
    public function edit_page(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

        $return = Channel::where("USER_ID",$session['user']['ID'])->where("ID",$input['id'])->first();
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/dashboard');
        }
        $this->assign("data",$return);

    	return view('channel.edit-page',$this->data);

    }

    // 编辑
    public function edit(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////
        $data = $input;
        $data = $this->filiterUpper($data);

        // 检查栏位
        $check_columns = [
            "CHANNEL_NAME"
        ];

        foreach ($check_columns as $v) {
            if (!isset($data[$v]) || $data[$v] == "") {
                $this->error(__CLASS__, __FUNCTION__, "01");
                return redirect('/channel');
            }
        }

        // 编辑渠道
        $return = Channel::where("ID",$input['id'])->update($data);
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "02");
            return redirect('/channel');
        }

        $this->success(__CLASS__, __FUNCTION__, "01");
        return redirect('/channel');
    }


    // 禁用启用
    public function delist(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////
        
        $data = array();

        $return = Channel::where("USER_ID",$session['user']['ID'])->where("ID",$input['id'])->first();
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/dashboard');
        }

        // 设定其他参数
        if ($return['STATUS'] == 1) {
            $data['STATUS'] = 0;
        } else {
            $data['STATUS'] = 1;
        }
        
        // 更新
        $return = Channel::where("ID", $input['id'])->where("USER_ID",$session['user']['ID'])->update($data);
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/app');
        }
        
        $this->success(__CLASS__, __FUNCTION__, "01");
        return redirect('/app');

    }

}

