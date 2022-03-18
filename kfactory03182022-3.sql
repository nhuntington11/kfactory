-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 18, 2022 at 08:00 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cust_payment_type`
--

INSERT INTO `cust_payment_type` (`payment_key`, `user_id`, `cc_num`, `exp_date`, `ccv`, `amount`) VALUES
(6, 14, 123123123123, '2022-03-31', 449, 8900.02),
(2, 7, 9955884411, '2024-04-30', 456, 400.01),
(3, 8, 134567890001, '2026-02-18', 456, 13999.9),
(4, 8, 23423432423432, '2023-03-28', 987, 15199.9),
(5, 10, 888777111222, '2022-03-21', 98, 9500.01),
(7, 15, 987234324, '2022-03-30', 123, 9500.01),
(8, 16, 876123123123, '2022-03-31', 987, 9500.01),
(9, 17, 9809809811, '2022-03-29', 123, 10000),
(11, 7, 9982324098234, '2022-04-08', 145, 10000),
(12, 21, 91212312312312, '2024-05-23', 723, 9720.01),
(13, 22, 991123019012312, '2024-05-27', 733, 9400.01),
(15, 24, 132231231654, '2022-03-03', 32, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `deactivated_accounts`
--

DROP TABLE IF EXISTS `deactivated_accounts`;
CREATE TABLE IF NOT EXISTS `deactivated_accounts` (
  `user_id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address1` varchar(150) NOT NULL,
  `address2` varchar(150) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` text NOT NULL,
  `password` text NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `deactivated_accounts`
--

INSERT INTO `deactivated_accounts` (`user_id`, `username`, `firstname`, `lastname`, `address1`, `address2`, `city`, `state`, `zip`, `password`, `profile_pic`) VALUES
(20, 'chuntington', 'Cas', 'Huntington', '583 String St', '', 'Salt Lake City', 'UT', '99887', '$2y$10$r36e52L9Vg.ihxp1johbV.auv91RhsjEACiPDyDyejuFBU42RCK.6', ''),
(16, 'bsmart', 'Ben', 'Smart', '987 W North St', '', 'Salt Lake City', 'UT', '88112', '$2y$10$fNDWEdIR9wpPv321shU.2eyIpCvyS9fZOt6zBO/ZDLrOXjtpl7IM6', ''),
(17, 'rtill', 'Rex', 'Till', '9999 SE West St', '', 'Salt Lake City', 'UT', '84106', '$2y$10$EoqtNCX3RUmsOH.IiBs.b.8I1J/9zZn3BwCiLmu4cY4l8vuq8xzxa', ''),
(19, 'ndog', 'Nellie', 'Dog', '583 E Main St', '11', 'Salt Lake City', 'UT', '84111', '$2y$10$utmendNZ/eZ8G5JWG.zVmu4y64GhjR0OTA.DQcTDl6Clm68qby/ra', ''),
(23, 'jdoe', 'Jane', 'Doe', '234 Main St', '5', 'Salt Lake City', 'UT', '87911', '$2y$10$o.SynTxV/HzFbBZOUPzNNuLMCXf9ChKnd/62oYqojv9KknkzmKo9i', ''),
(30, 'aoakley', 'Anne', 'Oakley', '234 String St', '3', 'Salt Lake City ', 'UT', '88888', '$2y$10$VZ0FVN5PcBQt7J4V/.q.aePOFv9/hg7yxi73R4w.V.aMrZp3zJ.NK', ''),
(31, 'jsmith', 'Jim', 'Smith', '456 S West North St', '34', 'Salt Lake City', 'UT', '84411', '$2y$10$5rHjxGoHHvfLW9pNa7l8tOGiShHo5tXE0KKSvAfBHIUfS.AlYVidi', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `purchase_date` text NOT NULL,
  `prod` varchar(50) NOT NULL,
  `prod_id` int NOT NULL,
  `total_price` float NOT NULL,
  `quantity` int NOT NULL,
  `pmd_id` int NOT NULL,
  `fulfilled` int NOT NULL,
  `returned` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `purchase_date`, `prod`, `prod_id`, `total_price`, `quantity`, `pmd_id`, `fulfilled`, `returned`) VALUES
(9, 7, '2022-03-15 18:30:58', 'Salomon', 4, 649.99, 1, 0, 1, 0),
(10, 7, '2022-03-15 18:52:43', 'Atomic', 1, 599.99, 1, 0, 1, 0),
(11, 8, '2022-03-15 18:59:49', 'Kastle', 3, 499.99, 1, 0, 1, 1),
(12, 6, '2022-03-15 19:23:30', 'Volkl', 5, 259.99, 1, 0, 1, 0),
(13, 8, '2022-03-15 20:08:04', 'Kastle', 3, 499.99, 1, 0, 1, 0),
(14, 6, '2022-03-15 20:34:01', 'Salomon', 4, 599.99, 1, 0, 1, 0),
(15, 7, '2022-03-15 21:51:36', 'Volkl', 5, 259.99, 1, 0, 0, 1),
(16, 6, '2022-03-16 19:34:34', 'Volkl', 5, 279.99, 1, 0, 1, 0),
(17, 8, '2022-03-16 20:55:06', 'DPS', 2, 649.99, 1, 0, 1, 1),
(41, 21, '2022-03-18 14:24:39', 'Volkl', 5, 279.99, 1, 0, 1, 0),
(40, 20, '2022-03-18 13:10:17', 'Atomic', 1, 599.99, 1, 0, 1, 0),
(39, 20, '2022-03-18 13:10:06', 'Kastle', 3, 499.99, 1, 0, 0, 1),
(38, 7, '2022-03-18 12:59:51', 'DPS', 2, 649.99, 1, 0, 1, 0),
(37, 17, '2022-03-17 20:06:07', 'Atomic', 1, 599.99, 1, 0, 0, 1),
(24, 7, '2022-03-16 22:59:29', 'Atomic', 1, 599.99, 1, 0, 1, 0),
(25, 7, '2022-03-16 23:09:02', 'DPS', 2, 649.99, 1, 0, 1, 0),
(36, 16, '2022-03-17 19:52:40', 'Kastle', 3, 499.99, 1, 0, 1, 0),
(34, 14, '2022-03-17 19:44:51', 'Salomon', 4, 599.99, 1, 0, 1, 0),
(33, 8, '2022-03-17 19:05:53', 'Kastle', 3, 499.99, 1, 0, 1, 0),
(28, 7, '2022-03-17 14:11:18', 'Kastle', 3, 499.99, 1, 0, 1, 0),
(29, 8, '2022-03-17 14:12:25', 'DPS', 2, 649.99, 1, 0, 1, 1),
(30, 8, '2022-03-17 14:13:04', 'Atomic', 1, 599.99, 1, 0, 0, 1),
(31, 8, '2022-03-17 18:33:33', 'DPS', 2, 649.99, 1, 0, 0, 1),
(42, 22, '2022-03-18 15:41:37', 'Volkl', 5, 279.99, 1, 0, 0, 1),
(43, 22, '2022-03-18 15:41:44', 'Salomon', 4, 599.99, 1, 0, 1, 0),
(44, 14, '2022-03-18 15:42:24', 'Kastle', 3, 499.99, 1, 0, 1, 0),
(45, 23, '2022-03-18 16:46:46', 'Kastle', 3, 499.99, 1, 0, 0, 1),
(46, 30, '2022-03-18 19:30:35', 'Salomon', 4, 599.99, 1, 0, 0, 1),
(47, 30, '2022-03-18 19:34:09', 'DPS', 2, 649.99, 1, 0, 0, 1),
(48, 31, '2022-03-18 19:46:39', 'Atomic', 1, 599.99, 1, 0, 0, 1);

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
('2022-03-17 13:47:25', 35, 15, 7),
('2022-03-16 16:59:29', 24, 7, 2),
('2022-03-16 17:09:02', 25, 7, 2),
('2022-03-17 13:44:51', 34, 14, 6),
('2022-03-17 13:05:53', 33, 8, 3),
('2022-03-17 08:11:18', 28, 7, 2),
('2022-03-17 08:12:25', 29, 8, 3),
('2022-03-17 08:13:04', 30, 8, 4),
('2022-03-17 12:33:33', 31, 8, 3),
('2022-03-17 12:52:22', 32, 10, 5),
('2022-03-17 13:52:40', 36, 16, 8),
('2022-03-17 14:06:07', 37, 17, 9),
('2022-03-18 06:59:51', 38, 7, 2),
('2022-03-18 07:10:06', 39, 20, 10),
('2022-03-18 07:10:17', 40, 20, 10),
('2022-03-18 08:24:39', 41, 21, 12),
('2022-03-18 09:41:37', 42, 22, 13),
('2022-03-18 09:41:44', 43, 22, 13),
('2022-03-18 09:42:24', 44, 14, 6),
('2022-03-18 10:46:46', 45, 23, 14),
('2022-03-18 13:30:35', 46, 30, 16),
('2022-03-18 13:34:10', 47, 30, 17),
('2022-03-18 13:46:39', 48, 31, 18);

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
(2, 'DPS', 'A great all mountain ski for the resort, fun on groomers and fun in powder.', 'ski', 649.99, 15, 179, 'img/dps.png', 12),
(3, 'Kastle', 'A lightweight short ski, excellent for steep narrow couloirs with the bulletproof Dynafit Speedturn binding', 'ski', 499.99, 20, 169, 'img/kastle.png', 16),
(4, 'Salomon', 'For those deeper days get on the wider boards. 181mm long and rockered to really enjoy the deep powder.', 'ski', 599.99, 9, 181, 'img/salomon.png', 6),
(5, 'Volkl', 'A beater pair for the resort designed to take hits and rocks at speed', 'ski', 279.99, 9, 179, 'img/volkl.png', 7);

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

DROP TABLE IF EXISTS `raw_material`;
CREATE TABLE IF NOT EXISTS `raw_material` (
  `material_id` int NOT NULL AUTO_INCREMENT,
  `material_name` varchar(255) NOT NULL,
  `date_purchased` date NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`material_id`, `material_name`, `date_purchased`, `quantity`) VALUES
(1, 'ptex', '2022-03-18', 175),
(2, 'steel_edges', '2022-03-18', 84),
(3, 'plastic', '2022-03-13', 36);

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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`return_id`, `order_id`, `date_returned`, `quantity`, `return_processed`) VALUES
(1, 15, '2022-03-16 14:25:04', 1, 1),
(12, 17, '2022-03-17 12:36:57', 1, 1),
(11, 29, '2022-03-17 12:34:04', 1, 1),
(10, 30, '2022-03-17 12:28:46', 1, 1),
(5, 11, '2022-03-16 15:02:06', 1, 1),
(6, 18, '2022-03-16 15:23:10', 1, 1),
(7, 22, '2022-03-17 06:47:44', 1, 0),
(8, 23, '2022-03-17 06:48:20', 1, 0),
(9, 26, '2022-03-17 06:49:47', 1, 0),
(13, 31, '2022-03-17 12:37:02', 1, 1),
(22, 45, '2022-03-18 10:46:54', 1, 1),
(21, 37, '2022-03-18 10:44:03', 1, 1),
(20, 42, '2022-03-18 09:41:47', 1, 1),
(19, 39, '2022-03-18 07:10:29', 1, 1),
(23, 46, '2022-03-18 13:30:53', 1, 0),
(24, 47, '2022-03-18 13:34:34', 1, 0),
(25, 48, '2022-03-18 13:47:04', 1, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`entry_key`, `user_id`, `role`) VALUES
(1, 6, 'admin'),
(2, 6, 'employee'),
(3, 7, 'customer'),
(4, 8, 'customer'),
(7, 14, 'customer'),
(34, 18, 'employee'),
(33, 22, 'customer'),
(11, 18, 'customer'),
(32, 21, 'customer'),
(26, 8, 'employee'),
(25, 8, 'admin'),
(44, 24, 'customer'),
(45, 25, 'customer'),
(46, 26, 'customer'),
(47, 27, 'customer'),
(48, 28, 'customer'),
(49, 29, 'customer'),
(51, 14, 'employee'),
(52, 14, 'admin');

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
(27, '2022-03-17 08:08:47', '2022-03-17 08:08:47', 15, 'UPS'),
(29, '2022-03-17 12:28:37', '2022-03-17 12:28:37', 15, 'UPS'),
(14, '2022-03-17 17:37:58', '2022-03-17 17:37:58', 15, 'UPS'),
(28, '2022-03-17 17:38:02', '2022-03-17 17:38:02', 15, 'UPS'),
(36, '2022-03-18 06:59:23', '2022-03-18 06:59:23', 15, 'UPS'),
(44, '2022-03-18 09:42:42', '2022-03-18 09:42:42', 15, 'UPS'),
(43, '2022-03-18 09:42:46', '2022-03-18 09:42:46', 15, 'UPS'),
(40, '2022-03-18 09:42:49', '2022-03-18 09:42:49', 15, 'UPS'),
(34, '2022-03-18 09:42:55', '2022-03-18 09:42:55', 15, 'UPS'),
(33, '2022-03-18 10:43:37', '2022-03-18 10:43:37', 15, 'UPS'),
(41, '2022-03-18 13:36:32', '2022-03-18 13:36:32', 15, 'UPS'),
(38, '2022-03-18 13:49:11', '2022-03-18 13:49:11', 15, 'UPS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address1` varchar(150) NOT NULL,
  `address2` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(12) NOT NULL,
  `password` text NOT NULL,
  `profile_pic` varchar(100) NOT NULL DEFAULT 'img/smiley.jpg',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `firstname`, `lastname`, `address1`, `address2`, `city`, `state`, `zip`, `password`, `profile_pic`) VALUES
(6, 'nh', 'Nick', 'Huntington', '123 Main St', '', 'Salt Lake City', 'UT', '84105', '$2y$10$/V6K8dhd1uHXGe.XVMN2LuBe0dBpBtVnp3X4DKsCh1LJHLbkxEBWe', 'img/smiley.jpg'),
(7, 'pjones', 'Paulina', 'Jones', '456 Main St', '3', 'Salt Lake City', 'UT', '84111', '$2y$10$Sp5Wa7CzawHbrJVMe.4uuOkh/mib6K9aVkeXWYa8uZTrsLLR1KpCG', 'img/smiley.jpg'),
(8, 'bsmith', 'Bill', 'Smith', '765 Main St', '', 'Salt Lake City', 'UT', '85255', '$2y$10$XeY4M4r7KsHoQCtT0SqWi.V73wVj6O6H15CQ/fcOrCzZy67Je4ECK', 'img/smiley.jpg'),
(18, 'jkennings', 'Jen', 'Kennings', '92323 E West North St', 'Apt 7', 'Salt Lake City', 'UT', '98878', '$2y$10$3oosDbbfhuvvJIyrQekicuj18JbTKXOzCRuXj/GLIa23CpxD0QNL.', 'img/smiley.jpg'),
(14, 'jdog', 'Jazz', 'Thedog', '456 Main St', '', 'Salt Lake City', 'UT', '84106', '$2y$10$Ci/G9WtgNBrYMJfZkp7CwuF4V3b8frnGUKuyhy1FKwsEPtNBJzPMq', 'img/smiley.jpg'),
(21, 'mmatthews', 'Mike', 'Matthews', '100011 Lake Drive', '', 'Salt Lake City', 'UT', '81220', '$2y$10$x6O4uj69z.Egbh8zbFa/GOSlAzmdgPPEGNzKn5VHBSItVwob2kx12', 'img/smiley.jpg'),
(22, 'hdoe', 'Hannah', 'Doe', '123 Lake St', '87', 'Salt Lake City', 'UT', '84111', '$2y$10$eB8vLQZSGAvxDJiZaYEUC.oJf/c8HiT8ZGPntx5o.7Ai/Nf3Dzqyu', 'img/smiley.jpg'),
(24, 'arun', 'Arun', 'Dhungel', '12312332 asdasda', '', 'SLC', 'UT', '84106', '$2y$10$M/teGWIKNME3cL9tNBgqX.TBqcZ6eZjqDPdmmey/HbGLncvpppq3y', 'img/smiley.jpg'),
(25, 'asmith', 'Adam', 'Smith', '123 St', '', 'Provo', 'UT', '84106', '$2y$10$v7lyI/Ko.rUC6TbuZaLDqej7y3sBny7NOxB0d1TdXKHe5RRmlITj2', 'img/smiley.jpg'),
(26, 'tpynchon', 'Thomas', 'Pynchon', '12132 Rich St', '', 'Layton', 'UT', '84106', '$2y$10$bUL6vjvdIuSdEADEicjTVeta3A18o931vvJdbXVjvRNm.QEVl743C', 'img/smiley.jpg'),
(27, 'jwright', 'Josephine', 'Wright', '455 South Lindon Way', '', 'Orem', 'UT', '84115', '$2y$10$GpOKS7jWctDLl6zjdtucTOqGfIvCyInj5hCD//E4YBRZ77spRNS1G', 'img/smiley.jpg'),
(28, 'smcglick', 'Sarah', 'McGlick', '1234 S Windsor', '', 'Millcreek', 'UT', '45612', '$2y$10$zZmIfPcbtfE9l9J99rcjwevjNp4uN/tG3tzFdSBYsDpFmWTuyOVpa', 'img/smiley.jpg'),
(29, 'schoen', 'Sasha', 'Choen', '12354 St Sander', '', 'Lindon', 'UT', '56245', '$2y$10$BPau5j0OzgCy1JYUu5IO7ekKzC4/l2nddQE8YH/wpxf1dePQd3AHm', 'img/smiley.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
