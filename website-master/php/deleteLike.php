<?php

include_once'/DB_Functions.php';
$userid = $_POST['id'];
$postid = $_POST['pid'];
$obj = new DB_Functions();

$res = $obj->deleteLike($userid,$postid);

if($res){
  if($obj->updateLikeCount($postid)){
    $q = $obj->getPostById($postid);
    $lks = mysqli_fetch_array($q);

    echo "ACK ".$lks['likes'];
  }

  else {
    echo 'NACK';
  }
}else {
  echo 'NACK';
}


 ?>
