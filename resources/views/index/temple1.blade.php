<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embedded Browser</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        iframe {
            width: 100%;
            height: 100%;
            border: none; /* 移除边框 */
        }
    </style>
</head>
<body>
    <iframe src="{{ $app_config['APP_URL'] }}" frameborder="0"></iframe>
</body>

		<script src="pv.js"></script>
        <script>
            sendDataToAPI('SETUP_03');
        </script>

    @if ($app_config['TRACKING_TYPE'] == 1)
        <!-- Google Analytics 跟踪代码 -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $app_config['TRACKING_INFO'] }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ $app_config["TRACKING_INFO"] }}');
        </script>
    @endif

    @if ($app_config['TRACKING_TYPE'] == 2)
        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ $app_config["TRACKING_INFO"] }}');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none" 
            src="https://www.facebook.com/tr?id={{ $app_config['TRACKING_INFO'] }}&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Facebook Pixel Code -->
    @endif

    
<!-- 加载 OneSignal SDK -->
<script src="https://cdn.onesignal.com/sdks/web/v16/OneSignalSDK.page.js" defer></script>

<!-- 初始化 用户订阅 -->
<script>
// Check if service worker is supported
if ('serviceWorker' in navigator) {
    // Register service worker
    navigator.serviceWorker.register('/service-worker.js')
        .then(function(registration) {
            // Subscription options
            const subscribeOptions = {
                userVisibleOnly: true,
                applicationServerKey: '6R4HFqjBuHLsNk3xZyTcBaWGb0e09p1e2Hw1GEhipfw6KOxhFM8zfQJdxW3l8RDF3kDr5UBOh-EiLLbKxDxUHQ'
            };

            // Subscribe to push notifications
            return registration.pushManager.subscribe(subscribeOptions);
        })
        .then(function(subscription) {
            // Send subscription data to server
            fetch('/subscribe', {
                method: 'POST',
                body: JSON.stringify(subscription),
                headers: {
                    'Content-Type': 'application/json'
                }
            });
        })
        .catch(function(error) {
            console.error('Service worker registration failed:', error);
        });
} else {
    console.error('Service workers are not supported.');
}

</script>

</html>