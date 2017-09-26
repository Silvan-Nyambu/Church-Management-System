-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2017 at 09:37 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(255) NOT NULL,
  `names` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `names`, `email`, `password`) VALUES
(1, 'John Doe', 'johndoe@outlook.com', '09419e6ae40dfb71ca1b9db4109a687c');

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE `contributions` (
  `id` int(255) NOT NULL,
  `member_name` text NOT NULL,
  `member_no` int(255) NOT NULL,
  `telephone` int(255) NOT NULL,
  `station` text NOT NULL,
  `type` text NOT NULL,
  `amount` int(255) NOT NULL,
  `p_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`id`, `member_name`, `member_no`, `telephone`, `station`, `type`, `amount`, `p_date`) VALUES
(5, 'James Bond', 1010, 734512342, 'St Johns', 'Christmas Dues', 500, '2017-09-04'),
(13, 'Mary Magdalene', 1011, 734567986, 'St Peters', 'Diocese Collections', 1200, '2017-09-05'),
(15, 'Mary Magdalene', 1011, 734567986, 'St Peters', 'Pascal Dues', 255, '2017-09-05'),
(16, 'James Bond', 1010, 734512342, 'St Johns', 'Diocese Collections', 800, '2017-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `contribution_types`
--

CREATE TABLE `contribution_types` (
  `id` int(255) NOT NULL,
  `contribution_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contribution_types`
--

INSERT INTO `contribution_types` (`id`, `contribution_name`) VALUES
(2, 'Christmas Dues'),
(3, 'Pascal Dues'),
(5, 'Diocese Collections');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_date`, `event_time`, `event_name`) VALUES
(1, '2017-12-04', '09:00:00', 'Family Mass'),
(4, '2017-12-25', '10:00:00', 'Wedding'),
(5, '2017-12-02', '13:00:00', 'Baptism');

-- --------------------------------------------------------

--
-- Table structure for table `families`
--

CREATE TABLE `families` (
  `family_id` int(255) NOT NULL,
  `family_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `families`
--

INSERT INTO `families` (`family_id`, `family_name`) VALUES
(1, 'Joseph');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(255) NOT NULL,
  `group_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`) VALUES
(1, 'CMA'),
(2, 'CWA'),
(3, 'Choir');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(255) NOT NULL,
  `names` text NOT NULL,
  `member_no` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` int(255) NOT NULL,
  `group_name` text NOT NULL,
  `baptism_date` date NOT NULL,
  `confirmation_date` date NOT NULL,
  `gender` text NOT NULL,
  `marital_status` text NOT NULL,
  `family` text NOT NULL,
  `station` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `names`, `member_no`, `email`, `telephone`, `group_name`, `baptism_date`, `confirmation_date`, `gender`, `marital_status`, `family`, `station`) VALUES
(4, 'James Bond', 1010, 'jamesbond@gmail.com', 734512342, 'CMA', '2017-03-05', '2017-08-06', 'Male', 'Single', 'Joseph', 'St Johns'),
(6, 'Mary Magdalene', 1011, 'marymagdalene@gmail.com', 734567986, 'CWA', '1994-12-23', '2017-08-20', 'Female', 'Single', 'Joseph', 'St Peters');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `station_id` int(255) NOT NULL,
  `station_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`station_id`, `station_name`) VALUES
(1, 'St Johns'),
(2, 'St Peters'),
(3, 'St Marys');

-- --------------------------------------------------------

--
-- Table structure for table `sunday_sch`
--

CREATE TABLE `sunday_sch` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sunday_sch`
--

INSERT INTO `sunday_sch` (`id`, `name`, `status`) VALUES
(2, 'Nursery', 'Active'),
(3, 'Youths', 'Inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contribution_types`
--
ALTER TABLE `contribution_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `families`
--
ALTER TABLE `families`
  ADD PRIMARY KEY (`family_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `sunday_sch`
--
ALTER TABLE `sunday_sch`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `contribution_types`
--
ALTER TABLE `contribution_types`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `families`
--
ALTER TABLE `families`
  MODIFY `family_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `station_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sunday_sch`
--
ALTER TABLE `sunday_sch`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
