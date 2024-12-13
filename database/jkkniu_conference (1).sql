-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 25, 2024 at 06:28 AM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `admin_id` int NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_information`
--

INSERT INTO `admin_information` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Mehedi Khan Rakib', 'mkrakib007@gmail.com', '$2y$10$gwntBIpYSUdGXZa1VGxcd.LZ2ggWcvAOEXbGGMua04QQldupzM3Mu'),
(2, 'Sawvik Kar Dipto', 'sawvik.dipto10@gmail.com', '$2y$10$c1BxHOB2BkNyfiOGlVYYC.7fy/D5jYz2FiEI2MpWflfgAN5LCsd9O');

-- --------------------------------------------------------

--
-- Table structure for table `author_information`
--

CREATE TABLE `author_information` (
  `author_id` int NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_email` varchar(200) NOT NULL,
  `author_contact_no` varchar(11) NOT NULL,
  `author_password` varchar(200) NOT NULL,
  `verification_code` varchar(100) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `author_information`
--

INSERT INTO `author_information` (`author_id`, `author_name`, `author_email`, `author_contact_no`, `author_password`, `verification_code`, `email_verified_at`) VALUES
(14, 'sakib shahon', 'sakib3201@gmail.com', '01709828340', '$2y$10$LKH0OawySUbYnZdi1c7TUegsYCZiB2gPvME.oNKuXJR91HXcZFVt6', '821567', '2023-03-05 14:40:50'),
(18, 'Mehedi Khan Rakib', 'mkrakib328@gmail.com', '01727027277', '$2y$10$buM7ewvY79ke.s5l4jPUdeKcZNbej9HljkHWj0t77EFk4i/bjfF1W', '146926', '2023-03-06 00:50:32'),
(20, 'MK Rakib', 'mkrcoding007@gmail.com', '01643540358', '$2y$10$lVc7Ls6NIOfun1e0vBIXy.bBNF1GmZ7jN1XCJ3kA135lrrRRpJSFK', '152181', '2023-03-06 04:39:41'),
(54, 'Jaki', 'omarjaki5254@gmail.com', '01914388048', '$2y$10$unK7S5zrluZwp5Voct4w1O.p6XOdHqyWS9qe3P6myab9/Q0stFDsm', '318633', '2023-11-29 14:35:24'),
(58, 'Irteja', 'irteja500@gmail.com', '01914388048', '$2y$10$bZ7Dxq5KBe6s4QntYdwc.u1oKjbMEgZZlbj04afemDiH5hJ9sw3ri', '351811', '2023-12-09 17:02:03'),
(65, 'Sawvik', 'sawvik.dipto10@gmail.com', '01914388048', '$2y$10$afU3S5/56UeLaZRy3lSUP.rNfUcs7ESiMFtFnMPbfiwU6dvrAZ/.O', '305681', '2024-01-21 09:46:27'),
(67, 'Rijon', 'fazlerabbirizon43@gmail.com', '01914388048', '$2y$10$PMeG2psDl1Z9LGp5WsJXmuqknpFtpyqCYoHZZdZVgZf/5RGHy95vy', '351644', '2024-01-31 10:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `call_for_paper`
--

CREATE TABLE `call_for_paper` (
  `id` int NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL,
  `pdf_file` varchar(100) NOT NULL,
  `doc_file` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `call_for_paper`
--

INSERT INTO `call_for_paper` (`id`, `image1`, `image2`, `pdf_file`, `doc_file`, `date`) VALUES
(7, 'one.jpg', '6408ae69475bd.jpg', '6408ae69475be.pdf', '6408ae69475bf.doc', '2023-03-08 09:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `committee_id` int NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`committee_id`, `committee_image`, `committee_name`, `committee_email`, `committee_contact`, `committee_password`, `committee_university`, `committee_topic`, `committee_status`, `verification_code`, `email_verified_at`) VALUES
(8, '1679379485.jpg', 'Professor A B M Shawkat Ali', 'shawkatali@gmail.com', '', '', 'The University Of Fiji', 'International Advisor', '1', '', NULL),
(9, '1679384862.jpeg', 'Dr Mohammad Ali Moni', 'ahadalimoni@gmail.com', '', '', 'The University of Queensland , Australia', 'Senior Lecturer & Senior Fellow', '1', '', NULL),
(20, '1708623502.jpg', 'Sawvik', 'sawvik.dipto10@gmail.com', '', '', 'Jatiya Kabi Kazi Nazrul Islam University', 'International Advisor', '0', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `important_dates`
--

CREATE TABLE `important_dates` (
  `id` int NOT NULL,
  `topic` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `id` int NOT NULL,
  `paper_id` varchar(200) DEFAULT NULL,
  `paper_title` varchar(200) NOT NULL,
  `author_id` int NOT NULL,
  `paper_keywords` varchar(1000) NOT NULL,
  `track` varchar(100) NOT NULL,
  `authors_name` varchar(1000) NOT NULL,
  `authors_affiliation` varchar(1000) NOT NULL,
  `authors_email` varchar(2000) NOT NULL,
  `manuscript_pdf` varchar(300) NOT NULL,
  `paper_status` int NOT NULL,
  `count` int NOT NULL,
  `timestamps` timestamp NULL DEFAULT NULL,
  `corresponding_author_name` varchar(500) DEFAULT NULL,
  `corresponding_author_affiliation` varchar(500) DEFAULT NULL,
  `corresponding_author_email` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `new_paper`
--

INSERT INTO `new_paper` (`id`, `paper_id`, `paper_title`, `author_id`, `paper_keywords`, `track`, `authors_name`, `authors_affiliation`, `authors_email`, `manuscript_pdf`, `paper_status`, `count`, `timestamps`, `corresponding_author_name`, `corresponding_author_affiliation`, `corresponding_author_email`) VALUES
(50, '1706677411', 'Artificial Intelligence in Medicine', 67, 'Artificial intelligence – Neural networks (computer)', 'Science', 'Sawvik', 'JKKNIU', 'irteja500@gmail.com', '65b9d4a3d8ba5.pdf', 1, 1, '2024-01-31 05:03:31', 'Sawvik', 'JKKNIU', 'irteja500@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Professors`
--

CREATE TABLE `Professors` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `send_email` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Professors`
--

INSERT INTO `Professors` (`id`, `username`, `email`, `send_email`) VALUES
(1, 'Rizbi Ahmed', 'ramimcse321@gmail.com', 1),
(2, 'Sawvik Kar Dipto', 'sawvik.dipto10@gmail.com', 1),
(3, 'Fazle Rabbi Rizon', 'fazlerabbirizon43@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviewers`
--

CREATE TABLE `reviewers` (
  `reviewer_id` int NOT NULL,
  `reviewer_name` varchar(255) NOT NULL,
  `reviewer_email` text NOT NULL,
  `password` text NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `expertise` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `admin_approved` varchar(50) DEFAULT NULL,
  `admin_registered` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviewers`
--

INSERT INTO `reviewers` (`reviewer_id`, `reviewer_name`, `reviewer_email`, `password`, `designation`, `department`, `university`, `division`, `country`, `expertise`, `image`, `admin_approved`, `admin_registered`) VALUES
(27, 'Tamal Paul', 'yimec44434@evvgo.com', '1234', 'professor', 'Computer Science & Engineering', 'Jatiya Kabi Kazi Nazrul Islam University', 'Dhaka', 'Bangladesh', 'Artificial Intelligence, Cyber Security , Data Mining ', '1706708786.jpg', '1', 0),
(43, 'Fazle Rabbi', 'fazlerabbirizon43@gmail.com', '123456', 'lecturer', 'Computer Science & Engineering', 'Jatiya Kabi Kazi Nazrul Islam University', 'Dhaka', 'Bangladesh', 'Artificial Intelligence, Cyber Security , Data Mining ', '1708777034.jpg', '1', 1),
(45, 'Sawvik Kar Dipto', 'sawvik.dipto10@gmail.com', '$2y$10$5DckxHfBYWaih3G2pdyG4.Qohy8POG93.PSjVfZst.OJGyZ1.JC9W', 'associateProfessor', 'Computer Science & Engineering', 'Jatiya Kabi Kazi Nazrul Islam University', 'Dhaka', 'Bangladesh', 'Artificial Intelligence, Cyber Security , Data Mining ', '1708778535.jpg', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_table_id` int NOT NULL,
  `reviewer_id` int NOT NULL,
  `paper_id` int NOT NULL,
  `suitability_of_title` varchar(255) NOT NULL,
  `novelty_of_work` varchar(255) NOT NULL,
  `presentation` varchar(255) NOT NULL,
  `results_and_analysis` varchar(255) NOT NULL,
  `overall_evaluation` varchar(255) NOT NULL,
  `reviewer_confidence` varchar(255) NOT NULL,
  `confidential_remarks` varchar(255) NOT NULL,
  `review_status` varchar(255) NOT NULL,
  `further_review` varchar(255) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `assigned_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_table_id`, `reviewer_id`, `paper_id`, `suitability_of_title`, `novelty_of_work`, `presentation`, `results_and_analysis`, `overall_evaluation`, `reviewer_confidence`, `confidential_remarks`, `review_status`, `further_review`, `deadline`, `assigned_date`) VALUES
(18, 8, 1701247038, 'fair', 'very_poor', 'excellent', 'excellent', 'borderline_paper', 'medium', 'Nothing', 'Reviewed', 'possible', NULL, NULL),
(21, 9, 1701247038, '[value-3]', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', 'Assigned', 'possible', NULL, NULL),
(22, 9, 1702133351, '[value-3]', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', 'Assigned', 'possible', NULL, NULL),
(23, 13, 1701247038, '[value-3]', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', 'Assigned', 'possible', NULL, NULL),
(24, 26, 1706592604, 'excellent', 'fair', 'excellent', 'excellent', 'strong_reject', 'expert', 'Nothing to add', 'Reviewed', 'impossible', NULL, NULL),
(35, 27, 1701247038, ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Assigned', 'possible', NULL, NULL),
(36, 27, 1706677411, ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Assigned', 'possible', NULL, NULL),
(52, 26, 1701247038, ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Assigned', 'possible', NULL, NULL),
(60, 41, 1706677411, ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Assigned', 'possible', '2024-03-05', '2024-02-24'),
(61, 43, 1706677411, ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Assigned', 'possible', '2024-03-05', '2024-02-24'),
(62, 45, 1706677411, 'poor', 'fair', 'very_poor', 'excellent', 'weak_reject', 'medium', 'Nothing to add', 'Reviewed', 'possible', '2024-03-05', '2024-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

CREATE TABLE `speakers` (
  `speaker_id` int NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `speakers`
--

INSERT INTO `speakers` (`speaker_id`, `speaker_image`, `speaker_name`, `speaker_email`, `speaker_contact`, `speaker_password`, `speaker_country`, `speaker_university`, `speaker_topic`, `speaker_status`, `verification_code`) VALUES
(33, '1702017521.jpeg', 'Sawvik', 'sawvik.dipto10@gmail.com', '', '', '', 'JKKNIU', 'Global Warming', '0', ''),
(34, '1708583750.jpg', 'Sawvik', 'sawvik.dipto10@gmail.com', '', '', '', 'Jatiya Kabi Kazi Nazrul Islam University', 'Global Warming', '0', ''),
(35, '1708589619.jpg', 'Jaki', 'omarjaki5254@gmail.com', '', '', '', 'Jatiya Kabi Kazi Nazrul Islam University', 'Global Warming', '0', ''),
(36, '1708589755.jpg', 'Gobinda Paul Atreya ', 'gobindapaul88@gmail.com', '', '', '', 'Notre Dame College Mumbai', 'Data Mining ', '0', '');

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
-- Indexes for table `Professors`
--
ALTER TABLE `Professors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewers`
--
ALTER TABLE `reviewers`
  ADD PRIMARY KEY (`reviewer_id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_table_id`);

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
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `author_information`
--
ALTER TABLE `author_information`
  MODIFY `author_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `call_for_paper`
--
ALTER TABLE `call_for_paper`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `committee_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `important_dates`
--
ALTER TABLE `important_dates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `new_paper`
--
ALTER TABLE `new_paper`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `Professors`
--
ALTER TABLE `Professors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviewers`
--
ALTER TABLE `reviewers`
  MODIFY `reviewer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_table_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `speaker_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
