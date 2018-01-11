<?php  
header('Content-type:text/html;charset=utf-8');

class Weixin_sdk{ 

	//微信网页授权:获取accesstoken
	public static function get_accesstoken($appid,$secret,$code){
		$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$secret.'&code='.$code.'&grant_type=authorization_code'; 	
		$data = self::func_curl($url);
		if(!empty($data->access_token)){ 
			$array['access_token'] = $data->access_token;
			$array['openid'] = $data->openid;
			return $array;
		}else{ 
			$array['access_token'] = '';
			$array['openid'] = '';
		}
		return $array;
	}

	//微信网页授权：获取用户信息
	public static  function get_userinfo($array){ 
		$access_token = $array['access_token'];
		$openid = $array['openid'];
		$url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';
		$data = self::func_curl($url);
		return $data;
	}

	//curl方法
	public static function func_curl($url){ 
		$ch = CURL_init();
		CURL_setopt($ch,CURLOPT_URL,$url);
		CURL_setopt($ch,CURLOPT_HEADER,0);  //不要头部信息
		CURL_setopt($ch,CURLOPT_RETURNTRANSFER,1);  //数据返回给句柄
		CURL_setopt($ch,CURLOPT_TIMEOUT_MS,3000);   //超时放弃
		CURL_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		CURL_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
		$data = CURL_exec($ch);
		CURL_close($ch);
		if(!$data){ 
			echo CURL_error($ch);
		}else{ 
			$data = json_decode($data);
			return $data;
		}
	}


	//curl方法
	public static function func_curl_post($url,$data){ 
		$ch = CURL_init();
		CURL_setopt($ch,CURLOPT_URL,$url);
		CURL_setopt($ch,CURLOPT_HEADER,0);  //不要头部信息
		CURL_setopt($ch,CURLOPT_RETURNTRANSFER,1);  //数据返回给句柄
		CURL_setopt($ch,CURLOPT_POST,1);  //POST发送
		CURL_setopt($ch,CURLOPT_POSTFIELDS,$data);
		CURL_setopt($ch,CURLOPT_TIMEOUT_MS,3000);   //超时放弃
		CURL_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		CURL_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
		$data = CURL_exec($ch);
		CURL_close($ch);
		if(!$data){ 
			$error = CURL_error($ch);
			return $error;
		}else{ 
			$data = json_decode($data);
			return $data;
		}
	}

	//获取普通的access_token,7200有效期，应该要保存下来的
	public static function get_token($appid,$secret){ 
		$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$secret;
		$data = self::func_curl($url);
		if(!empty($data->access_token)){
			$token = $data->access_token;
		}else{ 
			$token = '';
		}
		return $token;
	}

	//获取jsapi_ticket，有效期7200秒，开发者必须在自己的服务全局缓存jsapi_ticket(这个是一定要缓存的，不然会有问题的)
	public static function get_jsapi_ticket($token){ 
		$url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$token.'&type=jsapi';
		$data = self::func_curl($url);
		if(!empty($data->ticket)){
			$jsapi_ticket = $data->ticket;
		}else{ 
			$jsapi_ticket = '';
		}
		return $jsapi_ticket;
	}

	//JS-SDK使用权限签名算法
	public static function get_signature($jsapi_ticket){ 
		$array['noncestr'] = 'Wm3WZYTPz0wzccnW';     //随机字符串
		$array['jsapi_ticket'] = $jsapi_ticket;
		$array['timestamp'] = time();    //时间戳
		$array['url'] = 'http://www.car-cyber.net/weixin/young.php';   //前端给个地址就可以
		$str = 'jsapi_ticket='.$array['jsapi_ticket'].'&noncestr='.$array['noncestr'].'&timestamp='.$array['timestamp'].'&url='.$array['url'];
		$array['sha1_str'] = sha1($str);
		//var_dump($str);
		return $array;
	}


	//腾讯云手机短信发送

	public static function send_message($sdkappid,$appkey,$code,$minute='2',$aabb){ 
		$random = rand(10000,99999); //随机数
		$time = $_SERVER['REQUEST_TIME']; //时间戳
		$data['tel']['nationcode'] = '86'; //国家码
		$data['tel']['mobile'] = '13560768214'; //手机
		$data['type'] = 0; //普通短信
		$data['msg'] = '测试短信！您的验证码是'.$code.'，请于'.$minute.'分钟内填写'; //短信模板
		var_dump($aabb);
		var_dump($data['msg']);
		$sig_string = 'appkey='.$appkey.'&random='.$random.'&time='.$time.'&mobile='.$data['tel']['mobile'];
		$data['sig'] = hash('sha256',$sig_string); //hash加密
		$data['time'] = $time;
		$data['ext'] = 'hemin';
		$url = 'https://yun.tim.qq.com/v5/tlssmssvr/sendsms?sdkappid='.$sdkappid.'&random='.$random;
		$data = json_encode($data);
		$return = self::func_curl_post($url,$data);
		return $return;
	}



/*	{
    "tel": { //如需使用国际电话号码通用格式，如："+8613788888888" ，请使用sendisms接口见下注
        "nationcode": "86", //国家码
        "mobile": "13788888888" //手机号码
    }, 
    "type": 0, //0:普通短信;1:营销短信（强调：要按需填值，不然会影响到业务的正常使用）
    "msg": "你的验证码是1234", //utf8编码 
    "sig": "ecab4881ee80ad3d76bb1da68387428ca752eb885e52621a3129dcf4d9bc4fd4", //app凭证，具体计算方式见下注
    "time": 1457336869, //unix时间戳，请求发起时间，如果和系统时间相差超过10分钟则会返回失败
    "extend": "", //通道扩展码，可选字段，默认没有开通(需要填空)。
     //在短信回复场景中，腾讯server会原样返回，开发者可依此区分是哪种类型的回复
    "ext": "" //用户的session内容，腾讯server回包中会原样返回，可选字段，不需要就填空。
	}

	string sig = sha256(appkey=5f03a35d00ee52a21327ab048186a2c4&random=7226249334&time=1457336869&mobile=13788888888)
           = ecab4881ee80ad3d76bb1da68387428ca752eb885e52621a3129dcf4d9bc4fd4;
*/


}


