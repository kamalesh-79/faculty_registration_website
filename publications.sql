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
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `empid` int(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `pa1` varchar(30) NOT NULL,
  `pa2` varchar(30) NOT NULL,
  `pa3` varchar(30) NOT NULL,
  `pa4` varchar(30) NOT NULL,
  `pa5` varchar(30) NOT NULL,
  `jssn` varchar(20) NOT NULL,
  `jname` varchar(20) NOT NULL,
  `publisher` varchar(20) NOT NULL,
  `ym` varchar(20) NOT NULL,
  `vol` int(10) NOT NULL,
  `pgno` int(10) NOT NULL,
  `loc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`empid`, `title`, `pa1`, `pa2`, `pa3`, `pa4`, `pa5`, `jssn`, `jname`, `publisher`, `ym`, `vol`, `pgno`, `loc`) VALUES
(0, '', 'a', 'a', 'a', 'a', 'a', '1', 'sa', 's', '', 12, 12, ''),
(0, '', 'aa', '', '', '', '', 'a', 'a', '', '', 0, 0, ''),
(0, '', 'aa', '', '', '', '', 'a', 'a', '', '', 0, 0, ''),
(0, '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(0, '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(0, '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(0, '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(0, '', 'q', 'q', '', '', '', 'q', 'q', 'q', '', 0, 0, ''),
(0, '', 'q', '', '', '', '', 'q', 'q', 'q', '', 0, 0, ''),
(0, '', '1', '', '', '', '', '1', '1', '1', '', 1, 1, ''),
(0, '', 'q', '', '', '', '', 'q', 'q', 'q', '', 0, 0, ''),
(0, '', 'q', '', '', '', '', 'q', 'q', 'q', '', 0, 0, ''),
(0, '', '21', '', '', '', '', '1', '1', '1', '', 1, 11, 'Internatio'),
(0, '', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'International'),
(0, '', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'International'),
(0, '', 'a', '', '', '', '', 'a', 'a', 'a', '', 0, 0, 'International'),
(0, '', 'e', '', '', '', '', 'e', 'e', 'e', '', 0, 0, 'International'),
(0, 'qww', 'q', '', '', '', '', 'q', 'q', 'q', '', 0, 0, 'National'),
(0, '23', '3', '', '', '', '', '1', '34', 'jh', '', 0, 0, 'International'),
(0, 'f', 'f', '', '', '', '', 'd', 'f', 'fddfs', '', 0, 1, 'International'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'International'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'International'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'International'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'International'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'International'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'International'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'International'),
(0, 'pp11', '122', '', '', '', '', '2', '2', '2', '', 2, 2, 'National'),
(0, 'pp11', '122', '', '', '', '', '2', '2', '2', '', 2, 2, 'National'),
(0, 'pp11', '122', '', '', '', '', '2', '2', '2', '', 2, 2, 'National'),
(0, '1', '1', '', '', '', '', '11', '11', '1', '', 1, 1, 'National'),
(0, '1', '1', '', '', '', '', '11', '11', '1', '', 1, 1, 'National'),
(0, '1', '1', '', '', '', '', '11', '11', '1', '', 1, 1, 'National'),
(0, '1', '1', '', '', '', '', '11', '11', '1', '', 1, 1, 'National'),
(0, '1', '1', '', '', '', '', '11', '11', '1', '', 1, 1, 'National'),
(0, '1', '1', '', '', '', '', '11', '11', '1', '', 1, 1, 'National'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 111, 1, 'International'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 111, 1, 'International'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 111, 1, 'International'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 111, 1, 'International'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 111, 1, 'International'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 111, 1, 'International'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 111, 1, 'International'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'National'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'National'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'National'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'National'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'National'),
(0, '1', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'National'),
(0, '1233444', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'National'),
(0, '1233444', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'National'),
(0, '12334442', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'National'),
(0, '16655', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'National'),
(0, '16655', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'National'),
(0, '16655', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'National'),
(0, '16655', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'National'),
(0, '12334444', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'International'),
(0, '12334444', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'International'),
(0, 'allala', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'International'),
(0, 'allala', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'International'),
(34, 'allalawwwww', '11', '', '', '', '', '1', '1', '1', '', 1, 1211, 'International'),
(34, '2qq', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'International'),
(0, '123', '1', '', '', '', '', '1', '1', '1', '', 1, 1, 'National'),
(34, '211', '11', '', '', '', '', '1', '1', '11', '', 1, 1, 'International'),
(34, '21111111', '11', '', '', '', '', '1', '1', '11', '', 1, 1, 'International'),
(34, '1223456789', '1', '', '', '', '', '1', '1', '1', 'Decembe', 1, 1, 'International'),
(34, '12234567891', '1', '', '', '', '', '', '1', '1', 'August 2012', 1, 1, 'International'),
(34, 'qwertyu', '1', '', '', '', '', '1', '1', '1', 'December 2015', 1, 1, 'International');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
