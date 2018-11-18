-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: jf_cars
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `sale_table`
--

DROP TABLE IF EXISTS `sale_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale_table` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_author` varchar(10) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `sale_price` float NOT NULL,
  `sale_summary` varchar(100) NOT NULL,
  `sale_add_date` datetime NOT NULL,
  `sale_complete_date` datetime DEFAULT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale_table`
--

LOCK TABLES `sale_table` WRITE;
/*!40000 ALTER TABLE `sale_table` DISABLE KEYS */;
INSERT INTO `sale_table` VALUES (1,'MS',1,5000,'MILTEK SPORTS EXHAUST, VXR TURBO, DUMP VALVE','2018-10-19 00:00:00',NULL),(5,'MS',4,3599,'','2018-11-01 00:00:00',NULL),(15,'admin',2,5000,'test','2018-11-05 21:42:21',NULL),(16,'admin',32,2599,'','2018-11-06 13:10:11',NULL),(17,'admin',33,5000,'','2018-11-06 13:22:42',NULL),(20,'admin',35,15000,'12345','2018-11-06 21:58:39',NULL),(21,'admin',34,5000,'FSH, EXCELLENT INTERIOR','2018-11-06 22:22:26',NULL),(23,'admin',38,15000,'AIR CONDITIONING','2018-11-17 20:18:48',NULL),(24,'admin',39,20000,'Hello wolrd','2018-11-18 10:34:03',NULL);
/*!40000 ALTER TABLE `sale_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_table`
--

DROP TABLE IF EXISTS `users_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_table` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_table`
--

LOCK TABLES `users_table` WRITE;
/*!40000 ALTER TABLE `users_table` DISABLE KEYS */;
INSERT INTO `users_table` VALUES (1,'admin','5f4dcc3b5aa765d61d8327deb882cf99');
/*!40000 ALTER TABLE `users_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_image_table`
--

DROP TABLE IF EXISTS `vehicle_image_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_image_table` (
  `vehicle_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `vehicle_image_url` text NOT NULL,
  `vehicle_image_priority` int(11) NOT NULL,
  `vehicle_cover_image` tinyint(1) NOT NULL DEFAULT '0',
  `vehicle_image_salt` varchar(100) NOT NULL,
  PRIMARY KEY (`vehicle_image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_image_table`
--

LOCK TABLES `vehicle_image_table` WRITE;
/*!40000 ALTER TABLE `vehicle_image_table` DISABLE KEYS */;
INSERT INTO `vehicle_image_table` VALUES (1,1,'SV03SVL_1.jpg',1,1,'VkFVWEhBTEwvQVNUUkEvU1YwM1NWTC9TVjAzU1ZMXzEuanBn'),(3,2,'ABC123_1.jpg',1,1,''),(4,4,'LF60YTT_1.jpg',1,1,''),(5,4,'LF60YTT_2.jpg',2,0,''),(18,1,'SV03SVL_5.jpg',5,0,'VkFVWEhBTEwvQVNUUkEvU1YwM1NWTC9TVjAzU1ZMXzUuanBn'),(50,26,'HELLO_1541326079.jpg',4,1,'VEVTVC9URVNUL0hFTExPL0hFTExPXzE1NDEzMjYwNzkuanBn'),(51,26,'HELLO_1541326079.jpg',5,0,'VEVTVC9URVNUL0hFTExPL0hFTExPXzE1NDEzMjYwNzkuanBn'),(52,27,'HELLO_1541326109.jpg',5,1,'VEVTVC9URVNUL0hFTExPL0hFTExPXzE1NDEzMjYxMDkuanBn'),(53,27,'HELLO_1541326109.jpg',6,0,'VEVTVC9URVNUL0hFTExPL0hFTExPXzE1NDEzMjYxMDkuanBn'),(68,33,'HELLO_1541451328.jpg',1,1,'VEVTVC9URVNUL0hFTExPL0hFTExPXzE1NDE0NTEzMjguanBn'),(69,33,'HELLO_1541451329.jpg',2,0,'VEVTVC9URVNUL0hFTExPL0hFTExPXzE1NDE0NTEzMjkuanBn'),(70,32,'A_1541453860.jpg',1,1,'QS9BL0EvQV8xNTQxNDUzODYwLmpwZw=='),(71,32,'A_1541453861.jpg',2,0,'QS9BL0EvQV8xNTQxNDUzODYxLmpwZw=='),(72,34,'DDDDDD_1541510522.jpeg',1,1,'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDUyMi5qcGVn'),(73,34,'DDDDDD_1541510523.jpeg',2,0,'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDUyMy5qcGVn'),(74,34,'DDDDDD_1541510524.jpeg',3,0,'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDUyNC5qcGVn'),(75,34,'DDDDDD_1541510525.jpeg',4,0,'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDUyNS5qcGVn'),(76,34,'DDDDDD_1541510526.jpeg',5,0,'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDUyNi5qcGVn'),(77,34,'DDDDDD_1541510548.jpeg',6,0,'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDU0OC5qcGVn'),(78,34,'DDDDDD_1541510549.jpeg',7,0,'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDU0OS5qcGVn'),(79,34,'DDDDDD_1541510550.jpeg',8,0,'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDU1MC5qcGVn'),(80,34,'DDDDDD_1541510551.jpeg',9,0,'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDU1MS5qcGVn'),(81,35,'BOB_1541533256.jpg',1,1,'0'),(83,37,'KM14AKK_1542485603.jpg',0,1,'Qk1XLzMgU0VSSUVTL0tNMTRBS0svS00xNEFLS18xNTQyNDg1NjAzLmpwZw=='),(84,38,'KM14AKK_1542485695.jpg',1,1,'Qk1XLzMgU0VSSUVTL0tNMTRBS0svS00xNEFLS18xNTQyNDg1Njk1LmpwZw=='),(87,38,'KM14AKK_1542487044.jpg',2,0,'Qk1XLzMgU0VSSUVTL0tNMTRBS0svS00xNEFLS18xNTQyNDg3MDQ0LmpwZw=='),(88,39,'DS57NAO_1542536313.jpg',1,1,'Rk9SRC9GT0NVUy9EUzU3TkFPL0RTNTdOQU9fMTU0MjUzNjMxMy5qcGc=');
/*!40000 ALTER TABLE `vehicle_image_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_table`
--

DROP TABLE IF EXISTS `vehicle_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_table` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_registration` varchar(10) NOT NULL,
  `vehicle_make` varchar(30) NOT NULL,
  `vehicle_model` varchar(30) NOT NULL,
  `vehicle_fuel` varchar(10) NOT NULL,
  `vehicle_transmission` varchar(10) NOT NULL,
  `vehicle_engine_size` int(11) NOT NULL,
  `vehicle_doors` int(11) NOT NULL,
  `vehicle_year` int(11) NOT NULL,
  `vehicle_mileage` int(11) NOT NULL,
  `vehicle_body_style` varchar(1000) DEFAULT NULL,
  `vehicle_variant` varchar(100) DEFAULT NULL,
  `vehicle_seats` int(11) DEFAULT NULL,
  `vehicle_colour` varchar(20) NOT NULL,
  `vehicle_gears` int(11) DEFAULT NULL,
  `vehicle_owners` int(11) DEFAULT NULL,
  `vehicle_fuel_urban` double DEFAULT NULL,
  `vehicle_fuel_extra_urban` double DEFAULT NULL,
  `vehicle_fuel_combined` double DEFAULT NULL,
  `vehicle_fuel_tank` int(11) DEFAULT NULL,
  `vehicle_road_tax` varchar(5) NOT NULL,
  `vehicle_road_tax_6` double DEFAULT NULL,
  `vehicle_road_tax_12` double DEFAULT NULL,
  `vehicle_insurance_group` int(11) NOT NULL,
  `vehicle_bhp` int(11) DEFAULT NULL,
  `vehicle_torque` int(11) DEFAULT NULL,
  `vehicle_max_speed` int(11) DEFAULT NULL,
  `vehicle_safety` varchar(1000) DEFAULT NULL,
  `vehicle_interior` varchar(1000) DEFAULT NULL,
  `vehicle_exterior` varchar(1000) DEFAULT NULL,
  `vehicle_comfort` varchar(1000) DEFAULT NULL,
  `vehicle_other` varchar(1000) DEFAULT NULL,
  `vehicle_extras` text,
  `vehicle_sold` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vehicle_id`),
  UNIQUE KEY `vehicle_registration` (`vehicle_registration`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_table`
--

LOCK TABLES `vehicle_table` WRITE;
/*!40000 ALTER TABLE `vehicle_table` DISABLE KEYS */;
INSERT INTO `vehicle_table` VALUES (1,'SV03SVL','VAUXHALL','ASTRA','PETROL','MANUAL',2200,3,2003,112000,NULL,'SRI',NULL,'SILVER',NULL,NULL,NULL,NULL,NULL,NULL,'240',NULL,NULL,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',0),(2,'ABC123','FORD','FIESTA','DIESEL','MANUAL',1600,5,2010,89000,NULL,'',NULL,'RED',NULL,NULL,NULL,NULL,NULL,NULL,'30',NULL,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AIR CONDITIONING, LEATHER SEATS',0),(4,'LF60YTT','PEUGEOT','207','PETROL','MANUAL',1400,3,2010,70000,NULL,'MELLISEUM',NULL,'BLACK',NULL,NULL,NULL,NULL,NULL,NULL,'65',NULL,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AIR-CONDITIONING\r\nCENTRAL LOCKING\r\nBIG BOOT',0),(32,'A','A','A','PETROL','MANUAL',2005,3,2015,1200,NULL,'A',NULL,'A',NULL,NULL,NULL,NULL,NULL,NULL,'200',NULL,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',0),(33,'HELLO','TEST','TEST','PETROL','MANUAL',1400,3,2010,15000,NULL,'SRI',NULL,'BLACK',NULL,NULL,NULL,NULL,NULL,NULL,'65',NULL,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',0),(34,'DDDDDD','VOLKSWAGEN','GOLF','DIESEL','MANUAL',1400,5,2012,15000,NULL,'TEST',NULL,'RED',NULL,NULL,NULL,NULL,NULL,NULL,'30',NULL,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',0),(35,'BOB','OBHJK','HJK','PETROL','MANUAL',256,4,2001,678,NULL,'HHJKHK',NULL,'RED',NULL,NULL,NULL,NULL,NULL,NULL,'230',NULL,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',0),(38,'KM14AKK','BMW','3 SERIES','DIESEL','AUTOMATIC',1995,5,2014,5000,'HATCHBACK','320D M SPORT GRAN TURISMO',5,'RED',8,3,47.9,64.2,56.5,57,'E',74.25,135,36,181,280,140,'[\"M Sport Brakes\",\"Xenon Headlights\",\"Reversing Assist Camera\",\"Driving Assistant\"]','[\"Anthracite Headlining\"]','[\"Headlight Wash\",\"Exterior Mirrors - Folding\\/Auto Dimming\"]','[\"Comfort Access With Smart-opener\",\"Full Black Panel Display\",\"Lumbar Support - Electric For Driver And Passenger\"]','[\"M Sport Suspension\"]',NULL,0),(39,'DS57NAO','FORD','FOCUS','PETROL','MANUAL',1596,5,2008,5000,'HATCHBACK','ZETEC CLIMATE',5,'BLUE',5,3,32.5,51.4,42.2,55,'G',104.5,190,7,100,108,109,'null','null','null','null','null',NULL,0);
/*!40000 ALTER TABLE `vehicle_table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-18 20:02:13
