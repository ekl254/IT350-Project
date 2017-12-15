<?php
session_start();

require_once("functions.php");

if(isset($_POST['submit']))
{
  if(strlen($_POST['username']) > 2 && strlen($_POST['password']) > 4 && intval($_POST['class']) > 1845 && intval($_POST['class']) < 2050 && intval($_POST['company']) > 0 && intval($_POST['company']) <= 30)
  {
    echo 'abc';
    if(user_exists($_POST['username'])) { $existing = true; }
    else
    {
      $line = $_POST['username'].",".$_POST['password'].",".$_POST['fullname'].",".$_POST['class'].",".$_POST['company'].",".$_POST['bio'];
      write_data("q/credentials", $line);
    }
  }
}
?>
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
  <title>Sign up</title>
  <style>
  .content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  </style>
  <body>
    <div class="content">
      <h2>Sign-up</h2>
      <div class="container-fluid">

        <?php if($existing) { echo "<p class='bg-danger' style='padding: 15px; width: 75%; text-align: center; margin-left: auto; margin-right: auto; margin-top: 10px;'>User already exists</p>"; } ?>
          <form method="POST" class="form-inline" action="signup.php">
            <div class="tab">Username:</div><input class="form-control" type="text" name="username"><br>
            <div class="tab">Password:</div><input class="form-control" type="password" name="password"><br>
            <div class="tab">Full Name:</div><input class="form-control" type="text" name="fullname"><br>
            <div class="tab">USNA Class Year:</div> <input class="form-control" type="text" name="class"><br>
            <div class="tab">Company:</div> <input class="form-control" type="text" name="company"><br>
            <div class="tab">Biography:</div> <textarea class="form-control" type="text" name="bio"></textarea><br>
            <input class="form-control" type="submit" value="Register" name="submit" />
          </form>
        </div>
      </body>

    </div>

  </body>

  </html>
