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
-- Table structure for table `sis_programs`
--

DROP TABLE IF EXISTS `sis_programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sis_programs` (
  `program_id` int NOT NULL AUTO_INCREMENT,
  `program` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `code` int NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sis_programs`
--

LOCK TABLES `sis_programs` WRITE;
/*!40000 ALTER TABLE `sis_programs` DISABLE KEYS */;
INSERT INTO `sis_programs` VALUES (1,'DIP : Professional Diploma in IT Support','Practical',1),(2,'DIT : Professional Degree in IT Support','Practical',2),(3,'DSE : Professional Diploma in Software Engineering','Theory',3),(4,'DSG : Professional Degree in Software Engineering','Theory',4),(5,'DIP-PT : (Part-Time) Professional Diploma in IT Support','Practical',5),(6,'DIT-PT : (Part-Time) Professional Degree in IT Support','Practical',6),(7,'DSE-PT : (Part-Time) Professional Diploma in Software Engineering','Theory',7),(8,'DSG-PT : (Part-Time) Professional Degree in Software Engineering','Theory',8),(9,'(Short Course) IT Support','Practical',9),(10,'(Short Course) Software Engineering','Theory',10),(11,'SKM : Malaysian Skills Certificate - Computer System Operation','Practical',11),(12,'DVP : Professional Diploma in Videogame Programming','Theory',12);
/*!40000 ALTER TABLE `sis_programs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-09 12:15:06
