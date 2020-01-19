-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: gloom_api
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `game_character`
--

DROP TABLE IF EXISTS `game_character`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_character` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `life` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_card` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_character`
--

LOCK TABLES `game_character` WRITE;
/*!40000 ALTER TABLE `game_character` DISABLE KEYS */;
INSERT INTO `game_character` VALUES (1,'spellweaver','Lorem','{\"1\": 6, \"2\": 7, \"3\": 8, \"4\": 9, \"5\": 10, \"6\": 11, \"7\": 12, \"8\": 13, \"9\": 14}',8),(2,'brute','Lorem','{\"1\": 10, \"2\": 12, \"3\": 14, \"4\": 16, \"5\": 18, \"6\": 20, \"7\": 22, \"8\": 24, \"9\": 26}',10),(3,'scoundrel','Lorem','{\"1\": 8, \"2\": 9, \"3\": 11, \"4\": 12, \"5\": 14, \"6\": 15, \"7\": 17, \"8\": 18, \"9\": 20}',9),(4,'tinkerer','Lorem','{\"1\": 8, \"2\": 9, \"3\": 11, \"4\": 12, \"5\": 14, \"6\": 15, \"7\": 17, \"8\": 18, \"9\": 20}',12),(5,'mindthief','lorem','{\"1\": 6, \"2\": 7, \"3\": 8, \"4\": 9, \"5\": 10, \"6\": 11, \"7\": 12, \"8\": 13, \"9\": 14}',10),(6,'cragheart','Lorem','{\"1\": 10, \"2\":12, \"3\": 14, \"4\": 16, \"5\": 18, \"6\": 20, \"7\": 22, \"8\": 24, \"9\": 26}',11);
/*!40000 ALTER TABLE `game_character` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-19 18:22:29
