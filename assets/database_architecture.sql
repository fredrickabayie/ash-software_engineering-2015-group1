-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: system
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `system_login`
--

DROP TABLE IF EXISTS `system_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_login` (
  `user_id` int(36) NOT NULL AUTO_INCREMENT,
  `username` varchar(36) NOT NULL,
  `password` varchar(36) NOT NULL,
  `user_type` enum('admin','regular') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_login`
--

LOCK TABLES `system_login` WRITE;
/*!40000 ALTER TABLE `system_login` DISABLE KEYS */;
INSERT INTO `system_login` VALUES (1,'fredrick.abayie','1abc7eda679aa56fa6d9b65ad978dc4a','admin'),(2,'david.tandoh','3fb632cfa5cad21c60cd926dd58f684a','regular');
/*!40000 ALTER TABLE `system_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_tasks`
--

DROP TABLE IF EXISTS `system_tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_tasks` (
  `task_id` int(36) NOT NULL AUTO_INCREMENT,
  `task_title` varchar(255) NOT NULL,
  `task_description` longtext NOT NULL,
  `user_id` int(36) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_tasks`
--

LOCK TABLES `system_tasks` WRITE;
/*!40000 ALTER TABLE `system_tasks` DISABLE KEYS */;
INSERT INTO `system_tasks` VALUES (1,'Malaria Research','Africa needs to discover new frontiers in the course of fighting poverty amongst her people.  Ghana, the gateway to Africa, must lead the way, and education of these street and vulnerable children is the key.  SCEF believes that street children have a right to a dignified childhood through which they are given the opportunity to receive an education and explore their voice and their rights as human beings.',1),(2,'Blood Diseases','Recently, especially following the pressing of sexual abuse charges against a James Town resident on three separate accounts, SCEF has identified sexual abuse as a major challenge plaguing street girls and women in James Town. We have begun sexual abuse awareness workshops with our female students to inform them of their rights regarding their own bodies and safety.',2),(3,'Ebola Research','This is just a quick announcement on what to do should the network go down during the Easter break. Please contact Kingston Deladem Kofi Coker class of 2015 or Momodou K. Sowe class of 2017. They will both be on campus throughout the break and they know what to check before contacting Segla or myself.',2),(4,'Aids Epidemic','As you should know, Friday April 3 and Monday April 6 are both public holidays and classes will not be in session, nor will the administration offices be open.  The campus however, will remain open with limited services. The campus however, will remain open with limited services. Classes will resume on Tuesday April 7. The application process is very simple, apply now!',1);
/*!40000 ALTER TABLE `system_tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_users`
--

DROP TABLE IF EXISTS `system_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_users` (
  `user_id` int(50) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(50) NOT NULL,
  `user_sname` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_users`
--

LOCK TABLES `system_users` WRITE;
/*!40000 ALTER TABLE `system_users` DISABLE KEYS */;
INSERT INTO `system_users` VALUES (1,'Fredrick','Abayie'),(2,'David','Tandoh');
/*!40000 ALTER TABLE `system_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'system'
--

--
-- Dumping routines for database 'system'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-04  3:52:05
