-- phpMyAdmin SQL Dump
-- version 4.2.9.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2015 at 01:51 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `learn_labs`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` char(36) NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dump` text NOT NULL,
  `user_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `dump`, `user_id`) VALUES
('54fd4ce2-bf9c-4bc5-9786-01d46c4d5b83', 'What is Learn lab?', 'Learn lab is platform where student can know what interests them and can get excel in that field. It aims at providing all possible solutions to the education. Let student learn the way he likes.', '2015-03-09 07:33:54', '{"id":"54fd4ce2-bf9c-4bc5-9786-01d46c4d5b83","title":"What is Learn lab?","body":"Learn lab is platform where student can know what interests them and can get excel in that field. It aims at providing all possible solutions to the education. Let student learn the way he likes.","user_id":"54fbf59b-ac9c-4fde-a254-01d66c4d5b83"}', '54fbf59b-ac9c-4fde-a254-01d66c4d5b83');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` char(36) NOT NULL,
  `email` varchar(160) NOT NULL,
  `name` varchar(150) NOT NULL,
  `username` varchar(160) NOT NULL,
  `password` varchar(150) NOT NULL,
  `path` text,
  `path_dir` text,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `username`, `password`, `path`, `path_dir`, `is_active`, `created_at`) VALUES
('54fbf59b-ac9c-4fde-a254-01d66c4d5b83', 'lakhan.m.samani@gmail.com', 'Lakhan Samani', 'lakhan.m.samani@gmail.com', '82ba2bc432963547c52c2c3a5eb650a9aac13c6c', NULL, NULL, 1, '2015-03-08 07:09:15'),
('54fd225b-75e0-4c99-ab1f-01d46c4d5b83', 'lakhan.samani@actonate.com', 'lakhan', 'lakhan.samani@actonate.com', '82ba2bc432963547c52c2c3a5eb650a9aac13c6c', NULL, NULL, 0, '2015-03-09 04:32:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
