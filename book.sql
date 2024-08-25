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
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `empid` int(30) NOT NULL,
  `btitle` varchar(30) NOT NULL,
  `bpa1` varchar(30) NOT NULL,
  `bpa2` varchar(303) NOT NULL,
  `bpa3` varchar(30) NOT NULL,
  `bpa4` varchar(30) NOT NULL,
  `bpa5` varchar(30) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `pvol` int(30) NOT NULL,
  `Isno` varchar(30) NOT NULL,
  `year` date NOT NULL,
  `Ibsn` varchar(30) NOT NULL,
  `DOI` varchar(30) NOT NULL,
  `citation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`empid`, `btitle`, `bpa1`, `bpa2`, `bpa3`, `bpa4`, `bpa5`, `pname`, `pvol`, `Isno`, `year`, `Ibsn`, `DOI`, `citation`) VALUES
(34, '2333', '2', '', '', '', '', '2', 2, '22', '2022-05-22', '221111', '2', '111'),
(34, '1', '1', '', '', '', '', '1', 1, '1', '2023-12-30', '1', '1', '11\r\n1\r\n1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
