<?php session_start()?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	
	
	
	<meta http-equiv="Content-Type" content="text/html;" />
	<?php header('Access-Control-Allow-Origin:*')?>
	
	
	<title>acceptphp</title>
	<script type="text/javascript">
		$(document).ready(function(){
			<?php
	@$s=$_SESSION['name'];
			if(!isset($_SESSION['name'])){
				
			echo 'alert("请先登录！");
				window.stop();';
			}
			?>
		});
	
			var a=5;
		
			setInterval(count,1000);
			function count(){
				
				$("h1").text("页面五秒后跳转...."+a--+"s");
				
			}
		
		</script>
</head>

<body >
	<div align="center">
		<h1></h1>
		<table border="soild">
			<tr>
				<th colspan="2">提交信息确定</th>
			</tr>

		<?php
			@$shopname=$_POST['shopname'];
			echo "<tr><td>商品名</td><td>";
			if ( !$shopname) {
				echo "null";
			} else{
				echo $shopname;
			}
			echo "</td></tr>";
			@$carray=$_POST['choice'];
			
			  $c = null;

			echo "<tr><td>商品属性</td><td>";
			if ( !$carray) {
				echo "null";
			} else {


				if (@$carray[0]  ) {
					echo  "生活用品.";
					$c .= "生活用品.";
				}
				if (@$carray[1] ) {
					echo "学习用品.";
					$c .= "学习用品.";
				}
				if (@$carray[2]  ) {
					echo "闲置交易.";
					$c .= "闲置交易.";
				}
				if ( @$carray[3]  ) {
					echo "其他.";
					$c .= "其他.";
				}
				


			}
			echo "</td></tr>";


			@$n = $_POST[ "name" ];
			echo "<tr><td>姓名</td><td>";
			if ( $n == null ) {
				echo "null";
			} else {
				echo $n;
			}
			echo "</td></tr>";

			@$w = $_POST[ "word" ];
			echo "<tr><td>详细描述</td><td>";
			if ( $w == NULL ) {
				echo "null";
			} else {
				echo $w;
			}
			echo "</td></tr>";
			@$p = $_POST[ "phone" ];
			echo "<tr><td>手机号</td><td>";
			if ( $p == NULL ) {
				echo "null";
			} else {
				echo $p;
			}
			echo "</td></tr>";
			@$e = $_POST[ "e-mail" ];
			echo "<tr><td>邮箱地址</td><td>";
			if ( $e == NULL ) {
				echo "null";
			} else {
				echo $e;

			}
			echo "</td></tr>";
			@$i
				= $_POST[ "id" ];
			echo "<tr><td>身份</td><td>";
			if ( $i == NULL ) {
				echo "null";
			} else {


				if ( $_POST[ "id" ] == 0 ) {
					echo "学生";
				}
				if ( $_POST[ "id" ] == 1 ) {
					echo "老师";
				}
				if ( $_POST[ "id" ] == 2 ) {
					echo "职工";
				}
				if ( $_POST[ "id" ] == 3 ) {
					echo "校外人士";
				}


			}
			echo "</td></tr>";


			@$wc = $_POST[ "wechat" ];
			echo "<tr><td>微信</td><td>";
			if ( $wc == NULL ) {
				echo "null";
			} else {
				echo $wc;
			}
			echo "</td></tr>";


			echo "<tr><td>上传的文件</td><td>";

	$a=print_r($_FILES['file']['name'][0],true);
			if ( $a!=null){
				
				$count = count( $_FILES[ "file" ][ "name" ] );
				@mkdir( "../pic/".$_SESSION["name"].'/'.$shopname);

echo "上传共".$count.'个文件<br/>';
				for ( $f = 0; $f < $count; $f++ ) {
					if ( file_exists( "../pic/" .$_SESSION["name"].'/'.$shopname.'/'.$_FILES[ "file" ][ "name" ][ $f ] ) ) {
						echo $_FILES[ "file" ][ "name" ][ $f ] . " already exists. ";
					} else {
						echo
							move_uploaded_file( $_FILES[ "file" ][ "tmp_name" ][ $f ],
							"../pic/".$_SESSION["name"] .'/'.$shopname.'/'.$_FILES[ "file" ][ "name" ][ $f ] );
						echo "Stored in: " . "../pic/" .$_SESSION["name"].'/'.$shopname.'/'. $_FILES[ "file" ][ "name" ][ $f ] . "<br/>";


					}

					echo "成功！<br/>";



//					echo "fail:" . $_FILES[ 'file' ][ 'error' ][ $f ];
				}
			} else {
				echo "没有上传任何文件";
			}

	echo"		</td>
			</tr>
			
		</table>
	</div>";

	
$con = mysqli_connect( "localhost", "root", "" );


			if ( !$con ) {

				die( 'Could not connect: ' . mysqli_error() );
			} else {
				echo "connect!<br/>";
			}
			// Create database


			// Create table in my_db database
			if ( mysqli_query( $con, 'set names utf8' ) ) {
				echo "set char";

			} else {
				echo "fail:set char" . mysqli_error( $con );
			}
			echo "<br>";



			if ( mysqli_select_db( $con, "test" ) ) {
				echo( "choose database test<br/>" );
			}
			if ( mysqli_query( $con, "select * from information_schema.tables where table_schema='test' and table_name='selltest'")) {
				echo "selltest 已创建";
				mysqli_error( $con );
			} else {
				$ct = "create table selltest
(

商品属性 text(20),
商品描述  text(40),
姓名 varchar(15),
电话  bigint(11),
wechat text(30),
邮箱 text(30),
身份 int(1),
id int auto_increment primary key not null
)";
				if ( mysqli_query( $con, $ct ) ) {

					echo "<br/>成功创建表单";
				} else {
					echo " <br/>no success创建表单" . mysqli_error( $con );
				}
			}
			$ins = "insert into selltest(商品名,商品属性,商品描述,姓名,电话,wechat,邮箱,身份,用户)
			values('$shopname','$c','$w','$n','$p','$wc','$e','$i','$s')";
			if ( mysqli_query( $con, $ins ) ) {
				echo "success insert";
			} else {
				echo "fail:to insert" . mysqli_error( $con );

			}
			echo "<br/>";

			mysqli_close( $con );



			
			
?>

</body>
<script>
	function jump(){
		location.href="../index.php";
	}
		setTimeout(jump,5000);
		</script>



</html>