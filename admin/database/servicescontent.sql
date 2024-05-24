-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 06:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `block69cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `servicescontent`
--

CREATE TABLE `servicescontent` (
  `content_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content_caption` varchar(255) NOT NULL,
  `content_images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicescontent`
--

INSERT INTO `servicescontent` (`content_id`, `event_name`, `content_title`, `content_caption`, `content_images`) VALUES
(23, '<p>birthdays</p>', '<p>Eli\'s 9th Birthday at Pateros, Metro Manila</p>', '<p>140 cups served</p>', './Events Images/0-1-1716565340.jpg,./Events Images/1-1716565340.jpg,./Events Images/2-1716565340.jpg,./Events Images/3-1716565340.jpg,./Events Images/4-1716565340.jpg'),
(24, '<p>corporate events</p>', '<p>JAAM Foodcorp Christmas Party at Episode Bar + Kitchen</p>', '<p>150 cups served</p>', './Events Images/9-1716565543.png,./Events Images/10-1716565543.png,./Events Images/11-1716565543.png,./Events Images/13-1716565543.png,./Events Images/14-1716565543.png'),
(25, '<p>community activity</p>', '<p>The Generics Pharmacy Medical Mission</p>', '<p>150 cups served</p>', './Events Images/15-1716565984.png,./Events Images/17-1716565984.png,./Events Images/18-1716565984.png,./Events Images/19-1716565984.png,./Events Images/20-1716565984.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `servicescontent`
--
ALTER TABLE `servicescontent`
  ADD PRIMARY KEY (`content_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `servicescontent`
--
ALTER TABLE `servicescontent`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
