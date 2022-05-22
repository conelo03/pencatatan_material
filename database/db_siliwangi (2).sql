-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2021 at 06:49 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siliwangi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_bolu` varchar(200) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_jual_reseller_cash` int(11) NOT NULL,
  `harga_jual_reseller_tempo` int(11) NOT NULL,
  `harga_jual_go_food` int(11) NOT NULL,
  `harga_jual_grab_food` int(11) NOT NULL,
  `harga_jual_shopee_food` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_bolu`, `stok`, `harga_beli`, `harga_jual`, `harga_jual_reseller_cash`, `harga_jual_reseller_tempo`, `harga_jual_go_food`, `harga_jual_grab_food`, `harga_jual_shopee_food`, `diskon`, `ppn`, `keterangan`) VALUES
(2, 'Black Forest', 30, 29000, 35000, 32000, 35000, 0, 0, 0, 0, 0, '-'),
(3, 'Red Velvet', 4, 29000, 35000, 32000, 35000, 0, 0, 0, 0, 0, '-'),
(4, 'Alpukat Mentega', 1, 26000, 33000, 30000, 35000, 0, 0, 0, 0, 0, '-'),
(5, 'Brownies Coklat', 6, 26000, 33000, 30000, 35000, 0, 0, 0, 0, 0, '-'),
(6, 'Durian Montong', 0, 29000, 35000, 32000, 35000, 0, 0, 0, 0, 0, '-'),
(7, 'Strowbery Ciwidey', 4, 26000, 33000, 30000, 35000, 0, 0, 0, 0, 0, '-'),
(8, 'Bureo Coklat', 4, 29000, 35000, 32000, 35000, 0, 0, 0, 0, 0, '-'),
(9, 'Susu Lembang', 5, 26000, 33000, 30000, 35000, 0, 0, 0, 0, 0, '-'),
(10, 'Kopi Bogor', 7, 26000, 33000, 30000, 35000, 0, 0, 0, 0, 0, '-'),
(11, 'Susu Vanila', 3, 29000, 35000, 32000, 35000, 0, 0, 0, 0, 0, '-'),
(12, 'Ketan Kelapa', 3, 26000, 33000, 30000, 35000, 0, 0, 0, 0, 0, '-'),
(13, 'Pandan Wangi', 5, 26000, 33000, 30000, 35000, 0, 0, 0, 0, 0, '-'),
(14, 'Blackcurrrant Ori (S)', 4, 13000, 15000, 0, 0, 0, 0, 0, 0, 0, '-'),
(15, 'Brownies Keju (L)', 1, 31000, 35000, 0, 0, 0, 0, 0, 0, 0, '-'),
(16, 'Alpukat Keju (L)', 0, 31000, 35000, 0, 0, 0, 0, 0, 0, 0, '-'),
(17, 'Blackcurrant Ori (L)', 0, 31000, 35000, 0, 0, 0, 0, 0, 0, 0, '-'),
(18, 'Brownies Keju (S)', 1, 13000, 15000, 0, 0, 0, 0, 0, 0, 0, '-'),
(19, 'Pisang Kepok', 2, 29000, 35000, 32000, 35000, 0, 0, 0, 0, 0, '-'),
(20, 'Kacang Ijo', 10, 26000, 33000, 32000, 35000, 0, 0, 0, 0, 0, '-'),
(21, 'Talas Bogor', 3, 26000, 33000, 30000, 35000, 0, 0, 0, 0, 0, '-'),
(22, 'Kantong Plastik (3)', 100, 800, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(23, 'Kantong Plastik (6)', 20, 1000, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(24, 'Peuyeum Bandung', 8, 26000, 33000, 31000, 35000, 0, 0, 0, 0, 0, '-');

-- --------------------------------------------------------

--
-- Table structure for table `barang_backup`
--

CREATE TABLE `barang_backup` (
  `id_backup` int(11) NOT NULL,
  `id_barang_keluar` int(11) NOT NULL,
  `id_barang_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `merk_hp` varchar(100) NOT NULL,
  `tipe_hp` varchar(100) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `tanggal`, `id_barang`, `jumlah`, `keterangan`) VALUES
(1, '2021-09-15', 1, 3, '-'),
(2, '2021-09-16', 6, 18, '-'),
(3, '2021-09-16', 7, 12, '-'),
(4, '2021-09-16', 4, 20, '-'),
(5, '2021-09-16', 13, 6, '-'),
(6, '2021-09-16', 2, 20, '-'),
(7, '2021-09-16', 3, 20, '-'),
(8, '2021-09-16', 5, 20, '-'),
(9, '2021-09-16', 8, 10, '-'),
(10, '2021-09-16', 9, 13, '-'),
(11, '2021-09-16', 10, 7, '-'),
(12, '2021-09-16', 11, 7, '-'),
(13, '2021-09-16', 12, 6, '-'),
(14, '2021-09-16', 14, 5, '-'),
(15, '2021-09-16', 15, 2, '-'),
(17, '2021-09-16', 16, 1, '-'),
(18, '2021-09-16', 18, 2, '-'),
(19, '2021-09-17', 21, 5, '-'),
(20, '2021-09-18', 2, 45, '-'),
(21, '2021-09-18', 7, 5, '-'),
(22, '2021-09-18', 6, 10, '-'),
(23, '2021-09-18', 4, 5, '-'),
(24, '2021-09-18', 3, 5, '-'),
(25, '2021-09-18', 23, 20, '-'),
(26, '2021-09-18', 22, 100, '-'),
(27, '2021-09-19', 20, 10, '-'),
(28, '2021-09-19', 24, 8, '-');

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE `cash` (
  `id_cash` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `pemasukan` int(11) DEFAULT NULL,
  `pengeluaran` int(11) DEFAULT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash`
--

INSERT INTO `cash` (`id_cash`, `tanggal`, `keterangan`, `pemasukan`, `pengeluaran`, `catatan`) VALUES
(1, '2021-09-16', 'Uang Kasir', 750000, NULL, 'Cash'),
(2, '2021-09-16', 'Beli Durian Montong sebanyak 3', NULL, 87000, '-'),
(3, '2021-09-16', 'Beli Strowbery Ciwidey sebanyak 2', NULL, 52000, '-'),
(4, '2021-09-16', 'Penjualan Bolu || T-210916-1', 68000, NULL, '-'),
(5, '2021-09-16', 'Beli Alpukat Mentega sebanyak 2', NULL, 52000, '-'),
(6, '2021-09-16', 'Penjualan Bolu || T-210916-2', 68000, NULL, '-'),
(7, '2021-09-16', 'Beli Pandan Wangi sebanyak 6', NULL, 156000, '-'),
(8, '2021-09-16', 'Beli Black Forest sebanyak 20', NULL, 580000, '-'),
(9, '2021-09-16', 'Beli Red Velvet sebanyak 20', NULL, 580000, '-'),
(10, '2021-09-16', 'Beli Brownies Coklat sebanyak 20', NULL, 520000, '-'),
(11, '2021-09-16', 'Beli Bureo Coklat sebanyak 10', NULL, 290000, '-'),
(12, '2021-09-16', 'Beli Susu Lembang sebanyak 13', NULL, 338000, '-'),
(13, '2021-09-16', 'Beli Kopi Bogor sebanyak 7', NULL, 182000, '-'),
(14, '2021-09-16', 'Beli Susu Vanila sebanyak 8', NULL, 232000, '-'),
(15, '2021-09-16', 'Beli Ketan Kelapa sebanyak 6', NULL, 156000, '-'),
(16, '2021-09-16', 'Beli Blackcurrrant Ori (S) sebanyak 5', NULL, 65000, '-'),
(17, '2021-09-16', 'Beli Brownies Keju (L) sebanyak 2', NULL, 62000, '-'),
(18, '2021-09-16', 'Beli Brownies Keju (L) sebanyak 2', NULL, 62000, '-'),
(19, '2021-09-16', 'Beli Alpukat Keju (L) sebanyak 1', NULL, 31000, '-'),
(20, '2021-09-16', 'Beli Brownies Keju (S) sebanyak 2', NULL, 26000, '-'),
(21, '2021-09-16', 'Penjualan Bolu || T-210916-3', 70000, NULL, '-'),
(22, '2021-09-16', 'Penjualan Bolu || T-210916-4', 68000, NULL, '-'),
(23, '2021-09-16', 'Penjualan Bolu || T-210916-5', 525000, NULL, '-'),
(24, '2021-09-16', 'Penjualan Bolu || T-210916-6', 68000, NULL, '-'),
(25, '2021-09-16', 'Penjualan Bolu || T-210916-7', 70000, NULL, '-'),
(26, '2021-09-16', 'Penjualan Bolu || T-210916-8', 173000, NULL, '-'),
(27, '2021-09-16', 'Penjualan Bolu || T-210916-9', 70000, NULL, '-'),
(28, '2021-09-16', 'Penjualan Bolu || T-210916-1', 68000, NULL, '-'),
(43, '2021-09-16', 'Penjualan Bolu || T-210916-10', 68000, NULL, '-'),
(45, '2021-09-16', 'Penjualan Bolu || T-210916-11', 68000, NULL, '-'),
(46, '2021-09-17', 'Beli Talas Bogor sebanyak 6', NULL, 156000, '-'),
(47, '2021-09-17', 'Penjualan Bolu || T-210917-1', 33000, NULL, '-'),
(48, '2021-09-17', 'Penjualan Bolu || T-210917-2', 372000, NULL, '-'),
(49, '2021-09-17', 'Penjualan Bolu || T-210917-3', 244000, NULL, '-'),
(50, '2021-09-17', 'Penjualan Bolu || T-210917-4', 68000, NULL, '-'),
(51, '2021-09-17', 'Penjualan Bolu || T-210917-5', 33000, NULL, '-'),
(52, '2021-09-17', 'Penjualan Bolu || T-210917-6', 35000, NULL, '-'),
(53, '2021-09-17', 'Penjualan Bolu || T-210917-7', 66000, NULL, '-'),
(54, '2021-09-17', 'Penjualan Bolu || T-210917-8', 68000, NULL, '-'),
(55, '2021-09-17', 'Penjualan Bolu || T-210917-9', 33000, NULL, '-'),
(56, '2021-09-17', 'Penjualan Bolu || T-210917-10', 105000, NULL, '-'),
(57, '2021-09-17', 'Penjualan Bolu || T-210917-11', 70000, NULL, '-'),
(58, '2021-09-17', 'Penjualan Bolu || T-210917-12', 30000, NULL, '-'),
(59, '2021-09-17', 'Penjualan Bolu || T-210917-13', 68000, NULL, '-'),
(60, '2021-09-18', 'Beli Black Forest sebanyak 45', NULL, 1305000, '-'),
(61, '2021-09-18', 'Penjualan Bolu || T-210918-1', 103000, NULL, '-'),
(62, '2021-09-18', 'Beli Strowbery Ciwidey sebanyak 5', NULL, 130000, '-'),
(63, '2021-09-18', 'Beli Durian Montong sebanyak 10', NULL, 290000, '-'),
(64, '2021-09-18', 'Beli Alpukat Mentega sebanyak 5', NULL, 130000, '-'),
(65, '2021-09-18', 'Beli Red Velvet sebanyak 5', NULL, 145000, '-'),
(66, '2021-09-18', 'Beli Kantong Plastik (6) sebanyak 20', NULL, 40000, '-'),
(67, '2021-09-18', 'Beli Kantong Plastik (3) sebanyak 100', NULL, 80000, '-'),
(68, '2021-09-18', 'Penjualan Bolu || T-210918-2', 33250, NULL, '-'),
(69, '2021-09-18', 'Penjualan Bolu || T-210918-3', 70000, NULL, '-'),
(70, '2021-09-18', 'Penjualan Bolu || T-210918-4', 101350, NULL, '-'),
(71, '2021-09-18', 'Penjualan Bolu || T-210918-5', 101250, NULL, '-'),
(72, '2021-09-18', 'Penjualan Bolu || T-210918-6', 66000, NULL, '-'),
(73, '2021-09-19', 'Penjualan Bolu || T-210919-1', 68250, NULL, '-'),
(74, '2021-09-19', 'Penjualan Bolu || T-210919-2', 33000, NULL, '-'),
(75, '2021-09-19', 'Penjualan Bolu || T-210919-3', 50000, NULL, '-'),
(76, '2021-09-19', 'Penjualan Bolu || T-210919-4', 15000, NULL, '-'),
(77, '2021-09-19', 'Penjualan Bolu || T-210919-5', 35000, NULL, '-'),
(78, '2021-09-19', 'Penjualan Bolu || T-210919-6', 101250, NULL, '-'),
(79, '2021-09-19', 'Beli Kacang Ijo sebanyak 10', NULL, 260000, '-'),
(80, '2021-09-19', 'Beli Peuyeum Bandung sebanyak 8', NULL, 208000, '-'),
(81, '2021-09-19', 'Penjualan Bolu || T-210919-7', 97700, NULL, '-'),
(84, '2021-09-19', 'Penjualan Bolu || T-210919-8', 548320, NULL, '-'),
(86, '2021-09-19', 'Penjualan Bolu || T-210919-9', 105000, NULL, '-'),
(87, '2021-09-19', 'Penjualan Bolu || T-210919-10', 70000, NULL, '-'),
(88, '2021-09-20', 'Penjualan Bolu || T-210920-1', 35000, NULL, '-'),
(89, '2021-09-20', 'Penjualan Bolu || T-210920-2', 99000, NULL, '-'),
(90, '2021-09-20', 'Penjualan Bolu || T-210920-3', 70000, NULL, '-'),
(91, '2021-09-20', 'Penjualan Bolu || T-210920-4', 140000, NULL, '-'),
(93, '2021-09-20', 'Penjualan Bolu || T-210920-5', 35000, NULL, '-'),
(94, '2021-09-20', 'Penjualan Bolu || T-210920-6', 33000, NULL, '-'),
(95, '2021-09-20', 'Penjualan Bolu || T-210920-7', 35000, NULL, '-'),
(96, '2021-09-20', 'Setor omset penjualan ke bank', 3577000, NULL, '-'),
(97, '2021-09-20', 'Penjualan Bolu || T-210920-8', 68000, NULL, '-');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `harga_total` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tanggal`, `harga_total`, `keterangan`) VALUES
('T-210916-1', '2021-09-16', 68000, 'Harga Jual Toko'),
('T-210916-10', '2021-09-16', 68000, 'Harga Jual Toko'),
('T-210916-11', '2021-09-16', 68000, 'Harga Jual Toko'),
('T-210916-2', '2021-09-16', 68000, 'Harga Jual Toko'),
('T-210916-3', '2021-09-16', 70000, 'Harga Jual Toko'),
('T-210916-4', '2021-09-16', 68000, 'Harga Jual Toko'),
('T-210916-5', '2021-09-16', 525000, 'Harga Reseller Tempo'),
('T-210916-6', '2021-09-16', 68000, 'Harga Jual Toko'),
('T-210916-7', '2021-09-16', 70000, 'Harga Jual Toko'),
('T-210916-8', '2021-09-16', 173000, 'Harga Jual Toko'),
('T-210916-9', '2021-09-16', 70000, 'Harga Jual Toko'),
('T-210917-1', '2021-09-17', 33000, 'Harga Jual Toko'),
('T-210917-10', '2021-09-17', 105000, 'Harga Jual Toko'),
('T-210917-11', '2021-09-17', 70000, 'Harga Jual Toko'),
('T-210917-12', '2021-09-17', 30000, 'Harga Reseller Cash'),
('T-210917-13', '2021-09-17', 68000, 'Harga Jual Toko'),
('T-210917-2', '2021-09-17', 372000, 'Harga Reseller Cash'),
('T-210917-3', '2021-09-17', 244000, 'Harga Reseller Cash'),
('T-210917-4', '2021-09-17', 68000, 'Harga Jual Toko'),
('T-210917-5', '2021-09-17', 33000, 'Harga Jual Toko'),
('T-210917-6', '2021-09-17', 35000, 'Harga Jual Toko'),
('T-210917-7', '2021-09-17', 66000, 'Harga Jual Toko'),
('T-210917-8', '2021-09-17', 68000, 'Harga Jual Toko'),
('T-210917-9', '2021-09-17', 33000, 'Harga Jual Toko'),
('T-210918-1', '2021-09-18', 103000, 'Harga Jual Toko'),
('T-210918-2', '2021-09-18', 33250, 'Harga Jual Toko'),
('T-210918-3', '2021-09-18', 70000, 'Harga Jual Toko'),
('T-210918-4', '2021-09-18', 101350, 'Harga Jual Toko'),
('T-210918-5', '2021-09-18', 101250, 'Harga Jual Toko'),
('T-210918-6', '2021-09-18', 66000, 'Harga Jual Toko'),
('T-210919-1', '2021-09-19', 68250, 'Harga Jual Toko'),
('T-210919-10', '2021-09-19', 70000, 'Harga Jual Toko'),
('T-210919-2', '2021-09-19', 33000, 'Harga Jual Toko'),
('T-210919-3', '2021-09-19', 50000, 'Harga Jual Toko'),
('T-210919-4', '2021-09-19', 15000, 'Harga Jual Toko'),
('T-210919-5', '2021-09-19', 35000, 'Harga Jual Toko'),
('T-210919-6', '2021-09-19', 101250, 'Harga Jual Toko'),
('T-210919-7', '2021-09-19', 97700, 'Harga Jual Toko'),
('T-210919-8', '2021-09-19', 548320, 'Harga Reseller Cash'),
('T-210919-9', '2021-09-19', 105000, 'Harga Jual Toko'),
('T-210920-1', '2021-09-20', 35000, 'Harga Jual Toko'),
('T-210920-2', '2021-09-20', 99000, 'Harga Jual Toko'),
('T-210920-3', '2021-09-20', 70000, 'Harga Jual Toko'),
('T-210920-4', '2021-09-20', 140000, 'Harga Jual Toko'),
('T-210920-5', '2021-09-20', 35000, 'Harga Jual Toko'),
('T-210920-6', '2021-09-20', 33000, 'Harga Jual Toko'),
('T-210920-7', '2021-09-20', 35000, 'Harga Jual Toko'),
('T-210920-8', '2021-09-20', 68000, 'Harga Jual Toko');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_penjualan_detail` int(11) NOT NULL,
  `id_penjualan` varchar(50) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `exp` date DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `harga_subtotal` int(11) NOT NULL,
  `sisa_stok` int(11) DEFAULT NULL,
  `ket_diskon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_penjualan_detail`, `id_penjualan`, `id_barang`, `exp`, `jumlah`, `harga_beli`, `harga_jual`, `diskon`, `harga_subtotal`, `sisa_stok`, `ket_diskon`) VALUES
(1, 'T-210916-1', 7, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(2, 'T-210916-1', 6, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(3, 'T-210916-2', 4, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(4, 'T-210916-2', 2, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(5, 'T-210916-3', 3, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(6, 'T-210916-3', 11, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(7, 'T-210916-4', 8, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(8, 'T-210916-4', 7, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(9, 'T-210916-5', 2, NULL, 10, 29000, 35000, 0, 350000, NULL, NULL),
(10, 'T-210916-5', 5, NULL, 4, 26000, 35000, 0, 140000, NULL, NULL),
(11, 'T-210916-5', 12, NULL, 1, 26000, 35000, 0, 35000, NULL, NULL),
(12, 'T-210916-6', 2, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(13, 'T-210916-6', 4, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(14, 'T-210916-7', 2, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(15, 'T-210916-7', 3, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(17, 'T-210916-8', 6, NULL, 2, 29000, 35000, 0, 70000, NULL, NULL),
(18, 'T-210916-8', 4, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(19, 'T-210916-9', 2, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(20, 'T-210916-9', 6, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(50, 'T-210916-10', 2, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(51, 'T-210916-10', 4, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(53, 'T-210916-11', 4, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(54, 'T-210916-11', 2, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(55, 'T-210917-1', 21, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(56, 'T-210917-2', 3, NULL, 1, 29000, 32000, 0, 32000, NULL, NULL),
(57, 'T-210917-2', 2, NULL, 3, 29000, 32000, 0, 96000, NULL, NULL),
(58, 'T-210917-2', 4, NULL, 1, 26000, 30000, 0, 30000, NULL, NULL),
(59, 'T-210917-2', 6, NULL, 2, 29000, 32000, 0, 64000, NULL, NULL),
(60, 'T-210917-2', 5, NULL, 3, 26000, 30000, 0, 90000, NULL, NULL),
(61, 'T-210917-2', 12, NULL, 1, 26000, 30000, 0, 30000, NULL, NULL),
(62, 'T-210917-2', 7, NULL, 1, 26000, 30000, 0, 30000, NULL, NULL),
(63, 'T-210917-3', 4, NULL, 2, 26000, 30000, 0, 60000, NULL, NULL),
(64, 'T-210917-3', 21, NULL, 1, 26000, 30000, 0, 30000, NULL, NULL),
(65, 'T-210917-3', 9, NULL, 1, 26000, 30000, 0, 30000, NULL, NULL),
(66, 'T-210917-3', 5, NULL, 2, 26000, 30000, 0, 60000, NULL, NULL),
(67, 'T-210917-3', 3, NULL, 1, 29000, 32000, 0, 32000, NULL, NULL),
(68, 'T-210917-3', 6, NULL, 1, 29000, 32000, 0, 32000, NULL, NULL),
(69, 'T-210917-4', 4, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(70, 'T-210917-4', 6, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(71, 'T-210917-5', 5, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(72, 'T-210917-6', 6, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(73, 'T-210917-7', 4, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(74, 'T-210917-7', 7, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(75, 'T-210917-8', 9, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(76, 'T-210917-8', 8, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(77, 'T-210917-9', 4, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(78, 'T-210917-10', 6, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(79, 'T-210917-10', 3, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(80, 'T-210917-10', 8, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(81, 'T-210917-11', 16, NULL, 1, 31000, 35000, 0, 35000, NULL, NULL),
(82, 'T-210917-11', 6, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(83, 'T-210917-12', 4, NULL, 1, 26000, 30000, 0, 30000, NULL, NULL),
(84, 'T-210917-13', 7, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(85, 'T-210917-13', 3, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(86, 'T-210918-1', 2, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(87, 'T-210918-1', 6, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(88, 'T-210918-1', 12, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(89, 'T-210918-2', 8, NULL, 1, 29000, 35000, 1750, 33250, NULL, NULL),
(90, 'T-210918-3', 6, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(91, 'T-210918-3', 2, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(92, 'T-210918-4', 6, NULL, 2, 29000, 35000, 0, 70000, NULL, NULL),
(93, 'T-210918-4', 4, NULL, 1, 26000, 33000, 1650, 31350, NULL, NULL),
(94, 'T-210918-5', 13, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(95, 'T-210918-5', 15, NULL, 1, 31000, 35000, 0, 35000, NULL, NULL),
(96, 'T-210918-5', 11, NULL, 1, 29000, 35000, 1750, 33250, NULL, NULL),
(97, 'T-210918-6', 5, NULL, 2, 26000, 33000, 0, 66000, NULL, NULL),
(98, 'T-210919-1', 6, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(99, 'T-210919-1', 3, NULL, 1, 29000, 35000, 1750, 33250, NULL, NULL),
(100, 'T-210919-2', 5, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(101, 'T-210919-3', 2, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(102, 'T-210919-3', 14, NULL, 1, 13000, 15000, 0, 15000, NULL, NULL),
(103, 'T-210919-4', 18, NULL, 1, 13000, 15000, 0, 15000, NULL, NULL),
(104, 'T-210919-5', 2, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(105, 'T-210919-6', 3, NULL, 1, 29000, 35000, 1750, 33250, NULL, NULL),
(106, 'T-210919-6', 2, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(107, 'T-210919-6', 5, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(108, 'T-210919-7', 2, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(109, 'T-210919-7', 4, NULL, 2, 26000, 33000, 3300, 62700, NULL, NULL),
(120, 'T-210919-8', 3, NULL, 9, 29000, 32000, 23040, 264960, NULL, NULL),
(121, 'T-210919-8', 11, NULL, 2, 29000, 32000, 5120, 58880, NULL, NULL),
(122, 'T-210919-8', 8, NULL, 2, 29000, 32000, 5120, 58880, NULL, NULL),
(123, 'T-210919-8', 7, NULL, 4, 26000, 30000, 9600, 110400, NULL, NULL),
(124, 'T-210919-8', 4, NULL, 2, 26000, 30000, 4800, 55200, NULL, NULL),
(128, 'T-210919-9', 6, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(129, 'T-210919-9', 3, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(130, 'T-210919-9', 2, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(131, 'T-210919-10', 6, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(132, 'T-210919-10', 2, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(133, 'T-210920-1', 2, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(134, 'T-210920-2', 4, NULL, 3, 26000, 33000, 0, 99000, NULL, NULL),
(135, 'T-210920-3', 6, NULL, 2, 29000, 35000, 0, 70000, NULL, NULL),
(136, 'T-210916-8', 2, NULL, 2, 29000, 35000, 0, 70000, NULL, NULL),
(137, 'T-210920-4', 2, NULL, 2, 29000, 35000, 0, 70000, NULL, NULL),
(138, 'T-210920-4', 6, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(139, 'T-210920-4', 6, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(142, 'T-210920-5', 2, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(143, 'T-210920-6', 4, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL),
(144, 'T-210920-7', 6, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(145, 'T-210920-8', 6, NULL, 1, 29000, 35000, 0, 35000, NULL, NULL),
(146, 'T-210920-8', 7, NULL, 1, 26000, 33000, 0, 33000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `no_hp`, `role`) VALUES
(1, 'admin', '$2y$10$5VifqomOAsoe39zJDc/GJefzvAwOmvdqMbDeNjocX0piQd5KDOKbS', 'Satria Prawira Yudanta', 'tokoberkahsiliwangi@gmail.com', '081322394509', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_backup`
--
ALTER TABLE `barang_backup`
  ADD PRIMARY KEY (`id_backup`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id_cash`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id_penjualan_detail`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `barang_backup`
--
ALTER TABLE `barang_backup`
  MODIFY `id_backup` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cash`
--
ALTER TABLE `cash`
  MODIFY `id_cash` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id_penjualan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
