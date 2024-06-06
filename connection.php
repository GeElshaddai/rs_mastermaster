<?php
  $dbhost	= "localhost";
  $dbuser	= "root";
  $dbpass	= "";
  $dbname	= "data_master";

  $theLINK = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ("error connecting to mysql");

  $theHOME = "http://localhost/rs/rs_mastermaster";
?>
