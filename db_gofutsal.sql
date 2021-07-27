-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 12:02 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gofutsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tlapangan`
--

CREATE TABLE `tlapangan` (
  `id_lapangan` int(10) NOT NULL,
  `nama_lapangan` varchar(255) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tlapangan`
--

INSERT INTO `tlapangan` (`id_lapangan`, `nama_lapangan`, `harga`) VALUES
(1, 'Lapangan Timur', '100.000'),
(2, 'Lapangan Barat', '75.000');

-- --------------------------------------------------------

--
-- Table structure for table `tpemesanan`
--

CREATE TABLE `tpemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(11) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `status` varchar(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id_user`, `nama`, `email`, `no_hp`, `username`, `password`, `hak_akses`, `gambar`) VALUES
(1, 'rendi', '', '', 'admin', 'admin', 'admin', 'avatar04.png'),
(2, 'kadir', 'kadir@gmail.com', '98732', 'kadir', 'kadir', 'pelanggan', 'avatar5.png'),
(3, 'fais', 'fais@gmail.com', '0887769', 'fais', 'fais', 'pelanggan', 'avatar5.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tlapangan`
--
ALTER TABLE `tlapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- Indexes for table `tpemesanan`
--
ALTER TABLE `tpemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `id_lapangan` (`id_lapangan`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tlapangan`
--
ALTER TABLE `tlapangan`
  MODIFY `id_lapangan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tpemesanan`
--
ALTER TABLE `tpemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
