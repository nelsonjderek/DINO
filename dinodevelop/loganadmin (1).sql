-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2013 at 07:50 PM
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

DROP TABLE IF EXISTS `LA_clients`;
CREATE TABLE IF NOT EXISTS `LA_clients` (
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
INSERT INTO `LA_clients` VALUES(4, 'Sonaarr', 'Derek', 'Nelson', '3851 Cliffside Pl #10', 'La Crosse', 54601, '', 0, 0, 0);
INSERT INTO `LA_clients` VALUES(6, 'Dino', 'Derek', 'Nelson', '3851 Cliffside Pl #10', 'La Crosse', 54601, '', 0, 0, 0);
INSERT INTO `LA_clients` VALUES(7, 'Olivia', 'Derek', 'Nelson', '3851 Cliffside Pl #10', 'La Crosse', 54601, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `LA_events`
--

DROP TABLE IF EXISTS `LA_events`;
CREATE TABLE IF NOT EXISTS `LA_events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(100) NOT NULL,
  `user` varchar(3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=150 ;

--
-- Dumping data for table `LA_events`
--

INSERT INTO `LA_events` VALUES(149, 'Viewed homepage', '8', '2013-03-21 05:41:12');
INSERT INTO `LA_events` VALUES(148, 'Viewed homepage', '8', '2013-03-21 05:40:15');
INSERT INTO `LA_events` VALUES(147, 'Viewed homepage', '8', '2013-03-21 05:34:31');
INSERT INTO `LA_events` VALUES(146, 'Viewed homepage', '8', '2013-03-21 05:32:14');
INSERT INTO `LA_events` VALUES(145, 'Viewed homepage', '8', '2013-03-21 05:30:51');
INSERT INTO `LA_events` VALUES(144, 'Viewed homepage', '8', '2013-03-21 05:30:01');
INSERT INTO `LA_events` VALUES(143, 'Viewed homepage', '8', '2013-03-21 05:29:57');
INSERT INTO `LA_events` VALUES(142, 'Viewed homepage', '8', '2013-03-21 05:29:30');
INSERT INTO `LA_events` VALUES(141, 'Viewed homepage', '8', '2013-03-21 05:29:09');
INSERT INTO `LA_events` VALUES(140, 'Viewed homepage', '8', '2013-03-21 05:28:43');
INSERT INTO `LA_events` VALUES(139, 'Viewed homepage', '8', '2013-03-21 05:28:18');
INSERT INTO `LA_events` VALUES(138, 'Viewed homepage', '8', '2013-03-21 05:28:01');
INSERT INTO `LA_events` VALUES(137, 'Viewed homepage', '8', '2013-03-21 05:27:47');
INSERT INTO `LA_events` VALUES(136, 'Viewed homepage', '8', '2013-03-21 05:27:29');
INSERT INTO `LA_events` VALUES(135, 'Viewed homepage', '8', '2013-03-21 05:25:28');
INSERT INTO `LA_events` VALUES(134, 'Viewed homepage', '8', '2013-03-21 05:24:59');
INSERT INTO `LA_events` VALUES(133, 'Viewed home', '8', '2013-03-21 05:24:30');
INSERT INTO `LA_events` VALUES(132, 'Viewed home', '8', '2013-03-21 05:24:24');
INSERT INTO `LA_events` VALUES(131, 'Viewed home', '8', '2013-03-21 05:24:09');
INSERT INTO `LA_events` VALUES(130, 'Logged In', '8', '2013-03-21 05:24:03');
INSERT INTO `LA_events` VALUES(129, 'Logged Out', '8', '2013-03-21 05:23:56');
INSERT INTO `LA_events` VALUES(128, 'Viewed home', '8', '2013-03-21 05:23:54');
INSERT INTO `LA_events` VALUES(127, 'Viewed home', '8', '2013-03-21 05:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `LA_user`
--

DROP TABLE IF EXISTS `LA_user`;
CREATE TABLE IF NOT EXISTS `LA_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `group_id` varchar(3) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `permission` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `LA_user`
--

INSERT INTO `LA_user` VALUES(1, 'admin', 'admin', '1', 'Derek', '1');
INSERT INTO `LA_user` VALUES(2, 'bob', '9a618248b64db62d15b300a07b00580b', '', '', '');
INSERT INTO `LA_user` VALUES(3, 'elizabeth.ward@sierraclub.org', 'wiwind', '2', 'Elizabeth', '2');
INSERT INTO `LA_user` VALUES(4, 'jennifer.feyerherm@sierraclub.org', 'wiwind', '2', 'Jennifer', '2');
INSERT INTO `LA_user` VALUES(5, 'holly.bressett@sierraclub.org', 'wiwind', '2', 'Holly', '3');
INSERT INTO `LA_user` VALUES(6, 'Chris.Wissemann@fishermensenergy.com', 'wiwind', '2', 'Chris', '3');
INSERT INTO `LA_user` VALUES(7, 'Lauren.Randall@sierraclub.org', 'wiwind', '2', 'Lauren', '3');
INSERT INTO `LA_user` VALUES(8, 'derek', 'derek', '2', 'Derek2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `LA_website`
--

DROP TABLE IF EXISTS `LA_website`;
CREATE TABLE IF NOT EXISTS `LA_website` (
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

DROP TABLE IF EXISTS `LC_login`;
CREATE TABLE IF NOT EXISTS `LC_login` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `domain` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LC_login`
--

INSERT INTO `LC_login` VALUES(1, 'dino', 'dino', '');
INSERT INTO `LC_login` VALUES(7, 'oil', 'oil', '');
