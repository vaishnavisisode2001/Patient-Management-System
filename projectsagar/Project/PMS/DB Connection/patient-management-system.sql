-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 01:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient-management-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `b_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `pathology_fees` int(11) NOT NULL,
  `room_fees` int(11) NOT NULL,
  `misc` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`b_id`, `p_id`, `pathology_fees`, `room_fees`, `misc`, `total`) VALUES
(1, 1, 250, 1000, 150, 1400);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `d_gender` varchar(255) NOT NULL,
  `d_address` varchar(255) NOT NULL,
  `d_phone` varchar(10) NOT NULL,
  `specialization` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `d_name`, `dob`, `d_gender`, `d_address`, `d_phone`, `specialization`) VALUES
(1, 'Sneharsh Kerkar', '1992-05-10', 'male', 'Goa', '8976541209', 'Cardiologist');

-- --------------------------------------------------------

--
-- Table structure for table `medhist`
--

CREATE TABLE `medhist` (
  `p_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `date_admit` date DEFAULT NULL,
  `date_discharge` date DEFAULT NULL,
  `medicines` varchar(255) NOT NULL,
  `treatment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medhist`
--

INSERT INTO `medhist` (`p_id`, `d_id`, `date_admit`, `date_discharge`, `medicines`, `treatment`) VALUES
(1, 1, '2018-03-11', '2018-04-12', 'Nitroglycerin, Morphine, Aspirin', 'Cardiac CT or MRI');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `p_gender` varchar(255) NOT NULL,
  `p_address` varchar(255) NOT NULL,
  `p_phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `p_name`, `dob`, `p_gender`, `p_address`, `p_phone`) VALUES
(1, 'Saish Sawant', '2000-12-11', 'male', 'Vasco', '7698671212');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `medhist`
--
ALTER TABLE `medhist`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`);

--
-- Constraints for table `medhist`
--
ALTER TABLE `medhist`
  ADD CONSTRAINT `medhist_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`),
  ADD CONSTRAINT `medhist_ibfk_2` FOREIGN KEY (`d_id`) REFERENCES `doctor` (`d_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
