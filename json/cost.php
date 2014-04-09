<?php 
define("FROMPAGE", true);
header("Content-Type: application/json; charset=utf-8");
include("../tool/sql_read.php"); 
$id = @$_GET[@id];
	if(empty($id))
	{
		$sql = "select * from game_cost";
	}
	else
	{
		$sql = "select * from game_cost where cost_id = $id";
	}
	$result = mysql_query($sql);
	$i = 0;
	while($row = mysql_fetch_assoc($result))
	{
		$row[@cost_name]=urlencode($row[@cost_name]);
		$rows[$i]=$row;
		$i++;
	}
	echo urldecode(json_encode($rows));
?>