<?php
header('Content-type:text/html;charset=utf-8');


class Create_10000sql{

	private $connect = '';
	private $dbhost = 'localhost';
	private $username = 'root';
	private $password = 123456;

	public function __construct(){ 
		$this->connect = mysqli_connect($this->dbhost,$this->username,$this->password,'test');
		if($this->connect){ 
			echo "连接成功";
		}else{ 
			echo "连接失败";
		}
	}

	public function check_table($table_name){ 
		$this->sql = 'select * from '.$table_name;
		$res = $this->myquery($this->sql);
		if(empty($res)){ 
			echo '可以创建表';
			$result = $this->create_table();
			if($result){ 
				echo '创建表成功';
			}else{ 
				echo '创建表失败';
			}
		}else{ 
			echo '不需要再创建表';
		}
	}

	public function create_table(){
		$sql = "CREATE TABLE aabbcc(
				id int(10) NOT NULL AUTO_INCREMENT,
				name char(10) default '0',
				PRIMARY KEY (id),
				UNIQUE KEY unique_id (id)
				)ENGINE = innodb AUTO_INCREMENT = 1 default charset=utf8";

		$result = mysqli_query($this->connect,$sql);
		return $result;
	}

	public function insert_table($name){
		$sql = 'insert into aabbcc (name) values ('.$name.')';
		$result = mysqli_query($this->connect,$sql);
		return $result;
	}

	public function delete_content($name){ 
		$sql = 'delete from '.$name;
		$this->myquery($sql);
	}

	public function close_connect(){ 
		mysqli_close($this->connect);
	}

	public function myquery($sql){ 
		return mysqli_query($this->connect,$this->sql);
	}

}


$create = new Create_10000sql();
$create->check_table('aabbcc');
//$create->delete_content('aabbcc');

for($i=0; $i<1000; $i++){
	$create->insert_table('111111222');
}
var_dump(1111111);
$create->close_connect();
