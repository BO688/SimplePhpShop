<?php session_start();?>
<!doctype html>

<html>
<head>
<meta charset="utf-8">
	<script src="../js/vue.min.js"></script>
	<script src="../js/axios.min.js"></script>
	<script src="../js/jquery.min.js"></script>
	<script>
	var $a=<?php 
		if(!isset($_SESSION['name'])){
			echo 1;
		}else{
			echo 2;
		}
		?>
	</script>
	<style>
		#button{
			position: absolute;
			left: 0%;
			
		}
		button:hover{
			color: coral;
			background-color: rgba(179,243,188,1.00);
			
		}
		a:hover{
			color: crimson;
		}
		button{
			    background-color: rgb(117, 180, 234);
			
		}
		a{
			color:darksalmon;
		}
		#button button{
			    border-radius: 50px;
    cursor: pointer;
			position: relative;
			padding: 10px;
    margin: 50px;
		}
		body{
			font-family: 'Comic Sans MS', cursive, sans-serif;
			font-size: 1.2em;
			text-align: center;
			background-color: aliceblue;
		}
		a{
			
			text-decoration: none
		}
		div{
			
		}
	</style>
<title>单品展示</title>
	<?php
	 $con3 = mysqli_connect( "localhost", "root", "" );
if ( !$con3 ) {
		die( 'Could not connect: ' . mysqli_error() );
			} 
			 mysqli_query( $con3, 'set names utf8' );
	mysqli_select_db( $con3, "test");
		$look3="select max(ID) ID from selltest";
	$look4="select min(ID) ID from selltest";
		$result3=mysqli_query($con3,$look3);
		$result4=mysqli_query($con3,$look4);
$item3=mysqli_fetch_array($result3);
$item4=mysqli_fetch_array($result4);
	$max=$item3['ID'];
	$min=$item4['ID'];
mysqli_close( $con3 );	
	
	if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$_SESSION['id']=$id;
	
}else{
	echo "<script>
	$(document).ready(function(){
		alert('重定向产品!');
	});
	</script>";
	$_SESSION['id']=65;
		if($max>=$_SESSION['id']&&$min<=$_SESSION['id']){
		 $return="false";
		
	 }else{
		 $return="true";
			$_SESSION['id']=$min;
	 }
}
	 
	if(isset($_GET['return']))
	{
		$return=$_GET['return'];
		
		if($return=="true"){
			 
			
			
			if($min>=$_SESSION['id']){
				echo "<script>
	$(document).ready(function(){
		alert('已经是第一个了!');
	});
	</script>";
				$_SESSION['id']=$min;
			}
			
		}
		if($return=='false'){
			
			
			if($max<=$_SESSION['id']){
				echo "<script>
	$(document).ready(function(){
		alert('已经是最后一个了!');
	});
	</script>";
				$_SESSION['id']=$max;
			}
			
			
		
	 
		}
	}
	?>
	
</head>

<body>
	
	<div id="main">
	<div id="up" style="font-size: 2em;
	text-align: right;
	min-height: 250px;min-width: 450px;
	border-style: outset;
	top:25%;
	left: 0;
	right: 0;
	display: none;
	z-index: 100;
	background:rgba(200,200,100,1);
	position: fixed;
	margin: 0 auto;">
		<button id="exit">退出</button><br/>
		<form style="text-align: center;font-size: 0.5em;bottom:0;
	top: 0;
	right: 0;margin: 0 auto;" name="up" id="show" @submit.prevent="test();">

			<h1>登录界面</h1> 输入账号：


			<input type="text" v-model="info"><br/>
			<br/>
			{{data1}}
			输入密码：<input :type="test" v-if="issee" v-model="pw"/>
			<input type="password" v-model="pw" v-if="!issee"/> {{pw}}
			<img style="width: 20px;height: 20px;" :src="[issee?'../images/see.png':'../images/secret.png']" @click="see()"/><br/>

			<input type="submit" value="确认">

			<input type="reset" value="重置"><br/>
		</form>
	</div>
	<div id="bg" style="background-color:rgba(151,150,137,0.80);
	display: none;
	left: 0;
	top: 0;
	position: fixed;
	z-index: 90;">
	</div>
		</div>
		<h3 style="position: absolute;right: 15px;top: 2px; "><a href="" onClick="return false;">
			<?php
		if(isset($_SESSION['name'])){
			echo "亲爱的".$_SESSION['name'];
		}else echo"登录";
		?></a>
	/<?php
		if(isset($_SESSION['name'])){
			echo "<a href='#' id='des'>
		注销</a>";
		}else echo"<a href='../login/register.html'>注册</a>";?></h3>

	<div id="button">
	<button onClick='location.href="../index.php";'>首页
	</button><br>
	<button class="id" onClick='if($a==1){alert("请登录！");return false;}window.location.href="../sell/sell.php";'>我也要卖
	</button><br>
	<button class="id" onClick='if($a==1){alert("请登录！");return false;}window.location.href="../favour/favour.php";'>我的喜欢
	</button>
		</div>
	<div>
	<?php
		$a=0;
		 $con = mysqli_connect( "localhost", "root", "" );
if ( !$con ) {
		die( 'Could not connect: ' . mysqli_error() );
			} 
			 mysqli_query( $con, 'set names utf8' );
	mysqli_select_db( $con, "test");
		$look="select * from selltest where id = '".$_SESSION['id']."' ORDER BY '喜欢的人' DESC ";
		$result=mysqli_query($con,$look);
if($item=mysqli_fetch_array($result)){
	echo "<div>";
	$hostdir=dirname(__FILE__).'/../pic/'.$item['用户'].'/'.$item['商品名']; 

$url = '../pic/'.$item['用户'].'/'.$item['商品名'].'/'; //图片所存在的目录

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
	echo "序号：".$item['id'].'<br>';
	echo "电话：".$item['电话'].'<br>';
	echo "姓名：".$item['姓名'].'<br>';
	echo "邮箱：".$item['邮箱'].'<br>';
	echo "微信：".$item['wechat'].'<br>';
	echo "身份：";
	switch($item['身份']){
		case 0:{
			echo "学生";
			break;
		};
		case 1:{
			echo "老师";
			break;
		};
		case 2:{
			echo "职工";
			break;
		};
		case 3:{
			echo "校外人士";
			break;
		};
		
	
	}
		echo '<br>';
	echo "商品描述：".$item['商品描述'].'</h5><br></div>';
	$a=1;
	
}else{
	echo "查无";
	echo "序号：".$_SESSION['id'];
	echo "!为您重新查找相邻商品！";
	while(true){
		if($a==1){break;}
		if($return=="true"){
			$look="select * from selltest where id = '".--$_SESSION['id']."' ORDER BY '喜欢的人' DESC ";
			
		}else
		{
			
		$look="select * from selltest where id = '".++$_SESSION['id']."' ORDER BY '喜欢的人' DESC ";}
		$result=mysqli_query($con,$look);
			 $item=mysqli_fetch_array($result);
		if(!$item[0]){continue;}
		else{
			$a=1;
		}
			 
			echo "<div>";
	$hostdir=dirname(__FILE__).'/../pic/'.$item['用户'].'/'.$item['商品名']; 

$url = '../pic/'.$item['用户'].'/'.$item['商品名'].'/'; //图片所存在的目录

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
	echo "序号：".$item['id'].'<br>';
	echo "电话：".$item['电话'].'<br>';
	echo "姓名：".$item['姓名'].'<br>';
	echo "邮箱：".$item['邮箱'].'<br>';
	echo "微信：".$item['wechat'].'<br>';
	echo "身份：";
	switch($item['身份']){
		case 0:{
			echo "学生";
			break;
		};
		case 1:{
			echo "老师";
			break;
		};
		case 2:{
			echo "职工";
			break;
		};
		case 3:{
			echo "校外人士";
			break;
		};
		
	
	}
		echo '<br>';
	echo "商品描述：".$item['商品描述'].'</h5><br></div>';
}
	
	
	
}
		mysqli_close( $con );
		echo"<a href='?id=";
		echo $item['id']+1;
		echo "&return=false'>下一个</a>";
		echo"<a href='?id=";
		echo $item['id']-1;
		echo "&return=true'>上一个</a>";
		
		?>     
	        <img style='padding-left: 10px;margin: -5px;
    cursor: pointer;' id="love" src="../images/love1.png">
	</div>
</body>
	<script>
		$(document).ready(function(){
			
			var check='<?php
			if(isset($_SESSION['name'])){
			$con = mysqli_connect( "localhost", "root", "" );


			if ( !$con ) {

				die( 'Could not connect: ' . mysqli_error() );
			} 
			// Create database

$check='select id from favour where 用户="'.$_SESSION['name'].'"';
			// Create table in my_db database
			 mysqli_query( $con, 'set names utf8' );
	mysqli_select_db( $con, "test");

     $result=mysqli_query($con,$check);
				$count=0;
         while($item=mysqli_fetch_array($result)){
			 
			 if($item[0]!=0&&!$item[0]){
				 break;
			 }
			if($item['id']==$_SESSION['id']){
				$count++;
			}
}
				if($count==0){
					echo 'no';
				}else{
					echo 'yes';
				}
	mysqli_close($con);}else{
				echo 'no';
			}
			?>';
			if(check=='yes'){
				$("img#love").attr('src','../images/love.png');
			}else{
				$("img#love").attr('src','../images/love1.png');
			}
			$("img#love").mouseenter(function(){
				if(check=='no')
				$(this).attr('src','../images/love2.png');
			});
			$("img#love").click(function(){
				if($a==1){alert("请登录！");return false;}
				if(check=='yes'){
					check='no'
				}else{
					check='yes'
				}
				$(this).attr('src','../images/love.png');
				if(check=='yes'){
					$.post("love.php",JSON.stringify({id:
				<?php echo $_SESSION['id']?>,love:1									 }));
				}else{
					$.post("love.php",JSON.stringify({id:
				<?php echo $_SESSION['id']?>,cancel:1									 }));
				}
			});
			
			$("img#love").mouseleave(function(){
				if(check=='no')
				$(this).attr('src','../images/love1.png');
			});
			$("a#des").click(function(){
		$.post('../unset.php');
		location.reload();
	});
		var screenH = screen.availHeight / 2;
	var screenW = screen.availWidth / 2;
		$( "a:first" ).click( function () {

		$( "div#up" ).show().height( screenH).width( screenW-200);
		$( "div#bg" ).show().height( 2000 ).width( 2000 );


	} );
	$( "#exit" ).click( function () {
		$( "div#bg" ).hide();
		$( "div#up" ).hide();
	} );
		});
		
	new Vue({
			el: "#main",
			data:{
				search:"",
				
				
					pw:"",
					info: "",
					data1: "",
					issee: false
				
			},
			methods: {


				see: function () {
					this.issee = !this.issee;
				},
				test: function () {
				
					if ( this.pw != "" ) {
						if(this.pw==this.data1){
							alert( "登陆成功！");
							window.location.reload();
						} 
					else {
							alert( "密码错误！" );

						}}
					 else {
						alert( "请输入密码！" );


					}
				}
			},
			watch: {
			"info": {
					handler: function () {
						axios
							.post( "../login.php", JSON.stringify( {
								s: this.info
							} ), {
								emulateJSON: true
							} )
							.then( response => ( this.data1 = $.trim(response.data) ) )
							.catch( function ( error ) {
								console.log( error );
							} );
					}
				}
			}
		}

	);</script>
</html>
