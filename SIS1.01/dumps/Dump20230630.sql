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
-- Table structure for table `sis_attendance`
--

DROP TABLE IF EXISTS `sis_attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sis_attendance` (
  `attendance_id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `class_id` int NOT NULL,
  `section_id` int NOT NULL,
  `attendance_status` int NOT NULL,
  `attendance_date` date NOT NULL,
  `check_in` time DEFAULT NULL,
  `check_out` time DEFAULT NULL,
  `score` double DEFAULT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sis_attendance`
--

LOCK TABLES `sis_attendance` WRITE;
/*!40000 ALTER TABLE `sis_attendance` DISABLE KEYS */;
INSERT INTO `sis_attendance` VALUES (87,26,34,22,3,'2023-06-06',NULL,NULL,0),(88,27,35,24,1,'2023-06-12',NULL,NULL,1);
/*!40000 ALTER TABLE `sis_attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sis_class_session`
--

DROP TABLE IF EXISTS `sis_class_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sis_class_session` (
  `class_id` int unsigned NOT NULL,
  `session_id` int unsigned NOT NULL,
  PRIMARY KEY (`class_id`,`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sis_class_session`
--

LOCK TABLES `sis_class_session` WRITE;
/*!40000 ALTER TABLE `sis_class_session` DISABLE KEYS */;
INSERT INTO `sis_class_session` VALUES (24,11),(26,1),(27,26),(27,28),(28,27),(29,1),(30,1),(32,28),(34,26),(35,1);
/*!40000 ALTER TABLE `sis_class_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sis_class_subject`
--

DROP TABLE IF EXISTS `sis_class_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sis_class_subject` (
  `class_id` int NOT NULL,
  `subject_id` int NOT NULL,
  PRIMARY KEY (`class_id`,`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sis_class_subject`
--

LOCK TABLES `sis_class_subject` WRITE;
/*!40000 ALTER TABLE `sis_class_subject` DISABLE KEYS */;
INSERT INTO `sis_class_subject` VALUES (26,206),(27,211),(28,115),(29,205),(30,202),(32,211),(35,108);
/*!40000 ALTER TABLE `sis_class_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sis_designation`
--

DROP TABLE IF EXISTS `sis_designation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sis_designation` (
  `designation_id` int NOT NULL AUTO_INCREMENT,
  `designation_name` varchar(45) NOT NULL,
  PRIMARY KEY (`designation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sis_designation`
--

LOCK TABLES `sis_designation` WRITE;
/*!40000 ALTER TABLE `sis_designation` DISABLE KEYS */;
INSERT INTO `sis_designation` VALUES (1,'admin'),(2,'staff'),(3,'teacher'),(4,'student'),(5,'parent');
/*!40000 ALTER TABLE `sis_designation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sis_program_subject`
--

DROP TABLE IF EXISTS `sis_program_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sis_program_subject` (
  `program_id` int unsigned NOT NULL,
  `subject_id` int unsigned NOT NULL,
  PRIMARY KEY (`program_id`,`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sis_program_subject`
--

LOCK TABLES `sis_program_subject` WRITE;
/*!40000 ALTER TABLE `sis_program_subject` DISABLE KEYS */;
INSERT INTO `sis_program_subject` VALUES (3,101),(3,102),(3,103),(3,104),(3,105),(3,106),(3,107),(3,108),(3,109),(3,110),(3,111),(3,112),(3,113),(3,115),(4,202),(4,205),(4,206),(4,211);
/*!40000 ALTER TABLE `sis_program_subject` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `sis_session`
--

DROP TABLE IF EXISTS `sis_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sis_session` (
  `session_id` int unsigned NOT NULL AUTO_INCREMENT,
  `session` varchar(255) NOT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sis_session`
--

LOCK TABLES `sis_session` WRITE;
/*!40000 ALTER TABLE `sis_session` DISABLE KEYS */;
INSERT INTO `sis_session` VALUES (1,'full time (morning)','09:00:00','12:00:00'),(2,'full time (afternoon)','13:00:00','16:00:00'),(3,'full time (evening)','19:30:00','22:30:00'),(5,'part time (morning)','09:00:00','12:00:00'),(6,'part time (afternoon)','13:00:00','16:00:00'),(7,'part time (evening)','19:30:00','22:30:00'),(10,'academic training','08:30:00','18:00:00'),(11,'full time working hours','08:30:00','18:00:00'),(26,'FYP-DSG (morning on Fridays)','10:00:00','12:00:00'),(27,'FYP-DSE (afternoon Fridays)','14:00:00','16:00:00'),(28,'FYP-DSG (morning on Fridays) Mar\'23','10:00:00','12:00:00');
/*!40000 ALTER TABLE `sis_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sis_student_class`
--

DROP TABLE IF EXISTS `sis_student_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sis_student_class` (
  `student_id` int NOT NULL,
  `class_id` int NOT NULL,
  `status` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`student_id`,`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sis_student_class`
--

LOCK TABLES `sis_student_class` WRITE;
/*!40000 ALTER TABLE `sis_student_class` DISABLE KEYS */;
INSERT INTO `sis_student_class` VALUES (18,26,'Passed'),(18,27,'Current'),(18,29,'Passed'),(18,30,'Passed'),(19,26,'Passed'),(19,27,'Current'),(19,29,'Passed'),(21,26,'Passed'),(21,32,'Current'),(23,32,'Current');
/*!40000 ALTER TABLE `sis_student_class` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `sis_teacher`
--

DROP TABLE IF EXISTS `sis_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sis_teacher` (
  `teacher_id` int NOT NULL AUTO_INCREMENT,
  `teacher` varchar(255) NOT NULL,
  `program_id` int NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sis_teacher`
--

LOCK TABLES `sis_teacher` WRITE;
/*!40000 ALTER TABLE `sis_teacher` DISABLE KEYS */;
INSERT INTO `sis_teacher` VALUES (3,'Chong Ssu Hong (Richard)',4),(32,'Richard Chong',3),(33,'Dr. Ng Liang Shing',4);
/*!40000 ALTER TABLE `sis_teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sis_time`
--

DROP TABLE IF EXISTS `sis_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sis_time` (
  `start` time NOT NULL,
  `end` time NOT NULL,
  PRIMARY KEY (`start`,`end`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sis_time`
--

LOCK TABLES `sis_time` WRITE;
/*!40000 ALTER TABLE `sis_time` DISABLE KEYS */;
INSERT INTO `sis_time` VALUES ('09:00:00','12:00:00'),('10:00:00','12:00:00'),('13:00:00','16:00:00'),('14:00:00','16:00:00'),('19:30:00','22:30:00');
/*!40000 ALTER TABLE `sis_time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sis_user_student`
--

DROP TABLE IF EXISTS `sis_user_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sis_user_student` (
  `user_id` int unsigned NOT NULL,
  `student_id` int unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sis_user_student`
--

LOCK TABLES `sis_user_student` WRITE;
/*!40000 ALTER TABLE `sis_user_student` DISABLE KEYS */;
INSERT INTO `sis_user_student` VALUES (6,6),(7,7),(8,8),(9,5),(10,9),(16,16),(17,17),(22,18),(23,19),(24,20),(25,21),(26,22),(27,23),(28,24),(29,25),(30,26),(31,27);
/*!40000 ALTER TABLE `sis_user_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms_classes`
--

DROP TABLE IF EXISTS `sms_classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sms_classes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `section` varchar(255) NOT NULL,
  `teacher_id` int NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_classes`
--

LOCK TABLES `sms_classes` WRITE;
/*!40000 ALTER TABLE `sms_classes` DISABLE KEYS */;
INSERT INTO `sms_classes` VALUES (24,'DSE-FYP','15',32,'2022-01-01',NULL),(26,'PL431','19',3,'2023-03-30','2023-05-08'),(27,'SP441','13',3,'2023-02-03',NULL),(28,'SP241','13',32,'2023-02-03',NULL),(29,'DS411','13',3,'2023-02-07','2023-02-28'),(30,'AI411','14',33,'2022-08-09','2022-08-22'),(32,'SP441','19',3,NULL,NULL),(33,'SP441','22',3,NULL,NULL),(34,'DSG-FYP','22',3,NULL,NULL),(35,'Mar 22 Bootstrap DSE','24',3,NULL,NULL);
/*!40000 ALTER TABLE `sms_classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms_section`
--

DROP TABLE IF EXISTS `sms_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sms_section` (
  `section_id` int NOT NULL AUTO_INCREMENT,
  `section` varchar(255) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_section`
--

LOCK TABLES `sms_section` WRITE;
/*!40000 ALTER TABLE `sms_section` DISABLE KEYS */;
INSERT INTO `sms_section` VALUES (13,'Feb\'23'),(14,'Aug\'22'),(15,'Jan\'22'),(16,'Jan\'23'),(17,'Feb\'22'),(18,'Nov\'22'),(19,'Mar\'23'),(20,'May\'22'),(21,'Nov\'21'),(22,'May\'23'),(23,'Jun\'23'),(24,'Mar\'22');
/*!40000 ALTER TABLE `sms_section` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_students`
--

LOCK TABLES `sms_students` WRITE;
/*!40000 ALTER TABLE `sms_students` DISABLE KEYS */;
INSERT INTO `sms_students` VALUES (3,'Brandon Lee','male','0000-00-00','1592914440boy_100x100.jpg','123456789','smith@test.com','xyxz',NULL,'jhone smith','0','','Diana smith','0','1234567',-1234567,5,5,NULL,NULL,'0000-00-00',NULL,2019),(5,'Surhendren a/l Mariappan','male','28/11/2001','1606980365Surhendren aL Mariappan.jpg','011-51730480','surhen01@gmail.com','11,Jalan Mawar 2b,Taman puchong perdana,47100,Puchong\r\n',NULL,'Mariappan a/l Chelliah','0','','Kamalavalli a/l Mooken','0','P02200859',-2200859,23,8,NULL,NULL,'25/02/2020',NULL,2020),(6,'Chew Seng Hong (Dave)','male','22/06/1992','1592916905boy_100x100.jpg','123456789','jaeeme@test.com','New delhi india',NULL,'','0','','','0','12345678',-12345678,6,6,NULL,NULL,'02/06/2019',NULL,2019),(7,'Chevie','female','22/06/1996','1606983131woman_203x201.jpg','0123456789','chevie@sbit.edu.my','',NULL,'','0','','','0','553252525',-553252525,13,9,NULL,NULL,'16/06/2019',NULL,2019),(8,'Chai Song Yuan','male','-','1606892595boy_100x100.jpg','0129840614','csong571@gmail.com','-',NULL,'-',NULL,NULL,'-',NULL,'P10200896',-10200896,13,10,NULL,NULL,'-',NULL,2020),(9,'Phing Way Shing','male','21/06/1985','1606981964Phing Way Shing.jpg','0126831052','alienphing5891@gmail.com','7, JLN SR 4/12, TMN SERDANG RAYA, 43300 SERI KEMBANGAN, SELANGOR.',NULL,'PHING AH CHOY',NULL,NULL,'CHEN LAI YOONG',NULL,'P02200860',-2200860,23,8,NULL,NULL,'25/02/2020',NULL,2019),(10,'Lee Meng Hou','male','11/25/2000','1604843644Lee Meng Hou.jpg','0176254883','acid_4ever@outlook.com','30,JALAN BELATOK 3 PUCHONG JAYA',NULL,'Lee soon weng',NULL,NULL,'Lee yoke lin',NULL,'P04200857',-4200857,23,8,NULL,NULL,'25/02/2020',NULL,2019),(11,'Goh Kai Wei','male','09/12/2001','1604844160Goh Kai Wei.jpg','0163771033','Kaiweigoh0912@gmail.com','58 jalan Besar 31450 menglembu ipoh perak',NULL,'Goh Han Yee',NULL,NULL,'Koo Lai Voon',NULL,'P12190850',-12190850,23,8,NULL,NULL,'25/02/2020',NULL,2019),(16,'Wong Jun Ren','male','09/16/2003','1682577876boy_100x100.jpg','60143229550','wongjunren.111@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P01220982					',1220982,24,15,NULL,NULL,'01/17/2022',NULL,2022),(17,'Chook Kean Wei','male','','1682578881boy_100x100.jpg','010108140857','chookkeanwei@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P10200898',10200898,24,15,NULL,NULL,'04/19/2021',NULL,2021),(18,'Low Ben Hau','male','12/22/1995','1682615060boy_100x100.jpg','012-3831473','lobenhau@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P11210971					',11210971,26,14,NULL,NULL,'08/01/2022',NULL,2022),(19,'Wan Yee Him','male','','1682615552boy_100x100.jpg','016-9216773','wanyeehim316@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P01220980',1220980,26,18,NULL,NULL,'09/01/2022',NULL,2022),(20,'Lee Ji Zheng','male','12/26/2002','1682616074boy_100x100.jpg','018-2071368','jizheng533@gmail.com','',NULL,'',NULL,NULL,'LeeJiZhengMother 012-6751312',NULL,'P09210945',9210945,27,16,NULL,NULL,'01/01/2023',NULL,2023),(21,'Foong Kuo Kang','male','09/28/1991','1683258086WhatsApp Image 2023-05-05 at 11.39.09.jpeg','016-4261238','foongkuokang@gmail.com','No 27 Prsn Sg Pari, Timur 20 Tmn Mas Falim, 30100 Ipoh Perak',NULL,'Foong Yaw Kan 011-39576209',NULL,NULL,'Lim Chooi Hong 010-5697852',NULL,'P07221034',7221034,26,19,NULL,NULL,'03/28/2023',NULL,2023),(22,'Chang Kee Meng','male','','1682616669boy_100x100.jpg','012-2642933','KeeMeng5683@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P07221037',7221037,26,19,NULL,NULL,'03/01//2023',NULL,2023),(23,'Ting Jun Wei','male','','1682616790boy_100x100.jpg','011-17810355','junwei2831@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P07221038',7221038,26,19,NULL,NULL,'03/01/2023',NULL,2023),(24,'Low Sim Yi','female','','1682617025woman_203x201.jpg','016-6804429','simyi0202@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P07221035',7221035,26,19,NULL,NULL,'03/01/2023',NULL,2023),(25,'Moon Qiao Shen','male','10/16/2002','1682654682WhatsApp Image 2023-04-28 at 11.59.15.jpeg','011-62229635','sonicyt32102@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P02220998',2220998,27,17,NULL,NULL,'02/01/2022',NULL,2022),(26,'Soo Wai Neng','male','08/30/2002','1686017756','01110626028','soowaineng2002@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P01220981',1220981,34,22,NULL,NULL,'02/01/2022',NULL,2022),(27,'Ryan Oung','male','','1686539740','016-3922722','Ryan.oung22@gmail.com','',NULL,'',NULL,NULL,'',NULL,'P05221003',5221003,35,24,NULL,NULL,'03/01/2022',NULL,2023);
/*!40000 ALTER TABLE `sms_students` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `staff_info`
--

DROP TABLE IF EXISTS `staff_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `staff_id` int DEFAULT NULL,
  `position` int DEFAULT NULL,
  `job_title` varchar(45) DEFAULT NULL,
  `ext` int DEFAULT NULL,
  `home_number` varchar(45) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_info`
--

LOCK TABLES `staff_info` WRITE;
/*!40000 ALTER TABLE `staff_info` DISABLE KEYS */;
INSERT INTO `staff_info` VALUES (3,18,1,'General Manager',107,'012-3537611','','stephen@sbit.edu.my'),(4,21,2,'Manager',102,'012-3742331 / 012-3537637','','kit@sbit.edu.my'),(5,1,3,'Admin and Account Cum Course Coordinator',108,'016-6808076 / 012-3532185','','lim@sbit.edu.my'),(6,2,5,'Program Leader Cum Lecturer',205,'019-2828055','','richard@sbit.edu.my'),(7,20,4,'Training Cum IT Services Manager',106,'016-6134421 / 012-3532185','','david@sbit.edu.my'),(8,19,4,'Training Cum IT Services Executive',106,'016-2334063','','steven@sbit.edu.my');
/*!40000 ALTER TABLE `staff_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_position`
--

DROP TABLE IF EXISTS `staff_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff_position` (
  `position_id` int NOT NULL,
  `position_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_position`
--

LOCK TABLES `staff_position` WRITE;
/*!40000 ALTER TABLE `staff_position` DISABLE KEYS */;
INSERT INTO `staff_position` VALUES (1,'Human Resources'),(2,'Business Development'),(3,'Admin and Account Department'),(4,'IT Training & Services'),(5,'Software Engineering');
/*!40000 ALTER TABLE `staff_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_report`
--

DROP TABLE IF EXISTS `staff_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff_report` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `staff_id` int DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `start_time` varchar(20) DEFAULT NULL,
  `end_time` varchar(20) DEFAULT NULL,
  `command` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_report`
--

LOCK TABLES `staff_report` WRITE;
/*!40000 ALTER TABLE `staff_report` DISABLE KEYS */;
INSERT INTO `staff_report` VALUES (1,2,'2020-12-31','14:46','02:47','123'),(2,2,'2020-12-31','02:52','02:53','123'),(3,2,'2020-12-31','14:27','14:27','123'),(4,2,'2020-12-31','15:43','15:44','123'),(5,2,'0000-00-00','02:24','02:25','123'),(6,2,'2021-01-01','02:31','02:32','123'),(7,2,'2021-01-01','02:44','02:45','123'),(8,2,'2021-01-01','03:25','03:26','123'),(9,2,'2021-01-01','23:57','23:57','123'),(10,2,'2021-01-07','00:23','00:23','123'),(11,2,'2021-01-13','03:21','03:35','123'),(12,2,'2021-01-17','16:00','16:30','testing'),(13,2,'2021-01-17','16:25','16:27','testing'),(14,2,'2021-06-14','03:08','04:08','Daily Report'),(15,2,'2023-04-19','03:08	','04:08','Meeting');
/*!40000 ALTER TABLE `staff_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `gender` enum('male','female') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `mobile` varchar(20) NOT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `type` varchar(250) NOT NULL DEFAULT 'general',
  `status` enum('active','pending','deleted','') NOT NULL DEFAULT 'pending',
  `authtoken` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'System','Administrator','lim@sbit.edu.my','202cb962ac59075b964b07152d234b70','male','0166808076','1','man_291x393.jpg','administrator','active',''),(2,'Richard','Chong','richard@sbit.edu.my','202cb962ac59075b964b07152d234b70','male','019-2828055','3','168023431923.png','administrator','active','73f66749989c7b09389894f1b27daa7387f9956fa51c87c1ba4fc4684b91acb5'),(6,'Dave','Chew','dave@sbit.edu.my','202cb962ac59075b964b07152d234b70','male','0182126167','4','1672385490dark.jpg','general','pending','73f66749989c7b09389894f1b27daa736156fbd08795da8955fb36cf730f2fb0'),(7,'Chevie','Chew','chevie@sbit.edu.my','202cb962ac59075b964b07152d234b70','female','0123456789','4','1606983131woman_203x201.jpg','general','pending','73f66749989c7b09389894f1b27daa738d2775af2555b0d1ed582212a3991144'),(8,'Rexter','Chai','csong571@gmail.com','202cb962ac59075b964b07152d234b70','male','0123456789','4','1606892595boy_100x100.jpg','general','pending','73f66749989c7b09389894f1b27daa73220ed0d9d85068f20de25911cb28e75e'),(9,'Surhendren a/l','Mariappan','surhen01@gmail.com','202cb962ac59075b964b07152d234b70','male','011-51730480','4','1606980365Surhendren aL Mariappan.jpg','general','pending','73f66749989c7b09389894f1b27daa73d247b51735a18cfd45b179ee5b3e1626'),(10,'Phing Way Shing','Phing','alienphing5891@gmail.com','202cb962ac59075b964b07152d234b70','male','0126831052','4','1606981964Phing Way Shing.jpg','general','pending','73f66749989c7b09389894f1b27daa736fdc3023c0805b0a332574d3ddb4b161'),(16,'Jun Ren','Wong','wongjunren.111@gmail.com','202cb962ac59075b964b07152d234b70','male','014-3229550','4','1682577876boy_100x100.jpg','general','active','73f66749989c7b09389894f1b27daa739dab377be8d4566f9b87fb0f44d903ab'),(17,'Kean Wei','Chook','chookkeanwei@gmail.com','202cb962ac59075b964b07152d234b70','male','016-2788681','4','1682578881boy_100x100.jpg','general','active','73f66749989c7b09389894f1b27daa7323dab3461d8fcb0756079c4c1d825345'),(18,'Dr. Stephen','Ong','stephen@sbit.edu.my','202cb962ac59075b964b07152d234b70','male','012-3537611','1',NULL,'administrator','active','73f66749989c7b09389894f1b27daa734bbf7fbebb63cb083901c5559854286f'),(19,'Steven','Tan Tsen Waye','steven@sbit.edu.my','202cb962ac59075b964b07152d234b70','male','016-2334063','3',NULL,'general','active','73f66749989c7b09389894f1b27daa732f3cd1956b2833bf1703c6ee4effc213'),(20,'David','Tan Tsen Yong','david@sbit.edu.my','202cb962ac59075b964b07152d234b70','male','016-6134421','3',NULL,'administrator','active','73f66749989c7b09389894f1b27daa739ef682a703df2c02409d7002868e770f'),(21,'Terrance','Lee Voon Keat','kit@sbit.edu.my','202cb962ac59075b964b07152d234b70','male','012-3742331','2',NULL,'administrator','active','73f66749989c7b09389894f1b27daa737a7d8b55acfcc32ef0f58bdeb8651cb1'),(22,'Low Ben Hau','','lobenhau@gmail.com','202cb962ac59075b964b07152d234b70','male','012-3831473','4','1682615060boy_100x100.jpg','general','active','73f66749989c7b09389894f1b27daa73f89dd3c16ca2e2e4611551cbbd331bf4'),(23,'Wan Yee Him','','wanyeehim316@gmail.com','202cb962ac59075b964b07152d234b70','male','016-9216773','4','1682615552boy_100x100.jpg','general','active','73f66749989c7b09389894f1b27daa73f8303cac170dcabd8f47d01ffa0bc50d'),(24,'Lee Ji Zheng','','jizheng533@gmail.com','202cb962ac59075b964b07152d234b70','male','018-2071368','4','1682616074boy_100x100.jpg','general','active','73f66749989c7b09389894f1b27daa7339ad2768b433869944800657ec9a9be9'),(25,'Foong Kuo Kang','','foongkuokang@gmail.com','202cb962ac59075b964b07152d234b70','male','016-4261238','4','1683258086WhatsApp Image 2023-05-05 at 11.39.09.jpeg','general','active','73f66749989c7b09389894f1b27daa739fa83f959f5258bf292a4dd157d8e456'),(26,'Chang Kee Meng','','KeeMeng5683@gmail.com','202cb962ac59075b964b07152d234b70','male','012-2642933','4','1682616669boy_100x100.jpg','general','active','73f66749989c7b09389894f1b27daa734a1f93adf7cee9177cb548c42b2e3c62'),(27,'Ting Jun Wei','','junwei2831@gmail.com','202cb962ac59075b964b07152d234b70','male','011-17810355','4','1682616790boy_100x100.jpg','general','active','73f66749989c7b09389894f1b27daa73aca79d9097dea55bff5f0269c8ddf76d'),(28,'Low Sim Yi','','simyi0202@gmail.com','202cb962ac59075b964b07152d234b70','female','016-6804429','4','1682617025woman_203x201.jpg','general','active','73f66749989c7b09389894f1b27daa73161e8241a2c3ff116f0638f9043a12fc'),(29,'Moon Qiao Shen','','sonicyt32102@gmail.com','202cb962ac59075b964b07152d234b70','male','011-62229635','4','1682654682WhatsApp Image 2023-04-28 at 11.59.15.jpeg','general','active','73f66749989c7b09389894f1b27daa73ce5f79539bf0b47f5bcfcdb67fa1d203'),(30,'Soo Wai Neng','','soowaineng2002@gmail.com','202cb962ac59075b964b07152d234b70','male','01110626028','4','1686017756','general','active','73f66749989c7b09389894f1b27daa734bc1874a8ea61cab0fe1a7a6f0267f62'),(31,'Ryan Oung','','Ryan.oung22@gmail.com','202cb962ac59075b964b07152d234b70','male','016-3922722','4','1686539740','general','active','73f66749989c7b09389894f1b27daa730d3fd407a1957f93258817eeaf1b03a2');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `v_students`
--

DROP TABLE IF EXISTS `v_students`;
/*!50001 DROP VIEW IF EXISTS `v_students`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_students` AS SELECT 
 1 AS `student_id`,
 1 AS `name`,
 1 AS `mobile`,
 1 AS `email`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_user`
--

DROP TABLE IF EXISTS `v_user`;
/*!50001 DROP VIEW IF EXISTS `v_user`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_user` AS SELECT 
 1 AS `id`,
 1 AS `first_name`,
 1 AS `last_name`,
 1 AS `designation`,
 1 AS `type`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_students`
--

/*!50001 DROP VIEW IF EXISTS `v_students`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_students` AS select `sms_students`.`id` AS `student_id`,`sms_students`.`name` AS `name`,`sms_students`.`mobile` AS `mobile`,`sms_students`.`email` AS `email` from `sms_students` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_user`
--

/*!50001 DROP VIEW IF EXISTS `v_user`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_user` AS select `user`.`id` AS `id`,`user`.`first_name` AS `first_name`,`user`.`last_name` AS `last_name`,`user`.`designation` AS `designation`,`user`.`type` AS `type`,`user`.`status` AS `status` from `user` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-30  4:58:34
