-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 03:10 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `credit` float NOT NULL,
  `mark` float NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `class_id`, `course_name`, `course_id`, `credit`, `mark`, `semester`) VALUES
(4, 1550, 'DBMS', '123', 3, 85, 'Eight'),
(9, 1550, 'WEb', '421', 3, 65, 'Eight'),
(10, 1550, 'Image', '423', 3, 45, 'Eight');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `department` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `batch` int(11) NOT NULL,
  `session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `class_id`, `name`, `department`, `section`, `batch`, `session`) VALUES
(2, 1550, 'Topu', 'CSE', 'A', 15, '2014-15'),
(5, 1543, 'Shakil', 'CSE', 'A', 15, '2014-15'),
(6, 1550, 'Mohammed Shakhawat Hossain', 'CSE', 'A', 16, '2014-15'),
(7, 1550, 'Sourav', 'CSE', 'A', 15, '2014-15'),
(9, 1586, 'Jarin', 'CSE', 'A', 15, '2014-15'),
(10, 16004, 'nokiaA2', 'CSE', 'A', 18, '2014-15'),
(11, 19048, 'Mohammed Shakhawat Hossain', 'CSE', 'A', 8, '2014-15'),
(12, 1550, 'noki', 'CSE', 'A', 7, 'df');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
