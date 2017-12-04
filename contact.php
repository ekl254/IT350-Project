<?php
  session_start();

  require_once("functions.php");
 ?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
    <title>MIDN 3/C Kobylka</title>
  </head>

  <body>
    <div class="container-fluid">
      <div class="col-xs-2 menu"><?php include("menu.php"); ?></div>
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
      <div class="col-xs-offset-2 col-xs-10 footer"><h3 style="position: relative; bottom: 10px;"><a href="mailto:m203264@usna.edu">MIDN 3\C KOBYLKA</a></h3></div>
    </div>
  </body>

</html>
