<?php require '../connection.php';

if (isset($_POST['submit'])) {

  // Handle Image Upload
  $targetDir = "uploads/";
  $randomFileName = 'PSN_' . rand(1000, 9999) . '.' . pathinfo($_FILES["fileImage"]["name"], PATHINFO_EXTENSION);
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
    echo "Sorry, your file is too large. Max. size is 5MB.";
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
    $no_rm = mysqli_real_escape_string($theLINK, $_POST['no_rm']);
    $nm_pasien = mysqli_real_escape_string($theLINK, $_POST['nm_pasien']);
    $sex = mysqli_real_escape_string($theLINK, $_POST['sex']);
    $tgl_lhr = mysqli_real_escape_string($theLINK, $_POST['tgl_lhr']);
    $kota = mysqli_real_escape_string($theLINK, $_POST['kota_pasien']);

    // Duplication ErrMessage
    $dbClearance = mysqli_num_rows(mysqli_query($theLINK, "SELECT * FROM tbl_pasien WHERE no_rm='$no_rm'"));

    if ($dbClearance > 0) {
      echo "<script>alert('Nomor Rekam Medis sudah terdaftar. Gunakan nomor yang berbeda!');window.location.href='addPasien.php';</script>";
    } else {
      // Insert data into database
      $sql = "INSERT INTO tbl_pasien (no_rm, nm_pasien, sex, tgl_lhr, kota_pasien, foto_pasien) VALUES ('$no_rm','$nm_pasien','$sex','$tgl_lhr','$kota','$randomFileName')";
    }

    // Moving file to local directory if everything is clear
    if ($theLINK->query($sql) === TRUE) {
      move_uploaded_file($_FILES["fileImage"]["tmp_name"], $targetFile);
      echo "<script>window.location='list_pasien.php'</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $theLINK->error;
    }
  }
}
