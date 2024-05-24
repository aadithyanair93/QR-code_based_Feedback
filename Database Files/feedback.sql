-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 09:54 AM
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
-- Database: `feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE `feed` (
  `sno` int(15) NOT NULL,
  `name` text NOT NULL,
  `phone` int(10) NOT NULL,
  `police` varchar(50) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL,
  `behaviour` text NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`sno`, `name`, `phone`, `police`, `experience`, `time`, `behaviour`, `dt`, `status`) VALUES
(8, 'Aadithya ', 2147483647, 'desainagar', 'Extremely Satisfied', '5 Minutes', 'Excellent', '2023-10-28 13:13:19', 'pending'),
(9, 'Aadithya ', 2147483647, 'desainagar', 'Extremely Satisfied', '5 Minutes', 'Excellent', '2023-10-28 13:14:10', ''),
(12, 'Dharmaraj', 2147483647, 'Haldwani', 'Dissatisfied', '5 hours', 'Poor', '2023-10-28 13:15:49', ''),
(14, 'Dharmaraj', 2147483647, 'Haldwani', 'Dissatisfied', '5 hours', 'Poor', '2023-10-28 13:15:59', ''),
(15, 'Darshan Gadhadara', 2147483647, 'Bhavnagar', 'Satisfied', '10 Minutes', 'Excellent', '2023-10-28 16:05:32', ''),
(16, 'Aadithya Bhai', 2147483647, 'Bhavnagar', 'Extremely Satisfied', '1 Hour', 'Excellent', '2023-11-04 09:38:15', ''),
(17, 'Ayush Patel', 2147483647, 'Rajkot', 'Dissatisfied', '1 Hour', 'Excellent', '2023-11-04 09:38:51', ''),
(19, 'Ayush Patel', 11111111, 'Bhavnagar', 'Extremely Dissatisied', '10 Minutes', 'Excellent', '2023-11-04 14:54:30', ''),
(22, 'Badass', 2147483647, 'Bhavnagar', 'Satisfied', '10 Minutes', 'Good', '2024-02-07 20:18:02', ''),
(23, 'Mihir Parmar', 555555555, 'Bhavnagar', 'Dissatisfied', '10 Minutes', 'Excellent', '2024-03-06 13:59:36', 'done'),
(24, 'Leo Das', 2147483647, 'Bhavnagar', 'Satisfied', '10 Minutes', 'Excellent', '2024-04-24 12:15:32', ''),
(25, 'Leo', 2147483647, 'Bhavnagar', 'Dissatisfied', '10 Minutes', 'Good', '2024-04-24 12:17:42', ''),
(26, 'Leo', 2147483647, 'Bhavnagar', 'Dissatisfied', '10 Minutes', 'Good', '2024-04-24 12:18:54', ''),
(27, 'Badass', 2147483647, 'Bhavnagar', 'Dissatisfied', '10 Minutes', 'Bad', '2024-04-24 12:19:11', ''),
(28, 'Badass', 2147483647, 'Bhavnagar', 'Dissatisfied', '10 Minutes', 'Bad', '2024-04-24 12:20:29', ''),
(29, 'Badass', 2147483647, 'Bhavnagar', 'Satisfied', '10 Minutes', 'Excellent', '2024-04-24 12:25:28', ''),
(30, 'Honey Singh', 2147483647, 'Bhavnagar', 'Satisfied', '10 Minutes', 'Excellent', '2024-04-24 12:30:02', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `sno` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
