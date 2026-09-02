-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: https://ugcapi.com/
-- Generation Time: Jan 07, 2026 at 03:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token` varchar(64) DEFAULT NULL,
  `token_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `whatsapp`, `emailid`, `password`, `reset_token`, `token_expiry`) VALUES
(2, 'Bhoopendra ', 'Chaudhary', '7073376777', 'bhoopendra@1993gmail.com', '$2y$10$3B21AN0v8ptjGhOcwnz4wOZJ2Plt4F6M.dJsFNFh2Osd/NZEyG7IC', NULL, NULL),
(7, 'bhoopendra', 'singh', '9521172024', 'bp@gmail.com', '$2y$10$R2wFJTMBF4lQmgJ/rv8HE.XprIgURxSPiZ.dZ4ip/prm7nB7cKYF2', 'e64bfc906e03bbbadddc637abd3a6108720170ac8a04766f398f0d8eac4b4d29', '2026-01-18 10:53:33'),
(8, 'Ankit', 'Bhardwaj', '8273062879', 'bhardwajankit432@gmail.com', '$2y$10$yqfDQupjXgiqZuO3nEastOuGGmqRV7053YKU5tzKhlgO7uuO8E5ay', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailid` (`emailid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
