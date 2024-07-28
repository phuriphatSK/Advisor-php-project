-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2023 at 06:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advisor-g5`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` varchar(7) NOT NULL,
  `c_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`) VALUES
('344-201', 'ชุดวิชาการคำนวณทางวิทยาการคอมพิวเตอร์'),
('344-221', 'สถาปัตยกรรมและองค์ประกอบคอมพิวเตอร์'),
('344-222', 'ระบบปฏิบัติการ'),
('344-223', 'พื้นฐานทางความปลอดภัยคอมพิวเตอร์'),
('344-341', 'วิศวกรรมซอฟต์แวร์');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `r_id` int(11) NOT NULL,
  `s_id` varchar(10) NOT NULL,
  `c_id` varchar(7) NOT NULL,
  `r_year` varchar(6) NOT NULL,
  `r_grade` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`r_id`, `s_id`, `c_id`, `r_year`, `r_grade`) VALUES
(1, '6410210031', '344-201', '1/2565', 'A'),
(2, '6410210031', '344-221', '1/2565', 'C+'),
(3, '6410210031', '344-222', '1/2565', 'C'),
(4, '6410210031', '344-223', '1/2565', 'B'),
(5, '6410210031', '344-341', '1/2566', 'A'),
(6, '6410210128', '344-201', '1/2565', 'A'),
(7, '6410210128', '344-221', '1/2565', 'B'),
(8, '6410210128', '344-222', '1/2565', 'C+'),
(9, '6410210128', '344-223', '1/2565', 'B'),
(10, '6410210128', '344-341', '1/2566', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` varchar(10) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_surname` varchar(200) NOT NULL,
  `s_gender` varchar(10) NOT NULL,
  `s_course` varchar(100) NOT NULL,
  `s_password` varchar(30) NOT NULL,
  `t_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `s_surname`, `s_gender`, `s_course`, `s_password`, `t_id`) VALUES
('6410210031', 'กิตติธัช', 'ชูบัวทอง', 'ชาย', 'วิทยาการคอมพิวเตอร์', '15555', 7),
('6410210128', 'ธนพล', 'เชาว์ทวี', 'ชาย', 'วิทยาการคอมพิวเตอร์', '192168', 7);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(100) NOT NULL,
  `t_surname` varchar(200) NOT NULL,
  `t_gender` varchar(10) NOT NULL,
  `t_course` varchar(100) NOT NULL,
  `t_rank` varchar(100) NOT NULL,
  `t_username` varchar(100) NOT NULL,
  `t_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_name`, `t_surname`, `t_gender`, `t_course`, `t_rank`, `t_username`, `t_password`) VALUES
(1, 'สุภาภรณ์', 'กานต์สมเกียรติ', 'หญิง', 'วิทยาการคอมพิวเตอร์', 'ผู้ช่วยศาสตราจารย์', 't1234', 'abcde'),
(2, 'จรรยา ', 'สายนุ้ย', 'หญิง', 'วิทยาการคอมพิวเตอร์', 'ผู้ช่วยศาสตราจารย์', 'jy123', '123123'),
(3, 'สุนิดา ', 'รัตโนทยานนท์', 'หญิง', 'วิทยาการคอมพิวเตอร์', 'อาจารย์', 'sd456', '456456'),
(4, 'กิตติศักดิ์ ', 'ชุมพงศ์', 'ชาย', 'สถิติ', 'ผู้ช่วยศาสตราจารย์', 'ks159', '159159'),
(5, 'ศุภศิษฏ์ ', 'กาจกำแหง', 'ชาย', 'เทคโนโลยีสารสนเทศและการสื่อสาร', 'อาจารย์', 'ss113', '113113'),
(6, 'กำธร ', 'ไชยลึก', 'ชาย', 'คณิตศาสตร์', 'รองศาสตราจารย์', 'kt145', '145145'),
(7, 'สาธิต', 'อินทจักร์', 'ชาย', 'วิทยาการคอมพิวเตอร์', 'รองศาสตราจารย์', 'st099', '099099');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `fk_c_id` (`c_id`),
  ADD KEY `fk_s_id` (`s_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `fk_t_id` (`t_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `fk_c_id` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_s_id` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_t_id` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
