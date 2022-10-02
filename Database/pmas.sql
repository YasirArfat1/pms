-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 07:50 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` varchar(10) NOT NULL,
  `password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `password`) VALUES
('1122', '1122');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `f_id` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `domain` varchar(200) NOT NULL,
  `research` varchar(200) NOT NULL,
  `others` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `name`, `email`, `phone`, `password`, `qualification`, `domain`, `research`, `others`) VALUES
('f112', 'Tabish', 'jas1@gmail.com', '123', '12312', 'M.Techa', 'java', 'php', 'asp'),
('f908', 'farhan', 'jas2@gmail.com', '1234567', '123', 'MSCS', 'NUL', 'NUL', 'NUL'),
('f987', 'Ali', 'jas3@gmail.comhahah', '1234567', '147', 'MSCS', 'NULL', 'NULL', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `mail_id` int(5) NOT NULL,
  `s_id` varchar(10) NOT NULL,
  `f_id` varchar(10) NOT NULL,
  `msg` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `meeting_id` int(5) NOT NULL,
  `f_id` varchar(10) NOT NULL,
  `s_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`meeting_id`, `f_id`, `s_id`, `date`, `time`, `desc`) VALUES
(1, 'f112', '001', '2022-01-27', '12:49:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `p_id` varchar(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `domain` varchar(20) DEFAULT NULL,
  `s_id` varchar(10) DEFAULT NULL,
  `f_id` varchar(10) DEFAULT NULL,
  `ppf` varchar(200) NOT NULL,
  `psf` varchar(200) NOT NULL,
  `remark` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`p_id`, `name`, `domain`, `s_id`, `f_id`, `ppf`, `psf`, `remark`) VALUES
('p1', 'Cart System', '', '002', 'f112', '', '', ''),
('p2', 'Project Management System', '', '001', 'f112', 'FYP Management System.docx', 'Program.docx', '');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(10) NOT NULL,
  `s_id` varchar(10) NOT NULL,
  `f_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `s_id`, `f_id`) VALUES
(1, '002', 'f112'),
(2, '141', 'f987');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` varchar(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  `year` varchar(10) NOT NULL,
  `stream` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `name`, `email`, `phone`, `password`, `year`, `stream`) VALUES
('001', 'Mazhar khan', 'h@gmail.com', '03126677890', '123456789', '2020', 'MCS'),
('002', 'Hammz', 'ada@gmail.com', '03126677891', '12344321', '2020', 'MCS'),
('141', 'saaya', 'sweetsaaya@gmail.com', '03126677892', '12344321', '2021', 'BSIT'),
('s111', 'kHawar', 'jas@gmail.com', '03126677893', '12344321', '2020', 'BSIT'),
('s112', 'Hamza', 'hamza@gmail.com', '123456789', '12344321', '2019', 'MCS'),
('s113', 'Ali', 'Ali@gmail.com', '5468522', '12344321', '2021', 'BSCS'),
('s114', 'Ambner', 'hamza1@gmail.com', '12345678', '12344321', '2021', 'MCS'),
('s115', 'tuqeer', 'jas2@gmail.com@gamial.com', '1234567890', '12344321', '2020', 'BSCS'),
('s134', 'hamza', 'ad@hgih', '03126677894', '12344321', '2021', 'BSIT');

-- --------------------------------------------------------

--
-- Table structure for table `st_mail`
--

CREATE TABLE `st_mail` (
  `s_mail_id` int(11) NOT NULL,
  `s_id` varchar(10) NOT NULL,
  `f_id` varchar(10) NOT NULL,
  `mag` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_mail`
--

INSERT INTO `st_mail` (`s_mail_id`, `s_id`, `f_id`, `mag`) VALUES
(1, '001', 'f112', 'Hello Sir Please Check my Work');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mail_id`),
  ADD KEY `s_id` (`s_id`,`f_id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`meeting_id`),
  ADD KEY `f_id` (`f_id`,`s_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `st_mail`
--
ALTER TABLE `st_mail`
  ADD PRIMARY KEY (`s_mail_id`),
  ADD KEY `s_id` (`s_id`,`f_id`),
  ADD KEY `f_id` (`f_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `mail_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `meeting_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `st_mail`
--
ALTER TABLE `st_mail`
  MODIFY `s_mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `makey1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `makey2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `mkey1` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `mkey2` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `fkey1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `fkey2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `st_mail`
--
ALTER TABLE `st_mail`
  ADD CONSTRAINT `m1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `m2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
