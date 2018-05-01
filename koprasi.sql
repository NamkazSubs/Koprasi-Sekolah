-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2018 at 05:56 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koprasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nip` int(33) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nip`, `nama`, `username`, `password`, `foto`) VALUES
(101616300, 'Fu', 'namkaz', '123', '');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(30) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `stok` int(30) NOT NULL,
  `harga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `harga`) VALUES
(1, 'Topi', 143, '15000'),
(2, 'Kemeja', 186, '120000'),
(3, 'Kaos Kaki', 144, '13000'),
(4, 'Dasi', 148, '10000'),
(6, 'Pin', 120, '5000'),
(7, 'Baju Olah Raga', 110, '130000'),
(8, 'Baju Praktek', 125, '120000');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(191) NOT NULL,
  `nip` varchar(191) NOT NULL,
  `id_pesanan` varchar(191) NOT NULL,
  `total` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `nip`, `id_pesanan`, `total`) VALUES
(3, '101616300', 'NXHOZ0', '35000'),
(4, '101616300', '45K9QG', '285000'),
(5, '101616300', 'N0YGGA', '35000'),
(6, '101616300', 'G1WPLE', '685000'),
(7, '101616300', 'AW0Y9Q', '300000'),
(8, '101616300', '1SGDGU', '35000'),
(9, '101616300', '44OMJT', '180000'),
(10, '101616300', '3OYW9L', '148000');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(191) NOT NULL,
  `nis` varchar(191) NOT NULL,
  `nama_pemesan` varchar(191) NOT NULL,
  `kelas` varchar(191) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nis`, `nama_pemesan`, `kelas`, `tanggal`, `status`) VALUES
('1EY6EK', '101616354', 'Aldi Fauzan', 'XI AK 6', '2018-02-19', 'Belum Lunas'),
('1SGDGU', '106060300', 'aditya raihan', 'XI RPL 2', '2018-02-19', 'Lunas'),
('2TCOVC', '101615032', 'Gangan Derma', 'XI AK 1', '2018-02-12', 'Belum Lunas'),
('3OYW9L', '101616313', 'Asti Handayani', 'XI RPL 2', '2018-02-22', 'Lunas'),
('44OMJT', '101616320', 'Fariz firmansyah', 'X RPL 2', '2018-02-21', 'Lunas'),
('45K9QG', '999999', 'Kamukura Izuru', 'X AK 6', '2018-02-08', 'Lunas'),
('5QQ1Z1', '10161680', 'Muhammad Rizky', 'XII TKJ 1', '2018-02-08', 'Belum Lunas'),
('7HHZ8T', '101616300', 'Aditya Raihan', 'XI RPL 2', '2018-02-08', 'Lunas'),
('88JV83', '101616300', 'ikhsan Fauzi', 'XI RPL 2', '2018-02-12', 'Belum Lunas'),
('8V9WY1', '101616254', 'Fauzi WIldan', 'X RPL 1', '2018-02-12', 'Belum Lunas'),
('AW0Y9Q', 'pjhdv', 'f[dsljf lsjef[e', 'X RPL 1', '2018-02-14', 'Lunas'),
('G1WPLE', '213654654', 'Ali Firman', 'X AK 6', '2018-02-12', 'Lunas'),
('IFQYNU', '101565487', 'Fauzi Wildan', 'X RPL 2', '2018-02-12', 'Belum Lunas'),
('N0YGGA', '10514245', 'Abraham Lincoin', 'X AK 5', '2018-02-08', 'Lunas'),
('NXHOZ0', '101616300', 'Aditya Raihan', 'X RPL 2', '2018-02-16', 'Lunas'),
('OEPK9T', 'gtt6', '5tg5t5 t55t', 'XI AK 6', '2018-02-14', 'Belum Lunas'),
('P2X370', '101616314', 'Lingga Juliansyah', 'XI RPL 2', '2018-02-08', 'Lunas'),
('QMDQA7', '1015654654', 'Aldi  Firmansyah', 'X TKJ 1', '2018-02-12', 'Belum Lunas'),
('T3KL3W', '101616344', 'Ramdhan Eka', 'XI RPL 2', '2018-02-08', 'Lunas'),
('UDKPNP', '123123', 'Djay Ardiyansyah', 'XI AK 1', '2018-02-19', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `no` int(11) NOT NULL,
  `id_pesanan` varchar(191) NOT NULL,
  `id_barang` int(191) NOT NULL,
  `jumlah` varchar(191) NOT NULL,
  `harga` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`no`, `id_pesanan`, `id_barang`, `jumlah`, `harga`) VALUES
(3, 'NXHOZ0', 1, '1', '15000'),
(4, 'NXHOZ0', 2, '1', '20000'),
(5, '7HHZ8T', 1, '1', '15000'),
(6, '7HHZ8T', 2, '1', '20000'),
(7, '7HHZ8T', 3, '1', '130000'),
(8, 'P2X370', 4, '1', '120000'),
(9, 'P2X370', 3, '1', '130000'),
(10, 'P2X370', 2, '5', '20000'),
(11, 'T3KL3W', 4, '1', '120000'),
(12, 'T3KL3W', 2, '1', '20000'),
(13, 'T3KL3W', 1, '1', '15000'),
(16, 'N0YGGA', 1, '1', '15000'),
(17, 'N0YGGA', 2, '1', '20000'),
(18, '45K9QG', 1, '1', '15000'),
(19, '45K9QG', 2, '1', '20000'),
(20, '45K9QG', 3, '1', '130000'),
(21, '45K9QG', 4, '1', '120000'),
(22, '5QQ1Z1', 1, '1', '15000'),
(23, '5QQ1Z1', 2, '6', '20000'),
(24, '88JV83', 2, '1', '20000'),
(25, '88JV83', 1, '1', '15000'),
(26, '2TCOVC', 1, '1', '15000'),
(27, '2TCOVC', 3, '1', '130000'),
(28, '2TCOVC', 2, '1', '20000'),
(29, 'IFQYNU', 4, '1', '120000'),
(30, 'IFQYNU', 3, '1', '130000'),
(31, 'IFQYNU', 2, '1', '20000'),
(32, 'QMDQA7', 4, '1', '120000'),
(33, 'QMDQA7', 3, '1', '130000'),
(34, 'QMDQA7', 1, '1', '15000'),
(38, 'G1WPLE', 1, '1', '15000'),
(39, 'G1WPLE', 2, '1', '20000'),
(40, 'G1WPLE', 3, '5', '130000'),
(41, '8V9WY1', 1, '1', '15000'),
(42, '8V9WY1', 2, '1', '20000'),
(43, 'AW0Y9Q', 4, '2', '120000'),
(44, 'AW0Y9Q', 2, '3', '20000'),
(45, 'OEPK9T', 1, '1', '15000'),
(46, 'OEPK9T', 2, '1', '20000'),
(47, 'OEPK9T', 3, '1', '130000'),
(48, 'OEPK9T', 4, '1', '120000'),
(49, '1SGDGU', 1, '1', '15000'),
(50, '1SGDGU', 2, '1', '20000'),
(51, '1EY6EK', 1, '1', '15000'),
(52, '1EY6EK', 2, '1', '20000'),
(53, '1EY6EK', 3, '1', '130000'),
(54, 'UDKPNP', 1, '1', '15000'),
(55, 'UDKPNP', 2, '1', '20000'),
(56, '44OMJT', 1, '4', '15000'),
(57, '44OMJT', 2, '6', '20000'),
(58, '3OYW9L', 1, '1', '15000'),
(59, '3OYW9L', 2, '1', '120000'),
(60, '3OYW9L', 3, '1', '13000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `nip` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101616301;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
