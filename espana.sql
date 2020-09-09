-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2020 at 09:04 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `country` varchar(64) NOT NULL,
  `government` varchar(64) NOT NULL,
  `country_code` varchar(64) NOT NULL,
  `phone_number` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `title`, `fname`, `lname`, `address1`, `address2`, `country`, `government`, `country_code`, `phone_number`) VALUES
(1, 'موقع كامل لبطولة لعبة فالورنت مع لوحة تحكم', 'Abdelrahman', 'sayed', 'hamouda', 'hamouda', 'Egypt', 'Cairo', '20', '115899135'),
(2, 'موقع كامل لبطولة لعبة فالورنت مع لوحة تحكم', 'Abdelrahman', 'sayed', 'hamouda', 'hamouda', 'Egypt', 'Cairo', '20', '115899135');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `level` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Abdelrahman Sayed', 'bodda@email.com', '$2y$10$xCUp.C/x5stlrrFVMKDHu.HpnGkdND9lCpAsxL8HrqFnj9hXbmGS6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_tokens`
--

CREATE TABLE `admin_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tokens`
--

INSERT INTO `admin_tokens` (`id`, `token`, `user_id`, `date`) VALUES
(1, 'b0505320fa577563850cbf77e5692740fcfa9fdc', 1, '2020-09-07 17:08:19'),
(2, '406a4a4b10b9c310868d8f38772339007220a927', 1, '2020-09-07 17:08:43'),
(3, 'b9265bc485cef0b9ca521fdeeb5040c55d45b80b', 1, '2020-09-07 17:54:52');

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL
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
(3, 'WebOS Smart TV: Yes', 1),
(4, 'Display Size: 6.7 Inches', 2),
(5, 'Processor:Octa Core', 2),
(6, 'Internal Memory:256GB', 2),
(7, 'RAM:8GB', 2),
(8, 'Front Camera:10MP', 2),
(9, '2.73 pounds', 3),
(10, 'Black', 3),
(11, '14.58 x 8.12 x 0.16 inches', 3);

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
(27, 'f3f2e82f6a49e15921ac1b960d018c19e6c1674a', 1, '2020-08-30 22:03:36'),
(28, '6f2ba8d8805648fb2aadb41bedf28afbdcd1d4eb', 1, '2020-09-09 13:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `amount` varchar(64) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `amount`, `status`, `user_id`, `address_id`, `date`) VALUES
(1, '14948', 1, 1, 1, '2020-09-09 17:00:00'),
(2, '14948', 3, 1, 2, '2020-09-09 17:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` varchar(64) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `price`, `quantity`, `order_id`) VALUES
(1, 1, '10999', 2, 1),
(2, 2, '3949', 1, 1),
(3, 1, '10999', 1, 2),
(4, 2, '3949', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Delivered');

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
(1, 'LG OLED TV 65 Inch GX Series OLED65GXPVA 65\" (2020)', '10999', 'LG', 3, 4, 1, 0, '4 HDMI,(Version 2.1 ),eARC (HDMI2),3 USB, LAN,Composite In (AV),RF In,SPDIF (Optical Digital Audio Out),Headphone out,Line out,IR Blaster,Wifi,Bluetooth', 'Payment method Accepted. OnlinePayment. You can pay by using Master Visa and Amex Credit Card. Only GCC card Accepted Corporate Cards Not accepted. .', 0, 1),
(2, 'Samsung Galaxy Note 20 N981 5G 256GB Mystic Bronze', '3949', 'Samsung', 5, 4, 3, 0, 'Fingerprint (under display, ultrasonic), accelerometer, gyro, proximity, compass, barometer,Non-removable Li-Ion 4300 mAh battery', 'Payment method Accepted. OnlinePayment. You can pay by using Master Visa and Amex Credit Card.', 0, 1),
(3, 'Razer BlackWidow TE Chroma v2 TKL Tenkeyless Mechanical Gaming K', '120', 'Razer', 3, 4, 3, 0, 'Zero-Compromise Mechanical Switch for Speed & Accuracy: Razer Orange switch technology provides tactile feedback with a quieter click, requiring 45 G of actuation force; ideal for most gaming and typing experiences', 'Available at a lower price from other sellers that may not offer free Prime shipping.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_image`
--

CREATE TABLE `products_image` (
  `id` int(11) NOT NULL,
  `image` varchar(512) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_image`
--

INSERT INTO `products_image` (`id`, `image`, `product_id`) VALUES
(1, '81lxQgJ8B6L._AC_SL1500_.jpg', 3),
(2, '1715195-01.jfif', 1),
(3, '1715195-02.jfif', 1),
(4, 'note.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `isActivated` tinyint(11) NOT NULL,
  `redirects` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `isActivated`, `redirects`) VALUES
(5, '1.jpg', 0, 'http://localhost/espana/index.php'),
(6, '2.jpg', 1, 'http://localhost/espana/index.php'),
(7, '3.jpg', 1, 'http://localhost/espana/index.php'),
(8, '4.jpg', 1, 'http://localhost/espana/index.php'),
(9, '5.jpg', 1, 'http://localhost/espana/index.php');

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
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_tokens`
--
ALTER TABLE `admin_tokens`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
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
-- Indexes for table `products_image`
--
ALTER TABLE `products_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_tokens`
--
ALTER TABLE `admin_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products_image`
--
ALTER TABLE `products_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `features_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`status`) REFERENCES `order_status` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`branchOne`) REFERENCES `branchone` (`id`);

--
-- Constraints for table `products_image`
--
ALTER TABLE `products_image`
  ADD CONSTRAINT `products_image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
