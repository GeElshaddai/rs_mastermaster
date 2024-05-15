<?php require '../a.php'; ?>

<div class="container-fluid px-4">
  <div class="card mb-4 mt-4">
    <div class="card-header">
      <div class="row justify-content-between align-items-center">
        <div class="col-4">
          <i class="fas fa-table me-1"></i>
          Daftar Dokter ATMA Hospital
        </div>
        <div class="col-4 text-end">
          <a href="addDokter.php" class="btn btn-primary">Tambah Data</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>Kode Dokter</th>
            <th>Nama Dokter</th>
            <th>Spesialis</th>
            <th>Sex</th>
            <th>Kota Dokter</th>
            <th>Foto</th>
            <th>Hapus</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Kode Dokter</th>
            <th>Nama Dokter</th>
            <th>Spesialis</th>
            <th>Sex</th>
            <th>Kota Dokter</th>
            <th>Foto</th>
            <th>Hapus</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
          $query   = "SELECT * FROM tbl_dokter LEFT JOIN tbl_kota ON tbl_dokter.kota_dokter = tbl_kota.kd_kota ORDER BY nm_dokter";
          $sambung = mysqli_query($theLINK, $query);
          while ($row = mysqli_fetch_array($sambung)) {
            echo "<tr>";
            echo "<td>" . $row['kd_dokter'] . "</td>";
            echo "<td><a href=\"editDokter.php?kd_dokter=$row[kd_dokter]\" class=\"text-decoration-none link-dark\">" . $row['nm_dokter'] . "<sup> <i class=\"fa-regular fa-pen-to-square\"></i></sup></a></td>";
            echo "<td>" . $row['spesialis'] . "</td>";
            echo "<td>" . $row['sex'] . "</td>";
            echo "<td>" . $row['nm_kota'] . "</td>";
            echo "<td class=\"text-center\"><div class=\"d-flex justify-content-center\">
            <img src=\"uploads/" . $row['foto_dokter'] . "\" alt=\"" . $row['foto_dokter'] . "\" width=\"100px\" height=\"100px\">
          </div></td>";
          echo "<td class=\"text-center\">
            <div class=\"d-flex justify-content-center align-items-center\" style=\"height:100px\">
              <a href=\"hapusDokter.php?kd_dokter=$row[kd_dokter]\" onclick=\"return confirm('Apakah anda yakin untuk menghapus data $row[nm_dokter]?')\"><i class=\"fa-regular fa-trash-can text-danger\" style=\"font-size:2rem\"></i></a>
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
