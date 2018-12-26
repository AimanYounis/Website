<?php
  include_once'/DB_Functions.php';
  $obj = new DB_Functions();
  $userid = $_POST['id'];
  $friendid = $_POST['fid'];
  $name = $_POST['name'];
  $desc = $_POST['descr'];

  $descr = $name.' : '.$desc;

  $res = $obj->insertMessage($userid,$friendid,$descr);

  if($res){
    date_default_timezone_set("Asia/Tel_Aviv");
    $t=time();
    echo "ACK ".date("Y-m-d G:i:s",$t);
  }
  else {
    echo "NACK";
  }


?>
