-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: logan
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `article_user`
--

DROP TABLE IF EXISTS `article_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_user` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`article_id`,`user_id`),
  KEY `IDX_3DD151487294869C` (`article_id`),
  KEY `IDX_3DD15148A76ED395` (`user_id`),
  CONSTRAINT `FK_3DD151487294869C` FOREIGN KEY (`article_id`) REFERENCES `sym_article` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_3DD15148A76ED395` FOREIGN KEY (`user_id`) REFERENCES `sym_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_user`
--

LOCK TABLES `article_user` WRITE;
/*!40000 ALTER TABLE `article_user` DISABLE KEYS */;
INSERT INTO `article_user` VALUES (20,23),(20,24),(21,23),(21,24),(22,23);
/*!40000 ALTER TABLE `article_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sym_article`
--

DROP TABLE IF EXISTS `sym_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sym_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_B8677DCD7E3C61F9` (`owner_id`),
  CONSTRAINT `FK_B8677DCD7E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `sym_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sym_article`
--

LOCK TABLES `sym_article` WRITE;
/*!40000 ALTER TABLE `sym_article` DISABLE KEYS */;
INSERT INTO `sym_article` VALUES (20,23,'Testovi monitora','2016-05-08 09:00:00','44.817457, 20.464354','When it comes to gaming monitors, 2560 x 1440 models with 144Hz+ refresh rates have proven popular choices for those wanting a combination of speed and image performance. Models like the Dell S2716DG combine exceptional responsiveness with attractive features such as a 2560 x 1440 resolution and the inclusion of Nvidia G-SYNC variable refresh rate technologies. Some users prefer either smaller screens, a slightly higher pixel density, something a little cheaper or perhaps a combination of these. The AOC AG241QX, of the company’s new AGON range, heeds the call of such users. This shrinks things down into a 23.8” screen size, keeping key attractive features such as a 144Hz refresh rate and 2560 x 1440 resolution. We take a look at this model and see whether this product is as interesting in practice as it is on paper.\r\n\r\nSpecifications\r\n\r\nThe monitor uses a 23.8” TN (Twisted Nematic) panel with support for a 144Hz refresh rate. This panel offers true 8-bit colour without dithering and boasts a 1ms grey to grey response time. As usual you shouldn’t put too much weight into such a specification. Some of the key ‘talking points’ of this monitor have been highlighted in blue below.'),(21,23,'Rebellion Fundraiser Bake Sale!','2017-10-27 12:00:00','Endor','ort the rebellion!'),(22,26,'test','2011-01-01 00:00:00','lok','fghfgh fghfghf'),(23,23,'posle yaml','2011-01-01 00:00:00','40.712784, -74.005941','posle yaml dependacy rtyrtyrtyry');
/*!40000 ALTER TABLE `sym_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sym_roles`
--

DROP TABLE IF EXISTS `sym_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sym_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `can_read` tinyint(1) NOT NULL,
  `can_rw` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sym_roles`
--

LOCK TABLES `sym_roles` WRITE;
/*!40000 ALTER TABLE `sym_roles` DISABLE KEYS */;
INSERT INTO `sym_roles` VALUES (1,'blogger',0,0),(2,'test2',1,1),(3,'test3',1,1),(7,'test4',1,1);
/*!40000 ALTER TABLE `sym_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sym_user`
--

DROP TABLE IF EXISTS `sym_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sym_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:json_array)',
  `is_active` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ime` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9CF39129F85E0677` (`username`),
  UNIQUE KEY `UNIQ_9CF3912935C246D5` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sym_user`
--

LOCK TABLES `sym_user` WRITE;
/*!40000 ALTER TABLE `sym_user` DISABLE KEYS */;
INSERT INTO `sym_user` VALUES (23,'ron','$2y$13$ISvCgSU8dfvuORJrkYWyyuWgWB9C4EmolfA65a12IgT9DR04KGW.a','[\"ROLE_USER\"]',1,'ron@example.com','ronald'),(24,'mike','$2y$13$LwYWEcyei1UjcC2cmGJZ5OvH.BJVyRksDKd4LMOntg3EW2OwXUZ66','[\"ROLE_USER\"]',1,'mike@example.com','michael'),(25,'admin','$2y$13$DqDmj06uFq2oGNnkXOahCe4e9VyvDKf1d/VL.ibwaIfzwwxgDtWye','[\"ROLE_ADMIN\"]',1,'admin@example.com','administrator'),(26,'test','$2y$13$/cXpIYmyWdBax1AHx.8Bjeye5qnu20bgZSpHMp16Sk8b6umclk592','[\"ROLE_USER\"]',1,'qw@qw.bn45345t','testkorisnik'),(33,'regempl','$2y$13$7/UADQUtTr50hFW1hQKUaO9ffXnc8FTk1EuLPiEi/.q9ZXC6fa2Dy','[\"ROLE_NOVINAR\"]',1,'rrr22rr@rrr.com','regempl'),(34,'qwe','$2y$13$QdWxWkVkRynGP1Gv1cgOSuBUwFUlMeZm7Yw9YoSmWPNWmdvHjKnkC','[\"ROLE_KNJIG\"]',1,'qwqwe@wer.yu','qwe'),(36,'test4','$2y$13$oJOPS5H4rZXBmy2laWL7eOqRALqFQ7NemLYEyryQliDKh79psQ2Iu','[\"ROLE_TEST4\"]',1,'qq3434q@df.vb','test4');
/*!40000 ALTER TABLE `sym_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-27  1:49:04
