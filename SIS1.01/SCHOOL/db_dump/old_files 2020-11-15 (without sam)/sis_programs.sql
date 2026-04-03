-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2019 at 02:24 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: 'sms'
--

-- --------------------------------------------------------

--
-- Table structure for table `sis_programs`
--

CREATE TABLE `sis_programs` (
  `program_id` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sis_programs`
--

INSERT INTO `sis_programs` (`program_id`, `program`, `type`, `code`) VALUES
(1, 'DIP - Diploma in IT Support (Full Time)', 'Practical', 1),
(2, 'DIP - Diploma in IT Support (Part Time)', 'Practical', 2),
(3, 'DSE - Diploma in Software Engineering (Full Time)', 'Theory', 3),
(4, 'DSE - Diploma in Software Engineering (Part Time)', 'Theory', 4);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `sis_programs`
--
ALTER TABLE `sis_programs`
  ADD PRIMARY KEY (`program_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sis_programs`
--
ALTER TABLE `sis_programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
