-- MySQL dump 10.13  Distrib 5.5.52, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: vsesvit
-- ------------------------------------------------------
-- Server version	5.5.52-0ubuntu0.14.04.1

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
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `continent_id` int(11) NOT NULL,
  `title` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D95DB16BF92F3E70` (`country_id`),
  KEY `IDX_D95DB16B921F4C77` (`continent_id`),
  CONSTRAINT `FK_D95DB16B921F4C77` FOREIGN KEY (`continent_id`) REFERENCES `continents` (`id`),
  CONSTRAINT `FK_D95DB16BF92F3E70` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_form`
--

DROP TABLE IF EXISTS `contact_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `userEmail` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_form`
--

LOCK TABLES `contact_form` WRITE;
/*!40000 ALTER TABLE `contact_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `continents`
--

DROP TABLE IF EXISTS `continents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `continents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `continents`
--

LOCK TABLES `continents` WRITE;
/*!40000 ALTER TABLE `continents` DISABLE KEYS */;
INSERT INTO `continents` VALUES (1,'Aвстралия','Визит в Австралию в наши дни - это своего рода выигрышный лотерейный билет, который дает возможность своими глазами убедиться в неповторимости и самобытности самого маленького из земных континентов. Ведь насладиться неповторимыми природными красотами и уникальными животным и растительным миром Австралии многим мешает ее чрезвычайная труднодоступность - продолжительность авиаперелета в Австралию для европейцев занимает немногим менее суток. Однако тем, кто преодолеет это препятствие, открывается доселе невиданный мир - мир \"антиподов\", такой необычный и загадочный для нашей культуры.  Именно здесь можно увидеть непередаваемую красоту Большого Барьерного Рифа - грандиозной коралловой гряды, подивиться на семью аборигенов, жарящих мясо честно добытого ими кенгуру на костре с помощью тефлоновой сковороды, прокатиться в машине охотника за кенгуру и пообедать в сиднейском ресторане, расположенном в здании бывшей тюрьмы для каторжников.  Раскаленные до пятидесятиградусной температуры пустыни, маленькие патриархальные городки, заброшенные золотые прииски и овцеводческие ранчо здесь сочетаются с мегаполисами в английском стиле и повальным увлечением серфингом на побережьях. А хозяева всего этого богатства уже успели прославиться своей простотой и жизнелюбием на весь мир, где подобные черты, в совокупности с манерой говорить сквозь зубы и с полузакрытыми губами, стали визитной карточкой жителей Terra Australis Incоgnita - Непознанной Южной Земли.  Лучшее время для посещения Австралии зависит от вида предполагаемого отдыха и района, в котором планируется его проведения.  Для посещения Канберры, Сиднея и штата Новый Южный Уэльс с экскурсиями лучше всего подходят периоды с августа по октябрь и с февраля по апрель (местные весна и осень), поскольку в летние месяцы здесь может быть некомфортно из-за жары. Те же периоды стоит порекомендовать европейским любителям пляжного отдыха, приезжающим сюда, а также на всемирно известные курорты Квинсленда - Голдкост и Солнечный берег. Для поездок как с экскурсионными целями, так и для пляжных забав на Южном побережье Австралии (Аделаида, Олбани), в столицу Западной Австралии - в Перт, на остров Тасманию , а также в штат Виктория (Мельбурн) рекомендуются летние месяцы - с ноября по февраль, поскольку климат здесь более прохладный, чем на севере.  Для посещения центральных районов страны (например для поездки в Алис-Спрингс), а также Дарвина рекомендуются зимние месяцы ( июнь - август), в остальное время в континентальных частях Австралии может преобладать весьма жаркая и некомфортная погода, а на севере могут выпадать обильные осадки.  Для серфинга лучше всего подойдут летние месяцы (ноябрь-февраль), когда температура воды достигает 20-25 градусов в различных районах.  То же утверждение справедливо и для дайвинга на южном, западном и восточном побережьях Австралии. На Большом Барьерном Рифе сезон продолжается практически круглый год, но летние месяцы все же пользуются большей популярностью.  Государственным языком Австралии является английский. Одновременно с ним признаны и употребляются в общении более 40 других языков и наречий (итальянский, греческий, немецкий, китайский...)'),(2,'Азия, Ближний и Средний Восток',''),(3,'Африка',''),(4,'Европа',''),(5,'Острова',''),(6,'США и Карибский бассейн','');
/*!40000 ALTER TABLE `continents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `continent_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5D66EBAD921F4C77` (`continent_id`),
  CONSTRAINT `FK_5D66EBAD921F4C77` FOREIGN KEY (`continent_id`) REFERENCES `continents` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Австралия',1,''),(2,'Бруней',2,''),(3,'Грузия',2,''),(4,'Израиль',2,''),(5,'Индия',2,''),(6,'Китай',2,''),(7,'Малайзия',2,''),(8,'ОАЭ',2,''),(9,'Сингапур',2,''),(10,'Тайланд',2,''),(11,'Турция',2,''),(12,'Шри-Ланка',2,''),(13,'Япония',2,''),(14,'Марокко',3,''),(15,'ЮАР',3,''),(16,'Австрия',4,''),(17,'Андорра',4,''),(18,'Бельгия',4,''),(19,'Великобритания',4,''),(20,'Венгрия',4,''),(21,'Германия',4,''),(22,'Греция',4,''),(23,'Дания',4,''),(24,'Ирландия',4,''),(25,'Испания',4,''),(26,'Италия',4,''),(27,'Люксембург',4,''),(28,'Нидерланды',4,''),(29,'Норвегия',4,''),(30,'Португалия',4,''),(31,'Словакия',4,''),(32,'Словения',4,''),(33,'Украина',4,''),(34,'Финляндия',4,''),(35,'Франция',4,''),(36,'Хорватия',4,''),(37,'Черногория',4,''),(38,'Чехия',4,''),(39,'Швейцария',4,''),(40,'Швеция',4,''),(41,'Шотландия',4,''),(42,'Бали',5,''),(43,'Кипр',5,''),(44,'Маврикий',5,''),(45,'Мальдивы',5,''),(46,'Мальта',5,''),(47,'Аргентина',6,''),(48,'Бразилия',6,''),(49,'Канада',6,''),(50,'Мексика',6,''),(51,'Перу',6,''),(52,'США',6,'');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cruises`
--

DROP TABLE IF EXISTS `cruises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cruises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cruises`
--

LOCK TABLES `cruises` WRITE;
/*!40000 ALTER TABLE `cruises` DISABLE KEYS */;
/*!40000 ALTER TABLE `cruises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fos_user`
--

LOCK TABLES `fos_user` WRITE;
/*!40000 ALTER TABLE `fos_user` DISABLE KEYS */;
INSERT INTO `fos_user` VALUES (4,'alina','alina','dr_nona89@gmail.com','dr_nona89@gmail.com',1,'jzxh0rprx80sc004gc48gccswc80g80','$2y$13$SyQKreKucQXhmkaJsg3QeuVwbUYFRU47ooZt5MFAroS/NHAIb.A2.','2016-09-23 14:46:49',0,0,NULL,NULL,NULL,'a:0:{}',0,NULL),(5,'nonko','nonko','dm.nonko@gmail.com','dm.nonko@gmail.com',1,'t5jjihua9b4g48c8soc4k088g8ook84','$2y$13$wyT5cuR6qe.Ib7mmc5S2yu3gp8KoXYJy.bcIZlg.5xF3xDYgZd6TO','2016-10-15 14:41:50',0,0,NULL,NULL,NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}',0,NULL),(6,'dimka','dimka','non4ik89@gmail.com','non4ik89@gmail.com',1,'b3mr8jxzqw0gokogs8sg0kkcw4s08g4','$2y$13$rEBn0KCTGc3wpztxOiX8Pe5aI/Xi6RynzetjXHaF2hnU5.kkLh8Bu','2016-09-23 16:34:40',0,0,NULL,NULL,NULL,'a:0:{}',0,NULL);
/*!40000 ALTER TABLE `fos_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rubrics`
--

DROP TABLE IF EXISTS `rubrics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rubrics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rubrics`
--

LOCK TABLES `rubrics` WRITE;
/*!40000 ALTER TABLE `rubrics` DISABLE KEYS */;
/*!40000 ALTER TABLE `rubrics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tours`
--

DROP TABLE IF EXISTS `tours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `continent_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `enabled` int(11) NOT NULL,
  `ishot` int(11) NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rubric_id` int(11) NOT NULL,
  `description` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_2F0AC70E921F4C77` (`continent_id`),
  KEY `FK_2F0AC70EF92F3E70` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tours`
--

LOCK TABLES `tours` WRITE;
/*!40000 ALTER TABLE `tours` DISABLE KEYS */;
INSERT INTO `tours` VALUES (1,'NCL Epic 5* - новый взляд на круизы',1,1,1,1,1,'hd221.jpg',0,''),(2,'ГРЕЦИЯ. Online поиск туров',1,1,1,1,1,'modtourism_hot_pict_208.jpg',0,''),(3,'АРЕНДА вилл и шале по всему миру',1,1,1,1,1,'modtourism_hot_pict_200.jpg',0,''),(4,'ГРУЗИЯ. Гурман туры по историческим местам',1,1,1,1,1,'modtourism_hot_pict_203.jpg',0,'');
/*!40000 ALTER TABLE `tours` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-15 20:20:26
