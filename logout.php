<?php
	session_start();
	$old_user = $_SESSION['admin_name'];
	unset($_SESSION['admin_name']);
	session_destroy();
	 echo "<script language=\"javascript\">alert('注销成功');history.go(-1)</script>";
?>
