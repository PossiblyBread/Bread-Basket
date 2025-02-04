-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2025 at 04:26 PM
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

--
-- Dumping data for table `inquiry_tb`
--

INSERT INTO `inquiry_tb` (`inq_id`, `inq_fullname`, `inq_email`, `inq_phone_num`, `inq_address`, `inq_message`, `inq_status`, `date_time`) VALUES
(1, 'Adrian Adona', 'adrian2zero@gmail.com', '09184025526', 'Phirst Park Homes, San Ignacio, San Pablo, Laguna', 'Test 3', 'new', NULL),
(2, 'Adrian Adona', 'adrian2zero@gmail.com', '09184025526', 'Phirst Park Homes, San Ignacio, San Pablo, Laguna', 'Test 4', 'new', '2025-02-01 00:03:48'),
(3, 'Adrian Adona', 'adrian2zero@gmail.com', '09184025526', 'Blk42 Lot9 Phirst Park Homes, San Ignacio, San Pablo, Laguna', 'Test 5', 'new', '2025-02-01 00:08:05'),
(4, 'Adrian Adona', 'adrian2zero@gmail.com', '09184025526', 'Blk42 Lot9 Phirst Park Homes, San Ignacio, San Pablo, Laguna', 'Test 7\r\n', 'new', '2025-02-01 00:12:49'),
(5, 'Adrian Adona', 'adrian2zero@gmail.com', '09184025526', 'Blk42 Lot9 Phirst Park Homes, brgy. San Ignacio, San Pablo, Laguna', 'Test 8', 'new', '2025-02-01 00:24:08'),
(6, 'Adrian Adona', 'adrian2zero@gmail.com', '09184025526', 'Blk42 Lot9 Phirst Park Homes, brgy. San Ignacio, San Pablo, Laguna', '\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor quaerat eveniet veritatis. Explicabo consequuntur velit aliquam esse dolorum cumque magnam, aspernatur ex facere quas quidem, nisi doloremque? Nihil, cumque incidunt?', 'new', '2025-02-01 21:50:02'),
(7, 'Adrian Adona', 'adrian2zero@gmail.com', '09184025526', 'Phirst Park Homes, San Ignacio, San Pablo, Laguna', '\r\nLorem, ipsum dolor sit amet \r\nconsectetur adipisicing elit. \r\nDolor quaerat eveniet veritatis. \r\nExplicabo consequuntur velit aliquam \r\n                               esse dolorum cumque magnam, aspernatur ex facere quas quidem, nisi doloremque? Nihil, cumque incidunt?', 'new', '2025-02-01 21:50:26'),
(8, 'Adrian Adona', 'link.adrianadona@gmail.com', '09184025526', 'Blk42 Lot9 Phirst Park Homes, brgy. San Ignacio, San Pablo, 123', '                                                                          yes\r\nwah                            ugag\r\nsad', 'new', '2025-02-02 15:21:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inquiry_tb`
--
ALTER TABLE `inquiry_tb`
  ADD PRIMARY KEY (`inq_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inquiry_tb`
--
ALTER TABLE `inquiry_tb`
  MODIFY `inq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
