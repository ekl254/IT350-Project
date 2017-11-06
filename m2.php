<html>

<head>
  <meta charset="utf-8">
  <link rel = "stylesheet"
  type = "text/css"
  href = "../../default.css" />
</head>
<h1>Status update</h1>

<form name = "addstatus" method="post">
  Status update:<br> <input type="text" name="status"><br>
  Location:<br> <input type="text" name="location"><br>
  Mood : <select name="mood">
    <option></option>
    <option value="sad">sad</option>
    <option value="happy">happy</option>
    <option value="tired">tired</option>
  </select> <br />
  <input name = "submit" type="submit" value="Submit">
  <input type="submit" name = "reset" value="Reset"/>
</form>
<?php
if(isset($_POST['submit'])){
  $status = $_POST['status'];
  $location = $_POST['location'];
  $mood = $_POST['mood'];
  $cvsData = $status . "," . $location . "," . $mood ;
  if(file_exists("formdata.csv")){
  $fp = fopen("formdata.csv","w") ;
  fwrite($fp, "test");
fclose($fp);
}
}

?>

</html>

<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';
?>
