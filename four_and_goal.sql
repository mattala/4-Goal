-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2019 at 03:18 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `four_and_goal`
--

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(3) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `name`, `address`, `rating`, `price`) VALUES
(1, 'Arsenal', 'Ganaklis Alexandria Egypt', 5, 200),
(2, 'MVP', 'Abo Qair Alexandria Egypt', 5, 300),
(4, 'El-Nasr Club', 'Smouha Alexandria Egypt', 0, 250),
(5, 'Maracana Stadium', 'Al-Seyouf Qably Alexandria Egypt ', 0, 160),
(6, 'Stia', 'Qesm Al Ramel Alexandria Egypt', 0, 360);

-- --------------------------------------------------------

--
-- Table structure for table `football_fields`
--
-- Error reading structure for table four_and_goal.football_fields: #1932 - Table 'four_and_goal.football_fields' doesn't exist in engine
-- Error reading data for table four_and_goal.football_fields: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `four_and_goal`.`football_fields`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `gamest`
--

CREATE TABLE `gamest` (
  `id` int(10) NOT NULL,
  `start_at` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(5) DEFAULT '0',
  `field_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gamest`
--

INSERT INTO `gamest` (`id`, `start_at`, `score`, `field_id`) VALUES
(11, 'May 26, 2019', NULL, 2),
(12, 'May 26, 2019', NULL, 4),
(13, 'May 26, 2019', NULL, 5),
(14, 'May 26, 2019', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(20) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` char(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill_rating` float DEFAULT '0',
  `man_of_the_match` int(10) DEFAULT '0',
  `user_id` int(10) NOT NULL,
  `team_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `phone`, `skill_rating`, `man_of_the_match`, `user_id`, `team_id`) VALUES
(7, 'Atallah', '01023202407', 5, 10, 11, 4),
(8, 'Mahmoud', '010232024', NULL, NULL, 0, 4),
(9, 'Shehab', '0102356', NULL, NULL, 0, 1),
(10, 'Shams', '01023202598', NULL, NULL, 14, 4),
(11, 'Ahmed', '010', NULL, NULL, 11, 4),
(12, 'Fares', '0123202407', NULL, NULL, 12, 4),
(13, 'Mohamed', '0102354678', NULL, NULL, 13, 1),
(14, 'Hassen', '01567892312', NULL, NULL, 14, 1),
(15, 'Ali', '010232024579', NULL, NULL, 15, 1),
(16, 'Abdo', '011235579532', NULL, NULL, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'player', 'Default role for players.'),
(2, 'Team Manager', 'Players with extra privileges to manage team and join games. ');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(20) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_size` enum('5','7','11') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `game_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `team_size`, `game_id`) VALUES
(1, 'Test Team', '5', 11),
(4, 'Dream Team', '5', 11),
(8, 'Bayern FC', '5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `email` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role_id`) VALUES
(11, 'mo.atalla96@gmail.com', '$2y$10$hetPdPFGJJ/vLcBXWbdUOO4.8AhxL.C.9qZ9pROavuXnPUJAz7hTq', 2),
(12, 'dfdf@f.com', '$2y$10$QQ8NkMQrJZQ2HU5OAhH01eHciaLn.PXfCMJx9G1ygYEi4TF61Caq2', 1),
(13, 'only1121@gmai.com', '$2y$10$rG.392wehEyGUy58J5pJmunJTx926ubToF81n9mU/W3NlDgv1oA2C', 1),
(14, 'sh@gmail.com', '$2y$10$YcKWFdNjUoJJ7N9mIxJ8HuQxmYSoEDkzZw56wH/EATPR7YVW5nd2m', 1),
(15, 'abc@gmail.com', '$2y$10$vS./Hr2Rs4BvRgCorrD5j.3JKLbxJwXx.d.Zeo.3zUpBK3yksSmwW', 1),
(18, 'fares@gmail.com', '$2y$10$lWL/Htok9D7qlFo4blC4iOmS83ipes96A6xyEwCfC2pfSdhoFmyRS', 1),
(19, 'mm@gmail.com', '$2y$10$ADEXP2wGmQIuLsepDReqH.K/b/R0QmmNDjNLKiC3t24Wdu72TVihi', 1),
(20, 'h@g.com', '$2y$10$6CxpB0zB5Af7mwtFcFKwzurdG/RVRLfzjrzfTN2/WNWD1Pm1Lor0y', 1),
(21, 'ali@g.com', '$2y$10$fR/qD.iH1fJZOm8aZPCt9ui4Ep60LHbpdqkyn0.az7z/PZASIvIGe', 1),
(22, 'abd@gmail.com', '$2y$10$OdMmsJjbnuRejFOdjDCVt.wIMquPYl1IkhH2MfHHROC9k2R8OSVpa', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gamest`
--
ALTER TABLE `gamest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `field_id` (`field_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `players_ibfk_1` (`team_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gamest`
--
ALTER TABLE `gamest`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `gamest` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
