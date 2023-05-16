-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 02:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testapt`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `ApartmentNumber` int(10) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `NumBedrooms` int(10) NOT NULL,
  `NumBathrooms` int(10) NOT NULL,
  `SquareFootage` int(10) NOT NULL,
  `Details` varchar(50) NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`ApartmentNumber`, `Status`, `NumBedrooms`, `NumBathrooms`, `SquareFootage`, `Details`, `Price`) VALUES
(101, 'Available', 1, 1, 710, 'N/A', 1100),
(102, 'Available', 1, 1, 750, 'N/A', 1150),
(103, 'Unavailable', 1, 1, 810, 'N/A', 1275),
(104, 'Available', 2, 1, 1150, 'N/A', 2900),
(105, 'Available', 2, 1, 1045, 'N/A', 2750),
(201, 'Available', 2, 2, 1280, 'N/A', 2890),
(202, 'Available', 2, 2, 1310, 'N/A', 3100),
(203, 'Available', 2, 2, 1410, 'N/A', 3520),
(204, 'Available', 3, 2, 1650, 'N/A', 3950),
(205, 'Available', 3, 2, 1780, 'N/A', 4100),
(206, 'Available', 3, 2, 1550, 'N/A', 3600),
(301, 'Available', 2, 2, 1530, 'N/A', 2520),
(302, 'Available', 2, 2, 1420, 'N/A', 2300),
(303, 'Available', 3, 3, 1890, 'N/A', 4250),
(304, 'Available', 3, 3, 1790, 'N/A', 4100),
(305, 'Available', 2, 2, 1460, 'N/A', 2410),
(306, 'Available', 4, 3, 2100, 'N/A', 4360);

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `Description` varchar(100) NOT NULL,
  `Price` double NOT NULL,
  `DueDate` varchar(50) NOT NULL,
  `LeaseID` int(10) NOT NULL,
  `BillingID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`Description`, `Price`, `DueDate`, `LeaseID`, `BillingID`) VALUES
('Fee', 200, '05/26/2023', 846015, 1368),
('May Rent', 1275, '05/19/2023', 846015, 148533),
('New Key', 100, '4/25/2023', 846015, 326687);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmpID` int(10) NOT NULL,
  `EmpSSN` int(10) NOT NULL,
  `Role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lease`
--

CREATE TABLE `lease` (
  `LeaseID` int(10) NOT NULL,
  `StartDate` varchar(50) NOT NULL,
  `EndDate` varchar(50) NOT NULL,
  `NumResidents` int(10) NOT NULL,
  `Price` double NOT NULL,
  `ResSSN` int(10) NOT NULL,
  `ApartmentNumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lease`
--

INSERT INTO `lease` (`LeaseID`, `StartDate`, `EndDate`, `NumResidents`, `Price`, `ResSSN`, `ApartmentNumber`) VALUES
(846015, '04/19/2023', '05/19/2023', 1, 1275, 111223333, 103);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Description` varchar(100) NOT NULL,
  `AmountPaid` double NOT NULL,
  `PaymentDate` varchar(50) NOT NULL,
  `LeaseID` int(10) NOT NULL,
  `BillingID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Description`, `AmountPaid`, `PaymentDate`, `LeaseID`, `BillingID`) VALUES
('Fee payment', 200, '04/19/2023', 846015, 1368);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `SSN` int(15) NOT NULL,
  `Phone_Number` varchar(15) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL DEFAULT 'newuser',
  `Type` varchar(10) NOT NULL,
  `auth` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`SSN`, `Phone_Number`, `Name`, `Email`, `Password`, `Type`, `auth`) VALUES
(0, '1111111111', 'New Resident', 'res5@email.com', '123', 'Resident', 1),
(99999999, '9999999', 'Test User', 'test@email.com', '123', 'Admin', 1),
(111223333, '3334445555', 'Nick Conn', 'resident1@email.com', '111', 'Resident', 1),
(111334444, '9999999999', 'My Name', 'resident3@email.com', '123', 'Resident', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question1`
--

CREATE TABLE `question1` (
  `email` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question2`
--

CREATE TABLE `question2` (
  `email` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question2`
--

INSERT INTO `question2` (`email`, `answer`) VALUES
('res5@email.com', 'soccer'),
('resident1@email.com', 'soccer'),
('resident3@email.com', 'soccer'),
('test@email.com', 'soccer');

-- --------------------------------------------------------

--
-- Table structure for table `question3`
--

CREATE TABLE `question3` (
  `email` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question4`
--

CREATE TABLE `question4` (
  `email` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `ResSSN` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`ResSSN`) VALUES
(0),
(111223333),
(111334444);

-- --------------------------------------------------------

--
-- Table structure for table `testquestion`
--

CREATE TABLE `testquestion` (
  `email` varchar(50) NOT NULL,
  `question1` tinyint(1) NOT NULL DEFAULT 0,
  `question2` tinyint(1) NOT NULL DEFAULT 0,
  `question3` tinyint(1) NOT NULL DEFAULT 0,
  `question4` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testquestion`
--

INSERT INTO `testquestion` (`email`, `question1`, `question2`, `question3`, `question4`) VALUES
('res5@email.com', 0, 1, 0, 0),
('resident1@email.com', 0, 1, 0, 0),
('resident3@email.com', 0, 1, 0, 0),
('test@email.com', 0, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`ApartmentNumber`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`BillingID`),
  ADD KEY `FK_BillingLeaseID` (`LeaseID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmpSSN`),
  ADD UNIQUE KEY `EmpID` (`EmpID`);

--
-- Indexes for table `lease`
--
ALTER TABLE `lease`
  ADD PRIMARY KEY (`LeaseID`),
  ADD KEY `FK_LeaseSSN` (`ResSSN`),
  ADD KEY `FK_ApartmentNumber` (`ApartmentNumber`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD KEY `FK_PaymentLeaseID` (`LeaseID`),
  ADD KEY `FK_BillingID` (`BillingID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`SSN`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `question1`
--
ALTER TABLE `question1`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `question2`
--
ALTER TABLE `question2`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `question3`
--
ALTER TABLE `question3`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `question4`
--
ALTER TABLE `question4`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`ResSSN`);

--
-- Indexes for table `testquestion`
--
ALTER TABLE `testquestion`
  ADD PRIMARY KEY (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `FK_BillingLeaseID` FOREIGN KEY (`LeaseID`) REFERENCES `lease` (`LeaseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_EmpSSN` FOREIGN KEY (`EmpSSN`) REFERENCES `person` (`SSN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lease`
--
ALTER TABLE `lease`
  ADD CONSTRAINT `FK_ApartmentNumber` FOREIGN KEY (`ApartmentNumber`) REFERENCES `apartment` (`ApartmentNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_LeaseSSN` FOREIGN KEY (`ResSSN`) REFERENCES `resident` (`ResSSN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK_BillingID` FOREIGN KEY (`BillingID`) REFERENCES `billing` (`BillingID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PaymentLeaseID` FOREIGN KEY (`LeaseID`) REFERENCES `lease` (`LeaseID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question1`
--
ALTER TABLE `question1`
  ADD CONSTRAINT `FK_Question1Email` FOREIGN KEY (`email`) REFERENCES `person` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question2`
--
ALTER TABLE `question2`
  ADD CONSTRAINT `FK_Question2Email` FOREIGN KEY (`email`) REFERENCES `person` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question3`
--
ALTER TABLE `question3`
  ADD CONSTRAINT `FK_Question3Email` FOREIGN KEY (`email`) REFERENCES `person` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question4`
--
ALTER TABLE `question4`
  ADD CONSTRAINT `FK_Question4Email` FOREIGN KEY (`email`) REFERENCES `person` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resident`
--
ALTER TABLE `resident`
  ADD CONSTRAINT `FK_ResSSN` FOREIGN KEY (`ResSSN`) REFERENCES `person` (`SSN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testquestion`
--
ALTER TABLE `testquestion`
  ADD CONSTRAINT `FK_QuestionEmail` FOREIGN KEY (`email`) REFERENCES `person` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
