-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 08:45 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ngoms`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `book_no` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `book_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `book_no`, `member_id`, `book_date`) VALUES
(1, 1, 1, '2020-03-09 00:00:00'),
(2, 2, 2, '2020-03-09 00:00:00'),
(3, 3, 3, '2020-03-10 00:00:00'),
(4, 218, 4, '2021-03-21 00:00:00'),
(5, 219, 5, '2021-03-21 00:00:00'),
(6, 123456, 6, '2021-03-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `daily_withdraw`
--

CREATE TABLE `daily_withdraw` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `loan_id` int(11) DEFAULT NULL,
  `savings` int(11) NOT NULL DEFAULT 0,
  `withdraw_saveings` int(11) NOT NULL DEFAULT 0,
  `installments` int(11) DEFAULT 0,
  `withdrawal_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daily_withdraw`
--

INSERT INTO `daily_withdraw` (`id`, `member_id`, `book_id`, `loan_id`, `savings`, `withdraw_saveings`, `installments`, `withdrawal_date`) VALUES
(1, 1, 1, 1, 100, 0, 500, '2020-03-08'),
(2, 2, 2, 2, 100, 0, 500, '2020-03-08'),
(3, 1, 1, 1, 100, 0, 500, '2020-03-07'),
(4, 2, 2, 2, 100, 0, 500, '2020-03-07'),
(5, 1, 1, 1, 100, 0, 500, '2020-03-06'),
(6, 2, 2, 2, 100, 0, 500, '2020-03-06'),
(7, 1, 1, 1, 100, 0, 500, '2020-03-09'),
(8, 2, 2, 2, 100, 0, 500, '2020-03-09'),
(9, 1, 1, 1, 100, 0, 500, '2020-03-10'),
(10, 2, 2, 2, 100, 0, 500, '2020-03-10'),
(11, 3, 3, 3, 100, 0, 500, '2020-03-10'),
(12, 1, 1, NULL, -300, 1, 0, '2020-03-10'),
(13, 1, 1, 1, 100, 0, 100, '2021-03-22'),
(14, 5, 219, 5, 500, 0, 500, '2021-03-22'),
(15, 1, 1, 1, 500, 0, 200, '2021-03-23'),
(16, 5, 219, 5, 1000, 0, 500, '2021-03-23'),
(20, 5, 219, 5, 1000, 0, 24200, '2021-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `jamindar`
--

CREATE TABLE `jamindar` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `father_name` varchar(25) DEFAULT NULL,
  `husband_name` varchar(25) DEFAULT NULL,
  `mother_name` varchar(25) DEFAULT NULL,
  `profession` varchar(25) DEFAULT NULL,
  `nid_type` varchar(25) DEFAULT NULL,
  `nid` varchar(25) DEFAULT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `nationality` varchar(25) DEFAULT NULL,
  `marital_status` varchar(25) DEFAULT NULL,
  `pre_home` varchar(25) DEFAULT NULL,
  `pre_village` varchar(25) DEFAULT NULL,
  `pre_post` varchar(25) DEFAULT NULL,
  `pre_thana` varchar(25) DEFAULT NULL,
  `pre_upazila` varchar(25) DEFAULT NULL,
  `pre_zila` varchar(25) DEFAULT NULL,
  `per_village` varchar(25) DEFAULT NULL,
  `per_post` varchar(25) DEFAULT NULL,
  `per_thana` varchar(25) DEFAULT NULL,
  `per_upazila` varchar(25) DEFAULT NULL,
  `per_zila` varchar(25) DEFAULT NULL,
  `reg_date` datetime DEFAULT current_timestamp(),
  `gender` varchar(25) DEFAULT NULL,
  `special_key` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jamindar`
--

INSERT INTO `jamindar` (`id`, `name`, `father_name`, `husband_name`, `mother_name`, `profession`, `nid_type`, `nid`, `religion`, `mobile`, `nationality`, `marital_status`, `pre_home`, `pre_village`, `pre_post`, `pre_thana`, `pre_upazila`, `pre_zila`, `per_village`, `per_post`, `per_thana`, `per_upazila`, `per_zila`, `reg_date`, `gender`, `special_key`) VALUES
(1, 'Karimun Nessa', 'Shekh Md. Masud', NULL, 'Mst. Sajeda Begum', 'Business', 'National ID', '12345678912345678', 'Islam', '01452-154-845', 'Bangladeshi', 'Married', 'Own', 'Goshbag', 'Zirabo', 'Gazipur Sadar', 'Gazipur Sadar', 'Dhaka', 'Poschim Tarimari', 'Zirabo', 'Ashulia', 'Savar', 'Jamalpur', '2020-03-09 00:00:00', 'Male', '26fc7a204e49f3b9761b016d83c92b2f'),
(2, 'Karimun Nessa', 'Ainul Hawk', NULL, 'Orful Begum', 'Business', 'National ID', '12345678912345678', 'Islam', '03154-545-545', 'Bangladeshi', 'Married', 'Samsul Home', 'Goshbag', 'Kashimpur', 'Ashulia', 'Savar', 'Dhaka', 'Poschim Tarimari', 'Deowanganj', 'Ashulia', 'Deowanganj', 'Dhaka', '2020-03-10 00:00:00', 'Male', '04880ed330ba1d650e08410de5ecd1de');

-- --------------------------------------------------------

--
-- Table structure for table `jamindar_book`
--

CREATE TABLE `jamindar_book` (
  `jamindar_id` int(11) NOT NULL,
  `book_no` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jamindar_book`
--

INSERT INTO `jamindar_book` (`jamindar_id`, `book_no`, `member_id`) VALUES
(1, 1, 1),
(1, 2, 2),
(2, 3, 3),
(1, 218, 4),
(1, 219, 5);

-- --------------------------------------------------------

--
-- Table structure for table `loan_table`
--

CREATE TABLE `loan_table` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `jamindar_id` int(11) DEFAULT NULL,
  `book_id` int(11) NOT NULL,
  `loan_amount` int(11) NOT NULL,
  `loan_interest` int(11) NOT NULL,
  `loan_period` int(11) NOT NULL,
  `loan_type` varchar(25) NOT NULL,
  `loan_serverce_charge` int(11) NOT NULL,
  `loan_total` int(11) NOT NULL,
  `service_amount` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `book_cost` int(11) NOT NULL,
  `loan_date` datetime NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `finish_date` timestamp NULL DEFAULT NULL,
  `special_key` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_table`
--

INSERT INTO `loan_table` (`id`, `member_id`, `jamindar_id`, `book_id`, `loan_amount`, `loan_interest`, `loan_period`, `loan_type`, `loan_serverce_charge`, `loan_total`, `service_amount`, `grand_total`, `book_cost`, `loan_date`, `active`, `finish_date`, `special_key`) VALUES
(1, 1, 1, 1, 20000, 4, 6, 'Daily', 2, 25200, 400, 25650, 50, '2020-03-09 00:00:00', 1, NULL, 'c1be30a4c54bb1fd12e9db830c4cf244'),
(2, 2, 1, 2, 20000, 4, 6, 'Daily', 2, 25200, 400, 25650, 50, '2020-03-09 00:00:00', 1, NULL, '3522ebdf00357dbd8aaa7d980db8d513'),
(3, 3, 2, 3, 20000, 4, 6, 'Daily', 2, 25200, 400, 25650, 50, '2020-03-10 00:00:00', 1, NULL, '46a52cd2d6750f163b566a25e448ec05'),
(4, 4, 1, 218, 50000, 4, 6, 'Daily', 2, 63000, 1000, 64050, 50, '2021-03-21 00:00:00', 1, NULL, 'c929af90974785f9059bce1ddbd75963'),
(5, 5, 1, 219, 20000, 4, 6, 'Daily', 2, 25200, 400, 25650, 50, '2021-03-21 00:00:00', 0, '2021-04-22 18:00:00', 'd32c6efdbe8e2a1b493e4e1c1ac7b2ed'),
(6, 6, 0, 123456, 50000, 4, 6, 'Daily', 2, 63000, 1000, 64050, 50, '2021-03-22 00:00:00', 1, NULL, '3b1fe98f3c8481a02d6a881dbe20d8c9');

-- --------------------------------------------------------

--
-- Table structure for table `member_info`
--

CREATE TABLE `member_info` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `father_name` varchar(25) DEFAULT NULL,
  `husband_name` varchar(25) DEFAULT NULL,
  `profession` varchar(25) DEFAULT NULL,
  `nid_type` varchar(30) DEFAULT NULL,
  `nid` varchar(35) NOT NULL,
  `religion` varchar(25) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `nationality` varchar(25) DEFAULT NULL,
  `marital_status` varchar(25) DEFAULT NULL,
  `b_home` varchar(25) DEFAULT NULL,
  `b_vill` varchar(25) DEFAULT NULL,
  `b_post` varchar(25) DEFAULT NULL,
  `b_thana` varchar(25) DEFAULT NULL,
  `b_upazila` varchar(25) DEFAULT NULL,
  `b_zila` varchar(25) DEFAULT NULL,
  `s_vill` varchar(25) DEFAULT NULL,
  `s_post` varchar(25) DEFAULT NULL,
  `s_thana` varchar(25) DEFAULT NULL,
  `s_upazila` varchar(25) DEFAULT NULL,
  `s_zila` varchar(25) DEFAULT NULL,
  `admission_date` datetime NOT NULL DEFAULT current_timestamp(),
  `gender` varchar(25) DEFAULT NULL,
  `special_key` text NOT NULL,
  `mother_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_info`
--

INSERT INTO `member_info` (`id`, `name`, `father_name`, `husband_name`, `profession`, `nid_type`, `nid`, `religion`, `mobile`, `nationality`, `marital_status`, `b_home`, `b_vill`, `b_post`, `b_thana`, `b_upazila`, `b_zila`, `s_vill`, `s_post`, `s_thana`, `s_upazila`, `s_zila`, `admission_date`, `gender`, `special_key`, `mother_name`) VALUES
(1, 'Sri Roton', 'Shekh Md. Masud', NULL, 'Business', NULL, '12345678912345678', 'Islam', '01751-224-863', 'Bangladeshi', 'Unmarried', 'Own', 'Goshbag', 'Zirabo', 'Ashulia', 'Savar', 'Dhaka', 'Goshbag', 'Zirabo', 'Ashulia', 'Savar', 'Dhaka', '2020-03-09 00:00:00', 'Male', '1dfc6f2bc746766732e06eb7eb107db2', 'Shekh Rahima'),
(2, 'Reduan Masud', 'Shekh Md. Masud', NULL, 'B', NULL, '12345678912345678', 'Islam', '01754-887-963', 'Bangladeshi', 'Married', 'Own', 'Goshbag', 'Zirabo', 'Ashulia', '', 'Dhaka', 'Goshbag', 'Zirabo', 'Ashulia', '', 'Dhaka', '2020-03-09 00:00:00', 'Male', '8f469f66b785624760db70b894112462', 'Shekh Rahima'),
(3, 'Md. Ershad Ali', 'adfasfd', NULL, 'Worker', NULL, '3921503763766', 'Islam', '01574-852-465', 'Bangladeshi', 'Married', 'Own', 'Goshbag', 'Zirabo', 'Gazipur Sadar', 'Savar', 'Gazipur', 'Goshbag', 'Deowanganj', '', 'Savar', 'Dhaka', '2020-03-10 00:00:00', 'Male', '17ffa9200cf1dc1e86264ae677b9bf67', 'Mst. Sajeda Begum'),
(5, 'MD. Reduan Masud', 'Shekh Md. Masud', NULL, 'Worker', NULL, '12345678912345678', 'Islam', '01545-454-122', 'Bangladeshi', 'Unmarried', '', '', '', '', '', '', '', '', '', '', '', '2021-03-21 00:00:00', 'Male', '07d33acdfac0441aebf75141b2bb97b3', 'Shekh Rahima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_withdraw`
--
ALTER TABLE `daily_withdraw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jamindar`
--
ALTER TABLE `jamindar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_table`
--
ALTER TABLE `loan_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_info`
--
ALTER TABLE `member_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `daily_withdraw`
--
ALTER TABLE `daily_withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jamindar`
--
ALTER TABLE `jamindar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loan_table`
--
ALTER TABLE `loan_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member_info`
--
ALTER TABLE `member_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
