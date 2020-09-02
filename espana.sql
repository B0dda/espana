-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2020 at 03:25 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `espana`
--
CREATE DATABASE IF NOT EXISTS `espana` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `espana`;

-- --------------------------------------------------------

--
-- Table structure for table `branchone`
--

CREATE TABLE `branchone` (
  `id` int(11) NOT NULL,
  `branchOne` varchar(255) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branchone`
--

INSERT INTO `branchone` (`id`, `branchOne`, `category`) VALUES
(1, 'تليفزيونات', 4),
(2, 'كمبيوتر', 4),
(3, 'أدوات الكمبيوتر', 4),
(4, 'الكترونيات', 4),
(5, 'الكاميرات', 4),
(6, 'الأثاث', 5),
(7, 'السرير و الحمام', 5),
(8, 'ديكور المنزل', 5),
(9, 'الحدائق و الجنائن', 5),
(10, 'المطبخ و المائده', 5),
(11, 'العناية بالمنزل', 5),
(12, 'هواتف', 3),
(13, 'تابلت', 3),
(14, 'جيمنج', 3),
(15, 'رجال', 6),
(16, 'نساء', 6),
(17, 'ساعات', 6),
(18, 'أحذية', 6),
(19, 'رياضة', 6),
(20, 'شنط و محافظ', 6),
(21, 'للأطفال', 6),
(22, 'نظارات ومجوهرات', 6);

-- --------------------------------------------------------

--
-- Table structure for table `branchtwo`
--

CREATE TABLE `branchtwo` (
  `id` int(11) NOT NULL,
  `branchTwo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Grocery'),
(2, 'Fresh Food'),
(3, 'Mobiles & Gadgets'),
(4, 'Electronics'),
(5, 'Home & Living'),
(6, 'Fashion');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `feature` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `feature`, `product_id`) VALUES
(1, 'Display Size : 65\"', 1),
(2, 'Display Feature: 4K OLED Display', 1),
(3, 'WebOS Smart TV: Yes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE `login_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `token`, `user_id`, `date`) VALUES
(1, '73fa2880fa32ef6ff483b3b3b9545e60cb5ddbde', 1, '2020-08-30 17:48:12'),
(2, '3808a5445b4672fcb11ce14b41adc81494a10211', 1, '2020-08-30 20:55:49'),
(3, '2f1c49099a1d9b9dbdb53969098cf4a14193cc33', 1, '2020-08-30 20:58:18'),
(4, 'da023a554613038fa5bb8e4a4891f5f1d9ef01cb', 1, '2020-08-30 20:59:46'),
(5, 'de8f5857ec8c9014bea46e9cc931671dc7445c3e', 1, '2020-08-30 21:01:18'),
(6, '8645671a0a557d71c6d82ce958efcad20751a665', 1, '2020-08-30 21:04:10'),
(7, 'b58ccc616d0cdcb0b2ecf08bef25d258f05891ea', 1, '2020-08-30 21:04:55'),
(8, '664be162d633567794f9992cb4bcb17bf3685588', 1, '2020-08-30 21:05:29'),
(9, '4bf2800b47df58086ab4818273050d49acf52ec4', 1, '2020-08-30 21:06:51'),
(10, '6f9764a26e7fcd9cb9de6d1fb814acdc7b0f61f4', 1, '2020-08-30 21:23:59'),
(11, 'b014ecaa4a7fb90c884abe211b6eec23ab60b431', 1, '2020-08-30 21:24:47'),
(12, 'cc034766577c531554a8d24cb306de87805b1175', 1, '2020-08-30 21:27:06'),
(13, 'ce8ea7ad151eda7290c36ce93b2ce3761c245f10', 2, '2020-08-30 21:30:14'),
(14, 'a3e630151a03b0da74a7b4ea356933b9442474fb', 1, '2020-08-30 21:33:04'),
(15, 'bcd6f52c49bfb0423f7edee53c2de21e6ec84113', 2, '2020-08-30 21:34:56'),
(16, 'c007d560f8830e46da348f7d2adcc82030ecc38b', 1, '2020-08-30 21:36:59'),
(17, 'fd2103e3125729526689742460857761f43d4527', 1, '2020-08-30 21:37:50'),
(18, 'a145bddc903056c393d53499f73c419490a2b92c', 2, '2020-08-30 21:40:57'),
(19, '96ecffa271e6f458ef034e4445c21ee5585c02ff', 1, '2020-08-30 21:42:20'),
(20, '0b8302c2defb58ca193d80ba70308da299bc6eb5', 1, '2020-08-30 21:48:02'),
(21, '1b9bdfbe2bb76058d3a960b820d5e190970a6808', 1, '2020-08-30 21:49:07'),
(22, 'ff5edfabc93f814bc1a276328b4b0eb604f1d084', 1, '2020-08-30 21:51:17'),
(23, '1f90c78da4a81144004af34a30773e13fc2cab9f', 1, '2020-08-30 21:52:55'),
(24, 'cf39128f111dc62648dd315eede39170c0f06b55', 1, '2020-08-30 21:56:51'),
(25, '023d98744aed83a7c87578ac987b0003079b64af', 1, '2020-08-30 21:57:56'),
(26, '7f6416cbe9c81efb62fb99e50f6dd65d93369e73', 1, '2020-08-30 22:02:39'),
(27, 'f3f2e82f6a49e15921ac1b960d018c19e6c1674a', 1, '2020-08-30 22:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` varchar(24) NOT NULL,
  `brand` varchar(64) NOT NULL,
  `features` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `branchOne` int(11) NOT NULL,
  `branchTwo` int(11) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `paymentDetails` varchar(1500) NOT NULL,
  `images` int(11) NOT NULL,
  `isAvailable` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `brand`, `features`, `category`, `branchOne`, `branchTwo`, `description`, `paymentDetails`, `images`, `isAvailable`) VALUES
(1, 'LG OLED TV 65 Inch GX Series OLED65GXPVA 65\" (2020)', '10,999.00', 'LG', 3, 4, 1, 0, '4 HDMI,(Version 2.1 ),eARC (HDMI2),3 USB, LAN,Composite In (AV),RF In,SPDIF (Optical Digital Audio Out),Headphone out,Line out,IR Blaster,Wifi,Bluetooth', 'Payment method Accepted. OnlinePayment. You can pay by using Master Visa and Amex Credit Card. Only GCC card Accepted Corporate Cards Not accepted. .', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phone`, `password`) VALUES
(1, 'Abdelrahman', 'sayed', 'abdelrahman3aysh@hotmail.com', '01158999135', '$2y$10$tTQ8UKFrJRC8BbdFF2Kc2ucVNaq68CKYr1Dc.R68aw0G8iIv6ctPW'),
(2, 'Abdelrahman', 'sayed', 'squvacreativeagency@gmail.com', '01158999', '$2y$10$sGFfw6Xw3uRkRspVuEGIK.C8yAe.aKb0tpCFhf3NIwf3e8WqUPIPi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branchone`
--
ALTER TABLE `branchone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `branchtwo`
--
ALTER TABLE `branchtwo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `branchOne` (`branchOne`),
  ADD KEY `branchTwo` (`branchTwo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branchone`
--
ALTER TABLE `branchone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `branchtwo`
--
ALTER TABLE `branchtwo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branchone`
--
ALTER TABLE `branchone`
  ADD CONSTRAINT `branchone_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

--
-- Constraints for table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `features_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`branchOne`) REFERENCES `branchone` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
