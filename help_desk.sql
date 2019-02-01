-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2019 at 04:36 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

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
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_level` varchar(30) NOT NULL,
  `accounts_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts_tbl`
--

INSERT INTO `accounts_tbl` (`id`, `username`, `password`, `user_level`, `accounts_status`) VALUES
(1, 'noli', '081314jee', 'administrator', 1),
(2, 'noli13', '80b153bf05d4dc063405a8d38d3def84', 'administrator', 1),
(3, 'jee', '32674a705ba28b5b5319a687829f0526', 'administrator', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories_tbl`
--

CREATE TABLE `categories_tbl` (
  `id` int(7) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `category_icon` varchar(100) NOT NULL,
  `user_group` varchar(100) NOT NULL,
  `category_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories_tbl`
--

INSERT INTO `categories_tbl` (`id`, `category_name`, `category_description`, `category_icon`, `user_group`, `category_status`) VALUES
(1, 'Technical Support', '<p>This is for technical support.</p>', '292767721.png', 'technical', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `id` int(7) NOT NULL,
  `department` varchar(100) NOT NULL,
  `department_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`id`, `department`, `department_status`) VALUES
(1, 'Operations', 1),
(2, 'Human Resources', 1),
(3, 'Admin', 1),
(4, 'Retail', 1),
(5, 'Purchasing', 1),
(6, 'Accounting', 1),
(7, 'Permits', 1),
(8, 'Engineering', 1);

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
(1, 1, 'Noli', 'Begino', 'Albay', '1995-10-11', 'pahiram.albay@gmail.com', '09124583714', 1),
(10, 2, 'Noli', 'Begino', 'Albay', '1995-10-11', 'noli.albay@gmail.com', '09124583714', 1),
(11, 3, 'Jeezele', 'Gomez', 'Whiteside', '1996-07-03', 'rephil.whiteside@gmail.com', '09124583714', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status_tbl`
--

CREATE TABLE `status_tbl` (
  `id` int(7) NOT NULL,
  `status_name` varchar(100) NOT NULL,
  `bg_color` varchar(50) NOT NULL,
  `text_color` varchar(50) NOT NULL,
  `visibility_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_tbl`
--

INSERT INTO `status_tbl` (`id`, `status_name`, `bg_color`, `text_color`, `visibility_status`) VALUES
(1, 'New', 'dc3545', 'f8f9fa', 1),
(2, 'In Progress', '28a745', 'f8f9fa', 1),
(3, 'Closed', '17a2b8', 'f8f9fa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories_tbl`
--

CREATE TABLE `sub_categories_tbl` (
  `id` int(7) NOT NULL,
  `parent_category_id` int(7) NOT NULL,
  `sub_category_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `user_group` varchar(100) NOT NULL,
  `sub_cat_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories_tbl`
--

INSERT INTO `sub_categories_tbl` (`id`, `parent_category_id`, `sub_category_name`, `description`, `icon`, `user_group`, `sub_cat_status`) VALUES
(1, 1, 'Computer', '<p>This is a sub category of Technical Support</p>', '1625265909.png', '1', 1),
(2, 1, 'Printer', '<p>This is a sub-category of Technical Support</p>', '1576624668.png', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_history_tbl`
--

CREATE TABLE `ticket_history_tbl` (
  `id` int(11) NOT NULL,
  `ticket_id` int(7) NOT NULL,
  `assisting_personnel_id` int(7) NOT NULL,
  `action` text NOT NULL,
  `date_made` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `history_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_info_tbl`
--

CREATE TABLE `ticket_info_tbl` (
  `id` int(7) NOT NULL,
  `ticket_id` int(7) NOT NULL,
  `sub_category_id` int(7) NOT NULL,
  `ticket_title` varchar(70) NOT NULL,
  `query` text NOT NULL,
  `ticket_priority` varchar(100) NOT NULL,
  `attachment` text NOT NULL,
  `ticket_status` varchar(100) NOT NULL,
  `ticket_notes` text NOT NULL,
  `visibility_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_info_tbl`
--

INSERT INTO `ticket_info_tbl` (`id`, `ticket_id`, `sub_category_id`, `ticket_title`, `query`, `ticket_priority`, `attachment`, `ticket_status`, `ticket_notes`, `visibility_status`) VALUES
(1, 1, 2, 'zxczxcz', '<p>asfsafasf</p>', 'low', '1403040964.png', '1', '<p>fsafasf</p>', 1),
(2, 1, 2, 'cccc', '<p>zxczxczxc</p>', 'high', '366912717.png', '1', '<p>asfasfasfasfasfas</p>', 1),
(3, 1, 1, 'xxxx', '<p>asfasasfasf</p>', 'high', '1133603663.png', '3', '<p>asfasfasfasf</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_reply_tbl`
--

CREATE TABLE `ticket_reply_tbl` (
  `id` int(7) NOT NULL,
  `ticket_id` int(7) NOT NULL,
  `assisting _personnel_id` int(7) NOT NULL,
  `reply` text NOT NULL,
  `uploaded_file` text NOT NULL,
  `date_reply` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reply_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_tbl`
--

CREATE TABLE `ticket_tbl` (
  `id` int(7) NOT NULL,
  `requester_id` int(7) NOT NULL,
  `department_id` int(7) NOT NULL,
  `ticket_category_id` int(7) NOT NULL,
  `visibility_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_tbl`
--

INSERT INTO `ticket_tbl` (`id`, `requester_id`, `department_id`, `ticket_category_id`, `visibility_status`) VALUES
(1, 1, 6, 1, 1),
(2, 1, 2, 1, 1),
(3, 1, 6, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_tbl`
--
ALTER TABLE `categories_tbl`
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
-- Indexes for table `status_tbl`
--
ALTER TABLE `status_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories_tbl`
--
ALTER TABLE `sub_categories_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_category_id` (`parent_category_id`);

--
-- Indexes for table `ticket_history_tbl`
--
ALTER TABLE `ticket_history_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_info_tbl`
--
ALTER TABLE `ticket_info_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_reply_tbl`
--
ALTER TABLE `ticket_reply_tbl`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories_tbl`
--
ALTER TABLE `categories_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `personal_info_tbl`
--
ALTER TABLE `personal_info_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `status_tbl`
--
ALTER TABLE `status_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sub_categories_tbl`
--
ALTER TABLE `sub_categories_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ticket_history_tbl`
--
ALTER TABLE `ticket_history_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_info_tbl`
--
ALTER TABLE `ticket_info_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ticket_reply_tbl`
--
ALTER TABLE `ticket_reply_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_tbl`
--
ALTER TABLE `ticket_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `personal_info_tbl`
--
ALTER TABLE `personal_info_tbl`
  ADD CONSTRAINT `personal_info_tbl_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `accounts_tbl` (`id`);

--
-- Constraints for table `sub_categories_tbl`
--
ALTER TABLE `sub_categories_tbl`
  ADD CONSTRAINT `sub_categories_tbl_ibfk_1` FOREIGN KEY (`parent_category_id`) REFERENCES `categories_tbl` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
