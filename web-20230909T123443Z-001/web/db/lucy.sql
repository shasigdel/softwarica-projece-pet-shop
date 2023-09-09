-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 08:44 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lucy`
--

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE IF NOT EXISTS `pets` (
`pet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `service` enum('walking','feeding','socialization','playsession') NOT NULL,
  `day` enum('sunday','monday','tuesday','wednesday','thursday','friday','saturday') NOT NULL,
  `session` int(11) NOT NULL,
  `cost` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `user_id`, `pet_name`, `service`, `day`, `session`, `cost`) VALUES
(1, 0, 'Haku', 'socialization', 'tuesday', 2, 2),
(2, 4, 'Haku', 'socialization', 'tuesday', 2, 2),
(3, 4, 'Haku', 'socialization', 'tuesday', 2, 2),
(4, 4, '', 'walking', 'friday', 2, 2),
(5, 4, '', 'walking', 'friday', 2, 2),
(6, 4, '"Haku"', 'walking', 'friday', 2, 2),
(16, 4, '"Haku"', 'feeding', 'monday', 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `pet_reg`
--

CREATE TABLE IF NOT EXISTS `pet_reg` (
`pet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `breed` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet_reg`
--

INSERT INTO `pet_reg` (`pet_id`, `user_id`, `pet_name`, `breed`) VALUES
(1, 3, 'Haku', 'feeding'),
(2, 4, 'Kale', 'Shepard'),
(4, 4, 'Haku', 'Lab');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `distance` double NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `address`, `distance`, `username`, `password`) VALUES
(4, 'Ram', 'Bahadur', 'Sitapaila', 4.018125, 'sad', 'sad'),
(5, 'Usan', 'shrestha', 'swoyambu', 2.118125, 'ram', 'ram');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
 ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `pet_reg`
--
ALTER TABLE `pet_reg`
 ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pet_reg`
--
ALTER TABLE `pet_reg`
MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
