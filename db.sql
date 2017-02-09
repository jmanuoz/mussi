-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: mussi
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
-- Table structure for table `autologin`
--

DROP TABLE IF EXISTS `autologin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autologin` (
  `user` int(11) NOT NULL,
  `series` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`user`,`series`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autologin`
--

LOCK TABLES `autologin` WRITE;
/*!40000 ALTER TABLE `autologin` DISABLE KEYS */;
INSERT INTO `autologin` VALUES (1,'1ca4b40baa90ce196b5ab4d24cabb76bb767d268bb295f5d8e9e791d2ebef0f1','1b1e975afa12e819c4a5f30a5d064ed85d102ad9971d17dcf3b9945b60973e7d',1486505051),(1,'413955c52718bfbf94a166a75acd6a9acf5c4c3c84555b8c0e9331682c4d88d6','c6b52e6ca6135af0f9ced9cae3d95d178cf5eb3432c73cb3ca5e695d4f2ab194',1486569042);
/*!40000 ALTER TABLE `autologin` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Table structure for table `categories_notes`
--

DROP TABLE IF EXISTS `categories_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories_notes` (
  `categoires_notes_id` int(11) NOT NULL AUTO_INCREMENT,
  `note_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`categoires_notes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_notes`
--

LOCK TABLES `categories_notes` WRITE;
/*!40000 ALTER TABLE `categories_notes` DISABLE KEYS */;
INSERT INTO `categories_notes` VALUES (1,4,2),(2,4,6),(3,5,2),(4,5,6);
/*!40000 ALTER TABLE `categories_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories_posts`
--

DROP TABLE IF EXISTS `categories_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories_posts` (
  `categories_posts_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`categories_posts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_posts`
--

LOCK TABLES `categories_posts` WRITE;
/*!40000 ALTER TABLE `categories_posts` DISABLE KEYS */;
INSERT INTO `categories_posts` VALUES (20,2,67),(21,3,67),(22,7,67),(57,2,5),(70,2,76),(71,6,76),(72,2,79),(73,2,77),(74,6,77),(75,2,75),(91,7,87),(92,2,88),(93,2,85),(94,7,85),(95,2,86),(96,6,86),(97,2,78),(98,2,80),(99,3,80),(100,2,73),(101,7,73),(110,3,89),(111,6,89),(112,2,90),(113,2,91),(114,6,91),(115,7,92);
/*!40000 ALTER TABLE `categories_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `messages_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `message` varchar(1000) NOT NULL DEFAULT '',
  `reply_to` int(11) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`messages_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'juan','juan@asd.com','hola mussi todo bien?',0,'2015-12-12 00:00:00'),(2,'saasdas','asdas@sdasd.com','sssdfsdfsdaf sadf sadf asdfasdf asdf',0,'2017-02-07 18:30:52'),(3,'','','dsad asd asdas',1,'2017-02-07 18:45:12'),(4,' ','','gato',3,'2017-02-07 18:51:52'),(5,' ','','gato no jodas',1,'2017-02-07 18:53:09'),(6,' ','','asdddd',1,'2017-02-07 18:53:43'),(7,' ','','cat',1,'2017-02-07 18:56:58'),(8,' ','','cat',1,'2017-02-07 18:57:30'),(9,' ','','bobo',1,'2017-02-07 18:59:35'),(10,' ','','ora',1,'2017-02-07 19:01:32'),(11,' ','','gay',1,'2017-02-07 19:02:39'),(12,' ','','eeeee',1,'2017-02-07 19:03:03'),(13,'patricio mussi','','ke te pasa bobo',2,'2017-02-07 19:04:25'),(14,'patricio mussi','','gato',2,'2017-02-07 19:05:40');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `notes_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `title` varchar(100) DEFAULT '',
  `description` varchar(400) NOT NULL DEFAULT '',
  PRIMARY KEY (`notes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (1,'','nota1','baja'),(2,'','nota 2','lasdasd as'),(3,'<h1>Hello world!</h1>\r\n\r\n<p>I&#39;m an instance of <a href=\"http://ckeditor.com\">CKEditor</a>.</p>\r\n','nota 3','asdasd asdas dasd'),(4,'<h1>Hello world!</h1>\r\n\r\n<p>I&#39;m an instance of <a href=\"http://ckeditor.com\">CKEditor</a>.</p>\r\n','qweqe qw','qweqwe qw '),(5,'<p>que se sho etoy reloco</p>\r\n','una nota','bien bien piola');
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
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
  `link` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`posts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (5,1,'2147483647','2017-01-08 21:30:37','Mañana llega una nueva edición de #MercadoVecino. Comprá verdura, fruta y flores directo del productor #Berazategui https://t.co/tyFzn9FsCy','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mjGnAXAAAhSfY.jpg\"}]','',NULL),(6,1,'2147483647','2017-01-08 18:35:52','Este domingo, de 18 a 23 hs., disfrutá de la Peatonal Gastronómica de #PlazaSanMartin al aire libre! Te esperamos! https://t.co/KrSK20yoeQ','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mi7ZZXcAERWUH.jpg\"}]','',NULL),(7,2,'185666064280_10154842909549281','2016-12-18 13:18:20','','[{\"type\":\"video\",\"src\":\"https://video.xx.fbcdn.net/v/t42.1790-2/15653605_1873554139557056_8611077466162724864_n.mp4?efg=eyJybHIiOjUwNywicmxhIjo1MTIsInZlbmNvZGVfdGFnIjoic3ZlX3NkIn0%3D&rl=507&vabr=282&oh=99938fd7dc466465a1afe8c4a28bab75&oe=587980B2\"}]','',NULL),(8,2,'185666064280_10154840837754281','2016-12-17 18:39:40','Feliz cumpleaños #PapaFrancisco! Gracias por darnos fuerzas para seguir luchando por los humildes y por los que menos tienen. Gracias por recibirme con tanta calidez y cariño, siempre con una sonrisa, cada vez que visité el #Vaticano en representación de mi querida ciudad! Un gran saludo y todo el amor del Pueblo de Berazategui en este día tan especial, que Dios te ilumine y te bendiga #PapaFrancisco!','[{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/15621596_10154840831554281_6673211227739305918_n.jpg?oh=35927be8ef9a6594f14e8bd9b0a9419c&oe=590DBC3F\"},{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/15622341_10154840831584281_7093915667648043638_n.jpg?oh=0b10346a1ca3215589991cd169d9ff71&oe=58DAF433\"}]','',NULL),(10,2,'185666064280_10154914226994281','2017-01-09 10:48:55','#FelizCumple al mejor Intendente de la historia de #Berazategui. Gracias viejo por tanto! Te quiero ??#MussiEsBerazategui','[{\"type\":\"video\",\"src\":\"https://video.xx.fbcdn.net/v/t42.1790-2/15961489_1236873146362569_6637307232193085440_n.mp4?efg=eyJybHIiOjY1MSwicmxhIjo1MTIsInZlbmNvZGVfdGFnIjoic3ZlX3NkIn0%3D&rl=651&vabr=362&oh=35f5aab33b65d2e9d322a5a14caabdde&oe=588012D6\"}]','',NULL),(11,1,'818792705211953153','2017-01-10 09:12:48','[#IMPORTANTE]?#EDEA y #EDESUR informan: por cortes de energía eléctrica, habrá baja presión de agua en #Berazategui ?https://t.co/9RJPDLeYKQ https://t.co/VrD6nSll8P','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1zvLwdWQAExHHM.jpg\"}]','',NULL),(12,1,'818253607564783617','2017-01-08 21:30:37','Mañana llega una nueva edición de #MercadoVecino. Comprá verdura, fruta y flores directo del productor #Berazategui https://t.co/tyFzn9FsCy','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mjGnAXAAAhSfY.jpg\"}]','',NULL),(13,1,'818792705211953153','2017-01-10 09:12:48','[#IMPORTANTE]?#EDEA y #EDESUR informan: por cortes de energía eléctrica, habrá baja presión de agua en #Berazategui ?https://t.co/9RJPDLeYKQ https://t.co/VrD6nSll8P','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1zvLwdWQAExHHM.jpg\"}]','MunicipioBerazategui',NULL),(14,1,'818253607564783617','2017-01-08 21:30:37','Mañana llega una nueva edición de #MercadoVecino. Comprá verdura, fruta y flores directo del productor #Berazategui https://t.co/tyFzn9FsCy','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mjGnAXAAAhSfY.jpg\"}]','MunicipioBerazategui',NULL),(15,3,'','0000-00-00 00:00:00','','null','',NULL),(16,3,'','0000-00-00 00:00:00','','null','',NULL),(17,3,'1283425729752635065_2226281848','2016-06-29 13:04:51','Se vieneeee','[{\"type\":\"video\",\"src\":\"https://scontent.cdninstagram.com/t50.2886-16/13545111_1092555414166402_414212149_n.mp4\"}]','','https://www.instagram.com/p/BHPpOa9gJa550KiaBxzCiFbLtROWqo0BdB-Znc0/'),(18,3,'1245982531914622468_2226281848','2016-05-08 21:11:54','El tiempo pasa y nos vamos poniendo más viejos','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/e35/13188054_1845131512381168_353674796_n.jpg?ig_cache_key=MTI0NTk4MjUzMTkxNDYyMjQ2OA%3D%3D.2\"}]','','https://www.instagram.com/p/BFKnoLjHOYEOlJqyl1wnt5AiXMg3ReBX5vpW1I0/'),(19,3,'1283425729752635065_2226281848','2016-06-29 13:04:51','Se vieneeee','[{\"type\":\"video\",\"src\":\"https://scontent.cdninstagram.com/t50.2886-16/13545111_1092555414166402_414212149_n.mp4\"}]','','https://www.instagram.com/p/BHPpOa9gJa550KiaBxzCiFbLtROWqo0BdB-Znc0/'),(20,3,'1245982531914622468_2226281848','2016-05-08 21:11:54','El tiempo pasa y nos vamos poniendo más viejos','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/e35/13188054_1845131512381168_353674796_n.jpg?ig_cache_key=MTI0NTk4MjUzMTkxNDYyMjQ2OA%3D%3D.2\"}]','','https://www.instagram.com/p/BFKnoLjHOYEOlJqyl1wnt5AiXMg3ReBX5vpW1I0/'),(23,1,'820978542175485952','2017-01-16 09:58:32','#BuenLunes! Hasta las 16 hs podés acercarte a #MercadoVecino  y comprar verdura, fruta y flores directo del productor #Berazategui ???????????????? https://t.co/tGj9UsOMsl','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C2SzRt0WQAEm5xH.jpg\"}]','MunicipioBerazategui',NULL),(25,3,'1283425729752635065_2226281848','2016-06-29 13:04:51','Se vieneeee','[{\"type\":\"video\",\"src\":\"https://scontent.cdninstagram.com/t50.2886-16/13545111_1092555414166402_414212149_n.mp4\"}]','','https://www.instagram.com/p/BHPpOa9gJa550KiaBxzCiFbLtROWqo0BdB-Znc0/'),(26,3,'1245982531914622468_2226281848','2016-05-08 21:11:54','El tiempo pasa y nos vamos poniendo más viejos','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/e35/13188054_1845131512381168_353674796_n.jpg?ig_cache_key=MTI0NTk4MjUzMTkxNDYyMjQ2OA%3D%3D.2\"}]','','https://www.instagram.com/p/BFKnoLjHOYEOlJqyl1wnt5AiXMg3ReBX5vpW1I0/'),(28,3,'1283425729752635065_2226281848','2016-06-29 13:04:51','Se vieneeee','[{\"type\":\"video\",\"src\":\"https://scontent.cdninstagram.com/t50.2886-16/13545111_1092555414166402_414212149_n.mp4\"}]','','https://www.instagram.com/p/BHPpOa9gJa550KiaBxzCiFbLtROWqo0BdB-Znc0/'),(29,3,'1245982531914622468_2226281848','2016-05-08 21:11:54','El tiempo pasa y nos vamos poniendo más viejos','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/e35/13188054_1845131512381168_353674796_n.jpg?ig_cache_key=MTI0NTk4MjUzMTkxNDYyMjQ2OA%3D%3D.2\"}]','','https://www.instagram.com/p/BFKnoLjHOYEOlJqyl1wnt5AiXMg3ReBX5vpW1I0/'),(51,2,'185666064280_10154935426554281','2017-01-15 12:03:56','','[{\"type\":\"video\",\"src\":\"https://video.xx.fbcdn.net/v/t42.1790-2/16022472_1766505610336749_6618765123936845824_n.mp4?efg=eyJybHIiOjYzNywicmxhIjo1MTIsInZlbmNvZGVfdGFnIjoic3ZlX3NkIn0%3D&rl=637&vabr=354&oh=c28ac9b8a3826a39b114b60047cae603&oe=588CFB4B\"}]','Municipalidad de Berazategui',NULL),(53,2,'185666064280_10154930425964281','2017-01-13 19:39:45','Vecinos, los invito a disfrutar de las difererentes propuestas que tiene el #CicloDeVerano para este fin de semana en #Berazategui: \n-“Patio de Tango y Folclore”\n-“Mandolinata Blu y Coro Abruzzo”\n-“El Estreno, a cargo de la compañia teatral Joligud”.  \nTodas las actividades son con entrada libre y gratuita, en el Centro De Actividades Roberto De Vicenzo y en nuestro hermoso Complejo Municipal #ElPatio.\nPara consultar la agenda completa para todo enero y febrero ???? http://www.berazategui.gob.ar','[{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/15977441_10154930425964281_5738740337626070708_n.png?oh=809929c3b42c8eb7cf97b1d8fd8cdbfa&oe=5915F615\"}]','',NULL),(54,2,'185666064280_10154926339894281','2017-01-12 16:56:48','LLEGA LA #FERIAEMPRENDER A LA COSTA DE HUDSON\n\nEste sábado 14 y domingo 15 de enero se realizará una nueva edición del tradicional paseo de compras, pero esta vez y para disfrutar del verano, la cita es en la #CostaDeHudson. En esta feria, más de 50 emprendedores berazateguenses presentarán sus creaciones en calzado, indumentaria, marroquinería, madera y cerámica, entre otras variedades. \n\nAcercate el sábado de 16 a 02 hs. y el domingo de 16 a 22 hs. \n\nPara conocer más sobre cada uno de los empr','[{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/15965608_1776729202652869_427569851082406160_n.png?oh=686576063e99706bf7e165986a10a3b0&oe=590F543E\"}]','Municipalidad de Berazategui',NULL),(58,3,'1417452090158866835_2226281848','2016-12-31 11:11:18','Alejándome un poco','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/e35/14591920_1808286139388387_1603409496024023040_n.jpg?ig_cache_key=MTQxNzQ1MjA5MDE1ODg2NjgzNQ%3D%3D.2\"}]','','https://www.instagram.com/p/BOrzSqADeGTw4OuTgp26vFifnWomA4rQ3fAgjk0/'),(65,2,'185666064280_10154939469984281','2017-01-16 18:17:13','Vecinos, quiero compartirles las propuestas de viajes, paseos y salidas de nuestra Agencia de #TurismoMunicipal, para disfrutar en familia o con amigos durante todo el mes de marzo\nPara realizar reservas y/o inscripciones, pueden llamar al 4356-9200 int. 1316 o acercarse al al 2° piso de la  Muni de lunes a viernes de 8.00 a 14.00.\nAdemás, pueden acceder a diferentes descuentos presentando tu tarjeta #iD. Para más información: www.berazategui.gob.ar/turismo','[{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/15977492_10154939469984281_4081359599787442090_n.jpg?oh=154fe0e5ebfd4048da910e461d57488a&oe=591658A0\"}]','',NULL),(66,2,'185666064280_10154941604659281','2017-01-17 13:25:19','MERCADO VECINO – REPROGRAMACIÓN \n\nDebido a las malas condiciones climáticas del día lunes, #MercadoVecino se realizará mañana miércoles 18 de enero, de 8 a 16 hs. en #PlazaRigolleau.\n\nA través de esta iniciativa,  podés comprar frutas, verduras y flores sin intermediarios; y los productores agrícolas de #Berazategui, cuentan con un espacio para la comercialización de sus productos.\n\nSe suspende por lluvia ??','[{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/16142341_1779977725661350_7230829059702794410_n.jpg?oh=96c024398205732f8f9822513ba9fcd7&oe=591888A9\"}]','Municipalidad de Berazategui',NULL),(71,1,'821864046488121344','2017-01-18 20:37:12','Mañana comienza una nueva semana de #CicloDeVerano en #Berazategui. Conocé toda la programación en https://t.co/Gyo6pvh9WD. https://t.co/YE32MnQDrg','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C2d_uGQWIAE_vby.jpg\"}]','MunicipioBerazategui',NULL),(73,3,'1421462909305705692_2226281848','2017-01-06 00:00:05','Cuando todos llegamos al acuerdo de que son una gran provincia','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/15803334_227616334351319_1971369248466927616_n.jpg?ig_cache_key=MTQyMTQ2MjkwOTMwNTcwNTY5Mg%3D%3D.2\"}]','','https://www.instagram.com/p/BO6DPwaj1TcDbPxhJAT_PZRxTE1u-c9n5RmGbk0/'),(75,2,'185666064280_10154942759159281','2017-01-17 21:12:21','Así vivimos la 4ta. edición de #EspacioFoodTruck y #FeriaEmprender en nuestra #CostaDeHudson.\nMiles de vecinos se acercaron a disfrutar de las propuestas gastronómicas, la feria de emprendedores locales y las diferentes actividades; pero sobre todo de este espacio tan lindo, que es público, que es de todos y que pudimos recuperar para todos los berazateguenses!\nSigamos cuidando y disfrutando #Berazategui! #CuidemosNuestraCiudad','[{\"type\":\"video\",\"src\":\"https://video.xx.fbcdn.net/v/t42.1790-2/16158483_202428930223467_6398238864187588608_n.mp4?efg=eyJybHIiOjY1MywicmxhIjo1MTIsInZlbmNvZGVfdGFnIjoic3ZlX3NkIn0%3D&rl=653&vabr=363&oh=fc129fb3cc887a4304c44b32a284cd4c&oe=588BE019\"}]','',NULL),(76,1,'824270396941828097','2017-01-25 11:59:11','“Me gustaría conversar con Vidal acerca de los problemas de Berazategui”, refirió Patricio Mussi https://t.co/vgYSM1EHFC','[]','Gustavo Sylvestre',NULL),(77,2,'185666064280_10154958277734281','2017-01-22 19:25:22','Un poco de historia...\n#PaseoDelCincuentenario\n\nSeguro muchos de ustedes pasan por este paseo (que está sobre Avenida 14 y va desde Av. Juan Manuel Fangio hasta la subida de la Autopista), todos los días, cuando entran y salen de #Bera! Y también deben haber visto cientos de veces el emblema de este lugar que es nuestro faro de 10 metros de altura, que ya se convirtió en un símbolo de #Berazategui - (les cuento que es una obra del artista Tito Ingenieri, que se construyó en hormigón y vidrio, y ','[{\"type\":\"video\",\"src\":\"https://video.xx.fbcdn.net/v/t42.1790-2/16250977_160749387747538_5096441423595569152_n.mp4?efg=eyJybHIiOjMwMCwicmxhIjo1MTIsInZlbmNvZGVfdGFnIjoic3ZlX3NkIn0%3D&rl=300&vabr=138&oh=94ca2ad1189b63153e3c51483258c4a3&oe=588CDA18\"}]','',NULL),(78,1,'824735187841978369','2017-01-26 18:46:06','Chicos, abuelos, papás y profes, festejaron el cierre de la #ColoniaDeVeranoMunicipal de los grupos de enero https://t.co/xddVBfjIR2 https://t.co/yiCcH3HSzq','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C3IMRZ-XAAEssGI.jpg\"},{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C3IMRZ3WgAATcP8.jpg\"},{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C3IMRZ-WgAAZ-PQ.jpg\"},{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C3IMRZ0WEAEH-GA.jpg\"}]','','https://twitter.com/statuses/824735187841978369'),(79,2,'185666064280_10154973654229281','2017-01-26 16:55:41','Ayer la #ColoniaMunicipal tuvo un día de festejo, alumnos, papás y profes, hicieron una despedida para los grupos de enero! \n\nCerca de 1500 nenes y nenas, abuelos, chicos con capacidades especiales y adolescentes de #Bera , pasaron sus vacaciones en nuestro Complejo #LosPrivilegiados un hermoso espacio que después de mucho esfuerzo, pudimos recuperar para que hoy sea un lugar público que pueden disfrutar todos los vecinos! \n\nLes comparto algunas fotos, y esperamos ansiosos para darle la bienveni','[{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/16299033_10154973654229281_1365973941282696750_n.jpg?oh=5f1649c98937b54d351a97bedfa85d97&oe=590251D5\"},{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/16387416_10154973653069281_43990985250569635_n.jpg?oh=7f576963b9948f257156482c356f29b7&oe=5904A342\"},{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/16299536_10154973653569281_8367100301186147863_n.jpg?oh=d0a3ac35049584c1d21d8f8848567ba6&oe=594ABD11\"},{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/16298604_10154973655824281_2757768570523570975_n.jpg?oh=b7b9d8f5cd8018386b012f91963b2c15&oe=591F7BD7\"},{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/16298891_10154973655559281_3220165470385103257_n.jpg?oh=8717fe5a0e7da6d6883e7175fc224250&oe=590C05DC\"}]','',NULL),(80,3,'1434889063811243483_2226281848','2017-01-24 12:35:27','Un poquitos más de vacaciones','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/16124211_1913501218878662_6116578933300264960_n.jpg?ig_cache_key=MTQzNDg4OTA2MzgxMTI0MzQ4Mw%3D%3D.2\"}]','','https://www.instagram.com/p/BPpwABMj93bHqI9Y6uD3rmFO44_7ZcJjPkS_lk0/'),(81,1,'8.2538069600076E+17','2017-01-28 13:31:07','Te compartimos algunos consejos para evitar un #GolpeDeCalor ????? durante el #Verano ???? #CuidaTuSalud ? #Berazategui https://t.co/t9VBOL679R','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C3RXSOcWMAAxvWO.jpg\"}]','MunicipioBerazategui','https://twitter.com/statuses/825380696000757760'),(82,1,'8.2538066859511E+17','2017-01-28 13:31:00','#BuenSabado!\nConocé las #FarmaciasDeTurno para este fin de semana en #Berazategui ? https://t.co/dHo4urOH5a https://t.co/qso2Tb6PGP','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C3QoQQNXUAEAyVg.jpg\"}]','MunicipioBerazategui','https://twitter.com/statuses/825380668595113984'),(85,1,'825109837809848321','2017-01-27 19:34:49','Y la semana q viene firmaremos el decreto en #Berazategui para declarar asuetos municipales los días 24 de Marzo y 2 de Abril #el24nosetoca','[]','','https://twitter.com/statuses/825109837809848321'),(86,1,'825109365715779585','2017-01-27 19:32:57','Hoy salí a pedalear x #Bera, y pasé x el #PaseoDeLaMemoria, desde este lugar me sumo al pedido de los compañeros Intendentes #el24nosetoca! https://t.co/Ma5oLus7GU','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C3NgcYgWQAAZVR-.jpg\"},{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C3Ngjf9WIAA2OWd.jpg\"}]','','https://twitter.com/statuses/825109365715779585'),(87,1,'825380696000757760','2017-01-28 13:31:07','Te compartimos algunos consejos para evitar un #GolpeDeCalor ????? durante el #Verano ???? #CuidaTuSalud ? #Berazategui https://t.co/t9VBOL679R','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C3RXSOcWMAAxvWO.jpg\"}]','MunicipioBerazategui','https://twitter.com/statuses/825380696000757760'),(88,1,'825380668595113984','2017-01-28 13:31:00','#BuenSabado!\nConocé las #FarmaciasDeTurno para este fin de semana en #Berazategui ? https://t.co/dHo4urOH5a https://t.co/qso2Tb6PGP','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C3QoQQNXUAEAyVg.jpg\"}]','MunicipioBerazategui','https://twitter.com/statuses/825380668595113984'),(89,4,'nVqQ8FtDbMo','2015-05-03 23:10:49','Intendente Patricio Mussi mano a mano con Luis Majul en \"La Cornisa\" - 03/05/2015','\"\"','','https://www.youtube.com/watch?v=nVqQ8FtDbMo'),(90,4,'45vqoE7k49Y','2016-03-03 15:08:19','Entrevista a Juan Patricio Mussi con Coco Sily en Radio POP 101.5 - 03/03/2016','\"\"','','https://www.youtube.com/watch?v=45vqoE7k49Y'),(91,1,'828373470870433792','2017-02-05 19:43:20','[AVISO VECINO] – BARRIOS DE BERAZATEGUI AFECTADOS POR CORTES DE @oficialedesur https://t.co/RJeMKCI6Qk https://t.co/Yl12icN1Fa','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C37RJfOWYAAWnFk.jpg\"}]','MunicipioBerazategui','https://twitter.com/statuses/828373470870433792'),(92,1,'828274581689491457','2017-02-05 13:10:23','[ALERTA VECINO] Según el @SMN_Argentina se registrarán tormentas fuertes y ráfagas durante toda la tarde. Consejos ? https://t.co/KHCjdDYQA6 https://t.co/U8rluWEI6F','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C36cCIvWAAUBNDq.jpg\"}]','MunicipioBerazategui','https://twitter.com/statuses/828274581689491457'),(93,5,'2','0000-00-00 00:00:00','que esto? lo puedo romper?','[{\"type\":\"photo\",\"src\":\"http://localhost/mussi/assets/images/conversations/conversation_2.png\"}]','',''),(94,5,'1','2017-02-08 18:16:34','','[{\"type\":\"photo\",\"src\":\"http://localhost/mussi/assets/images/conversations/conversation_1.png\"}]','','');
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
  `followers` int(11) DEFAULT NULL,
  PRIMARY KEY (`social_nets_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_nets`
--

LOCK TABLES `social_nets` WRITE;
/*!40000 ALTER TABLE `social_nets` DISABLE KEYS */;
INSERT INTO `social_nets` VALUES (1,'Twitter',129047),(2,'Facebook',142121),(3,'Instagram',401),(4,'Youtube',208),(5,'Conversations',NULL);
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
INSERT INTO `users` VALUES (1,'mussi','32a4585b8e95929021ae548f5eea18b5',1,'patricio','mussi','mussi.jpg');
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

-- Dump completed on 2017-02-08 18:18:44
