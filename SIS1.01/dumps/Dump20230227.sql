--CREATE DATABASE  IF NOT EXISTS sms /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION=N */;
--USE sms;
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
/*!40103 SET TIME_ZONE=+00:00 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE=NO_AUTO_VALUE_ON_ZERO */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table kai_exam
--




--


--
-- Table structure for table user
--

CREATE TABLE sms.user (
  id int NOT NULL ,
  first_name varchar(50) NOT NULL,
  last_name varchar(50) NOT NULL,
  email varchar(50) DEFAULT NULL,
  password varchar(50) NOT NULL,
  gender enum(male,female),
  mobile varchar(20) NOT NULL,
  designation varchar(20) DEFAULT NULL,
  image varchar(250) DEFAULT NULL,
  type varchar(250) NOT NULL DEFAULT general,
  status enum(active,pending,deleted,) NOT NULL DEFAULT pending,
  authtoken varchar(250) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table user
--

LOCK TABLES user WRITE;
/*!40000 ALTER TABLE user DISABLE KEYS */;
INSERT INTO user VALUES (1,System,Administrator,lim@sbit.edu.my,202cb962ac59075b964b07152d234b70,male,0166808076,1,man_291x393.jpg,administrator,active,),(5,Richard,Chong,richard@sbit.edu.my,202cb962ac59075b964b07152d234b70,male,0192828055,3,160689471162541337_100143417930041_4900051020328992768_n.jpg,general,active,73f66749989c7b09389894f1b27daa7387f9956fa51c87c1ba4fc4684b91acb5),(6,Dave,Chew,dave@sbit.edu.my,202cb962ac59075b964b07152d234b70,male,0182126167,4,1592916905boy_100x100.jpg,general,active,73f66749989c7b09389894f1b27daa736156fbd08795da8955fb36cf730f2fb0),(7,Chevie,Chew,chevie@sbit.edu.my,202cb962ac59075b964b07152d234b70,female,0123456789,4,1606983131woman_203x201.jpg,general,pending,73f66749989c7b09389894f1b27daa738d2775af2555b0d1ed582212a3991144),(8,Rexter,Chai,csong571@gmail.com,202cb962ac59075b964b07152d234b70,male,0123456789,4,1606892595boy_100x100.jpg,general,active,73f66749989c7b09389894f1b27daa73220ed0d9d85068f20de25911cb28e75e),(9,Surhendren a/l Mariappan,Mariappan,surhen01@gmail.com,202cb962ac59075b964b07152d234b70,male,011-5173 0480,student,1606980365Surhendren aL Mariappan.jpg,general,active,73f66749989c7b09389894f1b27daa73d247b51735a18cfd45b179ee5b3e1626),(10,Phing Way Shing,,alienphing5891@gmail.com,202cb962ac59075b964b07152d234b70,male,0126831052,4,1606981964Phing Way Shing.jpg,general,active,73f66749989c7b09389894f1b27daa736fdc3023c0805b0a332574d3ddb4b161),(15,Kee,,123@abc.com,202cb962ac59075b964b07152d234b70,male,001122334455,4,1606203778_boy_100x100.jpg,general,active,73f66749989c7b09389894f1b27daa7334b9f77d69a99c0ae8754092784e0d3f);
/*!40000 ALTER TABLE user ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-27 12:24:01
