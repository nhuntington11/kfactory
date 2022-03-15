-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 15, 2022 at 09:09 PM
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
-- Table structure for table `orderline`
--

DROP TABLE IF EXISTS `orderline`;
CREATE TABLE IF NOT EXISTS `orderline` (
  `line_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`line_id`)
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
  `total_price` float NOT NULL,
  `pmd_id` int NOT NULL,
  `fulfilled` int NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `purchase_date`, `prod`, `total_price`, `pmd_id`, `fulfilled`) VALUES
(9, 7, '2022-03-15 18:30:58', '', 649.99, 0, 1),
(10, 7, '2022-03-15 18:52:43', 'Atomic', 599.99, 0, 1),
(11, 8, '2022-03-15 18:59:49', 'Kastle', 499.99, 0, 1),
(12, 6, '2022-03-15 19:23:30', 'Volkl', 259.99, 0, 0),
(13, 8, '2022-03-15 20:08:04', 'Kastle', 499.99, 0, 0),
(14, 6, '2022-03-15 20:34:01', 'Salomon', 599.99, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_id` int NOT NULL,
  `cust_id` int NOT NULL,
  `credit_card` int NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(1, 'Atomic', 'A super light carbon ski that is designed to go fast uphill and down', 'ski', 599.99, 10, 179, 'img/atomic.png', 1),
(2, 'DPS', 'A great all mountain ski for the resort, fun on groomers and fun in powder.', 'ski', 649.99, 15, 179, 'img/dps.png', 1),
(3, 'Kastle', 'A lightweight short ski, excellent for steep narrow couloirs with the bulletproof Dynafit Speedturn binding', 'ski', 499.99, 20, 169, 'img/kastle.png', 1),
(4, 'Salomon', 'For those deeper days get on the wider boards. 181mm long and rockered to really enjoy the deep powder.', 'ski', 599.99, 9, 181, 'img/salomon.png', 1),
(5, 'Volkl', 'A beater pair for the resort designed to take hits and rocks at speed', 'ski', 259.99, 9, 179, 'img/volkl.png', 1);

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
(1, 'ptex', '2022-03-13 18:06:31', 12),
(2, 'steel_edges', '2022-03-13 18:06:31', 10),
(3, 'plastic', '2022-03-13 18:06:31', 10);

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

DROP TABLE IF EXISTS `return`;
CREATE TABLE IF NOT EXISTS `return` (
  `return_id` int NOT NULL,
  `order_id` int NOT NULL,
  `date` datetime NOT NULL,
  `quantity` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`entry_key`, `user_id`, `role`) VALUES
(1, 6, 'admin'),
(2, 6, 'employee'),
(3, 7, 'customer'),
(4, 8, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

DROP TABLE IF EXISTS `shipping`;
CREATE TABLE IF NOT EXISTS `shipping` (
  `order_id` int NOT NULL,
  `ship_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `cost` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `address1`, `address2`, `city`, `zip`, `state`, `password`, `profile_pic`) VALUES
(6, 'Nick', 'Huntington', 'nh@kfactory.com', '123 Main St', '', 'Salt Lake City', '84105', 'UT', '$2y$10$Op.PoIWOAe9oxxyauEXz9.LyGcIfkPx0s9LO.8MmkCU9uj2Ti2lm.', 'img/smiley.jpg'),
(7, 'Pauline', 'Jones', 'pjones@test.com', '456 Main St', '3', 'Salt Lake City', '84111', 'UT', '$2y$10$/wkUowcs6ww6p3Lqofnh8ujjhmrNHTYO2cXby6Q4Jn33sQWe1jbiq', 'img/smiley.jpg'),
(8, 'Bill', 'Smithss', 'bsmith@test.com', '765 Main St', '', 'Salt Lake City', '85255', 'UT', '$2y$10$vdzxHjS2.RUNDMaHpPh/8.7IG3nvJTzuAmeWRMIPDqtzg1nomAFmi', 'img/smiley.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
