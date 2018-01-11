<?php
//腾讯云短信发送 https://cloud.tencent.com/document/product/382/5808
require('weixin_sdk.php');
header('Content-type:text/html;charset=utf-8');

//微信端网页授权登录
$sdkappid = '1400044123';
$appkey = '9b1117b1c84b6342b6a995cd8c07727c';
$code = '123456';
$minute = '2';
$aabb= '中文中文';
var_dump($aabb);

$info = Weixin_sdk::send_message($sdkappid,$appkey,$code,$minute,$aabb);
if(!empty($info)){
	var_dump(111111111);
	var_dump($info);
}else{ 
	var_dump(2222222222);
	var_dump('发送短信失败');
}
