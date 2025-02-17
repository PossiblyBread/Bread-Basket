-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2025 at 05:25 PM
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
-- Database: `breadandbasket_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_tb`
--

CREATE TABLE `account_tb` (
  `account_id` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_tb`
--

INSERT INTO `account_tb` (`account_id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients_tb`
--

CREATE TABLE `ingredients_tb` (
  `ingredient_id` int(11) NOT NULL,
  `ingredient_name` varchar(50) NOT NULL,
  `ingredient_stocks` int(11) NOT NULL,
  `ingredient_remaining_stocks` int(11) NOT NULL,
  `ingredient_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients_tb`
--

INSERT INTO `ingredients_tb` (`ingredient_id`, `ingredient_name`, `ingredient_stocks`, `ingredient_remaining_stocks`, `ingredient_status`) VALUES
(12, 'flour', 100, 100, 'In Stock');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_tb`
--

CREATE TABLE `inquiry_tb` (
  `inq_id` int(11) NOT NULL,
  `inq_fullname` varchar(50) DEFAULT NULL,
  `inq_email` varchar(70) DEFAULT NULL,
  `inq_phone_num` varchar(11) DEFAULT NULL,
  `inq_address` text DEFAULT NULL,
  `inq_message` text DEFAULT NULL,
  `inq_status` varchar(10) DEFAULT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_tb`
--

CREATE TABLE `orders_tb` (
  `order_id` int(11) NOT NULL,
  `order_name` varchar(100) NOT NULL,
  `order_amount` decimal(11,2) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_tb`
--

INSERT INTO `orders_tb` (`order_id`, `order_name`, `order_amount`, `order_date`) VALUES
(23, 'Adrian Adona', 20.00, '2025-02-17'),
(24, 'Adrian Adona', 70.00, '2025-02-17'),
(25, 'Adrian Adona', 70.00, '2025-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `products_tb`
--

CREATE TABLE `products_tb` (
  `product_id` int(11) NOT NULL,
  `product_image` varchar(90) NOT NULL,
  `product_name` varchar(70) NOT NULL,
  `product_stocks` int(11) NOT NULL,
  `product_remaining_stocks` int(11) NOT NULL,
  `product_price` varchar(20) NOT NULL,
  `product_description` text NOT NULL,
  `product_status` varchar(30) NOT NULL,
  `product_archive` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_tb`
--

INSERT INTO `products_tb` (`product_id`, `product_image`, `product_name`, `product_stocks`, `product_remaining_stocks`, `product_price`, `product_description`, `product_status`, `product_archive`) VALUES
(7, 'ProductImg/Pandesal_20250217_201011.jpg', 'Pandesal', 500, 490, '2', 'A classic filipino  bread morning breakfast', 'In Stock', 'on'),
(8, 'ProductImg/SpanishBread_20250217_203912.jpg', 'Spanish Bread', 200, 180, '7', 'Spanish Bread', 'In Stock', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `tools_tb`
--

CREATE TABLE `tools_tb` (
  `tool_id` int(11) NOT NULL,
  `tool_name` varchar(70) NOT NULL,
  `tool_size` varchar(10) NOT NULL,
  `tool_quantity` int(11) NOT NULL,
  `tool_category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tools_tb`
--

INSERT INTO `tools_tb` (`tool_id`, `tool_name`, `tool_size`, `tool_quantity`, `tool_category`) VALUES
(3, 'Pan', 'medium', 5, 'Baking');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_tb`
--

CREATE TABLE `transaction_tb` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_tb`
--

INSERT INTO `transaction_tb` (`order_id`, `product_id`, `qty`, `amount`) VALUES
(23, 7, 10, 20.00),
(24, 8, 10, 70.00),
(25, 8, 10, 70.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_tb`
--
ALTER TABLE `account_tb`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `ingredients_tb`
--
ALTER TABLE `ingredients_tb`
  ADD PRIMARY KEY (`ingredient_id`);

--
-- Indexes for table `inquiry_tb`
--
ALTER TABLE `inquiry_tb`
  ADD PRIMARY KEY (`inq_id`);

--
-- Indexes for table `orders_tb`
--
ALTER TABLE `orders_tb`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products_tb`
--
ALTER TABLE `products_tb`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tools_tb`
--
ALTER TABLE `tools_tb`
  ADD PRIMARY KEY (`tool_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_tb`
--
ALTER TABLE `account_tb`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ingredients_tb`
--
ALTER TABLE `ingredients_tb`
  MODIFY `ingredient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inquiry_tb`
--
ALTER TABLE `inquiry_tb`
  MODIFY `inq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders_tb`
--
ALTER TABLE `orders_tb`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products_tb`
--
ALTER TABLE `products_tb`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tools_tb`
--
ALTER TABLE `tools_tb`
  MODIFY `tool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
