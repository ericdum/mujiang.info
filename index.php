<!doctype html>
<html>
<meta charset="UTF-8" />
<title>木匠手记</title>
<style>
body{
    font: 12px/18px "Lucida Grande", "Lucida Sans Unicode", Helvetica, Arial, Verdana, sans-serif;
    font-size: 18px;
    -webkit-font-smoothing: antialiased;
}
div {
    position: relative;
    width: 400px;
    margin: 20% auto;
    padding: 20px 0;
    -webkit-box-shadow: 5px 6px 15px 0px rgba(0,0,0,0.40);
    -moz-box-shadow: 5px 6px 15px 0px rgba(0,0,0,0.40);
    box-shadow: 5px 6px 15px 0px rgba(0,0,0,0.40); 
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    overflow: hidden;
}
div:before {
    content: " ";
    position: absolute;
    bottom: 0;
    height: 10px;
    background-color: #f6b580;
    transition: width 3s linear 1s;
    -webkit-transition: width 3s linear 1s;
}
.loaded div:before {
    width: 100%;
}

p { text-align: center; }
a {
    color: #882823;
    font-weight: bold;
    text-decoration: none;
}
a:hover {
    color: #501714;
}

</style>

<body>
    <?php $url = "https://github.com/ericdum/mujiang.info/issues/1"?>
    <?php $tit = "技术需要整理"?>
    <div>
        <p><a href="/">木匠手记</a>正在制作中
        <p>请先访问Github Blog: <a href="<?php echo $url?>"><?php echo $tit?></a>

    <script>
        document.body.className = "loaded";
        setTimeout(function(){location.href = "<?php echo $url?>";}, 3000);
    </script>
