-- MariaDB dump 10.19  Distrib 10.7.8-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: students
-- ------------------------------------------------------
-- Server version	10.7.8-MariaDB

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
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES
(1,'3ème','2025-01-08 15:44:09',23000),
(2,'Terminale','2025-01-08 15:44:17',45000),
(5,'Seconde','2025-01-09 12:15:38',35000),
(6,'4ème','2025-01-09 12:15:45',15000),
(7,'6ème','2025-01-09 12:32:44',15000),
(8,'5ème','2025-01-09 12:32:52',15000);
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `mois` varchar(100) NOT NULL,
  `annee` year(4) NOT NULL,
  `payment_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES
(1,2,23001.00,'Janvier',2025,'2025-01-09','2025-01-09 16:08:56','2025-01-29 20:08:54'),
(2,1,20000.00,'Janvier',2025,'2004-10-10','2025-01-09 16:16:23','2025-01-11 21:53:56'),
(3,14,20000.00,'Février',2025,'2025-01-09','2025-01-09 16:47:50','2025-01-11 21:53:56'),
(4,6,15000.00,'Janvier',2025,'2025-01-09','2025-01-09 16:48:20','2025-01-11 21:53:56'),
(5,2,20000.00,'Février',2025,'2025-01-11','2025-01-11 20:51:07','2025-01-11 21:53:56'),
(6,2,20000.00,'Décembre',2024,'2025-01-11','2025-01-11 19:13:13','2025-01-11 21:53:56'),
(7,2,20000.00,'Novembre',2024,'2024-12-11','2025-01-11 19:28:46','2025-01-11 21:53:56');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `class_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES
(1,'MARTIN','Elodie','2004-06-08',1,'2025-01-08 15:44:32',NULL),
(2,'LAURENT','Mélodie','2025-01-09',1,'2025-01-09 03:14:06','/images/students/img_677f919e9325a8.57151425.jpg'),
(3,'DUPONT','Amélie','2025-01-09',1,'2025-01-09 03:14:21',NULL),
(4,'MOREL','Aurélie','2025-01-09',1,'2025-01-09 03:14:40',NULL),
(5,'BERNARD','Emilie','2025-01-09',1,'2025-01-09 03:14:54',NULL),
(6,'LEFEVRE','Coralie','2025-01-09',1,'2025-01-09 03:15:13',NULL),
(14,'SIMON','Valérie','0200-05-12',2,'2025-01-09 09:17:37',NULL),
(17,'RICHARD','Nathalie','2001-05-10',2,'2025-01-09 08:06:27','/images/students/img_677f8383b03e46.27862091.jpeg'),
(25,'DUBOIS','Stéphanie','2002-10-10',1,'2025-01-17 16:45:16',NULL),
(26,'RENAUD','Julie','2025-01-29',5,'2025-01-29 21:19:22',NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
('ÀDMIN','01','admin01@gmail.com','/images/users/img_679aaeb8e9d519.76418773.jpg','$2y$10$wgNet7eefSLJ9x6rCs0Dwe37b2zAK7cIcqev7TD8AYeDv6599QLN2','2025-01-29 21:23:28',5);
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

-- Dump completed on 2025-01-29 23:54:25
