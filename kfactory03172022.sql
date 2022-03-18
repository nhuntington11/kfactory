-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 17, 2022 at 02:15 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kfactory`
--

-- --------------------------------------------------------

--
-- Table structure for table `cust_payment_type`
--

DROP TABLE IF EXISTS `cust_payment_type`;
CREATE TABLE IF NOT EXISTS `cust_payment_type` (
  `payment_key` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `cc_num` bigint NOT NULL,
  `exp_date` date NOT NULL,
  `ccv` int NOT NULL,
  `amount` float NOT NULL DEFAULT '10000',
  PRIMARY KEY (`payment_key`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cust_payment_type`
--

INSERT INTO `cust_payment_type` (`payment_key`, `user_id`, `cc_num`, `exp_date`, `ccv`, `amount`) VALUES
(1, 9, 5552223338888, '2022-04-06', 123, 10700),
(2, 7, 9955884411, '2024-04-30', 456, 1050),
(3, 8, 134567890001, '2026-02-18', 456, 9350.01),
(4, 8, 23423432423432, '2023-03-28', 987, 9400.01),
(5, 8, 4556580225430470, '2028-04-12', 817, 1050),
(6, 9, 4024007161454037, '2022-04-03', 326, 9400),
(7, 11, 4916537840059154, '2024-02-22', 917, 10700),
(8, 16, 4556231963219754, '2025-04-13', 538, 12000),
(9, 6, 4524354775398506, '2022-05-01', 328, 9350.01),
(10, 24, 4539108184385857, '2026-06-30', 581, 9400.01),
(11, 27, 4916874200105123, '2025-01-10', 130, 1050),
(12, 7, 4539641664990697, '2025-03-09', 887, 10700),
(13, 29, 4539402235758851, '2028-08-21', 446, 10700),
(14, 23, 4485260726305283, '2026-02-19', 306, 1050),
(15, 24, 4539521312628180, '2026-10-06', 762, 12000),
(16, 12, 4024007101796406, '2026-04-13', 603, 12000),
(17, 6, 4133650305061792, '2023-07-25', 258, 12000),
(18, 30, 4024007190735968, '2027-12-04', 913, 9350.01),
(19, 22, 4335859904223606, '2023-09-11', 286, 9350.01),
(20, 13, 4716092411595600, '2023-05-26', 379, 1050),
(21, 28, 4532283464942821, '2028-09-17', 868, 1050),
(22, 6, 4539857343172412, '2023-07-07', 533, 1050),
(23, 9, 4485713876815923, '2029-06-15', 285, 9400),
(24, 27, 4916501383714872, '2028-08-08', 484, 9400),
(25, 13, 4024007163012098, '2029-04-15', 491, 9400),
(26, 27, 4556575152381464, '2025-06-30', 678, 9400),
(27, 19, 4556839333610641, '2027-05-13', 939, 9400.01),
(28, 25, 4556144335359531, '2023-05-08', 968, 9400.01),
(29, 11, 4532408746395718, '2024-02-16', 777, 9400.01),
(30, 30, 4532592868389904, '2028-08-19', 931, 1050); 

-- --------------------------------------------------------

--
-- Table structure for table `makeup`
--

DROP TABLE IF EXISTS `makeup`;
CREATE TABLE IF NOT EXISTS `makeup` (
  `product_id` int NOT NULL,
  `material_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `purchase_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prod` varchar(50) NOT NULL,
  `prod_id` int NOT NULL,
  `total_price` float NOT NULL,
  `quantity` int NOT NULL,
  `pmd_id` int NOT NULL,
  `fulfilled` int NOT NULL,
  `returned` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `purchase_date`, `prod`, `prod_id`, `total_price`, `quantity`, `pmd_id`, `fulfilled`, `returned`) VALUES
(9, 7, '2022-03-15 18:30:58', 'Salomon', 4, 649.99, 1, 0, 1, 0),
(10, 7, '2022-03-15 18:52:43', 'Atomic', 1, 599.99, 1, 0, 1, 0),
(11, 8, '2022-03-15 18:59:49', 'Kastle', 3, 499.99, 1, 0, 1, 1),
(12, 6, '2022-03-15 19:23:30', 'Volkl', 5, 259.99, 1, 0, 1, 0),
(13, 8, '2022-03-15 20:08:04', 'Kastle', 3, 499.99, 1, 0, 1, 0),
(14, 6, '2022-03-15 20:34:01', 'Salomon', 4, 599.99, 1, 0, 0, 0),
(15, 7, '2022-03-15 21:51:36', 'Volkl', 5, 259.99, 1, 0, 0, 1),
(16, 6, '2022-03-16 19:34:34', 'Volkl', 5, 279.99, 1, 0, 1, 0),
(17, 8, '2022-03-16 20:55:06', 'DPS', 2, 649.99, 1, 0, 1, 0),
(18, 9, '2022-03-16 21:22:31', 'Atomic', 1, 599.99, 1, 0, 0, 1),
(19, 9, '2022-03-16 22:40:14', 'Atomic', 1, 599.99, 1, 0, 1, 0),
(20, 9, '2022-03-16 22:47:29', 'Kastle', 3, 499.99, 1, 0, 0, 0),
(21, 9, '2022-03-16 22:49:23', 'DPS', 2, 649.99, 1, 0, 0, 0),
(22, 9, '2022-03-16 22:55:33', 'Salomon', 4, 599.99, 1, 0, 0, 1),
(23, 9, '2022-03-16 22:56:07', 'Salomon', 4, 599.99, 1, 0, 0, 1),
(24, 7, '2022-03-16 22:59:29', 'Atomic', 1, 599.99, 1, 0, 1, 0),
(25, 7, '2022-03-16 23:09:02', 'DPS', 2, 649.99, 1, 0, 1, 0),
(26, 9, '2022-03-17 12:36:00', 'Salomon', 4, 599.99, 1, 0, 0, 1),
(27, 9, '2022-03-17 13:02:48', 'Kastle', 3, 499.99, 1, 0, 1, 0),
(28, 7, '2022-03-17 14:11:18', 'Kastle', 3, 499.99, 1, 0, 0, 0),
(29, 8, '2022-03-17 14:12:25', 'DPS', 2, 649.99, 1, 0, 0, 0),
(30, 8, '2022-03-17 14:13:04', 'Atomic', 1, 599.99, 1, 0, 0, 0),
(31, 11, '2022-03-15 18:59:49', 'Salomon', 4, 599.99, 1, 0, 0, 0), 
(32, 16, '2022-03-15 18:59:49', 'Kastle', 3, 499.99, 1, 0, 0, 0),
(33, 6, '2022-03-15 18:59:49', 'Salomon', 4, 599.99, 1, 0, 0, 0),
(34, 24, '2022-03-16 22:56:07', 'Salomon', 4, 599.99, 1, 0, 0, 0),
(35, 27, '2022-03-16 22:56:07', 'Salomon', 4, 599.99, 1, 0, 0, 0),
(36, 7, '2022-03-15 18:59:49', 'Kastle', 3, 499.99, 1, 0, 0, 0),
(37, 29, '2022-03-16 22:56:07', 'Kastle', 3, 499.99, 1, 0, 0, 0),
(38, 23, '2022-03-15 18:59:49', 'Atomic', 1, 599.99, 1, 0, 0, 0),
(39, 24, '2022-03-17 14:13:04', 'Salomon', 4, 599.99, 1, 0, 0, 0),
(40, 12, '2022-03-16 22:56:07', 'Salomon', 4, 599.99, 1, 0, 0, 1),
(41, 6, '2022-03-15 18:59:49', 'Kastle', 3, 499.99, 1, 0, 0, 1),
(42, 30, '2022-03-15 18:59:49', 'Kastle', 3, 499.99, 1, 0, 0, 1),
(43, 22, '2022-03-16 22:56:07', 'Salomon', 4, 599.99, 1, 0, 0, 1),
(44, 13, '2022-03-15 18:59:49', 'Salomon', 4, 599.99, 1, 0, 0, 1),
(45, 28, '2022-03-17 14:13:04','Salomon', 4, 599.99, 1, 0, 0, 1),
(46, 6, '2022-03-17 14:13:04', 'Atomic', 1, 599.99, 1, 0, 0, 1),
(47, 9, '2022-03-16 22:56:07', 'Salomon', 4, 599.99, 1, 0, 0, 1),
(48, 27, '2022-03-15 18:59:49', 'Salomon', 4, 599.99, 1, 0, 0, 1),
(49, 13, '2022-03-17 14:13:04', 'Atomic', 1, 599.99, 1, 0, 0, 1),
(50, 27, '2022-03-15 18:59:49', 'Salomon', 4, 599.99, 1, 0, 0, 1),
(51, 19, '2022-03-16 22:56:07', 'Salomon', 4, 599.99, 1, 0, 0, 1),
(52, 25, '2022-03-16 22:56:07', 'Atomic', 1, 599.99, 1, 0, 0, 1),
(53, 11, '2022-03-16 22:56:07', 'Salomon', 4, 599.99, 1, 0, 0, 1),
(54, 30, '2022-03-17 14:13:04', 'Atomic', 1, 599.99, 1, 0, 0, 1),
(55, 13, '2022-03-15 18:59:49', 'DPS', 2, 649.99, 1, 0, 0, 1),
(56, 22, '2022-03-16 22:56:07', 'Atomic', 1, 599.99, 1, 0, 0, 1),
(57, 30, '2022-03-17 14:13:04', 'Kastle', 3, 499.99, 1, 0, 0, 1),
(58, 13, '2022-03-15 18:59:49', 'Atomic', 1, 599.99, 1, 0, 0, 1),
(59, 22, '2022-03-16 22:56:07', 'DPS', 2, 649.99, 1, 0, 0, 1),
(60, 22, '2022-03-16 22:56:07', 'Atomic', 1, 599.99, 1, 0, 0, 1)
(61, 13, '2022-03-15 18:59:49', 'Kastle', 3, 499.99, 1, 0, 0, 1),
(62, 13, '2022-03-15 18:59:49', 'DPS', 2, 649.99, 1, 0, 0, 1),
(63, 30, '2022-03-17 14:13:04', 'DPS', 2, 649.99, 1, 0, 0, 1),
(64, 22, '2022-03-16 22:56:07', 'Kastle', 3, 499.99, 1, 0, 0, 1),
(65, 22, '2022-03-16 22:56:07', 'Atomic', 1, 599.99, 1, 0, 0, 1),
(66, 30, '2022-03-17 14:13:04', 'Kastle', 3, 499.99, 1, 0, 0, 1); 

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `payment_id` int NOT NULL,
  PRIMARY KEY (`order_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`date`, `order_id`, `user_id`, `payment_id`) VALUES
('2022-03-16 16:56:07', 23, 9, 1),
('2022-03-16 16:59:29', 24, 7, 2),
('2022-03-16 17:09:02', 25, 7, 2),
('2022-03-17 06:36:00', 26, 9, 1),
('2022-03-17 07:02:48', 27, 9, 1),
('2022-03-17 08:11:18', 28, 7, 2),
('2022-03-17 08:12:25', 29, 8, 3),
('2022-03-17 08:13:04', 30, 8,5 4);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `prod_id` int NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `manufacturing_cost` float NOT NULL,
  `dimensions` int NOT NULL,
  `img_path` varchar(300) NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`prod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `description`, `type`, `price`, `manufacturing_cost`, `dimensions`, `img_path`, `quantity`) VALUES
(1, 'Atomic', 'A super light carbon ski that is designed to go fast uphill and down', 'ski', 599.99, 10, 179, 'img/atomic.png', 10),
(2, 'DPS', 'A great all mountain ski for the resort, fun on groomers and fun in powder.', 'ski', 649.99, 15, 179, 'img/dps.png', 9),
(3, 'Kastle', 'A lightweight short ski, excellent for steep narrow couloirs with the bulletproof Dynafit Speedturn binding', 'ski', 499.99, 20, 169, 'img/kastle.png', 20),
(4, 'Salomon', 'For those deeper days get on the wider boards. 181mm long and rockered to really enjoy the deep powder.', 'ski', 599.99, 9, 181, 'img/salomon.png', 7),
(5, 'Volkl', 'A beater pair for the resort designed to take hits and rocks at speed', 'ski', 279.99, 9, 179, 'img/volkl.png', 8);

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

DROP TABLE IF EXISTS `raw_material`;
CREATE TABLE IF NOT EXISTS `raw_material` (
  `material_id` int NOT NULL AUTO_INCREMENT,
  `material_name` varchar(255) NOT NULL,
  `date_purchased` datetime NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`material_id`, `material_name`, `date_purchased`, `quantity`) VALUES
(1, 'ptex', '2022-03-13 18:06:31', 8),
(2, 'steel_edges', '2022-03-13 18:06:31', 7),
(3, 'plastic', '2022-03-13 18:06:31', 7);

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

DROP TABLE IF EXISTS `returns`;
CREATE TABLE IF NOT EXISTS `returns` (
  `return_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `date_returned` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` int NOT NULL,
  `return_processed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`return_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`return_id`, `order_id`, `date_returned`, `quantity`, `return_processed`) VALUES
(1, 15, '2022-03-16 14:25:04', 1, 1),
(5, 11, '2022-03-16 15:02:06', 1, 1),
(6, 18, '2022-03-16 15:23:10', 1, 0),
(7, 22, '2022-03-17 06:47:44', 1, 0),
(8, 23, '2022-03-17 06:48:20', 1, 0),
(9, 26, '2022-03-17 06:49:47', 1, 0),
(10, 40, '2022-04-16 22:56:07', 1, 0),
(11, 41, '2022-04-16 22:56:07', 1, 0),
(12, 42, '2022-04-16 22:56:07', 1, 0),
(13, 43, '2022-04-16 22:56:07', 1, 0),
(14, 44, '2022-04-16 22:56:07', 1, 0),
(15, 45, '2022-04-16 22:56:07', 1, 0),
(16, 46, '2022-04-16 22:56:07', 1, 0),
(17, 47, '2022-04-16 22:56:07', 1, 0),
(18, 48, '2022-04-16 22:56:07', 1, 0),
(19, 49, '2022-04-16 22:56:07', 1, 0),
(20, 50, '2022-04-16 22:56:07', 1, 0),
(21, 51, '2022-04-16 22:56:07', 1, 0),
(22, 52, '2022-04-16 22:56:07', 1, 0),
(23, 53, '2022-04-16 22:56:07', 1, 0),
(24, 54, '2022-04-16 22:56:07', 1, 0),
(25, 55, '2022-05-16 22:56:07', 1, 0),
(26, 56, '2022-05-16 22:56:07', 1, 0),
(27, 57, '2022-05-16 22:56:07', 1, 0),
(28, 58, '2022-05-16 22:56:07', 1, 0),
(29, 59, '2022-05-16 22:56:07', 1, 0),
(30, 60, '2022-05-16 22:56:07', 1, 0),
(31, 61, '2022-05-16 22:56:07', 1, 0),
(32, 62, '2022-05-16 22:56:07', 1, 0),
(33, 63, '2022-05-16 22:56:07', 1, 0),
(34, 64, '2022-05-16 22:56:07', 1, 0),
(35, 65, '2022-05-16 22:56:07', 1, 0),
(36, 66, '2022-05-16 22:56:07', 1, 0);
-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `entry_key` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`entry_key`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`entry_key`, `user_id`, `role`) VALUES
(1, 6, 'admin'),
(2, 6, 'employee'),
(3, 7, 'customer'),
(4, 8, 'customer'),
(5, 9, 'customer'),
(6, 10, 'customer'),
(7, 11, 'customer'),
(8, 12, 'customer'),
(9, 13, 'customer'),
(10, 14, 'customer'),
(11, 15, 'customer'),
(12, 16, 'customer'),
(13, 17, 'customer'),
(14, 18, 'customer'),
(15, 19, 'customer'),
(16, 20, 'customer'),
(17, 21, 'customer'),
(18, 22, 'customer'),
(19, 23, 'customer'),
(20, 24, 'customer'),
(21, 25, 'customer'),
(22, 26, 'customer'),
(23, 27, 'customer'),
(24, 28, 'customer'),
(25, 29, 'customer'),
(26, 30, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

DROP TABLE IF EXISTS `shipping`;
CREATE TABLE IF NOT EXISTS `shipping` (
  `order_id` int NOT NULL,
  `ship_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shipping_cost` float NOT NULL,
  `carrier` varchar(25) NOT NULL DEFAULT 'UPS',
  PRIMARY KEY (`order_id`,`ship_date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`order_id`, `ship_date`, `delivery_date`, `shipping_cost`, `carrier`) VALUES
(17, '2022-03-16 15:33:29', '2022-03-16 15:33:29', 15, 'UPS'),
(19, '2022-03-17 06:36:25', '2022-03-17 06:36:25', 15, 'UPS'),
(24, '2022-03-17 06:36:29', '2022-03-17 06:36:29', 15, 'UPS'),
(25, '2022-03-17 06:36:32', '2022-03-17 06:36:32', 15, 'UPS'),
(27, '2022-03-17 08:08:47', '2022-03-17 08:08:47', 15, 'UPS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address1` varchar(150) NOT NULL,
  `address2` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `zip` varchar(12) NOT NULL,
  `state` varchar(2) NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `profile_pic` varchar(100) NOT NULL DEFAULT 'img/smiley.jpg',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `address1`, `address2`, `city`, `zip`, `state`, `password`, `profile_pic`) VALUES
(6, 'Nick', 'Huntington', 'nh@kfactory.com', '123 Main St', '', 'Salt Lake City', '84105', 'UT', '$2y$10$cr9bL2xeZ/e4ZS6er.imtekPBphMAu/LZNUvvEMdzOZ25Ky0zqcwC', 'img/smiley.jpg'),
(7, 'Paulina', 'Jones', 'pjones@test.com', '456 Main St', '3', 'Salt Lake City', '84111', 'UT', '$2y$10$GvmfXTRivHi8i46tTI/mpO32uhigdt2BjHKWqA5Z3LbIvzX0PXPbi', 'img/smiley.jpg'),
(8, 'Bill', 'Smith', 'bsmith@test.com', '765 Main St', '', 'Salt Lake City', '85255', 'UT', '$2y$10$cVw9WeOnNIapF3NSNR3YxuyQ2FHm77CrRWiBG.fmKhiQOgLI1FDf6', 'img/smiley.jpg'),
(9, 'Tom', 'Tom', 'tt@test.com', '569 E Main St', '2', 'Salt Lake City', '84105', 'UT', '$2y$10$zP1buH./Y/CZdwgK0rMlOexCJcHQ0NhI5XwdeVRoiZwrxzVAxHusW', 'img/smiley.jpg');
(10, 'Molly', 'Terry', 'mt@kfactory.com', '593 Argyle Dr.', '', 'Fairfield', '06824', 'CT', '
(11, 'Katherine', 'Jones', 'kj@kfactory.com', '467 Circle Street', '', 'Henderson', 42420, 'KY,
(12, 'Lynda', 'West', 'lw@kfactory.com', '9601 Wentworth Dr', '', 'North HAven', 06473, 'CT',
(13, 'Kevin', 'Holmes', 'kh@kfactory.com', '667 Thatcher Court', '', 'Shirley', 11967, 'NY',
(14, 'Vicki', 'Ruiz', 'vr@kfactory.com', '358 Bald Hill Dr', '', 'North Brunswick', 08902, 'NJ',
(15, 'Carl', 'Mcdaniel', 'cm@kfactory.com', '9873 Princess Dr', '', 'Centreville', 20120, 'VA',
(16, 'Jaime', 'Sutton', 'js@kfactory.com', '2 North Hill Road', '', 'South Ozone Park', 11420, 'NY',
(17, 'Blanche', 'Hanson', 'bh@kfactory.com'', '9758 Berkshire St.', '', 'Olympia', 98512, 'WA',
(18, 'Darlene', 'Franklin', 'df@kfactory.com', '9343 Rose Dr', '', 'Danville', 24540, 'VA',
(19, 'Ernesto', 'Rodriquez', 'er@kfactory.com', '246 Jennings Street', '', 'Lancaster', 14086, 'NY',
(20, 'Adam', 'Mills', 'am@kfactory.com', '645 Plumb Branch Lane', '', 'Pearl', 39208, 'MS', 
(21, 'Lester', 'Franklin', 'lf@kfactory.com', '2 Ann Lane', '', 'Helotes', 78023, 'TX',
(22, 'Caroline', 'Fisher', 'cf@kfactory.com', '915 Oak Street', '', 'Mount Holly', 08060, 'NJ',
(23, 'Janis', 'Gordon', 'jg@kfactory.com', '7621 Harvey Dr', '', 'Streamwood', 60107, 'IL', 
(24, 'Anna', 'Manning', 'am@kfactory.com', '7575 Harvey Dr', '', 'Muskegon', 49441, 'MI',
(25, 'Holly', 'Richardson', 'hr@kfactory.com', '80 St Margarets Ave', '', '46321, 'IN', 
(26, 'Pete', 'Rhodes', 'pr@kfactory.com', '17 W. St Paul Circle', '', 'Newton', 07860, 'NJ',
(27, 'Jana', 'Zimmerman', 'jz@kfactory.com', '7559 Ridgeview Street', '', 'Burke', 22015, 'VA',
(28, 'Orlando', 'Price', 'op@kfactory.com', '63 James Dr', '', 'Niagara Falls', 14304, 'NY',
(29, 'Latoya', 'Flores', 'lf@kfactory.com', '7134 Buckingham St', '', 'Newark', 07103, 'NJ', 
(30, 'Michele', 'Swanson', 'ms@kfactory.com', '160 Lincoln Dr', '', 'Eugene', 97402, 'OR',
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
