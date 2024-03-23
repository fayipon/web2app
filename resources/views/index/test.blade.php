<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Push Notification Subscription</title>
    <script>

        async function subscribeUser() {
            if ('serviceWorker' in navigator && 'PushManager' in window) {
                try {
                    const registration = await navigator.serviceWorker.register('/service-worker.js');
                    console.log('Service Worker registered with scope:', registration.scope);
                    
                    const permission = await Notification.requestPermission();
                    if (permission === 'granted') {

                        // 转换 VAPID 公钥为 Uint8Array 格式
                        const vapidPublicKey = 'MFkwEwYHKoZIzj0CAQYIKoZIzj0DAQcDQgAEmikgR6lDP44sBhXJpSwt3dJz3+ljLsGVAIRiDT9Lr4JKoobcW7vlNO5hVVeHKXMuGwNvvjUSkOnIaQRfmM7rnw==';

                        const applicationServerKey = urlBase64ToUint8Array(vapidPublicKey);
                        

                        const subscription = await registration.pushManager.subscribe({
                            userVisibleOnly: true,
                            applicationServerKey: applicationServerKey
                        });
                        sendSubscriptionToServer(subscription);
                    }
                } catch (error) {
                    console.error('Service Worker registration failed:', error);
                }
            } else {
                console.warn('Push messaging is not supported.');
            }
        }

        window.addEventListener('load', subscribeUser);

        // 将 Base64 编码的字符串转换为 Uint8Array 格式
        function urlBase64ToUint8Array(base64String) {
            const padding = '='.repeat((4 - base64String.length % 4) % 4);
            const base64 = (base64String + padding)
                .replace(/\-/g, '+')
                .replace(/_/g, '/');

            const rawData = window.atob(base64);
            const outputArray = new Uint8Array(rawData.length);

            for (let i = 0; i < rawData.length; ++i) {
                outputArray[i] = rawData.charCodeAt(i);
            }

            return outputArray;
        }

        async function sendSubscriptionToServer(subscription) {
            try {
                // Extract endpoint and keys from subscription object
                const endpoint = subscription.endpoint;
                const keys = {
                    p256dh: subscription.toJSON().keys.p256dh,
                    auth: subscription.toJSON().keys.auth
                };

                const subscriptionData = {
                    endpoint: endpoint,
                    keys: keys
                };

                const response = await fetch('/subscribe', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(subscriptionData)
                });
                console.log('Subscription successful:', response);
            } catch (err) {
                console.error('Error sending subscription to server:', err);
            }
        }

        window.addEventListener('load', subscribeUser);

    </script>
</head>
<body>
    <h1>Web Push Notification Subscription</h1>
</body>
</html>
