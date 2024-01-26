-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 07:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(136, '18193103007', 'meherab', 'POINT-1', '6a:7c:a3:90:0:af', 'CS100', '2023-12-21 02:35:32', 'ClassRoom_B1-301', 'Pre'),
(137, '18193103034', 'Trisha', 'Trisha', '36:c5:5b:21:1d:72', 'CS100', '2024-12-13 10:00:41', 'ClassRoom_B1-301', 'Pre'),
(141, '353588', 'bubt', 'BUBT_Conference_4', 'c8:0:84:2e:a5:e9', 'CS100', '2024-01-13 11:34:07', 'ClassRoom_B1-301', 'Pre'),
(142, '325464653', 'bubt222', 'BUBT_STUDENT-8', 'bc:e6:7c:53:a4:50', 'CS100', '2024-01-13 11:34:07', 'ClassRoom_B1-301', 'Abs'),
(143, '18193103007', 'meherab', 'POINT-1', '6a:7c:a3:90:0:af', 'CS100', '2024-01-13 11:34:07', 'ClassRoom_B1-301', 'Pre'),
(144, '18193103034', 'Trisha', 'Trisha', '36:c5:5b:21:1d:72', 'CS100', '2024-01-13 11:34:07', 'ClassRoom_B1-301', 'Abs'),
(173, '18193103034', 'Trisha', 'Trisha', '36:c5:5b:21:1d:72', 'CS100', '2024-01-14 04:22:25', 'ClassRoom_B1-301', NULL),
(174, '1888', 'setu', 'ELIAS', '4:95:e6:37:a4:0', 'cs100', '2024-01-14 04:22:27', 'ClassRoom_B1-301', NULL),
(175, '18193103007', 'meherab', 'POINT-1', '6a:7c:a3:90:0:af', 'CS100', '2024-01-14 04:22:25', 'ClassRoom_B1-301', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`id`, `c_code`, `scanner`, `stTime`, `endTime`, `day`, `intake`, `sec`) VALUES
(32, 'CS300', 'ClassRoom_B1-301', '15:01:00', '16:30:00', 'Sunday', '42', '1'),
(37, 'CS220', 'ClassRoom_B1-301', '15:00:00', '16:30:00', 'Tuesday', '42', '2'),
(38, 'CS300', 'ClassRoom_B1-301', '10:00:00', '11:30:00', 'Monday', '42', '1'),
(39, 'CS300', 'ClassRoom_B1-301', '15:00:00', '17:00:00', 'Wednesday', '42', '1'),
(40, 'CS100', 'ClassRoom_B1-301', '08:00:00', '10:00:00', 'Sunday', '42', '1'),
(41, 'CS100', 'ClassRoom_B1-301', '08:00:00', '10:00:00', 'Monday', '42', '1'),
(42, 'CS100', 'ClassRoom_B1-301', '08:00:00', '10:00:00', 'Tuesday', '42', '1'),
(43, 'CS100', 'ClassRoom_B1-301', '08:00:00', '10:00:00', 'Wednesday', '42', '1'),
(44, 'CS100', 'ClassRoom_B1-301', '08:00:00', '01:00:00', 'Thursday', '42', '1'),
(48, 'CS100', 'ClassRoom_B1-301', '14:00:00', '19:00:00', 'Saturday', '42', '1'),
(49, 'CSE300', 'ClassRoom_B1-301', '22:00:00', '12:33:00', 'Wednesday', '42', '1'),
(52, 'CS100', 'ClassRoom_B1-301', '12:00:00', '14:00:00', 'Sunday', '42', '1');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scan`
--

INSERT INTO `scan` (`id`, `ssid`, `mac`, `access_time`, `scanner`) VALUES
(684, 'Redmi_8A', '92:d5:c1:a8:bd:59', '2024-01-14 06:27:08', 'ClassRoom_B1-301'),
(685, 'Trisha', '36:c5:5b:21:1d:72', '2024-01-14 04:22:25', 'ClassRoom_B1-301'),
(686, 'Faculty_Room_303', '9c:c9:eb:f8:f0:93', '2024-01-14 06:29:41', 'ClassRoom_B1-301'),
(687, 'Super_Home_SH4_A3_R4', '18:31:bf:1:4c:a8', '2024-01-14 06:27:09', 'ClassRoom_B1-301'),
(688, 'Faculty_Room_301', '9c:c9:eb:fa:e4:d1', '2024-01-14 06:27:09', 'ClassRoom_B1-301'),
(689, 'Pro_VC', '1c:61:b4:8:fe:6c', '2024-01-14 06:27:10', 'ClassRoom_B1-301'),
(690, 'Super_Home_SH4_A2R3', '18:31:bf:e6:29:88', '2024-01-14 06:26:59', 'ClassRoom_B1-301'),
(691, 'Students_Building-4_', '78:8c:b5:d2:9f:d8', '2024-01-14 06:29:41', 'ClassRoom_B1-301'),
(692, 'Faculty_Room_410', '78:8c:b5:2e:c7:16', '2024-01-14 06:27:10', 'ClassRoom_B1-301'),
(693, 'Diya_5G', '14:4d:67:56:58:4', '2024-01-14 06:27:09', 'ClassRoom_B1-301'),
(694, 'Danger_Devil', '9c:c9:eb:f8:f2:43', '2024-01-14 06:29:41', 'ClassRoom_B1-301'),
(695, 'English-Language-Lab', 'b0:4e:26:c3:aa:84', '2024-01-14 06:27:09', 'ClassRoom_B1-301'),
(696, 'nupur_wifi', 'e0:1c:fc:a6:5c:a8', '2024-01-14 06:27:09', 'ClassRoom_B1-301'),
(697, 'NY-4_A2', '8:9b:4b:97:ae:c1', '2024-01-14 06:29:41', 'ClassRoom_B1-301'),
(698, 'SH-4_A2', 'e0:e1:a9:4:30:36', '2024-01-14 06:27:09', 'ClassRoom_B1-301'),
(699, 'Super_Home_SH4_Commo', 'c:9d:92:54:cd:58', '2024-01-14 06:26:58', 'ClassRoom_B1-301'),
(700, 'Bismillah_Store', '50:f:f5:b2:e5:10', '2024-01-14 06:27:11', 'ClassRoom_B1-301'),
(701, 'BUBT_Reception', 'bc:f6:85:c7:62:98', '2024-01-14 06:27:12', 'ClassRoom_B1-301'),
(702, 'SH4_Security_Desk', '4:d4:c4:2e:df:68', '2024-01-14 06:29:41', 'ClassRoom_B1-301'),
(703, 'Faculty_Room_310', '9c:c9:eb:f8:f2:5e', '2024-01-14 06:27:10', 'ClassRoom_B1-301'),
(704, 'NETGEAR_Guest', '9e:c9:eb:fa:e7:7d', '2024-01-14 06:29:41', 'ClassRoom_B1-301'),
(705, 'Online_Payment', '9c:c9:eb:fa:e7:7d', '2024-01-14 06:29:41', 'ClassRoom_B1-301'),
(706, 'Super_Home_SH4_A5R4', '4:92:26:c5:d5:8', '2024-01-14 06:26:56', 'ClassRoom_B1-301'),
(707, 'Galaxy_M02s48c3', '8a:c8:59:36:18:ca', '2024-01-14 06:27:08', 'ClassRoom_B1-301'),
(708, 'Online_Admission', '50:c7:bf:ec:33:fb', '2024-01-14 06:26:48', 'ClassRoom_B1-301'),
(709, 'Sumon', '64:ee:b7:f0:5c:0', '2024-01-14 06:27:09', 'ClassRoom_B1-301'),
(710, 'Super_Home_SH4_Dinni', 'a8:5e:45:49:38:f0', '2024-01-14 06:26:58', 'ClassRoom_B1-301'),
(711, 'Chairman_CSE', '14:59:c0:c8:77:d9', '2024-01-14 06:26:48', 'ClassRoom_B1-301'),
(712, 'Eng_Chairman', '9c:c9:eb:f8:c2:fa', '2024-01-14 06:29:41', 'ClassRoom_B1-301'),
(713, 'ELIAS', '4:95:e6:37:a4:0', '2024-01-14 06:27:11', 'ClassRoom_B1-301'),
(714, 'Jarir_UMN', '18:a6:f7:c4:8d:bc', '2024-01-14 06:27:09', 'ClassRoom_B1-301'),
(715, 'Faculty_Room_314', '9c:c9:eb:f8:f0:b4', '2024-01-14 06:29:41', 'ClassRoom_B1-301'),
(716, 'Super_Home_SH4_Commo', '40:b0:76:22:7e:69', '2024-01-14 04:18:21', 'ClassRoom_B1-301'),
(717, 'POINT-1', '6a:7c:a3:90:0:af', '2024-01-14 04:22:25', 'ClassRoom_B1-301'),
(718, 'Sohel', '4:95:e6:9c:95:98', '2024-01-14 06:23:23', 'ClassRoom_B1-301'),
(719, 'RAYHAN', 'c:80:63:b6:57:ae', '2024-01-14 06:27:00', 'ClassRoom_B1-301'),
(720, 'Super_Home_SH4_A5R3', 'c:9d:92:54:7f:60', '2024-01-14 06:26:58', 'ClassRoom_B1-301'),
(721, 'Dean_Science', '0:6c:bc:ee:ea:fe', '2024-01-14 06:23:10', 'ClassRoom_B1-301'),
(722, 'Bachelor_Point', 'b0:4e:26:2a:1c:8', '2024-01-14 06:29:41', 'ClassRoom_B1-301'),
(723, 'Super_Home_SH4_A4_R4', '4c:ed:fb:57:3a:28', '2024-01-14 06:27:10', 'ClassRoom_B1-301'),
(724, 'Farhan_Computer', '18:f:76:8c:ba:a4', '2024-01-14 06:29:39', 'ClassRoom_B1-301'),
(725, 'Galaxy_S21_FE_5G_359', 'be:96:22:36:25:4c', '2024-01-14 04:17:47', 'ClassRoom_B1-301'),
(726, 'Room-205', '98:de:d0:e8:18:50', '2024-01-14 06:20:32', 'ClassRoom_B1-301'),
(727, 'Faculty_Room_6th', 'b0:a7:b9:84:eb:df', '2024-01-14 06:25:20', 'ClassRoom_B1-301'),
(728, 'OPPO_F17_Pro', '9a:79:37:dd:71:24', '2024-01-14 04:20:52', 'ClassRoom_B1-301'),
(729, 'Liton_', 'c6:33:a7:f7:49:50', '2024-01-14 04:19:35', 'ClassRoom_B1-301'),
(730, 'RAfif@305', '70:4f:57:1b:69:e8', '2024-01-14 06:24:45', 'ClassRoom_B1-301'),
(731, 'realme_C11', 'e:8c:bb:22:64:70', '2024-01-14 04:22:06', 'ClassRoom_B1-301'),
(732, 'zara', 'c4:e9:a:60:51:ee', '2024-01-14 06:26:59', 'ClassRoom_B1-301'),
(733, 'Dean_Law', '9c:c9:eb:f8:f2:64', '2024-01-14 06:22:56', 'ClassRoom_B1-301'),
(734, 'Redmi_Note_8', '7a:e0:2f:db:da:29', '2024-01-14 04:22:26', 'ClassRoom_B1-301'),
(735, 'saifur', '44:1:bb:c9:3f:21', '2024-01-14 06:29:39', 'ClassRoom_B1-301'),
(736, 'Zaim_2.4Ghz', '10:27:f5:ec:6f:7', '2024-01-14 06:19:31', 'ClassRoom_B1-301'),
(737, 'Hyper_Prior', '32:a4:9e:ac:ce:86', '2024-01-14 06:27:08', 'ClassRoom_B1-301'),
(738, 'Nishat', '22:32:6c:c:80:2c', '2024-01-14 06:27:09', 'ClassRoom_B1-301'),
(739, 'Purabi(Non-AC)', '5c:c3:7:c1:2b:bd', '2024-01-14 06:29:41', 'ClassRoom_B1-301'),
(740, 'NETGEAR_Guest', '9e:c9:eb:5f:4f:d', '2024-01-14 06:10:58', 'ClassRoom_B1-301'),
(741, 'Pro_Office', '9c:c9:eb:fa:b8:eb', '2024-01-14 06:27:12', 'ClassRoom_B1-301'),
(742, '_LAW_DIGITAL_LAB', '9c:c9:eb:4f:4f:d', '2024-01-14 06:10:11', 'ClassRoom_B1-301'),
(743, 'Dalia.', 'fe:7c:c2:2:93:fe', '2024-01-14 06:10:49', 'ClassRoom_B1-301'),
(744, 'Office_Room-211', '78:d2:94:9a:e1:5', '2024-01-14 06:10:41', 'ClassRoom_B1-301'),
(745, 'Zubair', '64:ee:b7:c1:39:3b', '2024-01-14 06:29:41', 'ClassRoom_B1-301'),
(746, 'LG', 'c:80:63:87:93:d8', '2024-01-14 06:23:11', 'ClassRoom_B1-301'),
(747, 'MIRZA', 'c4:e9:84:31:50:48', '2024-01-14 06:16:04', 'ClassRoom_B1-301'),
(748, 'vritinna', '60:32:b1:18:be:8b', '2024-01-14 06:23:10', 'ClassRoom_B1-301'),
(749, 'motorola_edge_40', '4a:1e:79:c3:1b:33', '2024-01-14 06:22:31', 'ClassRoom_B1-301'),
(750, 'BUBT_Computer_Lab-52', 'b4:a2:5c:56:7d:f0', '2024-01-14 06:07:20', 'ClassRoom_B1-301'),
(751, 'Redmi_Go', 'd0:9c:7a:a5:db:69', '2024-01-14 06:10:49', 'ClassRoom_B1-301'),
(752, 'Ahnaf_Computer', '3c:84:6a:48:26:20', '2024-01-14 06:24:16', 'ClassRoom_B1-301'),
(753, 'Faculty_Room_503', '9c:c9:eb:f8:c3:33', '2024-01-14 06:27:09', 'ClassRoom_B1-301'),
(754, 'Peace_House_🏠', 'd8:32:14:d5:65:c8', '2024-01-14 06:26:13', 'ClassRoom_B1-301'),
(755, 'TECNO_SPARK_10C', '6a:68:f0:80:95:83', '2024-01-14 06:11:35', 'ClassRoom_B1-301'),
(756, 'Beshaler...bu', 'a0:4:60:da:b8:57', '2024-01-14 06:24:33', 'ClassRoom_B1-301'),
(757, 'SOHAG', 'b0:a7:b9:bd:8e:b7', '2024-01-14 06:16:39', 'ClassRoom_B1-301'),
(758, 'Super_Home_SH4_A6R3', '4:d4:c4:2e:e0:a0', '2024-01-14 06:27:10', 'ClassRoom_B1-301'),
(759, '🥀.offline.🥀', 'c0:c9:e3:b6:7e:b6', '2024-01-14 06:26:59', 'ClassRoom_B1-301'),
(760, 'mahfuz_wifi', '70:4f:57:b3:b2:d0', '2024-01-14 06:27:12', 'ClassRoom_B1-301'),
(761, 'fatema_mannan', '74:da:88:63:70:1f', '2024-01-14 06:11:57', 'ClassRoom_B1-301'),
(762, 'BUBT_Faculty', '58:c1:7a:d8:3f:e2', '2024-01-14 06:21:53', 'ClassRoom_B1-301'),
(763, 'Room-806', '3c:52:a1:c4:f8:84', '2024-01-14 06:21:52', 'ClassRoom_B1-301'),
(764, 'Super_Home_SH4_A4R3', 'b0:b9:8a:48:bc:4d', '2024-01-14 06:12:13', 'ClassRoom_B1-301'),
(765, 'BUBT', '40:ed:0:61:fd:bc', '2024-01-14 06:20:43', 'ClassRoom_B1-301'),
(766, 'Josna', 'e0:1c:fc:3d:ba:c4', '2024-01-14 06:24:56', 'ClassRoom_B1-301'),
(767, 'Infinix_GT_10_Pro', 'c2:4a:10:7b:32:ff', '2024-01-14 06:23:20', 'ClassRoom_B1-301'),
(768, 'Galaxy_a50', '7a:86:7a:2d:fe:d2', '2024-01-14 06:14:07', 'ClassRoom_B1-301'),
(769, 'FAMILY', 'f4:8c:eb:ab:47:31', '2024-01-14 06:25:21', 'ClassRoom_B1-301'),
(770, 'Room-606', '9c:c9:eb:f8:f2:82', '2024-01-14 06:21:21', 'ClassRoom_B1-301'),
(771, 'Rlfat@214', 'd8:32:14:1f:16:31', '2024-01-14 06:21:54', 'ClassRoom_B1-301'),
(772, 'Galaxy_Note10_Lite2d', 'ae:f3:8a:5a:d9:24', '2024-01-14 06:14:58', 'ClassRoom_B1-301'),
(773, 'Idiot_', 'b6:f:b3:17:c4:8d', '2024-01-14 06:16:27', 'ClassRoom_B1-301'),
(774, 'realme_8', 'ba:14:83:9:7b:eb', '2024-01-14 06:27:09', 'ClassRoom_B1-301'),
(775, 'B5Pn-YXNhZGtoYW5zcHM', '1e:49:16:e8:86:cc', '2024-01-14 06:17:12', 'ClassRoom_B1-301'),
(776, 'Moon_View', 'c8:3a:35:c:fc:78', '2024-01-14 06:17:20', 'ClassRoom_B1-301'),
(777, 'Sandhita_', '98:de:d0:72:c4:34', '2024-01-14 06:27:10', 'ClassRoom_B1-301'),
(778, 'POCO_M2', '42:f0:68:c6:21:d1', '2024-01-14 06:24:21', 'ClassRoom_B1-301'),
(779, 'Galaxy_A13C88F', 'c2:71:9b:d1:59:2c', '2024-01-14 06:27:11', 'ClassRoom_B1-301'),
(780, 'Galaxy_A50DB7B', 'f2:14:20:a8:c9:ac', '2024-01-14 06:20:44', 'ClassRoom_B1-301'),
(781, 'VC_BUBT', 'b0:be:76:c5:8b:90', '2024-01-14 06:22:45', 'ClassRoom_B1-301'),
(782, 'Wednesday_', 'e0:1c:fc:a8:fa:24', '2024-01-14 06:21:53', 'ClassRoom_B1-301'),
(783, 'BUBT_Faculty', '58:c1:7a:ce:6b:71', '2024-01-14 06:22:46', 'ClassRoom_B1-301'),
(784, 'Serazy', '9a:9a:ba:97:fe:2', '2024-01-14 06:27:09', 'ClassRoom_B1-301'),
(785, 'Multi_Wash', '58:d5:6e:ab:8e:54', '2024-01-14 06:22:57', 'ClassRoom_B1-301'),
(786, 'itel_Vision1Pro', 'ca:ee:cd:d6:fa:49', '2024-01-14 06:25:07', 'ClassRoom_B1-301'),
(787, 'OPPO_A12', '12:47:2d:3e:12:b7', '2024-01-14 06:25:50', 'ClassRoom_B1-301'),
(788, 'Vy_20', '76:b9:9a:61:23:a', '2024-01-14 06:24:21', 'ClassRoom_B1-301'),
(789, 'Redmi_Note_12', '5a:69:a3:e9:a1:b7', '2024-01-14 06:24:44', 'ClassRoom_B1-301'),
(790, 'HUAWEI_P30_Pro', 'b2:ea:c6:7f:5e:d2', '2024-01-14 06:25:49', 'ClassRoom_B1-301'),
(791, 'OPPO_F17', 'd2:9:bd:ae:75:8d', '2024-01-14 06:25:49', 'ClassRoom_B1-301'),
(792, 'Shahin_Sheikh', '3a:f9:7b:1d:be:f1', '2024-01-14 06:25:59', 'ClassRoom_B1-301'),
(793, 'BUBT_Student_8th_flo', '0:4:56:a2:ae:a0', '2024-01-14 06:29:41', 'ClassRoom_B1-301'),
(794, 'SA:Iron-Man', '9c:3d:cf:c2:6d:b8', '2024-01-14 06:26:59', 'ClassRoom_B1-301'),
(795, 'Infhi', '40:ed:0:4a:49:e5', '2024-01-14 06:27:10', 'ClassRoom_B1-301');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `sid`, `name`, `ssid`, `macAddress`, `phone`, `course`, `intake`, `sec`) VALUES
(0, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', '525890', 'CS100', '42', '1'),
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
(22, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', '525892', 'CS220', '42', '1'),
(23, '1888', 'setu', 'ELIAS', '4:95:e6:37:a4:0', '01', 'cs100', '42', '2'),
(24, '0177777', 'MAGIC', 'Magic', 'b4:f:3b:7a:1b:40', '017055555', 'CS101', '42', '1'),
(25, '353588', 'bubt', 'BUBT_Conference_4', 'c8:0:84:2e:a5:e9', '0170509', 'CS100', '42', '1'),
(26, '325464653', 'bubt222', 'BUBT_STUDENT-8', 'bc:e6:7c:53:a4:50', '0170509', 'CS100', '42', '1'),
(27, '18192103030', 'mh rakib', 'Redmi_8A', '76:63:36:df:d5:fb', '525890', 'CS320', '42', '1'),
(28, '732319417', 'Fahim', 'Faculty_Room_301', '9c:c9:eb:fa:e4:d1', '1705094356', 'CS100', '42', '1'),
(29, '345789767', 'Rahim', 'Dean_Law', '9c:c9:eb:f8:f2:64', '170509476656', 'CS100', '42', '1');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `Name`, `pass`, `role`) VALUES
(0, 'riponcse.it@bubt.edu.bd', 'ripon', 'ripon', 'teacher'),
(0, 'rakib@gmail.com', 'Mahmudul Hassan Rakib', 'rakib123', 'teacher'),
(0, 'mehrab007@gmail.com', 'mehrab', '11111', 'teacher');

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `scan`
--
ALTER TABLE `scan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=796;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
