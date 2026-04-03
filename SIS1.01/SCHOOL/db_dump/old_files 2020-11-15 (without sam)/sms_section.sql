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
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `sms_section`
--

CREATE TABLE `sms_section` (
  `section_id` int(11) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_section`
--

INSERT INTO `sms_section` (`section_id`, `section`) VALUES 
(5,'Feb 19 (BW)'),
(6,'Apr 19 & Jun 19 (DC)'),
(7,'Aug 19 & Oct 19 (CW)'),
(8,'Dec 19 & Feb 20 (GG)'),
(9,'Dec 19 & Feb 20 & Apr 20 & May 20 & Jul 20 (GS)'),
(10,'Oct 20 (VB)'),
(11,'Apr 20 & May 20 & Jul 20 (SO)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sms_section`
--
ALTER TABLE `sms_section`
  ADD PRIMARY KEY (`section_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sms_section`
--
ALTER TABLE `sms_section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
