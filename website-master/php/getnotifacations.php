<?php
  include_once('/DB_Functions.php');
  $obj = new DB_Functions();
  $userid = $_GET['id'];
  $count = $_GET['count'];
  $res;

  if($count == '0')
    $res = $obj->getNotifacationsLimit($userid,4);
  else
    $res = $obj->getNotifacationsLimit($userid,$count);

  $name;
  $arr = array();
  $arr['Notifacation'] = array();

  while ($row = mysqli_fetch_array($res)) {
    $row_arr = array();
    $name = mysqli_fetch_array($obj->getUserById($row['friendID']));

    $row_arr['fname'] = $name['firstname'].' '.$name['lastname'];
    $row_arr['description'] = $row['description'];
    $row_arr['date'] = $row['date'];

    array_push($arr['Notifacation'] ,$row_arr);
  }
  $jsonf = json_encode($arr);
  echo $jsonf;

 ?>
