-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 05:37 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'farhan', 'farhan@gmail.com', NULL, '$2y$10$MknX7.DdJRnRXGp7iq/pAOxpkk3rUU1hmKwwS2BXNIPTvJYIEsSZ.', 'A8K2ACWNdr43WBuLbJPgYEnJICjHhZXci3UUTO3owKYVSZrIqj0qUIw6fVUE', '2021-02-02 06:40:34', '2021-02-02 06:40:34'),
(2, 'siswa', 'TesLai', 'ga@gmai.com', NULL, '$2y$10$MQeYLEEvD74yisFnEelsB.SeuGpU7qwFT3LYex0tMZxCVu4vRqByi', 'k2HhiG2E6NX9bGqsHr2AElcr417yIvxqt77BeFGE7vcQ9L6K44BlTgSSOqXL', '2021-02-02 07:53:15', '2021-02-02 07:53:15'),
(5, 'siswa', 'Muhammad', 'mf11011993@gmail.com', NULL, '$2y$10$h7/kz3HxwuL3rNcKbAoU7.ABBx0xl2J8JOiITwlSCviBeaEoM2RGq', 'dOSZ77xQiilYvem3Oim7olWsxC5eD51QtlwvdnF9kpQMtta6gwzov4UIez8z', '2021-02-07 09:24:46', '2021-02-07 09:24:46');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
