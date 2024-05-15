<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>List Pasien | ATMA Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php require("connection.php"); ?>
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
</body>

</html>