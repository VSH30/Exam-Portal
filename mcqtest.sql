-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 15, 2023 at 01:45 PM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcqtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `no` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rno` int(3) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `task` varchar(40) DEFAULT NULL,
  `remark` varchar(20) DEFAULT NULL,
  `time` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `result_id` varchar(8) NOT NULL,
  `test_id` varchar(6) DEFAULT NULL,
  `rno` int(3) DEFAULT NULL,
  `marks` int(5) NOT NULL,
  `max_marks` int(5) NOT NULL,
  `right_ans` int(2) NOT NULL,
  `wrong_ans` int(2) NOT NULL,
  `not_ans` int(2) NOT NULL,
  `timestamp` varchar(30) NOT NULL,
  PRIMARY KEY (`result_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studlist`
--

DROP TABLE IF EXISTS `studlist`;
CREATE TABLE IF NOT EXISTS `studlist` (
  `rno` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `class` varchar(10) NOT NULL,
  `pass` varchar(25) NOT NULL,
  PRIMARY KEY (`rno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studlist`
--

INSERT INTO `studlist` (`rno`, `name`, `class`, `pass`) VALUES
(1, 'Vishal Hanchnoli', 'Admin', '111');

-- --------------------------------------------------------

--
-- Table structure for table `test_details`
--

DROP TABLE IF EXISTS `test_details`;
CREATE TABLE IF NOT EXISTS `test_details` (
  `test_id` varchar(6) NOT NULL,
  `by_rno` int(3) NOT NULL,
  `sub` varchar(5) DEFAULT NULL,
  `subject` varchar(20) DEFAULT NULL,
  `questions` int(2) DEFAULT NULL,
  `time_minutes` int(3) DEFAULT NULL,
  `plus` int(2) DEFAULT NULL,
  `minus` int(2) DEFAULT NULL,
  `na` int(2) DEFAULT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
