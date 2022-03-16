-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 16, 2022 at 11:10 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cust_payment_type`
--

INSERT INTO `cust_payment_type` (`payment_key`, `user_id`, `cc_num`, `exp_date`, `ccv`, `amount`) VALUES
(1, 9, 5552223338888, '2022-04-06', 123, 10000),
(2, 7, 9955884411, '2024-04-30', 456, 350.01);

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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `purchase_date`, `prod`, `prod_id`, `total_price`, `quantity`, `pmd_id`, `fulfilled`, `returned`) VALUES
(9, 7, '2022-03-15 18:30:58', '', 0, 649.99, 1, 0, 1, 0),
(10, 7, '2022-03-15 18:52:43', 'Atomic', 1, 599.99, 1, 0, 1, 0),
(11, 8, '2022-03-15 18:59:49', 'Kastle', 3, 499.99, 1, 0, 1, 1),
(12, 6, '2022-03-15 19:23:30', 'Volkl', 5, 259.99, 1, 0, 1, 0),
(13, 8, '2022-03-15 20:08:04', 'Kastle', 3, 499.99, 1, 0, 1, 0),
(14, 6, '2022-03-15 20:34:01', 'Salomon', 4, 599.99, 1, 0, 0, 0),
(15, 7, '2022-03-15 21:51:36', 'Volkl', 5, 259.99, 1, 0, 0, 1),
(16, 6, '2022-03-16 19:34:34', 'Volkl', 5, 279.99, 1, 0, 1, 0),
(17, 8, '2022-03-16 20:55:06', 'DPS', 2, 649.99, 1, 0, 1, 0),
(18, 9, '2022-03-16 21:22:31', 'Atomic', 1, 599.99, 1, 0, 0, 1),
(19, 9, '2022-03-16 22:40:14', 'Atomic', 1, 599.99, 1, 0, 0, 0),
(20, 9, '2022-03-16 22:47:29', 'Kastle', 3, 499.99, 1, 0, 0, 0),
(21, 9, '2022-03-16 22:49:23', 'DPS', 2, 649.99, 1, 0, 0, 0),
(22, 9, '2022-03-16 22:55:33', 'Salomon', 4, 599.99, 1, 0, 0, 0),
(23, 9, '2022-03-16 22:56:07', 'Salomon', 4, 599.99, 1, 0, 0, 0),
(24, 7, '2022-03-16 22:59:29', 'Atomic', 1, 599.99, 1, 0, 0, 0),
(25, 7, '2022-03-16 23:09:02', 'DPS', 2, 649.99, 1, 0, 0, 0);

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
('2022-03-16 17:09:02', 25, 7, 2);

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
(1, 'Atomic', 'A super light carbon ski that is designed to go fast uphill and down', 'ski', 599.99, 10, 179, 'img/atomic.png', 8),
(2, 'DPS', 'A great all mountain ski for the resort, fun on groomers and fun in powder.', 'ski', 649.99, 15, 179, 'img/dps.png', 10),
(3, 'Kastle', 'A lightweight short ski, excellent for steep narrow couloirs with the bulletproof Dynafit Speedturn binding', 'ski', 499.99, 20, 169, 'img/kastle.png', 12),
(4, 'Salomon', 'For those deeper days get on the wider boards. 181mm long and rockered to really enjoy the deep powder.', 'ski', 599.99, 9, 181, 'img/salomon.png', 6),
(5, 'Volkl', 'A beater pair for the resort designed to take hits and rocks at speed', 'ski', 279.99, 9, 179, 'img/volkl.png', 4);

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
  PRIMARY KEY (`return_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`return_id`, `order_id`, `date_returned`, `quantity`) VALUES
(1, 15, '2022-03-16 14:25:04', 1),
(2, 0, '2022-03-16 14:49:58', 0),
(3, 0, '2022-03-16 14:50:22', 0),
(4, 0, '2022-03-16 14:58:11', 0),
(5, 11, '2022-03-16 15:02:06', 1),
(6, 18, '2022-03-16 15:23:10', 1);

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
(5, 9, 'customer');

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
(17, '2022-03-16 15:33:29', '2022-03-16 15:33:29', 15, 'UPS');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
