<!Doctype html>
<?php

  session_start();
if (!isset($_SESSION['admin_name'])) {
	header("location:index.php");
}

define("FROMPAGE",true);
 include("/tool/sql.php");
 include("/tool/img.php");

 @$serch_no=intval($_GET['id']); 
  $SQL="SELECT * FROM `game_main_info` where id = $serch_no";
  $query=mysql_query($SQL);
  @$row=mysql_fetch_array(@$query);


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
					<?php
 					echo'<p style="float: right;font-size:20px;margin-top: -26px;">欢迎你,'.$_SESSION['admin_name'].'&nbsp<a href="logout.php" >退出</a></p>'
					?>
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
					<li><a href="image.php">图片管理</a></li>
					<li><a href="other.php">其他</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<form action="" enctype="multipart/form-data" method="post" name="upform">
					<div class="form-group">
						<label >游戏名：</label>
						<input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo htmtocode(@$row[name]); ?>">
					</div>

					<label for="exampleInputEmail1">游戏评语：</label>
					<textarea class="form-control" rows="3"><?php echo htmtocode(@$row[cmt]); ?></textarea>
					
					<div class="form-group">
						<label for="exampleInputFile">游戏主截图：</label>
						<img src="<?php echo htmtocode(@$row[img]); ?>">
						
					</div>
					
					
						<label >上传新的游戏主截图：</label>
						<input type="file"  name="newimage">
					   <br/>
					   <label><a href="image_delete.php?id=<?php echo htmtocode(@$row[id]); ?>">删除图片</a></label>
					
					<center>
					<input type="submit" class="btn btn-default" name="submit" value="提交">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
<?php
	$sql1="select * from game_main_info where id=(select max(id) from game_main_info)";
	$query=mysql_query($sql1);
	@$row=mysql_fetch_array(@$query);
	$imgid=$row[@id]+1;
	if(img_update($imgid,@$_FILES['newimage']['tmp_name']))
		echo "<script language=\"javascript\">alert('上传成功');window.close();</script>";
 	else
 	{
 		echo "<script language=\"javascript\">alert('上传失败，请重新上传');history.go(-1)</script>";
 	}

?>