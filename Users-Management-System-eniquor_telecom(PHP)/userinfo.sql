-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2020 at 09:01 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_detail`
--

DROP TABLE IF EXISTS `client_detail`;
CREATE TABLE IF NOT EXISTS `client_detail` (
  `ID` int(225) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `address` varchar(400) NOT NULL,
  `contact` int(30) NOT NULL,
  `city` varchar(200) NOT NULL,
  `modeofconn` varchar(50) NOT NULL,
  `typeofconn` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_detail`
--

INSERT INTO `client_detail` (`ID`, `name`, `email`, `address`, `contact`, `city`, `modeofconn`, `typeofconn`) VALUES
(1, 'John', 'john123@gmail.com', 'abc street canada', 976564342, 'Toronto', 'Mobile', 'Prepaid'),
(2, 'Yousuf Ali', 'yousufali@gmail.com', 'efg street brooklyn', 675833566, 'Brooklyn', 'Landline', 'Postpaid'),
(3, 'Sana', 'sana123@gmail.com', 'xyz street khi', 924433556, 'karachi', 'Mobile', 'Prepaid'),
(4, 'ali', 'aliww@gmail.com', 'fba area karachi', 34023145, 'karachi', 'Landline', 'Prepaid'),
(5, 'amna', 'amna345@gmail.com', 'gulshan karachi', 331847633, 'karachi', 'Mobile', 'Postpaid'),
(6, 'Zia ul Hassan', 'zia1234@gmail.com', 'DHA karachi', 34023145, 'karachi', 'Landline', 'Postpaid'),
(7, 'Jake Peralta', 'jake12345@gmail.com', 'Haroon Royal City,Phase-3,Flat No. P-201 ,Gulistan e Jouhar ,Karachi, Pakistan.', 34567909, 'Karachi', 'Landline', 'Postpaid'),
(8, 'Mohammad Ali', 'mali@gmail.com', 'abc road khi', 34023146, 'Karachi', 'Landline', 'Prepaid'),
(10, 'fiza', 'fiza@gmail.com', 'abc road1 khi ', 340657834, 'Karachi', 'Landline', 'Prepaid');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) DEFAULT NULL,
  `userEmail` varchar(400) NOT NULL,
  `userPass` varchar(70) NOT NULL,
  `userContact` bigint(30) DEFAULT NULL,
  `userAddress` varchar(200) DEFAULT NULL,
  `userJobTitle` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`UserID`, `userName`, `userEmail`, `userPass`, `userContact`, `userAddress`, `userJobTitle`) VALUES
(1, 'Sanna', 'sanazia700@gmail.com', '123', 9244335567, 'khi', 'Web Developer'),
(2, 'hassan', 'hassanzia766@gmail.com', 'abcd', NULL, NULL, NULL),
(4, 'Asjad', 'salahuddinasjad@gmail.con', 'abc', 34567909, 'gulshan karachi', 'Software Engineer'),
(5, 'Ali', 'ali123@gmail.com', 'ali123', 3007088654, NULL, NULL),
(6, 'gina', 'gina123@gmail.com', '345345', 92345678, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
