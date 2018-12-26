<?php
session_start();
include_once '/db_functions.php';

  $username = $_POST['user'];
  $password = $_POST['pass'];

  $obj = new DB_Functions();
  $res = $obj->check($username,$password);
  $row = mysqli_fetch_array($res);
  $arr=array();

if (!empty($row['usernameid']) AND !empty($row['password'])) {

  if($username == $row['usernameid']){
    if($password == $row['password']){
      $_SESSION['myUserfName'] = $row['firstname'];
      $_SESSION['myUserlName'] = $row['lastname'];
      $_SESSION['user'] = $password;
      $_SESSION['pass'] = $username;
      $_SESSION['myUserId'] = $row['ID'];
      echo "ACK";
    }else {
      echo "NACK PASS";
      session_destroy();
    }
  }else {
    echo "NACK USER";
    session_destroy();
  }

   session_write_close();

}else {
  session_destroy();
  echo "NACK";
}



?>
