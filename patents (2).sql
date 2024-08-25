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
-- Table structure for table `patents`
--

CREATE TABLE `patents` (
  `empid` int(30) NOT NULL,
  `ptitle` varchar(30) NOT NULL,
  `pfname` varchar(30) NOT NULL,
  `pfd` varchar(30) NOT NULL,
  `pano` varchar(30) NOT NULL,
  `pstat` varchar(30) NOT NULL,
  `pagno` varchar(30) NOT NULL,
  `pgdt` date NOT NULL,
  `pdate` date NOT NULL,
  `pcntry` varchar(30) NOT NULL,
  `pctno` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patents`
--

INSERT INTO `patents` (`empid`, `ptitle`, `pfname`, `pfd`, `pano`, `pstat`, `pagno`, `pgdt`, `pdate`, `pcntry`, `pctno`) VALUES
(0, 'abc', 'a', 'a', 'a', 'Published', 'fd', '2023-12-18', '0000-00-00', 'a', 'a'),
(0, 'm', 'a', 'a', 'a', 'Granted', 'fd', '2023-12-04', '2023-12-11', 'a', 'a'),
(0, 'mou', 'a', 'a', 'a', 'Granted', 'fd', '2023-12-06', '2023-11-30', 'a', 'a'),
(0, 'mou', 'a', 'a', 'a', 'Granted', 'fd', '2023-12-11', '2023-12-12', 'a', 'a'),
(3227, 'mounika', 'a', 'a', 'a', 'Granted', 'fd', '2023-12-24', '2023-12-26', 'a', 'a'),
(3227, 'mouni', 'a', 'a', 'a', 'Published', 'fd', '2023-12-11', '2023-12-07', 'a', 'a'),
(3227, 'moun', 'a', 'a', 'a', 'Applied', 'fd', '2023-12-12', '2023-11-27', 'a', 'a'),
(34, '112', '1', '1', '1', 'Applied', '11', '2023-12-19', '2023-12-14', '11', '1'),
(34, '112', '1', '1', '1', 'Applied', '11', '2023-12-19', '2023-12-14', '11', '1'),
(34, '123', '1', '11', '1', 'Applied', '1', '2019-05-28', '0111-11-01', '111', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
