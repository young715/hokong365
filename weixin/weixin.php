<?php
//微信授权登录的跳转页面
require('weixin_sdk.php');
header('Content-type:text/html;charset=utf-8');

//微信端网页授权登录
$appid = 'wxe52bd7ed62381b3e';
$secret = 'fc1b90080cd788a8d82d835b8bfb2f92';
$code = $_GET['code']?$_GET['code']:'';

if(!empty($code)){ 
	$array = Weixin_sdk::get_accesstoken($appid,$secret,$code);
	$userinfo = weixin_sdk::get_userinfo($array);
	if(!empty($userinfo)){
		var_dump($userinfo);
	}else{ 
		var_dump('获取用户权限失败');
	}
}
