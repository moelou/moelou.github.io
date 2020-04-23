-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 02:03 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `act_pos_idfk` int(11) NOT NULL,
  `act_descrp` text NOT NULL,
  `act_date` date NOT NULL,
  `act_wkl_idfk` int(11) NOT NULL,
  `act_img` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `coordinators`
--

CREATE TABLE `coordinators` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `department` varchar(25) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `app` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `itf`
--

CREATE TABLE `itf` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `app` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `type` varchar(40) NOT NULL,
  `acctid` int(25) NOT NULL,
  `app` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `type`, `acctid`, `app`) VALUES
(18, 'admin', 'admin', 'admin', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `mg_id` int(11) NOT NULL,
  `mg_siwes_idfk` int(11) NOT NULL,
  `mg_title` varchar(50) NOT NULL,
  `mg_infor` text NOT NULL,
  `mg_date` date NOT NULL,
  `mg_ia` tinyint(1) NOT NULL DEFAULT 0,
  `mg_idele` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `msg` varchar(1300) NOT NULL,
  `date` varchar(100) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `org_add` varchar(100) NOT NULL,
  `org_type` varchar(50) NOT NULL,
  `matricno` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orgnize`
--

CREATE TABLE `orgnize` (
  `id` int(11) NOT NULL,
  `orgname` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `app` varchar(25) NOT NULL,
  `names` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `pos_id` int(11) NOT NULL,
  `pos_st_idfk` int(11) NOT NULL,
  `pos_stf_idfk` int(11) NOT NULL,
  `pos_org_idfk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `matricno` varchar(50) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `department` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL,
  `app` varchar(2) NOT NULL,
  `st_matric` int(11) NOT NULL,
  `supervisor` varchar(50) NOT NULL,
  `organization` varchar(1000) NOT NULL,
  `org_grade` varchar(100) NOT NULL,
  `sup_grade` varchar(40) NOT NULL,
  `cod_grade` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phoneno` varchar(25) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `department` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL,
  `app` varchar(15) NOT NULL,
  `rank` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

CREATE TABLE `week` (
  `id` int(11) NOT NULL,
  `studentid` varchar(10) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `date` varchar(30) NOT NULL,
  `day1` varchar(1000) NOT NULL,
  `day2` varchar(1000) NOT NULL,
  `day3` varchar(1000) NOT NULL,
  `day4` varchar(1000) NOT NULL,
  `day5` varchar(1000) NOT NULL,
  `up1` varchar(1000) NOT NULL,
  `up2` varchar(1000) NOT NULL,
  `up3` varchar(1000) NOT NULL,
  `up4` varchar(1000) NOT NULL,
  `up5` varchar(1000) NOT NULL,
  `supcomment` varchar(100) NOT NULL,
  `incomment` varchar(40) NOT NULL,
  `codcomment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `weekly`
--

CREATE TABLE `weekly` (
  `wkl_id` int(11) NOT NULL,
  `wkl_st_idfk` int(11) NOT NULL,
  `wkl_start` date NOT NULL,
  `wkl_end` date NOT NULL,
  `wkl_comt` text DEFAULT NULL,
  `wkl_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`act_pos_idfk`,`act_date`,`act_wkl_idfk`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coordinators`
--
ALTER TABLE `coordinators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itf`
--
ALTER TABLE `itf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mg_id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `org_fname` (`org_name`);

--
-- Indexes for table `orgnize`
--
ALTER TABLE `orgnize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `week`
--
ALTER TABLE `week`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekly`
--
ALTER TABLE `weekly`
  ADD PRIMARY KEY (`wkl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coordinators`
--
ALTER TABLE `coordinators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `itf`
--
ALTER TABLE `itf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orgnize`
--
ALTER TABLE `orgnize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `week`
--
ALTER TABLE `week`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `weekly`
--
ALTER TABLE `weekly`
  MODIFY `wkl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
