-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2012 at 08:49 PM
-- Server version: 5.5.22
-- PHP Version: 5.3.10-1ubuntu2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ispa`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(40) NOT NULL,
  `prof_name` varchar(100) NOT NULL,
  `project_title` varchar(200) NOT NULL,
  `project_description` text NOT NULL,
  `eligibility_criteria` varchar(200) NOT NULL,
  `duration` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `department`, `prof_name`, `project_title`, `project_description`, `eligibility_criteria`, `duration`) VALUES
(1, 'CHE', 'Title', 'teotroekroekro', 'nmalsndlsandla', 'ndlasndlksa', 'fansldnal'),
(2, 'EE', 'dsadsa', 'msakldmasl', 'dsakdsakdmsak', 'dskamdlksa', 'nmdslkadasl'),
(3, 'CHE', 'dsadasnmdka', 'dnsalkdnl', 'dnsaldnla', ' ndlsandl', 'nlasd');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ldap_id` varchar(40) NOT NULL,
  `department` varchar(40) NOT NULL,
  `preference1` varchar(40) NOT NULL,
  `preference2` varchar(40) NOT NULL,
  `preference3` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `ldap_id`, `department`, `preference1`, `preference2`, `preference3`) VALUES
(1, '1', '2', '3', '4', '5'),
(2, 'saket.kumar', 'CHE', '3', '1', '3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
