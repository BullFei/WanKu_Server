<?php
  session_start();
if (!isset($_SESSION['admin_name'])) {
	header("location:index.php");
}

define("FROMPAGE",true);
 include("tool/sql_read.php");
  $sql1="select * from game_main_info where id=(select max(id) from game_main_info)";
  $query=mysql_query($sql1);
  @$row=mysql_fetch_array(@$query);
  $imgid=$row[@id]+1;
?>
<!Doctype html>
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
					<li class="active"><a href="addgame.php">增加游戏</a></li>
					<li><a href="recommend.php">推荐管理</a></li>
					<li><a href="listadmin.php">管理员列表</a></li>
					<li><a href="image.php">图片管理</a></li>
					<li><a href="other.php">其他</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<form action="" enctype="multipart/form-data" method="post" name="info" onsubmit="return CheckPost();"/>
					<div class="form-group">
						<label >游戏名：</label>
						<input type="text" class="form-control" name="name" title="请输入游戏名" required>
					</div>

					<div class="form-group">
						<label >游戏类型：</label>
						<select name="type">
							
					    <option value="0"></option>
					    <?php
					    $query=mysql_query("select * from game_type");
					    while ($row3=mysql_fetch_array($query)) {
					      echo "<option value=\"$row3[type_id]\">$row3[type_name]</option>";
					        
						}
					    ?>
					  </select>
					</div>

					<div class="form-group">
						<label >游戏大小：</label>
						<input type="text" class="form-control" name="size" title="请输入游戏大小" required>
					</div>
					

					<div class="form-group">
						<label >系统需求：</label>
						<select name="req">
							
					    <option value="0"></option>
					    <?php
					    $query=mysql_query("select * from game_osreq");
					    while ($row3=mysql_fetch_array($query)) {
					      echo "<option value=\"$row3[osreq_id]\">$row3[osreq_name]</option>";
					        
						}
					    ?>
					  </select>
					</div>

					<div class="form-group">
						<label >是否有内置广告：</label>
						<select name="ad">
							
						 <option value="0"></option>
					   	 <option value=\"1">有</option>";
					     <option value=\"2">无</option>";  
						
					  </select>
					</div>

					<div class="form-group">
						<label >游戏版本：</label>
						<input type="text" class="form-control" name="version" title="请输入游戏版本" required>
					</div>

					<div class="form-group">
						<label >游戏收费：</label>
						<select name="cost">
							
					    <option value="-1"></option>
					    <?php
					    $query=mysql_query("select * from game_cost");
					    while ($row3=mysql_fetch_array($query)) {
					      echo "<option value=\"$row3[cost_id]\">$row3[cost_name]</option>";
					        
						}
					    ?>
					  </select>
					</div>

					<label for="exampleInputEmail1">游戏评语：</label>
					<textarea class="form-control" rows="3" name="cmt" title="请输入游戏评语" required></textarea>
					<br/><br/>
					
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


function CheckPost()
{
      if(info.type.value=="0")
            {
                alert("请输入游戏类型");
                info.type.focus();
                return false;
            }
            if(info.req.value=="0")
            {
                alert("请输入系统需求");
                info.req.focus();
                return false;
            }
            if(info.ad.value=="0")
            {
                alert("请输入是否有广告");
                info.ad.focus();
                return false;
            }
            if(info.cost.value=="-1")
            {
                alert("请输入收费类型");
                info.cost.focus();
                return false;
            }

}


</script>
</SCRIPT>
</html>

<?php
if (@$_POST['submit']) {
	
		$img1="http://wanku-img-data.qiniudn.com/full-1-".$imgid.".jpg";
		$img2="http://wanku-img-data.qiniudn.com/full-2-".$imgid.".jpg";
		$img="http://wanku-img-data.qiniudn.com/main-".$imgid.".jpg";
		
	$sql="insert into `game_full_info` (id,img1,img2,type_id,size,osreq_id,ad,version,cost_id) values ('$imgid','$img1','$img2','$_POST[type]','$_POST[size]','$_POST[req]','$_POST[ad]','$_POST[version]','$_POST[cost]')";
	$query=mysql_query($sql);
	

	$sql2="insert into `game_main_info` (id,name,cmt,img) values ('','$_POST[name]','$_POST[cmt]','$img')";
	$query2=mysql_query($sql2);

	if ($query && $query2) {
			echo "<script language=\"javascript\">alert('添加成功');history.go(-1)</script>";
	}
	else
	{
	 		
	    echo "<script language=\"javascript\">alert('添加失败，请重新添加');history.go(-1)</script>";
	}
}

?>