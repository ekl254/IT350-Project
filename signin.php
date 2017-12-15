
<html>
<?php
include('login.php');
?>

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
  <title>Sign in</title>
  <style>
  .content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
}
</style>
<body>
  <div class="content">
    <h1>BLACK N SOCIETY</h1>
    <form action="login.php" method="POST">
      <input class="form-control" type="text" name="login" placeholder="Username"/>
      <input class="form-control" type="password" name="password" placeholder="Password"/>
      <input class="form-control" type="submit" value="Login" name="submit" />
    </form>
    <a href="signup.php">Sign-up</a>
  </div>

</body>

</html>
