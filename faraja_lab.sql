-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 02:35 AM
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
(1, 'MALA', '5000', NULL, NULL),
(2, 'MALA', '5000', NULL, NULL),
(3, 'Apple iPad 5th Gen Wi-Fi', '5000', NULL, NULL),
(4, 'Stool', '1500', NULL, NULL),
(5, 'Blood Group', '1200', NULL, NULL),
(6, 'halla', '8000', NULL, NULL),
(7, 'ILOMBA', '1000', NULL, NULL);

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
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('P','D') NOT NULL DEFAULT 'P',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'ana kifua kinabana sana', 27, 4, '2024-01-23 08:31:19', '2024-01-23 08:31:19');

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
(28, '2024_01_22_201919_create_healths_table', 5);

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
(22, 'JAMES', 'JOSEPH', 'MWAKALINGA', '07484738', 0, 'PI', '2024-01-20 05:52:32', '2024-01-20 05:52:32', 'ME', 'normal', ''),
(23, 'samwel', 'damian', 'koeles', '0751190900', 0, 'PI', '2024-01-20 16:43:11', '2024-01-20 16:43:11', 'ME', 'emergency', ''),
(24, 'ilomba', 'mwambene', 'teku', '0712344567', 0, 'PI', '2024-01-21 00:46:24', '2024-01-21 00:46:24', 'ME', 'normal', ''),
(25, 'Chava', 'Raphael', 'Scarlett', '28', 12, 'PI', '2024-01-21 00:53:13', '2024-01-21 20:53:19', 'female', 'emergency', 'ccm'),
(26, 'Daniel', 'Neve', 'Vaughan', '07234567890', 309, 'PI', '2024-01-21 00:55:38', '2024-01-21 20:45:52', 'female', 'normal', 'kiwira'),
(27, 'MARY', 'PATRICK', 'JOHN', '0712390898', 23, 'PI', '2024-01-21 18:57:06', '2024-01-21 18:57:06', 'ME', 'normal', '78'),
(28, 'JUDITH', 'JOHN', 'LEONARD', '078676567', 23, 'PI', '2024-01-21 18:58:02', '2024-01-21 18:58:02', 'KE', 'normal', '56'),
(29, 'AMINA', 'YUSUPH', 'HAMISI', '1234', 23, 'PI', '2024-01-21 19:01:25', '2024-01-21 20:45:16', 'male', 'normal', '980'),
(30, 'hallo', 'halotel', 'lolo', '07123456789', 80, 'PI', '2024-01-21 23:17:14', '2024-01-21 23:17:14', 'female', 'normal', '123');

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
(2, 'bbb', 27, 4, '2024-01-23 09:22:32', '2024-01-23 09:22:32');

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
(2, 'safaricom', '1234', '2024-01-17 07:50:19', '2024-01-17 07:50:19'),
(3, 'LIPA-MPESA', '0778888', '2024-01-17 14:00:58', '2024-01-17 14:00:58'),
(4, 'AIRTEL-MONEY', '0712345678', '2024-01-17 23:54:16', '2024-01-17 23:54:16');

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
(1, 'b', 27, 4, '2024-01-23 09:31:31', '2024-01-23 09:31:31');

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
(7, 'HEKIMA MEDICAL LAB', '0785678999', '255764948491', 'UYOLE-MBEYA', 'hekimamedical@gmail.com', NULL, '2024-01-17 13:44:34', '2024-01-17 13:44:34');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `from`, `to`, `patient_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 30, '2024-01-23 03:59:29', '2024-01-23 03:59:29'),
(2, 4, 6, 30, '2024-01-23 04:01:05', '2024-01-23 04:01:05'),
(3, 4, 3, 28, '2024-01-23 04:02:07', '2024-01-23 04:02:07');

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
(1, 'EMMANUEL ANGUMBWIKE ', 'ema2020', 751190900, 'doctor', 'male', NULL, NULL, '$2y$12$QNQYHMutHn0bpDUbMfjUYOI4u.ivwu238jpjobARZ.bJ6b/bsmPb6', '2024-01-20 21:03:21', '2024-01-21 17:04:37', 'Active'),
(2, 'JUMA HAMISI MKANDAWA', 'JKU', 67881234, 'doctor', 'male', NULL, NULL, '$2y$12$f4sz7K2WyxPq5FcN6v0LY.qHS8xTXvchsMTeUssIApGDnGdWfiF7.', '2024-01-20 21:18:13', '2024-01-22 04:30:43', 'Active'),
(3, 'HUBA', 'majame', 0, 'pharmacist', 'female', NULL, NULL, '$2y$12$sBJAJCRB6tlI.EKV/gy2OOfs6XqLiyXj3CmDlYbvNA19O5l4K6Jn2', '2024-01-20 21:34:27', '2024-01-21 08:24:25', 'Active'),
(4, 'JOHNSON JAMES JOSEPH', 'jonson20', 78899989, 'receptionist', 'male', NULL, NULL, '$2y$12$Lr.jNEErzc1cfAlv85q2rOYnc6uCK5jv5AnFafKGVfr0FAp2NmUq6', '2024-01-20 22:23:22', '2024-01-22 04:29:36', 'Active'),
(5, 'JAMES JOSEPH MWAKALINGA', 'james20', 747384738, 'receptionist', 'female', NULL, NULL, '$2y$12$4BaaXjPJKXEh0KX.rfvG8e66vr7FwdvlqEl3Fmd7zjs1r59ntgida', '2024-01-21 04:01:51', '2024-01-22 04:29:26', 'Active'),
(6, 'WINNIFRIDA HEZRON MWAKASEGE', 'winnie2018', 623494912, 'receptionist', 'female', NULL, NULL, '$2y$12$f5w25g2gVSVik7wVykHEBe65QUaftA3S76Q2oCKO7GQeHRh.2rxUm', '2024-01-21 06:49:45', '2024-01-21 06:49:45', 'Active');

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
(37, '+1 (508) 992-3052', '+1 (559) 706-5909', '+1 (634) 529-7718', '+1 (631) 562-3424', '+1 (751) 792-8603', '+1 (406) 162-1098', 29, 4, '2024-01-22 20:34:26', '2024-01-22 20:34:26');

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
-- Indexes for table `durations`
--
ALTER TABLE `durations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `durations_patient_id_foreign` (`patient_id`),
  ADD KEY `durations_user_id_foreign` (`user_id`);

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
  ADD KEY `investigatigations_category_id_foreign` (`category_id`),
  ADD KEY `investigatigations_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `investigatigations_patient_id_foreign` (`patient_id`),
  ADD KEY `investigatigations_user_id_foreign` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `durations`
--
ALTER TABLE `durations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_complaints`
--
ALTER TABLE `main_complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `past_medicals`
--
ALTER TABLE `past_medicals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `patient_histories`
--
ALTER TABLE `patient_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vital_signs`
--
ALTER TABLE `vital_signs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
-- Constraints for table `durations`
--
ALTER TABLE `durations`
  ADD CONSTRAINT `durations_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `durations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `investigatigations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `investigatigations_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `investigatigations_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `investigatigations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_from_foreign` FOREIGN KEY (`from`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfers_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfers_to_foreign` FOREIGN KEY (`to`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
