<?php /*a:1:{s:57:"/home/www/tp5/application/index/view/index/set_linux.html";i:1571623352;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div><a href="<?php echo url('index/hello'); ?>">前台</a></div>
</body>
<script>
    // ws = new WebSocket("wss://49.235.85.113:2346");
    // ws.onopen = function() {
    //     alert("连接成功");
    //     ws.send('tom');
    //     alert("给服务端发送一个字符串：tom");
    // };
    // ws.onmessage = function(e) {
    //     alert("收到服务端的消息：" + e.data);
    // };

    ws = new WebSocket("wss://www.liumm.xyz:2345");
    ws.onopen = function() {
        alert("连接成功");
        ws.send('hello,thinkphp');
        alert("给服务端发送一个字符串：hello,thinkphp");
    };
    ws.onmessage = function(e) {
        alert("收到服务端的消息：" + e.data);
    };
</script>
</html>