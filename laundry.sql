-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2017 at 01:34 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(40) NOT NULL,
  `customer_mobile` varchar(15) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `creation_date` date NOT NULL,
  `last_order` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `total_value` varchar(50) NOT NULL,
  `rewards_points` varchar(50) NOT NULL,
  `store_dealer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `customer_mobile`, `customer_address`, `creation_date`, `last_order`, `created_by`, `total_value`, `rewards_points`, `store_dealer`) VALUES
(1, 'Raju', '9876421234', 'New Delhi', '2017-09-21', '12', '', '', '', ''),
(2, 'Ram', '132456898', 'Chennai', '2017-09-20', '100', 'Admin', '1000', '100', 'Store');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'admin@gmail.com', '$2y$10$THa.WVRCVH.R.d2J6afPTeh0Q9g9Yel3NN9ZwXQ1.MOrIoGeD/BgS', 'Administrator', '9890098900', 1, 1, 0, '2015-07-01 18:56:49', 1, '2017-09-14 12:21:12'),
(2, 'subadmin@gmail.com', '$2y$10$fzexjR7K1uRoAQLgaud6M.JrTMSeePTxl.Lf43onpbsz1lbdBi4Mq', 'Sub Admin', '9890098900', 2, 0, 1, '2016-12-09 17:49:56', 1, '2017-09-14 07:39:02'),
(4, 'subadmin2@gmail.com', '$2y$10$XWxpNueoFsVVORTgsaGMu.aTBmOjDJ9hUi.t.fdclGVB6jzP9f1tS', 'Sub Admin 2', '9540441411', 2, 0, 1, '2017-09-13 14:30:46', NULL, NULL),
(5, 'ram@gmail.com', '$2y$10$w2OzA7zD79ogTRgb4.r7HeTN5rPN/2GprVSlvDOINaD1qkjdikvhS', 'Ram', '1123456789', 2, 0, 1, '2017-09-14 09:29:03', NULL, NULL),
(6, 'shyam@gmail.com', '$2y$10$2U.Z7.bUlyRA6k8feenDger36kOZ8bPyMFzJ9wCQXQOTgAeQ1HlTW', 'Shyam', '1214343456', 2, 0, 1, '2017-09-14 11:15:20', 1, '2017-09-14 11:15:38'),
(7, 'shailly@gmail.com', '$2y$10$G4jsDF/i4OnCnyz4IWgZ0OtRlkh4t8Qja9TADNHsIdljoJfuDMNw.', 'Shailly', '3435435345', 2, 0, 1, '2017-09-14 13:24:44', NULL, NULL),
(8, 'ganesh@gmail.com', '$2y$10$cLdf93/UCcJgvvNW4tZ2leSo6JAFvGceS3hMHdyid4aaWU4BwyRyy', 'Ganesh', '3456546576', 2, 0, 1, '2017-09-14 13:25:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `birthday` date NOT NULL,
  `anniversary` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_number` varchar(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `total_ammount` varchar(100) NOT NULL,
  `delivery_date` date NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `discount_coupon` int(100) NOT NULL,
  `total_cloths` varchar(100) NOT NULL,
  `createdDtm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `customer_id`, `total_ammount`, `delivery_date`, `order_status`, `discount_coupon`, `total_cloths`, `createdDtm`) VALUES
(2, '109', 2, '200', '2017-09-27', 'Drying', 8, '100', '2017-09-14 12:21:07'),
(3, '203', 2, '500', '2017-09-28', 'Pressing', 4, '12', '2017-09-14 12:21:49'),
(4, '204', 1, '200', '2017-09-28', 'Staging', 4, '40', '2017-09-14 12:22:05'),
(5, '201', 2, '2000', '2017-09-27', 'Completed', 8, '100', '2017-09-14 13:02:28'),
(6, '201', 2, '2223', '2017-09-28', 'Staging', 9, '122', '2017-09-14 13:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status`) VALUES
(1, 'Picked Up'),
(2, 'Staging'),
(3, 'Washing'),
(4, 'Drying'),
(5, 'Pressing'),
(6, 'Quality Check'),
(7, 'Packaging'),
(8, 'Out for Delivery'),
(9, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `pickup`
--

CREATE TABLE `pickup` (
  `id` int(11) NOT NULL,
  `pickup_number` varchar(100) NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_time` time(6) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` bigint(20) NOT NULL DEFAULT '1',
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `role`) VALUES
(1, 'Admin'),
(2, 'Sub Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `store` varchar(100) NOT NULL,
  `isDealer` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup`
--
ALTER TABLE `pickup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pickup`
--
ALTER TABLE `pickup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
