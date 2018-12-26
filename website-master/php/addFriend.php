<?php
include_once'/DB_Functions.php';
$userid = $_POST['id'];
$friendid = $_POST['fid'];
$obj = new DB_Functions();

  $res = $obj->addFriend($userid,$friendid);

  if($res){
      $obj->addNotify($userid,$friendid,"Added you as a friend");
    echo "ACK";
  }


 ?>
