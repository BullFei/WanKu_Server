<?php

session_start();
if (!isset($_SESSION['admin_name'])) {
	header("location:index.php");
}

define("FROMPAGE",true);
include("tool/sql_read.php");

//获取数据库总条目数
$rows = @mysql_fetch_array(mysql_query("SELECT count(*) FROM game_main_info"));
$sqltotal = @$rows[0];	

$itemcount = 10;

$curpage = @$_GET[@page];
$curid = $sqltotal - $itemcount * ($curpage - 1);
$totalpage = ceil($sqltotal / $itemcount );


if (empty($curpage)) {
	$curpage = 1;
	$SQL="SELECT id,name,cmt,img,invalid FROM `game_main_info` order by id desc limit $itemcount ";
}
else{
	$SQL="SELECT id,name,cmt,img,invalid FROM `game_main_info` where id <= $curid order by id desc limit $itemcount ";
}


$query=mysql_query($SQL);
?>
<!Doctype html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<title>玩库管理平台</title>
	
	<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">
	<link href="css/main.css" rel="stylesheet">

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
					<li class="active"><a href="image.php">图片管理</a></li>
					<li><a href="other.php">其他</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<ul class="listfile">
					<?php while(@$row=mysql_fetch_array($query)){
						$str = $row[@img];
						 $str2 = substr($str,34,7);
						?>

					<li>
						<a href="image_edit.php?id=<?php echo @$row[id];?>" data-rel="image"><img src=<?php echo htmtocode(@$row[img]);?> alt="<?php echo htmtocode(@$row[name]);?>" /></a>
						<span class="filename"><?php echo $str2;?></span>
					</li>
					<?php 
				} 
				?>
				</ul>

				<div class="manu">
					<?php 
					if ($curpage==1||empty($curpage)) {
						echo '<span class="disabled"> <  上一页</span>';
					}
					else {
						echo '<a href="?page='.($curpage-1).'"><  上一页 </a>';
					}
					if ($curpage-3>1) {
						echo '...';
						for ($i = $curpage - 3;$i <= $totalpage&&$i < $curpage + 5;$i ++ )
						{
							if ($i == $curpage) {
								echo '<span class="current">'.$i.'</span>';
							}
							else {
								echo '<a href="?page='.$i.'">'.$i.'</a>';
							}
						}
					}
					else {
						for ($i = 1;$i <= $totalpage&&$i <= $curpage + 5;$i ++ )
						{
							if ($i == $curpage) {
								echo '<span class="current">'.$i.'</span>';
							}
							else {
								echo '<a href="?page='.$i.'">'.$i.'</a>';
							}
						}
					}
					if ( $curpage+5<=$totalpage){
						echo '...';
						echo '<a href="?page='.($totalpage-1).'">'.($totalpage-1).'</a>';
						echo '<a href="?page='.$totalpage.'">'.$totalpage.'</a>';
					}
					if ($curpage==$totalpage) {
						echo '<span class="disabled"> 下一页  ></span>';
					}
					else if (empty($curpage)) {
						echo '<a href="?page=2">下一页  > </a>';
					}
					else {
						echo '<a href="?page='.($curpage+1).'">下一页  > </a>';
					}
					?>
				</div>
				
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