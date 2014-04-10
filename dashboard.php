<?php

session_start();
if (!isset($_SESSION['admin_name'])) {
	header("location:index.php");
}


define("FROMPAGE",true);
include("tool/sql_read.php");

?>
<!Doctype html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<title>玩库管理平台</title>
	
	<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">
	<link href="css/main.css" rel="stylesheet">
	<script type="text/javascript" src="js/ichart.1.2.min.js"></script>

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
					<li class="active"><a href="dashboard.php">首页</a></li>
					<li><a href="listgame.php">查看游戏列表</a></li>
					<li><a href="addgame.php">增加游戏</a></li>
					<li><a href="recommend.php">推荐管理</a></li>
					<li><a href="listadmin.php">管理员列表</a></li>
					<li><a href="image.php">图片管理</a></li>
					<li><a href="other.php">其他</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<script>
				<?php 
				$SQL="SELECT type_id ,count(type_id) FROM  game_full_info GROUP BY type_id";
				$query=mysql_query($SQL); 

				$i=1;
				while($i<=13)
				{
					$rows[$i]=0;
					$i++;
				}
				while($row = mysql_fetch_assoc($query))
				{
					$rows[$row["type_id"]] = $row["count(type_id)"] ;
				}
				?>
	//定义数据
	var data = [
	{name : '动作',value : <?php echo $rows[1]; ?>,color:'#a5c2d5'},
	{name : '休闲',value : <?php echo $rows[2]; ?>,color:'#cbab4f'},
	{name : '益智',value : <?php echo $rows[3]; ?>,color:'#76a871'},
	{name : '角色',value : <?php echo $rows[4]; ?>,color:'#76a871'},
	{name : '策略',value : <?php echo $rows[5]; ?>,color:'#a56f8f'},
	{name : '体育',value : <?php echo $rows[6]; ?>,color:'#c12c44'},
	{name : '竞速',value : <?php echo $rows[7]; ?>,color:'#a56f8f'},
	{name : '射击',value : <?php echo $rows[8]; ?>,color:'#9f7961'},
	{name : '塔防',value : <?php echo $rows[9]; ?>,color:'#76a871'},
	{name : '卡牌',value : <?php echo $rows[10]; ?>,color:'#6f83a5'},
	{name : '经营',value : <?php echo $rows[11]; ?>,color:'#6f83a5'},
	{name : '养成',value : <?php echo $rows[12]; ?>,color:'#6f83a5'},
	{name : '其他',value : <?php echo $rows[13]; ?>,color:'#6f83a5'}
	];
	$(function(){	
		var chart = new iChart.Column2D({
			render : 'canvasDiv',//渲染的Dom目标,canvasDiv为Dom的ID
			data: data,//绑定数据
			title : '游戏类型情况统计',//设置标题
			width : 600,//设置宽度，默认单位为px
			height : 300,//设置高度，默认单位为px
			shadow:true,//激活阴影
			shadow_color:'#c7c7c7',//设置阴影颜色
			coordinate:{//配置自定义坐标轴
				scale:[{//配置自定义值轴
					 position:'left',//配置左值轴	
					 start_scale:0,//设置开始刻度为0
					 end_scale:<?php echo max($rows); ?>,//设置结束刻度为26
					 scale_space:<?php echo max($rows)/5; ?>,//设置刻度间距
					 listeners:{//配置事件
						parseText:function(t,x,y){//设置解析值轴文本
							return {text:t+" "}
						}
					}
				}]
			}
		});
		//调用绘图方法开始绘图
		chart.draw();
	});
	

	</script>
	<script>
	<?php 
	$SQL="SELECT invalid ,count(invalid) FROM  game_main_info GROUP BY invalid";
	$query=mysql_query($SQL);
	$rows[0]=0;
	$rows[1]=0;
	while($row=mysql_fetch_assoc($query))
	{
		$rows[$row["invalid"]]=$row["count(invalid)"];
	}
	?>
	$(function(){
		var data = [
		{name : '报错',value : <?php echo $rows[0]; ?>,color:'#9d4a4a'},
		// {name : 'Chrome',value : 29.84,color:'#5d7f97'},
		// {name : 'Firefox',value : 24.88,color:'#97b3bc'},
		// {name : 'Safari',value : 6.77,color:'#a5aaaa'},
		// {name : 'Opera',value : 2.02,color:'#778088'},
		{name : '正确',value : <?php echo $rows[1]; ?>,color:'#6f83a5'}
		];

				        	new iChart.Pie2D({
				        		render : 'canvasDiv2',
				        		data: data,
				        		title : '数据完整情况',
				        		legend : {
				        			enable : true
				        		},
					// background_color:'red',
					showpercent:true,
					decimalsnum:2,
					width : 600,
					height : 300,
					// align: 'center',
					// offsetx: 50,
					// offsety:50,
					radius:100
				}).draw();
				        });


	</script>
	<!-- //Html代码 -->
	<div id='canvasDiv' style="float:left;border:none " ></div>
	<div id='canvasDiv2' style="float:left;border:none"></div>

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