-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 09:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `role` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `token` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `token`) VALUES
(19, 'Duy', 'duy@gmail.com', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'RIfdNOI4cmLJgXTJBI9GVEcraoFvEHz19Gt2djbRUEhjRBrVPGL63vjTB398yQ4d'),
(26, 'Huynh', 'huynh@gmaiil.edu.vn', 'user', '911195500a8f10cd7045ee41a81c2076d97d72a6', 'nk72HYc42aLaFtqT8KT1xxXDOEWEORHvzbHbs26PJresw1W05EV3Ah33F'),
(29, 'MU', 'mu@mu.fc.eu', 'user', '394c6973a8110b64d6013635d61f8d283d81d5e7', 'FSbx4ASIoJYmEH6fu26NtFf2SjZPS2nxIoVNitDRBz1qDXYZ420LnRF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`name`,`email`,`role`,`password`),
  ADD KEY `token` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
