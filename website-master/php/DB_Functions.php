<?php

define("DB_HOST", "localhost:3306");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "isnetworkdb");

class DB_Functions {

    private $db;
    private $conn;

    function __construct() {
        $this->conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);
        $this->db = mysqli_select_db($this->conn,DB_DATABASE);
      }

    function __destruct() {
      mysqli_close($this->conn);
    }
  // all quries for importinf information into the webstie

  public function check($username){
      $sql = "SELECT ID,firstname,lastname,usernameid,password FROM users WHERE usernameid = '$username'";
      $query = mysqli_query($this->conn,$sql);

      return $query;
    }//done

  public function addtodb($userid,$password,$firstname,$lastname,$job1,$job2,$skls,$date){
      $query = mysqli_query($this->conn,"INSERT INTO `users` (`ID`, `firstname`, `lastname`, `Job1`, `Job2`, `Date`, `usernameid`, `password`, `Skills`) VALUES (NULL, '$firstname', '$lastname', '$job1', '$job2', '$date', '$userid', '$password', '$skls')");
      $rowId = mysqli_insert_id($this->conn);

      return $rowId;
    }//done

  public function getAllUsers(){
    $sql = "SELECT ID,firstname,lastname,Job1,Job2,Date FROM users ";
    $query = mysqli_query($this->conn,$sql);

    return $query;
  }//done

  public function addExper($userid,$exp1,$exp2){
    $sql = "INSERT INTO `experience` (`ID`, `userID`, `company`, `yearnum`) VALUES (NULL, '$userid','$exp1','$exp2')";
    $query = mysqli_query($this->conn,$sql);
    $rowId = mysqli_insert_id($this->conn);

    return $rowId;
  }//done

  public function getPosts($userId){
    $sql = " SELECT * FROM `post` WHERE post.userID = $userId OR post.userID IN( SELECT friends.userID FROM friends WHERE friends.friendID = $userId UNION SELECT friends.friendID FROM friends WHERE friends.userID =$userId) ORDER BY date DESC";
    $query = mysqli_query($this->conn,$sql);

    return $query;
  }//done

  public function addFriend($userId,$friendId){
    $sql = "INSERT INTO `friends` (`userID`, `friendID`) VALUES ('$userId', '$friendId')";
    $query = mysqli_query($this->conn,$sql);

    return $query;
  }//done

  public function addPost($userId,$desc){
    $sql =  "INSERT INTO `post` (`ID`, `userID`, `description`, `likes`) VALUES (NULL, '$userId', '$desc', '0')";
    $query = mysqli_query($this->conn,$sql);
    $rowId = mysqli_insert_id($this->conn);

    return $rowId;
  }//done

  public function addComment($userId,$postId,$desc){
    $sql =  "INSERT INTO `comments` (`userID`, `postID`, `description`) VALUES ('$userId', '$postId', '$desc')";
    $query = mysqli_query($this->conn,$sql);
    $rowId = mysqli_insert_id($this->conn);

    return $rowId;
  }//done

  public function getUserById($userId){
    $sql =  "SELECT * FROM users WHERE ID = $userId";
    $query = mysqli_query($this->conn,$sql);

    return $query;
  }//done

  public function getCommentByPostId($postId){
      $sql = "SELECT * FROM `comments` WHERE postID = '$postId'";
      $query = mysqli_query($this->conn,$sql);

      return $query;
    }//done

  public function  getUserExpById($userid){
      $query = mysqli_query($this->conn,"SELECT company,yearnum FROM `experience` WHERE userID = $userid");

      return $query;
    }//done

    public function checkFriend($userId,$friendId){
        $sql = "SELECT userID,friendID FROM friends WHERE (friendID = '$friendId' AND userID = '$userId') OR (userID = $friendId AND friendID = '$userId')";
        $query = mysqli_query($this->conn,$sql);

        return $query;
    }//done
    public function getJobs(){
      $sql = "SELECT * FROM jobs";
      $query = mysqli_query($this->conn,$sql);

      return $query;
    }//done

    public function getAds(){
      $sql = "SELECT * FROM jobs LIMIT 3";
      $query = mysqli_query($this->conn,$sql);

      return $query;
    }//done
    public function addLike($uid,$pid){
      $sql = "INSERT INTO `postlikes` (`userID`, `postID`) VALUES ('$uid', '$pid')";
      $query = mysqli_query($this->conn,$sql);

      return $query;
    }//done
    public function updateLikeCount($pid){
      $likenum = mysqli_query($this->conn,"SELECT COUNT(postID) as count FROM postlikes WHERE postID ='$pid'");
      $res = mysqli_fetch_array($likenum);

      $c = (int)$res['count'];

      $sql = "UPDATE `post` SET `likes` = '$c' WHERE `post`.`ID` = '$pid'";
      $query = mysqli_query($this->conn,$sql);

      return $query;
    }//done
    public function getPostById($pid){
      $sql = "SELECT * FROM post WHERE post.ID = '$pid'";
      $query = mysqli_query($this->conn,$sql);

      return $query;
    }//done

  public function getMsgs($uid,$lmt){
    $sql = "SELECT * FROM message WHERE userID = '$uid' OR friendID = '$uid' ORDER BY date DESC LIMIT $lmt";
    $query = mysqli_query($this->conn,$sql);

    return $query;
  }//done
  public function addNotify($fid,$uid,$desc){
    $sql= "INSERT INTO `notifacations` (`ID`, `friendID`, `userID`, `description`, `date`) VALUES (NULL, '$fid', '$uid', '$desc', CURRENT_TIMESTAMP)";
    $query = mysqli_query($this->conn,$sql);

    return $query;
  }//done
  public function deleteLike($uid,$pid){
    $sql = "DELETE FROM `postlikes` WHERE `postlikes`.`userID` = $uid AND `postlikes`.`postID` = $pid";
    $query = mysqli_query($this->conn,$sql);

    return $query;
  }//done

  public function getNotifacationsLimit($uid,$cnt){
    $sql = "SELECT * FROM notifacations WHERE userID = '$uid' ORDER BY date DESC LIMIT $cnt";
    $query = mysqli_query($this->conn,$sql);

    return $query;
  }//done

  public function insertMessage($userid,$friendid,$descr){
    $sql = "INSERT INTO `message` (`ID`, `userID`, `friendID`, `description`) VALUES (NULL, '$userid', '$friendid', '$descr')";
    $query = mysqli_query($this->conn,$sql);

    return $query;
  }//done
  public function getMsglog($uid,$fid){
    $sql = "SELECT * FROM message WHERE (userID = '$uid' AND friendID = '$fid') OR (userID = '$fid' AND friendID = '$uid') ORDER BY date DESC";
    $query = mysqli_query($this->conn,$sql);

    return $query;
  }//done
}
?>
