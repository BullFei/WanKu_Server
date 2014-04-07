<?php

      img_delete($_GET[id]);
    	@$sql3="update `game_main_info` set img='' where id='$_GET[id]' ";
    if(@mysql_query($sql3))
    	echo "<script language=\"javascript\">alert('删除成功');window.close();</script>";
 	else
 	{
 		echo "<script language=\"javascript\">alert('删除失败，请重新删除');history.go(-1)</script>";
 	}

 
?>