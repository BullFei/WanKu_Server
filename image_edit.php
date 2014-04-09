<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
	header("location:index.php");
}

define("FROMPAGE",true);
 include("tool/sql_read.php");
 include("tool/img.php");

 @$serch_no=intval($_GET['id']); 
  $SQL="SELECT * FROM `game_main_info` where id = $serch_no";
  $query=mysql_query($SQL);
  @$row=mysql_fetch_array(@$query);
 
 $SQL2="SELECT * FROM `game_full_info` where id = $serch_no";
  $query2=mysql_query($SQL2);
  @$row2=mysql_fetch_array(@$query2);

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
						<input type="text" class="form-control" name="name" value="<?php echo htmtocode(@$row[name]); ?>">
					</div>
					
					<div class="form-group">
						<label >游戏类型：</label>
						<select name="type">
							<?php 
								if($row2[type_id]==1) $type="动作";
								if($row2[type_id]==2) $type="休闲";
								if($row2[type_id]==3) $type="益智";
								if($row2[type_id]==4) $type="角色";
								if($row2[type_id]==5) $type="策略";
								if($row2[type_id]==6) $type="体育";
								if($row2[type_id]==7) $type="竞速";
								if($row2[type_id]==8) $type="射击";
								if($row2[type_id]==9) $type="塔防";
								if($row2[type_id]==10) $type="卡牌";
								if($row2[type_id]==11) $type="经营";
								if($row2[type_id]==12) $type="养成";
								if($row2[type_id]==99) $type="其它";

							?>
					    <option value="0"><?php echo @$type ?></option>
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
						<input type="text" class="form-control" name="size" value="<?php echo htmtocode(@$row2[size]); ?>">
					</div>
					

					<div class="form-group">
						<label >系统需求：</label>
						<select name="req">
							<?php 
								if($row2[osreq_id]==1) $type="Android1.6及以上";
								if($row2[osreq_id]==2) $type="Android2.1及以上";
								if($row2[osreq_id]==3) $type="Android2.2及以上";
								if($row2[osreq_id]==4) $type="Android2.3及以上";
								if($row2[osreq_id]==5) $type="Android4.0及以上";

							?>
					    <option value="0"><?php echo @$type ?></option>
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
							<?php 
								if($row2[ad]==1) $type="有";
								if($row2[ad]==2) $type="无";
							?>
						 <option value="0"><?php echo @$type ?></option>
					   	 <option value="1">有</option>
					     <option value="2">无</option>
						
					  </select>
					</div>

					<div class="form-group">
						<label >游戏版本：</label>
						<input type="text" class="form-control" name="version" value="<?php echo htmtocode(@$row2[version]); ?>">
					</div>

					<div class="form-group">
						<label >游戏收费：</label>
						<select name="cost">
							<?php 
								if($row2[cost_id]==0) $type="无收费";
								if($row2[cost_id]==1) $type="广告收费";
								if($row2[cost_id]==2) $type="内购";
								if($row2[cost_id]==3) $type="道具收费";
								if($row2[cost_id]==4) $type="关卡收费";
								if($row2[cost_id]==5) $type="点卡收费";
								if($row2[cost_id]==6) $type="商城收费";
								if($row2[cost_id]==7) $type="强化收费";
								if($row2[cost_id]==99) $type="其它";

							?>
					    <option value="0"><?php echo @$type ?></option>
					    <?php
					    $query=mysql_query("select * from game_cost");
					    while ($row3=mysql_fetch_array($query)) {
					      echo "<option value=\"$row3[cost_id]\">$row3[cost_name]</option>";
					        
						}
					    ?>
					  </select>
					</div>

					<label for="exampleInputEmail1">游戏评语：</label>
					<textarea class="form-control" name="cmt" rows="3"><?php echo htmtocode(@$row[cmt]); ?></textarea>
					
					<div class="form-group">
						<label for="exampleInputFile">游戏主截图：</label>
						<ul class="listfile">

						
						<li>

							<img src="<?php if(img_query($_GET['id'])!==0) echo htmtocode(@$row[img]); ?>">
							<span class="filename">
							 
							 <input  type="file"  name="newimage1">
							<input class="btn btn-info" type="submit" name="update1" value="确认上传">
							<input class="btn btn-info" type="submit" name="del1" value="删除图片">
							</span>
							
						</li>
						

						<li>

							<img src="<?php if(img_query($_GET['id'],2)!==0) echo htmtocode(@$row2['img-1']); ?>">
							<span class="filename">
							 
							 <input  type="file"  name="newimage2">
							<input class="btn btn-info" type="submit" name="update2" value="确认上传">
							<input class="btn btn-info" type="submit" name="del2" value="删除图片">
							</span>

						</li>
							
					

						 <li>
							<img src="<?php if(img_query($_GET['id'],3)!==0) echo htmtocode(@$row2['img-2']); ?>">
							<span class="filename">
							 
							 <input  type="file"  name="newimage3">
							<input class="btn btn-info" type="submit" name="update3" value="确认上传">
							<input class="btn btn-info" type="submit" name="del3" value="删除图片">
							</span>

						</li>
							
						</ul>
					</div>
										
						
					
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
if (@$_POST['update1']) {
	// $sql1="select * from game_main_info where id=(select max(id) from game_main_info)";
	// $query=mysql_query($sql1);
	// @$row=mysql_fetch_array(@$query);
	// $imgid=$row[@id]+1;
	$url = img_update($_GET['id'],$_FILES[@'newimage1']['tmp_name']);
	if($url!==0){
		  $sql="update `game_main_info` set img='$url' where id='$_GET[id]';";
		   $query=mysql_query($sql);
		echo "<script language=\"javascript\">alert('上传成功');window.location.reload();</script>";
}
 	else
 	{
 		echo "<script language=\"javascript\">alert('上传失败，请重新上传');history.go(-1)</script>";
 	}
}


if (@$_POST['update2']) {
	$url = img_update($_GET['id'],$_FILES[@'newimage2']['tmp_name'],2);
	if($url!==0){
		$sql="update `game_full_info` set img-1='$url' where id='$_GET[id]';";
		   $query=mysql_query($sql);
		echo "<script language=\"javascript\">alert('上传成功');window.location.reload();</script>";
}
 	else
 	{
 		echo "<script language=\"javascript\">alert('上传失败，请重新上传');history.go(-1)</script>";
 	}
}


if (@$_POST['update3']) {
	$url = img_update($_GET['id'],$_FILES[@'newimage3']['tmp_name'],3);
	if($url!==0){
		$sql="update `game_full_info` set img-2='' where id='$_GET[id]';";
		  $query=mysql_query($sql);
		echo "<script language=\"javascript\">alert('上传成功');window.location.reload();</script>";
}
 	else
 	{
 		echo "<script language=\"javascript\">alert('上传失败，请重新上传');history.go(-1)</script>";
 	}
}


if (@$_POST['del1']) {
     $sql3="update `game_main_info` set img='' where id='$_GET[id]' ";
      $query=mysql_query($sql3);

    if(img_delete($_GET['id'])){
		echo "<script language=\"javascript\">alert('删除失败，请重新删除');history.go(-1)</script>";
    	}
 	else
 	{
 		echo "<script language=\"javascript\">alert('删除成功');history.go(-1)</script>";
    
 	}
}


if (@$_POST['del2']) {
$sql3="update `game_full_info` set img-1='' where id='$_GET[id]' ";
      $query=mysql_query($sql3);
    if(img_delete($_GET['id'],2)){
		echo "<script language=\"javascript\">alert('删除失败，请重新删除');history.go(-1)</script>";
    	}
 	else
 	{
 		echo "<script language=\"javascript\">alert('删除成功');history.go(-1)</script>";
    
 	}
}


if (@$_POST['del3']) {
$sql3="update `game_full_info` set 'img-2'='' where id='$_GET[id]' ";
      $query=mysql_query($sql3);
    if(img_delete($_GET['id'],3)){
		echo "<script language=\"javascript\">alert('删除失败，请重新删除');history.go(-1)</script>";
    	}
 	else
 	{
 		echo "<script language=\"javascript\">alert('删除成功');history.go(-1)</script>";
    
 	}
}


if (@$_POST['submit']) {
	$sql3="SELECT * FROM `game_full_info` where id='$_GET[id]'";
	$query3=mysql_query($sql3);
	
	if (@$row3=mysql_fetch_array(@$query3)) {
		$sql="update `game_full_info` set type_id='$_POST[type]',size='$_POST[size]',osreq_id='$_POST[req]',ad='$_POST[ad]',version='$_POST[version]',cost_id='$_POST[cost]' where id='$_GET[id]'";
		$query=mysql_query($sql);
	}
	else{
		$img1="http://wanku-img-data.qiniudn.com/full-1-".$_GET[id].".jpg";
		$img2="http://wanku-img-data.qiniudn.com/full-2-".$_GET[id].".jpg";

		$sql="insert into `game_full_info` (id,img1,img2,type_id,size,osreq_id,ad,version,cost_id) values ('$_GET[id]','$img1','$img2','$_POST[type]','$_POST[size]','$_POST[req]','$_POST[ad]','$_POST[version]','$_POST[cost]')";
		$query=mysql_query($sql);
	}

	$sql2="update `game_main_info` set name='$_POST[name]',cmt='$_POST[cmt]' where id='$_GET[id]'";
	$query2=mysql_query($sql2);

	if ($query && $query2) {
			echo "<script language=\"javascript\">alert('修改成功');history.go(-1)</script>";
	}
	else
	{
	 		
	    echo "<script language=\"javascript\">alert('修改失败，请重新修改');history.go(-1)</script>";
	}
}
?>
