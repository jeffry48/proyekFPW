-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 11:01 PM
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
-- Table structure for table `bukti_kontrak`
--

DROP TABLE IF EXISTS `bukti_kontrak`;
CREATE TABLE `bukti_kontrak` (
  `id_terkontrak` varchar(100) NOT NULL,
  `id_kontrak` varchar(100) NOT NULL,
  `total_harga_kontrak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bukti_kontrak`
--

INSERT INTO `bukti_kontrak` (`id_terkontrak`, `id_kontrak`, `total_harga_kontrak`) VALUES
('TK0001', 'K0001', '12000000'),
('TK0002', 'K0004', '1200000000');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_pembelian`
--

DROP TABLE IF EXISTS `bukti_pembelian`;
CREATE TABLE `bukti_pembelian` (
  `id_terbeli` varchar(20) NOT NULL,
  `id_beli` varchar(20) NOT NULL,
  `tgl_terbeli` date NOT NULL,
  `harga_terbeli` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bukti_pembelian`
--

INSERT INTO `bukti_pembelian` (`id_terbeli`, `id_beli`, `tgl_terbeli`, `harga_terbeli`) VALUES
('TB0001', 'B0006', '2020-12-09', 360000000),
('TB0002', 'B0001', '2020-12-12', 110000000),
('TB0003', 'B0008', '2020-12-12', 25575748),
('TB0004', 'B0011', '2020-12-12', 110000);

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

--
-- Dumping data for table `cicilan`
--

INSERT INTO `cicilan` (`id_cicilan`, `id_beli`, `tgl_cicilan_terdaftar`, `bunga_cicilan`, `durasi_cicilan`) VALUES
('C0001', 'B0006', '2020-12-09', 30000000, 12),
('C0002', 'B0008', '2020-12-12', 2131312, 12);

-- --------------------------------------------------------

--
-- Table structure for table `properti`
--

DROP TABLE IF EXISTS `properti`;
CREATE TABLE `properti` (
  `id_properti` varchar(20) NOT NULL,
  `jenis_properti` varchar(100) NOT NULL,
  `kategori_properti` varchar(100) NOT NULL,
  `deskripsi_properti` varchar(200) DEFAULT NULL,
  `jumlah_ruangan_properti` int(100) NOT NULL,
  `jumlah_kamar_mandi_properti` int(100) NOT NULL,
  `alamat_properti` varchar(200) NOT NULL,
  `harga_properti` int(20) NOT NULL,
  `tgl_terdaftar_properti` date NOT NULL,
  `foto_properti` longtext DEFAULT NULL,
  `view_properti` varchar(100) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properti`
--

INSERT INTO `properti` (`id_properti`, `jenis_properti`, `kategori_properti`, `deskripsi_properti`, `jumlah_ruangan_properti`, `jumlah_kamar_mandi_properti`, `alamat_properti`, `harga_properti`, `tgl_terdaftar_properti`, `foto_properti`, `view_properti`, `status`) VALUES
('P0001', 'Rumah', 'kontrak', 'Rumah di jalan besar', 0, 0, 'jl. Rimbun no 20', 100000000, '2020-11-05', '', '234', 1),
('P0002', 'Tanah', 'kontrak', 'Tanah besar di jalan Besar', 0, 0, 'Jl. lawu raya no 3B', 200000000, '2020-11-05', '', '195', 1),
('P0003', 'Rumah', 'beli', 'Rumah kedua', 0, 0, 'jl. Rawon', 300000000, '2020-11-05', '', '567', 0),
('P0004', 'Rumah', 'beli', 'rumah besar di jalan besar', 5, 2, 'jalan besar no 20', 100000000, '2020-11-21', '', '130', 1),
('P0005', 'Apartemen', 'beli', 'rumah kecil di jalan kecil', 3, 1, 'jalan kecil no 30', 100000000, '2020-11-23', '', '156', 1),
('P0006', 'rumah', 'kontrak', 'sadasda', 10, 10, 'jalan rumah kecil', 1000000, '2020-11-27', '20201115143348.png', '18', 0),
('P0007', 'rumah', 'beli', 'aaaaaa', 15, 12, 'jl aaaaaaaaa', 100000000, '2020-11-27', '20201115143348.png', '1', 1),
('P0008', 'rumah', 'beli', 'aaaaaaa', 12, 6, 'jl bababababababba', 100000000, '2020-11-27', '20201115143928.png', '0', 1),
('P0009', 'rumah', 'beli', 'asdasdas', 13, 15, 'jl adasdasdasd', 21313123, '2020-11-27', 'back.jpg', '0', 0),
('P0010', 'apartemen', 'beli', 'apartmen kecil', 10, 20, 'jalan kecil', 100000, '2020-12-12', '20201115143348.png', '0', 0),
('P0011', 'rumah', 'beli', 'aaa', 1, 1, 'jl. 123', 100000, '2020-12-12', 'properti/P0011.jpg', '12', 1),
('P0012', 'tanah', 'kontrak', 'kontrak tanah', 12, 12, 'jl makanan', 12000000, '2020-12-12', 'properti/P0012.png', '29', 0),
('P0013', 'tanah', 'beli', NULL, 0, 0, 'jl. tanah', 100000000, '2020-12-12', 'properti/P0013.jpg', '26', 1),
('P0014', 'rumah', 'beli', NULL, 5, 5, 'jl. keramat 2', 1000000, '2020-12-12', 'properti/P0014.jpg', '0', 1),
('P0015', 'apartemen', 'kontrak', 'apartemen kontrak', 0, 0, 'jl. apartemen 2', 100000000, '2020-12-12', 'properti/P0015.PNG', '2', 0);

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
('U0004', 'jeffry yoh', '085954422123', 'jeffryyohanes50@gmail.com', 'jeffry50', 'Jeffry50'),
('U0005', 'jeffry3', '085954422321', 'jeffryyohanes52@gmail.com', 'user3', 'Jeffry48');

-- --------------------------------------------------------

--
-- Table structure for table `user_properti_beli`
--

DROP TABLE IF EXISTS `user_properti_beli`;
CREATE TABLE `user_properti_beli` (
  `id_beli` varchar(12) NOT NULL,
  `id_user` varchar(12) NOT NULL,
  `id_properti` varchar(20) NOT NULL,
  `metode_pembelian` varchar(255) NOT NULL,
  `pajak_beli` int(20) NOT NULL,
  `total_beli` int(20) NOT NULL,
  `tgl_beli` date NOT NULL,
  `pesan_untuk_penjual` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_properti_beli`
--

INSERT INTO `user_properti_beli` (`id_beli`, `id_user`, `id_properti`, `metode_pembelian`, `pajak_beli`, `total_beli`, `tgl_beli`, `pesan_untuk_penjual`) VALUES
('B0001', 'U0001', 'P0006', 'cash', 10000000, 110000000, '0000-00-00', 'aaaaa'),
('B0002', 'U0002', 'P0003', 'cash', 30000000, 330000000, '0000-00-00', 'beli dong!'),
('B0003', 'U0003', 'P0003', 'cash', 30000000, 330000000, '0000-00-00', 'beli dari 2 dong!'),
('B0004', 'U0004', 'P0003', 'cash', 30000000, 330000000, '0000-00-00', 'beli dong3'),
('B0005', 'U0001', 'P0004', 'cash', 10000000, 110000000, '0000-00-00', 'sad'),
('B0006', 'U0005', 'P0003', 'kredit', 30000000, 360000000, '0000-00-00', 'beli kredit'),
('B0007', 'U0004', 'P0004', 'cash', 10000000, 110000000, '0000-00-00', 'aaaaa'),
('B0008', 'U0004', 'P0009', 'kredit', 2131312, 25575748, '0000-00-00', 'aaaa'),
('B0009', 'U0004', 'P0007', 'cash', 10000000, 110000000, '0000-00-00', NULL),
('B0010', 'U0002', 'P0009', 'cash', 2131312, 23444435, '0000-00-00', NULL),
('B0011', 'U0002', 'P0010', 'cash', 10000, 110000, '2020-12-12', NULL),
('B0012', 'U0003', 'P0004', 'cash', 10000000, 110000000, '2020-12-12', 'besar jalan'),
('B0013', 'U0003', 'P0004', 'cash', 10000000, 110000000, '2020-12-12', 'besar jalan'),
('B0014', 'U0001', 'P0011', 'cash', 10000, 110000, '2020-12-12', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `user_properti_jual`
--

DROP TABLE IF EXISTS `user_properti_jual`;
CREATE TABLE `user_properti_jual` (
  `id_jual` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_properti` varchar(20) NOT NULL,
  `preparasi_properti_jual` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_properti_jual`
--

INSERT INTO `user_properti_jual` (`id_jual`, `id_user`, `id_properti`, `preparasi_properti_jual`) VALUES
('J0001', 'U0001', 'P0006', ''),
('J0002', 'U0001', 'P0007', ''),
('J0003', 'U0001', 'P0008', ''),
('J0004', 'U0001', 'P0009', 'dasdasdasd'),
('J0005', 'U0001', 'P0003', 'preparasi'),
('J0006', 'U0004', 'P0010', 'jalan kecil'),
('J0007', 'U0004', 'P0011', 'aaa'),
('J0008', 'U0001', 'P0012', 'preparasi tanah'),
('J0009', 'U0002', 'P0013', NULL),
('J0010', 'U0002', 'P0014', NULL),
('J0011', 'U0002', 'P0014', NULL),
('J0012', 'U0001', 'P0015', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_properti_kontrak`
--

DROP TABLE IF EXISTS `user_properti_kontrak`;
CREATE TABLE `user_properti_kontrak` (
  `id_kontrak` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_properti` varchar(20) NOT NULL,
  `tgl_awal` date NOT NULL,
  `durasi_kontrak` int(3) NOT NULL,
  `tgl_akhir` date NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_properti_kontrak`
--

INSERT INTO `user_properti_kontrak` (`id_kontrak`, `id_user`, `id_properti`, `tgl_awal`, `durasi_kontrak`, `tgl_akhir`, `tgl_kontrak`, `harga`) VALUES
('K0001', 'U0003', 'P0012', '2020-12-02', 1, '2020-12-02', '2020-12-12', 12000000),
('K0002', 'U0004', 'P0012', '2020-12-17', 1, '2020-12-17', '2020-12-12', 12000000),
('K0003', 'U0001', 'P0012', '2020-12-28', 12, '2020-12-28', '2020-12-12', 144000000),
('K0004', 'U0004', 'P0015', '2021-01-13', 12, '2021-01-13', '2020-12-12', 1200000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukti_kontrak`
--
ALTER TABLE `bukti_kontrak`
  ADD PRIMARY KEY (`id_terkontrak`);

--
-- Indexes for table `bukti_pembelian`
--
ALTER TABLE `bukti_pembelian`
  ADD PRIMARY KEY (`id_terbeli`);

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
