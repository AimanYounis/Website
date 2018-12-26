<?php

    include_once'/DB_Functions.php';
    $userid = $_GET['id'];

    $obj = new DB_Functions();
    $res = $obj->getAllUsers();

    $arr = array();
    $arr['Friend'] = array();
    $row_arr = array();
    if(mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_array($res)){
        $fiendres = $obj->checkFriend($userid,$row['ID']);
        if(mysqli_num_rows($fiendres) > 0){
          $row_arr['id'] = $row['ID'];
          $row_arr['firstname'] = $row['firstname'];
          $row_arr['lastname'] = $row['lastname'];
          array_push($arr['Friend'],$row_arr);
        }
      }

      $jsonf = json_encode($arr);
      echo $jsonf;
    }
  else {
    echo 'NACK';
  }
?>
