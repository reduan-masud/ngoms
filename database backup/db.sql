-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2020 at 07:03 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ngoms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `book_no` int(25) NOT NULL,
  `member_id` int(25) NOT NULL,
  `book_date` date NOT NULL,
  `special_key` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `book_no`, `member_id`, `book_date`, `special_key`) VALUES
(1, 161, 1, '2019-03-18', ''),
(2, 136, 2, '2018-02-20', ''),
(3, 299, 3, '2019-02-17', ''),
(4, 294, 4, '2019-02-05', ''),
(5, 298, 5, '2019-02-17', ''),
(6, 306, 6, '2019-03-06', ''),
(7, 288, 7, '2018-02-26', ''),
(8, 305, 8, '2019-02-26', ''),
(9, 165, 9, '2019-11-28', ''),
(10, 279, 10, '2019-03-22', ''),
(11, 240, 11, '2018-12-13', ''),
(12, 137, 12, '2018-02-19', ''),
(13, 213, 13, '2018-11-15', ''),
(14, 198, 14, '2018-10-15', ''),
(15, 196, 15, '2018-11-15', ''),
(16, 178, 16, '2017-11-18', ''),
(17, 217, 17, '2018-11-20', ''),
(18, 247, 18, '2018-11-09', ''),
(19, 220, 19, '2018-11-22', ''),
(20, 249, 20, '2018-12-09', ''),
(21, 241, 21, '2018-12-02', ''),
(22, 237, 22, '2018-12-02', ''),
(23, 180, 23, '2018-11-19', ''),
(24, 229, 24, '2018-11-25', ''),
(25, 248, 25, '2018-12-23', ''),
(26, 201, 26, '2015-11-06', ''),
(27, 258, 27, '2018-12-16', ''),
(28, 238, 28, '2018-11-26', ''),
(29, 216, 29, '2018-11-15', ''),
(30, 218, 30, '2017-11-18', ''),
(31, 300, 31, '2019-02-17', ''),
(32, 296, 32, '2017-02-17', ''),
(33, 297, 33, '2019-02-17', ''),
(34, 292, 34, '2018-02-05', ''),
(35, 263, 35, '2015-12-23', ''),
(36, 262, 36, '2018-12-17', ''),
(37, 254, 37, '2018-12-16', ''),
(38, 260, 38, '2018-12-20', ''),
(39, 211, 39, '2018-11-17', ''),
(40, 195, 40, '2017-10-26', ''),
(41, 167, 41, '2018-12-02', ''),
(42, 252, 42, '2018-12-13', ''),
(43, 206, 43, '2018-11-05', ''),
(44, 264, 44, '2018-12-20', ''),
(45, 233, 45, '2018-12-02', ''),
(46, 153, 46, '2018-10-10', ''),
(47, 189, 47, '2015-10-04', ''),
(48, 234, 48, '2018-12-02', ''),
(49, 203, 49, '2018-10-31', ''),
(50, 231, 50, '2016-11-22', ''),
(51, 285, 51, '2019-02-05', ''),
(52, 239, 52, '2019-02-05', ''),
(53, 173, 53, '2018-11-19', ''),
(54, 222, 54, '2017-11-18', ''),
(55, 147, 55, '2019-04-10', ''),
(56, 200, 56, '2019-02-26', ''),
(57, 210, 57, '2018-11-15', ''),
(58, 242, 58, '2018-12-09', ''),
(59, 223, 59, '2018-11-20', ''),
(60, 267, 60, '2018-12-23', ''),
(61, 101, 61, '2018-02-03', ''),
(62, 102, 62, '2018-02-03', ''),
(63, 103, 63, '2018-02-03', ''),
(64, 104, 64, '2018-02-03', ''),
(65, 105, 65, '2016-02-03', ''),
(66, 106, 66, '2018-02-03', ''),
(67, 108, 67, '2018-02-03', ''),
(68, 110, 68, '2018-02-03', ''),
(69, 111, 69, '2018-02-03', ''),
(70, 112, 70, '2018-02-03', ''),
(71, 113, 71, '2018-02-04', ''),
(72, 114, 72, '2016-02-04', ''),
(73, 115, 73, '2018-02-04', ''),
(74, 117, 74, '2017-02-04', ''),
(75, 120, 75, '2018-02-04', ''),
(76, 121, 76, '2018-02-09', ''),
(77, 122, 77, '2018-02-10', ''),
(78, 124, 78, '2018-02-13', ''),
(79, 125, 79, '2018-02-16', ''),
(80, 126, 80, '2018-02-16', ''),
(81, 127, 81, '2018-02-16', ''),
(82, 128, 82, '2018-02-16', ''),
(83, 129, 83, '2018-02-16', ''),
(84, 130, 84, '2018-02-16', ''),
(85, 131, 85, '2018-02-16', ''),
(86, 132, 86, '2018-02-16', ''),
(87, 133, 87, '2018-02-17', ''),
(88, 134, 88, '2018-02-17', ''),
(89, 135, 89, '2018-02-17', ''),
(90, 138, 90, '2018-02-17', ''),
(91, 139, 91, '2018-02-17', ''),
(92, 140, 92, '2018-02-17', ''),
(93, 141, 93, '2018-02-17', ''),
(94, 142, 94, '2018-02-17', ''),
(95, 143, 95, '2018-02-17', ''),
(96, 144, 96, '2018-02-17', ''),
(97, 145, 97, '2018-02-17', ''),
(98, 148, 98, '2018-02-18', ''),
(99, 149, 99, '2018-02-20', ''),
(100, 150, 100, '2018-02-20', ''),
(101, 151, 101, '2018-02-20', ''),
(102, 152, 102, '2018-02-20', ''),
(103, 154, 103, '2018-02-21', ''),
(104, 155, 104, '2018-02-27', ''),
(105, 156, 105, '2018-02-27', ''),
(106, 157, 106, '2018-02-27', ''),
(107, 159, 107, '2018-03-05', ''),
(108, 160, 108, '2018-03-05', ''),
(109, 162, 109, '2018-03-09', ''),
(110, 163, 110, '2018-03-09', ''),
(111, 164, 111, '2018-03-07', ''),
(112, 166, 112, '2018-03-15', ''),
(113, 168, 113, '2018-03-23', ''),
(114, 169, 114, '2018-03-31', ''),
(115, 170, 115, '2018-03-31', ''),
(116, 171, 116, '2018-04-06', ''),
(117, 172, 117, '2018-04-06', ''),
(118, 174, 118, '2018-04-10', ''),
(119, 175, 119, '2018-04-11', ''),
(120, 176, 120, '2018-04-12', ''),
(121, 177, 121, '2018-04-20', ''),
(122, 179, 122, '2018-04-30', ''),
(123, 181, 123, '2018-07-10', ''),
(124, 182, 124, '2018-07-13', ''),
(125, 184, 125, '2018-08-07', ''),
(126, 185, 126, '2018-08-15', ''),
(127, 186, 127, '2018-08-09', ''),
(128, 187, 128, '2018-09-09', ''),
(129, 188, 129, '2018-09-11', ''),
(130, 190, 130, '2018-10-10', '');

-- --------------------------------------------------------

--
-- Table structure for table `daily_withdraw`
--

DROP TABLE IF EXISTS `daily_withdraw`;
CREATE TABLE IF NOT EXISTS `daily_withdraw` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `member_id` int(25) NOT NULL,
  `book_id` int(25) NOT NULL,
  `loan_id` int(25) DEFAULT NULL,
  `savings` int(25) DEFAULT NULL,
  `withdraw_saveings` tinyint(4) NOT NULL DEFAULT '0',
  `installments` int(25) DEFAULT NULL,
  `withdrawal_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_withdraw`
--

INSERT INTO `daily_withdraw` (`id`, `member_id`, `book_id`, `loan_id`, `savings`, `withdraw_saveings`, `installments`, `withdrawal_date`) VALUES
(1, 61, 101, NULL, 30, 0, 0, '2018-02-03'),
(2, 62, 102, NULL, 50, 0, 0, '2018-02-03'),
(3, 63, 103, NULL, 30, 0, 0, '2018-02-03'),
(4, 64, 104, NULL, 50, 0, 0, '2018-02-03'),
(5, 65, 105, NULL, 50, 0, 0, '2018-02-03'),
(6, 66, 106, NULL, 50, 0, 0, '2018-02-03'),
(8, 67, 108, NULL, 50, 0, 0, '2018-02-03'),
(9, 68, 110, NULL, 20, 0, 0, '2018-02-03'),
(10, 69, 111, NULL, 20, 0, 0, '2018-02-03'),
(11, 70, 112, NULL, 50, 0, 0, '2018-02-03'),
(12, 71, 113, NULL, 30, 0, 0, '2018-02-04'),
(13, 72, 114, NULL, 30, 0, 0, '2018-02-04'),
(14, 73, 115, NULL, 30, 0, 0, '2018-02-04'),
(15, 74, 117, NULL, 50, 0, 0, '2018-02-04'),
(16, 76, 121, NULL, 20, 0, 0, '2018-02-04'),
(17, 67, 108, NULL, 50, 0, 0, '2018-02-04'),
(18, 66, 106, NULL, 20, 0, 0, '2018-02-04'),
(19, 75, 120, NULL, 50, 0, 0, '2018-02-04'),
(20, 70, 112, NULL, 50, 0, 0, '2018-02-04'),
(21, 61, 101, NULL, 30, 0, 0, '2018-02-04'),
(22, 64, 104, NULL, 50, 0, 0, '2018-02-04'),
(23, 63, 103, NULL, 30, 0, 0, '2018-02-04'),
(24, 65, 105, NULL, 30, 0, 0, '2018-02-04'),
(25, 62, 102, NULL, 50, 0, 0, '2018-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

DROP TABLE IF EXISTS `deposit`;
CREATE TABLE IF NOT EXISTS `deposit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_no` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `deposit_amount` int(11) NOT NULL,
  `deposit_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jamindar`
--

DROP TABLE IF EXISTS `jamindar`;
CREATE TABLE IF NOT EXISTS `jamindar` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `father_name` varchar(25) DEFAULT NULL,
  `husband_name` int(11) DEFAULT NULL,
  `mother_name` varchar(25) NOT NULL,
  `profession` varchar(25) NOT NULL,
  `nid_type` varchar(255) DEFAULT NULL,
  `nid` varchar(25) NOT NULL,
  `religion` varchar(25) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `nationality` varchar(25) NOT NULL,
  `marital_status` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `pre_home` varchar(255) NOT NULL,
  `pre_village` varchar(255) NOT NULL,
  `pre_post` varchar(255) NOT NULL,
  `pre_thana` varchar(225) NOT NULL,
  `pre_upazila` varchar(255) NOT NULL,
  `pre_zila` varchar(255) NOT NULL,
  `per_village` varchar(255) NOT NULL,
  `per_post` varchar(255) NOT NULL,
  `per_thana` varchar(255) NOT NULL,
  `per_upazila` varchar(255) NOT NULL,
  `per_zila` varchar(255) NOT NULL,
  `present_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `reg_date` date NOT NULL,
  `special_key` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jamindar`
--

INSERT INTO `jamindar` (`id`, `name`, `father_name`, `husband_name`, `mother_name`, `profession`, `nid_type`, `nid`, `religion`, `mobile`, `nationality`, `marital_status`, `gender`, `pre_home`, `pre_village`, `pre_post`, `pre_thana`, `pre_upazila`, `pre_zila`, `per_village`, `per_post`, `per_thana`, `per_upazila`, `per_zila`, `present_address`, `permanent_address`, `reg_date`, `special_key`) VALUES
(1, 'Mst. Nilufa Khatun', 'Mst. Rasia Khatun', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-03-18', '0d0e1935c56ca60bb8f15193bf667e15'),
(2, 'Md. Ferdows Hossen', 'Md. Muntaz Uddin', NULL, 'Mst. Fatema Begum', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-02-20', 'e16b75b222566b10e01859020cce6187'),
(3, 'Mst. Moyna Begum', '', NULL, '', '', NULL, '', 'Islam', '01784-833-345', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-02-17', '1561d5055251464cf196029fa16ec036'),
(4, 'Md. Rokon', '', NULL, '', '', NULL, '', 'Islam', '01960-576-690', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-02-05', '7943fd2a00c38d00cec85c2d638a6938'),
(5, 'Md. Rony Mia', 'Md. Lal Mia', NULL, 'Mst. Rojina', '', NULL, '', 'Islam', '01992-716-890', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-02-17', 'c2373359b43ef5d2a5ab6aa93d6e7436'),
(6, 'Mst. Moni Begum', '', NULL, '', '', NULL, '', 'Islam', '01905-485-866', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-03-06', 'f84e76cbbfdadcf153a32945e0b04e0d'),
(7, 'Md. Al-Amin', 'Tara Mia', NULL, 'Halima Khatun', '', NULL, '', 'Islam', '01766-777-894', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-02-26', 'dc9e1ceba75495dd6c6a98ccec33b2a5'),
(8, 'Md. Abdul Khalek', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-02-26', 'd00df4fff1b9c8811fc6ee294b83e21a'),
(9, 'Md. Torikul Islam', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-11-28', 'ce434c4e5bab19f3793b0aafd8fdfe29'),
(10, 'Md. Swapon Molla', '', NULL, '', '', NULL, '', 'Islam', '01960-545-116', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-03-22', '9a8fa7f06466894758de9ea9a3d639e7'),
(11, 'Sumon Ali', '', NULL, '', '', NULL, '', 'Islam', '01795-260-351', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-12-13', '3481e5c37c78c19248254535691596a8'),
(12, 'Mirajul Islam', '', NULL, '', '', NULL, '', 'Islam', '01793-414-806', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-02-19', '95357d08b93525466f8977cb694232f4'),
(13, 'Mst. Munni Aktar', '', NULL, 'Abuja Begum', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-11-15', '3c1e27a8a9b7722a0170ddb3a194ba1f'),
(14, 'Mst. Nurnahar', '', NULL, '', '', NULL, '', 'Islam', '01905-863-918', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-10-15', '1b7d08b949d3b9be2e62af6b5293d721'),
(15, 'Sri Roton', '', NULL, '', '', NULL, '', 'Hindu', '01756-099-142', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-11-15', 'dc96fe6dfb7ee99f899d8af4b02445d9'),
(16, 'Kolpona', 'Sukru Shekh', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-11-18', 'b346ffc71185a429cff7b9f5af1af368'),
(17, 'Motiur Rahoman', '', NULL, '', '', NULL, '', 'Islam', '01741-694-836', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-11-20', 'c5371065870ac6df383946122677b42e'),
(18, 'Ershad Ali', '', NULL, '', '', NULL, '', 'Islam', '01910-519-143', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-12-09', 'c12bf424b981d917d15f15a1f7e9e794'),
(19, 'Afroja Begum', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-11-22', '373e2e4443bba369aac13a444d2b0ec3'),
(20, 'Md. Siam Uddin', '', NULL, '', '', NULL, '', 'Islam', '01955-096-315', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-12-09', '287c82c62cf2661a9ab9f81041640ded'),
(21, 'Abul Kashem', '', NULL, '', '', NULL, '', 'Islam', '01929-565-299', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-12-02', '0f9a8f44dee9c5b7c0d10d102c5a480e'),
(22, 'Sri Roton', '', NULL, '', '', NULL, '', 'Hindu', '01707-740-106', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-12-02', '836084b25f7e09e2a666218f4cf11696'),
(23, 'Mst. Rithi Aktar', '', NULL, '', '', NULL, '', 'Islam', '01717-135-746', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-11-19', 'f77e7901835b5edaf0844b041beef1f3'),
(24, 'Md. Torikul Islam', 'Saha Alom', NULL, '', '', NULL, '', 'Islam', '01955-096-382', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-11-25', 'f279f1f4992d4b1ab0aa0cd5cde41e82'),
(25, 'Mst. Khukumoni', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-12-23', '8576dd1a3c2e5b55bddee7dbb5b8feae'),
(26, 'Somirul Khan', '', NULL, '', '', NULL, '', 'Islam', '01952-263-522', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-11-06', 'dc76abbd1eccd5000f8a554b85df4f97'),
(27, 'Md. Lal Mia', '', NULL, '', '', 'National ID', '', 'Islam', '01926-545-536', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-12-16', '826df52bd29bb860ecc8d5bfff4f7086'),
(28, 'Mst. Jonera', '', NULL, '', '', 'National ID', '', 'Islam', '01846-603-241', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-11-26', '108fbf5594351ed8b6b06bc7cb332b28'),
(29, 'Mst. Ismetara Begum', '', NULL, '', '', 'National ID', '', 'Islam', '', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-11-15', 'e16e47bbd12143d1e2d5502ccc2b4c0e'),
(30, 'Md. Ershad Ali', '', NULL, '', '', 'National ID', '', 'Islam', '01910-519-043', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-11-18', 'cac578bc798955b38386a5662951e695'),
(31, 'Md. Rony', '', NULL, '', '', 'National ID', '', 'Islam', '01992-716-890', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-02-17', '93f1ab08ecf34522f61fb40c96616d12'),
(32, 'Md. Harun Roshid', '', NULL, '', '', 'National ID', '', 'Islam', '01756-202-606', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-02-17', '8721f8cfd13649e2701e943c2aef41b6'),
(33, 'Md. Renu Mia', '', NULL, '', '', 'National ID', '', 'Islam', '01794-046-872', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-02-17', 'f17cb8ad86cea3f3929f49f2772a319c'),
(34, 'Mst. Halima', '', NULL, '', '', 'National ID', '', 'Islam', '', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-02-05', 'db6be15dc44163a7e81de2c7e739d650'),
(35, 'Md. Lablu Islam', '', NULL, '', '', 'National ID', '', 'Islam', '01784-125-046', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-12-23', 'c3c8c4777ae07e0331d233ea63e9ff15'),
(36, 'Shahinur', '', NULL, '', '', 'National ID', '', 'Islam', '01872-775-593', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-12-20', '2a03a21009eab48210ec61617e8046d5'),
(37, 'Sima', '', NULL, '', '', 'National ID', '', 'Islam', '01955-096-315', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-12-16', '3ad585f4877d7657c057863287b153ef'),
(38, 'Shahinur', '', NULL, '', '', 'National ID', '', 'Islam', '01872-775-593', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-12-20', '5c85c172f4d22fefb2a984e344925746'),
(39, 'Abdul Barek', '', NULL, '', '', 'National ID', '', 'Islam', '', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-11-17', '15a975401023f37991a7f783ab3273b2'),
(40, 'Sri Dipok Condro', '', NULL, '', '', 'National ID', '', 'Hindu', '01828-707-157', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-10-27', 'b6886d3dc9de58f754a79f628f267cad'),
(41, 'Md. Nijam', '', NULL, '', '', 'National ID', '', 'Islam', '01927-445-627', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-12-02', '4e3608ac95ed33e3b2d52e45ca4b389a'),
(42, 'Mst. Alemi Khatun', '', NULL, '', '', 'National ID', '', 'Islam', '', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-12-13', '0060f182b3eb5b4b1626a44a1ba31cf6'),
(43, 'Rohima', '', NULL, '', '', 'National ID', '', 'Islam', '', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-11-05', 'c923abfd806d6500de2ba6d6f68a6c70'),
(44, 'Owajuddin', '', NULL, '', '', 'National ID', '', 'Islam', '01734-757-884', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-12-10', 'c05f422725467ab11c4bcc197bb934e7'),
(45, 'Md. Selim', '', NULL, '', '', 'National ID', '', 'Islam', '01715-377-592', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-12-02', '60a2cf2389f92fff7283171f813cb700'),
(46, 'Sri Roton', '', NULL, '', '', 'National ID', '', 'Islam', '01756-019-142', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-10-10', '1af46cb1dd6c540a28ce4d9e86e01408'),
(47, 'Md. Abul Kalam', '', NULL, '', '', 'National ID', '', 'Islam', '01992-536-078', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-10-04', '20c6038435620e99fc6e8c0f5cc2cb13'),
(48, 'Md. Selim', '', NULL, '', '', 'National ID', '', 'Islam', '01715-677-592', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-12-02', 'df9c272c570ec58efd491339132f7831'),
(49, 'Md. Rofikul Islam', '', NULL, '', '', 'National ID', '', 'Islam', '01996-783-195', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-10-31', '2ce8e748e89048b2a2b5c0a5c76a5174'),
(50, 'Kulsum', '', NULL, '', '', 'National ID', '', 'Islam', '01953-533-485', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-11-22', 'afea20323d45df7a18259c4c7e8c9753'),
(51, 'Sultana Aktar', '', NULL, '', '', 'National ID', '', 'Islam', '', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-02-05', 'e920d8cbd1940d033e6a45aa51cfd162'),
(52, 'Md. Renu Mia', '', NULL, '', '', 'National ID', '', 'Islam', '01794-046-872', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-02-05', '789326137850e33339ebc4b20a04da56'),
(53, 'Abdul Forhad Hossen', '', NULL, '', '', 'National ID', '', 'Islam', '01716-271-957', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-11-19', 'adb1842618bb21f393ce6ebd9fc550fc'),
(54, 'Mokhlesur', '', NULL, '', '', 'National ID', '', 'Islam', '01724-088-260', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-11-18', '7e6a8969ceaaf06d1baf27021344b295'),
(55, 'Surrjo banu', '', NULL, '', '', 'National ID', '', 'Islam', '', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-04-10', '7e671ff1582578da407e261f5e9ce6c9'),
(56, 'Mst. Shahana', '', NULL, '', '', 'National ID', '', 'Islam', '', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-02-26', 'fd84dd288d1237e3b5825c604a5d3755'),
(57, 'Mst. Soyful Begum', '', NULL, '', '', 'National ID', '', 'Islam', '', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-10-15', '78f476d366a282ed63043396aec56795'),
(58, 'Atab Ali', '', NULL, '', '', 'National ID', '', 'Islam', '01981-907-735', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-12-09', '6011ee865694c70d9757ce260aa3d90e'),
(59, 'Minhaj', '', NULL, '', '', 'National ID', '', 'Islam', '', 'Bangladeshi', 'Married', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-11-20', 'e0a3b52ba056b58f77478d068d4b655b'),
(60, 'Jamina', '', NULL, '', '', 'National ID', '', 'Islam', '', 'Bangladeshi', 'Married', 'Female', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-12-23', '74dda2adca69046fc68fb1217708b10e');

-- --------------------------------------------------------

--
-- Table structure for table `jamindar_book`
--

DROP TABLE IF EXISTS `jamindar_book`;
CREATE TABLE IF NOT EXISTS `jamindar_book` (
  `jamindar_id` int(11) NOT NULL,
  `book_no` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jamindar_book`
--

INSERT INTO `jamindar_book` (`jamindar_id`, `book_no`, `member_id`) VALUES
(1, 161, 1),
(2, 136, 2),
(3, 299, 3),
(4, 294, 4),
(5, 298, 5),
(6, 306, 6),
(7, 288, 7),
(8, 305, 8),
(9, 165, 9),
(10, 279, 10),
(11, 240, 11),
(12, 137, 12),
(13, 213, 13),
(14, 198, 14),
(15, 196, 15),
(16, 178, 16),
(17, 217, 17),
(18, 247, 18),
(19, 220, 19),
(20, 249, 20),
(21, 241, 21),
(22, 237, 22),
(23, 180, 23),
(24, 229, 24),
(25, 248, 25),
(26, 201, 26),
(27, 258, 27),
(28, 238, 28),
(29, 216, 29),
(30, 218, 30),
(31, 300, 31),
(32, 296, 32),
(33, 297, 33),
(34, 292, 34),
(35, 263, 35),
(36, 262, 36),
(37, 254, 37),
(38, 260, 38),
(39, 211, 39),
(40, 195, 40),
(41, 167, 41),
(42, 252, 42),
(43, 206, 43),
(44, 264, 44),
(45, 233, 45),
(46, 153, 46),
(47, 189, 47),
(48, 234, 48),
(49, 203, 49),
(50, 231, 50),
(51, 285, 51),
(52, 239, 52),
(53, 173, 53),
(54, 222, 54),
(55, 147, 55),
(56, 200, 56),
(57, 210, 57),
(58, 242, 58),
(59, 223, 59),
(60, 267, 60),
(102, 179, 122);

-- --------------------------------------------------------

--
-- Table structure for table `loan_configurations`
--

DROP TABLE IF EXISTS `loan_configurations`;
CREATE TABLE IF NOT EXISTS `loan_configurations` (
  `id` int(11) NOT NULL DEFAULT '1',
  `loan_initial_diposits` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `loan_percentage` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `loan_service_charge` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `loan_configurations`
--

INSERT INTO `loan_configurations` (`id`, `loan_initial_diposits`, `loan_percentage`, `loan_service_charge`) VALUES
(1, '5000', '4.333333', '2');

-- --------------------------------------------------------

--
-- Table structure for table `loan_table`
--

DROP TABLE IF EXISTS `loan_table`;
CREATE TABLE IF NOT EXISTS `loan_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jamindar_id` int(25) DEFAULT NULL,
  `member_id` int(25) NOT NULL,
  `book_id` int(25) NOT NULL,
  `loan_amount` int(25) NOT NULL,
  `loan_interest` double NOT NULL,
  `loan_period` int(25) NOT NULL,
  `loan_type` varchar(25) NOT NULL,
  `loan_total` int(25) NOT NULL,
  `loan_serverce_charge` double NOT NULL,
  `service_amount` int(25) NOT NULL,
  `grand_total` int(25) NOT NULL,
  `book_cost` double NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `loan_date` date NOT NULL,
  `finish_date` date DEFAULT NULL,
  `tstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `special_key` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_table`
--

INSERT INTO `loan_table` (`id`, `jamindar_id`, `member_id`, `book_id`, `loan_amount`, `loan_interest`, `loan_period`, `loan_type`, `loan_total`, `loan_serverce_charge`, `service_amount`, `grand_total`, `book_cost`, `active`, `loan_date`, `finish_date`, `tstamp`, `special_key`) VALUES
(1, 1, 1, 161, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2019-03-18', NULL, '2019-05-10 01:31:59', '35201a7dbdd88dd14c3653be233f80b4'),
(2, 2, 2, 136, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-02-20', NULL, '2019-05-10 01:35:34', 'e5954430ea0d946286343a0181b5f031'),
(3, 3, 3, 299, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2019-02-17', NULL, '2019-05-10 01:38:40', '07fcd6214d4ee2f18d20fd346284df65'),
(4, 4, 4, 294, 50000, 4.33333, 6, 'Daily', 63000, 2, 1000, 64050, 50, 1, '2019-02-05', NULL, '2019-05-10 01:41:16', 'b3f9dcf01e61631bfdae8c18c0dabb36'),
(5, 5, 5, 298, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2019-02-17', NULL, '2019-05-10 01:47:47', '518f6c277936de0b026bab66700f3415'),
(6, 6, 6, 306, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2019-03-06', NULL, '2019-05-10 01:50:09', 'b6db6ee9051292601c6e379f21a1fb88'),
(7, 7, 7, 288, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2019-02-26', NULL, '2019-05-10 01:52:30', 'bc9e1bfc838dd055775ae4a006f9bb1e'),
(8, 8, 8, 305, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2019-02-26', NULL, '2019-05-10 01:55:11', 'bf7eb5f6139b015c4d838bf2b1be570c'),
(9, 9, 9, 165, 5000, 4.33333, 6, 'Daily', 6300, 2, 100, 6450, 50, 1, '2019-11-28', NULL, '2019-05-10 01:59:33', '7f046e76f27c674567fb39b5f16ec088'),
(10, 10, 10, 279, 40000, 4.33333, 6, 'Daily', 50400, 2, 800, 51250, 50, 1, '2019-03-22', NULL, '2019-05-10 02:02:41', '958099edcf268d66fad7e2bc117b1851'),
(11, 11, 11, 240, 15000, 4.33333, 6, 'Daily', 18900, 2, 300, 19250, 50, 1, '2018-12-13', NULL, '2019-05-10 00:57:02', '4c491bc64c5f35d9e1864fb6acaac154'),
(12, 12, 12, 137, 30000, 4.33333, 6, 'Daily', 37800, 2, 600, 38450, 50, 1, '2018-02-19', NULL, '2019-05-10 00:59:09', 'e89983aec79bd1febc5df248e80b2990'),
(13, 13, 13, 213, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-11-15', NULL, '2019-05-29 09:14:27', '148a920801a44211bf0ac71bb3ae2437'),
(14, 14, 14, 198, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-10-15', NULL, '2019-05-29 09:18:53', 'f182d433329b0c211ac7c44b7d74032c'),
(15, 15, 15, 196, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-11-15', NULL, '2019-05-29 09:21:31', 'b7d2ed361d9b4121b8c77eb51a5bdf67'),
(16, 16, 16, 178, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-11-18', NULL, '2019-05-29 09:23:55', '7836ee3d44f534542b458f763e1f4192'),
(17, 17, 17, 217, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-11-20', NULL, '2019-05-29 09:27:24', 'bef93efa6dd32ff7732124298de44e5f'),
(18, 18, 18, 247, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-12-09', NULL, '2019-05-29 09:30:17', 'e6631398a2fee30c11a40dbca522049d'),
(19, 19, 19, 220, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-11-22', NULL, '2019-05-29 09:32:51', '76a0e86ae176f7417370139defc99626'),
(20, 20, 20, 249, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-12-09', NULL, '2019-05-29 09:35:17', 'fe279a081bd103df2f73958850b1ee90'),
(21, 21, 21, 241, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-12-02', NULL, '2019-05-29 09:39:12', '14c110e2bcba9ce1d7e0c4af53b850d8'),
(22, 22, 22, 237, 10000, 4.33333, 6, 'Daily', 12600, 2, 200, 12850, 50, 1, '2018-12-02', NULL, '2019-05-29 09:42:38', '46e39ca50345ce864b403a700b973961'),
(23, 23, 23, 180, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-11-19', NULL, '2019-05-29 09:44:18', 'ab7cf8253d3be4fa5931f681241ae65d'),
(24, 24, 24, 229, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-11-25', NULL, '2019-05-29 09:47:10', '52fec81bec21d85e0fd5271f6f53583e'),
(25, 25, 25, 248, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-12-23', NULL, '2019-05-29 09:49:23', '7a399e99efa69acbea876f216f21e4f4'),
(26, 26, 26, 201, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-11-06', NULL, '2019-05-29 09:50:44', '0efdfaad7f2d1517a8ac50fd6a304833'),
(27, 27, 27, 258, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-12-16', NULL, '2019-06-02 09:14:10', 'e25437c235d0b4fa8c5e184661b7250d'),
(28, 28, 28, 238, 20000, 4.33333, 6, 'Weekly', 25200, 2, 400, 25650, 50, 1, '2018-11-26', NULL, '2019-06-02 09:18:32', '6a4c20b739f196020e7cfab14539b146'),
(29, 29, 29, 216, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-11-15', NULL, '2019-06-04 03:29:06', 'faba4520e02ab39eb4da1442346a4ae4'),
(30, 30, 30, 218, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-11-18', NULL, '2019-06-04 03:30:49', '9342151a0a87bb71fd79b20f79bfa926'),
(31, 31, 31, 300, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2019-02-17', NULL, '2019-06-04 03:33:10', 'b8d524de11a8859ab8fae1c92501c535'),
(32, 32, 32, 296, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2019-02-17', NULL, '2019-06-04 03:34:42', '57adf34d9e15e814d63a93b50012b8d9'),
(33, 33, 33, 297, 10000, 4.33333, 6, 'Daily', 12600, 2, 200, 12850, 50, 1, '2019-02-17', NULL, '2019-06-04 03:36:51', 'd400117be1b79878ccfa8041dc623237'),
(34, 34, 34, 292, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2019-02-05', NULL, '2019-06-04 03:38:43', 'fd7729c9c41d27544018a8c2e3005627'),
(35, 35, 35, 263, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-12-23', NULL, '2019-06-04 03:40:31', '92556059108f20f290332fee1feac836'),
(36, 36, 36, 262, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2011-12-20', NULL, '2019-06-04 03:42:15', 'f526575a30993ee1a7595c636e8da301'),
(37, 37, 37, 254, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-12-16', NULL, '2019-06-04 03:44:10', '9332fa0f462750d2bed60ed8e76b039a'),
(38, 38, 38, 260, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-12-20', NULL, '2019-06-04 03:46:51', '69e313654fbada9f13478a684efd9969'),
(39, 39, 39, 211, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-11-17', NULL, '2019-06-04 03:49:47', 'ada648a17cc19443149d868b285ebd81'),
(40, 40, 40, 195, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-10-27', NULL, '2019-06-04 03:53:32', '5ad8bdb56b9bb083d5a9830bec5f88bc'),
(41, 41, 41, 167, 40000, 4.33333, 6, 'Daily', 50400, 2, 800, 51250, 50, 1, '2018-12-02', NULL, '2019-06-04 03:56:32', 'f40a13889392d575064ee1f713faee69'),
(42, 42, 42, 252, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-12-13', NULL, '2019-06-04 03:59:57', '4f5e73df50402e2e92b8d3148586a2db'),
(43, 43, 43, 206, 15000, 4.33333, 6, 'Daily', 18900, 2, 300, 19250, 50, 1, '2018-11-05', NULL, '2019-06-04 04:02:23', '29f07e4a6add34d91401249c5912211c'),
(44, 44, 44, 264, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-12-20', NULL, '2019-06-04 04:05:25', '45d5838e0d53f3a78186d44be18240be'),
(45, 45, 45, 233, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-12-02', NULL, '2019-06-04 04:09:19', 'c364b39859c1921b46de81896e35de2c'),
(46, 46, 46, 153, 50000, 4.33333, 6, 'Daily', 63000, 2, 1000, 64050, 50, 1, '2016-10-10', NULL, '2019-06-04 04:11:34', '691e73562372f4cf48280fdf5ca834ce'),
(47, 47, 47, 189, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-10-04', NULL, '2019-06-04 04:20:05', '49366fce24bbe3861f686df49855ec48'),
(48, 48, 48, 234, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-12-02', NULL, '2019-06-04 04:22:21', 'c38b3cb46042d72024d52e480dd5cfe8'),
(49, 49, 49, 203, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-10-31', NULL, '2019-06-04 04:24:16', '6a23a1f3898f57200205f000dcbd51c1'),
(50, 50, 50, 231, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-11-22', NULL, '2019-06-04 04:26:41', '80eb280659a86740e88dc43d57c5c309'),
(51, 51, 51, 285, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2019-02-05', NULL, '2019-06-04 04:31:24', 'fa0e32bbf719cd93b8504afc60995d3e'),
(52, 52, 52, 239, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2019-02-05', NULL, '2019-06-04 04:33:18', 'f2fa3a8c559d63a6017236822469db47'),
(53, 53, 53, 173, 100000, 4.33333, 6, 'Daily', 126000, 2, 2000, 128050, 50, 1, '2018-11-19', NULL, '2019-06-04 04:36:13', '3bb7f618809045678fc2c94ffad00de5'),
(54, 54, 54, 222, 15000, 4.33333, 6, 'Daily', 18900, 2, 300, 19250, 50, 1, '2018-11-18', NULL, '2019-06-04 04:42:18', 'a332bb5ef4d110ea471c21e5e25bb21f'),
(55, 55, 55, 147, 63000, 4.33333, 6, 'Daily', 79380, 2, 1260, 80690, 50, 1, '2019-04-10', NULL, '2019-06-04 04:44:30', '68935c6e325841bf6647de9c340fb538'),
(56, 56, 56, 200, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2019-02-26', NULL, '2019-06-04 04:48:08', 'a5f0791cd02043e373da73fe8352b819'),
(57, 57, 57, 210, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-11-15', NULL, '2019-06-04 04:49:49', 'eba5edb623c16ec9416eaf09c467a9fa'),
(58, 58, 58, 242, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-12-09', NULL, '2019-06-04 04:52:27', '28841a131f6e618a7e01849abc043c8c'),
(59, 59, 59, 223, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-11-20', NULL, '2019-06-04 04:56:37', '5b99461482b5e0e2424e927e58d37e28'),
(60, 60, 60, 267, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2018-12-23', NULL, '2019-06-04 04:59:15', '36a8ef3747d8c5badab2e427a39c4b4d'),
(61, 102, 122, 179, 20000, 4.33333, 6, 'Daily', 25200, 2, 400, 25650, 50, 1, '2020-04-01', NULL, '2020-04-01 18:59:10', 'ae17b8084b399c700de3afb55330919b');

-- --------------------------------------------------------

--
-- Table structure for table `member_info`
--

DROP TABLE IF EXISTS `member_info`;
CREATE TABLE IF NOT EXISTS `member_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `father_name` varchar(25) DEFAULT NULL,
  `husband_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(25) NOT NULL,
  `profession` varchar(25) NOT NULL,
  `nid_type` varchar(255) DEFAULT NULL,
  `nid` varchar(25) NOT NULL,
  `religion` varchar(25) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `nationality` varchar(25) NOT NULL,
  `marital_status` varchar(25) NOT NULL,
  `b_home` varchar(25) DEFAULT NULL,
  `b_vill` varchar(30) NOT NULL,
  `b_post` varchar(30) NOT NULL,
  `b_thana` varchar(30) NOT NULL,
  `b_upazila` varchar(30) NOT NULL,
  `b_zila` varchar(30) NOT NULL,
  `s_vill` varchar(30) NOT NULL,
  `s_post` varchar(30) NOT NULL,
  `s_thana` varchar(30) NOT NULL,
  `s_upazila` varchar(30) NOT NULL,
  `s_zila` varchar(30) NOT NULL,
  `admission_date` date NOT NULL,
  `special_key` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_info`
--

INSERT INTO `member_info` (`id`, `name`, `father_name`, `husband_name`, `mother_name`, `profession`, `nid_type`, `nid`, `religion`, `mobile`, `nationality`, `marital_status`, `b_home`, `b_vill`, `b_post`, `b_thana`, `b_upazila`, `b_zila`, `s_vill`, `s_post`, `s_thana`, `s_upazila`, `s_zila`, `admission_date`, `special_key`, `gender`) VALUES
(1, 'Md. Kolimuddin', NULL, 'Ainul Hawk', 'Mst. Sajeda Begum', 'Business', 'Select One', '12345678912345678', 'Islam', '01845-154-224', 'Bangladeshi', 'Married', 'Own', 'Goshbag', 'Zirabo', 'Ashulia', 'Savar', 'Dhaka', 'Goshbag', 'Zirabo', 'Ashulia', 'Savar', 'Dhaka', '2018-03-08', '5dca6c6f27abb80fdec74823781ad402', 'Female'),
(2, 'Ruhul Amin Polas', 'Anowar Hossen (D)', NULL, '', '', NULL, '', 'Islam', '01771-941-932', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-20', '266134f494dddb2363ca23885369d8d9', 'Male'),
(3, 'Md. Swapon Molla', 'Md. Alif Uddin', NULL, '', '', NULL, '', 'Islam', '01960-545-116', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2019-02-17', 'f0435c45037305d77f11d51ee0e5b438', 'Male'),
(4, 'S. M. Eunus Ali', '', NULL, '', '', NULL, '', 'Islam', '01841-783-340', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2019-02-05', '48d81dedc8f81a36b927bd1d00be129c', 'Male'),
(5, 'Abi Abdullah', '', NULL, '', '', NULL, '', 'Islam', '01923-672-516', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2019-02-17', 'd597a66f0090a125e69146747bf48e7c', 'Male'),
(6, 'Md. Ashraf Shardar', '', NULL, '', '', NULL, '', 'Islam', '01995-162-864', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2019-03-06', 'fb43b38ad6de520bd5926d8e924774bf', 'Male'),
(7, 'Md. Sahajahan Ali', 'Amzad Hossen (D)', NULL, 'Majeda Monguri', 'Business', NULL, '', 'Islam', '01646-998-468', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-26', '53460bdb65b31dc198ce649ee124578c', 'Male'),
(8, 'Md. Roshid Mia', 'Md. Madbar Uddin', NULL, 'Suranjana (D)', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2019-02-26', 'd56bfd02569a3532fdda63548673b939', 'Male'),
(9, 'Rupok Mondol', NULL, '', '', '', 'Select One', '', 'Islam', '01735-626-963', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-03-15', '16ba03bb44e9f0bfbacaf15453de3c0b', 'Male'),
(10, 'Mst. Moyna Begum', '', NULL, '', '', NULL, '', 'Islam', '01784-833-345', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2019-03-22', '24e4a616d4f5898de49a70e5162576fe', 'Male'),
(11, 'Enamul', '', NULL, '', '', NULL, '', 'Islam', '01731-529-689', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-12-13', '203a890d2dc1b016870f904696390210', 'Male'),
(12, 'Masud Sarkar', '', NULL, '', '', NULL, '', 'Islam', '01756-157-874', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-19', '35befb9baa7ae2fd034c2961cf61db79', 'Male'),
(13, 'Md. Naim Mia', 'Md. Hasen Ali', NULL, 'Mst. Minara Begum', '', NULL, '', 'Islam', '01994-773-200', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-11-15', '2d57efea0d7e8b5f8e3b9b26f1642e3f', 'Male'),
(14, 'Md. Eunus Ali', 'Anowar Hossen (D)', NULL, 'Lal Banu', '', NULL, '', 'Islam', '01950-915-602', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-10-15', '681f5398057bb04e4648bfd92d456924', 'Male'),
(15, 'Sir Rupok Candra', 'Sri Asutos Candra', NULL, 'Usha Rani', '', NULL, '', 'Hindu', '01725-051-020', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-11-15', 'a227c58576132b39414e56cd59c4efa7', 'Male'),
(16, 'Abdul Rajjak', '', NULL, '', '', NULL, '', 'Islam', '01851-298-064', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2017-11-18', 'fd50d7d82c93b76d5e581751147957f1', 'Male'),
(17, 'Md. Selim Hosen', 'Abul Kalam', NULL, 'Khodeja Begum', 'Business', NULL, '', 'Islam', '01715-677-692', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-11-20', '857bdd3b9c350a32fa42b125625f3a38', 'Male'),
(18, 'Md. Dalim Mia', '', NULL, '', '', NULL, '', 'Islam', '01724-585-304', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-11-09', '6f86af9a9445d40353677f0e6f133968', 'Male'),
(19, 'Md. Muntaj', '', NULL, '', '', NULL, '', 'Islam', '01950-805-670', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-11-22', '265d86bf4378373be82c4b3cb79626d7', 'Male'),
(20, 'Mst. Sima', '', NULL, '', '', NULL, '', 'Islam', '01955-096-315', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-12-09', '67c7f5c1dbb12e749a65ef00fb954ae0', 'Female'),
(21, 'Md. Johirul Islam', '', NULL, '', '', NULL, '', 'Islam', '01935-353-602', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-12-02', '7b902c876b8226728fe2a6bbbb33ddb4', 'Male'),
(22, 'Anowar Hossen', '', NULL, '', '', NULL, '', 'Islam', '01707-740-135', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-12-02', 'ad5cccd0c664acb4d7ec3f6fd448cdc8', 'Male'),
(23, 'Minhaj', '', NULL, '', '', NULL, '', 'Islam', '01989-686-915', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-11-19', 'd507c42c631315ee5beb5fc87d6cde1a', 'Male'),
(24, 'Mst. Fatema', '', NULL, '', '', NULL, '', 'Islam', '01932-290-485', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-11-25', '536902d024b137083e839c85ee23c6e0', 'Female'),
(25, 'Md. Abul Kalam', '', NULL, '', '', NULL, '', 'Islam', '01992-536-098', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-12-23', '9361653902c28a1fa08f23576dc0daf5', 'Male'),
(26, 'Md. Aminul Islam', '', NULL, '', '', NULL, '', 'Islam', '01755-759-994', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2015-11-06', '6916040f093574fe043cbfdb917fe70a', 'Male'),
(27, 'Md. Lablu Islam', '', NULL, '', '', NULL, '', 'Islam', '01784-125-046', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-12-16', '38fd056cb3361bd7cc67d7dbf9855a74', 'Male'),
(28, 'Md. Harun Roshid', '', NULL, '', '', NULL, '', 'Islam', '01756-202-606', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-11-26', '844898ef1418343655bd2ac6e1c944cd', 'Male'),
(29, 'Md. Ershad Ali', '', NULL, '', '', NULL, '', 'Islam', '01910-519-043', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-11-15', '97fb178442a892d531ed8fcc25eb99c2', 'Male'),
(30, 'Nasima Begum', '', NULL, '', '', NULL, '', 'Islam', '01721-465-903', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2017-11-18', '8664eb2c575d286151b244eab5102560', 'Female'),
(31, 'Md. Jamal Uddin', '', NULL, '', '', NULL, '', 'Islam', '01832-726-891', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2019-02-17', '5243169f9be4dd2a0c2098ea3e1304a4', 'Male'),
(32, 'Md. Akkas', '', NULL, '', '', NULL, '', 'Islam', '01936-318-299', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2017-02-17', '002b22815f111e7807a71e2453e72ac0', 'Male'),
(33, 'Md. Edul Mia', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2019-02-17', '31684c96ff90824face4c94761f81482', 'Male'),
(34, 'Anowar Hossen', '', NULL, '', '', NULL, '', 'Islam', '01794-719-124', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-05', '68d41d2c1b8463203648140d0e541cc7', 'Male'),
(35, 'Md. Lal Mia', '', NULL, '', '', NULL, '', 'Islam', '01926-545-536', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2015-12-23', '11e852de300397bff5a2fc7c36c17129', 'Male'),
(36, 'Md. Mominul Islam', '', NULL, '', '', NULL, '', 'Islam', '01916-124-089', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-12-17', 'e7081d55b6e9794528d7ffc00d622efa', 'Male'),
(37, 'Md. Abdur Roshid', '', NULL, '', '', NULL, '', 'Islam', '01307-163-502', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-12-16', '95d84c4030e8cb9a1ffc1a506b681c62', 'Male'),
(38, 'Kalam Mia', '', NULL, '', '', NULL, '', 'Islam', '01940-180-496', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-12-20', '17941d687c51c53dcb48f17d9a01bdf4', 'Male'),
(39, 'Mst. Yeasmin', '', NULL, '', '', NULL, '', 'Islam', '01968-955-490', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-11-17', '94e81ef10c511a251c40bfc316c4bb71', 'Male'),
(40, 'Md. Nijam', '', NULL, '', '', NULL, '', 'Islam', '01927-445-627', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2017-10-26', '96986249abe55dd8642f8dc7b9353ac4', 'Male'),
(41, 'Sri Dipok Condro', NULL, '', '', '', 'Select One', '', 'Islam', '01771-647-915', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-03-20', 'e30f9440b578b7c10addac1035c96dab', 'Male'),
(42, 'Md. Ajijar Rohoman', '', NULL, '', '', NULL, '', 'Islam', '01731-295-889', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-12-13', 'dcf042558fee2708adabbc37a8da76e1', 'Male'),
(43, 'Abdul Hai', '', NULL, '', '', NULL, '', 'Islam', '01909-264-544', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-11-05', '9b0a896431bf7c01d5c8a8ad83d9f3e8', 'Male'),
(44, 'Md. Abdul Latif', '', NULL, '', '', NULL, '', 'Islam', '01953-443-405', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-12-20', '873dd5a0de206c97ece4344779edd026', 'Male'),
(45, 'Md. Ekramul Hawk', '', NULL, '', '', NULL, '', 'Islam', '01727-958-292', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-12-02', 'ebbe214eff1266604e15850d78ba14ae', 'Male'),
(46, 'Rohana Begum', NULL, '', '', '', 'Select One', '', 'Islam', '01821-188-531', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-20', 'e86216a182e18e35fd13ba91b3259eb7', 'Female'),
(47, 'Md. Nur Islam', '', NULL, '', '', NULL, '', 'Islam', '01749-120-671', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2015-10-04', 'e4d3b47607204172dea651390a0df459', 'Male'),
(48, 'Md. Foridul', '', NULL, '', '', NULL, '', 'Islam', '01740-079-306', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-12-02', '269364fb5d4ccb5c3cbb032cb23e34df', 'Male'),
(49, 'Taijul Islam', '', NULL, '', '', NULL, '', 'Islam', '01760-760-765', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-10-31', '715f46f106c94e41343283d727040d6c', 'Male'),
(50, 'Md. Sohel', '', NULL, '', '', NULL, '', 'Islam', '01712-797-741', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2016-11-22', 'e01a46d7f581d46bfba4d3fddce0f934', 'Male'),
(51, 'Md. Robiul Islam', '', NULL, '', '', NULL, '', 'Islam', '01987-018-951', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2019-02-05', 'd6613239b4f0be24ea53eac4eb0f8386', 'Male'),
(52, 'Md. Soleman', '', NULL, '', '', NULL, '', 'Islam', '01832-841-252', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2019-02-05', 'd92d17f7e40d75962c3fd5463fdfb687', 'Male'),
(53, 'MD. Sofiul Islam', '', NULL, '', '', NULL, '', 'Islam', '01674-660-772', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-11-19', 'acee9e51b347fd9b679f58a44a742786', 'Male'),
(54, 'MD. Owajed', '', NULL, '', '', NULL, '', 'Islam', '01984-199-517', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2017-11-18', 'ed9992409a770909c811ce2ae68e4799', 'Male'),
(55, 'Md. Delowar', '', NULL, '', '', NULL, '', 'Islam', '01716-860-117', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2019-04-10', '2b8b7931bc7093847ceaa788c5163a47', 'Male'),
(56, 'Md. Ibrahim Shekh', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2019-02-26', 'c9d7d3f2ae35f9c80fabd8e6b586625d', 'Male'),
(57, 'Md. Atab Ali', '', NULL, '', '', NULL, '', 'Islam', '01981-907-735', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-11-15', '0c7550afa34cbecd9cf9ef04700e5990', 'Male'),
(58, 'Md. Rony Mia', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-12-09', '3e8224c8b821b2d81a65de65566a0eea', 'Male'),
(59, 'Md. Renu Mia', '', NULL, '', '', NULL, '', 'Islam', '01794-046-872', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-11-20', '4f5a1684a590e060fd17d2ee565b1f69', 'Male'),
(60, 'Md. Jakir', '', NULL, '', '', NULL, '', 'Islam', '01768-550-876', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-12-23', '3b33e36f4e3b32bf732fae17aad62d63', 'Male'),
(61, 'MD. Ashikul Islam', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Unmarried', '', '', '', '', '', '', '', '', '', '', '', '2018-02-03', 'a8127934ffb06c7021a68fceedfe67e2', 'Male'),
(62, 'MD. Abdul Khalek', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-03', '1e6871790ed7b62caa8a68a5e5442285', 'Male'),
(63, 'MD. Biplob Hossain', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-03', '89d7ac3895f8bf7da0492236ef9e1e5c', 'Male'),
(64, 'Shuvas Chandra Shil', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-03', 'a9fc4c7b9b4528f19b0faece4519ecd0', 'Male'),
(65, 'MD. Mohafej Ali (Ripon)', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2016-02-03', 'a911420df618b3af14fb25234cddb470', 'Male'),
(66, 'Rezaul Karim', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-03', 'efc07b7ca35ddb18774830cd8a6a7a7c', 'Male'),
(67, 'MD. Ismail', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-03', '46fb631aa33232958564e5a6d263b23e', 'Male'),
(68, 'MD. Shahajuddin', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-03', '9d1f82f3623ec336d066341cda858e74', 'Male'),
(69, 'MD. Abdul Latif', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-03', 'cc80ddc579bbbd7df4d69174beb7a3a3', 'Male'),
(70, 'MD. Hanif Mia', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-03', 'ad1ff26478faeb0cebd2d4538a10b38d', 'Male'),
(71, 'MD. Nur Mohammad', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-04', '6d6cb831f3bbff795f639043677b47f5', 'Male'),
(72, 'MD. Mokhlesur Rohoman', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2016-02-04', '8eac319c3247e6bf895f3acba442a9be', 'Male'),
(73, 'Md. Mijanur Rohoman', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-04', '98011502416bfe11d242d94328f2734f', 'Male'),
(74, 'Md. Mojibar Rohoman', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2017-02-04', '2eb02b515205556da09a8c2899005b69', 'Male'),
(75, 'MD. Joynal', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-04', '5cdc3c4135547efac26d0957c67729f3', 'Male'),
(76, 'Md. Babul', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-09', '80d51f95072e364a213a46de65e05623', 'Male'),
(77, 'Md. Nur Mohammad', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-10', '6647d9592dffc8ede79d646661d6fe56', 'Male'),
(78, 'Md. Jalal Mia', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-13', 'e7a89666ba09b75169c6c584da8f7616', 'Male'),
(79, 'Md. Al-Amin', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-16', '981e7142c2d248691ccb8cd48225f487', 'Male'),
(80, 'MD. Shahidul Islam', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-16', '5648e115f2a9e9418b5eb009bc14a76e', 'Male'),
(81, 'MD. Almas', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-16', '33887f02e6b814b6d3ed9239b42a1577', 'Male'),
(82, 'MD. Ikramul Hawk', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-16', 'd0257dc6f4822a2f6c6cda7127657763', 'Male'),
(83, 'MD. Masud Rana', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-16', '6afd6be215d2ae753ce22f87c3e8809c', 'Male'),
(84, 'Md. Alamgir', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-16', 'c0ede14c5e0bad1e8d3183b5bc833ae9', 'Male'),
(85, 'MD. Sohel Rana', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-16', 'd6dde4adeb29a9183b33eeb032a7b395', 'Male'),
(86, 'MD. Helal Uddin', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-16', '6b9c816ca5ef7dd752effb79d3aa9d24', 'Male'),
(87, 'Sri Roton', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-17', 'eb861eb54639f303742689275e74bd56', 'Male'),
(88, 'MD. Sohorab', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-17', '950e21b1217d37e39168fbcd2d0184f8', 'Male'),
(89, 'MD. Ariful Islam', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-17', 'a996167195f0948032b168fb43252642', 'Male'),
(90, 'MD. Farukh Hossein', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-17', 'b93df02dfbbdcecc9e0843758a50cd13', 'Male'),
(91, 'MD. Sumon Talukdar', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-17', '03b645d67d417b07440cb078b62bc786', 'Male'),
(92, 'Md. Khokon Sorkan', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-17', 'e4087fe4d6fd478c59db54948a359d64', 'Male'),
(93, 'MD. Sohel Rana', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-17', 'e35837b820293cb936c4f55e7f2d53e3', 'Male'),
(94, 'MD. Ajijul Islam', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-17', '782b3b2fbb1dc393d227aaf314ea931b', 'Male'),
(95, 'MD. Jahidul Islam', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-17', 'ad9ddf2ea83d2f90cd09364d6021963f', 'Male'),
(96, 'MD. Ibrahim Hossen Mamun', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-17', 'a542c5d9ffb0666de770589313ac0404', 'Male'),
(97, 'Ashraful', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-17', '90ffcd5ecc30e82719b5e57f419a0edb', 'Male'),
(98, 'Eusuf', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-18', '7a689b05e3cd198eb551ee557759bc27', 'Male'),
(99, 'MD. Abdul Mannan', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-20', '64377dc1d276567673e69a4f4c22361d', 'Male'),
(100, 'MD. Abdul Ajij', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-20', 'e2278f53857ef35bcdb82a44f1a90615', 'Male'),
(101, 'Md. Jahangir Alam', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-20', '204bba10e28186e646ae15ddf130c7d4', 'Male'),
(102, 'Mijanur Rohaman', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-20', '092e4e6135f9ed203577d9d481a46331', 'Male'),
(103, 'Mijanur Rohaman', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-21', '4b56c6215233d559311e9b1a5cbab1f1', 'Male'),
(104, 'Mst. Momtaj Begum', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-27', '01088c55ac9bf17642b23de04ba7d87d', 'Male'),
(105, 'MD. Alamgir Hossen', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-27', '5d8cac1671e93dcbde7635051dbdf3bb', 'Male'),
(106, 'MD. Milon Hossen', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-02-27', 'dac305d4f0cf56bc85f8210fb26d73f3', 'Male'),
(107, 'MD. Harun', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-03-05', 'cd8beff94313665ab78601ad0fc8740b', 'Male'),
(108, 'MD> Johirul Islam', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-03-05', '45feeb23310717137f6bb3d8949b9138', 'Male'),
(109, 'MD. Masud Alam', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-03-09', 'a11c2ff7231a468cdea0019dd3d9408b', 'Male'),
(110, 'MD. Kashem', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-03-09', '85b76143c6f78c3f2b186ba7c5cd5517', 'Male'),
(111, 'MD. Faruk Hossen', NULL, '', '', '', 'Select One', '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-03-10', 'c5a6c628da159a55b4036459f290960b', 'Male'),
(112, 'MD. Ajijul Hawk', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-03-15', '89c3e1809f7093c5388780f0618a1a31', 'Male'),
(113, 'MD. Sorfot Ali', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-03-23', '2d4b385429ec81a8512e64c1ac85fda2', 'Male'),
(114, 'MD. Khademul Islam', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-03-31', 'bb54b6f7a960bf84578e44d9ac7f4572', 'Male'),
(115, 'Shanu Shekh', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-03-31', '23498f787040b01616e9db75062e109d', 'Male'),
(116, 'Noshir Deowan', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-04-06', 'cec4c90e54745de34c6b548173648343', 'Male'),
(117, 'Mizanur', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-04-06', 'd99fce9f84abd9004aa005b33508476f', 'Male'),
(118, 'Md. Nazmul Hassan', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-04-10', '117846e1e5c4c58fc9df0e9502bc8fc5', 'Male'),
(119, 'Korimul', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-04-11', '7ba75c85b2ab0682fc48c0540ff88f7f', 'Male'),
(120, 'Nasir', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-04-12', 'f4cae51e1f3f3d7a0eb845f1f228cdd7', 'Male'),
(121, 'Abdur Rahim', NULL, '', '', '', 'National ID', '12345678912345678', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-04-20', '3b3acc88a1aa8f24d93f71e1cfe69af1', 'Male'),
(122, 'MD. Hasan', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-04-30', '770de7e07650af44f8a6cc22c8f43426', 'Male'),
(123, 'Mst. Ayesa Afrin', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-07-10', '4d765d9bca564c872a51484661f38a8f', 'Male'),
(124, 'MD. Farukh Hossen', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-07-13', 'c3d29e66dc2874f50f3a5717090f5229', 'Male'),
(125, 'Masuda Begum', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-08-07', '8ea3063169737ad343a01a8559ec0556', 'Male'),
(126, 'MD. Hanif', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-08-15', '513d07f8cacadb4e946a272fe6899e56', 'Male'),
(127, 'AL-Amin', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-08-09', '4a6c90c7c4ef3964d38c4ce82f96c7c6', 'Male'),
(128, 'Ebadul', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-09-09', '65f033d48e52455f35694ea53a0721cf', 'Male'),
(129, 'MST. Shamima Aktar', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-09-11', '2bf0890ac33d1fe2036983e99b0f6720', 'Male'),
(130, 'MD. Sobuj Islam', '', NULL, '', '', NULL, '', 'Islam', '', 'Bangladeshi', 'Married', '', '', '', '', '', '', '', '', '', '', '', '2018-10-10', 'b098cceda4878667f5b7f81f2a31d410', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `software_configuration`
--

DROP TABLE IF EXISTS `software_configuration`;
CREATE TABLE IF NOT EXISTS `software_configuration` (
  `id` int(11) NOT NULL DEFAULT '1',
  `ngo_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ngo_mobile` varchar(25) DEFAULT NULL,
  `ngo_address` text,
  `ngo_code` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `software_configuration`
--

INSERT INTO `software_configuration` (`id`, `ngo_name`, `ngo_mobile`, `ngo_address`, `ngo_code`) VALUES
(1, 'Mila Babsoy Somiti', '018454000000', 'Gbad, Zbor, Dhaka', 'CD-5246');

-- --------------------------------------------------------

--
-- Table structure for table `user_image`
--

DROP TABLE IF EXISTS `user_image`;
CREATE TABLE IF NOT EXISTS `user_image` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `user_id` int(25) NOT NULL,
  `image_name` varchar(25) NOT NULL,
  `image_url` text NOT NULL,
  `image_upload_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

DROP TABLE IF EXISTS `user_tbl`;
CREATE TABLE IF NOT EXISTS `user_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `pow` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
