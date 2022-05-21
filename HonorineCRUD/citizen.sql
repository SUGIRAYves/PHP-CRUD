-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 09:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citizensjobstatus`
--

-- --------------------------------------------------------

--
-- Table structure for table `citizen`
--

CREATE TABLE `citizen` (
  `id` int(11) NOT NULL,
  `cid` varchar(25) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `age` varchar(3) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citizen`
--

INSERT INTO `citizen` (`id`, `cid`, `fullname`, `address`, `age`, `sex`, `status`, `company`, `salary`) VALUES
(8, '1111111111111100', 'Jeanine MUKANKUSI', 'Rugerero', '48', 'Female', 'Unemployed ', 'NONE', 'NONE'),
(10, '1111111111111119', 'SUGIRA Yves', 'Rubavu', '22', 'Male', 'Student', 'AFRITECH', '40,000 RWF'),
(11, '1111111111111112', 'NIZEYIMANA Daniel', 'huye', '25', 'Male', 'Employed', 'D&D', '30,000RWF'),
(12, '1111111111111115', 'Honorine izabayo', 'Kigali', '23', 'Female', 'Unemployed ', 'NONE', 'NONE'),
(13, '1111111111111110', 'TURAHIRWA DJIBRIL', 'Rubavu', '25', 'Male', 'Employed', 'ARIGUS', '30,000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citizen`
--
ALTER TABLE `citizen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cid` (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citizen`
--
ALTER TABLE `citizen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
