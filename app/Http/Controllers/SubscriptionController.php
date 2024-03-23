<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription as WebPushSubscription;

use App\Models\Subscription;

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
        $subscription = new Subscription([
            'endpoint' => $request->input('endpoint'),
            'p256dh' => $request->input('keys.p256dh'),
            'auth' => $request->input('keys.auth'),
        ]);
        $subscription->save();

        // 发送欢迎消息
        $this->sendWelcomeNotification($subscription);

        return response()->json(['message' => 'Subscription received successfully'], 200);
    }

    // 发送欢迎消息
    private function sendWelcomeNotification($subscription)
    {
        $vapidPublicKey = "MFkwEwYHKoZIzj0CAQYIKoZIzj0DAQcDQgAEw3998pVnUXDZSg3ZRnATZc3Doqdf
        t9G+DZO9N85O115bjo0R+NPQqrAcVBICS9l6FAet271gaUfpOUqbt2O0JQ==";
        $vapidPrivateKey = "MHcCAQEEIP9s5sh3//VLFHqQvRAoOn3yTrieQZwa1Gq4/TgHUvNpoAoGCCqGSM49
        AwEHoUQDQgAEw3998pVnUXDZSg3ZRnATZc3Doqdft9G+DZO9N85O115bjo0R+NPQ
        qrAcVBICS9l6FAet271gaUfpOUqbt2O0JQ==";

        // 创建 WebPush 对象
        $webPush = new WebPush([
            'VAPID' => [
                'subject' => config('webpush.vapid.subject'),
                'publicKey' => $vapidPublicKey,
                'privateKey' => $vapidPrivateKey,
            ],
        ]);

        // 创建订阅对象
        $webPushSubscription = new WebPushSubscription(
            $subscription->endpoint,
            $subscription->p256dh,
            $subscription->auth
        );

        // 发送推送通知
        $webPush->sendOneNotification($webPushSubscription, 'Welcome to our website!');

        // 检查发送结果
        foreach ($webPush->flush() as $report) {
            if ($report->isSuccess()) {
                // 推送通知发送成功
                // 可以记录日志或执行其他操作
            } else {
                // 推送通知发送失败
                // 可以记录日志或执行其他操作
            }
        }
    }
}
