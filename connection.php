<?php
  $dbhost	= "localhost";
  $dbuser	= "root";
  $dbpass	= "admin123";
  $dbname	= "data_master";

  $theLINK = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ("error connecting to mysql");

  $theHOME = "http://localhost/rs/rs_mastermaster/";
?>
