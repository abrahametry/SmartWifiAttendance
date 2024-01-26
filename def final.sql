-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 02:44 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(50) NOT NULL,
  `std_id` varchar(11) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `ssid` varchar(100) NOT NULL,
  `macAddress` varchar(191) NOT NULL,
  `course` varchar(191) NOT NULL,
  `time_date` timestamp NULL DEFAULT NULL,
  `deviceMac` varchar(50) NOT NULL,
  `attend` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `std_id`, `name`, `ssid`, `macAddress`, `course`, `time_date`, `deviceMac`, `attend`) VALUES
(99, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', 'CS100', '2023-12-13 02:35:32', 'ClassRoom_B1-301', 'Pre'),
(113, '18193103008', 'ripon', 'Mi_10T_Pro', '7e:85:43:af:1d:28', 'CS100', '2023-12-13 02:40:32', 'ClassRoom_B1-301', 'Pre'),
(118, '18193103034', 'Trisha', 'Trisha', '36:c5:5b:21:1d:72', 'CS100', '2023-12-13 02:41:32', 'ClassRoom_B1-301', 'Pre'),
(119, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', 'CS100', '2023-12-14 02:38:32', 'ClassRoom_B1-301', 'Pre'),
(120, '18193103034', 'Trisha', 'Trisha', '36:c5:5b:21:1d:72', 'CS100', '2023-12-14 02:48:38', 'ClassRoom_B1-301', 'Pre'),
(121, '18193103008', 'ripon', 'Mi_10T_Pro', '7e:85:43:af:1d:28', 'CS100', '2023-12-14 02:42:32', 'ClassRoom_B1-301', 'Pre'),
(122, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', 'CS100', '2023-12-15 02:35:32', 'ClassRoom_B1-301', 'Pre'),
(123, '18193103008', 'ripon', 'Mi_10T_Pro', '7e:85:43:af:1d:28', 'CS100', '2023-12-15 02:40:32', 'ClassRoom_B1-301', 'Pre'),
(124, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', 'CS100', '2023-12-16 02:35:32', 'ClassRoom_B1-301', 'Pre'),
(125, '18193103008', 'ripon', 'Mi_10T_Pro', '7e:85:43:af:1d:28', 'CS100', '2023-12-16 02:40:32', 'ClassRoom_B1-301', 'Pre'),
(126, '18193103034', 'Trisha', 'Trisha', '36:c5:5b:21:1d:72', 'CS100', '2023-12-17 02:41:32', 'ClassRoom_B1-301', 'Pre'),
(127, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', 'CS100', '2023-12-17 02:35:32', 'ClassRoom_B1-301', 'Pre'),
(128, '18193103034', 'Trisha', 'Trisha', '36:c5:5b:21:1d:72', 'CS100', '2023-12-18 02:41:32', 'ClassRoom_B1-301', 'Pre'),
(129, '18193103008', 'ripon', 'Mi_10T_Pro', '7e:85:43:af:1d:28', 'CS100', '2023-12-18 02:40:32', 'ClassRoom_B1-301', 'Pre'),
(130, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', 'CS100', '0000-00-00 00:00:00', 'ClassRoom_B1-301', 'Pre'),
(131, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', 'CS100', '2023-12-19 02:35:32', 'ClassRoom_B1-301', 'Pre'),
(132, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', 'CS100', '2023-12-20 02:35:32', 'ClassRoom_B1-301', 'Pre'),
(133, '18193103007', 'meherab', 'POINT-1', '6a:7c:a3:90:0:af', 'CS100', '2023-12-13 02:35:32', 'ClassRoom_B1-301', 'Pre'),
(134, '18193103007', 'meherab', 'POINT-1', '6a:7c:a3:90:0:af', 'CS100', '2023-12-14 02:35:32', 'ClassRoom_B1-301', 'Pre'),
(135, '18193103007', 'meherab', 'POINT-1', '6a:7c:a3:90:0:af', 'CS100', '2023-12-17 02:35:32', 'ClassRoom_B1-301', 'Pre'),
(136, '18193103007', 'meherab', 'POINT-1', '6a:7c:a3:90:0:af', 'CS100', '2023-12-21 02:35:32', 'ClassRoom_B1-301', 'Pre');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `id` int(11) NOT NULL,
  `c_code` text NOT NULL,
  `scanner` text NOT NULL,
  `stTime` time NOT NULL,
  `endTime` time NOT NULL,
  `day` text NOT NULL,
  `intake` text NOT NULL,
  `sec` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`id`, `c_code`, `scanner`, `stTime`, `endTime`, `day`, `intake`, `sec`) VALUES
(28, 'CS200', 'ClassRoom_B1-301', '10:01:00', '11:30:00', 'Sunday', '42', '1'),
(30, 'CS220', 'ClassRoom_B1-301', '13:30:00', '15:00:00', 'Sunday', '42', '2'),
(32, 'CS300', 'ClassRoom_B1-301', '15:01:00', '16:30:00', 'Sunday', '42', '1'),
(37, 'CS220', 'ClassRoom_B1-301', '15:00:00', '16:30:00', 'Tuesday', '42', '2'),
(38, 'CS300', 'ClassRoom_B1-301', '10:00:00', '11:30:00', 'Monday', '42', '1'),
(39, 'CS300', 'ClassRoom_B1-301', '15:00:00', '17:00:00', 'Wednesday', '42', '1'),
(40, 'CS100', 'ClassRoom_B1-301', '08:00:00', '10:00:00', 'Sunday', '42', '1'),
(41, 'CS100', 'ClassRoom_B1-301', '08:00:00', '10:00:00', 'Monday', '42', '1'),
(42, 'CS100', 'ClassRoom_B1-301', '08:00:00', '10:00:00', 'Tuesday', '42', '1'),
(43, 'CS100', 'ClassRoom_B1-301', '08:00:00', '10:00:00', 'Wednesday', '42', '1'),
(44, 'CS100', 'ClassRoom_B1-301', '08:00:00', '01:00:00', 'Thursday', '42', '1');

-- --------------------------------------------------------

--
-- Table structure for table `scan`
--

CREATE TABLE `scan` (
  `id` int(20) NOT NULL,
  `ssid` varchar(20) NOT NULL,
  `mac` varchar(20) NOT NULL,
  `access_time` timestamp NULL DEFAULT current_timestamp(),
  `scanner` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scan`
--

INSERT INTO `scan` (`id`, `ssid`, `mac`, `access_time`, `scanner`) VALUES
(535, 'Redmi_8A', '76:63:36:df:d5:fb', '2023-12-13 20:06:32', 'ClassRoom_B1-301'),
(536, 'Faculty_Room_421', '9c:c9:eb:f8:f3:2d', '2023-12-13 21:01:37', 'ClassRoom_B1-301'),
(537, 'POINT-1', '6a:7c:a3:90:0:af', '2023-12-13 22:01:40', 'ClassRoom_B1-301'),
(538, 'PS_Office', 'b8:a3:86:61:56:9a', '2023-12-10 11:01:44', 'ClassRoom_B1-301'),
(539, 'BUBT_Computer_Lab', '58:c1:7a:d8:85:50', '2023-12-10 11:01:43', 'ClassRoom_B1-301'),
(540, 'BUBT_Computer_Lab-52', 'b4:a2:5c:56:7d:f0', '2023-12-10 11:01:44', 'ClassRoom_B1-301'),
(541, 'Devil_is_Back', '14:59:c0:ca:bb:9f', '2023-12-10 11:01:44', 'ClassRoom_B1-301'),
(542, 'Jarir_UMN', '18:a6:f7:c4:8d:bc', '2023-12-10 11:01:16', 'ClassRoom_B1-301'),
(543, 'Zubair', '64:ee:b7:c1:39:3b', '2023-12-10 11:01:45', 'ClassRoom_B1-301'),
(544, 'Magic', 'b4:f:3b:7a:1b:40', '2023-12-10 11:01:45', 'ClassRoom_B1-301'),
(545, 'CMRCC', '5c:a0:0:13:5b:a3', '2023-12-10 11:01:44', 'ClassRoom_B1-301'),
(546, 'Diya_5G', '14:4d:67:56:58:4', '2023-12-10 11:01:21', 'ClassRoom_B1-301'),
(547, 'Super_Home_SH4_A3_R4', '18:31:bf:1:4c:a8', '2023-12-10 11:01:18', 'ClassRoom_B1-301'),
(548, 'MIRZA', 'c4:e9:84:31:50:48', '2023-12-10 11:01:16', 'ClassRoom_B1-301'),
(549, 'Asib_Wifi', '4:95:e6:9b:4:28', '2023-12-10 11:01:17', 'ClassRoom_B1-301'),
(550, 'Sahar@wifi', '5c:a6:e6:19:2b:32', '2023-12-10 10:58:09', 'ClassRoom_B1-301'),
(551, 't.me/pac0pai', 'da:d:17:57:95:90', '2023-12-10 11:01:29', 'ClassRoom_B1-301'),
(552, 'Sandhita_', '98:de:d0:72:c4:34', '2023-12-10 11:00:59', 'ClassRoom_B1-301'),
(553, 'Ratan', 'c8:3a:35:1a:25:10', '2023-12-10 10:57:26', 'ClassRoom_B1-301'),
(554, 'Md._Ariful_Alam_Shoh', 'd8:d:17:47:95:90', '2023-12-10 11:01:17', 'ClassRoom_B1-301'),
(555, 'FUAD', '50:d4:f7:60:a1:54', '2023-12-10 10:53:39', 'ClassRoom_B1-301'),
(556, 'GHOST', 'c8:3a:35:58:c9:60', '2023-12-10 11:00:32', 'ClassRoom_B1-301'),
(557, 'Faculty_Room_321', '9c:c9:eb:f8:f1:5', '2023-12-10 11:01:45', 'ClassRoom_B1-301'),
(558, 'Omicron', '60:38:e0:79:c8:1e', '2023-12-10 10:59:13', 'ClassRoom_B1-301'),
(559, 'ELIAS', '4:95:e6:37:a4:0', '2023-12-10 11:01:44', 'ClassRoom_B1-301'),
(560, 'Sifat', '5c:62:8b:df:80:4', '2023-12-10 11:01:45', 'ClassRoom_B1-301'),
(561, 'Senjuti_Shahtab', '48:22:54:14:7c:9', '2023-12-10 10:59:36', 'ClassRoom_B1-301'),
(562, 'AYAN', '38:6b:1c:2a:62:fc', '2023-12-10 10:56:33', 'ClassRoom_B1-301'),
(563, 'vritinna', '60:32:b1:18:be:8b', '2023-12-10 11:01:17', 'ClassRoom_B1-301'),
(564, 'Tasrif', 'c8:3a:35:5d:cb:38', '2023-12-10 11:00:43', 'ClassRoom_B1-301'),
(565, 'Josna', 'e0:1c:fc:3d:ba:c4', '2023-12-10 11:00:59', 'ClassRoom_B1-301'),
(566, 'BUBT_Student_4th', 'b4:a2:5c:56:df:50', '2023-12-10 11:00:59', 'ClassRoom_B1-301'),
(567, 'I_care', '64:ee:b7:f0:5c:0', '2023-12-10 11:01:02', 'ClassRoom_B1-301'),
(568, 'Super_Home_SH4_A5R4', '4:92:26:c5:d5:8', '2023-12-10 11:01:28', 'ClassRoom_B1-301'),
(569, 'Faculty_Room_621', '9c:c9:eb:f8:f4:3e', '2023-12-10 11:01:27', 'ClassRoom_B1-301'),
(570, 'Zunairah', '70:4f:57:b4:15:ca', '2023-12-10 11:01:21', 'ClassRoom_B1-301'),
(571, 'FAIZA', 'd8:7:b6:b1:f1:3a', '2023-12-10 10:59:36', 'ClassRoom_B1-301'),
(572, 'NOBONI', '18:d6:c7:eb:94:be', '2023-12-10 10:56:59', 'ClassRoom_B1-301'),
(573, 'restricted_plus', '88:c3:97:ec:c6:3', '2023-12-10 11:01:17', 'ClassRoom_B1-301'),
(574, 'restricted', '14:eb:b6:8a:2b:d1', '2023-12-10 10:46:36', 'ClassRoom_B1-301'),
(575, 'Mamun', '50:eb:f6:62:ce:7c', '2023-12-10 10:46:36', 'ClassRoom_B1-301'),
(576, 'Faisal', '50:f:f5:73:75:10', '2023-12-10 11:01:21', 'ClassRoom_B1-301'),
(577, 'APON', 'f0:b4:d2:3e:20:e0', '2023-12-10 10:59:07', 'ClassRoom_B1-301'),
(578, 'LG', 'c:80:63:87:93:d8', '2023-12-10 11:01:18', 'ClassRoom_B1-301'),
(579, 'TP-LINK_9650', 'd4:6e:e:e6:96:50', '2023-12-10 11:01:29', 'ClassRoom_B1-301'),
(580, 'Mi_10T_Pro', '7e:85:43:af:1d:28', '2023-12-10 10:57:38', 'ClassRoom_B1-301'),
(581, 'adnan_wifi', '10:27:f5:af:b3:1a', '2023-12-10 11:01:28', 'ClassRoom_B1-301'),
(582, 'KHURSHID', '14:4d:67:30:47:f4', '2023-12-10 11:01:28', 'ClassRoom_B1-301'),
(583, 'Johirul', '98:da:c4:1:7d:ba', '2023-12-10 10:48:53', 'ClassRoom_B1-301'),
(584, 'Platinum', '5c:2:14:cb:fe:41', '2023-12-10 10:58:44', 'ClassRoom_B1-301'),
(585, 'Arif_Moon', '9e:a3:21:7a:39:eb', '2023-12-10 10:53:58', 'ClassRoom_B1-301'),
(586, 'realme_11_Pro _5G_IF', '62:20:b9:7b:82:2e', '2023-12-10 10:59:07', 'ClassRoom_B1-301'),
(587, 'realme_C53', 'fe:9a:4c:34:32:79', '2023-12-10 10:59:08', 'ClassRoom_B1-301'),
(588, 'Ebnul', '38:6b:1c:b3:bb:c2', '2023-12-10 11:00:45', 'ClassRoom_B1-301'),
(589, 'Z30_pro', '9a:84:dc:5:a6:9b', '2023-12-10 11:01:05', 'ClassRoom_B1-301');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `sid` varchar(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `ssid` varchar(100) NOT NULL,
  `macAddress` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `course` varchar(191) NOT NULL,
  `intake` text NOT NULL,
  `sec` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `sid`, `name`, `ssid`, `macAddress`, `phone`, `course`, `intake`, `sec`) VALUES
(0, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', '525892', 'CS100', '42', '1'),
(1, '18193103007', 'meherab', 'POINT-1', '6a:7c:a3:90:0:af', '7398432', 'CS100', '42', '1'),
(2, '18193103034', 'Trisha', 'Trisha', '36:c5:5b:21:1d:72', '852', 'CS100', '42', '1'),
(4, '18193103008', 'ripon', 'Mi_10T_Pro', '7e:85:43:af:1d:28', '7398432', 'CS100', '42', '1'),
(5, '131312', 'Sifat', 'Sifat', '5c:62:8b:df:80:4', '3452152541', 'CS100', '42', '1'),
(6, '2123123', 'Rifat', 'Faculty_Room_321', '9c:c9:eb:f8:f1:5', '01551024265', 'CS100', '42', '1'),
(7, '3131', 'Kia ak', 'ak', '28:1d:21:13:55:35', '01552541223', 'CS245', '42', '2'),
(8, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', '525892', 'ENG101', '42', '1'),
(9, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', '525892', 'CS300', '42', '2'),
(10, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', '525892', 'CS200', '42', '1'),
(11, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', '525892', 'CS220', '42', '2'),
(12, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', '525892', 'CS300', '42', '1'),
(13, '18193103034', 'Trisha', 'Trisha', '36:c5:5b:21:1d:72', '852', 'CS200', '42', '1'),
(14, '18193103034', 'Trisha', 'Trisha', '36:c5:5b:21:1d:72', '852', 'CS220', '42', '2'),
(15, '18193103034', 'Trisha', 'Trisha', '36:c5:5b:21:1d:72', '852', 'CS300', '42', '1'),
(16, '18193103008', 'ripon', 'Mi_10T_Pro', '7e:85:43:af:1d:28', '7398432', 'CS200', '42', '1'),
(17, '18193103008', 'ripon', 'Mi_10T_Pro', '7e:85:43:af:1d:28', '7398432', 'CS220', '42', '2'),
(18, '18193103008', 'ripon', 'Mi_10T_Pro', '7e:85:43:af:1d:28', '7398432', 'CS300', '42', '1'),
(19, '131312', 'Sifat', 'Sifat', '5c:62:8b:df:80:4', '3452152541', 'CS300', '42', '1'),
(20, '131312', 'Sifat', 'Sifat', '5c:62:8b:df:80:4', '3452152541', 'CS200', '42', '1'),
(21, '131312', 'Sifat', 'Sifat', '5c:62:8b:df:80:4', '3452152541', 'CS220', '42', '2'),
(22, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', '525892', 'CS220', '42', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Name` text NOT NULL,
  `pass` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `Name`, `pass`, `role`) VALUES
(0, 'riponcse.it@bubt.edu.bd', 'ripon', 'ripon', 'teacher'),
(0, 'rakib@gmail.com', 'Mahmudul Hassan Rakib', 'rakib123', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scan`
--
ALTER TABLE `scan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `scan`
--
ALTER TABLE `scan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=590;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
