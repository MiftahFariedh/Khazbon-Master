-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 06, 2020 at 11:40 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbon`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arsip`
--

DROP TABLE IF EXISTS `tbl_arsip`;
CREATE TABLE IF NOT EXISTS `tbl_arsip` (
  `id_arsip` int(11) NOT NULL AUTO_INCREMENT,
  `no_bon` varchar(50) NOT NULL,
  `tanggal_kirim` varchar(10) NOT NULL,
  `prihal` varchar(50) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_bon` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `jumlah` int(10) NOT NULL,
  PRIMARY KEY (`id_arsip`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bon`
--

DROP TABLE IF EXISTS `tbl_bon`;
CREATE TABLE IF NOT EXISTS `tbl_bon` (
  `id_bon` int(10) NOT NULL AUTO_INCREMENT,
  `order_product` varchar(999) NOT NULL,
  PRIMARY KEY (`id_bon`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bon`
--

INSERT INTO `tbl_bon` (`id_bon`, `order_product`) VALUES
(42, '001'),
(44, '002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

DROP TABLE IF EXISTS `tbl_unit`;
CREATE TABLE IF NOT EXISTS `tbl_unit` (
  `id_unit` int(10) NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(50) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`id_unit`, `nama_unit`) VALUES
(12, 'Cemor'),
(13, 'Khazcutas'),
(14, 'Cutpack'),
(15, 'Sortir'),
(17, 'Yetsak'),
(34, 'Lini A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`) VALUES
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
