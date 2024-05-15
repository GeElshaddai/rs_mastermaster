<?php require("connection.php");

// Check if form was submitted
if(isset($_POST["update"])) {
  // Get form data
  $no_rm = mysqli_real_escape_string($theLINK,$_POST['kode']);
  $no_rmNew = mysqli_real_escape_string($theLINK,$_POST['no_rmNew']);
  $nm_pasien = mysqli_real_escape_string($theLINK,$_POST['nm_pasien']);
  $sex = mysqli_real_escape_string($theLINK,$_POST['sex']);
  $tgl_lhr = mysqli_real_escape_string($theLINK,$_POST['tgl_lhr']);
  $kota = mysqli_real_escape_string($theLINK,$_POST['kota_pasien']);

  // CHECK IF A NEW IMAGE WAS UPLOADED
  if($_FILES["fileImage"]["name"]) {
    // Handle file upload
    $targetDir = "uploads/";
    $randomFileName = 'PSN_' . rand(1000, 9999) . '.' . pathinfo($_FILES["fileImage"]["name"], PATHINFO_EXTENSION);
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
      // Duplication ErrMessage only if no_rm is changed
      if ($no_rmNew !== $no_rm) {
        $dbClearance = mysqli_num_rows(mysqli_query($theLINK,"SELECT * FROM tbl_pasien WHERE no_rm=$no_rmNew"));

        if ($dbClearance > 0) {
          // If there is no_rm duplication detected
          echo "<script>alert('Nomor Rekam Medis sudah terdaftar. Gunakan nomor yang berbeda!');window.history.back();</script>";
        } else {
          // If no duplication detected
          // Delete old image file if exists
          $sql_select_old_image = "SELECT foto_pasien FROM tbl_pasien WHERE no_rm=$no_rm";
          $result_select_old_image = $theLINK->query($sql_select_old_image);
          if ($result_select_old_image->num_rows > 0) {
            $row = $result_select_old_image->fetch_assoc();
            $old_image = $row["foto_pasien"];
            if(file_exists("uploads/" . $old_image)) {
              unlink("uploads/" . $old_image);
            }
          }

          // Update data in database with new image filename
          $sql_update = "UPDATE tbl_pasien SET no_rm='$no_rmNew', nm_pasien='$nm_pasien', sex='$sex', tgl_lhr='$tgl_lhr', kota_pasien='$kota', foto_pasien='$randomFileName' WHERE no_rm=$no_rm";

          if ($theLINK->query($sql_update) === TRUE) {
            move_uploaded_file($_FILES["fileImage"]["tmp_name"], $targetFile);
            echo "<script>window.location='list_pasien.php'</script>";
          } else {
            echo "Error: " . $sql . "<br>" . $theLINK->error;
          }
        }
      } else {
        // UPDATE DATA IF NO CHANGES ON NO_RM
        // Delete old image file if exists
        $sql_select_old_image = "SELECT foto_pasien FROM tbl_pasien WHERE no_rm=$no_rm";
        $result_select_old_image = $theLINK->query($sql_select_old_image);
        if ($result_select_old_image->num_rows > 0) {
          $row = $result_select_old_image->fetch_assoc();
          $old_image = $row["foto_pasien"];
          if(file_exists("uploads/" . $old_image)) {
            unlink("uploads/" . $old_image);
          }
        }

        // Update data in database with new image filename
        $sql_update = "UPDATE tbl_pasien SET nm_pasien='$nm_pasien', sex='$sex', tgl_lhr='$tgl_lhr', kota_pasien='$kota', foto_pasien='$randomFileName' WHERE no_rm=$no_rm";

        if ($theLINK->query($sql_update) === TRUE) {
          move_uploaded_file($_FILES["fileImage"]["tmp_name"], $targetFile);
          echo "<script>window.location='list_pasien.php'</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $theLINK->error;
        }
      }
    }
  } else {
    // IF NO NEW IMAGE WAS UPLOADED

    // Duplication ErrMessage only if no_rm is changed
    if ($no_rmNew !== $no_rm) {
      $dbClearance = mysqli_num_rows(mysqli_query($theLINK,"SELECT * FROM tbl_pasien WHERE no_rm=$no_rmNew"));

      if ($dbClearance > 0) {
        // If there is no_rm duplication detected
        echo "<script>alert('Nomor Rekam Medis sudah terdaftar. Gunakan nomor yang berbeda!');window.history.back();</script>";
      } else {
        // If no new image was uploaded, update data in database without changing image filename
        $sql_update = "UPDATE tbl_pasien SET no_rm='$no_rmNew', nm_pasien='$nm_pasien', sex='$sex', tgl_lhr='$tgl_lhr', kota_pasien='$kota' WHERE no_rm=$no_rm";

        if ($theLINK->query($sql_update) === TRUE) {
          echo "<script>window.location='list_pasien.php'</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $theLINK->error;
        }
      }
    } else {
      // UPDATE DATA IF NO CHANGES ON NO_RM

      // If no new image was uploaded, update data in database without changing image filename
      $sql_update = "UPDATE tbl_pasien SET nm_pasien='$nm_pasien', sex='$sex', tgl_lhr='$tgl_lhr', kota_pasien='$kota' WHERE no_rm=$no_rm";

      if ($theLINK->query($sql_update) === TRUE) {
        echo "<script>window.location='list_pasien.php'</script>";
      } else {
        echo "Error: " . $sql . "<br>" . $theLINK->error;
      }
    }
  }
}
?>
