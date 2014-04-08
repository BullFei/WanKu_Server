<?php 
define("FROMPAGE", true);
include "tool/img.php";
// header("Content-Type: text/html;charset=utf-8");
// echo img_query(1)."<br>";
// echo img_query(1,2)."<br>";
// echo img_query(24)."<br>";
 // echo img_update(25,'F:\图片\图片\1.jpg')."<br>";
// echo img_update(24,'F:\1.jpg')."<br>";
 // echo img_query(23)."<br>";
 // echo img_delete(23,2)."<br>";

// function img_update($game_id,$file_path,$flag=1)
// 	{
// 		require_once("tool/qiniu/io.php");
// 		require_once("tool/qiniu/rs.php");

// 		$bucket = "wanku-img-data";

// 		if ($flag == 1){
// 			$imgname="main-".$game_id.".jpg"; //图片名main-
// 		}
// 		else if ($flag == 2){
// 			$imgname="full-1-".$game_id.".jpg"; //图片名full-1-
// 		}
// 		else if($flag == 3){
// 			$imgname="full-2-".$game_id.".jpg"; //图片名full-2-
// 		}

// 		$accessKey = 'Va6QOOgIChvvXK7YBlhT9UxPVuJJivhajbAtU38b';
// 		$secretKey = 'kOpCxSzcXHs1176HS3vLKDhjlxWTcUKVIC-XT8AZ';

// 		Qiniu_SetKeys($accessKey, $secretKey);
// 		$putPolicy = new Qiniu_RS_PutPolicy($bucket);
// 		$upToken = $putPolicy->Token(null);
// 		$putExtra = new Qiniu_PutExtra();
// 		$putExtra->Crc32 = 1;
// 		list($ret, $err) = Qiniu_PutFile($upToken, $imgname, $file_path, $putExtra);
// 		if ($err !== null) {
// 		    var_dump($err);
// 		} else {
// 		    var_dump($ret);
// 		}
// 	}



 // include("/tool/sql.php");

	// 		$sql="update `game_main_info` set img='sdasdasdas' where id=23;";
	// 	  $query=mysql_query($sql);






?>