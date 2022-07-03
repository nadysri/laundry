-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 06:54 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myslaundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `name`, `username`, `password`) VALUES
(1, 'MYS LAUNDRY', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(11) NOT NULL,
  `custID` int(11) DEFAULT NULL,
  `staffID` int(11) NOT NULL,
  `runnerID` int(11) NOT NULL,
  `cfullname` varchar(50) NOT NULL,
  `cphone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `services` varchar(20) NOT NULL,
  `timedates` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `custID`, `staffID`, `runnerID`, `cfullname`, `cphone`, `address`, `services`, `timedates`, `status`) VALUES
(22, NULL, 0, 0, 'NUR HAYDA BINTI KHAIRUL ANUAR', '014-8044111', 'PT 2824 TAMAN MAHANG PERDANA ARAU PERLIS', 'Washing RM15', '2021-01-17 11:00:00', 'Ready to pickup'),
(24, NULL, 0, 0, 'noratiqah muhammad', '01123847656', 'shah alam, selangor', 'Dry Cleaning RM20', '2021-05-19 12:40:00', 'Ready to pickup'),
(25, NULL, 0, 0, 'timah', '0125454545', 'NO. 18, JALAN SESENDUK 4,', 'Dry Cleaning RM20', '2021-06-21 22:33:00', 'Ready to pickup');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custID` int(11) NOT NULL,
  `cfullname` varchar(50) NOT NULL,
  `cphone` varchar(15) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custID`, `cfullname`, `cphone`, `username`, `password`) VALUES
(2501, 'NUR HAYDA BINTI KHAIRUL ANUAR', '014804411111', 'hayda84', 'e10adc3949ba59abbe56e057f20f883e'),
(2503, 'noratiqah muhammad', '01123847656', 'nor', '941c0e65265e9b324bda171368a48af7'),
(2504, 'timah', '0125454545', 'timah', '0172d4e7f41188bec027f879123a012b');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receiptID` int(11) NOT NULL,
  `staffID` int(11) DEFAULT NULL,
  `cfullname` varchar(50) DEFAULT NULL,
  `cphone` varchar(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `services` varchar(50) DEFAULT NULL,
  `timedates` datetime(6) DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `totalPrice` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`receiptID`, `staffID`, `cfullname`, `cphone`, `address`, `services`, `timedates`, `weight`, `totalPrice`) VALUES
(10, 1022, 'NUR HAYDA BINTI KHAIRUL ANUAR', '014-8044111', 'PT 2824 TAMAN MAHANG PERDANA ARAU PERLIS', 'Washing RM15', '2021-01-17 11:00:00.000000', '2.30', '8.90'),
(22, 1022, 'NUR HAYDA BINTI KHAIRUL ANUAR', '014-8044111', 'PT 2824 TAMAN MAHANG PERDANA ARAU PERLIS', 'Washing RM15', '2021-01-17 11:00:00.000000', '2.30', '8.90');

-- --------------------------------------------------------

--
-- Table structure for table `runner`
--

CREATE TABLE `runner` (
  `runnerID` int(11) NOT NULL,
  `rname` varchar(50) DEFAULT NULL,
  `rphone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `runner`
--

INSERT INTO `runner` (`runnerID`, `rname`, `rphone`) VALUES
(3006, 'HASMADI HASSAN', '0199410063'),
(3007, 'ahmad', '0196543456');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phoneNo` varchar(15) DEFAULT NULL,
  `gen` varchar(10) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `fullname`, `phoneNo`, `gen`, `username`, `password`) VALUES
(1022, 'ABDUL FATAH BIN RAZALI', '0139331570', 'male', 'fatah12', 'password'),
(1023, 'syafiqah', '017878785', 'female', 'syaf', 'syaf11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `staffID` (`staffID`),
  ADD KEY `runnerID` (`runnerID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custID`),
  ADD UNIQUE KEY `custID` (`custID`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receiptID`),
  ADD KEY `staffID` (`staffID`);

--
-- Indexes for table `runner`
--
ALTER TABLE `runner`
  ADD PRIMARY KEY (`runnerID`),
  ADD UNIQUE KEY `runnerID` (`runnerID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`),
  ADD UNIQUE KEY `staffID` (`staffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2505;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receiptID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `runner`
--
ALTER TABLE `runner`
  MODIFY `runnerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3008;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1024;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
