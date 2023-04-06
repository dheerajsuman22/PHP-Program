-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 08:44 AM
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
-- Database: `emaildb`
--

-- --------------------------------------------------------

--
-- Table structure for table `composetable`
--

CREATE TABLE `composetable` (
  `sno` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `cc` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `composetable`
--

INSERT INTO `composetable` (`sno`, `sender`, `receiver`, `cc`, `subject`, `message`, `attachment`, `status`, `date`) VALUES
(5, 'dheerajsuman22@gmail.com', 'chetansuman1420@gmail.com', '', '', 'done', '', 1, '2023-02-02 17:37:02'),
(6, 'dheerajsuman22@gmail.com', 'chetansuman1420@gmail.com', '', 'resume', 'dfdgdghh', '', 1, '2023-02-03 10:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `composetable1`
--

CREATE TABLE `composetable1` (
  `sno` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `cc` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `composetable1`
--

INSERT INTO `composetable1` (`sno`, `sender`, `receiver`, `cc`, `subject`, `message`, `attachment`, `status`, `date`) VALUES
(4, 'chetansuman1420@gmail.com', 'dheerajsuman22@gmail.com', '', 'hello', 'okay', '', 1, '2023-02-02 17:36:25.079752'),
(6, 'dheerajsuman22@gmail.com', 'chetansuman1420@gmail.com', '', 'resume', 'dfdgdghh', '', 1, '2023-02-03 10:58:05.366020');

-- --------------------------------------------------------

--
-- Table structure for table `registeruser`
--

CREATE TABLE `registeruser` (
  `sno.` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registeruser`
--

INSERT INTO `registeruser` (`sno.`, `name`, `email`, `password`, `date`) VALUES
(1, 'dheeraj suman', 'dheerajsuman22@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2023-02-02 13:38:54'),
(2, 'chetan suman', 'chetansuman1420@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2023-02-02 13:39:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `composetable`
--
ALTER TABLE `composetable`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `composetable1`
--
ALTER TABLE `composetable1`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `registeruser`
--
ALTER TABLE `registeruser`
  ADD PRIMARY KEY (`sno.`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `composetable`
--
ALTER TABLE `composetable`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `composetable1`
--
ALTER TABLE `composetable1`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registeruser`
--
ALTER TABLE `registeruser`
  MODIFY `sno.` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
