<?php

/*
 * PHP100Job v1.0
 * Programmer : Msn/QQ haowubai@hotmail.com (925939)
 * www.php100.com Develop a project PHP - MySQL - Apache
 * Window 2003 - Preferences - PHPeclipse - PHP - Code Templates
 */
defined("FROMPAGE") or die (header("location:/"));
$conn =  mysql_connect("localhost", "root", "") or die("数据库连接失败");
mysql_select_db("app_wanku", $conn);
mysql_query("set names 'utf8'"); 

function htmtocode($content) {
	$content = str_replace("\n", "<br>", str_replace(" ", "&nbsp;", $content));
	return $content;
}


?>
