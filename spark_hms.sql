-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2016 at 06:58 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
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
(6, 'WK05', 'LAB01', 'i3', 'Z97', '4GB DDR3', '500GB', 1, 1, 0, 'Functional', '', '2016-01-27', '12:24:59 am', 'admin'),
(8, 'WK06', 'LAB02', 'i3(4010) 2.3Ghz ', 'Z97-A', '4GB DDR3', '500GB', 1, 1, 1, 'Functional', 'fgdfgd11', '2016-01-27', '12:15:41 pm', 'admin'),
(9, 'WK07', 'LAB09', 'i3(4010) 2.3Ghz', 'Z97-A', '4GB DDR3', '500GB', 1, 1, 1, 'Functional', 'test test test... jkh', '2016-01-28', '04:29:44 pm', 'admin'),
(10, 'WK08', 'LAB09', 'i3(4010) 2.3Ghz', 'Z97', '4GB DDR3', '500GB', 1, 1, 1, 'Functional', 'some OS issues', '2016-01-28', '09:51:25 pm', 'admin'),
(12, 'WK09', 'LAB02', 'i3(4010) 2.3Ghz', 'Z97', '4GB DDR3', '500GB', 1, 1, 0, 'Functional', '', '2016-01-30', '11:46:48 am', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE IF NOT EXISTS `issues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `severity` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL,
  `opened_by` varchar(20) NOT NULL,
  `opened_date` date NOT NULL,
  `opened_time` time NOT NULL,
  `closed_date` date NOT NULL,
  `closed_time` time NOT NULL,
  `closed_by` varchar(20) NOT NULL,
  `actions_taken` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `issue`, `description`, `severity`, `status`, `opened_by`, `opened_date`, `opened_time`, `closed_date`, `closed_time`, `closed_by`, `actions_taken`) VALUES
(15, 'test', 'test', 'Medium', 'resolved', 'admin', '2015-11-26', '21:33:20', '2016-01-31', '12:22:47', 'admin', 'asdasdasd'),
(16, 'erere', 'zxsasa sjdha sdjaskjdla ksd', 'High', 'resolved', 'admin', '2016-01-30', '22:07:10', '2016-02-01', '18:54:21', 'admin', 'jhgjhg\n'),
(17, 'another issue', 'this is a short description of the current issue', 'High', 'resolved', 'admin', '2016-01-31', '13:34:15', '2016-01-31', '13:35:19', 'admin', 'nothing serious'),
(18, 'another issue 2', 'asda sd asd asda', 'Medium', 'resolved', 'admin', '2016-01-31', '13:34:48', '2016-02-01', '18:11:25', 'admin', 'bla bla blaa'),
(19, 'ererezsdas', 'sadas', 'Low', 'resolved', 'admin', '2016-01-31', '14:30:26', '2016-02-01', '18:37:39', 'admin', 'aaaaaaaa'),
(20, 'another issue 3', 'adsada', 'Medium', 'resolved', 'admin', '2016-01-31', '14:44:58', '2016-01-31', '14:45:40', 'admin', 'dsfsdfs'),
(21, 'another issue 4', 'test test', 'Medium', 'resolved', 'admin', '2016-01-31', '17:47:41', '2016-01-31', '17:48:01', 'admin', 'hgjh'),
(22, 'sdfsdfs', 'dfsdfsd', 'Medium', 'resolved', 'admin', '2016-02-01', '18:41:50', '2016-02-01', '22:17:29', 'admin', ' <br/> Actions for WK02 - hgjhgjhgj <br/> Actions for WK02 - asasas'),
(23, 'hgjh', 'jgjhg', 'High', 'resolved', 'admin', '2016-02-01', '18:54:53', '2016-02-01', '22:34:09', 'admin', ' <br/> Actions for WK02 - asdasdas <br/> Actions for WK01 - sasasasas <br/> Actions for WK02 - nothing <br/> Actions for WK02 - '),
(24, 'erere', 'dasdas', 'Low', 'resolved', 'admin', '2016-02-01', '22:20:18', '2016-02-01', '22:30:28', 'admin', ' <br/> Actions for WK01 - sdsdasd <br/> Actions for WK01 - zxczx <br/> Actions for WK01 - sdasda <br/> Actions for WK01 - zczxczx'),
(25, 'dfsdf', 'sdfsdfs', 'Medium', 'resolved', 'admin', '2016-02-01', '22:34:19', '2016-02-01', '22:34:32', 'admin', ''),
(26, 'sdasd', 'asdasd', 'Medium', 'resolved', 'admin', '2016-02-01', '22:34:42', '2016-02-01', '22:40:24', 'admin', 'hkjhkj'),
(27, 'asdas', 'asdasd', 'Medium', 'resolved', 'admin', '2016-02-01', '22:43:19', '2016-02-01', '22:43:28', 'admin', ' <br/> '),
(28, 'ssasa', 'sasas', 'Low', 'resolved', 'admin', '2016-02-01', '22:44:19', '2016-02-01', '22:44:28', 'admin', ' <br/> Actions for WK01 - asasasa <br/> asasa'),
(29, 'wewew', 'wewew', 'High', 'open', 'admin', '2016-02-01', '22:45:09', '0000-00-00', '00:00:00', '', ' <br/> Actions for WK01 - done'),
(30, 'sasa', 'sasas', 'select one', 'resolved', 'admin', '2016-02-01', '22:48:21', '2016-02-01', '22:50:26', 'admin', 'Actions for WK04 - asdasdas <br/> Actions for WK05 - asdasdasdsad <br/> '),
(31, 'test', 'fdsdf', 'Medium', 'resolved', 'admin', '2016-02-01', '22:49:59', '2016-02-01', '22:50:09', 'admin', ' <br/> ');

-- --------------------------------------------------------

--
-- Table structure for table `issue_history`
--

CREATE TABLE IF NOT EXISTS `issue_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue_id` int(11) NOT NULL,
  `computer_code` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL,
  `closed_date` date NOT NULL,
  `closed_time` time NOT NULL,
  `closed_by` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `issue_id` (`issue_id`,`computer_code`,`closed_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `issue_history`
--

INSERT INTO `issue_history` (`id`, `issue_id`, `computer_code`, `status`, `closed_date`, `closed_time`, `closed_by`) VALUES
(6, 15, 'WK02', 'resolved', '2016-01-31', '00:00:00', 'admin'),
(7, 15, 'WK03', 'resolved', '2016-01-31', '00:00:00', 'admin'),
(8, 16, 'WK02', 'resolved', '2016-02-01', '18:54:21', 'admin'),
(9, 16, 'WK03', 'resolved', '2016-02-01', '18:54:21', 'admin'),
(10, 17, 'WK05', 'resolved', '2016-01-31', '00:00:00', 'admin'),
(11, 17, 'WK06', 'resolved', '2016-01-31', '00:00:00', 'admin'),
(12, 18, 'WK01', 'resolved', '2016-02-01', '00:00:00', 'admin'),
(13, 18, 'WK02', 'resolved', '2016-02-01', '00:00:00', 'admin'),
(14, 18, 'WK03', 'resolved', '2016-02-01', '00:00:00', 'admin'),
(15, 18, 'WK04', 'resolved', '2016-02-01', '00:00:00', 'admin'),
(16, 19, 'WK01', 'resolved', '2016-02-01', '18:37:40', 'admin'),
(17, 20, 'WK08', 'resolved', '2016-01-31', '00:00:00', 'admin'),
(18, 21, 'WK01', 'resolved', '2016-01-31', '00:00:00', 'admin'),
(19, 21, 'WK02', 'resolved', '2016-01-31', '00:00:00', 'admin'),
(20, 21, 'WK03', 'resolved', '2016-01-31', '00:00:00', 'admin'),
(21, 21, 'WK04', 'resolved', '2016-01-31', '00:00:00', 'admin'),
(22, 21, 'WK05', 'resolved', '2016-01-31', '00:00:00', 'admin'),
(23, 21, 'WK06', 'resolved', '2016-01-31', '00:00:00', 'admin'),
(24, 21, 'WK07', 'resolved', '2016-01-31', '00:00:00', 'admin'),
(25, 21, 'WK08', 'resolved', '2016-01-31', '00:00:00', 'admin'),
(26, 21, 'WK09', 'resolved', '2016-01-31', '00:00:00', 'admin'),
(27, 22, 'WK02', 'resolved', '0000-00-00', '00:00:00', 'admin'),
(28, 23, 'WK01', 'resolved', '0000-00-00', '00:00:00', 'admin'),
(29, 23, 'WK02', 'resolved', '2016-02-01', '22:34:09', 'admin'),
(30, 24, 'WK01', 'resolved', '2016-02-01', '22:30:28', 'admin'),
(31, 25, 'WK01', 'resolved', '2016-02-01', '22:34:33', 'admin'),
(32, 26, 'WK01', 'resolved', '2016-02-01', '22:40:24', 'admin'),
(33, 26, 'WK02', 'resolved', '2016-02-01', '22:40:24', 'admin'),
(34, 26, 'WK03', 'resolved', '2016-02-01', '22:40:24', 'admin'),
(35, 27, 'WK01', 'resolved', '2016-02-01', '22:43:28', 'admin'),
(36, 27, 'WK02', 'resolved', '2016-02-01', '22:43:28', 'admin'),
(37, 27, 'WK04', 'resolved', '2016-02-01', '22:43:28', 'admin'),
(38, 28, 'WK01', 'resolved', '2016-02-01', '22:44:28', 'admin'),
(39, 28, 'WK02', 'resolved', '2016-02-01', '22:44:28', 'admin'),
(40, 29, 'WK01', 'resolved', '2016-02-01', '22:45:42', 'admin'),
(41, 29, 'WK02', 'open', '0000-00-00', '00:00:00', ''),
(42, 30, 'WK04', 'resolved', '2016-02-01', '22:50:22', 'admin'),
(43, 30, 'WK05', 'resolved', '2016-02-01', '22:50:25', 'admin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `room_details`
--

INSERT INTO `room_details` (`id`, `room_code`, `description`, `status`, `created_date`, `created_by`) VALUES
(1, 'LAB01', 'Computer Lab #1', 'active', '2016-01-30', 'admin'),
(2, 'LAB09', 'Computer Lab #9', 'active', '2016-01-30', 'admin'),
(3, 'LAB02', 'Computer Lab #2', 'active', '2016-01-30', 'admin'),
(5, 'LEC01', 'Lecture Room 1', 'disabled', '2016-01-30', 'admin');

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
