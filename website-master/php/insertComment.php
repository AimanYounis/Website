<?php
include_once'/DB_Functions.php';
$userid = $_POST['id'];
$postid = $_POST['pid'];
$text = $_POST['desc'];
$obj = new DB_Functions();
$t;
$pres;
$res = $obj->addComment($userid,$postid,$text);

if($res != 0){
  date_default_timezone_set("Asia/Tel_Aviv");
  $t=time();

  $pres = mysqli_fetch_array($obj->getPostById($postid));

  if($userid != $pres['userID'])
    $obj->addNotify($userid,$pres['userID'],"Commented on one of your posts");

  echo 'ACK '.date("Y-m-d G:i:s",$t);
}
else {
  echo 'NACK';
}
?>
