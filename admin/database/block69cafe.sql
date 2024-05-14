-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 07:54 PM
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
-- Table structure for table `homecontent`
--

CREATE TABLE `homecontent` (
  `content_id` int(100) NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content_caption` varchar(255) NOT NULL,
  `content_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homecontent`
--

INSERT INTO `homecontent` (`content_id`, `content_title`, `content_caption`, `content_image`) VALUES
(1, '<p>Clubhouse Sandwich Savor, served with crispy fries and a refreshing 12 oz iced tea.</p>', '<p>Upgrade your iced tea to 16 oz or any Block 69 beverage for just an additional 20! Don\'t forget, our Clubhouse Sandwich is also available solo without fries and drink!</p>', './Images/Clubhouse bundle design1.png'),
(2, '<p>A perfect blend of art, flavors, and fun! Which workshop would you like to join next?</p>', '<p>Embarked on a successful tote bag painting extravaganza today, fueled by the delightful combination of coffee and non-coffee, scrumptious food, and an abundance of creative joy.</p>', './Images/Workshop.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `email` varchar(50) NOT NULL,
  `status` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`email`, `status`, `username`, `password`) VALUES
('meinardsantoss@gmail.com', 'admin', 'admin', 'admin123'),
('eric123@gmail.com', 'customer', 'eric', 'hehehe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `homecontent`
--
ALTER TABLE `homecontent`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `homecontent`
--
ALTER TABLE `homecontent`
  MODIFY `content_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
