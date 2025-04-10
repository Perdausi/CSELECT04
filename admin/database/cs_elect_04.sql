-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 10, 2025 at 06:54 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs_elect_04`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

DROP TABLE IF EXISTS `admin_tbl`;
CREATE TABLE IF NOT EXISTS `admin_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

DROP TABLE IF EXISTS `awards`;
CREATE TABLE IF NOT EXISTS `awards` (
  `award_id` int(11) NOT NULL AUTO_INCREMENT,
  `award` varchar(200) NOT NULL,
  PRIMARY KEY (`award_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`award_id`, `award`) VALUES
(1, 'Best in Visual faces'),
(2, 'Best in Jealousy'),
(3, 'best in Attitude');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

DROP TABLE IF EXISTS `certificates`;
CREATE TABLE IF NOT EXISTS `certificates` (
  `cert_id` int(11) NOT NULL AUTO_INCREMENT,
  `certificate` varchar(200) NOT NULL,
  PRIMARY KEY (`cert_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`cert_id`, `certificate`) VALUES
(1, 'Certificate in Mobile Responsive');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
CREATE TABLE IF NOT EXISTS `education` (
  `educ_id` int(11) NOT NULL AUTO_INCREMENT,
  `attainment` varchar(200) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`educ_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`educ_id`, `attainment`, `school_name`, `description`) VALUES
(3, 'COLLEGE', 'LA SALLE DE MAGAY UNIVERSITY', 'HALE LUYA DE LA SALLE!!'),
(2, 'COLLEGE', 'ATENEO', 'GO GO GO!');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `exp_id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `dates` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`exp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`exp_id`, `position`, `company`, `dates`, `description`) VALUES
(1, 'Developer', 'Born Hub', '2025-03-22', 'Best Company in the World'),
(2, 'Frontend Dev', 'BeegTech.INC', '2025-04-10', 'Best Company in the World'),
(3, 'MERN-STACK DEV', 'Sunshine Company', '2025-05-01', 'Best Company in the World'),
(4, '', '', '', 'School that cares'),
(5, '', '', '', 'IGHUDFHGUIFD'),
(6, '', '', '', 'GO GO GO!'),
(7, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `course` varchar(200) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `isActive` varchar(100) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `profile_picture` varchar(200) NOT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `name`, `address`, `age`, `gender`, `course`, `description`, `status`, `isActive`, `citizenship`, `profile_picture`) VALUES
(1, 'Hairul, Perdausi O.', 'LA, Recodo Zamboanga City', '23', '', '', '', 'taken', '', 'filipino', ''),
(3, 'Dano, Radzma B.', 'Dacon, Zamboanga City', '22', '', '', '', 'Taken', '', 'Tausug', ''),
(7, 'adidas', 'recodo', '23', '', '', '', 'sad', '', 'Tausug', ''),
(8, 'Dano, Radzma B.', 'Putik', '20', '', '', '', 'Taken', '', 'Tausug', '../uploads/1740580376_formal-pic.jpg'),
(9, 'perdausi', 'recodo', '23', '', '', '', 'Taken', '', 'Tausug', '../uploads/1740580526_formal-pic2.jpg'),
(12, 'adidas', 'recodo', '23', 'Female', 'BSIT', '', 'sadasdas', '', 'Tausug', '../uploads/1740581844_111.jpg'),
(13, 'asfafa', 'Recodo', '23', 'Male', 'BSIT', '', 'sadasdas', '', 'asd', '../uploads/1740581899_abcde.png'),
(14, 'perdausi', 'recodo', 'Zamboanga City', 'Male', 'BSIT', '', 'single', '', 'Filopino', '../uploads/1741171153_CG114-removebg-preview.png'),
(15, 'Testing', 'test123', '23', 'Female', 'BSCS', 'i am a fully grown women you bitch!', 'single', '', 'Korean', '../uploads/1741171733_CG114.png'),
(16, 'JEFREY LOU', 'CALIFORNIYA', '25', 'Male', 'BSCS', 'I AM A SINGER', 'Taken', 'active', 'CALIFORNIAN', '../uploads/1741172137_download.png'),
(17, 'test product', 'recodo', '23', 'Male', 'BSIT', 'I AM A SINGER', 'sadsad', 'inActive', 'sadas', '../uploads/1741172228_bg.png'),
(18, 'Daniel Padilla', 'Recodo Zamboanga City', '19', 'Male', 'BSCS', 'passionate about everything you bitch!!f afisdfisdigsdfignf dsfgnisdnf dfbsd dighsd dsignsdig gdisgs', 'single', 'active', 'Filipino', '../uploads/1741669276_daniel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `skill` varchar(200) NOT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill`) VALUES
(1, 'Bootstrap'),
(2, 'HTML AND CSS'),
(3, 'java'),
(4, 'react'),
(5, 'mern stack'),
(6, 'javascript'),
(7, 'best in Attitude'),
(8, 'Best in Jealousy');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
