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
-- Database: `db_paper`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_papers`
--

DROP TABLE IF EXISTS `tbl_papers`;
CREATE TABLE IF NOT EXISTS `tbl_papers` (
  `PID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `content` varchar(30) NOT NULL,
  `authorID` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `reviewerID` int(6) DEFAULT NULL,
  `authorName` varchar(30) DEFAULT NULL,
  `coAuthorName` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_papers`
--

INSERT INTO `tbl_papers` (`PID`, `title`, `content`, `authorID`, `status`, `reviewerID`, `authorName`, `coAuthorName`) VALUES
(1, 'paperA', 'paperA content', '5', 'pending', NULL, 'Jill Kii', NULL),
(2, 'paperB', 'paperB content', '6', 'pending', NULL, 'Bill Ang', NULL),
(3, 'paper1', 'paper1 content', '5', 'pending', NULL, 'Jill Kii', NULL),
(4, 'paper2', 'paper2 content', '6', 'pending', NULL, 'Bill Ang', NULL),
(5, 'paperC', 'paperC content', '5', 'assigned', 3, 'Jill Kii', NULL),
(6, 'paperD', 'paperD content', '6', 'reviewed', NULL, 'Bill Ang', NULL),
(7, 'paperE', 'paperE content', '5', 'accepted', NULL, 'Jill Kii', NULL),
(8, 'paperF', 'paperF content', '6', 'rejected', NULL, 'Bill Ang', NULL),
(9, 'paperG', 'paperG content', '5', 'assigned', 4, 'Jill Kii', NULL),
(10, 'author1paper1', 'content1', '57', 'pending', NULL, 'author1', ''),
(11, 'author1paper2', 'content2', '57', 'pending', NULL, 'author1', 'Someguy'),
(12, 'author1paper3', 'content3', '57', 'pending', NULL, 'author1', 'Someguy'),
(13, 'author1paper4', 'content4', '57', 'pending', NULL, 'author1', ''),
(14, 'author2paper1', 'content1_2', '58', 'pending', NULL, 'author2', ''),
(15, 'author2paper2', 'something', '58', 'bidded', NULL, 'author2', 'Jill Kii'),
(16, 'author2paper3', 'paperts', '58', 'bidded', NULL, 'author2', 'author4'),
(17, 'author2paper4', 'something again', '58', 'bidded', NULL, 'author2', ''),
(18, 'author3paper1', 'something3', '59', 'bidded', NULL, 'author3', ''),
(19, 'author3paper2', 'something4', '59', 'bidded', NULL, 'author3', 'author1'),
(20, 'author3paper3', 'something34', '59', 'assigned', 4, 'author3', 'author4'),
(21, 'author3paper4', 'newpapers4', '59', 'assigned', 4, 'author3', ''),
(22, 'author4paper1', 'something44', '60', 'assigned', 4, 'author4', ''),
(23, 'author4paper2', 'a4p2', '60', 'assigned', 4, 'author4', ''),
(24, 'author4paper3', 'a4p3', '60', 'bidded', NULL, 'author4', 'author1'),
(25, 'author4paper4', 'a4p4', '60', 'bidded', NULL, 'author4', ''),
(26, 'paper26', 'paper26 content', '77', 'pending', NULL, 'author21', NULL),
(27, 'paper27', 'paper27 content', '77', 'pending', NULL, 'author21', NULL),
(28, 'paper28', 'paper28 content', '77', 'pending', NULL, 'author21', NULL),
(29, 'paper29', 'paper29 content', '77', 'pending', NULL, 'author21', NULL),
(30, 'paper30', 'paper30 content', '77', 'pending', NULL, 'author21', NULL),
(31, 'paper31', 'paper31 content', '77', 'pending', NULL, 'author21', NULL),
(32, 'paper32', 'paper32 content', '77', 'pending', NULL, 'author21', NULL),
(33, 'paper33', 'paper33 content', '77', 'pending', NULL, 'author21', NULL),
(34, 'paper34', 'paper34 content', '77', 'pending', NULL, 'author21', NULL),
(35, 'paper35', 'paper35 content', '77', 'pending', NULL, 'author21', NULL),
(36, 'paper36', 'paper36 content', '77', 'pending', NULL, 'author21', NULL),
(37, 'paper37', 'paper37 content', '77', 'assigned', 37, 'author21', NULL),
(38, 'paper38', 'paper38 content', '77', 'assigned', 38, 'author21', NULL),
(39, 'paper39', 'paper39 content', '77', 'assigned', 39, 'author21', NULL),
(40, 'paper40', 'paper40 content', '77', 'assigned', 40, 'author21', NULL),
(41, 'paper41', 'paper41 content', '77', 'assigned', 41, 'author21', NULL),
(42, 'paper42', 'paper42 content', '77', 'accepted', NULL, 'author21', NULL),
(43, 'paper43', 'paper43 content', '77', 'reviewed', NULL, 'author21', NULL),
(44, 'paper44', 'paper44 content', '77', 'reviewed', NULL, 'author21', NULL),
(45, 'paper45', 'paper45 content', '77', 'reviewed', NULL, 'author21', NULL),
(46, 'paper46', 'paper46 content', '77', 'reviewed', NULL, 'author21', NULL),
(47, 'paper47', 'paper47 content', '77', 'accepted', NULL, 'author21', NULL),
(48, 'paper48', 'paper48 content', '77', 'accepted', NULL, 'author21', NULL),
(49, 'paper49', 'paper49 content', '77', 'accepted', NULL, 'author21', NULL),
(50, 'paper50', 'paper50 content', '77', 'accepted', NULL, 'author21', NULL),
(51, 'paper51', 'paper51 content', '77', 'accepted', NULL, 'author21', NULL),
(52, 'paper52', 'paper52 content', '77', 'rejected', NULL, 'author21', NULL),
(53, 'paper53', 'paper53 content', '77', 'rejected', NULL, 'author21', NULL),
(54, 'paper54', 'paper54 content', '77', 'rejected', NULL, 'author21', NULL),
(55, 'paper55', 'paper55 content', '77', 'rejected', NULL, 'author21', NULL),
(56, 'paper56', 'paper56 content', '77', 'rejected', NULL, 'author21', NULL),
(57, 'paper57', 'paper57 content', '77', 'pending', NULL, 'author21', NULL),
(58, 'paper58', 'paper58 content', '77', 'pending', NULL, 'author21', NULL),
(59, 'paper59', 'paper59 content', '77', 'pending', NULL, 'author21', NULL),
(60, 'paper60', 'paper60 content', '77', 'pending', NULL, 'author21', NULL),
(61, 'paper61', 'paper61 content', '77', 'pending', NULL, 'author21', NULL),
(62, 'paper62', 'paper62 content', '77', 'pending', NULL, 'author21', NULL),
(63, 'paper63', 'paper63 content', '77', 'pending', NULL, 'author21', NULL),
(64, 'paper64', 'paper64 content', '77', 'pending', NULL, 'author21', NULL),
(65, 'paper65', 'paper65 content', '77', 'pending', NULL, 'author21', NULL),
(66, 'paper66', 'paper66 content', '77', 'pending', NULL, 'author21', NULL),
(67, 'paper67', 'paper67 content', '77', 'pending', NULL, 'author21', NULL),
(68, 'paper68', 'paper68 content', '77', 'pending', NULL, 'author21', NULL),
(69, 'paper69', 'paper69 content', '77', 'pending', NULL, 'author21', NULL),
(70, 'paper70', 'paper70 content', '77', 'pending', NULL, 'author21', NULL),
(71, 'paper71', 'paper71 content', '77', 'pending', NULL, 'author21', NULL),
(72, 'paper72', 'paper72 content', '77', 'pending', NULL, 'author21', NULL),
(73, 'paper73', 'paper73 content', '77', 'pending', NULL, 'author21', NULL),
(74, 'paper74', 'paper74 content', '77', 'pending', NULL, 'author21', NULL),
(75, 'paper75', 'paper75 content', '77', 'pending', NULL, 'author21', NULL),
(76, 'paper76', 'paper76 content', '77', 'pending', NULL, 'author21', NULL),
(77, 'paper77', 'paper77 content', '77', 'pending', NULL, 'author21', NULL),
(78, 'paper78', 'paper78 content', '77', 'pending', NULL, 'author21', NULL),
(79, 'paper79', 'paper79 content', '77', 'pending', NULL, 'author21', NULL),
(80, 'paper80', 'paper80 content', '77', 'pending', NULL, 'author21', NULL),
(81, 'paper81', 'paper81 content', '77', 'pending', NULL, 'author21', NULL),
(82, 'paper82', 'paper82 content', '77', 'pending', NULL, 'author21', NULL),
(83, 'paper83', 'paper83 content', '77', 'pending', NULL, 'author21', NULL),
(84, 'paper84', 'paper84 content', '77', 'pending', NULL, 'author21', NULL),
(85, 'paper85', 'paper85 content', '77', 'pending', NULL, 'author21', NULL),
(86, 'paper86', 'paper86 content', '77', 'pending', NULL, 'author21', NULL),
(87, 'paper87', 'paper87 content', '77', 'pending', NULL, 'author21', NULL),
(88, 'paper88', 'paper88 content', '77', 'pending', NULL, 'author21', NULL),
(89, 'paper89', 'paper89 content', '77', 'pending', NULL, 'author21', NULL),
(90, 'paper90', 'paper90 content', '77', 'pending', NULL, 'author21', NULL),
(91, 'paper91', 'paper91 content', '77', 'pending', NULL, 'author21', NULL),
(92, 'paper92', 'paper92 content', '77', 'pending', NULL, 'author21', NULL),
(93, 'paper93', 'paper93 content', '77', 'pending', NULL, 'author21', NULL),
(94, 'paper94', 'paper94 content', '77', 'pending', NULL, 'author21', NULL),
(95, 'paper95', 'paper95 content', '77', 'pending', NULL, 'author21', NULL),
(96, 'paper96', 'paper96 content', '77', 'pending', NULL, 'author21', NULL),
(97, 'paper97', 'paper97 content', '77', 'pending', NULL, 'author21', NULL),
(98, 'paper98', 'paper98 content', '77', 'pending', NULL, 'author21', NULL),
(99, 'paper99', 'paper99 content', '77', 'pending', NULL, 'author21', NULL),
(100, 'paper100', 'paper100 content', '77', 'pending', NULL, 'author21', NULL),
(101, 'paper101', 'paper101 content', '77', 'pending', NULL, 'author21', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
