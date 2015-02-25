-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2015 at 07:33 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

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
-- Table structure for table `query`
--

CREATE TABLE IF NOT EXISTS `query` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `time_stamp` varchar(30) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `user_id`, `emp_id`, `package_id`, `time_stamp`, `description`, `status`) VALUES
(7, 100, 0, 0, '2015-02-23 22:52:05', '$description[$i]', 0),
(8, 101, 1, 1, '2015-02-23 16:58:37', 'Hajj Package Query.', 0),
(9, 101, 1, 2, '2015-02-23 16:58:37', 'Umrah Package Query.', 0),
(10, 101, 1, 3, '2015-02-23 16:58:37', 'Malaysia Package Query.', 0),
(11, 101, 1, 4, '2015-02-23 16:58:37', 'Dubair Package Query', 0),
(12, 101, 1, 4, '2015-02-23 16:58:37', 'Dubai Again', 0),
(13, 102, 1, 1, '2015-02-23 17:31:53', 'This is my hajj query.', 0),
(14, 102, 1, 2, '2015-02-23 17:31:53', 'This is my umrah query', 0),
(15, 102, 1, 3, '2015-02-23 17:31:53', 'This is my malaysia Query.', 0),
(17, 103, 1, 2, '2015-02-25 23:25:59', 'This is my umrah query\r\n										\r\n										', 0),
(18, 103, 1, 3, '2015-02-25 23:25:59', 'This is my malaysia Query.\r\n										\r\n										', 1),
(19, 104, 1, 1, '2015-02-23 23:01:59', 'Ammar							\r\n										', 0),
(20, 104, 1, 1, '2015-02-23 23:01:59', 'New Query from ammar', 0),
(21, 105, 0, 0, '2015-02-23 22:37:23', '$description[$i]', 0),
(22, 105, 0, 0, '2015-02-23 22:37:23', '$description[$i]', 0),
(23, 106, 1, 1, '2015-02-23 21:33:43', 'This is my updated hajj query\r\n										', 0),
(24, 106, 1, 2, '2015-02-23 21:33:43', 'This is my umrah query\r\n										', 0),
(25, 106, 1, 3, '2015-02-23 21:33:43', 'This is my updated malaysia Query.\r\n										', 0),
(26, 107, 1, 1, '2015-02-24 07:27:22', 'This is my hajj query..			\r\n										\r\n										', 0),
(27, 107, 1, 1, '2015-02-24 07:27:22', 'NO', 0),
(28, 108, 1, 1, '2015-02-24 07:26:56', 'This is my hajj query..			\r\n										\r\n										', 0),
(29, 108, 1, 1, '2015-02-24 07:26:56', 'Yes.								\r\n										\r\n										\r\n										', 0),
(30, 109, 1, 0, '2015-02-24 07:54:30', 'Hello World.', 0),
(31, 110, 1, 2, '2015-02-25 23:25:13', 'This is my umrah query\r\n										\r\n										', 0),
(32, 110, 1, 3, '2015-02-25 23:25:13', 'This is my malaysia Query.\r\n										\r\n										', 0),
(33, 111, 1, 3, '2015-02-25 23:31:32', 'Malaysia Mobarak.', 0),
(34, 112, 1, 4, '2015-02-25 23:32:51', 'Dubai masasges..\r\n										', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `query`
--
ALTER TABLE `query`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
