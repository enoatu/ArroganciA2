-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: user2db
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `androidTest`
--

DROP TABLE IF EXISTS `androidTest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `androidTest` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ツイート` varchar(500) DEFAULT NULL,
  `ユーザー名` varchar(150) NOT NULL,
  `アカウント名` varchar(100) NOT NULL,
  `tweet_id` varchar(70) NOT NULL,
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `app_iine`
--

DROP TABLE IF EXISTS `app_iine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_iine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) unsigned NOT NULL,
  `tweet_id` varchar(70) NOT NULL,
  `regiTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `app_tb2`
--

DROP TABLE IF EXISTS `app_tb2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_tb2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tweet` varchar(500) DEFAULT NULL,
  `sender_name` varchar(150) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `tweet_id` varchar(70) NOT NULL,
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `apptable`
--

DROP TABLE IF EXISTS `apptable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apptable` (
  `id` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `game2_iineT`
--

DROP TABLE IF EXISTS `game2_iineT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game2_iineT` (
  `user_id` int(8) unsigned NOT NULL,
  `tweet_id` varchar(50) NOT NULL,
  `regiTime` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `game_iine`
--

DROP TABLE IF EXISTS `game_iine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_iine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) unsigned NOT NULL,
  `tweet_id` varchar(50) NOT NULL,
  `regiTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `game_tb2`
--

DROP TABLE IF EXISTS `game_tb2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_tb2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tweet` varchar(500) DEFAULT NULL,
  `sender_name` varchar(150) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `tweet_id` varchar(70) NOT NULL,
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hmdTextGet`
--

DROP TABLE IF EXISTS `hmdTextGet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hmdTextGet` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `text` varchar(30) CHARACTER SET utf8 NOT NULL,
  `textGroup` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) NOT NULL,
  `regTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hmdhmd`
--

DROP TABLE IF EXISTS `hmdhmd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hmdhmd` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ツイート` varchar(500) DEFAULT NULL,
  `ユーザー名` varchar(150) NOT NULL,
  `アカウント名` varchar(100) NOT NULL,
  `tweet_id` varchar(70) NOT NULL,
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `service_iine`
--

DROP TABLE IF EXISTS `service_iine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_iine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) unsigned NOT NULL,
  `tweet_id` varchar(50) NOT NULL,
  `regiTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `service_tb2`
--

DROP TABLE IF EXISTS `service_tb2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_tb2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tweet` varchar(500) DEFAULT NULL,
  `sender_name` varchar(150) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `tweet_id` varchar(70) NOT NULL,
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `servicetable`
--

DROP TABLE IF EXISTS `servicetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicetable` (
  `id` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `site_iine`
--

DROP TABLE IF EXISTS `site_iine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_iine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) unsigned NOT NULL,
  `tweet_id` varchar(50) NOT NULL,
  `regiTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `site_tb2`
--

DROP TABLE IF EXISTS `site_tb2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_tb2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tweet` varchar(500) DEFAULT NULL,
  `sender_name` varchar(150) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `tweet_id` varchar(70) NOT NULL,
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sitetable`
--

DROP TABLE IF EXISTS `sitetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sitetable` (
  `id` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `system_iine`
--

DROP TABLE IF EXISTS `system_iine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_iine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) unsigned NOT NULL,
  `tweet_id` varchar(50) NOT NULL,
  `regiTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `system_tb2`
--

DROP TABLE IF EXISTS `system_tb2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_tb2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tweet` varchar(500) DEFAULT NULL,
  `sender_name` varchar(150) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `tweet_id` varchar(70) NOT NULL,
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `systemtable`
--

DROP TABLE IF EXISTS `systemtable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systemtable` (
  `id` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trend_tb`
--

DROP TABLE IF EXISTS `trend_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trend_tb` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `trend` varchar(40) DEFAULT NULL,
  `rank` varchar(10) NOT NULL,
  `getdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(35) CHARACTER SET latin1 DEFAULT NULL,
  `user_pass` varchar(255) CHARACTER SET latin1 NOT NULL,
  `disp` int(2) NOT NULL DEFAULT '3',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-21 22:30:16
