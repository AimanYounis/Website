<?php

include_once '/db_functions.php';

  $userid = $_POST['user'];
  $password = $_POST['pass'];
  $passwordconfirmation = $_POST['passconf'];
  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $skills = $_POST['skils'];
  $job1 = $_POST['jobO'];
  $job2 = $_POST['jobT'];
  $time = $_POST['date'];
  $exres = 0;
  $exres2 = 0;
  $dateformat = "";

  $obj = new DB_Functions();
  $res = $obj->check($userid);
  $row = mysqli_fetch_array($res);

  if (!empty($row['usernameid'])) {

      $PHPtext = "UserName already in Use !!";
      echo $PHPtext;

  }else{
        $t = strtotime(str_replace('-','/',$time));
        if($t != false){
          $dateformat = date('Y-m-d',$t);
          $result = $obj->addtodb($userid,$password,$firstname,$lastname,$job1,$job2,$skills,$dateformat);

          if($result != 0){
            if($_POST['expOc'] != '' && $_POST['expOy']  != '')
              $exres = $obj->addExper($result,$_POST['expOc'],$_POST['expOy']);
           if($_POST['expTc'] != '' && $_POST['expTy']  != '')
              $exres2 = $obj->addExper($result,$_POST['expTc'],$_POST['expTy']);
            if($exres == 0 || $exres2 == 0) {
                echo "User added but couldn't add all of user's experiences";
              }else {
                echo "Added user successfully";
              }
          }else {
            echo "Couldn't add user";
          }
      }else {
          echo "Wrong date format enterd !, couldn't add user ";
      }
  }









?>
