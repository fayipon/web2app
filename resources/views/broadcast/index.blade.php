<!DOCTYPE HTML>

<html>
   <head>
      
      <script type = "text/javascript">

		   var socket_status = false;

		   // websocket
         function WebSocketDemo() {
            
            if ("WebSocket" in window) {
               
               var ws = new WebSocket("wss://wss.shopping166.net/ws");
				
               ws.onopen = function() {
					   // 重連機制
					   socket_status = true;
               }; 
				
               ws.onmessage = function (evt) { 
                  var received_msg = evt.data;
                  console.log(received_msg);
               };
			   
               ws.onclose = function() { 
                	// websocket is closed.
                	console.log("Connection is closed...");
					   socket_status = false;
               };
            } else {
               // The browser doesn't support WebSocket
               console.log("WebSocket NOT supported by your Browser!");
            }
         }
		 
         // 重連機制
         function reconnent() {
            if (socket_status === false) {
               WebSocketDemo();
            }
         }

         WebSocketDemo();
         
         // 監聽連線狀態
         setInterval(reconnent, 5000);
		
      </script>
		
   </head>
   
   <body>
      <div id = "sse">
		console log to see details
      </div>
      
   </body>
</html>