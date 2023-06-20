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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` longblob DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  `fecha_actualizada` datetime DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `cantidad`, `imagen`, `descripcion`, `fecha_ingreso`, `fecha_actualizada`, `id_marca`, `id_proveedor`) VALUES
(29, 'tesla model x', 3, '', 'el tesla model x es un auto electrico', '2023-06-14 16:41:19', '2023-06-14 16:41:19', 5, 12),
(33, 'BANANA', 0, '', 'ES UNA BANANA', '2023-06-19 17:04:02', '2023-06-19 17:04:02', 5, 23),
(34, 'BANANA', 10, '', 'ES UNA BANANA', '2023-06-19 17:04:46', '2023-06-19 17:04:46', 2, 2),
(35, 'BANANA2', 10, '', 'ES UNA BANANA', '2023-06-19 17:05:09', '2023-06-19 17:05:09', 2, 2),
(36, 'BANANA3', 10, '', 'ES UNA BANANA', '2023-06-19 17:05:12', '2023-06-19 17:05:12', 2, 2),
(37, 'BANANA4', 10, '', 'ES UNA BANANA', '2023-06-19 17:05:17', '2023-06-19 17:05:17', 2, 2),
(38, 'BANANA5', 10, '', 'ES UNA BANANA', '2023-06-19 17:05:20', '2023-06-19 17:05:20', 2, 2),
(39, 'BANANA6', 10, '', 'ES UNA BANANA', '2023-06-19 17:05:22', '2023-06-19 17:05:22', 2, 2),
(40, 'BANANA7', 10, '', 'ES UNA BANANA', '2023-06-19 17:05:25', '2023-06-19 17:05:25', 2, 2),
(41, 'BANANA8', 10, '', 'ES UNA BANANA', '2023-06-19 17:05:29', '2023-06-19 17:05:29', 2, 2),
(42, 'LAPTOP', 8724, '', 'Es un laptop', '2023-06-19 17:06:40', '2023-06-19 17:06:40', 17, 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `supplier` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
