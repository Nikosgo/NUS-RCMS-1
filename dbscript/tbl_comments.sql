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
-- Database: `db_comment`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

DROP TABLE IF EXISTS `tbl_comments`;
CREATE TABLE IF NOT EXISTS `tbl_comments` (
  `CID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` varchar(300) NOT NULL,
  `reviewID` int(6) NOT NULL,
  `userID` int(6) NOT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`CID`, `content`, `reviewID`, `userID`) VALUES
(1, 'comment content a', 1, 4),
(2, 'comment content b', 2, 3),
(3, 'comment content c', 3, 4),
(4, 'great review!', 2, 55),
(5, 'comment on this review', 19, 55),
(6, 'second comment', 1, 55),
(7, 'this is some comment', 3, 55),
(8, 'what a nice review', 9, 55),
(9, 'not a bad review', 10, 55),
(10, 'i agree', 14, 55),
(11, 'i agree', 17, 55),
(12, 'why borderline?', 5, 55),
(13, 'shouldnt it be higher', 6, 55);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
