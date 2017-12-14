<?php
session_start();

require_once("functions.php");
?>
<!DOCTYPE html>
<html>

<head>
  <style>
  .center {
    margin: auto;
    width: 50%;
    padding: 10px;
  }
  </style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!-- Bootstrap -->
  <!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
  <link type="text/css" href="../../style.css" rel="stylesheet">
  <title>Contact</title>
  <?php include("menu.php"); ?>
</head>

<body>
  <div class="container-fluid">
    <!-- <div class="col-xs-2 menu"><?php include("menu.php"); ?></div> -->
    <div class="col-xs-10 col-xs-offset-2 header">
      <div class="col-xs-10"><h3>Black N Society</h3></div><?php
      if(!isset($_SESSION['login']) || $_SESSION['login'] == "")
      { ?>
        <div class="col-xs-2" style="padding: 10px;">
          <form action="login.php" method="POST">
            <input class="form-control" type="text" name="login" placeholder="Username"/>
            <input class="form-control" type="password" name="password" placeholder="Password"/>
            <input class="form-control" type="submit" value="Login" name="submit" />
          </form>
        </div><?php
      } ?>
    </div>
    <div class="col-xs-10 col-xs-offset-2 content">

    </div>
  </div>
  <div class = "center">
    <div class="media">
      <span class="media-left">
        <img src="  https://usna.blackboard.com/bbcswebdav/orgs/DEPTCSERV/Midn%20Photos/2020/M203264.jpg" style="width:400px;height:auto;">
      </span>
      <div class="media-body">
        <h3 class="media-heading">Adam Kobylka</h3>
        ...
      </div>
    </div>
    <div class="media">
      <span class="media-left">
        <img src="  https://usna.blackboard.com/bbcswebdav/orgs/DEPTCSERV/Midn%20Photos/2018/M183438.jpg" style="width:400px;height:auto;">
      </span>
      <div class="media-body">
        <h3 class="media-heading">Enock Langat</h3>
        ...
      </div>
    </div>
  </div>

</body>

</html>
