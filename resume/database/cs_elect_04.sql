-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2025 at 11:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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

CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `course` varchar(200) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `isActive` varchar(100) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `profile_picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(17, 'test product', 'recodo', '23', 'Male', 'BSIT', 'I AM A SINGER', 'sadsad', 'inActive', 'sadas', '../uploads/1741172228_bg.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
