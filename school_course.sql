-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 01:55 PM
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
-- Table structure for table `school_course`
--

CREATE TABLE `school_course` (
  `course_id` int(255) NOT NULL,
  `course_title` varchar(266) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_unit` int(2) NOT NULL,
  `course_status` varchar(266) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_course`
--

INSERT INTO `school_course` (`course_id`, `course_title`, `course_code`, `course_unit`, `course_status`, `dept_id`, `time_added`) VALUES
(1, 'Oral Health', 'PHS 316', 3, 'Compulsory', 1, '2018-04-07 21:12:04'),
(2, 'Community Health Practical ( Field-Work)', 'PHS 330', 2, '', 1, '2018-04-15 11:27:06'),
(3, 'Concept &amp; Strategies in Public Community Health', 'NSC 307', 3, 'Compulsory', 1, '2018-04-01 14:33:25'),
(4, 'Professional Ethics for Community Health', 'PHS 324', 3, '', 1, '2018-04-15 11:27:14'),
(5, 'Clinical Pharmacology &amp; Chemotherapy', 'NSC 303', 3, 'Compulsory', 11, '2018-04-01 15:34:48'),
(6, 'Community Mobilization &amp; Participation', 'PHS 326', 3, '', 1, '2018-04-15 11:27:22'),
(7, 'Practicum &amp; Clinical Attachment', 'NSC 377', 2, 'Compulsory', 11, '2018-04-01 14:33:40'),
(8, 'Health Management II', 'PHS 317', 3, '', 0, '2018-04-01 14:33:44'),
(9, 'Communicable Disease', 'PHS 322', 3, '', 0, '2018-04-01 14:33:48'),
(10, 'Maternal &amp; Child Health', 'NSC 313', 3, 'Compulsory', 11, '2018-04-07 21:09:34'),
(11, 'Primary Health Care II', 'NSC 312', 3, 'Compulsory', 1, '2018-04-01 14:33:59'),
(12, 'Entrepreneurship Development', 'ENT 225', 2, 'Compulsory', 12, '2018-04-01 14:34:03'),
(13, 'Organization of School Health', 'PHS 306', 3, 'Compulsory', 2, '2018-04-07 21:11:04'),
(14, 'Human Behavior in Health &amp; Illness', 'NSC 305', 2, 'Required', 11, '2018-04-01 14:34:10'),
(15, 'Public Community Health Nursing III', 'NSC 320', 3, 'Required', 11, '2018-04-07 21:10:08'),
(16, 'Medical Surgical Nursing III', 'NSC 405', 3, 'Compulsory', 11, '2018-04-01 14:34:22'),
(18, 'Primary Health Care Nursing I', 'NSC 315', 3, 'Elective', 11, '2018-04-07 21:09:51'),
(19, 'Immunology &amp; Immunization', 'PHS 312', 3, 'Compulsory', 11, '2018-04-07 21:11:32'),
(20, 'Research Methodology in Nursing', 'NSC 415', 3, 'Compulsory', 11, '2018-04-07 21:10:37'),
(152, 'Use of English ', 'GNS 101 ', 2, 'Compulsory', 1, '2018-04-15 10:02:48'),
(153, 'Professional Ethics ', 'CHE 211 ', 1, 'Compulsory', 1, '2018-04-15 10:02:48'),
(154, 'Anatomy and Physiology 1 ', 'CHE 212 ', 2, 'Compulsory', 1, '2018-04-15 10:02:48'),
(155, 'Behavior change communication ', 'CHE 213', 2, 'Compulsory', 1, '2018-04-15 10:02:48'),
(156, 'Citizenship Education ', 'GNS111', 1, 'Compulsory', 1, '2018-04-15 10:02:48'),
(157, 'Human nutrition ', 'CHE 214', 2, 'Compulsory', 1, '2018-04-15 10:02:48'),
(158, 'Introduction to primary health care ', 'CHE 215', 2, 'Compulsory', 1, '2018-04-15 10:02:48'),
(159, 'Introduction to psychology ', 'GNS 411', 1, 'Compulsory', 1, '2018-04-15 10:02:48'),
(160, 'Introduction to environmental health ', 'ENT 111', 2, 'Compulsory', 1, '2018-04-15 10:02:48'),
(161, 'Geography ', 'FOT 111', 1, 'Compulsory', 1, '2018-04-15 10:02:48'),
(162, 'Introduction to medical sociology ', 'GNS 213 ', 2, 'Compulsory', 1, '2018-04-15 10:02:48'),
(163, 'Symptomatology ', 'CHE 221', 2, 'Compulsory', 1, '2018-04-15 10:02:49'),
(164, 'Population dynamics and family planning ', 'CHE 222', 3, 'Compulsory', 1, '2018-04-15 10:02:49'),
(165, 'Clinical skills 1 ', 'CHE 223', 3, 'Compulsory', 1, '2018-04-15 10:02:49'),
(166, 'Science laboratory technology ', 'STB 211 ', 3, 'Compulsory', 1, '2018-04-15 10:02:49'),
(167, 'Immunity and immunization ', 'CHE 224', 2, 'Compulsory', 1, '2018-04-15 10:02:49'),
(168, 'Control of communicable diseases ', 'CHE 225 ', 2, 'Compulsory', 1, '2018-04-15 10:02:49'),
(169, 'Accident and Emergency ', 'CHE 226', 2, 'Compulsory', 1, '2018-04-15 10:02:49'),
(170, 'Supervised clinical experience 1 ', 'CHE 227 ', 3, 'Compulsory', 1, '2018-04-15 10:02:49'),
(171, 'Communication in English ', 'GNS 102 ', 2, 'Compulsory', 1, '2018-04-15 10:02:49'),
(172, 'Anatomy and physiology 11', 'CHE 241 ', 2, 'Compulsory', 1, '2018-04-15 10:02:49'),
(173, 'Oral Health ', 'CHE 232', 2, 'Compulsory', 1, '2018-04-15 10:02:49'),
(174, 'Community Mental health ', 'CHE 233 ', 2, 'Compulsory', 1, '2018-04-15 10:02:50'),
(175, 'Reproductive health ', 'CHE 234 ', 2, 'Compulsory', 1, '2018-04-15 10:02:50'),
(176, 'Child health ', 'CHE 235 ', 3, 'Compulsory', 1, '2018-04-15 10:02:50'),
(177, 'School Health Programme ', 'CHE 236 ', 2, 'Compulsory', 1, '2018-04-15 10:02:50'),
(178, 'Control of Non-communicable diseases ', 'CHE 237 ', 2, 'Compulsory', 1, '2018-04-15 10:02:50'),
(179, 'Introduction to physical chemistry ', 'BCH 111', 1, 'Compulsory', 1, '2018-04-15 10:02:50'),
(180, 'Community linkages and development  ', 'CHE 238 ', 3, 'Compulsory', 1, '2018-04-15 10:02:50'),
(181, 'Care and management of HIV and AIDS ', 'CHE 239 ', 2, 'Compulsory', 1, '2018-04-15 10:02:50'),
(182, 'Occupational health and safety ', 'CHE 240 ', 2, 'Compulsory', 1, '2018-04-15 10:02:50'),
(183, ' Clinical Skills II ', 'CHE241', 3, 'Compulsory', 1, '2018-04-15 10:02:50'),
(184, 'Maternal Health ', 'CHE 242 ', 4, 'Compulsory', 1, '2018-04-15 10:02:50'),
(185, 'Modified essential newborn care ', 'CHE 243 ', 3, 'Compulsory', 1, '2018-04-15 10:02:50'),
(186, 'Community Ear, Nose and Throat care (ENT) ', 'CHE 244 ', 2, 'Compulsory', 1, '2018-04-15 10:02:50'),
(187, 'Community Eye Care ', 'CHE 245 ', 1, 'Compulsory', 1, '2018-04-15 10:02:51'),
(188, 'Use of standing orders ', 'CHE 246 ', 3, 'Compulsory', 1, '2018-04-15 10:02:51'),
(189, 'Introduction to pharmacology ', 'GNP123 ', 2, 'Compulsory', 1, '2018-04-15 10:02:51'),
(190, 'Nigerian health system ', 'CHE 247 ', 2, 'Compulsory', 1, '2018-04-15 10:02:51'),
(191, 'Supervised clinical experience II ', 'CHE 248 ', 4, 'Compulsory', 1, '2018-04-15 10:02:51'),
(192, 'Care of the older persons ', 'CHE 251', 1, 'Compulsory', 1, '2018-04-15 10:02:51'),
(193, 'Care of persons with special needs ', 'CHE 252', 2, 'Compulsory', 1, '2018-04-15 10:02:51'),
(194, 'Health statistics ', 'CHE 253', 2, 'Compulsory', 1, '2018-04-15 10:02:51'),
(195, 'Essential medicines ', 'CHE 254 ', 2, 'Compulsory', 1, '2018-04-15 10:02:51'),
(196, 'Human resource for health ', 'CHE 255 ', 1, 'Compulsory', 1, '2018-04-15 10:02:51'),
(197, 'Research methodology ', 'CHE 256 ', 2, 'Compulsory', 1, '2018-04-15 10:02:51'),
(198, 'Community based newborn care ', 'CHE 257 ', 2, 'Compulsory', 1, '2018-04-15 10:02:51'),
(199, 'Supervised community based experience (SCBE) ', 'CHE 258 ', 4, 'Compulsory', 1, '2018-04-15 10:02:52'),
(200, 'Primary health care management ', 'CHE 261 ', 2, 'Compulsory', 1, '2018-04-15 10:02:52'),
(201, 'Referral system an outreach services ', 'CHE 262 ', 2, 'Compulsory', 1, '2018-04-15 10:02:52'),
(202, 'Accounting system in primary health care ', 'CHE 263 ', 1, 'Compulsory', 1, '2018-04-15 10:02:52'),
(203, 'Health management information system ', ' CHE 264 ', 2, 'Compulsory', 1, '2018-04-15 10:02:52'),
(204, 'Entrepreneurship education ', 'BUS 213 ', 2, 'Compulsory', 1, '2018-04-15 10:02:52'),
(205, 'Research project ', 'CHE 265 ', 4, 'Compulsory', 1, '2018-04-15 10:02:52'),
(206, 'Introduction to primary health care ', 'JCH 111', 2, 'Compulsory', 1, '2018-04-15 10:02:52'),
(207, 'Professional Ethics ', 'JCH 112 ', 1, 'Compulsory', 1, '2018-04-15 10:02:52'),
(208, 'Introduction to behavioral science ', 'JCH 113 ', 1, 'Compulsory', 1, '2018-04-15 10:02:52'),
(209, 'Behaviour change communication  ', 'JCH 114 ', 3, 'Compulsory', 1, '2018-04-15 10:02:52'),
(210, 'Anatomy and physiology ', 'JCH 115 ', 3, 'Compulsory', 1, '2018-04-15 10:02:52'),
(211, 'Human nutrition ', 'JCH 116 ', 2, 'Compulsory', 1, '2018-04-15 10:02:53'),
(212, 'Accidents and emergency conditions ', 'JCH 117', 2, 'Compulsory', 1, '2018-04-15 10:02:53'),
(213, 'Health statistics ', 'JCH118 ', 1, 'Compulsory', 1, '2018-04-15 10:02:53'),
(214, 'Introduction to computer ', 'COM 111', 2, 'Compulsory', 1, '2018-04-15 10:02:53'),
(216, 'CLINICAL SKILLS', 'JCH121', 4, 'Compulsory', 1, '2018-04-15 10:06:28'),
(217, 'SYMPTOMATOLOGY', 'JCH 122', 2, 'Compulsory', 1, '2018-04-15 10:06:28'),
(218, 'REPRODUCTIVE HEALTH', 'JCH 123', 2, 'Compulsory', 1, '2018-04-15 10:06:28'),
(219, 'MATERNAL HEALTH', 'JCH 124 ', 2, 'Compulsory', 1, '2018-04-15 10:06:28'),
(220, 'MODIFIED ESSENTIAL CARE THE NEW BORN', 'JCH 125', 0, 'Compulsory', 1, '2018-04-15 10:06:28'),
(221, 'COMMUNICABLE DISEASES ', 'JCH 126 ', 2, 'Compulsory', 1, '2018-04-15 10:06:28'),
(222, 'LABORATORY SERVICES ', 'JCH 127', 2, 'Compulsory', 1, '2018-04-15 10:06:28'),
(223, 'COMMUNITY BASED HEALTH CARE', 'JCH 128', 3, 'Compulsory', 1, '2018-04-15 10:06:28'),
(224, 'SUPERVISED CLINICAL EXPERIENCE', 'JCH129 ', 3, 'Compulsory', 1, '2018-04-15 10:06:28'),
(225, 'IMMUNITY  AND IMMUNIZATION', 'JCH130', 3, 'Compulsory', 1, '2018-04-15 10:06:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `school_course`
--
ALTER TABLE `school_course`
  ADD PRIMARY KEY (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `school_course`
--
ALTER TABLE `school_course`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
