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
-- Table structure for table `sms_subjects`
--

CREATE TABLE `sms_subjects` (
  `subject_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_subjects`
--

INSERT INTO `sms_subjects` (`subject_id`, `subject`, `type`, `code`) VALUES
(1, 'DIP - Diploma in IT Support (Full Time)', 'Practical', 1),
(2, 'DIP - Diploma in IT Support (Part Time)', 'Practical', 2),
(3, 'DSE - Diploma in Software Engineering (Full Time)', 'Theory', 3),
(4, 'DSE - Diploma in Software Engineering (Part Time)', 'Theory', 4),
(96, 'HD111 - Technical IT Support I (PC Assembly & Technology)', 'Practical', 96),
(97, 'SW111 - Technical IT Support II (OS installation)', 'Practical', 97),
(98, 'RW111 - Research Writing', 'Practical', 98),
(99, 'PS111 - Presentation Skiils', 'Practical', 99),
(101, 'WD111 - HTML and CSS', 'Theory', 101),
(102, 'WD122 - Bootstrap', 'Theory', 102),
(103, 'PF113 - Programming Fundamentals in C#', 'Theory', 103),
(104, 'SD111 - System Analysis and Design', 'Theory', 104),
(105, 'WD121 - JavaScript & JQuery', 'Theory', 105),
(106, 'DS111 - MySQL', 'Theory', 106),
(107, 'OP121 - Object Oriented Programming (C#)', 'Theory', 107),
(108, 'AP131 - Database Application Development I (C# + MySQL)', 'Theory', 108),
(109, 'MD121 - Mobile Application Development I (Android)', 'Theory', 109),
(110, 'AW121 - Advanced Web Application Design I (PHP + MySQL)', 'Theory', 110),
(111, 'PT141 - Academic Training (5 months)', 'Practical', 111),
(112, 'IT111 - Interview Training Program (3hrs) + Personality Test Review (3hrs)', 'Practical', 112),
(113, 'FYP - Final Year Project (3 Months)', 'Practical', 113);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sms_subjects`
--
ALTER TABLE `sms_subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sms_subjects`
--
ALTER TABLE `sms_subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
