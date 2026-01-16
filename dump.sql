-- MySQL dump 10.13  Distrib 8.0.44, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: laravel-comments
-- ------------------------------------------------------
-- Server version	8.0.44-0ubuntu0.24.04.2

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
-- Table structure for table `comment_votes`
--

DROP TABLE IF EXISTS `comment_votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comment_votes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `commenter_id` int unsigned NOT NULL,
  `comment_id` int unsigned NOT NULL,
  `commenter_vote` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_votes_commenter_id_index` (`commenter_id`),
  KEY `comment_votes_comment_id_index` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment_votes`
--

LOCK TABLES `comment_votes` WRITE;
/*!40000 ALTER TABLE `comment_votes` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment_votes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `commenter_id` int unsigned NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` bigint unsigned NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_id` int unsigned DEFAULT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`),
  KEY `comments_child_id_foreign` (`child_id`),
  KEY `comments_commenter_id_index` (`commenter_id`),
  CONSTRAINT `comments_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,'App\\Models\\Post',1,'First comment to first post.',NULL,0,'2026-01-15 00:16:51','2026-01-15 00:16:54',NULL),(2,2,'App\\Models\\Post',1,'Reply to first comment to first post. Reply to first comment to first post.Reply to first comment to first post.Reply to first comment to first post.Reply to first comment to first post.Reply to first comment to first post.',1,0,'2026-01-15 01:18:32','2026-01-15 01:18:35',NULL),(3,1,'App\\Models\\Post',1,'<p>Reply from admin to text on comment #3</p>',2,0,'2026-01-15 04:56:20','2026-01-16 07:40:31',NULL),(4,2,'App\\Models\\Post',1,'Second comment to first post.',NULL,0,'2026-01-15 05:00:30','2026-01-15 05:00:32',NULL),(5,1,'App\\Models\\Post',1,'<p>New comment from admin to text on comment #5</p>',NULL,0,'2026-01-15 19:27:14','2026-01-16 07:42:01',NULL),(6,1,'App\\Models\\Post',1,'<p>New comment to first post from API</p>',NULL,0,'2026-01-15 19:30:54','2026-01-15 20:55:40',NULL),(7,1,'App\\Models\\Post',1,'<p>Reply text on comment #5</p>',5,0,'2026-01-15 22:19:41',NULL,NULL),(8,1,'App\\Models\\News',1,'<p>New comment to first news from API</p>',NULL,0,'2026-01-16 00:08:01',NULL,NULL),(9,5,'App\\Models\\Post',1,'<p>Reply from user#3 text on comment #5</p>',5,0,'2026-01-16 07:33:44','2026-01-16 08:21:33','2026-01-16 08:21:33'),(10,5,'App\\Models\\Post',1,'<p>Reply from user#3 text on comment #1</p>',1,0,'2026-01-16 07:34:34',NULL,NULL),(11,5,'App\\Models\\Post',1,'<p>Reply from user#3 to  comment #3 as comment #11</p>',3,0,'2026-01-16 07:36:08','2026-01-16 08:14:33',NULL),(12,5,'App\\Models\\Post',1,'<p>Reply from user#3 to  comment #5 as comment #12</p>',5,0,'2026-01-16 07:44:25','2026-01-16 08:17:10',NULL),(13,1,'App\\Models\\Post',1,'<p>Reply from admin to  comment #6</p>',6,0,'2026-01-16 07:54:52','2026-01-16 07:59:11',NULL),(14,5,'App\\Models\\Post',1,'<p>Reply from user#3 to  comment #6 as comment #14</p>',6,0,'2026-01-16 08:08:31','2026-01-16 08:18:55',NULL),(15,4,'App\\Models\\Post',1,'<p>Reply from user#2 to  comment #11</p>',11,0,'2026-01-16 08:26:07',NULL,NULL);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_06_30_113500_create_comments_table',1),(4,'2018_11_15_135428_create_comments_votes_table',1),(5,'2019_08_19_000000_create_failed_jobs_table',1),(6,'2026_01_13_232535_create_posts_table',1),(7,'2026_01_13_232551_create_news_table',1),(8,'2019_12_14_000001_create_personal_access_tokens_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'First News Title','<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, tempora!</div>\n        <div>At aut culpa facilis iure sapiente. Aspernatur illo quam quasi.</div>\n        <div>Ab aliquam eos, illo libero magnam nesciunt numquam quas voluptates.</div>\n        <div>Deleniti eveniet iure natus nobis quisquam sed similique sit, voluptates.</div>\n        <div>Architecto, distinctio et facilis fuga magni minima recusandae rem voluptates.</div>\n        <div>Amet aperiam consectetur doloremque laudantium placeat, porro possimus repellendus soluta.</div>\n        <div>Accusantium commodi cum enim explicabo, ipsa laboriosam possimus provident saepe?</div>\n        <div>Dolores fugiat, ipsa obcaecati officia quod sunt ut. Animi, debitis!</div>\n        <div>At cupiditate est sequi. Commodi enim eum hic modi quo?</div>\n        <div>Aliquam amet assumenda eius iste porro quidem quis tempora vero!</div>\n        <div>Autem est exercitationem facilis magnam modi, non quos voluptas voluptatibus?</div>\n        <div>Animi, deserunt dignissimos fugiat natus rem veritatis! Cum eligendi, minima.</div>\n        <div>Ab assumenda incidunt iste iure minus nostrum, quibusdam tenetur vero.</div>\n        <div>At deleniti deserunt dolor enim harum in iusto modi nulla.</div>\n        <div>Ad consequuntur doloribus expedita fugiat quibusdam. Iste nobis obcaecati voluptatum!</div>\n        <div>Blanditiis consequuntur laboriosam nihil obcaecati odio perferendis perspiciatis quasi quo?</div>\n        <div>Aliquid assumenda commodi deserunt dicta et, explicabo laboriosam omnis veniam.</div>\n        <div>Animi est placeat repudiandae. Nulla odio placeat ratione soluta voluptate.</div>\n        <div>Amet corporis eveniet sit. Accusamus et nulla odit quis voluptas.</div>\n        <div>Autem dicta dolorem enim harum, iure iusto necessitatibus nobis similique!</div>','2026-01-15 04:43:40','2026-01-15 04:43:43'),(2,'Second News From API - Title - Updated','<div>\n            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit inventore nobis veniam. Debitis ipsa\n                nam natus, nihil quis similique velit!\n            </div>\n            <div>Corporis debitis dicta dolor ducimus earum, eos eveniet impedit ipsa labore laboriosam, libero, maiores\n                modi molestiae natus placeat possimus quae!\n            </div>\n            <div>Corporis dolor eveniet id ratione veritatis? Deserunt distinctio dolores fuga illum impedit,\n                laboriosam, laudantium natus nesciunt nostrum, praesentium recusandae tempora!\n            </div>','2026-01-15 16:43:29','2026-01-15 16:46:24');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
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
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',1,'auth_token','310f904f87f23a690e53391e4cddbe83f3990c0433579b3462715e7de22c2546','[\"*\"]',NULL,NULL,'2026-01-15 04:35:10','2026-01-15 04:35:10'),(2,'App\\Models\\User',1,'auth_token','22da38ad4436d4f7f6cd5b1d8c3fcc5522a8392117b30a4ea90299ddf66eb68b','[\"*\"]','2026-01-16 07:54:52',NULL,'2026-01-15 11:00:10','2026-01-16 07:54:52'),(3,'App\\Models\\User',1,'auth_token','d71e421498268a8ad09cd409574072fc591c44460b1a9e39bf89f53fdac7c4d7','[\"*\"]','2026-01-16 07:42:01',NULL,'2026-01-15 11:27:25','2026-01-16 07:42:01'),(4,'App\\Models\\User',5,'auth_token','c1af18b45b377b77b4aed94d6d2077daa6f58211ac8f15129e2048c1a5bf3600','[\"*\"]','2026-01-16 07:44:25',NULL,'2026-01-16 07:30:23','2026-01-16 07:44:25'),(5,'App\\Models\\User',4,'auth_token','5d5776a20b71a6f0e60e8777f4c1d4645cf7f282db34193c73f2916eec64b6ac','[\"*\"]','2026-01-16 07:56:30',NULL,'2026-01-16 07:35:38','2026-01-16 07:56:30'),(6,'App\\Models\\User',1,'auth_token','89ec9833ead4a425cc6cfcb68128d37d2628379230853d05220a2faeaad4f894','[\"*\"]','2026-01-16 07:59:11',NULL,'2026-01-16 07:57:12','2026-01-16 07:59:11'),(7,'App\\Models\\User',5,'auth_token','f032d71cd0c7fff29147f2477805a23fbe3f5622e5e78e43f8ea6f9b7234d721','[\"*\"]','2026-01-16 08:23:09',NULL,'2026-01-16 08:00:16','2026-01-16 08:23:09'),(8,'App\\Models\\User',4,'auth_token','6f033e730fec43df9c2e1f3e1d71757afa45380ab54a841ce4649ecd4a7ebe24','[\"*\"]','2026-01-16 08:26:07',NULL,'2026-01-16 08:22:31','2026-01-16 08:26:07');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'First Post Title','<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, tempora!</div>\n        <div>At aut culpa facilis iure sapiente. Aspernatur illo quam quasi.</div>\n        <div>Ab aliquam eos, illo libero magnam nesciunt numquam quas voluptates.</div>\n        <div>Deleniti eveniet iure natus nobis quisquam sed similique sit, voluptates.</div>\n        <div>Architecto, distinctio et facilis fuga magni minima recusandae rem voluptates.</div>\n        <div>Amet aperiam consectetur doloremque laudantium placeat, porro possimus repellendus soluta.</div>\n        <div>Accusantium commodi cum enim explicabo, ipsa laboriosam possimus provident saepe?</div>\n        <div>Dolores fugiat, ipsa obcaecati officia quod sunt ut. Animi, debitis!</div>\n        <div>At cupiditate est sequi. Commodi enim eum hic modi quo?</div>\n        <div>Aliquam amet assumenda eius iste porro quidem quis tempora vero!</div>\n        <div>Autem est exercitationem facilis magnam modi, non quos voluptas voluptatibus?</div>\n        <div>Animi, deserunt dignissimos fugiat natus rem veritatis! Cum eligendi, minima.</div>\n        <div>Ab assumenda incidunt iste iure minus nostrum, quibusdam tenetur vero.</div>\n        <div>At deleniti deserunt dolor enim harum in iusto modi nulla.</div>\n        <div>Ad consequuntur doloribus expedita fugiat quibusdam. Iste nobis obcaecati voluptatum!</div>\n        <div>Blanditiis consequuntur laboriosam nihil obcaecati odio perferendis perspiciatis quasi quo?</div>\n        <div>Aliquid assumenda commodi deserunt dicta et, explicabo laboriosam omnis veniam.</div>\n        <div>Animi est placeat repudiandae. Nulla odio placeat ratione soluta voluptate.</div>\n        <div>Amet corporis eveniet sit. Accusamus et nulla odit quis voluptas.</div>\n        <div>Autem dicta dolorem enim harum, iure iusto necessitatibus nobis similique!</div>','2026-01-15 00:12:33','2026-01-15 00:12:38'),(2,'Second Post From API','<div>\n            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit inventore nobis veniam. Debitis ipsa\n                nam natus, nihil quis similique velit!\n            </div>\n            <div>Corporis debitis dicta dolor ducimus earum, eos eveniet impedit ipsa labore laboriosam, libero, maiores\n                modi molestiae natus placeat possimus quae!\n            </div>\n            <div>Corporis dolor eveniet id ratione veritatis? Deserunt distinctio dolores fuga illum impedit,\n                laboriosam, laudantium natus nesciunt nostrum, praesentium recusandae tempora!\n            </div>','2026-01-15 16:17:03','2026-01-15 16:17:03'),(3,'Third Post From API - Title','<div>\n            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit inventore nobis veniam. Debitis ipsa\n                nam natus, nihil quis similique velit!\n            </div>\n            <div>Corporis debitis dicta dolor ducimus earum, eos eveniet impedit ipsa labore laboriosam, libero, maiores\n                modi molestiae natus placeat possimus quae!\n            </div>\n            <div>Corporis dolor eveniet id ratione veritatis? Deserunt distinctio dolores fuga illum impedit,\n                laboriosam, laudantium natus nesciunt nostrum, praesentium recusandae tempora!\n            </div>','2026-01-15 16:20:30','2026-01-15 16:28:37');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@gmail.com',NULL,'$2y$10$zwv1bNvR49D.dhBVQ3j5Xu2QTh2iD1g/Wqo5mG.dkir2QsaVd2xD6',NULL,'2026-01-15 00:19:45','2026-01-15 00:19:48'),(2,'user1','user1@gmail.com',NULL,'$2y$10$zwv1bNvR49D.dhBVQ3j5Xu2QTh2iD1g/Wqo5mG.dkir2QsaVd2xD6',NULL,'2026-01-15 04:58:32','2026-01-15 04:58:35'),(4,'user2','user2@gmail.com',NULL,'$2y$10$ojpwUQwjvrmdhewg.yWt4OAEzBxLhx47icSV8fo/fgnJfu.NSuhue',NULL,'2026-01-15 04:39:59','2026-01-15 04:39:59'),(5,'user3','user3@gmail.com',NULL,'$2y$10$Ala95QB0JjzMhS.Zm1c9mOjygNt/brzDt/EnpSlkcpGr0GgvC6TeS',NULL,'2026-01-15 04:40:24','2026-01-15 04:40:24');
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

-- Dump completed on 2026-01-16 14:29:04
