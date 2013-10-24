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
    margin: 20% auto 0;
    padding: 20px 0;
    -webkit-box-shadow: 5px 6px 15px 0px rgba(0,0,0,0.40);
    -moz-box-shadow: 5px 6px 15px 0px rgba(0,0,0,0.40);
    box-shadow: 5px 6px 15px 0px rgba(0,0,0,0.40); 
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    transition: margin .5s linear;
    -webkit-transition: margin .5s linear;
    border-radius: 10px;
    overflow: hidden;
}
div:before {
    content: " ";
    position: absolute;
    bottom: 0;
    height: 10px;
    background-color: #f6b580;
    transition: width 3s linear;
    -webkit-transition: width 3s linear;
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
    <?php include("ga.php"); ?>

<body>
    <?php $articles = array(
            "技术需要整理" => "https://github.com/ericdum/mujiang.info/issues/1",
            "浏览器阻塞探究" => "https://github.com/ericdum/mujiang.info/issues/2",
        );
    ?>
    <div>
        <p><a href="/">木匠手记</a>正在制作中
        <p>请先访问Github Blog:
        <?php foreach($articles as $title => $url ): ?>
            <p><a href="<?php echo $url?>"><?php echo $title?></a>
        <?php endforeach;?>

    <script>
        function resize(){
            var div = document.getElementsByTagName('div')[0];
            div.style.marginTop = (document.body.scrollHeight - div.offsetHeight)*0.4 + "px"
        }
        window.onresize = resize;
        resize();
        //document.body.className = "loaded";
        //setTimeout(function(){location.href = "<?php echo $url?>";}, 3000);
    </script>
