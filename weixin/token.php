<?php
//获取普通的access_token
require('weixin_sdk.php');
header('Content-type:text/html;charset=utf-8');

//JS-SDK使用权限签名
$appid = 'wxe52bd7ed62381b3e';
$secret = 'fc1b90080cd788a8d82d835b8bfb2f92';

$token = Weixin_sdk::get_token($appid,$secret);

if(!empty($token)){
	var_dump($token);
}else{ 
	var_dump('JS-SDK使用权限签名获取失败');
}