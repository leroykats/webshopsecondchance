-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 04, 2022 at 03:44 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secondchance`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `ProductID`, `Status`) VALUES
(2, 5, 6, 'wordt verwerkt');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Titel` varchar(255) NOT NULL,
  `Omschrijving` varchar(255) NOT NULL,
  `Categorie` varchar(255) NOT NULL,
  `Prijs` varchar(255) NOT NULL,
  `Afbeelding` varchar(255) NOT NULL,
  `Leeftijd` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Titel`, `Omschrijving`, `Categorie`, `Prijs`, `Afbeelding`, `Leeftijd`) VALUES
(4, 'Zwarte Eend', 'Een zwarte bad eend', 'smarthome', '4', 'images/zwarteeend.jpeg', 3),
(6, 'skandinavisk Skog', 'Geurkaars naaldbos ', 'smarthome', '25', 'images/Sk_kaars.jpeg', 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `Voornaam` varchar(255) NOT NULL,
  `Achternaam` varchar(255) NOT NULL,
  `Geboortedatum` date NOT NULL,
  `Adres` varchar(255) NOT NULL,
  `Postcode` varchar(255) NOT NULL,
  `Plaats` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `PasswordHash`, `Voornaam`, `Achternaam`, `Geboortedatum`, `Adres`, `Postcode`, `Plaats`, `Email`, `Role`) VALUES
(3, '$2y$10$c8IRzsIAgVTCletkFRYB0uKjL4Vg0pbblDNDmcWjYPn/.2wJU5oHq', 'G1', 'G1', '2000-01-05', 'Ergensstraat 45', '6754RT', 'Ergens', 'g1@test.nl', '3'),
(5, '$2y$10$glQuW5AK.ixnU2UxzMs9GuyxFa8fsHoIDSMol8Cj6U4YYH58nzzca', 'admin', 'admin', '1994-02-10', 'Ergensstraat 45', '5674RT', 'Emmen', 'admin@test.nl', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `Orders_fk0` (`UserID`),
  ADD KEY `Orders_fk1` (`ProductID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Orders_fk0` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `Orders_fk1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
