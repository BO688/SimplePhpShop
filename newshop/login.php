<?php
session_start();
header('Access-Control-Allow-Origin:*');
header('Content-type:application/json;charset=utf-8');
	$con=mysqli_connect("localhost",'root','');
		mysqli_query($con,'set names utf8');
		mysqli_select_db($con,"test");
	$json= json_decode(file_get_contents('php://input'),true);

$a=$json['s'];
//echo '查找'.$a.'的密码：<br>';
	switch($a){
	case $a:{
	
		if($a==''){
	echo"请输入内容查找!";
			break;
}
		$result=mysqli_query($con,"select* from test where name = '".$a."'");

if($re=mysqli_fetch_array($result)){
	echo $re['password'];
	$_SESSION['name']=$a;
//		while($re=mysqli_fetch_array($result)){
//			
//			
//			if(!$re['password']){
//				
//				break;
//			}	
//			
//			echo $re['password'].'<br/>';
//		
//		}
}else{
	echo '不存在！请重新输入！';
}
	break;}
	}
mysqli_close($con);
			

	
		?>
	