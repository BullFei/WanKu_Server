<?php 
/*
登录密码加密算法
*/
defined("FROMPAGE") or die(header("location:/")); 
function ChangeMsg($msgu,$msgp)
{
  if($msgu!="" && $msgp!="")
  {
    $delmsg = md5($msgu);
    $rname = substr($delmsg,5,1).",".substr($delmsg,7,1).",".substr($delmsg,15,1).",".substr($delmsg,17,1);
    $rnamearray = explode(',',$rname);
    $rpass = md5($msgp);
    $r_msg = str_replace($rnamearray, "", $rpass);
  }else{
    $r_msg = $msgp;
  }
  return $r_msg;
}
?>