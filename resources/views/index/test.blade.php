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
