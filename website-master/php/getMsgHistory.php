<?php
  include_once('/DB_Functions.php');
  $obj = new DB_Functions();
  $userid = $_GET['id'];
  $fid = $_GET['fid'];
  $res = $obj->getMsglog($userid,$fid);
  $name;
  $arr = array();
  $arr['Message'] = array();

  while ($row = mysqli_fetch_array($res)) {
    $row_arr = array();

    $name = mysqli_fetch_array($obj->getUserById($row['userID']));
    $row_arr['uID'] = $row['userID'];
    $row_arr['fname'] = $name['firstname'].' '.$name['lastname'];
    $row_arr['description'] = $row['description'];
    $row_arr['date'] = $row['date'];
    array_push($arr['Message'] ,$row_arr);
  }
  $jsonf = json_encode($arr);
  echo $jsonf;

 ?>
