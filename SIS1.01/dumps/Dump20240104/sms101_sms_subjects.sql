CREATE DATABASE  IF NOT EXISTS `sms101` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sms101`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: sms101
-- ------------------------------------------------------
-- Server version	8.0.35

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
  `subject_id` int NOT NULL,
  `subject` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `code` int NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_subjects`
--

LOCK TABLES `sms_subjects` WRITE;
/*!40000 ALTER TABLE `sms_subjects` DISABLE KEYS */;
INSERT INTO `sms_subjects` VALUES (96,'HD111 - IT Support I - PC Hardware Technology and Assembly','Practical',96),(97,'SW111 - IT Support II - Windows OS Installation','Practical',97),(101,'RD111 - Soft Skill I - Research and Project Documentation Skill','Practical',101),(102,'PS211 - Soft Skill II - Presentation Skill','Practical',102),(103,'WF211 - Web Application Fundamentals - HTML, C#, MySQL','Theory',103),(104,'CP211 - C# Programming','Theory',104),(105,'WD211 - Web Application Design I - HTML5 and CSS3','Theory',105),(106,'DS211 - Relational Database Management System RDBMS - MySQL Database','Theory',106),(107,'WD221 - Web Application Design III - JavaScript and jQuery','Theory',107),(108,'WD222 - Bootstrap CSS Framework','Theory',108),(109,'SD211 - System Analysis and Design','Theory',109),(110,'MD211 - Android Application Development - Kotlin','Theory',110),(111,'OP211 - Object Oriented Programming - C#','Theory',111),(112,'AP231 - Application Development I - OOP, C# and MySQL','Theory',112),(113,'AW221 - Advanced Web Application Design - PHP and MySQL','Theory',113),(114,'SS211 - Interview Training Program (3hrs) + Personality Test Review (3hrs)','Practical',114),(115,'SP241 - Software Project (4 Months)','Practical',115),(116,'PT141 - Academic Training (5 months)','Practical',-116),(201,'SS411 - Softskill I - Action Learning and Learning Style','Practical',201),(202,'AI411 - Artificial Intelligence Fundamentals - Python','Theory',202),(203,'ML421 - Machine Learning Fundamentals - Python','Theory',203),(204,'CS411 - Cyber Security','Theory',204),(205,'DS411 - Database System - MS SQL','Theory',205),(206,'PL431 - Programming Fundamentals III - Java','Theory',206),(207,'PM411 - Project Management','Theory',207),(208,'ST411 - Software Testing','Theory',208),(209,'TE411 - Technopreneurship','Theory',209),(210,'AW421 - Advanced Web Application Design II - ReactJS','Theory',210),(211,'SP441 - Software Project and Thesis (5 Months)','Practical',211),(212,'SS412 - Softskill II - Interview Training Program','Practical',212),(213,'DI421 - Internship Training Program','Practical',213);
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

-- Dump completed on 2024-01-04  5:22:52
