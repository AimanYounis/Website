<?php
  include_once('/DB_Functions.php');
  $obj = new DB_Functions();
  $userid = $_GET['id'];

  $arr_posts = array();
  $arr_posts['Post'] = array();

  $resPosts = $obj->getPosts($userid);
  $row_arr =  array();

  if(mysqli_num_rows($resPosts) > 0){
    while($row = mysqli_fetch_array($resPosts)){

      $row_arr['postID'] = $row['ID'];
      $row_arr['userID'] = $row['userID'];

      $userQ = $obj->getUserById($row['userID']);

      if(mysqli_num_rows($userQ) > 0)
        $userrow = mysqli_fetch_array($userQ);

      $row_arr['name'] = $userrow['firstname'].' '.$userrow['lastname'];
      $row_arr['description'] = $row['description'];
      $row_arr['likes'] = $row['likes'];
      $row_arr['date'] = $row['date'];

      $comQ = $obj->getCommentByPostId($row_arr['postID']);

      if(mysqli_num_rows($comQ) > 0){
        while($exprow = mysqli_fetch_array ($comQ)){

          $rescommenter = $obj->getUserById($exprow['userID']);
          $crowus = array();

          if(mysqli_num_rows($rescommenter) > 0)
            $crowus = mysqli_fetch_array($rescommenter);

          $row_arr['Comments'][] = array(
               'id'=> $exprow['userID'].'&'.$exprow['postID'],
               'commented' => $crowus['firstname'].' '.$crowus['lastname'],
               'comment' => $exprow['description'],
               'date'=> $exprow['date'],
           );
        }
      }else{
        $row_arr['Comments'] = array();
      }

      array_push($arr_posts['Post'],$row_arr);
      unset($row_arr['Comments']);
    }
    $jsonf = json_encode($arr_posts);
    echo $jsonf;
  }

 ?>
