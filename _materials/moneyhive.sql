-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Jun 09, 2023 at 06:01 PM
-- Server version: 10.10.3-MariaDB-1:10.10.3+maria~ubu2204
-- PHP Version: 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moneyhive`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(512) NOT NULL,
  `account` int(11) NOT NULL COMMENT '1- Credit\r\n2 - Debit\r\n3 - Saving',
  `amount` double NOT NULL DEFAULT 0,
  `receipt` blob DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL COMMENT 'untuk refer ke wishlist.',
  `date_time_created` datetime NOT NULL,
  `date_time_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `title`, `description`, `account`, `amount`, `receipt`, `ref_id`, `date_time_created`, `date_time_modified`) VALUES
(1, 1, 'Transfer dari Ibu', '', 1, 2500000, NULL, NULL, '2023-06-09 13:46:55', '2023-06-09 13:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(400) NOT NULL,
  `email` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'biya', 'ae2b1fca515949e5d54fb22b8ed95575', 'biya@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` double NOT NULL,
  `description` varchar(512) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1- ongoing\r\n2- done\r\n3- cancelled',
  `progress` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
