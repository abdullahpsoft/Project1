-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 05:20 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `maxemployees` int(255) NOT NULL,
  `updated_at` text NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `maxemployees`, `updated_at`, `created_at`) VALUES
(1, 'CS', 255, '2019-10-17 12:01:32', ''),
(2, 'HUMANITIES', 170, '2019-10-17 12:01:43', ''),
(3, 'Engineering', 240, '2019-10-17 12:38:56', '2019-10-17 12:38:56'),
(4, 'Avionics', 50, '2019-10-17 12:42:08', '2019-10-17 12:40:15'),
(5, 'Mechanical', 170, '2019-10-21 16:36:32', '2019-10-21 16:36:32');

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
(3, '2019_10_15_152210_create_roles_table', 2),
(4, '2019_10_15_152658_create_role_user_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-10-15 10:56:17', '2019-10-15 10:56:17'),
(2, 'user', '2019-10-15 10:56:17', '2019-10-15 10:56:17'),
(3, 'superadmin', '2019-10-15 10:56:17', '2019-10-15 10:56:17'),
(4, 'groupmanager', '2019-10-15 10:56:17', '2019-10-15 10:56:17'),
(5, 'department', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `assign_to_id` int(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `assign_to_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, NULL, NULL),
(2, 3, 2, 0, NULL, NULL),
(3, 2, 3, NULL, NULL, '2019-10-21 11:00:12'),
(4, 4, 4, 0, NULL, NULL),
(5, 2, 5, 6, NULL, '2019-10-21 05:49:26'),
(6, 4, 6, NULL, NULL, NULL),
(9, 2, 8, NULL, NULL, NULL),
(10, 2, 9, 6, NULL, '2019-10-21 12:04:18'),
(11, 5, 10, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `due_date` date NOT NULL,
  `created_at` text,
  `updated_at` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `details`, `status`, `due_date`, `created_at`, `updated_at`) VALUES
(1, 'Create Banner', 'You have to design a colorful banner of size 500 x 200 for you project assignment. The theme of the banner should be exactly which was described in the class. ', 'completed', '2019-10-23', NULL, '2019-10-21 18:20:12'),
(2, 'Project Plan', 'You have to create the project plan for your system project and submit. Points to keep in mind while creating the project plan is min words 200, format IEEE style and all sections should be clearly described. ', 'completed', '2019-10-28', NULL, '2019-10-21 15:32:59'),
(3, 'Create turin account', 'You have to create turin account and register to the class.', 'pending', '2019-10-20', NULL, NULL),
(4, 'Algorithms Assignment', 'You have to create a code for recursion algorithm for factorial function', 'pending', '2019-10-30', '2019-10-22 15:19:33', '2019-10-22 15:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$qMsKhxUi0pEeyCmOvdqAaeUywOrUctqtk8Uc3ZBHDQpDcq035X97e', NULL, '2019-10-15 10:56:17', '2019-10-15 10:56:17'),
(2, 'SuperAdmin', 'admin@test.com', NULL, '$2y$10$K3L8AvHLE71pRZZ5VJyynOnKc.xZ3py3arEZCdXNU9bPWea2BIEBW', NULL, '2019-10-15 10:56:17', '2019-10-15 10:56:17'),
(3, 'User', 'user@test.com', NULL, '$2y$10$.wBEAu8PI3tiyqezxiRdCu70l03Nzr2bRqq8A9KjfgBgbzZV1nwiS', NULL, '2019-10-15 10:56:17', '2019-10-15 10:56:17'),
(4, 'GroupManager', 'groupmanager@test.com', NULL, '$2y$10$0W5wIhKP2R15AiaKp1Ziqe.0EBkDFHVjdzHvxoy4lm9RCXK3He2M6', NULL, '2019-10-15 10:56:17', '2019-10-15 10:56:17'),
(5, 'joerge', 'joerge@user.com', NULL, '123', NULL, '2019-10-17 08:28:04', '2019-10-17 08:28:04'),
(6, 'Haroon', 'haroon@test.com', NULL, 'haroon', NULL, '2019-10-21 03:28:05', '2019-10-21 03:28:05'),
(8, 'kate', 'kate@user.com', NULL, 'kate', NULL, '2019-10-21 11:01:42', '2019-10-21 11:01:42'),
(9, 'Shane', 'shane@test.com', NULL, 'shane', NULL, '2019-10-21 12:03:12', '2019-10-21 12:03:12'),
(10, 'CS', 'cs@department.com', NULL, 'department', NULL, '2019-10-22 09:51:17', '2019-10-22 09:51:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
