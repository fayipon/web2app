<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\App;

class AppController extends Controller
{
    // 首頁
    public function index(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

        // 取得当前用户的应用列表
        $return = App::where("USER_ID",$session['user']['ID'])->get();
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/dashboard');
        }
        
        $this->assign("list",$return);
    	
    	return view('app.index',$this->data);
    }

    
    // 创建新应用
    public function create(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

    	
    	return view('app.create',$this->data);
    }
    
    // 创建新应用
    public function insert(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

        $data = $input;
        $data = $this->filiterUpper($data);

        // 检查栏位
        $check_columns = [
            "APP_NAME",
            "APP_SORT_NAME",
            "APP_SETUP_ICON",
            "APP_DESKTOP_ICON",
            "APP_BROWSER_ICON",
            "APP_URL",
            "IS_APP_URL_EDIT",
            "IS_IFRAME",
            "SETUP_URL",
            "SETUP_DEV_NAME",
            "SETUP_RATE",
            "SETUP_RATE_P",
            "SETUP_SETUP_P",
            "SETUP_AGE",
            "SCREEN_TYPE",
            "APP_SCREEN",
            "APP_DESCRIPTION",
            "SETUP_TEMPLE",
            "IS_ANYWHERE_INSTALL",
            "MARK"
        ];

        foreach ($check_columns as $v) {
            if (!isset($data[$v]) || $data[$v] == "") {
                $this->error(__CLASS__, __FUNCTION__, "01");
                return redirect('/app');
            }
        }

        // 设定其他参数
        $data['USER_ID'] = $session['user']['ID'];
        $data['CREATE_TIME'] = date("Y-m-d H:i:s");
        $data['UPDATE_TIME'] = date("Y-m-d H:i:s");
    	
        $data['STATUS'] = 1;

        // 判断APP 是否已用 目前只对URL判断
        $count = App::where("APP_URL",$data['APP_URL'])->where("USER_ID",$session['user']['ID'])->count();
        if ($count > 0) {
            $this->error(__CLASS__, __FUNCTION__, "02");
            return redirect('/app');
        }

        // 填入APP
        $return = App::insert($data);
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "03");
            return redirect('/app');
        }
        
        $this->success(__CLASS__, __FUNCTION__, "01");
        return redirect('/app');
    }

    // 上下架
    public function delist(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

        $data = array();

        // 取得目前APP的status
        $return = App::where("ID", $input['id'])->where("USER_ID",$session['user']['ID'])->first();
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/app');
        }

        // 设定其他参数
        if ($return['STATUS'] == 1) {
            $data['STATUS'] = 0;
        } else {
            $data['STATUS'] = 1;
        }

        // 更新APP
        $return = App::where("ID", $input['id'])->where("USER_ID",$session['user']['ID'])->update($data);
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/app');
        }
        
        $this->success(__CLASS__, __FUNCTION__, "01");
        return redirect('/app');
    }

    // 编辑页
    public function edit(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

        // 取得应用资料
        $return = App::where("ID", $input['id'])->where("USER_ID",$session['user']['ID'])->first();
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/app');
        }

        $this->assign("data",$return);
        
    	return view('app.edit',$this->data);

    }

    // 编辑页
    public function edit_post(Request $request) {
    	
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

        $data = $input;
        $data = $this->filiterUpper($data);

        // 检查栏位
        $check_columns = [
            "APP_NAME",
            "APP_SORT_NAME",
            "APP_SETUP_ICON",
            "APP_DESKTOP_ICON",
            "APP_BROWSER_ICON",
            "APP_URL",
            "IS_APP_URL_EDIT",
            "IS_IFRAME",
            "SETUP_URL",
            "SETUP_DEV_NAME",
            "SETUP_RATE",
            "SETUP_RATE_P",
            "SETUP_SETUP_P",
            "SETUP_AGE",
            "SCREEN_TYPE",
            "APP_SCREEN",
            "APP_DESCRIPTION",
            "SETUP_TEMPLE",
            "IS_ANYWHERE_INSTALL",
            "MARK"
        ];

        foreach ($check_columns as $v) {
            if (!isset($data[$v]) || $data[$v] == "") {
                $this->error(__CLASS__, __FUNCTION__, "02");
                return redirect('/app');
            }
        }

        // 设定其他参数
        $data['USER_ID'] = $session['user']['ID'];
        $data['CREATE_TIME'] = date("Y-m-d H:i:s");
        $data['UPDATE_TIME'] = date("Y-m-d H:i:s");
    	
        $data['STATUS'] = 1;

        // 填入APP
        $return = App::where("ID",$input['id'])->where("USER_ID",$session['user']['ID'])->update($data);
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/app');
        }
        
        $this->success(__CLASS__, __FUNCTION__, "01");
        return redirect('/app');

    }

    // 删除
    public function delete(Request $request) {
        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

        // 更新APP
        $return = App::where("ID", $input['id'])->where("USER_ID",$session['user']['ID'])->delete();
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/app');
        }
        
        $this->success(__CLASS__, __FUNCTION__, "01");
        return redirect('/app');

    }

    // CF API
    public function createSubDomain(Request $request) {

        $this->isLogin();

        $input = $this->getRequest($request);
        $session = Session::all();
        $this->assign("search",$input);

        //////////////////////////////////////

        // Cloudflare API 令牌
        $api_token = env('CF_API');
        $email = env('CF_EMAIL');
        $zone_name = env('CF_DOMAIN');

        // 新增 DNS 记录的数据
        $new_dns_record = array(
            'name' => 'testsub01',   // 记录名称
            'type' => 'A',              // 记录类型
            'content' => '154.204.176.128',   // 记录值
            'ttl' => 120,               // TTL（以秒为单位）
            'proxied' => true          // 是否启用代理
        );

        // 使用 cURL 发送请求
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.cloudflare.com/client/v4/zones");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('name' => $zone_name)));
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = array();
        $headers[] = "X-Auth-Email: $email";
        $headers[] = "X-Auth-Key: $api_token";
        $headers[] = "Content-Type: application/json";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        // 解析响应
        $response_data = json_decode($response, true);

        dd($response_data);
        
        // 获取域名 ID
        $zone_id = $response_data['result'][0]['id'];

        // 使用 cURL 发送添加 DNS 记录的请求
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.cloudflare.com/client/v4/zones/$zone_id/dns_records");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($new_dns_record));
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = array();
        $headers[] = "X-Auth-Email: $email";
        $headers[] = "X-Auth-Key: $api_token";
        $headers[] = "Content-Type: application/json";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        // 输出结果
        echo $result;

    }

}

