-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 06:45 PM
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
(25, 'Guitarra Eléctrico Greg Bennett Avion Les Paul Av-7', 20, 10, 5, 549989, '', 'Color: Pearl White', '2023-07-20 21:39:08', '2023-07-20 21:39:08', 26, 1),
(26, 'Greg Bennett Avion Les Paul Av-3', 15, 10, 5, 399990, '', 'Color: Negro', '2023-07-20 21:39:57', '2023-07-20 21:39:57', 26, 2),
(27, 'Guitarra Eléctrica Squier Classic Vibe 70\' Telec Deluxe Blk', 9, 10, 5, 649990, '', 'Color: Black', '2023-07-20 21:40:46', '2023-07-20 21:40:46', 27, 1),
(28, 'Bateria ADW Junior ADJ5J Drum Set', 4, 10, 5, 299989, '', 'Color: Verde', '2023-07-20 21:41:28', '2023-07-20 21:41:28', 29, 3),
(29, 'Platillo Bateria Meinl HCS Crash', 15, 10, 6, 59990, '', 'Diametro: 14\"', '2023-07-20 21:42:14', '2023-07-20 21:42:14', 30, 4),
(31, 'Amplificador Bajo Ashdown Original C112', 4, 15, 5, 849990, '', 'Color: Rojo', '2023-07-20 21:43:52', '2023-07-20 21:43:52', 32, 5),
(32, 'Teclado Yamaha Portátil PSR-E273 con 61 teclas', 20, 10, 5, 199990, '', 'Color: Negro', '2023-07-20 21:44:36', '2023-07-20 21:44:36', 33, 5),
(33, 'Piano Digital Gewa UP 400 Concierto', 6, 10, 5, 2499990, '', 'Color: Negro', '2023-07-20 21:45:09', '2023-07-20 21:45:09', 34, 3),
(34, 'Piano Digital Gewa UP365 Concierto', 15, 10, 5, 1999990, '', 'Color: Negro', '2023-07-20 21:45:39', '2023-07-20 21:46:21', 34, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `name_2` (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
