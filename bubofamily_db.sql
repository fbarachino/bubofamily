-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: bubofamily_db
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.21.10.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `bubofamily_db`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bubofamily_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `bubofamily_db`;

--
-- Table structure for table `anagraficas`
--

DROP TABLE IF EXISTS `anagraficas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anagraficas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ang_cognome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ang_nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ang_ragioneSociale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ang_codiceFiscale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ang_partitaIva` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ang_note` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anagraficas`
--

LOCK TABLES `anagraficas` WRITE;
/*!40000 ALTER TABLE `anagraficas` DISABLE KEYS */;
/*!40000 ALTER TABLE `anagraficas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,NULL,NULL,'Alimentari'),(2,NULL,NULL,'Abbigliamento'),(3,NULL,NULL,'Salute'),(4,NULL,NULL,'Casalinghi'),(5,NULL,NULL,'Vizi'),(6,NULL,NULL,'Hobbie'),(7,NULL,NULL,'Vacanze'),(8,NULL,NULL,'Benessere e Bellezza'),(9,NULL,NULL,'Macchinetta Caffè'),(10,NULL,NULL,'Stipendio'),(11,NULL,NULL,'Rimborsi'),(12,NULL,NULL,'Affitto'),(13,NULL,NULL,'Anticipi Affitto'),(14,NULL,NULL,'Spese bancarie'),(15,NULL,NULL,'Dolomiti Energia'),(16,NULL,NULL,'Acqua'),(17,NULL,NULL,'Internet'),(18,NULL,NULL,'Beneficenza Offerte'),(19,NULL,NULL,'Telefoni Cellulari'),(20,NULL,NULL,'Sport ed attività'),(21,NULL,NULL,'Automobile');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contatore_en_els`
--

DROP TABLE IF EXISTS `contatore_en_els`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contatore_en_els` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `enel_date` date NOT NULL,
  `enel_A` int NOT NULL,
  `enel_R` int NOT NULL,
  `enel_F1` int NOT NULL,
  `enel_F2` int NOT NULL,
  `enel_F3` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contatore_en_els`
--

LOCK TABLES `contatore_en_els` WRITE;
/*!40000 ALTER TABLE `contatore_en_els` DISABLE KEYS */;
/*!40000 ALTER TABLE `contatore_en_els` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contatore_gases`
--

DROP TABLE IF EXISTS `contatore_gases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contatore_gases` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gas_date` date NOT NULL,
  `gas_lettura` decimal(10,3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contatore_gases`
--

LOCK TABLES `contatore_gases` WRITE;
/*!40000 ALTER TABLE `contatore_gases` DISABLE KEYS */;
INSERT INTO `contatore_gases` VALUES (1,NULL,NULL,'2021-11-13',304.526),(2,NULL,NULL,'2021-11-14',307.251),(3,NULL,NULL,'2021-11-27',339.481),(4,NULL,NULL,'2021-12-18',450.030),(5,NULL,NULL,'2021-12-19',456.843),(6,NULL,NULL,'2021-12-27',503.762),(7,NULL,NULL,'2022-01-08',568.309),(8,NULL,NULL,'2022-02-11',760.517);
/*!40000 ALTER TABLE `contatore_gases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contattos`
--

DROP TABLE IF EXISTS `contattos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contattos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cnt_fk_anagraficaId` bigint unsigned NOT NULL,
  `cnt_tipo` int NOT NULL,
  `cnt_valore` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnt_note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contattos_cnt_fk_anagraficaid_foreign` (`cnt_fk_anagraficaId`),
  CONSTRAINT `contattos_cnt_fk_anagraficaid_foreign` FOREIGN KEY (`cnt_fk_anagraficaId`) REFERENCES `anagraficas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contattos`
--

LOCK TABLES `contattos` WRITE;
/*!40000 ALTER TABLE `contattos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contattos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_02_04_100210_create_tags_table',1),(6,'2022_02_04_134225_create_categories_table',1),(7,'2022_02_04_134245_create_movimentis_table',1),(8,'2022_02_08_093657_create_anagraficas_table',1),(9,'2022_02_08_122700_create_contattos_table',1),(10,'2022_02_12_153430_create_contatore_gases_table',1),(11,'2022_02_12_153454_create_contatore_en_els_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimentis`
--

DROP TABLE IF EXISTS `movimentis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movimentis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mov_data` date NOT NULL,
  `mov_fk_categoria` bigint unsigned NOT NULL,
  `mov_descrizione` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mov_importo` decimal(8,2) NOT NULL,
  `mov_inserito_da` bigint unsigned NOT NULL,
  `mov_fk_tags` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movimentis_mov_fk_categoria_foreign` (`mov_fk_categoria`),
  KEY `movimentis_mov_inserito_da_foreign` (`mov_inserito_da`),
  KEY `movimentis_mov_fk_tags_foreign` (`mov_fk_tags`),
  CONSTRAINT `movimentis_mov_fk_categoria_foreign` FOREIGN KEY (`mov_fk_categoria`) REFERENCES `categories` (`id`),
  CONSTRAINT `movimentis_mov_fk_tags_foreign` FOREIGN KEY (`mov_fk_tags`) REFERENCES `tags` (`id`),
  CONSTRAINT `movimentis_mov_inserito_da_foreign` FOREIGN KEY (`mov_inserito_da`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimentis`
--

LOCK TABLES `movimentis` WRITE;
/*!40000 ALTER TABLE `movimentis` DISABLE KEYS */;
INSERT INTO `movimentis` VALUES (3,NULL,NULL,'2022-02-14',1,'Spesa all\'Aldi',-8.60,1,1),(7,NULL,NULL,'2022-02-15',18,'Prelievo automatico Telethon',-10.00,1,1),(8,NULL,NULL,'2022-02-14',19,'Prelievo automatico Iliad Cellulare',-5.99,1,3),(9,NULL,NULL,'2022-02-16',19,'Prelievo automatico Iliad Cellulare',-5.99,1,2),(10,NULL,NULL,'2022-02-11',20,'Piscina Giulio',-20.00,1,4),(11,NULL,NULL,'2022-02-11',1,'Spesa alimentari Aldi',-13.98,1,1),(12,NULL,NULL,'2022-02-11',1,'Spesa Poli',-22.40,1,1),(13,NULL,NULL,'2022-02-11',5,'Stecca sigarette Flavio',-48.00,1,2),(14,NULL,NULL,'2022-02-10',3,'Visita campo Visivo Paola',-19.00,1,3),(15,NULL,NULL,'2022-02-10',1,'Spesa alimentari Aldi',-50.09,1,1),(16,NULL,NULL,'2022-02-09',3,'Ticket Pronto soccorso Flavio',-50.00,1,2),(17,NULL,NULL,'2022-02-09',17,'Addebito Fibra Aruba.it mese Gennaio',-33.67,1,1),(18,NULL,NULL,'2022-02-08',9,'Macchinetta caffè e integrazione pranzi',-10.00,1,3),(19,NULL,NULL,'2022-02-06',1,'Formaggio caseificio Coredo',-50.00,1,1),(20,NULL,NULL,'2022-02-05',3,'Acquisto cerotti Diclofenac Farmacia Castelnuovo per Flavio',-15.90,1,2),(21,NULL,NULL,'2022-02-05',1,'Spesa alimentari ortoval (Silvia)',-28.00,1,1),(22,NULL,NULL,'2022-02-04',4,'Acquisto casalinghi e divertimenti Giulio',-12.62,1,1),(23,NULL,NULL,'2022-02-04',1,'Acquisto pesce Dallagiacoma',-45.86,1,1),(24,NULL,NULL,'2022-02-03',3,'Acquisto Lasonil e aspirina Farmacia comunale Castelnuovo',-15.45,1,1),(25,NULL,NULL,'2022-02-02',5,'Sigarette Flavio',-48.00,1,2),(26,NULL,NULL,'2022-02-02',1,'Spesa alimentari Daniele',-32.40,1,1),(27,NULL,NULL,'2022-02-01',19,'Addebito Iliad SIM Paola',-5.99,1,3),(28,NULL,NULL,'2022-02-16',6,'Abbonamento ad Audible',-9.99,1,1),(29,NULL,NULL,'2022-02-14',1,'Spesa all\'Aldi',-8.68,1,1),(31,NULL,NULL,'2022-02-01',12,'Affitto Cadine mese di Febbraio',600.00,1,1),(32,NULL,NULL,'2022-02-01',12,'Anticipo spese condominio',60.00,1,1),(33,NULL,NULL,'2022-02-17',21,'Pieno (serbatoio a metà) gasolio TIPO',-47.55,1,2);
/*!40000 ALTER TABLE `movimentis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,NULL,NULL,'Casa'),(2,NULL,NULL,'Flavio'),(3,NULL,NULL,'Paola'),(4,NULL,NULL,'Giulio');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Flavio Barachino','flavio.barachino@gmail.com',NULL,'$2y$10$cR7SkowifYAkxY0YXDvmj.rHF.t.n3cshgUbfCgaSLEFkW/Jyz.wa',NULL,'2022-02-14 06:08:16','2022-02-14 06:08:16');
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

-- Dump completed on 2022-02-20 10:21:13
