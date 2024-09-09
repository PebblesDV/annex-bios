-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2024 at 10:11 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `annexbios`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestellingen`
--

CREATE TABLE `bestellingen` (
  `id` int NOT NULL,
  `userID` int NOT NULL,
  `movieID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logininfo`
--

CREATE TABLE `logininfo` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `passwordHere` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logininfo`
--

INSERT INTO `logininfo` (`id`, `username`, `passwordHere`) VALUES
(2, 'Whoop', '$2y$10$evC8JZRJCSfKrernkIJUvuk.bjSe.xcZTic6GejOndij3DOHelnK6'),
(16, 'Damn', '$2y$10$hxVJ9850fR612eR4Pia6NO.WglGQEGd3lqxVA92ai9nhCtE4tHPoW'),
(17, 'Yipeee', '$2y$10$r.HWhYq3b.rL4dMIgHix9.aDs5Dipj0vJOoaw28wAWpSW6hrAy/yS'),
(18, 'No', '$2y$10$HmQbqLc4P8WMrG7XV1uqleJUBOokCOfjkk/b4hGVr2zTKgHa4NZtO'),
(19, 'what', '$2y$10$RnsTYaqLBxynm6HT1W6jkONJiOtcezc8qJJK4J9EWpIA1Tf6bIBym'),
(20, 'cool', '$2y$10$8e9skVWeoDoK7qqRrPcTx.UeecKXStES83exZiDEcBTXUuQTmBnX2'),
(21, 'w', '$2y$10$5TM4WKbPuaqRkkwbTyMWoe4exSa84Ig/n3C6lygZh/zduq60GcPcy'),
(22, 'he', '$2y$10$9YaZnvSTWORN87qP.PwANufUgoFkfKaLZB/JJfdJGNN/a1pT9YeTC');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int NOT NULL,
  `movieName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Constraint_FK_user_id` (`userID`),
  ADD KEY `Constraint_FK_movie_id` (`movieID`);

--
-- Indexes for table `logininfo`
--
ALTER TABLE `logininfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logininfo`
--
ALTER TABLE `logininfo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `Constraint_FK_movie_id` FOREIGN KEY (`movieID`) REFERENCES `movies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Constraint_FK_user_id` FOREIGN KEY (`userID`) REFERENCES `logininfo` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
