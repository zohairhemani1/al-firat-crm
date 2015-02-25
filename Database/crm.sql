-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2015 at 10:44 AM
-- Server version: 5.5.27
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE IF NOT EXISTS `form` (
`user_id` int(11) NOT NULL,
  `emp_id` int(10) DEFAULT NULL,
  `user_name` varchar(15) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `mobile_other` varchar(20) DEFAULT NULL,
  `tele` varchar(20) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `time_stamp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`user_id`, `emp_id`, `user_name`, `mobile`, `mobile_other`, `tele`, `location`, `email`, `time_stamp`) VALUES
(83, 1, 'zohairhemani', '2353-25-23-523', '2352-35-23-523', '235-32523532', 'Afshan Apartments', 'zohairhemani', '2015-02-22 03:56:12'),
(84, 1, 'hello user', '0900-78-61-010', '0901-28-10-299', '012-01020120', 'Afshan Apartments', 'my new user', '2015-02-22 12:03:49'),
(85, 1, 'Abdul Wahab', '3254-23-52-352', '3452-34-62-356', '235-23523523', 'Afshan', 'abdulwahab@gmail.com', '2015-02-25 14:15:45'),
(86, 1, 'zohairhemani', '0300-25-05-008', '0808-08-08-080', '080-80808080', 'Afshan Apartments', 'zohairhemani@avialdo.com', '2015-02-25 14:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`emp_id` int(10) NOT NULL,
  `user` varchar(15) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `cookie` int(30) DEFAULT NULL,
  `time_stamp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`emp_id`, `user`, `password`, `email`, `cookie`, `time_stamp`) VALUES
(1, 'arbish', 'torpedo1', 'arbishpalla@yahoo.com', NULL, '2015-02-19 07:34:23'),
(2, 'safeer', 'torpedo1', 'safeer@digitalandey.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
`package_id` int(11) NOT NULL,
  `package_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`) VALUES
(2, 'Umrah Package'),
(3, 'New Hajj Package'),
(12, 'Hajj Package'),
(15, 'Dubai Package');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE IF NOT EXISTS `query` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `time_stamp` varchar(30) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `user_id`, `emp_id`, `package_id`, `time_stamp`, `description`) VALUES
(1, 83, 1, 3, '2015-02-22 03:56:12', 'First Package'),
(2, 83, 1, 0, '2015-02-22 07:04:58', 'Second Package'),
(3, 83, 1, 2, '2015-02-22 07:04:58', 'Third Package'),
(4, 84, 1, 2, '2015-02-22 12:03:49', 'OJASJAS'),
(5, 85, 1, 0, '2015-02-25 14:15:45', 'agasgagag'),
(6, 86, 1, 3, '2015-02-25 14:24:37', 'Yo Hajj'),
(7, 86, 1, 15, '2015-02-25 14:24:37', 'Yo Dubai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
 ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
