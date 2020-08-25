<?php session_start();

if(isset($_GET['pageNum'])){
	$pageNum=intval($_GET['pageNum']);
	
}else{
	$pageNum=1;
	
}
$_SESSION['pageNum']=$pageNum;
?>
<!doctype html>
<html><head>
<!--	手机版<meta name="viewport" content="width=device-width,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">-->
	<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-control" content="no-cache">
<meta http-equiv="Cache" content="no-cache">
	
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" type="text/css" href="images/星星.jpg">
	<script src="js/vue.min.js"></script>
	<script src="js/axios.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<title>页面</title>
	
</head>

<body >
	<h3 style="text-align: right;margin-top: -4px">
	<img src="images/user.png"/><a href="" onClick="return false;">
		<?php
		if(isset($_SESSION['name'])){
			echo "亲爱的".$_SESSION['name'];
		}else echo"登录";
		?></a>
	/<?php
		if(isset($_SESSION['name'])){
			echo "<a href='#' id='des'>
		注销</a>";
		}else echo"<a href='login/register.html'>注册</a>";?>
	 </h3>


	<div style="height: 50px;margin-top:-18px;  padding-bottom:  20px">
		<h1 class="colorful">welcome</h1>
	</div>
	<div class="search"> 找找你喜欢的吧：）<img src="images/box.png"> <br/>
		<div id="search">
			<input style="font-size: 0.8em;" type="text" class="sk" v-model="search" placeholder="输入试试"/>{{search}}
			<img src="images/search.png" style="cursor: pointer">
	</div>
		</div>
	<div class="fix">
		<ul>
			<a style="font-size: 30px" href="#" onClick="return false;"
			   ><img src="images/totop.png" ></a>
		</ul>
		<ul>
			<a  href="sell/sell.php" target="_blank" class="colorful">我要出售</a>
		</ul>
		<ul>
			<a  href="self/self.php" target="_blank" class="colorful">我的貨單</a>
		</ul>
		<ul>
			<a  href="favour/favour.php" target="_blank" class="colorful">我的購物車</a>
		</ul>
		<ul>
			<a href="reflect/reflect.php" target="_blank" class="colorful">反饋</a>
		</ul>
	</div>
	
	<table style="min-height: 225px; width: -webkit-fill-available ;width: -moz-available;height: -webkit-fill-available;border: 3px;
    border-style: outset;">
		<tbody >		
			<tr style="border:0" >
			<th  rowspan="5" id="shopshow" style="font-size: 1.3em;width: 80%;background-color: rgba(206,236,200,1.00);" >
			
			</th><th style=" background-color:#F2D27F;"></th>
			</tr>
		<tr class="right" >
			<td><a href="Fshow/Fshow.php?type=学习用品">学习用品</a></td>
		</tr>
			<tr class="right"  >
			<td><a href="Fshow/Fshow.php?type=生活用品">生活用品</a></td>
		</tr>
			<tr class="right" >
			<td><a href="Fshow/Fshow.php?type=其他">其他</a></td>
		</tr>
			<tr class="right"  >
			<td><a href="Fshow/Fshow.php?type=闲置交易">闲置交易</a></td>
		</tr>
			</tbody>

	</table>

	<div id="up" style="min-height: 250px;min-width: 450px;">
		<button id="exit">退出</button><br/>
		<form style="text-align: center;font-size: 0.5em;bottom:0;
	top: 0;
	right: 0;margin: 0 auto;" name="up" @submit.prevent="test();">

			<h1>登录界面</h1><br>
			输入账号：


			<input type="text" v-model="info">
			<br/>{{data1}}
			<br>
			<div style="position: relative;left: 12px">
				输入密码：
			<input :type="test" v-if="issee" v-model="pw"/>
			<input type="password" v-model="pw" v-if="!issee"/> {{pw}}
			<img style="width: 20px;height: 20px;" :src="[issee?'images/see.png':'images/secret.png']" @click="see()"/></div><br/>

			<input type="submit" value="确认">

			<input type="reset" value="重置"><br/>
		</form>
		
	</div>
	<div id="bg">
	</div>


	

	<div name="bottom" id="bottom"> <a href="help/help.html">帮助</a> <a href="join/join.html">加入我们</a> <a  href="share/share.html">宣传</a> <a href="setting/setting.html">设置</a> </div>
	<footer style="text-align: center"><hr style="width: -webkit-fill-available;">  @year:2019.6-10.-@author:bo</footer>
	<br/><br/><br/><br/><br/>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$.post("active.php",JSON.stringify(
			   {
			search:''}),
			   function(data){
			$("#shopshow").html($.trim(data));
		});
	$("a#des").click(function(){
		
		location.href="unset.php";
		
		
	});
	$("a.colorful").click(function(){
		<?php 
		if(!isset($_SESSION['name'])){
			echo "alert('请先登录！');
			return false;
			";
		}
		?>
		
	});
	$("div#search input").on("input mouseenter ",function(){
		$("div#search  img").attr("src","images/search1.png");
	});
	$("div#search input").on("mouseout blur",function(){
		$("div#search  img").attr("src","images/search.png");
	});
	
	$("div#search  img").on("mouseenter",function(){
		$(this).attr("src","images/search1.png");
	});
	$("div#search  img").on("mouseout",function(){
		$(this).attr("src","images/search.png");
	});
	
	$("h3 a").mouseenter(function(){
		$("h3  img").attr("src","images/user1.png")
	});
//	$("h3  img").mouseenter(function(){
//		$(this).attr("src","images/user1.png")
//	});
	
	$("h3 a").mouseleave(function(){
		$("h3  img").attr("src","images/user.png")
	});
	$(".fix ul a img").on(" mouseenter click",function(){
		$(this).attr("src","images/totop1.png")
	});
	$(".fix ul a img").on("mouseout",function(){
		$(this).attr("src","images/totop.png");
	});
	
	
	var screenH = screen.availHeight / 2;
	var screenW = screen.availWidth / 2;
	$( "a:first" ).click( function () {

		$( "div#up" ).show().height( screenH).width( screenW-screenW*0.1);
		$( "div#bg" ).show().height( 2000 ).width( 2000 );


	} );
	$( "#exit" ).click( function () {
		$( "div#bg" ).hide();
		$( "div#up" ).hide();
	} );
	$( "a" ).mousedown( function () {

		$( this ).attr( "border-style", "inset" );
	} );
	$( "input#it" ).on( "input", function () {
		$( this ).focu();
	} );
		});
</script>
<script charset="utf-8">
	new Vue({
			el: "#up",
			data:{
				
				
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
							.post( "login.php", JSON.stringify( {
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
	new Vue({
			el: "#search",
			data:{
				search:"",
				
			},
			watch: {
				"search": {
					handler: function () {
						axios
							.post( "active.php", JSON.stringify( {
								search: $.trim(this.search),reset:1
							} ), {
								emulateJSON: true
							} )
							.then( response => ( $("#shopshow").html($.trim(response.data))  ) )
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