<?php require '../a.php'; ?>

<div class="container-fluid px-4">
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card shadow border-0 rounded-lg my-3">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Tambah Dokter Baru</h3></div>
        <div class="card-body">
          <form method="POST" action="addDokterAction.php" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="row mb-3">
              <div class="col-md-4">
                <div class="form-floating mb-3 mb-md-0">
                  <input class="form-control" name="kd_dokter" id="kdDokter" type="text" placeholder="Kode Dokter" maxlength="4" pattern="D[0-9]{3}" autocomplete="off" required />
                  <label for="kdDokter">Kode Dokter</label>
                  <div class="invalid-feedback">
                    Contoh Format : D012
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-floating">
                  <input class="form-control" name="spesialis" id="sps" type="text" placeholder="Spesialisasi Dokter" maxlength="25" autocomplete="off" required />
                  <label for="sps">Spesialisasi</label>
                  <div class="invalid-feedback">
                    Wajib diisi!
                  </div>
                </div>
              </div>
            </div>
            <div class="form-floating mb-3">
              <input class="form-control" name="nm_dokter" id="nmDokter" type="text" placeholder="Nama Dokter" maxlength="30" autocomplete="off" required />
              <label for="nmDokter">Nama Dokter</label>
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
              <div class="col-md-8 form-floating">
                <select class="form-select" name="kota_dokter" id="kotaFloating" aria-label="Floating label select example" required>
                  <option></option>
                  <?php
                  $query   = "SELECT * FROM tbl_kota ORDER BY kd_kota";
                  $sambung = mysqli_query($theLINK, $query);
                  while ($row = mysqli_fetch_array($sambung))
                  {
                    ?>
                    <option value="<?=$row["kd_kota"];?>"><?=$row["nm_kota"];?></option>
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
              <label for="fileImage" class="form-label">Foto Dokter</label>
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
