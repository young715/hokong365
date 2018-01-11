<?php
 /* 这里替换为连接的实例host和port */
 $host = "120.77.56.144";
 $port = 6379;
 /* 这里替换为实例id和实例password */
 $user = "test_username";
 $pwd = "1234567";
 $redis = new Redis();
 if ($redis->connect($host, $port) == false) {
 die($redis->getLastError());
   }
 if ($redis->auth($pwd) == false) {
 die($redis->getLastError());
  }
  /* 认证后就可以进行数据库操作，详情文档参考https://github.com/phpredis/phpredis */
 if ($redis->set("foo", "bar") == false) {
 die($redis->getLastError());
 }
 $value = $redis->get("foo");
 echo $value;
 ?>