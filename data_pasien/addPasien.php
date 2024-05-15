<?php require '../a.php'; ?>

<div class="container-fluid px-4">
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card shadow border-0 rounded-lg my-3">
        <div class="card-header">
          <h3 class="text-center font-weight-light my-4">Tambah Data Pasien Baru</h3>
        </div>
        <div class="card-body">
          <form method="POST" action="addPasienAction.php" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="form-floating mb-3">
              <input class="form-control" name="no_rm" id="noRM" type="text" placeholder="Nomor Rekam Medis" maxlength="6" pattern="[0-9]{6}" autocomplete="off" required />
              <label for="noRM">No. Rekam Medis</label>
              <div class="invalid-feedback">
                Wajib diisi dengan format 6 digit angka 0-9
              </div>
            </div>
            <div class="form-floating mb-3">
              <input class="form-control" name="nm_pasien" id="nm_pasien" type="text" placeholder="Nama Pasien" maxlength="30" autocomplete="off" required />
              <label for="nm_pasien">Nama Pasien</label>
              <div class="invalid-feedback">
                Wajib diisi!
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-4 form-floating mb-3 mb-md-0">
                <select class="form-select" name="sex" id="sexFloating" aria-label="Floating label select example" required>
                  <option></option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
                <label class="ps-4" for="sexFloating">Jenis Kelamin</label>
                <div class="invalid-feedback">
                  Wajib diisi!
                </div>
              </div>
              <div class="col-md-4 form-floating mb-3 mb-md-0">
                <input type="date" class="form-control" name="tgl_lhr" id="tgl_lhr" required>
                <label class="ps-4" for="tgl_lhr">Tanggal Lahir</label>
                <div class="invalid-feedback">
                  Wajib diisi!
                </div>
              </div>
              <div class="col-md-4 form-floating">
                <select class="form-select" name="kota_pasien" id="kotaFloating" aria-label="Floating label select example" required>
                  <option></option>
                  <?php
                  $query   = "SELECT * FROM tbl_kota ORDER BY kd_kota";
                  $sambung = mysqli_query($theLINK, $query);
                  while ($row = mysqli_fetch_array($sambung)) {
                    ?>
                    <option value="<?= $row["kd_kota"]; ?>"><?= $row["nm_kota"]; ?></option>
                    <?php
                  }
                  ?>
                </select>
                <label class="ps-4" for="kotaFloating">Kota asal</label>
                <div class="invalid-feedback">
                  Wajib diisi!
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="fileImage" class="form-label">Foto Pasien</label>
              <input type="file" class="form-control form-control-sm" name="fileImage" id="fileImage" required>
              <div class="invalid-feedback">Wajib diisi dengan format file jpg, jpeg, atau png</div>
            </div>
            <div class="d-grid"><button class="btn btn-primary" type="submit" name="submit">Simpan</button></div>
          </form>
        </div>
        <div class="card-footer text-center py-3">
          <div class="d-grid"><button class="btn btn-danger" type="button" onclick="window.history.back()">Cancel</button></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require '../b.php'; ?>
