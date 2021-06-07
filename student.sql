-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 11:08 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_detail`
--

CREATE TABLE `student_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_detail`
--

INSERT INTO `student_detail` (`id`, `name`, `class`) VALUES
(1, 'Wahid', 2),
(2, 'Syed', 5);

-- --------------------------------------------------------

--
-- Table structure for table `subject_detail`
--

CREATE TABLE `subject_detail` (
  `sub_id` int(11) NOT NULL,
  `st_id` int(11) DEFAULT NULL,
  `sub_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_detail`
--

INSERT INTO `subject_detail` (`sub_id`, `st_id`, `sub_name`) VALUES
(2, 2, 'History'),
(16, 1, 'history'),
(17, 2, 'physics'),
(18, 1, 'Maths'),
(21, 1, 'Computer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_detail`
--
ALTER TABLE `student_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_detail`
--
ALTER TABLE `subject_detail`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `st_id` (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_detail`
--
ALTER TABLE `student_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `subject_detail`
--
ALTER TABLE `subject_detail`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subject_detail`
--
ALTER TABLE `subject_detail`
  ADD CONSTRAINT `subject_detail_ibfk_1` FOREIGN KEY (`st_id`) REFERENCES `student_detail` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
