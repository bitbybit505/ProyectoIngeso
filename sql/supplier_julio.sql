-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 10:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

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
(2, 'Musicstore2', 'musicstore@gmail.com', '+56 9 1112 2233', '2023-05-31 08:22:26', '2023-07-07 15:56:45'),
(12, 'apple', 'apple@gmail.com', '45656565', '2023-06-14 12:25:18', '2023-06-14 12:25:18'),
(18, 'dlkg', 'dflkgqq@g.c', '+56 9 7847 8488', '2023-06-19 16:51:49', '2023-07-07 15:53:37'),
(19, 'SUP1', 'lkdjgsdg@g.com', '+56 9 6579 8722', '2023-06-19 17:01:35', '2023-07-07 15:49:46'),
(20, 'SUP2', 'SUP2@g.com3', '+56 9 9488 2222', '2023-06-19 17:01:50', '2023-07-07 15:49:56'),
(21, 'SUP3', 'SUP3@g.com', '987284254', '2023-06-19 17:02:10', '2023-06-19 17:02:10'),
(22, 'SUP4', 'SUP4@g.com', '64248824824', '2023-06-19 17:02:22', '2023-06-19 17:02:22'),
(24, 'SUP6', 'SUP6@g.com', '6844463554', '2023-06-19 17:03:07', '2023-06-19 17:03:07'),
(25, 'UNOMAS', 'UNOMAS@g.com', 'lksdjfgdslkgj', '2023-06-19 17:03:19', '2023-06-19 17:03:19'),
(26, 'Casa amarilla', 'casaamarilla@gmail.c', '+56 9 2569 8551', '2023-07-03 18:45:34', '2023-07-07 15:53:29');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
