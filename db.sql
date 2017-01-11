-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: mussi
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
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `posts_id` int(11) NOT NULL AUTO_INCREMENT,
  `social_net` int(10) DEFAULT NULL,
  `social_post_id` int(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `text` varchar(500) DEFAULT NULL,
  `media` text,
  PRIMARY KEY (`posts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,NULL,'0000-00-00 00:00:00','Así empezó la #ColoniaDeVerano de #Berazategui. Más de 3000 vecinos disfrutan todos los días en #LosPrivilegiados https://t.co/31BQ1r7Gy5 https://t.co/XEXv7HMuM3','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1caKE9XUAIwtIV.jpg\"},{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1caLmtWQAEqfSu.jpg\"},{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1caOLpWQAAQJIH.jpg\"},{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1caQFLXEAAoPsB.jpg\"}]'),(2,1,NULL,'0000-00-00 00:00:00','Desde las 21 hs. los esperamos a todos en #ElPatio para disfrutar de la primera noche del #CicloDeVerano en #Berazategui https://t.co/UGpSuTcN1T','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1cT2TfXgAIkcnw.jpg\"}]'),(3,1,2147483647,'0000-00-00 00:00:00','Mañana llega una nueva edición de #MercadoVecino. Comprá verdura, fruta y flores directo del productor #Berazategui https://t.co/tyFzn9FsCy','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mjGnAXAAAhSfY.jpg\"}]'),(4,1,2147483647,'0000-00-00 00:00:00','Este domingo, de 18 a 23 hs., disfrutá de la Peatonal Gastronómica de #PlazaSanMartin al aire libre! Te esperamos! https://t.co/KrSK20yoeQ','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mi7ZZXcAERWUH.jpg\"}]'),(5,1,2147483647,'2017-01-08 21:30:37','Mañana llega una nueva edición de #MercadoVecino. Comprá verdura, fruta y flores directo del productor #Berazategui https://t.co/tyFzn9FsCy','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mjGnAXAAAhSfY.jpg\"}]'),(6,1,2147483647,'2017-01-08 18:35:52','Este domingo, de 18 a 23 hs., disfrutá de la Peatonal Gastronómica de #PlazaSanMartin al aire libre! Te esperamos! https://t.co/KrSK20yoeQ','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mi7ZZXcAERWUH.jpg\"}]');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_nets`
--

DROP TABLE IF EXISTS `social_nets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_nets` (
  `social_nets_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`social_nets_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_nets`
--

LOCK TABLES `social_nets` WRITE;
/*!40000 ALTER TABLE `social_nets` DISABLE KEYS */;
INSERT INTO `social_nets` VALUES (1,'Twitter'),(2,'Facebook'),(3,'Instagram');
/*!40000 ALTER TABLE `social_nets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(40) NOT NULL DEFAULT '',
  `profile` int(10) NOT NULL DEFAULT '1',
  `nombre` varchar(40) DEFAULT '',
  `apellido` varchar(40) DEFAULT '',
  `imagen` varchar(40) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'mussi','32a4585b8e95929021ae548f5eea18b5',1,'','','mussi.jpg');
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

-- Dump completed on 2017-01-11 18:23:53
