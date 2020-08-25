<?php

session_start();

header("content-type:text/html;charset:utf-8");
@$reset=json_decode(file_get_contents("php://input"),true)['reset'];
if($reset==1){
	$_SESSION['pageNum']=1;
	$pageNum=1;
}	
echo "第";
if(isset($_SESSION['pageNum'])){
	echo $pageNum=intval($_SESSION['pageNum']);
}else{
	echo $pageNum=1;
}
echo "页<br>";

@$reset=json_decode(file_get_contents("php://input"),true)['reset'];
if($reset==1){
	$_SESSION['pageNum']=1;
	$pageNum=1;
}

@$a=json_decode(file_get_contents("php://input"),true)['search'];

if(isset($a)){
	
	$_SESSION['type']=$a;
	$con = mysqli_connect( "localhost", "root", "" );


			if ( !$con ) {

				die( 'Could not connect: ' . mysqli_error() );
			} 
			// Create database


			// Create table in my_db database
			 mysqli_query( $con, 'set names utf8' );
	mysqli_select_db( $con, "test");
			   $count="select count(*) from selltest where 商品名 like '%".$a."%' ORDER BY '喜欢的人' DESC"; 
			$total=mysqli_query($con,$count);
//			  echo $total;
			  $total1=mysqli_fetch_array($total);
			//总数
			  $total1=(int)$total1["count(*)"];
			  $min=0;
			
			  $pagenum=5;
			   $max=$total1;
			 $page=ceil($max/$pagenum);
       $endPage=$page;
	
	
	
			$look="select * from selltest where 商品名 like '%".$a."%' ORDER BY '喜欢的人' DESC limit ".($pageNum-1)*$pagenum.','.$pagenum;
			
			$result=mysqli_query($con,$look);
if($item=mysqli_fetch_array($result)){
	echo '<a href="show/show.php?id='.$item['id'].'">';
	echo "<div>";
	$hostdir=dirname(__FILE__).'/pic/'.$item['用户'].'/'.$item['商品名']; 

$url = 'pic/'.$item['用户'].'/'.$item['商品名'].'/'; //图片所存在的目录

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
	
	echo "商品名：".$item['商品名'].'<br><h5>';
	echo "商品描述：".$item['商品描述'].'</h5><br></div></a>';
while(true){
			 $item=mysqli_fetch_array($result);
			 if(!$item[0]){break;}
	echo "<a href='show/show.php?id=".$item['id']."'>";
			echo "<div>";
	$hostdir=dirname(__FILE__).'/pic/'.$item['用户'].'/'.$item['商品名']; 

$url = 'pic/'.$item['用户'].'/'.$item['商品名'].'/'; //图片所存在的目录

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
	echo "商品名：".$item['商品名'].'<br><h5>';
	echo "商品描述：".$item['商品描述'].'</h5><br></div></a>';
}
	
}else{
	if($endPage==0)
	echo"查无！";
	else{
		$look="select * from selltest where 商品名 like '%".$a."%' ORDER BY '喜欢的人' DESC limit ".($endPage)*$pagenum.','.$pagenum;
			$pageNum=$endPage;
			$result=mysqli_query($con,$look);
if($item=mysqli_fetch_array($result)){
	echo "<a href='show/show.php?id='".$item['id'].'>';
	echo "<div>";
	$hostdir=dirname(__FILE__).'/pic/'.$item['用户'].'/'.$item['商品名']; 

$url = 'pic/'.$item['用户'].'/'.$item['商品名'].'/'; //图片所存在的目录

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
	echo "商品名：".$item['商品名'].'<br><h5>';
	echo "商品描述：".$item['商品描述'].'</h5><br></div></a>';
while(true){
			 $item=mysqli_fetch_array($result);
			 if(!$item[0]){break;}
	echo "<a href='show/show.php?id='".$item['id'].'>';
			echo "<div>";
	$hostdir=dirname(__FILE__).'/pic/'.$item['用户'].'/'.$item['商品名']; 

$url = 'pic/'.$item['用户'].'/'.$item['商品名'].'/'; //图片所存在的目录

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
	echo "商品名：".$item['商品名'].'<br><h5>';
	echo "商品描述：".$item['商品描述'].'</h5><br></div></a>';
}
	
}
	}
}
		
	mysqli_close( $con );}
echo "<br/>";
if($endPage!=0){
   if($pageNum!=1){
echo '<a href="?pageNum=1';
echo '">首页</a>';
    echo '<a href="?pageNum=';
	echo $pageNum==1?1:($pageNum-1);
	
	echo '" >上一页</a>';
   }
if($pageNum!=$endPage){
	echo '<a href="?pageNum=';
	echo $pageNum==$endPage?$endPage:($pageNum+1);
   
	echo '" >下一页</a>';
    echo '<a href="?pageNum=';
	echo $endPage;

	echo '" >尾页</a>';	  
}
}
?>