<?php require '../connection.php';

// Check if form was submitted
if(isset($_POST["update"])) {
  // Get form data
  $kd_dokter = mysqli_real_escape_string($theLINK,$_POST['kode']);
  $kd_dokterNew = mysqli_real_escape_string($theLINK,$_POST['kd_dokterNew']);
  $nm_dokter = mysqli_real_escape_string($theLINK,$_POST['nm_dokter']);
  $sps = mysqli_real_escape_string($theLINK,$_POST['spesialis']);
  $sex = mysqli_real_escape_string($theLINK,$_POST['sex']);
  $kota = mysqli_real_escape_string($theLINK,$_POST['kota_dokter']);

  // CHECK IF A NEW IMAGE WAS UPLOADED
  if($_FILES["fileImage"]["name"]) {
    // Handle file upload
    $targetDir = "uploads/";
    $randomFileName = 'DK_' . rand(1000, 9999) . '.' . pathinfo($_FILES["fileImage"]["name"], PATHINFO_EXTENSION);
    $targetFile = $targetDir . $randomFileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileImage"]["tmp_name"]);
    if($check === false) {
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
      // Duplication ErrMessage only if kd_dokter is changed
      if ($kd_dokterNew !== $kd_dokter) {
        $dbClearance = mysqli_num_rows(mysqli_query($theLINK,"SELECT * FROM tbl_dokter WHERE kd_dokter='$kd_dokterNew'"));

        if ($dbClearance > 0) {
          // If there is kd_dokter duplication detected
          echo "<script>alert('Kode dokter sudah terdaftar. Gunakan kode dokter yang berbeda!');window.history.back();</script>";
        } else {
          // If no duplication detected
          // Delete old image file if exists
          $sql_select_old_image = "SELECT foto_dokter FROM tbl_dokter WHERE kd_dokter='$kd_dokter'";
          $result_select_old_image = $theLINK->query($sql_select_old_image);
          if ($result_select_old_image->num_rows > 0) {
            $row = $result_select_old_image->fetch_assoc();
            $old_image = $row["foto_dokter"];
            if(file_exists("uploads/" . $old_image)) {
              unlink("uploads/" . $old_image);
            }
          }

          // Update data in database with new image filename
          $sql_update = "UPDATE tbl_dokter SET kd_dokter='$kd_dokterNew', nm_dokter='$nm_dokter', spesialis='$sps', sex='$sex', kota_dokter='$kota', foto_dokter='$randomFileName' WHERE kd_dokter='$kd_dokter'";

          if ($theLINK->query($sql_update) === TRUE) {
            move_uploaded_file($_FILES["fileImage"]["tmp_name"], $targetFile);
            echo "<script>window.location='list_dokter.php'</script>";
          } else {
            echo "Error: " . $sql . "<br>" . $theLINK->error;
          }
        }
      } else {
        // UPDATE DATA IF NO CHANGES ON KD_DOKTER
        // Delete old image file if exists
        $sql_select_old_image = "SELECT foto_dokter FROM tbl_dokter WHERE kd_dokter='$kd_dokter'";
        $result_select_old_image = $theLINK->query($sql_select_old_image);
        if ($result_select_old_image->num_rows > 0) {
          $row = $result_select_old_image->fetch_assoc();
          $old_image = $row["foto_dokter"];
          if(file_exists("uploads/" . $old_image)) {
            unlink("uploads/" . $old_image);
          }
        }

        // Update data in database with new image filename
        $sql_update = "UPDATE tbl_dokter SET nm_dokter='$nm_dokter', spesialis='$sps', sex='$sex', kota_dokter='$kota', foto_dokter='$randomFileName' WHERE kd_dokter='$kd_dokter'";

        if ($theLINK->query($sql_update) === TRUE) {
          move_uploaded_file($_FILES["fileImage"]["tmp_name"], $targetFile);
          echo "<script>window.location='list_dokter.php'</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $theLINK->error;
        }
      }
    }
  } else {
    // IF NO NEW IMAGE WAS UPLOADED

    // Duplication ErrMessage only if kd_dokter is changed
    if ($kd_dokterNew !== $kd_dokter) {
      $dbClearance = mysqli_num_rows(mysqli_query($theLINK,"SELECT * FROM tbl_dokter WHERE kd_dokter='$kd_dokterNew'"));

      if ($dbClearance > 0) {
        // If there is kd_dokter duplication detected
        echo "<script>alert('Kode dokter sudah terdaftar. Gunakan kode dokter yang berbeda!');window.history.back();</script>";
      } else {
        // If no new image was uploaded, update data in database without changing image filename
        $sql_update = "UPDATE tbl_dokter SET kd_dokter='$kd_dokterNew', nm_dokter='$nm_dokter', spesialis='$sps', sex='$sex',kota_dokter='$kota' WHERE kd_dokter='$kd_dokter'";

        if ($theLINK->query($sql_update) === TRUE) {
          echo "<script>window.location='list_dokter.php'</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $theLINK->error;
        }
      }
    } else {
      // UPDATE DATA IF NO CHANGES ON KD_DOKTER

      // If no new image was uploaded, update data in database without changing image filename
      $sql_update = "UPDATE tbl_dokter SET nm_dokter='$nm_dokter', spesialis='$sps', sex='$sex',kota_dokter='$kota' WHERE kd_dokter='$kd_dokter'";

      if ($theLINK->query($sql_update) === TRUE) {
        echo "<script>window.location='list_dokter.php'</script>";
      } else {
        echo "Error: " . $sql . "<br>" . $theLINK->error;
      }
    }
  }
}
?>
