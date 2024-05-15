<?php
require("connection.php");

$id = $_GET['kd_dokter'];

// Delete old image file if exists
$sql_select_old_image = "SELECT foto_dokter FROM tbl_dokter WHERE kd_dokter='$id'";
$result_select_old_image = $theLINK->query($sql_select_old_image);
if ($result_select_old_image->num_rows > 0) {
    $row = $result_select_old_image->fetch_assoc();
    $old_image = $row["foto_dokter"];
    if(file_exists("uploads/" . $old_image)) {
        unlink("uploads/" . $old_image);
    }
}

$result = mysqli_query($theLINK, "DELETE FROM tbl_dokter WHERE kd_dokter='$id'");

header("Location:list_dokter.php");
 ?>
