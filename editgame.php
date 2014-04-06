<!Doctype html>
<?php

  session_start();
if (!isset($_SESSION['admin_name'])) {
	header("location:index.php");
}

define("FROMPAGE",true);
 include("/tool/sql.php");

  $SQL="SELECT id,name,cmt,img,invalid FROM `game_main_info` order by id desc";

  $query=mysql_query($SQL);
?>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<title>玩库管理平台</title>
	
	<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">
	<link href="css/main.css" rel="stylesheet">
<!-- 	<link href="css/addgame.css" rel="stylesheet"> -->


</head>

<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="col-md-12">
				<div class="page-header">
					<h1>
						玩 库 <small>后台管理平台</small>
					</h1>
					
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-2">
				<ul class="nav nav-pills nav-stacked">
					<li><a href="dashboard.php">首页</a></li>
					<li><a href="listgame.php">查看游戏列表</a></li>
					<li><a href="addgame.php">增加游戏</a></li>
					<li><a href="recommend.php">推荐管理</a></li>
					<li><a href="listadmin.php">管理员列表</a></li>
					<li><a href="other.php">其他</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<form>
					<div class="form-group">
						<label for="exampleInputEmail1">游戏名：</label>
						<input type="email" class="form-control" id="exampleInputEmail1">
					</div>
					<label for="exampleInputEmail1">游戏评语：</label>
					<textarea class="form-control" rows="3"></textarea>
					<div class="form-group">
						<label for="exampleInputFile">游戏主截图：</label>
						<input type="email" class="form-control" id="exampleInputEmail1">
					</div>
					
					<center>
					<button type="submit" class="btn btn-default">提交</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<button type="reset" class="btn btn-default">重置</button>
					</center>
				</form>

			</div>
		</div>
	</div>

</body>
<SCRIPT LANGUAGE="JavaScript">



function checkAll(flag)
{
	var input = document.getElementsByTagName("input");
	for (var i=0;i<input.length ;i++ )
	{
		if(input[i].type=="checkbox")
			input[i].checked = flag.checked;
	}
}

</SCRIPT>
</html>