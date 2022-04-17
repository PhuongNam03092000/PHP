-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2022 at 07:19 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rfiddatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `DeliveryOrder`
--

CREATE TABLE `DeliveryOrder` (
  `delivery_order_id` varchar(6) NOT NULL,
  `delivery_order_date` date DEFAULT NULL,
  `order_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `DeliveryOrder`
--

-- --------------------------------------------------------

--
-- Table structure for table `DeliveryOrderDetail`
--

CREATE TABLE `DeliveryOrderDetail` (
  `delivery_order_detail_id` mediumint(9) NOT NULL,
  `delivery_order_id` varchar(6) DEFAULT NULL,
  `product_instance_id` varchar(6) DEFAULT NULL,
  `is_checked` tinyint(1) DEFAULT 0,
  `product_name` varchar(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_line_id` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `DeliveryOrderDetail`
--


--
-- Table structure for table `ProductInstance`
--

CREATE TABLE `ProductInstance` (
  `product_instance_id` varchar(6) NOT NULL,
  `product_line_id` varchar(6) DEFAULT NULL,
  `is_purchased` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ProductLine`
--

CREATE TABLE `ProductLine` (
  `product_line_id` varchar(6) NOT NULL,
  `product_name` varchar(20) DEFAULT NULL,
  `product_price` double DEFAULT 0,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `DeliveryOrder`
--
ALTER TABLE `DeliveryOrder`
  ADD PRIMARY KEY (`delivery_order_id`);

--
-- Indexes for table `DeliveryOrderDetail`
--
ALTER TABLE `DeliveryOrderDetail`
  ADD PRIMARY KEY (`delivery_order_detail_id`),
  ADD KEY `delivery_order_id` (`delivery_order_id`);

--
-- Indexes for table `ProductInstance`
--
ALTER TABLE `ProductInstance`
  ADD PRIMARY KEY (`product_instance_id`),
  ADD KEY `product_line_id` (`product_line_id`);

--
-- Indexes for table `ProductLine`
--
ALTER TABLE `ProductLine`
  ADD PRIMARY KEY (`product_line_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `DeliveryOrderDetail`
--
ALTER TABLE `DeliveryOrderDetail`
  MODIFY `delivery_order_detail_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `DeliveryOrderDetail`
--
ALTER TABLE `DeliveryOrderDetail`
  ADD CONSTRAINT `deliveryorderdetail_ibfk_1` FOREIGN KEY (`delivery_order_id`) REFERENCES `DeliveryOrder` (`delivery_order_id`);

--
-- Constraints for table `ProductInstance`
--
ALTER TABLE `ProductInstance`
  ADD CONSTRAINT `productinstance_ibfk_1` FOREIGN KEY (`product_line_id`) REFERENCES `ProductLine` (`product_line_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
