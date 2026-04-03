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
-- Table structure for table `sms_students`
--

DROP TABLE IF EXISTS `sms_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sms_students` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `photo` varchar(40) DEFAULT NULL,
  `mobile` int unsigned NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `current_address` varchar(40) DEFAULT NULL,
  `permanent_address` varchar(40) DEFAULT NULL,
  `father_name` varchar(255) NOT NULL,
  `father_mobile` int unsigned NOT NULL,
  `father_occupation` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `mother_mobile` int unsigned NOT NULL,
  `admission_no` int NOT NULL,
  `roll_no` int NOT NULL,
  `class` int unsigned NOT NULL,
  `section` int NOT NULL,
  `stream` int unsigned DEFAULT NULL,
  `hostel` int unsigned DEFAULT NULL,
  `admission_date` varchar(255) NOT NULL,
  `category` int unsigned DEFAULT NULL,
  `academic_year` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_students`
--

LOCK TABLES `sms_students` WRITE;
/*!40000 ALTER TABLE `sms_students` DISABLE KEYS */;
INSERT INTO `sms_students` VALUES (3,'Smith','male','0000-00-00','1559480265cat-2083492_960_720.jpg',123456789,'smith@test.com','xyxz',NULL,'jhone smith',0,'','Diana smith',0,1234567,654378,2,1,NULL,NULL,'0000-00-00',NULL,2019),(4,'jaeeme khan','male','22/06/1992','1559480508phpzag.gif',123456789,'jaeeme@test.com','New delhi india',NULL,'',0,'','',0,12345678,67891,3,2,NULL,NULL,'02/06/2019',NULL,2019),(5,'Root','male','22/06/1992','1560685652password reset with php.png',0,'root@gmail.com','',NULL,'',0,'','',0,123456789,3532552,2,1,NULL,NULL,'02/06/2019',NULL,2019),(6,'William','male','22/06/1994','1560686427cat-2083492_960_720.jpg',0,'william@test.com','',NULL,'',0,'','',0,2147483647,2147483647,2,1,NULL,NULL,'16/06/2019',NULL,2019),(7,'Stokes','male','22/06/1996','1560687168cat-2083492_960_720.jpg',0,'stokes@test.com','',NULL,'',0,'','',0,553252525,1234554363,4,4,NULL,NULL,'16/06/2019',NULL,2019);
/*!40000 ALTER TABLE `sms_students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-23 18:43:44
