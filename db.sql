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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '',
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'articulos'),(2,'conversaciones'),(3,'propuestas'),(6,'actividades'),(7,'PBA');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

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
  `category_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`posts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (5,1,'2147483647','2017-01-08 21:30:37','Mañana llega una nueva edición de #MercadoVecino. Comprá verdura, fruta y flores directo del productor #Berazategui https://t.co/tyFzn9FsCy','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mjGnAXAAAhSfY.jpg\"}]','',1),(6,1,'2147483647','2017-01-08 18:35:52','Este domingo, de 18 a 23 hs., disfrutá de la Peatonal Gastronómica de #PlazaSanMartin al aire libre! Te esperamos! https://t.co/KrSK20yoeQ','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mi7ZZXcAERWUH.jpg\"}]','',1),(7,2,'185666064280_10154842909549281','2016-12-18 13:18:20','','[{\"type\":\"video\",\"src\":\"https://video.xx.fbcdn.net/v/t42.1790-2/15653605_1873554139557056_8611077466162724864_n.mp4?efg=eyJybHIiOjUwNywicmxhIjo1MTIsInZlbmNvZGVfdGFnIjoic3ZlX3NkIn0%3D&rl=507&vabr=282&oh=99938fd7dc466465a1afe8c4a28bab75&oe=587980B2\"}]','',1),(8,2,'185666064280_10154840837754281','2016-12-17 18:39:40','Feliz cumpleaños #PapaFrancisco! Gracias por darnos fuerzas para seguir luchando por los humildes y por los que menos tienen. Gracias por recibirme con tanta calidez y cariño, siempre con una sonrisa, cada vez que visité el #Vaticano en representación de mi querida ciudad! Un gran saludo y todo el amor del Pueblo de Berazategui en este día tan especial, que Dios te ilumine y te bendiga #PapaFrancisco!','[{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/15621596_10154840831554281_6673211227739305918_n.jpg?oh=35927be8ef9a6594f14e8bd9b0a9419c&oe=590DBC3F\"},{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/15622341_10154840831584281_7093915667648043638_n.jpg?oh=0b10346a1ca3215589991cd169d9ff71&oe=58DAF433\"}]','',1),(10,2,'185666064280_10154914226994281','2017-01-09 10:48:55','#FelizCumple al mejor Intendente de la historia de #Berazategui. Gracias viejo por tanto! Te quiero ??#MussiEsBerazategui','[{\"type\":\"video\",\"src\":\"https://video.xx.fbcdn.net/v/t42.1790-2/15961489_1236873146362569_6637307232193085440_n.mp4?efg=eyJybHIiOjY1MSwicmxhIjo1MTIsInZlbmNvZGVfdGFnIjoic3ZlX3NkIn0%3D&rl=651&vabr=362&oh=76db2521d9bd5e7c6c47e1efe88d7f1e&oe=58797B56\"}]','',1),(11,1,'818792705211953153','2017-01-10 09:12:48','[#IMPORTANTE]?#EDEA y #EDESUR informan: por cortes de energía eléctrica, habrá baja presión de agua en #Berazategui ?https://t.co/9RJPDLeYKQ https://t.co/VrD6nSll8P','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1zvLwdWQAExHHM.jpg\"}]','',1),(12,1,'818253607564783617','2017-01-08 21:30:37','Mañana llega una nueva edición de #MercadoVecino. Comprá verdura, fruta y flores directo del productor #Berazategui https://t.co/tyFzn9FsCy','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mjGnAXAAAhSfY.jpg\"}]','',1),(13,1,'818792705211953153','2017-01-10 09:12:48','[#IMPORTANTE]?#EDEA y #EDESUR informan: por cortes de energía eléctrica, habrá baja presión de agua en #Berazategui ?https://t.co/9RJPDLeYKQ https://t.co/VrD6nSll8P','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1zvLwdWQAExHHM.jpg\"}]','MunicipioBerazategui',1),(14,1,'818253607564783617','2017-01-08 21:30:37','Mañana llega una nueva edición de #MercadoVecino. Comprá verdura, fruta y flores directo del productor #Berazategui https://t.co/tyFzn9FsCy','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mjGnAXAAAhSfY.jpg\"}]','MunicipioBerazategui',1),(15,3,'','0000-00-00 00:00:00','','null','',1),(16,3,'','0000-00-00 00:00:00','','null','',1),(17,3,'1283425729752635065_2226281848','0000-00-00 00:00:00','Se vieneeee','[{\"type\":\"video\",\"src\":\"https://scontent.cdninstagram.com/t50.2886-16/13545111_1092555414166402_414212149_n.mp4\"}]','',1),(18,3,'1245982531914622468_2226281848','0000-00-00 00:00:00','El tiempo pasa y nos vamos poniendo más viejos','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/e35/13188054_1845131512381168_353674796_n.jpg?ig_cache_key=MTI0NTk4MjUzMTkxNDYyMjQ2OA%3D%3D.2\"}]','',1),(19,3,'1283425729752635065_2226281848','2016-06-29 13:04:51','Se vieneeee','[{\"type\":\"video\",\"src\":\"https://scontent.cdninstagram.com/t50.2886-16/13545111_1092555414166402_414212149_n.mp4\"}]','',1),(20,3,'1245982531914622468_2226281848','2016-05-08 21:11:54','El tiempo pasa y nos vamos poniendo más viejos','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/e35/13188054_1845131512381168_353674796_n.jpg?ig_cache_key=MTI0NTk4MjUzMTkxNDYyMjQ2OA%3D%3D.2\"}]','',1),(23,1,'820978542175485952','2017-01-16 09:58:32','#BuenLunes! Hasta las 16 hs podés acercarte a #MercadoVecino  y comprar verdura, fruta y flores directo del productor #Berazategui ???????????????? https://t.co/tGj9UsOMsl','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C2SzRt0WQAEm5xH.jpg\"}]','MunicipioBerazategui',6),(25,3,'1283425729752635065_2226281848','2016-06-29 13:04:51','Se vieneeee','[{\"type\":\"video\",\"src\":\"https://scontent.cdninstagram.com/t50.2886-16/13545111_1092555414166402_414212149_n.mp4\"}]','',1),(26,3,'1245982531914622468_2226281848','2016-05-08 21:11:54','El tiempo pasa y nos vamos poniendo más viejos','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/e35/13188054_1845131512381168_353674796_n.jpg?ig_cache_key=MTI0NTk4MjUzMTkxNDYyMjQ2OA%3D%3D.2\"}]','',1),(28,3,'1283425729752635065_2226281848','2016-06-29 13:04:51','Se vieneeee','[{\"type\":\"video\",\"src\":\"https://scontent.cdninstagram.com/t50.2886-16/13545111_1092555414166402_414212149_n.mp4\"}]','',1),(29,3,'1245982531914622468_2226281848','2016-05-08 21:11:54','El tiempo pasa y nos vamos poniendo más viejos','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/e35/13188054_1845131512381168_353674796_n.jpg?ig_cache_key=MTI0NTk4MjUzMTkxNDYyMjQ2OA%3D%3D.2\"}]','',1),(30,3,'1419699058251891087_2226281848','2017-01-03 13:35:37','Peli bajo el tifon','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/15802434_1410308248980317_3212397587629867008_n.jpg?ig_cache_key=MTQxOTY5OTA1ODI1MTg5MTA4Nw%3D%3D.2\"}]','',7),(51,2,'185666064280_10154935426554281','2017-01-15 12:03:56','','[{\"type\":\"video\",\"src\":\"https://video.xx.fbcdn.net/v/t42.1790-2/16022472_1766505610336749_6618765123936845824_n.mp4?efg=eyJybHIiOjYzNywicmxhIjo1MTIsInZlbmNvZGVfdGFnIjoic3ZlX3NkIn0%3D&rl=637&vabr=354&oh=f7c0db334863a1dc26f51182fb30113a&oe=587FCC4B\"}]','Municipalidad de Berazategui',1),(53,2,'185666064280_10154930425964281','2017-01-13 19:39:45','Vecinos, los invito a disfrutar de las difererentes propuestas que tiene el #CicloDeVerano para este fin de semana en #Berazategui: \n-“Patio de Tango y Folclore”\n-“Mandolinata Blu y Coro Abruzzo”\n-“El Estreno, a cargo de la compañia teatral Joligud”.  \nTodas las actividades son con entrada libre y gratuita, en el Centro De Actividades Roberto De Vicenzo y en nuestro hermoso Complejo Municipal #ElPatio.\nPara consultar la agenda completa para todo enero y febrero ???? http://www.berazategui.gob.ar','[{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/15977441_10154930425964281_5738740337626070708_n.png?oh=809929c3b42c8eb7cf97b1d8fd8cdbfa&oe=5915F615\"}]','',1),(54,2,'185666064280_10154926339894281','2017-01-12 16:56:48','LLEGA LA #FERIAEMPRENDER A LA COSTA DE HUDSON\n\nEste sábado 14 y domingo 15 de enero se realizará una nueva edición del tradicional paseo de compras, pero esta vez y para disfrutar del verano, la cita es en la #CostaDeHudson. En esta feria, más de 50 emprendedores berazateguenses presentarán sus creaciones en calzado, indumentaria, marroquinería, madera y cerámica, entre otras variedades. \n\nAcercate el sábado de 16 a 02 hs. y el domingo de 16 a 22 hs. \n\nPara conocer más sobre cada uno de los empr','[{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/15965608_1776729202652869_427569851082406160_n.png?oh=686576063e99706bf7e165986a10a3b0&oe=590F543E\"}]','Municipalidad de Berazategui',1);
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

-- Dump completed on 2017-01-16 18:22:59
