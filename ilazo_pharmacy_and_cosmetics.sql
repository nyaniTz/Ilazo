-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2024 at 06:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordergenerator`
--

INSERT INTO `ordergenerator` (`id`, `OrderGenerators`) VALUES
(1, '1');

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
  `OrderID` varchar(255) DEFAULT NULL,
  `Date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordertracker`
--

CREATE TABLE `ordertracker` (
  `id` int(255) NOT NULL,
  `ProductId` varchar(255) NOT NULL,
  `OrderID` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `PurchasingQty` int(255) DEFAULT NULL,
  `Amount` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recevedauthentication`
--

CREATE TABLE `recevedauthentication` (
  `id` int(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recevedauthentication`
--

INSERT INTO `recevedauthentication` (`id`, `Email`, `Password`) VALUES
(1, '', 'kingkelly7898');

-- --------------------------------------------------------

--
-- Table structure for table `receveditems`
--

CREATE TABLE `receveditems` (
  `id` int(255) NOT NULL,
  `ProductId` varchar(255) NOT NULL,
  `VendorName` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `Quantity` int(255) NOT NULL,
  `PurchasingCost` int(255) NOT NULL,
  `Cost` int(255) NOT NULL,
  `Amount` int(255) DEFAULT NULL,
  `RecevedDate` varchar(255) NOT NULL,
  `ExpireDate` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receveditems`
--

INSERT INTO `receveditems` (`id`, `ProductId`, `VendorName`, `Description`, `Unit`, `Quantity`, `PurchasingCost`, `Cost`, `Amount`, `RecevedDate`, `ExpireDate`, `Image`) VALUES
(1, 'PROD2', 'Nyau', 'Panadol', 'Ampoules', 54, 2, 12, 108, '18-11-2024 17:12:40 ', '2024-12-01', ''),
(2, 'PROD2', 'Nyau', 'Aspirine', 'Capsules', 100, 2, 6, 200, '18-11-2024 17:13:08 ', '2025-05-08', ''),
(11, 'PROD3', 'hello', 'panadol', 'Bottles', 233, 2, 1, 466, '26-11-2024 20:01:15', '2024-12-20', ''),
(14, 'PROD12', '$ VendorName', 'Magnesium', 'Bottles', 123, 2, 3, 246, '27-11-2024 17:31:06', '2025-05-23', 'uploads/Designer.jpeg'),
(15, 'PROD15', '$ VendorName', 'jee', 'Bottles', 2232, 12, 11, 26784, '27-11-2024 19:16:23', '2025-04-11', 'uploads/Designer.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `userauthentication`
--

CREATE TABLE `userauthentication` (
  `id` int(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userauthentication`
--

INSERT INTO `userauthentication` (`id`, `Email`, `Password`) VALUES
(1, 'cliffmlimwa@gmail.com', '1');

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
-- Indexes for table `recevedauthentication`
--
ALTER TABLE `recevedauthentication`
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordertracker`
--
ALTER TABLE `ordertracker`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recevedauthentication`
--
ALTER TABLE `recevedauthentication`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receveditems`
--
ALTER TABLE `receveditems`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userauthentication`
--
ALTER TABLE `userauthentication`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
