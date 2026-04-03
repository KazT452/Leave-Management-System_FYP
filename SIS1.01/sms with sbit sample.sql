-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 04:13 AM
-- Server version: 8.0.20
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--
CREATE DATABASE IF NOT EXISTS `sms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `sms`;

-- --------------------------------------------------------

--
-- Table structure for table `sms_attendance`
--

DROP TABLE IF EXISTS `sms_attendance`;
CREATE TABLE IF NOT EXISTS `sms_attendance` (
  `attendance_id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `class_id` int NOT NULL,
  `section_id` int NOT NULL,
  `attendance_status` int NOT NULL,
  `attendance_date` varchar(255) NOT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_attendance`
--

INSERT INTO `sms_attendance` (`attendance_id`, `student_id`, `class_id`, `section_id`, `attendance_status`, `attendance_date`) VALUES
(1, 6, 2, 1, 1, '2019/06/22'),
(2, 5, 2, 1, 4, '2019/06/22'),
(3, 3, 2, 1, 3, '2019/06/22'),
(4, 7, 4, 4, 3, '2019/06/22');

-- --------------------------------------------------------

--
-- Table structure for table `sms_classes`
--

DROP TABLE IF EXISTS `sms_classes`;
CREATE TABLE IF NOT EXISTS `sms_classes` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `section` varchar(255) NOT NULL,
  `teacher_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_classes`
--

INSERT INTO `sms_classes` (`id`, `name`, `section`, `teacher_id`) VALUES
(5, 'FP501 \"BW\"', '5', 1),
(6, 'FP501 \"DC\"', '6', 1),
(7, 'PF111 \"GG\"', '8', 1),
(8, 'FP501 \"CW\"', '7', 1),
(9, 'WD111 \"KK\"', '9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_section`
--

DROP TABLE IF EXISTS `sms_section`;
CREATE TABLE IF NOT EXISTS `sms_section` (
  `section_id` int NOT NULL AUTO_INCREMENT,
  `section` varchar(255) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_section`
--

INSERT INTO `sms_section` (`section_id`, `section`) VALUES
(5, 'Feb 19'),
(6, 'Apr & Jun 19'),
(7, 'Aug & Oct 19'),
(8, 'Dec 19 & Feb 20'),
(9, 'Apr 20');

-- --------------------------------------------------------

--
-- Table structure for table `sms_students`
--

DROP TABLE IF EXISTS `sms_students`;
CREATE TABLE IF NOT EXISTS `sms_students` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `photo` varchar(40) DEFAULT NULL,
  `mobile` int UNSIGNED NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `current_address` varchar(40) DEFAULT NULL,
  `permanent_address` varchar(40) DEFAULT NULL,
  `father_name` varchar(255) NOT NULL,
  `father_mobile` int UNSIGNED NOT NULL,
  `father_occupation` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `mother_mobile` int UNSIGNED NOT NULL,
  `admission_no` int NOT NULL,
  `roll_no` int NOT NULL,
  `class` int UNSIGNED NOT NULL,
  `section` int NOT NULL,
  `stream` int UNSIGNED DEFAULT NULL,
  `hostel` int UNSIGNED DEFAULT NULL,
  `admission_date` varchar(255) NOT NULL,
  `category` int UNSIGNED DEFAULT NULL,
  `academic_year` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_students`
--

INSERT INTO `sms_students` (`id`, `name`, `gender`, `dob`, `photo`, `mobile`, `email`, `current_address`, `permanent_address`, `father_name`, `father_mobile`, `father_occupation`, `mother_name`, `mother_mobile`, `admission_no`, `roll_no`, `class`, `section`, `stream`, `hostel`, `admission_date`, `category`, `academic_year`) VALUES
(3, 'Brandon', 'male', '0000-00-00', '1592914440boy_100x100.jpg', 123456789, 'smith@test.com', 'xyxz', NULL, 'jhone smith', 0, '', 'Diana smith', 0, 1234567, 654378, 5, 5, NULL, NULL, '0000-00-00', NULL, 2019),
(4, 'Dave', 'male', '22/06/1992', '1592916905boy_100x100.jpg', 123456789, 'jaeeme@test.com', 'New delhi india', NULL, '', 0, '', '', 0, 12345678, 67891, 6, 6, NULL, NULL, '02/06/2019', NULL, 2019),
(5, 'Surhen', 'male', '22/06/1992', '1592915385boy_100x100.jpg', 0, 'root@gmail.com', '', NULL, '', 0, '', '', 0, 123456789, 3532552, 7, 8, NULL, NULL, '02/06/2019', NULL, 2020),
(6, 'ChangWang', 'male', '22/06/1994', '1592916020boy_100x100.jpg', 0, 'william@test.com', '', NULL, '', 0, '', '', 0, 2147483647, 2147483647, 8, 7, NULL, NULL, '16/06/2019', NULL, 2019),
(7, 'Kee', 'male', '22/06/1996', '1592916124boy_100x100.jpg', 0, 'stokes@test.com', '', NULL, '', 0, '', '', 0, 553252525, 1234554363, 9, 9, NULL, NULL, '16/06/2019', NULL, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `sms_subjects`
--

DROP TABLE IF EXISTS `sms_subjects`;
CREATE TABLE IF NOT EXISTS `sms_subjects` (
  `subject_id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `code` int NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_subjects`
--

INSERT INTO `sms_subjects` (`subject_id`, `subject`, `type`, `code`) VALUES
(1, 'WD111 - HTML & CSS', 'Theory', 111),
(5, 'WD122 - Bootstrap', 'Theory', 122),
(6, 'PF113 - Programming Fundamentals in C#', 'Theory', 113),
(7, 'FP501 - Final Year Project', 'Theory', 501);

-- --------------------------------------------------------

--
-- Table structure for table `sms_teacher`
--

DROP TABLE IF EXISTS `sms_teacher`;
CREATE TABLE IF NOT EXISTS `sms_teacher` (
  `teacher_id` int NOT NULL AUTO_INCREMENT,
  `teacher` varchar(255) NOT NULL,
  `subject_id` int NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_teacher`
--

INSERT INTO `sms_teacher` (`teacher_id`, `teacher`, `subject_id`) VALUES
(1, 'Richard', 1),
(2, 'David', 2),
(3, 'Steven', 3),
(5, 'Malathi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sms_user`
--

DROP TABLE IF EXISTS `sms_user`;
CREATE TABLE IF NOT EXISTS `sms_user` (
  `id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` enum('male','female') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL DEFAULT 'general',
  `status` enum('active','pending','deleted','') NOT NULL DEFAULT 'pending',
  `authtoken` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_user`
--

INSERT INTO `sms_user` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`, `mobile`, `designation`, `image`, `type`, `status`, `authtoken`) VALUES
(1, 'System', 'Administrator', 'lim@sbit.edu.my', '202cb962ac59075b964b07152d234b70', 'male', '0166808076', 'Admin and Account cum Course Coordinator', '', 'administrator', 'active', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
