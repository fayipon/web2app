<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

use App\Models\Pv;
use App\Models\App;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        // 验证请求数据
        $request->validate([
            'endpoint' => 'required',
            'keys' => 'required',
        ]);

        // 保存订阅信息到数据库或者其他存储方式
        $subscription = [
            'endpoint' => $request->input('endpoint'),
            'keys' => $request->input('keys'),
        ];

        // 在这里进行进一步的逻辑处理，例如保存到数据库等

        return response()->json(['message' => 'Subscription received successfully'], 200);
    }

}

