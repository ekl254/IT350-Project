<?php
  session_start();
  if(isset($_POST['submit']))
  {
    $login    = stripslashes($_POST['login']);
    $password = stripslashes($_POST['password']);

    if(isset($login) && isset($password))
    {
    	if($login == '' || $password == '') echo "Input login and password!";
    	else
    	{
        $cred = file("credentials");
        $cred = explode(";", $cred[0]);

        for($i=0; $i<count($cred); $i++)
        {
          $user = explode(",", $cred[$i]);
          if($user[0] == $login)
          {
            $usercheck = true;
            if($user[1] == $password) $passcheck = true; //login and password correct
            //if(md5($password) == $pass)
          }
        }

    		if(!$usercheck) echo "No such user!";
    		else if(!$passcheck) echo "Wrong password!";
        else
    		{
    			$_SESSION['login'] = $login;
          header('Location: ./');
    		}
    	}
    }
  }
?>
