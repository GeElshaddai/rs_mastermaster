<?php require '../connection.php';

$id = $_GET['no_rm'];

$result = mysqli_query($theLINK,"SELECT * FROM tbl_pasien WHERE no_rm = $id");

$resultData = mysqli_fetch_array($result);
$no_rm = $resultData['no_rm'];
$nm_pasien = $resultData['nm_pasien'];
$sex = $resultData['sex'];
$tgl_lhr = $resultData['tgl_lhr'];
$kota = $resultData['kota_pasien'];

?>

<?php require '../a.php'; ?>

<div class="container-fluid px-4">
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card shadow border-0 rounded-lg my-3">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Data Pasien</h3></div>
        <div class="card-body">
          <form method="POST" action="editPasienAction.php" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="form-floating mb-3">
              <input class="form-control" name="no_rmNew" id="kdBaru" type="text" placeholder="Nomor Rekam Medis"  maxlength="6" pattern="[0-9]{6}" value="<?php echo $no_rm; ?>" autocomplete="off" required/>
              <label for="kdBaru">No. Rekam Medis</label>
              <div class="invalid-feedback">
                Wajib diisi dengan format 6 digit angka 0-9
              </div>
            </div>
            <div class="form-floating mb-3">
              <input class="form-control" name="nm_pasien" id="nm_pasien" type="text" placeholder="Nama Pasien" maxlength="30" value="<?php echo $nm_pasien; ?>" autocomplete="off" required />
              <label for="nm_pasien">Nama Pasien</label>
              <div class="invalid-feedback">
                Wajib diisi!
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-4 form-floating">
                <select class="form-select" name="sex" id="sexFloating" aria-label="Floating label select example" required>
                  <option disabled>Jenis Kelamin</option>
                  <?php if ($sex == 'L') $CEK = 'selected'; else $CEK = ''; ?>
                  <option value="L" <?=$CEK;?>>Laki-laki</option>
                  <?php if ($sex == 'P') $CEK = 'selected'; else $CEK = ''; ?>
                  <option value="P" <?=$CEK;?>>Perempuan</option>
                </select>
                <label class="ps-4" for="sexFloating">Jenis Kelamin</label>
                <div class="invalid-feedback">
                  Wajib diisi!
                </div>
              </div>
              <div class="col-md-4 form-floating">
                <input type="date" class="form-control" name="tgl_lhr" id="tgl_lhr" value="<?php echo $tgl_lhr; ?>" required>
                <label class="ps-4" for="tgl_lhr">Tanggal Lahir</label>
                <div class="invalid-feedback">
                  Wajib diisi!
                </div>
              </div>
              <div class="col-md-4 form-floating">
                <select class="form-select" name="kota_pasien" id="kotaFloating" aria-label="Floating label select example" required>
                  <option disabled>Kota Asal</option>
                  <?php
                  $query   = "SELECT * FROM tbl_kota ORDER BY kd_kota";
                  $sambung = mysqli_query($theLINK, $query);
                  while ($row = mysqli_fetch_array($sambung))
                  {
                    ?>
                    <?php if ($kota == $row["kd_kota"]) $CEK = 'selected'; else $CEK = ''; ?>
                    <option value="<?=$row["kd_kota"];?>" <?=$CEK;?>><?=$row["nm_kota"];?></option>
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
              <input type="file" class="form-control form-control-sm" name="fileImage" id="fileImage" aria-describedby="fotoHelpInline">
              <span id="fotoHelpInline" class="form-text">Kosongkan jika tidak ingin ganti foto</span>
              <div class="invalid-feedback">Ukuran foto harus < 5MB dengan format jpg, jpeg, png</div>
            </div>
            <input type="hidden" name="kode" value="<?php echo $id;?>">
            <div class="d-grid"><button class="btn btn-primary" type="submit" name="update">Simpan</button></div>
            <div class="d-grid mt-1"><button class="btn btn-warning" type="reset">Reset</button></div>
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
