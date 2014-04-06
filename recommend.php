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
					
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-2">
				<ul class="nav nav-pills nav-stacked">
					<li><a href="dashboard.php">首页</a></li>
					<li><a href="listgame.php">查看游戏列表</a></li>
					<li><a href="addgame.php">增加游戏</a></li>
					<li class="active"><a href="recommend.php">推荐管理</a></li>
					<li><a href="listadmin.php">管理员列表</a></li>
					<li><a href="other.php">其他</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<table class="table table-condensed table-striped table-hover" contenteditable="true">
					<thead>
						<tr>
							<th><input type="checkbox" onclick="checkAll(this)"></th>
							<th>编号</th>
							<th>产品</th>
							<th>交付时间</th>
							<th>状态</th>
						</tr>
					</thead>
					<tbody>
						<tr style="background-color:#999999;">
							<td><input type="checkbox"></td>
							<td>1</td>
							<td>TB - Monthly</td>
							<td>01/04/2012</td>
							<td>Default</td>
						</tr>
						<tr style="background-color:#cccccc;">
							<td><input type="checkbox"></td>
							<td>1</td>
							<td>TB - Monthly</td>
							<td>01/04/2012</td>
							<td>Approved</td>
						</tr>
						<tr style="background-color:#999999;">
							<td><input type="checkbox"></td>
							<td>2</td>
							<td>TB - Monthly</td>
							<td>02/04/2012</td>
							<td>Declined</td>
						</tr>
						<tr style="background-color:#cccccc;" >
							<td><input type="checkbox"></td>
							<td>3</td>
							<td>TB - Monthly</td>
							<td>03/04/2012</td>
							<td>Pending</td>
						</tr>
						<tr style="background-color:#999999;">
							<td><input type="checkbox"></td>
							<td>4</td>
							<td>TB - Monthly</td>
							<td>04/04/2012</td>
							<td>Call in to confirm</td>
						</tr>
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