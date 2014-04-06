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
					<li class="active"><a href="listgame.php">查看游戏列表</a></li>
					<li><a href="addgame.php">增加游戏</a></li>
					<li><a href="recommend.php">推荐管理</a></li>
					<li><a href="listadmin.php">管理员列表</a></li>
					<li><a href="other.php">其他</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<table class="table table-condensed table-striped table-hover" >
					<thead>
						<tr>
							<th><input type="checkbox" onclick="checkAll(this)"></th>
							<th>编号</th>
							<th>游戏名</th>
							<th>游戏评语</th>
							<th>游戏主截图</th>
							<th>状态</th>
						</tr>
					</thead>
					<tbody>
						<?php while(@$row=mysql_fetch_array($query)){ 
							if ($row[@id]%2==0) {
								echo '<tr style="background-color:#999999;">';
							}
							else
								echo '<tr style="background-color:#cccccc;">';
							?>   
						
							<td><input type="checkbox"></td>
							<td><?php echo htmtocode(@$row[id]); ?></td>
							<td><a href="http://localhost/walk/phplocal/demos/wanku_admin/editgame.php?id=<?php echo @$row[id];?>"><?php echo htmtocode(@$row[name]); ?></a></td>
							<td><?php echo htmtocode(@$row[cmt]); ?></td>
							<td><?php echo htmtocode(@$row[img]); ?></td>
							<?php
							if (@$row[invalid]) {
								echo '<td align=center><img src="img/s_okay.png" alt="数据完整"></td>';
							}
							else
								echo '<td align=center><img src="img/s_error.png" alt="图片上传不完整"></td>';
							?>
							
						</tr>
				    <?php
					}
					 ?>
					</tbody>
				</table>

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