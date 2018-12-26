<!DOCTYPE html>
<html>
  <head>
    <<?php
    session_start();
    unset ($_SESSION['user']);
    unset ($_SESSION['pass']);
    
     session_destroy();

     header("location: login.html");
     ?>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
