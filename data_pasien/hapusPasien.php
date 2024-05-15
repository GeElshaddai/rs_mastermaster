<?php
require '../connection.php';

$id = $_GET['no_rm'];

// Delete old image file if exists
$sql_select_old_image = "SELECT foto_pasien FROM tbl_pasien WHERE no_rm=$id";
$result_select_old_image = $theLINK->query($sql_select_old_image);
if ($result_select_old_image->num_rows > 0) {
    $row = $result_select_old_image->fetch_assoc();
    $old_image = $row["foto_pasien"];
    if(file_exists("uploads/" . $old_image)) {
        unlink("uploads/" . $old_image);
    }
}

$result = mysqli_query($theLINK, "DELETE FROM tbl_pasien WHERE no_rm=$id");

header("Location:list_pasien.php");
 ?>
