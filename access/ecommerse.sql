-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 05:55 PM
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
-- Database: `ecommerse`
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
(1, '123', 'admin', '1', '1', '9@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `ads_type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `description`, `image_url`, `ads_type`) VALUES
(7, 'tt', 'tt', 'C:\\xampp\\htdocs\\ecommerce\\access\\admin_file/access/upload/aliexpress.png', 'a'),
(8, 'lk', 'lklklk', '0', 'a'),
(9, ';l;l', 'l;;l;l', '7664_wise.png', 'a'),
(10, '89', '8998', '9358_aliexpress.png', 'c'),
(11, 'tesr45', 't\r\nr\r\nr\r\nr\r\n', '/access/upload/aliexpress.png', 'aliexpressorder'),
(12, 'hhjk', 'kljkljkljkljkljljljlkjlkjljklkj\r\njkjkljkljlkjlklkj', '/access/upload/logo.jfif', 'currencyexchange');

-- --------------------------------------------------------

--
-- Table structure for table `aliexpressorder`
--

CREATE TABLE `aliexpressorder` (
  `OrderID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Link` varchar(500) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TotalPrice` decimal(10,2) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserID` int(11) DEFAULT NULL,
  `type_order` varchar(255) DEFAULT 'aliexpressorder'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aliexpressorder`
--

INSERT INTO `aliexpressorder` (`OrderID`, `email`, `password`, `Link`, `ProductName`, `Quantity`, `TotalPrice`, `OrderDate`, `date_added`, `UserID`, `type_order`) VALUES
(2, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:00:06', '2024-03-28 12:00:06', 18, 'aliexpressorder'),
(3, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:00:28', '2024-03-28 12:00:28', 18, 'aliexpressorder'),
(4, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:00:28', '2024-03-28 12:00:28', 18, 'aliexpressorder'),
(5, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:00:32', '2024-03-28 12:00:32', 18, 'aliexpressorder'),
(6, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:00:34', '2024-03-28 12:00:34', 18, 'aliexpressorder'),
(7, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:00:35', '2024-03-28 12:00:35', 18, 'aliexpressorder'),
(8, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:00:47', '2024-03-28 12:00:47', 18, 'aliexpressorder'),
(9, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:00:48', '2024-03-28 12:00:48', 18, 'aliexpressorder'),
(10, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:00:51', '2024-03-28 12:00:51', 18, 'aliexpressorder'),
(11, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:00:52', '2024-03-28 12:00:52', 18, 'aliexpressorder'),
(12, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:00:52', '2024-03-28 12:00:52', 18, 'aliexpressorder'),
(13, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:00:53', '2024-03-28 12:00:53', 18, 'aliexpressorder'),
(14, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:00:54', '2024-03-28 12:00:54', 18, 'aliexpressorder'),
(15, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:00:54', '2024-03-28 12:00:54', 18, 'aliexpressorder'),
(16, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:00:55', '2024-03-28 12:00:55', 18, 'aliexpressorder'),
(17, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:00:55', '2024-03-28 12:00:55', 18, 'aliexpressorder'),
(18, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:15:32', '2024-03-28 12:15:32', 18, 'aliexpressorder'),
(19, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:19:35', '2024-03-28 12:19:35', 18, 'aliexpressorder'),
(20, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:20:30', '2024-03-28 12:20:30', 18, 'aliexpressorder'),
(21, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:21:53', '2024-03-28 12:21:53', 18, 'aliexpressorder'),
(22, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, 0.00, '2024-03-28 12:28:21', '2024-03-28 12:28:21', 18, 'aliexpressorder'),
(23, '', '', 'https://chat.openai.com/c/3ccf4ff8-1862-478b-8d07-ea99e9208c05', 'earport', 1, 0.00, '2024-03-28 12:32:34', '2024-03-28 12:32:34', 18, 'aliexpressorder'),
(24, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 1, 0.00, '2024-03-28 12:49:39', '2024-03-28 12:49:39', 18, 'aliexpressorder'),
(25, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 1, 0.00, '2024-03-28 12:50:26', '2024-03-28 12:50:26', 18, 'aliexpressorder'),
(26, '', '', 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 1, 0.00, '2024-03-28 12:53:32', '2024-03-28 12:53:32', 18, 'aliexpressorder'),
(27, '', '', 'http://localhost/phpmyadmin/index.php?route=/sql&db=programer&table=comp&pos=0', 'earport', 3, 0.00, '2024-03-28 13:02:49', '2024-03-28 13:02:49', 18, 'aliexpressorder'),
(28, '', '', 'https://safirikram.github.io/Site2/', 'earport', 2, 0.00, '2024-03-28 13:03:42', '2024-03-28 13:03:42', 18, 'aliexpressorder'),
(29, '', '', 'http://localhost/phpmyadmin/index.php?route=/sql&db=programer&table=comp&pos=0', 'earport', 1, 0.00, '2024-03-28 13:06:31', '2024-03-28 13:06:31', 18, 'aliexpressorder'),
(30, '', '', 'http://localhost/phpmyadmin/index.php?route=/sql&db=programer&table=comp&pos=0', 'earport', 1, 0.00, '2024-03-28 13:13:23', '2024-03-28 13:13:23', 18, 'aliexpressorder'),
(31, '', '', 'http://localhost/phpmyadmin/index.php?route=/sql&db=programer&table=comp&pos=0', 'earport', 1, 0.00, '2024-03-28 13:17:42', '2024-03-28 13:17:42', 18, 'aliexpressorder'),
(32, '', '', 'http://localhost/phpmyadmin/index.php?route=/sql&db=programer&table=comp&pos=0', 'earport', 1, 0.00, '2024-03-28 13:19:55', '2024-03-28 13:19:55', 18, 'aliexpressorder'),
(33, '', '', 'http://localhost/phpmyadmin/index.php?route=/sql&db=programer&table=comp&pos=0', 'earport', 1, 0.00, '2024-03-28 14:32:53', '2024-03-28 14:32:53', 18, 'aliexpressorder'),
(34, '', '', 'http://localhost/phpmyadmin/index.php?route=/sql&db=programer&table=comp&pos=0', 'earport', 1, 0.00, '2024-03-28 14:43:50', '2024-03-28 14:43:50', 18, 'aliexpressorder');

-- --------------------------------------------------------

--
-- Table structure for table `currencyexchange`
--

CREATE TABLE `currencyexchange` (
  `ExchangeID` int(11) NOT NULL,
  `FromCurrency` varchar(3) NOT NULL,
  `ToCurrency` varchar(3) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `ExchangeRate` decimal(10,2) NOT NULL,
  `ConvertedAmount` decimal(10,2) NOT NULL,
  `ExchangeDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserID` int(11) DEFAULT NULL,
  `type_order` varchar(255) DEFAULT 'currencyexchange'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `europeanaddress`
--

CREATE TABLE `europeanaddress` (
  `id` int(11) NOT NULL,
  `Street` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `PostalCode` varchar(10) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `type_order` varchar(255) DEFAULT 'europeanaddress'
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `file_path` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `created_at`, `file_path`) VALUES
(183, 1, 18, '', '2024-03-28 14:16:21', 'uploads/aliexpress.png'),
(184, 1, 18, '', '2024-03-28 14:16:26', ''),
(185, 18, 1, 'helle<br />\r\n', '2024-03-28 14:16:41', '');

-- --------------------------------------------------------

--
-- Table structure for table `redotpaycard`
--

CREATE TABLE `redotpaycard` (
  `CardID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Link` varchar(255) DEFAULT NULL,
  `ActivationStatus` enum('Activated','NotActivated') NOT NULL DEFAULT 'NotActivated',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserID` int(11) DEFAULT NULL,
  `type_order` varchar(255) DEFAULT 'redotpaycard'
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
(17, 'user', '', NULL, '1@gmail.com', '1', '1', '2024-03-24 17:58:49'),
(18, 'user', '', NULL, 'opop@gmail.com', 'Game ', 'Top', '2024-03-24 18:21:23'),
(19, 'user', '$2y$10$nPr/s7XCfppUw76MCVUaPOTTp19GbMWYKbeyPHGy1ZW8qeYIkIytu', NULL, 'gamet4821@gmail.com', 'Alliche', 'Amine', '2024-03-24 18:48:34'),
(20, 'user', '$2y$10$75M.JhIL6waEyxJUuHUKaOC9fZ/YqwvzFBTQCb0CRxpvjJe3bHOge', NULL, 'iagameru1@gmail.com', 'i', 'i', '2024-03-24 18:49:02'),
(21, 'user', '??]??+N?PoX*?gj', NULL, '9999@gmail.com', 'o', 'o', '2024-03-24 18:49:58'),
(22, 'user', 'c4efd5020cb49b9d3257ffa0fbccc0ae', NULL, 'mohamedaliche56@gmail.com', 'm', 'm', '2024-03-24 18:51:27'),
(23, 'user', 'fae0b27c451c728867a567e8c1bb4e53', NULL, '666@gmail.com', '6', '6', '2024-03-26 21:31:01'),
(24, 'user', '202cb962ac59075b964b07152d234b70', NULL, 'pspgamespart@gmail.com', 'Alliche', 'Amine', '2024-03-27 13:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `wisecard`
--

CREATE TABLE `wisecard` (
  `CardID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `ExpiryDate` date NOT NULL,
  `ActivationStatus` enum('Activated','NotActivated') NOT NULL DEFAULT 'NotActivated',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserID` int(11) DEFAULT NULL,
  `type_order` varchar(255) DEFAULT 'wisecard'
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
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aliexpressorder`
--
ALTER TABLE `aliexpressorder`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `fk_user_id_aliexpressorder` (`UserID`);

--
-- Indexes for table `currencyexchange`
--
ALTER TABLE `currencyexchange`
  ADD PRIMARY KEY (`ExchangeID`),
  ADD KEY `fk_user_id_currencyexchange` (`UserID`);

--
-- Indexes for table `europeanaddress`
--
ALTER TABLE `europeanaddress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_europeanaddress` (`UserID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redotpaycard`
--
ALTER TABLE `redotpaycard`
  ADD PRIMARY KEY (`CardID`),
  ADD KEY `fk_user_id_redotpaycard` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `wisecard`
--
ALTER TABLE `wisecard`
  ADD PRIMARY KEY (`CardID`),
  ADD KEY `fk_user_id_wisecard` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `aliexpressorder`
--
ALTER TABLE `aliexpressorder`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `currencyexchange`
--
ALTER TABLE `currencyexchange`
  MODIFY `ExchangeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `europeanaddress`
--
ALTER TABLE `europeanaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `redotpaycard`
--
ALTER TABLE `redotpaycard`
  MODIFY `CardID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `wisecard`
--
ALTER TABLE `wisecard`
  MODIFY `CardID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aliexpressorder`
--
ALTER TABLE `aliexpressorder`
  ADD CONSTRAINT `fk_user_id_aliexpressorder` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Constraints for table `currencyexchange`
--
ALTER TABLE `currencyexchange`
  ADD CONSTRAINT `fk_user_id_currencyexchange` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Constraints for table `europeanaddress`
--
ALTER TABLE `europeanaddress`
  ADD CONSTRAINT `fk_user_id_europeanaddress` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Constraints for table `redotpaycard`
--
ALTER TABLE `redotpaycard`
  ADD CONSTRAINT `fk_user_id_redotpaycard` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `wisecard`
--
ALTER TABLE `wisecard`
  ADD CONSTRAINT `fk_user_id_wisecard` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
