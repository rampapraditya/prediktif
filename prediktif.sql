-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 10, 2025 at 09:15 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prediktif`
--

-- --------------------------------------------------------

--
-- Table structure for table `korps`
--

DROP TABLE IF EXISTS `korps`;
CREATE TABLE IF NOT EXISTS `korps` (
  `idkorps` int NOT NULL AUTO_INCREMENT,
  `namakorps` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idkorps`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korps`
--

INSERT INTO `korps` (`idkorps`, `namakorps`) VALUES
(1, 'Marinir'),
(2, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `pengkat`
--

DROP TABLE IF EXISTS `pengkat`;
CREATE TABLE IF NOT EXISTS `pengkat` (
  `idpangkat` int NOT NULL AUTO_INCREMENT,
  `namapangkat` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idpangkat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `satker`
--

DROP TABLE IF EXISTS `satker`;
CREATE TABLE IF NOT EXISTS `satker` (
  `idsatker` int NOT NULL AUTO_INCREMENT,
  `namasatker` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idsatker`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
