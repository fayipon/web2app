<!DOCTYPE html>
<html data-type="google" lang="en">

<script>

    const xxx_appName = "名称字段对应的信息22";
    const xxx_devName = "开发者名称22";
    const xxx_reviews = 1e3;
    const xxx_downloads = 1e4;
    const xxx_appDesc = "应用介绍22";
    const xxx_updateDate = "2024-03-12";
    const xxx_logo = "https://static.w2.app/20240312/10589f99216266d.png";
    const xxx_rates = 4.5;
    const xxx_bannerList = [
      "https://static.w2.app/20240312/b5dde525f819109.jpg",
      "https://static.w2.app/20240312/b5dde525f819109.jpg",
      "https://static.w2.app/20240312/b5dde525f819109.jpg"
    ];

    const xxx_url = "https://m.fhcp.app/index";

    // manifest.webmanifest
    const xxx_name = "名称";
    const xxx_short_name = "短名称";
    const xxx_start_url = "/";
    const xxx_display = "standalone";
    const xxx_background_color = "#ffffff";
    const xxx_lang = "en";
    const xxx_scope = "/";
    const xxx_icons = [
        {
            "src": "https://w2app.s3.ap-southeast-1.amazonaws.com/20240312/846b5b205e49ad4.png",
            "sizes": "192x192",
            "type": "image/png"
        },
        {
            "src": "https://playdl.goplaygooglezb8.com/images/512.jpg",
            "sizes": "512x512",
            "type": "image/png"
        }
    ];
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
<link rel="manifest" href="/manifest.webmanifest">
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
</script>
</html>