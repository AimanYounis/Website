<?php

include_once('/DB_Functions.php');
$obj = new DB_Functions();
$userid = $_POST['id'];
$fid = $_POST['fid'];

date_default_timezone_set("Asia/Tel_Aviv");
$t=time();
$date = date("Y-m-d G:i:s",$t);

$res = $obj->getMsgs($userid,1);
$arr = mysqli_fetch_array($res);

if($fid == $arr['friendID'] or $fid == $arr['userID']){
  if( abs(strtotime($arr['date']) - strtotime($date)) == 1){
      echo "ACK";
    }else
      echo "NACK";
}else
  echo "NACK";


?>
