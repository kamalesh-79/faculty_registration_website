-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 03:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `empid` varchar(20) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`empid`, `username`, `email`, `password`) VALUES
('0', 'Prasanna', '630prasanna@gmail.com', 'ca984dd1030e907c91c27d982a405d6c'),
('143', 'Prasanna', '143@gmail.com', 'ca984dd1030e907c91c27d982a405d6c'),
('20008', 'Prasanna', '20008@gmail.com', 'ca984dd1030e907c91c27d982a405d6c'),
('20009', 'Prasanna', '20009@gmail.com', 'ca984dd1030e907c91c27d982a405d6c'),
('34', 'Prasanna', '34@gmail.com', 'ca984dd1030e907c91c27d982a405d6c'),
('67', 'Prasanna', '219X1A3267@gprec.ac.in', '8e0a2fa7023ab0b92d40d26954b719b5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`empid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
