-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 06:06 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `acc_no` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`acc_no`, `name`, `email`, `balance`) VALUES
(1, 'Vishal Dedavat', 'vdedavat@gmail.com', 5478),
(2, 'Rummaan Ahmad', 'rahmad@gmail.com', 6882),
(3, 'Raj Bagrecha', 'rbagrecha@gmail.com', 5452),
(4, 'Yahya Sakerwaala', 'yahya@gmail.com', 4498),
(5, 'Khusbu Dedavat', 'kdedavat@gmail.com', 60495),
(6, 'Sonali Sharma', 'son@gmail.com', 55500),
(7, 'Dhruv Totre', 'dhruv@gmail.com', 5500),
(8, 'Zarna Desai', 'desai@gmail.com', 4550),
(9, 'xyz', 'xyz@gmail.com', 512),
(10, 'abc', 'abc@gmail.com', 183);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `sr_no` int(11) NOT NULL,
  `sender` varchar(35) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL,
  `dateandtime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`sr_no`, `sender`, `receiver`, `amount`, `dateandtime`) VALUES
(1, 'Vishal Dedavat', 'abc', 2, '2021-06-22 00:29:17'),
(2, 'Rummaan Ahmad', 'Zarna Desai', 50, '2021-06-22 00:29:39'),
(3, 'Khusbu Dedavat', 'Vishal Dedavat', 5, '2021-06-22 00:37:19'),
(4, 'Yahya Sakerwaala', 'Vishal Dedavat', 2, '2021-06-22 12:08:12'),
(5, 'Sonali Sharma', 'Khusbu Dedavat', 500, '2021-06-22 20:34:12'),
(6, 'Vishal Dedavat', 'Raj Bagrecha', 1000, '2021-06-22 21:02:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`acc_no`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
