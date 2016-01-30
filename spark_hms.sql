-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2016 at 11:54 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spark_hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `computer_details`
--

CREATE TABLE IF NOT EXISTS `computer_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `computer_id` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `processor` varchar(50) NOT NULL,
  `motherboard` varchar(50) NOT NULL,
  `ram` varchar(30) NOT NULL,
  `hdd` varchar(15) NOT NULL,
  `monitor` int(11) NOT NULL DEFAULT '0',
  `mouse` int(11) NOT NULL DEFAULT '0',
  `keyboard` int(11) NOT NULL DEFAULT '0',
  `status` varchar(30) NOT NULL,
  `note` varchar(200) NOT NULL,
  `created_date` varchar(30) NOT NULL,
  `created_time` varchar(15) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `computer_id` (`computer_id`),
  KEY `location` (`location`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `computer_details`
--

INSERT INTO `computer_details` (`id`, `computer_id`, `location`, `processor`, `motherboard`, `ram`, `hdd`, `monitor`, `mouse`, `keyboard`, `status`, `note`, `created_date`, `created_time`, `created_by`) VALUES
(1, 'WK01', 'LAB01', 'intel i5 2Ghz', 'Z97', '4GB DDR3', '500GB', 1, 1, 1, 'Functional', '', '2016-01-27', '', 'admin'),
(3, 'WK02', 'LAB02', 'intel i5 2Ghz', 'Z97', '4GB DDR3', '500GB', 1, 1, 1, 'Requires Repairs', '', '2016-01-27 12:18:21 am', '', 'admin'),
(4, 'WK03', 'LAB01', 'i3(4010) 2.3Ghz', 'Z97', '4GB DDR3', '500GB', 1, 1, 0, 'Functional', '', '2016-01-27', '12:21:35 am', 'admin'),
(5, 'WK04', 'LAB01', 'i3(4010) 2.3Ghz', 'Z97', '4GB DDR3', '500GB', 1, 1, 0, 'Functional', '', '2016-01-27', '12:24:04 am', 'admin'),
(6, 'WK05', 'LAB01', 'i3', 'Z97', '4GB DDR3', '500GB', 1, 1, 0, 'Out of service', '', '2016-01-27', '12:24:59 am', 'admin'),
(8, 'WK06', 'LAB02', 'i3(4010) 2.3Ghz ', 'Z97-A', '4GB DDR3', '500GB', 1, 1, 1, 'Functional', 'fgdfgd11', '2016-01-27', '12:15:41 pm', 'admin'),
(9, 'WK07', 'LAB09', 'i3(4010) 2.3Ghz', 'Z97-A', '4GB DDR3', '500GB', 1, 1, 1, 'Functional', 'test test test... jkh', '2016-01-28', '04:29:44 pm', 'admin'),
(10, 'WK08', 'LAB09', 'i3(4010) 2.3Ghz', 'Z97', '4GB DDR3', '500GB', 1, 1, 1, 'Requires Repairs', 'some OS issues', '2016-01-28', '09:51:25 pm', 'admin'),
(12, 'WK09', 'LAB02', 'i3(4010) 2.3Ghz', 'Z97', '4GB DDR3', '500GB', 1, 1, 0, 'Requires Repairs', '', '2016-01-30', '11:46:48 am', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `location_history`
--

CREATE TABLE IF NOT EXISTS `location_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `computer_id` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `location` (`location`),
  KEY `created_by` (`created_by`),
  KEY `computer_id` (`computer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `location_history`
--

INSERT INTO `location_history` (`id`, `computer_id`, `location`, `created_by`, `created_date`) VALUES
(2, 'WK02', 'LAB01', 'admin', '2016-01-28'),
(3, 'WK02', 'LAB02', 'admin', '2016-01-28'),
(4, 'WK08', 'LAB02', 'admin', '2016-01-28'),
(5, 'WK08', 'LAB01', 'admin', '2016-01-28'),
(6, 'WK09', 'LAB02', 'admin', '2016-01-30'),
(7, 'WK08', 'LAB09', 'admin', '2016-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE IF NOT EXISTS `room_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_code` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `room_code` (`room_code`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `room_details`
--

INSERT INTO `room_details` (`id`, `room_code`, `description`, `status`, `created_date`, `created_by`) VALUES
(1, 'LAB01', 'Computer Lab #1', 'active', '2016-01-30', 'admin'),
(2, 'LAB09', 'Computer Lab #9', 'active', '2016-01-30', 'admin'),
(3, 'LAB02', 'Computer Lab #2', 'active', '2016-01-30', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_date` date NOT NULL,
  `removed_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `emp_id` (`emp_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emp_id`, `username`, `password`, `status`, `created_date`, `removed_date`) VALUES
(1, '01', 'admin', 'aaa', 'active', '2016-01-20', NULL),
(5, '121', 'ss', 'sdfsdf', 'active', '2016-01-24', NULL),
(14, '32', 'test', 'sdfsd', 'active', '2016-01-25', NULL),
(15, '11', 'qsa', 'asas', 'active', '2016-01-27', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `computer_details`
--
ALTER TABLE `computer_details`
  ADD CONSTRAINT `FK-comp_details_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_comp_details_location` FOREIGN KEY (`location`) REFERENCES `room_details` (`room_code`) ON UPDATE CASCADE;

--
-- Constraints for table `location_history`
--
ALTER TABLE `location_history`
  ADD CONSTRAINT `FK_location_history_comp_id` FOREIGN KEY (`computer_id`) REFERENCES `computer_details` (`computer_id`),
  ADD CONSTRAINT `FK_location_history_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_location_history_location` FOREIGN KEY (`location`) REFERENCES `room_details` (`room_code`) ON UPDATE CASCADE;

--
-- Constraints for table `room_details`
--
ALTER TABLE `room_details`
  ADD CONSTRAINT `FK_room_details_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
