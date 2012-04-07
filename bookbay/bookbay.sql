-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2012 at 07:29 PM
-- Server version: 5.5.22
-- PHP Version: 5.3.10-1ubuntu2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookbay`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `semester_used` int(4) NOT NULL,
  `course` varchar(40) NOT NULL,
  `cost` int(5) NOT NULL,
  `tags` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `created_by`, `name`, `semester_used`, `course`, `cost`, `tags`) VALUES
(1, 'saket.kumar', 'dsa', 1, '2', 32, '3');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(19) NOT NULL,
  `department` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `value`, `department`) VALUES
(1, 'AERO', 'Aerospace Engineering'),
(2, 'BioSchool', 'BioSchool'),
(3, 'CESE', 'Centre for Environmental Science and Engineering'),
(4, 'CSE', 'Computer Science and Engineering'),
(5, 'CHEM', 'Chemistry'),
(7, 'CHE', 'Chemical Engineering'),
(8, 'CIVIL', 'Civil Engineering'),
(9, 'COR', 'Corrosion Science and Engineering'),
(10, 'CSRE', 'CSRE'),
(11, 'EE', 'Electrical Engineering'),
(12, 'ESE ', 'Environmental Science and Engineering'),
(13, 'HSS', 'Humanities and Social Sciences'),
(14, 'GEOS', 'Earth Sciences'),
(15, 'IDC', 'IDC'),
(16, 'MATH', 'Mathematics'),
(17, 'ME', 'Mechanical Engineering'),
(18, 'MET', 'Metallurgical Engineering and Material Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`) VALUES
(1, 'The title', 'This is the post body.', '2012-03-24 10:30:07', NULL),
(3, 'Title strikes back', 'This is really exciting! Not.', '2012-03-24 10:30:09', NULL),
(4, 'this is tes', 'dsa', '2012-03-24 17:02:35', '2012-03-24 17:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `year_of_study` int(2) NOT NULL,
  `department` varchar(50) NOT NULL,
  `hostel` varchar(4) NOT NULL,
  `room` int(4) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alt_email` varchar(100) NOT NULL,
  `number_of_books_posted` int(10) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `last_featured_at` datetime NOT NULL,
  `last_book_posted_at` datetime NOT NULL,
  `last_book_donated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `last_login_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `year_of_study`, `department`, `hostel`, `room`, `mobile`, `email`, `alt_email`, `number_of_books_posted`, `is_featured`, `last_featured_at`, `last_book_posted_at`, `last_book_donated_at`, `created_at`, `last_login_at`) VALUES
(1, 'username', '', 0, '', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'saket.kumar', 'Saket Kumar Choudhary', 3, 'CHE', 'H', 101, 101, 'saket.kumar@iitb.ac.in', 'saketkc@gmail.com', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
