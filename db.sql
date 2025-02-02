-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 03, 2025 at 02:59 AM
-- Server version: 8.0.36-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cims_ok`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `event_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `phone`, `email`, `event_id`, `created_at`) VALUES
(1, '01814418723', 'book@book.com', '1', '2025-02-02 15:31:28'),
(2, '0125242555', 'book2@test.com', '2', '2025-02-02 15:34:47'),
(3, '12234', 'test@tes.com', '5', '2025-02-02 16:50:15'),
(4, '013525512', 'tet@tes.com', '1', '2025-02-02 18:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `event_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `event_date` date NOT NULL,
  `event_seat` int NOT NULL,
  `event_time` time NOT NULL,
  `event_location` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `event_name`, `event_desc`, `event_date`, `event_seat`, `event_time`, `event_location`, `created_at`, `updated_at`) VALUES
(1, 0, 'test event', 'test description', '2025-01-22', 25, '07:45:00', '', '2025-01-31 13:43:34', '2025-01-31 13:43:34'),
(5, 28, 'test event 420', 'test eventtest description', '2025-02-18', 36, '20:40:00', 'test location', '2025-02-02 02:36:30', '2025-02-02 02:37:56'),
(6, 28, 'test two', 'two description', '2025-02-18', 36, '20:39:00', '35', '2025-02-02 02:37:00', '2025-02-02 02:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `role`, `name`, `phone`, `password`, `created_at`, `updated_at`) VALUES
(1, 'mamoon@test.com', 0, 'MD. MAMOON Ab', '01814418723', 'mamoon', '2025-01-31 02:32:49', '2025-01-31 02:32:49'),
(16, '3', 0, '3', '3', '3', '2025-01-31 04:06:43', '2025-01-31 04:06:43'),
(27, 'test@test.com', 0, 'MD. MAMOON Ab', '25245244', 'mamoon', '2025-01-31 04:57:47', '2025-01-31 04:57:47'),
(28, 'test12@test.com', 0, 'MD. MAMOON Ab', '01814418725', '$2y$10$lVjfR4mxOg.1OpExBDbqB.4U/4fMpIA2MFNiMLcadcEwMAwrfY14i', '2025-01-31 05:14:58', '2025-01-31 05:14:58'),
(43, 'test362548@test.com', 0, 'MD. MAMOON Ab', '018144187365', '$2y$10$ScmMfOgN73o72lpglBimjO01vi9Yi49VwU2i.pSkxJ4jl1tprSt8u', '2025-01-31 08:18:49', '2025-01-31 08:18:49'),
(44, 'mamoon036@gmail.com', 0, 'MD. MAMOON Ab', '0181441873625', '$2y$10$PJE33tVs39Zu7dsPmZfC2ecYGMgu6zAlmUCSMgWUxu6pccbWhZ6M6', '2025-01-31 08:19:26', '2025-01-31 08:19:26'),
(49, 'mamoon037@gmail.com', 0, 'MD. MAMOON Ab', '01814418728', '$2y$10$nBVFfRhFbZ8I82g9pS5gcu2FBNvEzTufjDg/.ZtyiJwIVv6C2bsIW', '2025-02-02 17:21:51', '2025-02-02 17:21:51'),
(50, 'gaporeha@mailinator.com', 2, 'Keefe Wallace', '+1 (638) 611-6853', '$2y$10$wxjr1f66WYBtI6DFEvGlX.NNZakwoUGuhVzURWoG3ckBmjB1YnYTS', '2025-02-02 18:17:06', '2025-02-02 18:17:06'),
(53, 'admin@gmail.com', 1, 'admin', '1234567890', '$2a$13$dTsvpA5D7IbXuYedZZvW5OQIiMMA.Qzha1mj.YDol7O4/F4sdoVaS', '2025-02-02 18:34:44', '2025-02-02 18:34:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
