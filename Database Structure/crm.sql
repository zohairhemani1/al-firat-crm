-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2015 at 04:19 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`user_id`, `emp_id`, `user_name`, `mobile`, `mobile_other`, `tele`, `location`, `email`, `time_stamp`) VALUES
(83, 1, 'zohairhemani', '2353-25-23-523', '2352-35-23-523', '235-32523532', 'Afshan Apartments', 'zohairhemani', '2015-02-22 03:56:12'),
(84, 1, 'hello user', '0900-78-61-010', '0901-28-10-299', '012-01020120', 'Afshan Apartments', 'my new user', '2015-02-22 12:03:49'),
(85, 1, 'zohairhemani', '4235-23-52-352', '6811-98-19-198', '981-89198198', 'asagsag', 'zohairhemani@avialdo.com', '2015-02-23 16:01:49'),
(86, 1, 'zohairhemani', '4235-23-52-352', '6811-98-19-198', '981-89198198', 'asagsag', 'zohairhemani@avialdo.com', '2015-02-23 16:03:00'),
(87, 1, 'lkmm', '2343-25-32-523', '2352-35-23-523', '235-32532523', '32knsn', 'lmlmlm', '2015-02-23 16:08:45'),
(88, 1, '23325', '2352-35-32-523', '2353-25-32-523', '235-23532523', 'aoifnasfn', 'asdnfansfoi', '2015-02-23 16:10:09'),
(89, 1, 'sfsiafa', '2353-25-32-532', '3253-25-32-523', '235-32532523', 'safaasfasf', 'sdddgsdg@gmail.com', '2015-02-23 16:11:40'),
(90, 1, 'zoh', '2352-35-32-523', '2353-25-32-523', '235-23523523', 'saa', 'zohair', '2015-02-23 16:31:35'),
(91, 1, 'sinin', '3242-35-23-523', '2352-35-23-525', '534-53453453', 'ionio', 'ionoiion', '2015-02-23 16:34:31'),
(92, 1, 'unitedlatinos', '3243-24-32-423', '2342-34-32-424', '233-25325235', 'asagsag', 'zohairhemani@avialdo.com', '2015-02-23 16:35:14'),
(93, 1, 'nnkjn', '2423-43-25-234', '2353-25-23-523', '235-32523522', 'kjnjjn', 'kjnjnjn', '2015-02-23 16:47:44'),
(94, 1, 'nnkjn', '2423-43-25-234', '2353-25-23-523', '235-32523522', 'kjnjjn', 'kjnjnjn', '2015-02-23 16:48:11'),
(95, 1, 'knnkjn', '3325-32-52-353', '2353-25-23-523', '235-32523522', 'lnjnjnkn', 'jnnjknj', '2015-02-23 16:52:01'),
(96, 1, 'knnkjn', '3325-32-52-353', '2353-25-23-523', '235-32523522', 'lnjnjnkn', 'jnnjknj', '2015-02-23 16:52:57'),
(97, 1, 'knnkjn', '3325-32-52-353', '2353-25-23-523', '235-32523522', 'lnjnjnkn', 'jnnjknj', '2015-02-23 16:54:02'),
(98, 1, 'knnkjn', '3325-32-52-353', '2353-25-23-523', '235-32523522', 'lnjnjnkn', 'jnnjknj', '2015-02-23 16:55:07'),
(99, 1, 'knnkjn', '3325-32-52-353', '2353-25-23-523', '235-32523522', 'lnjnjnkn', 'jnnjknj', '2015-02-23 16:56:05'),
(100, 1, 'knnkjn', '3325-32-52-353', '2353-25-23-523', '235-32523522', 'lnjnjnkn', 'jnnjknj', '2015-02-23 16:57:32'),
(101, 1, 'knnkjn', '3325-32-52-353', '2353-25-23-523', '235-32523522', 'lnjnjnkn', 'jnnjknj', '2015-02-23 16:58:37'),
(102, 1, 'AmmarHemani', '8181-81-81-818', '8181-88-88-818', '818-18181818', 'Afshan Apartments', 'ammarhemani@gmail.com', '2015-02-23 17:31:53'),
(103, 1, 'AmmarHemani', '8181-81-81-818', '8181-88-88-818', '818-18181818', 'Afshan Apartments', 'ammarhemani@gmail.com', '2015-02-23 17:34:04'),
(104, 1, 'knnkjn', '2142-14-21-414', '2412-41-24-124', '235-23532523', 'lnjnjnkn', 'zohairhemani@avialdo.com', '2015-02-23 23:01:59'),
(105, 1, 'ammarhemani', '0505-05-00-505', '0505-00-50-505', '505-05050505', 'Afshan Apartments', 'ammarhemani@gmail.com', '2015-02-23 22:36:26'),
(106, 1, 'AmmarHemani', '8181-81-81-818', '8181-88-88-818', '818-18181818', 'Afshan Apartments', 'ammarhemani@gmail.com', '2015-02-23 21:33:43'),
(107, 1, 'zohairhemani', '3253-25-32-523', '3252-35-23-532', '235-32523522', 'Afshan Apartments', 'zohairhemani@avialdo.com', '2015-02-24 07:27:22'),
(108, 1, 'zohairhemani', '3253-25-32-523', '3252-35-23-532', '235-32523522', 'Afshan Apartments', 'zohairhemani@avialdo.com', '2015-02-24 07:26:56'),
(109, 1, 'zainmemon', '0300-00-00-000', '0005-05-05-050', '050-50505050', 'Afshan Apartments', 'zainmemon@gmail.com', '2015-02-24 07:54:30');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`) VALUES
(2, 'Umrahh'),
(3, 'Malaysia'),
(4, 'Dubai'),
(5, 'new packages 1'),
(6, 'new packages 2'),
(7, 'new packages 5');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `user_id`, `emp_id`, `package_id`, `time_stamp`, `description`) VALUES
(7, 100, 0, 0, '2015-02-23 22:52:05', '$description[$i]'),
(8, 101, 1, 1, '2015-02-23 16:58:37', 'Hajj Package Query.'),
(9, 101, 1, 2, '2015-02-23 16:58:37', 'Umrah Package Query.'),
(10, 101, 1, 3, '2015-02-23 16:58:37', 'Malaysia Package Query.'),
(11, 101, 1, 4, '2015-02-23 16:58:37', 'Dubair Package Query'),
(12, 101, 1, 4, '2015-02-23 16:58:37', 'Dubai Again'),
(13, 102, 1, 1, '2015-02-23 17:31:53', 'This is my hajj query.'),
(14, 102, 1, 2, '2015-02-23 17:31:53', 'This is my umrah query'),
(15, 102, 1, 3, '2015-02-23 17:31:53', 'This is my malaysia Query.'),
(16, 103, 1, 1, '2015-02-23 17:34:04', 'This is my hajj query.'),
(17, 103, 1, 2, '2015-02-23 17:34:04', 'This is my umrah query'),
(18, 103, 1, 3, '2015-02-23 17:34:04', 'This is my malaysia Query.'),
(19, 104, 1, 1, '2015-02-23 23:01:59', 'Ammar							\r\n										'),
(20, 104, 1, 1, '2015-02-23 23:01:59', 'New Query from ammar'),
(21, 105, 0, 0, '2015-02-23 22:37:23', '$description[$i]'),
(22, 105, 0, 0, '2015-02-23 22:37:23', '$description[$i]'),
(23, 106, 1, 1, '2015-02-23 21:33:43', 'This is my updated hajj query\r\n										'),
(24, 106, 1, 2, '2015-02-23 21:33:43', 'This is my umrah query\r\n										'),
(25, 106, 1, 3, '2015-02-23 21:33:43', 'This is my updated malaysia Query.\r\n										'),
(26, 107, 1, 1, '2015-02-24 07:27:22', 'This is my hajj query..			\r\n										\r\n										'),
(27, 107, 1, 1, '2015-02-24 07:27:22', 'NO'),
(28, 108, 1, 1, '2015-02-24 07:26:56', 'This is my hajj query..			\r\n										\r\n										'),
(29, 108, 1, 1, '2015-02-24 07:26:56', 'Yes.								\r\n										\r\n										\r\n										'),
(30, 109, 1, 0, '2015-02-24 07:54:30', 'Hello World.');

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
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
