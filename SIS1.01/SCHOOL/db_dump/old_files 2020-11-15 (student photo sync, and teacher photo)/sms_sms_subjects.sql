CREATE DATABASE  IF NOT EXISTS `sms` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sms`;
-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sms
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `sms_subjects`
--

DROP TABLE IF EXISTS `sms_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sms_subjects` (
  `subject_id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `code` int NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_subjects`
--

LOCK TABLES `sms_subjects` WRITE;
/*!40000 ALTER TABLE `sms_subjects` DISABLE KEYS */;
INSERT INTO `sms_subjects` VALUES (96,'HD111 - Technical IT Support I (PC Assembly & Technology)','Practical',96),(97,'SW111 - Technical IT Support II (OS installation)','Practical',97),(98,'RW111 - Research Writing','Practical',98),(99,'PS111 - Presentation Skiils','Practical',99),(101,'WD111 - HTML and CSS','Theory',101),(102,'WD122 - Bootstrap','Theory',102),(103,'PF111 - Programming Fundamentals in C#','Theory',103),(104,'SD111 - System Analysis and Design','Theory',104),(105,'WD121 - JavaScript & JQuery','Theory',105),(106,'DS111 - MySQL','Theory',106),(107,'OP121 - Object Oriented Programming (C#)','Theory',107),(108,'AP131 - Database Application Development I (C# + MySQL)','Theory',108),(109,'MD121 - Mobile Application Development I (Android)','Theory',109),(110,'AW121 - Advanced Web Application Design I (PHP + MySQL)','Theory',110),(111,'PT141 - Academic Training (5 months)','Practical',111),(112,'IT111 - Interview Training Program (3hrs) + Personality Test Review (3hrs)','Practical',112),(113,'FP501 - Final Year Project (3 Months)','Practical',113);
/*!40000 ALTER TABLE `sms_subjects` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-19 19:28:50
