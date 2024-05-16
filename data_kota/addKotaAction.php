<?php require '../connection.php';

if (isset($_POST['submit'])) {

  //Get form data
  $kd_kota = mysqli_real_escape_string($theLINK, $_POST['kd_kota']);
  $nm_kota = mysqli_real_escape_string($theLINK, $_POST['nm_kota']);

  // Duplication ErrMessage
  $dbClearance = mysqli_num_rows(mysqli_query($theLINK, "SELECT * FROM tbl_kota WHERE kd_kota='$kd_kota'"));

  if ($dbClearance > 0) {
    echo "<script>alert('Kode kota sudah terdaftar. Gunakan kode kota yang berbeda!');window.location.href='addKota.php';</script>";
  } else {
    // Insert data into database
    $sql = "INSERT INTO tbl_kota (kd_kota, nm_kota) VALUES ('$kd_kota','$nm_kota')";
  }

  // If everything is clear
  if ($theLINK->query($sql) === TRUE) {
    header("Location: ". $theHOME ."/data_kota/list_kota.php");
  } else {
    echo "Error: " . $sql . "<br>" . $theLINK->error;
  }
}
