<?php
  session_start();
  if(!isset($_GET['login'])) { $login = $_SESSION['login']; }
  else { $login   = $_GET['login']; }

  if(isset($_SESSION['login']) && $_SESSION['login'] != "")
  {
    if(isset($_POST['submit']))
    {
      $username = $_SESSION['login'];
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

    $friends = get_friends($login);

    if(isset($_GET['uname']) && user_exists($_GET['uname']))
    {
      if($login != $_GET['uname'] && isset($_GET['add']) && array_search($_GET['uname'], $friends) === false)
      {
        $line = $login.",".$_GET['uname']."\r\n";
        $fp = fopen("friends", "a") ;
        if($fp)
        {
          fwrite($fp, $line);
          fclose($fp);
        }
        else echo "Couldn't open the friends file.";


                $friends = get_friends($login);
      }
      else if($login != $_GET['uname'] && isset($_GET['unfriend']) && !(array_search($_GET['uname'], $friends) === false))
      {
        $contents = file_get_contents("friends");
        $contents = str_replace($login.",".$_GET['uname'], '', $contents);
        $contents = str_replace($_GET['uname'].",".$login, '', $contents);
        file_put_contents("friends", $contents);

        $friends = get_friends($login);
      }
    }
    else $doesntexist = true;

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

      <body><?php
      if(!$doesntexist) { ?>
        <div class="col-md-3">
          <h1>User preview</h1>
           <label class="col-sm-6 control-label">Username:</label>
           <div class="col-sm-6"><?php echo $_GET['uname']; ?></div><br><br><?php
           if($login != $_GET['uname'] && array_search($_GET['uname'], $friends) === false)
           { ?>
             <label class="col-sm-6 control-label"><a href="user.php?uname=<?php echo $_GET['uname']; ?>&add">Add a friend</a></label><br><br><?php
           }
           else if($login != $_GET['uname'])
           { ?>
             <label class="col-sm-6 control-label"><a href="user.php?uname=<?php echo $_GET['uname']; ?>&unfriend">Unfriend</a></label><br><br><?php
           }

           if(count($friends) > 0)
           { ?>
             <h2>Friends:</h2><?php
             $user_friends = get_friends($_GET['uname']);
             for($i=0; $i<count($user_friends); $i++)
             { ?>
               <label class="col-sm-12 control-label"><a href="user.php?uname=<?php echo $user_friends[$i] ?>"><?php echo $user_friends[$i] ?></a></label><?php
             }
           }?>
          <form action="logout.php" method="post"><input class="btn btn-default" name = "Logout" type="submit" value="Logout"></form>
        </div>
        <div class="col-md-7"><?php
        if($statuses == NULL) echo "Couldn't open data file";
        else
        {
          for($i=0; $i<count($statuses); $i++)
          {
            if($statuses[$i][0] == $_GET['uname'])
            { ?><blockquote><?php
              echo $statuses[$i][2];
              echo "<hr />";
              echo "<footer>".$statuses[$i][1].".";
              echo "User: <a href='user.php?uname=".$statuses[$i][0]."'>".$statuses[$i][0]."</a> ";
              echo "at ".$statuses[$i][3].". Feeling: ".$statuses[$i][4].".</footer>"; ?>
              </blockquote><?php
            }
          }
        } ?>
        </div><?php
      }
      else { echo "<p class='bg-danger' style='padding: 15px; width: 75%; text-align: center; margin-left: auto; margin-right: auto; margin-top: 10px;'>User does not exist. <a href='index.php'>Go back to the main page </a></p>"; } ?>
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

  function user_exists($l)
  {
    $cred = file("credentials");
    $cred = explode(";", $cred[0]);

    for($i=0; $i<count($cred); $i++)
    {
      $user = explode(",", $cred[$i]);
      if($user[0] == $l) return true;
    }

    return false;
  }

  function get_friends($l)
  {
    if($fp = fopen("friends", 'r'))
    {
      for($i=0;$line = fgetcsv($fp);)
      {
        if($line[0] == $l)      $data[$i++] = $line[1];
        else if($line[1] == $l) $data[$i++] = $line[0];
      }

      return $data;
    }
    else return NULL;
  }
?>
