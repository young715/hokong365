<?php  
  $file = $_FILES["file"]["tmp_name"];//获取的上传的临时文件  
  $name = $_FILES["file"]["name"];//获取上传文件的文件名  
  echo $_FILES["file"]["tmp_name"];
  //$dir = './upload/';  
 //echo  move_uploaded_file($file ,$dir.$name )? 'ok' : 'false';  
   
  $path="./dai/php1/php2/";  
  if (is_dir($path)){    
        echo "对不起！目录 " . $path . " 已经存在！";  
        echo  move_uploaded_file($file ,$path.$name)? 'ok' : 'false';  
    }else{  
        //第三个参数是“true”表示能创建多级目录，iconv防止中文目录乱码  
        $res=mkdir($path,0777,true); //递归创建文件目录  
        if ($res){  
            var_dump($res);//boolean true  
              if (is_dir($path)){    
                    echo "目录 $path 创建成功";  
                    echo $path.$name;  
                    echo  move_uploaded_file($file ,$path.$name)? 'ok' : 'false';  
              }  
        }else{  
            echo "目录 $path 创建失败";  
        }  
    }  