-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2019 at 02:25 PM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` enum('male','female') CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL DEFAULT 'general',
  `status` enum('active','pending','deleted','') NOT NULL DEFAULT 'pending',
  `authtoken` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_user`
--
INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`, `mobile`, `designation`, `image`, `type`, `status`, `authtoken`) VALUES
(1, 'System', 'Administrator', 'lim@sbit.edu.my', '202cb962ac59075b964b07152d234b70', 'male', '0166808076', 'Admin and Account cum Course Coordinator', '', 'administrator', 'active', ''),
(5, 'Richard', 'Chong', 'richard@sbit.edu.my', '202cb962ac59075b964b07152d234b70', 'male', '0192828055', 'Head of Department (Software Engineering)', '', 'administrator', 'active', '73f66749989c7b09389894f1b27daa7387f9956fa51c87c1ba4fc4684b91acb5'),
(6, 'Dave', 'Chew', 'dave@sbit.edu.my', '202cb962ac59075b964b07152d234b70', 'male', '0182126167', 'Software Engineer', '', 'general', 'active', '73f66749989c7b09389894f1b27daa736156fbd08795da8955fb36cf730f2fb0'),
(7, 'Chevie', 'Chew', 'chevie@sbit.edu.my', '202cb962ac59075b964b07152d234b70', 'female', '0123456789', 'Software Engineer', '', 'general', 'active', '73f66749989c7b09389894f1b27daa738d2775af2555b0d1ed582212a3991144'),
(8, 'Song Yuan', 'Chai', 'csong571@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '0129840614', 'P10200896', '', 'general', 'active', '73f66749989c7b09389894f1b27daa73220ed0d9d85068f20de25911cb28e75e'),
(9, 'Surhen', 'Mariappan', 'surhen01@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '011-5173 0480', 'P02200859', '', 'general', 'active', '73f66749989c7b09389894f1b27daa73d247b51735a18cfd45b179ee5b3e1626');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


