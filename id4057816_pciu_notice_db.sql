-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2018 at 06:22 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id4057816_pciu_notice_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `department_db_tbl`
--

CREATE TABLE `department_db_tbl` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `dept_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquery_reply_db_tbl`
--

CREATE TABLE `enquery_reply_db_tbl` (
  `id` int(11) NOT NULL,
  `enqueryID` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `studentID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `studentName` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `topic_txt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `query_txt` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `reply_txt` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `datetime_stmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enquery_reply_db_tbl`
--

INSERT INTO `enquery_reply_db_tbl` (`id`, `enqueryID`, `studentID`, `studentName`, `topic_txt`, `query_txt`, `reply_txt`, `datetime_stmp`, `status`) VALUES
(1, '4', 'bba004123', 'Ahmed reza', 'Exam routine', 'When final exam routine will be published?', 'tomorrow 9 am', '2018-04-25 19:46:32', 1),
(2, '3', 'bba004123', 'ahmed reza', 'About class schedule', 'when our classes will get start?', 'Next week probably...', '2018-04-25 20:21:31', 1),
(3, '9', 'cse00405137', 'md nur hossain bhuiyan\n', 'about exam', 'dear sir\nwhen will start our final xm?\n\nthanks\n', 'your xm will start at 30 april.', '2018-04-25 20:25:10', 1),
(4, '9', 'cse00405137', 'md nur hossain bhuiyan\n', 'about exam', 'dear sir\nwhen will start our final xm?\n\nthanks\n', 'your xm will start at 30 april.', '2018-04-25 20:25:10', 0),
(5, '4', 'bba004123', 'Ahmed reza', 'Exam routine', 'When final exam routine will be published?', 'Next Friday, exam routine will be published.', '2018-05-07 15:30:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_db_tbl`
--

CREATE TABLE `enquiry_db_tbl` (
  `id` int(11) NOT NULL,
  `studentName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `studentId` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `studentEnqueryTopic` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `studentEnqueryDescription` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `studentPhone` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `deptCode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date_time_stmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enquiry_db_tbl`
--

INSERT INTO `enquiry_db_tbl` (`id`, `studentName`, `studentId`, `studentEnqueryTopic`, `studentEnqueryDescription`, `studentPhone`, `deptCode`, `date_time_stmp`, `status`) VALUES
(1, 'Nur ahmed', 'cse005123', 'cse', 'When all the rest of the exams will take place?', '0167####### mail@mail.com', 'cse', '2017-12-16 12:43:52', '1'),
(2, 'Ahmed sharif', 'cse006234', 'cse', 'When final exam routine will be published?', 'email@mail.com', 'cse', '2017-12-16 12:43:52', '1'),
(3, 'ahmed reza', 'bba004123', 'About class schedule', 'when our classes will get start?', '198644', 'bba', '2018-01-03 16:37:38', '1'),
(4, 'Ahmed reza', 'bba004123', 'Exam routine', 'When final exam routine will be published?', '01559764854 \n reza@mail.com', 'bba', '2018-01-08 15:48:14', '1'),
(5, 'Jubair Islam', 'eee004123', 'Class Schedule', 'When all the rest of the classes will take place?', '011234565757', 'eee', '2018-03-26 07:18:54', '1'),
(6, 'Riaz Murshed', 'eng0839280', 'Exam Schedule', 'When all the rest of the exams will take place?', '011234565757', 'eng', '2018-03-26 07:20:23', '1'),
(7, 'md jamal', 'eee00405138', 'about xm', 'when our final  xm ll be start??pls inform us.', '0167052305 \n jamal@gmail.com', 'eee', '2018-03-27 15:46:29', '0'),
(8, 'md nur hossain bhuiyan\n', 'cse00405137', 'about xm', 'when ll start our xm.??\nthanks \n', '01670520304 \n rajuraihan518@gmail.com', 'cse', '2018-03-29 07:47:31', '0'),
(9, 'md nur hossain bhuiyan\n', 'cse00405137', 'about exam', 'dear sir\nwhen will start our final xm?\n\nthanks\n', '01670520304 \n rajuraihan518@gmail.com', 'cse', '2018-04-25 20:23:44', '1'),
(10, 'md nur hossain bhuiyan\n', 'cse00405137', 'about ct', 'when will start exam.??', '01670520304 \n rajuraihan518@gmail.com', 'cse', '2018-05-15 10:35:35', '1');

-- --------------------------------------------------------

--
-- Table structure for table `exam_db_tbl`
--

CREATE TABLE `exam_db_tbl` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `routine_link` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `date_time_stmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notice_db_tbl`
--

CREATE TABLE `notice_db_tbl` (
  `id` int(11) NOT NULL,
  `notice_ref_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `notice_from` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `notice_to` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `notice_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `notice_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `notice_sort_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `notice_body` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `date_time_stmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notice_fb_id` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notice_db_tbl`
--

INSERT INTO `notice_db_tbl` (`id`, `notice_ref_no`, `notice_from`, `notice_to`, `notice_date`, `notice_title`, `notice_sort_title`, `notice_body`, `date_time_stmp`, `notice_fb_id`, `status`) VALUES
(1, 'PCIU/REG 17 11/30 01', 'Office of the Registrar', 'PCIU', 'February 28, 2018', 'Milad-un-Nabi', 'Click here.', ' This is to notify that Port City International University will remain closed on December 02, 2017 (Saturday) on the occasion of Milad-un-Nabi.\r\n\r\n\r\n ----------------\r\nMd. Obaydur Rahman\r\n\r\nRegistrar', '2018-02-28 12:35:07', '', '1'),
(2, 'PCIU/REG 17 10/27 01', 'Office of the Registrar', 'PCIU', 'February 28, 2018', 'Course Registration of All Programs for Spring-2018 Trimester', 'click here.', 'This is for the information of all concerned that the course registration of the students of all programs for Spring-2018 trimester will start on November 06, 2017 (Monday) and close on November 13, 2017 (Monday). Students will be allowed to register up to November 20, 2017 with late fee of TK. 500.00. No registration will be done without accounts clearance at any circumstances.\r\n\r\nStudents of different programs are advised to complete their course registration within the above mentioned date.  \r\n \r\nAll Chairmen are requested to distribute the batch wise course registration responsibilities among the faculty members. \r\n\r\n\r\n ----------------\r\nMd. Obaydur Rahman\r\n\r\nRegistrar', '2018-02-28 12:35:07', '', '1'),
(3, 'FCM Notice', 'salim mia', 'cse', 'Feb 19, 2018', 'test', 'Click to see full notice!', 'db insert', '2018-02-18 18:44:32', NULL, '0'),
(4, 'FCM Notice', 'salim mia', 'cse', 'Feb 19, 2018', 'ব্লকচেইন এ ভবিষ্যৎ!\n\n', 'Click to see full notice!', 'সে কালে বাংলায় এক প্রচুর ধনী রাজা ছিলেন । রাজার বিশাল এলাকা জুরে রাজ্য ছিলো । সে রাজ্যের জনগণ বেশ সুখেই ছিলো , কারণ রাজা সব কিছু ঠিক মত দেখভাল করতেন । রাজ্যের প্রজারা তাই আনন্দের সাথেই প্রচুর পরিশ্রম করত । তাদের মূল আয়ের উৎস ছিলো ক্ষেত খামার ।', '2018-02-28 18:56:18', NULL, '0'),
(5, 'FCM Notice', 'sazzad shuvo', 'cse004', 'Feb 26, 2018', 'about ct', 'Click to see full notice!', 'tomorrow ll held ct', '2018-02-26 13:44:17', NULL, '0'),
(6, 'FCM Notice', 'md nur hossain bhuiyan raihan', 'cse', 'Feb 26, 2018', 'assignment ', 'Click to see full notice!', 'everybody must submit assignment tomorrow ', '2018-02-26 13:47:35', NULL, '1'),
(7, 'FCM Notice', 'md raihan', 'cse', 'Mar 1, 2018', 'about xm', 'Click to see full notice!', '04 march will be held final xm\n\nthanks\n', '2018-03-01 17:28:26', NULL, '1'),
(8, 'FCM Notice', 'md nur hossain bhuiyan raihan', 'cse', 'Mar 11, 2018', 'about ct', 'Click to see full notice!', 'tomorrow will held ct', '2018-03-11 09:42:52', NULL, '1'),
(9, 'FCM Notice', 'md nur hossain bhuiyan raihan', 'cse', 'Apr 15, 2018', 'about final xm', 'Click to see full notice!', 'your final xm will held as soon as possible. ', '2018-04-15 07:21:07', NULL, '1'),
(10, '', 'PCIU Web-admin', 'bba', '2018-04-24 23:29:46', 'test FCM', 'Click to see full notice!', '2 FCM and DB', '2018-04-24 17:31:09', NULL, '1'),
(11, '{\"message_id\":8047431495147829000}', 'PCIU Web-admin', 'bba', '2018-04-25 00:40:44', 'qqqqq', 'Click to see full notice!', 'qwasdfrt', '2018-04-24 18:43:41', NULL, '0'),
(12, '{\"message_id\":5227995309139779000}', 'PCIU Web-admin', 'bba004', '2018-04-25 00:57:26', 'bba batch', 'Click to see full notice!', 'qwertu', '2018-04-24 18:58:49', NULL, '0'),
(13, 'FCM Notice', 'yeasmin ara akter', 'cse004', '3 May 2018', 'about exam', 'Click to see full notice!', 'your mobile and telecommunication class test exam will be held on 6th may', '2018-05-03 10:20:11', NULL, '1'),
(14, '{\"message_id\":5413422246545983000}', 'PCIU Web-admin', 'cse00405137', '2018-05-07 02:07:46', 'about exam', 'Click to see full notice!', 'Your exam will held in 12 april', '2018-05-06 20:09:00', NULL, '0'),
(15, '{\"message_id\":5205074473013634000}', 'PCIU Web-admin', 'cse00405137', '2018-05-07 02:10:29', 'about exam', 'Click to see full notice!', 'Your exam will held in 12 april', '2018-05-06 20:10:51', NULL, '1'),
(16, '{\"message_id\":7619458927666448000}', 'PCIU Web-admin', 'bba004', '2018-05-09 01:19:28', 'About Mid-term', 'Click to see full notice!', 'Next week all of your mid term exams will start. If you have any specific query about exam. contact with your advisor he/she will help you about this.', '2018-05-08 19:24:21', NULL, '1'),
(17, 'FCM Notice', 'md nur hossain bhuiyan raihan', 'cse004', 'May 11, 2018', 'about exam ', 'Click to see full notice!', 'tomorrow will held your final presentation\n\n\nthanks\n', '2018-05-11 17:27:18', NULL, '1'),
(18, 'FCM Notice', 'manoara begum', 'cse004', 'May 15, 2018', 'exam', 'Click to see full notice!', 'final exam will be held on today.', '2018-05-15 10:31:54', NULL, '1'),
(19, 'FCM Notice', 'manoara begum', 'eee004', 'May 15, 2018', 'nnnn', 'Click to see full notice!', 'vvvvvv', '2018-05-15 10:33:28', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_request`
--

CREATE TABLE `password_reset_request` (
  `sno` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `encrypted_temp_password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_requests` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_reset_request`
--

INSERT INTO `password_reset_request` (`sno`, `email`, `encrypted_temp_password`, `salt`, `no_of_requests`, `created_at`) VALUES
(1, 'adsa321@gmail.com', '$2y$10$B6KiNaQPi4fg0LA0Dn3JOu4sR54f7hAe1/lv4iWpxVDXfCWi0.itK', 'f6588cecb0', 2, '2018-04-14 15:31:30'),
(2, 'absj4k@gmail.com', '$2y$10$yNo6CB9sIaq8T3.Z8fagYOW5q.O9k2m4v/oo6y5h2L8COsn6zuYPO', '174c9c63f7', 4, '2018-05-08 19:14:05'),
(4, 'asif@mail.com', '$2y$10$xJZmkjhEmKoaY7LqIgpDCOdygT.qH9QFogy0yPkJLJ8ApQ9THOzGm', '4eb0018cf1', 2, '2018-04-14 17:24:26'),
(5, 'rajuraihan518@gmail.com', '$2y$10$OivRN/2DBI5m.fLyX5z2HeUf2wYNOGYmOr45doMfoofCHFA5u20u2', '4f27710b7b', 4, '2018-05-11 20:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `phone_num_db_tbl`
--

CREATE TABLE `phone_num_db_tbl` (
  `id` int(11) NOT NULL,
  `phone_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone_or_lnk` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone_purpose` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date_time_stmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_campus_db`
--

CREATE TABLE `student_campus_db` (
  `id` int(11) NOT NULL,
  `studentName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `studentAddress` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `studentEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `studentPhone` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `deptCode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `batchId` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `studentId` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_campus_db`
--

INSERT INTO `student_campus_db` (`id`, `studentName`, `studentAddress`, `studentEmail`, `studentPhone`, `deptCode`, `batchId`, `studentId`) VALUES
(12, 'ahmed reza', 'ctg,bd', 'reza@mail.com', '198644', 'bba', 'bba004', 'bba004123'),
(14, 'jubair jubo', 'ctg, dhaka bd', 'jubo@mail.com', '01643259871', 'eee', 'eee005', 'eee005123'),
(15, 'md nur hossain bhuiyan\n', 'chittagong, Bangladesh ', 'rajuraihan518@gmail.com', '01670520304', 'cse', 'cse004', 'cse00405137'),
(16, 'Ariful islam', 'Chittagong ', 'absj4k@gmail.com', '01789423479', 'cse', 'cse005', 'cse005123'),
(17, 'riaz murshed', 'Chittagong ', 'riaz@mail.com', '017394639472', 'cse', 'cse23001', 'cse23001123'),
(19, 'md kamal', 'chittagong ', 'kamal@gmail.com', '01670520307', 'eee', 'eee004', 'eee00405137'),
(20, 'md jamal', 'chittagong ', 'adsa321@gmail.com', '0167052305', 'eee', 'eee004', 'eee00405138'),
(21, 'mamun', 'chittagong ', 'mamun@gmail.com', '01670520305', 'cse', '004', 'cse00405138'),
(22, 'md iqbal', 'chittagong ', 'iqbal@gmail.com', '01913555009', 'eng', 'eng004', 'eng004051232');

-- --------------------------------------------------------

--
-- Table structure for table `student_db_tbl`
--

CREATE TABLE `student_db_tbl` (
  `id` int(11) NOT NULL,
  `studentName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `uniqueId` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `studentAddress` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `studentEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `studentPhone` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `deptCode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `batchId` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `studentId` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `last_pass_change` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salt` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_db_tbl`
--

INSERT INTO `student_db_tbl` (`id`, `studentName`, `uniqueId`, `studentAddress`, `studentEmail`, `studentPhone`, `deptCode`, `batchId`, `studentId`, `password`, `last_pass_change`, `salt`, `dateTime`, `status`) VALUES
(12, 'ahmed reza', '5a43e2f6247788.07627041', 'ctg,bd', 'reza@mail.com', '198644', 'bba', 'bba004', 'bba004123', '$2y$10$9Ldivy5AtanIAwIHkS9RIewJaeYWrPHfquso52gyfFlH0v0RbdbdG', '2018-04-13 17:00:44', '5989ba9925', '2017-12-27 18:14:19', '1'),
(14, 'jubair jubo', '5a440f1ddbb3f2.71653217', 'ctg, dhaka bd', 'jubo@mail.com', '01643259871', 'eee', 'eee005', 'eee005123', '$2y$10$Wd42cmM.0Nvlw9k3x157jOEvyuOgDER1RH6RMRUoQrjFRxu/EsVd2', '2018-04-13 17:00:44', '6cba3fc148', '2017-12-27 21:22:38', '1'),
(15, 'md nur hossain bhuiyan\n', '5a44ef0a35f579.65521783', 'chittagong, Bangladesh ', 'rajuraihan518@gmail.com', '01670520304', 'cse', 'cse004', 'cse00405137', '$2y$10$AHzgb4VfLICdGkqfEy11cOqEjq0YQd/bUjPGxUdnqxgHqEOchpF72', '2018-05-11 20:06:17', '683633ba7b', '2017-12-28 13:18:02', '1'),
(16, 'Ariful islam', '5a53978e63d9d2.56246496', 'Chittagong ', 'absj4k@gmail.com', '01789423479', 'cse', 'cse005', 'cse005123', '$2y$10$tfd71W.NTwXIMQGcY/pzquvy9gZHbQAxIw0p/do0LkpdoSYyoS1Su', '2018-04-21 05:12:00', '742a8ea1fd', '2017-12-27 10:08:46', '1'),
(17, 'riaz murshed', '5a58b064a930b2.21771036', 'Chittagong ', 'riaz@mail.com', '017394639472', 'cse', 'cse23001', 'cse23001123', '$2y$10$ENCVukP383BvX0pa1HvaX.NXw7By3NfXieF5j/y22GRY096wdaSSO', '2018-04-13 17:00:44', '40e14a1ddc', '2018-01-12 12:56:04', '0'),
(18, 'md rana', '5aa51bf019a7a2.10968497', 'chittagong ', 'rana@gmail.com', '01815234590', 'eee', 'eee006', 'eee00605137', '$2y$10$uX3oT.FcET5SejBUR3kqZuuzvC2D.i/7D3bk1ABQdkvh6mUPWiJNS', '2018-04-13 17:00:44', '49ed91f7f2', '2018-03-11 12:07:12', '0'),
(19, 'md kamal', '5aa51d94010982.29404079', 'chittagong ', 'kamal@gmail.com', '01670520307', 'eee', 'eee004', 'eee00405137', '$2y$10$mRxizqa1QUeatQYbov8KEeInL6teyGJsHM0dFgHCtoMObQ.nz5tw6', '2018-04-13 17:00:44', 'bc8763f9aa', '2018-03-11 12:14:12', '0'),
(20, 'md jamal', '5aba651588aea8.11122252', 'chittagong ', 'adsa321@gmail.com', '0167052305', 'eee', 'eee004', 'eee00405138', '$2y$10$W12xGvkIYhsIoQE.CJZE7.3XpQZZSMQ9CBiyowVpoeONahbwOQ0xO', '2018-04-13 17:00:44', 'bc2b31dd36', '2018-03-27 15:36:53', '1'),
(21, 'mamun', '5ad86688bac739.80441555', 'chittagong ', 'mamun@gmail.com', '01670520305', 'cse', '004', 'cse00405138', '$2y$10$qgK9XBeLHqS8wJmERSo9B.XlE6ht2VYrgU4clHu/QTIRwLq.rPTCq', '2018-04-19 09:51:05', 'eaca7d5798', '2018-04-19 09:51:05', '1'),
(22, 'md iqbal', '5ae37f76ec0001.11000103', 'chittagong ', 'iqbal@gmail.com', '01913555009', 'eng', 'eng004', 'eng004051232', '$2y$10$Y1Ooa6by5WM9QbMXGGL1cuJq7/mWeI4ij7CPXfW5uj9NCJ2pY4bHu', '2018-04-27 19:52:23', '86618c259c', '2018-04-27 19:52:23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_campus_db`
--

CREATE TABLE `teachers_campus_db` (
  `id` int(11) NOT NULL,
  `teacherName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `teacherAddress` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `teacherEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `teacherPhone` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `deptCode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `teacherId` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachers_campus_db`
--

INSERT INTO `teachers_campus_db` (`id`, `teacherName`, `teacherAddress`, `teacherEmail`, `teacherPhone`, `deptCode`, `designation`, `teacherId`) VALUES
(1, 'salim mia', 'ctg', 'salim@mail.com', '01676828399', 'cse', 'lecturer ', 'cse.salim.14'),
(3, 'md nur hossain bhuiyan raihan', 'ctg', 'raihan@gmail.com', '01912344018', 'cse', 'lecturer', 'cse.raihan.18'),
(4, 'sazzad shuvo', 'ctg', 'adsa321@gmail.com', '01234556785', 'cse', 'lecturer', 'cse.sazzad'),
(5, 'md raihan', 'chittagong', 'absj4k@gmail.com', '01912344018', 'cse', 'lecturer', 'cse.raihan'),
(7, 'md anower', 'chittagong ', 'anower@gmail.com', '01717523122', 'eee', 'lecturer', 'eee.anower'),
(10, 'asif iqbal chowdhury ', 'ambagan, chittagong ', 'asif@mail.com', '01987575368', 'bte', 'lecturer', 'tex.asif.17'),
(11, 'yeasmin ara akter ', 'chittagong ', 'yeasmin@gmail.com', '0170001347', 'cse', 'lecturer ', 'cse.yeasmin2010'),
(12, 'yeasmin ara akter', 'agrabad', 'yeasmincse@gmail.com', '01623631439', 'cse', 'lecturer', 'cse.ya150502069'),
(13, 'manoara begum', 'ctg', 'manoara.cse34@gmail.com', '01845110925', 'cse', 'senior lecturer', 'cse.mb150102057'),
(14, 'mamon', 'ctg', 'manoara34_cse@yahoo.com', '01845110925', 'eee', 'lecturer', 'eee.mamun');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_db_tbl`
--

CREATE TABLE `teachers_db_tbl` (
  `id` int(11) NOT NULL,
  `teacherName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `uniqueId` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `teacherAddress` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `teacherEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `teacherPhone` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `deptCode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `teacherId` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `last_pass_change` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salt` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachers_db_tbl`
--

INSERT INTO `teachers_db_tbl` (`id`, `teacherName`, `uniqueId`, `teacherAddress`, `teacherEmail`, `teacherPhone`, `deptCode`, `designation`, `teacherId`, `password`, `last_pass_change`, `salt`, `dateTime`, `status`) VALUES
(1, 'salim mia', '5a808e3136d926.18083182', 'ctg', 'salim@mail.com', '01676828399', 'cse', 'lecturer ', 'cse.salim.14', '$2y$10$Gs.WQdsZiBUCdnyUQlyyX.sIGbYU5HqEEjgjA.3TFzD5sFJ07mgqu', '2018-04-13 20:31:49', '1798092fc7', '2018-02-11 18:40:49', '1'),
(2, 'hasan kader', '5a80a85c5fc9d3.31276858', 'bd ctg', 'haxanz@mail.bkk', '0987656799', 'eee', 'professor ', 'eee.haxan.18', '$2y$10$cFE6xIJLB0dJxTIFkc/SVuB5H8MpaFYWnlOZuXMLxwQwUCCZmRl0.', '2018-04-13 20:31:49', 'a95990f0ed', '2018-02-11 20:32:28', '0'),
(3, 'md nur hossain bhuiyan raihan', '5a813d8fca10e5.93389523', 'ctg', 'raihan@gmail.com', '01912344018', 'cse', 'lecturer', 'cse.raihan.18', '$2y$10$XAWqTSOeSyD780stL/q.Vud2.s.MndnE8QdZjQyEtl28rQheiPYji', '2018-04-13 20:31:49', '2449d2ff68', '2018-02-12 07:09:03', '1'),
(4, 'sazzad shuvo', '5a940ea0ec16f4.95204449', 'ctg', 'adsa321@gmail.com', '01234556785', 'cse', 'lecturer', 'cse.sazzad', '$2y$10$M2OU0fRU6Jy/FdJ4w2PpduOjKicdn2hkao223.jnrCFU8riV7PpR6', '2018-04-14 15:33:22', '047b59f341', '2018-02-26 13:41:53', '1'),
(5, 'md raihan', '5a9834fa07cc81.26375775', 'chittagong', 'absj4k@gmail.com', '01912344018', 'cse', 'lecturer', 'cse.raihan', '$2y$10$8Cq9y5ME/ceifzWhBqeWneY1iQnQVVIkIiyojCUq8RJP3rb4bzNoS', '2018-04-14 15:55:09', '97f99fc44b', '2018-03-01 17:14:34', '1'),
(6, 'md aziz ahamed', '5aba5b1ecad660.85345847', 'dhaka', 'aziz@gmail.com', '01913444550', 'eee', 'lecturer', 'eee.aziz.18', '$2y$10$GF0VyASIR6a1qOS6Q5NUVuvUsAliYC4hg/dMNvmYiY1TF/MFuOHbu', '2018-04-13 20:31:49', '04a56275ed', '2018-03-27 14:54:22', '0'),
(7, 'md anower', '5aba5c80e1a826.66733059', 'chittagong ', 'anower@gmail.com', '01717523122', 'eee', 'lecturer', 'eee.anower', '$2y$10$i0I1nprWn52oFEHiJfRkF.58isKmm/kSkxkouLVnIvfiy3ieKHiL2', '2018-04-13 20:31:49', '385bbf8141', '2018-03-27 15:00:17', '1'),
(10, 'asif iqbal chowdhury ', '5ad22c069f2969.59910481', 'ambagan, chittagong ', 'asif@mail.com', '01987575368', 'bte', 'lecturer', 'tex.asif.17', '$2y$10$OefWeUA7gd4y9K6t6Qmjs.4Pqb26Zdb2XhONM23fHdXPBFjwncqPC', '2018-04-14 16:27:50', '68c129b7ae', '2018-04-14 16:27:50', '0'),
(11, 'yeasmin ara akter ', '5aeadb25cb70b8.08208356', 'chittagong ', 'yeasmin@gmail.com', '0170001347', 'cse', 'lecturer ', 'cse.yeasmin2010', '$2y$10$60ycC/TYnBuAkOkmguobnervj9hFubRbCUHK7QVomWxKjfFiSPllK', '2018-05-03 09:49:25', 'cfa890ae47', '2018-05-03 09:49:25', '1'),
(12, 'yeasmin ara akter', '5aeae0b07cdd30.80768635', 'agrabad', 'yeasmincse@gmail.com', '01623631439', 'cse', 'lecturer', 'cse.ya150502069', '$2y$10$vQYeM3WFv8KvAVPJDXhpfu7EbhHOKYC9bylFJNBwSEndBFexIyBdS', '2018-05-03 10:13:04', 'bcb298010e', '2018-05-03 10:13:04', '0'),
(13, 'manoara begum', '5afab5b6057b16.96507393', 'ctg', 'manoara.cse34@gmail.com', '01845110925', 'cse', 'senior lecturer', 'cse.mb150102057', '$2y$10$8.21/EFSn1Wt42DxeuN3L.Y3SJkkWDVJUpXx.03UBg72d.pcUzBbm', '2018-05-15 10:25:58', 'be57ce323b', '2018-05-15 10:25:58', '0'),
(14, 'mamon', '5afab8ea6bd508.38218640', 'ctg', 'manoara34_cse@yahoo.com', '01845110925', 'eee', 'lecturer', 'eee.mamun', '$2y$10$LlGt9qrtn1pzozRhSs028OVkMGWtvzzZ1NP5k9ejXHCF1LcWBQwRC', '2018-05-15 10:39:38', 'a8792ef811', '2018-05-15 10:39:38', '0');

-- --------------------------------------------------------

--
-- Table structure for table `web_users`
--

CREATE TABLE `web_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `web_users`
--

INSERT INTO `web_users` (`id`, `username`, `password`, `created_at`, `status`) VALUES
(1, 'admin', 'admin', '2018-04-16 17:58:12', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department_db_tbl`
--
ALTER TABLE `department_db_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquery_reply_db_tbl`
--
ALTER TABLE `enquery_reply_db_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry_db_tbl`
--
ALTER TABLE `enquiry_db_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_db_tbl`
--
ALTER TABLE `notice_db_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `phone_num_db_tbl`
--
ALTER TABLE `phone_num_db_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_campus_db`
--
ALTER TABLE `student_campus_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_db_tbl`
--
ALTER TABLE `student_db_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_campus_db`
--
ALTER TABLE `teachers_campus_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_db_tbl`
--
ALTER TABLE `teachers_db_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_users`
--
ALTER TABLE `web_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department_db_tbl`
--
ALTER TABLE `department_db_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquery_reply_db_tbl`
--
ALTER TABLE `enquery_reply_db_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `enquiry_db_tbl`
--
ALTER TABLE `enquiry_db_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notice_db_tbl`
--
ALTER TABLE `notice_db_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phone_num_db_tbl`
--
ALTER TABLE `phone_num_db_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_campus_db`
--
ALTER TABLE `student_campus_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student_db_tbl`
--
ALTER TABLE `student_db_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `teachers_campus_db`
--
ALTER TABLE `teachers_campus_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teachers_db_tbl`
--
ALTER TABLE `teachers_db_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `web_users`
--
ALTER TABLE `web_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
