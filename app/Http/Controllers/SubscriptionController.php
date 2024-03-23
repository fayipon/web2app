<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        // 验证请求数据
        $request->validate([
            'endpoint' => 'required',
            'keys' => 'required|array',
            'keys.p256dh' => 'required|string',
            'keys.auth' => 'required|string',
        ]);

        // 保存订阅信息到数据库或其他存储方式
        $subscription = [
            'endpoint' => $request->input('endpoint'),
            'p256dh' => $request->input('keys.p256dh'),
            'auth' => $request->input('keys.auth'),
        ];
        dd($subscription);

        // 进行其他逻辑处理，例如发送欢迎邮件、记录日志等

        return response()->json(['message' => 'Subscription received successfully'], 200);
    }
}
