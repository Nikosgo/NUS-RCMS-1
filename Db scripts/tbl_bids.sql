-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 14, 2022 at 10:29 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bid`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bids`
--

DROP TABLE IF EXISTS `tbl_bids`;
CREATE TABLE IF NOT EXISTS `tbl_bids` (
  `BID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `PID` int(6) NOT NULL,
  `UID` int(6) NOT NULL,
  PRIMARY KEY (`BID`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bids`
--

INSERT INTO `tbl_bids` (`BID`, `PID`, `UID`) VALUES
(1, 1, 3),
(2, 32, 32),
(3, 33, 33),
(4, 34, 34),
(5, 35, 35),
(6, 36, 36),
(42, 25, 4),
(41, 24, 4),
(36, 19, 3),
(35, 18, 3),
(34, 17, 3),
(33, 16, 3),
(32, 15, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
