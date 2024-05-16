<?php require '../connection.php';

$id = $_GET['kd_kota'];

$result = mysqli_query($theLINK,"SELECT * FROM tbl_kota WHERE kd_kota = '$id'");

$resultData = mysqli_fetch_array($result);
$kd = $resultData['kd_kota'];
$nm_kota = $resultData['nm_kota'];

?>

<?php require '../a.php'; ?>

<div class="container-fluid px-4">
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card shadow border-0 rounded-lg my-3">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Data Kota</h3></div>
        <div class="card-body">
          <form method="POST" action="editKotaAction.php" class="needs-validation" novalidate>
            <div class="row mb-3">
              <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                  <input class="form-control" name="kd_kotaNew" id="kdBaru" type="text" placeholder="Kode Kota" maxlength="5" value="<?php echo $kd; ?>" pattern="[0-9]{5}" autocomplete="off" required/>
                  <label for="kdBaru">Kode Kota</label>
                  <div class="invalid-feedback">
                    Contoh Format : 12345
                  </div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-floating">
                  <input class="form-control" name="nm_kota" id="nmBaru" type="text" placeholder="Nama Kota" maxlength="30" value="<?php echo $nm_kota; ?>" autocomplete="off" required />
                  <label for="nmBaru">Nama Kota</label>
                  <div class="invalid-feedback">
                    Wajib diisi!
                  </div>
                </div>
              </div>
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
