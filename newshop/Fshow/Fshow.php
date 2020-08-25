<?php
session_start();
if(isset($_GET['pageNum'])){
	$pageNum=intval($_GET['pageNum']);
	
}else{
	$pageNum=1;
	
}
$_SESSION['pageNum']=$pageNum;

if($_GET['type']==''){
	$type='searc';
}else{
	$type=$_GET['type'];
	
}
?>
	
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<script src="../js/vue.min.js"></script>
	<script src="../js/axios.min.js"></script>
	<script src="../js/jquery.min.js"></script>
	<style>
		body{background-color: gainsboro;}
		th.left:hover{
			color: rgba(233,127,58,0.92);
			background-color: rgba(66,103,166,0.97);
		}
		th.left{
			background-color: coral;
		}
		 a:hover{
			color: darkkhaki;
		}
		.bottom{
			background-color: rgba(63,33,124,0.50);
		}
		 a{
			text-decoration: none;
			color: lightseagreen;
		}
		
		table{
			font-size: 1.2em;
			text-align: center;
			border: 3px;
			border-style: outset;
			text-align: center;
			height: -webkit-fill-available;
		width: -moz-available;
			width:-webkit-fill-available;
		
			border-collapse: collapse;
		}
		tbody{
			border: 3px;
		}
		th{
			    border: thick;
    border-style: inset;
		}
		img{
			width: 100px;
			height: 100px;
		}
		th div{
			padding: 30px;
			display: inline-block
		}
	</style>
<title>Fshow</title>
</head>

<body  >
	<div id="main">
	<table >
		<tbody>
	<tr style="background: antiquewhite;
    color: darkslateblue;">
		<th colspan="2">专区分栏<h5 style="position: absolute;right: 15px;top: 2px; "><a href="" onClick="return false;">
			<?php
		if(isset($_SESSION['name'])){
			echo "亲爱的".$_SESSION['name'];
		}else echo"登录";
		?></a>
	/<?php
		if(isset($_SESSION['name'])){
			echo "<a href='#' id='des'>
		注销</a>";
		}else echo"<a href='../login/register.html'>注册</a>";?></h5>
			<br/>
			<img style="width: 25px;height: 25px" src="../images/searchmain.png" alt=""><input 
			style="font-size: 0.8em;margin: 8px; align-content: 
    padding: 4px;" id="search" type="search" placeholder="输入试试！" v-model="search">{{search}}
		</th>
		</tr>
		
		<tr>
		<th  class="left" style="width: 20%" id="生活用品">生活用品</th><th rowspan="4" id="show" style="        background-color: rgb(205, 228, 149);
    color: aliceblue;">展示页面<br>
			
		
			
			
			
			</th>
		</tr>
		<tr>
		<th class="left" id="学习用品">学习用品</th>
		</tr>
		<tr>
		<th class="left" id="闲置交易">闲置交易</th>
		</tr>
		<tr>
	<th class="left" id="其他">其他</th>
		</tr>
		
		
		
		<tr>
		<th class="bottom" colspan="2">
			<a href="../sell/sell.php" onClick="<?php 
		if(!isset($_SESSION['name'])){
			echo "alert('请先登录！');
			return false;
			";
		}
		?>">我也要卖</a>
			<a href="../index.php">首页</a>
			<a href="../reflect/reflect.php"  onClick="<?php 
		if(!isset($_SESSION['name'])){
			echo "alert('请先登录！');
			return false;
			";
		}
		?>">反馈</a>
			</th>
		</tr>
		
		</tbody>
	</table>
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
	<footer style="text-align: center"><hr style="width: -webkit-fill-available;">  @year:2019.6-10.-@author:bo</footer>
</body>
	<script>
		
		
		$(document).ready(function(){
			$("#<?php echo $type?>").css("background-color",'cadetblue');
				$("#<?php echo $type?>").css("color","coral");
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
			$("input#search").click(function(){
				$.post("Fshowa.php",JSON.stringify(
			   {
			reset:1}));
				$("th.left").css("background-color","coral");
				$("th.left").css("color","black");
				
			});
			$("th.left").click(function(){
				$.post("Fshowa.php",JSON.stringify(
			   {
			reset:1}));
				$("th.left").css("background-color","coral");
				$("th.left").css("color","black");
				$(this).css("background-color",'cadetblue');
				$(this).css("color","coral");
			
					$.post("Fshowa.php",JSON.stringify(
			   {
			name:$(this).html()}),
			   function(data){
			$("#show").html($.trim(data));
		});
		});
//			$("th.left").mouseenter(function(){
//				$(this).css("background-color",'cadetblue');
//				$(this).css("color","coral");
//			});
//			$("th.left").mouseout(function(){
//				if()
//				$(this).css("background-color",'cadetblue');
//				$(this).css("color","coral");
//			});
//			
			
					$.post("Fshowa.php",JSON.stringify(
			   {
			name:'<?php echo $type;?>'}),
			   function(data){
			$("#show").html($.trim(data));
		});
		
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
				"search": {
					handler: function () {
						axios
							.post( "Fshowa.php", JSON.stringify( {
								search: $.trim(this.search)
							} ), {
								emulateJSON: true
							} )
							.then( response => ( $("#show").html($.trim(response.data))  ) )
							.catch( function ( error ) {
								console.log( error );
							} );
					}
				},
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

	);
	</script>
</html>
