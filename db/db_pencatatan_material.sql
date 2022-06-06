-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 01:14 PM
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
-- Database: `db_pencatatan_material`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `kode_item` varchar(20) NOT NULL,
  `tgl_keluar` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `penerima` varchar(200) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`id_barang_keluar`, `id_item`, `kode_item`, `tgl_keluar`, `jumlah`, `keterangan`, `penerima`, `id_pegawai`, `approval`) VALUES
(2, 1, 'tes123', '2022-04-03 01:03:00', 6, 'tes keterangan', 'PT. XYZ', 1, 1),
(4, 2, 'teslagi123', '2022-04-03 16:16:53', 5, 'tes aja', 'satapam', 1, 1),
(5, 1, 'tes123', '2022-06-06 20:13:25', 4, '-', 'tes', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `id_item` int(11) DEFAULT NULL,
  `kode_item` varchar(20) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id_barang_masuk`, `id_item`, `kode_item`, `tgl_masuk`, `jumlah`, `id_pegawai`, `keterangan`, `approval`) VALUES
(4, 1, 'tes123', '2022-04-02 22:58:45', 10, 1, 'tes keterangann', 1),
(5, 2, 'teslagi123', '2022-04-03 16:14:27', 10, 1, 'PT. Angin Ribut', 1),
(6, 1, 'tes123', '2022-06-06 19:09:41', 10, 4, 'tes', 1),
(7, 1, 'tes123', '2022-06-06 20:13:10', 10, 4, 'tes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_item`
--

CREATE TABLE `tb_item` (
  `id_item` int(11) NOT NULL,
  `kode_item` varchar(20) NOT NULL,
  `nama_item` varchar(200) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_item`
--

INSERT INTO `tb_item` (`id_item`, `kode_item`, `nama_item`, `id_kategori`, `lokasi`, `stok`) VALUES
(1, 'tes123', 'tes', 2, 'tes', 30),
(2, 'teslagi123', 'testes', 2, 'tesss', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'kategori1'),
(3, 'kategori2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_maintenance`
--

CREATE TABLE `tb_maintenance` (
  `id_maintenance` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `kode_item` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_maintenance`
--

INSERT INTO `tb_maintenance` (`id_maintenance`, `id_item`, `kode_item`, `tanggal`, `keterangan`, `id_pegawai`, `status`) VALUES
(2, 1, 'tes123', '2022-05-26 19:26:10', 'rusak parah', 4, 1),
(3, 1, 'tes123', '2022-06-03 17:16:02', 'tes', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `foto` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nip`, `nama`, `jabatan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `foto`, `username`, `password`, `akses`) VALUES
(1, '12345', 'admin', 'Administrator', 'subang', '2022-03-01', 'Laki-laki', 'user.png', 'admin', '$2y$10$5VifqomOAsoe39zJDc/GJefzvAwOmvdqMbDeNjocX0piQd5KDOKbS', 'admin'),
(4, 'tess', 'tess', 'tess', 'tess', '2022-12-31', 'Laki-laki', 'pemandangan-alam-matahari.jpg', 'pegawai', '$2y$10$UnNPKGc./ULEyCbaojSuxe87EI30/muH1yCXfCbB41iQIl08R0AQ.', 'pegawai'),
(5, '12341', 'Teknisi', 'Teknisi', 'Bandung', '2022-12-31', 'Perempuan', '2019-09-04.jpg', 'teknisi', '$2y$10$iSZS7AfmWmjJkSyGE.9kAeiQJetVuWkx3lLQByvLI1umgDOLQsCNK', 'teknisi'),
(6, '1234', 'Manager', 'Manager', 'Jakarta', '2022-12-31', 'Laki-laki', 'aj_(2).jpeg', 'manager', '$2y$10$n5DPtIIkHXkW4HEH/IyJkuYs6/GRq0UxoBE6mzvNWR7EpfDy5NFWa', 'manager'),
(7, '12334432', 'Pegawai Outsourcing', 'Pegawai Outsourcing', 'Bandun', '2022-12-31', 'Perempuan', 'aj_(2)1.jpeg', 'outsourcing', '$2y$10$di80tBV/NZNrpKV5OVuqdugX2z2/OoOjErDorUCQHhO9dY/PC0Yb2', 'outsourcing');

-- --------------------------------------------------------

--
-- Table structure for table `tb_permintaan_barang`
--

CREATE TABLE `tb_permintaan_barang` (
  `id_permintaan_barang` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `kode_item` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_permintaan_barang`
--

INSERT INTO `tb_permintaan_barang` (`id_permintaan_barang`, `id_item`, `kode_item`, `tanggal`, `jumlah`, `keterangan`, `id_pegawai`, `status`) VALUES
(1, 1, 'tes123', '2022-06-06 17:32:14', 5, 'tes', 7, 1),
(2, 1, 'tes123', '2022-06-06 17:39:19', 11, 'tes', 7, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indexes for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `tb_item`
--
ALTER TABLE `tb_item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_maintenance`
--
ALTER TABLE `tb_maintenance`
  ADD PRIMARY KEY (`id_maintenance`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_permintaan_barang`
--
ALTER TABLE `tb_permintaan_barang`
  ADD PRIMARY KEY (`id_permintaan_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_item`
--
ALTER TABLE `tb_item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_maintenance`
--
ALTER TABLE `tb_maintenance`
  MODIFY `id_maintenance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_permintaan_barang`
--
ALTER TABLE `tb_permintaan_barang`
  MODIFY `id_permintaan_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
