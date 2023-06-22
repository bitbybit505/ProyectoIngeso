-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 12:51 AM
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
(1, '1', 'administrator', 'acc', 'admin', 'admin@admin.com', '$2y$10$KG58aVBJnyeE67OBqYbTTe79WIvShKGgE05pZIdKMdD4fZDDNtL.e', '1', 'Admin', 1, '2023-05-15 21:53:40', '2023-05-15 22:59:40'),
(2, '3.645.871-2', 'test', 'N2', 'dskgdsg', 'dgksjdg@g.c', '$2y$10$qCnT3ICB8LkTr4OJpNY8PeQnFsLuKffSkE4CpBjDXN.FqMYrzzfGi', '+56 9 1234 5678', 'employee', 1, '2023-06-19 22:51:00', '2023-06-19 22:51:00'),
(3, '7.881.102-1', 'Luis', 'Bar', 'Lucho', 'lucho@g.com', '$2y$10$RNDiZLghIUUel3/QNLyCbOTKZGvGuxynqd56v//Qrq2ZbmKx9teoO', '+569 8765 4321', 'employee', 1, '2023-06-20 22:59:32', '2023-06-20 23:51:59'),
(87, '8.999.600-7', 'Howie', 'Fowles', 'hfowles0', 'hfowles0@xinhuanet.com', 'kL4{nZx.', '+56 9 3673 4994', 'employee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, '23.831.442-9', 'Zack', 'Brettell', 'zbrettell1', 'zbrettell1@twitter.com', 'hK2\"CcD!Kil9@T4', '+56 9 2835 6463', 'employee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, '12.613.060-0', 'Rikki', 'Dowglass', 'rdowglass2', 'rdowglass2@pbs.org', 'lS8)+CU}1\"\"wW', '+56 9 1163 8870', 'employee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, '7.109.315-8', 'Guthry', 'Happer', 'ghapper3', 'ghapper3@moonfruit.com', 'lB7@1i6.90=Mox', '+56 9 6827 3779', 'employee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, '22.465.699-8', 'Kimbra', 'Rabidge', 'krabidge4', 'krabidge4@ezinearticles.com', 'pS3\'//o4}', '+56 9 0219 1521', 'employee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, '23.505.004-8', 'Trip', 'Leyburn', 'tleyburn5', 'tleyburn5@nasa.gov', 'zE6*E0Cp@~!', '+56 9 8901 2031', 'employee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, '6.359.259-5', 'Jourdain', 'Rawcliffe', 'jrawcliffe6', 'jrawcliffe6@taobao.com', 'hY8*v<J}N', '+56 9 3654 3478', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, '15.394.568-3', 'Germain', 'Dilliston', 'gdilliston7', 'gdilliston7@hostgator.com', 'xS8>aXTHnQH<', '+56 9 6980 8089', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, '2.319.538-5', 'Godfrey', 'Earlam', 'gearlam8', 'gearlam8@apple.com', 'pN8>6}+pQ?', '+56 9 5518 0566', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, '18.141.280-1', 'Gibb', 'Forsaith', 'gforsaith9', 'gforsaith9@theglobeandmail.com', 'lS9\"NRiHhrYhdA', '+56 9 9159 0566', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, '10.553.693-3', 'Lock', 'Gridley', 'lgridleya', 'lgridleya@amazon.co.uk', 'wF0,RT`)M(wi1d?', '+56 9 6309 0862', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, '17.098.858-2', 'Rowe', 'Drinnan', 'rdrinnanb', 'rdrinnanb@ucsd.edu', 'nA4\"0AFPEP<G1=9', '+56 9 8419 1862', 'employee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, '5.963.582-4', 'Geri', 'Raggles', 'gragglesc', 'gragglesc@usda.gov', 'xN7_TMg)', '+56 9 6308 3738', 'employee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, '11.790.977-8', 'Eli', 'Deackes', 'edeackesd', 'edeackesd@odnoklassniki.ru', 'lB5)Ij{*Pn1G.', '+56 9 5071 8293', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, '18.141.280-1', 'Freddy', 'Balch', 'fbalche', 'fbalche@dagondesign.com', 'qW8/,JFZ', '+56 9 9583 9100', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, '8.044.776-0', 'Laure', 'Brignell', 'lbrignellf', 'lbrignellf@multiply.com', 'uR1~Y91M', '+56 9 1733 6999', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, '18.041.161-5', 'Melitta', 'Sakins', 'msakinsg', 'msakinsg@joomla.org', 'aJ9+rsF!uCT', '+56 9 8030 7810', 'employee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, '22.109.846-3', 'Josi', 'Pavel', 'jpavel1y', 'jpavel1y@washington.edu', 'lD8*fA4%', '+56 9 1608 6496', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, '24.280.729-4', 'Sigmund', 'Rhymes', 'srhymes1z', 'srhymes1z@reuters.com', 'uH6\"f0w_r', '+56 9 2093 3446', 'employee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, '5.872.282-0', 'Samuele', 'Hanhart', 'shanhart20', 'shanhart20@google.com.br', 'jD1|xD%@og}pk.', '+56 9 4921 7388', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, '11.070.729-0', 'Diann', 'Maffione', 'dmaffione21', 'dmaffione21@apple.com', 'fS4.3+)\"', '+56 9 1010 8092', 'employee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, '17.116.237-8', 'Donnie', 'Adey', 'dadey22', 'dadey22@nhs.uk', 'yI4`Fi@>_DCb', '+56 9 4736 9980', 'employee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, '23.518.750-7', 'Rahel', 'Dominiak', 'rdominiak23', 'rdominiak23@vimeo.com', 'yL4/tR`<X`6InRuR', '+56 9 3752 4424', 'employee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, '23.820.462-3', 'Harman', 'Grahame', 'hgrahame24', 'hgrahame24@t-online.de', 'fE4(R!p+/4\"ixm+.', '+56 9 1923 0691', 'employee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, '22.772.539-7', 'Charo', 'Jeffcoat', 'cjeffcoat25', 'cjeffcoat25@go.com', 'gF0\"n}z|_G', '+56 9 7333 0578', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, '20.022.617-8', 'Theodore', 'Spriggs', 'tspriggs26', 'tspriggs26@wiley.com', 'yG3<,d*<0=esQg', '+56 9 3657 8109', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, '9.830.985-3', 'Ethel', 'Gallier', 'egallier27', 'egallier27@jalbum.net', 'hX7)fGhga2', '+56 9 1141 1632', 'employee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, '10.341.205-6', 'Torie', 'Ivakhno', 'tivakhno28', 'tivakhno28@cbc.ca', 'aJ6+IjUxh.', '+56 9 1637 4911', 'employee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, '23.299.788-5', 'Adan', 'Aristide', 'aaristide29', 'aaristide29@mail.ru', 'mA4`6\'_MV4B2', '+56 9 1968 4580', 'employee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, '19.080.056-3', 'Georgeanne', 'Devil', 'gdevil2a', 'gdevil2a@businesswire.com', 'lG3~H%Yw??09', '+56 9 2331 1660', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, '15.500.171-2', 'Blaire', 'Slogrove', 'bslogrove2b', 'bslogrove2b@desdev.cn', 'oQ7(`nYE6m', '+56 9 1581 2124', 'employee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
