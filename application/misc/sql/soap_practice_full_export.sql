-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 07, 2020 at 03:02 PM
-- Server version: 8.0.16
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soap_practice`
--
CREATE DATABASE IF NOT EXISTS `soap_practice` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci;
USE `soap_practice`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `author_name` varchar(500) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `price` varchar(500) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `isbn` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author_name`, `price`, `isbn`, `category`) VALUES
(1, 'C++ By Example', 'John', '500', 'PR-123-A1', 'Programming'),
(2, 'Java Book', 'Jane davis', '450', 'PR-456-A2', 'Programming'),
(3, 'Database Management Systems', 'Mark', '$75', 'DB-123-ASD', 'Database'),
(4, 'Harry Potter and the Order of the Phoenix', 'J.K. Rowling', '650', 'FC-123-456', 'Novel'),
(5, 'Data Structures', 'author 5', '450', 'FC-456-678', 'Programming'),
(6, 'Learning Web Development ', 'Michael', '300', 'ABC-123-456', 'Web Development'),
(7, 'Professional PHP & MYSQL', 'Programmer Blog', '$340', 'PR-123-456', 'Web Development'),
(8, 'Java Server Pages', 'technical authoer', ' $45.90', 'ABC-567-345', 'Programming'),
(9, 'Marketing', 'author3', '$423.87', '456-GHI-987', 'Business'),
(10, 'Economics', 'autor9', '$45', '234-DSG-456', 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `stockprices`
--

DROP TABLE IF EXISTS `stockprices`;
CREATE TABLE IF NOT EXISTS `stockprices` (
  `stock_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stock_symbol` char(3) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `stock_price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `stockprices`
--

INSERT INTO `stockprices` (`stock_id`, `stock_symbol`, `stock_price`) VALUES
(1, 'ABC', '75.00'),
(2, 'DEF', '45.00'),
(3, 'GHI', '12.00'),
(4, 'JKL', '34.00'),
(5, 'FOO', '9999.00'),
(6, 'FOO', '9999.00'),
(7, 'FOO', '9999.00'),
(8, 'bar', '666.00'),
(9, 'FOO', '9999.00'),
(10, 'FOO', '9999.00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
