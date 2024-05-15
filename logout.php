<?php
  require 'connection.php';

  session_start();
  session_destroy();

  header("Location: ". $theHOME ."/index.php");
?>
