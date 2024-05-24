-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 10:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `galleryimage`
--

CREATE TABLE `galleryimage` (
  `img_ID` int(11) NOT NULL,
  `img` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galleryimage`
--

INSERT INTO `galleryimage` (`img_ID`, `img`) VALUES
(1, './galleryImages/galleryHome.png'),
(2, './galleryImages/section2Image1.png'),
(3, './galleryImages/section2Image2.png'),
(4, './galleryImages/section2Image3.jpeg'),
(5, './galleryImages/section2Image4.jpeg'),
(6, './galleryImages/section3Image1.jpeg'),
(7, './galleryImages/section3Image2.jpeg'),
(8, './galleryImages/section3Image3.jpeg'),
(9, './galleryImages/section3Image4.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `gallerysection`
--

CREATE TABLE `gallerysection` (
  `sectionID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallerysection`
--

INSERT INTO `gallerysection` (`sectionID`, `title`, `description`) VALUES
(1, 'GALLERY', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(2, 'Calling all inspiring artists who love tote bags!', 'For singles, this is your chance to experience a one-of-a-kind self-care, indulge in brunch, and paint a tote bag. For those in a relationship, spice things up with this exciting new date idea!'),
(3, 'BLK 69 REELS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');

-- --------------------------------------------------------

--
-- Table structure for table `galleryvideo`
--

CREATE TABLE `galleryvideo` (
  `vidID` int(11) NOT NULL,
  `video` varchar(1500) NOT NULL,
  `sectionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galleryvideo`
--

INSERT INTO `galleryvideo` (`vidID`, `video`, `sectionID`) VALUES
(1, './galleryImages/BLKvideo.mp4', 2),
(2, './galleryImages/video1.mp4', 3),
(3, './galleryImages/video2.mp4', 3),
(4, './galleryImages/video3.mp4', 3),
(5, './galleryImages/video4.mp4', 3),
(6, './galleryImages/video5.mp4', 3),
(7, './galleryImages/video6.mp4', 3);

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
(1, '<p>aaron</p>', '<p>Upgrade your iced tea to 16 oz or any Block 69 beverage for just an additional 20! Don\'t forget, our Clubhouse Sandwich is also available solo without fries and drink!&nbsp;</p>', './Images/Clubhouse bundle design1.png'),
(2, '<p>A perfect blend of art, flavors, and fun! Which workshop would you like to join next?</p>', '<p>Embarked on a successful tote bag painting extravaganza today, fueled by the delightful combination of coffee and non-coffee, scrumptious food, and an abundance of creative joy.</p>', './Images/Workshop.jpg'),
(5, '<p>Keep an eye out on Block 69\'s latte.&nbsp;</p>', '<p>Embark on a through the heart of these vibrant cafes, where every cup holds a tale and each corner whispers cozy conversations.</p>', './Images/latte.jpg'),
(7, '<p>Indulge in the ultimate non-coffee delights that have won over crowds everywhere!</p>', '<p>Have you treated yourself to the refreshing allure of our Pink Paradise or the tantalizing blend of flavors in our Dark Berry? Sip, savor, and discover your new favorites today!</p>', './Images/dark berry design2.png'),
(8, '<p>Warning: Proceed with caution.</p>', '<p>These pastries have been known to cause uncrontrollable smiles and sudden cravings. Eat at your own risk!</p>', './Images/pastries (1).png');

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
-- Indexes for table `galleryimage`
--
ALTER TABLE `galleryimage`
  ADD PRIMARY KEY (`img_ID`);

--
-- Indexes for table `gallerysection`
--
ALTER TABLE `gallerysection`
  ADD PRIMARY KEY (`sectionID`);

--
-- Indexes for table `galleryvideo`
--
ALTER TABLE `galleryvideo`
  ADD PRIMARY KEY (`vidID`),
  ADD KEY `videos_section` (`sectionID`);

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
-- AUTO_INCREMENT for table `galleryimage`
--
ALTER TABLE `galleryimage`
  MODIFY `img_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gallerysection`
--
ALTER TABLE `gallerysection`
  MODIFY `sectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galleryvideo`
--
ALTER TABLE `galleryvideo`
  MODIFY `vidID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `homecontent`
--
ALTER TABLE `homecontent`
  MODIFY `content_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galleryvideo`
--
ALTER TABLE `galleryvideo`
  ADD CONSTRAINT `videos_section` FOREIGN KEY (`sectionID`) REFERENCES `gallerysection` (`sectionID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
