<?php 
define("FROMPAGE",true);
include "tool/sql_read.php";
include "tool/passwdmd5.php"
?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <title>玩库管理平台</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <form class="form-signin" method="post" role="form">
        <h1 class="form-signin-heading">玩 库 · 管 理 平 台</h1>
        <input type="text" name="user" class="form-control" maxlength=18 placeholder="请输入用户名" required autofocus >
        <input type="password" name="password" class="form-control" maxlength=18 placeholder="请输入密码" required>
        <?php
        $user = @$_POST["user"];
        $password = @$_POST["password"];
        if ($user==""&&$password=="") {
        }
        else
        {
          $password = ChangeMsg($user,$password);
          $sql="select admin_password from admin_info where admin_name='$user'";
          $query=mysql_query($sql);
          $rows=@mysql_fetch_array($query);
          if($password==$rows['admin_password'])
          {
            session_start();
            session_cache_expire(10);
            $_SESSION['admin_name']=$user;
            header("location:http:dashboard.php");  
          }
          else
          {
            echo "<p>用户名或密码错误！</p>";
          }
        }
        ?>
        <button class="btn btn-lg btn-primary btn-block" type="submit">进 入</button>
      </form>
    </div> 
  </body>
</html>
