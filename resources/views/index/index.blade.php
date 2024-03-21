<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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

</html>