<!doctype html>
<html>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>js卡渲染进程测试</title>
    <script>
        var time1 = (new Date()).getTime();
        while(((new Date()).getTime()-time1) < 3000);
    </script>
    <body>
        <p>在3秒以后看到这行字说明被head中执行的js卡住了<span id="realduration" style="color: red"></span></p>
        <script> realduration.textContent = ((new Date()).getTime()-time1)/1000 + 's'; </script>

        <h3>body中执行js</h3>
        <script>
            var time2 = (new Date()).getTime();
            while(((new Date()).getTime()-time2) < 3000);
        </script>
        <p>这行字应该被卡了3秒，实际<span id="realduration2" style="color: red"></span>
        <script> realduration2.textContent = ((new Date()).getTime()-time2)/1000 + 's'; </script>

        <h3>测试外调js</h3>
        <p>加载一个3秒延时的js: loadding <span id="timer2">0</span>s</p>
        <script>
            var time = (new Date()).getTime();
            var intv = setInterval(function(){ timer2.textContent = ((new Date()).getTime()-time)/1000 }, 50);
        </script>
        <script onload="clearInterval(intv);" src="http://mujiang.info/delayload/3s.php"></script>

        <p>同时加载一个5秒、10秒延时的js: loadding <span id="timer3">0</span>s</p>
        <script>
            var time = (new Date()).getTime();
            var intv = setInterval(function(){ timer3.textContent = ((new Date()).getTime()-time)/1000 }, 50);
        </script>
        <script src="http://mujiang.info/delayload/5s.php"></script>
        <script onload="clearInterval(intv);" src="http://mujiang.info/delayload/10s.php"></script>
        <p>执行总时间：

        <script> document.write(((new Date()).getTime()-time1)/1000 + 's'); </script>
        <?php include("../../ga.php"); ?>
