<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Push Notification Subscription</title>
    <script>
        if ('serviceWorker' in navigator && 'PushManager' in window) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
                    console.log('Service Worker registered with scope:', registration.scope);
                    askPermission(registration);
                }).catch(function(err) {
                    console.error('Service Worker registration failed:', err);
                });
            });

            async function askPermission(registration) {
                const permission = await Notification.requestPermission();
                if (permission === 'granted') {
                    const subscription = await registration.pushManager.subscribe({
                        userVisibleOnly: true,
                        applicationServerKey: '6R4HFqjBuHLsNk3xZyTcBaWGb0e09p1e2Hw1GEhipfw6KOxhFM8zfQJdxW3l8RDF3kDr5UBOh-EiLLbKxDxUHQ'
                    });
                    sendSubscriptionToServer(subscription);
                }
            }

            async function sendSubscriptionToServer(subscription) {
                try {
                    const response = await fetch('/subscribe', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(subscription)
                    });
                    console.log('Subscription successful:', response);
                } catch (err) {
                    console.error('Error sending subscription to server:', err);
                }
            }
        } else {
            console.warn('Push messaging is not supported.');
        }
    </script>
</head>
<body>
    <h1>Web Push Notification Subscription</h1>
</body>
</html>
