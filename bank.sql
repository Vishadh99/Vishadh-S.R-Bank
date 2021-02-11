-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2021 at 06:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 30000
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Vishadh Sawant', 'vishadh@gmail.com', 8000),
(2, 'Harshul Raina', 'harshul@gmail.com', 8000),
(3, 'Neel Rajesh', ' neel@gmail.com', 9000),
(4, 'Dev Gagaram ', 'dev@gmail.com', 6000),
(5, 'Ramesh Gala', 'ramesh@gmail.com', 10000),
(6, 'Mukul Roy ', 'muku@gmail.com', 7000),
(7, 'Vijay Prasad', 'vijay@gmail.com', 12000),
(8, 'Ashish Singh', 'ashish@gmail.com', 8000),
(9, 'Satish Sundar ', 'satish@gmail.com', 9000),
(10, 'Krishna Abhishek', 'krisna@gmail.com', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `balance` int(10) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sender`, `receiver`, `balance`, `datetime`) VALUES
('Vishadh Sawant', 'Harshul Raina', 1000, '2021-02-10 22:57:03'),
('Harshul Raina', 'Vishadh Sawant', 1000, '2021-02-10 22:57:23'),
('Harshul Raina', 'Neel Rajesh', 1222, '2021-02-10 22:57:57'),
('Neel Rajesh', 'Harshul Raina', 1222, '2021-02-10 22:58:22'),
('Vishadh Sawant', 'Harshul Raina', 100, '2021-02-10 22:58:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
