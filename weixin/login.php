<?php 
//微信授权登录的首页

$appid = 'wxe52bd7ed62381b3e';
$secret = 'fc1b90080cd788a8d82d835b8bfb2f92';
$url = urlencode('http://www.car-cyber.net/weixin/weixin.php');
$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.$url.'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';

header("location:$url");





