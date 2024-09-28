/*
SQLyog Enterprise v12.09 (64 bit)
MySQL - 10.4.32-MariaDB : Database - car_rental
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`car_rental` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `car_rental`;

/*Table structure for table `cars` */

DROP TABLE IF EXISTS `cars`;

CREATE TABLE `cars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `car_type` varchar(50) NOT NULL,
  `daily_rent_price` decimal(8,2) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cars` */

insert  into `cars`(`id`,`name`,`brand`,`model`,`year`,`car_type`,`daily_rent_price`,`availability`,`image`,`created_at`,`updated_at`) values (1,'Model S','Tesla','T',2022,'Electric Sedan','1000.00',1,'uploads/1726769000_Toyota.png','2024-09-17 23:29:55','2024-09-19 18:03:20'),(2,'Mustang GT','Ford','Mustang',2024,'Sports Car','3600.00',1,'uploads/1727509307_Toyota.png','2024-09-17 23:31:09','2024-09-28 13:41:47'),(3,'Camry Hybrid','Toyota','Camry',2022,'Hybrid Sedan','1600.00',1,'uploads/1727510018_Toyota.png','2024-09-17 23:31:41','2024-09-28 13:53:38'),(5,'Civic','Honda','Civic',2022,'Compact Sedan','2500.00',1,'','2024-09-17 23:32:50','2024-09-18 02:06:23'),(6,'F-150','Ford','F-150',2023,'Pickup Truck','3000.00',1,'','2024-09-17 23:33:53','2024-09-18 02:06:23'),(7,'MyCar','Toyota','T97',1997,'Private','1200.00',1,'img_path','2024-09-17 21:08:04','2024-09-17 21:08:04'),(8,'Toyota','Toyota','T97',1997,'Private','1200.00',1,'uploads/1726679453_Toyota.png','2024-09-18 17:10:53','2024-09-28 13:12:28'),(9,'MyCar','Toyota','T97',1997,'Private','1200.00',1,'uploads/1726680703_Toyota.png','2024-09-18 17:31:43','2024-09-18 17:31:43'),(10,'MyCar','Toyota','T97',1997,'Private','1200.00',1,'uploads/1726687200-Toyota.png','2024-09-18 19:20:00','2024-09-18 19:20:00'),(11,'MyCar','Toyota','T97',1997,'Private','1200.00',1,'uploads/1726687218-Toyota.png','2024-09-18 19:20:18','2024-09-18 19:20:18'),(12,'BMW','BMW9','T97',1997,'Private','1200.00',1,'uploads/1726687277_Toyota.png','2024-09-18 19:21:17','2024-09-28 13:14:28'),(13,'MyCar','Toyota','T97',1997,'Private','1200.00',1,'uploads/1726687317-Toyota.png','2024-09-18 19:21:57','2024-09-18 19:21:57'),(14,'Honda','Honda2','T97',1997,'Private','1200.00',1,'uploads/1726687405_Toyota.png','2024-09-18 19:23:25','2024-09-28 13:14:39'),(15,'MyCar','Toyota','T97',1997,'Private','1200.00',1,'uploads/1727509591_Toyota.png','2024-09-18 19:23:42','2024-09-28 13:46:31'),(16,'Hyundai','Hyundai98 ','98',1998,'Private','1200.00',1,'uploads/1726687457_Toyota.png','2024-09-18 19:24:17','2024-09-28 13:15:45'),(17,'MyCar','Toyota','T97',1997,'Private','1200.00',1,'uploads/1726687500_Toyota.png','2024-09-18 19:25:00','2024-09-18 19:25:00'),(18,'Tesla','Tesla34','12',2012,'Private','1200.00',1,'uploads/1726687510_Toyota.png','2024-09-18 19:25:10','2024-09-28 13:15:36'),(22,'New Test Car','BMW','23',2024,'Private','20000.00',1,'uploads/1727510267_Toyota.png','2024-09-28 13:57:09','2024-09-28 13:57:47');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_09_15_181416_create_cars_table',1),(6,'2024_09_15_181918_create_rentals_table',1),(7,'2024_09_20_190425_add_cancel_status_to_rentals_table',2),(8,'2024_09_20_190722_add_cancel_status_to_rentals_table',3),(9,'2024_09_20_191105_add_cancel_status_to_rentals_table',4),(10,'2024_09_21_094614_add_field_to_users_table',5);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `rentals` */

DROP TABLE IF EXISTS `rentals`;

CREATE TABLE `rentals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `car_id` bigint(20) unsigned NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `cancel_status` tinyint(1) NOT NULL DEFAULT 0,
  `total_cost` decimal(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `rentals_user_id_foreign` (`user_id`),
  KEY `rentals_car_id_foreign` (`car_id`),
  CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `rentals` */

insert  into `rentals`(`id`,`user_id`,`car_id`,`start_date`,`end_date`,`cancel_status`,`total_cost`,`created_at`,`updated_at`) values (1,1,3,'2024-09-25','2024-09-30',0,'2000.00','2024-09-20 01:58:09','2024-09-24 02:25:07'),(2,3,5,'2024-09-20','2024-09-25',1,'12500.00','2024-09-20 01:58:26','2024-09-25 01:47:47'),(3,1,1,'2024-09-28','2024-09-30',0,'2000.00','2024-09-20 18:04:18','2024-09-27 16:02:07'),(5,1,8,'2024-09-25','2024-09-30',0,'7200.00','2024-09-24 03:53:39','2024-09-24 03:53:39'),(6,1,16,'2024-09-17','2024-09-24',0,'4800.00','2024-09-24 17:48:21','2024-09-25 00:08:56'),(7,1,18,'2024-10-01','2024-10-10',1,'12000.00','2024-09-25 00:21:28','2024-09-28 14:03:17'),(8,1,14,'2024-10-01','2024-10-14',1,'15600.00','2024-09-27 20:38:20','2024-09-28 13:47:39'),(9,1,12,'2024-10-12','2024-10-18',1,'8400.00','2024-09-27 20:48:20','2024-09-28 13:43:41'),(10,3,12,'2024-10-01','2024-10-10',0,'10800.00','2024-09-28 13:48:11','2024-09-28 13:48:11'),(11,1,22,'2024-10-02','2024-10-09',1,'140000.00','2024-09-28 13:58:25','2024-09-28 13:59:04'),(12,1,6,'2024-10-01','2024-10-07',0,'21000.00','2024-09-28 14:02:49','2024-09-28 14:02:49');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `delete_stat` varchar(255) DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`phone`,`address`,`delete_stat`,`password`,`role`,`created_at`,`updated_at`) values (1,'Intakhab','intakhab.chy@gmail.com','0384000','DHK','0','$2y$12$x14FRIBXe1Dc2dWh74GXvOFMFHp.b8jH1qnGrBoC4WL7OriIPSETe','customer','2024-09-16 08:25:03','2024-09-28 13:44:37'),(2,'admin','intakhab.chowdhury@gmail.com',NULL,NULL,'0','$2y$12$DR9kUyP9hZ.e6fx305nW0OSj4LUnpAFn7LvUVaoQnj5eMPa9GzvVW','admin','2024-09-16 12:56:28','2024-09-27 19:24:04'),(3,'Ikthedar','ikthedar@email.com','1319291','CTG','1','$2y$12$x14FRIBXe1Dc2dWh74GXvOFMFHp.b8jH1qnGrBoC4WL7OriIPSETe','customer','2024-09-21 13:12:52','2024-09-28 13:59:36'),(5,'test user','testuser@gmail.com','42948203','DHK','0','$2y$12$s94oQ8.6VVsUAJv.6V4n8ugaMDDGm8QjYGJRqDmskJS4igArk.W8q','customer','2024-09-28 14:00:15','2024-09-28 14:00:15');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
