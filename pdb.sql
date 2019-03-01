-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2018 at 07:09 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(99) NOT NULL,
  `type` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adid`, `email`, `password`, `type`, `fullname`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Admin'),
(57, 'doctor@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'doctor', 'Atikur Rahman'),
(58, 'doctor1@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'doctor', 'Namira Sultana'),
(59, 'tanjina@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Tanjina Jahan'),
(60, 'rumi@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Rehana Parvin'),
(61, 'shabiha@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Shabiha Akter'),
(62, 'tousi@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Farmadi Tousi'),
(63, 'suvrho@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Suvrho Mojumdar'),
(64, 'receptionist@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'receptionist', 'Receptionist'),
(65, 'nipa@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Sharmin Akter'),
(66, 'khalid@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'doctor', 'khalid Hasan'),
(74, 'raihan@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Raihan Subhan'),
(75, 'shapla@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Sanjida siddique'),
(76, 'ratul@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Rabiul Alam'),
(77, 'sadia@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Sadia Habib'),
(78, 'sadia@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Sadia Habib'),
(79, 'konik@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'doctor', 'Juhanur Rahman'),
(82, 'mjk.limon@gmail.com', '202cb962ac59075b964b07152d234b70', 'patient', 'Md Jahid Khan Limon'),
(83, 'anita@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Anita Rani Das'),
(84, 'tamanna@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Tahfima Ferdous'),
(85, 'ruhul@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Ruhul Amin'),
(86, 'asha@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Afsana Naznin'),
(87, 'shetu@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Shahnur Sharmin'),
(88, 'suraiya@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Suraiya Akter'),
(89, 'sonia@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'patient', 'Sonia Akter');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `apid` int(11) NOT NULL,
  `patid` int(11) NOT NULL,
  `docid` int(11) NOT NULL,
  `date` date NOT NULL,
  `slno` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `prescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`apid`, `patid`, `docid`, `date`, `slno`, `status`, `prescription`) VALUES
(11, 2, 11, '2018-07-23', 0, 1, 'Doxoven'),
(13, 1, 12, '2018-07-23', 0, 1, 'cicloson'),
(15, 4, 11, '2018-07-23', 0, 1, 'hggjhgjgjgjgugyu\r\nhjjkhk\r\nbjhguy'),
(16, 4, 12, '2018-07-23', 0, 1, 'kjvkvj\r\nvjkll\r\nfjbklf\r\nkbl'),
(18, 6, 12, '2018-07-23', 0, 1, 'ytruyyu\r\niio'),
(19, 4, 11, '2018-07-23', 0, 1, 'dfdf'),
(41, 3, 11, '2018-07-26', 0, 1, 'asdfg'),
(89, 16, 11, '2018-09-06', 0, 1, 'uuuyiuiu'),
(90, 1, 11, '2018-09-08', 1, 0, ''),
(91, 2, 11, '2018-09-08', 2, 0, ''),
(92, 3, 11, '2018-09-08', 3, 0, ''),
(93, 4, 11, '2018-09-08', 4, 0, ''),
(95, 5, 11, '2018-09-08', 5, 0, ''),
(96, 6, 11, '2018-09-08', 6, 0, ''),
(97, 9, 11, '2018-09-08', 7, 0, ''),
(98, 10, 11, '2018-09-08', 8, 0, ''),
(99, 11, 11, '2018-09-08', 9, 0, ''),
(100, 12, 11, '2018-09-08', 10, 0, ''),
(101, 15, 11, '2018-09-08', 11, 0, ''),
(102, 16, 11, '2018-09-08', 12, 0, ''),
(103, 19, 11, '2018-09-08', 13, 0, ''),
(104, 17, 11, '2018-09-08', 14, 0, ''),
(105, 18, 11, '2018-09-08', 15, 0, ''),
(106, 20, 11, '2018-09-08', 16, 0, ''),
(107, 21, 11, '2018-09-08', 17, 0, ''),
(108, 2, 11, '2018-09-08', 18, 0, ''),
(109, 4, 11, '2018-09-08', 19, 0, ''),
(110, 16, 11, '2018-09-08', 20, 0, ''),
(111, 22, 11, '2018-09-09', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `docid` int(11) NOT NULL,
  `speciality` varchar(50) NOT NULL,
  `adid` int(11) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `phone` varchar(90) NOT NULL,
  `available_days` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `regular_fee` int(11) NOT NULL,
  `followup_fee` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`docid`, `speciality`, `adid`, `address`, `phone`, `available_days`, `time`, `regular_fee`, `followup_fee`, `email`, `fullname`, `password`) VALUES
(11, 'Cardiologist', 57, 'Uttara, Dhaka', '01915566754', 'Friday and Saturday', '6pm to 10pm', 1000, 600, 'doctor@gmail.com', 'Atikur Rahman', 'c4ca4238a0b923820dcc509a6f75849b'),
(12, 'Skin & VD', 58, 'Mirpur,Dhaka', '1915566754', 'Monday to Thursday', '10 am to 1 pm', 800, 500, 'doctor1@gmail.com', 'Namira Sultana', 'c4ca4238a0b923820dcc509a6f75849b'),
(13, 'Neuromedicine', 66, 'Uttara, Dhaka', '01915566754', 'Monday to Thursday', '6pm to 10pm', 600, 400, 'khalid@gmail.com', 'khalid Hasan', 'c4ca4238a0b923820dcc509a6f75849b'),
(14, 'Liver', 79, 'kishoreganj', '01915566754', 'saghhjhh', '111', 6567, 768, 'konik@gmail.com', 'Juhanur Rahman', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invid` int(11) NOT NULL,
  `patid` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invid`, `patid`, `datetime`, `total`) VALUES
(13, 1, '2018-07-19 15:34:50', 400),
(14, 1, '2018-07-23 14:33:51', 5000),
(15, 1, '2018-07-23 15:02:09', 5000),
(16, 1, '2018-07-23 15:02:20', 5000),
(17, 4, '2018-07-24 02:08:42', 500),
(18, 4, '2018-07-24 03:43:35', 1500),
(19, 4, '2018-07-24 03:44:45', 500),
(20, 16, '2018-09-05 12:37:52', 900),
(21, 22, '2018-09-08 12:35:34', 1400);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patid` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(11) NOT NULL,
  `problems` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(90) NOT NULL,
  `datetime` datetime(6) NOT NULL,
  `blood_group` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `adid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patid`, `fullname`, `gender`, `age`, `problems`, `address`, `phone`, `datetime`, `blood_group`, `email`, `password`, `adid`) VALUES
(1, 'Tanjina Jahan', 'Female', 22, '', 'Uttara, Dhaka', '0195675805576', '2018-07-19 15:16:30.000000', 'A+', 'tanjina@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 59),
(2, 'Rehana Parvin', 'Female', 22, '', 'Gazipur', '1915566754', '2018-07-19 15:17:17.000000', 'O+', 'rumi@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 60),
(3, 'Shabiha Akter', 'Female', 22, '', 'Savar', '1915566754', '2018-07-19 15:18:12.000000', 'A+', 'shabiha@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 61),
(4, 'Farmadi Tousi', 'Male', 22, '', 'Comilla', '1915566754', '2018-07-19 15:19:07.000000', 'B+', 'tousi@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 62),
(5, 'Suvrho Mojumdar', 'Male', 22, '', 'Tangail', '1915566754', '2018-07-19 15:20:04.000000', 'B+', 'suvrho@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 63),
(6, 'Sharmin Akter', 'Female', 22, '', 'Mirpur,Dhaka', '1915566754', '2018-08-03 00:00:00.000000', 'B+', 'nipa@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(9, 'Raihan Subhan', 'Male', 22, '', 'Uttara, Dhaka', '1111119', '2018-08-03 17:02:15.000000', 'AB-', 'raihan@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(10, 'Sanjida siddique', 'Female', 22, '', 'Uttara, Dhaka', '01915566754', '2018-08-03 17:09:11.000000', 'B-', 'shapla@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 75),
(11, 'Rabiul Alam', 'Male', 22, '', 'Savar', '01915566754', '2018-08-03 17:15:40.000000', 'B-', 'ratul@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(12, 'Sadia Habib', 'Female', 22, '', 'Uttara, Dhaka', '01915566754', '2018-08-03 17:18:25.000000', 'O+', 'sadia@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 78),
(15, 'Md Jahid Khan Limon', 'Male', 21, '', 'Uttara, Dhaka', '01956758055', '2018-08-09 15:50:21.000000', 'B+', 'mjk.limon@gmail.com', '202cb962ac59075b964b07152d234b70', 82),
(16, 'Anita Rani Das', 'Female', 22, '', 'kishoreganj', '19155667540', '2018-08-15 21:03:25.000000', 'AB+', 'anita@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 83),
(17, 'Tahfima Ferdous', 'Female', 22, '', 'kishoreganj', '01915566754', '2018-08-15 21:04:56.000000', 'B+', 'tamanna@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 84),
(18, 'Ruhul Amin', 'Male', 22, '', 'kishoreganj', '01686657546', '2018-09-08 00:22:51.000000', 'AB+', 'ruhul@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 85),
(19, 'Afsana Naznin', 'Female', 22, '', 'Ajimpur', '19155667540', '2018-09-08 00:24:01.000000', 'B+', 'asha@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 86),
(20, 'Shahnur Sharmin', 'Female', 22, '', 'kishoreganj', '01915566754', '2018-09-08 00:25:29.000000', 'B-', 'shetu@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 87),
(21, 'Suraiya Akter', 'Female', 22, '', 'Ajimpur', '01915566754', '2018-09-08 00:26:31.000000', 'A-', 'suraiya@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 88),
(22, 'Sonia Akter', 'Female', 23, '', 'sector#12,dhaka', '19155667540', '2018-09-08 01:05:15.000000', 'B-', 'sonia@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 89);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `preid` int(50) NOT NULL,
  `apid` int(50) NOT NULL,
  `patid` int(50) NOT NULL,
  `docid` int(50) NOT NULL,
  `testid` int(50) NOT NULL,
  `patname` varchar(50) NOT NULL,
  `docname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`preid`, `apid`, `patid`, `docid`, `testid`, `patname`, `docname`) VALUES
(1, 11, 59, 11, 1, 'Tanjina Jahan', 'Atikur Rahman');

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

CREATE TABLE `receptionists` (
  `reid` int(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionists`
--

INSERT INTO `receptionists` (`reid`, `fullname`, `email`, `password`) VALUES
(1, 'receptionist', 'receptionist@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `suggesttest`
--

CREATE TABLE `suggesttest` (
  `suggestid` int(11) NOT NULL,
  `apid` int(11) NOT NULL,
  `patid` int(11) NOT NULL,
  `testid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggesttest`
--

INSERT INTO `suggesttest` (`suggestid`, `apid`, `patid`, `testid`) VALUES
(8, 1, 1, 1),
(9, 1, 1, 1),
(10, 1, 1, 5),
(11, 2, 2, 7),
(12, 1, 1, 1),
(13, 1, 1, 5),
(14, 1, 1, 1),
(15, 1, 1, 5),
(16, 9, 1, 1),
(17, 9, 1, 5),
(18, 10, 1, 5),
(19, 10, 1, 6),
(20, 11, 2, 5),
(21, 13, 1, 5),
(22, 15, 4, 6),
(23, 16, 4, 5),
(24, 19, 4, 5),
(25, 41, 3, 1),
(26, 18, 6, 5),
(27, 89, 16, 1),
(28, 111, 22, 1),
(29, 111, 22, 5);

-- --------------------------------------------------------

--
-- Table structure for table `testlist`
--

CREATE TABLE `testlist` (
  `testlistid` int(11) NOT NULL,
  `patid` int(11) NOT NULL,
  `invid` int(11) NOT NULL,
  `testid` tinyint(4) NOT NULL,
  `status` int(11) NOT NULL,
  `deliverydate` date NOT NULL,
  `report` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testlist`
--

INSERT INTO `testlist` (`testlistid`, `patid`, `invid`, `testid`, `status`, `deliverydate`, `report`) VALUES
(28, 1, 13, 1, 3, '2018-07-23', '<p>Everything is ok...!</p>\r\n'),
(29, 1, 14, 1, 3, '2018-07-24', '<p>asdfg</p>\r\n'),
(30, 1, 14, 1, 1, '2018-07-10', ''),
(31, 1, 14, 5, 0, '0000-00-00', ''),
(32, 1, 14, 1, 0, '0000-00-00', ''),
(33, 1, 14, 5, 3, '2018-08-25', '<p>Nil...</p>\r\n'),
(34, 1, 14, 1, 0, '0000-00-00', ''),
(35, 1, 14, 5, 0, '0000-00-00', ''),
(36, 1, 14, 1, 0, '0000-00-00', ''),
(37, 1, 14, 5, 0, '0000-00-00', ''),
(38, 1, 14, 5, 0, '0000-00-00', ''),
(39, 1, 14, 6, 0, '0000-00-00', ''),
(40, 1, 15, 1, 0, '0000-00-00', ''),
(41, 1, 15, 1, 0, '0000-00-00', ''),
(42, 1, 15, 5, 0, '0000-00-00', ''),
(43, 1, 15, 1, 0, '0000-00-00', ''),
(44, 1, 15, 5, 0, '0000-00-00', ''),
(45, 1, 15, 1, 0, '0000-00-00', ''),
(46, 1, 15, 5, 0, '0000-00-00', ''),
(47, 1, 15, 1, 0, '0000-00-00', ''),
(48, 1, 15, 5, 0, '0000-00-00', ''),
(49, 1, 15, 5, 0, '0000-00-00', ''),
(50, 1, 15, 6, 0, '0000-00-00', ''),
(51, 1, 16, 1, 0, '0000-00-00', ''),
(52, 1, 16, 1, 0, '0000-00-00', ''),
(53, 1, 16, 5, 0, '0000-00-00', ''),
(54, 1, 16, 1, 0, '0000-00-00', ''),
(55, 1, 16, 5, 0, '0000-00-00', ''),
(56, 1, 16, 1, 0, '0000-00-00', ''),
(57, 1, 16, 5, 0, '0000-00-00', ''),
(58, 1, 16, 1, 0, '0000-00-00', ''),
(59, 1, 16, 5, 0, '0000-00-00', ''),
(60, 1, 16, 5, 0, '0000-00-00', ''),
(61, 1, 16, 6, 0, '0000-00-00', ''),
(62, 4, 17, 6, 3, '2018-07-23', '<p>Everything is Good...!</p>\r\n'),
(63, 4, 18, 6, 0, '0000-00-00', ''),
(64, 4, 18, 5, 0, '0000-00-00', ''),
(65, 4, 18, 5, 0, '0000-00-00', ''),
(66, 4, 19, 5, 3, '2018-08-29', '<p>jhukj kjjol</p>\r\n'),
(67, 16, 20, 1, 3, '2018-09-06', '<p>Everything is ok..!</p>\r\n'),
(68, 16, 20, 5, 0, '0000-00-00', ''),
(69, 22, 21, 1, 3, '2018-09-08', '<p>everything is ok</p>\r\n'),
(70, 22, 21, 5, 0, '0000-00-00', ''),
(71, 22, 21, 6, 0, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `testid` int(11) NOT NULL,
  `testname` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `template` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`testid`, `testname`, `price`, `template`) VALUES
(1, 'Blood', 400, ''),
(5, 'Sugar', 500, ''),
(6, 'Cholesterol', 500, ''),
(7, 'Liver', 800, ''),
(8, 'Kidney', 600, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adid`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`apid`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`docid`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invid`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patid`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`preid`);

--
-- Indexes for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD PRIMARY KEY (`reid`);

--
-- Indexes for table `suggesttest`
--
ALTER TABLE `suggesttest`
  ADD PRIMARY KEY (`suggestid`);

--
-- Indexes for table `testlist`
--
ALTER TABLE `testlist`
  ADD PRIMARY KEY (`testlistid`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`testid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `apid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `docid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `preid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `reid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suggesttest`
--
ALTER TABLE `suggesttest`
  MODIFY `suggestid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `testlist`
--
ALTER TABLE `testlist`
  MODIFY `testlistid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `testid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
