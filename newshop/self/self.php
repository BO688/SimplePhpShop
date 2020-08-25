<!DOCTYPE html>
<?php
session_start();
header("content-type:text/html;charset=utf-8");

?><meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-control" content="no-cache">
<meta http-equiv="Cache" content="no-cache">
<script src="../js/vue.min.js"></script>
	<script src="../js/axios.min.js"></script>
	<script src="../js/jquery.min.js">
</script>
<script type="text/javascript"> 
	$(document).ready(function(){
		
		$.post("ser.php",JSON.stringify(
			   {
			name:$("h3 a:first").html()}),
			   function(data){
			
			$("#menu span").html($.trim(data));
		});
		$("tr td a").click(function(){
			$("tr td a").css("color","crimson");
			$(this).css("color","blue");
		$.post("seeshop.php",JSON.stringify(
			   {
			name:$(this).html()}),
			   function(data){
			$("span#text").html(data);
		});
		
	});
//		$("a").mouseenter(function(){
//			$(this).css("color","darkcyan");
//		});
//		$("a").mouseout(function(){
//			$(this).css("color","indianred");
//		});
		
		
	
	var screenH = screen.availHeight / 2;
	var screenW = screen.availWidth / 2;
	$( "a:first" ).click( function () {

		$( "div#login" ).show().height( screenH).width( screenW-200);
		$( "div#bg" ).show().height( 2000 ).width( 2000 );


	} );
	$( "#exit" ).click( function () {
		$( "div#bg" ).hide();
		$( "div#login" ).hide();
	} );
		});
	</script>
<link rel="icon" type="text/css" href="../images/searchmain.png">
<title>我的货库</title>
<style>
	span#text img{
		margin: 10px;
	}
	a{
		color:indianred;
		text-decoration: none;
	}
	a:hover{
		color: darkcyan;
	}
	#bg{
	
	background-color:rgba(151,150,137,0.80);
	display: none;
	left: 0;
	top: 0;
	position: fixed;
	z-index: 90;
}

	#login{
	font-size: 2em;
	text-align: right;
	
	border-style: outset;
	top:25%;
	left: 0;
	right: 0;
	display: none;
	z-index: 100;
	background:rgba(200,200,100,1);
	position: fixed;
		margin: 0 auto;}
	h3{
		text-align: right;
	}
	tr th img{
		cursor: pointer;
		vertical-align: middle;
		width: 30px;
		height: 30px;
	}
	table{
		
		text-align: center;
		width:-webkit-fill-available;
		width: -moz-available;
		height: -webkit-fill-available;
	}
	table tr:first-child{
		
		height: 10%;
	}
	table tr th:first-child{
		width: 25%;
	}
</style>
<p id="user"><h3><img src="../images/user.png"/ style="width: 25px;height: 25px"><a href="" onClick="return false;">
		<?php
		if(isset($_SESSION['name'])){
			echo "亲爱的".$_SESSION['name'];
		}else echo"登录";
		?></a>
	/<?php
		if(isset($_SESSION['name'])){
			echo "<a href='#' id='des'>
		注销</a>";
		}else echo"<a href='../login/register.html'>注册</a>";?></h3></p>
<table border="1px" bordercolor="#F09B9C" id="main">
	<tr><th>你出售的商品<img @mouseenter='min()'
					  @mouseleave='mou()' :src=[is?src1:src2]></th><th>详情</th></tr>
	<tr><td id="menu">
		网页：自带
		<a href="#" onClick="return false;" >aa</a>
		<a href="#" onClick="return false;">bb</a>
		<a href="#" onClick="return false;">cc</a>
		<br>
		<span></span>
		<br>
		</td>
		<td>
			<br/>
		<span id="text">还未选择商品！</span><br>
			
			<br/>
		</td></tr>
</table>
<div id="login" style="">
		<button id="exit">退出</button><br/>
		<form style="text-align: center;font-size: 0.5em;bottom:0;
	top: 0;
	right: 0;margin: 0 auto;" name="up" id="show" @submit.prevent="test();">

			<h1>登录界面</h1> 输入账号：


			<input type="text" v-model="info"><br/>
			<br/>
			{{data1}}
			输入密码：<input type="text" v-if="issee" v-model="pw"/>
			<input type="password" v-model="pw" v-if="!issee"/> {{pw}}
			<img style="width: 20px;height: 20px;" :src="[issee?'../images/see.png':'../images/secret.png']" @click="see()"/><br/>

			<input type="submit" value="确认">

			<input type="reset" value="重置"><br/>
		</form>
	</div>
<div id="bg"></div>
<footer style="text-align: center"><hr style="width: -webkit-fill-available;">  @year:2019.6-10.-@author:bo</footer>
<script>
	$("a#des").click(function(){
		location.href='../unset.php';
		
	});
	new Vue({
		el:'#main',
		data:{
			
			text:'',
			man:'',
			con:'',
			src1:'../images/刷新.png',
			src2:'../images/刷新1.png',
			is:true
			
		},
		methods:{
			min:function(){
				this.is=!this.is;
				
			},
			mou:function(){
				this.is=!this.is;
			}
		},watch:{
			
		
		
	}});
	var vm = new Vue( {
			el: "#show",
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
							.then( response => ( this.data1 = $.trim(response.data)) )
							.catch( function ( error ) {
								console.log( error );
							} );
					}
				}
			}
		}

	);
</script>