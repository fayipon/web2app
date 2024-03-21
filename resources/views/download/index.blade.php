<!DOCTYPE html>
<html data-type="google" lang="en">

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
<script>
var installPrompt = null;
window.addEventListener('beforeinstallprompt', (e) => {
  console.log('beforeinstallprompt');
  e.preventDefault();
  installPrompt = e;
  console.log('e', e);
});

document.addEventListener('DOMContentLoaded', () => {
  const btn = document.querySelector('#reInstall');
  console.log('btn', btn);

  btn.addEventListener('click', () => {
    installPrompt.prompt();
    installPrompt.userChoice.then((choiceResult) => {
      if (choiceResult.outcome === 'accepted') {
        console.log('用户接受安装应用');
      } else {
        console.log('用户拒绝安装应用');
      }
    });
  });
});

window.addEventListener('appinstalled', (e) => {
  // 获取当前页面的根目录URL
  const rootUrl = window.location.origin;
  // 在新窗口或标签页中打开根目录URL
  window.open(rootUrl, '_blank');
});
</script>
</html>