-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 11:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `email`, `phone_number`, `created_at`, `updated_at`) VALUES
(2, 'Music s', 'musicstore@gmail.com', 'musicstore@gmail.com', '2023-05-31 08:22:26', '2023-05-31 08:22:26'),
(12, 'apple', 'apple@gmail.com', '45656565', '2023-06-14 12:25:18', '2023-06-14 12:25:18'),
(14, 'paris', 'paris@gmail.com', '34565656', '2023-06-14 13:42:21', '2023-06-14 13:42:21'),
(18, 'dlkg', 'dflkgqq@g.c', 'sdlkgjsdg', '2023-06-19 16:51:49', '2023-06-19 16:51:49'),
(19, 'SUP1', 'lkdjgsdg@g.com', '657w987wf', '2023-06-19 17:01:35', '2023-06-19 17:01:35'),
(20, 'SUP2', 'SUP2@g.com', '9s48df8d', '2023-06-19 17:01:50', '2023-06-19 17:01:50'),
(21, 'SUP3', 'SUP3@g.com', '987284254', '2023-06-19 17:02:10', '2023-06-19 17:02:10'),
(22, 'SUP4', 'SUP4@g.com', '64248824824', '2023-06-19 17:02:22', '2023-06-19 17:02:22'),
(23, 'SUP5', 'SUP5@g.com', '648e4f8487', '2023-06-19 17:02:37', '2023-06-19 17:02:37'),
(24, 'SUP6', 'SUP6@g.com', '6844463554', '2023-06-19 17:03:07', '2023-06-19 17:03:07'),
(25, 'UNOMAS', 'UNOMAS@g.com', 'lksdjfgdslkgj', '2023-06-19 17:03:19', '2023-06-19 17:03:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
