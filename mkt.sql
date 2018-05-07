-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2017 at 07:35 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mkt`
--

-- --------------------------------------------------------

--
-- Table structure for table `followup`
--

CREATE TABLE `followup` (
  `followupid` int(11) NOT NULL,
  `followupstatus` enum('follow up one','follow up two') NOT NULL,
  `followuponedate` datetime NOT NULL,
  `followuponedescription` text NOT NULL,
  `followuptwodate` datetime NOT NULL,
  `followuptwodescription` text NOT NULL,
  `other` text NOT NULL,
  `inquiryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followup`
--

INSERT INTO `followup` (`followupid`, `followupstatus`, `followuponedate`, `followuponedescription`, `followuptwodate`, `followuptwodescription`, `other`, `inquiryid`) VALUES
(1, 'follow up one', '2017-08-08 05:20:27', 'followup one description', '0000-00-00 00:00:00', '', 'no', 1),
(2, 'follow up two', '2017-08-09 07:13:25', 'my text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when a', '2017-08-10 08:13:31', 'my text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when a', 'my text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when a', 2),
(3, 'follow up one', '2017-08-16 06:19:20', 'my text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when a', '2017-08-18 06:23:28', 'my text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when a', 'my text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when a', 3),
(4, 'follow up one', '2017-08-11 18:46:55', 'test run', '0000-00-00 00:00:00', '', '', 12),
(5, '', '2017-08-11 18:58:39', 'gave all the details need to call back on 12-08-2017', '2017-08-12 17:37:01', 'test run for follow up two description', 'other messages after followup two', 11),
(12, 'follow up two', '2017-08-11 19:16:13', 'gave all the details', '2017-08-17 17:45:56', 'follow up 2', '', 9),
(13, '', '2017-08-12 17:41:25', 'praveen done followup one', '2017-08-12 17:43:51', 'Followup Two Done by Praveen', 'after followup two', 10),
(14, 'follow up two', '2017-08-13 14:41:44', 'follow up one', '2017-08-13 14:42:15', 'followup two', '', 13),
(15, 'follow up two', '2017-08-14 20:47:23', 'follow up one - done', '2017-08-14 20:47:40', 'follow up two  - done', 'other time done4', 14),
(16, 'follow up one', '2017-08-14 22:01:26', 'follow up one done', '0000-00-00 00:00:00', '', '', 15),
(17, 'follow up one', '2017-08-14 22:05:34', 'follow up one done', '0000-00-00 00:00:00', '', '', 16),
(18, 'follow up one', '2017-08-14 22:09:49', 'follow up one done', '0000-00-00 00:00:00', '', '', 17),
(19, 'follow up one', '2017-08-14 22:13:37', 'done', '0000-00-00 00:00:00', '', '', 18),
(20, 'follow up two', '2017-08-17 08:57:57', 'two', '2017-08-17 08:58:12', 'two', '', 21),
(21, 'follow up two', '2017-08-17 14:45:20', 'comming this monday', '2017-08-17 14:46:04', 'comming on friday', '', 22);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiryid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `programmeid` int(11) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `information` text NOT NULL,
  `datetime` datetime NOT NULL,
  `userid` int(11) NOT NULL,
  `status` enum('none','follow up','success','info') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inquiryid`, `name`, `type`, `programmeid`, `contact`, `email`, `information`, `datetime`, `userid`, `status`) VALUES
(1, 'sampa', 'FB', 1, '0773785286', 'samapa@gmail.com', 'test information', '2017-08-07 09:35:15', 1, 'success'),
(2, 'sampab', 'FB', 1, '0773785287', 'samapaa@gmail.com', 'test information', '2017-08-07 09:40:15', 1, 'success'),
(3, 'tharaka H G P', 'walking', 2, '071237433', 'tharakacda@yahoo.com', 'my text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when a', '2017-08-08 11:37:23', 1, 'success'),
(4, 'sampab', 'email', 1, '0773785290', 'samapaT@gmail.com', 'test information', '2017-07-01 09:40:15', 1, 'none'),
(9, 'ghina', 'mobile', 2, '', 'ghian@gmail.com', 'test inforamation', '2017-08-09 08:19:00', 1, 'info'),
(10, 'sagith Pathirana', 'mobile', 1, '0733765522', 'techlab@gmail.com', 'test message to use', '2017-08-09 08:21:36', 1, 'follow up'),
(11, 'chamara chathuranga', 'email', 2, '0712876544', 'chamar@yahoo.com', 'need informaiton regarding autocad', '2017-08-09 06:24:14', 1, 'follow up'),
(12, 'uda tissera', 'exhibition', 2, '0713691344', 'udai@gmail.com', 'need course details', '2017-08-11 14:52:49', 1, 'success'),
(13, 'maithree', 'referral', 2, '0774876366', 'maie@gmail.com', 'test info', '2017-08-13 14:39:54', 1, 'success'),
(14, 'sura tissera', 'faccebook', 2, '0723473766', 'sura@gmail.com', 'need more info', '2017-08-14 20:47:02', 1, 'success'),
(15, 'sasmitha bandara', 'telephone', 2, '0712984733', 'sasmitha@yahoo.com', 'need designing course information', '2017-08-14 22:01:02', 1, 'success'),
(16, 'lalitha caldera', 'referral', 1, '0728493988', 'lalitha@gmail.com', 'need course info', '2017-08-14 22:05:12', 1, 'info'),
(17, 'gimi tissera', 'referral', 1, '0758476477', 'gimi@gmail.com', 'need information', '2017-08-14 22:09:29', 1, 'info'),
(18, 'sabina', 'mobile', 2, '0712876544', 'kasun@gmail.com', 'test', '2017-08-14 22:13:26', 1, 'success'),
(19, 'dhanushaka', 'telephone', 1, '0712876544', 'dinidu@gmail.com', 'test info', '2017-08-14 23:32:23', 1, 'none'),
(20, 'Dhammika Bandara', 'exhibition', 1, '0712876549', 'dhamika@gmail.com', 'ned more course details', '2017-08-16 23:32:55', 1, 'none'),
(21, 'damminda', 'telephone', 1, '0712876544', 'texsoloution@gmail.com', 'test', '2017-08-17 08:56:35', 1, 'info'),
(22, 'samantha', 'faccebook', 2, '0712876544', 'asamantha@gmail.com', 'test infomaiton', '2017-08-17 14:44:23', 1, 'success');

-- --------------------------------------------------------

--
-- Table structure for table `intake`
--

CREATE TABLE `intake` (
  `intakeid` int(11) NOT NULL,
  `registrationcode` varchar(10) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intake`
--

INSERT INTO `intake` (`intakeid`, `registrationcode`, `status`) VALUES
(1, 'JA', 'active'),
(2, 'FB', 'active'),
(3, 'MA', 'active'),
(4, 'AP', 'active'),
(5, 'JU', 'active'),
(6, 'AU', 'active'),
(7, 'SP', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `type` enum('director','manager','marketing executive') NOT NULL,
  `status` int(11) NOT NULL,
  `target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `username`, `password`, `type`, `status`, `target`) VALUES
(1, 'user', 'user', 'marketing executive', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `programe`
--

CREATE TABLE `programe` (
  `programeid` int(11) NOT NULL,
  `programename` varchar(255) NOT NULL,
  `abbrivation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programe`
--

INSERT INTO `programe` (`programeid`, `programename`, `abbrivation`) VALUES
(1, 'certificate in Business IT', 'CBT'),
(2, 'Diploma in Designing', 'DOP');

-- --------------------------------------------------------

--
-- Table structure for table `programmeintake`
--

CREATE TABLE `programmeintake` (
  `intakeid` int(11) NOT NULL,
  `successcode` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registerid` int(11) NOT NULL,
  `registrationcode` varchar(5) NOT NULL,
  `registernumber` varchar(10) NOT NULL,
  `dateofregister` datetime NOT NULL,
  `inquiryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registerid`, `registrationcode`, `registernumber`, `dateofregister`, `inquiryid`) VALUES
(10, '17AP', '1', '2017-08-12 07:59:07', 1),
(11, '17MA', '1', '2017-08-12 14:04:16', 12),
(15, '17AP', '2', '2017-08-12 18:13:02', 2),
(16, '17AU', '1', '2017-08-13 14:42:53', 13),
(17, '17.FB', '1', '2017-08-14 22:00:21', 14),
(18, '17.AU', '1', '2017-08-14 22:03:42', 15),
(19, '17.SP', '1', '2017-08-14 22:06:01', 16),
(20, '17MA', '2', '2017-08-14 22:12:36', 17),
(21, '17AP', '3', '2017-08-14 22:13:50', 18),
(22, '17JU', '1', '2017-08-17 08:59:06', 21),
(25, '17SP', '1', '2017-08-17 14:46:27', 22),
(26, '17AU', '2', '2017-08-17 17:48:34', 9);

-- --------------------------------------------------------

--
-- Table structure for table `success`
--

CREATE TABLE `success` (
  `studentid` int(11) NOT NULL,
  `frontcode` varchar(10) NOT NULL,
  `generateid` int(11) NOT NULL,
  `studentsuccesscode` varchar(255) NOT NULL,
  `inquiryid` int(11) NOT NULL,
  `dateofenrollment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `success`
--

INSERT INTO `success` (`studentid`, `frontcode`, `generateid`, `studentsuccesscode`, `inquiryid`, `dateofenrollment`) VALUES
(1, 'CBTFF17', 1, 'CBTFF17001', 1, '2017-08-13 22:53:51'),
(3, 'CBTFF17', 3, 'CBTFF17002', 12, '2017-08-13 22:55:17'),
(4, 'CBTFF17', 4, 'CBTFF17004', 13, '2017-08-13 22:56:37'),
(5, 'CBTPS17', 1, 'CBTPS17001', 2, '2017-08-13 23:01:13'),
(6, 'DOPPS17', 1, 'DOPPS17001', 18, '2017-08-14 22:42:52'),
(7, 'DOPPS17', 2, 'DOPPS17002', 14, '2017-08-17 09:06:55'),
(8, 'DOPPS17', 3, 'DOPPS17003', 22, '2017-08-17 14:47:07'),
(9, 'CBTFF17', 5, 'CBTFF17005', 15, '2017-08-17 17:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `targetid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `intake` enum('f','s') NOT NULL,
  `programeid` int(11) NOT NULL,
  `targetcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`targetid`, `userid`, `year`, `intake`, `programeid`, `targetcount`) VALUES
(1, 1, 2017, 'f', 1, 10),
(2, 1, 2017, 'f', 2, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `followup`
--
ALTER TABLE `followup`
  ADD PRIMARY KEY (`followupid`),
  ADD UNIQUE KEY `inquiryid` (`inquiryid`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiryid`);

--
-- Indexes for table `intake`
--
ALTER TABLE `intake`
  ADD PRIMARY KEY (`intakeid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `programe`
--
ALTER TABLE `programe`
  ADD PRIMARY KEY (`programeid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registerid`);

--
-- Indexes for table `success`
--
ALTER TABLE `success`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`targetid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `followup`
--
ALTER TABLE `followup`
  MODIFY `followupid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `intake`
--
ALTER TABLE `intake`
  MODIFY `intakeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `programe`
--
ALTER TABLE `programe`
  MODIFY `programeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `success`
--
ALTER TABLE `success`
  MODIFY `studentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `targetid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
