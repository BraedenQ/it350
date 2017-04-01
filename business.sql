-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 01, 2017 at 09:54 AM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business`
--

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `buildID` int(11) NOT NULL,
  `busID` int(11) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`buildID`, `busID`, `address`) VALUES
(1, 1, '800 E 600 S Provo, UT 84606'),
(2, 2, '685 E 551 N Lehi, UT 78621');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `busID` int(11) NOT NULL,
  `ownerName` varchar(20) DEFAULT NULL,
  `foundingDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`busID`, `ownerName`, `foundingDate`) VALUES
(1, 'Tanner Perdue', '2016-11-22'),
(2, 'Seth Millionaire', '2017-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `emplId` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`emplId`, `type`) VALUES
(101, 'Pediatrics'),
(102, 'Surgeon'),
(103, 'Neurosurgeon'),
(104, 'Foot Doctor'),
(105, 'Emergency Room'),
(106, 'Pain Management');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emplID` int(11) NOT NULL,
  `busID` int(11) DEFAULT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(2) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emplID`, `busID`, `firstName`, `lastName`, `address`, `startDate`, `age`) VALUES
(101, 1, 'Bob', 'C', '495 Keylog Lane', '1980-03-15', NULL),
(102, 2, 'Shoe', 'D', '20485 Green Way', '1982-12-19', NULL),
(103, 1, 'Grace', 'M', '395929 Great Fire', '1960-03-15', NULL),
(104, 1, 'Runner', 'P', '833 Tool Lane', '1995-12-26', NULL),
(105, 2, 'Great', 'A', '38 Neat Lane', '1990-12-12', NULL),
(106, 1, 'Braeden', 'Q', '485 Trace Hill', '1991-01-16', NULL),
(201, 1, 'Grace', 'K', '94580 Main', '2017-03-06', NULL),
(202, 2, 'Fire', 'L', '48503 Chill', '2017-01-23', NULL),
(203, 2, 'Fun', 'H', '3948 Lost', '2016-10-18', NULL),
(204, 2, 'Tool', 'L', '3948 Grab', '2016-11-20', NULL),
(205, 1, 'Platapus', 'P', '38958 Phineas', '2016-11-14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invID` int(11) NOT NULL,
  `busID` int(11) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `numberOfUnits` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invID`, `busID`, `Description`, `numberOfUnits`) VALUES
(1, 1, 'Needles', 10),
(1, 2, 'Bandaids', 15),
(2, 1, 'Bandage', 53),
(2, 2, 'Tongue Depressors', 11),
(3, 1, 'Cotton Balls', 96),
(3, 2, 'Water Bottles', 11),
(4, 1, 'Pens', 6),
(4, 2, 'Scale', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jobID` int(11) NOT NULL,
  `inRoleSince` date DEFAULT NULL,
  `tenure` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobID`, `inRoleSince`, `tenure`) VALUES
(1, '2017-03-21', NULL),
(2, '2017-03-21', NULL),
(3, '2017-03-21', NULL),
(4, '2017-03-21', NULL),
(5, '2017-03-21', NULL);

--
-- Triggers `job`
--
DELIMITER $$
CREATE TRIGGER `Update Tenure` AFTER INSERT ON `job` FOR EACH ROW SET @job.tenure = 1
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jobReview`
--

CREATE TABLE `jobReview` (
  `revID` int(11) NOT NULL,
  `jobID` int(11) DEFAULT NULL,
  `notes` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobReview`
--

INSERT INTO `jobReview` (`revID`, `jobID`, `notes`) VALUES
(1, 1, 'Great Job. Don\'t Suck.'),
(2, 2, 'I like where you\'re going'),
(3, 3, 'Great work!'),
(4, 4, 'You\'re about to be fired'),
(5, 5, 'Work out more');

-- --------------------------------------------------------

--
-- Table structure for table `medicalRecords`
--

CREATE TABLE `medicalRecords` (
  `recordID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `dateVisited` date DEFAULT NULL,
  `diagnosis` varchar(50) DEFAULT NULL,
  `prescription` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicalRecords`
--

INSERT INTO `medicalRecords` (`recordID`, `patientID`, `dateVisited`, `diagnosis`, `prescription`) VALUES
(1, 1, '2016-09-12', 'Nothing', 'None'),
(1, 2, '2017-03-21', 'Good check up', 'none'),
(1, 3, '2017-01-23', 'Obesity', 'workout'),
(1, 4, '2017-03-01', 'Cut off arm', 'pain killers'),
(1, 5, '2017-03-08', 'FOMO', 'Facebook'),
(2, 1, '2016-12-20', 'Cancer', 'Chemo'),
(2, 3, '2017-03-06', 'Good weight', 'None'),
(3, 1, '2017-01-16', 'Recovered', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` int(11) NOT NULL,
  `buildID` int(11) DEFAULT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `doctor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `buildID`, `firstName`, `lastName`, `address`, `doctor`) VALUES
(1, 1, 'Braeden', 'Cool', '85 Wymoung', 101),
(2, 2, 'Tanner', 'Cool', '93 Fire Lane', 102),
(3, 1, 'Grace', 'Chili', '9395 Man Lane', 101),
(4, 1, 'Chicken', 'Nuggets', '294 McDonalds', 103);

-- --------------------------------------------------------

--
-- Table structure for table `supportStaff`
--

CREATE TABLE `supportStaff` (
  `emplID` int(11) NOT NULL,
  `job` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supportStaff`
--

INSERT INTO `supportStaff` (`emplID`, `job`) VALUES
(201, 1),
(202, 2),
(203, 3),
(204, 4),
(205, 5);

-- --------------------------------------------------------

--
-- Table structure for table `test2`
--

CREATE TABLE `test2` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `computer` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test2`
--

INSERT INTO `test2` (`id`, `name`, `computer`) VALUES
(1, 'tanner', 'mac'),
(2, 'logan', 'pc');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transID` int(11) NOT NULL,
  `buildID` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `amount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transID`, `buildID`, `type`, `amount`) VALUES
(1, 1, 'Equipment', 12.86),
(1, 2, 'Staffing', 80.56),
(2, 1, 'Staffing', 50.6),
(2, 2, 'Equipment', 80.2),
(3, 1, 'Services', 100.65),
(3, 2, 'More equipement', 100.25),
(4, 1, 'Insurance', 50.98),
(4, 2, 'Rent', 158.25),
(5, 1, 'New Computer', 20.65);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(4) NOT NULL,
  `busID` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `busID`, `username`, `password`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`buildID`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`busID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`emplId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emplID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invID`,`busID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jobID`);

--
-- Indexes for table `jobReview`
--
ALTER TABLE `jobReview`
  ADD PRIMARY KEY (`revID`);

--
-- Indexes for table `medicalRecords`
--
ALTER TABLE `medicalRecords`
  ADD PRIMARY KEY (`recordID`,`patientID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientID`);

--
-- Indexes for table `supportStaff`
--
ALTER TABLE `supportStaff`
  ADD PRIMARY KEY (`emplID`);

--
-- Indexes for table `test2`
--
ALTER TABLE `test2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transID`,`buildID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `busID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emplID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `test2`
--
ALTER TABLE `test2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
