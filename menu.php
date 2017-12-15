<style>
.navbar .navbar-nav {
  display: inline-block;
  float: none;
  vertical-align: top;
}

.navbar .navbar-collapse {
  text-align: center;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<h1 align = "center">Black N Society</h1>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Homepage</a></li>
        <?php if(check_login()) { echo "<li><a href='profile.php?uname=".$_SESSION['login']."'>User Profile</a></li>"; } ?>
        <li><a href="search.php">Search</a></li>
        <li><a href="contact.php">Contact</a></li>
        <?php if(!check_login()) { echo "<li><a href='register.php'>Register</a></li>"; } ?>
        <?php if(check_login()) { echo "<li><a href='signin.php'>Logout</a></li>"; } ?>
      </ul>
    </div>

  </div>

</nav>
