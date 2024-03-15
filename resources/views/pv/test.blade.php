@extends('layout.main')

@section('content')

                <!-- TEST -->
                <script>

                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/api-pv', true);
                xhr.setRequestHeader('Content-Type', 'application/json');

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 201) {
                        var responseData = JSON.parse(xhr.responseText);
                        console.log(responseData);
                    }
                };

                // 准备要发送的数据
                var postData = {
                    APP_ID: 'foo',
                    USER_ID: 'bar',
                    DEVICE: 1
                };

                // 将 JavaScript 对象转换为 JSON 字符串
                var jsonData = JSON.stringify(postData);

                // 发送请求
                xhr.send(jsonData);


                </script>
                <!-- /TEST -->
@endsection