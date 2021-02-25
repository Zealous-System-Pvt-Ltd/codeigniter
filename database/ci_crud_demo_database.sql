-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2021 at 05:32 PM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 5.6.40-30+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_crud_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `gender_id` int(1) NOT NULL COMMENT '1=Male,2=Female',
  `user_designation_id` int(11) NOT NULL,
  `status` smallint(1) DEFAULT '1' COMMENT '1=Active',
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `mobile_number`, `gender_id`, `user_designation_id`, `status`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(19, 'Zealous-Employee-1', '1234567891', 1, 25, 1, 1, '2021-02-25 16:32:26', 1, '2021-02-25 16:35:28'),
(20, 'Zealous-CEO', '7891234569', 1, 26, 1, 1, '2021-02-25 17:14:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `profileimage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`, `profileimage`) VALUES
(1, 'admin', 'e6e061838856bf47e1de730719fb2609', 'Zealous', 'System', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_designation`
--

CREATE TABLE `user_designation` (
  `id` int(11) NOT NULL,
  `designation_name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_designation`
--

INSERT INTO `user_designation` (`id`, `designation_name`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(20, 'Web Developer', 1, '2021-02-25 16:30:45', 1, '2021-02-25 16:32:00'),
(21, 'Web Designer', 1, '2021-02-25 16:30:55', NULL, NULL),
(22, 'UI/UX Developer', 1, '2021-02-25 16:31:03', NULL, NULL),
(23, 'HR Department', 1, '2021-02-25 16:31:24', NULL, NULL),
(24, 'Team Leader', 1, '2021-02-25 16:31:37', NULL, NULL),
(25, 'Project Manager', 1, '2021-02-25 16:31:45', NULL, NULL),
(26, 'CEO', 1, '2021-02-25 17:13:58', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_designation_id` (`user_designation_id`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_designation`
--
ALTER TABLE `user_designation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_designation`
--
ALTER TABLE `user_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`user_designation_id`) REFERENCES `user_designation` (`id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_designation`
--
ALTER TABLE `user_designation`
  ADD CONSTRAINT `user_designation_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_designation_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
