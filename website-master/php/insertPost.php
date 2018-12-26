<?php

  include_once'/DB_Functions.php';
  $userid = $_POST['id'];
  $text = $_POST['desc'];
  $obj = new DB_Functions();

  $res = $obj->addPost($userid,$text);

  if($res != 0){
    date_default_timezone_set("Asia/Tel_Aviv");
    $t=time();
    echo 'ACK '.$res.' '.date("Y-m-d G:i:s",$t);
  }
  else {
    echo 'NACK';
  }
?>
