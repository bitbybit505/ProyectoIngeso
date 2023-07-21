-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 02:56 AM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `rut` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `phone_number` varchar(16) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `rut`, `name`, `last_name`, `username`, `email`, `password`, `phone_number`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'administrator', 'acc', 'admin', 'admin@admin.com', '$2y$10$KG58aVBJnyeE67OBqYbTTe79WIvShKGgE05pZIdKMdD4fZDDNtL.e', '1', 'Admin', 1, '2023-07-18 17:17:23', '2023-07-18 17:17:23'),
(90, '7.109.315-8', 'Guthry', 'Happer', 'ghapper3', 'ghapper3@moonfruit.com', '$2y$10$Lzw1MPCcEwrUYUkwfk.g/eOahoo74YHO9dkHhX3gN/hdvS7nzDVGK', '+56 9 2323 2323', 'Empleado', 0, '0000-00-00 00:00:00', '2023-06-23 12:20:58'),
(91, '22.465.699-8', 'Kimbra', 'Rabidge', 'krabidge4', 'krabidge4@ezinearticles.com', '$2y$10$oTSvzGdyJsSTU02Dbu.DSeAIUNeyXRju2/5B3MS.ihv1DalsGeS6C', '+56 9 4545 4542', 'Empleado', 0, '0000-00-00 00:00:00', '2023-07-11 11:08:46'),
(94, '15.394.568-3', 'Germain', 'Dilliston', 'gdilliston7', 'gdilliston7@hostgator.com', '$2y$10$weeDlGMyRl7E/d6BENGCCeTinVaAlMPqClYD0xEpiUfqkkwbX95iy', '+56 9 6980 8082', 'Empleado', 1, '0000-00-00 00:00:00', '2023-07-18 11:23:25'),
(97, '10.553.693-3', 'Lock', 'Gridley', 'lgridleya', 'lgridl@g.c', '$2y$10$KuClVSlMP6u3nviSC/i1x.UGFaYgjlQInlMqGvhP0tDfMvgCo7G2G', '+56 9 1111 1111', 'Empleado', 1, '0000-00-00 00:00:00', '2023-07-18 11:23:38'),
(99, '5.963.582-4', 'Geri', 'Raggles', 'gragglesc', 'gragglesc@usda.gov', 'xN7_TMg)', '+56 9 6308 3738', 'Empleado', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, '11.790.977-8', 'Eli', 'Deackes', 'edeackesd', 'edeackesd@odnoklassniki.ru', 'lB5)Ij{*Pn1G.', '+56 9 5071 8293', 'Empleado', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, '18.141.280-1', 'Freddy', 'Balch', 'fbalche', 'fbalche@dagondesign.com', 'qW8/,JFZ', '+56 9 9583 9100', 'Empleado', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, '18.041.161-5', 'Melitta2', 'Sakins2', 'msakinsg2', 'msakinsg2@joomla.org', '$2y$10$L6RL96v2v3uBEvraVpvgf.tvTDE04sfokVE.Jl1gJQLow6/udC3C2', '+56 9 8030 7815', 'Empleado', 0, '0000-00-00 00:00:00', '2023-06-23 12:28:35'),
(108, '22.109.846-3', 'Josi', 'Pavel', 'jpavel1y', 'jpavel1y@washington.edu', 'lD8*fA4%', '+56 9 1608 6496', 'Empleado', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, '24.280.729-4', 'Sigmund', 'Rhymes', 'srhymes1z', 'srhymes1z@reuters.com', 'uH6\"f0w_r', '+56 9 2093 3446', 'Empleado', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, '5.872.282-0', 'Samuele', 'Hanhart', 'shanhart20', 'shanhart20@google.com.br', '$2y$10$QTmtJZHNgaxqlwdpGnEy/OORSXTTuw0JFmUIhjgMGZ054DbKkvgQW', '+56 9 4921 7388', 'Empleado', 1, '0000-00-00 00:00:00', '2023-07-11 11:09:21'),
(112, '17.116.237-8', 'Donnie', 'Adey', 'dadey22', 'dadey22@nhs.uk', '$2y$10$SrklLs35cXXFYCQH2y3xvu1y1RLvxb0Mjm1wTfMtf9AwoyivczG16', '+56 9 4736 9980', 'Empleado', 0, '0000-00-00 00:00:00', '2023-07-11 11:09:17'),
(113, '23.518.750-7', 'Rahel', 'Dominiak', 'rdominiak23', 'rdominiak23@vimeo.com', '$2y$10$ADeRhBNmNybAFr.Tq6asQ.vHt2jGE1liFjbvHjwERjRh5KobEglVG', '+56 9 3752 4424', 'Empleado', 0, '0000-00-00 00:00:00', '2023-07-11 11:09:13'),
(133, '7.881.102-1', 'Usuario', 'Prueba', 'Usuariodeprueba', 'prueba@c.c', '$2y$10$KSGDSE/Ke7QYq50AduOzr.m78JZFJog/UQbdPx.QuSWC4CHY//u1a', '+56 9 1555 5555', 'Empleado', 1, '2023-07-20 19:00:01', '2023-07-20 19:00:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`),
  ADD UNIQUE KEY `rut` (`rut`,`username`,`email`),
  ADD UNIQUE KEY `rut_2` (`rut`,`username`,`email`,`phone_number`),
  ADD UNIQUE KEY `rut_3` (`rut`,`username`,`email`,`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
