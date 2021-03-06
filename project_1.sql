-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2020 at 01:12 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `bukti_pembelian`
--

DROP TABLE IF EXISTS `bukti_pembelian`;
CREATE TABLE `bukti_pembelian` (
  `id_terbeli` varchar(20) NOT NULL,
  `id_properti` varchar(20) NOT NULL,
  `tgl_terbeli` date NOT NULL,
  `harga_terbeli` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bukti_penjualan`
--

DROP TABLE IF EXISTS `bukti_penjualan`;
CREATE TABLE `bukti_penjualan` (
  `id_terjual` varchar(20) NOT NULL,
  `id_properti` varchar(20) NOT NULL,
  `tanggal_terjual` date NOT NULL,
  `harga_negosiasi_terjual` int(20) NOT NULL,
  `harga_terjual` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cicilan`
--

DROP TABLE IF EXISTS `cicilan`;
CREATE TABLE `cicilan` (
  `id_cicilan` varchar(20) NOT NULL,
  `id_beli` varchar(20) NOT NULL,
  `tgl_cicilan` date NOT NULL,
  `harga_cicilan` int(20) NOT NULL,
  `durasi_cicilan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `properti`
--

DROP TABLE IF EXISTS `properti`;
CREATE TABLE `properti` (
  `id_properti` varchar(20) NOT NULL,
  `jenis_properti` varchar(100) NOT NULL,
  `kategori_properti` varchar(100) NOT NULL,
  `deskripsi_properti` varchar(200) NOT NULL,
  `jumlah_ruangan_properti` int(100) NOT NULL,
  `jumlah_kamar_mandi_properti` int(100) NOT NULL,
  `alamat_properti` varchar(200) NOT NULL,
  `harga_properti` int(20) NOT NULL,
  `tgl_terdaftar_properti` date NOT NULL,
  `foto_properti` longtext NOT NULL,
  `view_properti` varchar(100) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properti`
--

INSERT INTO `properti` (`id_properti`, `jenis_properti`, `kategori_properti`, `deskripsi_properti`, `jumlah_ruangan_properti`, `jumlah_kamar_mandi_properti`, `alamat_properti`, `harga_properti`, `tgl_terdaftar_properti`, `foto_properti`, `view_properti`, `status`) VALUES
('P0001', 'Rumah', '', 'Rumah di jalan besar', 0, 0, 'jl. Rimbun no 20', 100000000, '2020-11-05', '', '231', 0),
('P0002', 'Tanah', '', 'Tanah besar di jalan Besar', 0, 0, 'Jl. lawu raya no 3B', 200000000, '2020-11-05', '', '151', 0),
('P0003', 'Rumah', '', 'Rumah kedua', 0, 0, 'jl. Rawon', 300000000, '2020-11-05', '', '561', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `no_telp_user` varchar(12) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `username_user` varchar(30) NOT NULL,
  `password_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_properti_beli`
--

DROP TABLE IF EXISTS `user_properti_beli`;
CREATE TABLE `user_properti_beli` (
  `id_beli` varchar(12) NOT NULL,
  `id_user` varchar(12) NOT NULL,
  `id_properti` varchar(20) NOT NULL,
  `pajak_beli` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_properti_jual`
--

DROP TABLE IF EXISTS `user_properti_jual`;
CREATE TABLE `user_properti_jual` (
  `id_jual` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_properti` varchar(20) NOT NULL,
  `agen_jual` varchar(20) NOT NULL,
  `preparasi_properti_jual` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_properti_kontrak`
--

DROP TABLE IF EXISTS `user_properti_kontrak`;
CREATE TABLE `user_properti_kontrak` (
  `id_kontrak` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_properti` varchar(20) NOT NULL,
  `durasi_kontrak` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukti_pembelian`
--
ALTER TABLE `bukti_pembelian`
  ADD PRIMARY KEY (`id_terbeli`);

--
-- Indexes for table `bukti_penjualan`
--
ALTER TABLE `bukti_penjualan`
  ADD PRIMARY KEY (`id_terjual`);

--
-- Indexes for table `cicilan`
--
ALTER TABLE `cicilan`
  ADD PRIMARY KEY (`id_cicilan`);

--
-- Indexes for table `properti`
--
ALTER TABLE `properti`
  ADD PRIMARY KEY (`id_properti`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_properti_beli`
--
ALTER TABLE `user_properti_beli`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `user_properti_jual`
--
ALTER TABLE `user_properti_jual`
  ADD PRIMARY KEY (`id_jual`);

--
-- Indexes for table `user_properti_kontrak`
--
ALTER TABLE `user_properti_kontrak`
  ADD PRIMARY KEY (`id_kontrak`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
