<?php require '../connection.php';

if (isset($_POST['submit'])) {

  // Handle Image Upload
  $targetDir = "uploads/";
  $randomFileName = 'DK_' . rand(1000, 9999) . '.' . pathinfo($_FILES["fileImage"]["name"], PATHINFO_EXTENSION);
  $targetFile = $targetDir . $randomFileName;
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["fileImage"]["tmp_name"]);
  if ($check === false) {
    echo "File is not an image.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileImage"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  $allowedTypes = array('jpg', 'jpeg', 'png');
  if (!in_array($imageFileType, $allowedTypes)) {
    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } else {
    // If everything is ok, try to upload file

    //Get form data
    $kd_dokter = mysqli_real_escape_string($theLINK, $_POST['kd_dokter']);
    $nm_dokter = mysqli_real_escape_string($theLINK, $_POST['nm_dokter']);
    $sps = mysqli_real_escape_string($theLINK, $_POST['spesialis']);
    $sex = mysqli_real_escape_string($theLINK, $_POST['sex']);
    $kota = mysqli_real_escape_string($theLINK, $_POST['kota_dokter']);

    // Duplication ErrMessage
    $dbClearance = mysqli_num_rows(mysqli_query($theLINK, "SELECT * FROM tbl_dokter WHERE kd_dokter='$kd_dokter'"));

    if ($dbClearance > 0) {
      echo "<script>alert('Kode dokter sudah terdaftar. Gunakan kode dokter yang berbeda!');window.location.href='addDokter.php';</script>";
    } else {
      // Insert data into database
      $sql = "INSERT INTO tbl_dokter (kd_dokter, nm_dokter, spesialis, sex, kota_dokter, foto_dokter) VALUES ('$kd_dokter','$nm_dokter','$sps','$sex','$kota','$randomFileName')";
    }

    // Moving file to local directory if everything is clear
    if ($theLINK->query($sql) === TRUE) {
      move_uploaded_file($_FILES["fileImage"]["tmp_name"], $targetFile);
      echo "<script>window.location='list_dokter.php'</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $theLINK->error;
    }
  }
}
