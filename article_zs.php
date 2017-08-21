<?php require_once(dirname(__FILE__).'/include/config.inc.php'); 
//初始化参数检测正确性
$cid = $_GET['cid'];
$cid = empty($cid) ? 2 : intval($cid);
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
    <script src="templates/default/js/jquery-1.8.3.min.js"></script>
    <script src="templates/default/js/jquery.fullPage.min.js"></script>
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
        <?php
            //检测文档正确性
            $row = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE id=$id");
            if(@$row)
            {
        ?>
        <?php echo GetPosStr(2); ?>
        <div class="title_hegan width670 margintop35"><?php echo $row['title']; ?></div>
        <div class="cont_hegan width670">
            <?php echo GetContPage($row['content']); ?>
        </div>
        <?php
            }
        ?>
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
                $num_ph=0;
                while($row = $dosql->GetArray())
                {   
                    $num_ph++;
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
                <li><a href='<?php echo $gourl; ?>'><?php echo $num_ph.'、'.$row['title']; ?></a></li>

            <?php  } ?>
            </ul>
            <div class="title_paihang">最新HPV文章</div>
            <ul class="cont_paihang">
            <?php
                $dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=2) AND checkinfo=true AND flag like '%c%' AND delstate !=true ORDER BY orderid DESC",8);
                $num_zx=0;
                while($row = $dosql->GetArray())
                {   
                    $num_zx++;
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
                <li><a href='<?php echo $gourl; ?>'><?php echo $num_zx.'、'.$row['title']; ?></a></li>

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