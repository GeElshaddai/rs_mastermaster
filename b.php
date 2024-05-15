<?php require 'connection.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Selamat Datang</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row mb-4 mx-3 border-bottom">
              <div class="col-lg-3 text-center">
                <img src="library/assets/img/fprofile1.png" alt="" height="200px" width="200px">
              </div>
              <div class="col-lg-9 pt-4">
                <h3>ATMA Hospital</h3>
                <p style="font-family:Merriweather">Tercatat sebagai pemimpin dalam industri kesehatan, ATMA Hospital menawarkan solusi inovatif dan pelayanan terbaik untuk memenuhi kebutuhan kesehatan masyarakat. Dengan komitmen kami terhadap pencegahan, pengobatan, dan perawatan yang holistik, kami berdedikasi untuk meningkatkan kualitas hidup setiap individu melalui pendekatan yang berfokus pada pasien dan teknologi canggih.</p>
              </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body fw-bold">
                          <div class="row justify-content-between">
                            <div class="col-8">
                              Daftar Dokter
                            </div>
                            <div class="col-4 text-end">
                              <i class="fa-solid fa-user-doctor"></i>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link text-decoration-none" href="list_dokter.php">Lihat ...</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body fw-bold">
                          <div class="row justify-content-between">
                            <div class="col-8">
                              Daftar Pasien
                            </div>
                            <div class="col-4 text-end">
                              <i class="fa-solid fa-head-side-mask"></i>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link text-decoration-none" href="list_pasien.php">Lihat ...</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
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
<script src="<?=$theHOME;?>/library/js/bootstrap.bundle.min.js"></script>
<script src="<?=$theHOME;?>/library/js/scripts.js"></script>
<script src="<?=$theHOME;?>/library/js/Chart.min.js"></script>
<script src="<?=$theHOME;?>/library/assets/demo/chart-area-demo.js"></script>
<script src="<?=$theHOME;?>/library/assets/demo/chart-bar-demo.js"></script>
<script src="<?=$theHOME;?>/library/js/simple-datatables.min.js"></script>
<script src="<?=$theHOME;?>/library/js/datatables-simple-demo.js"></script>
</body>
</html>
