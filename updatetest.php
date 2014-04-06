<?php 
define("FROMPAGE", true);
include "tool/img.php";
echo img_query(1)."<br>";
echo img_query(24)."<br>";
echo img_update(24,'E:\Workspace PHP\wanku\img-small\1.jpg')."<br>";
echo img_query(24)."<br>";
echo img_delete(24)."<br>";
?>