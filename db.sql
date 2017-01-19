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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_posts`
--

LOCK TABLES `categories_posts` WRITE;
/*!40000 ALTER TABLE `categories_posts` DISABLE KEYS */;
INSERT INTO `categories_posts` VALUES (20,2,67),(21,3,67),(22,7,67),(45,2,73),(46,7,73),(55,2,75);
/*!40000 ALTER TABLE `categories_posts` ENABLE KEYS */;
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
  PRIMARY KEY (`posts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (5,1,'2147483647','2017-01-08 21:30:37','Mañana llega una nueva edición de #MercadoVecino. Comprá verdura, fruta y flores directo del productor #Berazategui https://t.co/tyFzn9FsCy','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mjGnAXAAAhSfY.jpg\"}]',''),(6,1,'2147483647','2017-01-08 18:35:52','Este domingo, de 18 a 23 hs., disfrutá de la Peatonal Gastronómica de #PlazaSanMartin al aire libre! Te esperamos! https://t.co/KrSK20yoeQ','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mi7ZZXcAERWUH.jpg\"}]',''),(7,2,'185666064280_10154842909549281','2016-12-18 13:18:20','','[{\"type\":\"video\",\"src\":\"https://video.xx.fbcdn.net/v/t42.1790-2/15653605_1873554139557056_8611077466162724864_n.mp4?efg=eyJybHIiOjUwNywicmxhIjo1MTIsInZlbmNvZGVfdGFnIjoic3ZlX3NkIn0%3D&rl=507&vabr=282&oh=99938fd7dc466465a1afe8c4a28bab75&oe=587980B2\"}]',''),(8,2,'185666064280_10154840837754281','2016-12-17 18:39:40','Feliz cumpleaños #PapaFrancisco! Gracias por darnos fuerzas para seguir luchando por los humildes y por los que menos tienen. Gracias por recibirme con tanta calidez y cariño, siempre con una sonrisa, cada vez que visité el #Vaticano en representación de mi querida ciudad! Un gran saludo y todo el amor del Pueblo de Berazategui en este día tan especial, que Dios te ilumine y te bendiga #PapaFrancisco!','[{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/15621596_10154840831554281_6673211227739305918_n.jpg?oh=35927be8ef9a6594f14e8bd9b0a9419c&oe=590DBC3F\"},{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/15622341_10154840831584281_7093915667648043638_n.jpg?oh=0b10346a1ca3215589991cd169d9ff71&oe=58DAF433\"}]',''),(10,2,'185666064280_10154914226994281','2017-01-09 10:48:55','#FelizCumple al mejor Intendente de la historia de #Berazategui. Gracias viejo por tanto! Te quiero ??#MussiEsBerazategui','[{\"type\":\"video\",\"src\":\"https://video.xx.fbcdn.net/v/t42.1790-2/15961489_1236873146362569_6637307232193085440_n.mp4?efg=eyJybHIiOjY1MSwicmxhIjo1MTIsInZlbmNvZGVfdGFnIjoic3ZlX3NkIn0%3D&rl=651&vabr=362&oh=35f5aab33b65d2e9d322a5a14caabdde&oe=588012D6\"}]',''),(11,1,'818792705211953153','2017-01-10 09:12:48','[#IMPORTANTE]?#EDEA y #EDESUR informan: por cortes de energía eléctrica, habrá baja presión de agua en #Berazategui ?https://t.co/9RJPDLeYKQ https://t.co/VrD6nSll8P','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1zvLwdWQAExHHM.jpg\"}]',''),(12,1,'818253607564783617','2017-01-08 21:30:37','Mañana llega una nueva edición de #MercadoVecino. Comprá verdura, fruta y flores directo del productor #Berazategui https://t.co/tyFzn9FsCy','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mjGnAXAAAhSfY.jpg\"}]',''),(13,1,'818792705211953153','2017-01-10 09:12:48','[#IMPORTANTE]?#EDEA y #EDESUR informan: por cortes de energía eléctrica, habrá baja presión de agua en #Berazategui ?https://t.co/9RJPDLeYKQ https://t.co/VrD6nSll8P','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1zvLwdWQAExHHM.jpg\"}]','MunicipioBerazategui'),(14,1,'818253607564783617','2017-01-08 21:30:37','Mañana llega una nueva edición de #MercadoVecino. Comprá verdura, fruta y flores directo del productor #Berazategui https://t.co/tyFzn9FsCy','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C1mjGnAXAAAhSfY.jpg\"}]','MunicipioBerazategui'),(15,3,'','0000-00-00 00:00:00','','null',''),(16,3,'','0000-00-00 00:00:00','','null',''),(17,3,'1283425729752635065_2226281848','2016-06-29 13:04:51','Se vieneeee','[{\"type\":\"video\",\"src\":\"https://scontent.cdninstagram.com/t50.2886-16/13545111_1092555414166402_414212149_n.mp4\"}]',''),(18,3,'1245982531914622468_2226281848','2016-05-08 21:11:54','El tiempo pasa y nos vamos poniendo más viejos','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/e35/13188054_1845131512381168_353674796_n.jpg?ig_cache_key=MTI0NTk4MjUzMTkxNDYyMjQ2OA%3D%3D.2\"}]',''),(19,3,'1283425729752635065_2226281848','2016-06-29 13:04:51','Se vieneeee','[{\"type\":\"video\",\"src\":\"https://scontent.cdninstagram.com/t50.2886-16/13545111_1092555414166402_414212149_n.mp4\"}]',''),(20,3,'1245982531914622468_2226281848','2016-05-08 21:11:54','El tiempo pasa y nos vamos poniendo más viejos','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/e35/13188054_1845131512381168_353674796_n.jpg?ig_cache_key=MTI0NTk4MjUzMTkxNDYyMjQ2OA%3D%3D.2\"}]',''),(23,1,'820978542175485952','2017-01-16 09:58:32','#BuenLunes! Hasta las 16 hs podés acercarte a #MercadoVecino  y comprar verdura, fruta y flores directo del productor #Berazategui ???????????????? https://t.co/tGj9UsOMsl','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C2SzRt0WQAEm5xH.jpg\"}]','MunicipioBerazategui'),(25,3,'1283425729752635065_2226281848','2016-06-29 13:04:51','Se vieneeee','[{\"type\":\"video\",\"src\":\"https://scontent.cdninstagram.com/t50.2886-16/13545111_1092555414166402_414212149_n.mp4\"}]',''),(26,3,'1245982531914622468_2226281848','2016-05-08 21:11:54','El tiempo pasa y nos vamos poniendo más viejos','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/e35/13188054_1845131512381168_353674796_n.jpg?ig_cache_key=MTI0NTk4MjUzMTkxNDYyMjQ2OA%3D%3D.2\"}]',''),(28,3,'1283425729752635065_2226281848','2016-06-29 13:04:51','Se vieneeee','[{\"type\":\"video\",\"src\":\"https://scontent.cdninstagram.com/t50.2886-16/13545111_1092555414166402_414212149_n.mp4\"}]',''),(29,3,'1245982531914622468_2226281848','2016-05-08 21:11:54','El tiempo pasa y nos vamos poniendo más viejos','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/e35/13188054_1845131512381168_353674796_n.jpg?ig_cache_key=MTI0NTk4MjUzMTkxNDYyMjQ2OA%3D%3D.2\"}]',''),(51,2,'185666064280_10154935426554281','2017-01-15 12:03:56','','[{\"type\":\"video\",\"src\":\"https://video.xx.fbcdn.net/v/t42.1790-2/16022472_1766505610336749_6618765123936845824_n.mp4?efg=eyJybHIiOjYzNywicmxhIjo1MTIsInZlbmNvZGVfdGFnIjoic3ZlX3NkIn0%3D&rl=637&vabr=354&oh=a03ca41bc30be2e0df8a8c7d1eb66a53&oe=5883C0CB\"}]','Municipalidad de Berazategui'),(53,2,'185666064280_10154930425964281','2017-01-13 19:39:45','Vecinos, los invito a disfrutar de las difererentes propuestas que tiene el #CicloDeVerano para este fin de semana en #Berazategui: \n-“Patio de Tango y Folclore”\n-“Mandolinata Blu y Coro Abruzzo”\n-“El Estreno, a cargo de la compañia teatral Joligud”.  \nTodas las actividades son con entrada libre y gratuita, en el Centro De Actividades Roberto De Vicenzo y en nuestro hermoso Complejo Municipal #ElPatio.\nPara consultar la agenda completa para todo enero y febrero ???? http://www.berazategui.gob.ar','[{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/15977441_10154930425964281_5738740337626070708_n.png?oh=809929c3b42c8eb7cf97b1d8fd8cdbfa&oe=5915F615\"}]',''),(54,2,'185666064280_10154926339894281','2017-01-12 16:56:48','LLEGA LA #FERIAEMPRENDER A LA COSTA DE HUDSON\n\nEste sábado 14 y domingo 15 de enero se realizará una nueva edición del tradicional paseo de compras, pero esta vez y para disfrutar del verano, la cita es en la #CostaDeHudson. En esta feria, más de 50 emprendedores berazateguenses presentarán sus creaciones en calzado, indumentaria, marroquinería, madera y cerámica, entre otras variedades. \n\nAcercate el sábado de 16 a 02 hs. y el domingo de 16 a 22 hs. \n\nPara conocer más sobre cada uno de los empr','[{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/15965608_1776729202652869_427569851082406160_n.png?oh=686576063e99706bf7e165986a10a3b0&oe=590F543E\"}]','Municipalidad de Berazategui'),(58,3,'1417452090158866835_2226281848','2016-12-31 11:11:18','Alejándome un poco','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/e35/14591920_1808286139388387_1603409496024023040_n.jpg?ig_cache_key=MTQxNzQ1MjA5MDE1ODg2NjgzNQ%3D%3D.2\"}]',''),(65,2,'185666064280_10154939469984281','2017-01-16 18:17:13','Vecinos, quiero compartirles las propuestas de viajes, paseos y salidas de nuestra Agencia de #TurismoMunicipal, para disfrutar en familia o con amigos durante todo el mes de marzo\nPara realizar reservas y/o inscripciones, pueden llamar al 4356-9200 int. 1316 o acercarse al al 2° piso de la  Muni de lunes a viernes de 8.00 a 14.00.\nAdemás, pueden acceder a diferentes descuentos presentando tu tarjeta #iD. Para más información: www.berazategui.gob.ar/turismo','[{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/15977492_10154939469984281_4081359599787442090_n.jpg?oh=154fe0e5ebfd4048da910e461d57488a&oe=591658A0\"}]',''),(66,2,'185666064280_10154941604659281','2017-01-17 13:25:19','MERCADO VECINO – REPROGRAMACIÓN \n\nDebido a las malas condiciones climáticas del día lunes, #MercadoVecino se realizará mañana miércoles 18 de enero, de 8 a 16 hs. en #PlazaRigolleau.\n\nA través de esta iniciativa,  podés comprar frutas, verduras y flores sin intermediarios; y los productores agrícolas de #Berazategui, cuentan con un espacio para la comercialización de sus productos.\n\nSe suspende por lluvia ??','[{\"type\":\"photo\",\"src\":\"https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/16142341_1779977725661350_7230829059702794410_n.jpg?oh=96c024398205732f8f9822513ba9fcd7&oe=591888A9\"}]','Municipalidad de Berazategui'),(71,1,'821864046488121344','2017-01-18 20:37:12','Mañana comienza una nueva semana de #CicloDeVerano en #Berazategui. Conocé toda la programación en https://t.co/Gyo6pvh9WD. https://t.co/YE32MnQDrg','[{\"type\":\"photo\",\"src\":\"http://pbs.twimg.com/media/C2d_uGQWIAE_vby.jpg\"}]','MunicipioBerazategui'),(73,3,'1421462909305705692_2226281848','2017-01-06 00:00:05','Cuando todos llegamos al acuerdo de que son una gran provincia','[{\"type\":\"photo\",\"src\":\"https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/15803334_227616334351319_1971369248466927616_n.jpg?ig_cache_key=MTQyMTQ2MjkwOTMwNTcwNTY5Mg%3D%3D.2\"}]',''),(75,2,'185666064280_10154942759159281','2017-01-17 21:12:21','Así vivimos la 4ta. edición de #EspacioFoodTruck y #FeriaEmprender en nuestra #CostaDeHudson.\nMiles de vecinos se acercaron a disfrutar de las propuestas gastronómicas, la feria de emprendedores locales y las diferentes actividades; pero sobre todo de este espacio tan lindo, que es público, que es de todos y que pudimos recuperar para todos los berazateguenses!\nSigamos cuidando y disfrutando #Berazategui! #CuidemosNuestraCiudad','[{\"type\":\"video\",\"src\":\"https://video.xx.fbcdn.net/v/t42.1790-2/16158483_202428930223467_6398238864187588608_n.mp4?efg=eyJybHIiOjY1MywicmxhIjo1MTIsInZlbmNvZGVfdGFnIjoic3ZlX3NkIn0%3D&rl=653&vabr=363&oh=25fb95fa5c448e334e1c2f1c9fc498c8&oe=5882A599\"}]','');
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

-- Dump completed on 2017-01-19 18:58:10
