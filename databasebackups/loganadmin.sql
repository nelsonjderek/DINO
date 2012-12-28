-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2012 at 02:25 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loganadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `LA_clients`
--

CREATE TABLE `LA_clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_name` text NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `zip` int(11) NOT NULL,
  `email` text NOT NULL,
  `p_phone` int(11) NOT NULL,
  `m_phone` int(11) NOT NULL,
  `e_phone` int(11) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `LA_clients`
--

INSERT INTO `LA_clients` VALUES(1, 'Cogitare', 'Mary', 'Ellen Kirby', '201 Main St (test)', 'Menominee', 53913, 'cogitarebooks@att.net', 999, 999, 9999);
INSERT INTO `LA_clients` VALUES(2, 'Medoire Herbs', 'Keirce', 'Hare', 'asdasd', 'Nofd', 53913, 'keirec@ggo.com', 999, 999, 9999);
INSERT INTO `LA_clients` VALUES(3, '', 'Derek', '', '', '', 0, '', 0, 0, 0);
INSERT INTO `LA_clients` VALUES(4, 'Sonaarr', 'Derek', 'Nelson', '3851 Cliffside Pl #10', 'La Crosse', 54601, '', 0, 0, 0);
INSERT INTO `LA_clients` VALUES(6, 'Dino', 'Derek', 'Nelson', '3851 Cliffside Pl #10', 'La Crosse', 54601, '', 0, 0, 0);
INSERT INTO `LA_clients` VALUES(7, 'Olivia', 'Derek', 'Nelson', '3851 Cliffside Pl #10', 'La Crosse', 54601, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `LA_user`
--

CREATE TABLE `LA_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `LA_user`
--

INSERT INTO `LA_user` VALUES(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `LA_website`
--

CREATE TABLE `LA_website` (
  `domain_name` text NOT NULL,
  `domain_provider` text NOT NULL,
  `provider_site` text NOT NULL,
  `provider_user` text NOT NULL,
  `provider_pass` text NOT NULL,
  `ftp_host` text NOT NULL,
  `ftp_user` text NOT NULL,
  `ftp_pass` text NOT NULL,
  `notes` text NOT NULL,
  `website_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`website_id`),
  UNIQUE KEY `client_id` (`client_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `LA_website`
--

INSERT INTO `LA_website` VALUES('http://www.medorieherbs.com', 'Wordpress.com', 'http://www.wordpress.com', '', '', '', '', '', 'To Be added', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `LC_login`
--

CREATE TABLE `LC_login` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `domain` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LC_login`
--

INSERT INTO `LC_login` VALUES(1, 'dino', 'dino', '');
INSERT INTO `LC_login` VALUES(7, 'oil', 'oil', '');
