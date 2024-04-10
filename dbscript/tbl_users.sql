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
-- Database: `db_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `UID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `userProfile` varchar(30) NOT NULL,
  `assigned` int(6) DEFAULT '0',
  `workload` int(6) DEFAULT '5',
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`UID`, `name`, `email`, `password`, `userProfile`, `assigned`, `workload`) VALUES
(1, 'admin', 'admin@mail.com', 'password', 'SystemAdmin', 0, 5),
(2, 'Henry Albert', 'ha@mail.com', 'password', 'ConferenceChair', 0, 5),
(3, 'Ken Tan', 'kt@mail.com', 'password', 'Reviewer', 1, 5),
(4, 'Mike Pong', 'mp@mail.com', 'password', 'Reviewer', 5, 5),
(5, 'Jill Kii', 'jk@mail.com', 'password', 'Author', 0, 5),
(6, 'Bill Ang', 'ba@mail.com', 'password', 'Author', 0, 5),
(7, 'admin1', 'admin1@mail.com', 'password', 'SystemAdmin', 0, 5),
(8, 'admin2', 'admin2@mail.com', 'password', 'SystemAdmin', 0, 5),
(9, 'admin3', 'admin3@mail.com', 'password', 'SystemAdmin', 0, 5),
(10, 'admin4', 'admin4@mail.com', 'password', 'SystemAdmin', 0, 5),
(11, 'admin5', 'admin5@mail.com', 'password', 'SystemAdmin', 0, 5),
(12, 'admin6', 'admin6@mail.com', 'password', 'SystemAdmin', 0, 5),
(13, 'admin7', 'admin7@mail.com', 'password', 'SystemAdmin', 0, 5),
(14, 'admin8', 'admin8@mail.com', 'password', 'SystemAdmin', 0, 5),
(15, 'admin9', 'admin9@mail.com', 'password', 'SystemAdmin', 0, 5),
(16, 'admin10', 'admin10@mail.com', 'password', 'SystemAdmin', 0, 5),
(17, 'admin11', 'admin11@mail.com', 'password', 'SystemAdmin', 0, 5),
(18, 'admin12', 'admin12@mail.com', 'password', 'SystemAdmin', 0, 5),
(19, 'admin13', 'admin13@mail.com', 'password', 'SystemAdmin', 0, 5),
(20, 'admin14', 'admin14@mail.com', 'password', 'SystemAdmin', 0, 5),
(21, 'admin15', 'admin15@mail.com', 'password', 'SystemAdmin', 0, 5),
(22, 'admin16', 'admin16@mail.com', 'password', 'SystemAdmin', 0, 5),
(23, 'admin17', 'admin17@mail.com', 'password', 'SystemAdmin', 0, 5),
(24, 'admin18', 'admin18@mail.com', 'password', 'SystemAdmin', 0, 5),
(25, 'admin19', 'admin19@mail.com', 'password', 'SystemAdmin', 0, 5),
(26, 'admin20', 'admin20@mail.com', 'password', 'SystemAdmin', 0, 5),
(27, 'admin21', 'admin21@mail.com', 'password', 'SystemAdmin', 0, 5),
(28, 'admin22', 'admin22@mail.com', 'password', 'SystemAdmin', 0, 5),
(29, 'admin23', 'admin23@mail.com', 'password', 'SystemAdmin', 0, 5),
(30, 'admin24', 'admin24@mail.com', 'password', 'SystemAdmin', 0, 5),
(31, 'admin25', 'admin25@mail.com', 'password', 'SystemAdmin', 0, 5),
(32, 'reviewer1', 'reviewer1@mail.com', 'password', 'Reviewer', 0, 5),
(33, 'reviewer2', 'reviewer2@mail.com', 'password', 'Reviewer', 0, 5),
(34, 'reviewer3', 'reviewer3@mail.com', 'password', 'Reviewer', 0, 5),
(35, 'reviewer4', 'reviewer4@mail.com', 'password', 'Reviewer', 0, 5),
(36, 'reviewer5', 'reviewer5@mail.com', 'password', 'Reviewer', 0, 5),
(37, 'reviewer6', 'reviewer6@mail.com', 'password', 'Reviewer', 1, 5),
(38, 'reviewer7', 'reviewer7@mail.com', 'password', 'Reviewer', 1, 5),
(39, 'reviewer8', 'reviewer8@mail.com', 'password', 'Reviewer', 1, 5),
(40, 'reviewer9', 'reviewer9@mail.com', 'password', 'Reviewer', 1, 5),
(41, 'reviewer10', 'reviewer10@mail.com', 'password', 'Reviewer', 1, 5),
(42, 'reviewer11', 'reviewer11@mail.com', 'password', 'Reviewer', 0, 5),
(43, 'reviewer12', 'reviewer12@mail.com', 'password', 'Reviewer', 0, 5),
(44, 'reviewer13', 'reviewer13@mail.com', 'password', 'Reviewer', 0, 5),
(45, 'reviewer14', 'reviewer14@mail.com', 'password', 'Reviewer', 0, 5),
(46, 'reviewer15', 'reviewer15@mail.com', 'password', 'Reviewer', 0, 5),
(47, 'reviewer16', 'reviewer16@mail.com', 'password', 'Reviewer', 0, 5),
(48, 'reviewer17', 'reviewer17@mail.com', 'password', 'Reviewer', 1, 5),
(49, 'reviewer18', 'reviewer18@mail.com', 'password', 'Reviewer', 0, 5),
(50, 'reviewer19', 'reviewer19@mail.com', 'password', 'Reviewer', 0, 5),
(51, 'reviewer20', 'reviewer20@mail.com', 'password', 'Reviewer', 0, 5),
(52, 'reviewer21', 'reviewer21@mail.com', 'password', 'Reviewer', 0, 5),
(53, 'reviewer22', 'reviewer22@mail.com', 'password', 'Reviewer', 0, 5),
(54, 'reviewer23', 'reviewer23@mail.com', 'password', 'Reviewer', 0, 5),
(55, 'reviewer24', 'reviewer24@mail.com', 'password', 'Reviewer', 0, 5),
(56, 'reviewer25', 'reviewer25@mail.com', 'password', 'Reviewer', 0, 5),
(57, 'author1', 'author1@mail.com', 'password', 'Author', 0, 5),
(58, 'author2', 'author2@mail.com', 'password', 'Author', 0, 5),
(59, 'author3', 'author3@mail.com', 'password', 'Author', 0, 5),
(60, 'author4', 'author4@mail.com', 'password', 'Author', 0, 5),
(61, 'author5', 'author5@mail.com', 'password', 'Author', 0, 5),
(62, 'author6', 'author6@mail.com', 'password', 'Author', 0, 5),
(63, 'author7', 'author7@mail.com', 'password', 'Author', 0, 5),
(64, 'author8', 'author8@mail.com', 'password', 'Author', 0, 5),
(65, 'author9', 'author9@mail.com', 'password', 'Author', 0, 5),
(66, 'author10', 'author10@mail.com', 'password', 'Author', 0, 5),
(67, 'author11', 'author11@mail.com', 'password', 'Author', 0, 5),
(68, 'author12', 'author12@mail.com', 'password', 'Author', 0, 5),
(69, 'author13', 'author13@mail.com', 'password', 'Author', 0, 5),
(70, 'author14', 'author14@mail.com', 'password', 'Author', 0, 5),
(71, 'author15', 'author15@mail.com', 'password', 'Author', 0, 5),
(72, 'author16', 'author16@mail.com', 'password', 'Author', 0, 5),
(73, 'author17', 'author17@mail.com', 'password', 'Author', 0, 5),
(74, 'author18', 'author18@mail.com', 'password', 'Author', 0, 5),
(75, 'author19', 'author19@mail.com', 'password', 'Author', 0, 5),
(76, 'author20', 'author20@mail.com', 'password', 'Author', 0, 5),
(77, 'author21', 'author21@mail.com', 'password', 'Author', 0, 5),
(78, 'author22', 'author22@mail.com', 'password', 'Author', 0, 5),
(79, 'author23', 'author23@mail.com', 'password', 'Author', 0, 5),
(80, 'author24', 'author24@mail.com', 'password', 'Author', 0, 5),
(81, 'author25', 'author25@mail.com', 'password', 'Author', 0, 5),
(82, 'cc1', 'cc1@mail.com', 'password', 'ConferenceChair', 0, 5),
(83, 'cc2', 'cc2@mail.com', 'password', 'ConferenceChair', 0, 5),
(84, 'cc3', 'cc3@mail.com', 'password', 'ConferenceChair', 0, 5),
(85, 'cc4', 'cc4@mail.com', 'password', 'ConferenceChair', 0, 5),
(86, 'cc5', 'cc5@mail.com', 'password', 'ConferenceChair', 0, 5),
(87, 'cc6', 'cc6@mail.com', 'password', 'ConferenceChair', 0, 5),
(88, 'cc7', 'cc7@mail.com', 'password', 'ConferenceChair', 0, 5),
(89, 'cc8', 'cc8@mail.com', 'password', 'ConferenceChair', 0, 5),
(90, 'cc9', 'cc9@mail.com', 'password', 'ConferenceChair', 0, 5),
(91, 'cc10', 'cc10@mail.com', 'password', 'ConferenceChair', 0, 5),
(92, 'cc11', 'cc11@mail.com', 'password', 'ConferenceChair', 0, 5),
(93, 'cc12', 'cc12@mail.com', 'password', 'ConferenceChair', 0, 5),
(94, 'cc13', 'cc13@mail.com', 'password', 'ConferenceChair', 0, 5),
(95, 'cc14', 'cc14@mail.com', 'password', 'ConferenceChair', 0, 5),
(96, 'cc15', 'cc15@mail.com', 'password', 'ConferenceChair', 0, 5),
(97, 'cc16', 'cc16@mail.com', 'password', 'ConferenceChair', 0, 5),
(98, 'cc17', 'cc17@mail.com', 'password', 'ConferenceChair', 0, 5),
(99, 'cc18', 'cc18@mail.com', 'password', 'ConferenceChair', 0, 5),
(100, 'cc19', 'cc19@mail.com', 'password', 'ConferenceChair', 0, 5),
(101, 'cc20', 'cc20@mail.com', 'password', 'ConferenceChair', 0, 5),
(102, 'cc21', 'cc21@mail.com', 'password', 'ConferenceChair', 0, 5),
(103, 'cc22', 'cc22@mail.com', 'password', 'ConferenceChair', 0, 5),
(104, 'cc23', 'cc23@mail.com', 'password', 'ConferenceChair', 0, 5),
(105, 'cc24', 'cc24@mail.com', 'password', 'ConferenceChair', 0, 5),
(106, 'cc25', 'cc25@mail.com', 'password', 'ConferenceChair', 0, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
