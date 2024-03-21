<!DOCTYPE html>
<html data-type="google" lang="en">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="pv.js?v={{ $version }}"></script>
<script>

    const xxx_appName = "{{ $app_config['APP_NAME'] }}";
    const xxx_devName = "{{ $app_config['SETUP_DEV_NAME'] }}";
    const xxx_reviews = "{{ $app_config['SETUP_RATE_P'] }}";
    const xxx_downloads = "{{ $app_config['SETUP_SETUP_P'] }}";
    const xxx_appDesc = "{{ $app_config['SETUP_SETUP_P'] }}";
    const xxx_updateDate = "{{ $app_config['UPDATE_TIME'] }}";
    const xxx_logo = "{{ $app_config['APP_BROWSER_ICON'] }}";
    const xxx_rates = "{{ $app_config['SETUP_RATE'] }}";
    const xxx_bannerList = [
      "https://static.w2.app/20240312/b5dde525f819109.jpg",
      "https://static.w2.app/20240312/b5dde525f819109.jpg",
      "https://static.w2.app/20240312/b5dde525f819109.jpg"
    ];

    const xxx_url = "{{ $app_config['APP_URL'] }}";

</script>
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vite App</title>
  <meta name="theme-color" content="#242424" />
  <script type="module" crossorigin src="/front/assets/download-DUmsG0Yw.js?v={{ $version }}"></script>
  <link rel="modulepreload" crossorigin href="/front/assets/_plugin-vue_export-helper-BocP6OtS.js?v={{ $version }}">
  <link rel="stylesheet" crossorigin href="/front/assets/_plugin-vue_export-helper-CdAkKE9q.css?v={{ $version }}">
<link rel="manifest" href="/manifest?id={{ $app_config['ID'] }}">
<script id="vite-plugin-pwa:register-sw" src="/registerSW.js?v={{ $version }}"></script></head>

<body data-type="INSTALL">
  <div id="app"></div>
</body>
<script>var installPrompt = null;
window.addEventListener('beforeinstallprompt', (e) => {
  console.log('beforeinstallprompt');
  e.preventDefault();
  installPrompt = e;
  console.log('e', e);
});

document.addEventListener('DOMContentLoaded', () => {
  const btn = document.querySelector('#reInstall');
  console.log('btn', btn);
  // 如果installPrompt为null，可能是已经安装了PWA应用
  btn.addEventListener('click', () => {
    installPrompt.prompt();
    installPrompt.userChoice.then((choiceResult) => {
      if (choiceResult.outcome === 'accepted') {
        sendDataToAPI('SETUP_02');
        console.log('用户接受安装应用');
      } else {
        console.log('用户拒绝安装应用');
      }
    });
  });
});

window.addEventListener('appinstalled', (e) => {
  localStorage.setItem('isInstalled', true);
  let countdownSeconds = 5;
  const intervalId = setInterval(() => {
    countdownSeconds--;
    if (countdownSeconds <= 0) {
      // 停止倒计时
      clearInterval(intervalId);
      // 显示 alert 对话框
      alert('倒计时结束！');
      window.location.reload();
    }
  }, 1000);
});

window.onload = function () {
  if (localStorage.getItem('isInstalled') === 'true') {
    document.body.dataset.type = 'PLAY';
  }
};

var playLink = window.location.origin;
window.playClick = function () {
  const rootUrl = window.location.origin;
  window.open(rootUrl, '_blank');
};
</script>

<script>
            sendDataToAPI('SETUP_01');
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
</html>