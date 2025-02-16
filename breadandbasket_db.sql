-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for breadandbasket_db
CREATE DATABASE IF NOT EXISTS `breadandbasket_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `breadandbasket_db`;

-- Dumping structure for table breadandbasket_db.ingredients_tb
CREATE TABLE IF NOT EXISTS `ingredients_tb` (
  `ingredient_id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredient_name` varchar(50) NOT NULL,
  `ingredient_stocks` int(11) NOT NULL,
  `ingredient_remaining_stocks` int(11) NOT NULL,
  `ingredient_status` varchar(30) NOT NULL,
  PRIMARY KEY (`ingredient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table breadandbasket_db.inquiry_tb
CREATE TABLE IF NOT EXISTS `inquiry_tb` (
  `inq_id` int(11) NOT NULL AUTO_INCREMENT,
  `inq_fullname` varchar(50) DEFAULT NULL,
  `inq_email` varchar(70) DEFAULT NULL,
  `inq_phone_num` varchar(11) DEFAULT NULL,
  `inq_address` text DEFAULT NULL,
  `inq_message` text DEFAULT NULL,
  `inq_status` varchar(10) DEFAULT NULL,
  `date_time` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`inq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table breadandbasket_db.orders_tb
CREATE TABLE IF NOT EXISTS `orders_tb` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_name` varchar(100) NOT NULL,
  `order_amount` decimal(11,2) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table breadandbasket_db.products_tb
CREATE TABLE IF NOT EXISTS `products_tb` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_image` varchar(90) NOT NULL,
  `product_name` varchar(70) NOT NULL,
  `product_stocks` int(11) NOT NULL,
  `product_remaining_stocks` int(11) NOT NULL,
  `product_price` varchar(20) NOT NULL,
  `product_description` text NOT NULL,
  `product_status` varchar(30) NOT NULL,
  `product_archive` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table breadandbasket_db.tools_tb
CREATE TABLE IF NOT EXISTS `tools_tb` (
  `tool_id` int(11) NOT NULL AUTO_INCREMENT,
  `tool_name` varchar(70) NOT NULL,
  `tool_size` varchar(10) NOT NULL,
  `tool_quantity` int(11) NOT NULL,
  `tool_category` text NOT NULL,
  PRIMARY KEY (`tool_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table breadandbasket_db.transaction_tb
CREATE TABLE IF NOT EXISTS `transaction_tb` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
