-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2016 at 07:59 AM
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
  `processor_serial` varchar(100) NOT NULL DEFAULT 'n/a',
  `motherboard` varchar(50) NOT NULL,
  `motherboard_serial` varchar(100) NOT NULL DEFAULT 'n/a',
  `ram` varchar(30) NOT NULL,
  `ram_serial` varchar(100) NOT NULL DEFAULT 'n/a',
  `hdd` varchar(15) NOT NULL,
  `hdd_serial` varchar(100) NOT NULL DEFAULT 'n/a',
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `computer_details`
--

INSERT INTO `computer_details` (`id`, `computer_id`, `location`, `processor`, `processor_serial`, `motherboard`, `motherboard_serial`, `ram`, `ram_serial`, `hdd`, `hdd_serial`, `monitor`, `mouse`, `keyboard`, `status`, `note`, `created_date`, `created_time`, `created_by`) VALUES
(1, 'WK01', 'LAB09', 'sda', 'n/a', 'Z97', 'n/a', '4GB DDR3', 'n/a', '500GB', 'n/a', 1, 1, 1, 'Functional', '', '2016-01-27', '', 'admin'),
(3, 'WK02', 'LAB09', 'intel i5 2Ghz', 'n/a', 'Z97', 'n/a', '4GB DDR3', 'n/a', '500GB', 'n/a', 1, 1, 1, 'Functional', '', '2016-01-27 12:18:21 am', '', 'admin'),
(4, 'WK03', 'LAB01', 'i3(4010) 2.3Ghz', 'n/a', 'Z97', 'n/a', '4GB DDR3', 'n/a', '500GB', 'n/a', 1, 1, 0, 'Requires Repairs', '', '2016-01-27', '12:21:35 am', 'admin'),
(5, 'WK04', 'LAB01', 'i3(4010) 2.3Ghz', 'n/a', 'Z97', 'n/a', '4GB DDR3', 'n/a', '500GB', 'n/a', 1, 1, 0, 'Functional', '', '2016-01-27', '12:24:04 am', 'admin'),
(6, 'WK05', 'LAB09', 'i3', 'n/a', 'wewew', 'n/a', '8GB', 'n/a', '1TB', 'n/a', 1, 1, 1, 'Functional', '', '2016-01-27', '12:24:59 am', 'admin'),
(8, 'WK06', 'LAB02', 'i3(4010) 2.3Ghz ', 'n/a', 'Z97-A', 'n/a', '4GB DDR3', 'n/a', '500GB', 'n/a', 1, 1, 1, 'Requires Repairs', 'fgdfgd11', '2016-01-27', '12:15:41 pm', 'admin'),
(9, 'WK07', 'LAB09', 'i3(4010) 2.3Ghz', 'n/a', 'Z97-A', 'n/a', '4GB DDR3', 'n/a', '500GB', 'n/a', 1, 1, 1, 'Functional', 'test test test... jkh', '2016-01-28', '04:29:44 pm', 'admin'),
(10, 'WK08', 'LAB09', 'i3(4010) 2.3Ghz', 'n/a', 'Z97', 'n/a', '4GB DDR3', 'n/a', '500GB', 'n/a', 1, 1, 1, 'Functional', 'some OS issues', '2016-01-28', '09:51:25 pm', 'admin'),
(12, 'WK09', 'LAB02', 'i3(4010) 2.3Ghz', 'n/a', 'Z97', 'n/a', '4GB DDR3', 'n/a', '500GB', 'n/a', 1, 1, 0, 'Functional', '', '2016-01-30', '11:46:48 am', 'admin'),
(13, 'WK10', 'LAB02', 'i3(4010) 2.3Ghz', 'n/a', 'Z97-A', 'n/a', '4GB DDR3', 'n/a', '500GB', 'n/a', 1, 1, 1, 'Functional', 'asdasd', '2016-02-12', '11:07:02', 'admin'),
(14, 'WK11', 'LAB01', 'i3 2GHz', '000-111-111-2', 'Asus G47', '777-2-332-1', '4GB DDR3', '112-321-312-3', '360GB', '1212-342-12', 1, 1, 1, 'Functional', '', '2016-03-05', '10:37:47', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_details`
--

CREATE TABLE IF NOT EXISTS `inventory_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `details` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `created_by` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `inventory_details`
--

INSERT INTO `inventory_details` (`id`, `item_name`, `type`, `details`, `quantity`, `available`, `created_date`, `created_time`, `created_by`) VALUES
(2, 'asa', 'Netword Interface Card (NIC)', 'asa', 4, 0, '2016-02-05', '14:41:30', 'admin'),
(3, 'sdas', 'CPU', 'sda', 5, 0, '2016-02-05', '14:42:42', 'admin'),
(4, 'optical mouse', 'Mouse', 'mouse', 10, 9, '2016-02-05', '15:14:43', 'admin'),
(5, 'sad', 'HDD', '1TB', 3, 0, '2016-02-05', '15:14:59', 'admin'),
(6, 'Monitors', 'Monitor', 'adsaaaa', 6, 2, '2016-02-05', '15:21:09', 'admin'),
(7, 'test', 'Motherboard', 'wewew', 9, 0, '2016-02-05', '19:22:07', 'admin'),
(8, 'asa', 'Keyboard', 'ldfgdsf', 2, 1, '2016-02-20', '12:44:26', 'admin'),
(9, 'asdas', 'RAM', '8GB', 3, 2, '2016-02-20', '12:48:09', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_item_types`
--

CREATE TABLE IF NOT EXISTS `inventory_item_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `inventory_item_types`
--

INSERT INTO `inventory_item_types` (`id`, `name`, `description`) VALUES
(1, 'RAM', 'RAM modules (don''t change this type''s name!)'),
(2, 'HDD', 'Hard Disk Drive (don''t change this type''s name!)'),
(3, 'CPU', 'Central Processing Unit(Processor) (don''t change this type''s name!)'),
(4, 'Motherboard', '(don''t change this type''s name!)'),
(5, 'Monitor', '(don''t change this type''s name!)'),
(6, 'Power Supply Unit', ''),
(7, 'Optical Disk Drive', ''),
(8, 'Keyboard', '(don''t change this type''s name!)'),
(9, 'Mouse', '(don''t change this type''s name!)'),
(10, 'Cable', ''),
(11, 'Graphic Card', ''),
(12, 'Netword Interface Card (NIC)', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

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
(29, 'wewew', 'wewew', 'High', 'resolved', 'admin', '2016-02-01', '22:45:09', '2016-02-10', '19:04:55', 'admin', ' <br/> Actions for WK01 - doneActions for WK02 - hkjh <br/> '),
(30, 'sasa', 'sasas', 'select one', 'resolved', 'admin', '2016-02-01', '22:48:21', '2016-02-01', '22:50:26', 'admin', 'Actions for WK04 - asdasdas <br/> Actions for WK05 - asdasdasdsad <br/> '),
(31, 'test', 'fdsdf', 'Medium', 'resolved', 'admin', '2016-02-01', '22:49:59', '2016-02-01', '22:50:09', 'admin', ' <br/> '),
(32, 'another issue 3', 'ljlkjlk', 'Medium', 'resolved', 'admin', '2016-02-10', '17:24:59', '2016-02-10', '17:26:05', 'admin', 'Actions for WK06 - ouhjhkj <br/> kjkjbm <br/> '),
(33, 'another issue 2', 'dfgd', 'High', 'resolved', 'admin', '2016-02-10', '18:48:38', '2016-02-10', '18:54:27', 'admin', 'dfs <br/> '),
(34, 'wer', 'wer', 'Low', 'resolved', 'admin', '2016-02-10', '18:58:12', '2016-02-10', '18:58:25', 'admin', 'fgdf <br/> '),
(35, 'sddas', 'asdas', 'High', 'resolved', 'admin', '2016-02-10', '18:59:15', '2016-02-10', '18:59:26', 'admin', 'gsdfdsf <br/> '),
(36, 'another issue 2', 'sasa', 'Medium', 'resolved', 'admin', '2016-02-10', '19:00:27', '2016-02-10', '19:00:38', 'admin', 'sds <br/> '),
(37, 'another issue 3', 'asas', 'select one', 'resolved', 'admin', '2016-02-10', '19:02:09', '2016-02-10', '19:02:21', 'admin', 'asasa <br/> '),
(38, 'another issue 3', 'sdfsd', 'High', 'resolved', 'admin', '2016-02-10', '19:03:13', '2016-02-10', '19:03:31', 'admin', 'xfg <br/> '),
(39, 'another issue 2', 'asas', 'Medium', 'resolved', 'admin', '2016-02-10', '19:06:39', '2016-02-10', '19:16:23', 'admin', 'Actions for WK08 - dsdfsdfs <br/> Actions for WK08 -  <br/> xvxc <br/> '),
(40, 'regdfg', 'dfgdf', 'Medium', 'resolved', 'admin', '2016-02-12', '09:18:46', '2016-02-12', '09:19:12', 'admin', 'jhgjh\n <br/> '),
(41, 'another issue 2', 'asda', 'Medium', 'resolved', 'admin', '2016-02-12', '09:42:11', '2016-02-12', '11:46:59', 'admin', 'Actions for WK02 - nothing <br/> Actions for WK02 - dfgdfg <br/> Actions for WK05 - fsdfsdf <br/> '),
(42, 'test isssue', 'test description', 'Medium', 'resolved', 'admin', '2016-02-21', '15:03:42', '2016-02-22', '10:07:22', 'admin', 'test action <br/> '),
(43, 'dfsfs', 'sdfsd', 'Low', 'resolved', 'test', '2016-02-28', '10:40:28', '2016-02-28', '10:50:26', 'admin', ' <br/> '),
(44, 'dfsfs', 'dadsdas', 'Low', 'open', 'test', '2016-02-28', '10:49:15', '0000-00-00', '00:00:00', '', ''),
(45, 'dfsfs', 'defsdf', 'Medium', 'open', 'admin', '2016-03-05', '11:28:26', '0000-00-00', '00:00:00', '', '');

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
  `closed_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `issue_id` (`issue_id`,`computer_code`,`closed_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

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
(41, 29, 'WK02', 'resolved', '2016-02-10', '19:04:55', 'admin'),
(42, 30, 'WK04', 'resolved', '2016-02-01', '22:50:22', 'admin'),
(43, 30, 'WK05', 'resolved', '2016-02-01', '22:50:25', 'admin'),
(44, 32, 'WK02', 'resolved', '2016-02-10', '17:26:05', 'admin'),
(45, 32, 'WK04', 'resolved', '2016-02-10', '17:26:05', 'admin'),
(46, 32, 'WK06', 'resolved', '2016-02-10', '17:26:05', 'admin'),
(47, 33, 'WK09', 'resolved', '2016-02-10', '18:54:27', 'admin'),
(48, 34, 'WK05', 'resolved', '2016-02-10', '18:58:25', 'admin'),
(49, 35, 'WK06', 'resolved', '2016-02-10', '18:59:27', 'admin'),
(50, 36, 'WK07', 'resolved', '2016-02-10', '19:00:38', 'admin'),
(51, 37, 'WK04', 'resolved', '2016-02-10', '19:02:21', 'admin'),
(52, 38, 'WK02', 'resolved', '2016-02-10', '19:03:31', 'admin'),
(53, 39, 'WK08', 'resolved', '2016-02-10', '19:16:23', 'admin'),
(54, 40, 'WK05', 'resolved', '2016-02-12', '09:19:12', 'admin'),
(55, 41, 'WK02', 'resolved', '2016-02-12', '11:44:17', 'admin'),
(56, 41, 'WK05', 'resolved', '2016-02-12', '11:46:59', 'admin'),
(57, 42, 'WK01', 'resolved', '2016-02-22', '10:07:22', 'admin'),
(58, 44, 'WK03', 'open', '0000-00-00', '00:00:00', NULL),
(59, 45, 'WK06', 'open', '0000-00-00', '00:00:00', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `location_history`
--

INSERT INTO `location_history` (`id`, `computer_id`, `location`, `created_by`, `created_date`) VALUES
(2, 'WK02', 'LAB01', 'admin', '2016-01-28'),
(3, 'WK02', 'LAB02', 'admin', '2016-01-28'),
(4, 'WK08', 'LAB02', 'admin', '2016-01-28'),
(5, 'WK08', 'LAB01', 'admin', '2016-01-28'),
(6, 'WK09', 'LAB02', 'admin', '2016-01-30'),
(7, 'WK08', 'LAB09', 'admin', '2016-01-30'),
(8, 'WK02', 'LAB09', 'admin', '2016-02-12'),
(9, 'WK01', 'LAB09', 'admin', '2016-02-12'),
(10, 'WK01', 'LAB01', 'admin', '2016-02-12'),
(11, 'WK01', 'LAB09', 'admin', '2016-02-12'),
(12, 'WK01', 'LAB01', 'admin', '2016-02-12'),
(13, 'WK01', 'LAB09', 'admin', '2016-02-12'),
(14, 'WK01', 'LAB01', 'admin', '2016-02-12'),
(15, 'WK01', 'LAB09', 'admin', '2016-02-12'),
(16, 'WK01', 'LAB01', 'admin', '2016-02-12'),
(17, 'WK01', 'LAB09', 'admin', '2016-02-12'),
(18, 'WK01', 'LAB01', 'admin', '2016-02-12'),
(19, 'WK01', 'LAB09', 'admin', '2016-02-12'),
(20, 'WK01', 'LAB01', 'admin', '2016-02-12'),
(21, 'WK10', 'LAB02', 'admin', '2016-02-12'),
(22, 'WK01', 'LAB09', 'admin', '2016-02-12'),
(23, 'WK05', 'LAB02', 'admin', '2016-02-20'),
(24, 'WK05', 'LAB09', 'admin', '2016-02-20'),
(25, 'WK11', 'LAB01', 'admin', '2016-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE IF NOT EXISTS `room_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_code` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `special_devices` varchar(255) NOT NULL,
  `projector` varchar(5) NOT NULL DEFAULT '0',
  `projector_screen` varchar(5) NOT NULL DEFAULT '0',
  `status` varchar(15) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `room_code` (`room_code`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `room_details`
--

INSERT INTO `room_details` (`id`, `room_code`, `description`, `special_devices`, `projector`, `projector_screen`, `status`, `created_date`, `created_by`) VALUES
(1, 'LAB01', 'Computer Lab 1', 'n/a', '1', '', 'active', '2016-01-30', 'admin'),
(2, 'LAB09', 'Computer Lab #9', '', '0', '0', 'active', '2016-01-30', 'admin'),
(3, 'LAB02', 'Computer Lab #2', 'sdf', '0', '0', 'active', '2016-01-30', 'admin'),
(5, 'LEC01', 'Lecture Room 1', '', '0', '0', 'disabled', '2016-01-30', 'admin'),
(6, 'sdf', 'Lecture Room 5', 'n/a', '1', '0', 'active', '2016-02-20', 'admin'),
(7, 'sdfsdc', 'asda', 'Router, switch, some other special device, ksdjf lskdjfsl lksdj flksdf', '1', '1', 'active', '2016-02-20', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `used_inventory_items`
--

CREATE TABLE IF NOT EXISTS `used_inventory_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `computer_code` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `created_by` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `used_inventory_items`
--

INSERT INTO `used_inventory_items` (`id`, `item_id`, `computer_code`, `created_date`, `created_time`, `created_by`) VALUES
(6, 0, 'WK01', '2016-02-05', '21:52:49', 'admin'),
(7, 0, 'WK01', '2016-02-05', '21:52:27', 'admin'),
(8, 7, 'WK02', '2016-02-05', '21:56:25', 'admin'),
(9, 7, 'WK02', '2016-02-05', '21:56:31', 'admin'),
(10, 7, 'WK02', '2016-02-05', '21:58:08', 'admin'),
(11, 7, 'WK03', '2016-02-05', '22:04:31', 'admin'),
(12, 7, 'WK05', '2016-02-05', '22:04:37', 'admin'),
(13, 7, 'WK06', '2016-02-05', '22:04:41', 'admin'),
(14, 7, 'WK05', '2016-02-05', '22:04:46', 'admin'),
(15, 4, 'WK08', '2016-02-07', '18:35:56', 'admin'),
(16, 6, 'WK03', '2016-02-10', '17:21:54', 'admin'),
(17, 3, 'WK01', '2016-02-20', '12:36:00', 'admin'),
(18, 3, 'WK01', '2016-02-20', '12:36:45', 'admin'),
(19, 3, 'WK01', '2016-02-20', '12:37:32', 'admin'),
(20, 8, 'WK05', '2016-02-20', '12:44:35', 'admin'),
(21, 7, 'WK05', '2016-02-20', '12:45:47', 'admin'),
(22, 7, 'WK05', '2016-02-20', '12:46:22', 'admin'),
(23, 7, 'WK05', '2016-02-20', '12:46:38', 'admin'),
(24, 7, 'WK05', '2016-02-20', '12:47:40', 'admin'),
(25, 9, 'WK05', '2016-02-20', '12:48:23', 'admin'),
(26, 5, 'WK05', '2016-02-20', '12:48:50', 'admin');

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
(14, '32', 'test', 'aaa', 'active', '2016-01-25', NULL),
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
