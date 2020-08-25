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
			$look="select id from favour where 用户='".$_SESSION['name']."'";
			$result=mysqli_query($con,$look);
	echo "你喜欢的商品<br>";
	 
		
		
		 
		 while( @$item=mysqli_fetch_array($result)){
			  if($item[0]==0){continue;}
			  if(!$item[0]){break;}
			 echo '<br><a href="#" onclick="
			'.
			"$('#list a').css('color','crimson'".");
			$(this).css('color','blue');
			$.post("."'ac.php'".',JSON.stringify(
			   {
			shopname:$(this).html()}),
			   function(data){
			$('."'div#show'".').html(data);
		});return false;
		'.'">'.$item[0].'</a>';
			
			 
			
			
		 }
	mysqli_close( $con );
	 }else{
		echo "请先登录！";
	 }
			
}
@$delete=json_decode(file_get_contents("php://input"),true)['delete'];
if(isset($delete)){
	$con1 = mysqli_connect( "localhost", "root", "" );


			if ( !$con1 ) {

				die( 'Could not connect: ' . mysqli_error() );
			} 
			// Create database


			// Create table in my_db database
			 mysqli_query( $con1, 'set names utf8' );
	mysqli_select_db( $con1, "test");
			$look1="delete from favour where id='".$delete."'AND 用户='".$_SESSION['name']."'";
			$result1=mysqli_query($con1,$look1);
	mysqli_close( $con1 );
}

@$shopname=json_decode(file_get_contents("php://input"),true)['shopname'];
if(isset($shopname)){
	$con1 = mysqli_connect( "localhost", "root", "" );


			if ( !$con1 ) {

				die( 'Could not connect: ' . mysqli_error() );
			} 
			// Create database


			// Create table in my_db database
			 mysqli_query( $con1, 'set names utf8' );
	mysqli_select_db( $con1, "test");
			$look1="select * from selltest where id='".$shopname."'";
			$result1=mysqli_query($con1,$look1);
	$show=mysqli_fetch_array($result1);
	
$hostdir=dirname(__FILE__).'/../pic/'.$show['用户'].'/'.$show['商品名']; 

$url = '../pic/'.$show['用户'].'/'.$show['商品名'].'/'; //图片所存在的目录

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
echo '商品名：'.$show['商品名'].'<br>';
echo '用户：'.$show['用户'].'<br>';
echo '信息：'.$show['电话'].'<br>';
echo '卖家：'.$show['身份'].'<br>';
	 echo	'<br><button onclick="'. "var r=confirm('".'确定删除此商品'.$show['商品名'].'吗？它将消失在本网站上！'."');
if (r==true)
{
 ".
			 "$.post("."'ac.php'".",JSON.stringify(
			   {
			delete:'".$show['id']."'}),
			   function(data){
			alert("."'成功删除!'+'".$show['商品名']."');
			location.reload();
		});"."
};".'">取消收藏</button>';
	
	mysqli_close( $con1 );
}
?>