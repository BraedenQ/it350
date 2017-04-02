-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: business
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `building`
--

DROP TABLE IF EXISTS `building`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `building` (
  `buildID` int(11) NOT NULL,
  `busID` int(11) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`buildID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `building`
--

LOCK TABLES `building` WRITE;
/*!40000 ALTER TABLE `building` DISABLE KEYS */;
INSERT INTO `building` VALUES (1,1,'800 E 600 S Provo, UT 84606'),(2,2,'685 E 551 N Lehi, UT 78621');
/*!40000 ALTER TABLE `building` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `business` (
  `busID` int(11) NOT NULL AUTO_INCREMENT,
  `ownerName` varchar(20) DEFAULT NULL,
  `foundingDate` date DEFAULT NULL,
  PRIMARY KEY (`busID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business`
--

LOCK TABLES `business` WRITE;
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
INSERT INTO `business` VALUES (1,'Tanner Perdue','2016-11-22'),(2,'Seth Millionaire','2017-03-08');
/*!40000 ALTER TABLE `business` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor` (
  `emplId` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`emplId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES (101,'Pediatrics'),(102,'Surgeon'),(103,'Neurosurgeon'),(104,'Foot Doctor'),(105,'Emergency Room'),(106,'Pain Management');
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `emplID` int(11) NOT NULL AUTO_INCREMENT,
  `busID` int(11) DEFAULT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`emplID`)
) ENGINE=InnoDB AUTO_INCREMENT=206 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (101,1,'Bob','C','495 Keylog Lane','1980-03-15',NULL),(102,2,'Shoe','D','20485 Green Way','1982-12-19',NULL),(103,1,'Grace','M','395929 Great Fire','1960-03-15',NULL),(104,1,'Runner','P','833 Tool Lane','1995-12-26',NULL),(105,2,'Great','A','38 Neat Lane','1990-12-12',NULL),(106,1,'Braeden','Q','485 Trace Hill','1991-01-16',NULL),(201,1,'Grace','Kim','94580 Main','2017-03-06',NULL),(202,2,'Fire','L','48503 Chill','2017-01-23',NULL),(203,2,'Fun','H','3948 Lost','2016-10-18',NULL),(204,2,'Tool','L','3948 Grab','2016-11-20',NULL),(205,1,'Platapus','Pacheco','38958 Phineas','2016-11-14',NULL);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `invID` int(11) NOT NULL,
  `busID` int(11) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `numberOfUnits` int(11) DEFAULT NULL,
  PRIMARY KEY (`invID`,`busID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,1,'Needles',10),(1,2,'Bandaids',15),(2,1,'Bandage',53),(2,2,'Tongue Depressors',11),(3,1,'Cotton Balls',96),(3,2,'Water Bottles',11),(4,1,'Pens',6),(4,2,'Scale',1);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job` (
  `jobID` int(11) NOT NULL,
  `inRoleSince` date DEFAULT NULL,
  `tenure` int(11) DEFAULT NULL,
  PRIMARY KEY (`jobID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` VALUES (1,'2017-03-21',NULL),(2,'2017-03-21',NULL),(3,'2017-03-21',NULL),(4,'2017-03-21',NULL),(5,'2017-03-21',NULL);
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `Update Tenure` AFTER INSERT ON `job` FOR EACH ROW SET @job.tenure = 1 */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `jobReview`
--

DROP TABLE IF EXISTS `jobReview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobReview` (
  `revID` int(11) NOT NULL,
  `jobID` int(11) DEFAULT NULL,
  `notes` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`revID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobReview`
--

LOCK TABLES `jobReview` WRITE;
/*!40000 ALTER TABLE `jobReview` DISABLE KEYS */;
INSERT INTO `jobReview` VALUES (1,1,'I\'m the best!'),(2,2,'I like where you\'re going'),(3,3,'Great work!'),(4,4,'You\'re about to be fired'),(5,5,'Work out more');
/*!40000 ALTER TABLE `jobReview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicalRecords`
--

DROP TABLE IF EXISTS `medicalRecords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicalRecords` (
  `recordID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `dateVisited` date DEFAULT NULL,
  `diagnosis` varchar(50) DEFAULT NULL,
  `prescription` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`recordID`,`patientID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicalRecords`
--

LOCK TABLES `medicalRecords` WRITE;
/*!40000 ALTER TABLE `medicalRecords` DISABLE KEYS */;
INSERT INTO `medicalRecords` VALUES (1,1,'2016-09-12','Nothing','None'),(1,2,'2017-03-21','Good check up','none'),(1,3,'2017-01-23','Obesity','workout'),(1,4,'2017-03-01','Cut off arm','pain killers'),(1,5,'2017-03-08','FOMO','Facebook'),(2,1,'2016-12-20','Cancer','Chemo'),(2,3,'2017-03-06','Good weight','None'),(3,1,'2017-01-16','Recovered','None');
/*!40000 ALTER TABLE `medicalRecords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient` (
  `patientID` int(11) NOT NULL AUTO_INCREMENT,
  `buildID` int(11) DEFAULT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `doctor` int(11) DEFAULT NULL,
  PRIMARY KEY (`patientID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (1,1,'Braeden','Cool','85 Wymoung',101),(2,2,'Tanner','Cool','93 Fire Lane',102),(3,1,'Grace','Chili','9395 Man Lane',101),(4,1,'Chicken','Nuggets','294 McDonalds',103);
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supportStaff`
--

DROP TABLE IF EXISTS `supportStaff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supportStaff` (
  `emplID` int(11) NOT NULL,
  `job` int(11) DEFAULT NULL,
  PRIMARY KEY (`emplID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supportStaff`
--

LOCK TABLES `supportStaff` WRITE;
/*!40000 ALTER TABLE `supportStaff` DISABLE KEYS */;
INSERT INTO `supportStaff` VALUES (201,1),(202,2),(203,3),(204,4),(205,5);
/*!40000 ALTER TABLE `supportStaff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test2`
--

DROP TABLE IF EXISTS `test2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `computer` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test2`
--

LOCK TABLES `test2` WRITE;
/*!40000 ALTER TABLE `test2` DISABLE KEYS */;
INSERT INTO `test2` VALUES (1,'tanner','mac'),(2,'logan','pc');
/*!40000 ALTER TABLE `test2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `transID` int(11) NOT NULL,
  `buildID` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  PRIMARY KEY (`transID`,`buildID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,1,'Equipment',12.86),(1,2,'Staffing',80.56),(2,1,'Staffing',50.6),(2,2,'Equipment',80.2),(3,1,'Services',100.65),(3,2,'More equipement',100.25),(4,1,'Insurance',50.98),(4,2,'Rent',158.25),(5,1,'New Computer',20.65);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userID` int(4) NOT NULL AUTO_INCREMENT,
  `busID` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin','21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-01 19:38:04
