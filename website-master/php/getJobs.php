<?php

include_once'/DB_Functions.php';

$obj = new DB_Functions();
if(isset($_GET['lmt']))
  $res = $obj->getAds();

else
  $res = $obj->getJobs();

$arr = array();
$arr['Job'] = array();

while($row = mysqli_fetch_array($res)){
  $row_arr =  array();

  $row_arr['address'] = $row['address'];
  $row_arr['company'] = $row['company'];
  $row_arr['description'] = $row['description'];
  $row_arr['email'] = $row['email'];

  array_push($arr['Job'] ,$row_arr);
}
$jsonf = json_encode($arr);
echo $jsonf;

?>
