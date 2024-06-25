-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2024 at 12:45 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodc`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `title`, `text`, `created_at`, `updated_at`) VALUES
(3, '{\"en\":\"About US\",\"ar\":\"نبذه عن\"}', '{\"en\":\"about us 1\",\"ar\":\"نبذه عننا\"}', '2024-06-19 15:38:33', '2024-06-19 15:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `type` enum('sauci','item') COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`id`, `name`, `price`, `type`, `place_id`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"add 1\",\"ar\":\"عنصر 1\"}', 5, 'item', 1, '2024-01-11 11:49:26', '2024-06-19 14:55:04'),
(5, '{\"en\":\"add 2\",\"ar\":\"عنصر 2\"}', 229, 'item', 1, '2024-02-01 10:42:55', '2024-06-19 14:57:40'),
(6, '{\"en\":\"add 3\",\"ar\":\"عنصر 3\"}', 10, 'item', 1, '2024-02-05 16:17:39', '2024-06-19 15:06:09'),
(7, '{\"en\":\"catchap\",\"ar\":\"كاتشب\"}', 10, 'sauci', 1, '2024-02-05 16:18:40', '2024-06-19 15:08:37'),
(8, '{\"en\":\"extra cheese\",\"ar\":\"جبنه\"}', 50, 'item', 1, '2024-02-11 19:18:21', '2024-06-19 15:09:05'),
(9, '{\"en\":\"sault\",\"ar\":\"سلطه\"}', 2, 'item', 1, '2024-02-11 19:18:44', '2024-06-19 15:09:31'),
(14, '{\"en\":\"maunez\",\"ar\":\"مايونيز\"}', 10, 'sauci', 4, '2024-06-19 15:10:02', '2024-06-19 15:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `place_id` bigint UNSIGNED DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `created_at`, `updated_at`, `place_id`, `role_id`) VALUES
(10, 54, '2024-01-31 13:58:08', '2024-01-31 13:58:08', NULL, 1),
(11, 55, '2024-02-01 07:16:58', '2024-02-01 07:16:58', 1, 2),
(12, 56, '2024-02-01 07:17:35', '2024-02-01 07:17:35', 7, 4),
(13, 75, '2024-03-13 17:07:42', '2024-03-13 17:07:42', NULL, 4),
(15, 77, '2024-05-27 13:49:39', '2024-05-27 13:49:39', 4, 3),
(17, 81, '2024-06-25 08:45:21', '2024-06-25 08:45:21', 31, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `created_at`, `updated_at`, `logo`) VALUES
(33, '{\"en\":\"dents\",\"ar\":\"اسنان\"}', 'clinic', '2024-02-13 19:10:52', '2024-06-19 12:47:45', 'uploads/category/icons8-clinic-80.jpg'),
(36, '{\"en\":\"pizza\",\"ar\":\"بيتزا\"}', 'restaurantes', '2024-02-13 20:02:29', '2024-06-19 12:30:05', 'uploads/category/defultfood.png'),
(38, '{\"en\":\"eye\",\"ar\":\"عيون\"}', 'clinic', '2024-02-13 22:26:55', '2024-06-19 12:48:04', 'uploads/category/icons8-clinic-80.jpg'),
(42, '{\"en\":\"burger\",\"ar\":\"بيرجر\"}', 'restaurantes', '2024-02-13 22:45:00', '2024-06-19 12:30:48', 'uploads/category/defultfood.png'),
(43, '{\"en\":\"water\",\"ar\":\"مياه\"}', 'restaurantes', '2024-05-22 20:49:04', '2024-06-19 12:31:10', 'uploads/category/defultfood.png'),
(44, '{\"en\":\"sweet\",\"ar\":\"حلويات\"}', 'restaurantes', '2024-06-19 12:45:22', '2024-06-19 12:45:22', 'uploads/category/defultfood.png'),
(45, '{\"en\":\"Internal clinic\",\"ar\":\"عياده باطنه\"}', 'clinic', '2024-06-19 13:10:54', '2024-06-19 13:10:54', 'uploads/category/icons8-clinic-80.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category_places`
--

CREATE TABLE `category_places` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `places_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_us`
--

CREATE TABLE `content_us` (
  `id` bigint UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('order','clinic') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'order'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_us`
--

INSERT INTO `content_us` (`id`, `fname`, `lname`, `email`, `phone`, `message`, `created_at`, `updated_at`, `type`) VALUES
(1, 'loaa', 'elsayed', 'loaa@gmail.com', '01212121212', 'kjbsdhgdscdbdmn hdsghvdfbn dhb', '2024-01-17 07:08:05', '2024-01-17 07:08:05', 'order'),
(2, 'loaa', 'elsayed', 'loaa@gmail.com', '01212121212', 'kjbsdhgdscdbdmn hdsghvdfbn dhb', '2024-02-04 10:29:43', '2024-02-04 10:29:43', 'order'),
(3, 'omar', 'elsayed', 'loaa@gmail.com', '01212121212', 'kjbsdhgdscdbdmn hdsghvdfbn dhb', '2024-03-07 15:47:13', '2024-03-07 15:47:13', 'order'),
(4, 'loaa', 'elsayed', 'loaa@gmail.com', '01212121212', 'kjbsdhgdscdbdmn hdsghvdfbn dhb', '2024-03-10 20:30:20', '2024-03-10 20:30:20', 'order'),
(5, 'omar', 'Maamoun', 'omarmaamoun@gmail.com', '01064780620', 'please add more menu', '2024-03-10 21:05:33', '2024-03-10 21:05:33', 'order');

-- --------------------------------------------------------

--
-- Table structure for table `doctores`
--

CREATE TABLE `doctores` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_id` bigint UNSIGNED NOT NULL,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `dayes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `price_fees` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `time` int NOT NULL DEFAULT '0',
  `overview` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale` int DEFAULT NULL,
  `wait` int NOT NULL DEFAULT '5'
) ;

--
-- Dumping data for table `doctores`
--

INSERT INTO `doctores` (`id`, `name`, `department`, `place_id`, `starttime`, `endtime`, `dayes`, `price_fees`, `created_at`, `updated_at`, `time`, `overview`, `image`, `sale`, `wait`) VALUES
(5, '{\"en\":\"loaa elsayed\",\"ar\":\"لؤا السيد\"}', '{\"en\":\"eye\",\"ar\":null}', 7, '13:33:00', '11:21:00', '[\"We\",\"Th\"]', '200.00', '2024-01-30 07:42:02', '2024-06-19 15:57:12', 81, '{\"en\":\"doctor eye\",\"ar\":\"دكتوره عيون\"}', 'uploads/Doctors/icons8-doctor-94.png', NULL, 5),
(7, '{\"en\":\"mohamed\",\"ar\":\"محمود\"}', '{\"en\":\"dents\",\"ar\":\"اسنان\"}', 9, '19:22:00', '13:25:00', '[\"Sun\",\"Th\",\"Fri\"]', '200.00', '2024-01-30 09:36:36', '2024-06-19 16:06:03', 51, '{\"en\":\"dents\",\"ar\":\"اسنان\"}', 'uploads/Doctors/icons8-doctor-94.png', NULL, 5),
(8, '{\"en\":\"mohamed\",\"ar\":\"محمد\"}', '{\"en\":\"dents\",\"ar\":\"اسنان\"}', 7, '05:35:00', '16:42:00', '[\"Sun\",\"Mon\"]', '200.00', '2024-01-30 10:15:11', '2024-06-19 16:02:27', 16, '{\"en\":\"doctor dents\",\"ar\":\"دكتور اسنان\"}', 'uploads/Doctors/icons8-doctor-94.png', NULL, 5),
(9, '{\"en\":\"ahmed\",\"ar\":\"احمد\"}', '{\"en\":\"eye\",\"ar\":\"عيون\"}', 7, '02:20:00', '03:38:00', '[\"Sun\",\"Mon\",\"We\",\"Th\"]', '200.00', '2024-01-30 13:49:57', '2024-06-19 16:03:30', 85, '{\"en\":\"eye\",\"ar\":\"دكتور عيون\"}', 'uploads/Doctors/icons8-doctor-94.png', NULL, 56),
(12, '{\"en\":\"asmaa\",\"ar\":\"اسماء\"}', '{\"en\":\"eye\",\"ar\":\"عيون\"}', 21, '16:00:00', '22:00:00', '[\"Sun\"]', '33.00', '2024-06-06 15:31:27', '2024-06-19 16:07:04', 40, '{\"en\":\"eye\",\"ar\":\"عيون\"}', 'uploads/Doctors/1717662687.jpg', NULL, 10),
(13, '{\"en\":\"saad\",\"ar\":\"سعد\"}', '{\"en\":\"dents\",\"ar\":\"اسنان\"}', 28, '10:50:00', '11:21:00', '[\"Sun\"]', '10.00', '2024-06-19 16:09:40', '2024-06-19 16:09:40', 89, '{\"en\":\"Possimus et sint v\",\"ar\":\"Ea Nam illum aspern\"}', 'uploads/Doctors/icons8-doctor-94.png', 19, 40);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `doctore_id` bigint UNSIGNED DEFAULT NULL,
  `menue_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `place_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `doctore_id`, `menue_id`, `created_at`, `updated_at`, `place_id`) VALUES
(294, 57, NULL, 16, '2024-06-12 19:27:39', '2024-06-12 19:27:39', 1),
(295, 58, NULL, 16, '2024-06-12 19:33:24', '2024-06-12 19:33:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menues`
--

CREATE TABLE `menues` (
  `id` bigint UNSIGNED NOT NULL,
  `place_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `sale` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `count_selling` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menues`
--

INSERT INTO `menues` (`id`, `place_id`, `product_id`, `sale`, `created_at`, `updated_at`, `category_id`, `count_selling`) VALUES
(15, 1, 17, 5, '2024-02-13 22:37:22', '2024-05-30 21:09:39', 36, 20),
(16, 1, 18, 3, '2024-02-13 22:37:29', '2024-03-12 18:17:28', 36, 15),
(18, 4, 19, 100, '2024-05-22 21:08:22', '2024-05-22 21:08:22', 43, 0),
(19, 1, 17, 150, '2024-06-04 22:05:51', '2024-06-04 22:05:51', 36, 0),
(21, 4, 21, 0, '2024-06-25 08:58:55', '2024-06-25 08:58:55', 43, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_08_091028_create_admin_table', 1),
(6, '2024_01_08_091542_create_places_table', 1),
(7, '2024_01_08_091617_create_categories_table', 1),
(8, '2024_01_08_092553_create_products_table', 1),
(9, '2024_01_08_092831_create_addons_table', 1),
(10, '2024_01_08_100418_create_doctores_table', 1),
(11, '2024_01_08_100755_create_orders_table', 1),
(13, '2024_01_08_102847_create_favorites_table', 1),
(14, '2024_01_08_103117_create_menues_table', 1),
(15, '2024_01_09_154825_add_logo_colums_to_categories_table', 2),
(16, '2024_01_10_083910_create_category_places_table', 3),
(17, '2024_01_10_102819_add_price_colums_to_products_table', 4),
(18, '2024_01_11_110143_add_category_id_colums_to_menues_table', 5),
(19, '2024_01_14_100004_create_sizes_table', 6),
(20, '2024_01_14_121819_add_place_id_colums_to_favorites_table', 7),
(21, '2024_01_14_130052_create_aboutus_table', 8),
(23, '2024_01_14_153857_add_status_colums_to_orders_table', 9),
(24, '2024_01_14_155303_add_phone_colums_to_users_table', 10),
(25, '2024_01_14_155405_add_address_colums_to_users_table', 10),
(26, '2024_01_15_100218_add_size_id_colums_to_orders_table', 11),
(27, '2024_01_15_112147_add_delivery_method_colums_to_orders_table', 12),
(28, '2024_01_15_115046_add_delivery_fee_colums_to_places_table', 13),
(29, '2024_01_15_115933_add_delivery_fee_colums_to_orders_table', 14),
(34, '2024_01_16_112613_create_promo_codes_table', 15),
(35, '2024_01_16_133432_create_user_promos_table', 15),
(36, '2024_01_16_155935_add_promo_code_colums_to_orders_table', 16),
(37, '2024_01_17_081918_add_count_selling_colums_to_menues_table', 17),
(38, '2024_01_17_085251_create_content_us_table', 18),
(39, '2019_05_11_000000_create_otps_table', 19),
(40, '2024_01_17_130806_create_reviews_table', 20),
(42, '2024_01_17_140621_create_order_trakes_table', 21),
(43, '2024_01_17_142243_add_number_order_colums_to_orders_table', 22),
(45, '2024_01_18_121545_add_place_id_colums_to_admin_table', 24),
(46, '2024_01_21_090728_add_role_colums_to_users_table', 25),
(47, '2024_01_28_155916_add_type_colums_to_content_us_table', 26),
(48, '2024_01_29_130528_add_overviwe_and_time_colums_to_doctores_table', 27),
(49, '2024_01_29_152244_add_image_colums_to_doctores_table', 28),
(50, '2024_01_30_115334_add_sale_colums_to_doctores_table', 29),
(51, '2024_01_08_101745_create_reviews_table', 30),
(52, '2024_01_30_145459_create_reservationes_table', 31),
(53, '2024_01_30_152026_add_doctor_id_colums_to_reservationes_table', 32),
(54, '2024_01_30_154544_add_wait_colums_to_doctores_table', 32),
(55, '2024_01_31_081627_add_status_colums_to_reservationes_table', 33),
(56, '2024_01_31_083755_add_place_id_colums_to_reservationes_table', 34),
(57, '2024_01_31_100553_add_type_colums_to_promo_codes_table', 35),
(58, '2024_01_31_104136_add_code_colums_to_reservationes_table', 36),
(59, '2024_01_31_111240_add_totalaftersale_colums_to_reservationes_table', 37),
(60, '2024_01_31_130042_add_user_id_colums_to_reservationes_table', 38),
(61, '2024_01_18_101725_create_permission_tables', 39),
(62, '2024_02_04_121453_add_menue_id_colums_to_orders_table', 40);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 54),
(2, 'App\\Models\\User', 55),
(3, 'App\\Models\\User', 56),
(3, 'App\\Models\\User', 76),
(3, 'App\\Models\\User', 77),
(4, 'App\\Models\\User', 78),
(5, 'App\\Models\\User', 81);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `place_id` bigint UNSIGNED NOT NULL,
  `Qty` int NOT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `addanos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `specail_request` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `size_id` bigint UNSIGNED DEFAULT NULL,
  `delivery_method` enum('delivery','onsite') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'delivery',
  `delivery_fee` int DEFAULT NULL,
  `promo_code_id` bigint UNSIGNED DEFAULT NULL,
  `numberOrder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menue_id` bigint UNSIGNED NOT NULL,
  `pay_method` enum('cash','card') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `place_id`, `Qty`, `price`, `addanos`, `phone`, `address`, `specail_request`, `created_at`, `updated_at`, `status`, `size_id`, `delivery_method`, `delivery_fee`, `promo_code_id`, `numberOrder`, `menue_id`, `pay_method`) VALUES
(453, 27, 1, 1, '150.00', '[1,5]', '01212213322', 'cairo', NULL, '2024-05-28 14:41:59', '2024-05-28 14:41:59', '1', 1, 'delivery', NULL, NULL, '1047672', 15, 'cash'),
(455, 58, 4, 1, '155.00', '[1,null]', '01212213322', NULL, NULL, '2024-05-28 19:06:48', '2024-05-28 19:06:48', '1', 1, 'delivery', NULL, NULL, '1035679', 15, 'cash'),
(462, 57, 1, 3, '70.00', '[[],[]]', '01064780620', 'مجاورة 87 حي ال 13 قطعهة 209', NULL, '2024-05-30 21:03:27', '2024-05-30 21:04:11', '1', 4, 'onsite', NULL, NULL, '1051328', 15, 'cash'),
(463, 57, 1, 1, '150.00', '[[],[]]', '01064780620', 'مجاورة 87 حي ال 13 قطعهة 209', NULL, '2024-05-30 21:09:33', '2024-05-30 21:09:39', '1', 1, 'onsite', NULL, NULL, '1097865', 15, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `order_trakes`
--

CREATE TABLE `order_trakes` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `accept_statue` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `ready_statue` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `pickup_statue` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `deliverd_statue` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_trakes`
--

INSERT INTO `order_trakes` (`id`, `order_id`, `accept_statue`, `ready_statue`, `pickup_statue`, `deliverd_statue`, `created_at`, `updated_at`) VALUES
(185, 453, '1', '0', '0', '0', '2024-05-28 17:46:35', '2024-05-28 17:46:35'),
(187, 462, '1', '0', '0', '0', '2024-05-30 21:04:11', '2024-05-30 21:04:11'),
(188, 463, '1', '1', '1', '1', '2024-05-30 21:09:39', '2024-06-04 22:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` int UNSIGNED NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validity` int NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `identifier`, `token`, `validity`, `valid`, `created_at`, `updated_at`) VALUES
(2, 'ibrahimmomen1798@gmail.com', '1376', 60, 1, '2024-01-17 08:02:44', '2024-01-17 08:02:44'),
(14, 'ibrahimmomen179@gmail.com', '3382', 60, 0, '2024-01-17 10:03:56', '2024-01-17 10:05:30'),
(15, 'ibrahimmomen179@gmail.com', '1686', 60, 1, '2024-01-28 11:24:47', '2024-01-28 11:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_operations`
--

CREATE TABLE `payment_operations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'addRole', 'web', '2024-01-31 13:57:15', '2024-01-31 13:57:15'),
(2, 'showRole', 'web', '2024-01-31 13:57:15', '2024-01-31 13:57:15'),
(3, 'editRole', 'web', '2024-01-31 13:57:15', '2024-01-31 13:57:15'),
(4, 'deleteRole', 'web', '2024-01-31 13:57:15', '2024-01-31 13:57:15'),
(5, 'addUser', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(6, 'showUser', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(7, 'editUser', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(8, 'deleteUser', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(9, 'addResturant', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(10, 'showResturant', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(11, 'editResturant', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(12, 'deleteResturant', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(13, 'addClinic', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(14, 'showClinic', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(15, 'editClinic', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(16, 'deleteClinic', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(17, 'addMenu', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(18, 'showMenu', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(19, 'editMenu', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(20, 'deleteMenu', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(21, 'addDoctor', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(22, 'showDoctor', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(23, 'editDoctor', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(24, 'deleteDoctor', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(25, 'addCategory', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(26, 'showCategory', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(27, 'editCategory', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(28, 'deleteCategory', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(29, 'addClinicCategory', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(30, 'showClinicCategory', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(31, 'editClinicCategory', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(32, 'deleteClinicCategory', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(33, 'addProduct', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(34, 'showProduct', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(35, 'editProduct', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(36, 'deleteProduct', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(37, 'addAddon', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(38, 'showAddon', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(39, 'editAddon', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(40, 'deleteAddon', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(41, 'addSize', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(42, 'showSize', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(43, 'editSize', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(44, 'deleteSize', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(45, 'updateAboutUS', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(46, 'showContactUS', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(47, 'deleteContactUS', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(48, 'addPromoCode', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(49, 'showPromoCode', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(50, 'editPromoCode', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(51, 'deletePromoCode', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(52, 'addClinicPromoCode', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(53, 'showClinicPromoCode', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(54, 'editClinicPromoCode', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(55, 'deleteClinicPromoCode', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(56, 'showAllOrder', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(57, 'trackorder', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(58, 'listReservation', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(59, 'deleteReservation', 'web', '2024-01-31 13:57:16', '2024-01-31 13:57:16'),
(60, 'listTransaction', 'web', '2024-05-23 18:19:37', '2024-05-23 18:19:37'),
(61, 'deleteTransaction', 'web', '2024-05-23 18:19:37', '2024-05-23 18:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'test-AuthToken', '7b80c85051c28f688c6755321abdb17ad14595ddcc048c4d589cb007d0a6c0a6', '[\"*\"]', NULL, NULL, '2024-01-08 10:05:33', '2024-01-08 10:05:33'),
(2, 'App\\Models\\User', 2, 'test-AuthToken', '25c22f3cdba210e94b6426bd9b9d2c6ba4d0325cfdf00dc8012b6dc6a5b4e378', '[\"*\"]', NULL, NULL, '2024-01-08 10:06:42', '2024-01-08 10:06:42'),
(5, 'App\\Models\\User', 3, 'test@allsafe', '60414b113fd3ab5fe756fd45aabefd77835bf826162a99de290e04d8fec416da', '[\"*\"]', '2024-01-18 08:09:39', NULL, '2024-01-08 13:47:03', '2024-01-18 08:09:39'),
(6, 'App\\Models\\User', 5, 'test@allsafe', '420b635b3720278e0a086bae95cda6e315e9fe42771a32b02fe30780bccc2349', '[\"*\"]', NULL, NULL, '2024-01-17 07:47:52', '2024-01-17 07:47:52'),
(7, 'App\\Models\\User', 7, 'test@allsafe', '991f67b1cbc52c7870b637636c976afc1f2f38d5b2dab377eb17b98980f6c30d', '[\"*\"]', NULL, NULL, '2024-01-17 07:51:39', '2024-01-17 07:51:39'),
(8, 'App\\Models\\User', 8, 'test@allsafe', '38d558c96f0a855a8ce4980b7c4cfefdeb074e05c080730c7919e66bfbfcf6d0', '[\"*\"]', NULL, NULL, '2024-01-17 07:52:18', '2024-01-17 07:52:18'),
(9, 'App\\Models\\User', 9, 'test@allsafe', '4ad8c0430ed3f06513e2cdf5fa856f5651fe4e0b205ba3908780eca8808a3c4b', '[\"*\"]', NULL, NULL, '2024-01-17 07:54:10', '2024-01-17 07:54:10'),
(10, 'App\\Models\\User', 10, 'test@allsafe', '4e6a98e1af8ec12dc54bf011f01aa9fdb954e76f8b8d585cfdeb45a830fb4575', '[\"*\"]', NULL, NULL, '2024-01-17 07:54:36', '2024-01-17 07:54:36'),
(11, 'App\\Models\\User', 11, 'test@allsafe', '2ab61623ba02dfdde99eace4fa226a3944dd4f41d240fc802426b3be2477d54d', '[\"*\"]', NULL, NULL, '2024-01-17 07:55:49', '2024-01-17 07:55:49'),
(12, 'App\\Models\\User', 12, 'test@allsafe', 'b7a71dbfc239d39b9af9b6178ba245031defec5724bbdb98fa49e52c19ed5d86', '[\"*\"]', NULL, NULL, '2024-01-17 07:57:04', '2024-01-17 07:57:04'),
(13, 'App\\Models\\User', 13, 'test@allsafe', '87c7b485d7c2293f3367b83e9e85fe3a8c3feb3dcd26757bae2eb66ab30ea52b', '[\"*\"]', NULL, NULL, '2024-01-17 07:58:05', '2024-01-17 07:58:05'),
(14, 'App\\Models\\User', 14, 'test@allsafe', '1eee90747b928c7a7fb89ead226a3a05e50d603a467d0ec20a28167472e1332e', '[\"*\"]', NULL, NULL, '2024-01-17 08:02:44', '2024-01-17 08:02:44'),
(15, 'App\\Models\\User', 15, 'test@allsafe', 'c7e445f3d8b1845631fb9f3a79f90c82ec90c1199f33eb37213e5d8b57c01d81', '[\"*\"]', NULL, NULL, '2024-01-17 08:03:32', '2024-01-17 08:03:32'),
(16, 'App\\Models\\User', 16, 'test@allsafe', 'bed1dd624f4d792dd1dd0970eadc647020ede219ff399cda6eeb3861c8e77cb5', '[\"*\"]', NULL, NULL, '2024-01-17 08:04:41', '2024-01-17 08:04:41'),
(17, 'App\\Models\\User', 17, 'test@allsafe', 'd38295c5464ca52c2a5374dd7e32e9fad89a22fec23687a82958d1ffd870ec85', '[\"*\"]', NULL, NULL, '2024-01-17 08:04:57', '2024-01-17 08:04:57'),
(18, 'App\\Models\\User', 18, 'test@allsafe', '2d3797212e55ef33fd339d52375698e5f2fe47cdfdab66f0454d77ea95a63354', '[\"*\"]', NULL, NULL, '2024-01-17 08:06:20', '2024-01-17 08:06:20'),
(19, 'App\\Models\\User', 19, 'test@allsafe', '72eb1cd989ecdf60304100a4d38b5c6246b40787426e91868084da52106f280a', '[\"*\"]', NULL, NULL, '2024-01-17 08:23:43', '2024-01-17 08:23:43'),
(20, 'App\\Models\\User', 20, 'test@allsafe', '5fd9914c9e778ecef46d56031a9cf20888486e6244ce20e65d5cb8963d1cea2b', '[\"*\"]', NULL, NULL, '2024-01-17 08:24:45', '2024-01-17 08:24:45'),
(21, 'App\\Models\\User', 21, 'test@allsafe', '2db6033c705f716b575dca67e368eba47f97a4def6804bfd1ed13b4a812a7ddc', '[\"*\"]', NULL, NULL, '2024-01-17 08:25:22', '2024-01-17 08:25:22'),
(22, 'App\\Models\\User', 22, 'test@allsafe', 'd208cf0b930a6d1edbb78e8252023d99879a093b3eac157f36e88a60f596ae03', '[\"*\"]', NULL, NULL, '2024-01-17 08:58:30', '2024-01-17 08:58:30'),
(23, 'App\\Models\\User', 23, 'test@allsafe', '93be638f2f0120b98718bb9cc0ae7d35419121bb4e70ced3063be302004a9dca', '[\"*\"]', NULL, NULL, '2024-01-17 08:59:21', '2024-01-17 08:59:21'),
(24, 'App\\Models\\User', 24, 'test@allsafe', '2d48aa7e5e3d75e7ced5f7e3c006abd9a1bcf4dba29b096ea3ca649d8c9186f9', '[\"*\"]', NULL, NULL, '2024-01-17 08:59:59', '2024-01-17 08:59:59'),
(25, 'App\\Models\\User', 25, 'test33@allsafe', '0117f00ff9c8b66ea676e9892c85d690b2ac0dc56352d4d1f613dce10d3fe0ce', '[\"*\"]', NULL, NULL, '2024-01-17 10:28:41', '2024-01-17 10:28:41'),
(26, 'App\\Models\\User', 26, 'test33@allsafe', '88d6f599588074bacecea0fee1be5b9b2ef5d57c30ed597dadd659ed3837c71f', '[\"*\"]', NULL, NULL, '2024-01-17 10:29:20', '2024-01-17 10:29:20'),
(30, 'App\\Models\\User', 52, 'loaaelsayed@allsafe', 'da94b9194e294fb841a3ae06d6f145c0fba87a314b1ae92c957f08bba4b99bde', '[\"*\"]', NULL, NULL, '2024-01-30 09:07:04', '2024-01-30 09:07:04'),
(34, 'App\\Models\\User', 58, 'loaaelsayed@allsafe', '857ce333aa31202a8d066ec74ca1a7530d89eaa2cb522c816d51365e570e6fb5', '[\"*\"]', '2024-06-12 20:38:27', NULL, '2024-02-05 15:33:42', '2024-06-12 20:38:27'),
(39, 'App\\Models\\User', 59, 'loaaelsayed@allsafe', 'c91c717c625cae686e35d2d2524d01110dd10323d4880f947a5676fdc716d1d0', '[\"*\"]', NULL, NULL, '2024-02-05 18:35:27', '2024-02-05 18:35:27'),
(40, 'App\\Models\\User', 60, 'loaaelsayed@allsafe', 'd2f3b11cca4d62318abbda743c4dc4ea2d0a74e7943bb1e78c9b9e62ba031232', '[\"*\"]', NULL, NULL, '2024-02-05 18:35:36', '2024-02-05 18:35:36'),
(52, 'App\\Models\\User', 61, 'momem@allsafe', 'ef83cc7d5007c761549352c5ae54677d5445a988578e2bdfdde06861c37fe750', '[\"*\"]', NULL, NULL, '2024-02-05 21:32:49', '2024-02-05 21:32:49'),
(54, 'App\\Models\\User', 63, 'osama@allsafe', 'e698c76319ca8e09efdbd9fe2b1d3fd1ab3bf1d35ec856ac4792ca9a5b35f6d4', '[\"*\"]', NULL, NULL, '2024-02-05 21:50:20', '2024-02-05 21:50:20'),
(55, 'App\\Models\\User', 64, 'abdo@allsafe', 'f10649a5a3ada204943845976469eb9fc0e86303bbfc08a1fa878515634aa378', '[\"*\"]', NULL, NULL, '2024-02-05 21:54:35', '2024-02-05 21:54:35'),
(156, 'App\\Models\\User', 71, 'mahmoud.dabour@allsafe', '1a5ab28f87167617e7690583b2d8e4dfbce7f5458597c504f8c68ef1040fd5e3', '[\"*\"]', '2024-03-10 21:45:30', NULL, '2024-03-02 20:54:10', '2024-03-10 21:45:30'),
(162, 'App\\Models\\User', 54, 'loaaelsayed@allsafe', '4cec083bbe0bd639a0fafdee9be1b24bf6a3ee1820006cd02d389c6d4a932c3a', '[\"*\"]', '2024-03-13 23:50:03', NULL, '2024-03-03 16:09:42', '2024-03-13 23:50:03'),
(189, 'App\\Models\\User', 70, 'Mohamed@allsafe', '38d026d128ea69bc0954c3b873f04f866f6b4afad7f86ae974cf78b370f844eb', '[\"*\"]', '2024-03-06 18:01:54', NULL, '2024-03-06 18:00:50', '2024-03-06 18:01:54'),
(199, 'App\\Models\\User', 27, 'test33@allsafe', '7a0410f677eda5fa63abc8c4dda5aa132cdf0967fe373e56c49fb59b43fa4cf4', '[\"*\"]', '2024-03-11 19:09:11', NULL, '2024-03-07 22:48:01', '2024-03-11 19:09:11'),
(207, 'App\\Models\\User', 69, 'momen n@allsafe', '5d7eb2df571300a3d99b7fe5b66a3c87e54a2adbdf517b2c9462bb830ff8964c', '[\"*\"]', '2024-03-11 19:07:31', NULL, '2024-03-11 19:02:12', '2024-03-11 19:07:31'),
(212, 'App\\Models\\User', 66, 'omar maamoun@allsafe', '91e5b8c66680a55570c5408e2c5feb9f6c40163ae181c1127d58e0f24eb0a81e', '[\"*\"]', NULL, NULL, '2024-03-12 17:14:44', '2024-03-12 17:14:44'),
(223, 'App\\Models\\User', 67, 'momen@allsafe', '91ec42219006f35ca5a999581ddfaca694dce19dd82215738784c5fa7ee184e1', '[\"*\"]', '2024-05-30 17:29:34', NULL, '2024-03-13 20:07:25', '2024-05-30 17:29:34'),
(234, 'App\\Models\\User', 74, 'amr ahmed@allsafe', '1a9301d17cdb4d18e1849a761a89f3abbd5f2e043c091b2a0d8fb32da8f7d991', '[\"*\"]', '2024-03-17 17:01:29', NULL, '2024-03-17 17:00:13', '2024-03-17 17:01:29'),
(293, 'App\\Models\\User', 57, 'All Safe software house@allsafe', '0f855ae4cb33b6869e90da7e8f78679dab2e5e92e86177f527b306289ff7df2d', '[\"*\"]', '2024-06-14 10:22:10', NULL, '2024-06-14 05:51:36', '2024-06-14 10:22:10'),
(295, 'App\\Models\\User', 79, 'waleed@allsafe', 'bdb598805e6636ed7101115070e5216356b3c26af4ca6325a5076323e67e7b7c', '[\"*\"]', '2024-06-14 20:51:00', NULL, '2024-06-14 20:49:06', '2024-06-14 20:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(11,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('clinic','restaurantes') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('open','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_fee` int NOT NULL DEFAULT '0',
  `category_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `descrption`, `starttime`, `endtime`, `address`, `latitude`, `longitude`, `logo`, `type`, `status`, `created_at`, `updated_at`, `delivery_fee`, `category_id`) VALUES
(1, '{\"en\":\"bazoka\",\"ar\":\"بازوكا\"}', '{\"en\":\"bazoka resturant\",\"ar\":null}', '16:30:00', '17:40:00', '{\"en\":\"cairo\",\"ar\":null}', '0.00054073', '0.01596451', 'uploads/resturants/1716386873.png', 'restaurantes', 'open', '2024-01-09 10:24:20', '2024-06-19 11:24:55', 10, NULL),
(4, '{\"en\":\"elmaquam\",\"ar\":\"المقام\"}', '{\"en\":\"elmaquam resturant\",\"ar\":\"مطعم المقام\"}', '21:58:00', '15:59:00', '{\"en\":\"cairo\",\"ar\":null}', '0.00147629', '0.00922680', 'uploads/resturants/1716386832.png', 'restaurantes', 'open', '2024-01-09 10:32:43', '2024-06-19 11:33:48', 20, NULL),
(7, '{\"en\":\"عياده 1\",\"ar\":null}', '{\"en\":\"clinic1\",\"ar\":\"عياده 1\"}', '10:26:33', '10:26:33', '{\"en\":\"cairo\",\"ar\":\"القاهره\"}', '0.00729561', '0.01454830', 'uploads/Clinic/1716387031.jpg', 'clinic', 'open', '2024-01-29 08:26:33', '2024-06-19 12:05:36', 200, NULL),
(9, '{\"en\":\"عياده 2\",\"ar\":null}', '{\"en\":\"clinic 2\",\"ar\":\"عياده 2\"}', '11:00:00', '03:00:00', '{\"en\":\"cairo\",\"ar\":\"القاهره\"}', '-0.00278091', '0.02068520', 'uploads/Clinic/1716387042.jpg', 'clinic', 'open', '2024-01-29 07:00:24', '2024-06-19 12:06:27', 200, NULL),
(20, '{\"en\":\"abo mazen elsory\",\"ar\":\"ابو مازن السوري\"}', '{\"en\":\"abo mazen elsory resturant\",\"ar\":\"ابو مازن السوري\"}', '11:08:00', '12:33:00', '{\"en\":\"cairo\",\"ar\":\"القاهره\"}', '0.00238609', '-0.01780987', 'uploads/resturants/icons8-resturant-66.png', 'restaurantes', 'open', '2024-02-01 09:47:49', '2024-06-19 11:38:23', 11, NULL),
(21, '{\"en\":\"عياده 3\",\"ar\":null}', '{\"en\":\"clinic 3\",\"ar\":\"عياده 3\"}', '18:47:00', '23:44:00', '{\"en\":\"cairo\",\"ar\":\"القاهره\"}', '-0.00698662', '-0.02021313', 'uploads/Clinic/icons8-clinic-80.jpg', 'clinic', 'open', '2024-02-01 09:48:01', '2024-06-19 12:07:10', 33, 33),
(28, '{\"en\":\"عياده 4\",\"ar\":null}', '{\"en\":\"clinic 4\",\"ar\":\"عياده 4\"}', '21:01:00', '13:08:00', '{\"en\":\"cairo\",\"ar\":\"القاهره\"}', '0.00365639', '-0.02463341', 'uploads/Clinic/icons8-clinic-80.jpg', 'clinic', 'open', '2024-06-11 18:29:36', '2024-06-19 12:07:52', 10, NULL),
(31, '{\"en\":\"hi prost\",\"ar\":\"هاي بروست\"}', '{\"en\":\"hi prost resturnant\",\"ar\":\"مطعم هاي بروست\"}', '18:46:00', '20:00:00', '{\"en\":\"cairo\",\"ar\":\"القاهره\"}', '-0.00116730', '-0.02188683', 'uploads/resturants/icons8-resturant-66.png', 'restaurantes', 'open', '2024-06-19 11:46:54', '2024-06-19 11:46:54', 15, NULL),
(33, '{\"en\":\"clinic5\",\"ar\":\"عياده 5\"}', '{\"en\":\"clinic 5\",\"ar\":\"عياده 5\"}', '18:20:00', '12:20:00', '{\"en\":\"cairo\",\"ar\":\"القاهره\"}', '-0.00006866', '-0.02141476', 'uploads/Clinic/icons8-clinic-80.jpg', 'clinic', 'open', '2024-06-19 12:21:11', '2024-06-19 12:21:11', 100, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `place_id` bigint UNSIGNED NOT NULL,
  `bestsale` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `descrption`, `image`, `category_id`, `place_id`, `bestsale`, `created_at`, `updated_at`, `price`) VALUES
(17, '{\"en\":\"pizza chicken\",\"ar\":\"بينزا فراخ\"}', '{\"en\":\"pizza chicken\",\"ar\":\"بينزا فراخ\"}', 'uploads/Products/1707838590.jpg', 36, 1, '0', '2024-02-13 22:36:30', '2024-06-19 13:49:46', 200),
(18, '{\"en\":\"burger bef\",\"ar\":\"برجر لحمه\"}', '{\"en\":\"burger bef\",\"ar\":\"برجر لحمه\"}', 'uploads/Products/1707838591.jpg', 42, 1, '0', '2024-02-13 22:36:31', '2024-06-19 14:25:18', 200),
(19, '{\"en\":\"pizza bef\",\"ar\":\"بيتزا لحمه\"}', '{\"en\":\"pizza bef\",\"ar\":\"بيتزا لحمه\"}', 'uploads/Products/1716386645.jpg', 36, 4, '0', '2024-05-22 20:51:33', '2024-06-19 14:27:26', 100),
(21, '{\"en\":\"water\",\"ar\":\"زجاجه مياه\"}', '{\"en\":\"water\",\"ar\":\"زجاجه مياه\"}', 'uploads/Products/defultfood.png', 43, 4, '0', '2024-06-12 00:57:14', '2024-06-19 14:31:12', 19),
(24, '{\"en\":\"chicken pizza large\",\"ar\":\"بيتزا فراخ\"}', '{\"en\":\"pizza\",\"ar\":\"بيتزا\"}', 'uploads/Products/defultfood.png', 36, 31, '0', '2024-06-19 14:33:07', '2024-06-19 14:33:07', 200);

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` bigint UNSIGNED NOT NULL,
  `place_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale` int NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('clinic','restaurantes') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promo_codes`
--

INSERT INTO `promo_codes` (`id`, `place_id`, `name`, `sale`, `start`, `end`, `created_at`, `updated_at`, `type`) VALUES
(1, 1, 'Piper Murphy', 70, '2024-01-16', '2024-01-16', '2024-01-16 11:58:39', '2024-01-16 11:58:39', 'restaurantes'),
(3, 9, 'promo1', 10, '2024-01-31', '2024-02-03', '2024-01-31 07:59:27', '2024-01-31 07:59:27', 'clinic'),
(6, 4, 'Vaughan', 10, '2018-09-10', '2018-07-04', '2024-01-31 08:30:03', '2024-01-31 08:34:39', 'restaurantes'),
(7, 7, 'Zelenia Miller', 5, '1999-07-21', '2022-01-21', '2024-01-31 08:30:44', '2024-01-31 08:34:49', 'clinic'),
(12, 20, 'save200', 10, '2024-06-04', '2024-06-12', '2024-06-04 22:07:43', '2024-06-04 22:07:43', 'restaurantes');

-- --------------------------------------------------------

--
-- Table structure for table `reservationes`
--

CREATE TABLE `reservationes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `age` int NOT NULL,
  `detection_type` enum('normal','urgent') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `detection_location` enum('home','clinic') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'clinic',
  `day_booking` date NOT NULL,
  `time_booking` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doctore_id` bigint UNSIGNED NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `place_id` bigint UNSIGNED DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalAfterSale` double NOT NULL DEFAULT '0',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `reservationNumber` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservationes`
--

INSERT INTO `reservationes` (`id`, `name`, `phone`, `gender`, `age`, `detection_type`, `detection_location`, `day_booking`, `time_booking`, `created_at`, `updated_at`, `doctore_id`, `status`, `place_id`, `code`, `totalAfterSale`, `user_id`, `reservationNumber`) VALUES
(73, 'oma', '01064780620', 'male', 15, 'normal', 'clinic', '2024-06-06', '11:23:00', '2024-06-06 16:45:48', '2024-06-06 16:45:48', 12, '0', 21, NULL, 150, 57, 1054284),
(74, 'omar', '01064780620', 'male', 15, 'normal', 'clinic', '2024-06-09', '09:36:00', '2024-06-09 14:36:34', '2024-06-09 14:36:34', 12, '0', 21, NULL, 100, 57, 1478125),
(75, 'omar', '01064780602', 'male', 15, 'normal', 'clinic', '2024-06-09', '09:56:00', '2024-06-09 14:56:52', '2024-06-09 14:56:52', 12, '0', 21, NULL, 100, 57, 1749632),
(76, 'omar', '01064780620', 'male', 15, 'normal', 'clinic', '2024-06-09', '10:34:00', '2024-06-09 15:35:10', '2024-06-09 15:35:10', 12, '0', 21, NULL, 200, 57, 8471256),
(77, 'omar', '01064780620', 'male', 15, 'normal', 'clinic', '2024-06-09', '10:34:00', '2024-06-09 15:38:49', '2024-06-09 15:38:49', 12, '0', 21, NULL, 200, 57, 8712345),
(78, 'omar', '01064780620', 'male', 15, 'normal', 'clinic', '2024-06-09', '11:09:00', '2024-06-09 16:10:02', '2024-06-09 16:10:02', 12, '0', 21, NULL, 200, 57, 1033461),
(79, 'loaa2', '01212121212', 'male', 25, 'normal', 'clinic', '2024-01-25', '16:55:21', '2024-06-09 16:33:27', '2024-06-09 16:33:27', 5, '0', 7, NULL, 200, 58, 1088083),
(80, 'omar', '01064780620', 'male', 15, 'normal', 'clinic', '2024-06-09', '11:37:00', '2024-06-09 16:37:48', '2024-06-09 16:37:48', 12, '0', 21, NULL, 33, 57, 1059647),
(81, 'omar', '01064780620', 'male', 15, 'normal', 'clinic', '2024-06-09', '11:40:00', '2024-06-09 16:40:18', '2024-06-09 16:40:18', 12, '0', 21, NULL, 33, 57, 1100234),
(82, 'omar', '01064780620', 'male', 15, 'normal', 'clinic', '2024-06-09', '11:43:00', '2024-06-09 16:44:09', '2024-06-09 16:44:09', 8, '0', 7, NULL, 200, 57, 1109323),
(83, 'omar', '01064780650', 'male', 15, 'normal', 'clinic', '2024-06-09', '11:46:00', '2024-06-09 16:47:06', '2024-06-09 16:47:06', 12, '0', 21, NULL, 33, 57, 1022644),
(84, 'omar', '01064780620', 'male', 15, 'normal', 'clinic', '2024-06-09', '11:48:00', '2024-06-09 16:48:43', '2024-06-09 16:48:43', 12, '0', 21, NULL, 33, 57, 1050579),
(85, 'oka', '01064780620', 'male', 15, 'normal', 'clinic', '2024-06-09', '11:50:00', '2024-06-09 16:51:05', '2024-06-09 16:51:05', 12, '0', 21, NULL, 33, 57, 1064403),
(86, 'omar', '01064780620', 'male', 15, 'normal', 'clinic', '2024-06-09', '12:14:00', '2024-06-09 17:14:25', '2024-06-09 17:14:25', 12, '0', 21, NULL, 33, 57, 1101221),
(87, 'omar', '01061780620', 'male', 15, 'normal', 'clinic', '2024-06-09', '12:15:00', '2024-06-09 17:16:03', '2024-06-09 17:16:03', 12, '0', 21, NULL, 33, 57, 1013261),
(88, 'omar', '01061780620', 'male', 15, 'normal', 'clinic', '2024-06-09', '12:15:00', '2024-06-09 17:17:15', '2024-06-09 17:17:15', 12, '0', 21, NULL, 33, 57, 1022946),
(89, 'omar', '01061780620', 'male', 15, 'normal', 'clinic', '2024-06-09', '12:15:00', '2024-06-09 17:58:31', '2024-06-09 17:58:31', 8, '0', 7, NULL, 200, 57, 1050146),
(90, 'omar', '01064780620', 'male', 15, 'normal', 'clinic', '2024-06-09', '13:00:00', '2024-06-09 18:00:50', '2024-06-09 18:01:04', 12, '1', 21, NULL, 33, 57, 1044402),
(91, 'omar', '01064780620', 'male', 15, 'normal', 'clinic', '2024-06-09', '13:00:00', '2024-06-09 18:01:14', '2024-06-09 18:01:25', 12, '1', 21, NULL, 33, 57, 1062752),
(92, 'omar', '01064780620', 'male', 15, 'normal', 'home', '2024-06-12', '10:39:00', '2024-06-12 15:40:03', '2024-06-12 15:40:28', 8, '1', 7, NULL, 200, 57, 1086828);

-- --------------------------------------------------------

--
-- Table structure for table `resturants_requests`
--

CREATE TABLE `resturants_requests` (
  `id` bigint NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resturants_requests`
--

INSERT INTO `resturants_requests` (`id`, `name`, `email`, `mobile`, `type`, `created_at`, `updated_at`) VALUES
(14, 'Ahmed', 'ahmed@gmail.com', '01010989090', 'restaurantes', '2024-06-06 14:26:47', '2024-06-06 14:26:47'),
(15, 'Ahmed Gamal', 'adm@gml.com', '01095695555', 'restaurantes', '2024-06-06 14:38:31', '2024-06-06 14:38:31'),
(16, 'Sybil Mcdonald', 'bogyqyr@mailinator.com', '123456789', 'clinic', '2024-06-09 17:28:39', '2024-06-09 17:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `place_id` bigint UNSIGNED DEFAULT NULL,
  `doctore_id` bigint UNSIGNED DEFAULT NULL,
  `rate_num` double NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `place_id`, `doctore_id`, `rate_num`, `comment`, `created_at`, `updated_at`) VALUES
(17, 27, 4, NULL, 3.2619047619048, 'very good', '2024-02-04 09:41:18', '2024-03-14 16:16:48'),
(18, 27, 4, NULL, 3.2619047619048, 'very good', '2024-02-04 09:41:46', '2024-03-14 16:16:48'),
(19, 27, 4, NULL, 3.2619047619048, 'very good', '2024-02-04 09:43:42', '2024-03-14 16:16:48'),
(21, 27, 4, NULL, 3.2619047619048, 'very good', '2024-02-04 09:47:03', '2024-03-14 16:16:48'),
(24, 27, 4, NULL, 3.2619047619048, 'very good', '2024-02-04 10:46:39', '2024-03-14 16:16:48'),
(25, 27, NULL, 5, 3.7666666666666, 'very good', '2024-02-04 10:48:07', '2024-06-11 19:59:40'),
(26, 27, NULL, 5, 3.7666666666666, 'very good', '2024-02-04 10:48:25', '2024-06-11 19:59:40'),
(27, 27, 4, NULL, 3.2619047619048, 'very good', '2024-02-05 15:33:06', '2024-03-14 16:16:48'),
(28, 58, 4, NULL, 3.2619047619048, 'very good', '2024-02-05 15:34:32', '2024-03-14 16:16:48'),
(29, 27, 4, NULL, 3.2619047619048, 'very good', '2024-02-05 15:34:48', '2024-03-14 16:16:48'),
(30, 57, 4, NULL, 3.2619047619048, 'Good', '2024-02-05 15:44:48', '2024-03-14 16:16:48'),
(31, 57, 4, NULL, 3.2619047619048, 'Good', '2024-02-05 15:45:02', '2024-03-14 16:16:48'),
(32, 57, 4, NULL, 3.2619047619048, 'Good', '2024-02-05 18:58:27', '2024-03-14 16:16:48'),
(33, 57, 4, NULL, 3.2619047619048, 'gamed', '2024-02-05 20:04:01', '2024-03-14 16:16:48'),
(34, 57, 4, NULL, 3.2619047619048, 'games fashk', '2024-02-05 20:06:11', '2024-03-14 16:16:48'),
(35, 57, 4, NULL, 3.2619047619048, 'omar', '2024-02-05 20:09:27', '2024-03-14 16:16:48'),
(36, 57, 4, NULL, 3.2619047619048, 'osama', '2024-02-05 20:11:36', '2024-03-14 16:16:48'),
(37, 57, 4, NULL, 3.2619047619048, 'osama', '2024-02-05 20:13:46', '2024-03-14 16:16:48'),
(38, 57, 4, NULL, 3.2619047619048, 'osama', '2024-02-05 20:14:04', '2024-03-14 16:16:48'),
(39, 57, 4, NULL, 3.2619047619048, 'رايق', '2024-02-05 20:15:06', '2024-03-14 16:16:48'),
(40, 57, 4, NULL, 3.2619047619048, 'test', '2024-02-05 20:17:24', '2024-03-14 16:16:48'),
(41, 57, 4, NULL, 3.2619047619048, 'test', '2024-02-05 20:21:52', '2024-03-14 16:16:48'),
(42, 57, 4, NULL, 3.2619047619048, 'test 3', '2024-02-05 20:22:26', '2024-03-14 16:16:48'),
(43, 57, 4, NULL, 3.2619047619048, 'amazing', '2024-02-05 20:24:46', '2024-03-14 16:16:48'),
(44, 57, 4, NULL, 3.2619047619048, 'جامد', '2024-02-05 20:28:37', '2024-03-14 16:16:48'),
(45, 57, 4, NULL, 3.2619047619048, 'جامد', '2024-02-05 20:28:40', '2024-03-14 16:16:48'),
(46, 57, 1, NULL, 3.0051020408163, 'جامد', '2024-02-05 20:29:35', '2024-05-07 03:50:24'),
(47, 57, 1, NULL, 3.0051020408163, 'جامد اوي', '2024-02-05 20:31:10', '2024-05-07 03:50:24'),
(48, 57, 1, NULL, 3.0051020408163, 'زفت', '2024-02-05 20:38:15', '2024-05-07 03:50:24'),
(49, 57, 1, NULL, 3.0051020408163, 'test', '2024-02-05 20:47:53', '2024-05-07 03:50:24'),
(50, 57, 1, NULL, 3.0051020408163, '5', '2024-02-05 20:50:24', '2024-05-07 03:50:24'),
(51, 57, 1, NULL, 3.0051020408163, 'omar', '2024-02-05 20:52:20', '2024-05-07 03:50:24'),
(52, 57, 1, NULL, 3.0051020408163, 'رايق', '2024-02-05 21:09:59', '2024-05-07 03:50:24'),
(53, 57, 20, NULL, 55, 'gamed', '2024-02-05 21:18:30', '2024-03-04 01:37:20'),
(54, 57, 20, NULL, 55, 'amazing', '2024-02-05 21:19:06', '2024-03-04 01:37:20'),
(55, 57, 20, NULL, 55, 'bas', '2024-02-05 21:24:27', '2024-03-04 01:37:20'),
(56, 57, 20, NULL, 55, 'very bad', '2024-02-05 21:29:09', '2024-03-04 01:37:20'),
(57, 65, 1, NULL, 3.0051020408163, 'amazing', '2024-02-05 21:56:51', '2024-05-07 03:50:24'),
(58, 57, 4, NULL, 3.2619047619048, 'very good', '2024-02-05 22:14:25', '2024-03-14 16:16:48'),
(59, 57, 1, NULL, 3.0051020408163, 'gamed', '2024-02-08 20:23:47', '2024-05-07 03:50:24'),
(60, 66, 1, NULL, 3.0051020408163, 'وحش', '2024-02-08 20:49:10', '2024-05-07 03:50:24'),
(61, 66, 1, NULL, 3.0051020408163, ';;;', '2024-02-08 20:53:25', '2024-05-07 03:50:24'),
(62, 66, 1, NULL, 3.0051020408163, '😍😍', '2024-02-08 20:54:49', '2024-05-07 03:50:24'),
(63, 66, 1, NULL, 3.0051020408163, '7elw', '2024-02-08 20:56:00', '2024-05-07 03:50:24'),
(64, 57, NULL, 5, 3.7666666666666, 'very good', '2024-02-20 19:08:11', '2024-06-11 19:59:40'),
(65, 57, NULL, 5, 3.7666666666666, 'fnan', '2024-02-20 19:28:14', '2024-06-11 19:59:40'),
(66, 57, NULL, 5, 3.7666666666666, 'fnan', '2024-02-20 19:29:09', '2024-06-11 19:59:40'),
(67, 57, NULL, 5, 3.7666666666666, '🥰🥰', '2024-02-20 19:31:35', '2024-06-11 19:59:40'),
(68, 57, NULL, 5, 3.7666666666666, 'adsd', '2024-02-20 19:48:25', '2024-06-11 19:59:40'),
(69, 57, 1, NULL, 3.0051020408163, 'زفت', '2024-02-21 18:01:40', '2024-05-07 03:50:24'),
(70, 57, 1, NULL, 3.0051020408163, 'جميل', '2024-02-22 15:20:39', '2024-05-07 03:50:24'),
(71, 57, 1, NULL, 3.0051020408163, 'سيرش', '2024-02-26 15:44:01', '2024-05-07 03:50:24'),
(72, 57, 1, NULL, 3.0051020408163, 'رائع', '2024-02-27 17:11:25', '2024-05-07 03:50:24'),
(73, 57, 1, NULL, 3.0051020408163, 'ممنتاز', '2024-02-27 17:16:10', '2024-05-07 03:50:24'),
(74, 57, NULL, 5, 3.7666666666666, 'احلي دكتور', '2024-02-28 22:04:18', '2024-06-11 19:59:40'),
(75, 69, 1, NULL, 3.0051020408163, 'حلو', '2024-02-29 16:29:16', '2024-05-07 03:50:24'),
(76, 57, 1, NULL, 3.0051020408163, 'hjghj', '2024-02-29 22:20:34', '2024-05-07 03:50:24'),
(77, 57, 1, NULL, 3.0051020408163, 'hjghj', '2024-02-29 22:21:41', '2024-05-07 03:50:24'),
(78, 57, 1, NULL, 3.0051020408163, 'hjghj', '2024-02-29 22:21:46', '2024-05-07 03:50:24'),
(79, 57, 1, NULL, 3.0051020408163, 'hjghj', '2024-02-29 22:21:49', '2024-05-07 03:50:24'),
(80, 57, 1, NULL, 3.0051020408163, 'hjghj', '2024-02-29 22:23:53', '2024-05-07 03:50:24'),
(81, 57, 1, NULL, 3.0051020408163, 'hjghj', '2024-02-29 22:23:54', '2024-05-07 03:50:24'),
(82, 57, 1, NULL, 3.0051020408163, 'gamed', '2024-02-29 22:26:01', '2024-05-07 03:50:24'),
(83, 57, 1, NULL, 3.0051020408163, 'gamed', '2024-02-29 22:26:53', '2024-05-07 03:50:24'),
(84, 57, 1, NULL, 3.0051020408163, 'gamed', '2024-02-29 22:28:50', '2024-05-07 03:50:24'),
(85, 57, 1, NULL, 3.0051020408163, 'xzc', '2024-02-29 22:29:41', '2024-05-07 03:50:24'),
(86, 57, 1, NULL, 3.0051020408163, 'xzc', '2024-02-29 22:30:38', '2024-05-07 03:50:24'),
(87, 57, 1, NULL, 3.0051020408163, 'xzc', '2024-02-29 22:30:41', '2024-05-07 03:50:24'),
(88, 57, 1, NULL, 3.0051020408163, 'asd', '2024-02-29 22:30:54', '2024-05-07 03:50:24'),
(89, 57, 1, NULL, 3.0051020408163, 'dsfs', '2024-02-29 22:33:18', '2024-05-07 03:50:24'),
(90, 57, 1, NULL, 3.0051020408163, 'dsfs', '2024-02-29 22:34:35', '2024-05-07 03:50:24'),
(91, 57, 1, NULL, 3.0051020408163, 'dsfs', '2024-02-29 22:34:37', '2024-05-07 03:50:24'),
(92, 57, 1, NULL, 3.0051020408163, 'dsfs', '2024-02-29 22:34:48', '2024-05-07 03:50:24'),
(93, 57, 1, NULL, 3.0051020408163, 'dsfs', '2024-02-29 22:35:16', '2024-05-07 03:50:24'),
(94, 57, 1, NULL, 3.0051020408163, 'dsfs', '2024-02-29 22:36:47', '2024-05-07 03:50:24'),
(95, 57, 1, NULL, 3.0051020408163, 'dsfs', '2024-02-29 22:36:54', '2024-05-07 03:50:24'),
(96, 57, 1, NULL, 3.0051020408163, 'dsfs', '2024-02-29 22:37:36', '2024-05-07 03:50:24'),
(97, 57, 1, NULL, 3.0051020408163, 'dsfs', '2024-02-29 22:37:56', '2024-05-07 03:50:24'),
(98, 57, 1, NULL, 3.0051020408163, 'dsfs', '2024-02-29 22:37:59', '2024-05-07 03:50:24'),
(99, 57, 1, NULL, 3.0051020408163, 'dsfs', '2024-02-29 22:38:01', '2024-05-07 03:50:24'),
(100, 57, 1, NULL, 3.0051020408163, 'hlhjk', '2024-02-29 22:39:21', '2024-05-07 03:50:24'),
(101, 57, 1, NULL, 3.0051020408163, 'hlhjk', '2024-02-29 22:39:54', '2024-05-07 03:50:24'),
(102, 57, 1, NULL, 3.0051020408163, 'hlhjkq', '2024-02-29 22:40:28', '2024-05-07 03:50:24'),
(103, 57, 1, NULL, 3.0051020408163, 'hlhjkq', '2024-02-29 22:41:05', '2024-05-07 03:50:24'),
(104, 57, 1, NULL, 3.0051020408163, 'hlhjkq', '2024-02-29 22:41:08', '2024-05-07 03:50:24'),
(105, 57, 1, NULL, 3.0051020408163, 'hlhjkq', '2024-02-29 22:41:16', '2024-05-07 03:50:24'),
(106, 57, 1, NULL, 3.0051020408163, 'hlhjkq', '2024-02-29 22:42:03', '2024-05-07 03:50:24'),
(107, 57, 1, NULL, 3.0051020408163, 'hlhjkq', '2024-02-29 22:42:49', '2024-05-07 03:50:24'),
(108, 57, 1, NULL, 3.0051020408163, 'asdd', '2024-02-29 22:43:34', '2024-05-07 03:50:24'),
(109, 57, 1, NULL, 3.0051020408163, 'sad', '2024-02-29 22:48:32', '2024-05-07 03:50:24'),
(110, 57, 1, NULL, 3.0051020408163, 'sad', '2024-02-29 22:48:51', '2024-05-07 03:50:24'),
(111, 57, 1, NULL, 3.0051020408163, 'sad', '2024-02-29 22:50:09', '2024-05-07 03:50:24'),
(112, 57, 1, NULL, 3.0051020408163, 'dfsf', '2024-02-29 22:54:42', '2024-05-07 03:50:24'),
(113, 57, 1, NULL, 3.0051020408163, 'dfsf', '2024-02-29 22:57:18', '2024-05-07 03:50:24'),
(114, 57, 1, NULL, 3.0051020408163, 'dfsf', '2024-02-29 22:59:25', '2024-05-07 03:50:24'),
(115, 57, 1, NULL, 3.0051020408163, 'dfsf', '2024-02-29 23:05:15', '2024-05-07 03:50:24'),
(116, 57, 1, NULL, 3.0051020408163, 'dfsf', '2024-02-29 23:06:07', '2024-05-07 03:50:24'),
(117, 57, 1, NULL, 3.0051020408163, 'dfsf', '2024-02-29 23:06:48', '2024-05-07 03:50:24'),
(118, 57, 1, NULL, 3.0051020408163, 'dfsf', '2024-02-29 23:07:14', '2024-05-07 03:50:24'),
(119, 57, 1, NULL, 3.0051020408163, 'agah', '2024-02-29 23:08:40', '2024-05-07 03:50:24'),
(120, 57, NULL, 5, 3.7666666666666, 'jdiofd', '2024-02-29 23:09:02', '2024-06-11 19:59:40'),
(121, 57, 1, NULL, 3.0051020408163, 'omar', '2024-03-02 16:50:51', '2024-05-07 03:50:24'),
(122, 57, 1, NULL, 3.0051020408163, 'fsgd', '2024-03-02 16:56:24', '2024-05-07 03:50:24'),
(123, 57, 1, NULL, 3.0051020408163, 'hh', '2024-03-02 16:56:53', '2024-05-07 03:50:24'),
(124, 57, 1, NULL, 3.0051020408163, 'sf', '2024-03-02 16:57:32', '2024-05-07 03:50:24'),
(125, 57, 1, NULL, 3.0051020408163, 'kkk', '2024-03-02 17:13:15', '2024-05-07 03:50:24'),
(126, 57, 1, NULL, 3.0051020408163, 'hh', '2024-03-02 17:14:24', '2024-05-07 03:50:24'),
(127, 57, 1, NULL, 3.0051020408163, 'mmm', '2024-03-02 17:15:07', '2024-05-07 03:50:24'),
(128, 57, 1, NULL, 3.0051020408163, 'sads', '2024-03-02 17:19:00', '2024-05-07 03:50:24'),
(129, 57, 1, NULL, 3.0051020408163, 'hfdg', '2024-03-02 17:20:36', '2024-05-07 03:50:24'),
(130, 57, 1, NULL, 3.0051020408163, 'fdgd', '2024-03-02 17:21:19', '2024-05-07 03:50:24'),
(131, 57, 1, NULL, 3.0051020408163, 'fgd', '2024-03-02 17:22:32', '2024-05-07 03:50:24'),
(132, 57, 1, NULL, 3.0051020408163, 'gfhg', '2024-03-02 17:29:41', '2024-05-07 03:50:24'),
(133, 57, 1, NULL, 3.0051020408163, 'dsfsdf', '2024-03-02 17:30:55', '2024-05-07 03:50:24'),
(134, 57, 1, NULL, 3.0051020408163, 'fgdg', '2024-03-02 17:32:58', '2024-05-07 03:50:24'),
(135, 57, 1, NULL, 3.0051020408163, 'fgdg', '2024-03-02 17:32:58', '2024-05-07 03:50:24'),
(136, 57, 1, NULL, 3.0051020408163, 'jhk', '2024-03-02 17:33:16', '2024-05-07 03:50:24'),
(137, 57, 1, NULL, 3.0051020408163, 'fgd', '2024-03-02 17:36:32', '2024-05-07 03:50:24'),
(138, 57, 1, NULL, 3.0051020408163, 'omar', '2024-03-02 17:37:39', '2024-05-07 03:50:24'),
(139, 57, 1, NULL, 3.0051020408163, 'as', '2024-03-02 17:38:19', '2024-05-07 03:50:24'),
(140, 57, 1, NULL, 3.0051020408163, 'ahmed', '2024-03-02 17:41:44', '2024-05-07 03:50:24'),
(141, 57, 1, NULL, 3.0051020408163, 'sadad', '2024-03-02 17:42:26', '2024-05-07 03:50:24'),
(142, 57, 1, NULL, 3.0051020408163, 'sad', '2024-03-02 17:43:29', '2024-05-07 03:50:24'),
(143, 57, 1, NULL, 3.0051020408163, 'omar', '2024-03-02 17:46:01', '2024-05-07 03:50:24'),
(144, 57, 1, NULL, 3.0051020408163, 'omar2', '2024-03-02 19:01:46', '2024-05-07 03:50:24'),
(145, 57, 1, NULL, 3.0051020408163, 'omar3', '2024-03-02 19:05:10', '2024-05-07 03:50:24'),
(146, 57, 1, NULL, 3.0051020408163, 'omar4', '2024-03-02 19:06:26', '2024-05-07 03:50:24'),
(147, 57, 1, NULL, 3.0051020408163, 'sad', '2024-03-02 19:07:04', '2024-05-07 03:50:24'),
(148, 57, 1, NULL, 3.0051020408163, 'sad', '2024-03-02 19:07:36', '2024-05-07 03:50:24'),
(149, 57, 1, NULL, 3.0051020408163, 'omar', '2024-03-02 19:08:48', '2024-05-07 03:50:24'),
(150, 57, 1, NULL, 3.0051020408163, 'omar', '2024-03-02 19:10:11', '2024-05-07 03:50:24'),
(151, 57, 1, NULL, 3.0051020408163, 'dsfs', '2024-03-02 19:16:28', '2024-05-07 03:50:24'),
(152, 57, 1, NULL, 3.0051020408163, 'dsfs', '2024-03-02 19:16:57', '2024-05-07 03:50:24'),
(153, 57, NULL, 5, 3.7666666666666, 'dsf', '2024-03-02 20:27:48', '2024-06-11 19:59:40'),
(154, 57, NULL, 5, 3.7666666666666, 'dasd', '2024-03-03 04:23:22', '2024-06-11 19:59:40'),
(155, 57, 1, NULL, 3.0051020408163, 'dsdfsszaaa', '2024-03-03 04:43:33', '2024-05-07 03:50:24'),
(156, 57, 4, NULL, 3.2619047619048, 'very good', '2024-03-03 17:11:37', '2024-03-14 16:16:48'),
(157, 57, 4, NULL, 3.2619047619048, 'very good', '2024-03-03 17:11:48', '2024-03-14 16:16:48'),
(158, 57, 1, NULL, 3.0051020408163, 'ف', '2024-03-03 17:16:46', '2024-05-07 03:50:24'),
(159, 57, 1, NULL, 3.0051020408163, 'fast delivery', '2024-03-03 19:23:00', '2024-05-07 03:50:24'),
(160, 57, 1, NULL, 3.0051020408163, 'faster', '2024-03-03 19:24:16', '2024-05-07 03:50:24'),
(161, 57, NULL, 5, 3.7666666666666, 'very good', '2024-03-03 19:42:04', '2024-06-11 19:59:40'),
(162, 70, 20, NULL, 55, 'ccf', '2024-03-04 01:37:20', '2024-03-04 01:37:20'),
(163, 57, 1, NULL, 3.0051020408163, 'رايق', '2024-03-10 22:17:46', '2024-05-07 03:50:24'),
(164, 67, 1, NULL, 3.0051020408163, 'wonderful ♥️', '2024-03-13 20:09:30', '2024-05-07 03:50:24'),
(165, 57, 1, NULL, 3.0051020408163, 'رائع', '2024-03-14 16:16:07', '2024-05-07 03:50:24'),
(166, 57, 4, NULL, 3.2619047619048, 'very good', '2024-03-14 16:16:38', '2024-03-14 16:16:48'),
(167, 57, 4, NULL, 3.2619047619048, 'very good', '2024-03-14 16:16:48', '2024-03-14 16:16:48'),
(168, 57, 1, NULL, 3.0051020408163, 'رأيع', '2024-03-14 16:18:13', '2024-05-07 03:50:24'),
(169, 57, 1, NULL, 3.0051020408163, 'محمد مصطفي', '2024-04-20 03:42:07', '2024-05-07 03:50:24'),
(170, 57, 1, NULL, 3.0051020408163, 'رايق', '2024-05-07 03:50:24', '2024-05-07 03:50:24'),
(172, 57, NULL, 12, 3.7666666666666, 'best doctor in app', '2024-06-06 15:56:27', '2024-06-11 19:59:40'),
(173, 57, NULL, 12, 3.7666666666666, 'best doctor in app', '2024-06-06 15:56:30', '2024-06-11 19:59:40'),
(174, 57, NULL, 12, 3.7666666666666, 'best doctor in app', '2024-06-06 15:56:33', '2024-06-11 19:59:40'),
(175, 57, NULL, 12, 3.7666666666666, 'best doctor in app', '2024-06-06 15:56:36', '2024-06-11 19:59:40'),
(176, 57, NULL, 8, 3.7666666666666, 'nice', '2024-06-11 19:59:40', '2024-06-11 19:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2024-01-31 13:58:08', '2024-01-31 13:58:08'),
(2, 'admin bazoka', 'web', '2024-02-01 07:11:27', '2024-05-28 20:50:48'),
(3, 'elmaquam admin', 'web', '2024-02-01 07:11:58', '2024-06-25 08:17:49'),
(4, 'admin test', 'web', '2024-06-04 22:10:24', '2024-06-04 22:10:24'),
(5, 'hi prost admin', 'web', '2024-06-25 08:39:45', '2024-06-25 08:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(49, 2),
(60, 2),
(61, 2),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(60, 3),
(9, 4),
(10, 4),
(11, 4),
(12, 4),
(25, 4),
(26, 4),
(27, 4),
(28, 4),
(33, 4),
(34, 4),
(35, 4),
(36, 4),
(17, 5),
(18, 5),
(19, 5),
(20, 5),
(56, 5),
(60, 5),
(61, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `places_id` bigint UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `places_id`, `size`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"en\":\"large\",\"ar\":\"كبير\"}', 150, '2024-01-14 08:34:32', '2024-06-19 15:26:35'),
(4, 1, '{\"en\":\"small\",\"ar\":\"صغير\"}', 70, '2024-02-11 17:49:12', '2024-06-19 15:27:05'),
(5, 1, '{\"en\":\"mediam\",\"ar\":\"وسط\"}', 100, '2024-02-11 17:49:20', '2024-06-19 15:27:27'),
(7, 4, '{\"en\":\"large\",\"ar\":\"كبير\"}', 200, '2024-06-19 15:27:50', '2024-06-19 15:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `social_id`, `social_type`, `remember_token`, `created_at`, `updated_at`, `phone`, `address`, `role`) VALUES
(24, 'test', 'ibrahimmomen179@gmail.com', '2024-01-17 10:05:30', '123456', NULL, NULL, NULL, '2024-01-17 08:59:59', '2024-01-17 10:05:30', NULL, NULL, 'user'),
(27, 'test33', 'test33@gmail.com', NULL, '$2y$10$ewwPVfjF0w.wPRjRcafiV.P.MQboKCkdCESu.nsjY20TknYiBAAt2', NULL, NULL, NULL, '2024-01-17 10:30:16', '2024-01-17 10:30:16', '01212121212', NULL, 'user'),
(32, 'hetekymeg', 'ruta@mailinator.com', NULL, '$2y$10$CmkG/AC2lFle81qCDJgHueiC55PVY.5ltqY/EMzYPXtYkQHeQsIum', NULL, NULL, NULL, '2024-01-18 11:37:50', '2024-01-18 11:37:50', NULL, NULL, 'user'),
(33, 'gypam', 'hojuciholy@mailinator.com', NULL, '$2y$10$Vs1IfRi7dVFfI1Xg8lY55ugeQZz6w.0Bj5bzR7ww3a92qvvjGa8jO', NULL, NULL, NULL, '2024-01-18 11:43:56', '2024-01-18 11:43:56', NULL, NULL, 'user'),
(35, 'capag', 'pifyqi@mailinator.com', NULL, '$2y$10$WH0Irt7EsadfY8//AjnFMOgP15Ks1ZbShgsu.5IMau.ScMETFmB/6', NULL, NULL, NULL, '2024-01-18 11:45:41', '2024-01-18 11:45:41', NULL, NULL, 'user'),
(36, 'byxyto', 'pijucupiku@mailinator.com', NULL, '$2y$10$otXK50uUp5h7FwWuYlfB5u4lvuYAbejyLT6k8Ja0msVrF5DMsq6fG', NULL, NULL, NULL, '2024-01-18 11:49:00', '2024-01-18 11:49:00', NULL, NULL, 'user'),
(48, 'admin resturant hannah', 'hannah@gmail.com', NULL, '$2y$10$uOriIsKtuMnuoXpuI48tN.OkiUX9Z1IgzF4L2nt7ZxTUKcVfzS6Oy', NULL, NULL, NULL, '2024-01-21 07:53:35', '2024-01-21 07:53:35', NULL, NULL, 'admin'),
(51, 'lydewyrebu', 'rurikovi@mailinator.com', NULL, '$2y$10$Oiz9QECtPHE1jgOvwr0ip.cUXl61E6JAtRGRJBfEwiQoCkRzDm.36', NULL, NULL, NULL, '2024-01-21 10:26:29', '2024-01-21 10:26:29', NULL, NULL, 'admin'),
(52, 'loaaelsayed', 'loaaelsayed@gmail.com', NULL, '$2y$10$TGTUfs2fPmrMBrdzm/oi6utLTjNWn332OJXiwZ41v3TRgog/llWnu', NULL, NULL, NULL, '2024-01-30 09:07:04', '2024-01-30 09:07:04', '01212213312', NULL, 'user'),
(54, 'loaaelsayed', 'loaa@gmail.com', NULL, '$2y$10$.NE7C.u9l94YCr/.o7cuBuZX8QUOzN2XI44AbAI2PV2s.QD0N6XM.', NULL, NULL, NULL, '2024-01-31 13:58:08', '2024-03-03 16:21:33', '01212959115', 'Nasser city', 'admin'),
(55, 'admin bazoka', 'admin_bazoka@gmail.com', NULL, '$2y$10$g4mBydFcFQMQ7/H2EKA7C.xbTdTnnfaihgyKyvdgbJSkzRf7VbVEK', NULL, NULL, NULL, '2024-02-01 07:16:58', '2024-02-01 07:16:58', NULL, NULL, 'admin'),
(56, 'admin clinic1', 'user2@gmail.com', NULL, '$2y$10$qL3GfV8OF1b2XBul31hyx.UzObErXgw/I2Do6PPnShNKzmXwTQ/8y', NULL, NULL, NULL, '2024-02-01 07:17:35', '2024-02-01 07:17:35', NULL, NULL, 'admin'),
(57, 'All Safe software house', 'omarmaamoun@gmail.com', NULL, '$2y$10$RtkSe7lb5C38U/i0ej7u4.xik9464m2rVbHSoEWMptJpPmr38jUyO', NULL, NULL, NULL, '2024-02-05 15:29:04', '2024-06-12 20:23:27', '01064780620', 'Egypt Al Manteqah Ath Thamenah, 383X+QG6 4441564', 'user'),
(58, 'loaaelsayed', 'loaaelsayed2@gmail.com', NULL, '$2y$10$9yDTAZzeRO6UGLPNHCnFu.PfAZcn5yRrno7l1raxs2E/XS/QBmwwm', NULL, NULL, NULL, '2024-02-05 15:33:42', '2024-02-05 15:33:42', '01212213322', NULL, 'user'),
(59, 'loaaelsayed', 'loaaelsayed23@gmail.com', NULL, '$2y$10$2vFxA046Qa1YtAdRCELrl.xtkel6VpKBv5G9El7LHgF0AbFumZq8K', NULL, NULL, NULL, '2024-02-05 18:35:27', '2024-02-05 18:35:27', '01212213322', NULL, 'user'),
(60, 'loaaelsayed', 'loaaelsayed233@gmail.com', NULL, '$2y$10$rdC09Rh4HvmOzy9F26i0a.kFmOe/IsdpUtU5ZZRT.Nc33SyvlV4be', NULL, NULL, NULL, '2024-05-05 18:35:36', '2024-02-05 18:35:36', '01212213322', NULL, 'user'),
(61, 'momem', 'momen@gmail.com', NULL, '$2y$10$ZtxHxYiFhhTZRaStGxrzPOabsou.1YdNUwhndD8mVVC7T7hwP3yYK', NULL, NULL, NULL, '2024-02-05 21:32:49', '2024-02-05 21:32:49', '01055774322', NULL, 'user'),
(62, 'osama', 'osamamaamoun@gmail.com', NULL, '$2y$10$AXRYWfjaAfWDb5G3.3Lkze1m0.bAd89BIQzFYK1v1Yx1rXC5KPlNu', NULL, NULL, NULL, '2024-02-05 21:49:30', '2024-02-05 21:49:30', '01063368595', NULL, 'user'),
(63, 'osama', 'osamamaamou@gmail.com', NULL, '$2y$10$nEjDTrvzWs1sgWUeJNg29.2s0RTGJea.XfJZ6oDNOM2Pj.Xb05fyu', NULL, NULL, NULL, '2024-02-05 21:50:20', '2024-02-05 21:50:20', '01271899826', NULL, 'user'),
(64, 'abdo', 'abdomaamoun@gmail.com', NULL, '$2y$10$UeXG4GZXwmsoewulMRxOo.x2GC6oPul0u4G0qVu3oyhb2KZjE5iH6', NULL, NULL, NULL, '2024-02-05 21:54:35', '2024-02-05 21:54:35', '01064780660', NULL, 'user'),
(65, 'momem ibrahim', 'momenmohamed@gmail.com', NULL, '$2y$10$xHMx9l.0SdBEsh3gWsxIJueu7MUJddu8WhTcZANAi/bLucFozpTni', NULL, NULL, NULL, '2024-02-05 21:56:15', '2024-02-05 21:57:16', '01064780700', NULL, 'user'),
(66, 'omar maamoun', 'omarmaamoun6@gmail.com', NULL, '$2y$10$GHuOFXj8Z0MYLi83zYGoC.W.j8WluTdaZp5CnfhDJJTOxN1OJRGna', NULL, NULL, NULL, '2024-02-05 22:13:30', '2024-02-05 22:13:30', '01064780500', NULL, 'user'),
(67, 'momen', 'ahmed@gmail.com', NULL, '$2y$10$1Z0YIxpR1O0rpyr/aX..S.VO4sgnVsn7c58hwq1rcWD5wVcKeGwrq', NULL, NULL, NULL, '2024-02-13 15:57:19', '2024-02-13 15:57:19', '01212212212', NULL, 'user'),
(68, 'Mohamed', 'min@gmail.com', NULL, '$2y$10$tKFx4XjrZ6lgSereuJKW/uhYdnAYUTaVBc1txlslphiiBaODS2uC6', NULL, NULL, NULL, '2024-02-15 22:27:36', '2024-02-15 22:27:36', '01234567890', NULL, 'user'),
(69, 'momen', 'momenh@gmail.com', NULL, '$2y$10$0tXVJw8zYEedgYwhkHQXge505RCJ6eR5AHg6TOvwBBhoq66WwExyC', NULL, NULL, NULL, '2024-02-27 17:36:51', '2024-03-11 19:03:45', '01211814376', 'cairo', 'user'),
(70, 'Mohamed', 'mohamed@gmail.com', NULL, '$2y$10$ZW2qNKS3rY66OWiHh.4wsuIY9QwsJuEW9Eimj8RssQGZWh/ioxLdK', NULL, NULL, NULL, '2024-03-02 20:23:56', '2024-03-02 20:25:09', '01152655983', NULL, 'user'),
(71, 'mahmoud.dabour', 'mahmoud@gmail.com', NULL, '$2y$10$DQoHcEvb8IwbjMJz1/3iV.OMnLbvKDa80OhX7sGNMzfAC/7blMNaK', NULL, NULL, NULL, '2024-03-02 20:53:52', '2024-03-02 20:53:52', '01099101469', NULL, 'user'),
(72, 'omar osama', 'omarosama@gmail.com', NULL, '$2y$10$PwUefwgftsWA1zMm1NBp9etybq.HGhfl8PpRc9vXBdI4Fb8CNJbKO', NULL, NULL, NULL, '2024-03-04 15:27:17', '2024-03-04 15:27:17', '01064780680', NULL, 'user'),
(73, 'mosalah', 'mosalah@gmail.com', NULL, '$2y$10$0y2dm.Y78kYwm.41Keb6we1x5nkX8y7F56k9FE2HTRfuHfe4V7bCq', NULL, NULL, NULL, '2024-03-04 15:32:59', '2024-03-04 15:32:59', '01151235225', NULL, 'user'),
(74, 'amr ahmed', 'moralivefree@gmail.com', NULL, '$2y$10$t4q3/PlR7DM5zkDVh5tQbefQDX9nZp9fW7e/h8ON54v5iQMdOV/6K', NULL, NULL, NULL, '2024-03-06 18:55:06', '2024-03-06 18:55:06', '01004772334', NULL, 'user'),
(75, 'test', 'test@gmail.com', NULL, '$2y$10$XYro6kIM/zKWt3DQkUoPfu.ULFLQmKjXBKpDli51KLpdF6icvK0Ha', NULL, NULL, NULL, '2024-03-13 17:07:42', '2024-03-13 17:07:42', NULL, NULL, 'user'),
(77, 'elmaquam', 'elmaquam@gmail.com', NULL, '$2y$10$kAA9a7FxgrulgQ3P3ZjV.ukx1id0q04Zgk.hedsHH0gfGHA.rbzuW', NULL, NULL, NULL, '2024-05-27 13:49:39', '2024-05-27 13:49:39', NULL, NULL, 'admin'),
(78, 'admin test', 'testadmin@gmail.com', NULL, '$2y$10$DSiP81GGiysYeXcs9inyeusBbBW5fjXZkfXSCqF2.NFBUGDRX1APq', NULL, NULL, NULL, '2024-06-04 22:11:04', '2024-06-04 22:11:04', NULL, NULL, 'admin'),
(79, 'waleed', 'whussein89@gmail.com', NULL, '$2y$10$mjGo6JSfWKvpEMZfX9O4aut06zbGVud5nVP98IYovssq39/OXWxTu', NULL, NULL, NULL, '2024-06-14 20:48:44', '2024-06-14 20:48:44', '01007790970', NULL, 'user'),
(81, 'hi prost admin', 'hiprostadmin@gmail.com', NULL, '$2y$10$4WLwjrOvz.f4gw0mBfKLHehAigJR8l5utyvluLW92cdHtA4M1pSyK', NULL, NULL, NULL, '2024-06-25 08:45:21', '2024-06-25 08:45:21', NULL, NULL, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_promos`
--

CREATE TABLE `user_promos` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `promo_code_id` bigint UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_promos`
--

INSERT INTO `user_promos` (`id`, `user_id`, `promo_code_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 27, 1, '0', '2024-01-31 10:14:49', '2024-01-31 10:14:49'),
(3, 58, 1, '0', '2024-02-05 16:32:24', '2024-02-05 16:32:24'),
(4, 57, 1, '0', '2024-02-18 17:37:18', '2024-02-18 17:37:18'),
(5, 57, 1, '0', '2024-03-03 17:10:50', '2024-03-03 17:10:50'),
(6, 27, 1, '0', '2024-03-10 21:13:28', '2024-03-10 21:13:28'),
(7, 27, 1, '0', '2024-03-11 19:08:45', '2024-03-11 19:08:45'),
(8, 27, 1, '0', '2024-03-11 19:09:11', '2024-03-11 19:09:11'),
(9, 57, 1, '0', '2024-06-12 20:31:11', '2024-06-12 20:31:11'),
(10, 58, 1, '0', '2024-06-12 20:33:51', '2024-06-12 20:33:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addons_place_id_foreign` (`place_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_place_id_foreign` (`place_id`),
  ADD KEY `admin_user_id_foreign` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_places`
--
ALTER TABLE `category_places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_places_category_id_foreign` (`category_id`),
  ADD KEY `category_places_place_id_foreign` (`places_id`);

--
-- Indexes for table `content_us`
--
ALTER TABLE `content_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctores_place_id_foreign` (`place_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_doctore_id_foreign` (`doctore_id`),
  ADD KEY `favorites_product_id_foreign` (`menue_id`),
  ADD KEY `favorites_place_id_foreign` (`place_id`);

--
-- Indexes for table `menues`
--
ALTER TABLE `menues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menues_place_id_foreign` (`place_id`),
  ADD KEY `menues_product_id_foreign` (`product_id`),
  ADD KEY `menues_category_id_foreign` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_place_id_foreign` (`place_id`),
  ADD KEY `orders_size_id_foreign` (`size_id`),
  ADD KEY `orders_promo_code_id_foreign` (`promo_code_id`),
  ADD KEY `orders_menue_id_foreign` (`menue_id`);

--
-- Indexes for table `order_trakes`
--
ALTER TABLE `order_trakes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_trakes_order_id_foreign` (`order_id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otps_id_index` (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_operations`
--
ALTER TABLE `payment_operations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_id` (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_place_id_foreign` (`place_id`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promo_codes_place_id_foreign` (`place_id`);

--
-- Indexes for table `reservationes`
--
ALTER TABLE `reservationes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservationes_doctore_id_foreign` (`doctore_id`),
  ADD KEY `reservationes_place_id_foreign` (`place_id`),
  ADD KEY `reservationes_user_id_foreign` (`user_id`);

--
-- Indexes for table `resturants_requests`
--
ALTER TABLE `resturants_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_place_id_foreign` (`place_id`),
  ADD KEY `reviews_doctore_id_foreign` (`doctore_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sizes_places_id_foreign` (`places_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_promos`
--
ALTER TABLE `user_promos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_promos_user_id_foreign` (`user_id`),
  ADD KEY `user_promos_promo_code_id_foreign` (`promo_code_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `category_places`
--
ALTER TABLE `category_places`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_us`
--
ALTER TABLE `content_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT for table `menues`
--
ALTER TABLE `menues`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=518;

--
-- AUTO_INCREMENT for table `order_trakes`
--
ALTER TABLE `order_trakes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment_operations`
--
ALTER TABLE `payment_operations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reservationes`
--
ALTER TABLE `reservationes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `resturants_requests`
--
ALTER TABLE `resturants_requests`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `user_promos`
--
ALTER TABLE `user_promos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addons`
--
ALTER TABLE `addons`
  ADD CONSTRAINT `addons_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_places`
--
ALTER TABLE `category_places`
  ADD CONSTRAINT `category_places_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_places_place_id_foreign` FOREIGN KEY (`places_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctores`
--
ALTER TABLE `doctores`
  ADD CONSTRAINT `doctores_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_doctore_id_foreign` FOREIGN KEY (`doctore_id`) REFERENCES `doctores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_menue_id_foreign` FOREIGN KEY (`menue_id`) REFERENCES `menues` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menues`
--
ALTER TABLE `menues`
  ADD CONSTRAINT `menues_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menues_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menues_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_menue_id_foreign` FOREIGN KEY (`menue_id`) REFERENCES `menues` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_promo_code_id_foreign` FOREIGN KEY (`promo_code_id`) REFERENCES `promo_codes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_trakes`
--
ALTER TABLE `order_trakes`
  ADD CONSTRAINT `order_trakes_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_operations`
--
ALTER TABLE `payment_operations`
  ADD CONSTRAINT `payment_operations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_operations_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD CONSTRAINT `promo_codes_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservationes`
--
ALTER TABLE `reservationes`
  ADD CONSTRAINT `reservationes_doctore_id_foreign` FOREIGN KEY (`doctore_id`) REFERENCES `doctores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservationes_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservationes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_doctore_id_foreign` FOREIGN KEY (`doctore_id`) REFERENCES `doctores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_places_id_foreign` FOREIGN KEY (`places_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_promos`
--
ALTER TABLE `user_promos`
  ADD CONSTRAINT `user_promos_promo_code_id_foreign` FOREIGN KEY (`promo_code_id`) REFERENCES `promo_codes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_promos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
