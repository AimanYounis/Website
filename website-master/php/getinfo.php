<?php

include_once'/DB_Functions.php';

$obj = new DB_Functions();
$res = $obj->getAllUsers();
$jsonf;

if($res != false){
  $arr = array();
  $arr['Connections'] = array();
  while($row = mysqli_fetch_array($res)){
    $row_arr =  array();
    $row_arr['ID'] = $row['ID'];

    $row_arr['firstname'] = $row['firstname'];
    $row_arr['lastname'] = $row['lastname'];

    array_push($arr['Connections'],$row_arr);
  }
  $jsonf = json_encode($arr);

}else {
  echo "Error !";
}
$jfo = json_decode($jsonf);
$a =  $jfo->Connections;

$q = $_REQUEST["q"];

$hint = "";

if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
      if (stristr($q, substr($name->firstname, 0, $len))) {
          if ($hint === "") {
            $item = '<li class="well"><a href = "profile.php?id='.$name->ID.'">'.$name->firstname.' '.$name->lastname.'</a></li>';
            $hint =  $item;
          } else {
            $item = '<li class="well"><a href = "profile.php?id='.$name->ID.'">'.$name->firstname.' '.$name->lastname.'</a></li>';
            $hint .=  $item;
          }
        }
      }
    }

    echo $hint === "" ? "no suggestion" : $hint ;


 ?>
