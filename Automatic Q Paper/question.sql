-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2016 at 10:34 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `question`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `C_ID` int(10) NOT NULL AUTO_INCREMENT,
  `C_Name` varchar(20) NOT NULL,
  PRIMARY KEY (`C_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `coursehead`
--

CREATE TABLE IF NOT EXISTS `coursehead` (
  `CH_ID` int(20) NOT NULL AUTO_INCREMENT,
  `CH_Name` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Gender` varchar(7) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Photo` varchar(30) NOT NULL,
  `Phone` int(12) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `DOB` varchar(13) NOT NULL,
  `DOJ` varchar(12) NOT NULL,
  `Status` varchar(25) NOT NULL,
  PRIMARY KEY (`CH_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `faculity`
--

CREATE TABLE IF NOT EXISTS `faculity` (
  `F_Id` int(10) NOT NULL AUTO_INCREMENT,
  `F_Name` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Photo` varchar(20) NOT NULL,
  `Phone` int(12) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `DOB` int(20) NOT NULL,
  `DOJ` int(20) NOT NULL,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`F_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `facultysubject`
--

CREATE TABLE IF NOT EXISTS `facultysubject` (
  `F_Id` int(10) NOT NULL,
  `S_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `generatedquestions`
--

CREATE TABLE IF NOT EXISTS `generatedquestions` (
  `GQ_Id` int(10) NOT NULL,
  `S_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `insertquestion`
--

CREATE TABLE IF NOT EXISTS `insertquestion` (
  `Q_Id` int(10) NOT NULL AUTO_INCREMENT,
  `S_Id` int(10) NOT NULL,
  `F_Id` int(10) NOT NULL,
  `Question` varchar(200) NOT NULL,
  `Photo` varchar(30) NOT NULL,
  PRIMARY KEY (`Q_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `Username` int(11) NOT NULL,
  `Password` int(11) NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questionpaper`
--

CREATE TABLE IF NOT EXISTS `questionpaper` (
  `QP_Id` int(10) NOT NULL AUTO_INCREMENT,
  `S_Id` int(10) NOT NULL,
  PRIMARY KEY (`QP_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `S_Id` int(10) NOT NULL AUTO_INCREMENT,
  `S_Name` varchar(20) NOT NULL,
  PRIMARY KEY (`S_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subjectcourse`
--

CREATE TABLE IF NOT EXISTS `subjectcourse` (
  `C_Id` int(10) NOT NULL,
  `S_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjecthead`
--

CREATE TABLE IF NOT EXISTS `subjecthead` (
  `SH_ID` int(10) NOT NULL AUTO_INCREMENT,
  `SH_Name` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Photo` varchar(40) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `DOB` int(20) NOT NULL,
  `DOJ` int(20) NOT NULL,
  `Status` varchar(20) NOT NULL,
  PRIMARY KEY (`SH_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
