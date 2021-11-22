-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 14, 2021 at 05:04 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

DROP TABLE IF EXISTS `tblcourse`;
CREATE TABLE IF NOT EXISTS `tblcourse` (
  `courseID` int NOT NULL,
  `courseName` varchar(40) NOT NULL,
  PRIMARY KEY (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`courseID`, `courseName`) VALUES
(101, 'BSC Computer Science'),
(102, 'BSC Maths');

-- --------------------------------------------------------

--
-- Table structure for table `tblfees`
--

DROP TABLE IF EXISTS `tblfees`;
CREATE TABLE IF NOT EXISTS `tblfees` (
  `studentID` int NOT NULL,
  `semesterID` int NOT NULL,
  `feesPaid` float NOT NULL DEFAULT '0',
  `datePaid` date DEFAULT NULL,
  `nextDue` date NOT NULL,
  KEY `studentID` (`studentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblfees`
--

INSERT INTO `tblfees` (`studentID`, `semesterID`, `feesPaid`, `datePaid`, `nextDue`) VALUES
(2559, 1, 3500, '2021-10-29', '2022-03-01'),
(3560, 1, 2001, NULL, '2021-10-01'),
(102, 0, 3000, NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

DROP TABLE IF EXISTS `tblstudent`;
CREATE TABLE IF NOT EXISTS `tblstudent` (
  `studentID` int NOT NULL,
  `studentName` varchar(25) NOT NULL,
  `studentFatherName` varchar(25) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `studentLocation` varchar(25) NOT NULL,
  `courseID` int NOT NULL,
  `YearJoined` int NOT NULL,
  PRIMARY KEY (`studentID`),
  KEY `courseID` (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`studentID`, `studentName`, `studentFatherName`, `Gender`, `dob`, `studentLocation`, `courseID`, `YearJoined`) VALUES
(102, 'reva', 'jk', 'Female', '2018-08-09', 'chennai', 101, 0),
(2559, 'Priya', 'Mohan', 'Female', '2018-11-01', 'Chennai', 102, 2020),
(3560, 'Shanthi', 'Sabari1', 'Male', '2018-07-01', 'Trichy', 102, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

DROP TABLE IF EXISTS `tblsubjects`;
CREATE TABLE IF NOT EXISTS `tblsubjects` (
  `subjectID` int NOT NULL,
  `courseID` int NOT NULL,
  `semesterID` int NOT NULL,
  `subjectName` varchar(40) NOT NULL,
  PRIMARY KEY (`subjectID`),
  KEY `courseID` (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`subjectID`, `courseID`, `semesterID`, `subjectName`) VALUES
(1, 101, 1, 'C programming'),
(2, 102, 0, 'statistics'),
(3, 101, 2, 'VB'),
(4, 101, 2, 'Java'),
(5, 101, 2, 'C++ Programming');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblfees`
--
ALTER TABLE `tblfees`
  ADD CONSTRAINT `tblfees_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `tblstudent` (`studentID`);

--
-- Constraints for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD CONSTRAINT `tblstudent_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `tblcourse` (`courseID`);

--
-- Constraints for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD CONSTRAINT `tblsubjects_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `tblcourse` (`courseID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
