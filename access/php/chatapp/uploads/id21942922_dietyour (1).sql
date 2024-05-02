-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2024 at 07:19 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21942922_dietyour`
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
  `lastname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `password`, `user_type`, `firstname`, `lastname`) VALUES
(7, '$2y$10$14Ed3uxc39vMdU8QVzzDXOxWQnDg8/ZzW/4BcBjACPYbp44dNrlsS', 'admin', 'Game ', 'Top');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `type` int(11) NOT NULL,
  `place_main` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `type`, `place_main`, `created_at`, `updated_at`) VALUES
(183, 'c++', 'While we designed this website, Information architecture and visual hierarchy was the most essential part of the e-commerce website UX process. We ensured the user could quickly and intuitively navigate the site with such a varied product assortment.\r\n\r\nDo you like the design? We would love to know!', 1, 'article', '2024-03-02 23:14:19', '2024-03-02 23:14:19'),
(184, 'Hellow', 'Programming is paradise ', 1, 'article', '2024-03-06 19:21:03', '2024-03-06 19:21:03'),
(189, 'hi', 'jijiljillj', 3, 'Phsiopath', '2024-03-08 13:03:56', '2024-03-08 13:03:56'),
(190, 'llllllllll', 'l;kl;lk;l', 2, 'Phsiopath', '2024-03-08 13:35:40', '2024-03-08 13:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `article_files`
--

CREATE TABLE `article_files` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article_files`
--

INSERT INTO `article_files` (`id`, `article_id`, `file_path`) VALUES
(163, 190, 'uploads/Group.svg');

-- --------------------------------------------------------

--
-- Table structure for table `article_links`
--

CREATE TABLE `article_links` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `link_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article_links`
--

INSERT INTO `article_links` (`id`, `article_id`, `link_url`) VALUES
(162, 189, 'https://www.youtube.com/c/AtmosGames'),
(163, 189, 'https://www.youtube.com/c/AtmosGames');

-- --------------------------------------------------------

--
-- Table structure for table `equivalence`
--

CREATE TABLE `equivalence` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equivalence`
--

INSERT INTO `equivalence` (`id`, `title`, `description`, `created_at`) VALUES
(15, '23', '23223', '2024-03-08 12:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `equivalence_images`
--

CREATE TABLE `equivalence_images` (
  `id` int(11) NOT NULL,
  `equivalence_id` int(11) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equivalence_images`
--

INSERT INTO `equivalence_images` (`id`, `equivalence_id`, `image_path`) VALUES
(85, 15, 'uploads/download.jpg'),
(86, 15, 'uploads/download (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `file_path` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `created_at`, `file_path`) VALUES
(24, 7, 18, 'hi', '2024-03-04 21:54:48', ''),
(25, 7, 18, 'look there ', '2024-03-04 21:55:11', 'uploads/MyWork1.png'),
(26, 18, 7, 'you get wrong go to see course about uml', '2024-03-04 21:55:37', ''),
(27, 18, 7, 'this is link :<br />\r\n<br />\r\n<br />\r\nhttps://www.youtube.com/watch?v=pCK6prSq8aw&pp=ygUgdW1sIHNlcXVlbmNlIGRpYWdyYW0gZnVsbCBjb3Vyc2U%3D', '2024-03-04 21:56:14', ''),
(28, 7, 18, 'thanks<br />\r\n', '2024-03-04 21:56:31', ''),
(29, 7, 18, 'hello', '2024-03-04 22:19:19', ''),
(30, 7, 18, 'Hi see that ', '2024-03-06 19:26:47', ''),
(31, 7, 18, '', '2024-03-06 19:27:27', 'uploads/VID20240306202706.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `physiologies`
--

CREATE TABLE `physiologies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `video_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `physiologies`
--

INSERT INTO `physiologies` (`id`, `title`, `video_path`) VALUES
(1, 'hello', '/access/php/admin_page/uploads/ghg.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT 'user',
  `weight` double DEFAULT NULL,
  `length` double DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `admin_id`, `firstname`, `lastname`, `age`, `birthday`, `gender`, `city`, `phone`, `user_type`, `weight`, `length`, `date_added`) VALUES
(18, '$2y$10$ijHpb.os5hq/itMuUJno..bF5klzX0wCdwKBbMAjHgQxVkpv5rhfS', NULL, 'Alliche', 'Amine', 12, '2024-04-15', 'ذكر', 'Meadia', '0792272086', 'user', 50, 1.68, '2024-02-29 19:52:50'),
(21, '$2y$10$0xRDRkGJPKQKmwHSrhmLXeXGGRXgwO1/ASNBOOYnXyz1Bins.hr1.', NULL, 'my love', 'c++', 21, NULL, 'ذكر', 'Meadia', '0792272000', 'user', 50, 1.12, '2024-03-01 07:56:32'),
(22, '$2y$10$mewz.rDs5uovMCCosppx.uwNTwrSUxS8sBZmlErEPbLhdaq6kXXGy', NULL, 'admin', '00', 20, NULL, 'أنثى', 'ALG', '0512345678', 'user', 50, 150, '2024-03-01 18:35:03'),
(23, '$2y$10$oDawXCZEoV9cZmvzdRcfE.Mjsf/ywo03f/D/BS2dbV385vTOii50.', NULL, 'مبرمج', 'ناجح', 20, NULL, 'ذكر', 'Meadia', '0792272086', 'user', 45, 111, '2024-03-01 18:36:16'),
(24, '$2y$10$QlwxyoKPmbf39uoLf0C0Se5sWvQc7UTNt02i4YiZSsX.JAKQomTB6', NULL, 'Alliche', 'Amine', 28, NULL, 'أنثى', 'Meadia', '0792272086', 'user', 12, 1.58, '2024-03-06 19:19:36'),
(25, '$2y$10$iMv5EiYcgmZBdv3qcyRZ7eGu0TY.JY1nleNnJ2xVB6GHYKJiNA2Li', NULL, 'afdal', 'dlg', 999, NULL, 'ذكر', 'Deeeeezneeef', '09999999999', 'user', 199, 199, '2024-03-13 11:37:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_files`
--
ALTER TABLE `article_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `article_links`
--
ALTER TABLE `article_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `equivalence`
--
ALTER TABLE `equivalence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equivalence_images`
--
ALTER TABLE `equivalence_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equivalence_id` (`equivalence_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physiologies`
--
ALTER TABLE `physiologies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `article_files`
--
ALTER TABLE `article_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `article_links`
--
ALTER TABLE `article_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `equivalence`
--
ALTER TABLE `equivalence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `equivalence_images`
--
ALTER TABLE `equivalence_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `physiologies`
--
ALTER TABLE `physiologies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_files`
--
ALTER TABLE `article_files`
  ADD CONSTRAINT `article_files_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `article_links`
--
ALTER TABLE `article_links`
  ADD CONSTRAINT `article_links_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `equivalence_images`
--
ALTER TABLE `equivalence_images`
  ADD CONSTRAINT `equivalence_images_ibfk_1` FOREIGN KEY (`equivalence_id`) REFERENCES `equivalence` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
