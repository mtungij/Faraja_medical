-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 09:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faraja_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `user_id`, `receiver_id`, `date`, `desc`, `created_at`, `updated_at`) VALUES
(1, 37, 4, 2, '2024-01-04 00:00:00', '<p>dd</p>', NULL, NULL),
(2, 37, 4, 5, '2024-01-31 00:00:00', '<p>atapimwa malaria</p>', '2024-01-31 17:35:14', '2024-01-31 17:35:14'),
(3, 37, 4, 4, '2024-02-03 00:00:00', '<p>kesho</p>', '2024-01-31 17:36:46', '2024-01-31 17:36:46'),
(4, 36, 4, 3, '2024-02-01 00:00:00', '<p>helll</p>', '2024-01-31 17:51:01', '2024-01-31 17:51:01'),
(5, 37, 4, 3, '2024-02-10 00:00:00', '<p>kk</p>', '2024-01-31 18:08:21', '2024-01-31 18:08:21'),
(6, 36, 4, 4, '2024-01-05 00:00:00', '<ul><li><strong>Unified</strong>: All of the sentences in a single paragraph should be related to a single controlling idea (often expressed in the topic sentence of the paragraph).</li><li><strong>Clearly related to the thesis</strong>: The sentences sho', '2024-01-31 18:24:01', '2024-01-31 18:24:01'),
(7, 37, 4, 2, '2024-01-05 00:00:00', '<ul><li><strong>Unified</strong>: All of the sentences in a single paragraph should be related to a single controlling idea (often expressed in the topic sentence of the paragraph).</li><li><strong>Clearly related to the thesis</strong>: The sentences sho', '2024-01-31 18:24:56', '2024-01-31 18:24:56'),
(8, 37, 4, 3, '2024-02-10 00:00:00', '<ul><li><strong>Unified</strong>: All of the sentences in a single paragraph should be related to a single controlling idea (often expressed in the topic sentence of the paragraph).</li><li><strong>Clearly related to the thesis</strong>: The sentences sho', '2024-01-31 18:25:27', '2024-01-31 18:25:27'),
(9, 38, 4, 4, '2024-02-08 00:00:00', '<p>klk</p>', '2024-02-03 04:27:42', '2024-02-03 04:27:42'),
(10, 38, 4, 3, '2024-02-03 00:00:00', '<p>bbb</p>', '2024-02-03 04:28:56', '2024-02-03 04:28:56'),
(11, 37, 4, 3, '2024-02-02 00:00:00', '<p>jjh</p>', '2024-02-03 04:53:34', '2024-02-03 04:53:34'),
(12, 39, 4, 3, '2024-02-20 00:00:00', '<p>hh</p>', '2024-02-04 19:13:35', '2024-02-04 19:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'james', '0712345678', NULL, NULL),
(2, 'com', '1234', NULL, NULL),
(3, 'KISESA', '5000', NULL, NULL),
(4, 'Stool', '1500', NULL, NULL),
(5, 'Blood ', '1200', NULL, NULL),
(6, 'TAIFA STARS', '8000', NULL, NULL),
(7, 'TUKUYU', '2000', NULL, NULL),
(8, 'Stool', '500', NULL, NULL),
(9, 'CASHh', '099000', NULL, NULL),
(10, 'MALARIA', '800', NULL, NULL),
(11, 'jjjh', '900', '2024-01-26 04:21:23', '2024-01-26 04:21:23'),
(12, 'kilima', '500', '2024-01-26 04:22:18', '2024-01-26 04:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnoses`
--

INSERT INTO `diagnoses` (`id`, `desc`, `user_id`, `patient_id`, `created_at`, `updated_at`) VALUES
(1, 'cc', 4, 26, NULL, NULL),
(2, '<p><span style=\"color: rgb(55, 65, 81);\">CodeIgniter 4 (CI4) is a modern PHP framework that follows the MVC (Model-View-Controller) architectural pattern. If you want to fetch weekly data from your database using CodeIgniter 4, you can use the Query Builder class provided by the framework.</span></p>', 4, 37, NULL, NULL),
(3, '<p><span style=\"color: rgb(55, 65, 81);\">CodeIgniter 4 (CI4) is a modern PHP framework that follows the MVC (Model-View-Controller) architectural pattern. If you want to fetch weekly data from your database using CodeIgniter 4, you can use the Query Builder class provided by the framework.</span></p>', 4, 37, NULL, NULL),
(4, '<p><span style=\"color: rgb(55, 65, 81);\">CodeIgniter 4 (CI4) is a modern PHP framework that follows the MVC (Model-View-Controller) ark.</span></p>', 4, 37, NULL, NULL),
(5, '<ol><li>ff</li><li>hhh</li><li>hhhh</li></ol><ul><li>hhhhh</li></ul>', 4, 37, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `buy_price` varchar(255) NOT NULL,
  `sell_price` varchar(255) NOT NULL,
  `stock_limit` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `name`, `unit`, `quantity`, `buy_price`, `sell_price`, `stock_limit`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Jerome Farrell', 'Numquam ut in velit', '547', '721', '588', '60', 4, '2024-01-30 19:34:31', '2024-01-30 19:34:31'),
(3, 'PARACETAMOL', 'SYRUP', '1', '1000', '1500', '3', 4, '2024-01-30 20:19:41', '2024-02-04 16:26:03'),
(4, 'PANADOL', 'tabs', '10', '1000', '1200', '5', 4, '2024-01-31 04:12:28', '2024-02-04 16:32:49'),
(5, 'AZUMA', 'tab', '98', '1200', '1500', '20', 4, '2024-01-31 14:37:26', '2024-02-02 18:18:32'),
(7, 'demo', 'pc', '6', '100', '500', '3', 4, '2024-02-02 18:24:29', '2024-02-02 18:27:03');

-- --------------------------------------------------------

--
-- Table structure for table `durations`
--

CREATE TABLE `durations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc` varchar(255) NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examinations`
--

CREATE TABLE `examinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examinations`
--

INSERT INTO `examinations` (`id`, `desc`, `user_id`, `patient_id`, `created_at`, `updated_at`) VALUES
(1, 'ddd', 4, 26, '2024-01-23 19:56:09', '2024-01-23 19:56:09'),
(2, 'bb', 4, 29, '2024-01-23 22:45:42', '2024-01-23 22:45:42'),
(3, '<p><span style=\"color: rgb(55, 65, 81);\">CodeIgniter 4 (CI4) is a modern PHP framework that follows the MVC (Model-View-Controller) architectural pattern. If you want to fetch weekly data from your database using CodeIgniter 4, you can use the Query Builder class provided by the framework.</span></p>', 4, 37, '2024-02-01 01:31:47', '2024-02-01 01:31:47'),
(4, '<p><span style=\"color: rgb(55, 65, 81);\">CodeIgniter 4 (CI4) is a modern PHP framework that follows the MVC (Model-View-Controller) architectural pattern. If you want to </span></p><ol><li><span style=\"color: rgb(55, 65, 81);\">fetch weekly data from your database using CodeIgniter 4, you can use the Query Builder</span></li><li><span style=\"color: rgb(55, 65, 81);\"><span class=\"ql-cursor\">﻿</span> class provided by the framework.</span></li></ol>', 4, 37, '2024-02-01 01:32:20', '2024-02-01 01:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_items`
--

CREATE TABLE `expense_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_histories`
--

CREATE TABLE `family_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `family_histories`
--

INSERT INTO `family_histories` (`id`, `desc`, `user_id`, `patient_id`, `created_at`, `updated_at`) VALUES
(1, 'ee', 4, 26, '2024-01-23 19:38:01', '2024-01-23 19:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `frequencies`
--

CREATE TABLE `frequencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc` varchar(255) NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_examinations`
--

CREATE TABLE `general_examinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc` varchar(255) NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gynocological_histories`
--

CREATE TABLE `gynocological_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc` varchar(255) NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `healths`
--

CREATE TABLE `healths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `investigatigations`
--

CREATE TABLE `investigatigations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('P','D') NOT NULL DEFAULT 'P',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `result` text DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `surgicals` varchar(255) DEFAULT NULL,
  `categories` varchar(255) DEFAULT NULL,
  `replied_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investigatigations`
--

INSERT INTO `investigatigations` (`id`, `patient_id`, `user_id`, `status`, `created_at`, `updated_at`, `result`, `comment`, `surgicals`, `categories`, `replied_by`) VALUES
(1, 37, 4, 'P', '2024-02-01 01:58:03', '2024-02-01 01:58:03', NULL, '<p><span style=\"color: rgb(55, 65, 81);\">CodeIgniter 4 (CI4) is a modern PHP framework that follows the MVC (Model-View-Controller) architectural pattern. If you want to fetch weekly data from your database using CodeIgniter 4, you can use the Query Builder class provided by the framework.</span></p>', 'N;', 'N;', NULL),
(2, 37, 4, 'P', '2024-02-01 01:58:19', '2024-02-01 01:58:19', NULL, '<p><span style=\"color: rgb(55, 65, 81);\">CodeIgniter 4 (CI4) is a modern PHP framework that follows the MVC (Model-View-Controller) architectural pattern. If you want to fetch weekly data from your database using CodeIgniter 4, you can use the Query Builder class provided by the framework.</span></p>', 'N;', 'N;', NULL),
(3, 37, 4, 'P', '2024-02-01 01:58:47', '2024-02-01 01:58:47', NULL, '<p>hh</p>', 'N;', 'a:1:{i:0;s:1:\"1\";}', NULL),
(4, 37, 4, 'P', '2024-02-01 01:59:13', '2024-02-01 01:59:51', '<p>okay fine</p>', '<p>haloooo</p>', 'a:1:{i:0;s:1:\"1\";}', 'N;', 4),
(5, 36, 4, 'P', '2024-02-01 08:39:53', '2024-02-01 08:39:53', NULL, '<p>jjj</p>', 'N;', 'a:1:{i:0;s:1:\"1\";}', NULL),
(6, 39, 4, 'P', '2024-02-04 01:33:06', '2024-02-04 01:33:06', NULL, '', 'N;', 'a:1:{i:0;s:1:\"4\";}', NULL),
(7, 22, 4, 'P', '2024-02-04 19:30:17', '2024-02-04 19:30:17', NULL, '<p>mpe malaria</p>', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:1:\"4\";}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `investigatigation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sale_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `patient_id`, `investigatigation_id`, `sale_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 36, 5, 13, '2024-02-01 08:39:53', '2024-02-02 18:27:03', 'pending'),
(2, 37, NULL, 10, '2024-02-01 16:23:43', '2024-02-02 18:17:18', 'pending'),
(3, 34, NULL, 12, '2024-02-01 16:32:33', '2024-02-02 18:25:49', 'pending'),
(4, 1, NULL, 5, '2024-02-01 20:29:34', '2024-02-01 20:29:34', 'pending'),
(5, 2, NULL, 6, '2024-02-01 20:30:18', '2024-02-01 20:30:18', 'pending'),
(6, 3, NULL, 7, '2024-02-01 20:31:09', '2024-02-01 20:31:09', 'pending'),
(7, 38, NULL, 9, '2024-02-02 18:14:56', '2024-02-02 18:14:56', 'pending'),
(8, 39, 6, NULL, '2024-02-04 01:33:06', '2024-02-04 01:33:06', 'pending'),
(9, 22, 7, NULL, '2024-02-04 19:30:17', '2024-02-04 19:30:17', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `main_complaints`
--

CREATE TABLE `main_complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc` text NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_complaints`
--

INSERT INTO `main_complaints` (`id`, `desc`, `patient_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'vv', 30, 4, '2024-01-23 08:29:00', '2024-01-23 08:29:00'),
(2, 'ana kifua kinabana sana', 27, 4, '2024-01-23 08:31:19', '2024-01-23 08:31:19'),
(3, '<p><em style=\"color: rgb(29, 42, 87);\">My&nbsp;main&nbsp;complaint&nbsp;is that there is no final synthesizing chapter that brings together the previous chapters.</em></p>', 31, 4, '2024-01-30 02:03:23', '2024-01-30 02:03:23'),
(4, '<p>hello</p>', 31, 4, '2024-01-30 02:04:32', '2024-01-30 02:04:32'),
(5, '<p><em style=\"color: rgb(29, 42, 87);\">My&nbsp;main&nbsp;complaint&nbsp;is that there is no final synthesizing chapter that brings together the previous chapters.</em></p>', 31, 4, '2024-01-30 02:04:46', '2024-01-30 02:04:46'),
(6, '<p><span style=\"color: rgb(55, 65, 81);\">In this modification, I added a \"Submit Picture\" button after the \"Change Picture\" button. Please make sure to handle the click event of the \"Submit Picture\" button in your JavaScript to trigger the necessary actions (e.g., submitting the form, uploading the picture, etc.).</span></p>', 32, 4, '2024-01-30 14:40:49', '2024-01-30 14:40:49'),
(7, '<p><span style=\"color: rgb(55, 65, 81);\">In this modification, I added a \"Submit Picture\" button after the \"Change Picture\" button. Please make sure to handle the click event of the \"Submit Picture\" button in your JavaScript to trigger the necessary actions (e.g., submitting the form, uploading the picture, etc.).</span></p>', 32, 4, '2024-01-30 15:11:03', '2024-01-30 15:11:03'),
(8, '<p><span style=\"color: rgb(55, 65, 81);\">In this modification, I added a \"Submit Picture\" button after the \"Change Picture\" button. Please make sure to handle the click event of the \"Submit Picture\" button in your JavaScript to trigger the necessary actions (e.g., submittin</span></p>', 32, 4, '2024-01-30 15:11:43', '2024-01-30 15:11:43'),
(9, '<p><span style=\"color: rgb(55, 65, 81);\">In this modification, I added a \"Submit Picture\" button after the \"Change Picture\" button. Please make sure to handle the click event of the \"Submit Picture\" button in your JavaScript to trigger the necessary actions (e.g., submitting the form, uploading the picture, etc.).</span></p>', 32, 4, '2024-01-30 15:12:01', '2024-01-30 15:12:01'),
(10, '<p><span style=\"color: rgb(43, 43, 43);\">No matter your horoscope sign, the stars and planets are aligning so that 2024 will bring opportunities to all in the workplace… but, of course, each sign has its positive signs and obstacles to navigate. At the same time, larger economic tides will also be influential in the year ahead.</span></p>', 32, 4, '2024-01-30 15:13:02', '2024-01-30 15:13:02'),
(11, '<p><span style=\"color: rgb(77, 81, 86);\">Jamhuri&nbsp;</span><strong style=\"color: rgb(95, 99, 104);\">ya</strong><span style=\"color: rgb(77, 81, 86);\">&nbsp;Muungano&nbsp;</span><strong style=\"color: rgb(95, 99, 104);\">wa Tanzania</strong><span style=\"color: rgb(77, 81, 86);\">&nbsp;iliundwa Aprili 26, 1964 ikiwa ni. Muungano&nbsp;</span><strong style=\"color: rgb(95, 99, 104);\">wa</strong><span style=\"color: rgb(77, 81, 86);\">&nbsp;Mataifa mawili huru&nbsp;</span><strong style=\"color: rgb(95, 99, 104);\">ya</strong><span style=\"color: rgb(77, 81, 86);\">&nbsp;Jamhuri yaTanganyika na Jamhuri&nbsp;</span><strong style=\"color: rgb(95, 99, 104);\">ya</strong><span style=\"color: rgb(77, 81, 86);\">&nbsp;Watu&nbsp;</span><strong style=\"color: rgb(95, 99, 104);\">wa</strong><span style=\"color: rgb(77, 81, 86);\">&nbsp;Zanzibar ambayo&nbsp;...</span></p>', 32, 4, '2024-01-30 15:14:39', '2024-01-30 15:14:39'),
(12, '<p><span style=\"color: rgb(32, 33, 34);\">Jina \"Tanganyika\" linatokana na maneno ya&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Kiswahili\" target=\"_blank\" style=\"color: rgb(51, 102, 204);\">Kiswahili</a><span style=\"color: rgb(32, 33, 34);\">&nbsp;tanga (kwa&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Kiingereza\" target=\"_blank\" style=\"color: rgb(51, 102, 204);\">kiingereza</a><span style=\"color: rgb(32, 33, 34);\">&nbsp;\"</span><em style=\"color: rgb(32, 33, 34);\">sail</em><span style=\"color: rgb(32, 33, 34);\">\") na nyika (kwa&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Kiingereza\" target=\"_blank\" style=\"color: rgb(51, 102, 204);\">kiingereza</a><span style=\"color: rgb(32, 33, 34);\">&nbsp;\"</span><em style=\"color: rgb(32, 33, 34);\">uninhabited plain\", \"wilderness</em><span style=\"color: rgb(32, 33, 34);\">\"), yakiunda msemo \"tanga nyikani\". Wakati fulani inaelezwa kama marejeleo ya Ziwa Tanganyika.&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Tanzania#cite_note-6\" target=\"_blank\" style=\"color: rgb(51, 102, 204); background-color: initial;\"><sup>[6]</sup></a><span style=\"color: rgb(32, 33, 34);\">&nbsp;Jina la Zanzibar linatokana na \"</span><a href=\"https://sw.wikipedia.org/w/index.php?title=Zenji&amp;action=edit&amp;redlink=1\" target=\"_blank\" style=\"color: rgb(215, 51, 51);\">zenji</a><span style=\"color: rgb(32, 33, 34);\">\", jina la watu wa eneo hilo (inadaiwa lina maana ya \"nyeusi\"), na neno la Kiarabu \"barr\", ambalo linamaanisha pwani au ufukwe.&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Tanzania#cite_note-7\" target=\"_blank\" style=\"color: rgb(51, 102, 204); background-color: initial;\"><sup>[</sup></a></p>', 32, 4, '2024-01-30 15:15:21', '2024-01-30 15:15:21'),
(13, '<h1>15 French tip almond nails ideas that are worth trying out</h1><p><br></p>', 37, 4, '2024-02-01 01:24:42', '2024-02-01 01:24:42'),
(14, '<p><span style=\"color: rgb(55, 65, 81);\">CodeIgniter 4 (CI4) is a modern PHP framework that follows the MVC (Model-View-Controller) architectural pattern. If you want to fetch weekly data from your database using CodeIgniter 4, you can use the Query Builder class provided by the framework.</span></p>', 37, 4, '2024-02-01 01:27:51', '2024-02-01 01:27:51');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_01_16_151540_create_patients_table', 2),
(5, '2024_01_16_151600_create_settings_table', 2),
(6, '2024_01_16_151618_create_payments_table', 2),
(7, '2024_01_16_151640_create_expenses_table', 2),
(8, '2024_01_16_151709_create_categories_table', 2),
(9, '2024_01_16_151728_create_sub_categories_table', 2),
(10, '2024_01_16_152808_create_expense_items_table', 2),
(11, '2024_01_16_153645_create_appointments_table', 2),
(12, '2024_01_16_154212_create_durations_table', 2),
(13, '2024_01_16_154302_create_frequencies_table', 2),
(14, '2024_01_16_154341_create_general_examinations_table', 2),
(15, '2024_01_16_154407_create_gynocological_histories_table', 2),
(16, '2024_01_16_154433_create_investigatigations_table', 2),
(17, '2024_01_16_154450_create_main_complaints_table', 2),
(18, '2024_01_16_154517_create_past_medicals_table', 2),
(19, '2024_01_16_154536_create_patient_histories_table', 2),
(20, '2024_01_16_154547_create_services_table', 2),
(21, '2024_01_16_154611_create_reviews_table', 2),
(22, '2024_01_16_154700_create_surgicals_table', 2),
(23, '2024_01_16_154736_create_transfers_table', 2),
(24, '2024_01_16_154747_create_vital_signs_table', 2),
(25, '2024_01_19_162723_add_patient_info_to_patient_table', 3),
(26, '2024_01_20_085035_add_age_info_to_patient_table', 4),
(27, '2024_01_20_181154_add_status_to_users_table', 4),
(28, '2024_01_22_201919_create_healths_table', 5),
(29, '2024_01_23_095158_create_family_histories_table', 6),
(30, '2024_01_23_095926_create_examinations_table', 7),
(31, '2024_01_23_100442_create_diagnoses_table', 8),
(32, '2024_01_29_145458_add_text_input_to_main_complaints_table', 9),
(33, '2024_01_29_164941_add_textarea_to_diagnoses_table', 9),
(34, '2024_01_29_165146_add_textarea_to_examinations_table', 9),
(35, '2024_01_29_165329_add_textarea_to_family_histories_table', 9),
(36, '2024_01_29_165454_add_textarea_to_past_medicals_table', 9),
(37, '2024_01_29_165623_add_textarea_to_reviews_table', 9),
(38, '2024_01_30_090301_create_drugs_table', 10),
(39, '2024_01_30_121515_dropcontainer_column_to_drugs_table', 11),
(40, '2024_01_30_131916_add_fields_to_investigations_table', 12),
(41, '2024_01_30_132646_drop_sub_category_to_investigatigations_table', 12),
(42, '2024_01_30_133741_add_comment_column_to_investigatigations_table', 12),
(43, '2024_01_30_152144_add_surgicals_column_to_investigatigations_table', 12),
(44, '2024_01_30_152715_drop_category_id_column_to_investigatigations_table', 12),
(45, '2024_01_31_082807_add_replied_by_column_to_investigatigation_table', 13),
(46, '2024_01_31_132507_create_treatments_table', 13),
(47, '2024_01_31_224357_create_sales_table', 14),
(48, '2024_01_31_224527_create_sale_items_table', 14),
(49, '2024_01_31_224921_create_invoices_table', 14),
(50, '2024_02_02_070341_add_status_to_invoice_table', 15),
(51, '2024_02_03_044105_add_status_column_to_transfers_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `past_medicals`
--

CREATE TABLE `past_medicals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc` text NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `past_medicals`
--

INSERT INTO `past_medicals` (`id`, `desc`, `patient_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'ee', 26, 4, '2024-01-23 19:00:56', '2024-01-23 19:00:56'),
(2, 'ff', 26, 4, '2024-01-23 19:20:27', '2024-01-23 19:20:27'),
(3, ' halotel', 26, 4, '2024-01-23 19:22:38', '2024-01-23 19:22:38'),
(4, 'mambo', 26, 4, '2024-01-23 19:26:54', '2024-01-23 19:26:54'),
(5, 'dd', 26, 4, '2024-01-23 19:27:08', '2024-01-23 19:27:08'),
(6, 'rr', 26, 4, '2024-01-23 19:29:17', '2024-01-23 19:29:17'),
(7, '  e', 26, 4, '2024-01-23 19:33:11', '2024-01-23 19:33:11'),
(8, 'bb', 26, 4, '2024-01-23 19:34:53', '2024-01-23 19:34:53'),
(9, '<p><span style=\"color: rgb(105, 105, 105);\">By clicking “Accept All Cookies”, you agree to the storing of cookies on your device to enhance site navigation, analyze site usage, and assist in our marketing efforts</span></p>', 30, 4, '2024-01-30 04:02:27', '2024-01-30 04:02:27'),
(10, '<p>hello</p>', 30, 4, '2024-01-30 04:05:21', '2024-01-30 04:05:21'),
(11, '<p>hh</p>', 30, 4, '2024-01-30 04:06:22', '2024-01-30 04:06:22'),
(12, '<p><em style=\"color: rgb(29, 42, 87);\">The&nbsp;main&nbsp;complaint&nbsp;was of spelling mistakes.</em></p>', 30, 4, '2024-01-30 04:25:46', '2024-01-30 04:25:46'),
(13, '<p><em style=\"color: rgb(29, 42, 87);\">The&nbsp;main&nbsp;complaint&nbsp;was of spelling mistakes.</em></p>', 30, 4, '2024-01-30 04:26:30', '2024-01-30 04:26:30'),
(14, '<p><span style=\"color: rgb(55, 65, 81);\">CodeIgniter 4 (CI4) is a modern PHP framework that follows the MVC (Model-View-Controller) architectural pattern. If you want to fetch weekly data from your database using CodeIgniter 4, you can use the Query Builder class provided by the framework.</span></p>', 37, 4, '2024-02-01 01:30:24', '2024-02-01 01:30:24'),
(15, '<p><span style=\"color: rgb(55, 65, 81);\">CodeIgniter 4 (CI4) is a modern PHP framework that follows the MVC (Model-View-Controller) architectural pattern. If you want to fetch weekly data from your database using CodeIgniter 4, you can use the Query Builder class provided by the framework.</span></p>', 37, 4, '2024-02-01 01:30:31', '2024-02-01 01:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `status` enum('PI','I') NOT NULL DEFAULT 'PI',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `illiness_status` enum('normal','emergency') NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `middle_name`, `last_name`, `phone`, `age`, `status`, `created_at`, `updated_at`, `gender`, `illiness_status`, `address`) VALUES
(1, 'JONSON', 'JAMES', 'JOSEPH', '0788877890', 23, 'PI', NULL, NULL, '', 'normal', ''),
(2, 'HAMIS', 'JUMA', 'JOHN', '0788878880', 30, 'PI', NULL, NULL, '', 'normal', ''),
(3, 'HAMIS', 'JUMA', 'JOHN', '0788878880', 8, 'PI', NULL, NULL, '', 'normal', ''),
(4, 'JOHN', 'MWANDUMBE', 'KAYUKI', '0712345678', 25, 'PI', NULL, NULL, '', 'normal', ''),
(5, 'AMINA ', 'YUSUPH', 'HAMISI', '078899989', 23, 'PI', NULL, NULL, '', 'normal', ''),
(6, 'JONSON', 'JAMES', 'JOSEPH', '0788877890', 18, 'PI', NULL, NULL, '', 'normal', ''),
(7, 'lulu', 'tito', 'majande', '0178888889', 25, 'PI', NULL, NULL, '', 'normal', ''),
(8, 'DSTV', 'MAMBO', 'POA', '0756778877', 45, 'PI', NULL, NULL, '', 'normal', ''),
(9, 'WINN', 'HEZRON', 'MWAKASEGE', '071234578', 20, 'PI', NULL, NULL, '', 'normal', ''),
(10, 'TABU', 'MAJUKO', 'JUJU', '071234578', 12, 'PI', NULL, NULL, '', 'normal', ''),
(11, 'ELIZA', 'MAJKO', 'ILOLI', '097197688', 20, 'PI', NULL, NULL, '', 'normal', ''),
(12, 'JULIETH', 'JAMES', 'JOSEPH', '07123456789', 6, 'PI', NULL, NULL, '', 'normal', ''),
(13, 'EMELDA', 'BEDA', 'MATHIAS', '0745667676', 18, 'PI', NULL, NULL, '', 'normal', ''),
(14, 'JONS', 'JAM', 'JOSE', '078887', 0, 'PI', NULL, NULL, 'KE', 'emergency', ''),
(15, 'ILOLU', 'IRINGA', 'MAKAMBAKO', '0781234567', 0, 'PI', '2024-01-20 01:10:45', '2024-01-20 01:10:45', 'ME', 'emergency', ''),
(16, 'JOHN', 'JAMES', 'JOSEPH', '0788877890', 0, 'PI', '2024-01-20 03:29:21', '2024-01-20 03:29:21', 'select gender', '', ''),
(17, 'HISENSE', 'DSTV', 'MAISHA', '071234567800', 0, 'PI', '2024-01-20 05:20:32', '2024-01-20 05:20:32', 'ME', 'normal', ''),
(18, 'AZAM', 'STARTIMES', 'DISH', '07128909090', 0, 'PI', '2024-01-20 05:22:14', '2024-01-20 05:22:14', 'ME', 'normal', ''),
(19, 'CLAUD', 'ENGLEBERT', 'CLAUD', '07123090909', 0, 'PI', '2024-01-20 05:27:00', '2024-01-20 05:27:00', 'select gender', '', ''),
(20, 'first', 'middle', 'last', '078998898', 0, 'PI', '2024-01-20 05:30:47', '2024-01-20 05:30:47', 'ME', 'normal', ''),
(21, 'haji', 'manara', 'waw', '07189880765', 0, 'PI', '2024-01-20 05:37:23', '2024-01-20 05:37:23', 'ME', 'normal', ''),
(22, 'JAMES', 'JOSEPH', 'MWAKALINGA', '07484738', 32, 'PI', '2024-01-20 05:52:32', '2024-02-04 19:26:54', 'male', 'emergency', 'KIBAHA'),
(23, 'samwel', 'damian', 'koeles', '0751190900', 0, 'PI', '2024-01-20 16:43:11', '2024-01-20 16:43:11', 'ME', 'emergency', ''),
(24, 'ilomba', 'mwambene', 'teku', '0712344567', 0, 'PI', '2024-01-21 00:46:24', '2024-01-21 00:46:24', 'ME', 'normal', ''),
(25, 'Chava', 'Raphael', 'Scarlett', '28', 12, 'PI', '2024-01-21 00:53:13', '2024-01-21 20:53:19', 'female', 'emergency', 'ccm'),
(26, 'Daniel', 'Neve', 'Vaughan', '07234567890', 309, 'PI', '2024-01-21 00:55:38', '2024-01-21 20:45:52', 'female', 'normal', 'kiwira'),
(27, 'MARY', 'PATRICK', 'JOHN', '0712390898', 23, 'PI', '2024-01-21 18:57:06', '2024-01-21 18:57:06', 'ME', 'normal', '78'),
(28, 'JUDITH', 'JOHN', 'LEONARD', '078676567', 23, 'PI', '2024-01-21 18:58:02', '2024-01-21 18:58:02', 'KE', 'normal', '56'),
(29, 'AMINA', 'YUSUPH', 'HAMISI', '1234', 23, 'PI', '2024-01-21 19:01:25', '2024-01-23 23:10:33', 'female', 'normal', 'Mbalizi'),
(30, 'Maria', 'Raphael', 'george', '0723458989', 32, 'PI', '2024-01-21 23:17:14', '2024-01-23 23:06:34', 'female', 'normal', 'mwambene'),
(31, 'John', 'James', 'Joram', '07123456789', 20, 'PI', '2024-01-23 23:04:45', '2024-01-23 23:04:45', 'male', 'emergency', 'Igawilo'),
(32, 'AQUINA', 'LINUS', 'MTWEVE', '078887889', 23, 'PI', '2024-01-24 00:32:43', '2024-01-29 17:06:04', 'female', 'emergency', 'ikolo'),
(33, 'DAVID', 'JONAS', 'DAUD', '07123456780', 23, 'PI', '2024-01-31 01:40:30', '2024-01-31 01:40:30', 'female', 'normal', 'UyOLE'),
(34, 'JONAS', 'GAMBO', 'HAMISI', '0712345090', 23, 'PI', '2024-01-31 02:47:04', '2024-01-31 02:47:04', 'female', 'emergency', 'mbalizi'),
(35, 'MARIAM', 'HAMIDA', 'KAIMU', '0789987790', 23, 'PI', '2024-01-31 03:46:33', '2024-01-31 03:46:33', 'male', 'emergency', 'kiloloo'),
(36, 'window', 'express', 'fast', '076887987', 69, 'PI', '2024-01-31 04:20:41', '2024-01-31 05:13:04', 'female', 'normal', 'juju'),
(37, 'Keiko', 'Rina', 'Bertha', '382', 929, 'PI', '2024-01-31 14:48:45', '2024-02-01 01:21:07', 'female', 'normal', '072347865'),
(38, 'KIKOMBE', 'HICHI', 'CHA BABU', '0712333988', 60, 'PI', '2024-02-01 16:27:27', '2024-02-01 16:27:27', 'female', 'emergency', 'tukuyu'),
(39, 'DANIEL', 'NGOME', 'JESUS', '0744503476', 32, 'PI', '2024-02-03 03:26:10', '2024-02-03 04:10:13', 'male', 'normal', 'Ilomba');

-- --------------------------------------------------------

--
-- Table structure for table `patient_histories`
--

CREATE TABLE `patient_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc` text NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_histories`
--

INSERT INTO `patient_histories` (`id`, `desc`, `patient_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'kifua kikuu', 27, 4, '2024-01-23 09:01:16', '2024-01-23 09:01:16'),
(2, 'bbb', 27, 4, '2024-01-23 09:22:32', '2024-01-23 09:22:32'),
(3, 'sss', 26, 4, '2024-01-23 20:44:49', '2024-01-23 20:44:49'),
(4, '<p><em style=\"color: rgb(29, 42, 87);\">However, &nbsp;main&nbsp;complaint&nbsp;was over qualification for the franchise which it clearly felt deprived the party of potential votes.</em></p>', 30, 4, '2024-01-30 02:33:05', '2024-01-30 02:33:05'),
(5, '<p><em style=\"color: rgb(29, 42, 87);\">However, labour\'s&nbsp;main&nbsp;complaint&nbsp;was over qualification for the franchise which it clearly felt deprived the party of potential votes.</em></p>', 30, 4, '2024-01-30 03:21:12', '2024-01-30 03:21:12'),
(6, '<p>chieaf complaints</p>', 30, 4, '2024-01-30 06:39:22', '2024-01-30 06:39:22'),
(7, '<p><span style=\"color: rgb(55, 65, 81);\">In this modification, I added a \"Submit Picture\" button after the \"Change Picture\" button. Please make sure to handle the click event of the \"Submit Picture\" button in your JavaScript to trigger the necessary actions (e.g., submitting the form, uploading the picture, etc.).</span></p>', 32, 4, '2024-01-30 14:41:37', '2024-01-30 14:41:37'),
(8, '<p><span style=\"color: rgb(55, 65, 81);\">In this modification, I added a \"Submit Picture\" button after the \"Change Picture\" button. Please make sure to handle the click event of the \"Submit Picture\" button in your JavaScript to trigger the necessary actions (e.g., submitting the form, uploading the picture, etc.).</span></p>', 32, 4, '2024-01-30 14:44:29', '2024-01-30 14:44:29'),
(9, '<h3><span style=\"color: rgb(55, 65, 81);\">In this modification, I added a \"Submit Picture\" button after the \"Change Picture\" button. Please make sure to handle the click event of the \"Submit Picture\" button in your JavaScript to trigger the necessary actions (e.g., submitting the form, uploading the picture, etc.).</span></h3><p><br></p>', 32, 4, '2024-01-30 14:59:01', '2024-01-30 14:59:01'),
(10, '<p><span style=\"color: rgb(55, 65, 81);\">In this modification, I added a \"Submit Picture\" button after the \"Change Picture\" button. Please make sure to handle the click event of the \"Submit Picture\" button in your JavaScript to trigger the necessary actions (e.g., submitting the form, uploading the picture, etc.).</span></p>', 32, 4, '2024-01-30 15:08:08', '2024-01-30 15:08:08'),
(11, '<p><span style=\"color: rgb(55, 65, 81);\">In this modification, I added a \"Submit Picture\" button after the \"Change Picture\" button. Please make sure to handle the click event of the \"Submit </span></p>', 32, 4, '2024-01-30 15:09:01', '2024-01-30 15:09:01'),
(12, '<p><span style=\"color: rgb(32, 33, 34);\">Jina \"Tanganyika\" linatokana na maneno ya&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Kiswahili\" target=\"_blank\" style=\"color: rgb(51, 102, 204);\">Kiswahili</a><span style=\"color: rgb(32, 33, 34);\">&nbsp;tanga (kwa&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Kiingereza\" target=\"_blank\" style=\"color: rgb(51, 102, 204);\">kiingereza</a><span style=\"color: rgb(32, 33, 34);\">&nbsp;\"</span><em style=\"color: rgb(32, 33, 34);\">sail</em><span style=\"color: rgb(32, 33, 34);\">\") na nyika (kwa&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Kiingereza\" target=\"_blank\" style=\"color: rgb(51, 102, 204);\">kiingereza</a><span style=\"color: rgb(32, 33, 34);\">&nbsp;\"</span><em style=\"color: rgb(32, 33, 34);\">uninhabited plain\", \"wilderness</em><span style=\"color: rgb(32, 33, 34);\">\"), yakiunda msemo \"tanga nyikani\". Wakati fulani inaelezwa kama marejeleo ya Ziwa Tanganyika.&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Tanzania#cite_note-6\" target=\"_blank\" style=\"color: rgb(51, 102, 204); background-color: initial;\"><sup>[6]</sup></a><span style=\"color: rgb(32, 33, 34);\">&nbsp;Jina la Zanzibar linatokana na \"</span><a href=\"https://sw.wikipedia.org/w/index.php?title=Zenji&amp;action=edit&amp;redlink=1\" target=\"_blank\" style=\"color: rgb(215, 51, 51);\">zenji</a><span style=\"color: rgb(32, 33, 34);\">\", jina la watu wa eneo hilo (inadaiwa lina maana ya \"nyeusi\"), na neno la Kiarabu \"barr\", ambalo linamaanisha pwani au ufukwe.&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Tanzania#cite_note-7\" target=\"_blank\" style=\"color: rgb(51, 102, 204); background-color: initial;\"><sup>[</sup></a></p>', 32, 4, '2024-01-30 15:15:41', '2024-01-30 15:15:41'),
(13, '<p><span style=\"color: rgb(32, 33, 34);\">Jina \"Tanganyika\" linatokana na maneno ya&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Kiswahili\" target=\"_blank\" style=\"color: rgb(51, 102, 204);\">Kiswahili</a><span style=\"color: rgb(32, 33, 34);\">&nbsp;tanga (kwa&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Kiingereza\" target=\"_blank\" style=\"color: rgb(51, 102, 204);\">kiingereza</a><span style=\"color: rgb(32, 33, 34);\">&nbsp;\"</span><em style=\"color: rgb(32, 33, 34);\">sail</em><span style=\"color: rgb(32, 33, 34);\">\") na nyika (kwa&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Kiingereza\" target=\"_blank\" style=\"color: rgb(51, 102, 204);\">kiingereza</a><span style=\"color: rgb(32, 33, 34);\">&nbsp;\"</span><em style=\"color: rgb(32, 33, 34);\">uninhabited plain\", \"wilderness</em><span style=\"color: rgb(32, 33, 34);\">\"), yakiunda msemo \"tanga nyikani\". Wakati fulani inaelezwa kama marejeleo ya Ziwa Tanganyika.&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Tanzania#cite_note-6\" target=\"_blank\" style=\"color: rgb(51, 102, 204); background-color: initial;\"><sup>[6]</sup></a><span style=\"color: rgb(32, 33, 34);\">&nbsp;Jina la Zanzibar linatokana na \"</span><a href=\"https://sw.wikipedia.org/w/index.php?title=Zenji&amp;action=edit&amp;redlink=1\" target=\"_blank\" style=\"color: rgb(215, 51, 51);\">zenji</a><span style=\"color: rgb(32, 33, 34);\">\", jina la watu wa eneo hilo </span></p>', 32, 4, '2024-01-30 15:29:36', '2024-01-30 15:29:36'),
(14, '<p><span style=\"color: rgb(32, 33, 34);\">Jina \"Tanganyika\" linatokana na maneno ya&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Kiswahili\" target=\"_blank\" style=\"color: rgb(51, 102, 204);\">Kiswahili</a><span style=\"color: rgb(32, 33, 34);\">&nbsp;tanga (kwa&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Kiingereza\" target=\"_blank\" style=\"color: rgb(51, 102, 204);\">kiingereza</a><span style=\"color: rgb(32, 33, 34);\">&nbsp;\"</span><em style=\"color: rgb(32, 33, 34);\">sail</em><span style=\"color: rgb(32, 33, 34);\">\") na nyika (kwa&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Kiingereza\" target=\"_blank\" style=\"color: rgb(51, 102, 204);\">kiingereza</a><span style=\"color: rgb(32, 33, 34);\">&nbsp;\"</span><em style=\"color: rgb(32, 33, 34);\">uninhabited plain\", \"wilderness</em><span style=\"color: rgb(32, 33, 34);\">\"), yakiunda msemo</span></p>', 32, 4, '2024-01-30 15:30:23', '2024-01-30 15:30:23'),
(15, '<p><span style=\"color: rgb(32, 33, 34);\">Jina \"Tanganyika\" linatokana na maneno ya&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Kiswahili\" target=\"_blank\" style=\"color: rgb(51, 102, 204);\">Kiswahili</a><span style=\"color: rgb(32, 33, 34);\">&nbsp;tanga (kwa&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Kiingereza\" target=\"_blank\" style=\"color: rgb(51, 102, 204);\">kiingereza</a><span style=\"color: rgb(32, 33, 34);\">&nbsp;\"</span><em style=\"color: rgb(32, 33, 34);\">sail</em><span style=\"color: rgb(32, 33, 34);\">\") na nyika (kwa&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Kiingereza\" target=\"_blank\" style=\"color: rgb(51, 102, 204);\">kiingereza</a><span style=\"color: rgb(32, 33, 34);\">&nbsp;\"</span><em style=\"color: rgb(32, 33, 34);\">uninhabited plain\", \"wilderness</em><span style=\"color: rgb(32, 33, 34);\">\"), yakiunda msemo \"tanga nyikani\". Wakati fulani inaelezwa kama marejeleo ya Ziwa Tanganyika.&nbsp;</span><a href=\"https://sw.wikipedia.org/wiki/Tanzania#cite_note-6\" target=\"_blank\" style=\"color: rgb(51, 102, 204); background-color: initial;\"><sup>[6]</sup></a><span style=\"color: rgb(32, 33, 34);\">&nbsp;Jina la Zanzibar linatokana na \"</span><a href=\"https://sw.wikipedia.org/w/index.php?title=Zenji&amp;action=edit&amp;redlink=1\" target=\"_blank\" style=\"color: rgb(215, 51, 51);\">zenji</a><span style=\"color: rgb(32, 33, 34);\">\", jina la watu wa eneo</span></p>', 32, 4, '2024-01-30 15:33:25', '2024-01-30 15:33:25'),
(16, '<p>hello</p>', 32, 4, '2024-01-30 15:41:19', '2024-01-30 15:41:19'),
(17, '<p><span style=\"color: rgb(55, 65, 81);\">CodeIgniter 4 (CI4) is a modern PHP framework that follows the MVC (Model-View-Controller) architectural pattern. If you want to fetch weekly data from your database using CodeIgniter 4, you can use the Query Builder class provided by the framework.</span></p>', 37, 4, '2024-02-01 01:29:48', '2024-02-01 01:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `number`, `created_at`, `updated_at`) VALUES
(1, 'm-pesa', '0712345678', NULL, NULL),
(2, 'safa', '12', '2024-01-17 07:50:19', '2024-01-17 07:50:19'),
(3, 'LIPA-MPESA', '0778888', '2024-01-17 14:00:58', '2024-01-17 14:00:58'),
(4, 'AIRTEL-MONEY', '0712345678', '2024-01-17 23:54:16', '2024-01-17 23:54:16'),
(5, 'LIPA-MPESA', '0756789', '2024-01-23 08:28:27', '2024-01-23 08:28:27'),
(6, 'M-PES', '1234566', '2024-01-24 13:48:49', '2024-01-24 13:48:49'),
(7, 'TIGO-PESA', '0000000', '2024-01-24 13:49:05', '2024-01-24 13:49:05'),
(8, 'AIRTEL-MONEY', '89898098', '2024-01-24 13:49:56', '2024-01-24 13:49:56'),
(9, 'CASH', '099000', '2024-01-25 11:03:11', '2024-01-25 11:03:11'),
(10, 'CASH', '01234567809', '2024-01-25 11:17:33', '2024-01-25 11:17:33');

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
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc` text NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `desc`, `patient_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'b', 27, 4, '2024-01-23 09:31:31', '2024-01-23 09:31:31'),
(2, '<p><em style=\"color: rgb(29, 42, 87);\">However,&nbsp;main&nbsp;complaint&nbsp;was over qualification for the franchise which it clearly felt deprived the party of potential votes.</em></p>', 30, 4, '2024-01-30 03:24:44', '2024-01-30 03:24:44'),
(3, '<p>&nbsp; &nbsp;<span style=\"color: rgb(224, 108, 117);\">$routes</span><span style=\"color: rgb(198, 120, 221);\">-&gt;</span><span style=\"color: rgb(97, 175, 239);\">get</span>(<span style=\"color: rgb(152, 195, 121);\">\'(:num)</span> <span style=\"color: rgb(198, 120, 221);\">class</span>, <span style=\"color: rgb(152, 195, 121);\">\'index\'</span>]</p>', 30, 4, '2024-01-30 03:25:12', '2024-01-30 03:25:12'),
(4, '<p><em style=\"color: rgb(29, 42, 87);\">The&nbsp;main&nbsp;complaint&nbsp;was of spelling mistakes.</em></p>', 30, 4, '2024-01-30 03:26:36', '2024-01-30 03:26:36'),
(5, '<p><em style=\"color: rgb(29, 42, 87);\">The&nbsp;main&nbsp;complaint&nbsp;was of spelling mistakes.</em></p>', 30, 4, '2024-01-30 03:28:34', '2024-01-30 03:28:34'),
(6, '<p><span style=\"color: rgb(55, 65, 81);\">CodeIgniter 4 (CI4) is a modern PHP framework that follows the MVC (Model-View-Controller) architectural pattern. If you want to fetch weekly data from your database using CodeIgniter 4, you can use the Query Builder class provided by the framework.</span></p>', 37, 4, '2024-02-01 01:30:08', '2024-02-01 01:30:08'),
(7, '<p><span style=\"color: rgb(55, 65, 81);\">CodeIgniter 4 (CI4) is a modern PHP framework that follows the MVC (Model-View-Controller) architectural pattern. If you want to fetch weekly data from your database using CodeIgniter 4, you can use the Query Builder class provided by the framework.</span></p>', 37, 4, '2024-02-01 01:31:24', '2024-02-01 01:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `patient_id`, `payment_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 36, 3, 4, '2024-02-03 16:21:10', '2024-02-01 16:21:10'),
(2, 37, 3, 4, '2024-02-01 16:23:43', '2024-02-01 16:23:43'),
(3, 34, 3, 4, '2024-02-01 16:32:33', '2024-02-01 16:32:33'),
(4, 34, 5, 4, '2024-02-01 16:33:17', '2024-02-01 16:33:17'),
(5, 1, 3, 4, '2024-02-01 20:29:34', '2024-02-01 20:29:34'),
(6, 2, 3, 4, '2024-02-01 20:30:18', '2024-02-01 20:30:18'),
(7, 3, 4, 4, '2024-02-01 20:31:09', '2024-02-01 20:31:09'),
(8, 37, 5, 4, '2024-02-02 15:15:08', '2024-02-02 15:15:08'),
(9, 38, 1, 4, '2024-02-02 18:14:56', '2024-02-02 18:14:56'),
(10, 37, 1, 4, '2024-02-02 18:17:18', '2024-02-02 18:17:18'),
(11, 36, 3, 4, '2024-02-02 18:18:32', '2024-02-02 18:18:32'),
(12, 34, 3, 4, '2024-02-02 18:25:49', '2024-02-02 18:25:49'),
(13, 36, 3, 4, '2024-02-02 18:27:03', '2024-02-02 18:27:03'),
(14, 1, 1, 4, '2024-02-04 16:26:03', '2024-02-04 16:26:03'),
(15, 1, 3, 4, '2024-02-04 16:32:49', '2024-02-04 16:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `drug_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `sale_id`, `drug_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 1500, '2024-02-03 16:21:10', '2024-02-01 16:21:10'),
(2, 2, 5, 1, 1500, '2024-02-01 16:23:43', '2024-02-01 16:23:43'),
(3, 3, 3, 1, 1500, '2024-02-01 16:32:33', '2024-02-01 16:32:33'),
(4, 5, 3, 1, 1500, '2024-02-01 20:29:34', '2024-02-01 20:29:34'),
(5, 6, 4, 6, 1200, '2024-02-01 20:30:18', '2024-02-01 20:30:18'),
(6, 7, 4, 2, 1200, '2024-02-01 20:31:09', '2024-02-01 20:31:09'),
(7, 8, 3, 3, 1500, '2024-02-02 15:15:08', '2024-02-02 15:15:08'),
(8, 8, 5, 1, 1500, '2024-02-02 15:15:08', '2024-02-02 15:15:08'),
(9, 9, 3, 4, 1500, '2024-02-03 18:14:56', '2024-02-02 18:14:56'),
(10, 10, 5, 10, 1500, '2024-02-02 18:17:18', '2024-02-02 18:17:18'),
(11, 11, 5, 10, 1500, '2024-02-02 18:18:32', '2024-02-02 18:18:32'),
(12, 12, 7, 5, 500, '2024-02-02 18:25:49', '2024-02-02 18:25:49'),
(13, 13, 7, 5, 500, '2024-02-02 18:27:03', '2024-02-02 18:27:03'),
(14, 14, 3, 1, 1500, '2024-02-04 16:26:03', '2024-02-04 16:26:03'),
(15, 14, 4, 5, 1200, '2024-02-04 16:26:03', '2024-02-04 16:26:03'),
(16, 15, 4, 7, 1200, '2024-02-04 16:32:49', '2024-02-04 16:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'ILOMBA', 1000, NULL, NULL),
(2, 'Apple iPad 5th Gen Wi-Fi', 10000, NULL, NULL),
(3, 'JONSON JAMES JOSEPH', 200, NULL, NULL),
(4, 'KUPIMA MKOJO', 5000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `center_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `center_name`, `address`, `phone`, `location`, `email`, `logo`, `created_at`, `updated_at`) VALUES
(7, 'HEKIMA  DISPENSARY', '0785678999', '255764948491', 'UYOLE-MBEYA', 'hekimamedical@gmail.com', NULL, '2024-01-17 13:44:34', '2024-01-17 13:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surgicals`
--

CREATE TABLE `surgicals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surgicals`
--

INSERT INTO `surgicals` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Upuasuaji', 5000, '2024-01-30 22:22:18', '2024-01-30 22:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) UNSIGNED NOT NULL,
  `to` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `from`, `to`, `patient_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 4, 1, 30, '2024-01-23 03:59:29', '2024-01-23 03:59:29', 'new'),
(2, 4, 6, 30, '2024-01-23 04:01:05', '2024-01-23 04:01:05', 'new'),
(3, 4, 3, 28, '2024-01-23 04:02:07', '2024-01-23 04:02:07', 'new'),
(4, 4, 3, 22, '2024-02-04 19:30:40', '2024-02-04 19:30:40', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `desc` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `user_id`, `patient_id`, `desc`, `created_at`, `updated_at`) VALUES
(1, 4, 37, '<p>paracetamol sryup</p><p>azuma </p>', '2024-02-01 03:42:43', '2024-02-01 03:42:43'),
(2, 4, 36, '<p>paracetomol</p>', '2024-02-01 16:20:44', '2024-02-01 16:20:44'),
(3, 4, 37, '<p>azuma</p>', '2024-02-01 16:22:37', '2024-02-01 16:22:37'),
(4, 4, 34, '<p>paracetamol</p>', '2024-02-01 16:32:07', '2024-02-01 16:32:07'),
(5, 4, 34, '<p>azuma</p>', '2024-02-01 16:33:03', '2024-02-01 16:33:03'),
(6, 4, 37, '<p>ASPRINI</p>', '2024-02-02 14:17:02', '2024-02-02 14:17:02'),
(7, 4, 37, '<p>kaka</p>', '2024-02-02 15:14:34', '2024-02-02 15:14:34'),
(8, 4, 38, '<p>paracetamol</p>', '2024-02-02 18:14:08', '2024-02-02 18:14:08'),
(9, 4, 37, '<p>AZUAM</p>', '2024-02-02 18:16:35', '2024-02-02 18:16:35'),
(10, 4, 36, '<p>azuma</p>', '2024-02-02 18:17:55', '2024-02-02 18:17:55'),
(11, 4, 34, '<p>demo</p>', '2024-02-02 18:24:54', '2024-02-02 18:24:54'),
(12, 4, 36, '<p>demo</p>', '2024-02-02 18:26:23', '2024-02-02 18:26:23'),
(13, 4, 39, '<p>hhh</p>', '2024-02-04 03:25:22', '2024-02-04 03:25:22'),
(14, 4, 39, '<p>panadol</p>', '2024-02-04 16:33:21', '2024-02-04 16:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `department` enum('doctor','receptionist','lab','pharmacist','admin') NOT NULL,
  `gender` enum('female','male') NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Active','Blocked') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone`, `department`, `gender`, `img`, `attachment`, `password`, `created_at`, `updated_at`, `status`) VALUES
(1, 'EMMANUEL ANGUMBWIKE ', 'ema2020', 751190900, 'admin', 'male', NULL, NULL, '$2y$12$QNQYHMutHn0bpDUbMfjUYOI4u.ivwu238jpjobARZ.bJ6b/bsmPb6', '2024-01-20 21:03:21', '2024-01-24 03:13:27', 'Active'),
(2, 'JUMA HAMISI MKANDAWA', 'JKU', 67881234, 'doctor', 'male', NULL, NULL, '$2y$12$f4sz7K2WyxPq5FcN6v0LY.qHS8xTXvchsMTeUssIApGDnGdWfiF7.', '2024-01-20 21:18:13', '2024-01-22 04:30:43', 'Active'),
(3, 'HUBA', 'majame', 0, 'lab', 'female', NULL, NULL, '$2y$12$sBJAJCRB6tlI.EKV/gy2OOfs6XqLiyXj3CmDlYbvNA19O5l4K6Jn2', '2024-01-20 21:34:27', '2024-02-03 02:54:31', 'Active'),
(4, 'JOHNSON JAMES JOSEPH', 'jonson20', 78899989, 'receptionist', 'male', NULL, NULL, '$2y$12$Lr.jNEErzc1cfAlv85q2rOYnc6uCK5jv5AnFafKGVfr0FAp2NmUq6', '2024-01-20 22:23:22', '2024-02-05 09:11:39', 'Active'),
(5, 'JAMES JOSEPH MWAKALINGA', 'james20', 747384738, 'receptionist', 'female', NULL, NULL, '$2y$12$4BaaXjPJKXEh0KX.rfvG8e66vr7FwdvlqEl3Fmd7zjs1r59ntgida', '2024-01-21 04:01:51', '2024-01-22 04:29:26', 'Active'),
(6, 'demo staff ', 'winnie2018', 623494912, 'doctor', 'female', NULL, NULL, '$2y$12$f5w25g2gVSVik7wVykHEBe65QUaftA3S76Q2oCKO7GQeHRh.2rxUm', '2024-01-21 06:49:45', '2024-01-24 03:47:56', 'Active'),
(7, 'rotypos', 'gagona', 0, 'doctor', 'female', NULL, NULL, '$2y$12$N5hYQklNGytIhWZEeo9sYOZuiR6hDquM3du/CN/rhv0hTcrDsR8MS', '2024-01-26 04:55:37', '2024-01-26 04:55:37', 'Active'),
(8, 'juma', 'matunda', 0, 'admin', 'female', NULL, NULL, '$2y$12$CPvg2qKyjv0QiRA8Magfl.nqwueYMM1nk.Y.eXey.Z.AHgzICD.Jq', '2024-02-05 08:32:00', '2024-02-05 08:32:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vital_signs`
--

CREATE TABLE `vital_signs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blood_pressure` varchar(255) NOT NULL,
  `pulse_rate` varchar(255) NOT NULL,
  `resp_rate` varchar(255) NOT NULL,
  `oxygen_saturation` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vital_signs`
--

INSERT INTO `vital_signs` (`id`, `blood_pressure`, `pulse_rate`, `resp_rate`, `oxygen_saturation`, `weight`, `height`, `patient_id`, `user_id`, `created_at`, `updated_at`) VALUES
(6, '+1 (394) 747-2521', '+1 (549) 326-8579', '+1 (988) 115-6775', '+1 (775) 265-5304', '+1 (872) 494-4478', '+1 (715) 561-5664', 27, 4, '2024-01-22 04:35:23', '2024-01-22 04:35:23'),
(7, '+1 (507) 667-2008', '+1 (503) 513-2265', '+1 (631) 247-9299', '+1 (423) 203-6457', '+1 (864) 165-1492', '+1 (647) 304-3978', 29, 4, '2024-01-22 04:42:19', '2024-01-22 04:42:19'),
(8, '+1 (507) 667-2008', '+1 (503) 513-2265', '+1 (631) 247-9299', '+1 (423) 203-6457', '+1 (864) 165-1492', '+1 (647) 304-3978', 29, 4, '2024-01-22 05:00:47', '2024-01-22 05:00:47'),
(9, '+1 (507) 667-2008', '+1 (503) 513-2265', '+1 (631) 247-9299', '+1 (423) 203-6457', '+1 (864) 165-1492', '+1 (647) 304-3978', 29, 4, '2024-01-22 05:02:45', '2024-01-22 05:02:45'),
(10, '+1 (507) 667-2008', '+1 (503) 513-2265', '+1 (631) 247-9299', '+1 (423) 203-6457', '+1 (864) 165-1492', '+1 (647) 304-3978', 29, 4, '2024-01-22 05:06:10', '2024-01-22 05:06:10'),
(11, '+1 (468) 584-6272', '+1 (609) 589-5686', '+1 (964) 951-3808', '+1 (655) 362-3768', '+1 (519) 449-8769', '+1 (728) 408-2716', 30, 4, '2024-01-22 05:07:43', '2024-01-22 05:07:43'),
(12, '+1 (468) 584-6272', '+1 (609) 589-5686', '+1 (964) 951-3808', '+1 (655) 362-3768', '+1 (519) 449-8769', '+1 (728) 408-2716', 30, 4, '2024-01-22 05:11:52', '2024-01-22 05:11:52'),
(13, '+1 (458) 946-3741', '+1 (412) 803-8133', '+1 (528) 535-3718', '+1 (375) 618-4999', '+1 (503) 341-6856', '+1 (621) 916-9796', 30, 4, '2024-01-22 05:12:15', '2024-01-22 05:12:15'),
(14, '+1 (693) 664-9538', '+1 (793) 709-4538', '+1 (731) 371-6199', '+1 (775) 989-2473', '+1 (916) 315-9996', '+1 (187) 406-4758', 30, 4, '2024-01-22 05:13:24', '2024-01-22 05:13:24'),
(15, '+1 (938) 306-7219', '+1 (308) 192-7751', '+1 (336) 373-5436', '+1 (994) 193-7809', '+1 (654) 892-8872', '+1 (434) 949-2079', 30, 4, '2024-01-22 05:14:54', '2024-01-22 05:14:54'),
(16, '+1 (489) 566-6318', '+1 (727) 834-2679', '+1 (423) 404-1712', '+1 (272) 371-3183', '+1 (822) 782-8872', '+1 (835) 981-8491', 30, 4, '2024-01-22 05:19:16', '2024-01-22 05:19:16'),
(17, '+1 (736) 257-5208', '+1 (947) 828-6809', '+1 (129) 707-9922', '+1 (289) 858-3031', '+1 (409) 799-2932', '+1 (647) 778-8671', 30, 4, '2024-01-22 05:19:49', '2024-01-22 05:19:49'),
(18, '+1 (473) 515-5698', '+1 (515) 978-2429', '+1 (336) 981-1828', '+1 (252) 871-8292', '+1 (292) 761-6181', '+1 (187) 624-8789', 30, 4, '2024-01-22 05:20:09', '2024-01-22 05:20:09'),
(19, '+1 (608) 106-5636', '+1 (154) 178-4941', '+1 (242) 593-1802', '+1 (336) 677-6678', '+1 (811) 583-4858', '+1 (394) 167-5197', 30, 4, '2024-01-22 05:22:26', '2024-01-22 05:22:26'),
(20, '+1 (569) 393-1592', '+1 (335) 367-5145', '+1 (292) 615-4195', '+1 (162) 806-4017', '+1 (497) 114-5633', '+1 (149) 447-1542', 30, 4, '2024-01-22 05:25:41', '2024-01-22 05:25:41'),
(21, '+1 (875) 779-5807', '+1 (193) 316-7836', '+1 (851) 522-5124', '+1 (914) 196-8306', '+1 (376) 446-3853', '+1 (304) 666-9458', 30, 4, '2024-01-22 05:27:03', '2024-01-22 05:27:03'),
(22, '1', '3', '2', '4', '5', '6', 30, 4, '2024-01-22 05:29:05', '2024-01-22 05:29:05'),
(23, '+1 (638) 182-5525', '+1 (829) 271-4886', '+1 (206) 649-5549', '+1 (341) 171-5027', '+1 (451) 435-1964', '+1 (136) 644-5699', 30, 4, '2024-01-22 05:39:47', '2024-01-22 05:39:47'),
(24, '+1 (957) 222-6845', '+1 (235) 477-8671', '+1 (882) 548-8693', '+1 (309) 533-6253', '+1 (369) 544-1709', '+1 (907) 746-1138', 30, 4, '2024-01-22 05:40:31', '2024-01-22 05:40:31'),
(25, '+1 (832) 161-4205', '+1 (487) 636-8423', '+1 (892) 404-1984', '+1 (333) 564-5853', '+1 (299) 603-5396', '+1 (285) 674-7215', 30, 4, '2024-01-22 05:41:24', '2024-01-22 05:41:24'),
(26, '+1 (211) 446-5045', '+1 (389) 766-4337', '+1 (733) 274-1662', '+1 (834) 653-4927', '+1 (114) 959-6939', '+1 (643) 942-3664', 30, 4, '2024-01-22 05:56:27', '2024-01-22 05:56:27'),
(27, '+1 (801) 339-5296', '+1 (571) 544-3946', '+1 (603) 421-1036', '+1 (433) 159-3148', '+1 (821) 652-5845', '+1 (215) 714-2883', 30, 4, '2024-01-22 06:01:27', '2024-01-22 06:01:27'),
(28, '+1 (149) 469-5488', '+1 (521) 982-3841', '+1 (413) 758-5049', '+1 (584) 221-2796', '+1 (733) 587-2951', '+1 (265) 787-4268', 30, 4, '2024-01-22 06:02:56', '2024-01-22 06:02:56'),
(29, '20', '22', '21', '23', '24', '26', 30, 4, '2024-01-22 06:04:04', '2024-01-22 06:04:04'),
(30, '+1 (753) 489-7632', '+1 (943) 483-1475', '+1 (408) 508-8459', '+1 (109) 267-6319', '+1 (685) 856-4088', '+1 (817) 135-1829', 30, 4, '2024-01-22 06:12:01', '2024-01-22 06:12:01'),
(31, '+1 (457) 807-7142', '+1 (695) 464-2261', '+1 (413) 197-2052', '+1 (223) 335-7564', '+1 (695) 765-4527', '+1 (294) 245-6255', 30, 4, '2024-01-22 06:13:15', '2024-01-22 06:13:15'),
(32, '+1 (539) 759-4436', '+1 (557) 989-2495', '+1 (323) 847-2687', '+1 (755) 534-3147', '+1 (365) 652-6626', '+1 (478) 485-6492', 30, 4, '2024-01-22 06:15:30', '2024-01-22 06:15:30'),
(33, '+1 (227) 235-7548', '+1 (279) 697-8373', '+1 (872) 194-4839', '+1 (917) 722-9738', '+1 (217) 778-7579', '+1 (176) 194-7059', 30, 4, '2024-01-22 06:19:17', '2024-01-22 06:19:17'),
(34, '+1 (894) 861-2524', '+1 (447) 428-2151', '+1 (646) 946-3414', '+1 (219) 536-2432', '+1 (505) 778-6833', '+1 (323) 626-5279', 30, 4, '2024-01-22 06:28:21', '2024-01-22 06:28:21'),
(35, '+1 (405) 907-1624', '+1 (729) 364-1326', '+1 (436) 572-2028', '+1 (196) 909-2974', '+1 (212) 959-2946', '+1 (666) 129-3836', 30, 4, '2024-01-22 20:15:32', '2024-01-22 20:15:32'),
(36, 'a', 'c', 'b', 'd', 'e', 'f', 30, 4, '2024-01-22 20:23:33', '2024-01-22 20:23:33'),
(37, '+1 (508) 992-3052', '+1 (559) 706-5909', '+1 (634) 529-7718', '+1 (631) 562-3424', '+1 (751) 792-8603', '+1 (406) 162-1098', 29, 4, '2024-01-22 20:34:26', '2024-01-22 20:34:26'),
(38, '120/100', '24', '98', '90', '60', '72', 32, 4, '2024-01-24 00:35:35', '2024-01-24 00:35:35'),
(39, '30', '48', '23', '78', '45', '65', 37, 4, '2024-02-01 01:22:10', '2024-02-01 01:22:10'),
(40, '120/100', '11', '23', '21', '11', '87', 37, 4, '2024-02-01 01:22:55', '2024-02-01 01:22:55'),
(41, '12', '223', '3312', '133', '233', '233', 39, 4, '2024-02-04 19:13:08', '2024-02-04 19:13:08'),
(42, 'Itaque quia do quia ', 'Repudiandae voluptas', 'Temporibus aut quos ', 'Et velit vero quis ', 'Sequi et dolore fugi', 'Corporis in reprehen', 22, 4, '2024-02-04 19:29:55', '2024-02-04 19:29:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`),
  ADD KEY `appointments_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnoses_user_id_foreign` (`user_id`),
  ADD KEY `diagnoses_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drugs_user_id_foreign` (`user_id`);

--
-- Indexes for table `durations`
--
ALTER TABLE `durations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `durations_patient_id_foreign` (`patient_id`),
  ADD KEY `durations_user_id_foreign` (`user_id`);

--
-- Indexes for table `examinations`
--
ALTER TABLE `examinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examinations_user_id_foreign` (`user_id`),
  ADD KEY `examinations_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_user_id_foreign` (`user_id`),
  ADD KEY `expenses_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `expense_items`
--
ALTER TABLE `expense_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_items_expense_id_foreign` (`expense_id`);

--
-- Indexes for table `family_histories`
--
ALTER TABLE `family_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_histories_user_id_foreign` (`user_id`),
  ADD KEY `family_histories_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `frequencies`
--
ALTER TABLE `frequencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frequencies_patient_id_foreign` (`patient_id`),
  ADD KEY `frequencies_user_id_foreign` (`user_id`);

--
-- Indexes for table `general_examinations`
--
ALTER TABLE `general_examinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `general_examinations_patient_id_foreign` (`patient_id`),
  ADD KEY `general_examinations_user_id_foreign` (`user_id`);

--
-- Indexes for table `gynocological_histories`
--
ALTER TABLE `gynocological_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gynocological_histories_patient_id_foreign` (`patient_id`),
  ADD KEY `gynocological_histories_user_id_foreign` (`user_id`);

--
-- Indexes for table `healths`
--
ALTER TABLE `healths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `healths_service_id_foreign` (`service_id`),
  ADD KEY `healths_user_id_foreign` (`user_id`),
  ADD KEY `healths_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `investigatigations`
--
ALTER TABLE `investigatigations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investigatigations_patient_id_foreign` (`patient_id`),
  ADD KEY `investigatigations_user_id_foreign` (`user_id`),
  ADD KEY `replied_by_users_fkey` (`replied_by`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_patient_id_foreign` (`patient_id`),
  ADD KEY `invoices_investigatigation_id_foreign` (`investigatigation_id`),
  ADD KEY `invoices_sale_id_foreign` (`sale_id`);

--
-- Indexes for table `main_complaints`
--
ALTER TABLE `main_complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_complaints_patient_id_foreign` (`patient_id`),
  ADD KEY `main_complaints_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `past_medicals`
--
ALTER TABLE `past_medicals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `past_medicals_patient_id_foreign` (`patient_id`),
  ADD KEY `past_medicals_user_id_foreign` (`user_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_histories`
--
ALTER TABLE `patient_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_histories_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_histories_user_id_foreign` (`user_id`);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_patient_id_foreign` (`patient_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_patient_id_foreign` (`patient_id`),
  ADD KEY `sales_payment_id_foreign` (`payment_id`),
  ADD KEY `sales_user_id_foreign` (`user_id`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_items_sale_id_foreign` (`sale_id`),
  ADD KEY `sale_items_drug_id_foreign` (`drug_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surgicals`
--
ALTER TABLE `surgicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfers_from_foreign` (`from`),
  ADD KEY `transfers_to_foreign` (`to`),
  ADD KEY `transfers_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `treatments_user_id_foreign` (`user_id`),
  ADD KEY `treatments_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `vital_signs`
--
ALTER TABLE `vital_signs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vital_signs_patient_id_foreign` (`patient_id`),
  ADD KEY `vital_signs_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `durations`
--
ALTER TABLE `durations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examinations`
--
ALTER TABLE `examinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_items`
--
ALTER TABLE `expense_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_histories`
--
ALTER TABLE `family_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `frequencies`
--
ALTER TABLE `frequencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_examinations`
--
ALTER TABLE `general_examinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gynocological_histories`
--
ALTER TABLE `gynocological_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `healths`
--
ALTER TABLE `healths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investigatigations`
--
ALTER TABLE `investigatigations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `main_complaints`
--
ALTER TABLE `main_complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `past_medicals`
--
ALTER TABLE `past_medicals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `patient_histories`
--
ALTER TABLE `patient_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surgicals`
--
ALTER TABLE `surgicals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vital_signs`
--
ALTER TABLE `vital_signs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD CONSTRAINT `diagnoses_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `diagnoses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `drugs`
--
ALTER TABLE `drugs`
  ADD CONSTRAINT `drugs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `durations`
--
ALTER TABLE `durations`
  ADD CONSTRAINT `durations_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `durations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `examinations`
--
ALTER TABLE `examinations`
  ADD CONSTRAINT `examinations_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `examinations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expense_items`
--
ALTER TABLE `expense_items`
  ADD CONSTRAINT `expense_items_expense_id_foreign` FOREIGN KEY (`expense_id`) REFERENCES `expenses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `family_histories`
--
ALTER TABLE `family_histories`
  ADD CONSTRAINT `family_histories_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `family_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `frequencies`
--
ALTER TABLE `frequencies`
  ADD CONSTRAINT `frequencies_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `frequencies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `general_examinations`
--
ALTER TABLE `general_examinations`
  ADD CONSTRAINT `general_examinations_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `general_examinations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gynocological_histories`
--
ALTER TABLE `gynocological_histories`
  ADD CONSTRAINT `gynocological_histories_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gynocological_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `healths`
--
ALTER TABLE `healths`
  ADD CONSTRAINT `healths_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `healths_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `healths_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `investigatigations`
--
ALTER TABLE `investigatigations`
  ADD CONSTRAINT `investigatigations_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `investigatigations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replied_by_users_fkey` FOREIGN KEY (`replied_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_investigatigation_id_foreign` FOREIGN KEY (`investigatigation_id`) REFERENCES `investigatigations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `main_complaints`
--
ALTER TABLE `main_complaints`
  ADD CONSTRAINT `main_complaints_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `main_complaints_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `past_medicals`
--
ALTER TABLE `past_medicals`
  ADD CONSTRAINT `past_medicals_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `past_medicals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_histories`
--
ALTER TABLE `patient_histories`
  ADD CONSTRAINT `patient_histories_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD CONSTRAINT `sale_items_drug_id_foreign` FOREIGN KEY (`drug_id`) REFERENCES `drugs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sale_items_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_from_foreign` FOREIGN KEY (`from`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfers_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfers_to_foreign` FOREIGN KEY (`to`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `treatments`
--
ALTER TABLE `treatments`
  ADD CONSTRAINT `treatments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `treatments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vital_signs`
--
ALTER TABLE `vital_signs`
  ADD CONSTRAINT `vital_signs_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vital_signs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
