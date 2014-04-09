<?php 
	define("FROMPAGE", true);
	header("Content-Type: application/json; charset=utf-8");
	include("../tool/sql_read.php");
	$id = @$_GET[@id];
	if(empty($id))
	{
		echo "{'error':'Wrong id'}";
		return;
	}
	else
	{
		$sql = "SELECT game_main_info.id, name, cmt, img, img1, img2, type_id, size, osreq_id, ad, version, cost_id FROM game_full_info, game_main_info WHERE game_full_info.id = game_main_info.id and game_main_info.id = $id";
	}
	$result = mysql_query($sql);

	$row = mysql_fetch_assoc($result);
	$row[@cmt] = urlencode($row[@cmt]);
	$row[@name] = urlencode($row[@name]);
	$row[@img] = urlencode($row[@img]);
	$row[@img1] = urlencode($row[@img1]);
	$row[@img2] = urlencode($row[@img2]);
	echo urldecode(json_encode($row));
?>