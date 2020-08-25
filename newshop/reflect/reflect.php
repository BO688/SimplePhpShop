  
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="text/css" href="../images/question.png">
<title>反馈问卷</title>
	<script src="../js/jquery.min.js"></script>
	

<style type="text/css">
body{
background-color: bisque;

}
	img{
		cursor: pointer;
		width: 30px;
		height: 30px;
	}
#main{
 text-align: center;
    position: relative;
       top: 30%;
}
form{
background-color: aquamarine;
    border-color: cadetblue;
border: solid;
    width: 500px;
    text-align: center;
    position: relative;
    top: 50%;
    bottom: 50%;
    padding: 0;
    margin: 0 auto;
}

form input{position: relative;
    margin: 10px;
}
	span{
		position: fixed;
		right: 0;
		top: 0;
		
	}
</style>
</head>
<body>
<div id="main">
<form action="ref_re.php"   method="post" >
您的邮箱：<input type="email" name="email" id="email" placeholder="输入您的邮箱"/><br>
您的名字:：<input type="text" name="name" id="name" placeholder="输入您的名字"><br>
对本网站看法：<img id="like" src="../images/like1.png"/><img id="unlike" src="../images/unlike.png"/>
	<textarea id="word" name="word" style="width: 450px;resize: none;
    height: 100px;" placeholder="输入您的看法"></textarea><br>
<input type="submit" id="send" onClick="return false;">
    <input type="reset">
	<span>
    突然不想了打扰了<img class="back" src="../images/手指上.png"/><input type="button" class="back" value="返回" onclick='jump()'/>
		</span>
    <br>
</form>
</div>
	<footer style="text-align: center"><hr style="width: -webkit-fill-available;">  @year:2019.6-10.-@author:bo</footer>
</body>
	<script >
$("#send").click(function(){
	var a=/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
						if(a.test($("#email").val())){
						$("form").submit();
						}else{
							alert("邮箱错误！");
						
						}
});
		var check1=false;
		var check2=false;
		$("img#like").mouseenter(function(){
			$(this).attr("src","../images/like.png");
		});
		$("img#like").click(function(){
			check1=!check1;
			$(this).attr("src","../images/like.png");
			check2=false;
			$("img#unlike").attr("src","../images/unlike.png");
		});
		$("img#like").mouseleave(function(){
			if(!check1)
			$(this).attr("src","../images/like1.png");
		});
		$("img#unlike").mouseenter(function(){
			$(this).attr("src","../images/unlike1.png");
		});
		$("img#unlike").click(function(){
			$(this).attr("src","../images/unlike1.png");
			check2=!check2;
			check1=false;
			$("img#like").attr("src","../images/like1.png");
		});
		$("img#unlike").mouseleave(function(){
			if(!check2)
			$(this).attr("src","../images/unlike.png");
		});
		$(".back").mouseenter(function(){
			$("img.back").attr("src","../images/手指上1.png");
		});
		$(".back").mouseleave(function(){
			$("img.back").attr("src","../images/手指上.png");
		});
		
	
function jump(){
	location.href="../index.php";
}

</script>
</html>

