CREATE DATABASE  IF NOT EXISTS `sms` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sms`;
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_students`
--

LOCK TABLES `sms_students` WRITE;
/*!40000 ALTER TABLE `sms_students` DISABLE KEYS */;
INSERT INTO `sms_students` VALUES (3,'Brandon Lee','male','0000-00-00','1592914440boy_100x100.jpg','123456789','smith@test.com','xyxz',NULL,'jhone smith','0','','Diana smith','0','1234567',-1234567,5,5,NULL,NULL,'0000-00-00',NULL,2019),(5,'Surhendren a/l Mariappan','male','28/11/2001','1606980365Surhendren aL Mariappan.jpg','011-51730480','surhen01@gmail.com','11,Jalan Mawar 2b,Taman puchong perdana,47100,Puchong\r\n',NULL,'Mariappan a/l Chelliah','0','','Kamalavalli a/l Mooken','0','P02200859',-2200859,23,8,NULL,NULL,'25/02/2020',NULL,2020),(6,'Chew Seng Hong (Dave)','male','22/06/1992','1592916905boy_100x100.jpg','123456789','jaeeme@test.com','New delhi india',NULL,'','0','','','0','12345678',-12345678,6,6,NULL,NULL,'02/06/2019',NULL,2019),(7,'Chevie','female','22/06/1996','1606983131woman_203x201.jpg','0123456789','chevie@sbit.edu.my','',NULL,'','0','','','0','553252525',-553252525,13,9,NULL,NULL,'16/06/2019',NULL,2019),(8,'Chai Song Yuan','male','-','1606892595boy_100x100.jpg','0129840614','csong571@gmail.com','-',NULL,'-',NULL,NULL,'-',NULL,'P10200896',-10200896,13,10,NULL,NULL,'-',NULL,2020),(9,'Phing Way Shing','male','21/06/1985','1606981964Phing Way Shing.jpg','0126831052','alienphing5891@gmail.com','7, JLN SR 4/12, TMN SERDANG RAYA, 43300 SERI KEMBANGAN, SELANGOR.',NULL,'PHING AH CHOY',NULL,NULL,'CHEN LAI YOONG',NULL,'P02200860',-2200860,23,8,NULL,NULL,'25/02/2020',NULL,2019),(10,'Lee Meng Hou','male','11/25/2000','1604843644Lee Meng Hou.jpg','0176254883','acid_4ever@outlook.com','30,JALAN BELATOK 3 PUCHONG JAYA',NULL,'Lee soon weng',NULL,NULL,'Lee yoke lin',NULL,'P04200857',-4200857,23,8,NULL,NULL,'25/02/2020',NULL,2019),(11,'Goh Kai Wei','male','09/12/2001','1604844160Goh Kai Wei.jpg','0163771033','Kaiweigoh0912@gmail.com','58 jalan Besar 31450 menglembu ipoh perak',NULL,'Goh Han Yee',NULL,NULL,'Koo Lai Voon',NULL,'P12190850',-12190850,23,8,NULL,NULL,'25/02/2020',NULL,2019),(16,'Wong Jun Ren','male','09/16/2003','1682577876boy_100x100.jpg','60143229550','wongjunren.111@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P01220982					',1220982,24,15,NULL,NULL,'01/17/2022',NULL,2022),(17,'Chook Kean Wei','male','','1682578881boy_100x100.jpg','010108140857','chookkeanwei@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P10200898',10200898,24,15,NULL,NULL,'04/19/2021',NULL,2021),(18,'Low Ben Hau','male','12/22/1995','1682615060boy_100x100.jpg','012-3831473','lobenhau@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P11210971					',11210971,26,14,NULL,NULL,'08/01/2022',NULL,2022),(19,'Wan Yee Him','male','','1682615552boy_100x100.jpg','016-9216773','wanyeehim316@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P01220980',1220980,27,18,NULL,NULL,'09/01/2022',NULL,2022),(20,'Lee Ji Zheng','male','12/26/2002','1682616074boy_100x100.jpg','018-2071368','jizheng533@gmail.com','',NULL,'',NULL,NULL,'LeeJiZhengMother 012-6751312',NULL,'P09210945',9210945,27,16,NULL,NULL,'01/01/2023',NULL,2023),(21,'Foong Kuo Kang','male','','1682616557boy_100x100.jpg','016-4261238','foongkuokang@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P07221034',7221034,26,19,NULL,NULL,'03/01/2023',NULL,2023),(22,'Chang Kee Meng','male','','1682616669boy_100x100.jpg','012-2642933','KeeMeng5683@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P07221037',7221037,26,19,NULL,NULL,'03/01//2023',NULL,2023),(23,'Ting Jun Wei','male','','1682616790boy_100x100.jpg','011-17810355','junwei2831@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P07221038',7221038,26,19,NULL,NULL,'03/01/2023',NULL,2023),(24,'Low Sim Yi','female','','1682617025woman_203x201.jpg','016-6804429','simyi0202@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P07221035',7221035,26,19,NULL,NULL,'03/01/2023',NULL,2023),(25,'Moon Qiao Shen','male','10/16/2002','1682654682WhatsApp Image 2023-04-28 at 11.59.15.jpeg','011-62229635','sonicyt32102@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P02220998',2220998,27,17,NULL,NULL,'02/01/2022',NULL,2022);
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

-- Dump completed on 2023-05-05  5:06:18
