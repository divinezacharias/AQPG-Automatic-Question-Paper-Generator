-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2016 at 10:49 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qpaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cr_id` int(3) NOT NULL,
  `cr_name` varchar(50) NOT NULL,
  `cr_code` char(10) NOT NULL,
  `cr_status` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cr_id`, `cr_name`, `cr_code`, `cr_status`) VALUES
(1, 'Information Technology', 'IT', 'active'),
(2, 'Mechanical Engineering', 'ME', 'active'),
(3, 'Civil Engineering', 'CE', 'active'),
(4, 'Electrical and Electronics Engineering', 'EEE', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `coursehead`
--

CREATE TABLE `coursehead` (
  `CH_ID` int(7) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `course_code` char(10) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Photo` varchar(40) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `DOB` int(13) NOT NULL,
  `DOJ` int(13) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursehead`
--

INSERT INTO `coursehead` (`CH_ID`, `Name`, `Username`, `course_code`, `Address`, `Photo`, `Phone`, `Mail`, `DOB`, `DOJ`, `Status`) VALUES
(1, 'Jomel joseph', 'jomel', 'IT', 'kottayam', 'e7ecb5826d_7c9a94f814_591b14d35c.jpg', '9089678567', 'jomel@gmail.com', 803586600, 1452969000, 'removed'),
(2, 'manu kumar', 'manuk', 'ME', 'ernakulam', 'eb4e79603b_7710a53fa8_b4bf16620c.jpg', '9067234567', 'manukumar@gmail.com', 419625000, 1419013800, 'active'),
(3, 'divya mol', 'divyamol', 'IT', 'Pathanam Thitta\r\nadoor.p.o', 'cabe1b460f_d3e2835361_11fd219061.jpg', '9089678567', 'divs@gmail.com', 261858600, 1229625000, 'active'),
(4, 'Harsha babu', 'harsha', 'EEE', 'Thiruvalla\r\n...', 'd38ec00450_fa66dc7ac7_7e368d854b.jpg', '9089765432', 'harsha@gmail.com', 654719400, 1116441000, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(10) NOT NULL,
  `exam_course` char(10) NOT NULL,
  `exam_date` int(10) NOT NULL,
  `exam_syllabus` int(4) NOT NULL,
  `exam_sub_id` int(10) NOT NULL,
  `exam_person` varchar(30) NOT NULL,
  `exam_details` varchar(500) NOT NULL,
  `exam_status` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_course`, `exam_date`, `exam_syllabus`, `exam_sub_id`, `exam_person`, `exam_details`, `exam_status`) VALUES
(2, 'IT', 1456770600, 2011, 1, 'divyamol', 'nothing', 'pend'),
(3, 'IT', 1455733800, 2011, 1, 'divyamol', 's', 'pend'),
(5, 'IT', 1492453800, 2011, 1, 'divyamol', 'ddsds', 'pend'),
(6, 'IT', 1456943400, 2011, 1, 'divyamol', 'gtgtg', 'pend');

-- --------------------------------------------------------

--
-- Table structure for table `faculity`
--

CREATE TABLE `faculity` (
  `F_Id` int(10) NOT NULL,
  `F_Name` varchar(20) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `course_code` char(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Photo` varchar(40) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `DOB` int(12) NOT NULL,
  `DOJ` int(12) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculity`
--

INSERT INTO `faculity` (`F_Id`, `F_Name`, `Username`, `course_code`, `Address`, `Photo`, `Phone`, `Mail`, `DOB`, `DOJ`, `Status`) VALUES
(1, 'anoop nair', 'anoopnair', 'IT', 'pala', 'ca8fb03a79_68da703966_80b7f75eb9.jpg', '9023456876', 'anumon@gmail.com', -992670800, 1419013800, 'removed'),
(5, 'manok kumar', 'manukumar', 'IT', 'dwdwe', '77436773fe_dc14b13d13_65ae16c00f.jpg', '9089678567', 'manukumar@gmail.com', -989992400, 1100716200, 'active'),
(6, 'annie joseph', 'anniejoseph', 'IT', 'annie villa,\r\nkollam', '1705df5db7_84f00d24b7_6b881b1c81.jpg', '9807654234', 'annie@gmail.com', 169669800, 1136399400, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `facultysubject`
--

CREATE TABLE `facultysubject` (
  `F_Id` int(10) NOT NULL,
  `S_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `insertquestion`
--

CREATE TABLE `insertquestion` (
  `q_id` int(10) NOT NULL,
  `s_id` int(10) NOT NULL,
  `q_course` char(5) NOT NULL,
  `fac_username` varchar(30) NOT NULL,
  `Question` text NOT NULL,
  `q_type` varchar(30) NOT NULL,
  `q_hardness` varchar(10) NOT NULL,
  `q_module` int(1) NOT NULL,
  `q_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insertquestion`
--

INSERT INTO `insertquestion` (`q_id`, `s_id`, `q_course`, `fac_username`, `Question`, `q_type`, `q_hardness`, `q_module`, `q_status`) VALUES
(1, 1, 'IT', 'anoopnair', 'Test Question 1?', 'short', 'easy', 1, 'removed'),
(3, 2, 'IT', 'manukumar', 'mechanics Question test1?\r\ntest1 ?', 'short', 'medium', 1, 'removed'),
(4, 1, 'IT', 'anoopnair', 'what is oop?', 'short', 'medium', 2, 'removed'),
(5, 3, 'IT', 'anoopnair', 'what is SQL?', 'short', 'easy', 3, 'approved'),
(6, 3, 'IT', 'anoopnair', 'Data Rollback?', 'short', 'medium', 3, 'removed'),
(7, 2, 'IT', 'anoopnair', 'cjdhgdjhfgdff\r\nf\r\ndf\r\ndf\r\n?', 'short', 'medium', 1, 'approved'),
(8, 1, 'IT', 'manukumar', 'c programming 1?', 'short', 'easy', 1, 'approved'),
(10, 1, 'IT', 'manukumar', 'c programming 2?', 'short', 'easy', 1, 'approved'),
(11, 1, 'IT', 'manukumar', 'c programming 3?', 'short', 'easy', 1, 'approved'),
(12, 1, 'IT', 'manukumar', 'c programming 4?', 'short', 'easy', 1, 'approved'),
(13, 1, 'IT', 'manukumar', 'c programming 5?', 'short', 'easy', 1, 'approved'),
(14, 1, 'IT', 'manukumar', 'c programming 6?', 'short', 'easy', 1, 'approved'),
(15, 1, 'IT', 'manukumar', 'c programming 7?', 'short', 'easy', 1, 'approved'),
(16, 1, 'IT', 'manukumar', 'c programming med 1?', 'short', 'medium', 1, 'approved'),
(17, 1, 'IT', 'manukumar', 'c programming med 2?', 'short', 'medium', 1, 'approved'),
(18, 1, 'IT', 'manukumar', 'c programming med 3?', 'short', 'medium', 1, 'approved'),
(19, 1, 'IT', 'manukumar', 'c programming med 4?', 'short', 'medium', 1, 'approved'),
(20, 1, 'IT', 'manukumar', 'c programming med 6?', 'short', 'medium', 1, 'approved'),
(21, 1, 'IT', 'manukumar', 'c programming hard 1?', 'short', 'hard', 1, 'approved'),
(22, 1, 'IT', 'manukumar', 'c programming hard 2?', 'short', 'hard', 1, 'approved'),
(23, 1, 'IT', 'manukumar', 'c programming hard 4?', 'short', 'hard', 1, 'approved'),
(24, 1, 'IT', 'manukumar', 'c programming hard 5?', 'short', 'hard', 1, 'approved'),
(25, 1, 'IT', 'manukumar', 'c programming  brief easy 1?', 'brief', 'easy', 1, 'approved'),
(26, 1, 'IT', 'manukumar', 'c programming  brief easy 2?', 'brief', 'easy', 1, 'approved'),
(27, 1, 'IT', 'manukumar', 'c programming  brief easy 3?', 'brief', 'easy', 1, 'approved'),
(28, 1, 'IT', 'manukumar', 'c programming  brief easy 4?', 'brief', 'easy', 1, 'approved'),
(29, 1, 'IT', 'manukumar', 'c programming  brief easy 5?', 'brief', 'easy', 1, 'approved'),
(30, 1, 'IT', 'manukumar', 'c programming  brief easy 6?', 'brief', 'easy', 1, 'approved'),
(31, 1, 'IT', 'manukumar', 'c programming  short  easy 2 m 2?', 'short', 'easy', 2, 'approved'),
(33, 1, 'IT', 'manukumar', 'c programming  short easy1  m 2?', 'short', 'easy', 2, 'approved'),
(34, 1, 'IT', 'manukumar', 'c programming  short easy 3  m 2?', 'short', 'easy', 2, 'approved'),
(35, 1, 'IT', 'manukumar', 'c programming  short easy 4  m 2?', 'short', 'easy', 2, 'approved'),
(36, 1, 'IT', 'manukumar', 'c programming  short easy 5  m 2?', 'short', 'easy', 2, 'approved'),
(37, 1, 'IT', 'manukumar', 'c programming  short easy 6  m 2?', 'short', 'easy', 2, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Username` varchar(30) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Username`, `Password`, `Role`) VALUES
('admin', 'admin123', 'admin'),
('anniejoseph', 'asdfgh', 'faculty'),
('anoopnair', 'qwerty', 'faculty'),
('divyamol', 'asdfgh', 'chead'),
('harsha', 'qwerty', 'chead'),
('manuk', '12345678', 'chead'),
('manukumar', 'asdfgh', 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `passcode`
--

CREATE TABLE `passcode` (
  `pc_role` varchar(15) NOT NULL,
  `pc_code` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passcode`
--

INSERT INTO `passcode` (`pc_role`, `pc_code`) VALUES
('chead', '12345'),
('admin', 'asdfg'),
('faculty', 'zxcvb');

-- --------------------------------------------------------

--
-- Table structure for table `questionpaper`
--

CREATE TABLE `questionpaper` (
  `qp_Id` int(15) NOT NULL,
  `qp_examid` int(5) NOT NULL,
  `qp_qid` int(6) NOT NULL,
  `qp_qtype` varchar(15) NOT NULL,
  `qp_hardness` varchar(15) NOT NULL,
  `qp_module` int(1) NOT NULL,
  `qp_status` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionpaper`
--

INSERT INTO `questionpaper` (`qp_Id`, `qp_examid`, `qp_qid`, `qp_qtype`, `qp_hardness`, `qp_module`, `qp_status`) VALUES
(1, 3, 18, 'short', 'medium', 1, 'act'),
(2, 3, 17, 'short', 'medium', 1, 'act'),
(3, 3, 20, 'short', 'medium', 1, 'act'),
(4, 3, 19, 'short', 'medium', 1, 'act'),
(5, 3, 11, 'short', 'easy', 1, 'act'),
(6, 3, 12, 'short', 'easy', 1, 'act'),
(7, 3, 36, 'short', 'easy', 2, 'act'),
(8, 3, 37, 'short', 'easy', 2, 'act'),
(9, 3, 30, 'brief', 'easy', 1, 'act'),
(10, 3, 25, 'brief', 'easy', 1, 'act'),
(11, 5, 14, 'short', 'easy', 1, 'act'),
(12, 5, 8, 'short', 'easy', 1, 'act'),
(13, 5, 15, 'short', 'easy', 1, 'act'),
(14, 6, 15, 'short', 'easy', 1, 'act'),
(15, 6, 14, 'short', 'easy', 1, 'act'),
(16, 6, 13, 'short', 'easy', 1, 'act'),
(17, 6, 27, 'brief', 'easy', 1, 'act'),
(18, 6, 28, 'brief', 'easy', 1, 'act'),
(19, 6, 29, 'brief', 'easy', 1, 'act');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(10) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_code` varchar(10) NOT NULL,
  `sub_sem` int(1) NOT NULL,
  `sub_course_code` char(10) NOT NULL,
  `sub_syl_year` int(4) NOT NULL,
  `sub_status` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `sub_code`, `sub_sem`, `sub_course_code`, `sub_syl_year`, `sub_status`) VALUES
(1, 'Programming in C', 'CP', 1, 'IT', 2011, 'active'),
(2, 'mechanics', 'MEC', 1, 'IT', 2011, 'active'),
(3, 'Database management System', 'DBMS', 2, 'IT', 2011, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subjectcourse`
--

CREATE TABLE `subjectcourse` (
  `C_Id` int(10) NOT NULL,
  `S_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjecthead`
--

CREATE TABLE `subjecthead` (
  `SH_ID` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Photo` varchar(40) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `DOB` int(12) NOT NULL,
  `DOJ` int(12) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjecthead`
--

INSERT INTO `subjecthead` (`SH_ID`, `Name`, `Username`, `Gender`, `Address`, `Photo`, `Phone`, `Mail`, `DOB`, `DOJ`, `Status`) VALUES
(1, ' jessy Thomas', 'jessy', 'female', 'muvattupuzha', 'bfada13eff_08ebbf3972_df181d1c81.jpg', '9089678567', 'jessy@gmail.com', 426018600, 1305052200, 'active'),
(2, 'rohit kumar', 'rohitk', 'male', 'kollam', '10b10dff64_d300d72056_228e282064.jpg', '9089678567', 'rohit@gmail.com', 373573800, 1427999400, 'active'),
(3, 'anoop kumar', 'anumonk', 'male', 'dsdsd', '62df4cea56_d55078a003_d9cb0d30ed.jpg', '9023456876', 'anumonk@gmail.com', 795551400, 1044210600, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `syl_id` int(2) NOT NULL,
  `syl_year` int(4) NOT NULL,
  `syl_status` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`syl_id`, `syl_year`, `syl_status`) VALUES
(1, 2011, 'active'),
(2, 2014, 'active'),
(3, 2006, 'active'),
(4, 2016, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `coursehead`
--
ALTER TABLE `coursehead`
  ADD PRIMARY KEY (`CH_ID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `faculity`
--
ALTER TABLE `faculity`
  ADD PRIMARY KEY (`F_Id`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `insertquestion`
--
ALTER TABLE `insertquestion`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `passcode`
--
ALTER TABLE `passcode`
  ADD PRIMARY KEY (`pc_role`),
  ADD UNIQUE KEY `pc_code` (`pc_code`);

--
-- Indexes for table `questionpaper`
--
ALTER TABLE `questionpaper`
  ADD PRIMARY KEY (`qp_Id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `subjecthead`
--
ALTER TABLE `subjecthead`
  ADD PRIMARY KEY (`SH_ID`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`syl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cr_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `coursehead`
--
ALTER TABLE `coursehead`
  MODIFY `CH_ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `faculity`
--
ALTER TABLE `faculity`
  MODIFY `F_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `insertquestion`
--
ALTER TABLE `insertquestion`
  MODIFY `q_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `questionpaper`
--
ALTER TABLE `questionpaper`
  MODIFY `qp_Id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subjecthead`
--
ALTER TABLE `subjecthead`
  MODIFY `SH_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `syl_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
