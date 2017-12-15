<?php
  session_start();

  require_once("functions.php");

  if(isset($_POST['submit']))
  {
    $login    = stripslashes($_POST['login']);
    $password = stripslashes($_POST['password']);

    if(isset($login) && isset($password))
    {
    	if($login == '' || $password == '') echo "Input login and password!";
    	else
    	{
        $cred = load_data("q/credentials");

        for($i=0; $i<count($cred); $i++)
        {
          if($cred[$i][0] == $login)
          {
            $usercheck = true;
            if($cred[$i][1] == $password) $passcheck = true; //login and password correct
            //if(md5($password) == $pass)
          }
        }

    		if(!$usercheck) { echo "<script type='text/javascript'>alert('No such user!');</script>"; }
    		else if(!$passcheck) { echo "<script type='text/javascript'>alert('Wrong Password!');</script>";  }
        else
    		{
    			$_SESSION['login'] = $login;
          header('Location: ./');
    		}
    	}
    }
  }
?>
