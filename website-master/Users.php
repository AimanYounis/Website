<!DOCTYPE html>
<html>
<head>
  <?php
  session_start();

  if(!isset($_SESSION["user"]) || !isset($_SESSION["pass"]) ){
    session_destroy();
    header("location: login.html");
  }

   ?>
  <meta charset="utf-8">
  <title>All Users</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/comments.css">
  <link rel="stylesheet" href="css/users.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
  <meta name="viewport" content="width = device-width, initial-scale = 1">
</head>
<body id="page">
  <input type="hidden" id ="myUser" <?php echo'value="'.$_SESSION['myUserId'].'"' ?>>
  <header class="bs-docs-nav navbar navbar-static-top " id="top">
    <div class="contianer ">
      <div class="navbar-haeder">
        <a href="index.php" class="navbar-brand">Website</a>
        <button aria-controls="bs-navbar" aria-expanded="false" class="navbar-toggle collapsed" data-target="#bs-navbar" data-toggle="collapse" type="button">
          <img src="icons/menu2.png" alt="Menu">
        </button>
      </div>
      <nav class="navbar-collapse collapse" id="bs-navbar" aria-expanded="false" style="height: 0.8px">
        <ul class="nav navbar-nav">
          <li><a><h4 class="username" id="user">Hello <?php echo $_SESSION['myUserfName'] ?></h4></a></li>
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
          <div class="col-md-9" >
            <div class="panel panel-default">
                <div class="panel-heading c-list">
                    <span class="title">Website Users</span>
                </div>
                <ul class="list-group users scrollable" id="style-gray">

                    </ul>
            </div>

          </div>
          <div class="col-md-3">
             <nav class="bs-docs-sidebar hidden-print hidden-sm affix" id="adsNav">
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

    <script type="text/javascript" src= "jsfiles/home.js">
    </script>
    <script type="text/javascript" src="jsfiles/users.js">

    </script>
  </body>
</html>
