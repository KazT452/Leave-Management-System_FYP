-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: sms
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `sis_student_grades`
--

DROP TABLE IF EXISTS `sis_student_grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sis_student_grades` (
  `student_id` int NOT NULL,
  `class_id` int NOT NULL,
  `per_homework` float DEFAULT NULL,
  `per_participation` float DEFAULT NULL,
  `per_exam` float DEFAULT NULL,
  `per_project` float DEFAULT NULL,
  `sc_homework` float DEFAULT NULL,
  `sc_participation` float DEFAULT NULL,
  `sc_project` float DEFAULT NULL,
  `sc_exam` float DEFAULT NULL,
  `sc_exam_date` date DEFAULT NULL,
  `s2_exam` float DEFAULT NULL,
  `s2_exam_date` date DEFAULT NULL,
  `s3_exam` float DEFAULT NULL,
  `s3_exam_date` date DEFAULT NULL,
  PRIMARY KEY (`student_id`,`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sis_student_grades`
--

LOCK TABLES `sis_student_grades` WRITE;
/*!40000 ALTER TABLE `sis_student_grades` DISABLE KEYS */;
INSERT INTO `sis_student_grades` VALUES (18,29,10,10,80,NULL,10,10,NULL,76,'2023-02-28',NULL,NULL,NULL,NULL),(18,30,60,NULL,NULL,40,45.3,NULL,36,NULL,NULL,NULL,NULL,NULL,NULL),(19,29,10,10,80,NULL,10,NULL,NULL,77,'2023-02-28',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `sis_student_grades` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-09 12:15:05
