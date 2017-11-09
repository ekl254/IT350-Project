<?php
  session_start();
  if(isset($_SESSION['login']) && $_SESSION['login'] != "")
  {
    $username = $_SESSION['login'];
    if(isset($_POST['submit']))
    {
      $status = $_POST['status'];
      $date   = date("H:i m/d/Y");
      $location = $_POST['location'];
      $mood = $_POST['mood'];
      $line = $username.",".$date.",".$status.",".$location.",".$mood."\r\n";
      $fp = fopen("data", "a") ;
      if($fp)
      {
        fwrite($fp, $line);
        fclose($fp);
      }
      else echo "Couldn't open the data file.";
    }

    $statuses = load_data("data");
?>
    <html>

      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Project</title>

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
      </head>

      <body>
        <div class="col-md-3">
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

          <form action="logout.php" method="post"><input class="btn btn-default" name = "Logout" type="submit" value="Logout"></form>
        </div>
        <div class="col-md-7"><?php
        if($statuses == NULL) echo "Couldn't open data file";
        else
        {
          for($i=0; $i<count($statuses); $i++)
          { ?><blockquote><?php
              echo $statuses[$i][2];
              echo "<hr />";
              echo "<footer>".$statuses[$i][1].".";
              echo "User: <a href='user.php?uname=".$statuses[$i][0]."'>".$statuses[$i][0]."</a> ";
              echo "at ".$statuses[$i][3].". Feeling: ".$statuses[$i][4].".</footer>"; ?>
              </blockquote>
            <?php
          }
        } ?>
        </div>
      </body>
    </html>
<?php
  }
  else
  { ?>
    <form action="login.php" method="POST">
      <input type="text" name="login" /><br />
      <input type="password" name="password" /><br />
      <input type="submit" value="Login" name="submit" />
    </form><?php
  }

  function load_data($file)
  {
    if($fp = fopen($file, 'r'))
    {
      for($i=0;$line = fgetcsv($fp);$i++) { $data[$i] = $line; }

      return $data;
    }
    else return NULL;
  }
?>
