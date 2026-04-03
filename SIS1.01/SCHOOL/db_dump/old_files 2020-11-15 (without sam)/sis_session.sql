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
-- Table structure for table `sis_session`
--

CREATE TABLE `sis_session` (
  `session_id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sis_session`
--

INSERT INTO `sis_session` (`session_id`,`session`,`start`,`end`) VALUES
(1, 'full time (morning)','1000-01-01 09:00:00','1000-01-01 12:00:00'),
(2, 'full time (afternoon)','1000-01-01 13:30:00','1000-01-01 16:30:00'),
(3, 'full time (evening)',NULL,NULL),
(4, 'full time (whole day)','1000-01-01 09:00:00','1000-01-01 16:30:00'),
(5, 'part time (morning)','1000-01-01 09:00:00','1000-01-01 12:00:00'),
(6, 'part time (afternoon)','1000-01-01 13:30:00','1000-01-01 16:30:00'),
(7, 'part time (evening)',NULL,NULL),
(8, 'part time (whole day)','1000-01-01 09:00:00','1000-01-01 16:30:00'),
(9, 'final year project',NULL,NULL),
(10, 'academic training','1000-01-01 08:30:00','1000-01-01 18:00:00'),
(11, 'full time working hours','1000-01-01 08:30:00','1000-01-01 18:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sis_session`
--
ALTER TABLE `sis_session`
  ADD PRIMARY KEY (`session_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sis_session`
--
ALTER TABLE `sis_session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
