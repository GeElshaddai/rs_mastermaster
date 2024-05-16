-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2024 at 02:00 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `kd_dokter` varchar(4) NOT NULL,
  `nm_dokter` varchar(30) NOT NULL,
  `spesialis` varchar(30) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `kota_dokter` varchar(5) NOT NULL,
  `foto_dokter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`kd_dokter`, `nm_dokter`, `spesialis`, `sex`, `kota_dokter`, `foto_dokter`) VALUES
('D111', 'dr. Umum', 'Umum', 'L', '32112', 'DK_5659.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kota`
--

CREATE TABLE `tbl_kota` (
  `kd_kota` varchar(5) NOT NULL,
  `nm_kota` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kota`
--

INSERT INTO `tbl_kota` (`kd_kota`, `nm_kota`) VALUES
('12341', 'Semarang'),
('23145', 'Karangsambung'),
('32111', 'Salatiga'),
('32112', 'Surabaya'),
('32189', 'Kota Lama'),
('36721', 'Sukoharjo'),
('42131', 'Surakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `no_rm` int(6) NOT NULL,
  `nm_pasien` varchar(30) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `kota_pasien` varchar(5) NOT NULL,
  `foto_pasien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`no_rm`, `nm_pasien`, `sex`, `tgl_lhr`, `kota_pasien`, `foto_pasien`) VALUES
(232323, 'Pasien 1', 'L', '1989-03-23', '36721', 'PSN_6427.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(255) NOT NULL,
  `passkey` varchar(255) NOT NULL,
  `userlevel` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `passkey`, `userlevel`) VALUES
('dono', 'e3b810115555736a216f137df55789f6', '1'),
('doni', '2da9cd653f63c010b6d6c5a5ad73fe32', '2'),
('yana', 'e1ce1e8d0877b06b55b613d5b22b0251', '3'),
('yani', '080840925a7e2087673145d83918c658', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`kd_dokter`),
  ADD KEY `kota_dokter` (`kota_dokter`);

--
-- Indexes for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  ADD PRIMARY KEY (`kd_kota`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`no_rm`),
  ADD KEY `kota_pasien` (`kota_pasien`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD CONSTRAINT `tbl_dokter_ibfk_1` FOREIGN KEY (`kota_dokter`) REFERENCES `tbl_kota` (`kd_kota`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD CONSTRAINT `tbl_pasien_ibfk_1` FOREIGN KEY (`kota_pasien`) REFERENCES `tbl_kota` (`kd_kota`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
