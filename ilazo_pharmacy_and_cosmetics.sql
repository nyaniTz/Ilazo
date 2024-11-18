-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 11:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ilazo pharmacy and cosmetics`
--

-- --------------------------------------------------------

--
-- Table structure for table `receved items`
--

CREATE TABLE `receved items` (
  `id` int(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `Quantity` int(255) NOT NULL,
  `Cost` int(255) NOT NULL,
  `Amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receved items`
--

INSERT INTO `receved items` (`id`, `Description`, `Unit`, `Quantity`, `Cost`, `Amount`) VALUES
(1, 'panadol', 'mmm23', 23, 23, 23),
(2, 'mimi', '233', 23, 33, 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `receved items`
--
ALTER TABLE `receved items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `receved items`
--
ALTER TABLE `receved items`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
