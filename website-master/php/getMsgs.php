<?php
  include_once('/DB_Functions.php');
  $obj = new DB_Functions();
  $userid = $_GET['id'];

  $res = $obj->getMsgs($userid,4);
  $name;
  $arr = array();
  $arr['Message'] = array();

  while ($row = mysqli_fetch_array($res)) {
    $row_arr = array();
    if($userid == $row['userID']){
      $name = mysqli_fetch_array($obj->getUserById($row['friendID']));
      $row_arr['uID'] = $row['friendID'];
    }

    else if($userid == $row['friendID']){
      $name = mysqli_fetch_array($obj->getUserById($row['userID']));
      $row_arr['uID'] = $row['userID'];
    }
    $row_arr['fname'] = $name['firstname'].' '.$name['lastname'];
    $row_arr['description'] = $row['description'];

    array_push($arr['Message'] ,$row_arr);
  }
  $jsonf = json_encode($arr);
  echo $jsonf;

 ?>
