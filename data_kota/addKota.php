<?php require '../a.php'; ?>

<div class="container-fluid px-4">
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card shadow border-0 rounded-lg my-3">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Tambah Kota Baru</h3></div>
        <div class="card-body">
          <form method="POST" action="addKotaAction.php" class="needs-validation" novalidate>
            <div class="row mb-3">
              <div class="col-md-4">
                <div class="form-floating mb-3 mb-md-0">
                  <input class="form-control" name="kd_kota" id="kdKota" type="text" placeholder="Kode Kota" maxlength="5" pattern="[0-9]{5}" autocomplete="off" required />
                  <label for="kdKota">Kode Kota</label>
                  <div class="invalid-feedback">
                    Contoh Format : 12345
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-floating">
                  <input class="form-control" name="nm_kota" id="nmKota" type="text" placeholder="Nama Kota" maxlength="30" autocomplete="off" required />
                  <label for="nmKota">Nama Kota</label>
                  <div class="invalid-feedback">
                    Wajib diisi!
                  </div>
                </div>
              </div>
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
