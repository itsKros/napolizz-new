-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 10.10.11.24
-- Generation Time: Oct 23, 2020 at 10:17 AM
-- Server version: 10.2.30-MariaDB-log
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newnapolizz`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `thumb_url` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`id`, `name`, `description`, `price`, `is_active`, `thumb_url`, `created_at`, `updated_at`) VALUES
(1, 'Test Addon 1', 'Test Addon 1', 10.00, 1, NULL, '2020-07-12 23:25:03', '2020-07-12 23:25:03'),
(2, 'Test 2 addon', NULL, 20.00, 0, NULL, '2020-07-12 18:16:42', '2020-07-12 18:35:54'),
(3, 'Test addon 3', 'Test Addon 3', 30.00, 0, 'addons/addon_3.jpeg', '2020-07-12 18:24:17', '2020-07-13 22:49:57'),
(4, 'Test addon 4', 'Test Addon 4', 30.00, 1, 'addons/addon_3.jpeg', '2020-07-12 18:24:17', '2020-07-13 18:25:48'),
(5, 'Test addon 5', 'Test Addon 5', 30.00, 1, 'addons/addon_3.jpeg', '2020-07-12 18:24:17', '2020-07-13 18:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `addon_combo`
--

CREATE TABLE `addon_combo` (
  `id` int(10) UNSIGNED NOT NULL,
  `combo_id` int(3) UNSIGNED NOT NULL,
  `addon_id` int(3) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addon_combo`
--

INSERT INTO `addon_combo` (`id`, `combo_id`, `addon_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '2020-07-16 23:08:20', '2020-07-16 23:08:20'),
(2, 5, 3, '2020-07-16 23:08:20', '2020-07-16 23:08:20'),
(3, 5, 5, '2020-07-16 23:08:20', '2020-07-16 23:08:20'),
(4, 6, 1, '2020-07-16 23:50:19', '2020-07-16 23:50:19'),
(6, 6, 4, '2020-07-16 23:50:19', '2020-07-16 23:50:19'),
(7, 6, 5, '2020-07-17 00:01:01', '2020-07-17 00:01:01'),
(8, 7, 2, '2020-07-26 12:58:40', '2020-07-26 12:58:40'),
(9, 7, 4, '2020-07-26 12:58:40', '2020-07-26 12:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `addon_food`
--

CREATE TABLE `addon_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `food_id` int(3) UNSIGNED NOT NULL,
  `addon_id` int(3) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `state` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `thumb_url` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `thumb_url`, `created_at`, `updated_at`) VALUES
(12, 'Pizza', 'Pizza', NULL, '2020-07-11 10:49:44', '2020-07-11 10:49:44'),
(13, 'Pasta', 'Pasta', NULL, '2020-07-11 10:50:02', '2020-07-11 10:50:02'),
(14, 'Pasta & Oven-Baked Dishes', 'Pasta & Oven-Baked Dishes', NULL, '2020-07-11 10:51:00', '2020-07-11 10:51:00'),
(15, 'Appetizers', 'Appetizers', NULL, '2020-07-11 10:51:23', '2020-07-11 10:51:23'),
(16, 'Salads', 'Salads', NULL, '2020-07-11 10:51:44', '2020-07-11 10:51:44'),
(17, 'Dessert', 'Dessert', NULL, '2020-07-11 10:52:03', '2020-07-11 10:52:03'),
(18, 'Combos', 'Combos', NULL, '2020-07-11 10:52:20', '2020-07-11 10:52:20'),
(19, 'Drinks', 'Drinks', NULL, '2020-07-11 10:52:35', '2020-07-11 10:52:35'),
(20, 'Promotions', 'Promotions', NULL, '2020-07-11 10:52:52', '2020-07-11 10:52:52'),
(22, 'Test 2', 'Test 2', NULL, '2020-07-11 11:21:53', '2020-07-11 11:21:53'),
(23, 'Test Category 3', 'Test Category 3', 'categories/category_23.png', '2020-07-13 10:46:28', '2020-07-13 10:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `combos`
--

CREATE TABLE `combos` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) UNSIGNED NOT NULL,
  `thumb_url` varchar(200) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `lunch_promotion` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `combos`
--

INSERT INTO `combos` (`id`, `name`, `description`, `price`, `thumb_url`, `is_active`, `lunch_promotion`, `created_at`, `updated_at`) VALUES
(5, 'Combo 3', NULL, 30.00, NULL, 1, 1, '2020-07-16 17:38:20', '2020-07-16 18:10:35'),
(6, 'Combo 2', NULL, 20.00, 'combos/combo_6.png', 1, 1, '2020-07-16 18:20:19', '2020-07-16 18:20:20'),
(7, 'Combo 1', 'Test Combo', 30.00, 'combos/combo_7.png', 1, 1, '2020-07-26 17:58:40', '2020-07-26 17:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `combo_food`
--

CREATE TABLE `combo_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `combo_id` int(3) UNSIGNED NOT NULL,
  `food_id` int(3) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `combo_food`
--

INSERT INTO `combo_food` (`id`, `combo_id`, `food_id`, `created_at`, `updated_at`) VALUES
(1, 5, 6, '2020-07-16 23:08:20', '2020-07-16 23:08:20'),
(2, 5, 8, '2020-07-16 23:08:20', '2020-07-16 23:08:20'),
(3, 5, 12, '2020-07-16 23:08:20', '2020-07-16 23:08:20'),
(5, 6, 10, '2020-07-16 23:50:19', '2020-07-16 23:50:19'),
(6, 6, 12, '2020-07-16 23:50:19', '2020-07-16 23:50:19'),
(7, 6, 6, '2020-07-17 00:01:02', '2020-07-17 00:01:02'),
(8, 7, 7, '2020-07-26 12:58:40', '2020-07-26 12:58:40'),
(9, 7, 10, '2020-07-26 12:58:40', '2020-07-26 12:58:40'),
(10, 7, 6, '2020-07-26 12:59:05', '2020-07-26 12:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(3) NOT NULL,
  `code` varchar(30) NOT NULL,
  `coupon_type_id` int(2) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `valid_till` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `min_price` decimal(10,2) DEFAULT NULL,
  `food_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `coupon_type_id`, `discount`, `valid_till`, `is_active`, `min_price`, `food_id`, `created_at`, `updated_at`) VALUES
(5, 'PERCENTDISCOUNT', 2, 10.00, '2020-07-17', 1, NULL, NULL, '2020-07-17 21:36:29', '2020-07-17 21:36:29'),
(4, 'FREEDELIVERY', 1, NULL, '2020-07-17', 1, 20.00, NULL, '2020-07-17 21:29:10', '2020-07-17 21:29:10'),
(6, 'PERCENTDISCOUNTSECONDITEMLOWER', 3, 20.00, '2020-07-31', 1, NULL, NULL, '2020-07-18 11:47:19', '2020-07-18 11:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_types`
--

CREATE TABLE `coupon_types` (
  `id` int(2) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon_types`
--

INSERT INTO `coupon_types` (`id`, `name`) VALUES
(1, 'Free Delivery'),
(2, 'Percent Discount'),
(3, 'Percent Discount Second Item, Lower'),
(4, '$20 Off Total Bill'),
(5, 'Free Gift');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(3) UNSIGNED NOT NULL,
  `category_id` int(3) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `thumb_url` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `category_id`, `name`, `description`, `price`, `is_active`, `thumb_url`, `created_at`, `updated_at`) VALUES
(6, 22, 'Test Food 2', 'Test Food 2', 20.00, 1, 'foods/food_6.jpeg', '2020-07-11 11:27:21', '2020-07-11 11:27:21'),
(7, 22, 'Test Food 3', 'Test Food 3', 30.00, 1, 'foods/food_6.jpeg', '2020-07-11 11:27:21', '2020-07-11 21:41:39'),
(8, 22, 'Test Food 4', 'Test Food 4', 40.00, 0, 'foods/food_6.jpeg', '2020-07-11 11:27:21', '2020-07-12 17:26:29'),
(10, 23, 'Test Food 5', NULL, 50.00, 1, NULL, '2020-07-13 12:01:12', '2020-07-13 15:06:34'),
(12, 23, 'Test Food 6', NULL, 60.00, 0, NULL, '2020-07-13 15:34:35', '2020-07-13 15:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(15, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(16, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(17, '2016_06_01_000004_create_oauth_clients_table', 2),
(18, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('b46b55314949b33674a67e9d532328077811fa33044fdc91fda54f0635ecba40edaa5d70887e4cf5', 113, 2, NULL, '[\"*\"]', 0, '2020-07-19 18:50:16', '2020-07-19 18:50:16', '2021-07-19 13:50:16'),
('cad34932afad21a68f8206525d15a75712f768bd60b0141c05762bc55c4c93f9f3320f53929f0b25', 113, 2, NULL, '[\"*\"]', 0, '2020-07-19 18:51:01', '2020-07-19 18:51:01', '2021-07-19 13:51:01'),
('659cb054c6759de58997f051e7c86c388700c1caa28a1fd7ec439ee4d4fd091ac94a3bc7f064711c', 114, 1, 'appToken', '[]', 0, '2020-07-20 11:55:35', '2020-07-20 11:55:35', '2021-07-20 06:55:35'),
('be3ab4ea5e23a39d011510c03d8bbec74b2d808f72ead18e2809ba861adbc217d16d2cb458267942', 114, 1, 'appToken', '[]', 0, '2020-07-20 11:59:42', '2020-07-20 11:59:42', '2021-07-20 06:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Restosquares Personal Access Client', '9fpWDNsAfRzBizsUe2suOQQ2qLXBft4rksKLcO7D', NULL, 'http://localhost', 1, 0, 0, '2020-07-19 18:40:20', '2020-07-19 18:40:20'),
(2, NULL, 'Restosquares Password Grant Client', 'wCUPjmskU1SfWtC3ugCe7kVEByCYlfSbf3Hw4GDW', 'users', 'http://localhost', 0, 1, 0, '2020-07-19 18:40:20', '2020-07-19 18:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-07-19 18:40:20', '2020-07-19 18:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('310a4809b9241d1bc0278d8f7a1aec7c43a361336c2a73f8cbacc28e124a5fd878ec7e558cd0e1e7', 'b46b55314949b33674a67e9d532328077811fa33044fdc91fda54f0635ecba40edaa5d70887e4cf5', 0, '2021-07-19 13:50:16'),
('b7f505fad6e614bf9797128759008d292b9aefd9f56f12160e129c8ac0988540b07c8c1c6507da4f', 'cad34932afad21a68f8206525d15a75712f768bd60b0141c05762bc55c4c93f9f3320f53929f0b25', 0, '2021-07-19 13:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `phone` varchar(20) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`id`, `name`, `is_active`, `phone`, `postal_code`, `address`, `city`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Test Outlet 1', 1, '987654321', '321653', 'Test Address 1', 'Singapore', 'Singapore', '2020-07-14 23:51:13', '2020-07-18 12:35:21'),
(2, 'Test Outlet 2', 1, '9876543210', '123456', 'Test Address', 'Singapore', 'Singapore', '2020-07-14 18:31:36', '2020-07-14 18:31:36'),
(3, 'Test Outlet 3', 0, '9876543210', '123456', 'Test Address', 'Singapore', 'Singapore', '2020-07-16 11:22:06', '2020-07-16 11:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@restosquares.com', '$2y$10$oTQ3R3vRFSIlVnE6wbEgk.BbJ72vm1qXtYlyw6ovfiehKC/y2H5J.', '2020-07-05 17:39:39'),
('vikas@ssquares.co.in', '$2y$10$D6wGNlzJWdlLhdukKNKfuOuOLphpe1vZDAWNEPac5jBJ7frhhsnUO', '2020-07-14 16:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `name` tinytext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-07-06 22:02:37', '2020-07-06 22:02:39'),
(2, 'staff', '2020-07-06 22:02:49', '2020-07-06 22:02:49'),
(3, 'rider', '2020-07-06 22:05:21', '2020-07-06 22:05:22'),
(4, 'customer', '2020-07-06 22:05:33', '2020-07-06 22:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` tinyint(1) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator', 'admin@napolizz.sg', NULL, '$2y$10$fd2Td73J4OwZ4ldRtWR.L.5Qbj1H3YlQRCk/Q1hFYI9SHXJsWT2Ce', 'w5hQ0a2pWgA4WwwRg0Kw1mtKMfC1PPieOSxQd7ICD67atFchOspY83A5vmy8', '2020-07-03 17:58:29', '2020-07-05 18:04:54'),
(2, 2, 'Prof. Berta Smith', 'nstehr@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'whxxM2nvC1', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(3, 4, 'Eudora Luettgen PhD', 'bernie49@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0BNodeIp61', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(4, 3, 'Fabiola Orn', 'kelly23@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vvidzZM9T2', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(5, 4, 'Lawrence Lowe IV', 'ddietrich@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bmu9PX1xeP', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(6, 4, 'Maria Doyle IV', 'grimes.daisy@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ds37sgogdv', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(7, 4, 'Charity Braun', 'roberta96@example.com', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Qt3GJgE8HJ', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(8, 4, 'Miss Rebekah Larkin', 'janae98@example.com', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Efy36i6zVY', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(9, 2, 'Cecil Morar', 'bswift@example.com', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TMUgYbCUeE', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(10, 3, 'Marlen Marquardt', 'amya44@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rD03Sa5a6b', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(11, 4, 'Jordyn Kohler', 'george.pouros@example.com', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LLOxA0xWPx', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(12, 2, 'Emma Sanford', 'jordon05@example.org', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'b81RvlDXME', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(13, 4, 'Bryce Bartoletti', 'andre.abshire@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'O5H30jOPHP', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(14, 3, 'Dr. Camryn Boyer', 'carole.medhurst@example.com', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OpVjeRN3XY', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(15, 4, 'Laurel Padberg', 'antone94@example.org', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'P80Kf7hcSY', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(16, 4, 'Daryl O\'Kon', 'swift.torrance@example.com', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aOBGTHio0v', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(17, 2, 'Ozella Schroeder', 'gislason.devon@example.com', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DTjciP1Atc', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(18, 4, 'Mr. Domenico DuBuque', 'beatty.thelma@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FTEEUHMuN6', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(19, 2, 'Reid Carter', 'ebba.hayes@example.com', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qTdXC3QAed', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(20, 3, 'Mrs. Kaylah Witting', 'elittel@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pMu9KlTYdi', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(21, 4, 'Mariela Green', 'kpollich@example.org', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'h7ymISItFY', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(22, 3, 'Brain Mraz', 'stanton.davion@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0FiOF0LDi2', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(23, 2, 'Santa Anderson V', 'ghansen@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'avwuxD2Yw5', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(24, 4, 'Erika Hegmann', 'bashirian.kaia@example.org', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Fmpdy6UhNC', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(25, 4, 'Ned Huels', 'iabshire@example.com', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '29sOOn6lNK', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(26, 3, 'Damien Bayer', 'conroy.hipolito@example.org', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UyIWGEaJzT', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(27, 2, 'Oswald Graham', 'dwilliamson@example.com', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WcsB0jnyor', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(28, 3, 'Sidney Mills', 'jarred.mraz@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NWsYyJ4xOq', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(29, 2, 'Giles Paucek', 'tyrel.runolfsson@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5daYLipTyw', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(30, 4, 'Felix Stark MD', 'clabadie@example.org', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qV6DTDsDVt', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(31, 2, 'Ms. Gracie Hessel', 'christiana.mann@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0vtFS6mgVM', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(32, 3, 'Stella Keeling MD', 'satterfield.ephraim@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tLzhqghX1A', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(33, 2, 'Makayla Lehner V', 'koelpin.talia@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'falbFAUJl2', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(34, 3, 'Dr. Lilian Marquardt V', 'cullen04@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cm8baNzWEp', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(35, 3, 'Mr. Reymundo Pagac', 'cindy.glover@example.org', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'O2EZizqlyR', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(36, 3, 'Mr. Jerald Wisoky Jr.', 'dubuque.ava@example.org', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'B0OJDFZYRy', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(37, 2, 'Dr. Dale Runolfsdottir', 'wallace.marks@example.org', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'slXvihJHap', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(38, 4, 'Prof. Junior Lang', 'ali.abernathy@example.com', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hbcrH0oSy0', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(39, 3, 'Tressa Toy', 'kirk44@example.org', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9jQv5zqEGn', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(40, 2, 'Clare Skiles IV', 'dora.kutch@example.org', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LUl6dV9CcC', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(41, 3, 'Kip Klein', 'marge64@example.org', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rzisQV39AU', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(42, 3, 'Prof. Serenity Littel DVM', 'nova42@example.com', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rPp1g2e1PF', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(43, 3, 'Durward Gutmann', 'rlehner@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0BzCMb4TLd', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(44, 2, 'Nat Konopelski', 'carlee.weber@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'u2rNi7iXzt', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(45, 3, 'Soledad Tromp PhD', 'gschultz@example.com', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7YSrCkiJhQ', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(46, 2, 'Marcella Bednar', 'lebert@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Fphm26QmWA', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(47, 3, 'Mr. Armand Weimann', 'dwitting@example.org', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '21rPaMyGMO', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(48, 3, 'Devonte Kshlerin', 'hoyt09@example.org', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bKPYk0YW7z', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(49, 2, 'Caleb Torp', 'steuber.aniyah@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xzlZczkG9f', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(50, 3, 'Bella Okuneva', 'elisa94@example.org', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3UqkwBWYqN', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(51, 2, 'Jakayla Gleason', 'roslyn43@example.net', '2020-07-08 16:46:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UkcxbUDq0J', '2020-07-08 16:46:50', '2020-07-08 16:46:50'),
(52, 3, 'Jo Herman', 'kwehner@example.org', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RZdxltxlyW', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(53, 4, 'Romaine Glover', 'elliot.kuvalis@example.org', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pn5TROSE20', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(54, 4, 'Jasen Herzog', 'jaleel.balistreri@example.org', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kpjJrBdFlx', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(55, 4, 'Murl Gutkowski', 'littel.collin@example.org', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sqtUuasK2T', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(56, 4, 'Everardo Mann', 'koch.melany@example.com', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NMnjkCXPHv', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(57, 4, 'Perry Kunde', 'klangosh@example.org', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Jgo8ZQHf96', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(58, 4, 'Dr. Kyra Carter DVM', 'leora22@example.com', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Q5u325Bbix', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(59, 2, 'Jalen Witting', 'uharris@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '94aFOq8831', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(60, 4, 'Brent Jones PhD', 'elvis86@example.com', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7dbCRSBPUH', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(61, 3, 'Dr. Nickolas Smith DVM', 'mcclure.amie@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QUhYoaefES', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(62, 3, 'Tobin Schowalter III', 'delfina72@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hJGSHMFNEx', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(63, 4, 'Wilford Hermann', 'pagac.ernest@example.org', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4HiFZ2x3i8', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(64, 4, 'Dr. Eugenia Brekke Jr.', 'jeremie.jones@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sclXkTsZHs', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(65, 3, 'Ms. Adrienne Rosenbaum IV', 'hyatt.megane@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LlAPx1SHnK', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(66, 3, 'Mr. Quinton Johnston', 'ryley95@example.com', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'd6lLVchEf3', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(67, 3, 'Gregory Torphy', 'jast.gerry@example.org', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ggqa5ULlBc', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(68, 4, 'Jarrell Kiehn', 'dubuque.al@example.com', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yASWSFWHy8', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(69, 4, 'Edwina Kuphal', 'jameson.klein@example.com', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PHD1DPuLQY', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(70, 2, 'Prof. Samantha Schroeder', 'jerod.sawayn@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ksq8Scsn9v', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(71, 3, 'Bret Stanton', 'verdie.parker@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '133GRT6bBA', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(72, 2, 'Carey Hoeger', 'earline43@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5wJkQhDqPz', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(73, 4, 'Christelle Mraz', 'dickens.maxie@example.org', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zsoHhKYemj', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(74, 4, 'Bryce Hansen', 'rwiza@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PoGTFOgavZ', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(75, 2, 'Sarah Schaden', 'jordi.greenfelder@example.org', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vSFgUBqzRV', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(76, 2, 'Shawna Dare', 'qokon@example.com', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AaKLjnDRxh', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(77, 3, 'Madisyn Renner', 'lon14@example.com', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mN87IRwwXe', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(78, 4, 'Jayme Cassin', 'wiley91@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nfvPAkpfxK', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(79, 2, 'Frances Greenfelder Jr.', 'linnie.price@example.com', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Jp3xuGF1h3', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(80, 2, 'Catherine Kovacek', 'gdonnelly@example.org', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mWfvZJqOY1', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(81, 3, 'Gerard Lind', 'katlyn94@example.com', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '14RzAbwn9T', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(82, 2, 'Miss Mallie Feest', 'andres05@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lXw5XoBqAD', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(83, 4, 'Alessia Armstrong', 'rogers43@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rDphJjzwaX', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(84, 4, 'Makenzie Rippin', 'evie.vonrueden@example.com', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nMkyTMC4ae', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(85, 4, 'Tyra Metz Sr.', 'myriam88@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'I5dR5p1se9', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(86, 3, 'Eliezer Davis Sr.', 'miller.damian@example.org', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aOGRkLBr0h', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(87, 3, 'Kyra Mohr', 'bstiedemann@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QvnlPsrCaW', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(88, 4, 'Mr. Quinton Dickens', 'sauer.andy@example.com', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ePR1Ef8iGr', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(89, 3, 'Arielle Maggio', 'hwunsch@example.org', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Qoo2gsD3mx', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(90, 3, 'Rhianna Reilly Sr.', 'dkessler@example.org', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'POBpCCu9Zb', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(91, 2, 'Moshe Durgan', 'rosamond48@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Mhyl8dm99z', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(92, 2, 'Alberto Hammes DVM', 'josefa27@example.org', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8POjcu51Bm', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(93, 3, 'Mr. Dock Ryan IV', 'johnpaul.luettgen@example.com', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VxDIkZsUKA', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(94, 2, 'Antonina Keebler', 'johnson.halie@example.com', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XufkajAeTz', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(95, 3, 'Shayne Streich', 'jschultz@example.org', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '62h6WreS22', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(96, 4, 'Arlie Parker', 'elwyn.rosenbaum@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ujPlKpAQCt', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(97, 3, 'Ari Zieme', 'rutherford.destini@example.org', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QyrHl18gjx', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(98, 2, 'Jeff Cummerata', 'alexander.marvin@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'iM5N8o9Uw3', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(99, 3, 'Mr. Jordy Pfeffer', 'whand@example.org', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'u5yqAH4abz', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(100, 4, 'Carroll Powlowski', 'jerad.abshire@example.net', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FUveySG9X5', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(101, 2, 'Mr. Neil Lang', 'kromaguera@example.com', '2020-07-08 16:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5Kxp9w6QTs', '2020-07-08 16:48:27', '2020-07-08 16:48:27'),
(114, 4, 'Vikas Pandey', 'vikas@ssquares.co.in', NULL, '$2y$10$mjX2ItSblwDa8cnNimJP6e5pNMjqTFjAaVc3d4xGVo4bOckS5qF1u', NULL, '2020-07-20 11:55:32', '2020-07-20 11:55:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addon_combo`
--
ALTER TABLE `addon_combo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Combo_AddonCombo` (`combo_id`),
  ADD KEY `FK_Addon_AddonCombo` (`addon_id`);

--
-- Indexes for table `addon_food`
--
ALTER TABLE `addon_food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Food_Addon_Food` (`food_id`),
  ADD KEY `FK_Addon_Addon_Food` (`addon_id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_User_Address` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `combos`
--
ALTER TABLE `combos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `combo_food`
--
ALTER TABLE `combo_food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Combo_ComboFood` (`combo_id`),
  ADD KEY `FK_Food_ComboFood` (`food_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_types`
--
ALTER TABLE `coupon_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Category_ID_On_Food` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `addon_combo`
--
ALTER TABLE `addon_combo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `addon_food`
--
ALTER TABLE `addon_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `combos`
--
ALTER TABLE `combos`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `combo_food`
--
ALTER TABLE `combo_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupon_types`
--
ALTER TABLE `coupon_types`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addon_combo`
--
ALTER TABLE `addon_combo`
  ADD CONSTRAINT `FK_Addon_AddonCombo` FOREIGN KEY (`addon_id`) REFERENCES `addons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Combo_AddonCombo` FOREIGN KEY (`combo_id`) REFERENCES `combos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `addon_food`
--
ALTER TABLE `addon_food`
  ADD CONSTRAINT `FK_Addon_Addon_Food` FOREIGN KEY (`addon_id`) REFERENCES `addons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Food_Addon_Food` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `FK_User_Address` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `combo_food`
--
ALTER TABLE `combo_food`
  ADD CONSTRAINT `FK_Combo_ComboFood` FOREIGN KEY (`combo_id`) REFERENCES `combos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Food_ComboFood` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `FK_Category_ID_On_Food` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
