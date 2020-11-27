-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 10:27 AM
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
  `tgl_cicilan_terdaftar` date NOT NULL,
  `bunga_cicilan` int(20) NOT NULL,
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
('P0001', 'Rumah', 'kontrak', 'Rumah di jalan besar', 0, 0, 'jl. Rimbun no 20', 100000000, '2020-11-05', '', '231', 0),
('P0002', 'Tanah', 'kontrak', 'Tanah besar di jalan Besar', 0, 0, 'Jl. lawu raya no 3B', 200000000, '2020-11-05', '', '151', 0),
('P0003', 'Rumah', 'beli', 'Rumah kedua', 0, 0, 'jl. Rawon', 300000000, '2020-11-05', '', '561', 0),
('P0004', 'Rumah', 'beli', 'rumah besar di jalan besar', 5, 2, 'jalan besar no 20', 100000000, '2020-11-21', '', '121', 0),
('P0005', 'Apartemen', 'beli', 'rumah kecil di jalan kecil', 3, 1, 'jalan kecil no 30', 100000000, '2020-11-23', '', '151', 0),
('P0006', 'rumah', 'kontrak', 'sadasda', 10, 10, 'jalan rumah kecil', 1000000, '2020-11-27', '20201115143348.png', '0', 1),
('P0007', 'rumah', 'beli', 'aaaaaa', 15, 12, 'jl aaaaaaaaa', 100000000, '2020-11-27', '20201115143348.png', '0', 0),
('P0008', 'rumah', 'beli', 'aaaaaaa', 12, 6, 'jl bababababababba', 100000000, '2020-11-27', '20201115143928.png', '0', 1),
('P0009', 'rumah', 'beli', 'asdasdas', 13, 15, 'jl adasdasdasd', 21313123, '2020-11-27', 'back.jpg', '0', 1);

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

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `no_telp_user`, `email_user`, `username_user`, `password_user`) VALUES
('U0001', 'jeffry yohanes', '085954422323', 'jeffryyohanes48@gmail.com', 'jeffry48', 'Jeffry50'),
('U0002', 'jeffry yo', '085754422737', 'jeffryyohanes72@gmail.com', 'user1', 'Jeffry72'),
('U0003', 'jeffry yohanes3', '085954422123', 'jeffryyohanes75@gmail.com', 'user2', 'Jeffry75'),
('U0004', 'jeffry yoh', '085954422123', 'jeffryyohanes50@gmail.com', 'jeffry50', 'Jeffry50');

-- --------------------------------------------------------

--
-- Table structure for table `user_properti_beli`
--

DROP TABLE IF EXISTS `user_properti_beli`;
CREATE TABLE `user_properti_beli` (
  `id_beli` varchar(12) NOT NULL,
  `id_user` varchar(12) NOT NULL,
  `id_properti` varchar(20) NOT NULL,
  `pajak_beli` int(20) NOT NULL,
  `total_beli` int(20) NOT NULL,
  `pesan_untuk_penjual` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_properti_beli`
--

INSERT INTO `user_properti_beli` (`id_beli`, `id_user`, `id_properti`, `pajak_beli`, `total_beli`, `pesan_untuk_penjual`) VALUES
('B0001', 'U0001', 'P0006', 10000000, 110000000, 'aaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `user_properti_jual`
--

DROP TABLE IF EXISTS `user_properti_jual`;
CREATE TABLE `user_properti_jual` (
  `id_jual` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_properti` varchar(20) NOT NULL,
  `preparasi_properti_jual` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_properti_jual`
--

INSERT INTO `user_properti_jual` (`id_jual`, `id_user`, `id_properti`, `preparasi_properti_jual`) VALUES
('J0001', 'U0001', 'P0006', ''),
('J0002', 'U0001', 'P0007', ''),
('J0003', 'U0001', 'P0008', ''),
('J0004', 'U0001', 'P0009', 'dasdasdasd'),
('J0005', 'U0001', 'P0010', '21313123'),
('J0006', 'U0001', 'P0010', '21313123'),
('J0007', 'U0001', 'P0006', '21313123'),
('J0008', 'U0001', 'P0006', '21313123'),
('J0009', 'U0001', 'P0006', '21313123'),
('J0010', 'U0001', 'P0006', '21313123'),
('J0011', 'U0001', 'P0006', '21313123'),
('J0012', 'U0001', 'P0006', '21313123'),
('J0013', 'U0001', 'P0006', '21313123');

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
