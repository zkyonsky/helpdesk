-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2021 at 03:48 PM
-- Server version: 8.0.20
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salesperson` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `phone`, `email`, `pic`, `salesperson`, `product`, `created_at`, `updated_at`) VALUES
(1, 'Pemkot Depok', 'Jl. Margonda Raya No. 1, Depok', '021 87623765', 'admin@pemkotdepok.go.id', 'Edi', 'Jono', 'Instalasi LAN', NULL, NULL),
(2, 'Polsek Sukmajaya', 'Jl. Keadilan No. 1, Depok', '021 48756382', 'polseksukmajaya@gmail.com', 'Lukman', 'Edi', 'Instalasi Video Conference', NULL, NULL);

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_emails`
--

CREATE TABLE `log_emails` (
  `id` bigint UNSIGNED NOT NULL,
  `ticket_id` bigint UNSIGNED NOT NULL,
  `emailto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailcc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailbcc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_users`
--

CREATE TABLE `log_users` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_users`
--

INSERT INTO `log_users` (`id`, `user_id`, `ip`, `browser`, `log`, `created_at`, `updated_at`) VALUES
(1, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket Baru', '2021-03-27 16:25:34', '2021-03-27 16:25:34'),
(2, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket No 4/2021', '2021-03-28 02:10:30', '2021-03-28 02:10:30'),
(3, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Menghapus Tiket No 4/2021', '2021-03-28 02:12:25', '2021-03-28 02:12:25'),
(4, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Memperbaharui Tiket No 3/2021', '2021-03-28 02:18:55', '2021-03-28 02:18:55'),
(5, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket No 4/2021', '2021-03-28 03:21:50', '2021-03-28 03:21:50'),
(6, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket No 5/2021', '2021-03-28 03:25:22', '2021-03-28 03:25:22'),
(7, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket No 6/2021', '2021-03-29 05:06:48', '2021-03-29 05:06:48'),
(8, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket No 7/2021', '2021-03-29 05:12:57', '2021-03-29 05:12:57'),
(9, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket No 18/2021', '2021-03-29 05:44:57', '2021-03-29 05:44:57'),
(10, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket No 19/2021', '2021-03-29 05:46:16', '2021-03-29 05:46:16'),
(11, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket No 20/2021', '2021-03-29 05:48:46', '2021-03-29 05:48:46'),
(12, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket No 21/2021', '2021-03-29 05:58:14', '2021-03-29 05:58:14'),
(13, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket No 22/2021', '2021-03-29 06:02:03', '2021-03-29 06:02:03'),
(14, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket No 23/2021', '2021-03-29 06:03:10', '2021-03-29 06:03:10'),
(15, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket No 24/2021', '2021-03-29 06:04:00', '2021-03-29 06:04:00'),
(16, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket No 25/2021', '2021-03-29 06:05:13', '2021-03-29 06:05:13'),
(17, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket No 26/2021', '2021-03-29 06:30:19', '2021-03-29 06:30:19'),
(18, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket No 27/2021', '2021-03-29 06:35:59', '2021-03-29 06:35:59'),
(19, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket No 28/2021', '2021-03-29 06:44:46', '2021-03-29 06:44:46'),
(20, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Membuat Tiket No 29/2021', '2021-03-29 06:45:08', '2021-03-29 06:45:08'),
(21, 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Membuat Tiket No 30/2021', '2021-04-08 04:53:14', '2021-04-08 04:53:14'),
(22, 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Menghapus Tiket No 30/2021', '2021-04-08 06:13:42', '2021-04-08 06:13:42'),
(23, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Membuat Tiket No 30/2021', '2021-04-11 08:35:07', '2021-04-11 08:35:07'),
(24, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Membuat Tiket No 31/2021', '2021-04-13 08:21:39', '2021-04-13 08:21:39'),
(25, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Membuat Tiket No 32/2021', '2021-04-13 08:28:37', '2021-04-13 08:28:37'),
(26, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Menghapus Tiket No 30/2021', '2021-04-13 09:08:46', '2021-04-13 09:08:46'),
(27, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Memperbaharui Tiket No 32/2021', '2021-04-13 15:49:45', '2021-04-13 15:49:45'),
(28, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Memperbaharui Tiket No 31/2021', '2021-04-13 15:50:57', '2021-04-13 15:50:57'),
(29, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Membuat Tiket No 32/2021', '2021-04-15 05:52:47', '2021-04-15 05:52:47'),
(30, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Memperbaharui Tiket No 32/2021', '2021-04-15 06:19:22', '2021-04-15 06:19:22'),
(31, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Memperbaharui Tiket No 32/2021', '2021-04-15 06:20:46', '2021-04-15 06:20:46'),
(32, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Memperbaharui Tiket No 32/2021', '2021-04-15 06:21:25', '2021-04-15 06:21:25'),
(33, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Memperbaharui Tiket No 32/2021', '2021-04-15 06:28:04', '2021-04-15 06:28:04'),
(34, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Memperbaharui Tiket No 2/2021', '2021-04-15 06:28:31', '2021-04-15 06:28:31'),
(35, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Memperbaharui Tiket No 3/2021', '2021-04-15 06:29:09', '2021-04-15 06:29:09'),
(36, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Memperbaharui Tiket No 32/2021', '2021-04-15 06:34:07', '2021-04-15 06:34:07'),
(37, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Membuat Tiket No 35/2021', NULL, NULL),
(38, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Membuat Tiket No 36/2021', NULL, NULL),
(39, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Membuat Tiket No 37/2021', NULL, NULL),
(40, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Membuat Tiket No 38/2021', '2021-04-16 03:18:03', '2021-04-16 03:18:03'),
(41, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Membuat Tiket No 39/2021', '2021-04-16 03:38:26', '2021-04-16 03:38:26'),
(42, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Memperbaharui Tiket No 39/2021', '2021-04-16 03:38:52', '2021-04-16 03:38:52'),
(43, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Memperbaharui Tiket No 38/2021', '2021-04-16 03:40:19', '2021-04-16 03:40:19'),
(44, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Memperbaharui Tiket No 32/2021', '2021-04-16 03:41:16', '2021-04-16 03:41:16'),
(45, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Menghapus Tiket No 37/2021', '2021-04-16 03:42:55', '2021-04-16 03:42:55'),
(46, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Membuat Tiket No 37/2021', '2021-04-17 00:55:40', '2021-04-17 00:55:40'),
(47, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Membuat Tiket No 38/2021', '2021-04-17 01:10:05', '2021-04-17 01:10:05'),
(48, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Membuat Tiket No 39/2021', '2021-04-17 01:12:59', '2021-04-17 01:12:59'),
(49, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Membuat Tiket No 40/2021', '2021-04-17 01:21:01', '2021-04-17 01:21:01'),
(50, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Membuat Tiket No 41/2021', '2021-04-17 01:25:46', '2021-04-17 01:25:46');

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
(4, '2021_02_28_213738_create_permission_tables', 1),
(5, '2021_03_01_143915_create_customers_table', 1),
(6, '2021_03_01_145258_create_news_table', 1),
(7, '2021_03_01_150701_create_slas_table', 1),
(8, '2021_03_02_232306_create_projects_table', 1),
(9, '2021_03_02_233320_create_tickets_table', 1),
(10, '2021_03_03_123910_create_log_emails_table', 1),
(11, '2021_03_03_130339_create_log_users_table', 1),
(12, '2021_04_17_074910_create_jobs_table', 2);

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
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `detail`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Rencana Lembur Seminggu', 'Lembur Seminggu', 1, '2021-03-25 09:33:39', '2021-04-15 07:34:45'),
(3, 'Kenaikan Gaji', 'Minggu depan gaji naik', 4, '2021-04-15 07:32:18', '2021-04-15 07:34:32'),
(4, 'Pemeliharaan', 'Mohon maaf akan ada pemeliharaan jaringan pada hari minggu', 4, '2021-04-15 08:05:18', '2021-04-15 08:05:18');

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
(1, 'tickets.index', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(2, 'tickets.create', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(3, 'tickets.edit', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(4, 'tickets.delete', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(5, 'slas.index', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(6, 'slas.create', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(7, 'slas.edit', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(8, 'slas.delete', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(9, 'news.index', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(10, 'news.create', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(11, 'news.edit', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(12, 'news.delete', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(13, 'users.index', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(14, 'users.create', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(15, 'users.edit', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(16, 'users.delete', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(17, 'customers.index', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(18, 'customers.create', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(19, 'customers.edit', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(20, 'customers.delete', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(21, 'projects.index', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(22, 'projects.create', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(23, 'projects.edit', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(24, 'projects.delete', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(25, 'log_emails.index', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(26, 'log_emails.create', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(27, 'log_emails.edit', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(28, 'log_emails.delete', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(29, 'log_users.index', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(31, 'permissions.index', 'web', NULL, NULL),
(33, 'roles.index', 'web', '2021-03-14 08:35:00', '2021-03-14 08:35:00'),
(34, 'roles.create', 'web', '2021-03-14 08:35:11', '2021-03-14 08:35:11'),
(35, 'roles.edit', 'web', '2021-03-14 08:35:25', '2021-03-14 08:35:25'),
(36, 'roles.delete', 'web', '2021-03-14 08:35:35', '2021-03-14 08:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `deliverystart` datetime NOT NULL,
  `deliveryend` datetime NOT NULL,
  `installstart` datetime NOT NULL,
  `installend` datetime NOT NULL,
  `uatstart` datetime NOT NULL,
  `uatend` datetime NOT NULL,
  `billstart` datetime NOT NULL,
  `billdue` datetime NOT NULL,
  `warrantyperiod` int NOT NULL,
  `contractstart` datetime NOT NULL,
  `contractperiod` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `customer_id`, `deliverystart`, `deliveryend`, `installstart`, `installend`, `uatstart`, `uatend`, `billstart`, `billdue`, `warrantyperiod`, `contractstart`, `contractperiod`, `created_at`, `updated_at`) VALUES
(1, 'Instalasi LAN', 1, '2021-01-11 20:32:01', '2021-01-12 20:32:01', '2021-01-13 20:32:01', '2021-01-22 20:32:01', '2021-01-23 20:32:01', '2021-01-29 20:32:01', '2021-01-11 20:32:01', '2021-02-01 20:32:01', 12, '2021-01-01 20:32:01', 3, NULL, NULL),
(2, 'Instalasi Perangkat Video Conference', 2, '2021-02-01 20:44:43', '2021-02-05 20:44:43', '2021-02-08 20:44:43', '2021-03-12 20:44:43', '2021-03-15 20:44:43', '2021-03-19 20:44:43', '2021-03-22 20:44:43', '2021-03-01 20:44:43', 12, '2021-02-01 20:44:43', 3, NULL, NULL);

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
(1, 'Admin', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(2, 'Helpdesk', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45'),
(3, 'Teknisi', 'web', '2021-03-03 09:40:45', '2021-03-03 09:40:45');

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
(31, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(17, 2),
(21, 2),
(25, 2),
(26, 2),
(1, 3),
(3, 3),
(5, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(21, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3);

-- --------------------------------------------------------

--
-- Table structure for table `slas`
--

CREATE TABLE `slas` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` int NOT NULL,
  `resolution` int NOT NULL,
  `warning` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slas`
--

INSERT INTO `slas` (`id`, `name`, `response`, `resolution`, `warning`) VALUES
(1, 'Critical', 1, 8, 6),
(2, 'High', 2, 24, 20),
(3, 'Medium', 3, 48, 40);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sla_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `reportedby` int NOT NULL,
  `reporteddate` datetime NOT NULL,
  `problemsummary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problemdetail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignee` int NOT NULL,
  `assigneddate` datetime NOT NULL,
  `pendingby` int DEFAULT NULL,
  `pendingdate` datetime DEFAULT NULL,
  `resolution` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resolvedby` int DEFAULT NULL,
  `resolveddate` datetime DEFAULT NULL,
  `closedby` int DEFAULT NULL,
  `closeddate` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `number`, `sla_id`, `customer_id`, `reportedby`, `reporteddate`, `problemsummary`, `problemdetail`, `status`, `assignee`, `assigneddate`, `pendingby`, `pendingdate`, `resolution`, `resolvedby`, `resolveddate`, `closedby`, `closeddate`, `created_at`, `updated_at`) VALUES
(2, '2/2021', 2, 2, 1, '2021-03-02 21:23:52', 'camera mati', 'Camera tidak dapat dinyalakan', 'Assigned', 2, '2021-03-02 20:19:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '3/2021', 3, 2, 1, '2021-03-01 21:23:52', 'LAN Mati', 'LAN mati sama sekali', 'Assigned', 2, '2021-03-01 21:23:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '4/2021', 2, 2, 1, '2021-03-02 21:25:59', 'Suara tidak keluar', 'Suara tidak ada', 'Assigned', 2, '2021-03-02 21:25:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '5/2021', 2, 1, 1, '2021-03-03 21:25:59', 'Internet putus', 'Kabel putus', 'Assigned', 2, '2021-03-03 21:25:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '6/2021', 2, 2, 1, '2021-03-04 21:28:15', 'Kabel putus', 'kabel dimakan tikus', 'Assigned', 2, '2021-03-04 21:28:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '1/2021', 1, 1, 1, '2021-03-16 00:00:00', 'kabel putus', 'asasasas', 'Pending', 5, '2021-03-16 11:51:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-16 04:51:17', '2021-04-08 06:30:09'),
(8, '2/2021', 2, 1, 1, '2021-03-28 00:00:00', 'Koneksi Lambat', 'Download Lambat', 'Closed', 5, '2021-03-27 23:24:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-27 16:24:43', '2021-04-15 06:28:31'),
(9, '3/2021', 3, 1, 1, '2021-03-28 00:00:00', 'Koneksi Lambat', 'lemot', 'Closed', 4, '2021-03-27 23:25:34', NULL, NULL, 'kabel disambung', NULL, NULL, NULL, NULL, '2021-03-27 16:25:34', '2021-04-15 06:29:09'),
(11, '4/2021', 3, 1, 1, '2021-03-28 00:00:00', 'Tidak ada koneksi', 'Kabel digigit tikus', 'Assigned', 5, '2021-03-28 10:21:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-28 03:21:50', '2021-03-28 03:21:50'),
(12, '5/2021', 1, 2, 1, '2021-03-28 00:00:00', 'Tidak ada suara', 'Speaker bermasalah', 'Assigned', 5, '2021-03-28 10:25:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-28 03:25:22', '2021-03-28 03:25:22'),
(13, '6/2021', 3, 1, 1, '2021-03-29 00:00:00', 'Kabel kurang', 'kabel hilang', 'Assigned', 5, '2021-03-29 12:06:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 05:06:48', '2021-03-29 05:06:48'),
(14, '7/2021', 2, 2, 1, '2021-03-29 00:00:00', 'mic tidak berfungsi', 'mic rusak', 'Assigned', 5, '2021-03-29 12:12:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 05:12:57', '2021-03-29 05:12:57'),
(15, '8/2021', 2, 1, 1, '2021-03-29 00:00:00', 'Tidak ada koneksi', 'Kabel putus', 'Assigned', 5, '2021-03-29 12:14:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 05:14:45', '2021-03-29 05:14:45'),
(16, '9/2021', 2, 2, 1, '2021-03-29 00:00:00', 'Tidak ada suara', 'speaker rusak', 'Assigned', 5, '2021-03-29 12:15:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 05:15:59', '2021-03-29 05:15:59'),
(17, '10/2021', 3, 2, 1, '2021-03-29 00:00:00', 'kabel putus', 'Digigit tikus', 'Assigned', 5, '2021-03-29 12:35:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 05:35:22', '2021-03-29 05:35:22'),
(18, '11/2021', 3, 2, 1, '2021-03-29 00:00:00', 'kabel putus', 'Digigit tikus', 'Assigned', 5, '2021-03-29 12:35:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 05:35:41', '2021-03-29 05:35:41'),
(19, '12/2021', 3, 1, 1, '2021-03-29 00:00:00', 'kabel putus', 'digigit tikus', 'Assigned', 5, '2021-03-29 12:37:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 05:37:45', '2021-03-29 05:37:45'),
(20, '13/2021', 2, 1, 1, '2021-03-29 00:00:00', 'Kabel kurang', 'kabel kurang', 'Assigned', 5, '2021-03-29 12:40:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 05:40:03', '2021-03-29 05:40:03'),
(21, '14/2021', 2, 1, 1, '2021-03-29 00:00:00', 'kabel putus', 'dfasdsd', 'Assigned', 5, '2021-03-29 12:41:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 05:41:34', '2021-03-29 05:41:34'),
(22, '15/2021', 3, 2, 1, '2021-03-29 00:00:00', 'Video tidak ada gambar', 'asasa', 'Assigned', 5, '2021-03-29 12:42:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 05:42:23', '2021-03-29 05:42:23'),
(23, '16/2021', 2, 1, 1, '2021-03-29 00:00:00', 'kabel putus', 'jjjjj', 'Assigned', 5, '2021-03-29 12:43:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 05:43:35', '2021-03-29 05:43:35'),
(24, '17/2021', 2, 1, 1, '2021-03-29 00:00:00', 'kabel putus', 'jjjjj', 'Assigned', 5, '2021-03-29 12:44:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 05:44:27', '2021-03-29 05:44:27'),
(25, '18/2021', 2, 1, 1, '2021-03-29 00:00:00', 'kabel putus', 'jjjjj', 'Assigned', 5, '2021-03-29 12:44:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 05:44:57', '2021-03-29 05:44:57'),
(26, '19/2021', 2, 2, 1, '2021-03-29 00:00:00', 'Video tidak ada gambar', 'kokokoko', 'Assigned', 5, '2021-03-29 12:46:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 05:46:15', '2021-03-29 05:46:15'),
(27, '20/2021', 2, 1, 1, '2021-03-29 00:00:00', 'Tidak ada suara', 'asasa', 'Assigned', 5, '2021-03-29 12:48:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 05:48:46', '2021-03-29 05:48:46'),
(28, '21/2021', 2, 2, 1, '2021-03-29 00:00:00', 'Kabel kurang', 'kabel dicuri', 'Assigned', 5, '2021-03-29 12:58:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 05:58:14', '2021-03-29 05:58:14'),
(29, '22/2021', 3, 2, 1, '2021-03-29 00:00:00', 'Tidak ada suara', 'sdsds', 'Assigned', 5, '2021-03-29 13:02:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 06:02:03', '2021-03-29 06:02:03'),
(30, '23/2021', 2, 2, 1, '2021-03-29 00:00:00', 'kabel putus', 'sdsd', 'Assigned', 5, '2021-03-29 13:03:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 06:03:10', '2021-03-29 06:03:10'),
(31, '24/2021', 2, 1, 1, '2021-03-29 00:00:00', 'Tidak ada koneksi', 'asas', 'Assigned', 5, '2021-03-29 13:04:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 06:04:00', '2021-03-29 06:04:00'),
(32, '25/2021', 2, 1, 1, '2021-03-29 00:00:00', 'Tidak ada suara', 'sdasad', 'Assigned', 5, '2021-03-29 13:05:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 06:05:13', '2021-03-29 06:05:13'),
(33, '26/2021', 3, 1, 1, '2021-03-29 00:00:00', 'Tidak ada suara', 'dfsfsdfs', 'Assigned', 5, '2021-03-29 13:30:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 06:30:19', '2021-03-29 06:30:19'),
(34, '27/2021', 1, 2, 1, '2021-03-29 00:00:00', 'Tidak ada suara', 'sdsdsd', 'Assigned', 5, '2021-03-29 13:35:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 06:35:59', '2021-03-29 06:35:59'),
(35, '28/2021', 2, 2, 1, '2021-03-29 00:00:00', 'Video tidak ada gambar', 'sdasda', 'Assigned', 5, '2021-03-29 13:44:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 06:44:46', '2021-03-29 06:44:46'),
(36, '29/2021', 3, 2, 1, '2021-03-29 00:00:00', 'Video tidak ada gambar', 'sdasda', 'Assigned', 5, '2021-03-29 13:45:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 06:45:08', '2021-04-08 06:13:55'),
(39, '31/2021', 2, 1, 1, '2021-04-13 00:00:00', 'kabel putus', 'sdadas', 'Closed', 5, '2021-04-13 15:21:39', NULL, NULL, 'sdasa', NULL, NULL, NULL, NULL, '2021-04-13 08:21:39', '2021-04-13 15:50:57'),
(40, '32/2021', 2, 1, 1, '2021-04-13 00:00:00', 'Video tidak ada gambar', 'asas', 'Assigned', 5, '2021-04-13 15:28:37', NULL, NULL, 'blalala', NULL, NULL, NULL, NULL, '2021-04-13 08:28:37', '2021-04-16 03:41:16'),
(41, '32/2021', 2, 1, 1, '2021-04-15 00:00:00', 'Tidak ada suara', 'asasa', 'Closed', 4, '2021-04-15 12:52:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-15 05:52:47', '2021-04-15 06:28:04'),
(42, '33/2021', 3, 1, 1, '2021-04-16 16:42:00', 'Koneksi Lambat', 'sdasd', 'Assigned', 5, '2021-04-16 09:43:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-16 02:43:01', '2021-04-16 02:43:01'),
(43, '34/2021', 3, 1, 1, '2021-04-16 16:42:00', 'Koneksi Lambat', 'sdasd', 'Assigned', 5, '2021-04-16 09:44:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-16 02:44:48', '2021-04-16 02:44:48'),
(44, '35/2021', 3, 1, 1, '2021-04-16 16:42:00', 'Koneksi Lambat', 'sdasd', 'Assigned', 5, '2021-04-16 09:45:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-16 02:45:19', '2021-04-16 02:45:19'),
(45, '36/2021', 2, 2, 1, '2021-04-16 16:45:00', 'Kabel kurang', 'iojoijoi', 'Assigned', 5, '2021-04-16 09:46:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-16 02:46:12', '2021-04-16 02:46:12'),
(49, '37/2021', 1, 1, 1, '2021-04-17 14:55:00', 'Tidak ada suara', 'asas', 'Assigned', 5, '2021-04-17 07:55:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-17 00:55:40', '2021-04-17 00:55:40'),
(50, '38/2021', 1, 1, 1, '2021-04-17 15:09:00', 'Kabel kurang', 'asas', 'Assigned', 5, '2021-04-17 08:10:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-17 01:10:05', '2021-04-17 01:10:05'),
(51, '39/2021', 1, 1, 1, '2021-04-17 15:12:00', 'Tidak ada suara', 'asas', 'Assigned', 5, '2021-04-17 08:12:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-17 01:12:59', '2021-04-17 01:12:59'),
(52, '40/2021', 1, 1, 1, '2021-04-17 15:20:00', 'Tidak ada suara', 'asas', 'Assigned', 5, '2021-04-17 08:21:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-17 01:21:01', '2021-04-17 01:21:01'),
(53, '41/2021', 1, 1, 1, '2021-04-17 15:25:00', 'Video tidak ada gambar', 'asasa', 'Assigned', 5, '2021-04-17 08:25:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-17 01:25:46', '2021-04-17 01:25:46');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$JJaLK7OAN3tLkdSRH0enQOxW3IB3SoRtJ0apq/7OadeZKci5EAaLO', NULL, '2021-03-03 09:43:36', '2021-03-03 09:43:36'),
(3, 'Jono', 'jono@gmail.com', NULL, '$2y$10$UGJ4zVb87OrUmaD2JLx0S.XTpGJ.RQBr85Z6AGJHidM/SDpMujPYa', NULL, '2021-03-14 08:58:12', '2021-03-14 08:58:12'),
(4, 'Joni', 'joni@gmail.com', NULL, '$2y$10$T/W1NrGskonBiQ01mNpnre/PwE95L/R890RFjacsl35XE5ul/.bmK', NULL, '2021-03-14 08:58:39', '2021-03-14 08:58:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `log_emails`
--
ALTER TABLE `log_emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_emails_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `log_users`
--
ALTER TABLE `log_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_users_user_id_foreign` (`user_id`);

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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_customer_id_foreign` (`customer_id`);

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
-- Indexes for table `slas`
--
ALTER TABLE `slas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_sla_id_foreign` (`sla_id`),
  ADD KEY `tickets_customer_id_foreign` (`customer_id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_emails`
--
ALTER TABLE `log_emails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_users`
--
ALTER TABLE `log_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slas`
--
ALTER TABLE `slas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_emails`
--
ALTER TABLE `log_emails`
  ADD CONSTRAINT `log_emails_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`);

--
-- Constraints for table `log_users`
--
ALTER TABLE `log_users`
  ADD CONSTRAINT `log_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `tickets_sla_id_foreign` FOREIGN KEY (`sla_id`) REFERENCES `slas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
