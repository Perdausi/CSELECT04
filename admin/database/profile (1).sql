-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2025 at 03:58 PM
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
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `course` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `profile_picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `name`, `address`, `age`, `gender`, `course`, `status`, `citizenship`, `profile_picture`) VALUES
(1, 'Hairul, Perdausi O.', 'LA, Recodo Zamboanga City', '23', '', '', 'taken', 'filipino', ''),
(3, 'Dano, Radzma B.', 'Dacon, Zamboanga City', '22', '', '', 'Taken', 'Tausug', ''),
(7, 'adidas', 'recodo', '23', '', '', 'sad', 'Tausug', ''),
(8, 'Dano, Radzma B.', 'Putik', '20', '', '', 'Taken', 'Tausug', '../uploads/1740580376_formal-pic.jpg'),
(9, 'perdausi', 'recodo', '23', '', '', 'Taken', 'Tausug', '../uploads/1740580526_formal-pic2.jpg'),
(12, 'adidas', 'recodo', '23', 'Female', 'BSIT', 'sadasdas', 'Tausug', '../uploads/1740581844_111.jpg'),
(13, 'asfafa', 'Recodo', '23', 'Male', 'BSIT', 'sadasdas', 'asd', '../uploads/1740581899_abcde.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
