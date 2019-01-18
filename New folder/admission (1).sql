-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2018 at 07:39 AM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `school_id` int(255) NOT NULL,
  `new_dept` varchar(255) NOT NULL,
  `time_admitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`admission_id`, `regNumber`, `student_matric_num`, `dept_name`, `prog_id`, `level`, `admission_status`, `admission_year`, `school_id`, `new_dept`, `time_admitted`) VALUES
(1, 'MGCHST325240', '17/NSC/015', 'Nursing Science', 1, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(2, 'MGCHST310522', '17/NSC/081', 'Nursing &amp; Midwifery', 3, '300', 1, '2016/2017', 2, 'Nil', '2018-03-30 04:37:55'),
(3, 'MGCHST515142', '17/NSC/048', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(4, 'MGCHST014141', '17/NSC/067', 'Nursing &amp; Midwifery', 3, '300', 1, '2016/2017', 2, 'Nursing Science', '2018-03-29 09:57:24'),
(5, 'MGCHST102203', '17/NSC/031', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(6, 'MGCHST151310', '17/NSC/057', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(7, 'MGCHST011004', '17/NSC/077', 'Nursing &amp; Midwifery', 1, '300', 1, '2016/2017', 2, 'Nursing Science', '2018-03-29 10:45:47'),
(8, 'MGCHST024000', '17/NSC/014', 'Nursing Science', 1, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(9, 'MGCHST201404', '17/NSC/019', 'Nursing Science', 1, '300', 1, '2017/2018', 0, 'Nil', '2018-03-30 04:50:05'),
(10, 'MGCHST112212', '17/NSC/075', 'Nursing &amp; Midwifery', 1, '300', 1, '2016/2017', 2, 'Nursing Science', '2018-03-29 10:41:40'),
(11, 'MGCHST053421', '17/NSC/025', 'Nursing Science', 1, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(12, 'MGCHST524435', '17/NSC/016', 'Nursing Science', 1, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(13, 'MGCHST222204', '17/NSC/017', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(14, 'MGCHST253143', '17/NSC/018', 'Nursing Science', 1, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(15, 'MGCHST311030', '17/NSC/020', 'Nursing Science', 1, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(16, 'MGCHST455403', '17/NSC/021', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(17, 'MGCHST331045', '17/NSC/022', 'Nursing Science', 1, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(18, 'MGCHST542304', '17/NSC/023', 'Nursing Science', 1, '300', 1, '2016/2017', 0, 'Nil', '2018-03-30 04:12:11'),
(19, 'MGCHST354204', '16/PHS/011', 'Public Health Science', 3, '300', 1, '2016/2017', 2, 'Nil', '2018-03-27 07:08:51'),
(20, 'MGCHST024113', '17/NSC/076', 'Health Information', 3, '300', 1, '2016/2017', 2, 'Nursing Science', '2018-03-29 10:43:25'),
(21, 'MGCHST504301', '17/NSC/049', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(22, 'MGCHST025113', '17/NSC/037', 'Nursing Science', 1, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(23, 'MGCHST452303', '17/NSC/029', 'Nursing Science', 1, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(24, 'MGCHST020333', '17/NSC/034', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(25, 'MGCHST430554', '17/NSC/046', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(26, 'MGCHST112214', '16/PHS/013', 'Public Health Science', 1, '300', 1, '2016/2017', 2, 'Nil', '2018-03-27 07:08:51'),
(27, 'MGCHST411125', '17/NSC/032', 'Nursing &amp; Midwifery', 3, '300', 1, '', 2, 'Nursing Science', '2018-03-30 04:14:10'),
(28, 'MGCHST100233', '17/NSC/050', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(29, 'MGCHST432304', '17/NSC/068', 'Nursing &amp; Midwifery', 3, '300', 1, '2016/2017', 2, 'Nursing Science', '2018-03-29 09:59:24'),
(30, 'MGCHST304430', '17/NSC/047', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(31, 'MGCHST100040', '17/NSC/027', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(32, 'MGCHST023520', '17/NSC/061', 'Nursing Science', 3, '300', 1, '2017/2018', 0, 'Nil', '2018-03-30 04:29:47'),
(33, 'MGCHST031201', '17/NSC/053', 'Nursing &amp; Midwifery', 3, '300', 1, '2016/2017', 2, 'Nursing Science', '2018-03-30 04:22:10'),
(34, 'MGCHST123525', '17/NSC/074', 'Nursing &amp; Midwifery', 3, '300', 1, '2016/2017', 2, 'Nursing Science', '2018-03-29 10:38:52'),
(35, 'MGCHST403401', '17/NSC/038', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(36, 'MGCHST010435', '17/NSC/072', 'Nursing &amp; Midwifery', 3, '300', 1, '', 2, 'Nursing Science', '2018-03-29 10:34:29'),
(37, 'MGCHST105134', '17/NSC/041', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(38, 'MGCHST054415', '17/PHS/079', 'Community Health', 1, '300', 1, '2016/2017', 2, 'Nil', '2018-03-30 04:17:02'),
(39, 'MGCHST435534', '17/NSC/024', 'Community Health Science', 1, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(40, 'MGCHST530222', '17/NSC/035', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(41, 'MGCHST341130', '17/NSC/055', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(42, 'MGCHST304235', '17/NSC/030', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(43, 'MGCHST443225', '17/NSC/044', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(44, 'MGCHST351204', '17/NSC/054', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(45, 'MGCHST304432', '17/NSC/033', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(46, 'MGCHST022523', '17/NSC/043', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(47, 'MGCHST015225', '17/NSC/028', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(48, 'MGCHST012231', '17/NSC/045', 'Nursing Science', 1, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(49, 'MGCHST530312', '17/NSC/042', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(50, 'MGCHST024350', '17/NSC/039', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(51, 'MGCHST142145', '17/NSC/026', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(52, 'MGCHST311151', '16/PHS/012', 'Public Health Science', 1, '300', 1, '2016/2017', 2, 'Nil', '2018-03-27 07:08:51'),
(53, 'MGCHST113003', '17/PHS/059', 'Nursing Science', 1, '300', 1, '2017/2018', 2, 'Community/Public Health Science', '2018-03-30 04:34:49'),
(54, 'MGCHST415101', '16/PHS/010', 'Public Health Science', 1, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(55, 'MGCHST301005', '17/NSC/078', 'Nursing &amp; Midwifery', 3, '300', 1, '2016/2017', 2, 'Nursing Science', '2018-03-29 10:47:18'),
(56, 'MGCHST555050', '17/NSC/056', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(57, 'MGCHST554055', '17/NSC/065', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(58, 'MGCHST252521', '17/NSC/064', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(59, 'MGCHST531534', '17/NSC/069', 'Nursing &amp; Midwifery', 1, '300', 1, '2016/2017', 2, 'Nursing Science', '2018-03-29 10:01:01'),
(60, 'MGCHST420143', '17/PHS/058', 'Public Health Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(61, 'MGCHST035124', '17/NSC/060', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(62, 'MGCHST151042', '17/NSC/051', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(63, 'MGCHST400110', '17/NSC/062', 'Nursing Science', 1, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(64, 'MGCHST540525', '17/PHS/070', 'Community Health', 1, '300', 1, '2016/2017', 2, 'Nil', '2018-03-29 10:02:09'),
(65, 'MGCHST515532', '17/NSC/040', 'Nursing Science', 1, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(66, 'MGCHST513224', '17/NSC/073', 'Nursing &amp; Midwifery', 3, '300', 1, '2016/2017', 2, 'Nursing Science', '2018-03-29 10:36:39'),
(67, 'MGCHST502120', '17/NSC/080', 'Community Health', 3, '300', 1, '2016/2017', 2, 'Nil', '2018-03-30 04:37:30'),
(68, 'MGCHST535103', '17/PHS/066', 'Community Health', 3, '300', 1, '2016/2017', 2, 'Nil', '2018-03-29 09:54:51'),
(69, 'MGCHST203134', '17/NSC/082', 'Nursing Science', 1, '300', 1, '2016/2017', 0, 'Nil', '2018-03-30 04:25:29'),
(70, 'MGCHST332312', '17/NSC/052', 'Nursing Science', 3, '300', 1, '2017/2018', 2, 'Nil', '2018-03-27 07:08:51'),
(71, 'MGCHST432433', '17/NSC/071', 'Midwifery Science', 3, '300', 1, '2016/2017', 0, 'Nursing Science', '2018-03-29 10:05:47'),
(72, 'MGCHST012340', '16/NSC/001', 'Nursing Science', 3, '300', 1, '2016/2017', 0, 'Nursing Science', '2018-03-31 05:13:54'),
(73, 'MGCHST012341', '16/NSC/002', 'Nursing Science', 3, '300', 1, '2016/2017', 0, 'Nursing Science', '2018-03-29 10:05:47'),
(74, 'MGCHST012342', '16/NSC/003', 'Nursing Science', 3, '300', 1, '2016/2017', 0, 'Nursing Science', '2018-03-29 10:05:47'),
(75, 'MGCHST012343', '16/NSC/004', 'Nursing Science', 3, '300', 1, '2016/2017', 0, 'Nursing Science', '2018-03-29 10:05:47'),
(76, 'MGCHST012344', '16/NSC/005', 'Nursing Science', 3, '300', 1, '2016/2017', 0, 'Nursing Science', '2018-03-29 10:05:47'),
(77, 'MGCHST012345', '16/NSC/006', 'Nursing Science', 3, '300', 1, '2016/2017', 0, 'Nursing Science', '2018-03-29 10:05:47'),
(78, 'MGCHST012346', '16/PHS/007', 'Nursing Science', 3, '300', 1, '2016/2017', 0, 'Nursing Science', '2018-03-29 10:05:47'),
(79, 'MGCHST012347', '16/PHS/008', 'Nursing Science', 3, '300', 1, '2016/2017', 0, 'Nursing Science', '2018-03-29 10:05:47'),
(80, 'MGCHST012348', '16/PHS/009', 'Nursing Science', 3, '300', 1, '2016/2017', 0, 'Nursing Science', '2018-03-29 10:05:47'),
(81, 'MGCHST011111', '17/NSC/063', 'Nursing Science', 3, '300', 1, '2017/2018', 0, 'Nil', '2018-03-27 07:08:51'),
(82, 'MGCHST422551', '17/NSC/082', 'Community/Public Health Science', 3, '300', 1, '2017/2018', 0, 'Nursing Science', '2018-03-30 11:45:55'),
(83, 'MGCHST151245', '17/NSC/083', 'Community/Public Health Science', 3, '300', 1, '2017/2018', 0, 'Nursing Science', '2018-03-30 11:47:25'),
(84, 'MGCHST513154', '17/NSC/084', 'Community/Public Health Science', 3, '300', 1, '2017/2018', 0, 'Nursing Science', '2018-03-30 11:47:56'),
(85, 'MGCHST145001', '17/PHS/088', 'Community/Public Health Science', 3, '300', 1, '2017/2018', 0, 'Community/Public Health Science', '2018-03-30 11:51:13'),
(86, 'MGCHST235321', '17/PHS/085', 'Community/Public Health Science', 3, '300', 1, '2017/2018', 0, 'Community/Public Health Science', '2018-03-30 11:49:10'),
(87, 'MGCHST034434', '17/PHS/086', 'Community/Public Health Science', 3, '300', 1, '2017/2018', 0, 'Community/Public Health Science', '2018-03-30 11:50:02'),
(88, 'MGCHST433024', '17/PHS/087', 'Community/Public Health Science', 3, '300', 1, '2017/2018', 0, 'Community/Public Health Science', '2018-03-30 11:50:43'),
(196, 'MGCHST433525', 'matricNumber', 'dept', 0, 'lev', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(197, 'MGCHST502100', 'MGCHST/18/CHS/DIP/002', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(198, 'MGCHST311420', 'MGCHST/18/CHS/DIP/003', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(199, 'MGCHST435134', 'MGCHST/18/CHS/DIP/004', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(200, 'MGCHST332354', 'MGCHST/18/CHS/DIP/005', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(201, 'MGCHST324100', 'MGCHST/18/CHS/DIP/006', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(202, 'MGCHST503332', 'MGCHST/18/CHS/DIP/007', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(203, 'MGCHST353435', 'MGCHST/18/CHS/DIP/008', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(204, 'MGCHST540300', 'MGCHST/18/CHS/DIP/009', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(205, 'MGCHST300454', 'MGCHST/18/CHS/DIP/0010', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(206, 'MGCHST022225', 'MGCHST/18/CHS/DIP/0011', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(207, 'MGCHST024232', 'MGCHST/18/CHS/DIP/0012', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(208, 'MGCHST035540', 'MGCHST/18/CHS/DIP/0013', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(209, 'MGCHST410215', 'MGCHST/18/CHS/DIP/0014', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(210, 'MGCHST301020', 'MGCHST/18/CHS/DIP/0015', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(211, 'MGCHST342035', 'MGCHST/18/CHS/DIP/0016', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(212, 'MGCHST505204', 'MGCHST/18/CHS/DIP/0017', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(213, 'MGCHST415243', 'MGCHST/18/CHS/DIP/0018', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(214, 'MGCHST211315', 'MGCHST/18/CHS/DIP/0019', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(215, 'MGCHST455324', 'MGCHST/18/CHS/DIP/0020', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(216, 'MGCHST135300', 'MGCHST/18/CHS/DIP/0021', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(217, 'MGCHST404502', 'MGCHST/18/CHS/DIP/0022', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(218, 'MGCHST425313', 'MGCHST/18/CHS/DIP/0023', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(219, 'MGCHST144335', 'MGCHST/18/CHS/DIP/0024', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(220, 'MGCHST125322', 'MGCHST/18/CHS/DIP/0025', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(221, 'MGCHST553154', 'MGCHST/18/CHS/DIP/0026', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(222, 'MGCHST153055', 'MGCHST/18/CHS/DIP/0027', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(223, 'MGCHST404322', 'MGCHST/18/CHS/DIP/0028', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(224, 'MGCHST552211', 'MGCHST/18/CHS/DIP/0029', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(225, 'MGCHST051100', 'MGCHST/18/CHS/DIP/0030', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(226, 'MGCHST003200', 'MGCHST/18/CHS/DIP/0031', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(227, 'MGCHST214322', 'MGCHST/18/CHS/DIP/0032', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(228, 'MGCHST531514', 'MGCHST/18/CHS/DIP/0033', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(229, 'MGCHST010023', 'MGCHST/18/CHS/DIP/0034', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(230, 'MGCHST352550', 'MGCHST/18/CHS/DIP/0035', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(231, 'MGCHST201005', 'MGCHST/18/CHS/DIP/0036', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(232, 'MGCHST342255', 'MGCHST/18/CHS/DIP/0037', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(233, 'MGCHST042511', 'MGCHST/18/CHS/DIP/0038', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(234, 'MGCHST553055', 'MGCHST/18/CHS/DIP/0039', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(235, 'MGCHST525421', 'MGCHST/18/CHS/DIP/0040', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(236, 'MGCHST110215', 'MGCHST/18/CHS/DIP/0041', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(237, 'MGCHST142452', 'MGCHST/18/CHS/DIP/0042', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(238, 'MGCHST315312', 'MGCHST/18/CHS/DIP/0043', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(239, 'MGCHST440300', 'MGCHST/18/CHS/DIP/0044', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(240, 'MGCHST114032', 'MGCHST/18/CHS/DIP/0045', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(241, 'MGCHST531331', 'MGCHST/18/CHS/DIP/0046', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(242, 'MGCHST410400', 'MGCHST/18/CHS/DIP/0047', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(243, 'MGCHST355124', 'MGCHST/18/CHS/DIP/0048', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(244, 'MGCHST330215', 'MGCHST/18/CHS/DIP/0049', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(245, 'MGCHST223440', 'MGCHST/18/CHS/DIP/0050', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(246, 'MGCHST144314', 'MGCHST/18/CHS/DIP/0051', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(247, 'MGCHST225444', 'MGCHST/18/CHS/DIP/0052', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(248, 'MGCHST332300', 'MGCHST/18/CHS/DIP/0053', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(249, 'MGCHST325050', 'MGCHST/18/CHS/DIP/0054', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(250, 'MGCHST312552', 'MGCHST/18/CHS/DIP/0055', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(251, 'MGCHST202253', 'MGCHST/18/CHS/DIP/0056', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(252, 'MGCHST232423', 'MGCHST/18/CHS/DIP/0057', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(253, 'MGCHST500421', 'MGCHST/18/CHS/DIP/0058', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(254, 'MGCHST545503', 'MGCHST/18/CHS/DIP/0059', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(255, 'MGCHST325155', 'MGCHST/18/CHS/DIP/0060', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(256, 'MGCHST022344', 'MGCHST/18/CHS/DIP/0061', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(257, 'MGCHST210421', 'MGCHST/18/CHS/DIP/0062', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(258, 'MGCHST102105', 'MGCHST/18/CHS/DIP/0063', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(259, 'MGCHST335022', 'MGCHST/18/CHS/DIP/0064', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(260, 'MGCHST000422', 'MGCHST/18/CHS/DIP/0065', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(261, 'MGCHST325013', 'MGCHST/18/CHS/DIP/0066', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(262, 'MGCHST353131', 'MGCHST/18/CHS/DIP/0067', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(263, 'MGCHST350035', 'MGCHST/18/CHS/DIP/0068', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(264, 'MGCHST133234', 'MGCHST/18/CHS/DIP/0069', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(265, 'MGCHST535053', 'MGCHST/18/CHS/DIP/0070', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(266, 'MGCHST422004', 'MGCHST/18/CHS/DIP/0071', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(267, 'MGCHST550233', 'MGCHST/18/CHS/DIP/0072', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(268, 'MGCHST014313', 'MGCHST/18/CHS/DIP/0073', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(269, 'MGCHST442000', 'MGCHST/18/CHS/DIP/0074', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(270, 'MGCHST400543', 'MGCHST/18/CHS/DIP/0075', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(271, 'MGCHST150101', 'MGCHST/18/CHS/DIP/0076', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(272, 'MGCHST500513', 'MGCHST/18/CHS/DIP/0077', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(273, 'MGCHST040032', 'MGCHST/18/CHS/DIP/0078', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(274, 'MGCHST341321', 'MGCHST/18/CHS/DIP/0079', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(275, 'MGCHST042411', 'MGCHST/18/CHS/DIP/0080', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(276, 'MGCHST233454', 'MGCHST/18/CHS/DIP/0081', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(277, 'MGCHST331403', 'MGCHST/18/CHS/DIP/0082', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(278, 'MGCHST454400', 'MGCHST/18/CHS/DIP/0083', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:38:43'),
(279, 'MGCHST511232', 'MGCHST/18/CHS/DIP/001', 'Community/Public Health Science', 2, '100', 1, '2018', 1, '', '2018-04-10 22:41:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`admission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `admission_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
