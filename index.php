<?php
  session_start();

  require_once("functions.php");

  if(check_login())
  {
    $username = $_SESSION['login'];
    if(isset($_POST['submit']))
    {
      $status = $_POST['status'];
      $date   = date("H:i m/d/Y");
      $location = $_POST['location'];
      $mood = $_POST['mood'];
      $line = $username.",".$date.",".$status.",".$location.",".$mood."\r\n";
      write_data("data", $line);
    }
  }

  $statuses = load_data("data");
?>
<!DOCTYPE html>
<html>

  <head>
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
    <title>Homepage</title>
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
      <div class="col-xs-10 col-xs-offset-2 content"><?php
      if(check_login())
      { ?>
        <div class="col-md-5">
          <h1>Status update</h1>

          <form name = "addstatus" method="post">
            Status update:<br> <input class="form-control" type="text" name="status"><br>
            Location:<br> <input class="form-control" type="text" name="location"><br>
            Mood : <select name="mood" class="form-control">
              <option></option>
              <option value="sad">sad</option>
              <option value="happy">happy</option>
              <option value="tired">tired</option>
            </select> <br /><br />
            <input name = "submit" class="btn btn-default" type="submit" value="Submit">
          </form>

        </div><?php
      } ?>
        <div class="col-md-7"><?php
          if($statuses == NULL) echo "Couldn't open data file";
          else
          {
            for($i=count($statuses)-1; $i>=0; $i--)
            { ?><blockquote style="border-color: gray;"><?php
                echo $statuses[$i][2];
                echo "<hr />";
                echo "<footer>".$statuses[$i][1].".";
                echo "User: <a href='profile.php?uname=".$statuses[$i][0]."'>".$statuses[$i][0]."</a> ";
                echo "at ".$statuses[$i][3].". Feeling: ".$statuses[$i][4].".</footer>"; ?>
                </blockquote>
              <?php
            }
          } ?>
        </div>
      </div>
    </div>
  </body>

</html>s
