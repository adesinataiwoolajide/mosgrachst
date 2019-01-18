-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2018 at 07:29 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mosgrach_college_of_health`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `act_id` int(255) NOT NULL,
  `action` text NOT NULL,
  `user_details` varchar(255) NOT NULL,
  `time_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_id`, `action`, `user_details`, `time_added`) VALUES
(1, 'Logged In', 'tolajide74@gmail.com', '2017-11-03 05:50:05'),
(2, 'Logged Out', 'tolajide74@gmail.com', '2017-11-03 05:50:12'),
(3, 'Logged In', 'tolajide75@gmail.com', '2017-11-03 05:50:19'),
(4, 'Logged In', 'tolajide75@gmail.com', '2017-11-03 06:14:15'),
(5, 'tolajide75@gmail.com registered burser@gmail.com account', 'tolajide75@gmail.com', '2017-11-03 06:17:52'),
(6, 'Logged Out', 'tolajide75@gmail.com', '2017-11-03 06:26:27'),
(7, 'Logged In', 'burser@gmail.com', '2017-11-03 06:27:50'),
(8, 'Confirmed Admission Payments for kolade@gmail.com and Transaction Number 9600990', 'burser@gmail.com', '2017-11-03 06:28:15'),
(9, 'Confirmed Admission Payments for me@gmail.com and Transaction Number 3119096', 'burser@gmail.com', '2017-11-03 06:28:15'),
(10, 'Confirmed Admission Payments for kolade@gmail.com and Transaction Number 9600990', 'burser@gmail.com', '2017-11-03 06:30:23'),
(11, 'Confirmed Admission Payments for me@gmail.com and Transaction Number 3119096', 'burser@gmail.com', '2017-11-03 06:30:23'),
(12, 'Confirmed Admission Payments for kolade@gmail.com and Transaction Number 9600990', 'burser@gmail.com', '2017-11-03 06:30:51'),
(13, 'Confirmed Admission Payments for me@gmail.com and Transaction Number 3119096', 'burser@gmail.com', '2017-11-03 06:30:51'),
(14, 'Confirmed Admission Payments for kolade@gmail.com and Transaction Number 6961060', 'burser@gmail.com', '2017-11-03 06:31:07'),
(15, 'Confirmed Admission Payments for kolade@gmail.com and Transaction Number 6961060', 'burser@gmail.com', '2017-11-03 06:32:05'),
(16, 'Confirmed Admission Payments for kolade@gmail.com and Transaction Number 6961060', 'burser@gmail.com', '2017-11-03 06:33:32'),
(17, 'Confirmed Admission Payments for kolade@gmail.com and Transaction Number 6961060', 'burser@gmail.com', '2017-11-03 06:34:14'),
(18, 'Confirmed Admission Payments for kolade@gmail.com and Transaction Number 6961060', 'burser@gmail.com', '2017-11-03 06:35:02'),
(19, 'Confirmed Admission Payments for kolade@gmail.com and Transaction Number 6961060', 'burser@gmail.com', '2017-11-03 06:35:06'),
(20, 'Confirmed Admission Payments for kolade@gmail.com and Transaction Number 6961060', 'burser@gmail.com', '2017-11-03 06:35:26'),
(21, 'Pend Admission Payments for  and Transaction Number 3009909', 'burser@gmail.com', '2017-11-03 06:36:10'),
(22, 'Pend Admission Payments for  and Transaction Number 9011699', 'burser@gmail.com', '2017-11-03 06:36:10'),
(23, 'Confirmed Admission Payments for tolajide74@gmail.com and Transaction Number 0699009', 'burser@gmail.com', '2017-11-03 06:38:41'),
(24, 'Logged In', 'mosgrachtb@gmail.com', '2017-11-03 07:05:42'),
(25, 'Logged Out', 'mosgrachtb@gmail.com', '2017-11-03 07:07:35'),
(26, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-03 07:29:01'),
(27, 'Logged In', 'mosgrachtb@gmail.com', '2017-11-03 07:34:45'),
(28, 'Logged Out', 'mosgrachtb@gmail.com', '2017-11-03 07:46:06'),
(29, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-03 08:01:51'),
(30, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-03 08:23:19'),
(31, 'Logged In', 'tolajide74@gmail.com', '2017-11-03 08:24:40'),
(32, 'Confirmed Admission Payments for fo@gmail.com and Transaction Number 3009909', 'tolajide74@gmail.com', '2017-11-03 08:25:03'),
(33, 'infodesk@trenchcoregroup.com registered p.adeleke@trenchcoregroup.com account', 'infodesk@trenchcoregroup.com', '2017-11-03 09:01:45'),
(34, 'Logged Out', 'infodesk@trenchcoregroup.com', '2017-11-03 09:02:54'),
(35, 'Logged In', 'p.adeleke@trenchcoregroup.com', '2017-11-03 09:02:59'),
(36, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-03 09:04:58'),
(37, 'Logged In', 'tolajide75@gmail.com', '2017-11-03 09:06:10'),
(38, 'Logged Out', 'tolajide75@gmail.com', '2017-11-03 09:15:51'),
(39, 'Logged In', 'p.adeleke@trenchcoregroup.com', '2017-11-03 09:16:16'),
(40, 'Logged Out', 'p.adeleke@trenchcoregroup.com', '2017-11-03 09:18:15'),
(41, 'Logged In', 'p.adeleke@trenchcoregroup.com', '2017-11-03 09:18:26'),
(42, 'Logged In', 'mosgrachtb@gmail.com', '2017-11-03 09:18:39'),
(43, 'Logged In', 'burser@gmail.com', '2017-11-03 13:23:52'),
(44, 'Confirmed Admission Payments for k@gmail.com and Transaction Number 9011699', 'burser@gmail.com', '2017-11-03 13:24:15'),
(45, 'Pend Admission Payments for  and Transaction Number 3009909', 'burser@gmail.com', '2017-11-03 13:24:36'),
(46, 'Pend Admission Payments for  and Transaction Number 9011699', 'burser@gmail.com', '2017-11-03 13:24:37'),
(47, 'Logged Out', 'burser@gmail.com', '2017-11-03 13:24:53'),
(48, 'Logged In', 'tolajide75@gmail.com', '2017-11-03 13:25:13'),
(49, 'Admitted MGCHST/DFT/0030', 'tolajide75@gmail.com', '2017-11-03 13:25:51'),
(50, 'Logged Out', 'tolajide75@gmail.com', '2017-11-03 13:26:05'),
(51, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-03 15:39:24'),
(52, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-04 19:03:00'),
(53, 'infodesk@trenchcoregroup.com registered hod@mosgrachst.sch.ng account', 'infodesk@trenchcoregroup.com', '2017-11-04 19:18:01'),
(54, 'infodesk@trenchcoregroup.com registered lecturer@mosgrachst.sch.ng account', 'infodesk@trenchcoregroup.com', '2017-11-04 19:42:45'),
(55, 'Logged Out', 'infodesk@trenchcoregroup.com', '2017-11-04 20:36:31'),
(56, 'Logged In', 'p.adeleke@trenchcoregroup.com', '2017-11-05 12:33:46'),
(57, 'Logged Out', 'p.adeleke@trenchcoregroup.com', '2017-11-05 12:34:32'),
(58, 'Logged In', 'lecturer@mosgrachst.sch.ng', '2017-11-05 12:34:41'),
(59, 'Logged Out', 'lecturer@mosgrachst.sch.ng', '2017-11-05 12:35:01'),
(60, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-05 12:35:08'),
(61, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-05 12:35:35'),
(62, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-05 12:35:36'),
(63, 'Logged Out', 'infodesk@trenchcoregroup.com', '2017-11-05 12:37:39'),
(64, 'Logged In', 'tolajide75@gmail.com', '2017-11-07 15:28:57'),
(65, 'Admitted MGCHST/DIP/1331', 'tolajide75@gmail.com', '2017-11-07 15:29:20'),
(66, 'Admitted MGCHST/DIP/3011', 'tolajide75@gmail.com', '2017-11-07 15:29:20'),
(67, 'Pend MGCHST/DIP/3011', 'tolajide75@gmail.com', '2017-11-07 15:29:35'),
(68, 'Pend MGCHST/DFT/1633', 'tolajide75@gmail.com', '2017-11-07 15:29:35'),
(69, 'Pend ', 'tolajide75@gmail.com', '2017-11-07 15:32:22'),
(70, 'Pend ', 'tolajide75@gmail.com', '2017-11-07 15:32:22'),
(71, 'Pend MGCHST/DFT/0030', 'tolajide75@gmail.com', '2017-11-07 15:32:31'),
(72, 'Pend MGCHST/DIP/1633', 'tolajide75@gmail.com', '2017-11-07 15:32:37'),
(73, 'Pend MGCHST/DIP/1603', 'tolajide75@gmail.com', '2017-11-07 15:32:48'),
(74, 'Pend MGCHST/DIP/1603', 'tolajide75@gmail.com', '2017-11-07 15:32:48'),
(75, 'Admitted MGCHST/DFT/0303', 'tolajide75@gmail.com', '2017-11-07 15:33:05'),
(76, 'Admitted MGCHST/DIP/0113', 'tolajide75@gmail.com', '2017-11-07 15:33:05'),
(77, 'Admitted MGCHST/DIP/3060', 'tolajide75@gmail.com', '2017-11-07 15:33:05'),
(78, 'Admitted MGCHST/DIP/3131', 'tolajide75@gmail.com', '2017-11-07 15:33:05'),
(79, 'Logged Out', 'tolajide75@gmail.com', '2017-11-07 15:33:14'),
(80, 'Logged In', 'tolajide74@gmail.com', '2017-11-07 15:33:20'),
(81, 'Confirmed Admission Payments for new@gmail.com and Transaction Number 0319061', 'tolajide74@gmail.com', '2017-11-07 15:34:35'),
(82, 'Confirmed Admission Payments for hope@gmail.com and Transaction Number 0906106', 'tolajide74@gmail.com', '2017-11-07 15:34:35'),
(83, 'Confirmed Admission Payments for new@gmail.com and Transaction Number 0319061', 'tolajide74@gmail.com', '2017-11-07 15:35:49'),
(84, 'Confirmed Admission Payments for hope@gmail.com and Transaction Number 0906106', 'tolajide74@gmail.com', '2017-11-07 15:35:49'),
(85, 'Confirmed Admission Payments for k@gmail.com and Transaction Number 9011699', 'tolajide74@gmail.com', '2017-11-07 15:36:05'),
(86, 'Pend Admission Payments for  and Transaction Number 9911013', 'tolajide74@gmail.com', '2017-11-07 15:37:21'),
(87, 'Pend Admission Payments for  and Transaction Number 9011699', 'tolajide74@gmail.com', '2017-11-07 15:37:21'),
(88, 'Pend Admission Payments for  and Transaction Number 3119096', 'tolajide74@gmail.com', '2017-11-07 15:37:21'),
(89, 'Logged Out', 'tolajide74@gmail.com', '2017-11-07 15:38:16'),
(90, 'Logged In', 'tolajide75@gmail.com', '2017-11-07 15:38:34'),
(91, 'Added Folake Damilola Solape Details with 17-1471 Staff Number to the Staff List', 'tolajide75@gmail.com', '2017-11-07 15:57:04'),
(92, 'Logged Out', 'tolajide75@gmail.com', '2017-11-07 15:58:36'),
(93, 'Logged In', 'sola@gmail.com', '2017-11-07 15:58:54'),
(94, 'Added ACT127 to Community Health Departmental Course List', 'sola@gmail.com', '2017-11-07 16:00:03'),
(95, 'Added ACT226 to Community Health Departmental Course List', 'sola@gmail.com', '2017-11-07 16:00:03'),
(96, 'Added ADU225 to Community Health Departmental Course List', 'sola@gmail.com', '2017-11-07 16:00:04'),
(97, 'Added ADU226 to Community Health Departmental Course List', 'sola@gmail.com', '2017-11-07 16:00:04'),
(98, 'Added ADU326 to Community Health Departmental Course List', 'sola@gmail.com', '2017-11-07 16:00:05'),
(99, 'Added AFR224 to Community Health Departmental Course List', 'sola@gmail.com', '2017-11-07 16:00:05'),
(100, 'Added APO325 to Community Health Departmental Course List', 'sola@gmail.com', '2017-11-07 16:00:05'),
(101, 'Added APO328 to Community Health Departmental Course List', 'sola@gmail.com', '2017-11-07 16:00:05'),
(102, 'Added APO419 to Community Health Departmental Course List', 'sola@gmail.com', '2017-11-07 16:00:05'),
(103, 'Deleted APO328 to Community Health Departmental Course List', 'sola@gmail.com', '2017-11-07 16:00:25'),
(104, 'Deleted APO419 to Community Health Departmental Course List', 'sola@gmail.com', '2017-11-07 16:00:25'),
(105, 'Allocated ACT226 to ', 'sola@gmail.com', '2017-11-07 16:00:59'),
(106, 'Logged Out', 'sola@gmail.com', '2017-11-07 16:06:51'),
(107, 'Logged In', 'tolajide75@gmail.com', '2017-11-07 16:07:07'),
(108, 'Imported ENG111 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(109, 'Imported HEA112 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(110, 'Imported CHU113 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(111, 'Imported CHR114 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(112, 'Imported FAM115 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(113, 'Imported OLD116 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(114, 'Imported EVA117 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(115, 'Imported CAC118 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(116, 'Imported RUD119 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(117, 'Imported CHU110 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(118, 'Imported ENG121 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(119, 'Imported SYS122 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(120, 'Imported HOM123 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(121, 'Imported PEN124 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(122, 'Imported HER125 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(123, 'Imported INT126 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(124, 'Imported NEW127 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(125, 'Imported INT128 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(126, 'Imported FRE129 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(127, 'Imported CHI220 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(128, 'Imported YOU221 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(129, 'Imported ENG212 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(130, 'Imported HOM213 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(131, 'Imported LIF214 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(132, 'Imported INT215 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(133, 'Imported INT216 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(134, 'Imported EDU217 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(135, 'Imported CHU218 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(136, 'Imported HYM219 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(137, 'Imported CIT210 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(138, 'Imported ENG211 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(139, 'Imported YOR212 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(140, 'Imported HAU213 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(141, 'Imported PRA214 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(142, 'Imported ENG225 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(143, 'Imported ACT226 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(144, 'Imported CHR227 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(145, 'Imported TEA228 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(146, 'Imported EPI229 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(147, 'Imported SYS220 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(148, 'Imported INT221 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(149, 'Imported STR222 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(150, 'Imported BIB223 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(151, 'Imported MIN224 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(152, 'Imported ADU225 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(153, 'Imported SUN226 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(154, 'Imported PRA227 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(155, 'Imported ENG118 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(156, 'Imported CHU119 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(157, 'Imported CAC110 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(158, 'Imported RUD111 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(159, 'Imported OLD112 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(160, 'Imported STU113 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(161, 'Imported INT114 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(162, 'Imported EVA115 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(163, 'Imported HIS116 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(164, 'Imported CIT117 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(165, 'Imported INT118 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(166, 'Imported HEA119 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(167, 'Imported ENG120 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(168, 'Imported HER121 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(169, 'Imported HOM122 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(170, 'Imported SYS123 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(171, 'Imported NEW124 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(172, 'Imported INT125 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(173, 'Imported COU126 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(174, 'Imported N T127 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(175, 'Imported CHU128 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(176, 'Imported CHI129 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(177, 'Imported PED120 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(178, 'Imported PRA121 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(179, 'Imported CHU122 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(180, 'Imported PEN223 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(181, 'Imported FRE224 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(182, 'Imported HIS215 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(183, 'Imported CRE216 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(184, 'Imported SYS217 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(185, 'Imported INT218 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(186, 'Imported PAU219 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(187, 'Imported ISL210 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(188, 'Imported STR211 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(189, 'Imported HOM212 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(190, 'Imported ENG213 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(191, 'Imported N T214 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(192, 'Imported BIB215 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(193, 'Imported EDU226 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(194, 'Imported CAC227 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(195, 'Imported HYM228 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(196, 'Imported STU229 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(197, 'Imported INT220 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(198, 'Imported LIT221 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(199, 'Imported REL222 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(200, 'Imported MIN223 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(201, 'Imported DEV224 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(202, 'Imported PSY225 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(203, 'Imported ADU226 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(204, 'Imported SUN227 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(205, 'Imported LON228 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(206, 'Imported THE229 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(207, 'Imported CAC220 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(208, 'Imported CRO221 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(209, 'Imported IGB122 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(210, 'Imported PRA123 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(211, 'Imported USE114 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(212, 'Imported PEN115 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(213, 'Imported INT116 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(214, 'Imported INT117 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(215, 'Imported USE119 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(216, 'Imported HEA110 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(217, 'Imported INT111 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(218, 'Imported CIT112 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(219, 'Imported PRA113 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(220, 'Imported BAS115 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(221, 'Imported C A126 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(222, 'Imported ACT127 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(223, 'Imported HIS128 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(224, 'Imported CHU129 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(225, 'Imported EVA120 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(226, 'Imported INT121 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(227, 'Imported ENG122 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(228, 'Imported ENT123 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(229, 'Imported HIS124 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(230, 'Imported CHI225 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(231, 'Imported FRE226 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(232, 'Imported N T217 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(233, 'Imported LIT218 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(234, 'Imported HER219 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(235, 'Imported CHU210 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(236, 'Imported SYS211 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(237, 'Imported ISL212 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(238, 'Imported INT213 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(239, 'Imported CRE214 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(240, 'Imported CRI215 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(241, 'Imported YOU216 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(242, 'Imported HOM228 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(243, 'Imported SYS229 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(244, 'Imported CHU221 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(245, 'Imported SOC222 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(246, 'Imported INT223 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(247, 'Imported AFR224 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(248, 'Imported REL325 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(249, 'Imported ADU326 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(250, 'Imported CRI317 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(251, 'Imported SYS318 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(252, 'Imported HOM319 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(253, 'Imported POE310 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(254, 'Imported MAJ311 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(255, 'Imported HEB312 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(256, 'Imported PSY313 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(257, 'Imported PAS314 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(258, 'Imported STR315 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(259, 'Imported STR316 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(260, 'Imported PSY317 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(261, 'Imported YOR318 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(262, 'Imported EDU319 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(263, 'Imported PSY310 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(264, 'Imported PSY311 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(265, 'Imported SYS322 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(266, 'Imported RES323 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(267, 'Imported PHI324 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(268, 'Imported APO325 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(269, 'Imported IND326 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(270, 'Imported MIN327 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(271, 'Imported APO328 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(272, 'Imported PRA329 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(273, 'Imported PHI420 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(274, 'Imported THE421 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(275, 'Imported PAS412 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(276, 'Imported STU413 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(277, 'Imported CAC414 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(278, 'Imported MIN415 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(279, 'Imported DIA417 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(280, 'Imported REL418 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(281, 'Imported APO419 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(282, 'Imported PAS410 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(283, 'Imported EPI421 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(284, 'Imported CHR422 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(285, 'Imported CHR423 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(286, 'Imported CUL424 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(287, 'Imported CHR425 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(288, 'Imported LON426 Course to the Course List', 'tolajide75@gmail.com', '2017-11-07 16:08:22'),
(289, 'Updated APO328 Details', 'tolajide75@gmail.com', '2017-11-07 16:08:45'),
(290, 'Logged Out', 'tolajide75@gmail.com', '2017-11-07 16:24:05'),
(291, 'Logged In', 'sola@gmail.com', '2017-11-07 16:33:08'),
(292, 'Allocated ADU225 to ', 'sola@gmail.com', '2017-11-07 16:36:30'),
(293, 'Allocated ADU326 to 17-1471', 'sola@gmail.com', '2017-11-07 16:43:35'),
(294, 'Allocated ADU326 to 17-1471', 'sola@gmail.com', '2017-11-07 16:48:44'),
(295, 'Allocated ADU326 to 17-1471', 'sola@gmail.com', '2017-11-07 16:49:40'),
(296, 'Allocated ADU326 to 17-1471', 'sola@gmail.com', '2017-11-07 16:50:01'),
(297, 'Allocated ADU326 to 17-1471', 'sola@gmail.com', '2017-11-07 16:51:41'),
(298, 'Allocated ADU326 to 17-1471', 'sola@gmail.com', '2017-11-07 16:52:13'),
(299, 'Allocated ADU326 to 17-1471', 'sola@gmail.com', '2017-11-07 16:53:06'),
(300, 'Allocated ADU326 to 17-1471', 'sola@gmail.com', '2017-11-07 16:54:01'),
(301, 'Allocated ADU326 to 17-1471', 'sola@gmail.com', '2017-11-07 16:55:38'),
(302, 'Logged Out', 'sola@gmail.com', '2017-11-07 17:13:21'),
(303, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-11 04:02:35'),
(304, 'Logged Out', 'infodesk@trenchcoregroup.com', '2017-11-11 04:12:14'),
(305, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-12 06:01:28'),
(306, 'Logged Out', 'infodesk@trenchcoregroup.com', '2017-11-12 06:02:02'),
(307, 'Logged In', 'lecturer@mosgrachst.sch.ng', '2017-11-12 06:02:11'),
(308, 'Logged Out', 'lecturer@mosgrachst.sch.ng', '2017-11-12 06:03:21'),
(309, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-12 06:04:54'),
(310, 'Updated lecturer@mosgrachst.sch.ng Details ', 'infodesk@trenchcoregroup.com', '2017-11-12 06:05:40'),
(311, 'Updated p.adeleke@trenchcoregroup.com Details ', 'infodesk@trenchcoregroup.com', '2017-11-12 06:07:02'),
(312, 'Logged Out', 'infodesk@trenchcoregroup.com', '2017-11-12 06:07:25'),
(313, 'Logged In', 'lecturer@mosgrachst.sch.ng', '2017-11-12 06:08:35'),
(314, 'Logged In', 'lecturer@mosgrachst.sch.ng', '2017-11-12 06:09:05'),
(315, 'Logged Out', 'lecturer@mosgrachst.sch.ng', '2017-11-12 06:09:32'),
(316, 'Logged In', 'lecturer@mosgrachst.sch.ng', '2017-11-12 06:09:47'),
(317, 'Logged In', 'lecturer@mosgrachst.sch.ng', '2017-11-12 06:17:27'),
(318, 'Logged In', 'p.adeleke@trenchcoregroup.com', '2017-11-12 06:19:22'),
(319, 'Logged Out', 'p.adeleke@trenchcoregroup.com', '2017-11-12 06:22:28'),
(320, 'Logged In', 'lecturer@mosgrachst.sch.ng', '2017-11-12 06:22:38'),
(321, 'Logged In', 'lecturer@mosgrachst.sch.ng', '2017-11-12 06:23:22'),
(322, 'Logged In', 'lecturer@mosgrachst.sch.ng', '2017-11-12 06:24:15'),
(323, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-12 06:24:24'),
(324, 'Updated lecturer@mosgrachst.sch.ng Details ', 'infodesk@trenchcoregroup.com', '2017-11-12 06:39:10'),
(325, 'Logged Out', 'infodesk@trenchcoregroup.com', '2017-11-12 06:39:39'),
(326, 'Logged In', 'lecturer@mosgrachst.sch.ng', '2017-11-12 06:39:46'),
(327, 'Logged In', 'lecturer@mosgrachst.sch.ng', '2017-11-12 06:40:29'),
(328, 'Logged Out', 'lecturer@mosgrachst.sch.ng', '2017-11-12 06:41:30'),
(329, 'Logged In', 'mosgrachtb@gmail.com', '2017-11-15 13:28:52'),
(330, 'Logged In', 'mosgrachtb@gmail.com', '2017-11-15 16:09:56'),
(331, 'Logged In', 'mosgrachtb@gmail.com', '2017-11-15 18:11:15'),
(332, 'Logged In', 'lecturer@mosgrachst.sch.ng', '2017-11-16 15:57:14'),
(333, 'Updated lecturer@mosgrachst.sch.ng Details ', 'lecturer@mosgrachst.sch.ng', '2017-11-16 16:00:05'),
(334, 'Logged Out', 'lecturer@mosgrachst.sch.ng', '2017-11-16 16:00:26'),
(335, 'Logged In', 'p.adeleke@trenchcoregroup.com', '2017-11-16 16:05:18'),
(336, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-17 12:52:49'),
(337, 'Logged In', 'mosgrachtb@gmail.com', '2017-11-17 13:46:45'),
(338, 'Logged In', 'mosgrachtb@gmail.com', '2017-11-19 23:17:36'),
(339, 'Admitted MGCHST/DIP/1303', 'mosgrachtb@gmail.com', '2017-11-19 23:22:55'),
(340, 'Logged In', 'hod@mosgrachst.sch.ng', '2017-11-21 20:46:42'),
(341, 'Logged Out', 'hod@mosgrachst.sch.ng', '2017-11-21 21:06:43'),
(342, 'Logged In', 'mosgrachtb@gmail.com', '2017-11-21 21:09:36'),
(343, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-22 07:54:41'),
(344, 'Logged In', 'p.adeleke@trenchcoregroup.com', '2017-11-22 16:13:42'),
(345, 'Logged Out', 'p.adeleke@trenchcoregroup.com', '2017-11-22 16:14:34'),
(346, 'Logged In', 'lecturer@mosgrachst.sch.ng', '2017-11-22 16:15:21'),
(347, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-22 16:15:38'),
(348, 'infodesk@trenchcoregroup.com registered bursar@mosgrachst.sch.ng account', 'infodesk@trenchcoregroup.com', '2017-11-22 16:22:59'),
(349, 'Logged Out', 'infodesk@trenchcoregroup.com', '2017-11-22 16:23:11'),
(350, 'Logged In', 'bursar@mosgrachst.sch.ng', '2017-11-22 16:23:15'),
(351, 'Logged Out', 'bursar@mosgrachst.sch.ng', '2017-11-22 16:23:54'),
(352, 'Logged In', 'lecturer@mosgrachst.sch.ng', '2017-11-22 16:24:03'),
(353, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-22 16:24:51'),
(354, 'Updated  Details and Image ', 'infodesk@trenchcoregroup.com', '2017-11-22 16:26:10'),
(355, 'Logged Out', 'infodesk@trenchcoregroup.com', '2017-11-22 16:26:22'),
(356, 'Logged In', 'lecturer@mosgrachst.sch.ng', '2017-11-22 16:26:26'),
(357, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-22 16:26:41'),
(358, 'Deleted lecturer@mosgrachst.sch.ng User Details', 'infodesk@trenchcoregroup.com', '2017-11-22 16:27:06'),
(359, 'infodesk@trenchcoregroup.com registered lecturer@mosgrachst.sch.ng account', 'infodesk@trenchcoregroup.com', '2017-11-22 16:28:12'),
(360, 'Logged Out', 'infodesk@trenchcoregroup.com', '2017-11-22 16:28:22'),
(361, 'Logged In', 'lecturer@mosgrachst.sch.ng', '2017-11-22 16:29:31'),
(362, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-11-22 16:30:15'),
(363, 'Logged Out', 'infodesk@trenchcoregroup.com', '2017-11-22 16:35:46'),
(364, 'Logged In', 'mosgrachtb@gmail.com', '2017-11-22 16:40:42'),
(365, 'Logged In', 'mosgrachtb@gmail.com', '2017-12-01 09:18:18'),
(366, 'Logged In', 'mosgrachtb@gmail.com', '2017-12-03 16:49:29'),
(367, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-12-04 20:55:53'),
(368, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-12-07 19:19:27'),
(369, 'Logged In', 'infodesk@trenchcoregroup.com', '2017-12-22 09:39:59'),
(370, 'Logged In', 'tolajide74@gmail.com', '2017-12-28 12:25:45'),
(371, 'Logged Out', 'tolajide74@gmail.com', '2017-12-28 12:25:53'),
(372, 'Logged In', 'tolajide75@gmail.com', '2017-12-28 12:26:02'),
(373, 'Logged In', 'tolajide75@gmail.com', '2017-12-28 14:39:25'),
(374, 'Logged Out', 'tolajide75@gmail.com', '2017-12-28 16:33:43'),
(375, 'Logged In', 'tolajide74@gmail.com', '2017-12-28 16:33:50'),
(376, 'Confirmed Admission Payments for tobi@gmail.com and Transaction Number 9309393', 'tolajide74@gmail.com', '2017-12-28 16:34:20'),
(377, 'Logged Out', 'tolajide74@gmail.com', '2017-12-28 16:37:34'),
(378, 'Logged In', 'tolajide75@gmail.com', '2017-12-28 16:37:42'),
(379, 'Logged In', 'tolajide75@gmail.com', '2017-12-28 19:26:11'),
(380, 'Logged In', 'tolajide75@gmail.com', '2017-12-28 20:38:29'),
(381, 'Logged Out', 'tolajide75@gmail.com', '2017-12-28 21:31:43'),
(382, 'Logged In', 'tolajide75@gmail.com', '2017-12-29 06:09:48'),
(383, 'Logged In', 'tolajide75@gmail.com', '2017-12-29 18:00:51'),
(384, 'Logged In', 'tolajide75@gmail.com', '2017-12-29 18:02:04'),
(385, 'Deleted MGCHST/DIP/1303 Details', 'tolajide75@gmail.com', '2017-12-29 18:06:57'),
(386, 'Deleted MGCHST/DIP/0090 Details', 'tolajide75@gmail.com', '2017-12-29 18:07:59'),
(387, 'Added MGCHST/DIP/0001 Biodata Details', 'tolajide75@gmail.com', '2017-12-29 18:14:05'),
(388, 'Added MGCHST/DIP/0001 Qualification Details', 'tolajide75@gmail.com', '2017-12-29 18:16:08'),
(389, 'Deleted MGCHST/DFT/0303 Details', 'tolajide75@gmail.com', '2017-12-29 18:20:15'),
(390, 'Added MGCHST/DIP/0101 Biodata Details', 'tolajide75@gmail.com', '2017-12-29 19:23:17'),
(391, 'Added 343521 Qualification Details', 'tolajide75@gmail.com', '2017-12-29 19:33:50'),
(392, 'Deleted MGCHST221452 Details', 'tolajide75@gmail.com', '2017-12-29 20:30:17'),
(393, 'Logged Out', 'tolajide75@gmail.com', '2017-12-29 20:44:02'),
(394, 'Logged In', 'tolajide75@gmail.com', '2017-12-30 09:39:42'),
(395, 'Admitted MGCHST/DIP/0101', 'tolajide75@gmail.com', '2017-12-30 09:40:24'),
(396, 'Admitted MGCHST/DFT/0610', 'tolajide75@gmail.com', '2017-12-30 09:40:25'),
(397, 'Admitted MGCHST/DFT/1331', 'tolajide75@gmail.com', '2017-12-30 09:40:25'),
(398, 'Admitted MGCHST/DIP/1030', 'tolajide75@gmail.com', '2017-12-30 09:40:25'),
(399, 'Logged Out', 'tolajide75@gmail.com', '2017-12-30 09:40:42'),
(400, 'Logged In', 'tolajide75@gmail.com', '2017-12-30 10:17:05'),
(401, 'Logged Out', 'tolajide75@gmail.com', '2017-12-30 10:27:03'),
(402, 'Logged In', 'MGCHST/DIP/1331', '2017-12-30 16:05:57'),
(403, 'Logged Out', 'MGCHST/DIP/1331', '2017-12-30 16:11:59'),
(404, 'Logged In', 'MGCHST/DFT/1331', '2017-12-30 16:12:28'),
(405, 'Logged Out', 'MGCHST/DFT/1331', '2017-12-30 16:31:35'),
(406, 'Logged In', 'MGCHST/DIP/1030', '2017-12-30 16:32:14'),
(407, 'Updated His/Her Details', 'MGCHST/DIP/1030', '2017-12-30 17:51:33'),
(408, 'Updated His/Her Details', 'MGCHST/DIP/1030', '2017-12-30 17:54:35'),
(409, 'Updated His/Her Details', 'MGCHST/DIP/1030', '2017-12-30 18:09:44'),
(410, 'Updated His/Her Details', 'MGCHST/DIP/1030', '2017-12-30 18:12:18'),
(411, 'Logged Out', 'MGCHST/DIP/1030', '2017-12-30 18:22:58'),
(412, 'Logged In', 'MGCHST/DFT/1331', '2017-12-30 19:02:31'),
(413, 'Logged Out', 'MGCHST/DFT/1331', '2017-12-30 19:02:36'),
(414, 'Logged In', 'MGCHST/DFT/1331', '2017-12-30 19:05:34'),
(415, 'Updated His/Her Details', 'MGCHST/DFT/1331', '2017-12-30 19:06:47'),
(416, 'Logged Out', 'MGCHST/DFT/1331', '2017-12-30 19:07:58'),
(417, 'Logged In', 'MGCHST/DFT/1331', '2018-01-02 10:32:43'),
(418, 'Logged In', 'tolajide75@gmail.com', '2018-01-09 21:02:54'),
(419, 'Logged In', 'tolajide75@gmail.com', '2018-01-10 20:36:41'),
(420, 'Added MGCHST/DIP/0324 Biodata Details', 'tolajide75@gmail.com', '2018-01-10 20:41:37'),
(421, 'Added MGCHST305004 Qualification Details', 'tolajide75@gmail.com', '2018-01-10 20:48:16'),
(422, 'Logged Out', 'tolajide75@gmail.com', '2018-01-10 21:36:07'),
(423, 'Logged In', 'tolajide75@gmail.com', '2018-02-07 14:00:51'),
(424, 'Logged In', 'tolajide75@gmail.com', '2018-02-11 18:25:05'),
(425, 'Imported surname Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 18:48:13'),
(426, 'Imported surname Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 18:56:09'),
(427, 'Deleted MGCHST005340 Details', 'tolajide75@gmail.com', '2018-02-11 19:07:27'),
(428, 'Deleted MGCHST201531 Details', 'tolajide75@gmail.com', '2018-02-11 19:07:44'),
(429, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:33:45'),
(430, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:33:45'),
(431, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:33:45'),
(432, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:33:46'),
(433, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:33:46'),
(434, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:33:46'),
(435, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:33:46'),
(436, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:33:47'),
(437, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:33:47'),
(438, 'Logged Out', 'tolajide75@gmail.com', '2018-02-11 19:46:46'),
(439, 'Logged In', 'tolajide75@gmail.com', '2018-02-11 19:46:52'),
(440, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:47:25'),
(441, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:47:25'),
(442, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:47:25'),
(443, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:47:26'),
(444, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:47:26'),
(445, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:47:26'),
(446, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:47:27'),
(447, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:47:27'),
(448, 'Imported love Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 19:47:27'),
(449, 'Deleted MGCHST554044 Details', 'tolajide75@gmail.com', '2018-02-11 20:04:41'),
(450, 'Imported matricNumber Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:05:04'),
(451, 'Imported 123456 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:05:05'),
(452, 'Imported 789065 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:05:05'),
(453, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:05:05'),
(454, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:05:06'),
(455, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:05:06'),
(456, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:05:07'),
(457, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:05:07'),
(458, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:05:07'),
(459, 'Deleted MGCHST544001 Details', 'tolajide75@gmail.com', '2018-02-11 20:05:30'),
(460, 'Deleted MGCHST203043 Details', 'tolajide75@gmail.com', '2018-02-11 20:14:43'),
(461, 'Deleted MGCHST250002 Details', 'tolajide75@gmail.com', '2018-02-11 20:14:56'),
(462, 'Deleted MGCHST254553 Details', 'tolajide75@gmail.com', '2018-02-11 20:15:07'),
(463, 'Imported matricNumber Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:15:56'),
(464, 'Imported 123456 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:15:57'),
(465, 'Imported 789065 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:15:57'),
(466, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:15:57'),
(467, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:15:58'),
(468, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:15:58'),
(469, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:15:58'),
(470, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:15:59'),
(471, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-11 20:15:59'),
(472, 'Deleted MGCHST432441 Details', 'tolajide75@gmail.com', '2018-02-11 20:19:41'),
(473, 'Deleted MGCHST221020 Details', 'tolajide75@gmail.com', '2018-02-11 20:19:54'),
(474, 'Imported matricNumber Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:31:37'),
(475, 'Imported 123456 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:31:39'),
(476, 'Imported 789065 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:31:40'),
(477, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:31:41'),
(478, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:31:41'),
(479, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:31:42'),
(480, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:31:43'),
(481, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:31:43'),
(482, 'Deleted MGCHST043310 Details', 'tolajide75@gmail.com', '2018-02-12 11:32:21'),
(483, 'Imported matricNumber Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:32:44'),
(484, 'Imported 123456 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:32:45'),
(485, 'Imported 789065 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:32:45'),
(486, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:32:45'),
(487, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:32:46'),
(488, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:32:46'),
(489, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:32:46'),
(490, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:32:46'),
(491, 'Deleted MGCHST502532 Details', 'tolajide75@gmail.com', '2018-02-12 11:33:40'),
(492, 'Imported 123456 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:35:40'),
(493, 'Imported 789065 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:35:40'),
(494, 'Deleted MGCHST413322 Details', 'tolajide75@gmail.com', '2018-02-12 11:35:56'),
(495, 'Deleted MGCHST502532 Details', 'tolajide75@gmail.com', '2018-02-12 11:36:02'),
(496, 'Deleted MGCHST324001 Details', 'tolajide75@gmail.com', '2018-02-12 11:36:08'),
(497, 'Imported 123456 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:37:20'),
(498, 'Imported 789065 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:37:21'),
(499, 'Deleted MGCHST541305 Details', 'tolajide75@gmail.com', '2018-02-12 11:38:04'),
(500, 'Deleted MGCHST541305 Details', 'tolajide75@gmail.com', '2018-02-12 11:38:12'),
(501, 'Imported 123456 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:42:03'),
(502, 'Imported 789065 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:42:04'),
(503, 'Deleted MGCHST252212 Details', 'tolajide75@gmail.com', '2018-02-12 11:43:16'),
(504, 'Deleted MGCHST252212 Details', 'tolajide75@gmail.com', '2018-02-12 11:43:25'),
(505, 'Imported 123456 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:46:01'),
(506, 'Imported 789065 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 11:46:02'),
(507, 'Deleted MGCHST214344 Details', 'tolajide75@gmail.com', '2018-02-12 11:47:15'),
(508, 'Imported 123456 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:17:30'),
(509, 'Imported 789065 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:17:31'),
(510, 'Imported 123456 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:17:39'),
(511, 'Imported 789065 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:17:39'),
(512, 'Imported 123456 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:17:52'),
(513, 'Imported 789065 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:17:53'),
(514, 'Deleted MGCHST011104 Details', 'tolajide75@gmail.com', '2018-02-12 14:18:06'),
(515, 'Deleted MGCHST214344 Details', 'tolajide75@gmail.com', '2018-02-12 14:18:12'),
(516, 'Imported 1234 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:21:48'),
(517, 'Imported 5678 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:21:48'),
(518, 'Deleted MGCHST315314 Details', 'tolajide75@gmail.com', '2018-02-12 14:27:44'),
(519, 'Deleted MGCHST315314 Details', 'tolajide75@gmail.com', '2018-02-12 14:27:55'),
(520, 'Imported 1234 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:35:39'),
(521, 'Imported 5678 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:35:39'),
(522, 'Imported 1234 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:36:32'),
(523, 'Imported 5678 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:36:32'),
(524, 'Deleted MGCHST110203 Details', 'tolajide75@gmail.com', '2018-02-12 14:36:42'),
(525, 'Deleted MGCHST110203 Details', 'tolajide75@gmail.com', '2018-02-12 14:36:49'),
(526, 'Imported 1234 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:37:02'),
(527, 'Imported 5678 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:37:02'),
(528, 'Deleted MGCHST514141 Details', 'tolajide75@gmail.com', '2018-02-12 14:38:14'),
(529, 'Deleted MGCHST514141 Details', 'tolajide75@gmail.com', '2018-02-12 14:38:22'),
(530, 'Imported 1234 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:38:59'),
(531, 'Imported 5678 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:38:59'),
(532, 'Deleted MGCHST312254 Details', 'tolajide75@gmail.com', '2018-02-12 14:39:22'),
(533, 'Deleted MGCHST410020 Details', 'tolajide75@gmail.com', '2018-02-12 14:39:30'),
(534, 'Imported 1234 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:48:09'),
(535, 'Imported 5678 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 14:48:09'),
(536, 'Logged Out', 'tolajide75@gmail.com', '2018-02-12 14:52:02'),
(537, 'Logged In', 'tolajide75@gmail.com', '2018-02-12 20:30:32'),
(538, 'Deleted MGCHST030115 Details', 'tolajide75@gmail.com', '2018-02-12 20:43:27'),
(539, 'Deleted MGCHST312045 Details', 'tolajide75@gmail.com', '2018-02-12 20:43:33'),
(540, 'Imported matricNumber Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 20:43:50'),
(541, 'Imported 123456 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 20:43:50'),
(542, 'Imported 789065 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 20:43:50'),
(543, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 20:43:50'),
(544, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 20:43:51'),
(545, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 20:43:51'),
(546, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 20:43:51'),
(547, 'Imported  Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 20:43:51'),
(548, 'Deleted MGCHST302012 Details', 'tolajide75@gmail.com', '2018-02-12 20:44:04'),
(549, 'Deleted MGCHST152241 Details', 'tolajide75@gmail.com', '2018-02-12 20:44:36'),
(550, 'Deleted MGCHST222523 Details', 'tolajide75@gmail.com', '2018-02-12 20:44:47'),
(551, 'Deleted MGCHST415231 Details', 'tolajide75@gmail.com', '2018-02-12 20:44:59'),
(552, 'Imported 1234 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 20:45:22'),
(553, 'Imported 5678 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 20:45:23'),
(554, 'Deleted MGCHST315104 Details', 'tolajide75@gmail.com', '2018-02-12 20:47:14'),
(555, 'Deleted MGCHST442121 Details', 'tolajide75@gmail.com', '2018-02-12 20:47:24'),
(556, 'Imported 1234 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 20:47:41'),
(557, 'Imported 5678 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-12 20:47:41'),
(558, 'Deleted MGCHST105414 Details', 'tolajide75@gmail.com', '2018-02-14 13:54:02'),
(559, 'Deleted MGCHST510155 Details', 'tolajide75@gmail.com', '2018-02-14 13:54:08'),
(560, 'Imported 1234 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-14 13:54:41'),
(561, 'Imported 5678 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-14 13:54:41'),
(562, 'Deleted MGCHST020551 Details', 'tolajide75@gmail.com', '2018-02-14 13:58:17'),
(563, 'Deleted MGCHST530120 Details', 'tolajide75@gmail.com', '2018-02-14 13:58:25'),
(564, 'Imported matricNumber Biodata and  Details', 'tolajide75@gmail.com', '2018-02-14 14:04:29'),
(565, 'Imported 123456 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-14 14:04:30'),
(566, 'Imported 789065 Biodata and  Details', 'tolajide75@gmail.com', '2018-02-14 14:04:30'),
(567, 'Deleted MGCHST155322 Details', 'tolajide75@gmail.com', '2018-02-14 14:04:38');
INSERT INTO `activity` (`act_id`, `action`, `user_details`, `time_added`) VALUES
(568, 'Deleted MGCHST253211 Details', 'tolajide75@gmail.com', '2018-02-14 14:06:26'),
(569, 'Deleted MGCHST313501 Details', 'tolajide75@gmail.com', '2018-02-14 14:06:31'),
(570, 'Logged Out', 'tolajide75@gmail.com', '2018-02-14 14:06:37'),
(571, 'Logged In', 'tolajide74@gmail.com', '2018-02-17 21:10:06'),
(572, 'Logged Out', 'tolajide74@gmail.com', '2018-02-17 21:10:21'),
(573, 'Logged In', 'tolajide75@gmail.com', '2018-02-23 13:59:25'),
(574, 'tolajide75@gmail.com registered admission@gmail.com account', 'tolajide75@gmail.com', '2018-02-23 14:02:46'),
(575, 'Updated  Details and Image ', 'tolajide75@gmail.com', '2018-02-23 14:04:54'),
(576, 'Logged Out', 'tolajide75@gmail.com', '2018-02-23 14:05:15'),
(577, 'Logged In', 'admission@gmail.com', '2018-02-23 14:05:33'),
(578, 'Pend ', 'admission@gmail.com', '2018-02-23 14:12:08'),
(579, 'Pend ', 'admission@gmail.com', '2018-02-23 14:12:09'),
(580, 'Pend ', 'admission@gmail.com', '2018-02-23 14:12:09'),
(581, 'Pend ', 'admission@gmail.com', '2018-02-23 14:12:09'),
(582, 'Pend ', 'admission@gmail.com', '2018-02-23 14:13:09'),
(583, 'Pend ', 'admission@gmail.com', '2018-02-23 14:13:09'),
(584, 'Pend ', 'admission@gmail.com', '2018-02-23 14:13:10'),
(585, 'Pend ', 'admission@gmail.com', '2018-02-23 14:13:10'),
(586, 'Pend ', 'admission@gmail.com', '2018-02-23 14:13:24'),
(587, 'Admitted MGCHST/DFT/0301', 'admission@gmail.com', '2018-02-23 14:13:42'),
(588, 'Admitted MGCHST/DPT/3366', 'admission@gmail.com', '2018-02-23 14:13:42'),
(589, 'Admitted MGCHST/DIP/1003', 'admission@gmail.com', '2018-02-23 14:29:40'),
(590, 'Logged Out', 'admission@gmail.com', '2018-02-23 14:41:08'),
(591, 'Logged In', 'admission@gmail.com', '2018-02-23 15:08:45'),
(592, 'Logged In', 'tolajide74@gmail.com', '2018-02-23 15:09:24'),
(593, 'Logged Out', 'tolajide74@gmail.com', '2018-02-23 15:09:31'),
(594, 'Logged In', 'tolajide75@gmail.com', '2018-02-23 15:09:40'),
(595, 'Logged Out', 'tolajide75@gmail.com', '2018-02-23 15:09:57'),
(596, 'Logged In', 'admission@gmail.com', '2018-02-23 15:14:26'),
(597, 'Logged In', 'admission@gmail.com', '2018-02-23 15:14:43'),
(598, 'Logged In', 'tolajide75@gmail.com', '2018-02-23 15:14:58'),
(599, 'tolajide75@gmail.com registered testing@gmail.com account', 'tolajide75@gmail.com', '2018-02-23 15:16:09'),
(600, 'Logged Out', 'tolajide75@gmail.com', '2018-02-23 15:16:41'),
(601, 'Logged In', 'testing@gmail.com', '2018-02-23 15:16:59'),
(602, 'Logged In', 'admission@gmail.com', '2018-02-24 12:44:00'),
(603, 'Logged In', 'admission@gmail.com', '2018-02-24 12:44:14'),
(604, 'Logged In', 'admission@gmail.com', '2018-02-24 12:45:06'),
(605, 'Logged In', 'admission@gmail.com', '2018-02-24 12:45:38'),
(606, 'Logged Out', 'admission@gmail.com', '2018-02-24 12:45:46'),
(607, 'Logged In', 'admission@gmail.com', '2018-02-24 12:46:04'),
(608, 'Logged In', 'tolajide75@gmail.com', '2018-02-06 08:13:58'),
(609, 'Logged Out', 'tolajide75@gmail.com', '2018-02-06 08:30:04'),
(610, 'Logged In', 'tolajide75@gmail.com', '2018-02-09 14:34:15'),
(611, 'Added Public Health Department to the Department List', 'tolajide75@gmail.com', '2018-02-09 15:02:23'),
(612, 'Added Public Health Course to Department Public Health and Degree FT Programme', 'tolajide75@gmail.com', '2018-02-09 15:02:57'),
(613, 'Logged In', 'tolajide75@gmail.com', '2018-02-12 09:21:24'),
(614, ' Changed The Student Matric Number From 16/CHS/00011 to 16/CHS/00011/16/CHS/00011', 'tolajide75@gmail.com', '2018-02-12 09:53:16'),
(615, ' Changed The Student Matric Number From 16/CHS/00011/16/CHS/00011 to 16/CHS/00011', 'tolajide75@gmail.com', '2018-02-12 09:53:54'),
(616, 'Logged In', 'admission@gmail.com', '2018-02-13 15:21:17'),
(617, 'Logged Out', 'admission@gmail.com', '2018-02-13 15:34:51'),
(618, 'Logged In', 'tolajide75@gmail.com', '2018-02-13 15:34:57'),
(619, 'Added COMMUNITY HEALTH EXTENSION WORKER (CHEW) Course to Department Community Health Science ', 'tolajide75@gmail.com', '2018-02-13 16:33:13'),
(620, 'Updated COMMUNITY HEALTH EXTENSION WORKER (CHEW) Course Details', 'tolajide75@gmail.com', '2018-02-13 16:37:33'),
(621, 'Updated COMMUNITY HEALTH EXTENSION WORKER (CHEW) Course Details', 'tolajide75@gmail.com', '2018-02-13 16:42:46'),
(622, 'Added COMMUNITY HEALTH Course to Department Community Health Science ', 'tolajide75@gmail.com', '2018-02-13 16:44:26'),
(623, 'Added HEALTH ASSISTANT Course to Department Health Information Management ', 'tolajide75@gmail.com', '2018-02-13 16:46:05'),
(624, 'Added ENVIRONMENTAL HEALTH OFFICER (ND) Course to Department Environmental Health Science ', 'tolajide75@gmail.com', '2018-02-13 16:48:17'),
(625, 'Added ENVIRONMENTAL HEALTH TECHNICIAN Course to Department Environmental Health Science ', 'tolajide75@gmail.com', '2018-02-13 16:54:17'),
(626, 'Updated ENVIRONMENTAL HEALTH TECHNICIAN Course Details', 'tolajide75@gmail.com', '2018-02-13 16:55:58'),
(627, 'Added HEALTH PROMOTION AND EDUCATION Course to Department Health Information Management ', 'tolajide75@gmail.com', '2018-02-13 16:59:34'),
(628, 'Added HEALTH INFORMATION MANAGEMENT Course to Department Health Information Management ', 'tolajide75@gmail.com', '2018-02-13 17:00:53'),
(629, 'Added PROFESSIONAL DIPLOMA IN HEALTH INFORMATION MGT Course to Department Health Information Management ', 'tolajide75@gmail.com', '2018-02-13 17:02:28'),
(630, 'Added NUTRITION AND DIETETICS Course to Department Nutrition and Dietectics ', 'tolajide75@gmail.com', '2018-02-13 17:03:36'),
(631, 'Added NURSING SCIENCE Course to Department Nursing Science ', 'tolajide75@gmail.com', '2018-02-13 17:05:37'),
(632, 'Added NURSING AND MIDWIFERY Course to Department Nursing &amp; Midwifery ', 'tolajide75@gmail.com', '2018-02-13 17:07:41'),
(633, 'Added PUBLIC HEALTH SCIENCE Course to Department Public Health Science ', 'tolajide75@gmail.com', '2018-02-13 17:10:36'),
(634, 'Added nnn Department to the Department List', 'tolajide75@gmail.com', '2018-02-13 17:54:05'),
(635, 'Deleted  Department with  From the Department List', 'tolajide75@gmail.com', '2018-02-13 17:55:08'),
(636, 'Added Alabi Esther Tomilayo Department to the Department List', 'tolajide75@gmail.com', '2018-02-13 17:56:34'),
(637, 'Updated Alabi Esther TomilayoEE Department Abbrevation Name TEA', 'tolajide75@gmail.com', '2018-02-13 18:06:59'),
(638, 'Deleted TEA Department with  From the Department List', 'tolajide75@gmail.com', '2018-02-13 18:07:06'),
(639, 'Logged In', 'tolajide75@gmail.com', '2018-02-13 20:51:37'),
(640, 'Added hhhj Department to the Department List', 'tolajide75@gmail.com', '2018-02-13 20:52:06'),
(641, 'Updated jope Department Abbrevation Name aaa', 'tolajide75@gmail.com', '2018-02-13 20:52:28'),
(642, 'Added 1 Biodata Details', 'tolajide75@gmail.com', '2018-02-14 11:42:06'),
(643, 'Added 16/CHS/45534 Biodata Details', 'tolajide75@gmail.com', '2018-02-14 11:54:01'),
(644, 'Added 17/CHS/34313 Biodata Details', 'tolajide75@gmail.com', '2018-02-14 11:58:16'),
(645, 'Added MGCHST/17/CHS/DIP/44052 Biodata Details', 'tolajide75@gmail.com', '2018-02-14 11:58:56'),
(646, 'Added MGCHST152342 Qualification Details', 'tolajide75@gmail.com', '2018-02-14 12:01:32'),
(647, 'Added MGCHST/17/CHS/DIP/54125 Biodata Details', 'tolajide75@gmail.com', '2018-02-14 12:10:08'),
(648, 'Added MGCHST554205 Qualification Details', 'tolajide75@gmail.com', '2018-02-14 12:11:01'),
(649, 'Deleted MGCHST403523 Details', 'tolajide75@gmail.com', '2018-02-14 12:12:09'),
(650, 'Deleted MGCHST254220 Details', 'tolajide75@gmail.com', '2018-02-14 12:12:21'),
(651, 'Logged Out', 'tolajide75@gmail.com', '2018-02-14 12:12:32'),
(652, 'Logged In', 'tolajide75@gmail.com', '2018-02-14 13:06:21'),
(653, 'Logged Out', 'tolajide75@gmail.com', '2018-02-14 13:09:58'),
(654, 'Logged In', 'tolajide75@gmail.com', '2018-02-14 13:10:50'),
(655, 'Added Akinola Bamidele Details with 18-1114 Staff Number to the Staff List', 'tolajide75@gmail.com', '2018-02-14 13:13:45'),
(656, 'Logged Out', 'tolajide75@gmail.com', '2018-02-14 13:16:06'),
(657, 'Logged In', 'bamidele@gmail.com', '2018-02-14 13:16:12'),
(658, 'Logged Out', 'bamidele@gmail.com', '2018-02-14 13:16:47'),
(659, 'Logged In', 'tolajide75@gmail.com', '2018-02-14 13:16:53'),
(660, 'Added adio fatimah bukola Details with 18-4411 Staff Number to the Staff List', 'tolajide75@gmail.com', '2018-02-14 13:31:51'),
(661, 'Added IDOWU POPOOLA Details with 18-1174 Staff Number to the Staff List', 'tolajide75@gmail.com', '2018-02-14 13:36:07'),
(662, 'Added aluko emmanuel Details with 18-7177 Staff Number to the Staff List', 'tolajide75@gmail.com', '2018-02-14 13:40:15'),
(663, 'Added bamigbola kadijah Details with 18-7774 Staff Number to the Staff List', 'tolajide75@gmail.com', '2018-02-14 13:44:41'),
(664, 'Added babalola faruq Details with 18-4474 Staff Number to the Staff List', 'tolajide75@gmail.com', '2018-02-14 13:47:46'),
(665, 'Added jimoh lukmon Details with 18-1441 Staff Number to the Staff List', 'tolajide75@gmail.com', '2018-02-14 13:52:56'),
(666, 'Added fola tobi Details with 18-4111 Staff Number to the Staff List', 'tolajide75@gmail.com', '2018-02-14 13:55:21'),
(667, 'Added Taiwo lawal Details with 18-7414 Staff Number to the Staff List', 'tolajide75@gmail.com', '2018-02-14 13:58:15'),
(668, 'Logged Out', 'tolajide75@gmail.com', '2018-02-14 13:58:46'),
(669, 'Logged In', 'bamidele@gmail.com', '2018-02-14 14:00:40'),
(670, 'Allocated ADU326 to 17-1471', 'bamidele@gmail.com', '2018-02-14 14:02:48'),
(671, 'Allocated ADU225 to 17-1471', 'bamidele@gmail.com', '2018-02-14 14:07:15'),
(672, 'Allocated ACT226 to 18-1114', 'bamidele@gmail.com', '2018-02-14 14:09:13'),
(673, 'Allocated ACT226 to 18-1114', 'bamidele@gmail.com', '2018-02-14 14:10:01'),
(674, 'Allocated ACT226 to 17-1471', 'bamidele@gmail.com', '2018-02-14 14:16:35'),
(675, 'Allocated ACT226 to 17-1471', 'bamidele@gmail.com', '2018-02-14 14:18:31'),
(676, 'Allocated  to 18-1114', 'bamidele@gmail.com', '2018-02-14 14:47:45'),
(677, 'Allocated  to 18-1114', 'bamidele@gmail.com', '2018-02-14 14:48:45'),
(678, 'Allocated  to 18-1114', 'bamidele@gmail.com', '2018-02-14 14:49:18'),
(679, 'Logged In', 'bamidele@gmail.com', '2018-02-15 06:06:05'),
(680, 'Allocated ACT226 to 17-1471', 'bamidele@gmail.com', '2018-02-15 06:10:00'),
(681, 'Logged In', 'bamidele@gmail.com', '2018-02-15 08:10:25'),
(682, 'Added BIB223 to Community Health Science Departmental Course List', 'bamidele@gmail.com', '2018-02-15 08:15:20'),
(683, 'Added C A126 to Community Health Science Departmental Course List', 'bamidele@gmail.com', '2018-02-15 08:15:20'),
(684, 'Added CAC110 to Community Health Science Departmental Course List', 'bamidele@gmail.com', '2018-02-15 08:15:20'),
(685, 'Added CAC118 to Community Health Science Departmental Course List', 'bamidele@gmail.com', '2018-02-15 08:15:20'),
(686, 'Added CAC220 to Community Health Science Departmental Course List', 'bamidele@gmail.com', '2018-02-15 08:15:20'),
(687, 'Added CAC227 to Community Health Science Departmental Course List', 'bamidele@gmail.com', '2018-02-15 08:15:20'),
(688, 'Added CAC414 to Community Health Science Departmental Course List', 'bamidele@gmail.com', '2018-02-15 08:15:20'),
(689, 'Added CUL424 to Community Health Science Departmental Course List', 'bamidele@gmail.com', '2018-02-15 08:16:28'),
(690, 'Added DEV224 to Community Health Science Departmental Course List', 'bamidele@gmail.com', '2018-02-15 08:16:29'),
(691, 'Added DIA417 to Community Health Science Departmental Course List', 'bamidele@gmail.com', '2018-02-15 08:16:29'),
(692, 'Added EDU217 to Community Health Science Departmental Course List', 'bamidele@gmail.com', '2018-02-15 08:16:29'),
(693, 'Allocated  to 18-1114', 'bamidele@gmail.com', '2018-02-15 08:32:07'),
(694, 'Allocated  to 17-1471', 'bamidele@gmail.com', '2018-02-15 08:37:33'),
(695, 'Allocated  to 18-1114', 'bamidele@gmail.com', '2018-02-15 08:38:09'),
(696, 'Allocated  to 17-1471', 'bamidele@gmail.com', '2018-02-15 10:18:25'),
(697, 'Allocated  to 17-1471', 'bamidele@gmail.com', '2018-02-15 10:18:59'),
(698, 'Allocated  to 17-1471', 'bamidele@gmail.com', '2018-02-15 10:26:22'),
(699, 'Allocated  to 17-1471', 'bamidele@gmail.com', '2018-02-15 10:26:42'),
(700, 'Allocated  to 17-1471', 'bamidele@gmail.com', '2018-02-15 10:35:57'),
(701, 'De-Allocated  From 18-1114 to 17-1471', 'bamidele@gmail.com', '2018-02-15 21:02:04'),
(702, 'De-Allocated  From 18-1114 to 17-1471', 'bamidele@gmail.com', '2018-02-15 21:02:04'),
(703, 'De-Allocated  From 18-1114 to 17-1471', 'bamidele@gmail.com', '2018-02-15 21:02:04'),
(704, 'De-Allocated  From 17-1471 to 18-1114', 'bamidele@gmail.com', '2018-02-15 21:03:19'),
(705, 'De-Allocated  From 17-1471 to 18-1114', 'bamidele@gmail.com', '2018-02-15 21:03:40'),
(706, 'De-Allocated  From Akinola Bamidele to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 21:13:28'),
(707, 'De-Allocated  From Akinola Bamidele to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 21:17:01'),
(708, 'De-Allocated BIB223 From Folake Damilola Solape to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 21:20:51'),
(709, 'De-Allocated  From Folake Damilola Solape to Akinola Bamidele', 'bamidele@gmail.com', '2018-02-15 21:21:14'),
(710, 'De-Allocated BIB223 From Akinola Bamidele to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 21:21:39'),
(711, 'De-Allocated  From Folake Damilola Solape to Akinola Bamidele', 'bamidele@gmail.com', '2018-02-15 21:22:37'),
(712, 'De-Allocated EDU217 From Akinola Bamidele to Akinola Bamidele', 'bamidele@gmail.com', '2018-02-15 21:25:57'),
(713, 'De-Allocated  From Akinola Bamidele to Akinola Bamidele', 'bamidele@gmail.com', '2018-02-15 21:26:13'),
(714, 'De-Allocated EDU217 From Akinola Bamidele to Akinola Bamidele', 'bamidele@gmail.com', '2018-02-15 21:26:46'),
(715, 'De-Allocated  From Folake Damilola Solape to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 21:31:19'),
(716, 'De-Allocated DIA417 From Folake Damilola Solape to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 21:33:01'),
(717, 'De-Allocated  From Folake Damilola Solape to Akinola Bamidele', 'bamidele@gmail.com', '2018-02-15 21:33:15'),
(718, 'De-Allocated 9 From Akinola Bamidele to Akinola Bamidele', 'bamidele@gmail.com', '2018-02-15 21:34:51'),
(719, 'De-Allocated C A126 From Akinola Bamidele to Akinola Bamidele', 'bamidele@gmail.com', '2018-02-15 21:41:00'),
(720, 'De-Allocated  From Folake Damilola Solape to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 21:41:10'),
(721, 'De-Allocated BIB223 From Folake Damilola Solape to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 21:41:27'),
(722, 'De-Allocated  From Folake Damilola Solape to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 21:48:04'),
(723, 'De-Allocated CAC110 From Folake Damilola Solape to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 21:48:58'),
(724, 'De-Allocated  From Folake Damilola Solape to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 21:49:07'),
(725, 'De-Allocated C A126 From Folake Damilola Solape to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 21:51:05'),
(726, 'De-Allocated  From Akinola Bamidele to Akinola Bamidele', 'bamidele@gmail.com', '2018-02-15 21:51:15'),
(727, 'De-Allocated CAC118 From Akinola Bamidele to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 21:52:05'),
(728, 'De-Allocated  From Folake Damilola Solape to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 21:52:30'),
(729, 'De-Allocated CAC220 From Folake Damilola Solape to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 21:54:41'),
(730, 'De-Allocated CAC220 From Folake Damilola Solape to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 22:00:42'),
(731, 'De-Allocated CAC220 From Folake Damilola Solape to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 22:00:50'),
(732, 'De-Allocated CAC118 From Folake Damilola Solape to Folake Damilola Solape', 'bamidele@gmail.com', '2018-02-15 22:01:01'),
(733, 'De-Allocated CAC118 From Folake Damilola Solape to Akinola Bamidele', 'bamidele@gmail.com', '2018-02-15 22:01:11'),
(734, 'De-Allocated \r\nNotice:  Undefined index: course_code in C:XAMPPhtdocsmosgrachst.sch.ngmgchst-administratordepartmentedit-allocated-course.php on line 122 From Akinola Bamidele to Akinola Bamidele', 'bamidele@gmail.com', '2018-02-15 22:01:32'),
(735, 'Logged Out', 'bamidele@gmail.com', '2018-02-17 10:45:22'),
(736, 'Logged In', 'tolajide75@gmail.com', '2018-02-17 10:47:02'),
(737, 'Admitted MGCHST/DPT/3303', 'tolajide75@gmail.com', '2018-02-17 10:47:27'),
(738, 'Admitted MGCHST/DPT/3303', 'tolajide75@gmail.com', '2018-02-17 10:47:27'),
(739, 'Admitted MGCHST/DPT/3110', 'tolajide75@gmail.com', '2018-02-17 10:47:42'),
(740, 'Admitted MGCHST/DPT/0100', 'tolajide75@gmail.com', '2018-02-17 10:47:43'),
(741, 'Logged In', 'MGCHST/DPT/0100', '2018-02-17 10:48:40'),
(742, 'Updated His/Her Details', 'MGCHST/DPT/0100', '2018-02-17 10:50:49'),
(743, 'Logged In', 'tolajide75@gmail.com', '2018-02-17 11:01:15'),
(744, 'Logged Out', 'tolajide75@gmail.com', '2018-02-17 11:02:08'),
(745, 'Logged In', 'admission@gmail.com', '2018-02-17 11:02:17'),
(746, 'Logged Out', 'admission@gmail.com', '2018-02-17 18:21:59'),
(747, 'Logged In', 'MGCHST/DPT/0100', '2018-02-17 20:15:23'),
(748, 'Logged Out', 'MGCHST/DPT/0100', '2018-02-17 20:46:25'),
(749, 'Logged In', '16/NSC/00074', '2018-02-17 20:46:55'),
(750, 'Logged Out', '16/NSC/00074', '2018-02-17 21:54:45'),
(751, 'Logged In', '16/NSC/00075', '2018-02-17 21:57:52'),
(752, 'Logged Out', '16/NSC/00075', '2018-02-17 21:59:45'),
(753, 'Logged In', 'MGCHST/DPT/0100', '2018-02-17 21:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `user_id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_level` int(1) NOT NULL,
  `time_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`user_id`, `full_name`, `user_name`, `password`, `access_level`, `time_registered`) VALUES
(1, 'Adesina Taiwo Olajumoke Hope', 'tolajide74@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 2, '2017-11-02 20:46:52'),
(2, 'Adesina Taiwo Olajide Eniolorunopa', 'tolajide75@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 1, '2017-09-18 09:10:51'),
(19, 'Moses Osaro', 'mosgrachtb@gmail.com', '68f86c77ccd54389c28c100ee2114df3c8f946ee', 5, '2018-02-23 13:59:13'),
(20, 'Admin Trenchcore Group', 'infodesk@trenchcoregroup.com', '04e24e361925ac0f321810d04ea3eb2e39534182', 1, '2017-11-02 21:24:11'),
(21, 'Admin Burser', 'burser@gmail.com', '67102d9200ff6e4ff19873ff9383e5ad76a71570', 2, '2017-11-03 06:17:52'),
(22, 'Adeleke Philips', 'p.adeleke@trenchcoregroup.com', '04e24e361925ac0f321810d04ea3eb2e39534182', 3, '2017-11-12 06:07:02'),
(23, 'Moses &amp; Grace HOD', 'hod@mosgrachst.sch.ng', '76c580f0e3e4c9061b71a0636aee421ebf678b6e', 3, '2018-02-23 14:04:54'),
(25, 'Folake Damilola Solape', 'sola@gmail.com', '097c8c9ce0c329b7137f24e8441e662ef3d9d7b8', 3, '2017-11-07 15:57:04'),
(26, 'MOSGRAC Bursar', 'bursar@mosgrachst.sch.ng', '0b3ec54a40941617aaf13b1896981e034174e8e1', 2, '2017-11-22 16:22:59'),
(27, 'Lazarus (Lecturer)', 'lecturer@mosgrachst.sch.ng', 'e396e1603df698c2790c6fc772b2e258a6234b23', 4, '2017-11-22 16:28:12'),
(28, 'Adedeji Omobosola', 'admission@gmail.com', '341604db7002e80e9ade98b07ea6386b53b77e12', 5, '2018-02-23 14:02:46'),
(29, 'Testing Admision', 'testing@gmail.com', 'dc724af18fbdd4e59189f5fe768a5f8311527050', 5, '2018-02-23 15:16:09'),
(30, 'Akinola Bamidele', 'bamidele@gmail.com', 'aa8b6f8f9bc916fc0b60b77745df0335c49de043', 3, '2018-02-14 13:13:45'),
(31, 'adio fatimah bukola', 'adioFatimah@gmail.com', '84ed1cc2e2afb5ff0dbf44d93fbdb9fad172b174', 3, '2018-02-14 13:31:51'),
(32, 'IDOWU POPOOLA', 'IDOWUPOPOOLA@GMAIL.COM', 'b6ca5690310c2131776a86af28944c31c202f6e5', 1, '2018-02-14 13:36:06'),
(33, 'aluko emmanuel', 'alukoemmanuel@gmail.com', 'e76820c5c95b73adba74bec35ab183fc995fcaba', 2, '2018-02-14 13:40:15'),
(34, 'bamigbola kadijah', 'bamigbolakadijah@gmail.com', 'ef9a99a67c5283942453b3d3d74c0c4db574e641', 4, '2018-02-14 13:44:41'),
(35, 'babalola faruq', 'babalolafaruq@gmail.com', '5c9bfe0c84158cbb06fa471de243df6e9e861159', 4, '2018-02-14 13:47:46'),
(36, 'jimoh lukmon', 'lukmonjimoh@gmail.com', '7fc65e577a786bf5fdc777435d085d6d9e2e36a9', 4, '2018-02-14 13:52:56'),
(37, 'fola tobi', 'folatobi@gmail.com', 'cff5f1265f50e6f81e5f3d1da643a658e941250b', 4, '2018-02-14 13:55:21'),
(38, 'Taiwo lawal', 'taiwotobi@gmai.com', '2d319b74ebd7fd9436176e426e8eaedb52230d63', 4, '2018-02-14 13:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `admission_id` int(255) NOT NULL,
  `regNumber` varchar(255) NOT NULL,
  `student_matric_num` varchar(255) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `prog_id` int(255) NOT NULL,
  `level` varchar(3) NOT NULL,
  `admission_status` int(1) NOT NULL,
  `admission_year` varchar(10) NOT NULL,
  `time_admitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`admission_id`, `regNumber`, `student_matric_num`, `dept_name`, `prog_id`, `level`, `admission_status`, `admission_year`, `time_admitted`) VALUES
(28, 'MGCHST325240', '16/NSC/00002', 'Nursing &amp; Midwifery', 1, '300', 1, '', '2018-01-12 06:22:48'),
(29, 'MGCHST310522', '16/NSC/000003', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-11 05:22:13'),
(30, 'MGCHST515142', '16/NSC/00004', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-11 05:28:03'),
(31, 'MGCHST014141', '16/NSC/00005', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-11 05:40:08'),
(32, 'MGCHST102203', '16/NSC/00006', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-02-06 14:36:28'),
(33, 'MGCHST151310', '16/HIM/00007', 'Health Information', 3, '300', 1, '', '2018-02-09 12:55:25'),
(34, 'MGCHST011004', '16/NSC/00008', 'Nursing &amp; Midwifery', 1, '300', 1, '', '2018-01-18 11:28:27'),
(35, 'MGCHST024000', '16/NSC/00009', 'Nursing &amp; Midwifery', 1, '300', 1, '', '2018-01-18 11:49:30'),
(36, 'MGCHST201404', '16/NSC/00010', 'Nursing &amp; Midwifery', 1, '300', 1, '', '2018-01-18 12:13:26'),
(38, 'MGCHST112212', '16/NSC/00012', 'Nursing &amp; Midwifery', 1, '300', 1, '', '2018-01-18 12:38:01'),
(40, 'MGCHST053421', '16/HIM/00014', 'Health Information', 1, '300', 1, '', '2018-02-09 12:55:36'),
(41, 'MGCHST524435', '16/HIM/00015', 'Health Information', 1, '300', 1, '', '2018-02-09 12:55:43'),
(42, 'MGCHST222204', '16/HIM/00016', 'Health Information', 3, '300', 1, '', '2018-02-09 12:56:01'),
(43, 'MGCHST253143', '16/HIM/00017', 'Health Information', 1, '300', 1, '', '2018-02-09 12:56:08'),
(44, 'MGCHST311030', '16/HIM/00018', 'Health Information', 1, '300', 1, '', '2018-02-09 12:56:18'),
(45, 'MGCHST455403', '16/HIM/00019', 'Health Information', 3, '300', 1, '', '2018-02-09 12:56:28'),
(46, 'MGCHST331045', '16/NSC/00020', 'Nursing &amp; Midwifery', 1, '300', 1, '', '2018-01-18 15:37:04'),
(48, 'MGCHST542304', '16/HIM/00022', 'Health Information', 1, '300', 1, '', '2018-02-09 12:56:42'),
(49, 'MGCHST354204', '16/CHS/00011', 'Community Health', 3, '300', 1, '', '2018-02-12 09:53:53'),
(50, 'MGCHST024113', '16/HIM/00026', 'Health Information', 3, '300', 1, '', '2018-02-09 12:57:01'),
(51, 'MGCHST504301', '16/NSC/00024', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-20 11:34:54'),
(56, 'MGCHST025113', '16/NSC/00027', 'Nursing &amp; Midwifery', 1, '300', 1, '', '2018-01-23 09:17:44'),
(57, 'MGCHST452303', '16/NSC/00028', 'Nursing &amp; Midwifery', 1, '300', 1, '', '2018-01-23 09:39:09'),
(58, 'MGCHST020333', '16/NSC/00025', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-23 09:59:35'),
(59, 'MGCHST430554', '16/NSC/00011', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-23 10:26:10'),
(60, 'MGCHST112214', '16/PHS/00013', 'Community Health', 1, '300', 1, '', '2018-02-07 16:25:53'),
(61, 'MGCHST411125', '16/NSC/00030', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-23 11:04:29'),
(62, 'MGCHST100233', '16/NSC/00031', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-23 13:25:02'),
(63, 'MGCHST432304', '16/NSC/00032', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-23 13:52:34'),
(64, 'MGCHST304430', '16/NSC/0001', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-23 14:09:42'),
(65, 'MGCHST100040', '16/NSC/00033', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-23 14:25:22'),
(66, 'MGCHST023520', '16/NSC/00034', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-23 14:47:57'),
(67, 'MGCHST031201', '16/NSC/00035', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-23 15:04:30'),
(68, 'MGCHST123525', '16/NSC/00036', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-23 15:10:13'),
(69, 'MGCHST403401', '16/NSC/00037', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-23 19:18:39'),
(70, 'MGCHST010435', '16/NSC/00038', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-23 19:31:13'),
(71, 'MGCHST105134', '16/NSC/00039', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-23 19:47:02'),
(72, 'MGCHST054415', '16/NSC/00040', 'Community Health', 1, '300', 1, '', '2018-01-23 20:20:52'),
(73, 'MGCHST435534', '16/NSC/00041', 'Community Health', 1, '300', 1, '', '2018-01-23 20:47:13'),
(74, 'MGCHST530222', '16/NSC/00042', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-24 07:23:42'),
(75, 'MGCHST341130', '16/NSC/00043', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-24 07:38:14'),
(76, 'MGCHST304235', '16/NSC/00044', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-24 07:52:42'),
(77, 'MGCHST443225', '16/NSC/00045', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-24 08:13:16'),
(78, 'MGCHST351204', '16/NSC/00046', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-24 08:28:23'),
(79, 'MGCHST304432', '16/NSC/00047', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-24 08:43:20'),
(80, 'MGCHST022523', '16/NSC/00048', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-24 09:11:03'),
(81, 'MGCHST015225', '16/NSC/00049', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-24 09:19:10'),
(83, 'MGCHST012231', '16/NSC/00051', 'Nursing &amp; Midwifery', 1, '300', 1, '', '2018-01-24 12:41:04'),
(84, 'MGCHST530312', '16/NSC/00052', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-24 12:55:12'),
(85, 'MGCHST024350', '16/NSC/00053', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-24 13:06:35'),
(86, 'MGCHST142145', '16/NSC/00054', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-24 13:15:12'),
(87, 'MGCHST311151', '16/PHS/00012', 'Community Health', 1, '300', 1, '', '2018-02-07 16:20:41'),
(88, 'MGCHST113003', '16/NSC/00056', 'Community Health', 1, '300', 1, '', '2018-01-24 14:32:35'),
(89, 'MGCHST415101', '16/PHS/00010', 'Community Health', 1, '300', 1, '', '2018-02-07 16:33:42'),
(90, 'MGCHST432433', '16/NSC/00058', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-24 15:21:56'),
(91, 'MGCHST301005', '16/NSC/00059', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-01-24 15:30:33'),
(94, 'MGCHST555050', '16/NSC/00060', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-02-05 09:23:44'),
(95, 'MGCHST554055', '16/NSC/00061', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-02-05 09:36:46'),
(96, 'MGCHST252521', '16/NSC/00062', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-02-05 09:52:06'),
(97, 'MGCHST531534', '16/NSC/00063', 'Nursing &amp; Midwifery', 1, '300', 1, '', '2018-02-05 10:47:09'),
(98, 'MGCHST420143', '16/NSC/00064', 'Community Health', 3, '300', 1, '', '2018-02-05 14:16:58'),
(99, 'MGCHST035124', '16/NSC/00065', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-02-05 14:54:20'),
(101, 'MGCHST151042', '16/NSC/00067', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-02-07 10:34:18'),
(102, 'MGCHST400110', '16/NSC/00068', 'Nursing &amp; Midwifery', 1, '300', 1, '', '2018-02-07 10:57:25'),
(103, 'MGCHST540525', '16/NSC/00069', 'Community Health', 1, '300', 1, '', '2018-02-07 11:10:37'),
(104, 'MGCHST515532', '16/NSC/00070', 'Nursing &amp; Midwifery', 1, '300', 1, '', '2018-02-07 11:20:53'),
(105, 'MGCHST513224', '16/NSC/00071', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-02-07 11:31:36'),
(106, 'MGCHST502120', '16/NSC/00072', 'Community Health', 3, '300', 1, '', '2018-02-07 11:39:36'),
(107, 'MGCHST535103', '16/NSC/00073', 'Community Health', 3, '300', 1, '', '2018-02-07 11:47:40'),
(108, 'MGCHST203134', '16/NSC/00074', 'Nursing &amp; Midwifery', 1, '300', 1, '', '2018-02-07 12:01:54'),
(109, 'MGCHST332312', '16/NSC/00075', 'Nursing &amp; Midwifery', 3, '300', 1, '', '2018-02-07 14:40:33'),
(112, 'MGCHST124215', '17/CHS/34313', 'Community Health Science', 3, '100', 1, '2017', '2018-02-14 11:58:16'),
(113, 'MGCHST152342', 'MGCHST/17/CHS/DIP/44052', 'Community Health Science', 2, '100', 1, '', '2018-02-14 13:08:19'),
(114, 'MGCHST554205', 'MGCHST/17/CHS/DIP/54125', 'Community Health Science', 3, '100', 1, '', '2018-02-14 12:11:49'),
(115, 'MGCHST255311', 'MGCHST/DPT/3303', 'Community Health Science', 0, '100', 1, '', '2018-02-17 10:47:27'),
(116, 'MGCHST552520', 'MGCHST/DPT/3303', 'Community Health Science', 0, '100', 1, '', '2018-02-17 10:47:27'),
(117, 'MGCHST255311', 'MGCHST/DPT/3110', 'Community Health Science', 0, '100', 1, '', '2018-02-17 10:47:42'),
(118, 'MGCHST552520', 'MGCHST/DPT/0100', 'Community Health Science', 0, '100', 1, '', '2018-02-17 10:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `admission_payment`
--

CREATE TABLE `admission_payment` (
  `pay_id` int(255) NOT NULL,
  `amount` varchar(4) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `teller_number` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `transaction_number` varchar(255) NOT NULL,
  `payment_status` int(1) NOT NULL,
  `time_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission_payment`
--

INSERT INTO `admission_payment` (`pay_id`, `amount`, `bank_name`, `teller_number`, `student_email`, `transaction_number`, `payment_status`, `time_uploaded`) VALUES
(1, '5000', 'Diamond Bank Plc.', '12345', 'tolajide74@gmail.com', '0699009', 1, '2017-11-03 06:38:41'),
(2, '5000', 'Diamond Bank Plc.', '887557', 'kolade@gmail.com', '6961060', 1, '2017-11-03 06:31:07'),
(8, '5000', 'Diamond Bank Plc.', '536754', 'new@gmail.com', '0319061', 1, '2017-11-07 15:34:35'),
(9, '5000', 'Diamond Bank Plc.', '097633', 'kolade@gmail.com', '9600990', 1, '2017-11-03 06:28:15'),
(10, '5000', 'Diamond Bank Plc.', '453436', 'hope@gmail.com', '0906106', 1, '2017-11-07 15:34:35'),
(11, '5000', 'Diamond Bank Plc.', '243553', 'jos@gmail.com', '9911013', 0, '2017-11-07 15:37:21'),
(12, '5000', 'Diamond Bank Plc.', '244422', 'fo@gmail.com', '3009909', 0, '2017-11-03 13:24:36'),
(13, '5000', 'Diamond Bank Plc.', '080766', 'k@gmail.com', '9011699', 0, '2017-11-07 15:37:21'),
(14, '5000', 'Diamond Bank Plc.', '096633', 'me@gmail.com', '3119096', 0, '2017-11-07 15:37:21'),
(15, '5000', 'UBA Bank', '22998721', 'philips.fredrick@gmail.com', '9030190', 0, '2017-11-25 13:21:20'),
(16, '5000', 'Stanbic IBTC Bank', '09090900', 'tobi@gmail.com', '9309393', 1, '2017-12-28 16:34:20'),
(17, '5000', '-- Select the Bank Name --', '090989090', 'tobi@gmail.com', '9300690', 0, '2017-12-29 20:40:56'),
(18, '5000', 'Zenith Bank', '134231', 'temitayo@gmail.com', '9996900', 0, '2018-01-10 20:35:38'),
(19, '5000', 'Fidelity Bank', '647867787', 'temitayo@gmail.com', '9999601', 0, '2018-02-13 21:52:35'),
(20, '5000', '-- Select the Bank Name --', '09887676879', 'temitayo@gmail.com', '9900609', 0, '2018-02-13 22:00:14'),
(21, '5000', 'Unity Bank', '09786880', 'fred@gmail.com', '0930996', 0, '2018-02-14 13:46:18'),
(22, '5000', 'First Bank', '56565656', 'fredolala@gmail.com', '0913360', 0, '2018-02-13 17:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `admission_registration_step1`
--

CREATE TABLE `admission_registration_step1` (
  `reg_id` int(255) NOT NULL,
  `passport_url` text NOT NULL,
  `regNumber` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `other_names` varchar(255) NOT NULL,
  `date_birth` varchar(20) NOT NULL,
  `state_origin` varchar(255) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `student_email` text NOT NULL,
  `address` text NOT NULL,
  `dept_id` varchar(255) NOT NULL,
  `prog_id` varchar(255) NOT NULL,
  `procourse_id` varchar(255) NOT NULL,
  `nationality` text NOT NULL,
  `sex` varchar(6) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `kin_name` varchar(255) NOT NULL,
  `kin_phone` varchar(13) NOT NULL,
  `kid_address` text NOT NULL,
  `admission_status` int(1) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `level_id` varchar(255) NOT NULL,
  `time_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission_registration_step1`
--

INSERT INTO `admission_registration_step1` (`reg_id`, `passport_url`, `regNumber`, `surname`, `other_names`, `date_birth`, `state_origin`, `phone_number`, `student_email`, `address`, `dept_id`, `prog_id`, `procourse_id`, `nationality`, `sex`, `marital_status`, `kin_name`, `kin_phone`, `kid_address`, `admission_status`, `religion`, `level_id`, `time_registered`) VALUES
(1, 'download1.jpg', 'MGCHST552520', 'Akingbola', 'Kemi Deborah', '2017-10-01', 'Imo', '08087645411', 'deborah@gmail.com', 'Number 4 Price O'' Street Ororuwo Osun State Nigeria.', '0', '0', '1', 'Nigerian', 'Female', 'Single', 'Kunle', '09098892677', 'Address', 1, 'Christanity', '0', '2018-02-17 10:50:49'),
(4, 'download (1).jpg', 'MGCHST351053', 'Hammed', 'Balogun Ibrahim', '2017-01-01', 'Gombe', '08165348754', 'balogun@gmail.com', 'Prince O Area Ororuwo Osun State', '0', '0', '2', 'Nigerian', 'Male', '', '', '', '', 1, '0', '0', '2017-11-07 14:33:05'),
(7, 'nol.jpg', 'MGCHST515502', 'Adeoba', 'Samuel Jesse', '2001-10-02', 'Outside Nigeria', '08165373322', 'samuel@gmail.com', 'Ifetedo Area Avenue Iloko Ijesha', '0', '0', '2', 'Others', 'Male', '', '', '', '', 0, '0', '0', '2018-01-18 16:57:34'),
(9, 'stu.jpg', 'MGCHST222100', 'Onikola', 'Bukola', '2000-10-08', 'Kwara', '09077553356', 'bukla@gmail.com', 'Kwara State Nigeria', '0', '0', '9', 'Nigerian', 'Male', '', '', '', '', 0, '0', '0', '2017-11-07 14:29:35'),
(11, 'Ebooks.jpg', 'MGCHST055411', 'Raheem', 'Saheed Hammed', '2017-10-29', 'Edo', '08087755446', 'saheed@gmail.com', 'Edo STate', '0', '0', '2', 'Nigerian', 'Male', '', '', '', '', 0, '0', '0', '2017-11-07 14:32:31'),
(14, 'teacher.jpg', 'MGCHST314003', 'George', 'Charles Faiths', '2017-11-05', 'Cross River', '09087664477', 'k@gmail.com', 'My Address New Home', '0', '0', '9', 'Nigerian', 'Male', '', '', '', '', 0, '0', '0', '2018-02-02 11:52:29'),
(16, 'new-logo.png', 'MGCHST255311', 'Adeboye', 'Sola', '1987-11-21', 'Osun', '08034567890', 'cadastral2003@yahoo.com', 'Ibadan', '0', '0', '2', 'Nigerian', 'Male', '', '', '', '', 1, '0', '0', '2018-02-17 10:47:27'),
(17, 'Snapshot_20161125.JPG', 'MGCHST145124', 'Osaro', 'Daniel N.', '1999-11-17', 'Edo', '08034269308', 'idu_saro@yahoo.com', 'Sokoto, TAmaje', '0', '0', '8', 'Nigerian', 'Male', '', '', '', '', 1, '0', '0', '2017-11-19 22:22:55'),
(18, '30-day-money-back[1].png', 'MGCHST125340', 'NEW', 'STUDENT REG', '2017-11-14', 'Ekiti', '090896767676', 'neemw@gmail.com', 'New House', '0', '0', '6', 'Nigerian', 'Male', '', '', '', '', 0, '0', '0', '2017-11-19 05:38:14'),
(19, 'images (4).jpg', 'MGCHST330323', 'nwiuch ughi', 'n vwoyw89v yw8 ict98', '2017-11-16', 'Abia', '00908748444', 'akinsola@gmail.com', 'Hoaue', '0', '0', '1', 'Nigerian', 'Male', '', '', '', '', 0, '0', '0', '2017-11-19 06:17:32'),
(20, 'New-2017-Anti-theft-Backpack-With-Water-Repellent-Fabric-Shockproof-7830934_2.jpg', 'MGCHST201531', 'Jethro', 'Fredrick JohnBoston', '1992-07-17', 'Ondo', '07031254935', 'philips.fredrick@gmail.com', 'Koko Road Sokoto', '0', '0', '5', 'Nigerian', 'Male', '', '', '', '', 0, '0', '0', '2018-01-03 09:10:52'),
(21, '70ab8cc956cdcc90d5e3c7901b5ac2c4--medicine-ball-black-fitness.jpg', 'MGCHST401125', 'Ajibade', 'Tobi Gabreal', '1990-11-26', 'Anambra', '09077665464', 'tobi@gmail.com', 'Aaagba Osun State Nigerai\r\nAaagba Osun State NigeraiAaagba Osun State NigeraiAaagba Osun State NigeraiAaagba Osun State NigeraiAaagba Osun State NigeraiAaagba Osun State NigeraiAaagba Osun State NigeraiAaagba Osun State Nigerai', '0', '0', '17', 'Nigerian', 'Male', '', '', '', '', 0, '0', '0', '2017-12-28 15:28:07'),
(30, 'IMG_20171113_114639.jpg', 'MGCHST343521', 'Adegoke', 'Forley Hope', '2017-12-03', 'Abuja FCT', '09076653244', 'hopye@gmail.com', 'Osun State', 'Environmental', '1', '15', 'Nigerian', 'Male', 'Married', 'Mr Daniel', '098997657788', 'Osun STate', 0, 'Islam', '200', '2018-01-18 16:57:34'),
(31, 'WhatsApp Image.jpeg', 'MGCHST445214', 'AHMAD', 'RABIU', '1986-12-01', 'Sokoto', '08034985368', 'rabiunaguru@gmail.com', 'No. 42 Aliu Quarters Bado Area, Sokoto State', 'Community Health', '1', '19', 'Nigerian', 'Male', 'Single', 'Aliyu Ahmad', '08032898464', 'No. 42 Aliu Quarters Bado Area, Sokoto State', 0, 'Islam', '100', '2018-01-18 16:57:34'),
(32, 'Ahmad Rabiu.jpg', 'MGCHST104533', 'AHMAD', 'RABIU', '2018-01-10', 'Sokoto', '08034985368', 'rabiunaguru@gmail.com', 'No. 42 Aliu Quarters Bado Area, Sokoto State', 'Nursing &amp; Midwifery', '1', '13', 'Nigerian', 'Male', 'Single', 'Mr. Aliyu Ahmad', '08032898464', 'No. 42 Aliu Quarters Bado Area, Sokoto State', 0, 'Islam', '300', '2018-01-18 16:57:34'),
(33, 'images (68).jpg', 'MGCHST251233', 'Adeshina', 'Taiwo Hassan', '1989-05-14', 'Osun', '08138139333', 'ajibolamaryam1@gmail.com', 'Ororuwo, oaun state', '', '0', '18', 'Nigerian', 'Male', '', '', '', '', 0, '', '', '2018-01-10 20:52:19'),
(34, 'Abubakar Umar.jpg', 'MGCHST325240', 'ABUBAKAR', 'UMMAR', '1979-06-03', 'Sokoto', '08165618885', 'auy.bbz@gmail.com', 'GAWAKUKE, ARKILLAH LIMAN SOKOTO NORTH HOSPITAL WAMMAKKO, SOKOTO', 'Nursing &amp; Midwifery', '1', '13', 'Nigerian', 'Male', 'Married', 'NIL..', '0803289846400', 'NIL..', 1, 'Islam', '300', '2018-01-17 09:58:54'),
(35, 'Ibrahim Amina.jpg', 'MGCHST310522', 'IBRAHIM', 'AMINA', '1991-10-21', 'Kebbi', '08032214641', 'NIL...@gmail.com', 'School Of MIdwifery Uduth, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Single', 'Murjanatu Ibrahim', '07036354280', 'School Of Midwifery Uduth, Sokoto', 1, 'Islam', '300', '2018-01-17 11:24:56'),
(36, 'WhatsApp Image.jpeg', 'MGCHST515142', 'BALARABE', 'GWANDU HADIZA', '1969-12-31', 'Sokoto', '08030863721', 'hadizagwandu@gmail.com', 'Behind Mabera, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'Adamu M. Hamisu', '08030412978', 'Uduth, Sokoto', 1, 'Islam', '300', '2018-01-11 05:28:03'),
(37, 'scan0002.jpg', 'MGCHST014141', 'YUSUF', 'ZAINAB', '1975-08-25', 'Sokoto', '07066110625', 'megandiabubakar@yahoo.com', 'No. 7 Modibo Adamawa Road, Marina Area, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'Aliyu Hajara', '08036788290', 'Nursing Service Dept, Uduth Sokoto', 1, 'Islam', '300', '2018-01-18 10:47:06'),
(38, 'WhatsApp Image.jpeg', 'MGCHST102203', 'MUHAMMAD', 'LAWAL RUKUYYA', '1992-09-23', 'Kebbi', '07066446430', 'rukayyaml@yahoo.com', 'Federal Low Cost Arkilla Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'Garba Isa Aminu', '07039266995', 'Sashi Gwadabawa Sokoto', 1, 'Islam', '300', '2018-01-11 05:54:52'),
(39, 'scan0001.jpg', 'MGCHST151310', 'YAKUBU', 'LAMISHI', '1979-09-05', 'Sokoto', '08035459850', 'nil@gmail.com', 'Specialist Hospital, Sokoto', 'Health Information', '3', '19', 'Nigerian', 'Female', 'Married', 'Yakubu Yakubu', '0803289846400', 'Specialist Hospital Sokoto', 1, 'Christanity', '300', '2018-01-18 11:15:55'),
(40, 'Mustapha Garba.jpg', 'MGCHST011004', 'MUSTAPHA', 'GARBA', '1984-09-09', 'Sokoto', '08031590089', 'Mustaphagwaddodi@naiji.com', 'Specialist hospital sokoto', 'Nursing &amp; Midwifery', '1', '19', 'Nigerian', 'Male', 'Married', 'Alhaji Aliyu Gajere', '08036573460', 'vetinary clinic sokoto', 1, 'Others', '300', '2018-01-18 11:28:26'),
(41, 'scan0003.jpg', 'MGCHST024000', 'NZUBE CHINEDU', 'OBODOEFUNA', '1982-10-18', 'Anambra', '08066261180', 'nzubeobodoefuna@gmail.com', 'Tamaje area sokoto near pinnacle hotel', 'Nursing &amp; Midwifery', '1', '19', 'Nigerian', 'Female', 'Married', 'Mrs. Abigail obodoefuna', '07030971772', 'Uduchukwu road Nnewi local govt edoji Anambra', 1, 'Christanity', '300', '2018-01-18 11:49:30'),
(42, 'scan0004.jpg', 'MGCHST201404', 'AIYEKOBORI OLUSEGUN', 'MONDAY', '1977-03-18', 'Kogi', '07034880050', 'pastorsegmona@yahoo.com', 'Uduth main theatre Pmb 2370 sokoto', 'Nursing &amp; Midwifery', '1', '13', 'Nigerian', 'Male', 'Married', 'ENGR.AMOS SUNDAY AIYEKORIBE', '08069687480', '2nd Ecwa churchJ.Allen sokoto', 1, 'Christanity', '300', '2018-01-18 12:13:25'),
(44, 'scan0005.jpg', 'MGCHST112212', 'USMAN', 'NASIRU', '1991-12-18', 'Sokoto', '08031394046', 'nasirusman094@gmail.com', 'tudun wada dallatu road sokoto', 'Nursing &amp; Midwifery', '1', '13', 'Nigerian', 'Male', 'Single', 'USMAN UMAR', '08035992769', 'Tudun Wada Dallatu road', 1, 'Islam', '300', '2018-01-18 12:38:01'),
(46, 'scan0006.jpg', 'MGCHST053421', 'GARBA', 'UMAR', '1985-02-18', 'Kebbi', '07038184903', 'sumayyaaminu@gmail.com', 'Uthman danfodio university teaching hospital nursing department', 'Health Information', '1', '13', 'Nigerian', 'Male', 'Married', 'Aminu Ahmed Biambo', '08065268340', 'Faculty of pharmaceutical science udus', 1, 'Islam', '300', '2018-01-18 13:50:46'),
(47, 'scan0007.jpg', 'MGCHST524435', 'EBESUNUN AMIOSHOR', 'DORCAS', '1987-12-19', 'Edo', '08067593136', 'sweetestdorcas@yahoo.com', 'Nursing service department usman danfodio university teaching hospital sokoto', 'Health Information', '1', '13', 'Nigerian', 'Female', 'Single', 'Boniface Ebesunun', '08062961216', 'no 7 idumotutu street igueben', 1, 'Christanity', '300', '2018-01-18 14:12:30'),
(48, 'scan0001 (2).jpg', 'MGCHST222204', 'OKEKE MABEL', 'UZOAMAKA', '1975-10-07', 'Anambra', '08037845454', 'amaka90196@yahoo.com', 'nursing department uduth sokoto', 'Health Information', '3', '19', 'Nigerian', 'Female', 'Single', 'Mr. EMMANUEL OKEKE', '08033027757', 'No.15 Obanye street onitsha', 1, 'Christanity', '300', '2018-01-18 14:27:19'),
(49, 'scan0002 (2).jpg', 'MGCHST253143', 'MUHAMMED', 'RAKIYA', '1986-09-23', 'Sokoto', '08069409986', 'NIL@yahoo.com', 'Usman danfodio univrsity teaching hospital sokoto', 'Health Information', '1', '13', 'Nigerian', 'Female', 'Married', 'Bala Musa Malami', '08030938572', 'usman danfodio university teaching hospital sokoto', 1, 'Christanity', '300', '2018-01-18 14:47:32'),
(50, 'scan0004 (2).jpg', 'MGCHST311030', 'BELLO OZOHU', 'HADIZA', '1980-12-13', 'Kogi', '07082911863', 'asabehassan1588@gmail.com', 'usman danfodio university teaching hospital sokoto.sokoto state', 'Health Information', '1', '13', 'Nigerian', 'Female', 'Married', 'Alh.Sule Nasiru', '08022481926', 'uduth sokoto trauma center', 1, 'Islam', '300', '2018-01-18 15:05:18'),
(51, 'scan0005 (2).jpg', 'MGCHST455403', 'ADEWALE', 'MARY', '1981-10-15', 'Kwara', '08032364498', 'Adewalem81@gmail.com', 'Usmanu Danfodio university teaching hospital Sokoto.', 'Health Information', '3', '19', 'Nigerian', 'Female', 'Married', 'Mrs. Esther Adewale', '08068041851', 'Arkilla Liman area of sokoto state', 1, 'Christanity', '300', '2018-01-18 15:29:23'),
(52, 'scan0006 (2).jpg', 'MGCHST331045', 'REUBEN', 'DEBORAH', '1980-07-17', 'Kogi', '08036226739', 'Debbypeter66@yahoo.com', 'male medical ward sokoto', 'Nursing &amp; Midwifery', '1', '13', 'Nigerian', 'Female', 'Married', 'Mr.Reuben Ocheja', '07034663793', 'C.E.F.N Sokoto old airport Area', 1, 'Christanity', '300', '2018-01-18 15:37:04'),
(54, 'scan0007 (2).jpg', 'MGCHST542304', 'SULEIMAN', 'AMINA', '1981-07-17', 'Sokoto', '07033585693', 'aminasuleiman37@gmail.com', 'Nakasari magaji', 'Health Information', '1', '13', 'Nigerian', 'Female', 'Married', 'nil', '123456789', 'nil', 1, 'Islam', '300', '2018-01-18 16:18:15'),
(55, 'scan0008 (2).jpg', 'MGCHST354204', 'LUMU', 'HABIBU', '1980-09-20', 'Sokoto', '08060578163', 'NIL@HOTMAIL.COM', 'Specialist hospital sokoto', 'Community Health', '3', '17', 'Nigerian', 'Male', 'Married', 'Abbass Abubakar Lumu', '07036648831', 'Kabobi area danbara western bye pass sokoto', 1, 'Islam', '300', '2018-01-24 15:50:01'),
(56, 'scan0009.jpg', 'MGCHST024113', 'ABUBAKAR', 'NASIRU', '1991-02-21', 'Sokoto', '08038483088', 'nasirabubakarmrd.@gmail.com', 'minanata area sokoto near dan malam mai cement residence', 'Health Information', '3', '19', 'Nigerian', 'Male', 'Married', 'Abubakar Isah', '08036133998', 'minanata area sokoto', 1, 'Islam', '300', '2018-01-18 16:49:51'),
(57, 'Fatima.jpg', 'MGCHST504301', 'MUHAMMAD', 'FATIMA', '1979-03-05', 'Sokoto', '08054646563', 'mfateema@gmail.com', 'Tamaje Area, Western Bye-Pass Sokoto State', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'Umar B. Moshood', '08036852793', 'National Council For Arts &amp; Culture Zonal Office, Sokoto', 1, 'Islam', '300', '2018-01-24 15:46:00'),
(62, 'scan0014.jpg', 'MGCHST025113', 'MUHAMMAD', 'TAMBUWAL HAUWA''U', '1984-05-14', 'Sokoto', '080000000000', 'hauwautambuwal@gmail.com', 'No 1634 Rima Radio House, Sokoto', 'Nursing &amp; Midwifery', '1', '19', 'Nigerian', 'Female', 'Married', 'Bello Ibrahim', '08036878686', 'No 1634 Rima Radio House, Sokoto', 1, 'Islam', '300', '2018-01-23 09:17:44'),
(63, 'scan0015.jpg', 'MGCHST452303', 'SANUSI', 'SADIYA', '1978-01-12', 'Sokoto', '08065554521', 'sanusisadiya@gmail.com', 'Salame Area Behind FGC Sokoto', 'Nursing &amp; Midwifery', '1', '13', 'Nigerian', 'Female', 'Married', 'Hassan Ibrahim', '08038199151', 'Salame Area Behind FGC Sokoto', 1, 'Islam', '300', '2018-01-23 09:50:26'),
(64, 'Abdulkadir Khalid.jpg', 'MGCHST020333', 'ABDULKADIR', 'ADAM KHALID', '1973-01-16', 'Sokoto', '08169412941', 'mammang2012@gmail.com', 'Mabera Dahala Area Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Male', 'Married', 'Mrs. Abdulkadir Khalid', '08169412941', 'Mabera Dahala Area Sokoto', 1, 'Islam', '300', '2018-01-23 10:11:41'),
(65, 'scan0011.jpg', 'MGCHST430554', 'CHIWUZO', 'SHEDRACK SOMTOCHUKWU', '1978-01-02', 'Anambra', '080000000000', 'shedrackschukwu@gmail.com', 'Tamaje Area, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Male', 'Married', 'CHIWUZO VICTOR CHUKWUGOZIE', '08070795357', 'FGC Staff School Sokoto', 1, 'Christanity', '300', '2018-01-23 10:26:10'),
(66, 'scan0010.jpg', 'MGCHST112214', 'BELLO', 'ABDULLAHI ZARUMMAI', '1987-01-01', 'Sokoto', '08069797075', 'belloabdullahiz@naij.com', 'Behind Sarduana House Sokoto', 'Community Health', '1', '2', 'Nigerian', 'Male', 'Married', 'Ibrahim Abdullahi Babangida', '08032792111', 'Behind Sarduana House Sokoto', 1, 'Islam', '300', '2018-02-07 16:25:11'),
(67, 'Opara.jpg', 'MGCHST411125', 'OPARA', 'PATRICIA OLUCHI', '1980-02-22', 'Imo', '08060639684', 'manismicheal@gmail.com', 'Ubah emil, Owerri', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'Mrs. Angelina Opara', '08036963044', 'Gawon Nama Area, Sokoto', 1, 'Christanity', '300', '2018-01-23 11:08:53'),
(68, 'Adewoyin.jpg', 'MGCHST100233', 'MARDIYYAH', 'OYENIKE ADEWOYIN', '1977-01-01', 'Osun', '08050505931', 'princessadewoyin@yahoo.com', 'Angwan Kwasai Area Behind Army Barrack', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'Barr. Adewoyin Ahmed', '08075751872', 'Angwan Kwasai Area Behind Army Barrack', 1, 'Islam', '300', '2018-01-23 13:31:31'),
(69, 'Sadiq Sani.jpg', 'MGCHST432304', 'MURTALA', 'SADIQ SANI', '1963-09-20', 'Kano', '08065112048', 'murtalasanisadiq@gmail.com', 'Usmanu Danfodio Teaching Hospital', 'Nursing &amp; Midwifery', '3', '13', 'Nigerian', 'Male', 'Married', 'Iliyasu Sani Yakasai', '08065525225', 'Kundila Maiduguri Road Phase2 Kano State', 1, 'Islam', '300', '2018-01-23 14:01:16'),
(70, 'Ahmad Rabiu.jpg', 'MGCHST304430', 'AHMAD', 'RABIU', '1986-12-01', 'Sokoto', '08034985368', 'rabiunnaguru@gmail.com', 'No. 42 ALIU Quarters Bado Area, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Male', 'Married', 'Aliyu Ahmad', '08032898464', 'No. 42 ALIU Quarters Bado Area, Sokoto', 1, 'Islam', '300', '2018-01-23 14:09:42'),
(71, 'scan0020.jpg', 'MGCHST100040', 'MUHAMMAD', 'MAIMUNA', '1969-11-30', 'Zamfara', '08095499831', 'miamuna@gmail.com', 'Nursing Service Department Uduth', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'Alh. AMB. M.Z ANKA', '08026433354', 'Nursing Service Department Uduth', 1, 'Islam', '300', '2018-01-23 14:25:22'),
(72, 'scan0013.jpg', 'MGCHST023520', 'KANDE', 'GOROH', '1963-08-22', 'Kaduna', '08066130878', 'kandegoroh@gmail.com', 'Back of Trade Fare, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'Mr. Jack Kurah', '07035565666', 'Back of Trade Fare, Sokoto', 1, 'Christanity', '300', '2018-01-23 14:47:57'),
(73, 'scan0012.jpg', 'MGCHST031201', 'IBEH', 'IYATI PATRICIA', '1965-01-19', 'Cross River', '08025080954', 'patriciaibeh01@gmail.com', 'Tamaje Layout, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'IBEH EVARIST CHINYEREMAKA', '08183482706', 'No. 7 Colliery Avenue, G.R.A Enugu State', 1, 'Christanity', '300', '2018-01-23 15:04:30'),
(74, 'Tukur.jpg', 'MGCHST123525', 'TUKUR', 'UMAR TUKUR', '1990-02-15', 'Sokoto', '07033051437', 'umartukur@gmail.com', 'FILIN BANDE AREA, BINJI LOCAL GOVT.', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Male', 'Single', 'UMAR SAHABI', '07034973660', 'FILIN BANDE AREA, BINJI LOCAL GOVT', 1, 'Christanity', '300', '2018-01-23 15:17:49'),
(75, 'Ajoloko.jpg', 'MGCHST403401', 'AJOLOKO', 'FOLAKE', '1976-02-14', 'Ondo', '0800000000', 'kemjoetwo@gmail.com', 'Sokoto State', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'NIL NIL', '0800000000000', 'Sokoto State', 1, 'Christanity', '300', '2018-01-23 19:23:41'),
(76, 'scan0002 (3).jpg', 'MGCHST010435', 'YAHAYA', 'HALIMA', '1982-05-26', 'Sokoto', '08100951950', 'yahayahalima@gmail.com', 'No. 13 Hospital Road Gawon Nama Area, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'YUSUF BELLO', '08034598744', 'Sarkin Dawaki Residence, Western Bye-Pass Road, Sokoto', 1, 'Islam', '300', '2018-01-23 19:31:13'),
(77, 'Ibrahim Shehu.jpg', 'MGCHST105134', 'SHEHU', 'IBRAHIM', '1981-01-23', 'Zamfara', '08034581352', 'ibrahimagwai577@gmail.com', 'House 14 Badon Hayan Area, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Male', 'Married', 'Sa''idu Usman Bukkuyum', '08065662321', 'Deputy Governor Perm Sec Office, Zamfara State', 1, 'Islam', '300', '2018-01-23 19:54:49'),
(78, 'Adamu Samiu.jpg', 'MGCHST054415', 'ADAMU', 'SAMINU', '1981-02-12', 'Zamfara', '08066780099', 'haidarus12@gmail.com', 'No. 3 Zaria Road, Gusau. Zamfara State', 'Community Health', '1', '2', 'Nigerian', 'Male', 'Married', 'AISHA DALHATU USMAN', '08065332586', 'School of Post Basic Midwifery Sokoto', 1, 'Christanity', '300', '2018-01-23 20:20:52'),
(79, 'kabir.jpg', 'MGCHST435534', 'KABIR', 'IBRAHIM YUSUF', '1975-01-26', 'Sokoto', '08032873224', 'kabiryusuf10@gmail.com', 'No. 56 Bafarawa Estate, Old Airport Sokoto', 'Community Health', '1', '2', 'Nigerian', 'Male', 'Married', 'Murtala Ibrahim Turba', '08094423577', 'Government Day Secondary School Turba, Isa Local Govt Area', 1, 'Islam', '300', '2018-01-23 20:47:12'),
(80, 'scan0006.jpg', 'MGCHST530222', 'AJAKAIYE', 'SARAH', '1982-03-17', 'Edo', '07033047330', 'erobeyeze@gmail.com', 'Behind A.B.A Farfufaru, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'Mrs. Gloria Ihenyen', '08036067984', 'N.C.C Abuja, Nigeria', 1, 'Christanity', '300', '2018-01-24 07:23:42'),
(81, 'scan0027.jpg', 'MGCHST341130', 'BELLO', 'GUSAU SIKIRAH', '1978-06-20', 'Zamfara', '08060980720', 'abdullahi_mr@yahoo.co.uk', 'UDUTH NURSING DEPT', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'UMAR ABDULLAHI', '08065291507', 'Main theatre Uduth Sokoto', 1, 'Islam', '300', '2018-01-24 07:38:14'),
(82, 'scan0025.jpg', 'MGCHST304235', 'MARYAM', 'YUSUF', '1978-12-01', 'Zamfara', '08036387242', 'myusufanka@gmail.com', 'Federal Neuro Psychiatric Hospital Kware, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'M.Z ANKA', '08177000098', 'No. 19 Kaduna Road, Sokoto', 1, 'Islam', '300', '2018-01-24 07:52:42'),
(83, 'scan0024.jpg', 'MGCHST443225', 'ABDULSALAM', 'RUKAYYA', '1980-03-08', 'Sokoto', '08064893762', 'abdulsalamrukayya8@gmail.com', 'Usmanu Danfodiyo Teaching Hospital, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'RABIU MUSA', '08036833163', 'Force CID Annex, Kaduna', 1, 'Islam', '300', '2018-01-24 08:13:16'),
(84, 'scan0023.jpg', 'MGCHST351204', 'HAMZAT', 'USMAN', '1984-02-14', 'Sokoto', '08104191388', 'hamzatusman@gmail.com', 'No. 82 Mabera Fulani , Mabera Area Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Male', 'Married', 'NIL NIL', '08000000000', 'No. 82 Mabera Fulani , Mabera Area Sokoto', 1, 'Islam', '300', '2018-01-24 08:28:23'),
(85, 'scan0021 (2).jpg', 'MGCHST304432', 'NNAEMEKA', 'SCHOLAR', '1982-02-21', 'Sokoto', '08034637720', 'jancymokwe@gmail.com', 'Raymond Village, Army Barrack. Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'JOHN CHUKWUNOMSO MOKWE', '07036813215', 'Raymond Village, Near Bridget Barrack. Army Barrack Sokoto', 1, 'Christanity', '300', '2018-01-24 08:43:20'),
(86, 'scan0018 (2).jpg', 'MGCHST022523', 'JUNAIDU', 'S. DOGARAI', '1966-02-01', 'Sokoto', '08032210411', 'fatimajunaidu2000@gmail.com', 'Flat 22E Yauri Quarters Ummary Mohammed Estate, Yauri Road, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Male', 'Married', 'UMMARU S. DOGARAI', '08035077278', 'Ministry of Finance, Sokoto', 1, 'Islam', '300', '2018-01-24 09:11:03'),
(87, 'scan0014 (2).jpg', 'MGCHST015225', 'MUHAMMAD', 'AISHA', '1977-07-14', 'Kebbi', '08035780786', 'aishamohd@gmail.com', 'No. 287 Bafarawa estate, Old Airport, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'SANUSI UMAR ADOKE', '08036152430', 'Federal Neuro Psychiatric Hospital, Kware Sokoto', 1, 'Islam', '300', '2018-01-24 09:19:10'),
(89, 'scan0019 (2).jpg', 'MGCHST012231', 'YUSUF', 'ABDULSALAM GADA', '1977-07-09', 'Sokoto', '08060758095', 'yussalamgada@yahoo.com', 'Opposite House 211B Mana Housing Estate, Sokoto', 'Nursing &amp; Midwifery', '1', '13', 'Nigerian', 'Male', 'Married', 'USMAN YERIMA MAGAJI', '08069352137', 'House No. 100A Gwiwa Low Cost Area', 1, 'Islam', '300', '2018-01-24 12:41:04'),
(90, 'scan0011 (2).jpg', 'MGCHST530312', 'OJEIFO', 'JOHN IKOGHENE', '1982-04-06', 'Edo', '07038663308', 'ojeifo1982@yahoo.com', 'House No. 2 Opposite Trade-fare Football Field, Old Airport, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Male', 'Married', 'PAULINA JOHN OJEIFO', '07060722247', 'House No. 2 Opposite Trade-fare Football Field, Old Airport, Sokoto', 1, 'Christanity', '300', '2018-01-24 12:55:12'),
(91, 'scan0018.jpg', 'MGCHST024350', 'JELANI', 'IMAM J.', '1973-06-17', 'Sokoto', '08039564222', 'jelaniimam22@gmail.com', 'Specialist Hospital Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Male', 'Married', 'IMAM SULTAN BELLO', '08172071840', 'Sultan Bello Mosque, Sokoto', 1, 'Islam', '300', '2018-01-24 13:06:35'),
(92, 'scan0026.jpg', 'MGCHST142145', 'JATTO', 'MAIMUNAT', '1963-09-01', 'Kogi', '08034872393', 'jattomaimuna@yahoo.com', 'Usmanu Danfodiyo Teaching Hospital Quarters, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'ABDULKARIM JATTO', '08033698570', 'Usmanu Danfodiyo Teaching Hospital Quarters, Sokoto', 1, 'Christanity', '300', '2018-01-24 13:15:12'),
(93, 'scan0032.jpg', 'MGCHST311151', 'ALIYU', 'BELLO BINANCHI', '1982-05-03', 'Sokoto', '08064891579', 'aliyubinanchi@yahoo.com', 'Binanchi Area, Sokoto North', 'Community Health', '1', '2', 'Nigerian', 'Male', 'Married', 'KABIRU BELLO', '08035804251', 'Behind College of Nursing, Minanata Area, Sokoto', 1, 'Islam', '300', '2018-01-24 14:20:33'),
(94, 'scan0030.jpg', 'MGCHST113003', 'ABUBAKAR', 'SULEIMAN', '1982-12-10', 'Sokoto', '07036354927', 'suleiman@yahoo.co.uk', 'TANGAZA MALLA MAWA AREA SOKOTO', 'Community Health', '1', '2', 'Nigerian', 'Male', 'Married', 'AISHA SULEIMAN', '07036354927', 'TANGAZA MALLA MAWA AREA SOKOTO', 1, 'Islam', '300', '2018-01-24 14:32:35'),
(95, 'scan0031.jpg', 'MGCHST415101', 'ALIYU', 'IBRAHIM SULEIMAN', '1984-01-01', 'Sokoto', '08030886225', 'elaleeyu@naij.com', 'Minanata Area, Gargaren Dan Mallan Mai', 'Community Health', '1', '2', 'Nigerian', 'Male', 'Married', 'Tukur Suleiman', '08030411763', 'Nakasari Area, Sokoto', 1, 'Islam', '300', '2018-01-24 15:10:32'),
(96, 'scan0029.jpg', 'MGCHST432433', 'BASHAR', 'ADAMU B.', '1989-09-05', 'Sokoto', '08137699855', 'basharadamu390@gmail.com', 'Gidadawa Area Along Diori Hamani Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Male', 'Single', 'Alhaji. Adamu Gida', '08081420098', 'Gidadawa Area Along Diori Hamani Sokoto', 1, 'Islam', '300', '2018-01-24 15:21:56'),
(97, 'scan0028.jpg', 'MGCHST301005', 'ABDULRAHMAN', 'FARUKU', '2018-01-24', 'Sokoto', '08062619158', 'farukuabdulrahman@gmail.com', 'Manuri Road, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Male', 'Single', 'AHMAD MAJIDADI', '08063348050', 'Manuri Road, Sokoto', 1, 'Islam', '300', '2018-01-24 15:30:33'),
(98, 'stu.jpg', 'MGCHST533454', 'Bobola', 'Kabel', '2018-02-14', 'Imo', '090977665465', 'bobola@gmail.com', 'Bobola Estate', '', '0', '15', 'Nigerian', 'Male', '', '', '', '', 0, '', '', '2018-02-01 13:52:07'),
(99, 'Shehu Basira.jpg', 'MGCHST555050', 'SHEHU', 'BASIRA', '1992-10-27', 'Zamfara', '07060718088', 'basirashehu@gmail.com', 'Nasarawa Area, Gusau Zamfara State', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'Balkisu Shehu', '08105065590', 'Awala Chochin Kwano, Gusau Zamfara State', 1, 'Islam', '300', '2018-02-05 09:23:44'),
(100, 'Bello Sanni.jpg', 'MGCHST554055', 'BELLO', 'SANNI', '1983-12-15', 'Sokoto', '08037494867', 'sanibellojos@gmail.com', 'MAbera Area, SOkoto South Local Government, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Male', 'Married', 'Bello Abdullahi', '08132831349', 'Minannata Area, SOkoto South Local Government, SOkoto', 1, 'Christanity', '300', '2018-02-05 09:36:46'),
(101, 'Muhammad Mujitaba.jpg', 'MGCHST252521', 'MUHAMMAD', 'MUJITABA', '1984-04-14', 'Sokoto', '08032788661', 'mujhad1984@gmail.com', 'Nahasari Area, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Male', 'Married', 'Abdullahi MUhammad', '08162784144', 'National Biotechnology Development Agency, Abuja', 1, 'Islam', '300', '2018-02-05 09:52:06'),
(102, 'Ibrahim Samiala Maigandi.jpg', 'MGCHST531534', 'IBRAHIM SAMAILA', 'MAIGANDI', '17-11-26', 'Sokoto', '08065718355', 'ismailashiru@gmail.com', 'Mana area sokoto south local govt.', 'Nursing &amp; Midwifery', '1', '19', 'Nigerian', 'Male', 'Married', 'INYIMA DIANA AKANBI', '08035976826', 'UDUTH .HOSPITAL SOKOTO.', 1, 'Islam', '300', '2018-02-05 10:47:09'),
(103, 'Olayinka Kabiru Ogundipe.jpg', 'MGCHST420143', 'OGUNDIPE', 'KABIRU OLAYINKA', '1991-02-02', 'Kwara', '08000000000', 'kabiruolayinka@yahoo.com', 'Mabera Area, Sokoto', 'Community Health', '3', '17', 'Nigerian', 'Male', 'Single', 'Alhaji. Laide Ogundipe', '08000000000', 'Mabera Area, Sokoto', 1, 'Islam', '300', '2018-02-05 14:16:58'),
(104, 'Daniel Rose Ada.jpg', 'MGCHST035124', 'DANIEL', 'ROSE ADA', '1976-08-08', 'Benue', '08032008368', 'rosedaniel949@gmail.com', 'Basic Nursing', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'Pastor. Elijah Goodluck Adelodun', '07061023830', 'Christ Miracle Mission Church, Gusau Zamfara State', 1, 'Christanity', '300', '2018-02-05 14:54:20'),
(106, 'Abdulrahman Badmus Bilikis.jpg', 'MGCHST151042', 'ABDULRAHMAN', 'BADMUS BILIKIS', '1979-01-03', 'Kwara', '08035944318', 'abdul@gmail.com', 'No. G2 Gwiwa Low Cost Area, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Female', 'Married', 'Mr. Jamiu Oladele', '08035944318', 'No. G2 Gwiwa Low Cost Area, Sokoto', 1, 'Islam', '300', '2018-02-07 10:34:18'),
(107, 'Abubakar Ibrahim.jpg', 'MGCHST400110', 'ABUBAKAR', 'IBRAHIM', '1984-03-19', 'Sokoto', '08057478409', 'durbuwaa@yahoo.com', 'DURBUWAA TOWN KWARE LOCAL GOVT, SOKOTO', 'Nursing &amp; Midwifery', '1', '13', 'Nigerian', 'Male', 'Married', 'Alhaji. Ibrahim D.', '0800000000000', 'DURBUWAA TOWN KWARE LOCAL GOVT, SOKOTO', 1, 'Islam', '300', '2018-02-07 10:57:25'),
(108, 'Musa Abubakar.jpg', 'MGCHST540525', 'MUSA', 'ABUBAKAR', '1989-09-01', 'Sokoto', '07032642688', 'abumusaman2@gmail.com', 'TUDUN WADA AREA, SOKOTO STATE', 'Community Health', '1', '2', 'Nigerian', 'Male', 'Married', 'JUNAIDU MUSA', '07034499731', 'BACK OF RIMA RADIO, TUDUN WADA AREA, SOKOTO STATE', 1, 'Islam', '300', '2018-02-07 11:10:37'),
(109, 'Aseini Destiny Hannatu.jpg', 'MGCHST515532', 'ASEIN', 'DESTINY HANNATU', '1983-06-21', 'Sokoto', '07039336215', 'hannaatu@yahoo.com', 'Old Airport Area, Off Tamaje Bye-Pass Road, Sokoto', 'Nursing &amp; Midwifery', '1', '13', 'Nigerian', 'Female', 'Married', 'Sunday Asein', '08065959191', 'Old Airport Area, Off Tamaje Bye-Pass Road, Sokoto.', 1, 'Christanity', '300', '2018-02-07 11:20:53'),
(110, 'IMG-20171230-WA0006.jpg', 'MGCHST513224', 'MUHAMMAD', 'UMAR M.', '1980-01-04', 'Zamfara', '08063864841', 'muhdbnumar@gmail.com', 'Mabera Magaji Area, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Male', 'Married', 'SHIYAR MAGAJI', '09069543659', 'DAKI-TAWAS GUMMI, ZAMFARA', 1, 'Christanity', '300', '2018-02-07 11:31:36'),
(111, 'IMG-20171230-WA0006.jpg', 'MGCHST502120', 'JAMILU', 'BELLO', '1987-04-28', 'Sokoto', '08030784994', 'jamilubello@gmail.com', 'MINANATA AREA NEAR Juma''t  MOSQUE, SOKOTO', 'Community Health', '3', '17', 'Nigerian', 'Male', 'Single', 'Alhaji. Bello K. Tureta', '08060044633', 'Tudun Wada Area, Near Fire Service, Sokoto', 1, 'Islam', '300', '2018-02-07 11:39:36'),
(112, 'IMG-20171230-WA0006.jpg', 'MGCHST535103', 'SULEIMAN', 'MAS''UD', '1973-07-30', 'Sokoto', '08000000000', 'masudbodinga01@gmail.com', 'No. 7 Abdullahi Fodio Road Shiyar Runji Bodinga, Sokoto', 'Community Health', '3', '17', 'Nigerian', 'Male', 'Married', 'Bashir Abubakar', '08035318175', 'Sokoto State Teacher''s Service', 1, 'Islam', '300', '2018-02-07 11:47:40'),
(113, 'IMG-20171230-WA0006.jpg', 'MGCHST203134', 'MADUGU', 'MUSA ABUBAKAR', '1966-02-01', 'Sokoto', '08039491713', 'muazumadugu@sokotocement.com', 'House 40, Nakasari Layout, Gagi Road,Sokoto', 'Nursing &amp; Midwifery', '1', '13', 'Nigerian', 'Male', 'Married', 'NOT VALID', '08025011298', 'Cement Comapany of Nothern Nigeria, Km 10 Kalibiana Road, Sokoto', 1, 'Islam', '300', '2018-02-07 12:01:54'),
(114, 'IMG-20171230-WA0006.jpg', 'MGCHST332312', 'FAMAKINWA', 'OLAWUMI', '1984-11-27', 'Osun', '08038467281', 'famiakinwa@gmail.com', 'No. G2 Gwiwa Low-Cost Estate, Sokoto', 'Nursing &amp; Midwifery', '3', '19', 'Nigerian', 'Male', 'Married', 'ABDULRAHMAN BADMUS BILIKIS', '08035944318', 'No. G2 Gwiwa Low-Cost Estate, Mongoro Road, Sokoto', 1, 'Christanity', '300', '2018-02-07 14:40:33'),
(115, 'images.png', 'MGCHST335111', 'Fred o', 'Lala', '1009-01-28', 'Gombe', '09098776667', 'fredolala@gmail.com', 'New Garden', '', '2', '6', 'Nigerian', 'Male', '', '', '', '', 0, '', '', '2018-02-13 17:37:28'),
(118, 'download (2).jpg', 'MGCHST124215', 'Deborah', 'Debby YO', '2018-01-30', 'Gombe', '0909890098', 'deborahdd@gmail.com', 'Nil', 'Community Health Science', '3', '2', 'Nigerian', 'Male', 'Single', 'Nilo', '09098892677', 'Address', 1, 'Christanity', '100', '2018-02-14 11:58:16'),
(119, 'download (2).jpg', 'MGCHST152342', 'Deborah', 'Debby YO', '2018-01-30', 'Gombe', '0909890098', 'deborahssss@gmail.com', 'Nil', 'Community Health Science', '2', '2', 'Nigerian', 'Male', 'Single', 'Nilo', '09098892677', 'Address', 1, 'Christanity', '100', '2018-02-14 13:08:19'),
(120, 'download (2).jpg', 'MGCHST554205', 'Deborah', 'Debby YO', '2018-01-30', 'Gombe', '0909890098', 'debor@gmail.com', 'Nil', 'Community Health Science', '3', '2', 'Nigerian', 'Male', 'Single', 'Nilo', '09098892677', 'Address', 1, 'Christanity', '100', '2018-02-14 12:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `admission_registration_step2`
--

CREATE TABLE `admission_registration_step2` (
  `reg2_is` int(255) NOT NULL,
  `regNum` varchar(255) NOT NULL,
  `school1` varchar(255) NOT NULL,
  `from_date1` varchar(255) NOT NULL,
  `to_date1` varchar(255) NOT NULL,
  `degree1` varchar(255) NOT NULL,
  `school2` varchar(255) NOT NULL,
  `from_date2` varchar(255) NOT NULL,
  `to_date2` varchar(255) NOT NULL,
  `degree2` varchar(255) NOT NULL,
  `school3` varchar(255) NOT NULL,
  `from_date3` varchar(255) NOT NULL,
  `to_date3` varchar(255) NOT NULL,
  `degree3` varchar(255) NOT NULL,
  `school4` varchar(255) NOT NULL,
  `from_date4` varchar(255) NOT NULL,
  `to_date4` varchar(255) NOT NULL,
  `degree_4` varchar(255) NOT NULL,
  `school5` varchar(255) NOT NULL,
  `from_date5` varchar(255) NOT NULL,
  `to_date5` text NOT NULL,
  `degree5` text NOT NULL,
  `sub1` text NOT NULL,
  `grade1` text NOT NULL,
  `sub2` text NOT NULL,
  `grade2` text NOT NULL,
  `sub3` text NOT NULL,
  `grade3` text NOT NULL,
  `sub4` text NOT NULL,
  `grade4` text NOT NULL,
  `sub5` text NOT NULL,
  `grade5` text NOT NULL,
  `sub6` text NOT NULL,
  `grade6` text NOT NULL,
  `sub7` text NOT NULL,
  `grade7` varchar(255) NOT NULL,
  `sub8` varchar(255) NOT NULL,
  `grade8` varchar(255) NOT NULL,
  `sub9` varchar(255) NOT NULL,
  `grade9` varchar(255) NOT NULL,
  `qua` text NOT NULL,
  `time_registered2` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission_registration_step2`
--

INSERT INTO `admission_registration_step2` (`reg2_is`, `regNum`, `school1`, `from_date1`, `to_date1`, `degree1`, `school2`, `from_date2`, `to_date2`, `degree2`, `school3`, `from_date3`, `to_date3`, `degree3`, `school4`, `from_date4`, `to_date4`, `degree_4`, `school5`, `from_date5`, `to_date5`, `degree5`, `sub1`, `grade1`, `sub2`, `grade2`, `sub3`, `grade3`, `sub4`, `grade4`, `sub5`, `grade5`, `sub6`, `grade6`, `sub7`, `grade7`, `sub8`, `grade8`, `sub9`, `grade9`, `qua`, `time_registered2`) VALUES
(1, 'MGCHST552520', 'Holy Micheal', '2017-10-03', '2017-10-10', 'Primary School', 'Poly', '2017-10-16', '2017-10-16', 'O''LEVEL', '', '', '', '', '', '', '', '', '', '', '', '', 'Maths', 'a1', 'English', 'd2', 'Physics', 'c6', 'Chemistry', 'c2', 'Econs', 'a1', 'geography', 'c4', 'Agric Science', 'c5', 'Govt', 'c1', 'Yoruba', 'b3', '', '2017-10-29 16:46:40'),
(9, 'MGCHST515502', 'Emmauel Pry School', '2000-10-02', '2006-02-03', 'Primary School Cert', 'Emmauel College Ilorin', '2008-02-04', '2010-11-10', 'O''LEVEL RESULT', '', '', '', '', '', '', '', '', '', '', '', '', 'English Language', 'a2', 'Mathematics', 'C4', 'Biology', 'A1', 'Physics', 'c6', 'Chemistry', 'B3', 'geography', 'c4', 'Yoruba', 'c5', 'Govt', 'c1', 'Economics', 'b3', '', '2017-10-30 19:01:43'),
(11, 'MGCHST222100', 'Babjo Prymary School Ikirun', '1999-09-01', '2006-10-08', 'Primary School Leaving Certificate', 'Babjo College Ikirun', '2007-10-09', '2009-10-09', 'SSCE', 'Glory College', '2014-10-09', '2016-10-02', 'O'' Level Ceitificate', '', '', '', '', '', '', '', '', 'English', 'c4', 'Maths', 'c5', 'Government', 'b3', 'Commerce', 'a1', 'Literature', 'c4', 'Biology', 'c5', 'Agric Science', 'b3', 'CRS', 'b3', 'Yoruba', 'b2', '', '2017-10-31 07:01:55'),
(13, 'MGCHST055411', 'Edo Primary School Edo', '2017-11-07', '2017-10-31', 'Primary School Leaving Certificate', 'Edo Secondary School', '2017-11-07', '2017-11-14', 'O''LEVEL RESULT', '', '', '', '', '', '', '', '', '', '', '', '', 'English Language', 'a1', 'Mathematics', 'd2', 'Biology', 'A1', 'Chemistry', 'B2', 'Chemistry', 'B3', 'geography', 'c9', 'Agric Science', 'a1', 'Govt', 'c1', 'Yoruba', 'b3', '', '2017-11-01 17:47:14'),
(14, 'MGCHST413325', 'Ikire Primary School', '2017-10-31', '2017-11-05', 'Primary School Leaving Certificate', 'Babjo College Ikirun', '2017-11-15', '2017-11-06', 'SSCE', '', '', '', '', '', '', '', '', '', '', '', '', 'English', 'c4', 'Maths', 'c5', 'Government', 'b3', 'Commerce', 'a1', 'Literature', 'c4', 'Biology', 'c5', 'Agric Science', 'b3', 'CRS', 'b3', 'Yoruba', 'c6', '', '2017-11-02 14:21:00'),
(15, 'MGCHST221452', 'Joy Primary School Ikeja', '2017-11-06', '2017-11-12', 'Primary School Leaving Certificate', 'Joy College Ikeja', '2017-11-05', '2017-11-13', 'O''LEVEL RESULT', '', '', '', '', '', '', '', '', '', '', '', '', 'English Language', 'a1', 'Mathematics', 'd2', 'Physics', 'c6', 'Chemistry', 'c2', 'Econs', 'a1', 'geography', 'c4', 'Agric Science', 'c5', 'Govt', 'c1', 'Yoruba', 'f9', '', '2017-11-03 04:10:40'),
(16, 'MGCHST314003', 'Holy Micheal', '2017-11-08', '2017-10-31', 'Primary School', 'Goodwill College', '2017-11-15', '2017-11-14', 'O''LEVEL RESULT', '', '', '', '', '', '', '', '', '', '', '', '', 'English Language', 'a1', 'Mathematics', 'd2', 'Physics', 'c6', 'Chemistry', 'c2', 'Econs', 'a1', 'geography', 'c4', 'Yoruba', 'c5', 'Govt', 'c1', 'Yoruba', 'd9', '', '2017-11-03 05:21:41'),
(18, 'MGCHST255311', 'Loyola College', '1991-11-21', '1996-11-22', 'SSCE', 'Loyola College', '2001-07-10', '2005-07-11', 'ND', '', '', '', '', '', '', '', '', '', '', '', '', 'Maths', 'A', 'English', 'A', 'Chemistry', 'A', 'Biology', 'A', 'Physics', 'A', 'Geography', 'A', 'Economics', 'A', 'Further Maths', 'A', 'Yoruba', 'A', '', '2017-11-17 13:08:23'),
(19, 'MGCHST145124', 'Tamaje School', '2009-09-01', '2012-07-23', 'WAssce', 'Blue Crescent Scholl Sokoto', '2010-06-13', '2015-09-24', 'Diploma', '', '', '', '', '', '', '', '', '', '', '', '', 'English', 'B3', 'MAthematics', 'a1', 'Chemistry', 'B2', 'Biology', 'C4', 'Physics', 'B3', 'Agric', 'C5', 'Civic Edu', 'A1', 'Geo', 'B2', 'EConomics', 'B2', '', '2017-11-17 13:24:47'),
(20, 'MGCHST125340', 'Jos Primary School', '2017-11-07', '2017-11-05', 'Primary School Leaving Cert', 'Jos Secondary Sch', '2017-11-07', '2017-10-29', 'SSCE', '', '', '', '', '', '', '', '', '', '', '', '', 'Eng', 'a1', 'MAths', 'a1', 'Bio', 'a1', 'Chemi', 'a1', 'Phy', 'a1', 'Geo', 'a1', 'Agric', 'a1', 'Econs', 'a1', 'Yoruba', 'a1', '', '2017-11-19 05:40:30'),
(21, 'MGCHST330323', 'Holy Micheal', '2017-11-13', '2017-10-31', 'Primary School Leaving Certificate', 'Great Ambasador College', '2017-11-07', '2017-11-12', 'O''LEVEL RESULT', '', '', '', '', '', '', '', '', '', '', '', '', 'English Language', 'a1', 'Mathematics', 'C4', 'Physics', 'c6', 'Chemistry', 'c2', 'Econs', 'a1', 'geography', 'c4', 'Agric Science', 'c5', 'biology', 'c1', 'Yoruba', 'b3', '', '2017-11-19 06:18:42'),
(22, 'MGCHST201531', 'Faith Academy', '2001-09-21', '2007-07-16', 'WASSCE', 'Blue Crescent School Sokoto', '2009-02-12', '2010-06-28', 'A'' Levels', 'Trenchcore Computer Institute', '2011-03-10', '2013-07-23', 'Diploma Desktop Publishing', '', '', '', '', '', '', '', '', 'English', 'A1', 'Mathematics', 'B2', 'Biologly', 'A1', 'Physics', 'B3', 'Chemisrty', 'B3', 'Geography', 'A1', 'Basic Tech', 'B2', 'Animal Husbandry', 'B2', 'Economics', 'B3', '', '2017-11-25 12:19:11'),
(23, 'MGCHST104533', 'Magaji Rafi Model Primary School, Sokoto', '1988-09-09', '1994-07-07', 'Primary School Leaving Certificate', 'Government Day Secondary School', '2002-09-09', '2008-07-07', 'WASSCE', 'College Of Nursing And Midwifery Sciences Sokoto', '2010-03-09', '2013-07-07', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English', 'C6', 'Mathematics', 'C6', 'Chemistry', 'C6', 'Physics', 'C6', 'Biology', 'C5', 'Agricultural Sciences', 'C4', 'Islamic Studies', 'C6', 'Hausa', 'C4', 'Geography', 'NIL', '', '2018-01-10 14:01:31'),
(24, 'MGCHST325240', 'M.P.S Dorowa Road', '1988-09-07', '1994-07-21', 'Primary School Leaving Certificate', 'G.S.S Wurno', '1996-07-07', '2002-07-03', 'WASSCE', 'UDUS School Of Nursing', '2003-01-09', '2004-09-07', 'Basic Nursing', 'P.B.S National OrthHost Dala Kano State', '2011-01-01', '2018-01-11', 'General Nursing', '', '', '', '', 'English', 'C5', 'Mathematics', 'C5', 'Civil Education', 'F9', 'Biology', 'C5', 'Chemisrty', 'C6', 'Physics', 'C6', 'Agricultural Science', 'C5', 'Islamic Studies', 'C6', 'Geography', 'C5', '', '2018-01-11 05:00:17'),
(25, 'MGCHST310522', 'Nurudeen Primary School, Kaduna', '1996-09-07', '2001-07-07', 'Primary School Leaving Certificate', 'Jenuur Sec School, Azo Model Kaduna', '2007-09-09', '2009-06-09', 'JSSCE', 'Nurudeen Sec School, Kaduna', '2009-09-07', '2011-07-07', 'WASSCE', 'Udus School of Nursing, Sokoto', '2012-07-01', '2015-09-07', 'Basic Nursing', '', '', '', '', 'NIl', 'NIL', 'NIL', 'NIL', 'NIl', 'NIL', 'NIL', 'NIl', 'NIL', 'NIl', 'NIL', 'NIL', 'NIl', 'NIL', 'NIL', 'NIl', 'NIL', 'NIL', '', '2018-01-11 05:21:31'),
(26, 'MGCHST515142', 'Government Girls Sec School Illela', '1981-09-07', '1986-07-21', 'WASSCE', 'School of Midwifery, Sokoto', '1987-09-09', '1990-09-09', 'Midwifery', 'School of Nursing Sokoto', '1994-09-09', '1995-09-09', 'Basic Nursing', '', '', '', '', '', '', '', '', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIl', 'NIL', 'NIl', 'NIL', 'NIl', 'NIl', 'NIl', 'NIl', 'NIl', 'NIl', 'NIl', 'NIL', '', '2018-01-11 05:32:35'),
(27, 'MGCHST014141', 'Magaji Rafi Model Primary School', '1981-09-09', '2018-01-11', 'Primary School Leaving Certificate', 'NIL', '2018-01-11', '2018-01-11', 'WASSCE', '', '', '', '', '', '', '', '', '', '', '', '', 'Marketing', 'C6', 'Islamic Studies', 'C5', 'Civil Education', 'A1', 'English Language', 'C6', 'Mathematics', 'B3', 'Physics', 'D7', 'Chemistry', 'B3', 'Biology', 'B3', 'Agricultural Science', 'C5', '', '2018-01-11 05:46:47'),
(28, 'MGCHST102203', 'Yailuba Muazu Science Primary School, Sokoto', '2000', '2006', 'Primary School Leaving Certificate', 'G.G.S.S Bodinga', '2007', '2011', 'NECO', 'School of Nursing, Uduth Sokoto', '2012', '2015', 'General Nursing', '', '', '', '', '', '', '', '', 'English', 'C4', 'Mathematics', 'C4', 'Hausa Language', 'C5', 'Islamic Studies', 'C5', 'Geography', 'C5', 'Biology', 'C4', 'Chemistry', 'C5', 'Physics', 'C5', 'Agricultural Science', 'C4', '', '2018-02-06 14:35:53'),
(29, 'MGCHST011004', 'Gwaddodi model primary school', '2018-01-18', '2018-01-18', 'Primary School Leaving Certificate', 'Government day secondary school Rabah', '2018-01-18', '2018-01-18', 'WASSCE', 'College Of Nursing And Midwifery Sciences Sokoto', '2018-01-18', '2018-01-18', 'Basic Nursing', 'nil', '2018-01-18', '2018-01-18', 'nil', 'nil', '2018-01-18', '2018-01-18', 'nil', 'English language', 'C5', 'Mathematics', 'C6', 'Hausa Language', 'C6', 'Islamic Studies', 'C4', 'Geography', 'C5', 'Biology', 'C5', 'Chemistry', 'C5', 'Physics', 'C', 'Agricultural Science', 'C5', '', '2018-01-18 11:37:53'),
(30, 'MGCHST024000', 'nil', '2018-01-18', '2018-01-18', 'nil', 'NIL', '2018-01-18', '2018-01-18', 'nil', 'nil', '2018-01-18', '2018-01-18', 'nil', '', '', '', '', '', '', '', '', 'NIl', 'NIL', 'NIL', 'NIL', 'NIl', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIl', 'NIL', 'NIL', '', 'nil', '', '', '2018-01-18 11:56:11'),
(33, 'MGCHST053421', 'L.E.A primary school sahon rami Niger state', '1992-01-18', '1997-01-18', 'Primary School Leaving Certificate', 'government science college Kagara Niger state', '2002-01-18', '2003-01-18', 'WASSCE', 'Governmnet secondary school Kontagora', '1998-01-18', '2001-01-18', 'WASSCE', 'Kebbi state school of nursing and midwifery', '2004-01-18', '2009-12-31', 'Basic Nursing', '', '', '', '', 'Economics', 'C6', 'Geography', 'D7', 'Hausa Language', 'C6', 'Mathematics', 'C5', 'agricultural science', 'C6', 'Biology', 'C6', 'Chemistry', 'C6', 'Physics', 'C6', 'English', 'C6', '', '2018-01-18 13:50:23'),
(34, 'MGCHST524435', 'Square primary school', '1992-09-21', '1998-07-23', 'Primary School Leaving Certificate', 'Army Day Secondary school kebbi state', '1999-09-12', '2004-12-08', 'WASSCE', 'Kebbi state school of nursing and midwifery', '2005-09-12', '2009-08-12', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English language', 'C6', 'Economics', 'C6', 'Mathematics', 'C4', 'chemistry', 'B2', 'Biology', 'B3', 'Physics', 'B3', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-01-18 14:12:16'),
(35, 'MGCHST222204', 'Central sch. Odoakpu Onitsha', '1982-09-02', '1987-09-02', 'Primary School Leaving Certificate', 'Girls sec.sch.Obosi', '1987-09-02', '1993-06-03', 'WASSCE', 'S.O.N Abuth Zaria', '1997-08-02', '2000-09-02', 'Basic Nursing', 'sch.of post basic midwifery Abuth Kaduna', '2001-09-02', '2002-09-02', 'basic nursing', 'Sch. of post Basic Nursing programmes burns and plastic nursing NOHE Enugu', '2015-09-03', '2016-08-12', 'Basic Nursing', 'CRK', 'C6', 'Geography', 'B3', 'English', 'B3', 'Mathematics', 'B3', 'agricultural science', 'C5', 'Biology', 'C6', 'Chemistry', 'C6', 'Physics', 'C6', 'NIL', 'NIL', '', '2018-01-18 14:27:07'),
(36, 'MGCHST253143', 'Ibrahim Dasuki Model prim sch.sokoto', '1991-09-02', '1997-09-08', 'Primary School Leaving Certificate', 'Nana girls secondary school sokoto', '1997-09-08', '2018-01-18', 'WASSCE', 'sokoto state school of nursing and midwifery', '2004-09-02', '2007-09-03', 'Basic Nursing', 'school of post basic midwifery uduth sokoto', '2010-09-03', '2012-08-02', 'Basic nursing', '', '', '', '', 'Economics', 'E8', 'Geography', 'C4', 'Government', 'E8', 'English Language', 'C6', 'hausa language', 'ABSENT', 'mathematics', 'OUTSTANDING', 'biology', 'B3', 'chemistry', 'A1', 'physics', 'C6', '', '2018-01-18 14:47:02'),
(37, 'MGCHST311030', 'Federal staff primary school sokoto', '1988-09-08', '2018-01-18', 'Primary School Leaving Certificate', 'Government Girls Sec School Bodinga', '1997-09-03', '2000-07-12', 'WASSCE', 'Abdurasheed Adisa Raji special school sokoto', '2018-01-18', '2008-07-12', 'basic studies', 'School of nursing Uduth sokoto', '2001-09-12', '2018-01-18', 'Basic Nursing', 'SOPBMW UDUTH sokoto', '2008-09-02', '2010-08-12', 'Basic Nursing', 'Iislamic studies', 'B2', 'English language', 'C6', 'Hausa Language', 'C5', 'Mathematics', 'C5', 'agricultural science', 'D7', 'Biology', 'C5', 'Chemistry', 'C5', 'Physics', 'C5', 'geography', 'B3', '', '2018-01-18 15:04:54'),
(38, 'MGCHST455403', 'Abubakar dogo model primary school talata mafara', '1989-09-04', '1995-01-18', 'Primary School Leaving Certificate', 'Agwaragi secondary school t/mafara', '1995-06-12', '2000-01-18', 'WASSCE', 'Governmnet day secondary school Rinjin sambo sokoto', '2015-01-18', '2018-01-18', 'WASSCE', 'Uduth school of nursing sokoto', '2018-01-18', '2004-07-13', 'Basic Nursing', 'School of post basic midwifery uduth sokoto', '2009-07-02', '2018-01-18', 'Basic Nursing', 'Marketing', 'C6', 'Geography', 'C5', 'Civil Education', 'D7', 'English Language', 'C6', 'Mathematics', 'C4', 'Agricultural Sciences', 'B3', 'biology', 'C6', 'chemistry', 'C6', 'Physics', 'C4', '', '2018-01-18 15:29:05'),
(40, 'MGCHST542304', 'Federal staff primary school sokoto', '2018-01-18', '1993-09-08', 'Primary School Leaving Certificate', 'Government Girls college sokoto', '1997-01-18', '2000-01-18', 'WASSCE', 'School of Nursing, Uduth Sokoto', '2002-05-13', '2005-01-18', 'Basic Nursing', 'school of post basic midwifery uduth sokoto', '2009-07-20', '2010-06-07', 'Basic Nursing', '', '', '', '', 'English language', 'C4', 'Mathematics', 'C5', 'Hausa Language', 'B2', 'Islamic Studies', 'C4', 'Geography', 'B2', 'Biology', 'B3', 'Chemistry', 'C4', 'Physics', 'B3', 'clothing and textile', 'C5', '', '2018-01-18 16:15:53'),
(41, 'MGCHST354204', 'Sultan mohammed maccido primary sch.', '1989', '1995', 'Primary School Leaving Certificate', 'sheikh Abubakar Gummi memorial college', '1995', '2001', 'WASSCE', 'School of Nursing, Uduth Sokoto', '2005', '2009', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English language', 'C6', 'Mathematics', 'B3', 'Hausa Language', 'C6', 'Islamic Studies', 'C6', 'Economics', 'C6', 'Government', 'C6', 'Biology', 'C6', 'Agricultural science', 'C6', 'Chemistry', 'C5', '', '2018-02-07 16:30:07'),
(42, 'MGCHST024113', 'Ibrahim Gusua Linzimaya modelprimary school', '1997-09-08', '2003-07-12', 'Primary School Leaving Certificate', 'Nagarta college sokoto', '2003-04-12', '2009-06-03', 'WASSCE', 'School of Nursing, Uduth Sokoto', '2012-01-02', '2015-09-13', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English language', 'C6', 'Mathematics', 'C6', 'Hausa Language', 'C5', 'Physics', 'C6', 'Chemisrty', 'C6', 'Biology', 'C6', 'Geography', 'C6', 'agricultural science', 'C6', 'islamic study', 'C5', '', '2018-01-18 16:48:44'),
(47, 'MGCHST025113', 'LIMAWA MODEL PRIMARY SCHOOL', '1989-09-23', '1990-07-21', 'Primary School Leaving Certificate', 'FGGC GWANDU, KEBBI STATE', '1996-09-21', '2001-06-23', 'WASSCE', 'School Of Nursing Sokoto', '2002-01-01', '2005-09-09', 'Basic Nursing', 'School of Post Basic Midwifery', '2011-01-23', '2013-09-23', 'Post Basic Midwifery', '', '', '', '', 'English language', 'C4', 'Mathematics', 'C4', 'Chemistry', 'B3', 'Physics', 'C4', 'Biology', 'C6', 'Agricultural Sciences', 'B3', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-01-23 09:24:26'),
(48, 'MGCHST452303', 'WAZIRI MODEL PRIMARY SCHOOL', '1983-09-21', '2018-01-23', 'Primary School Leaving Certificate', 'Nana girls secondary school sokoto', '1990-09-21', '1995-06-21', 'WASSCE', 'Sokoto State School of Nursing and Midwifery', '1996-01-09', '2000-09-03', 'Basic Nursing', 'Sokoto State School of Midwifery', '2003-01-09', '2018-01-23', 'Post Basic Midwifery', 'Federal School of Psychiatric Nursing', '2018-01-23', '2018-01-23', 'Basic Psychiatric Nursing', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIl', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-01-23 09:47:35'),
(49, 'MGCHST020333', 'Ibrahim Dasuki Model prim sch.sokoto', '2018-01-23', '2018-01-23', 'Primary School Leaving Certificate', 'Giginya Memorial Secondary School, Sokoto', '2011-09-21', '2016-09-23', 'WASSCE', 'School Of Nursing Sokoto', '2018-01-23', '1998-09-23', 'Basic Nursing', 'School of Post Basic Nursing', '2006-01-10', '2007-09-21', 'Post Basic Nursing', '', '', '', '', 'English language', 'B3', 'Mathematics', 'C5', 'Biology', 'C6', 'Civic Education', 'B3', 'Chemistry', 'B2', 'Physics', 'C6', 'Islamic Studies', 'C4', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-01-23 10:04:56'),
(50, 'MGCHST430554', 'Adege Primary School Ndemili', '2018-01-23', '2018-01-23', 'Primary School Leaving Certificate', 'Ndemili Grammar School, Ndemili', '2018-01-23', '2018-01-23', 'WASSCE', 'UDUTH School Of Nursing', '2018-01-23', '2018-01-23', 'Basic Nursing', 'Usmanu Danfodio University, Sokoto', '2006-08-21', '2010-08-21', 'B.Sc', '', '', '', '', 'English language', 'C4', 'Mathematics', 'D7', 'Physic', 'C5', 'Biology', 'C4', 'Chemistry', 'C6', 'Health Science', 'A3', 'Agricultural Science', 'C6', 'Economics', 'A3', 'NIL', 'NIL', '', '2018-01-23 10:33:38'),
(51, 'MGCHST112214', 'Sultan Maccido Model Primary School', '1993', '1999', 'Primary School Leaving Certificate', 'Government Day secondary School', '1999', '2005', 'WASSCE', 'SHT Gwadabawa Sokoto', '2013', '2016', 'Diploma in Community Health', '', '', '', '', '', '', '', '', 'English language', 'C6', 'Mathematics', 'C6', 'Chemistry', 'C6', 'Physics', 'C6', 'Geography', 'C6', 'Biology', 'C6', 'Hausa', 'C6', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-02-07 16:25:11'),
(52, 'MGCHST411125', 'Uduth School of Nursing', '1999-01-01', '2018-01-23', 'Basic Nursing', 'School of Midwifery, Sokoto', '2005-01-01', '2006-02-21', 'Post Basic Midwifery', '', '', '', '', '', '', '', '', '', '', '', '', 'English language', 'C6', 'Mathematics', 'C4', 'Chemistry', 'C6', 'Physics', 'C6', 'Biology', 'A3', 'Agricultural Sciences', 'C5', 'C.R.K', 'C6', 'NIL', 'NIl', 'NIl', 'NIL', '', '2018-01-23 11:07:53'),
(53, 'MGCHST100233', 'Kanjuko Baptist Primary School', '1985-09-01', '1991-01-01', 'Primary School Leaving Certificate', 'Iba High School, Kishi Oyo State', '1991-09-23', '1997-09-23', 'WASSCE', 'Sokoto State School of Nursing and Midwifery', '1998-09-23', '2001-09-22', 'Basic Nursing', 'School of Post Basic Midwifery', '2018-01-23', '2005-09-23', 'Post Basic Midwifery', '', '', '', '', 'English language', 'C5', 'Mathematics', 'C5', 'Hausa Language', 'Pass', 'Physics', 'C5', 'Chemisrty', 'B3', 'Biology', 'C5', 'NIL', 'NIL', 'NIl', 'NIL', 'NIL', 'NIL', '', '2018-01-23 13:30:19'),
(54, 'MGCHST432304', 'KInassarawa Primary School', '1970-09-23', '1976-06-06', 'Primary School Leaving Certificate', 'Kwale Govt Secondary School', '1976-10-02', '1981-09-03', 'WASSCE', 'School of Nursing, Sokoto', '1982-09-03', '1986-08-21', 'Basic Nursing', 'School of Post Basic Nursing', '1993-01-09', '1995-09-21', 'Post Basic Nursing', 'Usmanu Danfodio University', '1997-02-13', '2018-01-23', 'B.Sc Political Science', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NI', 'NIL', 'NI', 'NIL', 'NIL', 'NIL', '', '2018-01-23 13:58:54'),
(55, 'MGCHST304430', 'Magaji Rafi Model Primary School', '2018-01-23', '2018-01-23', 'Primary School Leaving Certificate', 'Government Day Secondary School', '2018-01-23', '2018-01-23', 'WASSCE', 'College Of Nursing And Midwifery Sciences Sokoto', '2018-01-23', '2018-01-23', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English language', 'C6', 'Mathematics', 'C6', 'Chemistry', 'C6', 'Physics', 'C6', 'Geography', '**', 'Biology', 'C5', 'Agricultural Science', 'C4', 'Islamic Studies', 'C6', 'Hausa', 'C4', '', '2018-01-23 14:13:45'),
(56, 'MGCHST100040', 'Ibrahim Gusua Primary school', '1974-09-21', '1980-09-21', 'Primary School Leaving Certificate', 'W.T.C Birni Kebbi', '1980-09-21', '1986-12-23', 'WASSCE', 'School of Midwifery Kastina', '1994-01-01', '1997-09-21', 'Basic Midwifery', 'School Of Nursing Sokoto', '1998-01-01', '2000-12-23', 'Basic Nursing', '', '', '', '', 'English language', 'C5', 'Mathematics', 'C6', 'Chemistry', 'B3', 'Physics', 'B2', 'Biology', 'C6', 'NIL', 'NIl', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-01-23 14:42:39'),
(57, 'MGCHST023520', 'L.E.A Primary School  Ankung', '1975-09-21', '1980-06-12', 'Primary School Leaving Certificate', 'Government Girls Secondary School', '1981-09-21', '1985-06-12', 'WASSCE', 'School Of Nursing Sokoto', '1985-01-01', '1989-09-21', 'Basic Nursing', 'School of Post Basic Midwifery', '1991-02-12', '1992-10-01', 'Post Basic Midwifery', '', '', '', '', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIl', 'nIl', 'NIL', 'NIL', '', '2018-01-23 14:52:30'),
(58, 'MGCHST031201', 'State School of Nursing Sokoto', '1986-11-21', '1990-05-12', 'Basic Nursing', 'Sokoto State School of Midwifery', '1993-03-12', '1994-03-21', 'Basic Midwifery', '', '', '', '', '', '', '', '', '', '', '', '', 'English language', 'B3', 'Mathematics', 'B3', 'Biology', 'C6', 'Chemistry', 'C4', 'Physics', 'C6', 'Economics', 'C6', 'Geography', 'B2', 'agricultural science', 'C4', '', '', '', '2018-01-23 15:04:30'),
(59, 'MGCHST123525', 'Abdulwahab NInzamiyya Primary School', '2018-01-23', '2018-01-23', 'Primary School Leaving Certificate', 'Government Secondary School Tangaza', '2003-09-12', '2018-01-23', 'NECO', 'UDUTH School Of Nursing', '2018-01-23', '2018-01-23', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English language', 'C6', 'Mathematics', 'C6', 'Hausa Language', 'C6', 'Islamic Studies', 'C6', 'Geography', 'C6', 'Biology', 'C5', 'Chemistry', 'C6', 'Physics', 'C6', 'Agricultural Science', 'C4', '', '2018-01-23 15:16:43'),
(60, 'MGCHST403401', 'Uduth School of Nursing', '1998-02-12', '2001-09-23', 'Basic Nursing', 'Uduth School of Midwifery', '2013-02-12', '2015-09-12', 'Post Basic Midwifery', '', '', '', '', '', '', '', '', '', '', '', '', 'English language', 'C5', 'Mathematics', 'C6', 'Biology', 'C6', 'Physics', 'C5', 'Chemistry', 'B3', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-01-23 19:21:29'),
(61, 'MGCHST010435', 'Moh''d Bankanu Model Primary School', '1989-01-23', '1994-01-23', 'Primary School Leaving Certificate', 'Nana Girls Secondary School', '1995-01-23', '2000-01-23', 'WASSCE', 'School of Nursing Sokoto', '2003-01-23', '2007-09-03', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English language', 'C6', 'Geography', 'ABS', 'Mathematics', 'C6', 'Biology', 'C6', 'Chemistry', 'C6', 'Physics', 'C4', 'Agricultural Science', 'C5', 'Hausa', 'ABS', 'Islamic Studies', 'C4', '', '2018-01-23 19:37:18'),
(62, 'MGCHST105134', 'S/Danko Model Primary School', '1986-09-21', '1991-01-01', 'Primary School Leaving Certificate', 'Government Secondary School Burkullu', '1994-09-12', '2000-06-12', 'WASSCE', 'Giginya Memorial Secondary School', '2008-01-23', '2008-12-09', 'WASSCE', 'School Of Nursing Sokoto', '2001-01-12', '2004-07-12', 'Basic Nursing', '', '', '', '', 'English language', 'C4', 'Mathematics', 'C4', 'Biology', 'C4', 'Chemistry', 'C4', 'Physics', 'C5', 'Agricultural Sciences', 'C4', 'Geography', 'C5', 'Islamic Studies', 'C5', 'Hausa', 'C4', '', '2018-01-23 19:53:51'),
(63, 'MGCHST054415', 'Samaru Primary School Gusau', '1988-09-12', '2018-01-23', 'Primary School Leaving Certificate', 'Government Arabic Secondary School Zummi', '1994-09-12', '2000-06-23', 'WASSCE', 'School of Nursing, Uduth Sokoto', '2002-01-23', '2005-10-12', 'Basic Nursing', 'School of Post Basic Nursing, Irrua Edo State', '2011-02-12', '2012-10-23', 'Post Basic Nursing', '', '', '', '', 'English language', 'C5', 'Hausa Language', 'A1', 'Islamic Studies', 'C4', 'Geography', 'C6', 'Biology', 'C6', 'Chemistry', 'B3', 'Physics', 'C6', 'Agricultural science', 'C4', 'NIL', 'NIl', '', '2018-01-23 20:19:25'),
(64, 'MGCHST435534', 'TURBA Model Primary School', '1981-09-03', '1987-06-02', 'Primary School Leaving Certificate', 'Sultan Bello Secondary School Sokoto', '2018-01-23', '2015-06-12', 'WASSCE', 'Sokoto State School of Nursing and Midwifery', '1996-01-12', '2000-12-02', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English language', 'C6', 'Mathematics', 'C5', 'Agric Science', 'C6', 'Biology', 'C6', 'Chemistry', 'C6', 'Physics', 'C5', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-01-23 20:46:21'),
(65, 'MGCHST530222', 'Model Primary School Sokoto', '1988-09-07', '1993-09-02', 'Primary School Leaving Certificate', 'Government Girls Sec School Illela', '1996-09-29', '2001-06-21', 'WASSCE', 'UDUTH School Of Nursing Sokoto', '2002-01-24', '2005-08-17', 'Basic Nursing', 'St. Luke Anglican School of Nursing &amp; Midwifery Wusasa', '2007-02-13', '2009-10-23', 'Post Basic Nursing', '', '', '', '', 'English language', 'C6', 'Mathematics', 'C5', 'Biology', 'C5', 'Chemistry', 'C4', 'Physics', 'C5', 'Hausa', 'B3', 'C.R.K', 'C6', 'Geography', 'B3', 'Agricultural Science', 'C5', '', '2018-01-24 07:29:32'),
(66, 'MGCHST341130', 'Army Children Primary School Gusau', '1984-09-22', '1990-05-11', 'Primary School Leaving Certificate', 'Women Arabic Teachers College Gusau', '1990-09-22', '1995-06-22', 'WASSCE', 'School of Nursing and Midwifery, Sokoto', '1997-01-23', '2000-12-02', 'Basic Nursing', 'National Orthopedic Hospital Dala Kano', '2008-09-12', '2009-12-23', 'Post Basic Nursing', 'School for Continuing Education Gusau', '2013-02-12', '2013-12-24', 'Certificate', 'English language', 'C5', 'Mathematics', 'C6', 'Biology', 'C6', 'Chemistry', 'C6', 'Physics', 'C6', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-01-24 07:46:50'),
(67, 'MGCHST304235', 'State School of Nursing Sokoto', '1996-01-07', '2000-12-23', 'Basic Nursing', 'Sokoto State School of Midwifery', '2002-01-12', '2003-11-18', 'Basic Midwifery', 'Federal School of Psychiatric Nursing, Sokoto', '2005-01-19', '2006-12-12', 'Psychiatric Nursing', 'Hafsatu Secondary School, Sokoto', '2013-09-12', '2014-06-23', 'WASSCE', 'Model Primary School Anka, Gusau', '1983-09-21', '1988-06-23', 'Primary School Leaving Certificate', 'English language', 'C6', 'Mathematics', 'B3', 'Biology', 'C6', 'Physics', 'C6', 'Animal Husbandry', 'C6', 'Chemistry', 'C6', 'Islamic Studies', 'C6', 'NIl', 'NIL', 'NIL', 'NIL', '', '2018-01-24 08:02:16'),
(68, 'MGCHST443225', 'Badon Rafi Model Primary School', '1987-09-21', '1992-06-23', 'Primary School Leaving Certificate', 'Government Girls College, Sokoto', '1992-09-12', '1998-06-24', 'WASSCE', 'School of Nursing, Uduth Sokoto', '2001-01-13', '2005-10-12', 'Basic Nursing', 'School of Post Basic Midwifery Uduth, Sokoto', '2010-02-14', '2012-10-27', 'Post Basic Midwifery', '', '', '', '', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-01-24 08:18:00'),
(69, 'MGCHST351204', 'Model Primary School Dangulbi', '1991-09-12', '1996-06-23', 'Primary School Leaving Certificate', 'NIL', '2018-01-24', '2018-01-24', 'WASSCE', '', '', '', '', '', '', '', '', '', '', '', '', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-01-24 08:32:34'),
(70, 'MGCHST304432', 'Federal Staff Primary School Sokoto', '1988-09-23', '1994-06-23', 'Primary School Leaving Certificate', 'Nana Girls Secondary School', '1994-09-23', '2000-06-21', 'WASSCE', 'School of Nursing, Uduth Sokoto', '2004-02-12', '2007-10-03', 'Basic Nursing', 'School of Post Basic Midwifery, Uduth Sokoto', '2011-02-21', '2013-12-09', 'Post basic Midwifery', '', '', '', '', 'English language', 'B2', 'Mathematics', 'C5', 'Hausa Language', 'C4', 'Biology', 'B2', 'Physics', 'C4', 'Agricultural Sciences', 'E8', 'NIL', 'NIL', 'NIL', 'NL', 'NIL', 'NIL', '', '2018-01-24 08:57:54'),
(71, 'MGCHST022523', 'Sultan Ward Primary School Sokoto', '1974-09-19', '1979-06-23', 'Primary School Leaving Certificate', 'Agency For Mass Education', '1999-09-23', '2001-06-23', 'WASSCE', 'School Of Nursing Sokoto', '1987-02-13', '1990-10-23', 'Basic Nursing', 'Ahmadu Bello Unversity, Zaria Institute of Education', '2008-02-12', '2009-12-13', 'Certificate', '', '', '', '', 'English language', 'C6', 'Mathematics', 'B3', 'Biology', 'B3', 'Physics', 'C4', 'Chemistry', 'B3', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-01-24 09:10:44'),
(72, 'MGCHST015225', 'Turaki Model Primary School, Sokoto', '1985-09-23', '1990-05-25', 'Primary School Leaving Certificate', 'Nana Girls Secondary School', '1991-09-12', '1996-06-23', 'WASSCE', 'School Of Nursing Sokoto', '1996-01-23', '2000-12-23', 'Basic Nursing', 'College of Nursing &amp; Midwifery, Sokoto', '2002-03-23', '2003-11-23', 'Basic Midwifery', 'Federal School of Post Basic Psychiatric Nursing', '2005-01-23', '2006-11-27', 'Post Basic Nursing', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-01-24 09:24:35'),
(73, 'MGCHST012231', 'Dasuki Model Primary School Gada', '1983-09-22', '1988-06-14', 'Primary School Leaving Certificate', 'Unity School Gummi , Nagata College Sokoto', '1989-09-02', '1994-06-02', 'WASSCE', 'Kaduna State Polytechnic', '2005-01-18', '2007-10-18', 'OND', 'Usmanu Danfodio University, Sokoto', '2011-04-13', '2015-09-12', 'B.Sc', 'Sokoto State School of Nursing', '1996-02-13', '1999-12-23', 'Basic Nursing', 'English language', 'C6', 'Mathematics', 'C4', 'Chemistry', 'C6', 'Physics', 'C6', 'Biology', 'B3', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-01-24 12:49:09'),
(74, 'MGCHST530312', 'Command Children Primary School, Sokoto', '1989-09-16', '1994-06-24', 'Primary School Leaving Certificate', 'Army Day Secondary School Sokoto', '1997-09-12', '2000-06-24', 'WASSCE', 'UDUTH School Of Nursing', '2001-01-17', '2004-12-12', 'Basic Nursing', '', '', '', '', '', '', '', '', 'NIL', 'NIl', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-01-24 12:58:36'),
(75, 'MGCHST024350', 'Sultan Ward Primary School Sokoto', '1980-09-12', '1986-07-22', 'Primary School Leaving Certificate', 'Attahiru Secondary School, Sokoto', '1986-09-23', '1992-06-12', 'WASSCE', 'Sokoto State School of Nursing and Midwifery', '1997-11-12', '2001-05-21', 'Basic Nursing', '', '', '', '', '', '', '', '', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIl', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-01-24 13:10:17'),
(76, 'MGCHST142145', 'LSMB EIKA OHEZENYI', '1973-09-15', '1978-06-17', 'Primary School Leaving Certificate', 'Sokoto Teachers College', '1985-09-20', '1987-06-11', 'Grade 2', 'School Of Nursing Sokoto', '1987-02-11', '1990-10-21', 'Basic Nursing', 'School of Post Basic Midwifery', '1994-02-01', '1995-09-18', 'Post Basic Midwifery', 'School of Preoperative Ibadan', '2005-01-21', '2006-11-20', 'Scrub Nurse', 'English language', 'B3', 'Mathematics', 'B3', 'Geography', 'B3', 'Economics', 'B3', 'Biology', 'B2', 'Chemistry', 'A1', 'Physics', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-01-24 14:01:18'),
(77, 'MGCHST311151', 'Sultan Muh''d Maccido M.P.S', '1991', '1996', 'Primary School Leaving Certificate', 'Sultan Atiku Secondary School Sokoto', '1996', '2002', 'NECO', 'Sokoto State School of Nursing and Midwifery', '2003', '2007', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English language', 'C6', 'Mathematics', 'C5', 'Civil Education', 'C5', 'Biology', 'C5', 'Chemistry', 'C5', 'Physics', 'C5', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-02-07 16:20:41'),
(78, 'MGCHST113003', 'TANGAZA MODEL PRIMARY SCHOOL', '1993-09-21', '1998-06-09', 'Primary School Leaving Certificate', 'Sultan Atiku Secondary School Sokoto', '1998-09-18', '2003-06-12', 'WASSCE', 'Sultan Abdulrahman School of Health &amp; Technology', '2012-02-12', '2015-08-21', 'Diploma in Community Health', '', '', '', '', '', '', '', '', 'English language', 'C6', 'Hausa Language', 'D7', 'Mathematics', 'D7', 'Biology', 'C5', 'Islamic Studies', 'F9', 'Government', 'E8', 'Agricultural Science', 'C5', 'Nil', 'nil', '', '', '', '2018-01-24 14:31:55'),
(79, 'MGCHST415101', 'Sultan Ibrahim Dasuki Model Primary School', '1988', '1993', 'Primary School Leaving Certificate', 'Giginya Memorial Secondary School, Sokoto', '2003', '2006', 'NECO', 'Sokoto State School of Nursing and Midwifery', '2009', '2012', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English language', 'C5', 'Mathematics', 'C4', 'Hausa Language', 'C4', 'Biology', 'C5', 'Chemistry', 'C6', 'Physics', 'C6', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-02-07 16:33:42'),
(80, 'MGCHST432433', 'Sultan Muh''d Maccido M.P.S', '1995-09-10', '2001-07-21', 'Primary School Leaving Certificate', 'Government Day Secondary School', '2002-09-10', '2018-06-21', 'WASSCE', 'School Of Nursing Sokoto', '2010-03-11', '2013-11-23', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English language', 'C6', 'Mathematics', 'C6', 'Hausa Language', 'C6', 'Geography', 'C6', 'Biology', 'C6', 'Chemistry', 'C6', 'Physics', 'C6', 'Agricultural science', 'D7', 'NIL', 'NIL', '', '2018-01-24 15:25:54'),
(81, 'MGCHST301005', 'Magaji Rafi Model Primary School', '1992-09-22', '1998-06-11', 'Primary School Leaving Certificate', 'Giginya Memorial Secondary School, Sokoto', '2005-09-12', '2018-01-24', 'WASSCE', 'Sokoto State School of Nursing and Midwifery', '2011-02-13', '2014-11-23', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English language', 'C5', 'Mathematics', 'C6', 'Hausa Language', 'C5', 'Geography', 'E8', 'Biology', 'C6', 'Chemistry', 'C6', 'Physics', 'C6', 'Agricultural science', 'C6', 'NIL', 'NIL', '', '2018-01-24 15:34:01'),
(82, 'MGCHST533454', 'Holy Micheal', '2000', '2011', 'Primary School Leaving Certificate', 'Great Ambasador College', '2012', '2015', 'O''LEVEL RESULT', '', '', '', '', '', '', '', '', '', '', '', '', 'English Language', 'a1', 'Mathematics', 'd2', 'Biology', 'A1', 'Physics', 'c2', 'Chemistry', 'a1', 'Geography', 'c4', 'Agric Science', 'c5', 'Economics', 'c4', 'Yoruba', 'b3', 'NIL', '2018-02-01 13:53:38'),
(83, 'MGCHST555050', 'Ibrahim Gusua Model Primary School', '1998', '2003', 'Primary School Leaving Certificate', 'School For Continue Education (Women Centre Gusau)', '2012', '2014', 'WASSCE', 'UDUTH School Of Nursing', '2010', '2013', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English language', 'C6', 'Mathematics', 'C4', 'Biology', 'B3', 'Chemistry', 'C6', 'Physics', 'C6', 'NIL', 'NIl', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-02-05 09:29:46'),
(84, 'MGCHST554055', 'Turaki Model Primary School, Sokoto', '1993', '1999', 'Primary School Leaving Certificate', 'Government Technical College Farfaru', '2002', '2008', 'WASSCE', 'Government Day Secnodary School', '2009', '2008', 'Neco', 'School Of Nursing Sokoto', '2005', '2008', 'Basic Nursing', 'Federal School of Post Basic Psychiatric Nursing', '2011', '2012', 'Post Basic Nursing', 'English language', 'C5', 'Mathematics', 'C6', 'Hausa Language', 'C5', 'Islamic Studies', 'C5', 'Biology', 'C6', 'Chemistry', 'C6', 'Physics', 'C6', 'Agricultural science', 'C5', 'NIL', 'NIL', '', '2018-02-05 09:46:22'),
(85, 'MGCHST252521', 'Model Primary School Birni Yauri', '1992', '1997', 'Primary School Leaving Certificate', 'Government Unity Secondary School Ringim', '1998', '2003-01-10', 'WASSCE', 'Kebbi State School of Nursing &amp; Midwifery', '2004', '2008', 'Basic Nursing', 'Federal School of Psychiatric Nursing, Kware Sokoto', '2011', '2012', 'Post Basic Midwifery', '', '', '', '', 'English language', 'C6', 'Mathematics', 'C6', 'Hausa Language', 'C4', 'Islamic Studies', 'C5', 'Geography', 'B3', 'Biology', 'B3', 'Chemistry', 'C6', 'Physics', 'C5', 'Agricultural Science', 'C5', '', '2018-02-05 10:00:42'),
(86, 'MGCHST420143', 'NUD School Ilase', '1997', '2003', 'Primary School Leaving Certificate', 'Imesi-Ile Commercial Grammar School', '2003', '2008', 'WASSCE', 'Sokoto State School of Nursing and Midwifery', '2012', '2013', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English language', 'C5', 'Mathematics', 'C6', 'Yoruba', 'C4', 'Economics', 'C6', 'Geography', 'C6', 'Biology', 'C6', 'Chemistry', 'C6', 'Physics', 'C5', 'Agricultural Science', 'C6', '', '2018-02-05 14:47:35'),
(87, 'MGCHST035124', 'Army Children Primary School Keffi', '1984', '1999', 'Primary School Leaving Certificate', 'Army Day Secondary School Birni Kebbi', '1992', '1996', 'WASSCE', 'School Of Nursing Sokoto', '1996', '2001', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English language', 'C5', 'Mathematics', 'C5', 'C.R.S', 'C5', 'Economics', 'C6', 'Geography', 'D7', 'Biology', 'C5', 'Chemistry', 'C6', 'Physics', 'C5', 'Agricultural Science', 'C6', '', '2018-02-05 14:59:55'),
(88, 'MGCHST151042', 'Federal Government College Staff Primary School Sokoto', '1985', '1990', 'Primary School Leaving Certificate', 'Federal Government College Sokoto', '1991', '1997', 'WASSCE', 'School of Nursing Sokoto', '2002', '2006', 'Basic Nursing', 'School of Post Basic Midwifery', '2010', '2012', 'Post Basic Midwifery', '', '', '', '', 'English language', 'C5', 'Mathematics', 'C6', 'Physics', 'D7', 'Chemistry', 'C5', 'Economics', 'C5', 'Geography', 'C6', 'Biology', 'D7', 'Yoruba Language', 'B3', 'Agricultural Science', 'C6', '', '2018-02-07 10:39:44'),
(89, 'MGCHST400110', 'Galagiman Gari Model Primary School', '1995', '2000', 'Primary School Leaving Certificate', 'Sheikh Abubakar Gummi Memorial College', '2002', '2008', 'WASSCE', 'College Of Nursing And Midwifery Sciences Sokoto', '2009', '2012', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English language', 'C5', 'Mathematics', 'C4', 'Chemistry', 'C5', 'Physics', 'C6', 'Biology', 'C4', 'Hausa', 'C4', 'Economics', 'C5', 'Agricultural science', 'C5', 'Islamic Studies', 'C5', '', '2018-02-07 11:01:06'),
(90, 'MGCHST540525', 'Magaji Rafi Model Primary School', '1993', '1999', 'Primary School Leaving Certificate', 'NBC/NTC', '2017', '2017', 'WASSCE', 'SASTH GWD SOKOTO', '2012', '2015', 'Diploma in Community Health', 'Sokoto Polytechnic', '2009', '2013', 'National Diploma', '', '', '', '', 'English language', 'C6', 'Mathematics', 'C4', 'Physics', 'C6', 'Chemistry', 'C5', 'Biology', 'C6', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-02-07 11:10:37'),
(91, 'MGCHST515532', 'Model Primary School, Suleja', '1988', '1993', 'Primary School Leaving Certificate', 'Girls Day Secondary School, Suleja', '1994', '2000', 'WASSCE', 'School of Nursing Bida, Niger State', '2003', '2006', 'Basic Nursing', 'School of Psychiatric Nursing Kware, Sokoto State.', '2007', '2008', 'Post Basic Midwifery', '', '', '', '', 'English language', 'B3', 'Mathematics', 'E8', 'Geography', 'D7', 'Economics', 'E8', 'Literature in English Language', 'C6', 'Biology', 'C5', 'Chemistry', 'E8', 'Physics', 'C5', 'Agricultural Science', 'C6', '', '2018-02-07 11:20:53'),
(92, 'MGCHST513224', 'A.A.S Model Primary School Daki-Takwas', '1986', '1991', 'Primary School Leaving Certificate', 'Sultan Bello Secondary School Sokoto', '2017', '2017', 'NECO', 'School of Nursing, Uduth Sokoto', '2005', '2009', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English language', 'C6', 'Mathematics', 'C6', 'Civil Education', 'C5', 'Biology', 'C5', 'Chemistry', 'C5', 'Physics', 'C5', 'Agricultural Science', 'D7', 'Islamic Studies', 'C6', 'Marketing', 'C6', '', '2018-02-07 11:35:29'),
(93, 'MGCHST502120', 'Magaji Rafi Model Primary School', '1993', '1999', 'Primary School Leaving Certificate', 'Sultan Atiku Secondary School Sokoto', '1999', '2005', 'NECO', 'Sultan Abdulrahman School of Health &amp; Technology', '2006', '2008', 'Diploma in Community Health', 'Sultan Abdur School of Health Tech', '2014', '2016', 'Diploma', '', '', '', '', 'English Language', 'C6', 'Mathematics', 'C6', 'Geography', 'F9', 'Biology', 'C6', 'Chemistry', 'C5', 'Physics', 'F9', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-02-07 11:43:18'),
(94, 'MGCHST535103', 'Model Primary School, Bodinga', '1979', '1984', 'Primary School Leaving Certificate', 'Junior Secondary School, Bodinga', '1985', '1988', 'JSSCE', 'Sheik Abubakar Gummi Memorial Secondary School, Sokoto', '1988', '1990', 'WASSCE', 'Sokoto State School of Nursing &amp; Midwifery', '1995', '1998', 'Basic Nursing', 'Aminu Teaching Hospital Kano Institute of Kidney Disease', '2007', '2013', 'Certificate', 'English Language', 'C6', 'Mathematics', 'C6', 'Economics', 'C5', 'Geography', 'C5', 'Agricultural Science', 'B3', 'Biology', 'D7', 'Chemistry', 'C6', 'Physics', 'B3', 'Islamic Studies', 'C6', '', '2018-02-07 11:53:27'),
(95, 'MGCHST203134', 'Magaji Rafi Model Primary School', '1972', '1978', 'Primary School Leaving Certificate', 'Government Secondary School, Kebbi', '1978', '1983', 'WASSCE', 'School of Nursing and Midwifery, Sokoto', '1985', '1988', 'Basic Nursing', 'School of Post Basic Nursing, Edo State', '1994', '1996', 'Post Basic Midwifery', '', '', '', '', 'English Language', 'C6', 'Mathematics', 'C6', 'Biology', 'C6', 'Chemistry', 'B3', 'Physics', 'D7', 'Computer Studies', 'E8', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', '', '2018-02-07 12:01:54'),
(96, 'MGCHST332312', 'Methodist Primary School', '1889', '1995', 'Primary School Leaving Certificate', 'Onward College Kastina', '1995', '2001', 'WASSCE', 'School Of Nursing, Kastina', '2002', '2005', 'Basic Nursing', '', '', '', '', '', '', '', '', 'English Language', 'C6', 'Mathematics', 'C5', 'Physics', 'C4', 'Chemistry', 'C6', 'Biology', 'C5', 'Economics', 'C6', 'C.R.K', 'A1', 'Agricultural science', 'B3', 'NIL', 'NIL', '', '2018-02-07 14:45:54'),
(97, 'MGCHST335111', 'Glorious College', '1990', '1992', 'Primary School Cert', 'Charles Comp Sch', '1999', '2000', 'O'' Level Cert', '', '', '', '', '', '', '', '', '', '', '', '', 'Maths', 'A1', 'English', 'C4', 'Biology', 'C5', 'Physics', 'C6', 'Chemistry', 'C6', 'Geography', 'B3', 'Econs', 'a2', 'Govt', 'd4', 'Yoruba', 'a2', 'NIL', '2018-02-13 17:38:24'),
(98, 'MGCHST152342', 'Glorious College', '2000', '2001', 'Primary School Cert', 'Charles Comp Sch', '1990', '2000', 'O'' Level Cert', '', '', '', '', '', '', '', '', '', '', '', '', 'Maths', 'A1', 'English', 'C4', 'Biology', 'F9', 'Physics', 'C6', 'Chemistry', 'C6', 'Geography', 'B3', 'Econs', 'A1', 'Govt', 'd4', 'Yoruba', 'a2', '', '2018-02-14 12:01:32'),
(99, 'MGCHST554205', 'Glorious College', '2000', '2001', 'Primary School Cert', 'Charles Comp Sch', '2003', '2004', 'O'' Level Cert', '', '', '', '', '', '', '', '', '', '', '', '', 'Maths', 'A1', 'English', 'C4', 'Biology', 'F9', 'Physics', 'B3', 'Chemistry', 'C6', 'Geography', 'B3', 'Econs', 'a2', 'Govt', 'd4', 'Yoruba', 'a2', '', '2018-02-14 12:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `course_allocation`
--

CREATE TABLE `course_allocation` (
  `allocate_id` int(255) NOT NULL,
  `staff_number` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `dept_id` varchar(255) NOT NULL,
  `prog_id` varchar(255) NOT NULL,
  `course_status` varchar(255) NOT NULL,
  `level_id` int(255) NOT NULL,
  `session_id` int(22) NOT NULL,
  `semester_id` int(22) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_allocation`
--

INSERT INTO `course_allocation` (`allocate_id`, `staff_number`, `course_code`, `dept_id`, `prog_id`, `course_status`, `level_id`, `session_id`, `semester_id`, `time_added`) VALUES
(1, '17-1471', 'CAC220', '1', '1', 'Compulsory', 1, 1, 1, '2018-02-15 21:54:41'),
(2, '18-1114', '\r\nNotice:  Undefined index: course_code in C:XAMPPhtdocsmosgrachst.sch.ngmgchst-administratordepartmentedit-allocated-course.php on line 122', '2', '2', 'Compulsory', 4, 1, 1, '2018-02-17 22:02:45'),
(3, '17-1471', 'DIA417', '1', '3', 'Compulsory', 1, 1, 1, '2018-02-15 21:33:01'),
(4, '18-1114', 'C A126', '1', '2', 'Elective', 1, 1, 1, '2018-02-15 21:41:00'),
(5, '17-1471', 'BIB223', '1', '3', 'Compulsory', 1, 1, 1, '2018-02-15 10:26:22'),
(6, '17-1471', 'BIB223', '1', '2', 'Compulsory', 1, 1, 1, '2018-02-15 10:26:42'),
(7, '17-1471', 'CUL424', '1', '2', 'Compulsory', 2, 1, 1, '2018-02-15 10:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(255) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `dept_abv` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `dept_abv`, `time_added`) VALUES
(1, 'Community Health Science', 'CHS', '2018-02-13 16:06:51'),
(2, 'Environmental Health Science', 'EHS', '2018-02-13 16:07:13'),
(3, 'Health Information Management', 'HIM', '2018-02-13 16:07:43'),
(4, 'Nutrition and Dietectics', 'NDS', '2018-02-13 16:07:58'),
(5, 'Pharmacy', 'PMS', '2018-02-13 16:08:08'),
(6, 'Nursing &amp; Midwifery', 'NCM', '2018-02-13 16:11:48'),
(7, 'Public Health Science', 'PHS', '2018-02-13 16:08:31'),
(8, 'Dental Technology', 'DTS', '2018-02-13 16:10:30'),
(9, 'Medical Imaging/X Ray Technology', 'MIT\r\n', '2018-02-13 16:10:30'),
(10, 'Medical Laboratory Science', 'MLS', '2018-02-13 16:11:04'),
(11, 'Nursing Science', 'NSC', '2018-02-13 16:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `departmental_courses`
--

CREATE TABLE `departmental_courses` (
  `dept_course_id` int(255) NOT NULL,
  `course_id` int(244) NOT NULL,
  `dept_id` int(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departmental_courses`
--

INSERT INTO `departmental_courses` (`dept_course_id`, `course_id`, `dept_id`, `time_added`) VALUES
(1, 43, 1, '2018-02-15 08:15:20'),
(2, 114, 1, '2018-02-15 08:15:20'),
(3, 50, 1, '2018-02-15 08:15:20'),
(4, 8, 1, '2018-02-15 08:15:20'),
(5, 100, 1, '2018-02-15 08:15:20'),
(6, 87, 1, '2018-02-15 08:15:20'),
(7, 170, 1, '2018-02-15 08:15:20'),
(8, 179, 1, '2018-02-15 08:16:28'),
(9, 94, 1, '2018-02-15 08:16:28'),
(10, 172, 1, '2018-02-15 08:16:29'),
(11, 27, 1, '2018-02-15 08:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_course`
--

CREATE TABLE `lecturer_course` (
  `lect_course_id` int(11) NOT NULL,
  `staff_number` varchar(255) NOT NULL,
  `dept_course_id` int(255) NOT NULL,
  `level_id` int(255) NOT NULL,
  `semester_id` int(255) NOT NULL,
  `session_id` int(255) NOT NULL,
  `dept_id` int(255) NOT NULL,
  `prog_id` int(255) NOT NULL,
  `course_status` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(255) NOT NULL,
  `level_name` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`, `time_added`) VALUES
(1, '100', '2017-04-09 16:23:18'),
(2, '200', '2017-04-09 16:23:18'),
(3, '300', '2017-04-09 16:23:35'),
(4, '400', '2017-04-09 16:23:35'),
(5, '500', '2018-02-15 10:53:59'),
(6, '600', '2018-02-15 10:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `passports`
--

CREATE TABLE `passports` (
  `pass_id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passport_url` varchar(255) NOT NULL,
  `time_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passports`
--

INSERT INTO `passports` (`pass_id`, `email`, `passport_url`, `time_registered`) VALUES
(1, 'tolajide74@gmail.com', 'C360_2016-09-05-09-20-49_edit1.jpg', '2017-11-02 21:13:02'),
(2, 'tolajide75@gmail.com', 'IMG-20161128-WA009.jpg', '2017-09-09 12:44:46'),
(14, 'mosgrachtb@gmail.com', 'sttt.jpg', '2017-11-02 21:22:20'),
(15, 'infodesk@trenchcoregroup.com', 'students.jpg', '2017-11-02 21:24:11'),
(16, 'burser@gmail.com', 'download.jpg', '2017-11-03 06:17:52'),
(17, 'p.adeleke@trenchcoregroup.com', 'IMG_0133.JPG', '2017-11-03 09:01:45'),
(18, 'hod@mosgrachst.sch.ng', 'images.jgp.png', '2018-02-23 14:04:54'),
(20, 'sola@gmail.com', 'downloada.jpg', '2017-11-07 15:57:04'),
(21, 'bursar@mosgrachst.sch.ng', 's-l500.jpg', '2017-11-22 16:22:59'),
(22, 'lecturer@mosgrachst.sch.ng', 'Hearing-Aid-5539990_2 (1).jpg', '2017-11-22 16:28:12'),
(23, 'admission@gmail.com', 'images (1).png', '2018-02-23 14:02:46'),
(24, 'testing@gmail.com', 'Ebooks.jpg', '2018-02-23 15:16:09'),
(25, 'bamidele@gmail.com', 'download (2).png', '2018-02-14 13:13:45'),
(26, 'adioFatimah@gmail.com', 'C360_2016-09-05-09-16-27.jpg', '2018-02-14 13:31:51'),
(27, 'IDOWUPOPOOLA@GMAIL.COM', 'C360_2016-09-05-09-16-34.jpg', '2018-02-14 13:36:06'),
(28, 'alukoemmanuel@gmail.com', 'C360_2016-09-05-09-16-52.jpg', '2018-02-14 13:40:15'),
(29, 'bamigbolakadijah@gmail.com', 'C360_2016-09-05-09-20-43.jpg', '2018-02-14 13:44:41'),
(30, 'babalolafaruq@gmail.com', 'C360_2016-09-05-09-20-49.jpg', '2018-02-14 13:47:46'),
(31, 'lukmonjimoh@gmail.com', 'IMG_0491 - Copy.JPG', '2018-02-14 13:52:56'),
(32, 'folatobi@gmail.com', 'DSC_0153.JPG', '2018-02-14 13:55:21'),
(33, 'taiwotobi@gmai.com', 'DSC_0156.JPG', '2018-02-14 13:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `prog_id` int(255) NOT NULL,
  `prog_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`prog_id`, `prog_name`) VALUES
(1, 'Degree FT'),
(2, 'Diploma'),
(3, 'Degree PT');

-- --------------------------------------------------------

--
-- Table structure for table `programme_course`
--

CREATE TABLE `programme_course` (
  `procourse_id` int(255) NOT NULL,
  `prog_course` varchar(255) NOT NULL,
  `requirement` text NOT NULL,
  `certification` text NOT NULL,
  `duration` varchar(10) NOT NULL,
  `dept_id` int(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programme_course`
--

INSERT INTO `programme_course` (`procourse_id`, `prog_course`, `requirement`, `certification`, `duration`, `dept_id`, `time_added`) VALUES
(1, 'COMMUNITY HEALTH EXTENSION WORKER (CHEW)', 'Five (5) Credit level passes at WASSC/SSCE/GCE/NECO O&Atilde;&sbquo;&acirc;&euro;&trade;level not more than two (2) sittings. These must include: English Language  Mathematics	 Physics	 Chemistry and Biology/Health Science. Also candidates with JCHEW certificates have an added advantage', 'NATIONAL DIPLOMA IN COMMUNITY HEALTH (NATIONAL COMM. HEALTH PRACTITIONERS BOARD.)', '3 Years', 1, '2018-02-13 16:42:46'),
(2, 'COMMUNITY HEALTH', 'Three (3) credits and two (2) passes at O&Atilde;&sbquo;&acirc;&euro;&trade;level WASSC or NECO in not more than two sittings to include English Language  Mathematics, Biology/Health Science and any other two subjects.', 'B.SC COMMUNITY HEALTH', '4 Years', 1, '2018-02-13 16:44:26'),
(3, 'HEALTH ASSISTANT', 'Five (5) O Level passes including English Language  Mathematics and Biology and any other two subject from WAEC or NECO in not more than two (2) sittings', 'CERTIFICATE IN HEALTH ASSISTANT', '2 Years', 3, '2018-02-13 16:46:05'),
(4, 'ENVIRONMENTAL HEALTH OFFICER (ND)', 'Minimum entry requirement into National Diploma (ND) in Environmental Health Science Programme is five (5) O&Atilde;&sbquo;&acirc;&euro;&trade;level credits in English Language', 'DIPLOMA IN ENVIRONMENTAL', '2 Years', 2, '2018-02-13 16:48:17'),
(5, 'ENVIRONMENTAL HEALTH TECHNICIAN', '&quot;Minimum of 5 passees in O&Atilde;&sbquo;&acirc;&euro;&trade;level WASSC/SSCE/GCE/NECO at not more than 2 sittings. Three (3) of the passes must be at at credit level and should include English Language, Biology or Health Science	 Geography, Technical Drawing and any other subjects', 'ENVIRONMENTAL HEALTH TECHNICIAN DIPLOMA (WAHEB)', '3 Years', 2, '2018-02-13 16:55:58'),
(6, 'HEALTH PROMOTION AND EDUCATION', 'Five(5) O Level Credit Passes including English Language, Biology Chemistry and any other subject from WAEC or NECO in not more than 2 Sittings', 'DIPLOMA IN HEALTH PROMOTION AND EDUCATION', '2 Years', 3, '2018-02-13 16:59:34'),
(7, 'HEALTH INFORMATION MANAGEMENT', '&quot;Five (5) Olevel credits in English Language', 'DIPLOMA', '3 Years', 3, '2018-02-13 17:00:53'),
(8, 'PROFESSIONAL DIPLOMA IN HEALTH INFORMATION MGT', 'Five credits in OLevel at not more than two  sittings at the SSCE/WASSC or its equivalent. The subjects must include: English Language', 'PROFESSIONAL DIPLOMA', '3 Years', 3, '2018-02-13 17:02:28'),
(9, 'NUTRITION AND DIETETICS', 'Five credits in O&Atilde;&sbquo;&acirc;&euro;&trade;level at not more than two  sittings at the SSCE/WASSC or its equivalent. The subjects must include: English Language, Five credits in O&Atilde;&sbquo;&acirc;&euro;&trade;level at not more than two  sittings at the SSCE/WASSC or its equivalent. The subjects must include: English Language', 'BSC', '4 Years', 4, '2018-02-13 17:03:36'),
(10, 'NURSING SCIENCE', 'All degree applicants must have obtained Diploma In the programme the person must have registered Nursing Cert', 'B.SC NURSING SCIENCE', '4 Years', 11, '2018-02-13 17:05:37'),
(11, 'NURSING AND MIDWIFERY', 'All degree applicants must have obtained Diploma In the programme the person must have registered Nursing Cert', 'B.SC NURSING SCIENCE', '4 Years', 6, '2018-02-13 17:07:41'),
(12, 'PUBLIC HEALTH SCIENCE', 'All degree applicants must have obtained Diploma In the programme', 'BSC IN PUBLIC HEALTH', '4 Years', 7, '2018-02-13 17:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `school_course`
--

CREATE TABLE `school_course` (
  `course_id` int(255) NOT NULL,
  `course_title` varchar(266) NOT NULL,
  `course_code` varchar(6) NOT NULL,
  `course_unit` int(1) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_course`
--

INSERT INTO `school_course` (`course_id`, `course_title`, `course_code`, `course_unit`, `time_added`) VALUES
(1, 'English Language I ', 'ENG111', 2, '2017-11-07 16:08:22'),
(2, 'Health Education ', 'HEA112', 2, '2017-11-07 16:08:22'),
(3, 'Church History', 'CHU113', 2, '2017-11-07 16:08:22'),
(4, 'Christian Worship ', 'CHR114', 2, '2017-11-07 16:08:22'),
(5, 'Family Education ', 'FAM115', 2, '2017-11-07 16:08:22'),
(6, 'Old Testament Survey ', 'OLD116', 2, '2017-11-07 16:08:22'),
(7, 'Evangelism ', 'EVA117', 2, '2017-11-07 16:08:22'),
(8, 'CAC History & Development', 'CAC118', 2, '2017-11-07 16:08:22'),
(9, 'Rudiments of Music ', 'RUD119', 2, '2017-11-07 16:08:22'),
(10, 'Church Accounting ', 'CHU110', 2, '2017-11-07 16:08:22'),
(11, 'English Language II  ', 'ENG121', 2, '2017-11-07 16:08:22'),
(12, 'SystematicTheology I ', 'SYS122', 2, '2017-11-07 16:08:22'),
(13, 'Homiletics I ', 'HOM123', 2, '2017-11-07 16:08:22'),
(14, 'Pentateuch  ', 'PEN124', 2, '2017-11-07 16:08:22'),
(15, 'Hermeneutics ', 'HER125', 2, '2017-11-07 16:08:22'),
(16, 'Introduction to Missions ', 'INT126', 2, '2017-11-07 16:08:22'),
(17, 'New Testament Survey ', 'NEW127', 2, '2017-11-07 16:08:22'),
(18, 'Introduction to Christian Education ', 'INT128', 2, '2017-11-07 16:08:22'),
(19, 'French', 'FRE129', 2, '2017-11-07 16:08:22'),
(20, 'Children Education ', 'CHI220', 2, '2017-11-07 16:08:22'),
(21, 'Youth Education ', 'YOU221', 2, '2017-11-07 16:08:22'),
(22, 'English Language III ', 'ENG212', 2, '2017-11-07 16:08:22'),
(23, 'Homiletics II', 'HOM213', 2, '2017-11-07 16:08:22'),
(24, 'Life of Christ ', 'LIF214', 2, '2017-11-07 16:08:22'),
(25, 'Intro to Christian Ethics ', 'INT215', 2, '2017-11-07 16:08:22'),
(26, 'Intro to Islam ', 'INT216', 2, '2017-11-07 16:08:22'),
(27, 'Educational Technology ', 'EDU217', 2, '2017-11-07 16:08:22'),
(28, 'Church Growth  ', 'CHU218', 2, '2017-11-07 16:08:22'),
(29, 'Hymnology ', 'HYM219', 2, '2017-11-07 16:08:22'),
(30, 'Citizenship Education ', 'CIT210', 2, '2017-11-07 16:08:22'),
(31, 'English Literature', 'ENG211', 2, '2017-11-07 16:08:22'),
(32, 'Yoruba Language ', 'YOR212', 2, '2017-11-07 16:08:22'),
(33, 'Hausa Language ', 'HAU213', 2, '2017-11-07 16:08:22'),
(34, 'Praxis of Evangelism ', 'PRA214', 2, '2017-11-07 16:08:22'),
(35, 'English Language IV', 'ENG225', 2, '2017-11-07 16:08:22'),
(36, 'Acts of Apostles ', 'ACT226', 2, '2017-11-07 16:08:22'),
(37, 'Christian Counselling ', 'CHR227', 2, '2017-11-07 16:08:22'),
(38, 'Teaching Methodology', 'TEA228', 2, '2017-11-07 16:08:22'),
(39, 'Epistles to the Romans ', 'EPI229', 2, '2017-11-07 16:08:22'),
(40, 'Systematic Theology II', 'SYS220', 2, '2017-11-07 16:08:22'),
(41, 'Introduction to Computer ', 'INT221', 2, '2017-11-07 16:08:22'),
(42, 'Structure of WATR ', 'STR222', 2, '2017-11-07 16:08:22'),
(43, 'Bible Geography ', 'BIB223', 2, '2017-11-07 16:08:22'),
(44, 'Ministerial Ethics', 'MIN224', 2, '2017-11-07 16:08:22'),
(45, 'Adult Education', 'ADU225', 2, '2017-11-07 16:08:22'),
(46, 'Sunday School ', 'SUN226', 2, '2017-11-07 16:08:22'),
(47, 'Practicum', 'PRA227', 2, '2017-11-07 16:08:22'),
(48, 'English Language  ', 'ENG118', 2, '2017-11-07 16:08:22'),
(49, 'Church History I  ', 'CHU119', 2, '2017-11-07 16:08:22'),
(50, 'CAC History & Development  ', 'CAC110', 2, '2017-11-07 16:08:22'),
(51, 'Rudiments of Music  ', 'RUD111', 2, '2017-11-07 16:08:22'),
(52, 'Old Testament Survey  ', 'OLD112', 2, '2017-11-07 16:08:22'),
(53, 'Study Methodology  ', 'STU113', 2, '2017-11-07 16:08:22'),
(54, 'Introduction to Islam  ', 'INT114', 2, '2017-11-07 16:08:22'),
(55, 'Evangelism  ', 'EVA115', 2, '2017-11-07 16:08:22'),
(56, 'Historical Books  ', 'HIS116', 2, '2017-11-07 16:08:22'),
(57, 'Citizenship Education  ', 'CIT117', 2, '2017-11-07 16:08:22'),
(58, 'Introduction to Mission  ', 'INT118', 2, '2017-11-07 16:08:22'),
(59, 'Health Education  ', 'HEA119', 2, '2017-11-07 16:08:22'),
(60, 'English & Research  ', 'ENG120', 2, '2017-11-07 16:08:22'),
(61, 'Hermeneutics  ', 'HER121', 2, '2017-11-07 16:08:22'),
(62, 'Homiletics I   ', 'HOM122', 2, '2017-11-07 16:08:22'),
(63, 'Systematic theology I  ', 'SYS123', 2, '2017-11-07 16:08:22'),
(64, 'New Testament Survey  ', 'NEW124', 2, '2017-11-07 16:08:22'),
(65, 'Introduction to Computer  ', 'INT125', 2, '2017-11-07 16:08:22'),
(66, 'Counselling  ', 'COU126', 2, '2017-11-07 16:08:22'),
(67, 'N T Greek I  ', 'N T127', 2, '2017-11-07 16:08:22'),
(68, 'Church Growth  ', 'CHU128', 2, '2017-11-07 16:08:22'),
(69, 'Children Education  ', 'CHI129', 2, '2017-11-07 16:08:22'),
(70, 'Pedagogy  ', 'PED120', 2, '2017-11-07 16:08:22'),
(71, 'Practicum  ', 'PRA121', 2, '2017-11-07 16:08:22'),
(72, 'Church History II  ', 'CHU122', 2, '2017-11-07 16:08:22'),
(73, 'Pentateuch  ', 'PEN223', 2, '2017-11-07 16:08:22'),
(74, 'French ', 'FRE224', 2, '2017-11-07 16:08:22'),
(75, 'History of Christianity in W/A  ', 'HIS215', 2, '2017-11-07 16:08:22'),
(76, 'Creative Writings  ', 'CRE216', 2, '2017-11-07 16:08:22'),
(77, 'Systematic Theology II  ', 'SYS217', 2, '2017-11-07 16:08:22'),
(78, 'Intro to Christian Ethics  ', 'INT218', 2, '2017-11-07 16:08:22'),
(79, 'Pauline Corpus  ', 'PAU219', 2, '2017-11-07 16:08:22'),
(80, 'Islam in West Africa  ', 'ISL210', 2, '2017-11-07 16:08:22'),
(81, 'Structure of WATR  ', 'STR211', 2, '2017-11-07 16:08:22'),
(82, 'Homiletics II  ', 'HOM212', 2, '2017-11-07 16:08:22'),
(83, 'English Literature  ', 'ENG213', 2, '2017-11-07 16:08:22'),
(84, 'N T Greek II  ', 'N T214', 2, '2017-11-07 16:08:22'),
(85, 'Bible Geography   ', 'BIB215', 2, '2017-11-07 16:08:22'),
(86, 'Educational Technology ', 'EDU226', 2, '2017-11-07 16:08:22'),
(87, 'CAC Doctrine & Practices  ', 'CAC227', 2, '2017-11-07 16:08:22'),
(88, 'Hymnology  ', 'HYM228', 2, '2017-11-07 16:08:22'),
(89, 'Study of Religion  ', 'STU229', 2, '2017-11-07 16:08:22'),
(90, 'Intro to Christian Education  ', 'INT220', 2, '2017-11-07 16:08:22'),
(91, 'Lit & Theo of Synoptic Gospels  ', 'LIT221', 2, '2017-11-07 16:08:22'),
(92, 'Religion of Canaan & God of Israel  ', 'REL222', 2, '2017-11-07 16:08:22'),
(93, 'Ministerial Ethics  ', 'MIN223', 2, '2017-11-07 16:08:22'),
(94, 'Developmental Psychology ', 'DEV224', 2, '2017-11-07 16:08:22'),
(95, 'Psychology of Education', 'PSY225', 2, '2017-11-07 16:08:22'),
(96, 'Adult Education  ', 'ADU226', 2, '2017-11-07 16:08:22'),
(97, 'Sunday School  ', 'SUN227', 3, '2017-11-07 16:08:22'),
(98, 'Long Essay  ', 'LON228', 2, '2017-11-07 16:08:22'),
(99, 'Theology of Mission  ', 'THE229', 2, '2017-11-07 16:08:22'),
(100, 'CAC Strategy in Mission and Evangelism  ', 'CAC220', 2, '2017-11-07 16:08:22'),
(101, 'Cross Cultural  ', 'CRO221', 2, '2017-11-07 16:08:22'),
(102, 'Igbo Language  ', 'IGB122', 2, '2017-11-07 16:08:22'),
(103, 'Practicum', 'PRA123', 2, '2017-11-07 16:08:22'),
(104, 'Use of English', 'USE114', 2, '2017-11-07 16:08:22'),
(105, 'Pentateuch', 'PEN115', 2, '2017-11-07 16:08:22'),
(106, 'Introduction to A T R', 'INT116', 2, '2017-11-07 16:08:22'),
(107, 'Introduction to Computer', 'INT117', 2, '2017-11-07 16:08:22'),
(108, 'Use of Library ', 'USE119', 2, '2017-11-07 16:08:22'),
(109, 'Health Education', 'HEA110', 2, '2017-11-07 16:08:22'),
(110, 'Introduction to Study of  Religion', 'INT111', 2, '2017-11-07 16:08:22'),
(111, 'Citizenship Education', 'CIT112', 2, '2017-11-07 16:08:22'),
(112, 'Praxis of Evangelism', 'PRA113', 2, '2017-11-07 16:08:22'),
(113, 'Basic Communication  ', 'BAS115', 2, '2017-11-07 16:08:22'),
(114, 'C A C History & Development  ', 'C A126', 2, '2017-11-07 16:08:22'),
(115, 'Acts of Apostles  ', 'ACT127', 2, '2017-11-07 16:08:22'),
(116, 'Historical Books  ', 'HIS128', 2, '2017-11-07 16:08:22'),
(117, 'Church Growth  ', 'CHU129', 2, '2017-11-07 16:08:22'),
(118, 'Evangelism  ', 'EVA120', 2, '2017-11-07 16:08:22'),
(119, 'Introduction to Psychology  ', 'INT121', 2, '2017-11-07 16:08:22'),
(120, 'English Literature  ', 'ENG122', 2, '2017-11-07 16:08:22'),
(121, 'Entrepreneurship  ', 'ENT123', 2, '2017-11-07 16:08:22'),
(122, 'History of Christian Mission  ', 'HIS124', 2, '2017-11-07 16:08:22'),
(123, 'Children Education    ', 'CHI225', 2, '2017-11-07 16:08:22'),
(124, 'French  ', 'FRE226', 2, '2017-11-07 16:08:22'),
(125, 'N T Greek I  ', 'N T217', 2, '2017-11-07 16:08:22'),
(126, 'Literature and theology of Synoptic Gospels  ', 'LIT218', 2, '2017-11-07 16:08:22'),
(127, 'Hermeneutics  ', 'HER219', 2, '2017-11-07 16:08:22'),
(128, 'Church History I ', 'CHU210', 2, '2017-11-07 16:08:22'),
(129, 'Systematic Theology I  ', 'SYS211', 2, '2017-11-07 16:08:22'),
(130, 'Islam in West Africa  ', 'ISL212', 2, '2017-11-07 16:08:22'),
(131, 'Introduction to Philosophy  ', 'INT213', 2, '2017-11-07 16:08:22'),
(132, 'Creativity and Human thinking  ', 'CRE214', 2, '2017-11-07 16:08:22'),
(133, 'Critical Introduction to O T  ', 'CRI215', 2, '2017-11-07 16:08:22'),
(134, 'Youth Education  ', 'YOU216', 2, '2017-11-07 16:08:22'),
(135, 'Homiletics I', 'HOM228', 2, '2017-11-07 16:08:22'),
(136, 'Systematic Theology II', 'SYS229', 2, '2017-11-07 16:08:22'),
(137, 'Church History II', 'CHU221', 2, '2017-11-07 16:08:22'),
(138, 'Sociology of Religion', 'SOC222', 2, '2017-11-07 16:08:22'),
(139, 'Introduction to Ethics ', 'INT223', 2, '2017-11-07 16:08:22'),
(140, 'African Church  Fathers ', 'AFR224', 2, '2017-11-07 16:08:22'),
(141, 'Religion of Canaan and God of Israel', 'REL325', 2, '2017-11-07 16:08:22'),
(142, 'Adult Education', 'ADU326', 2, '2017-11-07 16:08:22'),
(143, 'Critical Introduction to New Testament', 'CRI317', 2, '2017-11-07 16:08:22'),
(144, 'Systematic Theology III', 'SYS318', 2, '2017-11-07 16:08:22'),
(145, 'Homiletics II', 'HOM319', 2, '2017-11-07 16:08:22'),
(146, 'Poetical Books                                                                                                                                             ', 'POE310', 2, '2017-11-07 16:08:22'),
(147, 'Major Prophets ', 'MAJ311', 2, '2017-11-07 16:08:22'),
(148, 'Hebrew Grammar', 'HEB312', 2, '2017-11-07 16:08:22'),
(149, 'Psychology of Religion', 'PSY313', 2, '2017-11-07 16:08:22'),
(150, 'Pastoral Epistles', 'PAS314', 2, '2017-11-07 16:08:22'),
(151, 'Structure of West African Religion', 'STR315', 2, '2017-11-07 16:08:22'),
(152, 'Structure of west African Religion', 'STR316', 2, '2017-11-07 16:08:22'),
(153, 'Psychology of Evangelism', 'PSY317', 2, '2017-11-07 16:08:22'),
(154, 'Yoruba Language', 'YOR318', 2, '2017-11-07 16:08:22'),
(155, 'Educational Management', 'EDU319', 2, '2017-11-07 16:08:22'),
(156, 'Psychology of Education', 'PSY310', 2, '2017-11-07 16:08:22'),
(157, 'Psychology of Evangelism', 'PSY311', 2, '2017-11-07 16:08:22'),
(158, 'Systematic Theology IV', 'SYS322', 2, '2017-11-07 16:08:22'),
(159, 'Research Methodology', 'RES323', 2, '2017-11-07 16:08:22'),
(160, 'Philosophy of Religion', 'PHI324', 2, '2017-11-07 16:08:22'),
(161, 'Apologetics', 'APO325', 2, '2017-11-07 16:08:22'),
(162, 'Indigenous Churches in West Africa', 'IND326', 2, '2017-11-07 16:08:22'),
(163, 'Minor Prophets', 'MIN327', 2, '2017-11-07 16:08:22'),
(164, 'Apocalypse of John', 'APO328', 4, '2017-11-07 16:08:45'),
(165, 'Practicum ', 'PRA329', 2, '2017-11-07 16:08:22'),
(166, 'Philosophy of Education', 'PHI420', 2, '2017-11-07 16:08:22'),
(167, 'Theology of Mission', 'THE421', 2, '2017-11-07 16:08:22'),
(168, 'Pastoral Theology and Church Admin.', 'PAS412', 2, '2017-11-07 16:08:22'),
(169, 'Studies in Pauline Epistles', 'STU413', 2, '2017-11-07 16:08:22'),
(170, 'CAC Doctrine and Practices', 'CAC414', 2, '2017-11-07 16:08:22'),
(171, 'Ministerial Ethics', 'MIN415', 2, '2017-11-07 16:08:22'),
(172, 'Dialogue with people of Living Faith', 'DIA417', 2, '2017-11-07 16:08:22'),
(173, 'Religion and Society ', 'REL418', 2, '2017-11-07 16:08:22'),
(174, 'Apocalypse of John', 'APO419', 2, '2017-11-07 16:08:22'),
(175, 'Pastoral Counselling ', 'PAS410', 2, '2017-11-07 16:08:22'),
(176, 'Epistle to the Romans', 'EPI421', 2, '2017-11-07 16:08:22'),
(177, 'Christian Education', 'CHR422', 2, '2017-11-07 16:08:22'),
(178, 'Christianity in West Africa', 'CHR423', 2, '2017-11-07 16:08:22'),
(179, 'Cultural Anthropology ', 'CUL424', 2, '2017-11-07 16:08:22'),
(180, 'Christian Ethics', 'CHR425', 2, '2017-11-07 16:08:22'),
(181, 'Long Essay', 'LON426', 2, '2017-11-07 16:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(255) NOT NULL,
  `semester_name` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_name`, `time_added`) VALUES
(1, 'First Semeter', '2017-04-04 00:46:04'),
(2, 'Second Semester', '2017-04-04 00:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(255) NOT NULL,
  `session_name` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `session_name`, `time_added`) VALUES
(1, '2017/2018', '2017-04-04 00:46:41'),
(2, '2018/2019', '2017-04-04 00:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(255) NOT NULL,
  `staff_number` varchar(255) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `staff_email` varchar(255) NOT NULL,
  `staff_phone` varchar(20) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `staff_type` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `birth_date` varchar(20) NOT NULL,
  `marital_status` varchar(15) NOT NULL,
  `dept_id` int(255) NOT NULL,
  `qualification_id` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_number`, `staff_name`, `staff_email`, `staff_phone`, `sex`, `religion`, `staff_type`, `address`, `birth_date`, `marital_status`, `dept_id`, `qualification_id`, `time_added`) VALUES
(6, '17-1471', 'Folake Damilola Solape', 'sola@gmail.com', '09088766556', 'Male', 'Christanity', '3', 'Oro State Ibada', '2017-11-19', 'Single', 1, '3,2,4', '2017-11-07 15:57:04'),
(7, '18-1114', 'Akinola Bamidele', 'bamidele@gmail.com', '09087878542', 'Male', 'Christanity', '3', 'Inside The School', '2018-02-25', 'Married', 1, '4,1,5', '2018-02-14 13:13:45'),
(8, '18-4411', 'adio fatimah bukola', 'adioFatimah@gmail.com', '08023541289', 'Female', 'Islam', '3', 'No 23 ogunrun eletu road mowe ogun state', '2018-02-14', 'Single', 10, '3', '2018-02-14 13:31:51'),
(9, '18-1174', 'IDOWU POPOOLA', 'IDOWUPOPOOLA@GMAIL.COM', '08098905515', 'Male', 'Christanity', '1', 'No 53 marryland lagos state', '2018-02-09', 'Single', 5, '2', '2018-02-14 13:36:06'),
(10, '18-7177', 'aluko emmanuel', 'alukoemmanuel@gmail.com', '09032845612', 'Male', 'Christanity', '2', 'NO 01 fashola street ifo ogun state', '2018-01-28', 'Married', 6, '4', '2018-02-14 13:40:15'),
(11, '18-7774', 'bamigbola kadijah', 'bamigbolakadijah@gmail.com', '08123242526', 'Female', 'Islam', '4', 'No 45 mumim street okoko lagos state', '2018-03-09', 'Single', 8, '3', '2018-02-14 13:44:41'),
(12, '18-4474', 'babalola faruq', 'babalolafaruq@gmail.com', '08138725088', 'Male', 'Islam', '4', '4fr6gt7h68yjk8ui9o0;pl88u76rde45fr6gt78k8i9', '2018-02-17', 'Married', 9, '2', '2018-02-14 13:47:46'),
(13, '18-1441', 'jimoh lukmon', 'lukmonjimoh@gmail.com', '08030662053', 'Male', 'Christanity', '4', '35467iyytghjgfdcvgbnm', '2018-03-10', 'Single', 10, '2', '2018-02-14 13:52:56'),
(14, '18-4111', 'fola tobi', 'folatobi@gmail.com', '09012452367', 'Male', 'Christanity', '4', 'yhjii867yhip9o8iuy', '2018-03-06', 'Married', 2, '2', '2018-02-14 13:55:21'),
(15, '18-7414', 'Taiwo lawal', 'taiwotobi@gmai.com', '08079867545', 'Male', 'Islam', '4', 'rtyu89iujop09876y', '2017-12-31', 'Single', 11, '3', '2018-02-14 13:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `staff_qualification`
--

CREATE TABLE `staff_qualification` (
  `qualification_id` int(255) NOT NULL,
  `qualification_name` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_qualification`
--

INSERT INTO `staff_qualification` (`qualification_id`, `qualification_name`, `time_added`) VALUES
(1, 'Ond', '2017-05-11 06:11:02'),
(2, 'Hnd', '2017-05-11 06:10:38'),
(3, 'Bsc', '2017-05-11 06:14:29'),
(4, 'Msc', '2017-05-11 06:10:48'),
(5, 'Phd', '2017-05-11 06:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `student_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`student_id`, `user_name`, `password`, `time_added`) VALUES
(9, '16/NSC/3060', '4f690515737989e42cdad2683c6923c66d08bbcf', '2017-11-07 14:33:05'),
(22, '16/NSC/00002', '4ef8f3019bc1d818f75b62044954a64a9af09621', '2018-01-11 04:50:50'),
(23, '16/NSC/000003', 'c93d852a53200798a350c75b2f66f2e70de5e57e', '2018-01-11 05:15:41'),
(24, '16/NSC/00004', '8d0f1c23582cbd226ea7d188d1a3b04f08309ccd', '2018-01-11 05:28:03'),
(25, '16/NSC/00005', 'f8cbae0037e046ed51a9779347779bc133b088c1', '2018-01-11 05:40:08'),
(26, '16/NSC/00006', '1f5b6a26cfc2ceb8b2e99ab05fbb23663d50d392', '2018-01-11 05:54:52'),
(27, '16/NSC/00007', '4dfbf1e659c784dece5a3a7991d2d3a091522f3a', '2018-01-11 06:08:21'),
(28, '16/NSC/00008', '97c55d997712feaed629aedc38827336114159ed', '2018-01-18 11:28:27'),
(29, '16/NSC/00009', '88be8aeb63ce4ce183ae138f91c9cdb8bf172457', '2018-01-18 11:49:30'),
(30, '16/NSC/00010', 'e4579d8a17317ed7202f533e8e95503ffc4f8a4f', '2018-01-18 12:13:26'),
(32, '16/NSC/00012', '332cd80d023b202a14cc450d6935ca19b5c3aca8', '2018-01-18 12:38:01'),
(34, '16/NSC/00014', '95e932d586ae0694efe12dc1a70c50bd2776a4e7', '2018-01-18 13:13:14'),
(35, '16/NSC/00015', '2e6806d0eafcaf775653d6281c361869c4924839', '2018-01-18 13:58:19'),
(36, '16/NSC/00016', '8a0454f1d7f81cefade11a5b445b0e5d7a9fa314', '2018-01-18 14:17:41'),
(37, '16/NSC/00017', 'f2526e0ab4e1771e4ffdcc1d9a49227ae29ec5b9', '2018-01-18 14:34:33'),
(38, '16/NSC/00018', 'a2050907032435117efc9fb4ebcbd7a79721902b', '2018-01-18 14:53:58'),
(39, '16/NSC/00019', 'd77fa251285080bfba3647565632e4ae9f875053', '2018-01-18 15:16:45'),
(40, '16/NSC/00020', '3a7dc7015e71a19231cb41a546eafa78024899d4', '2018-01-18 15:37:04'),
(42, '16/NSC/00022', 'dbe82406e05da2e0dcfe0b1fc0a0dbb2d930716c', '2018-01-18 16:03:30'),
(43, '16/NSC/00023', 'a0e7b8247539ec62575cd61ea43000384b3d333b', '2018-01-18 16:24:29'),
(44, '16/NSC/00026', 'd62abd3a75ae79c34e73a0cb33c8ffc760f53d7f', '2018-01-18 16:41:52'),
(45, '16/NSC/00024', '7b2eb909a1e44c06f9cd05a8bad7fb56424034f7', '2018-01-20 11:34:54'),
(50, '16/NSC/00027', '8a421977293ec1e6e9fcb019897e42ee3cb3f081', '2018-01-23 09:17:44'),
(51, '16/NSC/00028', '58d59948cf0fcbbcbb64e22e6f161fd81ed70853', '2018-01-23 09:39:09'),
(52, '16/NSC/00025', '36f1584c068a591cdba865d6a932606a607c8a1d', '2018-01-23 09:59:35'),
(53, '16/NSC/00011', '7146fe875cb9c5c333c8b98ec89b2e1e25985745', '2018-01-23 10:26:10'),
(54, '16/NSC/00029', '683add5c51cd0c59d87f5257d47836b2063c47d8', '2018-01-23 10:48:26'),
(55, '16/NSC/00030', 'ebb4e1d848f626eba775a0b17c8d445d68513bea', '2018-01-23 11:04:29'),
(56, '16/NSC/00031', '766740efd5f095fd8e203331e68d4da8feaa86c2', '2018-01-23 13:25:02'),
(57, '16/NSC/00032', '11847796d514ac50f61f5c75243cc7a6ed24d7a8', '2018-01-23 13:52:34'),
(58, '16/NSC/0001', '9e100ab259130efa249fdb465fe3d1cadda00c15', '2018-01-23 14:09:42'),
(59, '16/NSC/00033', '664ee304614fbf2471c8b292cf27335016f080b9', '2018-01-23 14:25:22'),
(60, '16/NSC/00034', '21c66d6c739110d761e20f98af2c41e9166ea8b8', '2018-01-23 14:47:57'),
(61, '16/NSC/00035', 'd39680ee87920ab163ae0527399bf72cd4e9eec2', '2018-01-23 15:00:44'),
(62, '16/NSC/00036', '49f6e96d4915a95634da9884eaae0cf655445dfe', '2018-01-23 15:10:13'),
(63, '16/NSC/00037', '0a763e7ec9d05a681e102be08989f88a6b04fa38', '2018-01-23 19:18:39'),
(64, '16/NSC/00038', 'a9377ce9c9dcb41f4975872d78a25f3d20ad0bec', '2018-01-23 19:31:13'),
(65, '16/NSC/00039', 'a3dbc4ee25a0a5509640285e78b3845d4b4f38c6', '2018-01-23 19:47:02'),
(66, '16/NSC/00040', 'eaaa9273dda1f2d5083b2d151533255d3d8380c7', '2018-01-23 20:10:19'),
(67, '16/NSC/00041', 'dfd4079cef22afb2f8a9fd5ffc680b64c6c4173c', '2018-01-23 20:41:27'),
(68, '16/NSC/00042', '8a5596f73b3e2dfbad36c4163e77a5b73b091772', '2018-01-24 07:23:42'),
(69, '16/NSC/00043', '8a47f4e76c4cb97a7cdc35b8ff1e967e380e24b1', '2018-01-24 07:38:14'),
(70, '16/NSC/00044', 'd6f782e4213f8db9cb8bb5341da4eacf0e2dc61d', '2018-01-24 07:52:42'),
(71, '16/NSC/00045', '9ad4de2a2079e21a557c74d4d1bdf47097ed41af', '2018-01-24 08:13:16'),
(72, '16/NSC/00046', '9069ab8155bad6dc69c14434661c022b45450427', '2018-01-24 08:28:23'),
(73, '16/NSC/00047', 'cb5599f26219897e6c1ba84468a77985ba60fb06', '2018-01-24 08:43:20'),
(74, '16/NSC/00048', 'ce407d0711565efac81428e5aff404fb8424bced', '2018-01-24 09:06:23'),
(75, '16/NSC/00049', '44e14b87131e20813bbb42b0db5edd051a16b1f3', '2018-01-24 09:19:10'),
(77, '16/NSC/00051', '0c85162f279d4d5445220048c612f17a8d84e064', '2018-01-24 12:41:04'),
(78, '16/NSC/00052', '241518fff3307800c9bbdab142344809a7710ec8', '2018-01-24 12:55:12'),
(79, '16/NSC/00053', 'd7ea3e6300d7c1a68a0f6119448f554b18d76727', '2018-01-24 13:06:35'),
(80, '16/NSC/00054', 'e83c6ffb07a09db4a78a2ab571c0b4b45dd5a800', '2018-01-24 13:15:12'),
(81, '16/NSC/00055', '740adb2933507ab98620ca46d603841926c8873f', '2018-01-24 14:08:01'),
(82, '16/NSC/00056', 'c6ecb4d581346caf2e4acccf41e354e4f860e052', '2018-01-24 14:26:15'),
(83, '16/NSC/00057', '975e683002b7b7b1b375b491d99d419869a592b1', '2018-01-24 15:03:54'),
(84, '16/NSC/00058', 'c699254bcc1c2c6864b8e378458c0fb764ce2eb2', '2018-01-24 15:21:56'),
(85, '16/NSC/00059', 'a42f1bbc5463225d24e96edc691c3c6dd7333c85', '2018-01-24 15:30:33'),
(88, '16/NSC/00060', '32fe032d45fbde5026f1d1c1e8773fd68321866b', '2018-02-05 09:23:44'),
(89, '16/NSC/00061', '1b8d6a586bf3fb5669f91daff67ba11ae9241f57', '2018-02-05 09:36:46'),
(90, '16/NSC/00062', '10de0c2d9dcdbcad3cfd739bd5a0db754ab02c97', '2018-02-05 09:52:06'),
(91, '16/NSC/00063', '6f5108063907332196d2742c0a79172a3e06dd93', '2018-02-05 10:47:09'),
(92, '16/NSC/00064', '33d7a8e91429528e113263e66a796108ddc5349c', '2018-02-05 14:16:58'),
(93, '16/NSC/00065', '28e7b175bdfb0325565db0a5df863d28e572041a', '2018-02-05 14:54:20'),
(95, '16/NSC/00067', '20b8806e8a9585e616dcc6fe16d8ca9c167b8b4f', '2018-02-07 10:34:18'),
(96, '16/NSC/00068', 'ea6f5bd88d1809dd77ffa0419552dfc36532d649', '2018-02-07 10:57:25'),
(97, '16/NSC/00069', '2ea84cf5107cf553c19180b350318af107d22441', '2018-02-07 11:06:21'),
(98, '16/NSC/00070', '1e407fb7e30e96a8f484deb8db04bb8ff30b515a', '2018-02-07 11:14:56'),
(99, '16/NSC/00071', '12687adbb44f5b15deea05618f034e8c792874ed', '2018-02-07 11:31:36'),
(100, '16/NSC/00072', 'e40c52bf79b68db42262f5e081d556a90e2fe809', '2018-02-07 11:39:36'),
(101, '16/NSC/00073', '42daf7e278671c1149848dc1712ebfba17a261e0', '2018-02-07 11:47:40'),
(102, '16/NSC/00074', 'a0ed1ece4370b88df66d0da2aeb0a52e2f9436db', '2018-02-17 20:46:47'),
(103, '16/NSC/00075', '9640cde7757816f5cb7c035b976da920ffffb180', '2018-02-17 21:56:33'),
(104, 'MGCHST/DPT/3303', '3edfa4fe5266da27eff917a5e66f498f2d0f0383', '2018-02-17 10:47:27'),
(105, 'MGCHST/DPT/3303', '3edfa4fe5266da27eff917a5e66f498f2d0f0383', '2018-02-17 10:47:27'),
(106, 'MGCHST/DPT/3110', '1b97f08f1c149ada38e4ba967a0b14d7ee456ba8', '2018-02-17 10:47:42'),
(107, 'MGCHST/DPT/0100', '2da7bff8fb2ef34d05a9d114ecc75c35496442d4', '2018-02-17 10:47:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`admission_id`);

--
-- Indexes for table `admission_payment`
--
ALTER TABLE `admission_payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `admission_registration_step1`
--
ALTER TABLE `admission_registration_step1`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `admission_registration_step2`
--
ALTER TABLE `admission_registration_step2`
  ADD PRIMARY KEY (`reg2_is`);

--
-- Indexes for table `course_allocation`
--
ALTER TABLE `course_allocation`
  ADD PRIMARY KEY (`allocate_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `departmental_courses`
--
ALTER TABLE `departmental_courses`
  ADD PRIMARY KEY (`dept_course_id`);

--
-- Indexes for table `lecturer_course`
--
ALTER TABLE `lecturer_course`
  ADD PRIMARY KEY (`lect_course_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `passports`
--
ALTER TABLE `passports`
  ADD PRIMARY KEY (`pass_id`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`prog_id`);

--
-- Indexes for table `programme_course`
--
ALTER TABLE `programme_course`
  ADD PRIMARY KEY (`procourse_id`);

--
-- Indexes for table `school_course`
--
ALTER TABLE `school_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `staff_qualification`
--
ALTER TABLE `staff_qualification`
  ADD PRIMARY KEY (`qualification_id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `act_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=754;
--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `admission_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `admission_payment`
--
ALTER TABLE `admission_payment`
  MODIFY `pay_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `admission_registration_step1`
--
ALTER TABLE `admission_registration_step1`
  MODIFY `reg_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `admission_registration_step2`
--
ALTER TABLE `admission_registration_step2`
  MODIFY `reg2_is` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `course_allocation`
--
ALTER TABLE `course_allocation`
  MODIFY `allocate_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `departmental_courses`
--
ALTER TABLE `departmental_courses`
  MODIFY `dept_course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `lecturer_course`
--
ALTER TABLE `lecturer_course`
  MODIFY `lect_course_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `passports`
--
ALTER TABLE `passports`
  MODIFY `pass_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `programme`
--
ALTER TABLE `programme`
  MODIFY `prog_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `programme_course`
--
ALTER TABLE `programme_course`
  MODIFY `procourse_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `school_course`
--
ALTER TABLE `school_course`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `staff_qualification`
--
ALTER TABLE `staff_qualification`
  MODIFY `qualification_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `student_login`
--
ALTER TABLE `student_login`
  MODIFY `student_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
