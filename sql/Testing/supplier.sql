-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 06:44 PM
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
(1, 'Music Chile', 'MusicChile@gmail.com', '+56 9 1234 5678', '2023-07-20 20:59:12', '2023-07-20 21:00:33'),
(2, 'Mercury Music', 'MercuryMusic@gmail.com', '+56 9 2134 5678', '2023-07-20 20:59:32', '2023-07-20 21:02:22'),
(3, 'Leonard Music', 'LeonardMusic@gmail.com', '+56 9 3124 5678', '2023-07-20 20:59:53', '2023-07-20 21:02:20'),
(4, 'Queen Instruments', 'QueenInstruments@gmail.com', '+56 9 4123 5678', '2023-07-20 21:00:15', '2023-07-20 21:02:17'),
(5, 'Lihber Music', 'LihberMusic@gmail.com', '+56 9 5123 4678', '2023-07-20 21:02:03', '2023-07-20 21:02:14'),
(32, 'Casa Amarilla', 'CasaAmarilla@gmail.com', '+56 9 8765 4321', '2023-07-20 21:31:23', '2023-07-20 21:31:23');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
