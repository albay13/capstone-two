-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2019 at 12:56 AM
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
-- Table structure for table `articles_tbl`
--

CREATE TABLE `articles_tbl` (
  `id` int(7) NOT NULL,
  `article_title` varchar(100) NOT NULL,
  `article_content` text NOT NULL,
  `article_category` varchar(100) NOT NULL,
  `article_sub_category` varchar(100) NOT NULL,
  `user_id` int(7) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `article_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles_tbl`
--

INSERT INTO `articles_tbl` (`id`, `article_title`, `article_content`, `article_category`, `article_sub_category`, `user_id`, `date_created`, `article_status`) VALUES
(1, 'ccc', '<p>zxczxc</p>', '1', '', 1, '2019-02-04 06:24:10', 1),
(2, 'zxczxc', '<p>zxczxc</p>', '2', '0', 1, '2019-02-04 06:24:10', 1),
(3, 'zxczxc', '<p>zxczxczxc</p>', '1', '0', 1, '2019-02-04 06:24:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `article_categories_tbl`
--

CREATE TABLE `article_categories_tbl` (
  `id` int(7) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `category_icon` varchar(100) NOT NULL,
  `user_group` varchar(100) NOT NULL,
  `category_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article_categories_tbl`
--

INSERT INTO `article_categories_tbl` (`id`, `category_name`, `category_description`, `category_icon`, `user_group`, `category_status`) VALUES
(1, 'Tutorial', '<p>zxczxc</p>', '1849164580.png', '', 1),
(2, 'zxczxc', '<p>zxczxczxc</p>', '699819354.png', '', 1),
(3, 'zxczxc', '<p>zxczxczzxc</p>', '427791677.png', '3', 1),
(4, 'ccc', '<p>ccc</p>', '433084486.png', '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `article_sub_categories_tbl`
--

CREATE TABLE `article_sub_categories_tbl` (
  `id` int(7) NOT NULL,
  `parent_category_id` int(7) NOT NULL,
  `sub_category_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `user_group` varchar(100) NOT NULL,
  `sub_cat_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article_sub_categories_tbl`
--

INSERT INTO `article_sub_categories_tbl` (`id`, `parent_category_id`, `sub_category_name`, `description`, `icon`, `user_group`, `sub_cat_status`) VALUES
(1, 1, 'zxczxc', '<p>zxczxczxc</p>', '514808893.png', '1', 1),
(2, 1, 'zxczxc', '<p>zxczxczxc</p>', '575629754.png', '1', 1),
(3, 1, 'zxczxc', '<p>zxczxczxc</p>', '1863336285.png', '1', 1),
(4, 4, 'zxc', '<p>zxczxc</p>', '603329927.png', '1', 1);

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
(1, 'Technical Support', '<p>This is for technical support.</p>', '292767721.png', 'technical', 1),
(2, 'zz', '<p>zzz</p>', '839691243.png', '', 1),
(3, 'zzz', '<p>zzz</p>', '1081619060.png', '', 1),
(4, 'zxczxc', '<p>zxczxc</p>', '236835405.png', '3', 1),
(5, 'zxc', '<p>zxczxc</p>', '1153085307.png', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `custom_views_tbl`
--

CREATE TABLE `custom_views_tbl` (
  `id` int(7) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `order_by` varchar(100) NOT NULL,
  `sort_by` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `view_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `faqs_tbl`
--

CREATE TABLE `faqs_tbl` (
  `id` int(7) NOT NULL,
  `questions` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(7) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `question_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs_tbl`
--

INSERT INTO `faqs_tbl` (`id`, `questions`, `content`, `user_id`, `date_created`, `question_status`) VALUES
(1, 'zxczxc', 'ccc', 1, '2019-02-04 06:48:35', 1),
(2, 'zxc', '<p>zxczxc</p>', 1, '2019-02-04 06:51:49', 1),
(3, 'vvv', '<p>vvvvv</p>', 1, '2019-02-04 06:51:59', 1);

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
(2, 1, 'Printer', '<p>This is a sub-category of Technical Support</p>', '1576624668.png', '1', 1),
(3, 2, 'zz', '<p>zzz</p>', '1403567498.png', '4', 1),
(4, 2, 'zxczxc', '<p>zxczxc</p>', '1394021030.png', '1', 1),
(5, 2, 'zxczxc', '<p>zxczxc</p>', '1394021030.png', '3', 1),
(6, 2, 'zxczxc', '<p>zxczxc</p>', '1394021030.png', '4', 1),
(7, 1, 'zzz', '<p>zzz</p>', '940035197.png', '4', 1);

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
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visibility_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_info_tbl`
--

INSERT INTO `ticket_info_tbl` (`id`, `ticket_id`, `sub_category_id`, `ticket_title`, `query`, `ticket_priority`, `attachment`, `ticket_status`, `ticket_notes`, `date_created`, `visibility_status`) VALUES
(1, 1, 1, 'My PC is not working!', '<h1><em><strong>This is a sample data</strong></em></h1>', 'high', '504607165.png', '1', '<p>This is an added note.</p>', '2019-02-04 07:09:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_reply_tbl`
--

CREATE TABLE `ticket_reply_tbl` (
  `id` int(7) NOT NULL,
  `ticket_id` int(7) NOT NULL,
  `assisting_personnel_id` int(7) NOT NULL,
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
(1, 1, 2, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles_tbl`
--
ALTER TABLE `articles_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_categories_tbl`
--
ALTER TABLE `article_categories_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_sub_categories_tbl`
--
ALTER TABLE `article_sub_categories_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_tbl`
--
ALTER TABLE `categories_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_views_tbl`
--
ALTER TABLE `custom_views_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs_tbl`
--
ALTER TABLE `faqs_tbl`
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
-- AUTO_INCREMENT for table `articles_tbl`
--
ALTER TABLE `articles_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `article_categories_tbl`
--
ALTER TABLE `article_categories_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `article_sub_categories_tbl`
--
ALTER TABLE `article_sub_categories_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories_tbl`
--
ALTER TABLE `categories_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `custom_views_tbl`
--
ALTER TABLE `custom_views_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `faqs_tbl`
--
ALTER TABLE `faqs_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ticket_history_tbl`
--
ALTER TABLE `ticket_history_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_info_tbl`
--
ALTER TABLE `ticket_info_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ticket_reply_tbl`
--
ALTER TABLE `ticket_reply_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_tbl`
--
ALTER TABLE `ticket_tbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
