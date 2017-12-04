<?php
  function check_login()
  {
    if(isset($_SESSION['login']) && $_SESSION['login'] != "") { return true; }
    else { return false; }
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

  function write_data($file, $line)
  {
    $fp = fopen($file, "a") ;
    if($fp)
    {
      fwrite($fp, $line);
      fclose($fp);
    }
    else echo "Couldn't open the data file.";
  }

  function user_exists($l)
  {
    $cred = load_data("q/credentials");

    for($i=0; $i<count($cred); $i++) { if($cred[$i][0] == $l) return true; }

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

      if($data == NULL) return array();
      else return $data;
    }
    else return NULL;
  }
 ?>
