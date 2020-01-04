-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2019 at 02:30 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Register`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `IcasNo` int(6) NOT NULL,
  `UniqueID` varchar(10) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Surname` varchar(25) NOT NULL,
  `ContactNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`IcasNo`, `UniqueID`, `Name`, `Surname`, `ContactNo`) VALUES
(300001, '2614723154', 'Tinashe', 'Mutyaso', '0642681132'),
(300002, '2033604176', 'Arnold', 'Mubaiwa', '0642681133'),
(351111, '3995067071', 'Arnold', 'Durnolds', '0638093489');

-- --------------------------------------------------------

--
-- Table structure for table `DuncanMthembu`
--

CREATE TABLE `DuncanMthembu` (
  `ID` int(5) NOT NULL,
  `StudentNo` int(6) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Surname` varchar(30) DEFAULT NULL,
  `Module` varchar(30) NOT NULL,
  `YearOfStudy` varchar(30) NOT NULL,
  `DateOfAttendance` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DuncanMthembu`
--

INSERT INTO `DuncanMthembu` (`ID`, `StudentNo`, `Name`, `Surname`, `Module`, `YearOfStudy`, `DateOfAttendance`) VALUES
(1, 100001, 'Arnold', 'Mubaiwa', 'Business Admin 600', '3rd Year', '2019-12-05 10:10:58'),
(2, 100002, 'Samual', 'Zagabe', 'Business Admin 600', '3rd Year', '2019-12-05 10:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `Lecturers`
--

CREATE TABLE `Lecturers` (
  `LecturerNumber` int(6) NOT NULL,
  `UniqueNumber` varchar(10) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Surname` varchar(25) NOT NULL,
  `Faculty` varchar(10) NOT NULL,
  `ContactNumber` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `TableName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Lecturers`
--

INSERT INTO `Lecturers` (`LecturerNumber`, `UniqueNumber`, `Name`, `Surname`, `Faculty`, `ContactNumber`, `Email`, `TableName`) VALUES
(215741, '2820599764', 'Duncan', 'Mthembu', 'BEMS', '0845211132', 'duncanmthembu@gmail.com', 'DuncanMthembu');

-- --------------------------------------------------------

--
-- Table structure for table `LectureTables`
--

CREATE TABLE `LectureTables` (
  `id` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Surname` varchar(25) NOT NULL,
  `tableName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LectureTables`
--

INSERT INTO `LectureTables` (`id`, `Name`, `Surname`, `tableName`) VALUES
(1, 'Lifa', 'Madikane', 'LifaMadikane'),
(2, 'Duncan', 'Mthembu', 'DuncanMthembu');

-- --------------------------------------------------------

--
-- Table structure for table `LifaMadikane`
--

CREATE TABLE `LifaMadikane` (
  `ID` int(5) NOT NULL,
  `StudentNo` int(6) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Surname` varchar(30) DEFAULT NULL,
  `Module` varchar(30) NOT NULL,
  `YearOfStudy` varchar(30) NOT NULL,
  `DateOfAttendance` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LifaMadikane`
--

INSERT INTO `LifaMadikane` (`ID`, `StudentNo`, `Name`, `Surname`, `Module`, `YearOfStudy`, `DateOfAttendance`) VALUES
(5, 100003, 'Duncan', 'Mthembu', 'Softwatre Engineering 600', '3rd Year', '2019-12-05 11:52:07'),
(8, 100001, 'Arnold', 'Mubaiwa', 'Programming 512', '3rd Year', '2019-12-05 11:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE `Students` (
  `StudentNumber` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Surname` varchar(25) NOT NULL,
  `Faculty` varchar(20) NOT NULL,
  `Qualification` varchar(20) NOT NULL,
  `YearOfStudy` varchar(10) NOT NULL,
  `ContactNumber` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `GuardianContactNo` varchar(10) NOT NULL,
  `GuardianEmailAd` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`StudentNumber`, `Name`, `Surname`, `Faculty`, `Qualification`, `YearOfStudy`, `ContactNumber`, `Email`, `GuardianContactNo`, `GuardianEmailAd`) VALUES
(100001, 'Arnold', 'Mubaiwa', 'MICT', 'DIT 3 Year', '3rd Year', '0642681132', 'arnoldmubaiwa99@gmail.com', '0837393500', 'jmubaiwa@gmail.com'),
(100002, 'Samual', 'Zagabe', 'MICT', 'DIT 3 Year', '3rd Year', '0642314568', 'samuelzagabe@gmail.com', '0632514477', 'zagabeBig@gmail.com'),
(100003, 'Duncan', 'Mthembu', 'MICT', 'DIT 3YEAR', '3rd Year', '0645897744', 'mthembuphumlani@gmail.com', '0215894411', 'mthembujohn@gmail.com'),
(128836, 'Sonia', 'Msane', 'MICT', 'DIT 3 Year', '2nd Year', '0626450704', 'SONNIA@GMAIL.COM', '0865356890', 'jmubaiwa@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`IcasNo`),
  ADD UNIQUE KEY `ContactNo` (`ContactNo`),
  ADD UNIQUE KEY `UniqueID` (`UniqueID`);

--
-- Indexes for table `DuncanMthembu`
--
ALTER TABLE `DuncanMthembu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Lecturers`
--
ALTER TABLE `Lecturers`
  ADD PRIMARY KEY (`LecturerNumber`),
  ADD UNIQUE KEY `UniqueNumber` (`UniqueNumber`,`ContactNumber`,`Email`,`TableName`);

--
-- Indexes for table `LectureTables`
--
ALTER TABLE `LectureTables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `LifaMadikane`
--
ALTER TABLE `LifaMadikane`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`StudentNumber`),
  ADD UNIQUE KEY `ContactNumber` (`ContactNumber`,`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `DuncanMthembu`
--
ALTER TABLE `DuncanMthembu`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `LectureTables`
--
ALTER TABLE `LectureTables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `LifaMadikane`
--
ALTER TABLE `LifaMadikane`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
