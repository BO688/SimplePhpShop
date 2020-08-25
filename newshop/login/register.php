<?php
header('Access-Control-Allow-Origin:*');
header('Content-type:application/json;charset=utf-8');
	$con=mysqli_connect("localhost",'root','');
		mysqli_query($con,'set names utf8');
		mysqli_select_db($con,"test");
	$json= json_decode(file_get_contents('php://input'),true);

$mail=$json['mail'];
	switch($mail){
	case $mail:{
	
		if($mail==''){
	
			break;
}
		$result=mysqli_query($con,"select* from test where mail = '".$mail."'");

if($re=mysqli_fetch_array($result)){
	echo '已存在此账号';
	
		
}else{
	echo '欢迎你！';
	if(isset($json['name'])){
	$name=$json['name'];
	$password=$json['password'];
	$result=mysqli_query($con,"INSERT INTO test(name,mail,password) VALUES('$name','$mail','$password')");}
}
	break;}
	}

mysqli_close($con);
	?>