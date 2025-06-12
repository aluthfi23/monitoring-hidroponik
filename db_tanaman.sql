-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2025 at 07:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tanaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nip` int(7) NOT NULL,
  `karyawan` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` enum('user','admin') NOT NULL,
  `status` enum('1','0') NOT NULL,
  `operator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `nip`, `karyawan`, `jk`, `password`, `level`, `status`, `operator`) VALUES
(14, 200, 'jokowi', 'L', '200', 'admin', '1', ' abdi '),
(15, 300, 'lutfhi', 'L', '300', 'admin', '1', ' jokowi ');

-- --------------------------------------------------------

--
-- Table structure for table `data_tanaman`
--

CREATE TABLE `data_tanaman` (
  `id` int(11) NOT NULL,
  `pipa` varchar(20) NOT NULL,
  `slot` varchar(50) NOT NULL,
  `kode2` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `mastertanaman` varchar(500) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_tanaman`
--

INSERT INTO `data_tanaman` (`id`, `pipa`, `slot`, `kode2`, `status`, `kode`, `mastertanaman`, `tgl`) VALUES
(8, 'u9', 'u', 'Low', 'Segera lakukan penyiraman', '1A', 'Kangkung', '2025-05-28'),
(9, '9', '9.1', 'Low', 'Segera lakukan penyiraman', '2A', 'Bayam', '2025-05-28'),
(10, 'u9', 'u', 'High', 'Tidak Perlu melakukan Penyiraman', '1A', 'Kangkung', '2025-05-31'),
(12, '2', '2.1', 'High', 'Tidak Perlu melakukan Penyiraman', '2c', 'wortel', '2025-05-09'),
(14, '9', '9.7', 'Low', 'Segera lakukan penyiraman', '2c', 'wortel', '2025-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `kelembapan`
--

CREATE TABLE `kelembapan` (
  `kode2` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelembapan`
--

INSERT INTO `kelembapan` (`kode2`, `status`) VALUES
('', ''),
('Low', 'Segera lakukan penyiraman'),
('High', 'Tidak Perlu melakukan Penyiraman'),
('Mind', 'Bisa di siram atau tidak');

-- --------------------------------------------------------

--
-- Table structure for table `status_tanaman`
--

CREATE TABLE `status_tanaman` (
  `id` int(11) NOT NULL,
  `slot` varchar(50) NOT NULL,
  `pipa` varchar(20) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `mastertanaman` varchar(500) NOT NULL,
  `tgl` date NOT NULL,
  `status` enum('mati','layu','kering') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `status_tanaman`
--

INSERT INTO `status_tanaman` (`id`, `slot`, `pipa`, `kode`, `mastertanaman`, `tgl`, `status`) VALUES
(19, '2.1', '2', '2c', 'wortel', '2025-05-15', 'mati'),
(20, '9.1', '9', '2A', 'Bayam', '2025-05-15', 'kering'),
(21, '2.1', '2', '2c', 'wortel', '2025-05-24', 'layu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mastertanaman`
--

CREATE TABLE `tb_mastertanaman` (
  `kode` varchar(10) NOT NULL,
  `mastertanaman` varchar(400) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mastertanaman`
--

INSERT INTO `tb_mastertanaman` (`kode`, `mastertanaman`, `id`) VALUES
('1A', 'Kangkung', 1),
('2A', 'Bayam', 2),
('2c', 'wortel', 3),
('3D', 'selada', 4),
('kl9', 'Timun', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `data_tanaman`
--
ALTER TABLE `data_tanaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slot` (`slot`);

--
-- Indexes for table `status_tanaman`
--
ALTER TABLE `status_tanaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slot` (`slot`);

--
-- Indexes for table `tb_mastertanaman`
--
ALTER TABLE `tb_mastertanaman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `data_tanaman`
--
ALTER TABLE `data_tanaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `status_tanaman`
--
ALTER TABLE `status_tanaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_mastertanaman`
--
ALTER TABLE `tb_mastertanaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
