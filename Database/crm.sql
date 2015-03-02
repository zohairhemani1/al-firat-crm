-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2015 at 12:08 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`user_id`, `emp_id`, `user_name`, `mobile`, `mobile_other`, `tele`, `location`, `email`, `time_stamp`) VALUES
(87, 1, 'zohairhemani', '03002800276', '235235', '021-32221954', 'Afshan Apartments', 'zohairhemani@avialdo.com', '2015-03-02 15:59:53'),
(88, 1, 'ammarhemani', '030402342', '0324234', '0235235', 'Afshan', 'ammarhemani@gmail.com', '2015-03-02 16:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`emp_id` int(10) NOT NULL,
  `user` varchar(15) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `cookie` int(30) DEFAULT NULL,
  `time_stamp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`emp_id`, `user`, `password`, `email`, `cookie`, `time_stamp`) VALUES
(1, 'arbish', 'torpedo1', 'arbishpalla@yahoo.co', NULL, '2015-02-19 07:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
`package_id` int(11) NOT NULL,
  `package_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`) VALUES
(1, 'Hajj Package'),
(2, 'Umrah Package'),
(3, 'Malaysia'),
(6, 'U.A.E');

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
  `description` varchar(300) DEFAULT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `user_id`, `emp_id`, `package_id`, `time_stamp`, `description`, `status`) VALUES
(43, 87, 1, 1, '2015-03-02 11:59:53', 'Hajj Package updated only. ', 1),
(44, 87, 1, 2, '2015-03-02 15:55:42', 'Umrah Package.', 1),
(45, 87, 1, 3, '2015-03-02 15:55:42', 'Malaysia Package.', -1),
(46, 88, 1, 1, '2015-03-02 16:05:29', 'Hajj Package', 1),
(47, 88, 1, 1, '2015-03-02 16:08:15', 'Hajj package 2 is expired now.', -1),
(48, 88, 1, 1, '2015-03-02 16:05:29', 'Hajj package 3', 1);

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
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
