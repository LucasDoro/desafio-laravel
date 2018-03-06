-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: desafio_laravel
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (2,'Pizzas salgadas','storage/categories/QUZuQXSkR4uYhhQhRGjllreKLU95Mg2GG5jE3X95.jpeg','2018-03-06 04:32:21','2018-03-06 04:32:21'),(3,'Pizzas doces','storage/categories/rKWnd7dwQxv7nRcyZl4caPma6G2RbGLyauhsElsw.jpeg','2018-03-06 04:38:44','2018-03-06 04:38:44');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'storage/products/Xx2DGpK7MVIuTABgjy1GTxo55VTttlTb2eA8jTeq.jpeg','2018-03-06 04:34:22','2018-03-06 04:34:22'),(2,'storage/products/O0IkadZxSbRs0gg7TJ3EGjK8kWuSHnOTAeT31eDY.jpeg','2018-03-06 04:34:52','2018-03-06 04:34:52'),(3,'storage/products/VnvzKGkb1iswHx3Z9ycco9RBlXIfHsvQbATp7ie3.jpeg','2018-03-06 04:35:54','2018-03-06 04:35:54'),(4,'storage/products/MzewKTbZ0nO9Q8J6KavOJnSVNUgDDakLVw62v7ak.jpeg','2018-03-06 04:35:54','2018-03-06 04:35:54'),(5,'storage/products/5cs0TTS6yuqFVv0nW3Vlee8yiJ8BMKqmoBcd8Rhu.jpeg','2018-03-06 04:35:54','2018-03-06 04:35:54'),(6,'storage/products/zw1HQ3Iwrm4rZeKZbBycqA2m60poMVAPVi1eKqT5.jpeg','2018-03-06 04:35:54','2018-03-06 04:35:54'),(7,'storage/products/SUO2AFJK9vud6zVlSkBqe6qFdOVoCj4s4q4opUlS.jpeg','2018-03-06 04:39:14','2018-03-06 04:39:14'),(8,'storage/products/TXbIW8zNs3yz69I14pYGrvoljB4YAh7In6ejGdFC.jpeg','2018-03-06 04:39:14','2018-03-06 04:39:14'),(9,'storage/products/HRwAaLSfiJXKkb5X4CRqwxnFgJyHVaAljWP6YKoc.jpeg','2018-03-06 04:39:45','2018-03-06 04:39:45'),(10,'storage/products/Vhx1eSxyRKWypRHmK7IESRe5YHOh7D9RjJsE1PkM.jpeg','2018-03-06 04:39:45','2018-03-06 04:39:45'),(11,'storage/products/LYuFpV74PVECY8p1cVs2WG7RGvce8xFdOBxzvCqB.jpeg','2018-03-06 04:40:20','2018-03-06 04:40:20'),(13,'storage/products/c11PSZpYXd2bPW3Vv4Ldyb0dM6ytXJ47uEdVjKpV.jpeg','2018-03-06 04:40:21','2018-03-06 04:40:21'),(14,'storage/products/UUg0A0c2xK3WZGU90Fpe5tXiyY5FU8gzguhigyUJ.jpeg','2018-03-06 04:40:21','2018-03-06 04:40:21'),(15,'storage/products/mo0elzDF23Rn1J8K6A0QIyMN3Mdi5x6vGUuobd6e.jpeg','2018-03-06 04:41:34','2018-03-06 04:41:34'),(16,'storage/products/wxXrTO0jDzt0DeYkit7F8mDH1VHEqMsU0BcDGR94.jpeg','2018-03-06 04:41:34','2018-03-06 04:41:34'),(17,'storage/products/TPCON1zhBd7Qg5bNSSkhBooiMLCI0hRwHyzqcdZr.jpeg','2018-03-06 04:41:34','2018-03-06 04:41:34');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(6,'2016_06_01_000004_create_oauth_clients_table',1),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(8,'2018_02_25_001202_create_products_table',1),(9,'2018_02_25_001214_create_images_table',1),(10,'2018_02_25_001304_product_images',1),(11,'2018_02_25_002159_create_categories_table',1),(12,'2018_02_25_002236_product_categories',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('735cc9b9bdeed23b472d28cd994e905bdb53f9c15bce7e1ed04ddb0fd9346923ea4f0bcb39877e21',3,3,'Grupo New Way','[]',0,'2018-03-06 04:22:06','2018-03-06 04:22:06','2019-03-06 01:22:06'),('aa08f47e97e730d5080091618c13104f605b03742d87929141b6bccf5459c35728706794c96e059b',5,3,'Grupo New Way','[]',0,'2018-03-06 04:45:45','2018-03-06 04:45:45','2019-03-06 01:45:45'),('c78ab7ef5320f25a955f7d4fb7d651e506a2141902eaa312ad621ad67e923106439983f591181564',4,3,'Grupo New Way','[]',0,'2018-03-06 04:42:41','2018-03-06 04:42:41','2019-03-06 01:42:41');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (3,NULL,'Laravel Personal Access Client','nI3h7w7N8BNJlmSbxsEtWoysAxH39gFCnGO0iD0Y','http://localhost',1,0,0,'2018-03-06 04:21:53','2018-03-06 04:21:53'),(4,NULL,'Laravel Password Grant Client','NVz4PseiJnTpxVxhvHJTNeWGXFGU0Y1ou1OV36rg','http://localhost',0,1,0,'2018-03-06 04:21:53','2018-03-06 04:21:53'),(6,4,'App teste','XBic8g9R2dMmunarTWaWbamkg/ibfH0+U98RdtfLdR0=','http://localhost',1,0,0,'2018-03-06 04:42:41','2018-03-06 04:42:41');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,3,'2018-03-06 04:21:53','2018-03-06 04:21:53');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_categories` (
  `product_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `product_categories_product_id_foreign` (`product_id`),
  KEY `product_categories_category_id_foreign` (`category_id`),
  CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (1,2,NULL,NULL),(2,2,NULL,NULL),(3,2,NULL,NULL),(4,3,NULL,NULL),(5,3,NULL,NULL),(7,3,NULL,NULL),(7,2,NULL,NULL),(6,2,NULL,NULL),(6,3,NULL,NULL);
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_images` (
  `product_id` int(10) unsigned NOT NULL,
  `image_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `product_images_product_id_foreign` (`product_id`),
  KEY `product_images_image_id_foreign` (`image_id`),
  CONSTRAINT `product_images_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL),(3,3,NULL,NULL),(3,4,NULL,NULL),(3,5,NULL,NULL),(3,6,NULL,NULL),(4,7,NULL,NULL),(4,8,NULL,NULL),(5,9,NULL,NULL),(5,10,NULL,NULL),(6,11,NULL,NULL),(6,13,NULL,NULL),(6,14,NULL,NULL),(7,15,NULL,NULL),(7,16,NULL,NULL),(7,17,NULL,NULL);
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Pizza salgada 1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis elit, quis vestibulum dolor.',25,'2018-03-06 04:34:22','2018-03-06 04:34:22'),(2,'Pizza salgada 2','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis elit, quis vestibulum dolor.',25,'2018-03-06 04:34:52','2018-03-06 04:34:52'),(3,'Pizza salgada 3','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis elit, quis vestibulum dolor.',25.55,'2018-03-06 04:35:54','2018-03-06 04:35:54'),(4,'Pizza doce 1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis elit, quis vestibulum dolor.',25,'2018-03-06 04:39:14','2018-03-06 04:39:14'),(5,'Pizza doce 2','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis elit, quis vestibulum dolor.',25.5,'2018-03-06 04:39:45','2018-03-06 04:39:45'),(6,'Pizza doce 3','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis elit, quis vestibulum dolor.',25,'2018-03-06 04:40:20','2018-03-06 04:40:20'),(7,'Pizza doce 3 + Pizza salgada','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis elit, quis vestibulum dolor.',50,'2018-03-06 04:41:34','2018-03-06 04:41:34');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'App teste','appteste@teste.teste','$2y$10$er5gLsVZm0LHZmJge2wkm.P3ShEJK7IU6L96M.uS0A0DpJEuNHw22','eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImM3OGFiN2VmNTMyMGYyNWE5NTVmN2Q0ZmI3ZDY1MWU1MDZhMjE0MTkwMmVhYTMxMmFkNjIxYWQ2N2U5MjMxMDY0Mzk5ODNmNTkxMTgxNTY0In0.eyJhdWQiOiIzIiwianRpIjoiYzc4YWI3ZWY1MzIwZjI1YTk1NWY3ZDRmYjdkNjUxZTUwNmEyMTQxOTAyZWFhMzEyYWQ2MjFhZDY3ZTkyMzEwNjQzOTk4M2Y1OTExODE1NjQiLCJpYXQiOjE1MjAzMDA1NjEsIm5iZiI6MTUyMDMwMDU2MSwiZXhwIjoxNTUxODM2NTYxLCJzdWIiOiI0Iiwic2NvcGVzIjpbXX0.xZYEyddJcx52ljfc-IjxBcp8aUr-MUGE3YyUTIdXAjdZ3N7crwj1XD_9IG5wq3hTRVVKco61C6J-phvyRcM4PPmXfP79jdpDvSb8z9337M-tY5Ec1gcGhpnJTsLZ32WM01No-ETX6urQHmp5MloS4V-EXOQo0NiwZx5gFlVr-CKn8cRvg8-VtCAuvdGp7pd5qwf6euzn7GTuA8u_fITF_ZqOPQXnTGkscENfHrjmBfIMPo6THwSdX_rVCgjQb92ufop04-hKB26NyVL-HZXGn8nkChxUACca-Wwbha_9f4umh9ZAcHnFV7JTzlk_rgi2t2Pjh73YlCbXlT_W2ypaSUrK0Mz4d2TvIScpYI3w6YLi6pkSuEzyNeVSZWBW90T7PdK3HqisNIi2Sx_feDqLXmmIvlP6097YXRy-H1Bkl_0viV63SoYdUcYUNGqbk7YFGEB7KaelV4fbeo3lDVO5NnjQvivMFeNkUpVGtbsCWp5FQEDKqSHM6rhF1wgsU2O3QmubcSHEY9T9hJdwLPak0RGHAiqffsDRJhFtI1TuePlXZueecH07zRhGq1cTKfD6CAV7N3cTUTgupNSa3ib9TVd8aGacCZUvEs7i4GtnxnnKTEPpyv3O14nzkrD5iU80wCPiMc4Gg5Zf9tY0PADxM1n8EFeA3vJm4DJquPKH-Z4',NULL,'2018-03-06 04:42:41','2018-03-06 04:42:41');
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

-- Dump completed on 2018-03-05 22:48:30
