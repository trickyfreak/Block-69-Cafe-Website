-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
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
-- Table structure for table `blogcontents`
--

CREATE TABLE `blogcontents` (
  `blogIDNum` int(5) NOT NULL,
  `blogTitle` text NOT NULL,
  `blogDate` text NOT NULL,
  `blogText` text NOT NULL,
  `blogImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogslider`
--

CREATE TABLE `blogslider` (
  `blogIDNum` int(5) NOT NULL,
  `blogSliderImage` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'GALLERY', 'Welcome to BLK 69 Cafe gallery! Step into a world of rich aromas, handcrafted beverages, and delectable treats. Browse our photos and get a feel for our warm ambience, friendly faces, and the perfect cup of coffee waiting for you.'),
(2, 'Calling all inspiring artists who love tote bags!', 'For singles, this is your chance to experience a one-of-a-kind self-care, indulge in brunch, and paint a tote bag. For those in a relationship, spice things up with this exciting new date idea!'),
(3, 'BLK 69 REELS', 'Follow our Reels/Tiktok for a peek at our delicious coffee creations, stunning latte art, and the cozy vibes you need for your next caffeine fix.');

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
(1, '<p>Clubhouse Sandwich Savor, served with crispy fries and a refreshing 12 oz iced tea.&nbsp;</p>', '<p>Upgrade your iced tea to 16 oz or any Block 69 beverage for just an additional 20! Don\'t forget, our Clubhouse Sandwich is also available solo without fries and drink!&nbsp;</p>', './Images/Clubhouse bundle design1.png'),
(2, '<p>A perfect blend of art, flavors, and fun! Which workshop would you like to join next?</p>', '<p>Embarked on a successful tote bag painting extravaganza today, fueled by the delightful combination of coffee and non-coffee, scrumptious food, and an abundance of creative joy.</p>', './Images/Workshop.jpg'),
(5, '<p>Keep an eye out on Block 69\'s latte.&nbsp;</p>', '<p>Embark on a through the heart of these vibrant cafes, where every cup holds a tale and each corner whispers cozy conversations.</p>', './Images/latte.jpg'),
(7, '<p>Indulge in the ultimate non-coffee delights that have won over crowds everywhere!</p>', '<p>Have you treated yourself to the refreshing allure of our Pink Paradise or the tantalizing blend of flavors in our Dark Berry? Sip, savor, and discover your new favorites today!</p>', './Images/dark berry design2.png'),
(8, '<p>Warning: Proceed with caution.</p>', '<p>These pastries have been known to cause uncrontrollable smiles and sudden cravings. Eat at your own risk!</p>', './Images/pastries (1).png'),
(12, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `itemprice`
--

CREATE TABLE `itemprice` (
  `price_id` int(255) NOT NULL,
  `price_image` varchar(255) NOT NULL,
  `price_name` varchar(255) NOT NULL,
  `price_type1` varchar(255) NOT NULL,
  `price_type2` varchar(255) NOT NULL,
  `price_quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itemprice`
--

INSERT INTO `itemprice` (`price_id`, `price_image`, `price_name`, `price_type1`, `price_type2`, `price_quantity`) VALUES
(1, 'BLK/SPANISH LATTE.png', 'Spanish Latte', '99', '149', 0),
(2, 'BLK/WHITE CHOCO LATTE.png', 'White Choco Latte', '99', '149', 0),
(3, 'BLK/MOCHA LATTE.png', 'Mocha Latte', '99', '149', 0),
(4, 'BLK/CINNAMON BROWN LATTE.png', 'Cinnamon Brown Latte', '89', '139', 0),
(5, 'BLK/CARAMEL VANILLA MACCHIATO.png', 'Caramel Vanilla Macchiato', '89', '139', 0),
(6, 'BLK/CAFE LATTE.png', 'Cafe Latte', '99', '149', 0),
(7, 'BLK/VANILLA CAFE LATTE.png', 'Vanilla Cafe Latte', '69', '119', 0),
(8, 'BLK/HAZELNUT CAFE LATTE.png', 'Hazelnut Cafe Latte', '69', '119', 0),
(9, 'BLK/SALTED CARAMEL LATTE.png', 'Salted Caramel Latte', '89', '139', 0),
(10, 'BLK/AMERICANO.png', 'Americano', '69', '139', 0),
(11, 'BLK/MIDNIGHT CHERRY.png', 'Midnight Cherry', '79', '119', 0),
(12, 'BLK/ESPRESSO CLOUD.png', 'Espresso Cloud', '69', '129', 0),
(13, 'BLK/HOT BREWED COFFEE.png', 'Hot Brewed Coffee', '69', '109', 0),
(14, 'BLK/COLD BREW.png', 'Cold Brew', '69', '109', 0),
(18, 'BLK/ICED COFFEE.png', 'Iced Coffee ', '69', '119', 0),
(19, 'BLK/VANILLA.png', 'Vanilla', '79', '129', 0),
(20, 'BLK/HAZELNUT.png', 'Hazelnut', '79', '129', 0),
(21, 'BLK/CARAMEL.png', 'Caramel', '79', '129', 0),
(22, 'BLK/HOT CHOCOLATE.png', 'Hot Chocolate', '79', '129', 0),
(23, 'BLK/TRIPLE CHOCOLATE.png', 'Triple Chocolate', '89', '139', 0),
(24, 'BLK/PINK PARADISE.png', 'Pink Paradise', '79', '129', 0),
(25, 'BLK/TROPICAL CLOUD.png', 'Tropical Cloud', '79', '129', 0),
(26, 'BLK/CARAMEL CANDY.png', 'Caramel Candy', '79', '129', 0),
(27, 'BLK/DARK BERRY.png', 'Dark Berry', '99', '149', 0),
(28, 'BLK/VANILLA MCDREAMY.png', 'Vanilla McDreamy', '79', '129', 0),
(29, 'BLK/CHAMOMILE TEA.png', 'Chamomile Tea', '69', '119', 0),
(30, 'BLK/PURPLE BLOOM.png', 'Purple Bloom', '69', '119', 0),
(31, 'BLK/LAVENDER TEA.png', 'Lavender Tea', '69', '119', 0),
(32, 'BLK/PURE GREEN TEA.png', 'Pure Green Tea', '69', '119', 0),
(33, 'BLK/ENGLISH BREAKFAST TEA.png', 'English Breakfast Tea', '69', '119', 0),
(34, 'BLK/WILD BERRY.png', 'Wild Berry', '69', '119', 0),
(35, 'BLK/HIBISCUS TEA.png', 'Hibiscus Tea', '79', '129', 0),
(36, 'BLK/STRAWBERRY AND MANGO.png', 'Strawberry And Mango', '99', '149', 0),
(37, 'BLK/MATCHA MANGO.png', 'Matcha Mango', '99', '149', 0),
(38, 'BLK/NUTTY GREEN TEA.png', 'Nutty Green Tea', '99', '149', 0),
(39, 'BLK/VANILLA KISSED MATCHA.png', 'Vanilla Kissed Matcha', '99', '149', 0),
(40, 'BLK/SPICY MATCHA.png', 'Spicy Matcha', '99', '149', 0),
(41, 'BLK/TITA MAGGIE\'S MATCHA.png', 'Tita Maggie\'s Matcha', '99', '149', 0),
(42, 'BLK/WHITEOUT MATCHA.png', 'Whiteout Matcha', '99', '149', 0),
(43, 'BLK/MATCHA LATTE.png', 'Matcha Latte', '99', '149', 0),
(44, 'BLK/DIRTY MATCHA.png', 'Dirty Matcha', '109', '159', 0),
(45, 'BLK/GREEN AND SWEET.png', 'Green And Sweet', '109', '159', 0),
(46, 'BLK/ICHIGO MATCHA.png', 'Ichigo Matcha', '109', '159', 0),
(47, 'BLK/MANGO JUICE.png', 'Mango Juice', '69', '99', 0),
(48, 'BLK/CUCUMBER JUICE.png', 'Cucumber Juice', '69', '99', 0),
(49, 'BLK/ICED TEA.png', 'Iced Tea', '69', '99', 0),
(50, 'BLK/COCA-COLA ZERO.png', 'Coca-Cola Zero', '0', '69', 0),
(51, 'BLK/REGULAR COCA-COLA.png', 'Regular Coca-Cola', '0', '69', 0),
(52, 'BLK/PEPSI.png', 'Pepsi', '0', '69', 0),
(53, 'BLK/POFFERTJES.png', 'Poffertjes', '120', '0', 0),
(54, 'BLK/FLUFFY PANCAKES.png', 'Fluffy Pancakes', '139', '169', 0),
(55, 'BLK/FRENCH TOAST.png', 'French Toast', '139', '0', 0),
(56, 'BLK/CLASSIC WAFFLES.png', 'Classic Waffles', '129', '0', 0),
(57, 'BLK/MARGA\'S FAVE.png', 'Marga\'s Fave', '250', '0', 0),
(58, 'BLK/BREAKFAST PLATTER.png', 'Breakfast Platter', '250', '0', 0),
(59, 'BLK/CHICKSILOG.png', 'Chicksilog', '180', '340', 0),
(60, 'BLK/TAPSILOG.png', 'Tapsilog', '180', '340', 0),
(61, 'BLK/LUNCHEONSILOG.png', 'Luncheonsilog', '180', '340', 0),
(62, 'BLK/BACSILOG.png', 'Bacsilog', '180', '340', 0),
(63, 'BLK/CARROT RICE.png', 'Carrot Rice', '35', '0', 0),
(64, 'BLK/PLAIN RICE.png', 'Plain Rice', '25', '0', 0),
(65, 'BLK/CHICKEN PESTO.png', 'Chicken Pesto', '260', '380', 0),
(66, 'BLK/GOURMET TUYO.png', 'Gourmet Tuyo', '245', '360', 0),
(67, 'BLK/AGLIO OLIO.png', 'Aglio Olio', '245', '360', 0),
(68, 'BLK/GARLIC BREAD.png', 'Garlic Bread', '35', '0', 0),
(69, 'BLK/CHICKEN POPPERS.png', 'Chicken Poppers', '95', '250', 0),
(70, 'BLK/CHICKEN TERIYAKI.png', 'Chicken Teriyaki', '100', '250', 0),
(71, 'BLK/PORK TERIYAKI.png', 'Pork Teriyaki', '160', '250', 0),
(72, 'BLK/CHICKEN KATSUDON.png', 'Chicken Katsudon', '110', '250', 0),
(73, 'BLK/PORK KATSUDON.png', 'Pork Katsudon', '170', '320', 0),
(74, 'BLK/FRIES.png', 'Fries', '99', '250', 0),
(75, 'BLK/FRIES BEFORE GUYS.png', 'Fries Before Guys', '0', '250', 0),
(76, 'BLK/MOZZARELLA BALLS.png', 'Mozzarella Balls', '0', '115', 0),
(77, 'BLK/CHICKEN BALLS.png', 'Chicken Balls', '190', '350', 0),
(78, 'BLK/CHICKEN BALLS MIX.png', 'Chicken Balls Mix', '0', '250', 0),
(79, 'BLK/CALAMARI.png', 'Calamari', '0', '250', 0),
(80, 'BLK/CALAMARI MIX.png', 'Calamari Mix', '0', '250', 0),
(81, 'BLK/HASHBROWN.png', 'Hashbrown', '65', '0', 0),
(82, 'BLK/CLUBHOUSE SANDWICH.png', 'Clubhouse Sandwich', '120', '200', 0),
(84, 'BLK/PAIN AU CHOCOLAT.png', 'Pain Au Chocolat', '90', '150', 0),
(85, 'BLK/BUTTER CROISSANT.png', 'Butter Croissant', '90', '150', 0),
(86, 'BLK/CROISSANWICH.png', 'Croissanwich', '120', '190', 0),
(87, 'BLK/PLAIN.png', 'Plain', '100', '140', 0),
(88, 'BLK/STRAWBERRY FIELD.png', 'Strawberry Field', '120', '150', 0),
(89, 'BLK/MANGO TANGO.png', 'Mango Tango', '120', '150', 0),
(90, 'BLK/CHOCO TRUFFLE.png', 'Choco Truffle', '120', '150', 0);

-- --------------------------------------------------------

--
-- Table structure for table `packagesection`
--

CREATE TABLE `packagesection` (
  `packageid` int(11) NOT NULL,
  `packagetitle` varchar(1500) NOT NULL,
  `packagedescription` varchar(1500) NOT NULL,
  `packageimage` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packagesection`
--

INSERT INTO `menucontent` (`product_id`, `product_image`, `product_name`, `product_subname`) VALUES
(1, 'BLK/VANILLA CAFE LATTE.png', 'Espresso', 'Iced/Hot'),
(2, 'BLK/COLD BREW.png', 'Brew', 'Iced/Hot'),
(3, 'BLK/PINK PARADISE.png', 'Non Coffee And Tea', ''),
(4, 'BLK/MATCHA MANGO.png', 'Matcha', ''),
(5, 'BLK/NONE.png', 'Beverages', ''),
(6, 'BLK/FRENCH TOAST.png', 'All Day Breakfast', ''),
(7, 'BLK/NONE.png', 'Silog', ''),
(8, 'BLK/AGLIO OLIO.png', 'Pasta', ''),
(9, 'BLK/CHICKEN KATSUDON.png', 'Block 69 Bargain Bites', ''),
(10, 'BLK/NONE.png', 'Sides And Nibbles', ''),
(11, 'BLK/CLUBHOUSE SANDWICH.png', 'Carbs And Caffeine', '');

-- --------------------------------------------------------

--
-- Table structure for table `menuitems`
--

CREATE TABLE `menuitems` (
  `item_id` int(255) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_subname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menuitems`
--

INSERT INTO `menuitems` (`item_id`, `item_image`, `item_name`, `item_subname`) VALUES
(1, 'BLK/SPANISH LATTE.png', 'Spanish Latte', ''),
(2, 'BLK/WHITE CHOCO LATTE.png', 'White Choco Latte', ''),
(3, 'BLK/MOCHA LATTE.png', 'Mocha Latte', ''),
(4, 'BLK/CINNAMON BROWN LATTE.png', 'Cinnamon Brown Latte', ''),
(5, 'BLK/CARAMEL VANILLA MACCHIATO.png', 'Caramel Vanilla Macchiato', ''),
(6, 'BLK/CAFE LATTE.png', 'Cafe Latte', ''),
(7, 'BLK/VANILLA CAFE LATTE.png', 'Vanilla Cafe Latte', ''),
(8, 'BLK/HAZELNUT CAFE LATTE.png', 'Hazelnut Cafe Latte', ''),
(9, 'BLK/SALTED CARAMEL LATTE.png', 'Salted Caramel Latte', ''),
(10, 'BLK/AMERICANO.png', 'Americano', ''),
(11, 'BLK/MIDNIGHT CHERRY.png', 'Midnight Cherry', ''),
(12, 'BLK/ESPRESSO CLOUD.png', 'Espresso Cloud', ''),
(13, 'BLK/HOT BREWED COFFEE.png', 'Hot Brewed Coffee', ''),
(14, 'BLK/COLD BREW.png', 'Cold Brew', ''),
(15, 'BLK/ICED COFFEE.png', 'Iced Coffee ', ''),
(16, 'BLK/VANILLA.png', 'Vanilla', ''),
(17, 'BLK/HAZELNUT.png', 'Hazelnut', ''),
(18, 'BLK/CARAMEL.png', 'CARAMEL', ''),
(19, 'BLK/HOT CHOCOLATE.png', 'Hot Chocolate', ''),
(20, 'BLK/TRIPLE CHOCOLATE.png', 'Triple Chocolate', ''),
(21, 'BLK/PINK PARADISE.png', 'Pink Paradise', ''),
(22, 'BLK/TROPICAL CLOUD.png', 'Tropical Cloud', ''),
(23, 'BLK/CARAMEL CANDY.png', 'Caramel Candy', ''),
(24, 'BLK/DARK BERRY.png', 'Dark Berry', ''),
(25, 'BLK/VANILLA MCDREAMY.png', 'Vanilla McDreamy', ''),
(26, 'BLK/CHAMOMILE TEA.png', 'Chamomile Tea', ''),
(27, 'BLK/PURPLE BLOOM.png', 'Purple Bloom', ''),
(28, 'BLK/LAVENDER TEA.png', 'Lavender Tea', ''),
(29, 'BLK/PURE GREEN TEA.png', 'Pure Green Tea', ''),
(30, 'BLK/ENGLISH BREAKFAST TEA.png', 'English Breakfast Tea', ''),
(31, 'BLK/WILD BERRY.png', 'Wild Berry', ''),
(32, 'BLK/HIBISCUS TEA.png', 'Hibiscus Tea', ''),
(33, 'BLK/STRAWBERRY AND MANGO.png', 'Strawberry And Mango', ''),
(34, 'BLK/MATCHA MANGO.png', 'Matcha Mango', ''),
(35, 'BLK/NUTTY GREEN TEA.png', 'Nutty Green Tea', ''),
(36, 'BLK/VANILLA KISSED MATCHA.png', 'Vanilla Kissed Matcha', ''),
(37, 'BLK/SPICY MATCHA.png', 'Spicy Matcha', ''),
(38, 'BLK/TITA MAGGIE\'S MATCHA.png', 'Tita Maggie\'s Matcha', ''),
(39, 'BLK/WHITEOUT MATCHA.png', 'Whiteout Matcha\r\n', ''),
(40, 'BLK/MATCHA LATTE.png', 'Matcha Latte', ''),
(41, 'BLK/DIRTY MATCHA.png', 'Dirty Matcha', ''),
(42, 'BLK/GREEN AND SWEET.png', 'Green And Sweet', ''),
(43, 'ICHIGO MATCHA', 'Ichigo Matcha', ''),
(44, 'BLK/MANGO JUICE.png', 'Mango Juice', ''),
(45, 'BLK/CUCUMBER JUICE.png', 'Cucumber Juice', ''),
(46, 'BLK/ICED TEA.png', 'Iced Tea', ''),
(47, 'BLK/COCA-COLA ZERO.png', 'Coca-Cola Zero', ''),
(48, 'BLK/REGULAR COCA-COLA.png', 'Regular Coca-Cola', ''),
(49, 'BLK/PEPSI.png', 'Pepsi', ''),
(50, 'BLK/POFFERTJES.png', 'Poffertjes', ''),
(51, 'BLK/FLUFFY PANCAKES.png', 'Fluffy Pancakes', ''),
(52, 'BLK/FRENCH TOAST.png', 'French Toast', ''),
(53, 'BLK/CLASSIC WAFFLES.png', 'Classic Waffles', ''),
(54, 'BLK/MARGA\'S FAVE.png', 'Marga\'s Fave', ''),
(55, 'BLK/BREAKFAST PLATTER.png', 'Breakfast Platter', ''),
(56, 'BLK/CHICKSILOG.png', 'Chicksilog', ''),
(57, 'BLK/TAPSILOG.png', 'Tapsilog', ''),
(58, 'BLK/LUNCHEONSILOG.png', 'Luncheonsilog', ''),
(59, 'BLK/BACSILOG.png', 'Bacsilog', ''),
(60, 'BLK/CARROT RICE.png', 'Carrot Rice', ''),
(61, 'BLK/PLAIN RICE.png', 'Plain Rice', ''),
(62, 'BLK/CHICKEN PESTO.png', 'Chicken Pesto', ''),
(63, 'BLK/GOURMET TUYO.png', 'Gourmet Tuyo', ''),
(64, 'BLK/AGLIO OLIO.png', 'Aglio Olio', ''),
(65, 'BLK/GARLIC BREAD.png', 'Garlic Bread', ''),
(66, 'BLK/CHICKEN POPPERS.png', 'Chicken Poppers', ''),
(67, 'BLK/CHICKEN TERIYAKI.png', 'Chicken Teriyaki', ''),
(68, 'BLK/PORK TERIYAKI.png', 'Pork Teriyaki', ''),
(69, 'BLK/CHICKEN KATSUDON.png', 'Chicken Katsudon', ''),
(70, 'BLK/PORK KATSUDON.png', 'Pork Katsudon', ''),
(71, 'BLK/FRIES.png', 'Fries', ''),
(72, 'BLK/FRIES BEFORE GUYS.png', 'Fries Before Guys', ''),
(73, 'BLK/MOZZARELLA BALLS.png', 'Mozzarella Balls', ''),
(74, 'BLK/NACHOS OVERLOAD.png', 'Nachos Overload', ''),
(75, 'BLK/CHICKEN BALLS.png', 'Chicken Balls', ''),
(76, 'BLK/CHICKEN BALLS MIX.png', 'Chicken Balls Mix', ''),
(77, 'BLK/CALAMARI.png', 'Calamari', ''),
(78, 'BLK/CALAMARI MIX.png', 'Calamari Mix', ''),
(79, 'BLK/HASHBROWN.png', 'Hashbrown', ''),
(80, 'BLK/CLUBHOUSE SANDWICH.png', 'Clubhouse Sandwich', ''),
(81, 'BLK/PAIN AU CHOCOLAT.png', 'Pain Au Chocolat', ''),
(82, 'BLK/BUTTER CROISSANT.png', 'Butter Croissant', ''),
(83, 'BLK/CROISSANWICH.png', 'Croissanwich', ''),
(84, 'BLK/PLAIN.png', 'Plain', ''),
(85, 'BLK/STRAWBERRY FIELD.png', 'Strawberry Field', ''),
(86, 'BLK/MANGO TANGO.png', 'Mango Tango', ''),
(87, 'BLK/CHOCO TRUFFLE.png', 'Choco Truffle', '');

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

INSERT INTO `useraccounts` (`email`, `status`, `username`, `password`, `token`) VALUES
('meinardsantoss@gmail.com', 'admin', 'admin', 'admin123', '8db91abafce16bb01ade0bedb9fbe692'),
('eric123@gmail.com', 'customer', 'eric', 'hehehe', NULL),
('louigiecads143@gmail.com', 'customer', 'louie', 'louie123', '7ee3c0a3286f4a80e257b9740230d7c4'),
('msantos.k12147976@umak.edu.ph', 'customer', 'meinard', 'umak', '09438bc6dfd88b40ebfae5159ea11cc1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogcontents`
--
ALTER TABLE `blogcontents`
  ADD PRIMARY KEY (`blogIDNum`);

--
-- Indexes for table `blogslider`
--
ALTER TABLE `blogslider`
  ADD PRIMARY KEY (`blogIDNum`);

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
-- Indexes for table `itemprice`
--
ALTER TABLE `itemprice`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `packagesection`
--
ALTER TABLE `packagesection`
  ADD PRIMARY KEY (`packageid`);

--
-- Indexes for table `servicescontent`
--
ALTER TABLE `servicescontent`
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
-- AUTO_INCREMENT for table `blogcontents`
--
ALTER TABLE `blogcontents`
  MODIFY `blogIDNum` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogslider`
--
ALTER TABLE `blogslider`
  MODIFY `blogIDNum` int(5) NOT NULL AUTO_INCREMENT;

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
<<<<<<< HEAD
  MODIFY `content_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `packagesection`
--
ALTER TABLE `packagesection`
  MODIFY `packageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `itemprice`
--
ALTER TABLE `galleryvideo`
  ADD CONSTRAINT `videos_section` FOREIGN KEY (`sectionID`) REFERENCES `gallerysection` (`sectionID`) ON DELETE CASCADE ON UPDATE CASCADE;
=======
  MODIFY `content_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menucontent`
--
ALTER TABLE `menucontent`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
>>>>>>> origin/test
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
