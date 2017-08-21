<?php
require_once(dirname(__FILE__).'/include/config.inc.php');
//初始化参数检测正确性
$cid = empty($cid) ? 5 : intval($cid);
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
    <div class="left_zhishi">
        <?php echo GetPosStr(5); ?>

        <?php
            $dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=5) AND checkinfo=true  AND delstate !=true ORDER BY orderid DESC",10);
            $num_share=1;
            while($row = $dosql->GetArray())
            {
                if($num_share == 1){
                    $num_share = 2;
                }else{ 
                    $num_share = 1;
                }
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

        <div class="one_zhishi height215 <?php if($num_share==1){ echo 'bg_fdfdfd';} ?> ">
            <div class="fl"><a href="<?php echo $gourl; ?>"><img src="<?php echo $row['picurl']; ?>"></a></div>
            <div class="area_fx">
            <div class="title_article wid460 no_bg padtop10"><a href="<?php echo $gourl; ?>"><?php echo $row['title']; ?></a><span>发表于 <?php echo date('Y-m-d',$row['posttime']); ?></span></div>
            <div class="zy_article wid460"><?php echo mb_substr($row['description'],0,80,'utf-8').' ......';?></div>
            </div>
        </div>

        <?php
            }
        ?>

        <?php echo $dopage->GetList(); ?>
    </div>
    <div class="right_zhishi">
        <div class="right_ad">
            <div class="area_rigad">
            <?php
                $dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=8) AND checkinfo=true AND flag like '%c%' AND delstate !=true ORDER BY orderid DESC",2);
                $num_tj=0;
                while($row = $dosql->GetArray())
                {
                    $num_tj++;
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
            <?php 
                if($num_tj==1){
            ?>
                <div class="one_rigad"><a href="<?php echo $gourl; ?>"><img src="<?php echo $row['picurl']; ?>" width='195' height='138' ><?php echo $row['title']; ?></a></div>
            <?php
                }else if($num_tj==2){ 
            ?>
                <div class="one_rigad" style="margin-right:0px;"><a href="<?php echo $gourl; ?>"><img src="<?php echo $row['picurl']; ?>" width='195' height='138' ><?php echo $row['title']; ?></a></div>
            <?php   }} ?>

            </div>
            <div class="title_paihang">文章总排行</div>
            <ul class="cont_paihang">
            <?php
                $dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=2 or classid=3 or classid=5) AND checkinfo=true AND flag like '%c%' AND delstate !=true ORDER BY hits DESC",8);
                $num=0;
                while($row = $dosql->GetArray())
                {   
                    $num++;
                    if($row['picurl'] != '') $picurl = $row['picurl'];
                    else $picurl = 'templates/default/images/nofoundpic.gif';
                    
                    if($row['linkurl']=='' and $cfg_isreurl!='Y'){
                        if($row['classid']==2){
                            $gourl = 'article_zs.php?cid='.$row['classid'].'&id='.$row['id'];
                        }else if($row['classid']==3){ 
                            $gourl = 'article_video.php?cid='.$row['classid'].'&id='.$row['id'];
                        }else if($row['classid']==5){ 
                            $gourl = 'article_share.php?cid='.$row['classid'].'&id='.$row['id'];
                        }
                    }
                    else if($cfg_isreurl=='Y') $gourl = 'hysd_show-'.$row['classid'].'-'.$row['id'].'-1.html';
                    else $gourl = $row['linkurl'];

                    $r = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE id=".$row['classid']);
                    if(isset($r['classname'])) $classname = $r['classname'];
                    else $classname = '';

                    if($cfg_isreurl!='Y') $gourl2 = 'case.php?cid='.$row['classid'];
                    else $gourl2 = 'case-'.$row['classid'].'-1.html';
            ?>
                <li><a href='<?php echo $gourl; ?>'><?php echo $num.'、'.$row['title']; ?></a></li>

            <?php  } ?>
            </ul>
            <div class="title_paihang">最新HPV文章</div>
            <ul class="cont_paihang">
            <?php
                $dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=2) AND checkinfo=true AND flag like '%c%' AND delstate !=true ORDER BY orderid DESC",8);
                $num=0;
                while($row = $dosql->GetArray())
                {   
                    $num++;
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
                <li><a href='<?php echo $gourl; ?>'><?php echo $num.'、'.$row['title']; ?></a></li>

            <?php  } ?>
            </ul>
        </div>
    </div>
</div>

<!-- footer-->
<?php require_once('footer_article.php'); ?>
<!-- footer-->

<script src="templates/default/js/amazeui.min.js"></script>     
</body>
</html>