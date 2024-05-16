<?php require '../connection.php';

// Check if form was submitted
if(isset($_POST["update"])) {
  // Get form data
  $kd_kota = mysqli_real_escape_string($theLINK,$_POST['kode']);
  $kd_kotaNew = mysqli_real_escape_string($theLINK,$_POST['kd_kotaNew']);
  $nm_kota = mysqli_real_escape_string($theLINK,$_POST['nm_kota']);

      // Duplication ErrMessage only if kd_kota is changed
      if ($kd_kotaNew !== $kd_kota) {
        $dbClearance = mysqli_num_rows(mysqli_query($theLINK,"SELECT * FROM tbl_kota WHERE kd_kota='$kd_kotaNew'"));

        if ($dbClearance > 0) {
          // If there is kd_kota duplication detected
          echo "<script>alert('Kode kota sudah terdaftar. Gunakan kode kota yang berbeda!');window.history.back();</script>";
        } else {
          // If no duplication detected
          // Update data in database with new image filename
          $sql_update = "UPDATE tbl_kota SET kd_kota='$kd_kotaNew', nm_kota='$nm_kota' WHERE kd_kota='$kd_kota'";

          // If everything is clear
          if ($theLINK->query($sql_update) === TRUE) {
            header("Location: ". $theHOME ."/data_kota/list_kota.php");
          } else {
            echo "Error: " . $sql . "<br>" . $theLINK->error;
          }

        }
      } else {
        // UPDATE DATA IF NO CHANGES ON KD_KOTA

        // Update data in database with new image filename
        $sql_update = "UPDATE tbl_kota SET nm_kota='$nm_kota' WHERE kd_kota='$kd_kota'";

        // If everything is clear
        if ($theLINK->query($sql_update) === TRUE) {
          header("Location: ". $theHOME ."/data_kota/list_kota.php");
        } else {
          echo "Error: " . $sql . "<br>" . $theLINK->error;
        }
      }
    }

?>
