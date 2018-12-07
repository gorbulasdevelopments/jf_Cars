-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: 213.171.200.99
-- Generation Time: Dec 07, 2018 at 07:47 PM
-- Server version: 5.6.42-log
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jf_cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `sale_table`
--

CREATE TABLE IF NOT EXISTS `sale_table` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_author` varchar(10) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `sale_price` float NOT NULL,
  `sale_summary` varchar(100) NOT NULL,
  `sale_add_date` datetime NOT NULL,
  `sale_complete_date` datetime DEFAULT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `sale_table`
--

INSERT INTO `sale_table` (`sale_id`, `sale_author`, `vehicle_id`, `sale_price`, `sale_summary`, `sale_add_date`, `sale_complete_date`) VALUES
(1, 'MS', 1, 5000, 'MILTEK SPORTS EXHAUST, VXR TURBO, DUMP VALVE', '2018-10-19 00:00:00', NULL),
(5, 'MS', 4, 3599, '', '2018-11-01 00:00:00', NULL),
(15, 'admin', 2, 5000, 'test', '2018-11-05 21:42:21', NULL),
(16, 'admin', 32, 2599, '', '2018-11-06 13:10:11', NULL),
(17, 'admin', 33, 5000, '', '2018-11-06 13:22:42', NULL),
(20, 'admin', 35, 15000, '12345', '2018-11-06 21:58:39', NULL),
(21, 'admin', 34, 5000, 'FSH, EXCELLENT INTERIOR', '2018-11-06 22:22:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE IF NOT EXISTS `users_table` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `user_username`, `user_password`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_image_table`
--

CREATE TABLE IF NOT EXISTS `vehicle_image_table` (
  `vehicle_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `vehicle_image_url` text NOT NULL,
  `vehicle_image_priority` int(11) NOT NULL,
  `vehicle_cover_image` tinyint(1) NOT NULL DEFAULT '0',
  `vehicle_image_salt` varchar(100) NOT NULL,
  PRIMARY KEY (`vehicle_image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `vehicle_image_table`
--

INSERT INTO `vehicle_image_table` (`vehicle_image_id`, `vehicle_id`, `vehicle_image_url`, `vehicle_image_priority`, `vehicle_cover_image`, `vehicle_image_salt`) VALUES
(1, 1, 'SV03SVL_1.jpg', 1, 1, 'VkFVWEhBTEwvQVNUUkEvU1YwM1NWTC9TVjAzU1ZMXzEuanBn'),
(3, 2, 'ABC123_1.jpg', 1, 1, ''),
(4, 4, 'LF60YTT_1.jpg', 1, 1, ''),
(5, 4, 'LF60YTT_2.jpg', 2, 0, ''),
(18, 1, 'SV03SVL_5.jpg', 5, 0, 'VkFVWEhBTEwvQVNUUkEvU1YwM1NWTC9TVjAzU1ZMXzUuanBn'),
(50, 26, 'HELLO_1541326079.jpg', 4, 1, 'VEVTVC9URVNUL0hFTExPL0hFTExPXzE1NDEzMjYwNzkuanBn'),
(51, 26, 'HELLO_1541326079.jpg', 5, 0, 'VEVTVC9URVNUL0hFTExPL0hFTExPXzE1NDEzMjYwNzkuanBn'),
(52, 27, 'HELLO_1541326109.jpg', 5, 1, 'VEVTVC9URVNUL0hFTExPL0hFTExPXzE1NDEzMjYxMDkuanBn'),
(53, 27, 'HELLO_1541326109.jpg', 6, 0, 'VEVTVC9URVNUL0hFTExPL0hFTExPXzE1NDEzMjYxMDkuanBn'),
(68, 33, 'HELLO_1541451328.jpg', 1, 1, 'VEVTVC9URVNUL0hFTExPL0hFTExPXzE1NDE0NTEzMjguanBn'),
(69, 33, 'HELLO_1541451329.jpg', 2, 0, 'VEVTVC9URVNUL0hFTExPL0hFTExPXzE1NDE0NTEzMjkuanBn'),
(70, 32, 'A_1541453860.jpg', 1, 1, 'QS9BL0EvQV8xNTQxNDUzODYwLmpwZw=='),
(71, 32, 'A_1541453861.jpg', 2, 0, 'QS9BL0EvQV8xNTQxNDUzODYxLmpwZw=='),
(72, 34, 'DDDDDD_1541510522.jpeg', 1, 1, 'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDUyMi5qcGVn'),
(73, 34, 'DDDDDD_1541510523.jpeg', 2, 0, 'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDUyMy5qcGVn'),
(74, 34, 'DDDDDD_1541510524.jpeg', 3, 0, 'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDUyNC5qcGVn'),
(75, 34, 'DDDDDD_1541510525.jpeg', 4, 0, 'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDUyNS5qcGVn'),
(76, 34, 'DDDDDD_1541510526.jpeg', 5, 0, 'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDUyNi5qcGVn'),
(77, 34, 'DDDDDD_1541510548.jpeg', 6, 0, 'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDU0OC5qcGVn'),
(78, 34, 'DDDDDD_1541510549.jpeg', 7, 0, 'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDU0OS5qcGVn'),
(79, 34, 'DDDDDD_1541510550.jpeg', 8, 0, 'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDU1MC5qcGVn'),
(80, 34, 'DDDDDD_1541510551.jpeg', 9, 0, 'Vk9MS1NXQUdFTi9HT0xGL0RERERERC9ERERERERfMTU0MTUxMDU1MS5qcGVn'),
(81, 35, 'BOB_1541533256.jpg', 1, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_table`
--

CREATE TABLE IF NOT EXISTS `vehicle_table` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_registration` varchar(10) NOT NULL,
  `vehicle_make` varchar(30) NOT NULL,
  `vehicle_model` varchar(30) NOT NULL,
  `vehicle_variant` varchar(100) DEFAULT NULL,
  `vehicle_engine_size` int(11) NOT NULL,
  `vehicle_doors` int(11) NOT NULL,
  `vehicle_colour` varchar(20) NOT NULL,
  `vehicle_year` int(11) NOT NULL,
  `vehicle_mileage` int(11) NOT NULL,
  `vehicle_fuel` varchar(10) NOT NULL,
  `vehicle_transmission` varchar(10) NOT NULL,
  `vehicle_mpg` float NOT NULL,
  `vehicle_road_tax` float NOT NULL,
  `vehicle_insurance_group` int(11) NOT NULL,
  `vehicle_extras` text,
  `vehicle_sold` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vehicle_id`),
  UNIQUE KEY `vehicle_registration` (`vehicle_registration`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `vehicle_table`
--

INSERT INTO `vehicle_table` (`vehicle_id`, `vehicle_registration`, `vehicle_make`, `vehicle_model`, `vehicle_variant`, `vehicle_engine_size`, `vehicle_doors`, `vehicle_colour`, `vehicle_year`, `vehicle_mileage`, `vehicle_fuel`, `vehicle_transmission`, `vehicle_mpg`, `vehicle_road_tax`, `vehicle_insurance_group`, `vehicle_extras`, `vehicle_sold`) VALUES
(1, 'SV03SVL', 'VAUXHALL', 'ASTRA', 'SRI', 2200, 3, 'SILVER', 2003, 112000, 'PETROL', 'MANUAL', 30, 240, 21, '', 0),
(2, 'ABC123', 'FORD', 'FIESTA', '', 1600, 5, 'RED', 2010, 89000, 'DIESEL', 'MANUAL', 45, 30, 15, 'AIR CONDITIONING, LEATHER SEATS', 0),
(4, 'LF60YTT', 'PEUGEOT', '207', 'MELLISEUM', 1400, 3, 'BLACK', 2010, 70000, 'PETROL', 'MANUAL', 40, 65, 12, 'AIR-CONDITIONING\r\nCENTRAL LOCKING\r\nBIG BOOT', 0),
(32, 'A', 'A', 'A', 'A', 2005, 3, 'A', 2015, 1200, 'PETROL', 'MANUAL', 34, 200, 10, '', 0),
(33, 'HELLO', 'TEST', 'TEST', 'SRI', 1400, 3, 'BLACK', 2010, 15000, 'PETROL', 'MANUAL', 40, 65, 12, '', 0),
(34, 'DDDDDD', 'VOLKSWAGEN', 'GOLF', 'TEST', 1400, 5, 'RED', 2012, 15000, 'DIESEL', 'MANUAL', 46, 30, 12, '', 0),
(35, 'BOB', 'OBHJK', 'HJK', 'HHJKHK', 256, 4, 'RED', 2001, 678, 'PETROL', 'MANUAL', 20, 230, 10, '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
