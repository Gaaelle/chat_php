-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2017 at 10:35 AM
-- Server version: 10.1.22-MariaDB-
-- PHP Version: 7.0.16-3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Coursphpbdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat2`
--

CREATE TABLE `chat2` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat2`
--

INSERT INTO `chat2` (`id`, `pseudo`, `message`, `date`) VALUES
(1, 'test1', '', '0000-00-00 00:00:00'),
(2, 'test1', '', '0000-00-00 00:00:00'),
(3, 'test2', 'testv1.2', '0000-00-00 00:00:00'),
(4, 'test2', 'bonjour', '0000-00-00 00:00:00'),
(5, 'test1', 'hello', '0000-00-00 00:00:00'),
(6, 'test3', 'ça bug\r\n', '0000-00-00 00:00:00'),
(7, 'test5', 'testbug', '0000-00-00 00:00:00'),
(8, 'test2', 'bug\r\n', '0000-00-00 00:00:00'),
(9, 'test1', 'bonjour\r\n', '0000-00-00 00:00:00'),
(10, 'test5', 'T\'es deg\r\n', '0000-00-00 00:00:00'),
(11, 'test3', 'bon faut encore améliorer\r\n', '0000-00-00 00:00:00'),
(12, 'test10', 'bug ?', '0000-00-00 00:00:00'),
(13, 'blblbl', 'blblblbl\r\n', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat2`
--
ALTER TABLE `chat2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat2`
--
ALTER TABLE `chat2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
