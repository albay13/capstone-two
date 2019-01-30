-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2019 at 01:12 AM
-- Server version: 10.1.34-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `help_desk`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_tbl`
--

CREATE TABLE `accounts_tbl` (
  `id` int(7) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_level` varchar(30) NOT NULL,
  `accounts_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts_tbl`
--

INSERT INTO `accounts_tbl` (`id`, `username`, `password`, `user_level`, `accounts_status`) VALUES
(1, 'noli', '081314jee', 'administrator', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `id` int(7) NOT NULL,
  `department` varchar(100) NOT NULL,
  `department_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal_info_tbl`
--

CREATE TABLE `personal_info_tbl` (
  `id` int(7) NOT NULL,
  `login_id` int(7) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `info_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_info_tbl`
--

INSERT INTO `personal_info_tbl` (`id`, `login_id`, `first_name`, `middle_name`, `last_name`, `birthdate`, `email`, `contact_number`, `info_status`) VALUES
(1, 1, 'Noli', 'Begino', 'Albay', '1995-10-11', 'pahiram.albay@gmail.com', '09124583714', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_info_tbl`
--

CREATE TABLE `ticket_info_tbl` (
  `id` int(7) NOT NULL,
  `ticket_id` int(7) NOT NULL,
  `ticket_title` varchar(70) NOT NULL,
  `query` text NOT NULL,
  `attachment` text NOT NULL,
  `action_taken` varchar(100) NOT NULL,
  `ticket_status` varchar(100) NOT NULL,
  `visibility_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_tbl`
--

CREATE TABLE `ticket_tbl` (
  `id` int(7) NOT NULL,
  `requester_id` int(7) NOT NULL,
  `department_id` int(7) NOT NULL,
  `ticket_category_id` int(7) NOT NULL,
  `ticket_info_id` int(7) NOT NULL,
  `visibility_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_info_tbl`
--
ALTER TABLE `personal_info_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `ticket_tbl`
--
ALTER TABLE `ticket_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personal_info_tbl`
--
ALTER TABLE `personal_info_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ticket_tbl`
--
ALTER TABLE `ticket_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `personal_info_tbl`
--
ALTER TABLE `personal_info_tbl`
  ADD CONSTRAINT `personal_info_tbl_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `accounts_tbl` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
