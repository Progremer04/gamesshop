-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 01:15 AM
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
-- Database: `ecommerse_gamer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'admin',
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `gmail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `password`, `user_type`, `firstname`, `lastname`, `gmail`) VALUES
(0, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(255) NOT NULL,
  `UserID` int(255) DEFAULT NULL,
  `product_id` int(255) DEFAULT NULL,
  `type_pruduct` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `UserID`, `product_id`, `type_pruduct`) VALUES
(20, 1, 8, 'favorite_game'),
(21, 0, 8, 'favorite_game'),
(26, 0, 0, ''),
(27, 0, 0, ''),
(28, 1, 9, 'favorite_game'),
(29, 1, 9, 'favorite_game'),
(30, 1, 5, 'digital_codes'),
(31, 1, 3, 'digital_codes'),
(32, 1, 8, 'favorite_game'),
(35, 3, 8, 'favorite_game'),
(36, 3, 8, 'favorite_game'),
(38, 2, 9, 'favorite_game'),
(39, 2, 8, 'favorite_game');

-- --------------------------------------------------------

--
-- Table structure for table `digital_codes`
--

CREATE TABLE `digital_codes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `platform` varchar(500) NOT NULL DEFAULT 'pc',
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `digital_codes`
--

INSERT INTO `digital_codes` (`id`, `title`, `description`, `price`, `image_url`, `platform`, `UserID`) VALUES
(3, 'fg', ' ', '120', '/access/upload/peakpx.jpg', 'pc', NULL),
(4, 'fg', ' ', '120', '/access/upload/peakpx.jpg', 'pc', NULL),
(5, 'digital', ' ', '120', '/access/upload/peakpx.jpg', 'pc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `favorite_game`
--

CREATE TABLE `favorite_game` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `platform` varchar(500) NOT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorite_game`
--

INSERT INTO `favorite_game` (`id`, `title`, `description`, `price`, `image_url`, `platform`, `UserID`) VALUES
(8, 'rsedent', ' ', '120', '/access/upload/1338218.png', 'pc xbox', NULL),
(9, 'code v', ' ', '123 DA 4$', '/access/upload/peakpx.jpg', 'pc xbox', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gift_card`
--

CREATE TABLE `gift_card` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `edit` int(3) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `file_path` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pcaccount`
--

CREATE TABLE `pcaccount` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `platform` varchar(500) NOT NULL DEFAULT 'pc',
  `type_account` varchar(255) NOT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pcgames`
--

CREATE TABLE `pcgames` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `platform` varchar(500) NOT NULL DEFAULT 'pc',
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Platform` varchar(255) NOT NULL,
  `time_subscriptions` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'user',
  `password` varchar(255) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `gmail` varchar(500) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `password`, `admin_id`, `gmail`, `firstname`, `lastname`, `date_added`) VALUES
(1, 'user', '202cb962ac59075b964b07152d234b70', NULL, 'gamet4821@gmail.com', 'Alliche', 'Amine', '2024-04-08 13:36:41'),
(2, 'user', '202cb962ac59075b964b07152d234b70', NULL, 'pspgamespart@gmail.com', 'Alliche', 'Amine', '2024-04-08 15:18:22'),
(3, 'user', '202cb962ac59075b964b07152d234b70', NULL, 'techvecta0@gmail.com', 'Alliche', 'Amine', '2024-04-23 22:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `xboxaccount`
--

CREATE TABLE `xboxaccount` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `platform` varchar(500) NOT NULL DEFAULT 'xbox',
  `type_account` varchar(255) NOT NULL DEFAULT 'online',
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `xboxgames`
--

CREATE TABLE `xboxgames` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `platform` varchar(500) NOT NULL DEFAULT 'xbox',
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `digital_codes`
--
ALTER TABLE `digital_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_digital_codes` (`UserID`);

--
-- Indexes for table `favorite_game`
--
ALTER TABLE `favorite_game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_favorite_game` (`UserID`);

--
-- Indexes for table `gift_card`
--
ALTER TABLE `gift_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_gift_card` (`UserID`);

--
-- Indexes for table `pcaccount`
--
ALTER TABLE `pcaccount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_pc_account` (`UserID`);

--
-- Indexes for table `pcgames`
--
ALTER TABLE `pcgames`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_pc_games` (`UserID`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_subscription` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xboxaccount`
--
ALTER TABLE `xboxaccount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_xbox_account` (`UserID`);

--
-- Indexes for table `xboxgames`
--
ALTER TABLE `xboxgames`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_xbox_games` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `digital_codes`
--
ALTER TABLE `digital_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `favorite_game`
--
ALTER TABLE `favorite_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gift_card`
--
ALTER TABLE `gift_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pcaccount`
--
ALTER TABLE `pcaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pcgames`
--
ALTER TABLE `pcgames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `xboxaccount`
--
ALTER TABLE `xboxaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xboxgames`
--
ALTER TABLE `xboxgames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `digital_codes`
--
ALTER TABLE `digital_codes`
  ADD CONSTRAINT `fk_user_id_digital_codes` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `favorite_game`
--
ALTER TABLE `favorite_game`
  ADD CONSTRAINT `fk_user_id_favorite_game` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `gift_card`
--
ALTER TABLE `gift_card`
  ADD CONSTRAINT `fk_user_id_gift_card` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pcaccount`
--
ALTER TABLE `pcaccount`
  ADD CONSTRAINT `fk_user_id_pc_account` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pcgames`
--
ALTER TABLE `pcgames`
  ADD CONSTRAINT `fk_user_id_pc_games` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `fk_user_id_subscription` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `xboxaccount`
--
ALTER TABLE `xboxaccount`
  ADD CONSTRAINT `fk_user_id_xbox_account` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `xboxgames`
--
ALTER TABLE `xboxgames`
  ADD CONSTRAINT `fk_user_id_xbox_games` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
