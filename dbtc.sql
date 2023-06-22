-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 03:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtc`
--

-- --------------------------------------------------------

--
-- Table structure for table `chains`
--

CREATE TABLE `chains` (
  `chainID` int(11) NOT NULL,
  `chainName` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `isActive` tinyint(4) NOT NULL,
  `isPublic` tinyint(4) NOT NULL,
  `length` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `currentDayStatus` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chains`
--

INSERT INTO `chains` (`chainID`, `chainName`, `startDate`, `isActive`, `isPublic`, `length`, `userID`, `currentDayStatus`) VALUES
(30, 'React', '2023-05-08', 1, 1, 45, 1, 0),
(31, 'Senior Project', '2023-03-01', 0, 1, 105, 1, 0),
(32, 'Kurtlar Vadisi', '2023-06-01', 1, 1, 21, 2, 0),
(33, 'Valorant', '2023-04-01', 0, 1, 37, 2, 0),
(34, 'The Walking Dead', '2023-03-01', 0, 1, 14, 3, 0),
(35, 'Duolingo', '2023-06-04', 1, 1, 18, 3, 0),
(36, 'Ted Lasso', '2023-06-10', 1, 1, 12, 4, 0),
(37, 'Azerbaijani', '2023-06-01', 1, 0, 21, 4, 0),
(38, 'Math', '2023-06-01', 1, 0, 21, 4, 0),
(39, 'English', '2023-06-01', 1, 0, 21, 4, 0),
(40, 'Training', '2023-05-20', 1, 1, 33, 5, 0),
(41, 'Make a Coffee', '2023-05-04', 1, 0, 49, 5, 0),
(42, 'JavaScript', '2023-05-12', 0, 1, 25, 6, 0),
(43, 'Vue', '2023-06-06', 1, 1, 16, 6, 0),
(44, 'SYLT', '2023-05-28', 1, 1, 25, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageID`, `firstName`, `lastName`, `email`, `message`) VALUES
(1, 'Vusal', 'Alakbarov', 'vusal11010@gmail.com', 'Hello there :)'),
(2, 'Toğrul', 'Baxışov', 'togrul.baxisov@gmail.com', 'deneme');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'vusal11010', 'Vusal', 'Alakbarov', 'vusal11010@gmail.com', '$2y$10$BCXN.jQUk1QImoIrsQJiwOr7ZSABB8et1OQxbJcxYAo/5x5RotwH.'),
(2, 'fkarer', 'Nasimi', 'Mammadli', 'nasimimammadli@gmail.com', '$2y$10$2a8DFscoUNb9WgujFjKDj.L6hG99kfiRSBVvt0nqcxv8Ya1Mlmmhi'),
(3, 'gaijin', 'Toghrul', 'Bakhishov', 'togrul.baxisov@gmail.com', '$2y$10$AVvE9Sg9MeMhSzNyoT7c.OK6kI2m63yq6FNi6WyTgBa.MFwjJWM8G'),
(4, 'spartak', 'Elmir', 'Niyazli', 'spartak@gmail.com', '$2y$10$4zhshXNA9DqTZxmVAXbPcuK/tlcJf39Hqc.jTEBIenA23/90CVWqe'),
(5, 'islam1951', 'Islam', 'Yareliyev', 'islamyareliyev@gmail.com', '$2y$10$PYg.FqDt/q21MRPgDczSjObyrfp9UwE8QnJUK.qFtfryBCo4Dy1sO'),
(6, 'aghazade', 'Vuqar', 'Aghazade', 'vuqar.aghazade@gmail.com', '$2y$10$LLrbFs9AF2YKEPeQapCAN.rGE5vT7ulJ2y4howQevPlyaBcQTB22y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chains`
--
ALTER TABLE `chains`
  ADD PRIMARY KEY (`chainID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chains`
--
ALTER TABLE `chains`
  MODIFY `chainID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chains`
--
ALTER TABLE `chains`
  ADD CONSTRAINT `chains_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `updateIsActive` ON SCHEDULE EVERY 1 SECOND STARTS '2023-06-13 18:42:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE dbtc.chains
  SET isActive = FALSE
  WHERE (startDate + INTERVAL length - 1 DAY) < (CURDATE() - INTERVAL 1 DAY)$$

CREATE DEFINER=`root`@`localhost` EVENT `resetCurrentDayStatus` ON SCHEDULE EVERY 1 DAY STARTS '2023-06-14 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE chains
DO
  SET currentDayStatus = 0$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
