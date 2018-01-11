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

?>

<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script>
wx.config({
    debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
    appId: '<?php echo $appid; ?>', // 必填，公众号的唯一标识
    timestamp: <?php echo $array['timestamp']; ?>, // 必填，生成签名的时间戳
    nonceStr: '<?php echo $array["noncestr"]; ?>', // 必填，生成签名的随机串
    signature: '<?php echo $array["sha1_str"]; ?>',// 必填，签名，见附录1
    jsApiList: ['checkJsApi','onMenuShareAppMessage','onMenuShareTimeline'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
});

wx.ready(function(){
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready函数中。

	wx.checkJsApi({
	    jsApiList: ['checkJsApi','onMenuShareAppMessage','onMenuShareTimeline'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
	    success: function(res) {
	        // 以键值对的形式返回，可用的api值true，不可用为false
	        // 如：{"checkResult":{"chooseImage":true},"errMsg":"checkJsApi:ok"}
	    }
	});

	//分享给朋友
	wx.onMenuShareAppMessage({
	    title: '测试分享标题', // 分享标题
	    desc: '测试分享描述', // 分享描述
	    link: 'http://www.car-cyber.net', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
	    imgUrl: 'http://test.mowork.cn/asset/images/hotpic1.jpg', // 分享图标
	    type: 'link', // 分享类型,music、video或link，不填默认为link
	    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	    success: function () { 
	        //alert('分享成功');
	    },
	    cancel: function () { 
	        //alert('分享失败');
	    }
	});

	//分享到朋友圈
	wx.onMenuShareTimeline({
	    title: '测试分享标题', // 分享标题
	    link: '测试分享描述', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
	    imgUrl: 'http://test.mowork.cn/asset/images/hotpic1.jpg', // 分享图标
	    success: function () { 
	        // 用户确认分享后执行的回调函数
	    },
	    cancel: function () { 
	        // 用户取消分享后执行的回调函数
	    }
	});

	wx.error(function(res){
		alert('错误!');
	    // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
	});


});

</script>




