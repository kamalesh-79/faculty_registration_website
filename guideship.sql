-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 03:32 AM
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
-- Table structure for table `guideship`
--

CREATE TABLE `guideship` (
  `empid` int(30) NOT NULL,
  `names` varchar(30) NOT NULL,
  `desig` varchar(30) NOT NULL,
  `year` date NOT NULL,
  `spec` varchar(30) NOT NULL,
  `nos` int(30) NOT NULL,
  `sc1` varchar(30) NOT NULL,
  `sc2` varchar(30) NOT NULL,
  `sc3` varchar(30) NOT NULL,
  `sc4` varchar(30) NOT NULL,
  `sc5` varchar(30) NOT NULL,
  `ro1` varchar(30) NOT NULL,
  `ro2` varchar(30) NOT NULL,
  `ro3` varchar(30) NOT NULL,
  `ro4` varchar(30) NOT NULL,
  `ro5` varchar(30) NOT NULL,
  `do1` varchar(30) NOT NULL,
  `do2` varchar(30) NOT NULL,
  `do3` varchar(30) NOT NULL,
  `do4` varchar(30) NOT NULL,
  `do5` varchar(30) NOT NULL,
  `go1` varchar(30) NOT NULL,
  `go2` varchar(30) NOT NULL,
  `go3` varchar(30) NOT NULL,
  `go4` varchar(30) NOT NULL,
  `go5` varchar(30) NOT NULL,
  `f1` varchar(30) NOT NULL,
  `f2` varchar(30) NOT NULL,
  `f3` varchar(30) NOT NULL,
  `f4` varchar(30) NOT NULL,
  `f5` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guideship`
--

INSERT INTO `guideship` (`empid`, `names`, `desig`, `year`, `spec`, `nos`, `sc1`, `sc2`, `sc3`, `sc4`, `sc5`, `ro1`, `ro2`, `ro3`, `ro4`, `ro5`, `do1`, `do2`, `do3`, `do4`, `do5`, `go1`, `go2`, `go3`, `go4`, `go5`, `f1`, `f2`, `f3`, `f4`, `f5`) VALUES
(34, '1', '1', '2022-05-20', '111', 1, '1', '', '', '', '', '1', '', '', '', '', '111', '', '', '', '', '1', '', '', '', '', '1', '', '', '', ''),
(34, '1', '1', '2022-05-20', '111', 1, '1', '', '', '', '', '1', '', '', '', '', '111', '', '', '', '', '1', '', '', '', '', '1', '', '', '', ''),
(34, '222', '22', '2023-12-22', '2', 2, '2', '', '', '', '', '2', '', '', '', '', '22', '', '', '', '', '2', '', '', '', '', '2', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
