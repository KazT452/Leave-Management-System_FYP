-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: sms
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
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
  `dob` varchar(255) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `current_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `father_mobile` varchar(20) DEFAULT NULL,
  `father_occupation` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `mother_mobile` varchar(20) DEFAULT NULL,
  `admission_no` varchar(20) DEFAULT NULL,
  `roll_no` int DEFAULT NULL,
  `class` int unsigned NOT NULL,
  `section` int NOT NULL,
  `stream` varchar(50) DEFAULT NULL,
  `hostel` varchar(255) DEFAULT NULL,
  `admission_date` varchar(255) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `academic_year` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_students`
--

LOCK TABLES `sms_students` WRITE;
/*!40000 ALTER TABLE `sms_students` DISABLE KEYS */;
INSERT INTO `sms_students` VALUES (3,'Brandon Lee','male','0000-00-00','1592914440boy_100x100.jpg','123456789','smith@test.com','xyxz',NULL,'jhone smith','0','','Diana smith','0','1234567',654378,5,5,NULL,NULL,'0000-00-00',NULL,2019),(4,'Chew Seng Hong (Dave)','male','22/06/1992','1592916905boy_100x100.jpg','123456789','jaeeme@test.com','New delhi india',NULL,'','0','','','0','12345678',67891,6,6,NULL,NULL,'02/06/2019',NULL,2019),(5,'Surhendren a/l Mariappan','male','28/11/2001','1606980365Surhendren aL Mariappan.jpg','011-5173 0480','surhen01@gmail.com','11,Jalan Mawar 2b,Taman puchong perdana,47100,Puchong\r\n',NULL,'Mariappan a/l Chelliah','0','','Kamalavalli a/l Mooken','0','P02200859',2200859,23,8,NULL,NULL,'25/02/2020',NULL,2020),(6,'ChangWang','male','22/06/1994','1592916020boy_100x100.jpg','0','william@test.com','',NULL,'','0','','','0','2147483647',2147483647,8,7,NULL,NULL,'16/06/2019',NULL,2019),(7,'Chevie','female','22/06/1996','1606983131woman_203x201.jpg','0123456789','chevie@sbit.edu.my','',NULL,'','0','','','0','553252525',1234554363,13,9,NULL,NULL,'16/06/2019',NULL,2019),(8,'Chai Song Yuan','male','-','1606892595boy_100x100.jpg','0129840614','csong571@gmail.com','-',NULL,'-',NULL,NULL,'-',NULL,'P10200896',0,13,10,NULL,NULL,'-',NULL,2020),(9,'Phing Way Shing','male','21/06/1985','1606981964Phing Way Shing.jpg','0126831052','alienphing5891@gmail.com','7, JLN SR 4/12, TMN SERDANG RAYA, 43300 SERI KEMBANGAN, SELANGOR.',NULL,'PHING AH CHOY',NULL,NULL,'CHEN LAI YOONG',NULL,'P02200860',2200860,23,8,NULL,NULL,'25/02/2020',NULL,2019),(10,'Lee Meng Hou','male','11/25/2000','1604843644Lee Meng Hou.jpg','0176254883','acid_4ever@outlook.com','30,JALAN BELATOK 3 PUCHONG JAYA',NULL,'Lee soon weng',NULL,NULL,'Lee yoke lin',NULL,'P04200857',4200857,23,8,NULL,NULL,'25/02/2020',NULL,2019),(11,'Goh Kai Wei','male','09/12/2001','1604844160Goh Kai Wei.jpg','0163771033','Kaiweigoh0912@gmail.com','58 jalan Besar 31450 menglembu ipoh perak',NULL,'Goh Han Yee',NULL,NULL,'Koo Lai Voon',NULL,'P12190850',12190850,23,8,NULL,NULL,'25/02/2020',NULL,2019),(15,'Kee','male','','1606203778_boy_100x100.jpg','001122334455','123@abc.com','',NULL,'',NULL,NULL,'',NULL,'12345678',2,23,8,NULL,NULL,'',NULL,2020);
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

-- Dump completed on 2021-05-28  3:10:47
