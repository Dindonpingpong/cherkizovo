-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: miniShop
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

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
-- Table structure for table `Clients`
--

DROP TABLE IF EXISTS `Clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Clients` (
  `UserID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LastName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NickName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Password` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'User',
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UserID` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Clients`
--

LOCK TABLES `Clients` WRITE;
/*!40000 ALTER TABLE `Clients` DISABLE KEYS */;
INSERT INTO `Clients` VALUES (1,'Nil','Nilov','kitikat','fb131bc57a477c8c9d068f1ee5622ac304195a77164ccc2d75d82dfe1a727ba8d674ed87f96143b2b416aacefb555e3045c356faa23e6d21de72b85822e39fdd','test@test.ru','2020-06-07 23:14:27','User'),(2,'Buy','Luck','monika','fa279e9978755318ff346b73f876e6995db90440d18c0f68790dbb8c609b26f5621394d35a062b38eb554933f33648e2d4473f0498a34ebaa887d79cc42f2b7f','monila@test.ru','2020-06-07 23:14:27','User'),(3,'Amel','Le','Lamel','3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2','lamel@gmail.com','2020-06-07 23:14:27','User'),(4,'super','puper','admin','3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2','admin@minishop.ru','2020-06-07 23:14:27','admin');
/*!40000 ALTER TABLE `Clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Orders`
--

DROP TABLE IF EXISTS `Orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Orders` (
  `OrderID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ClientID` bigint(20) unsigned NOT NULL,
  `OrderDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`OrderID`),
  UNIQUE KEY `OrderID` (`OrderID`),
  KEY `ClientID` (`ClientID`),
  CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `Clients` (`UserID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Orders`
--

LOCK TABLES `Orders` WRITE;
/*!40000 ALTER TABLE `Orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `Orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OrdersPosition`
--

DROP TABLE IF EXISTS `OrdersPosition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OrdersPosition` (
  `OrdersPositionID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `OrderID` bigint(20) unsigned NOT NULL,
  `ProductID` bigint(20) unsigned NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`OrdersPositionID`),
  UNIQUE KEY `OrdersPositionID` (`OrdersPositionID`),
  KEY `OrderID` (`OrderID`),
  KEY `ProductID` (`ProductID`),
  CONSTRAINT `OrdersPosition_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `Orders` (`OrderID`) ON DELETE CASCADE,
  CONSTRAINT `OrdersPosition_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `Products` (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OrdersPosition`
--

LOCK TABLES `OrdersPosition` WRITE;
/*!40000 ALTER TABLE `OrdersPosition` DISABLE KEYS */;
/*!40000 ALTER TABLE `OrdersPosition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Products`
--

DROP TABLE IF EXISTS `Products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Products` (
  `ProductID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci,
  `Price` decimal(11,2) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ProductID`),
  UNIQUE KEY `ProductID` (`ProductID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Products`
--

LOCK TABLES `Products` WRITE;
/*!40000 ALTER TABLE `Products` DISABLE KEYS */;
INSERT INTO `Products` VALUES (1,'Pummel Party','Pummel Party – забава для вечеринок с участием 4-8 игроков.',360.00,30,'PummelParty.jpg'),(2,'PAYDAY 2','PAYDAY 2 - это кооперативный экшн-шутер для четверых игроков.',259.00,30,'Payday2.jpg'),(3,'DOOM Eternal','Армии ада вторглись на Землю. Станьте Палачом Рока и убейте демонов во всех измерениях, чтобы спасти человечество.',1999.00,30,'DoomEternal.jpg'),(4,'Sea of Thieves','В игре Sea of Thieves вас ждут морские путешествия, сражения, исследования и сокровища.',725.00,30,'SeaOfThieves.jpg'),(5,'The Dark Occult','The Dark Occult - психологическая игра ужасов, которая ставит игроков в постоянное состояние тревоги, паники и ужаса.',400.00,30,'TheDarkOccult.jpg'),(6,'Overcooked! 2','Overcooked! 2 - это хаотичная совместная кулинарная игра для 1-4 игроков.',759.00,30,'Overcooked!2.jpg'),(7,'Outlast','Ад - это эксперимент, в котором нельзя выжить в Outlast, игре ужасов на выживание от первого лица.',435.00,30,'Outlast.jpg'),(8,'RESIDENT EVIL 3','Только Джилл Валентайн знает о преступлениях корпорации «Амбрелла». Чтобы остановить ее, «Амбрелла» использует секретное оружие: Немезис!',1999.00,30,'ResidentEvil3.jpg'),(9,'Human: Fall Flat','Human: Fall Flat - необычная игра, где вы будете исследовать окружение и решать физические головоломки, чтобы выбраться из сюрреалистичных снов.',499.00,30,'HumanFallFlat.jpg'),(10,'PUBG','PLAYERUNKNOWN BATTLEGROUNDS - это шутер в котором выигрывает последний оставшийся в живых участник. Это КОРОЛЕВСКАЯ БИТВА!',474.00,30,'PUBG.jpg'),(11,'Borderlands 3','Borderlands 3 - это триквел безумного шутера с элементами RPG в духе Diablo',1990.00,30,'borderlands3.jpg'),(12,'Rocket League','Встречайте долгожданное продолжение Supersonic Acrobatic Rocket-Powered Battle-Cars — всеми любимого основанного на физике сочетания футбола и гонок!',419.00,30,'rocket.jpeg'),(13,'FIFA 20','FIFA 20 — все еще отличный футбольный симулятор, в этот раз с режимом уличного футбола.',1450.00,30,'fifa.jpg'),(14,'NFS HEAT','Need for Speed™ Heat — захватывающая дух игра об уличных гонках, где закон меняется с заходом солнца.',1230.00,30,'nfs.jpg'),(15,'PES 2020','Испытайте несравненную реалистичность и подлинность в главном футбольном симуляторе этого года: PES 2020.',1499.00,30,'pes.jpeg'),(16,'Rainbow Six Siege','Rainbow Six Осада – это продолжение нашумевшего шутера от первого лица, разработанного студией Ubisoft Montreal.',399.99,30,'rss.jpg'),(17,'Total War: WARHAMMER II','Игра Total War: WARHAMMER II включает в себя новую захватывающую кампанию, посвященная освоению и покорению Нового Света.',359.00,30,'tww.jpg'),(18,'Microsoft Flight Simulator X','Microsoft Flight Simulator X. Flight Simulator X — десятая версия популярного симулятора полётов от Microsoft',320.00,30,'msf.jpg'),(19,'The Sims 4','Прямо как Дом - 2, только лучше.',1000.00,30,'sims.jpg'),(20,'Shoppe Keep 2','Стань торговцем в потрясающем сказочном мире с возможностью многопользовательской игры по сети.',259.00,30,'sk2.jpg'),(21,'SCUM','SCUM — это многопользовательская игра на выживание, разворачивающаяся в открытом мире ',1000.00,30,'scum.jpg'),(22,'Burnout™ Paradise Remastered','С возвращением в Paradise City! Докажите всем, что скорость - ваше второе имя!',356.00,30,'burnout.jpg'),(23,'Ultimate fishing simulator','Устали ждать клева? Хотите порыбачить? Вам повезло - в Ultimate Fishing Simulator рыба клюет без остановки!',860.00,30,'fish.jpg'),(24,'Goat Simulator','Почувствуйте себя настоящим козлом!',259.00,30,'goat.jpeg'),(25,'Golf With Your Friends','Для чего нужны друзья, как не для того, чтобы играть с ними в гольф... в Golf With Your Friends!',435.00,30,'golf.jpeg');
/*!40000 ALTER TABLE `Products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Products_Tags`
--

DROP TABLE IF EXISTS `Products_Tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Products_Tags` (
  `TagID` bigint(20) unsigned NOT NULL,
  `ProductID` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`TagID`,`ProductID`),
  KEY `ProductID` (`ProductID`),
  CONSTRAINT `Products_Tags_ibfk_1` FOREIGN KEY (`TagID`) REFERENCES `Tags` (`TagID`) ON DELETE CASCADE,
  CONSTRAINT `Products_Tags_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `Products` (`ProductID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Products_Tags`
--

LOCK TABLES `Products_Tags` WRITE;
/*!40000 ALTER TABLE `Products_Tags` DISABLE KEYS */;
INSERT INTO `Products_Tags` VALUES (1,1),(4,1),(2,2),(4,2),(2,3),(3,3),(1,4),(4,4),(3,5),(1,6),(4,6),(3,7),(3,8),(1,9),(4,9),(1,10),(2,11),(5,12),(6,13),(5,14),(6,15),(2,16),(1,17),(7,18),(7,19),(4,20),(2,21),(5,22),(7,23),(7,24),(6,25);
/*!40000 ALTER TABLE `Products_Tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tags`
--

DROP TABLE IF EXISTS `Tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tags` (
  `TagID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`TagID`),
  UNIQUE KEY `TagID` (`TagID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tags`
--

LOCK TABLES `Tags` WRITE;
/*!40000 ALTER TABLE `Tags` DISABLE KEYS */;
INSERT INTO `Tags` VALUES (1,'Экшен'),(2,'Шутер'),(3,'Хоррор'),(4,'Кооператив'),(5,'Гонки'),(6,'Спорт'),(7,'Симулятор');
/*!40000 ALTER TABLE `Tags` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-07 23:15:05
