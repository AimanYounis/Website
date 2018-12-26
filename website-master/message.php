<!DOCTYPE html>
<html>
  <head>
    <?php
    session_start();

    if(!isset($_SESSION["user"]) || !isset($_SESSION["pass"]) ){
      session_destroy();
      header("location: login.html");
    }

    include_once'php/DB_Functions.php';
    $id = $_GET['id'];
    $obj = new DB_Functions();
    $res = $obj->getUserById($id);
    $arr = array();
    $arr = mysqli_fetch_array($res);
    $expQ = $obj->getUserExpById($arr['ID']);
     ?>
    <meta charset="utf-8">
    <title><?php echo 'Send Massage to ' .$arr['firstname'].' '.$arr['lastname']; ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/comments.css">
    <link rel="stylesheet" href="css/msgs.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
    <meta name="viewport" content="width = device-width, initial-scale = 1">
  </head>
  <body id="page">
    <input type="hidden" id="friendmId" value=<?php echo '"'.$arr['ID'].'"'; ?>>
    <input type="hidden" id ="myUser" <?php echo'value="'.$_SESSION['myUserId'].'"'; ?>>
    <input type="hidden" id ="mymsgName" <?php echo'value="'.$_SESSION['myUserfName'].'"'; ?>>
    <header class="bs-docs-nav navbar navbar-static-top " id="top" >
      <div class="contianer ">
        <div class="navbar-haeder">
          <a href="index.php" class="navbar-brand">Website</a>
          <button aria-controls="bs-navbar" aria-expanded="false" class="navbar-toggle collapsed" data-target="#bs-navbar" data-toggle="collapse" type="button">
            <img src="icons/menu2.png" alt="Menu">
          </button>
        </div>
        <nav class="navbar-collapse collapse" id="bs-navbar" aria-expanded="false" style="height: 0.8px">
          <ul class="nav navbar-nav">
            <li><a><h4 class="username" id="user">Hello <?php echo $_SESSION['myUserfName']; ?></h4></a></li>
            <li> <a href="index.php" ><img src="icons/home2.png" alt="Home">Home</a> </li>
            <li><a <?php echo 'href="profile.php?id='.$_SESSION['myUserId'].'"';?>><img src="icons/profile2.png" alt="Profile">Profile</a> </li>
            <li>
            <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle connections" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="btn_showfriends">
              <img src="icons/connect.png" alt="Connections">My Connections <span class="caret"></span>
            </button>
            <ul class="dropdown-menu connections">

            </ul>
            </div>
            </li>
            <li>
            <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="icons/more.gif" alt="More">More<span class="caret"></span>
            </button>
            <ul class="dropdown-menu more">
              <li><a href="Users.php"><img src="icons/musers.png" alt="Users"><span>Users</span></a></li>
              <li><a href="Jobs.php"><img src="icons/job.png" alt="Jobs"><span>Jobs</span></a></li>
            </ul>
            </div>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle massages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                  <img src="icons/3message2.png" alt="Massage">Messages <span class="caret"></span>
                </button>
                <ul class="dropdown-menu massage">

                </ul>
              </div>
            </li>
            <li>
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle notifactions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                  <img src="icons/notification.png" alt="Notifications" id="notf_img">Notifications <span class="caret"></span>
                </button>
                <ul class="dropdown-menu notifaction">

                </ul>
              </div>
            </li>
            <li>
              <form>
                Search for someone: <br>
                <input type="text" onkeyup="showHint(this.value)">
              </form>
              <ul id="txtHint"></ul>
            </li>
            <li><a href="logout.php" method = "post" ><img src="icons/logout2.png" alt="LogOut">LogOut</a></li>
          </ul>
        </nav>
      </div>
    </header>

  <div class="contianer">
    <div class="row">
      <div class="col-md-9" role="main">
          <div class="form scrollable">
            <div class="form-group">
		            <label for="name" class="col-sm-2 control-label">Name</label>
		              <div class="col-sm-10">
			                 <input type="text" class="form-control" id="name" name="name" placeholder="First Last Name" value= <?php echo '"'.$arr['firstname'].' '.$arr['lastname'].'"'; ?> disabled>
		               </div>
	                 </div>
	                 <div class="form-group">
		                 <label for="message" class="col-sm-2 control-label">Message</label>
		                   <div class="col-sm-10">
			                    <textarea class="form-control" rows="2" name="message" id="txtinput"></textarea>
		                      </div>
	                    </div>
	                     <div class="form-group">
		                       <div class="col-sm-10 col-sm-offset-2">
			                          <button id="submit" class="btn btn-primary">Send</button>
		                            </div>
	                       </div>
	                   <div class="form-group">
		                    <div class="col-sm-10 col-sm-offset-2" id="lblrow">

		                  </div>
	                 </div>

          </div>
          <div class="scrollable Msg" id="style-gray" style="margin-left:10px;">
              <div class="">
                <h1>Message History</h1>
              </div>
                <ul class="media-list">

             </ul>
          </div>
      </div>
      <div class="col-md-3" role="complementary">
        <nav class="bs-docs-sidebar hidden-print hidden-sm hidden-xs affix" id="adsNav">
           <h3 class="bs-docs-nav navbar navbar-static-top">
             Jobs may interest you
           </h3>

       </nav>
    </div>
    </div>
</div>
<footer class="footer pages" >
  <div class="container" >
    <div class="row">
      <div class="col-md-12" >
        <p class="text-muted" style="text-align : center" id="footer"><b>All Copyrights Resereved.&copy;<br>Creatoers : Amjad Nassar, Aiman Younis </b></p>
    </div>
  </div>
</div>
</footer>
        <script type="text/javascript" src = "jsfiles/home.js">

        </script>
        <script type="text/javascript" src="jsfiles/message.js">

        </script>
  </body>
</html>
