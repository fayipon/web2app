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
        $this->assign("search",$input);
        
        $session = Session::all();
        $this->assign("session",$session);

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

        // 处理图片 
        $request->validate([
            'APP_SETUP_ICON' => 'required|image|mimes:png|max:2048', // 限制文件类型和大小
        ]);

        if ($request->file('APP_SETUP_ICON')) {
            $APP_SETUP_ICON_imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $APP_SETUP_ICON_imageName); // 保存图片到指定目录
            $data['APP_SETUP_ICON'] = $APP_SETUP_ICON_imageName;
        } else {
            dd(1111);
        }


        ///////////////////////

        // 设定其他参数
        $data['USER_ID'] = $session['user']['ID'];
        $data['CREATE_TIME'] = date("Y-m-d H:i:s");
        $data['UPDATE_TIME'] = date("Y-m-d H:i:s");
    	
        $data['STATUS'] = 1;

        // 判断SETUP_URL 是否已用 目前只对URL判断
        $count = App::where("SETUP_URL",$data['SETUP_URL'])->count();
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

        // 执行动态新增子域名
        $return = $this->createSubDomain($data['SETUP_URL']);
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "04");
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
    protected function createSubDomain($subDomain) {


        // Cloudflare API 令牌
        $api_key = env('CF_API');
        $auth_email = env('CF_EMAIL');
        $zone_id = env('CF_ZONEID');

        $data = array(
            "content" => "154.204.176.128",
            "name" => $subDomain,
            "proxied" => true,
            "type" => "A",
            "ttl" => 3600
          );
          
          $curl = curl_init();
          
          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.cloudflare.com/client/v4/zones/{$zone_id}/dns_records",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
              "Content-Type: application/json",
              "X-Auth-Email: {$auth_email}",
              "X-Auth-Key: {$api_key}"
            ),
          ));
          
          $response = curl_exec($curl);
          $err = curl_error($curl);
          
          curl_close($curl);
        
        if ($err) {
          return false;
        } 

        return true;


    }

}

