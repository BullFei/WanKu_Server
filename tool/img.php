<?php
defined("FROMPAGE") or die(header("location:index.html"));
	/*
		img_query(游戏ID)
		游戏图片查询函数
		传入参数：
			图片ID,图片flag（1.main，2.full-1,3.full-2）
		返回值：
			成功：返回图片链接
			失败：返回0
	*/
	function img_query($game_id,$flag=1)
	{
		require_once("qiniu/rs.php");
		$bucket = "wanku-img-data";	//七牛库名

		if ($flag == 1){
			$imgname="main-".$game_id.".jpg"; //图片名main-
		}
		else if ($flag == 2){
			$imgname="full-1-".$game_id.".jpg"; //图片名full-1-
		}
		else if($flag == 3){
			$imgname="full-2-".$game_id.".jpg"; //图片名full-2-
		}


		$accessKey = 'Va6QOOgIChvvXK7YBlhT9UxPVuJJivhajbAtU38b';
		$secretKey = 'kOpCxSzcXHs1176HS3vLKDhjlxWTcUKVIC-XT8AZ';

		Qiniu_SetKeys($accessKey, $secretKey);
		$client = new Qiniu_MacHttpClient(null);

		list($ret, $err) = Qiniu_RS_Stat($client, $bucket, $imgname);
		if ($err !== null) {
		    return 0;
		} else {
		    return "http://wanku-img-data.qiniudn.com/".$imgname;
		}
	}
	/*
		img_update(游戏ID,本地完整路径)
		游戏图片上传函数
		传入参数：
			图片ID，,本地完整路径,图片flag（1.main，2.full-1,3.full-2）
		返回值：
			成功：返回图片链接
			失败：返回0
	*/
	function img_update($game_id,$file_path,$flag=1)
	{
		require_once("qiniu/io.php");
		require_once("qiniu/rs.php");

		$bucket = "wanku-img-data";

		if ($flag == 1){
			$imgname="main-".$game_id.".jpg"; //图片名main-
		}
		else if ($flag == 2){
			$imgname="full-1-".$game_id.".jpg"; //图片名full-1-
		}
		else if($flag == 3){
			$imgname="full-2-".$game_id.".jpg"; //图片名full-2-
		}

		$accessKey = 'Va6QOOgIChvvXK7YBlhT9UxPVuJJivhajbAtU38b';
		$secretKey = 'kOpCxSzcXHs1176HS3vLKDhjlxWTcUKVIC-XT8AZ';

		Qiniu_SetKeys($accessKey, $secretKey);
		$putPolicy = new Qiniu_RS_PutPolicy($bucket);
		$upToken = $putPolicy->Token(null);
		$putExtra = new Qiniu_PutExtra();
		$putExtra->Crc32 = 1;
		list($ret, $err) = Qiniu_PutFile($upToken, $imgname, $file_path, $putExtra);
		if ($err !== null) {
		    return 0;
		} else {
		    return "http://wanku-img-data.qiniudn.com/".$imgname;
		}
	}
	/*
		img_delete(游戏ID)
		游戏图片删除函数
		传入参数：
			图片ID,图片flag（1.main，2.full-1,3.full-2）
		返回值：
			成功：返回1
			失败：返回0
	*/
	function img_delete($game_id,$flag=1)
	{
		require_once("qiniu/rs.php");

		$bucket = "wanku-img-data";

		if ($flag == 1){
			$imgname="main-".$game_id.".jpg"; //图片名main-
		}
		else if ($flag == 2){
			$imgname="full-1-".$game_id.".jpg"; //图片名full-1-
		}
		else if($flag == 3){
			$imgname="full-2-".$game_id.".jpg"; //图片名full-2-
		}

		$accessKey = 'Va6QOOgIChvvXK7YBlhT9UxPVuJJivhajbAtU38b';
		$secretKey = 'kOpCxSzcXHs1176HS3vLKDhjlxWTcUKVIC-XT8AZ';

		Qiniu_SetKeys($accessKey, $secretKey);
		$client = new Qiniu_MacHttpClient(null);

		$err = Qiniu_RS_Delete($client, $bucket, $imgname);
		if ($err !== null) {
		    echo 0;
		} else {
		    echo 1;
		}
	}
?>