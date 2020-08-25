<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="icon" type="text/css" href="../images/bird.png"  >
	<link rel="stylesheet" type="text/css" href="sell.css">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
		<script src="../js/jquery.min.js"></script>

	
	<script>
		$.ajaxSetup( {
			data: {
				csrfmiddlewaretoken: '{csrf_token}'
			}
		} )
	</script>

	<title>我要出售</title>
</head>

<body>
	<header>
		<h1 align="center">请填写下面信息！</h1>
	</header>
	<div id="main">
		<form action="sell_accept.php" name="form" id=" form"method="post" enctype="multipart/form-data">
			<br/> 请选择你要出售的商品图片
			<input id="file" name="file[]" onchange="changepic(this)" type="file" multiple accept="image/*">

			<div style="border:dashed;border-color:  #F1B5FA">
				<h1>预览框只显示前9张</h1>
				<img src="" alt=" " width="200px" height="200px"/>
				<img src="" alt=" " width="200px" height="200px">
				<img src="" alt=" " width="200px" height="200px">
				<img src="" alt=" " width="200px" height="200px">
				<img src="" alt=" " width="200px" height="200px">
				<img src="" alt=" " width="200px" height="200px">
				<img src="" alt=" " width="200px" height="200px">
				<img src="" alt=" " width="200px" height="200px">
				<img src="" alt=" " width="200px" height="200px">
			</div>
			<br/>商品属性：
			<label>
		<input type="checkbox" name="choice[]" id='choice' value="1">生活用品</label>
		
			<label>
		<input type="checkbox" name="choice[]" 
			  id='choice' value="2">学习用品</label>
		
			<label><input type="checkbox" name="choice[]" id='choice'value="3">闲置交易</label>
			<label><input type="checkbox" name="choice[]" id='choice'value="4">其他
		</label><span id="choice">*</span>
			<br/>商品名：<input type=text id="shopname" name="shopname"placeholder="输入您的商品名"><span id="shopname">*</span>
			<br/>
			<p style="display: inline">商品描述（不多于30字）：<textarea id="selltext" name="word" placeholder="输入您的商品描述"></textarea>
				<span id="text">*</span>
			</p>

			<br/> 填写您的姓名
			<input type="text" id="name" name="name" placeholder="输入您的名字"><span id="name">*</span>
			<br/>您的电话<input type="text" id="phone" name="phone" placeholder="输入您的电话"><span id="phone">*</span>
			<br/>您的微信号<input type="text" id="wechat" name="wechat" placeholder="输入您的微信">
			<span id="wechat"></span>
			<br/>您的邮箱<input type="text" id="e-mail" name="e-mail" placeholder="输入您的邮箱">
			<span id="e-mail"></span>
			<br/>您的身份是：
			<label><input type="radio" name="id" id="id" value="0">学生</label>
			<label><input type="radio" name="id" id="id" value="1">老师</label>
			<label><input type="radio" name="id" id="id"value="2">职工</label>
			<label><input type="radio" name="id" id="id"value="3">校外人士</label>
			<span id="id">*</span>
			<br/>
			<input type="submit" id="submit" onClick="check();return false;">
			<input type="reset" id="reset" value="重置"><button style="position: relative; margin-left: 4px"><a href="../index.php" style="text-decoration: none;color: black">返回页面</a></button>

		</form>



	</div>
	<footer style="text-align: center"><hr style="width: -webkit-fill-available;">  @year:2019.6-10.-@author:bo</footer>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		
		if($( "#phone" ).val()){
			$("span#choice").html("√");
			$("span#shopname").html("√");
		$("span#text").html("√");
		$("span#name").html("√");
		$("span#phone").html("√");
		$("span#id").html("√");
		}
	});
	function changepic( obj ) {
		//console.log(obj.files[0]);//这里可以获取上传文件的name
		for ( var a = 0; a < obj.files.length; a++ ) {
			var newsrc = getObjectURL( obj.files[ a ] );
			document.getElementsByTagName( "img" )[ a ].src = newsrc;
		}

	}
	//建立一個可存取到該file的url
	function getObjectURL( file ) {
		var url = null;
		// 下面函数执行的效果是一样的，只是需要针对不同的浏览器执行不同的 js 函数而已
		if ( window.createObjectURL != undefined ) { // basic
			url = window.createObjectURL( file );
		} else if ( window.URL != undefined ) { // mozilla(firefox)
			url = window.URL.createObjectURL( file );
		} else if ( window.webkitURL != undefined ) { // webkit or chrome
			url = window.webkitURL.createObjectURL( file );
		}
		return url;
	}
	$("#reset").click(function(){
		
		$("span#choice").html("*");
		$("span#shopname").html("*");
		$("span#text").html("*");
		$("span#name").html("*");
		$("span#phone").html("*");
		$("span#id").html("*");
		$("span#wechat").html("");
		$("span#e-mail").html("");
	});



	$( "#phone" ).on('input propertychange',function () {let a = $( "#phone" ).val();
		let reg = /^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/;
		if ( a == "" ) {
			$( "span#phone" ).html( "*" );
		} else {
			if ( reg.test( a ) ) {
				$( "span#phone" ).html( "√" );

			} else {
				$( "span#phone" ).html( "输入错误，请输入正确手机号！" );
			}

		}
	} 
		);
	$( "#name" ).on('input propertychange',function () {
		let a = $( "#name" ).val();

		if ( a == "" ) {
			$( "span#name" ).html( "*" );
		} else {

			$( "span#name" ).html( "√" );

		}

	} );

	$( "textarea#selltext" ).on('input propertychange',function () {
		let a = $( "#selltext" ).val();

		if ( a.length == 0 ) {
			$( "span#text" ).html( "*" );
		} else {
			if ( a.length > 0 && a.length <= 30 ) {

				$( "span#text" ).html( "√" );
			} else {
				$( "span#text" ).html( "超出字数！" );
			}
		}
	} );
	$( "#e-mail" ).on('input propertychange',function () {
		let a = $( "#e-mail" ).val();
		if(a){

		if ( a.length != 0 ) {
			let reg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
			if ( !reg.test( a ) ) {
				$( "span#e-mail" ).html( "输入格式错误" );
			} else
				$( "span#e-mail" ).html( "√" );
			
		}}
		else{
			$( "span#e-mail" ).html( "" );
		}


	} );
	
	$( "#wechat" ).on('input propertychange',function () {
		let a = $( "#wechat" ).val();

		if ( a.length != 0 ) {

			$( "span#wechat" ).html( "√" );
		}else{
			$( "span#wechat" ).html( "" );
		}


	} );
	$( "#shopname" ).on('input propertychange',function () {
		let a = $( "#shopname" ).val();

		if ( a.length != 0 ) {

			$( "span#shopname" ).html( "√" );
		}else{
			$( "span#shopname" ).html( "*" );
		}


	} );
	$("input#id").on('change propertychange',function(){
		let a=$('input:radio:checked').val();
		if(a){
		   $("span#id").html("√");
		   }
		
	});
	$("input#choice").on('change propertychange',function(){
		let a=$('input:checkbox:checked').val();
		
		if(a){
		     $("span#choice").html("√");
		   }
		else{
			$("span#choice").html("*");
		}
	})
	function check() {
		let a=$("span#choice").html()+$("span#shopname").html()+$("span#text").html()+$("span#name").html()+$("span#phone").html()+$("span#id").html();
		let reg=/√{6}/;
		let b=$("span#choice").html()+$("span#shopname").html()+$("span#text").html()+$("span#name").html()+$("span#phone").html()+$("span#id").html()+$("span#wechat").html()+$("span#e-mail").html();
		let reg1=/[^√*]+/;
		
		if(!reg1.test(b)){
			
		if(reg.test(a))
		
{
		if (confirm( "请确认信息!\n是否确认提交")) {
			
			send();
		}
		else{
			return false;
		}
}
		else{
		alert("未输入必要内容！");
		}
		}
		else{
			
			alert("输入错误！");
			
		}
	}
</script>
</html>