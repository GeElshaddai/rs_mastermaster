<?php require '../a.php'; ?>

<div class="container-fluid px-4">
  <div class="card mb-4 mt-4">
    <div class="card-header">
      <div class="row justify-content-between align-items-center">
        <div class="col-4">
          <i class="fas fa-table me-1"></i>
          Daftar Pasien ATMA Hospital
        </div>
        <div class="col-4 text-end">
          <a href="addPasien.php" class="btn btn-primary">Tambah Data</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>Nomor Rekam Medis</th>
            <th>Nama Pasien</th>
            <th>Sex</th>
            <th>Tanggal Lahir</th>
            <th>Kota</th>
            <th>Foto</th>
            <th>Hapus</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nomor Rekam Medis</th>
            <th>Nama Pasien</th>
            <th>Sex</th>
            <th>Tanggal Lahir</th>
            <th>Kota</th>
            <th>Foto</th>
            <th>Hapus</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
          $query   = "SELECT * FROM tbl_pasien LEFT JOIN tbl_kota ON tbl_pasien.kota_pasien = tbl_kota.kd_kota ORDER BY nm_pasien";
          $sambung = mysqli_query($theLINK, $query);
          while ($row = mysqli_fetch_array($sambung)) {
            echo "<tr>";
            echo "<td>" . $row['no_rm'] . "</td>";
            echo "<td><a href=\"editPasien.php?no_rm=$row[no_rm]\" class=\"text-decoration-none link-dark\">" . $row['nm_pasien'] . "<sup> <i class=\"fa-regular fa-pen-to-square\"></i></sup></a></td>";
            echo "<td>" . $row['sex'] . "</td>";
            echo "<td>" . $row['tgl_lhr'] . "</td>";
            echo "<td>" . $row['nm_kota'] . "</td>";
            echo "<td class=\"text-center\"><div class=\"d-flex justify-content-center\">
            <img src=\"uploads/" . $row['foto_pasien'] . "\" alt=\"" . $row['foto_pasien'] . "\" width=\"100px\" height=\"100px\">
          </div></td>";
          echo "<td class=\"text-center\">
            <div class=\"d-flex justify-content-center align-items-center\" style=\"height:100px\">
              <a href=\"hapusPasien.php?no_rm=$row[no_rm]\" onclick=\"return confirm('Apakah anda yakin untuk menghapus data $row[nm_pasien]?')\"><i class=\"fa-regular fa-trash-can text-danger\" style=\"font-size:2rem\"></i></a>
            </div>
          </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>

<?php require '../b.php'; ?>
