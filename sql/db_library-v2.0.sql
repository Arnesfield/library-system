-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2017 at 12:29 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `category`, `description`, `image_path`, `status`) VALUES
(1, 'The Book Thief', 'Markus Zusak', 'Historical Fiction', 'Some description for the Book Thief', 'upload/images/IMG_10-06-2017_1497109329.png', '2'),
(5, 'The Little Prince', 'Antoine de Saint-Exupery', 'Fable', 'Some description', 'upload/images/IMG_10-06-2017_1497109280.png', '1'),
(6, 'SomeBook', 'Some Author', 'Some Category', 'New desc', 'upload/images/IMG_11-06-2017_1497172207.png', '2'),
(7, 'SomeBook2', 'Some Author', 'Some Category', 'Desc', 'upload/images/IMG_11-06-2017_1497172308.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_borrowed` date DEFAULT NULL,
  `date_returned` date DEFAULT NULL,
  `date_due` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `book_id`, `date_borrowed`, `date_returned`, `date_due`) VALUES
(21, 2, 1, '2017-06-10', '2017-06-11', '2017-06-13'),
(22, 2, 5, '2017-06-01', '2017-06-11', '2017-06-04'),
(23, 7, 1, '2017-06-11', NULL, '2017-06-14'),
(24, 2, 6, '2017-06-11', '2017-06-11', '2017-06-14'),
(28, 2, 6, '2017-06-06', NULL, '2017-06-10'),
(29, 2, 7, '2017-06-11', '2017-06-11', '2017-06-14'),
(30, 2, 7, '2017-06-01', '2017-06-11', '2017-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `year_level` int(2) DEFAULT NULL,
  `student_no` varchar(255) DEFAULT NULL,
  `type` enum('admin','normal') NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `year_level`, `student_no`, `type`, `status`) VALUES
(1, 'user', '$2y$10$NsTf.3o2LhRjBrI21b0AS.B563rDcrAuOObcVXR6Bko8QPm2X1xY.', NULL, NULL, 'admin', '1'),
(2, 'rylee', '$2y$10$kloQ4FZpJ68GJycGR5GwIehpxqmNkEhYoQbVG/OqSc9aiWbUn2Ed6', 2, '201511169', 'normal', '1'),
(7, 'cayle', '$2y$10$Aoix6fjYrn3m6rBk4bGJlO75IboUFST1KuWOBBl3Vd7uh6IwIzJcK', 2, '201511168', 'normal', '1'),
(8, 'admin', '$2y$10$2Wgg2n9Yo8xCsQeos.Bj.eI3EAzWBkkL683fFKE8F1ewJJPf0b7Wa', NULL, NULL, 'admin', '1'),
(9, 'librarian', '$2y$10$op5x0bbF19HSaV3rdkkuq.cyRaW4qSwcLnV2xCYqwaTG0Kxclx6PW', NULL, NULL, 'admin', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
