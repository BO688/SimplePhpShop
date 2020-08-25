<?php
session_start();
header("content-type:text/html;charset:utf-8");
@$a1=json_decode(file_get_contents("php://input"),true)['name'];
if(isset($a1)){
if(isset($_SESSION['name'])){
	$con = mysqli_connect( "localhost", "root", "" );


			if ( !$con ) {

				die( 'Could not connect: ' . mysqli_error() );
			} 
			// Create database


			// Create table in my_db database
			 mysqli_query( $con, 'set names utf8' );



		 mysqli_select_db( $con, "test");
			$look="select 商品名 from selltest where 用户='".$_SESSION['name']."'";
			$result=mysqli_query($con,$look);
	 if( $item=mysqli_fetch_array($result)){
		echo 'php:返回<br><a href="#" onclick="
			'.
			"$('tr td a').css('color','crimson'".");
			$(this).css('color','blue');
			$.post("."'seeshop.php'".',JSON.stringify(
			   {
			name:$(this).html()}),
			   function(data){
			$('."'span#text'".').html(data);
		});
		'.'">'.$item[0].'</a>';
		 
		 while(true){
			 $item=mysqli_fetch_array($result);
			 if(!$item[0]){break;}
			 echo '<br><a href="#" onclick="
			'.
			"$('tr td a').css('color','crimson'".");
			$(this).css('color','blue');
			$.post("."'seeshop.php'".',JSON.stringify(
			   {
			name:$(this).html()}),
			   function(data){
			$('."'span#text'".').html(data);
		});
		'.'">'.$item[0].'</a>';
		 }
	 }else{
		echo '<br>暂时查无！' ;
	 }
			mysqli_close( $con );
}else{
	echo "请先登录！";
}
}
@$a=json_decode(file_get_contents("php://input"),true)['shopname'];
if(isset($a)){
	function removedir($dirname){
		if(!is_dir($dirname)){
			return false;
		}
		$handle=@opendir($dirname);
		while(($file=@readdir($handle))!==false){
			if($file!='.'&&$file!='..'){
				$dir=$dirname."/".$file;
				is_dir($dir)?removedir($dir):@unlink($dir);
			}
		}
		closedir($handle);
		return rmdir($dirname);
	}

	$path=$a;
	$res=removedir(dirname(__FILE__).'/../pic/'.$_SESSION['name'].'/'.$path);
	if($res){
		echo '<script>console.log('."'删除成功'".');</script>';
	}else
		echo '<script>console.log('."'删除失败'".');</script>';
	$con1 = mysqli_connect( "localhost", "root", "" );


			if ( !$con1 ) {

				die( 'Could not connect: ' . mysqli_error() );
			} 
			// Create database


			// Create table in my_db database
			 mysqli_query( $con1, 'set names utf8' );
	mysqli_select_db( $con1, "test");
			$look1="delete from selltest where 商品名='".$a."'";
			$result1=mysqli_query($con1,$look1);
	mysqli_close( $con1 );
}
?>
