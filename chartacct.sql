-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 09:16 AM
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
-- Database: `chartacct`
--

-- --------------------------------------------------------

--
-- Table structure for table `chart_acct`
--

CREATE TABLE `chart_acct` (
  `id` int(10) NOT NULL,
  `aid` varchar(10) NOT NULL,
  `cid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart_acct`
--

INSERT INTO `chart_acct` (`id`, `aid`, `cid`) VALUES
(2, '0', '0'),
(3, '0', '0'),
(4, '', 'not select'),
(39, '49', '25'),
(43, '55', '27'),
(44, '56', '27'),
(45, '58', '25'),
(46, '58', '26'),
(47, '58', '27'),
(48, '61', '26'),
(49, '61', '27'),
(50, '62', '25'),
(51, '62', '27'),
(52, '60', '26'),
(53, '60', '27'),
(54, '60', '28'),
(55, '61', '28'),
(56, '62', '28'),
(57, '56', '29'),
(58, '58', '29'),
(59, '62', '29'),
(60, '49', '30'),
(61, '56', '30'),
(62, '60', '30'),
(63, '62', '30'),
(64, '55', '31'),
(65, '56', '31'),
(66, '49', '32'),
(67, '56', '32'),
(68, '63', '29'),
(69, '63', '31'),
(70, '63', '32'),
(73, '49', '34'),
(74, '55', '34'),
(75, '56', '34'),
(76, '55', '35'),
(77, '62', '35'),
(78, '63', '35'),
(79, '64', '26'),
(80, '64', '28'),
(81, '64', '34'),
(82, '64', '35'),
(83, '57', '34'),
(84, '57', '35'),
(85, '60', '33'),
(86, '61', '33'),
(87, '56', '36');

-- --------------------------------------------------------

--
-- Table structure for table `file_record`
--

CREATE TABLE `file_record` (
  `id` int(10) NOT NULL,
  `upload_by` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `datee` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file` varchar(100) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_record`
--

INSERT INTO `file_record` (`id`, `upload_by`, `user_id`, `datee`, `file`, `tag`, `type`) VALUES
(1, 1, 61, '2020-02-29 04:01:47', '1000-06_06_2016 Btech IT 2012.pdf', '', 'admin'),
(2, 1, 61, '2020-02-29 04:01:47', '1000-78868b14-70c2-4305-9482-659782710567.pdf', '', 'admin'),
(3, 1, 61, '2019-03-01 04:02:11', '1000-06_06_2016 Btech IT 2012.pdf', '', 'admin'),
(4, 1, 61, '2020-02-29 04:02:11', '1000-78868b14-70c2-4305-9482-659782710567.pdf', '', 'admin'),
(5, 1, 55, '2020-02-29 04:03:56', '1000-3rd.pdf', '', 'admin'),
(6, 1, 55, '2020-02-29 04:03:57', '1000-4th.pdf', '', 'admin'),
(7, 1, 61, '2020-02-29 04:44:49', '1000-5th.pdf', '', 'admin'),
(8, 1, 84, '2020-02-29 22:48:04', '1000-ajavanotes.docx', '', 'admin'),
(9, 55, 55, '2020-02-29 22:52:35', '1000-ajavanotes.docx', '', 'client'),
(10, 1, 98, '2019-03-29 22:01:29', '1000-06_06_2016 Btech IT 2012.pdf', '', 'admin'),
(11, 1, 98, '2019-03-29 22:01:29', '1000-78868b14-70c2-4305-9482-659782710567.pdf', '', 'admin'),
(12, 45, 56, '2020-03-01 00:43:38', '1000-CC tut.docx', '', 'accountant'),
(13, 45, 56, '2020-03-03 04:12:45', '1000-admitcard.pdf', 'gst', 'accountant'),
(14, 47, 60, '2020-03-03 04:26:51', '1000-Cv.docx', 'gst,tax', 'accountant'),
(15, 47, 60, '2020-03-03 04:26:51', '1000-haa.png', 'gst,tax', 'accountant'),
(16, 47, 89, '2020-03-03 05:18:02', '1000-DT20195217456_Application.pdf', 'tax,gst2020', 'accountant'),
(17, 1, 55, '2020-03-09 21:13:20', '1000-gpic.jpg', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `formacc`
--

CREATE TABLE `formacc` (
  `id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `experience` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formacc`
--

INSERT INTO `formacc` (`id`, `fname`, `lname`, `gender`, `experience`, `email`, `phone`, `type`, `user_id`) VALUES
(56, 'paras', 'monga', 'male', '1', 'prsmng1@gmail.com', '7837655799', 'accountant', 43),
(57, 'paras', 'chabara', 'male', '1', 'acc21@gmail.com', '0002225541', 'accountant', 44),
(58, 'ppp', 'mmm', 'male', '12', 'acc22@gmail.com', '4455226633', 'accountant', 45),
(60, 'ppp', 'mmm', 'male', '12', 'acc24@gmail.com', '4455226632', 'accountant', 47),
(61, 'paras', 'gupta', 'male', '1', 'acc25@gmail.com', '8528528520', 'accountant', 57),
(62, 'user', 'qqqq', 'female', '3', 'acc26@gmail.com', '1010101010', 'accountant', 59),
(63, 'rrir', 'sharma', 'female', '3', 'acc27@gmail.com', '6933963500', 'accountant', 86),
(64, 'ramm', 'sharma', 'male', '1', 'acc29@gmail.com', '8935350000', 'accountant', 99);

-- --------------------------------------------------------

--
-- Table structure for table `formcli`
--

CREATE TABLE `formcli` (
  `id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formcli`
--

INSERT INTO `formcli` (`id`, `fname`, `lname`, `gender`, `company`, `gst`, `email`, `phone`, `type`, `user_id`) VALUES
(26, 'sunnnn', 'sharma', 'male', 'kdsjhdslkjajajd', '27AASCS2ASQWE13', 'test@gmail.com', '1111111111', 'client', 55),
(27, 'vvvvv', 'kkk', 'male', 'aaaajhghghhjhj', '27AASCS2ASQWE14', 'test2@gmail.com', '1234567890', 'client', 56),
(28, 'lakak', 'mmm', 'male', 'kdsjhdslkjajajd', '27AASCS2ASQWE32', 'test3@gmail.com', '7478574103', 'client', 60),
(29, 'zxxzzx', 'jj', 'female', 'kdsjhdslkjajajd', '27AASCS2CXQWE25', 'test4@gmail.com', '3236353410', 'client', 61),
(30, 'ppp', 'mmm', 'female', 'njNVJWN GOJRWN', '27AASCS2ASQWE60', 'test7@gmail.com', '2015013440', 'client', 69),
(31, 'nnnnnn', 'jj', 'male', 'kdsjhdslkjajajd', '27AASCS2CXQWE64', 'test8@gmail.com', '6324921650', 'client', 71),
(32, 'sham', 'sharma', 'male', 'kdsjhdslkjajajd', '27AASCS2ASQWE34', 'test11@gmail.com', '8501305106', 'client', 84),
(33, 'riya', 'kapoor', 'female', 'kdsjhdslkjajajd', '27AASCM2CXQWE42', 'test28@gmail.com', '9685741200', 'client', 89),
(34, 'paras', 'monga', 'male', 'test address', 'AD23343469121ZE', 'paras@paras.com', '9898989898', 'client', 97),
(35, 'qwerty', 'asdf', 'female', 'kdsjhdslkjajajd', '27AASCS2ASQWE36', 'test29@gmail.com', '1346782555', 'client', 98),
(36, 'Rajeev', 'Monga', 'male', 'Alpha Technology', '06AFSPM4441G1ZA', 'rajeevmonga@yahoo.com', '9812042279', 'client', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logindb`
--

CREATE TABLE `logindb` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `key_gen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logindb`
--

INSERT INTO `logindb` (`id`, `email`, `password`, `type`, `fname`, `lname`, `key_gen`) VALUES
(1, 'prs@gmail.com', 'paras', 'admin', 'PARAS', 'MONGA', 'd494f160fd'),
(43, 'prsmng1@gmail.com', '', 'accountant', 'paras', 'monga', '5200d801f2'),
(44, 'acc21@gmail.com', '123456', 'accountant', 'paras', 'chabara', ''),
(45, 'acc22@gmail.com', 'paras123', 'accountant', 'ppp', 'mmm', ''),
(47, 'acc24@gmail.com', 'paras123', 'accountant', 'ppp', 'mmm', ''),
(55, 'test@gmail.com', 'paras123', 'client', 'sunnnn', 'sharma', ''),
(56, 'test2@gmail.com', 'paras123', 'client', 'vvvvv', 'kkk', ''),
(57, 'acc25@gmail.com', '123456', 'accountant', 'paras', 'gupta', ''),
(59, 'acc26@gmail.com', '123456', 'accountant', 'user', 'qqqq', ''),
(60, 'test3@gmail.com', '123456', 'client', 'lakak', 'mmm', ''),
(61, 'test4@gmail.com', '123456', 'client', 'zxxzzx', 'jj', ''),
(69, 'test7@gmail.com', '123456', 'client', 'ppp', 'mmm', ''),
(71, 'test8@gmail.com', '123456', 'client', 'nnnnnn', 'jj', ''),
(84, 'test11@gmail.com', '123456', 'client', 'sham', 'sharma', ''),
(86, 'acc27@gmail.com', '123456', 'accountant', 'rrir', 'sharma', ''),
(89, 'test28@gmail.com', '123456', 'client', 'riya', 'kapoor', ''),
(97, 'paras@paras.com', '123456', 'client', 'paras', 'monga', ''),
(98, 'test29@gmail.com', '123456', 'client', 'qwerty', 'asdf', ''),
(99, 'acc29@gmail.com', '123456', 'accountant', 'ramm', 'sharma', ''),
(100, 'rajeevmonga@yahoo.com', 'paras1234', 'client', 'Rajeev', 'Monga', '');

-- --------------------------------------------------------

--
-- Table structure for table `requestform`
--

CREATE TABLE `requestform` (
  `id` int(10) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `reciever` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `datee` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` longtext NOT NULL,
  `files` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestform`
--

INSERT INTO `requestform` (`id`, `sender`, `reciever`, `subject`, `datee`, `message`, `files`, `status`) VALUES
(137, '1', '55', 'ppppppppppppppppppp', '0000-00-00 00:00:00', 'ppppppppppppppppppp', '1000-2nd.pdf', 0),
(138, '1', '56', 'ppppppppppppppppppp', '0000-00-00 00:00:00', 'ppppppppppppppppppp', '1000-2nd.pdf', 0),
(139, '1', '25', 'ppppppppppppppppppp', '0000-00-00 00:00:00', 'ppppppppppppppppppp', '1000-2nd.pdf', 0),
(140, '1', '26', 'ppppppppppppppppppp', '0000-00-00 00:00:00', 'ppppppppppppppppppp', '1000-2nd.pdf', 0),
(141, '60', '1', 'saafas a  ', '2020-02-27 17:27:33', 'adbsz zb  z nzs  ', '1000-5th.pdf', 1),
(142, '60', '28', 'saafas a  ', '0000-00-00 00:00:00', 'adbsz zb  z nzs  ', '1000-5th.pdf', 0),
(143, '60', '33', 'saafas a  ', '0000-00-00 00:00:00', 'adbsz zb  z nzs  ', '1000-5th.pdf', 0),
(144, '99', '1', 'filesss', '2020-02-27 17:26:58', 'senddd dataaa', '1000-06_06_2016 Btech IT 2012.pdf', 0),
(145, '99', '0', 'filesss', '2020-02-26 04:41:31', 'senddd dataaa', '1000-06_06_2016 Btech IT 2012.pdf', 0),
(146, '99', '97', 'filesss', '2020-02-26 04:41:31', 'senddd dataaa', '1000-06_06_2016 Btech IT 2012.pdf', 0),
(147, '99', '98', 'filesss', '2020-02-26 04:41:31', 'senddd dataaa', '1000-06_06_2016 Btech IT 2012.pdf', 0),
(148, '84', '1', 'documentss', '2020-02-27 17:21:46', 'asfgafsgsfgfgf', '1000-ajavanotes.docx', 0),
(149, '84', '43', 'documentss', '2020-02-27 00:49:37', 'asfgafsgsfgfgf', '1000-ajavanotes.docx', 0),
(150, '84', '86', 'documentss', '2020-02-27 00:49:37', 'asfgafsgsfgfgf', '1000-ajavanotes.docx', 0),
(151, '89', '1', 'saafas a  ', '2020-02-27 17:26:51', 'to the shn ', '1000-CC tut.docx', 0),
(152, '89', '57', 'saafas a  ', '2020-02-27 00:58:31', 'to the shn ', '1000-CC tut.docx', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chart_acct`
--
ALTER TABLE `chart_acct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_record`
--
ALTER TABLE `file_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formacc`
--
ALTER TABLE `formacc`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`(20));

--
-- Indexes for table `formcli`
--
ALTER TABLE `formcli`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gst` (`gst`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `logindb`
--
ALTER TABLE `logindb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `requestform`
--
ALTER TABLE `requestform`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chart_acct`
--
ALTER TABLE `chart_acct`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `file_record`
--
ALTER TABLE `file_record`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `formacc`
--
ALTER TABLE `formacc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `formcli`
--
ALTER TABLE `formcli`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `logindb`
--
ALTER TABLE `logindb`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `requestform`
--
ALTER TABLE `requestform`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
