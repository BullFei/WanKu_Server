<!Doctype html>
<?php

  session_start();
if (!isset($_SESSION['admin_name'])) {
	header("location:index.php");
}

define("FROMPAGE",true);
 include("/tool/sql.php");

  $SQL="SELECT admin_id,admin_name,admin_password,admin_privileges FROM `admin_info` order by admin_id ";
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
					<li><a href="listgame.php">查看游戏列表</a></li>
					<li><a href="addgame.php">增加游戏</a></li>
					<li><a href="recommend.php">推荐管理</a></li>
					<li class="active"><a href="listadmin.php">管理员列表</a></li>
					<li><a href="other.php">其他</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<table class="table table-condensed table-striped table-hover">
					<thead>
						<tr>
							<th><input type="checkbox" onclick="checkAll(this)"></th>
							<th>管理员编号</th>
							<th>管理员名字</th>
							<th>管理员密码</th>
							<th>管理员权限</th>
							<th>操作</th>

						</tr>
					</thead>
					<tbody>
						<?php while(@$row=mysql_fetch_array($query)){ 
							if ($row[@admin_id]%2==0) {
								echo '<tr style="background-color:#999999;">';
							}
							else
								echo '<tr style="background-color:#cccccc;">';
							?>   
						
							<td><input type="checkbox"></td>
							<td><?php echo htmtocode(@$row[admin_id]); ?></td>
							<td><?php echo htmtocode(@$row[admin_name]); ?></td>
							<td><?php echo htmtocode(@$row[admin_password]); ?></td>
							<td><?php echo htmtocode(@$row[admin_privileges]); ?></td>
							<td>111</td>
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