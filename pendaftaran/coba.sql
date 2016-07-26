-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2016 at 06:20 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coba`
--

-- --------------------------------------------------------

--
-- Table structure for table `kampus`
--

CREATE TABLE `tbl_data` (
  `nik` int(10) NOT NULL,
  `nama` text NOT NULL,
  `ttl` varchar(25) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `agama` text NOT NULL,
  `goldar` varchar(10) NOT NULL,
  `status` enum('nikah','belum_menikah') NOT NULL,
  `pekerjaan` enum('PNS','Mahasiswa','Wirasuwasta','lain-lain') NOT NULL,
  `kewarganegaraan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kampus`
--

INSERT INTO `kampus` (`nik`, `idm`, `nama`, `ttl`, `jk`, `alamat`, `agama`, `goldar`, `status`, `pekerjaan`, `kewarganegaraan`) VALUES
(1, 0x313233, 'Fauzi', 'Bekasi, 31 Juli 1990', 'laki-laki', 'bekasi', 'islam', 'O', 'belum_menikah', 'PNS', 'Asing'),
(2, '', 'yogi', 'Jakarta 01 Juni 2010', 'laki-laki', 'Jakarta Pusat', 'Islam', 'AB', 'belum_menikah', 'Mahasiswa', 'Indonesia'),
(3, 0x36353735363735, 'Siti', 'Bogor 22 Mei 2011', 'perempuan', 'Bogor', 'Islam', 'O+', 'belum_menikah', '', 'Indonesia'),
(4, 0x363534, 'Dian', 'Bogor 22 Mei 1998', 'perempuan', 'Bogor', 'Islam', 'O+', 'belum_menikah', 'Mahasiswa', 'Indonesia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kampus`
--
ALTER TABLE `tbl_data`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kampus`
--
ALTER TABLE `kampus`
  MODIFY `nik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
