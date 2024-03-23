<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Push Notification Subscription</title>
    <script>
        // Check if push messaging is supported  
    if (!('PushManager' in window)) {  
       console.log('Push messaging isn\'t supported.');  
     }
   //
   if (Notification.permission === 'denied') {  
      console.log('The user has blocked notifications.');  
   }


    </script>
</head>
<body>
    <h1>Web Push Notification Subscription</h1>
</body>
</html>
