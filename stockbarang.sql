-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2025 at 11:17 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockbarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `hargasatuan` decimal(10,0) NOT NULL,
  `totalharga` decimal(10,0) NOT NULL,
  `nomorbuk` varchar(50) NOT NULL,
  `nomosu` varchar(50) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `tanggalpe` varchar(50) NOT NULL,
  `nomoru` varchar(50) NOT NULL,
  `tanggalpeng` varchar(50) NOT NULL,
  `tanggalsu` varchar(50) NOT NULL,
  `tanggalnye` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`idkeluar`, `idbarang`, `tanggal`, `penerima`, `qty`, `satuan`, `hargasatuan`, `totalharga`, `nomorbuk`, `nomosu`, `ket`, `tanggalpe`, `nomoru`, `tanggalpeng`, `tanggalsu`, `tanggalnye`) VALUES
(1, 8, '0000-00-00', 'Bidang Sekertariat', 5, '', '0', '0', '', '', '', '', '', '', '', ''),
(3, 9, '0000-00-00', 'Bidang Sekertariat', 5, '', '0', '0', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin123'),
(15, 'arya@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `dari` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `hargasatuan` decimal(10,0) NOT NULL,
  `totalharga` int(11) NOT NULL,
  `jenissurat` varchar(50) NOT NULL,
  `nomorsurat` varchar(50) NOT NULL,
  `nomodok` varchar(50) NOT NULL,
  `nomobuk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`idmasuk`, `idbarang`, `tanggal`, `dari`, `qty`, `satuan`, `hargasatuan`, `totalharga`, `jenissurat`, `nomorsurat`, `nomodok`, `nomobuk`) VALUES
(1, 8, '', 'CV jaya', 100, 'Unit', '75000', 0, 'BAST', '', '', ''),
(2, 9, '', 'CV', 100, 'Unit', '50000', 0, 'BAST', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `deskripsi` varchar(30) NOT NULL,
  `stock` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`idbarang`, `namabarang`, `deskripsi`, `stock`, `satuan`) VALUES
(8, 'pulpen', 'pilot', 93, 'Unit'),
(9, 'meja', 'kayu', 95, 'Unit'),
(11, 'buku', 'Belajar', 0, 'Unit'),
(12, 'kertas', 'HVS', 0, 'Rim'),
(13, 'Kursi', 'kayu', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
