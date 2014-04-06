<?php 
	header("Content-Type: application/json; charset=utf-8");
	$id = $_GET[id];
	$conn = mysql_connect(SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
	mysql_select_db(SAE_MYSQL_DB,$conn);
	mysql_query("set names 'utf8'");
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
		$row[cmt] = urlencode($row[cmt]);
		$row[name] = urlencode($row[name]);
		$row[img] = urlencode($row[img]);
		$rows[$i] = $row;
		$i++;
	}
	echo urldecode(json_encode($rows));
?>