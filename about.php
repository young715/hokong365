<?php
phpinfo();
require_once(dirname(__FILE__).'/include/config.inc.php');
//初始化参数检测正确性
$cid = empty($cid) ? 6 : intval($cid);
?>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta content="always" name="referrer">
    <meta name="theme-color" content="#2932e1">
    <?php echo GetHeader(1,$cid); ?>    
    <link rel="stylesheet" href="templates/default/style/amazeui.min.css"/>
    <link rel="stylesheet" href="templates/default/style/jquery.fullPage.css">
    <link rel="stylesheet" href='templates/default/style/style.css'/>       
    <link rel="stylesheet" href='templates/default/style/index.css'/>  
    <script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
    <script type="text/javascript" src="templates/default/js/top.js"></script>
</head>
<style>
.title_zhishi { margin-top: 30px; width: 1200px;}
</style>
<body>
<!-- header-->
<?php require_once('header_other.php'); ?>
<!-- header-->

<!-- header_mobile-->
<?php require_once('header_mobile.php'); ?>
<!-- header_mobile-->

<div class="ad_zhishi" style="background:#9ce9eb;">
    <img src="templates/default/images/ad_zs.jpg">
</div>


<div class="cont_zhishi">
        <?php echo GetPosStr(6); ?>
        <div class="cont_video">
            <div class="title_hegan"><?php echo GetCatName($cid); ?></div>
            <div class="cont_hegan">
                <?php echo Info($cid); ?>
            </div>
        </div>
</div>

<!-- footer-->
<?php require_once('footer_article.php'); ?>
<!-- footer-->
<script src="templates/default/js/amazeui.min.js"></script>   
</body>
</html>