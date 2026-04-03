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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'System','Administrator','lim@sbit.edu.my','202cb962ac59075b964b07152d234b70','male','0166808076','1','man_291x393.jpg','administrator','active',''),(2,'Richard','Chong','richard@sbit.edu.my','202cb962ac59075b964b07152d234b70','male','019-2828055','3','168023431923.png','administrator','active','73f66749989c7b09389894f1b27daa7387f9956fa51c87c1ba4fc4684b91acb5'),(6,'Dave','Chew','dave@sbit.edu.my','202cb962ac59075b964b07152d234b70','male','0182126167','4','1672385490dark.jpg','general','pending','73f66749989c7b09389894f1b27daa736156fbd08795da8955fb36cf730f2fb0'),(7,'Chevie','Chew','chevie@sbit.edu.my','202cb962ac59075b964b07152d234b70','female','0123456789','4','1606983131woman_203x201.jpg','general','pending','73f66749989c7b09389894f1b27daa738d2775af2555b0d1ed582212a3991144'),(8,'Rexter','Chai','csong571@gmail.com','202cb962ac59075b964b07152d234b70','male','0123456789','4','1606892595boy_100x100.jpg','general','pending','73f66749989c7b09389894f1b27daa73220ed0d9d85068f20de25911cb28e75e'),(9,'Surhendren a/l','Mariappan','surhen01@gmail.com','202cb962ac59075b964b07152d234b70','male','011-51730480','4','1606980365Surhendren aL Mariappan.jpg','general','pending','73f66749989c7b09389894f1b27daa73d247b51735a18cfd45b179ee5b3e1626'),(10,'Phing Way Shing','Phing','alienphing5891@gmail.com','202cb962ac59075b964b07152d234b70','male','0126831052','4','1606981964Phing Way Shing.jpg','general','pending','73f66749989c7b09389894f1b27daa736fdc3023c0805b0a332574d3ddb4b161'),(16,'Jun Ren','Wong','wongjunren.111@gmail.com','202cb962ac59075b964b07152d234b70','male','014-3229550','4','1682577876boy_100x100.jpg','general','active','73f66749989c7b09389894f1b27daa739dab377be8d4566f9b87fb0f44d903ab'),(17,'Kean Wei','Chook','chookkeanwei@gmail.com','202cb962ac59075b964b07152d234b70','male','016-2788681','4','1682578881boy_100x100.jpg','general','active','73f66749989c7b09389894f1b27daa7323dab3461d8fcb0756079c4c1d825345'),(18,'Dr. Stephen','Ong','stephen@sbit.edu.my','202cb962ac59075b964b07152d234b70','male','012-3537611','1',NULL,'administrator','active','73f66749989c7b09389894f1b27daa734bbf7fbebb63cb083901c5559854286f'),(19,'Steven','Tan Tsen Waye','steven@sbit.edu.my','202cb962ac59075b964b07152d234b70','male','016-2334063','3',NULL,'general','active','73f66749989c7b09389894f1b27daa732f3cd1956b2833bf1703c6ee4effc213'),(20,'David','Tan Tsen Yong','david@sbit.edu.my','202cb962ac59075b964b07152d234b70','male','016-6134421','3',NULL,'administrator','active','73f66749989c7b09389894f1b27daa739ef682a703df2c02409d7002868e770f'),(21,'Terrance','Lee Voon Keat','kit@sbit.edu.my','202cb962ac59075b964b07152d234b70','male','012-3742331','2',NULL,'administrator','active','73f66749989c7b09389894f1b27daa737a7d8b55acfcc32ef0f58bdeb8651cb1'),(22,'Low Ben Hau','','lobenhau@gmail.com','202cb962ac59075b964b07152d234b70','male','012-3831473','4','1682615060boy_100x100.jpg','general','active','73f66749989c7b09389894f1b27daa73f89dd3c16ca2e2e4611551cbbd331bf4'),(23,'Wan Yee Him','','wanyeehim316@gmail.com','202cb962ac59075b964b07152d234b70','male','016-9216773','4','1682615552boy_100x100.jpg','general','active','73f66749989c7b09389894f1b27daa73f8303cac170dcabd8f47d01ffa0bc50d'),(24,'Lee Ji Zheng','','jizheng533@gmail.com','202cb962ac59075b964b07152d234b70','male','018-2071368','4','1682616074boy_100x100.jpg','general','active','73f66749989c7b09389894f1b27daa7339ad2768b433869944800657ec9a9be9'),(25,'Foong Kuo Kang','','foongkuokang@gmail.com','202cb962ac59075b964b07152d234b70','male','016-4261238','4','1683258086WhatsApp Image 2023-05-05 at 11.39.09.jpeg','general','active','73f66749989c7b09389894f1b27daa739fa83f959f5258bf292a4dd157d8e456'),(26,'Chang Kee Meng','','KeeMeng5683@gmail.com','202cb962ac59075b964b07152d234b70','male','012-2642933','4','1682616669boy_100x100.jpg','general','active','73f66749989c7b09389894f1b27daa734a1f93adf7cee9177cb548c42b2e3c62'),(27,'Ting Jun Wei','','junwei2831@gmail.com','202cb962ac59075b964b07152d234b70','male','011-17810355','4','1682616790boy_100x100.jpg','general','active','73f66749989c7b09389894f1b27daa73aca79d9097dea55bff5f0269c8ddf76d'),(28,'Low Sim Yi','','simyi0202@gmail.com','202cb962ac59075b964b07152d234b70','female','016-6804429','4','1682617025woman_203x201.jpg','general','active','73f66749989c7b09389894f1b27daa73161e8241a2c3ff116f0638f9043a12fc'),(29,'Moon Qiao Shen','','sonicyt32102@gmail.com','202cb962ac59075b964b07152d234b70','male','011-62229635','4','1682654682WhatsApp Image 2023-04-28 at 11.59.15.jpeg','general','active','73f66749989c7b09389894f1b27daa73ce5f79539bf0b47f5bcfcdb67fa1d203'),(30,'Soo Wai Neng','','soowaineng2002@gmail.com','202cb962ac59075b964b07152d234b70','male','01110626028','4','1686017756','general','active','73f66749989c7b09389894f1b27daa734bc1874a8ea61cab0fe1a7a6f0267f62');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
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
