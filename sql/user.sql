-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 11:35 PM
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
  `role` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `rut`, `name`, `last_name`, `username`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, '1.111.111-1', 'administrator', 'acc', 'admin', 'admin@admin.com', '$2y$10$KG58aVBJnyeE67OBqYbTTe79WIvShKGgE05pZIdKMdD4fZDDNtL.e', 'Admin', 1, '2023-05-15 21:53:40', '2023-05-15 22:59:40'),
(34, '7.144.115-6', 'Hector', 'Soza', 'Sozita', 'SOZa@un.cl', '$2y$10$QGzBA65MfzgtB1poZm9AsOmJqHlxMoqogCtzt5jgovnGPzRYbqZWO', 'employee', 1, '2023-06-19 17:10:00', '2023-06-19 17:10:00'),
(35, '7.020.391-K', 'Cammie', 'Chopin', 'cchopinx', 'cchopinx@infoseek.co.jp', 'lY2@}U.jg', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, '8.062.052-7', 'Findlay', 'Metzing', 'fmetzingy', 'fmetzingy@army.mil', 'oA2@fP%q%.z', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, '7.020.391-K', 'Pier', 'Packington', 'ppackingtonz', 'ppackingtonz@hp.com', 'sD0,kQjwhsmQwm', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, '3.633.258-1', 'Tiffy', 'Bustard', 'tbustard10', 'tbustard10@netscape.com', 'xG8%=e~473tg', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, '6.631.853-2', 'Urbain', 'Drewery', 'udrewery11', 'udrewery11@vkontakte.ru', 'fQ2!PR?$I', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, '15.695.845-K', 'Jerald', 'Gannaway', 'jgannaway12', 'jgannaway12@phoca.cz', 'dX2#1!Z%?', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, '6.272.837-K', 'Haskell', 'Martugin', 'hmartugin13', 'hmartugin13@icq.com', 'dH6,@Su/k4>R<9Xi', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, '15.767.518-4', 'Abby', 'Smithen', 'asmithen14', 'asmithen14@last.fm', 'sO3@iz8h@BW/trj', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, '19.434.293-4', 'Madel', 'Causby', 'mcausby15', 'mcausby15@shop-pro.jp', 'aZ4=\"<PDsuPi#', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, '18.186.103-7', 'Leshia', 'Tuttle', 'ltuttle16', 'ltuttle16@i2i.jp', 'tN9|`fQ<JK.O7T.V', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, '7.144.115-6', 'Guenna', 'Seward', 'gseward17', 'gseward17@macromedia.com', 'fE3?AGLw{.9', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, '5.827.704-5', 'Shayne', 'Eddy', 'seddy18', 'seddy18@stanford.edu', 'zB0+Tv$9ZdQIvm', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, '17.468.427-8', 'Kai', 'Couper', 'kcouper19', 'kcouper19@issuu.com', 'gR4{.fSrF!aTU5,', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, '18.337.452-4', 'Locke', 'Norkett', 'lnorkett1a', 'lnorkett1a@samsung.com', 'tW1?Tv$ow2x=', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, '24.106.849-8', 'Sheffield', 'Jales', 'sjales1b', 'sjales1b@ehow.com', 'sA9_XR(dW_w1', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, '24.453.690-5', 'Hollis', 'Mutlow', 'hmutlow1c', 'hmutlow1c@amazonaws.com', 'yV7<_b_,', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, '25.088.237-8', 'Jervis', 'Farryan', 'jfarryan1d', 'jfarryan1d@examiner.com', 'jB6<?9uII3Tqksv', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, '21.231.236-3', 'Windy', 'MacRorie', 'wmacrorie1e', 'wmacrorie1e@dailymotion.com', 'aR8F?6Mf|<%+i', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, '14.735.261-1', 'Amaleta', 'Wales', 'awales1f', 'awales1f@nhs.uk', 'jS9>mNu', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, '14.701.663-8', 'Dulce', 'McKinna', 'dmckinna1g', 'dmckinna1g@yale.edu', 'zG8>S,1J', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, '22.684.994-7', 'Dimitri', 'Bollen', 'dbollen1h', 'dbollen1h@ow.ly', 'pX0!zdknJ(}/r,SA', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, '16.574.726-7', 'Madel', 'Malpass', 'mmalpass1i', 'mmalpass1i@pcworld.com', 'cD0{~KuI', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, '24.503.856-9', 'Creigh', 'Oboy', 'coboy1j', 'coboy1j@gov.uk', 'gK4gM%nC=0MDFiy', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, '23.234.077-0', 'Teodoor', 'Forrester', 'tforrester1k', 'tforrester1k@squidoo.com', 'oW8%\"jbp3PyQS#R', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, '22.148.610-2', 'Peggie', 'Levesley', 'plevesley1l', 'plevesley1l@princeton.edu', 'aF0<<*,Rb', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, '23.431.373-8', 'Ezri', 'Fishly', 'efishly1m', 'efishly1m@indiatimes.com', 'iV8(QdX~8_', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, '20.470.738-3', 'Andrej', 'Carnock', 'acarnock1n', 'acarnock1n@mlb.com', 'nI1!9f#8', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`),
  ADD UNIQUE KEY `rut` (`rut`,`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
