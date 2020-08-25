des<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>我的喜欢</title>
	<script src="../js/vue.min.js"></script>
	<script src="../js/axios.min.js"></script>
	<script src="../js/jquery.min.js"></script>
	<style>
		body a{
			color: palevioletred;
			text-decoration: none;
		}
		a:hover{
			color: lightseagreen;
		}
	</style>
</head>

<body style="text-align: center">
	<h5 style="position: absolute;right: 15px;top: 2px; "><a href="" onClick="return false;">
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
	<div id="login">
	<div id="up" style="font-size: 2em;
	text-align: right;
	
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
	<div  style='background-color: antiquewhite;
    width: 15%;
	text-align: center;
    height: 100%;
    bottom: 0;
    position: absolute;
    top: 0;
    margin: auto;
    left: 2%;'>
		<div id='list'     style='top: 35%;
    position: relative;
    word-wrap: break-word;'></div>
	</div>
	<div id='show' style="background-color: tan;
   
    display: flex;
    z-index: -1;align-items: center;width: 98%;
  
    align-items: center;text-align: center;
    height: 100%;
    bottom: 0;
    position: absolute;
    top: 0;
    margin: auto;
    left: 2%;
    
    justify-content: center;">
		还未选择左边商品
	</div>
</body>
	<script>
		$(document).ready(function(){
			$.post("ac.php",JSON.stringify(
			   {
			name:$("h5 a:first").html()}),
			   function(data){
				$("#list").html($.trim(data));
		});
			
			$("a#des").click(function(){
				location.href="../unset.php";
		
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
			el: "#login",
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
