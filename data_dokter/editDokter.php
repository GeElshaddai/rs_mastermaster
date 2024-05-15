<?php require '../connection.php';

$id = $_GET['kd_dokter'];

$result = mysqli_query($theLINK,"SELECT * FROM tbl_dokter WHERE kd_dokter = '$id'");

$resultData = mysqli_fetch_array($result);
$kd = $resultData['kd_dokter'];
$nm_dokter = $resultData['nm_dokter'];
$sps = $resultData['spesialis'];
$sex = $resultData['sex'];
$kota = $resultData['kota_dokter'];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit Data Dokter | ATMA Hospital</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">ATMA Hospital</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Daftar</div>
                            <a class="nav-link" href="list_dokter.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-doctor"></i></div>
                                Daftar Dokter
                            </a>
                            <a class="nav-link" href="list_pasien.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-head-side-mask"></i></div>
                                Daftar Pasien
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <div class="row justify-content-center">
                          <div class="col-lg-7">
                              <div class="card shadow border-0 rounded-lg my-3">
                                  <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Data Dokter</h3></div>
                                  <div class="card-body">
                                      <form method="POST" action="editDokterAction.php" enctype="multipart/form-data" class="needs-validation" novalidate>
                                          <div class="row mb-3">
                                              <div class="col-md-3">
                                                  <div class="form-floating mb-3 mb-md-0">
                                                      <input class="form-control" name="kd_dokterNew" id="kdBaru" type="text" placeholder="Kode Dokter" maxlength="4" value="<?php echo $kd; ?>" pattern="D[0-9]{3}" autocomplete="off" required/>
                                                      <label for="kdBaru">Kode Dokter</label>
                                                      <div class="invalid-feedback">
                                                        Contoh Format : D012
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-9">
                                                  <div class="form-floating">
                                                      <input class="form-control" name="spesialis" id="spsBaru" type="text" placeholder="Spesialisasi Dokter" maxlength="25" value="<?php echo $sps; ?>" autocomplete="off" required />
                                                      <label for="spsBaru">Spesialisasi</label>
                                                      <div class="invalid-feedback">
                                                        Wajib diisi!
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-floating mb-3">
                                              <input class="form-control" name="nm_dokter" id="nmBaru" type="text" placeholder="Nama Dokter" maxlength="30" value="<?php echo $nm_dokter; ?>" autocomplete="off" required />
                                              <label for="nmBaru">Nama Dokter</label>
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
                                              <div class="col-md-8 form-floating">
                                                <select class="form-select" name="kota_dokter" id="kotaFloating" aria-label="Floating label select example" required>
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
                                            <label for="fileImage" class="form-label">Foto Dokter</label>
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
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; ATMA Hospital 2024</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script type="text/javascript">
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
          'use strict'

          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          const forms = document.querySelectorAll('.needs-validation')

          // Loop over them and prevent submission
          Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }

              form.classList.add('was-validated')
            }, false)
          })
        })()
        </script>
    </body>
</html>
