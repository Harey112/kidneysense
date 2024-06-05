-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 12:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heartdisease`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient_data`
--

CREATE TABLE `patient_data` (
  `id` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `blood_pressure` int(11) DEFAULT NULL,
  `specific_gravity` float DEFAULT NULL,
  `albumin` int(11) DEFAULT NULL,
  `sugar` int(11) DEFAULT NULL,
  `red_blood_cells` tinytext DEFAULT NULL,
  `pus_cell` tinytext DEFAULT NULL,
  `pus_cell_clumps` tinytext DEFAULT NULL,
  `bacteria` tinytext DEFAULT NULL,
  `blood_glucose_random` int(11) DEFAULT NULL,
  `blood_urea` int(11) DEFAULT NULL,
  `serum_creatinine` float DEFAULT NULL,
  `sodium` int(11) DEFAULT NULL,
  `potassium` float DEFAULT NULL,
  `haemoglobin` float DEFAULT NULL,
  `packed_cell_volume` float DEFAULT NULL,
  `white_blood_cell_count` int(11) DEFAULT NULL,
  `red_blood_cell_count` float DEFAULT NULL,
  `hypertension` tinytext DEFAULT NULL,
  `diabetes_mellitus` tinytext DEFAULT NULL,
  `coronary_artery_disease` tinytext DEFAULT NULL,
  `appetite` tinytext DEFAULT NULL,
  `peda_edema` tinytext DEFAULT NULL,
  `aanemia` tinytext DEFAULT NULL,
  `class` tinytext DEFAULT NULL,
  `userid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_data`
--

INSERT INTO `patient_data` (`id`, `age`, `blood_pressure`, `specific_gravity`, `albumin`, `sugar`, `red_blood_cells`, `pus_cell`, `pus_cell_clumps`, `bacteria`, `blood_glucose_random`, `blood_urea`, `serum_creatinine`, `sodium`, `potassium`, `haemoglobin`, `packed_cell_volume`, `white_blood_cell_count`, `red_blood_cell_count`, `hypertension`, `diabetes_mellitus`, `coronary_artery_disease`, `appetite`, `peda_edema`, `aanemia`, `class`, `userid`) VALUES
(12, 48, 80, 1.02, 1, 0, '1', '1', '0', '0', 121, 36, 1.2, 146, 4.4, 15.4, 44, 7800, 5.2, '1', '1', '0', '0', '0', '0', '0', ''),
(15, 48, 80, 1.02, 1, 0, '1', '1', '0', '0', 121, 36, 1.2, 146, 4.4, 15.4, 44, 7800, 5.2, '1', '1', '0', '0', '0', '0', '1', '18\r\n'),
(16, 48, 80, 1.02, 1, 0, '1', '1', '0', '0', 121, 36, 1.2, 146, 4.4, 15.4, 44, 7800, 5.2, '1', '1', '0', '0', '0', '0', '1', ''),
(17, 59, 80, 1.02, 1, 0, '1', '1', '0', '0', 121, 36, 1.2, 146, 4.4, 15.4, 44, 7800, 5.2, '1', '1', '0', '0', '0', '0', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` text DEFAULT NULL,
  `firstname` text DEFAULT NULL,
  `middlename` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `username` text NOT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `middlename`, `type`, `username`, `password`) VALUES
(16, 'Admin', 'Admin', 'Admin', 'admin', 'admin', '$argon2i$v=19$m=65536,t=4,p=1$LmhnM3dJcnlNQWUvNWhCbA$8+0sLp0NWbzCx9amGtNM3pwfpCWSlAGMIUU0u+oaIFA'),
(18, 'Apa', 'Har', 'D.', 'user', 'harapa', '$argon2i$v=19$m=65536,t=4,p=1$ZEhkMWxiS21pempBWXBCNg$f6RrF3+QaKltkEx3BtRvHHmXIWop2ATMhc7bSJXOzF4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient_data`
--
ALTER TABLE `patient_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_data`
--
ALTER TABLE `patient_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
