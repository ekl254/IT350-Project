<ul class="sidebar-nav">
  <li><a href="index.php">Homepage</a></li>
  <?php if(check_login()) { echo "<li><a href='profile.php?uname=".$_SESSION['login']."'>User Profile</a></li>"; } ?>
  <li><a href="search.php">Search</a></li>
  <li><a href="contact.php">Contact</a></li>
  <?php if(!check_login()) { echo "<li><a href='register.php'>Register</a></li>"; } ?>
  <?php if(check_login()) { echo "<li><a href='logout.php'>Logout</a></li>"; } ?>
</ul>
