<?php
  require_once("blog.php");
  echo RSS_Recents("http://localhost/site_internet/user.php", 7, false);
?>