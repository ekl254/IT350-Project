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
          if($cred[0][0] == $login)
          {
            $usercheck = true;
            if($cred[0][1] == $password) $passcheck = true; //login and password correct
            //if(md5($password) == $pass)
          }
        }

    		if(!$usercheck) { echo "No such user!"; }
    		else if(!$passcheck) { echo "Wrong password!"; }
        else
    		{
    			$_SESSION['login'] = $login;
          header('Location: ./');
    		}
    	}
    }
  }
?>
