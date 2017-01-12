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
  `social_post_id` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `text` varchar(500) DEFAULT NULL,
  `media` text,
  `posted_by` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`posts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (5,1,'2147483647','2017-01-08 21:30:37','Mañana llega una nueva edición de #MercadoVecino. Comprá verdura, fruta y flores directo del productor #Berazategui https://t.co/tyFzn9FsCy','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mjGnAXAAAhSfY.jpg\"}]',''),(6,1,'2147483647','2017-01-08 18:35:52','Este domingo, de 18 a 23 hs., disfrutá de la Peatonal Gastronómica de #PlazaSanMartin al aire libre! Te esperamos! https://t.co/KrSK20yoeQ','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mi7ZZXcAERWUH.jpg\"}]',''),(7,2,'185666064280_10154842909549281','2016-12-18 13:18:20','','[{\"type\":\"video\",\"src\":\"https://video.xx.fbcdn.net/v/t42.1790-2/15653605_1873554139557056_8611077466162724864_n.mp4?efg=eyJybHIiOjUwNywicmxhIjo1MTIsInZlbmNvZGVfdGFnIjoic3ZlX3NkIn0%3D&rl=507&vabr=282&oh=99938fd7dc466465a1afe8c4a28bab75&oe=587980B2\"}]',''),(8,2,'185666064280_10154840837754281','2016-12-17 18:39:40','Feliz cumpleaños #PapaFrancisco! Gracias por darnos fuerzas para seguir luchando por los humildes y por los que menos tienen. Gracias por recibirme con tanta calidez y cariño, siempre con una sonrisa, cada vez que visité el #Vaticano en representación de mi querida ciudad! Un gran saludo y todo el amor del Pueblo de Berazategui en este día tan especial, que Dios te ilumine y te bendiga #PapaFrancisco!','[{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/15621596_10154840831554281_6673211227739305918_n.jpg?oh=35927be8ef9a6594f14e8bd9b0a9419c&oe=590DBC3F\"},{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/15622341_10154840831584281_7093915667648043638_n.jpg?oh=0b10346a1ca3215589991cd169d9ff71&oe=58DAF433\"}]',''),(9,2,'185666064280_10154926339894281','2017-01-12 16:56:48','LLEGA LA #FERIAEMPRENDER A LA COSTA DE HUDSON\n\nEste sábado 14 y domingo 15 de enero se realizará una nueva edición del tradicional paseo de compras, pero esta vez y para disfrutar del verano, la cita es en la #CostaDeHudson. En esta feria, más de 50 emprendedores berazateguenses presentarán sus creaciones en calzado, indumentaria, marroquinería, madera y cerámica, entre otras variedades. \n\nAcercate el sábado de 16 a 02 hs. y el domingo de 16 a 22 hs. \n\nPara conocer más sobre cada uno de los empr','[{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/15965608_1776729202652869_427569851082406160_n.png?oh=686576063e99706bf7e165986a10a3b0&oe=590F543E\"}]','Municipalidad de Berazategui'),(10,2,'185666064280_10154914226994281','2017-01-09 10:48:55','#FelizCumple al mejor Intendente de la historia de #Berazategui. Gracias viejo por tanto! Te quiero ??#MussiEsBerazategui','[{\"type\":\"video\",\"src\":\"https://video.xx.fbcdn.net/v/t42.1790-2/15961489_1236873146362569_6637307232193085440_n.mp4?efg=eyJybHIiOjY1MSwicmxhIjo1MTIsInZlbmNvZGVfdGFnIjoic3ZlX3NkIn0%3D&rl=651&vabr=362&oh=76db2521d9bd5e7c6c47e1efe88d7f1e&oe=58797B56\"}]',''),(11,1,'818792705211953153','2017-01-10 09:12:48','[#IMPORTANTE]?#EDEA y #EDESUR informan: por cortes de energía eléctrica, habrá baja presión de agua en #Berazategui ?https://t.co/9RJPDLeYKQ https://t.co/VrD6nSll8P','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1zvLwdWQAExHHM.jpg\"}]',''),(12,1,'818253607564783617','2017-01-08 21:30:37','Mañana llega una nueva edición de #MercadoVecino. Comprá verdura, fruta y flores directo del productor #Berazategui https://t.co/tyFzn9FsCy','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mjGnAXAAAhSfY.jpg\"}]',''),(13,1,'818792705211953153','2017-01-10 09:12:48','[#IMPORTANTE]?#EDEA y #EDESUR informan: por cortes de energía eléctrica, habrá baja presión de agua en #Berazategui ?https://t.co/9RJPDLeYKQ https://t.co/VrD6nSll8P','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1zvLwdWQAExHHM.jpg\"}]','MunicipioBerazategui'),(14,1,'818253607564783617','2017-01-08 21:30:37','Mañana llega una nueva edición de #MercadoVecino. Comprá verdura, fruta y flores directo del productor #Berazategui https://t.co/tyFzn9FsCy','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mjGnAXAAAhSfY.jpg\"}]','MunicipioBerazategui');
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

-- Dump completed on 2017-01-12 19:03:27
