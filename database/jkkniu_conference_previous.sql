-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 05:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jkkniu_conference`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_information`
--

CREATE TABLE `admin_information` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_information`
--

INSERT INTO `admin_information` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Mehedi Khan Rakib', 'mkrakib007@gmail.com', '$2y$10$gwntBIpYSUdGXZa1VGxcd.LZ2ggWcvAOEXbGGMua04QQldupzM3Mu');

-- --------------------------------------------------------

--
-- Table structure for table `author_information`
--

CREATE TABLE `author_information` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_email` varchar(200) NOT NULL,
  `author_contact_no` varchar(11) NOT NULL,
  `author_password` varchar(200) NOT NULL,
  `verification_code` varchar(100) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author_information`
--

INSERT INTO `author_information` (`author_id`, `author_name`, `author_email`, `author_contact_no`, `author_password`, `verification_code`, `email_verified_at`) VALUES
(14, 'sakib shahon', 'sakib3201@gmail.com', '01709828340', '$2y$10$LKH0OawySUbYnZdi1c7TUegsYCZiB2gPvME.oNKuXJR91HXcZFVt6', '821567', '2023-03-05 14:40:50'),
(18, 'Mehedi Khan Rakib', 'mkrakib328@gmail.com', '01727027277', '$2y$10$buM7ewvY79ke.s5l4jPUdeKcZNbej9HljkHWj0t77EFk4i/bjfF1W', '146926', '2023-03-06 00:50:32'),
(20, 'MK Rakib', 'mkrcoding007@gmail.com', '01643540358', '$2y$10$lVc7Ls6NIOfun1e0vBIXy.bBNF1GmZ7jN1XCJ3kA135lrrRRpJSFK', '152181', '2023-03-06 04:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `call_for_paper`
--

CREATE TABLE `call_for_paper` (
  `id` int(11) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL,
  `pdf_file` varchar(100) NOT NULL,
  `doc_file` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `call_for_paper`
--

INSERT INTO `call_for_paper` (`id`, `image1`, `image2`, `pdf_file`, `doc_file`, `date`) VALUES
(6, '6408ae69475bb.jpg', '6408ae69475bd.jpg', '6408ae69475be.pdf', '6408ae69475bf.doc', '2023-03-08 15:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `committee_id` int(11) NOT NULL,
  `committee_image` varchar(50) NOT NULL,
  `committee_name` varchar(50) NOT NULL,
  `committee_email` varchar(50) NOT NULL,
  `committee_contact` varchar(50) NOT NULL,
  `committee_password` varchar(50) NOT NULL,
  `committee_university` varchar(50) NOT NULL,
  `committee_topic` varchar(50) NOT NULL,
  `committee_status` enum('0','1') NOT NULL DEFAULT '0',
  `verification_code` varchar(100) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`committee_id`, `committee_image`, `committee_name`, `committee_email`, `committee_contact`, `committee_password`, `committee_university`, `committee_topic`, `committee_status`, `verification_code`, `email_verified_at`) VALUES
(3, '1678953806.png', 'Member-1', 'member1@gmail.com', '', '', 'JKKNIU', 'M-1', '0', '', NULL),
(8, '1679379485.jpg', 'Professor A B M Shawkat Ali', 'shawkatali@gmail.com', '', '', 'The University Of Fiji', 'International Advisor', '1', '', NULL),
(9, '1679384862.jpeg', 'Dr Mohammad Ali Moni', 'ahadalimoni@gmail.com', '', '', 'The University of Queensland , Australia', 'Senior Lecturer & Senior Fellow', '1', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `important_dates`
--

CREATE TABLE `important_dates` (
  `id` int(11) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `important_dates`
--

INSERT INTO `important_dates` (`id`, `topic`, `date`) VALUES
(2, 'Extended abstract submission', '2023-03-31'),
(3, 'Notification of acceptance', '2023-04-15'),
(4, 'Full paper submission', '2023-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `new_paper`
--

CREATE TABLE `new_paper` (
  `id` int(11) NOT NULL,
  `paper_id` varchar(200) DEFAULT NULL,
  `paper_title` varchar(200) NOT NULL,
  `author_id` int(11) NOT NULL,
  `paper_keywords` varchar(1000) NOT NULL,
  `track` varchar(100) NOT NULL,
  `authors_name` varchar(1000) NOT NULL,
  `authors_affiliation` varchar(1000) NOT NULL,
  `authors_email` varchar(2000) NOT NULL,
  `manuscript_pdf` varchar(300) NOT NULL,
  `paper_status` int(2) NOT NULL,
  `count` int(11) NOT NULL,
  `timestamps` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_paper`
--

INSERT INTO `new_paper` (`id`, `paper_id`, `paper_title`, `author_id`, `paper_keywords`, `track`, `authors_name`, `authors_affiliation`, `authors_email`, `manuscript_pdf`, `paper_status`, `count`, `timestamps`) VALUES
(29, '1678007008', 'tester', 14, 'test', 'Business', 'sakib', 'jkkniu', 'sakib3201@gmail.com', '1678007008.doc', 1, 1, '2023-03-04 21:03:28'),
(31, '1678294905', 'Data Structure and Algorithms', 18, 'DSA,Algo', 'Science', 'Mehedi Khan Rakib', 'JKKNIU research society', 'mkrakib328@gmail.com', '6408bf792f0bb.doc', 1, 1, '2023-03-08 05:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

CREATE TABLE `speakers` (
  `speaker_id` int(11) NOT NULL,
  `speaker_image` varchar(50) NOT NULL,
  `speaker_name` varchar(50) NOT NULL,
  `speaker_email` varchar(50) NOT NULL,
  `speaker_contact` varchar(50) NOT NULL,
  `speaker_password` varchar(50) NOT NULL,
  `speaker_country` varchar(100) NOT NULL,
  `speaker_university` varchar(50) NOT NULL,
  `speaker_topic` varchar(50) NOT NULL,
  `speaker_status` enum('0','1') NOT NULL DEFAULT '0',
  `verification_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `speakers`
--

INSERT INTO `speakers` (`speaker_id`, `speaker_image`, `speaker_name`, `speaker_email`, `speaker_contact`, `speaker_password`, `speaker_country`, `speaker_university`, `speaker_topic`, `speaker_status`, `verification_code`) VALUES
(11, '1678221025.jpg', 'Mehedi Khan', 'mkrcoding1998@gmail.com', '', '', '', 'JKKNIU', 'CSE', '0', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_information`
--
ALTER TABLE `admin_information`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `author_information`
--
ALTER TABLE `author_information`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `call_for_paper`
--
ALTER TABLE `call_for_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`committee_id`);

--
-- Indexes for table `important_dates`
--
ALTER TABLE `important_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_paper`
--
ALTER TABLE `new_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`speaker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_information`
--
ALTER TABLE `admin_information`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `author_information`
--
ALTER TABLE `author_information`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `call_for_paper`
--
ALTER TABLE `call_for_paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `committee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `important_dates`
--
ALTER TABLE `important_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `new_paper`
--
ALTER TABLE `new_paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `speaker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
