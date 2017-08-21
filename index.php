<?php require_once(dirname(__FILE__).'/include/config.inc.php'); 
//初始化参数检测正确性
$cid = empty($cid) ? 1 : intval($cid);
?>
<html>
<head>      
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta content="always" name="referrer">
    <meta name="theme-color" content="#2932e1">
    <meta name="baidu-site-verification" content="fQ09ZiINwI" />
    <title>和港健康</title>
    <meta name="generator" content="和港健康" />
    <meta name="author" content="" />
    <meta name="keywords" content="和港健康-宫颈癌疫苗-HPV疫苗-HPV病毒-香港hpv疫苗-hpv疫苗价格-HPV疫苗预约-香港HPV疫苗预约" />
    <meta name="description" content="和港健康-香港宫颈癌疫苗HPV疫苗预约网站，精准对接香港HPV医疗机构，提供最优质的HPV疫苗预约，宫颈癌疫苗预约接种服务" />
    <link rel="stylesheet" href="templates/default/style/amazeui.min.css"/>
    <link rel="stylesheet" href="templates/default/style/jquery.fullPage.css">
    <link rel="stylesheet" href='templates/default/style/style.css'/>       
    <link rel="stylesheet" href='templates/default/style/index.css'/>   
    <script src="templates/default/js/jquery-1.8.3.min.js"></script>
    <script src="templates/default/js/jquery.fullPage.min.js"></script>
</head>
<body>

<!-- header-->
<?php require_once('header.php'); ?>
<!-- header-->

<!-- header_mobile-->
<?php require_once('header_mobile.php'); ?>
<!-- header_mobile-->
<div class="anv_fixed">
</div>

<div id="dowebok">
    <div class="section hotpic">

            <?php
            $dopage->GetPage("SELECT * FROM `#@__infoimg` WHERE (classid=7) AND checkinfo=true  ORDER BY orderid DESC",3);
            $num=0;
            while($row = $dosql->GetArray())
            {
                $num++;
                if($num==6){$num=0;}
                if($row['picurl'] != '') $picurl = $row['picurl'];
                else $picurl = 'templates/default/images/nofoundpic.gif';
                
                if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'detail_dynamic.php?cid='.$row['classid'].'&id='.$row['id'];
                else if($cfg_isreurl=='Y') $gourl = 'hysd_show-'.$row['classid'].'-'.$row['id'].'-1.html';
                else $gourl = $row['linkurl'];

                $r = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE id=".$row['classid']);
                if(isset($r['classname'])) $classname = $r['classname'];
                else $classname = '';

                if($cfg_isreurl!='Y') $gourl2 = 'case.php?cid='.$row['classid'];
                else $gourl2 = 'case-'.$row['classid'].'-1.html';
            ?>

                    <div class="slide"><a href="#"><img src="<?php echo $row['picurl']; ?>"></a></div>
            <?php  } ?>


    </div>
    <div class="section">
        <div class="title_fgjz"><img src="templates/default/images/title_ffjz.png" alt="赴港接种HPV疫苗的必要性"></div>
        <div class="cont_fugan"><img src="templates/default/images/fugan.png"></div>
    </div>
    <div class="section">
        <div class="title_yyxz"><img src="templates/default/images/title_yyxz.png" alt="预约香港安盛医疗"></div>
        <div class="iconlist"><img src="templates/default/images/iconlist.png"></div>
        <div class="addr"><img src="templates/default/images/addr.jpg" usemap="#Map" border="0">
          <map name="Map">
            <area shape="rect" coords="435,376,590,409" href="http://www.hokong365.com/vaccine.php">
            <area shape="rect" coords="793,358,960,416" href="tencent://AddContact/?fromId=45&fromSubId=1&subcmd=all&uin=505326711&website=www.hokong365.com">
          </map>
        </div>
    </div>
    <div class="section">
        <div class="title_yhfx"><img src="templates/default/images/title_yhfx.png" alt="用户赴港接种疫苗分享"></div>
        <div class="cont_share">
            
            <?php
                $dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=5) AND checkinfo=true AND flag like '%c%' AND delstate !=true ORDER BY orderid DESC",10);
                $num=0;
                while($row = $dosql->GetArray())
                {
                    $num++;
                    if($row['picurl'] != '') $picurl = $row['picurl'];
                    else $picurl = 'templates/default/images/nofoundpic.gif';
                    
                    if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'article_share.php?cid='.$row['classid'].'&id='.$row['id'];
                    else if($cfg_isreurl=='Y') $gourl = 'hysd_show-'.$row['classid'].'-'.$row['id'].'-1.html';
                    else $gourl = $row['linkurl'];

                    $r = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE id=".$row['classid']);
                    if(isset($r['classname'])) $classname = $r['classname'];
                    else $classname = '';

                    if($cfg_isreurl!='Y') $gourl2 = 'case.php?cid='.$row['classid'];
                    else $gourl2 = 'case-'.$row['classid'].'-1.html';
            ?>
            <div class="one_share <?php if($num%5==0){ echo 'magin_right_0';} ?>">
                <a href="<?php echo $gourl; ?>" target='_blank'>
                <div><img src="<?php echo $row['picurl']; ?>"></div>
                <div class="font_share"><?php echo $row['title']; ?></div>
                </a>
            </div>
            <?php  } ?>

        </div>
        <div class="btn_share"><a href='share.php'>MORE</a></div>
    </div>
    <div class="section">
        <div class="title_xgsp"><img src="templates/default/images/title_xgsp.png" alt="相关视频"></div>
        <div class="cont_share">

            <?php
                $dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=3) AND checkinfo=true AND flag like '%c%' AND delstate !=true ORDER BY orderid DESC",10);
                $num=0;
                while($row = $dosql->GetArray())
                {
                    $num++;
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

            <div class="one_share <?php if($num==5 or $num==10){ echo 'magin_right_0'; } ?>">
                <a href="<?php echo $gourl; ?>" target='_blank'>
                <div><img src="<?php echo $row['picurl']; ?>"></div>
                <div class="bg_video"></div>
                <div class="font_video"><?php echo $row['title']; ?></div>
                </a>
            </div>

            <?php  } ?>
        </div>
        <div class="btn_share"><a href='video.php'>MORE</a></div>
    </div>
    <div class="section">
        <div class="title_xgzs"><img src="templates/default/images/title_xgzs.png" alt="HPV相关知识"></div>
        <div class="cont_xgzs">
            <ul>
            <?php
                $dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=2) AND checkinfo=true AND flag like '%c%' AND delstate !=true ORDER BY orderid DESC",16);
                $num=0;
                while($row = $dosql->GetArray())
                {
                    if($row['picurl'] != '') $picurl = $row['picurl'];
                    else $picurl = 'templates/default/images/nofoundpic.gif';
                    
                    if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'article_zs.php?cid='.$row['classid'].'&id='.$row['id'];
                    else if($cfg_isreurl=='Y') $gourl = 'hysd_show-'.$row['classid'].'-'.$row['id'].'-1.html';
                    else $gourl = $row['linkurl'];

                    $r = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE id=".$row['classid']);
                    if(isset($r['classname'])) $classname = $r['classname'];
                    else $classname = '';

                    if($cfg_isreurl!='Y') $gourl2 = 'case.php?cid='.$row['classid'];
                    else $gourl2 = 'case-'.$row['classid'].'-1.html';
            ?>
                <li><a href='<?php echo $gourl; ?>' target='_blank'><?php echo $row['title']; ?></a></li>

            <?php  } ?>
            </ul>
        </div>

<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- footer-->

    </div>
</div>

<script src="templates/default/js/amazeui.min.js"></script>    
<script>
$(function(){
    wid_client = document.body.clientWidth;
    $('.hotpic img').css('width',wid_client);
    $('#dowebok').fullpage({
        sectionsColor: ['#ffffff', '#ffffff', '#ebebeb', '#ffffff', '#ebebeb', '#ffffff'],
        'navigation': true
    });
});
</script>
</body>
</html>