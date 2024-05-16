<?php
require 'connection.php';

session_start();

if (
    !isset($_SESSION['userName']) or
    !isset($_SESSION['passWord']) or
    !isset($_SESSION['userLevel'])
) {
    header("Location: " . $theHOME . "/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - ATMA HOSPITAL</title>
    <link href="<?= $theHOME; ?>/library/css/style.min.css" rel="stylesheet" />
    <link href="<?= $theHOME; ?>/library/css/styles.css" rel="stylesheet" />
    <script src="<?= $theHOME; ?>/library/js/all.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?= $theHOME; ?>/index.php">ATMA Hospital</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-3 me-lg-4 ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="<?= $theHOME; ?>/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="<?= $theHOME; ?>/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Home
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data List
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <!-- User Level Admin -->
                                <?php if ($_SESSION['userLevel'] == '1') {
                                ?>
                                    <a class="nav-link" href="<?= $theHOME; ?>/data_dokter/list_dokter.php">Data Dokter</a>
                                    <a class="nav-link" href="<?= $theHOME; ?>/data_pasien/list_pasien.php">Data Pasien</a>
                                    <a class="nav-link" href="#">Data Obat</a>
                                    <a class="nav-link" href="<?= $theHOME; ?>/data_kota/list_kota.php">Data Kota</a>
                                    <a class="nav-link" href="#">Data Pegawai</a>
                                <?php } ?>

                                <!-- User Level Rekam Medis -->
                                <?php if ($_SESSION['userLevel'] == '2') {
                                ?>
                                    <a class="nav-link" href="<?= $theHOME; ?>/data_dokter/list_dokter.php">Data Dokter</a>
                                    <a class="nav-link" href="<?= $theHOME; ?>/data_pasien/list_pasien.php">Data Pasien</a>
                                    <a class="nav-link" href="<?= $theHOME; ?>/data_kota/list_kota.php">Data Kota</a>
                                <?php } ?>

                                <!-- User Level Apoteker -->
                                <?php if ($_SESSION['userLevel'] == '3') {
                                ?>
                                    <a class="nav-link" href="#">Data Obat</a>
                                <?php } ?>

                                <!-- User Level HRD -->
                                <?php if ($_SESSION['userLevel'] == '4') {
                                ?>
                                    <a class="nav-link" href="#">Data Pegawai</a>
                                <?php } ?>

                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?= $_SESSION['userName']; ?> (<?= $_SESSION['userLevel']; ?>)
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>