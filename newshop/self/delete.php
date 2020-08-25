<?php

session_start();
header("content-type:text/html;charset:utf-8");
$a=$_SESSION['test'];
$a=15;
$_SESSION['test']=10;
echo $_SESSION['test'];
echo $a;
//$a=json_decode(file_get_contents("php://input"),true)['shopname'];
//if(isset($a)){
//	$con = mysqli_connect( "localhost", "root", "" );
//
//
//			if ( !$con ) {
//
//				die( 'Could not connect: ' . mysqli_error() );
//			} 
//			// Create database
//
//
//			// Create table in my_db database
//			 mysqli_query( $con, 'set names utf8' );
//
//
//
//		 mysqli_select_db( $con, "test");
//			$look="delete from selltest where 商品名='".$a."'";
//			$result=mysqli_query($con,$look);
//	mysqli_close( $con );
//}
?>