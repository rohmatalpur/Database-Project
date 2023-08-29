-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 10:39 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donation_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodbank`
--

CREATE TABLE `bloodbank` (
  `BLOOD_BOTTLE_CODE` varchar(10) NOT NULL,
  `BLOOD_TYPE` varchar(5) DEFAULT NULL,
  `ENTRY_DATE` date NOT NULL,
  `EXPIRY_DATE` date DEFAULT NULL,
  `CENTRE_CODE` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloodbank`
--

INSERT INTO `bloodbank` (`BLOOD_BOTTLE_CODE`, `BLOOD_TYPE`, `ENTRY_DATE`, `EXPIRY_DATE`, `CENTRE_CODE`) VALUES
('', NULL, '2023-05-07', '2023-06-06', 'PSW01'),
('BB2A', 'B-', '2023-04-30', '2023-05-31', 'PSW01'),
('BB3A', 'A+', '2023-05-08', '2023-06-07', 'KR01');

-- --------------------------------------------------------

--
-- Table structure for table `blooddonationcentre`
--

CREATE TABLE `blooddonationcentre` (
  `CENTRE_CODE` varchar(10) NOT NULL,
  `CENTRE_NAME` varchar(100) DEFAULT NULL,
  `CITY` varchar(20) DEFAULT NULL,
  `COUNTRY` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blooddonationcentre`
--

INSERT INTO `blooddonationcentre` (`CENTRE_CODE`, `CENTRE_NAME`, `CITY`, `COUNTRY`) VALUES
('KR01', 'Blood Donation Centre Kasimabad Karachi', 'Karachi', 'Pakistan'),
('KR02', 'Blood Donation Centre DHA Karachi', 'Karachi', 'Pakistan'),
('LA', 'blood donation centre Los Angeles ', 'Los Angeles', 'USA'),
('LA02', 'Blood Donation centre Los Angeles St. Lawrence', 'Los Angeles', 'USA'),
('LDN01', 'blood donation centre London BB2', 'London', 'England'),
('LH01', 'blood donation centre lahore DHA', 'lahore', 'pakistan'),
('PSW01', 'Blood Donation Center Saddar Chowk Peshawar', 'Peshawar', 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `D_NUM` int(4) NOT NULL,
  `CENTRE_CODE` varchar(10) DEFAULT NULL,
  `DATE_OF_DONATION` date NOT NULL,
  `D_LNAME` varchar(25) DEFAULT NULL,
  `D_FNAME` varchar(25) NOT NULL,
  `D_PHONE` int(11) DEFAULT NULL,
  `D_EMAIL` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`D_NUM`, `CENTRE_CODE`, `DATE_OF_DONATION`, `D_LNAME`, `D_FNAME`, `D_PHONE`, `D_EMAIL`) VALUES
(1, 'KR01', '2023-05-08', 'Malik', 'Aaiz', 46687889, 'malik04@yahoo.com'),
(2, 'PSW01', '2023-05-07', 'Gilmore', 'Lorelai', 56779898, 'lorelaig555@gmail.com');

--
-- Triggers `donor`
--
DELIMITER $$
CREATE TRIGGER `donation_centre_trigger` AFTER INSERT ON `donor` FOR EACH ROW BEGIN
INSERT INTO bloodbank (ENTRY_DATE,EXPIRY_DATE,CENTRE_CODE) VALUES (NEW.DATE_OF_DONATION,DATE_ADD(NEW.DATE_OF_DONATION,INTERVAL 30 DAY),NEW.CENTRE_CODE);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `P_NUM` int(4) NOT NULL,
  `BLOOD_BOTTLE_CODE` varchar(10) NOT NULL,
  `P_LNAME` varchar(25) DEFAULT NULL,
  `P_FNAME` varchar(25) NOT NULL,
  `P_PHONE` int(11) DEFAULT NULL,
  `DATE_USED` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`P_NUM`, `BLOOD_BOTTLE_CODE`, `P_LNAME`, `P_FNAME`, `P_PHONE`, `DATE_USED`) VALUES
(1, 'BB2A', 'Talpur', 'Umer', 2147483647, '2022-12-31');

--
-- Triggers `patient`
--
DELIMITER $$
CREATE TRIGGER `donation_centre_trigger_delete` AFTER DELETE ON `patient` FOR EACH ROW BEGIN
DELETE FROM bloodbank
where bloodbank.blood_bottle_code=patient.blood_bank_code;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('rohmatalpur', '088e4a2e6f0c20048cd3e53c639c7092bffb8524');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodbank`
--
ALTER TABLE `bloodbank`
  ADD PRIMARY KEY (`BLOOD_BOTTLE_CODE`),
  ADD KEY `FK_BANK_CENTRE` (`CENTRE_CODE`);

--
-- Indexes for table `blooddonationcentre`
--
ALTER TABLE `blooddonationcentre`
  ADD PRIMARY KEY (`CENTRE_CODE`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`D_NUM`),
  ADD UNIQUE KEY `CENTRE_CODE` (`CENTRE_CODE`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`P_NUM`),
  ADD KEY `FK_BANK_PATIENT` (`BLOOD_BOTTLE_CODE`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bloodbank`
--
ALTER TABLE `bloodbank`
  ADD CONSTRAINT `FK_BANK_CENTRE` FOREIGN KEY (`CENTRE_CODE`) REFERENCES `blooddonationcentre` (`CENTRE_CODE`);

--
-- Constraints for table `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `FK_CENTRE_DONOR` FOREIGN KEY (`CENTRE_CODE`) REFERENCES `blooddonationcentre` (`CENTRE_CODE`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `FK_BANK_PATIENT` FOREIGN KEY (`BLOOD_BOTTLE_CODE`) REFERENCES `bloodbank` (`BLOOD_BOTTLE_CODE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
