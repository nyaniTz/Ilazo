-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2022 at 03:24 PM
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
-- Database: `ilazo pharmacy and cosmetics`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `id` int(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`id`, `Email`, `Password`) VALUES
(1, 'nyoxmlimwa@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ordergenerator`
--

CREATE TABLE `ordergenerator` (
  `id` int(255) NOT NULL,
  `OrderGenerators` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordergenerator`
--

INSERT INTO `ordergenerator` (`id`, `OrderGenerators`) VALUES
(1, '1'),
(2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `ProductId` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `Quantity` int(255) NOT NULL,
  `Cost` int(255) NOT NULL,
  `PurchasingQty` int(255) DEFAULT NULL,
  `Amount` int(255) DEFAULT NULL,
  `OrderID` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ordertracker`
--

CREATE TABLE `ordertracker` (
  `id` int(255) NOT NULL,
  `OrderID` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `PurchasingQty` int(255) DEFAULT NULL,
  `Amount` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `receveditems`
--

CREATE TABLE `receveditems` (
  `id` int(255) NOT NULL,
  `VendorName` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `Quantity` int(255) NOT NULL,
  `PurchasingCost` int(255) NOT NULL,
  `Cost` int(255) NOT NULL,
  `Amount` int(255) DEFAULT NULL,
  `RecevedDate` varchar(255) NOT NULL,
  `ExpireDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receveditems`
--

INSERT INTO `receveditems` (`id`, `VendorName`, `Description`, `Unit`, `Quantity`, `PurchasingCost`, `Cost`, `Amount`, `RecevedDate`, `ExpireDate`) VALUES
(1, 'nyau', 'panadol', '23', 22, 22, 1, 22, '18-08-2022 15:06:29 ', '2022-10-25'),
(2, 'wakanda', 'Aspilin', '12', 20, 12, 11, 11, '18-08-2022 15:11:36 ', '2022-08-19'),
(3, 'mimi', 'eye drop', '11', 11, 11, 1, 11, '23-08-2022 12:10:57 ', '2022-08-31'),
(4, 'karugu', 'Asprine', '2', 2, 22, 2, 2, '23-08-2022 12:11:30 ', '2022-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `userauthentication`
--

CREATE TABLE `userauthentication` (
  `id` int(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userauthentication`
--

INSERT INTO `userauthentication` (`id`, `Email`, `Password`) VALUES
(1, 'cliffmlimwa@gmail.com', '1'),
(2, 'nyaunyaunge@gmail.com', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordergenerator`
--
ALTER TABLE `ordergenerator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertracker`
--
ALTER TABLE `ordertracker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receveditems`
--
ALTER TABLE `receveditems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userauthentication`
--
ALTER TABLE `userauthentication`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordergenerator`
--
ALTER TABLE `ordergenerator`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ordertracker`
--
ALTER TABLE `ordertracker`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receveditems`
--
ALTER TABLE `receveditems`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userauthentication`
--
ALTER TABLE `userauthentication`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
