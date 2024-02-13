-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 05:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dynamic_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_fields`
--

CREATE TABLE `dynamic_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_name` text DEFAULT NULL,
  `field_value` text DEFAULT NULL,
  `field_placeholder` text DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `required` varchar(11) DEFAULT NULL,
  `radio_button_yes_no_person_no` varchar(255) DEFAULT NULL,
  `radio_button_yes` varchar(255) DEFAULT NULL,
  `radio_button_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dynamic_fields`
--

INSERT INTO `dynamic_fields` (`id`, `field_name`, `field_value`, `field_placeholder`, `event_id`, `status`, `sequence`, `required`, `radio_button_yes_no_person_no`, `radio_button_yes`, `radio_button_no`, `created_at`, `updated_at`) VALUES
(39, 'Your Name', 'your_name', 'Your Name', 6, 'Input', 1, 'required', NULL, NULL, NULL, '2024-02-12 08:57:14', '2024-02-12 08:57:14'),
(40, 'Email Address', 'email_address', 'Email Address', 6, 'Input', 2, 'required', NULL, NULL, NULL, '2024-02-12 08:58:06', '2024-02-12 08:58:06'),
(41, 'City', 'city', 'City', 6, 'DrowpDown Select Option', 2, 'required', NULL, NULL, NULL, '2024-02-12 08:58:25', '2024-02-12 08:58:25'),
(42, 'Gender', 'RadioGroupOnly_gender', 'Gender', 6, 'Radio Group WithOut Amount', 3, 'required', NULL, NULL, NULL, '2024-02-12 09:01:19', '2024-02-12 09:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `event_manages`
--

CREATE TABLE `event_manages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `short` text DEFAULT NULL,
  `event_table_name` varchar(111) DEFAULT NULL,
  `dynamic_table` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `slug` varchar(255) DEFAULT NULL,
  `trash` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_manages`
--

INSERT INTO `event_manages` (`id`, `event_name`, `short`, `event_table_name`, `dynamic_table`, `status`, `slug`, `trash`, `created_at`, `updated_at`) VALUES
(6, 'Face Hunted Bangladesh Event', 'Face Hunted Bangladesh Event short', 'Face_Hunted_Bangladesh_Event', 'yes', '2', 'Face-Hunted-Bangladesh-Event', 1, '2024-02-12 08:53:01', '2024-02-12 09:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `face_hunted_bangladesh_event`
--

CREATE TABLE `face_hunted_bangladesh_event` (
  `id` int(11) NOT NULL,
  `your_name` text DEFAULT NULL,
  `email_address` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `RadioGroupOnly_gender` text DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `admin_status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `face_hunted_bangladesh_event`
--

INSERT INTO `face_hunted_bangladesh_event` (`id`, `your_name`, `email_address`, `city`, `RadioGroupOnly_gender`, `event_id`, `user_id`, `transaction_id`, `total_amount`, `admin_status`, `created_at`, `updated_at`) VALUES
(1, 'hamid alam', 'a.b123kwsar@gmail.com', 'Feni', 'Male', 6, 6, NULL, NULL, 2, '2024-02-12 09:20:04', '2024-02-12 15:22:07');

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_05_18_070603_create_event_manages_table', 2),
(11, '2023_05_20_050408_create_dynamic_fields_table', 3),
(12, '2023_05_20_101955_create_radio_group_with_amounts_table', 4),
(13, '2023_05_20_105938_create_radio_group_onlies_table', 5),
(14, '2023_05_21_043814_create_radio_group_yes_nos_table', 6),
(15, '2023_05_21_045804_create_select_option_drowpdowns_table', 7),
(16, '2023_05_21_070157_createbiccthirdtable', 8);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `radio_group_onlies`
--

CREATE TABLE `radio_group_onlies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `field_id` int(11) DEFAULT NULL,
  `radio_field_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radio_group_onlies`
--

INSERT INTO `radio_group_onlies` (`id`, `event_id`, `field_id`, `radio_field_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'SARC 50 USD (Onspot)', NULL, '2023-05-20 05:05:00', '2023-05-20 05:05:17'),
(3, 1, 6, 'Non-SARC 100 USD (Onspot)', NULL, '2023-05-20 05:05:39', '2023-05-20 05:05:39'),
(4, 5, 34, 'yes', NULL, '2023-08-28 23:36:27', '2023-08-28 23:36:27'),
(5, 5, 34, 'No', NULL, '2023-08-28 23:36:34', '2023-08-28 23:36:34'),
(6, 5, 34, 'Other', NULL, '2023-08-28 23:36:41', '2023-08-28 23:36:41'),
(7, 6, 42, 'Male', NULL, '2024-02-12 09:03:00', '2024-02-12 09:03:00'),
(8, 6, 42, 'Female', NULL, '2024-02-12 09:03:15', '2024-02-12 09:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `radio_group_with_amounts`
--

CREATE TABLE `radio_group_with_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `field_id` int(11) DEFAULT NULL,
  `radio_field_name` varchar(255) DEFAULT NULL,
  `radio_field_amount` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radio_group_with_amounts`
--

INSERT INTO `radio_group_with_amounts` (`id`, `event_id`, `field_id`, `radio_field_name`, `radio_field_amount`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 4, 'Physician BDT 1000', 1000, NULL, '2023-05-20 04:54:22', '2023-05-21 23:16:25'),
(4, 1, 4, 'Scientific Associate (Pharma): BDT 5000', 5000, NULL, '2023-05-20 04:54:45', '2023-05-21 23:16:35'),
(5, 1, 16, 'Engineering BDT 600', 600, NULL, '2023-05-21 23:39:43', '2023-05-21 23:39:43'),
(6, 1, 16, 'Teacher BDT 700', 700, NULL, '2023-05-21 23:40:17', '2023-05-21 23:41:42'),
(9, 2, 21, 'Physician', 100, NULL, '2023-08-28 02:53:55', '2023-08-28 02:53:55'),
(10, 2, 21, 'SARC 50 USD (Onspot)', 50, NULL, '2023-08-28 02:54:04', '2023-08-28 02:54:04'),
(11, 5, 33, 'YES', 500, NULL, '2023-08-28 23:32:41', '2023-08-28 23:32:41'),
(12, 5, 33, 'Physician', 50, NULL, '2023-08-28 23:32:50', '2023-08-28 23:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `radio_group_yes_nos`
--

CREATE TABLE `radio_group_yes_nos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `field_id` int(11) DEFAULT NULL,
  `person_no` varchar(255) DEFAULT NULL,
  `person_amount` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radio_group_yes_nos`
--

INSERT INTO `radio_group_yes_nos` (`id`, `event_id`, `field_id`, `person_no`, `person_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 10, '1 Person', '1000', NULL, '2023-05-20 22:51:31', '2023-05-20 22:51:31'),
(2, 1, 10, '2 Person', '2000', NULL, '2023-05-20 22:51:43', '2023-05-20 22:51:43'),
(4, 1, 17, '1 person', '500', NULL, '2023-05-22 03:27:34', '2023-05-22 03:27:34'),
(5, 5, 37, '1 Person', '100', NULL, '2023-08-28 23:39:00', '2023-08-28 23:39:00'),
(6, 5, 37, '2 Person', '500', NULL, '2023-08-28 23:39:07', '2023-08-28 23:39:07'),
(7, 5, 37, '3 Person', '700', NULL, '2023-08-28 23:51:47', '2023-08-28 23:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `select_option_drowpdowns`
--

CREATE TABLE `select_option_drowpdowns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `field_id` int(11) DEFAULT NULL,
  `option_value` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `select_option_drowpdowns`
--

INSERT INTO `select_option_drowpdowns` (`id`, `event_id`, `field_id`, `option_value`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 'Option One', NULL, '2023-05-20 23:04:35', '2023-05-20 23:04:47'),
(2, 1, 11, 'Option two', NULL, '2023-05-20 23:05:03', '2023-05-20 23:05:03'),
(3, 1, 11, 'Option Three', NULL, '2023-05-20 23:05:11', '2023-05-20 23:05:11'),
(4, 2, 21, 'Yes', NULL, '2023-08-28 02:59:59', '2023-08-28 02:59:59'),
(5, 2, 21, 'No', NULL, '2023-08-28 03:00:06', '2023-08-28 03:00:06'),
(6, 2, 29, 'Yes', NULL, '2023-08-28 03:01:14', '2023-08-28 03:01:14'),
(7, 2, 29, 'No', NULL, '2023-08-28 03:01:20', '2023-08-28 03:01:20'),
(8, 2, 30, 'Yes', NULL, '2023-08-28 03:05:27', '2023-08-28 03:05:27'),
(9, 2, 30, 'No', NULL, '2023-08-28 03:05:35', '2023-08-28 03:05:35'),
(10, 5, 35, 'Math', NULL, '2023-08-28 23:37:21', '2023-08-28 23:37:21'),
(11, 5, 35, 'CSE', NULL, '2023-08-28 23:37:30', '2023-08-28 23:37:30'),
(12, 5, 36, 'yes', NULL, '2023-08-28 23:38:16', '2023-08-28 23:38:16'),
(13, 5, 36, 'no', NULL, '2023-08-28 23:38:21', '2023-08-28 23:38:21'),
(14, 6, 41, 'Dhaka', NULL, '2024-02-12 09:01:39', '2024-02-12 09:01:39'),
(15, 6, 41, 'Feni', NULL, '2024-02-12 09:01:58', '2024-02-12 09:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `shortened_urls`
--

CREATE TABLE `shortened_urls` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `original_url` varchar(255) DEFAULT NULL,
  `shortened_url` varchar(255) NOT NULL,
  `visitor` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shortened_urls`
--

INSERT INTO `shortened_urls` (`id`, `user_id`, `original_url`, `shortened_url`, `visitor`, `created_at`, `updated_at`) VALUES
(3, 6, 'https://getbootstrap.com/docs/4.0/components/modal/', 'a5yfZO', 2, '2024-02-12 21:46:27', '2024-02-12 22:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `super_admin_status` varchar(255) NOT NULL DEFAULT 'no',
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `institute` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `after_password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `super_admin_status`, `email`, `phone`, `designation`, `institute`, `email_verified_at`, `password`, `after_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kawsar', 'yes', 'SuperAdmin@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$Pe0UEPeW0T5ZQSgi5IcxC.MPX3yyJ8aEF6dWZ7n5/p.c48Cg3v7au', NULL, NULL, '2023-05-17 23:03:53', '2023-05-17 23:03:53'),
(2, 'defaul user', 'no', 'DefaultUser@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$Pe0UEPeW0T5ZQSgi5IcxC.MPX3yyJ8aEF6dWZ7n5/p.c48Cg3v7au', NULL, NULL, '2023-05-17 23:03:53', '2023-05-17 23:03:53'),
(6, 'kawsar', 'no', 'support1@esoft.com.bd', '0185896934', 'designation', 'fdfds', NULL, '$2y$10$Pe0UEPeW0T5ZQSgi5IcxC.MPX3yyJ8aEF6dWZ7n5/p.c48Cg3v7au', NULL, NULL, '2023-08-03 00:49:42', '2023-08-03 00:49:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dynamic_fields`
--
ALTER TABLE `dynamic_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_manages`
--
ALTER TABLE `event_manages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `face_hunted_bangladesh_event`
--
ALTER TABLE `face_hunted_bangladesh_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `radio_group_onlies`
--
ALTER TABLE `radio_group_onlies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radio_group_with_amounts`
--
ALTER TABLE `radio_group_with_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radio_group_yes_nos`
--
ALTER TABLE `radio_group_yes_nos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `select_option_drowpdowns`
--
ALTER TABLE `select_option_drowpdowns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shortened_urls`
--
ALTER TABLE `shortened_urls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shortened_url` (`shortened_url`);

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
-- AUTO_INCREMENT for table `dynamic_fields`
--
ALTER TABLE `dynamic_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `event_manages`
--
ALTER TABLE `event_manages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `face_hunted_bangladesh_event`
--
ALTER TABLE `face_hunted_bangladesh_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `radio_group_onlies`
--
ALTER TABLE `radio_group_onlies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `radio_group_with_amounts`
--
ALTER TABLE `radio_group_with_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `radio_group_yes_nos`
--
ALTER TABLE `radio_group_yes_nos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `select_option_drowpdowns`
--
ALTER TABLE `select_option_drowpdowns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shortened_urls`
--
ALTER TABLE `shortened_urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
