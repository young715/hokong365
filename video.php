<?php
require_once(dirname(__FILE__).'/include/config.inc.php');
//初始化参数检测正确性
$cid = empty($cid) ? 3 : intval($cid);
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
        <?php echo GetPosStr(3); ?>
        <div class="cont_video">

        <?php
            $dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=3) AND checkinfo=true  AND delstate !=true ORDER BY orderid DESC",20);
            $num_tj=0;
            while($row = $dosql->GetArray())
            {
                $num_tj++;
                if($row['picurl'] != '') $picurl = $row['picurl'];
                else $picurl = 'templates/default/images/nofoundpic.gif';
                
                if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'article_video.php?cid='.$row['classid'].'&id='.$row['id'];
                else if($cfg_isreurl=='Y') $gourl = 'hysd_show-'.$row['classid'].'-'.$row['id'].'-1.html';
                else $gourl = $row['linkurl'];

                $r = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE id=".$row['classid']);
                if(isset($r['classname'])) $classname = $r['classname'];
                else $classname = '';

                if($cfg_isreurl!='Y') $gourl2 = 'case.php?cid='.$row['classid'];
                else $gourl2 = 'case-'.$row['classid'].'-1.html';
        ?>
            <div class="one_share <?php if($num_tj%5==0){ echo 'magin_right_0'; } ?>">
                <a href="<?php echo $gourl; ?>">
                <div><img src="<?php echo $row['picurl']; ?>"></div>
                <div class="bg_video"></div>
                <div class="font_video"><?php echo $row['title']; ?></div>
                </a>
            </div>
        <?php
            }
        ?>

        </div>      
        <?php echo $dopage->GetList(); ?>

</div>
<!-- footer-->
<?php require_once('footer_article.php'); ?>
<!-- footer-->
<script src="templates/default/js/amazeui.min.js"></script>   
</body>
</html>