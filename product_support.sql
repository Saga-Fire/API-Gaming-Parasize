-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2021 at 03:24 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gaming_paradize`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_support`
--

CREATE TABLE `product_support` (
  `product_id` int(11) NOT NULL,
  `support_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_support`
--

INSERT INTO `product_support` (`product_id`, `support_id`) VALUES
(1, 2),
(1, 3),
(2, 2),
(2, 3),
(3, 1),
(4, 2),
(5, 6),
(6, 2),
(6, 3),
(7, 2),
(7, 3),
(8, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_support`
--
ALTER TABLE `product_support`
  ADD PRIMARY KEY (`product_id`,`support_id`),
  ADD KEY `IDX_51DDF0154584665A` (`product_id`),
  ADD KEY `IDX_51DDF015315B405` (`support_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_support`
--
ALTER TABLE `product_support`
  ADD CONSTRAINT `FK_51DDF015315B405` FOREIGN KEY (`support_id`) REFERENCES `support` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_51DDF0154584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
