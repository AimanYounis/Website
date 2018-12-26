<?php

include_once'/DB_Functions.php';
$userid = $_POST['id'];
$postid = $_POST['pid'];
$obj = new DB_Functions();

$res = $obj->addLike($userid,$postid);

if($res){
  if($obj->updateLikeCount($postid)){
    $q = $obj->getPostById($postid);
    $lks = mysqli_fetch_array($q);

    $pres = mysqli_fetch_array($obj->getPostById($postid));

    if($userid != $pres['userID'])  // if someone liked his post doesn't apear in notifications
      $obj->addNotify($userid,$pres['userID'],"Liked one of your posts");

    echo "ACK ".$lks['likes'];
  }

  else {
    echo 'NACK';
  }
}else {
  echo 'NACK';
}


 ?>
