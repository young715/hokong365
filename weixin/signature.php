<?php
//获取授权签名页面
require('weixin_sdk.php');
header('Content-type:text/html;charset=utf-8');

//JS-SDK使用权限签名
$appid = 'wxe52bd7ed62381b3e';
$secret = 'fc1b90080cd788a8d82d835b8bfb2f92';

$token = Weixin_sdk::get_token($appid,$secret);
$jsapi_ticket = weixin_sdk::get_jsapi_ticket($token);
$array = weixin_sdk::get_signature($jsapi_ticket);

if(!empty($array)){
	var_dump($array);
}else{ 
	var_dump('JS-SDK使用权限签名获取失败');
}