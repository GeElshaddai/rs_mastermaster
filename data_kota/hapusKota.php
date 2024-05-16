<?php
require '../connection.php';

$id = $_GET['kd_kota'];

$result = mysqli_query($theLINK, "DELETE FROM tbl_kota WHERE kd_kota='$id'");

header("Location:list_kota.php");
?>
