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
-- Database: `db_review`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reviews`
--

DROP TABLE IF EXISTS `tbl_reviews`;
CREATE TABLE IF NOT EXISTS `tbl_reviews` (
  `RID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` varchar(300) NOT NULL,
  `rating` int(6) NOT NULL,
  `PID` int(6) NOT NULL,
  `reviewerID` int(6) NOT NULL,
  `score` int(6) NOT NULL,
  PRIMARY KEY (`RID`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reviews`
--

INSERT INTO `tbl_reviews` (`RID`, `content`, `rating`, `PID`, `reviewerID`, `score`) VALUES
(1, 'review content a', 3, 6, 3, 0),
(2, 'review content b', 2, 7, 4, 0),
(3, 'review content c', -2, 8, 3, 0),
(4, 'review1', 0, 42, 42, 0),
(5, 'review2', 1, 43, 43, 0),
(6, 'review3', 2, 44, 44, 0),
(7, 'review4', 3, 45, 45, 0),
(8, 'review5', -1, 46, 46, 0),
(9, 'review6', 0, 47, 47, 0),
(10, 'review7', 1, 48, 48, 0),
(11, 'review8', 3, 49, 49, 0),
(12, 'review9', 2, 50, 50, 0),
(13, 'review10', 2, 51, 51, 0),
(14, 'review11', -1, 52, 52, 0),
(15, 'review12', -2, 53, 53, 0),
(16, 'review13', -3, 54, 54, 0),
(17, 'review14', -3, 55, 55, 0),
(18, 'review15', -2, 56, 56, 0),
(19, 'this is another review', 2, 6, 55, 0),
(20, 'another review', 2, 43, 55, 0),
(21, 'some review', 2, 44, 55, 0),
(22, 'good paper', 1, 45, 55, 0),
(23, 'terrible', -2, 46, 55, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
