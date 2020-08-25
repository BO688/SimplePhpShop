<?php
session_start();

$a=json_decode(file_get_contents("php://input"),true)['name'];
$_SESSION['shopname']=$a;
$hostdir=dirname(__FILE__).'/../pic/'.$_SESSION['name'].'/'.$a; 

$url = '../pic/'.$_SESSION['name'].'/'.$a.'/'; //图片所存在的目录

	@$filesnames = scandir($hostdir);
 //得到所有的文件
$aaa=print_r($filesnames,true);
if(isset($aaa[0])){
	echo "图片:<br/>";
//  print_r($filesnames);exit;
//获取也就是扫描文件夹内的文件及文件夹名存入数组 $filesnames

//$www = 'http://www.***.com/'; //域名

	for($i =2;$i<count($filesnames);$i++){
		
    $aurl= "<img width='100' height='100' src='".$url.$filesnames[$i]."' >"; //图片
    echo $aurl; //输出他
	}
	echo "<br>";
}else{
	echo "无照片！<br/>";
}
echo '商品名：'.$a.'<br>';
	$con = mysqli_connect( "localhost", "root", "" );


			if ( !$con ) {

				die( 'Could not connect: ' . mysqli_error() );
			} 
			 mysqli_query( $con, 'set names utf8' );
mysqli_select_db( $con, "test");
			$look="select 商品描述 from selltest where 商品名='".$a."'";
			$result=mysqli_query($con,$look);
	 if( $item=mysqli_fetch_array($result)){
		echo "商品描述：".$item[0];
	 }else{
		 echo "无商品描述！";
	 }
			mysqli_close( $con );
echo "<br/>喜欢的人：";
       $con1 = mysqli_connect( "localhost", "root", "" );


			if ( !$con1 ) {

				die( 'Could not connect: ' . mysqli_error() );
			} 
			// Create database


			// Create table in my_db database
			 mysqli_query( $con1, 'set names utf8' );



		 mysqli_select_db( $con1, "test");
			$look="select 喜欢的人 from selltest where 用户='".$_SESSION['name']."'";
			$result=mysqli_query($con1,$look);
@$item=mysqli_fetch_array($result);

	 if(isset($item)){
		 echo $item[0];
	 }else{
		 echo "查无！";
	 }
mysqli_close( $con1 );

        echo "<br>状态：";
  $con2 = mysqli_connect( "localhost", "root", "" );


			if ( !$con2){

				die( 'Could not connect: ' . mysqli_error() );
			} 
			// Create database


			// Create table in my_db database
			 mysqli_query( $con2, 'set names utf8' );



		 mysqli_select_db( $con2, "test");
			$look1="select 状态 from selltest where 用户='".$_SESSION['name']."'";
			$result1=mysqli_query($con2,$look1);
@$item1=mysqli_fetch_array($result1);

	 if(isset($item1)){
		 echo $item1[0];
		 echo	'<br><button onclick="'. "var r=confirm('".'确定删除此商品'.$_SESSION['shopname'].'吗？它将消失在本网站上！'."');
if (r==true)
{
 ".
			 "$.post("."'ser.php'".",JSON.stringify(
			   {
			shopname:'".$_SESSION['shopname']."'}),
			   function(data){
			alert("."'成功删除!'+'".$_SESSION['shopname']."');
			location.reload();
		});"."
};".'">取消或已送出</button>';
	 }else{
		 echo "查无！";
	 }
mysqli_close( $con2 );

		
?>