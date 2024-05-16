<?php require '../a.php'; ?>

<div class="container-fluid px-4">
  <div class="card mb-4 mt-4">
    <div class="card-header">
      <div class="row justify-content-between align-items-center">
        <div class="col-4">
          <i class="fas fa-table me-1"></i>
          Daftar Kota ATMA Hospital
        </div>
        <div class="col-4 text-end">
          <a href="addKota.php" class="btn btn-primary">Tambah Data</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>Kode Kota</th>
            <th>Nama Kota</th>
            <th>Hapus</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Kode Kota</th>
            <th>Nama Kota</th>
            <th>Hapus</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
          $query   = "SELECT * FROM tbl_kota ORDER BY nm_kota";
          $sambung = mysqli_query($theLINK, $query);
          while ($row = mysqli_fetch_array($sambung)) {
            echo "<tr>";
            echo "<td>" . $row['kd_kota'] . "</td>";
            echo "<td><a href=\"editKota.php?kd_kota=$row[kd_kota]\" class=\"text-decoration-none link-dark\">" . $row['nm_kota'] . "<sup> <i class=\"fa-regular fa-pen-to-square\"></i></sup></a></td>";
            echo "<td class=\"text-center\">
            <div class=\"d-flex justify-content-center align-items-center\" style=\"height:25px\">
            <a href=\"hapusKota.php?kd_kota=$row[kd_kota]\" onclick=\"return confirm('Apakah anda yakin untuk menghapus data $row[nm_kota]?')\"><i class=\"fa-regular fa-trash-can text-danger\" style=\"font-size:1.3rem\"></i></a>
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
