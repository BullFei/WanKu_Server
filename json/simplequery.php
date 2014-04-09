<?php 
	define("FROMPAGE", true);
	header("Content-Type: application/json; charset=utf-8");
	include("../tool/sql_read.php");
	$id = @$_GET[@id];
	if(empty($id))
	{
		$sql ="select id,name,cmt,img from game_main_info order by id desc limit 20";
	}
	else
	{
		$sql = "select id,name,cmt,img from game_main_info where id < $id order by id desc limit 20"; 
	}
	$result = mysql_query($sql);

	$i=0;
	while ($row = mysql_fetch_assoc($result)) {
		$row[@cmt] = urlencode($row[@cmt]);
		$row[@name] = urlencode($row[@name]);
		$row[@img] = urlencode($row[@img]);
		$rows[$i] = $row;
		$i++;
	}
	echo urldecode(json_encode($rows));
?>