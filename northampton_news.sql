-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql_db
-- Generation Time: Sep 24, 2022 at 07:22 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `northampton_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `categoryId` int NOT NULL,
  `publishDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `categoryId`, `publishDate`) VALUES
(2, 'PHP in 2022', 'It&#039;s the fourth time I&#039;m writing a yearly &quot;PHP in 20XX&quot; post, and I must admit I&#039;ve never been as excited about it as this year: we&#039;ve seen awesome new features added to PHP, with stuff like attributes, enums, promoted properties and fibers; and on top of that, the static analysis community is making great progress, my personal favourite feature is PhpStorm now supporting generics when writing code.\r\n\r\nExciting times are ahead, let&#039;s take a look at modern day PHP!\r\n\r\nI can&#039;t help but start this list with the newest PHP version, released just a little more than one month ago. My main projects are already being prepared to run on PHP 8.1 in production, which I must admit I&#039;m very excited about. You might not expect it from a minor release — there are no major breaking changes and only deprecation notices added — but PHP 8.1 brings some very cool features. here&#039;s my personal top three.', 3, '2022-09-24 18:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Sports'),
(2, 'Technology'),
(3, 'Science'),
(4, 'Weather'),
(5, 'Business'),
(6, 'Health');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `isAdmin`) VALUES
(1, 'Admin', 'Admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'TRUE'),
(2, 'John doe', 'john@gmails.com', '527bd5b5d689e2c32ae974c6229ff785', 'FALSE'),
(3, 'Will Smith', 'willSmith@gmails.com', '885b0228a4c2cac4868597d7910dde74', 'FALSE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
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
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
