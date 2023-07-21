-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 02:58 AM
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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cantidad_rec` int(11) NOT NULL,
  `cantidad_min` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(1000) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  `fecha_actualizada` datetime DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `cantidad`, `cantidad_rec`, `cantidad_min`, `precio`, `imagen`, `descripcion`, `fecha_ingreso`, `fecha_actualizada`, `id_marca`, `id_proveedor`) VALUES
(1, 'Piano', 7, 8, 4, 222, '1689895928_flauta.webp', 'Piano con teclas negras', '2023-07-03 18:43:33', '2023-07-20 20:03:31', 9, 26),
(3, 'GX20004 ', 10, 9, 1, 235235, '', 'Laptop that has 10gb of ram', '2023-07-07 08:29:29', '2023-07-20 20:26:26', 10, 2),
(24, 'ñkdjsg', 123, 123, 2, 121241, 'img.jpg', '', '2023-07-20 19:39:11', '2023-07-20 20:17:05', 10, 2),
(25, '42124', 144, 122, 123, 123123, '', '', '2023-07-20 20:15:52', '2023-07-20 20:15:52', 10, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
