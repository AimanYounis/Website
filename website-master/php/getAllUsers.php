<?php

    include_once'/DB_Functions.php';

    $obj = new DB_Functions();
    $res = $obj->getAllUsers();
    if(mysqli_num_rows($res) > 0){

      $arr = array();
      $arr['Connections'] = array();
      while($row = mysqli_fetch_array($res)){
        $row_arr =  array();
        $row_arr['ID'] = $row['ID'];

        $row_arr['firstname'] = $row['firstname'];
        $row_arr['lastname'] = $row['lastname'];
        $row_arr['Job1'] = $row['Job1'];
        $row_arr['Job2'] = $row['Job2'];
        $row_arr['Date'] = $row['Date'];

        $expQ = $obj->getUserExpById($row['ID']);

        if(mysqli_num_rows($expQ) > 0){
          while($exprow = mysqli_fetch_array($expQ)){
            $row_arr['Exp'][] = array(
                 'company' => $exprow['company'],
                 'yearnum' => $exprow['yearnum'],
             );
          }
        }
        array_push($arr['Connections'],$row_arr);
      }
      $jsonf = json_encode($arr);
      echo $jsonf;
    }
  else {
    echo 'NACK';
  }
?>
