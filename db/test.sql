-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2019 at 11:57 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `aanvraagleerling`
--

CREATE TABLE `aanvraagleerling` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(20) NOT NULL,
  `achternaam` varchar(20) NOT NULL,
  `vak` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aanvraagleerling`
--

INSERT INTO `aanvraagleerling` (`id`, `voornaam`, `achternaam`, `vak`) VALUES
(37, 'asda', 'fasfas', 'engels'),
(38, 'ibrahim', 'ouzzine', 'engels'),
(39, 'erik', 'vet', 'nederlands'),
(40, 'test', 'tester123', 'nederlands'),
(41, 'ibrahim', 'ouzzine', 'engels'),
(42, 'ibrahim', 'ouzzine', 'duits');

-- --------------------------------------------------------

--
-- Table structure for table `pdo`
--

CREATE TABLE `pdo` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `secretpin` int(11) NOT NULL,
  `niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdo`
--

INSERT INTO `pdo` (`id`, `fullname`, `username`, `password`, `secretpin`, `niveau`) VALUES
(1, 'ibrahim ouzzine', 'ik', 'geheim', 123, 0),
(4, 'ibrahim ouzzine', 'ik', 'geheim', 0, 1),
(5, 'asd', 'ibrahim', 'geheim', 0, 1),
(17, 'sad', 'ibrahim', 'IO@79207&^$@((!&@@#  ', 0, 1),
(18, 'asd', 'ibrahim', 'IO@79207&^$@((!&@@#  ', 0, 2),
(19, 'asd', 'ibrahim', 'IO@79207&^$@((!&@@#  ', 0, 2),
(20, 'asd', 'gar', 'IO@79207&^$@((!&@@#  ', 0, 2),
(21, 'ibrahim ouzzine', 'tazer', 'geheim', 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aanvraagleerling`
--
ALTER TABLE `aanvraagleerling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdo`
--
ALTER TABLE `pdo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aanvraagleerling`
--
ALTER TABLE `aanvraagleerling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pdo`
--
ALTER TABLE `pdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
