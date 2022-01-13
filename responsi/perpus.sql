-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2017 at 02:25 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tgr_admin`
--

CREATE TABLE IF NOT EXISTS `tgr_admin` (
  `nama` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tgr_admin`
--

INSERT INTO `tgr_admin` (`nama`, `password`) VALUES
('tegar', '1d31802d64bae29d88923d795fc73734');

-- --------------------------------------------------------

--
-- Table structure for table `tgr_buku`
--

CREATE TABLE IF NOT EXISTS `tgr_buku` (
  `no` varchar(225) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` int(10) NOT NULL,
  `asal` varchar(200) NOT NULL,
  `klasifikasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tgr_buku_tamu`
--

CREATE TABLE IF NOT EXISTS `tgr_buku_tamu` (
`id` bigint(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `keperluan` varchar(200) NOT NULL,
  `tanggal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tgr_peminjaman`
--

CREATE TABLE IF NOT EXISTS `tgr_peminjaman` (
`id` int(225) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `no_buku` varchar(20) NOT NULL,
  `tanggal_pinjam` varchar(50) NOT NULL,
  `tanggal_kembali` varchar(50) NOT NULL,
  `kembali` varchar(50) NOT NULL,
  `status` int(5) NOT NULL,
  `l` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tgr_admin`
--
ALTER TABLE `tgr_admin`
 ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `tgr_buku`
--
ALTER TABLE `tgr_buku`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tgr_buku_tamu`
--
ALTER TABLE `tgr_buku_tamu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tgr_peminjaman`
--
ALTER TABLE `tgr_peminjaman`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tgr_buku_tamu`
--
ALTER TABLE `tgr_buku_tamu`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tgr_peminjaman`
--
ALTER TABLE `tgr_peminjaman`
MODIFY `id` int(225) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
