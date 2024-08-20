-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2024 at 12:36 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `examinations`
--

CREATE TABLE `examinations` (
                                `id` int(11) NOT NULL,
                                `name` varchar(255) NOT NULL,
                                `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examinations`
--

INSERT INTO `examinations` (`id`, `name`, `year`) VALUES
    (1, 'First Term', 2024);

-- --------------------------------------------------------

--
-- Table structure for table `examinations_faculty_details`
--

CREATE TABLE `examinations_faculty_details` (
                                                `examinationId` int(11) NOT NULL,
                                                `facultyDetailId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examinations_faculty_details`
--

INSERT INTO `examinations_faculty_details` (`examinationId`, `facultyDetailId`) VALUES
                                                                                    (1, 1),
                                                                                    (1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
                           `id` int(11) NOT NULL,
                           `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`) VALUES
                                         (5, '+2'),
                                         (6, 'Bachelors');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_details`
--

CREATE TABLE `faculty_details` (
                                   `id` int(11) NOT NULL,
                                   `name` varchar(20) NOT NULL,
                                   `gradeId` int(11) DEFAULT NULL,
                                   `facultyId` int(11) DEFAULT NULL,
                                   `streamId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_details`
--

INSERT INTO `faculty_details` (`id`, `name`, `gradeId`, `facultyId`, `streamId`) VALUES
                                                                                     (1, 'Computer Science 11', 1, 5, 2),
                                                                                     (3, 'test', 1, 5, 2),
                                                                                     (5, 'new', 1, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_detail_subjects`
--

CREATE TABLE `faculty_detail_subjects` (
                                           `id` int(11) NOT NULL,
                                           `facultyDetailId` int(11) NOT NULL,
                                           `subjectId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_detail_subjects`
--

INSERT INTO `faculty_detail_subjects` (`id`, `facultyDetailId`, `subjectId`) VALUES
                                                                                 (5, 3, 1),
                                                                                 (6, 3, 2),
                                                                                 (10, 1, 1),
                                                                                 (11, 1, 4),
                                                                                 (12, 5, 1),
                                                                                 (13, 5, 2),
                                                                                 (14, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
                          `id` int(11) NOT NULL,
                          `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`) VALUES
                                        (1, '11'),
                                        (2, '12'),
                                        (3, 'sem 1'),
                                        (4, 'sem 2'),
                                        (5, 'year 1'),
                                        (6, 'year 2');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
                         `id` int(11) NOT NULL,
                         `subjectId` int(11) NOT NULL,
                         `practical` float NOT NULL,
                         `theory` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `subjectId`, `practical`, `theory`) VALUES
                                                                   (17, 1, 18, 35),
                                                                   (18, 2, 18, 54),
                                                                   (19, 4, 15, 48),
                                                                   (20, 1, 24, 59),
                                                                   (21, 2, 24, 58),
                                                                   (22, 4, 24, 54),
                                                                   (23, 1, 30, 59),
                                                                   (24, 2, 30, 58),
                                                                   (25, 4, 30, 54);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
                           `id` int(11) NOT NULL,
                           `examinationId` int(11) NOT NULL,
                           `facultyDetailId` int(11) NOT NULL,
                           `studentId` int(11) NOT NULL,
                           `grade` varchar(10) DEFAULT NULL,
                           `percentage` decimal(5,2) DEFAULT NULL,
                           `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `examinationId`, `facultyDetailId`, `studentId`, `grade`, `percentage`, `rank`) VALUES
                                                                                                                 (12, 1, 5, 4, NULL, '62.67', NULL),
                                                                                                                 (13, 1, 5, 5, NULL, '81.00', NULL),
                                                                                                                 (14, 1, 5, 6, NULL, '87.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `result_marks`
--

CREATE TABLE `result_marks` (
                                `resultId` int(11) NOT NULL,
                                `marksId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result_marks`
--

INSERT INTO `result_marks` (`resultId`, `marksId`) VALUES
                                                       (12, 17),
                                                       (12, 18),
                                                       (12, 19),
                                                       (13, 20),
                                                       (13, 21),
                                                       (13, 22),
                                                       (14, 23),
                                                       (14, 24),
                                                       (14, 25);

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
                           `id` int(11) NOT NULL,
                           `name` varchar(255) NOT NULL,
                           `facultyId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `name`, `facultyId`) VALUES
                                                      (2, 'Computer Science', 5),
                                                      (3, 'Business Studies', 5),
                                                      (4, 'BCA', 6),
                                                      (5, 'BBS', 6);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
                            `id` int(11) NOT NULL,
                            `name` varchar(255) NOT NULL,
                            `address` varchar(255) NOT NULL,
                            `guardianName` varchar(255) DEFAULT NULL,
                            `contact` varchar(15) DEFAULT NULL,
                            `facultyDetailsId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `address`, `guardianName`, `contact`, `facultyDetailsId`) VALUES
                                                                                                    (1, 'Sagar Ghalan', 'kathmandu', 'sagar', '9813098071', 1),
                                                                                                    (3, 'hero done', 'done', 'done', 'done', 3),
                                                                                                    (4, 'ram', 'ram', 'ram', 'ram', 5),
                                                                                                    (5, 'ram1', 'ram1', 'ram1', 'ram1', 5),
                                                                                                    (6, 'ram12', 'ram12', 'ram12', 'ram12', 5);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
                            `id` int(11) NOT NULL,
                            `name` varchar(255) NOT NULL,
                            `theory` float NOT NULL,
                            `practical` float NOT NULL,
                            `passMarks` float NOT NULL,
                            `fullMarks` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `theory`, `practical`, `passMarks`, `fullMarks`) VALUES
                                                                                           (1, 'Computer Science', 60, 40, 24, 100),
                                                                                           (2, 'science', 80, 20, 40, 100),
                                                                                           (4, 'Nepali', 100, 0, 40, 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `name` varchar(50) NOT NULL,
                         `password` varchar(100) NOT NULL,
                         `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `type`) VALUES
    (2, 'spadmin', '$2y$10$VCc4ifa2ow3Yi//sY0uQeOt0/uxv0uywwHLBuK/wNqdoocxAURg2.', 'SUPERADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examinations`
--
ALTER TABLE `examinations`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examinations_faculty_details`
--
ALTER TABLE `examinations_faculty_details`
    ADD KEY `fk_examination` (`examinationId`),
  ADD KEY `fk_faculty_id_examination` (`facultyDetailId`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_details`
--
ALTER TABLE `faculty_details`
    ADD PRIMARY KEY (`id`),
  ADD KEY `gradeId` (`gradeId`),
  ADD KEY `facultyId` (`facultyId`),
  ADD KEY `streamId` (`streamId`);

--
-- Indexes for table `faculty_detail_subjects`
--
ALTER TABLE `faculty_detail_subjects`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_faculty_detail_id` (`facultyDetailId`),
  ADD KEY `fk_subject_id` (`subjectId`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
    ADD PRIMARY KEY (`id`),
  ADD KEY `subjectId` (`subjectId`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
    ADD PRIMARY KEY (`id`),
  ADD KEY `examinationId` (`examinationId`),
  ADD KEY `facultyDetailId` (`facultyDetailId`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `result_marks`
--
ALTER TABLE `result_marks`
    ADD PRIMARY KEY (`resultId`,`marksId`),
  ADD KEY `marksId` (`marksId`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stream_faculty` (`facultyId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
    ADD PRIMARY KEY (`id`),
  ADD KEY `facultyDetailsId` (`facultyDetailsId`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examinations`
--
ALTER TABLE `examinations`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculty_details`
--
ALTER TABLE `faculty_details`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty_detail_subjects`
--
ALTER TABLE `faculty_detail_subjects`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `examinations_faculty_details`
--
ALTER TABLE `examinations_faculty_details`
    ADD CONSTRAINT `fk_examination` FOREIGN KEY (`examinationId`) REFERENCES `examinations` (`id`),
  ADD CONSTRAINT `fk_faculty_id_examination` FOREIGN KEY (`facultyDetailId`) REFERENCES `faculty_details` (`id`);

--
-- Constraints for table `faculty_details`
--
ALTER TABLE `faculty_details`
    ADD CONSTRAINT `faculty_details_ibfk_1` FOREIGN KEY (`gradeId`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `faculty_details_ibfk_2` FOREIGN KEY (`facultyId`) REFERENCES `faculty` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `faculty_details_ibfk_3` FOREIGN KEY (`streamId`) REFERENCES `streams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faculty_detail_subjects`
--
ALTER TABLE `faculty_detail_subjects`
    ADD CONSTRAINT `fk_faculty_detail_id` FOREIGN KEY (`facultyDetailId`) REFERENCES `faculty_details` (`id`),
  ADD CONSTRAINT `fk_subject_id` FOREIGN KEY (`subjectId`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
    ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`subjectId`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
    ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`examinationId`) REFERENCES `examinations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`facultyDetailId`) REFERENCES `faculty_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_ibfk_3` FOREIGN KEY (`studentId`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `result_marks`
--
ALTER TABLE `result_marks`
    ADD CONSTRAINT `result_marks_ibfk_1` FOREIGN KEY (`resultId`) REFERENCES `results` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `result_marks_ibfk_2` FOREIGN KEY (`marksId`) REFERENCES `marks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `streams`
--
ALTER TABLE `streams`
    ADD CONSTRAINT `fk_stream_faculty` FOREIGN KEY (`facultyId`) REFERENCES `faculty` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
    ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`facultyDetailsId`) REFERENCES `faculty_details` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
