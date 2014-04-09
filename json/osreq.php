<?php 
define("FROMPAGE", true);
header("Content-Type: application/json; charset=utf-8");
include("../tool/sql_read.php"); 
$id = @$_GET[@id];
	if(empty($id))
	{
		$sql = "select * from game_osreq";
	}
	else
	{
		$sql = "select * from game_osreq where osreq_id = $id";
	}
	$result = mysql_query($sql);
	$i = 0;
	while($row = mysql_fetch_assoc($result))
	{
		$row[@osreq_name]=urlencode($row[@osreq_name]);
		$rows[$i]=$row;
		$i++;
	}
	echo urldecode(json_encode($rows));
?>