-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 06:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userid` varchar(255) NOT NULL,
  `productid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `name`, `price`, `image`, `quantity`, `created_at`, `updated_at`, `userid`, `productid`) VALUES
(343, 'got', 3000.00, '1714813958.jfif', 2, '2024-05-06 05:35:15', '2024-05-06 23:03:10', '1', '26'),
(347, 'kipsta slik', 447.00, '1714038020.jpeg', 1, '2024-05-06 06:54:13', '2024-05-06 06:54:13', '1', '25'),
(348, 'got', 3000.00, '1714813958.jfif', 1, '2024-05-06 07:01:32', '2024-05-06 07:01:32', '2', '26'),
(349, 'cw', 4000.00, '1712835862.jpg', 2, '2024-05-06 07:01:35', '2024-05-06 07:08:47', '2', '19');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Boot', '1712127377.jpg', '2024-04-03 01:26:17', '2024-04-03 01:26:17'),
(2, 'jersey', '1712127391.jfif', '2024-04-03 01:26:31', '2024-04-03 01:26:31'),
(3, 'cap', '1712127402.jpg', '2024-04-03 01:26:42', '2024-04-03 01:26:42'),
(4, 'NBAjersey', '1713527869.jfif', '2024-04-19 06:27:49', '2024-04-19 06:27:49'),
(5, 'Football', '1714024663.jpeg', '2024-04-25 00:27:43', '2024-04-25 00:27:43'),
(6, 'Tshirts', '1714037131.jpeg', '2024-04-25 03:55:31', '2024-04-25 03:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `email`, `mobile`, `message`, `created_at`, `updated_at`) VALUES
(1, 'stranger123@gmail.com', 914682937563, 'ddd', '2024-04-03 01:27:16', '2024-04-03 01:27:16'),
(2, 'noormuhammed12345678@gmail.com', 8137850467, 'ggggggggggg', '2024-04-20 05:49:11', '2024-04-20 05:49:11'),
(3, 'noormuhd@gmail.com', 8137850467, 'test', '2024-04-20 05:49:25', '2024-04-20 05:49:25'),
(4, 'noormuhd@gmail.com', 8137850467, 'test', '2024-04-27 04:34:56', '2024-04-27 04:34:56');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0-active, 1-deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`, `status`) VALUES
(1, 'NoorMuhammed', 'noormuhd@gmail.com', '84943403304', 'OTHUPALLIPARAMBU (H),N.A.D(P.O),Nochima,Aluva', '2024-04-12 05:09:53', '2024-04-22 01:30:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loggedusers`
--

CREATE TABLE `loggedusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loggedusers`
--

INSERT INTO `loggedusers` (`id`, `name`, `mobile`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'person', 4682937563, 'stranger123@gmail.com', '$2y$10$1asyEV3qli23oLyEkDrM2eh5.tOq.6aEnXP645ZAhWiqCLUY9zgN.', '2024-03-22 23:28:22', '2024-03-22 23:28:22'),
(2, 'noor muhd', 8137850467, 'noormuhd@gmail.com', '$2y$10$P1nG73bFGQSxzEU6IrZaju0mMxbl9hR.c8M.Cx4rvjnkLSHvYANAm', '2024-03-22 23:40:19', '2024-03-22 23:40:19'),
(3, 'Joshna Joy', 7560815628, 'joshna@gmail.com', '$2y$10$gvbgbaYe2ytQgqxl/ZjfXOz28H2Lx1.IsYf.4KXNJSnTEmoE0Plie', '2024-04-22 06:22:30', '2024-04-22 06:22:30'),
(4, 'noor', 84943403304, 'nick123@gmail.com', '$2y$10$QorERBEht03D6Kvu.oFyru98Rz1N6ucYmVGqhqyCpa7X5tcJ9Iw2.', '2024-03-26 00:09:32', '2024-03-26 00:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(117, '2014_10_12_000000_create_users_table', 1),
(118, '2014_10_12_100000_create_password_resets_table', 1),
(119, '2019_08_19_000000_create_failed_jobs_table', 1),
(120, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(121, '2024_03_18_102502_create_customers_table', 1),
(122, '2024_03_19_091331_alter_table_customers_add_status', 1),
(123, '2024_03_19_095435_create_product_table', 1),
(124, '2024_03_19_102214_alter_table_product_add_status', 1),
(133, '2024_03_27_090102_create_contactus_table', 2),
(134, '2024_03_30_045740_create_category_table', 3),
(135, '2024_03_30_050318_alter_table_products_add_categoryname', 4),
(136, '2024_03_30_100019_alter_table_cart_add_userid', 5),
(137, '2024_03_30_120015_alter_table_carts_add_productid', 6),
(138, '2024_04_01_055928_create_orderitems_table', 7),
(139, '2024_04_02_103349_create_payments_table', 8),
(141, '2024_04_01_055818_create_order_table', 9),
(142, '2024_04_20_064711_add_description_to_products_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productname` varchar(255) NOT NULL,
  `productid` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `productname`, `productid`, `quantity`, `price`, `userid`, `image`, `order_id`, `created_at`, `updated_at`) VALUES
(57, 'kkl', '22', 1, '3000', '1', '1712899286.jpg', '1', '2024-04-22 06:35:05', '2024-04-22 06:35:05'),
(58, 'ttt', '18', 3, '2000.00', '1', '1712835846.jfif', '2', '2024-04-22 07:10:13', '2024-04-22 07:10:13'),
(59, 'jersey', '17', 1, '2000.00', '1', '1712835831.jfif', '2', '2024-04-22 07:10:13', '2024-04-22 07:10:13'),
(60, 'jersey', '17', 1, '2000.00', '2', '1712835831.jfif', '3', '2024-04-24 23:20:38', '2024-04-24 23:20:38'),
(61, 'Boot', '20', 1, '444.00', '2', '1712899216.jpg', '3', '2024-04-24 23:20:38', '2024-04-24 23:20:38'),
(62, 'kipsta slik', '25', 1, '444.00', '2', '1714038020.jpeg', '4', '2024-04-25 04:37:32', '2024-04-25 04:37:32'),
(63, 'jersey', '17', 1, '2000.00', '2', '1712835831.jfif', '5', '2024-04-25 06:09:14', '2024-04-25 06:09:14'),
(64, 'kipsta new', '24', 1, '4000.00', '2', '1714027090.jpeg', '5', '2024-04-25 06:09:14', '2024-04-25 06:09:14'),
(65, 'jersey', '17', 1, '2000.00', '2', '1712835831.jfif', '6', '2024-04-25 06:31:11', '2024-04-25 06:31:11'),
(66, 'kipsta slik', '25', 1, '444.00', '2', '1714038020.jpeg', '6', '2024-04-25 06:31:11', '2024-04-25 06:31:11'),
(67, 'person', '21', 1, '999.00', '2', '1712899236.jfif', '6', '2024-04-25 06:31:11', '2024-04-25 06:31:11'),
(68, 'kipsta slik', '25', 2, '444.00', '2', '1714038020.jpeg', '7', '2024-04-27 04:12:16', '2024-04-27 04:12:16'),
(69, 'jersey', '17', 1, '2000.00', '2', '1712835831.jfif', '7', '2024-04-27 04:12:16', '2024-04-27 04:12:16'),
(70, 'ttt', '18', 1, '2000.00', '2', '1712835846.jfif', '8', '2024-04-27 04:32:55', '2024-04-27 04:32:55'),
(71, 'Boot', '20', 1, '444.00', '2', '1712899216.jpg', '8', '2024-04-27 04:32:55', '2024-04-27 04:32:55'),
(72, 'cw', '19', 1, '4000.00', '2', '1712835862.jpg', '8', '2024-04-27 04:32:55', '2024-04-27 04:32:55'),
(73, 'cw', '19', 1, '4000', '2', '1712835862.jpg', '10', '2024-04-27 05:30:58', '2024-04-27 05:30:58'),
(74, 'Boot', '20', 2, '444.00', '1', '1712899216.jpg', '11', '2024-04-30 05:43:01', '2024-04-30 05:43:01'),
(75, 'person', '21', 2, '999.00', '1', '1712899236.jfif', '11', '2024-04-30 05:43:01', '2024-04-30 05:43:01'),
(76, 'jersey', '17', 2, '2000.00', '1', '1712835831.jfif', '12', '2024-05-01 03:48:31', '2024-05-01 03:48:31'),
(77, 'person', '21', 2, '999.00', '1', '1712899236.jfif', '12', '2024-05-01 03:48:31', '2024-05-01 03:48:31'),
(78, 'ttt', '18', 2, '2000.00', '1', '1712835846.jfif', '12', '2024-05-01 03:48:31', '2024-05-01 03:48:31'),
(79, 'got', '26', 1, '3000', '1', '1714813958.jfif', '13', '2024-05-04 05:47:15', '2024-05-04 05:47:15'),
(80, 'got', '26', 1, '3000.00', '1', '1714813958.jfif', '14', '2024-05-06 02:24:32', '2024-05-06 02:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paymentid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL,
  `totalprice` double(8,2) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `paymentid`, `name`, `added_date`, `totalprice`, `address`, `state`, `city`, `pincode`, `mobile`, `userid`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pay_O1f5Cmre0X6KXK', 'Albert', '2024-04-22 12:05:05', 3000.00, '4th mile vegas,2034', 'Kerala', 'ernakulam', '43432', '04682937563', '1', '1', '2024-04-22 06:35:05', '2024-04-24 23:21:31'),
(2, 'pay_O1fgFqUDHOYBHq', 'Albert', '2024-04-22 12:40:13', 8000.00, '4th mile vegas,2034', 'Kerala', 'ernakulam', '43432', '04682937563', '1', '1', '2024-04-22 07:10:13', '2024-04-24 23:21:22'),
(3, 'pay_O2jHS6AZkx1bxp', 'noor', '2024-04-25 04:50:38', 2444.00, 'OTHUPALLIPARAMBU (H),N.A.D(P.O\nSIGNAL BUSSTOP,ALUVA', 'Kerala', 'ERNAKULAM', '683563', '84943403304', '2', '1', '2024-04-24 23:20:38', '2024-04-24 23:21:14'),
(4, 'pay_O2ogINhzYTsdvS', 'noor muhammed', '2024-04-25 10:07:32', 444.00, 'OTHUPALLIPARAMBU (H),N.A.D(P.O\nSIGNAL BUSSTOP,ALUVA', 'Kerala', 'ERNAKULAM', '683563', '08137850467', '2', '2', '2024-04-25 04:37:32', '2024-04-25 04:38:04'),
(5, 'pay_O2qFBbZiaL6ddX', 'noor muhammed', '2024-04-25 11:39:14', 6000.00, 'OTHUPALLIPARAMBU (H),N.A.D(P.O\nSIGNAL BUSSTOP,ALUVA', 'Kerala', 'ERNAKULAM', '683563', '08137850467', '2', '1', '2024-04-25 06:09:14', '2024-04-26 22:58:55'),
(6, 'pay_O2qcJpujl6UkTY', 'person', '2024-04-25 12:01:11', 3443.00, '4th mile vegas,2034', 'Kerala', 'ernakulam', '434324', '468293756', '2', '1', '2024-04-25 06:31:11', '2024-04-25 06:37:40'),
(7, 'pay_O3bJr2xwC6XjbV', 'noor muhammed', '2024-04-27 09:42:16', 2888.00, 'OTHUPALLIPARAMBU (H),N.A.D(P.O\nSIGNAL BUSSTOP,ALUVA', 'Kerala', 'ERNAKULAM', '683563', '08137850467', '2', '0', '2024-04-27 04:12:16', '2024-04-27 04:12:16'),
(8, 'pay_O3bff0Ur3Iy3YU', 'noor muhammed', '2024-04-27 10:02:55', 6444.00, 'OTHUPALLIPARAMBU (H),N.A.D(P.O\nSIGNAL BUSSTOP,ALUVA', 'Kerala', 'ERNAKULAM', '683563', '08137850467', '2', '0', '2024-04-27 04:32:55', '2024-04-27 04:32:55'),
(9, 'pay_O3bg7SKYfLPPzL', 'person', '2024-04-27 10:03:21', 6444.00, '4th mile vegas,2034', 'Kerala', 'ernakulam', '434324', '468293756', '2', '2', '2024-04-27 04:33:21', '2024-04-27 05:32:58'),
(10, 'pay_O3cewyNyIjVmvZ', 'noor muhammed', '2024-04-27 11:00:58', 4000.00, 'OTHUPALLIPARAMBU (H),N.A.D(P.O\nSIGNAL BUSSTOP,ALUVA', 'Kerala', 'ERNAKULAM', '683563', '8137850467', '2', '1', '2024-04-27 05:30:58', '2024-04-27 05:32:37'),
(11, 'pay_O4oT2RgzowWZrn', 'noor muhammed', '2024-04-30 11:13:01', 2886.00, 'OTHUPALLIPARAMBU (H),N.A.D(P.O\nSIGNAL BUSSTOP,ALUVA', 'Kerala', 'ERNAKULAM', '683563', '08137850467', '1', '2', '2024-04-30 05:43:01', '2024-05-04 04:16:50'),
(12, 'pay_O5B38qZmMRMNXM', 'Noor', '2024-05-01 09:18:31', 9998.00, 'OTHUPALLIPARAMBU (H),N.A.D(P.O\nSIGNAL BUSSTOP,ALUVA', 'Kerala', 'ERNAKULAM', '683563', '84943403304', '1', '2', '2024-05-01 03:48:31', '2024-05-04 04:16:38'),
(13, 'pay_O6Og1phuwFrlcM', 'noor muhammed', '2024-05-04 11:17:15', 3000.00, 'OTHUPALLIPARAMBU (H),N.A.D(P.O\nSIGNAL BUSSTOP,ALUVA', 'Kerala', 'ERNAKULAM', '683563', '08137850467', '1', '1', '2024-05-04 05:47:15', '2024-05-04 05:47:37'),
(14, 'pay_O78IBoi02Yyyb0', 'Noor', '2024-05-06 07:54:32', 3000.00, 'OTHUPALLIPARAMBU (H),N.A.D(P.O\nSIGNAL BUSSTOP,ALUVA', 'Kerala', 'ERNAKULAM', '683563', '84943403304', '1', '3', '2024-05-06 02:24:32', '2024-05-06 07:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `r_payment_id` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `json_response` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0-active, 1-deleted',
  `categoryname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `name`, `description`, `price`, `image`, `status`, `categoryname`) VALUES
(16, '2024-04-11 06:13:37', '2024-04-20 01:53:11', 'bt3', 'Black and Yellow  Nike Limited Edition', 4000, '1712905881.jpg', 0, 'Boot'),
(17, '2024-04-11 06:13:51', '2024-04-20 01:52:00', 'jersey', 'This is FC dortmund 2023 Edition Jersey', 2000, '1712835831.jfif', 0, 'jersey'),
(18, '2024-04-11 06:14:06', '2024-05-04 04:33:36', 'ttthh', 'FC Marselle 2022 Edition Jersey', 2000, '1712835846.jfif', 0, 'jersey'),
(19, '2024-04-11 06:14:22', '2024-04-20 02:57:47', 'cw', 'Trucker cap leather finished', 4000, '1712835862.jpg', 0, 'cap'),
(20, '2024-04-11 23:50:16', '2024-04-20 02:58:10', 'Boot', 'boot for sale\r\nflat 10% discount', 444, '1712899216.jpg', 0, 'Boot'),
(21, '2024-04-11 23:50:36', '2024-04-20 02:58:48', 'person', 'NBA jersey for basketball\r\nall sizes are available', 999, '1712899236.jfif', 0, 'NBAjersey'),
(22, '2024-04-11 23:51:26', '2024-04-20 02:59:12', 'kkl', 'demoo piece\r\nNOT recomended', 3000, '1712899286.jpg', 0, 'NBAjersey'),
(23, '2024-04-25 00:32:58', '2024-04-25 00:32:58', 'Kipsta Fifa basic', 'Kipsta Fifa basic version 2023', 2500, '1714024978.jpeg', 0, 'Football'),
(24, '2024-04-25 01:08:10', '2024-04-25 01:08:10', 'kipsta new', 'Green Kipsta new ediition future', 4000, '1714027090.jpeg', 0, 'Football'),
(25, '2024-04-25 04:10:20', '2024-04-25 07:23:58', 'kipsta slik', 'kipsta off-white tshit', 447, '1714038020.jpeg', 0, 'Tshirts'),
(26, '2024-05-04 03:42:38', '2024-05-04 03:42:38', 'got', 'ewwwwwwwwwwewwwwwwwwwew', 3000, '1714813958.jfif', 0, 'cap');

-- --------------------------------------------------------

--
-- Table structure for table `userloggeds`
--

CREATE TABLE `userloggeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userloggeds`
--

INSERT INTO `userloggeds` (`id`, `name`, `mobile`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Albert', 832399312, 'stranger123@gmail.com', '$2y$10$H.kmbwaGx0/2/hIxLXOCuuAs9v45O1/jRGEWJE.s3kynH8003a3sK', '2024-04-22 06:32:02', '2024-05-06 02:18:39'),
(2, 'Noor', 8137850467, 'noormuhd@gmail.com', '$2y$10$NCw8ZufGq.65NRzCs2cfZuFDE1Lii5pptmrCFv9IcXhPHyLL9gX4u', '2024-04-24 23:19:30', '2024-04-24 23:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `loggedusers`
--
ALTER TABLE `loggedusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loggedusers_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userloggeds`
--
ALTER TABLE `userloggeds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userloggeds_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loggedusers`
--
ALTER TABLE `loggedusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `userloggeds`
--
ALTER TABLE `userloggeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
