-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 05:20 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4level1`
--

-- --------------------------------------------------------

--
-- Table structure for table `absent`
--

CREATE TABLE `absent` (
  `id` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `notes` varchar(1024) NOT NULL,
  `date` varchar(191) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absent`
--

INSERT INTO `absent` (`id`, `branch`, `teacher`, `notes`, `date`) VALUES
(1, 2, 1, 'this is the notes', '09-02-2020'),
(2, 3, 2, 'this is the notes', '09-02-2020');

-- --------------------------------------------------------

--
-- Table structure for table `activityscores`
--

CREATE TABLE `activityscores` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agentid_name`
--

CREATE TABLE `agentid_name` (
  `userid` int(11) DEFAULT NULL,
  `agentname` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agent_rating`
--

CREATE TABLE `agent_rating` (
  `id` int(11) NOT NULL,
  `employe_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `notes` varchar(1024) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `agent_ticket`
--

CREATE TABLE `agent_ticket` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `notes` varchar(1024) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `agent_ticket_types`
--

CREATE TABLE `agent_ticket_types` (
  `id` int(11) NOT NULL,
  `descr` varchar(45) DEFAULT NULL,
  `discount` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `type` enum('T','A','C') NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `gover` varchar(128) NOT NULL,
  `address` varchar(1024) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `mobile` varchar(128) NOT NULL,
  `startdate` date NOT NULL,
  `salary` varchar(128) NOT NULL,
  `freenow` enum('Y','N') NOT NULL,
  `ready` enum('Y','N') NOT NULL,
  `howyouknow` varchar(1024) NOT NULL,
  `highschool` varchar(1024) NOT NULL,
  `graduated` enum('Y','N') NOT NULL,
  `college` varchar(128) NOT NULL,
  `others` varchar(1024) NOT NULL,
  `ref1name` varchar(128) NOT NULL,
  `ref1rel` varchar(128) NOT NULL,
  `ref1com` varchar(128) NOT NULL,
  `ref1phone` varchar(128) NOT NULL,
  `ref1address` varchar(1024) NOT NULL,
  `ref2name` varchar(128) NOT NULL,
  `ref2rel` varchar(128) NOT NULL,
  `ref2com` varchar(128) NOT NULL,
  `ref2phone` varchar(128) NOT NULL,
  `ref2address` varchar(1024) NOT NULL,
  `curcom` varchar(128) NOT NULL,
  `curcomphone` varchar(128) NOT NULL,
  `curcomaddress` varchar(1024) NOT NULL,
  `supervisor` varchar(128) NOT NULL,
  `curjob` varchar(128) NOT NULL,
  `startsalary` varchar(128) NOT NULL,
  `endsalary` varchar(128) NOT NULL,
  `whyquit` varchar(1024) NOT NULL,
  `com1name` varchar(128) NOT NULL,
  `com1phone` varchar(128) NOT NULL,
  `com1address` varchar(1024) NOT NULL,
  `com1supervisor` varchar(128) NOT NULL,
  `com1job` varchar(128) NOT NULL,
  `com1startsalary` varchar(128) NOT NULL,
  `com1endsalary` varchar(128) NOT NULL,
  `com1resp` varchar(1024) NOT NULL,
  `com1startdate` date NOT NULL,
  `com1enddate` date NOT NULL,
  `com1reason` varchar(1024) NOT NULL,
  `com1contact` varchar(128) NOT NULL,
  `com2name` varchar(128) NOT NULL,
  `com2phone` varchar(128) NOT NULL,
  `com2address` varchar(1024) NOT NULL,
  `com2supervisor` varchar(128) NOT NULL,
  `com2job` varchar(128) NOT NULL,
  `com2startsalary` varchar(128) NOT NULL,
  `com2endsalary` varchar(128) NOT NULL,
  `com2resp` varchar(1024) NOT NULL,
  `com2startdate` date NOT NULL,
  `com2enddate` date NOT NULL,
  `com2reason` varchar(1024) NOT NULL,
  `com2contact` varchar(128) NOT NULL,
  `cv` varchar(8) NOT NULL,
  `level` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` enum('N','A','R','D','H','T') NOT NULL DEFAULT 'N',
  `comment` varchar(1024) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `track` int(11) NOT NULL DEFAULT '0',
  `current` enum('0','1') NOT NULL DEFAULT '0',
  `exam` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `start` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `title`, `track`, `current`, `exam`, `status`, `start`) VALUES
(1, 'Batch 1', 1, '1', '1', '1', '2020-01-01'),
(2, 'Batch 2', 1, '0', '0', '1', '2020-02-01'),
(3, 'Batch 3', 1, '0', '0', '1', '2020-03-05'),
(4, 'Batch 4', 1, '0', '0', '1', '2020-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `branchlist`
--

CREATE TABLE `branchlist` (
  `id` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `task` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `done` datetime NOT NULL,
  `note` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `branch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branchmanlist`
--

CREATE TABLE `branchmanlist` (
  `id` int(11) NOT NULL,
  `session` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `task` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `done` datetime NOT NULL,
  `note` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `branch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `callcenter`
--

CREATE TABLE `callcenter` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_number` varchar(32) NOT NULL,
  `call_type` enum('R','M','F','A','T','N','U','V','D') NOT NULL,
  `follow_type` varchar(1) NOT NULL,
  `call_inquiry` varchar(1) DEFAULT NULL,
  `offer_type` varchar(128) DEFAULT NULL,
  `branch` int(11) NOT NULL,
  `visit_date` date DEFAULT NULL,
  `reason` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `agent` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calls`
--

CREATE TABLE `calls` (
  `id` int(11) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `name` varchar(128) NOT NULL,
  `age` int(11) NOT NULL,
  `gover` varchar(32) NOT NULL,
  `referal` varchar(128) NOT NULL,
  `cause` varchar(128) NOT NULL,
  `target` varchar(1024) NOT NULL,
  `date` datetime NOT NULL,
  `employee` int(11) NOT NULL,
  `paytype` int(11) NOT NULL,
  `branch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `calls_new`
--

CREATE TABLE `calls_new` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `agent_id` int(11) NOT NULL,
  `caller_number` varchar(255) NOT NULL,
  `actual_number` varchar(255) NOT NULL,
  `caller_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `video` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `likes` int(11) NOT NULL DEFAULT '0',
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `place` enum('F','Y','G') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `card` enum('G','U','Y','L','D','R','B') NOT NULL,
  `notes` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `extranotes` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `batch` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cdr`
--

CREATE TABLE `cdr` (
  `id` int(11) NOT NULL,
  `calldate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `clid` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `src` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dst` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dcontext` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `channel` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dstchannel` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastapp` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastdata` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '0',
  `billsec` int(11) NOT NULL DEFAULT '0',
  `disposition` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amaflags` int(11) NOT NULL DEFAULT '0',
  `accountcode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uniqueid` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userfield` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `check_attendance`
--

CREATE TABLE `check_attendance` (
  `id` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` int(11) NOT NULL,
  `type` enum('M','T','P') NOT NULL DEFAULT 'M',
  `student` varchar(15) NOT NULL DEFAULT '0',
  `branch` int(11) NOT NULL DEFAULT '0',
  `teacher` int(11) NOT NULL DEFAULT '0',
  `complain` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `parent` int(11) NOT NULL DEFAULT '0',
  `batch` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `compreq`
--

CREATE TABLE `compreq` (
  `id` int(11) NOT NULL,
  `mobile` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `text` varchar(2048) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `compreq_old`
--

CREATE TABLE `compreq_old` (
  `id` int(11) NOT NULL,
  `mobile` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `text` varchar(2048) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `current_student_call`
--

CREATE TABLE `current_student_call` (
  `id` int(11) NOT NULL,
  `call_id` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `notes` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `parent` int(11) NOT NULL,
  `manager` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `title`, `parent`, `manager`) VALUES
(1, 'Administration', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `emergency`
--

CREATE TABLE `emergency` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `relation` varchar(128) NOT NULL,
  `phone` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(512) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `startdate` date NOT NULL,
  `salarytype` varchar(32) NOT NULL,
  `salary` int(11) NOT NULL,
  `job` varchar(32) NOT NULL,
  `department` varchar(32) NOT NULL,
  `branch` varchar(32) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `email` varchar(32) NOT NULL,
  `nationality` varchar(32) DEFAULT NULL,
  `teachband` varchar(8) DEFAULT NULL,
  `maxlevel` varchar(8) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `code`, `name`, `address`, `birthdate`, `startdate`, `salarytype`, `salary`, `job`, `department`, `branch`, `gender`, `mobile`, `phone`, `email`, `nationality`, `teachband`, `maxlevel`, `datetime`) VALUES
(8, 150, 'Mohamed Hammad', '28 Abbas El Akkad', '2020-01-01', '2020-01-01', 'F', 2000, '1', '1', '1', 'M', '01102400024', '01102400024', 'fastkood@gmail.com', 'Egyptian', NULL, NULL, '2020-01-29 22:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(128) CHARACTER SET utf8 NOT NULL,
  `start` varchar(32) CHARACTER SET utf8 NOT NULL,
  `color` varchar(8) NOT NULL,
  `type` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `level` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `ratio` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `exam` varchar(256) NOT NULL,
  `track` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `success` int(11) NOT NULL,
  `next` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `desc` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `date` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `amount`, `branch`, `desc`, `userid`, `date`, `status`) VALUES
(2, 100, 2, 'this is the description', 1, '09-02-2020', 1),
(3, 100, 3, 'this is teh description', 1, '09-02-2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed`
--

CREATE TABLE `failed` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `status` enum('N','O') NOT NULL,
  `confirm` enum('F','P') DEFAULT NULL,
  `newlevel` int(11) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `student` varchar(16) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `q7` int(11) NOT NULL,
  `q8` int(11) NOT NULL,
  `q9` int(11) NOT NULL,
  `q10` int(11) NOT NULL,
  `q11` int(11) NOT NULL,
  `q12` int(11) NOT NULL,
  `q13` int(11) NOT NULL,
  `q14` int(11) NOT NULL,
  `q15` int(11) NOT NULL,
  `q16` int(11) NOT NULL,
  `q17` int(11) NOT NULL,
  `q18` int(11) NOT NULL,
  `comment` varchar(1024) DEFAULT NULL,
  `teacher` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groupmembers`
--

CREATE TABLE `groupmembers` (
  `id` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `level` varchar(128) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groupmembers_old`
--

CREATE TABLE `groupmembers_old` (
  `id` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `level` varchar(128) NOT NULL,
  `batch` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `track` int(11) NOT NULL,
  `level` varchar(128) NOT NULL,
  `gender` enum('M','F','X') NOT NULL,
  `time` varchar(32) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `location` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `batch` int(11) NOT NULL,
  `teacher` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `track`, `level`, `gender`, `time`, `start`, `end`, `location`, `count`, `batch`, `teacher`) VALUES
(1, 1, '1', 'M', '1', '2020-01-01', '2020-01-31', 1, 0, 4, 8),
(2, 1, '2', 'X', '2', '2020-01-01', '2020-01-31', 1, 0, 2, 0),
(3, 1, '3', 'F', '4', '2020-01-01', '2020-01-31', 2, 0, 2, 0),
(5, 1, '1', 'M', '2', '2020-01-01', '2020-01-31', 3, 0, 2, 8),
(6, 1, '3', 'X', '2', '2020-01-01', '2020-01-31', 3, 0, 2, 8),
(8, 2, '1', 'M', '1', '2020-02-19', '2020-02-17', 2, 0, 2, 0),
(42, 1, '1', 'M', '1', '2020-02-16', '2020-02-09', 1, 0, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `groups_back`
--

CREATE TABLE `groups_back` (
  `id` int(11) NOT NULL,
  `level` varchar(128) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `time` varchar(16) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `location` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `batch` int(11) NOT NULL,
  `teacher` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infoplain`
--

CREATE TABLE `infoplain` (
  `id` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `type` varchar(64) NOT NULL,
  `type2` varchar(64) NOT NULL,
  `text` varchar(1024) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `employee` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infoplainotes`
--

CREATE TABLE `infoplainotes` (
  `id` int(11) NOT NULL,
  `infoplain` int(11) NOT NULL,
  `note` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datetime` varchar(32) NOT NULL,
  `employee` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE `instructions` (
  `id` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `stage` int(11) NOT NULL,
  `media` varchar(128) NOT NULL,
  `content` varchar(2048) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `department` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `department`) VALUES
(1, 'Super Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `track` int(11) NOT NULL,
  `level` varchar(1024) NOT NULL,
  `order` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `track`, `level`, `order`, `max`, `status`) VALUES
(1, 1, 'Level 1', 1, 12, 1),
(2, 1, 'Level 2', 2, 12, 1),
(3, 1, 'Level 3', 3, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tel` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `address`, `tel`) VALUES
(1, 'Nasr City', 'test test test', '01123456789'),
(2, 'Maadi', 'test address here', '01023456789'),
(3, 'Dokki', 'test new address', '012123456789');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `action` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `name` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `amount` int(11) NOT NULL,
  `referal` varchar(8) NOT NULL,
  `offer` varchar(1024) NOT NULL,
  `branch` varchar(64) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `misplaced`
--

CREATE TABLE `misplaced` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `status` enum('N','O') NOT NULL,
  `confirm` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newcommer_arrival`
--

CREATE TABLE `newcommer_arrival` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `call_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `new_commer_call`
--

CREATE TABLE `new_commer_call` (
  `id` int(11) NOT NULL,
  `call_id` int(11) NOT NULL,
  `arrive` int(11) NOT NULL DEFAULT '0',
  `offer_type` varchar(255) NOT NULL,
  `reservation` varchar(255) NOT NULL,
  `closet_branch` int(11) NOT NULL,
  `Notes` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `other_student_call`
--

CREATE TABLE `other_student_call` (
  `id` int(11) NOT NULL,
  `call_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notes` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payhistory`
--

CREATE TABLE `payhistory` (
  `id` int(11) NOT NULL,
  `payid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payhistory_backup`
--

CREATE TABLE `payhistory_backup` (
  `id` int(11) NOT NULL,
  `payid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `levels` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `used` int(11) NOT NULL DEFAULT '0',
  `date` varchar(191) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `userid`, `amount`, `total`, `levels`, `type`, `location`, `used`, `date`) VALUES
(23, 11, 100, 100, 2, 1200, 1, 1, '15-02-2020'),
(22, 11, 100, 100, 2, 1200, 6, 1, '15-02-2020');

-- --------------------------------------------------------

--
-- Table structure for table `payments_backup`
--

CREATE TABLE `payments_backup` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `levels` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `used` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL DEFAULT '0',
  `name` varchar(512) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `salary` int(11) NOT NULL,
  `workdays` int(11) NOT NULL DEFAULT '0',
  `overtime` int(11) NOT NULL,
  `deduction` int(11) NOT NULL,
  `advance` float NOT NULL DEFAULT '0',
  `allowance` float NOT NULL DEFAULT '0',
  `total` float NOT NULL,
  `date` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `code`, `name`, `mobile`, `salary`, `workdays`, `overtime`, `deduction`, `advance`, `allowance`, `total`, `date`) VALUES
(2, 211, 'Ahmed', '01118763129', 3000, 30, 12, 12, 1, 12, 3000, '13-02-2020');

-- --------------------------------------------------------

--
-- Table structure for table `paytypes`
--

CREATE TABLE `paytypes` (
  `id` int(11) NOT NULL,
  `type` varchar(128) NOT NULL,
  `amount` int(11) NOT NULL,
  `levels` int(11) NOT NULL,
  `track` int(11) NOT NULL DEFAULT '1',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paytypes`
--

INSERT INTO `paytypes` (`id`, `type`, `amount`, `levels`, `track`, `status`) VALUES
(1, '2 Level 1000', 100, 2, 1, '1'),
(2, '2 Level 1000', 100, 2, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE `placement` (
  `id` int(11) NOT NULL,
  `userid` varchar(16) NOT NULL,
  `stage1` int(11) DEFAULT NULL,
  `stage2` int(11) DEFAULT NULL,
  `stage3` int(11) DEFAULT NULL,
  `stage4` int(11) DEFAULT NULL,
  `branch` int(11) NOT NULL,
  `level` varchar(2) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `previliges`
--

CREATE TABLE `previliges` (
  `id` int(11) NOT NULL,
  `job` int(11) NOT NULL,
  `page` varchar(32) NOT NULL,
  `v` enum('0','1') NOT NULL DEFAULT '0',
  `a` enum('0','1') NOT NULL DEFAULT '0',
  `e` enum('0','1') NOT NULL DEFAULT '0',
  `d` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `stage` int(11) DEFAULT NULL,
  `qtype` enum('Q','P','A','I') NOT NULL,
  `question` varchar(1024) NOT NULL,
  `atype` enum('M','T','W') NOT NULL,
  `answers` varchar(1024) NOT NULL,
  `correct` varchar(64) NOT NULL,
  `content` varchar(4096) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quizscore`
--

CREATE TABLE `quizscore` (
  `id` int(11) NOT NULL,
  `student` int(11) DEFAULT NULL,
  `mobile` varchar(16) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `quiz1` int(11) DEFAULT NULL,
  `quiz2` int(11) DEFAULT NULL,
  `quiz3` int(11) DEFAULT NULL,
  `quiz4` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `date` date NOT NULL,
  `level` varchar(1024) NOT NULL,
  `time` int(11) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `q7` int(11) NOT NULL,
  `q8` int(11) NOT NULL,
  `q9` int(11) NOT NULL,
  `q10` int(11) NOT NULL,
  `q11` int(11) NOT NULL,
  `q12` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `notes` varchar(1024) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recommend`
--

CREATE TABLE `recommend` (
  `id` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `recommend` int(11) NOT NULL,
  `notes` varchar(1024) NOT NULL,
  `date` varchar(191) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommend`
--

INSERT INTO `recommend` (`id`, `branch`, `teacher`, `recommend`, `notes`, `date`) VALUES
(1, 1, 1, 1, 'this os the recommend', '12-02-2020');

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `id` int(11) NOT NULL,
  `payid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rem_level`
--

CREATE TABLE `rem_level` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rem` int(11) DEFAULT NULL,
  `location` int(11) NOT NULL DEFAULT '0',
  `lastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `mobile` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `score` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `result` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `spent` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sattendance`
--

CREATE TABLE `sattendance` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  `location` int(11) NOT NULL DEFAULT '0',
  `batch` int(11) DEFAULT '0',
  `datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(255) UNSIGNED NOT NULL,
  `track` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idnumber` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mobile2` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL,
  `location` int(7) UNSIGNED NOT NULL,
  `job` longtext COLLATE utf8_unicode_ci,
  `Notes` longtext COLLATE utf8_unicode_ci,
  `level` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group` int(11) NOT NULL DEFAULT '0',
  `age` int(11) NOT NULL DEFAULT '0',
  `area` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `referal` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `cause` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `target` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `employee` int(11) NOT NULL,
  `call` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `vesign` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `track`, `name`, `idnumber`, `mobile`, `mobile2`, `email`, `address`, `gender`, `date`, `location`, `job`, `Notes`, `level`, `group`, `age`, `area`, `referal`, `cause`, `target`, `employee`, `call`, `vesign`) VALUES
(1, 1, 'Mohamed Hammad', '12345678912345', '01102400024', '01102400024', 'sales@fastkood.net', '28 Abbas El Akkad', 'F', '2020-01-29 23:12:51', 2, 'test', NULL, NULL, 0, 0, 'test', 'F', 'test', 'test', 1, '0', '0'),
(6, 2, 'reda magdi', '12541d', '01118763125', '01118763129', 'test@mail.com', 'helwan', 'M', '2020-02-08 16:23:20', 1, 'work', NULL, NULL, 0, 0, 'cairo', 'C', 'cause', '2', 1, '0', '0'),
(5, 1, 'reda magdi', '12541d', '01118763129', '01118763129', 'tetst@gmail.com', 'helwan', 'M', '2020-02-08 16:22:43', 1, 'work', NULL, NULL, 0, 0, 'cairo', 'C', 'cause', '2', 1, '0', '0'),
(4, 2, 'reda magdi', '12541d', '01118763122', '01118763129', 'ahmedhamad@gmail.com', 'helwan', 'M', '2020-02-08 12:56:31', 1, 'work', NULL, NULL, 0, 0, 'cairo', 'F', 'cause', '2', 1, '0', '0'),
(10, 1, 'ahmed', '12541d', '01118769100', '01118763129', 'test@mail.com', 'helwan', 'F', '2020-02-13 15:24:11', 2, 'work', NULL, NULL, 0, 0, 'cairo', 'C', 'cause', '2', 1, '0', '0'),
(8, 2, 'reda magdi', '12541d', '01118763110', '01118763129', 'test@mail.com', 'helwan', 'M', '2020-02-09 10:57:19', 1, 'work', NULL, NULL, 0, 0, 'cairo', 'C', 'cause', '2', 1, '0', '0'),
(11, 1, 'reda magdi', '12541d', '01118763100', '01118763129', 'test@mail.com', 'helwan', 'M', '2020-02-15 11:54:27', 2, 'work', NULL, NULL, 0, 0, 'cairo', 'R', 'cause', '2', 1, '0', '0'),
(12, 1, 'reda magdi', '12541d', '01118763000', '01118763129', 'test@mail.com', 'helwan', 'M', '2020-02-17 16:16:16', 1, 'work', NULL, NULL, 0, 0, 'cairo', 'F', 'cause', '2', 1, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student_survey`
--

CREATE TABLE `student_survey` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `branch` int(11) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `userid` varchar(45) DEFAULT NULL,
  `q1` varchar(45) DEFAULT NULL,
  `q2` varchar(45) DEFAULT NULL,
  `q3` varchar(45) DEFAULT NULL,
  `notes` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `superating`
--

CREATE TABLE `superating` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `q7` int(11) NOT NULL,
  `q8` int(11) NOT NULL,
  `q9` int(11) NOT NULL,
  `q10` int(11) NOT NULL,
  `q11` int(11) NOT NULL,
  `q12` int(11) NOT NULL,
  `q13` int(11) NOT NULL,
  `q14` int(11) NOT NULL,
  `q15` int(11) NOT NULL,
  `q16` int(11) NOT NULL,
  `q17` int(11) NOT NULL,
  `q18` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `notes` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id` int(11) NOT NULL,
  `work` varchar(1024) NOT NULL,
  `salary` varchar(1024) NOT NULL,
  `months` varchar(1024) NOT NULL,
  `study` varchar(1024) NOT NULL,
  `reason` varchar(1024) NOT NULL,
  `gender` varchar(1024) NOT NULL,
  `age` varchar(1024) NOT NULL,
  `datetime` varchar(191) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `work`, `salary`, `months`, `study`, `reason`, `gender`, `age`, `datetime`) VALUES
(2, 'Yes', '1,000 to 2,000', 'this is the month', 'Interview', 'Work', 'm', '25', '11-02-2020'),
(3, 'Yes', '1,000 to 2,000', 'this is the month', 'Work', 'Work', 'f', '25', '12-02-2020');

-- --------------------------------------------------------

--
-- Table structure for table `telemarketing`
--

CREATE TABLE `telemarketing` (
  `id` int(11) NOT NULL,
  `name` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(4096) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` int(11) NOT NULL,
  `track` int(11) NOT NULL,
  `time` varchar(32) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `track`, `time`, `sort`, `status`) VALUES
(1, 1, '3:00 PM', 1, 1),
(2, 1, '6:00 PM', 2, 1),
(4, 1, '9:00 PM', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `title`, `status`) VALUES
(1, 'English Course', '1'),
(2, 'English Private', '1');

-- --------------------------------------------------------

--
-- Table structure for table `trustcall`
--

CREATE TABLE `trustcall` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `notes` varchar(1024) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upgrade_group`
--

CREATE TABLE `upgrade_group` (
  `id` int(11) NOT NULL,
  `old_id` int(11) NOT NULL,
  `new_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upgrade_groupmembers`
--

CREATE TABLE `upgrade_groupmembers` (
  `id` int(11) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upgrade_groupmembers_old`
--

CREATE TABLE `upgrade_groupmembers_old` (
  `id` int(11) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upgrade_group_old`
--

CREATE TABLE `upgrade_group_old` (
  `id` int(11) NOT NULL,
  `old_id` int(11) NOT NULL,
  `new_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `type` enum('S','E') CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `mobile`, `email`, `password`, `type`, `status`) VALUES
(1, 0, '01286890685', '0', '$2y$10$BcXCo2OHmmd7UDV4sFCTgesDMzJjO9BlENjYe2JaFpJCT9ZIDwhoi', 'E', 1),
(4, 8, '01102400024', 'sales@fastkood.net', '', 'E', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vacations`
--

CREATE TABLE `vacations` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `days` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vacredit`
--

CREATE TABLE `vacredit` (
  `id` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `link` varchar(128) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `waitinglist`
--

CREATE TABLE `waitinglist` (
  `id` int(11) NOT NULL,
  `track` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `student` varchar(16) NOT NULL,
  `type` enum('F','T','R','M') NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wrapcalls`
--

CREATE TABLE `wrapcalls` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(8) NOT NULL,
  `numbers` varchar(64) NOT NULL,
  `teacher` int(11) NOT NULL DEFAULT '0',
  `status` enum('N','C','D') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absent`
--
ALTER TABLE `absent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activityscores`
--
ALTER TABLE `activityscores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_rating`
--
ALTER TABLE `agent_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_ticket`
--
ALTER TABLE `agent_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_ticket_types`
--
ALTER TABLE `agent_ticket_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branchlist`
--
ALTER TABLE `branchlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branchmanlist`
--
ALTER TABLE `branchmanlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `callcenter`
--
ALTER TABLE `callcenter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calls_new`
--
ALTER TABLE `calls_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cdr`
--
ALTER TABLE `cdr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calldate` (`calldate`),
  ADD KEY `dst` (`dst`),
  ADD KEY `accountcode` (`accountcode`);

--
-- Indexes for table `check_attendance`
--
ALTER TABLE `check_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compreq`
--
ALTER TABLE `compreq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compreq_old`
--
ALTER TABLE `compreq_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `current_student_call`
--
ALTER TABLE `current_student_call`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency`
--
ALTER TABLE `emergency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed`
--
ALTER TABLE `failed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupmembers`
--
ALTER TABLE `groupmembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupmembers_old`
--
ALTER TABLE `groupmembers_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups_back`
--
ALTER TABLE `groups_back`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infoplain`
--
ALTER TABLE `infoplain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infoplainotes`
--
ALTER TABLE `infoplainotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misplaced`
--
ALTER TABLE `misplaced`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newcommer_arrival`
--
ALTER TABLE `newcommer_arrival`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_commer_call`
--
ALTER TABLE `new_commer_call`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_student_call`
--
ALTER TABLE `other_student_call`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payhistory`
--
ALTER TABLE `payhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payhistory_backup`
--
ALTER TABLE `payhistory_backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_backup`
--
ALTER TABLE `payments_backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paytypes`
--
ALTER TABLE `paytypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placement`
--
ALTER TABLE `placement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `previliges`
--
ALTER TABLE `previliges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizscore`
--
ALTER TABLE `quizscore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommend`
--
ALTER TABLE `recommend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rem_level`
--
ALTER TABLE `rem_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sattendance`
--
ALTER TABLE `sattendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `student_survey`
--
ALTER TABLE `student_survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superating`
--
ALTER TABLE `superating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telemarketing`
--
ALTER TABLE `telemarketing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trustcall`
--
ALTER TABLE `trustcall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upgrade_group`
--
ALTER TABLE `upgrade_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upgrade_groupmembers`
--
ALTER TABLE `upgrade_groupmembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upgrade_groupmembers_old`
--
ALTER TABLE `upgrade_groupmembers_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upgrade_group_old`
--
ALTER TABLE `upgrade_group_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacations`
--
ALTER TABLE `vacations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacredit`
--
ALTER TABLE `vacredit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waitinglist`
--
ALTER TABLE `waitinglist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wrapcalls`
--
ALTER TABLE `wrapcalls`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absent`
--
ALTER TABLE `absent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `activityscores`
--
ALTER TABLE `activityscores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_rating`
--
ALTER TABLE `agent_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_ticket`
--
ALTER TABLE `agent_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branchlist`
--
ALTER TABLE `branchlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branchmanlist`
--
ALTER TABLE `branchmanlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `callcenter`
--
ALTER TABLE `callcenter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calls`
--
ALTER TABLE `calls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calls_new`
--
ALTER TABLE `calls_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cdr`
--
ALTER TABLE `cdr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `check_attendance`
--
ALTER TABLE `check_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compreq`
--
ALTER TABLE `compreq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compreq_old`
--
ALTER TABLE `compreq_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `current_student_call`
--
ALTER TABLE `current_student_call`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emergency`
--
ALTER TABLE `emergency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed`
--
ALTER TABLE `failed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupmembers`
--
ALTER TABLE `groupmembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupmembers_old`
--
ALTER TABLE `groupmembers_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `groups_back`
--
ALTER TABLE `groups_back`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infoplain`
--
ALTER TABLE `infoplain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infoplainotes`
--
ALTER TABLE `infoplainotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `misplaced`
--
ALTER TABLE `misplaced`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newcommer_arrival`
--
ALTER TABLE `newcommer_arrival`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_commer_call`
--
ALTER TABLE `new_commer_call`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_student_call`
--
ALTER TABLE `other_student_call`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payhistory`
--
ALTER TABLE `payhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payhistory_backup`
--
ALTER TABLE `payhistory_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payments_backup`
--
ALTER TABLE `payments_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paytypes`
--
ALTER TABLE `paytypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `placement`
--
ALTER TABLE `placement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `previliges`
--
ALTER TABLE `previliges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizscore`
--
ALTER TABLE `quizscore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recommend`
--
ALTER TABLE `recommend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rem_level`
--
ALTER TABLE `rem_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sattendance`
--
ALTER TABLE `sattendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_survey`
--
ALTER TABLE `student_survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `superating`
--
ALTER TABLE `superating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `telemarketing`
--
ALTER TABLE `telemarketing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trustcall`
--
ALTER TABLE `trustcall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upgrade_group`
--
ALTER TABLE `upgrade_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upgrade_groupmembers`
--
ALTER TABLE `upgrade_groupmembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upgrade_groupmembers_old`
--
ALTER TABLE `upgrade_groupmembers_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upgrade_group_old`
--
ALTER TABLE `upgrade_group_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vacations`
--
ALTER TABLE `vacations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacredit`
--
ALTER TABLE `vacredit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `waitinglist`
--
ALTER TABLE `waitinglist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wrapcalls`
--
ALTER TABLE `wrapcalls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
