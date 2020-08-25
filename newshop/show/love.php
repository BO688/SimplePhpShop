<?php

session_start();

header("content-type:text/html;charset:utf-8");
@$i=json_decode(file_get_contents("php://input"),true)['id'];
@$l=json_decode(file_get_contents("php://input"),true)['love'];
@$c=json_decode(file_get_contents("php://input"),true)['cancel'];
$con = mysqli_connect( "localhost", "root", "" );


			if ( !$con ) {

				die( 'Could not connect: ' . mysqli_error() );
			} 
			// Create database


			// Create table in my_db database
			 mysqli_query( $con, 'set names utf8' );
	mysqli_select_db( $con, "test");
$look='select * from selltest where id="'.$i.'"';
$result=mysqli_query($con,$look);
             $item=mysqli_fetch_array($result);
if(isset($l)){
$update="update  selltest set 喜欢的人 ='".++$item['喜欢的人']."' where id ='".$i."'";
	$insert='insert into favour (id,用户) VALUES("'.$i.'","'.$_SESSION['name'].'")';
	mysqli_query($con,$insert);
}if(isset($c)){
	$update="update  selltest set 喜欢的人 ='".--$item['喜欢的人']."' where id ='".$i."'";
	$delete='DELETE FROM favour WHERE id ="'.$i.'" AND 用户="'.$_SESSION['name'].'"';
	mysqli_query($con,$delete);
}
mysqli_query($con,$update);
	mysqli_close($con);

?>
