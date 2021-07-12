-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2016 at 01:53 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hibiscus`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE IF NOT EXISTS `cart_detail` (
  `cart_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL DEFAULT '1',
  `total_price` float NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '7',
  `date_closed` int(5) DEFAULT NULL,
  `description1` int(10) DEFAULT NULL,
  `description2` int(10) DEFAULT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `user_id` (`user_id`,`item_id`,`status`),
  KEY `item_id` (`item_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`cart_id`, `user_id`, `item_id`, `quantity`, `total_price`, `date_added`, `status`, `date_closed`, `description1`, `description2`) VALUES
(2, 1, 1, 1, 720, '2016-06-28 10:57:07', 8, NULL, NULL, NULL),
(3, 1, 12, 1, 90, '2016-06-28 10:57:25', 8, NULL, NULL, NULL),
(4, 1, 12, 1, 90, '2016-06-28 11:06:17', 8, NULL, NULL, NULL),
(6, 1, 1, 1, 720, '2016-06-28 11:07:45', 8, NULL, NULL, NULL),
(7, 1, 12, 1, 90, '2016-06-28 11:08:02', 8, NULL, NULL, NULL),
(8, 2, 15, 1, 890, '2016-06-29 06:00:07', 8, NULL, NULL, NULL),
(9, 2, 2, 1, 630, '2016-06-29 06:08:44', 8, NULL, NULL, NULL),
(10, 2, 12, 1, 90, '2016-06-30 05:44:38', 8, NULL, NULL, NULL),
(11, 2, 21, 1, 810, '2016-06-30 05:47:09', 8, NULL, NULL, NULL),
(12, 2, 4, 1, 495, '2016-06-30 05:52:55', 8, NULL, NULL, NULL),
(13, 2, 37, 1, 1215, '2016-06-30 10:47:32', 8, NULL, NULL, NULL),
(14, 2, 12, 1, 90, '2016-06-30 11:16:50', 8, NULL, NULL, NULL),
(15, 2, 2, 3, 1890, '2016-06-30 11:26:35', 8, NULL, NULL, NULL),
(16, 1, 15, 1, 890, '2016-06-30 11:34:59', 8, NULL, NULL, NULL),
(17, 1, 2, 1, 630, '2016-06-30 11:35:55', 8, NULL, NULL, NULL),
(18, 2, 2, 2, 1260, '2016-07-01 02:37:48', 8, NULL, NULL, NULL),
(19, 2, 21, 2, 1620, '2016-07-01 02:40:14', 8, NULL, NULL, NULL),
(20, 2, 20, 2, 1386, '2016-07-01 02:42:04', 8, NULL, NULL, NULL),
(21, 2, 49, 1, 1275, '2016-07-01 02:44:23', 8, NULL, NULL, NULL),
(22, 2, 2, 1, 630, '2016-07-01 02:47:34', 8, NULL, NULL, NULL),
(23, 2, 40, 1, 120, '2016-07-01 03:01:55', 8, NULL, NULL, NULL),
(24, 2, 34, 1, 976, '2016-07-01 05:51:37', 8, NULL, NULL, NULL),
(25, 2, 38, 1, 405, '2016-07-01 05:53:19', 8, NULL, NULL, NULL),
(26, 2, 32, 1, 1080, '2016-07-01 05:56:03', 8, NULL, NULL, NULL),
(27, 2, 35, 1, 1300, '2016-07-01 08:04:41', 8, NULL, NULL, NULL),
(28, 1, 42, 1, 95, '2016-07-04 05:09:37', 8, NULL, NULL, NULL),
(29, 1, 44, 1, 1440, '2016-07-04 05:18:51', 8, NULL, NULL, NULL),
(30, 1, 22, 1, 828, '2016-07-04 05:25:10', 8, NULL, NULL, NULL),
(31, 1, 1, 2, 1440, '2016-07-04 05:26:57', 7, NULL, NULL, NULL),
(33, 2, 5, 1, 600, '2016-07-04 05:56:20', 8, NULL, NULL, NULL),
(35, 2, 49, 1, 1275, '2016-07-04 07:03:26', 8, NULL, NULL, NULL),
(39, 4, 55, 1, 810, '2016-07-04 08:45:02', 7, NULL, NULL, NULL),
(40, 4, 58, 1, 470, '2016-07-04 08:45:38', 7, NULL, NULL, NULL),
(41, 4, 2, 1, 6300, '2016-07-04 08:49:01', 7, NULL, NULL, NULL),
(44, 4, 16, 1, 395, '2016-07-04 10:03:33', 7, NULL, NULL, NULL),
(45, 4, 56, 1, 1080, '2016-07-04 10:24:46', 7, NULL, NULL, NULL),
(46, 4, 29, 1, 120, '2016-07-04 10:44:56', 7, NULL, NULL, NULL),
(48, 7, 6, 1, 684, '2016-07-05 05:45:37', 7, NULL, NULL, NULL),
(49, 8, 1, 1, 720, '2016-07-05 11:45:21', 7, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) NOT NULL,
  `cat_image` varchar(100) NOT NULL,
  `status_id` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `cat_image`, `status_id`) VALUES
(1, 'Clothing', '1.jpg', 1),
(2, 'Accessories', '2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `color_id` int(10) NOT NULL AUTO_INCREMENT,
  `color` varchar(45) NOT NULL,
  `status_id` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color`, `status_id`) VALUES
(1, 'Red', 2),
(2, 'Blue', 2),
(3, 'Green', 1),
(4, 'Yellow ', 1),
(5, 'White', 1),
(6, 'Pink', 1),
(7, 'Grey', 1),
(8, 'Gold', 1),
(9, 'Silver', 1),
(10, 'Black', 1),
(11, 'dfgdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_number` varchar(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `itemsubcat_id` int(10) NOT NULL,
  `color_id` int(10) NOT NULL,
  `size_id` int(10) NOT NULL,
  `actual_price` int(10) NOT NULL,
  `discount` int(10) DEFAULT NULL,
  `discounted_price` int(11) DEFAULT NULL,
  `quantity` int(10) NOT NULL,
  `min_quantity` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(45) NOT NULL,
  `status_id` int(10) NOT NULL DEFAULT '1',
  `desc1` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `product` (`product_number`,`itemsubcat_id`,`color_id`,`size_id`),
  KEY `FKitem566115` (`color_id`),
  KEY `FKitem670537` (`status_id`),
  KEY `FKitem135633` (`itemsubcat_id`),
  KEY `FKitem109511` (`size_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `product_number`, `product_name`, `itemsubcat_id`, `color_id`, `size_id`, `actual_price`, `discount`, `discounted_price`, `quantity`, `min_quantity`, `description`, `date_added`, `image`, `status_id`, `desc1`) VALUES
(1, 'PK001', 'kurties1', 1, 4, 3, 800, 10, 720, 2, 3, 'GREAT DRESS', '2016-07-05 11:47:41', '20160702072242.jpg', 1, NULL),
(2, 'PK002', 'cotton kurthis2', 1, 2, 6, 7000, 10, 6300, 1, 0, 'cotton kurthis2', '2016-07-05 11:47:41', '20160702072054.jpg', 1, NULL),
(4, 'PK003', 'kurties3', 1, 1, 3, 900, 45, 495, 1, 0, 'Kurthis  cotton3', '2016-07-05 11:47:41', '20160622085715.jpg', 1, NULL),
(5, 'PK004', 'kurties4', 13, 3, 2, 600, 0, 600, 0, 0, 'Kurthis silk4', '2016-07-05 11:47:41', '20160622085822.jpg', 1, NULL),
(6, 'PK005', 'kurties5', 13, 4, 3, 900, 24, 684, 1, 0, 'Kurthis silk5', '2016-07-05 11:47:41', '20160622085941.jpg', 1, NULL),
(7, 'PK006', 'kurties6', 13, 5, 5, 600, 25, 450, 1, 0, 'Kurthis silk6', '2016-07-05 11:47:41', '20160622090036.jpg', 1, NULL),
(8, 'PK007', 'kurties7', 14, 6, 3, 700, 25, 525, 1, 0, 'Kurthis silk7', '2016-07-05 11:47:41', '20160622090218.jpg', 1, NULL),
(9, 'PK008', 'kurties8', 14, 10, 4, 990, 25, 743, 1, 0, 'Kurthis Chiffon8', '2016-07-05 11:47:41', '20160622090451.jpeg', 1, NULL),
(10, 'PK009', 'Kurtis chifon9', 14, 1, 2, 900, 20, 720, 1, 0, 'Kurthis Chiffon9', '2016-07-05 11:50:51', '20160622090647.jpg', 1, NULL),
(11, 'PK010', 'Kurtis chifon10', 14, 2, 6, 450, 35, 293, 1, 0, 'Kurthis Chiffon10', '2016-07-05 11:51:02', '20160622090750.jpg', 1, NULL),
(12, 'PK011', 'Salwar Cotton11', 2, 1, 2, 100, 10, 90, 1, 0, 'Salwar Cotton11', '2016-07-05 11:49:30', '20160622091637.jpg', 1, NULL),
(13, 'PK012', 'Salwar Cotton12', 1, 2, 4, 90, 0, 90, 1, 0, 'Salwar Cotton12', '2016-07-05 11:49:19', '20160622092241.jpg', 1, NULL),
(14, 'PK013', 'Salwar Cotton 13', 13, 3, 3, 1000, 35, 650, 1, 0, 'Salwar Cotton13', '2016-07-05 11:50:31', '20160622091828.jpg', 1, NULL),
(15, 'PK014', 'salwar1', 15, 3, 3, 890, 0, 890, 1, 0, 'Salwar Silk14', '2016-07-05 11:47:41', '20160622092047.jpg', 1, NULL),
(16, 'PK015', 'salwar2', 15, 7, 3, 987, 60, 395, 1, 0, 'Salwar Silk15', '2016-07-05 11:47:41', '20160622092241.jpg', 1, NULL),
(17, 'PK016', 'salwar3', 15, 10, 5, 1020, 35, 663, 1, 0, 'Salwar silk16', '2016-07-05 11:47:41', '20160622092453.jpg', 1, NULL),
(18, 'PK017', 'salwar4', 15, 4, 3, 895, 10, 806, 1, 0, 'Salwar Silk17', '2016-07-05 11:47:41', '20160622093407.jpg', 1, NULL),
(19, 'PK018', 'salwar5', 17, 3, 3, 900, 12, 792, 1, 0, 'Salwar Chiffon18', '2016-07-05 11:47:41', '20160622093719.jpg', 1, NULL),
(20, 'PK019', 'salwar6', 17, 7, 3, 900, 23, 693, 1, 0, 'Salwar Chiffon19', '2016-07-05 11:47:41', '20160622093850.jpg', 1, NULL),
(21, 'PK020', 'salwar7', 17, 10, 5, 900, 10, 810, 1, 0, 'Salwar Chiffon20', '2016-07-05 11:47:41', '20160622093954.jpg', 1, NULL),
(22, 'PK021', 'Cotton Leggins', 18, 1, 3, 900, 8, 828, 0, 0, 'Cotton Leggings21', '2016-07-05 11:51:16', '20160622094308.jpg', 1, NULL),
(23, 'PK022', 'Cotton Leggins 22', 18, 2, 2, 900, 0, 900, 1, 0, 'COTTON LEGGINGS 22', '2016-07-05 11:51:39', '20160622095948.jpg', 1, NULL),
(24, 'PK023', 'Cotton Leggins23', 18, 1, 3, 800, 25, 600, 1, 0, 'Cotton Leggings23', '2016-07-05 11:51:30', '20160622101736.jpg', 1, NULL),
(25, 'PK024', 'leggings1', 18, 4, 3, 120, 0, 120, 1, 0, 'cotton leggings24', '2016-07-05 11:47:41', '20160622112529.jpg', 1, NULL),
(26, 'PK025', 'leggings2', 18, 2, 4, 120, 0, 120, 1, 0, 'Cotton Legging25', '2016-07-05 11:47:41', '20160622112807.jpg', 1, NULL),
(27, 'PK026', 'leggings3', 18, 3, 2, 120, 0, 120, 1, 0, 'Cotton Leggings26', '2016-07-05 11:47:41', '20160622113035.jpg', 1, NULL),
(28, 'PK027', 'leggings4', 18, 3, 4, 120, 0, 120, 1, 0, 'Cotton Leggings27', '2016-07-05 11:47:41', '20160622113222.jpg', 1, NULL),
(29, 'PK028', 'leggings5', 18, 7, 5, 120, 0, 120, 1, 0, 'Cotton Leggings28', '2016-07-05 11:47:41', '20160622113439.jpeg', 1, NULL),
(30, 'PK029', 'leggings6', 18, 4, 5, 120, 0, 120, 1, 0, 'Cotton Leggings29', '2016-07-05 11:47:41', '20160622113557.jpg', 1, NULL),
(31, 'PK030', 'earrings1', 18, 10, 3, 120, 0, 120, 1, 0, 'Cotton Leggings30', '2016-07-05 11:47:41', '20160622120829.jpg', 1, NULL),
(32, 'PK031', 'earrings2', 5, 8, 1, 1200, 10, 1080, 1, 0, 'Gold Beads Earrings31', '2016-07-05 05:55:56', '20160622121108.jpg', 1, NULL),
(33, 'PK032', 'earrings3', 5, 1, 1, 1200, 10, 1080, 1, 0, 'Earrings32', '2016-07-05 05:56:04', '20160622121814.jpg', 2, NULL),
(34, 'PK033', 'earrings4', 5, 2, 1, 1220, 20, 976, 1, 0, 'Beads Earrings33', '2016-07-05 05:56:07', '20160622122129.jpg', 2, NULL),
(35, 'PK034', 'earrings5', 3, 8, 1, 1300, 0, 1300, 1, 0, 'Stones Earrings34', '2016-07-05 05:56:13', '20160622122342.jpg', 1, NULL),
(36, 'PK035', 'earrings6', 3, 3, 1, 1500, 10, 1350, 1, 0, 'Stones Earrings35', '2016-07-05 05:56:16', '20160622122502.jpg', 1, NULL),
(37, 'PK036', 'earrings7', 3, 1, 1, 1350, 10, 1215, 1, 0, 'Stones Earrings36', '2016-07-05 05:56:20', '20160622122624.jpg', 2, NULL),
(38, 'PK037', 'earrings8', 4, 5, 1, 450, 10, 405, 1, 0, 'Drops Earrings37', '2016-07-05 05:56:23', '20160622122921.jpg', 1, NULL),
(39, 'PK038', 'earrings9', 4, 5, 1, 135, 0, 135, 1, 0, 'Drops Earrings38', '2016-07-05 05:56:29', '20160622123045.jpg', 1, NULL),
(40, 'PK039', 'Stones Earrings39', 3, 5, 1, 120, 0, 120, 1, 0, 'Stones Earrings39', '2016-07-05 11:49:42', '20160622123219.jpeg', 1, NULL),
(41, 'PK040', 'Beads Earrings40', 5, 3, 1, 1270, 10, 1143, 1, 0, 'Beads Earrings40', '2016-07-05 11:50:02', '20160622123326.jpg', 1, NULL),
(42, 'PK041', 'Necklace41', 12, 1, 1, 100, 5, 95, 0, 0, 'Gold Plated Necklace41', '2016-07-05 11:50:17', '20160622123534.jpg', 2, NULL),
(43, 'PK042', 'necklace1', 12, 3, 1, 1570, 10, 1413, 1, 0, 'Gold Plated Necklace42', '2016-07-05 05:59:55', '20160622123640.jpg', 1, NULL),
(44, 'PK043', 'necklace2', 12, 5, 1, 1600, 10, 1440, 0, 0, 'Gold Plated Necklace42', '2016-07-05 06:00:18', '20160622124027.jpg', 1, NULL),
(45, 'PK044', 'necklace3', 11, 9, 1, 1000, 10, 900, 1, 0, 'Beads Necklace43', '2016-07-05 06:00:13', '20160622125137.jpeg', 1, NULL),
(46, 'PK045', 'necklace4', 11, 1, 1, 1000, 0, 1000, 1, 0, 'Beads Necklace45', '2016-07-05 06:00:21', '20160622125335.jpg', 2, NULL),
(47, 'PK046', 'necklace5', 11, 3, 1, 1000, 10, 900, 1, 0, 'Beads Necklace46', '2016-07-05 06:00:58', '20160622125433.jpg', 1, NULL),
(48, 'PK047', 'necklace6', 10, 1, 1, 1700, 25, 1275, 1, 0, 'Stones Necklace47', '2016-07-05 06:01:02', '20160622125610.jpg', 2, NULL),
(49, 'PK048', 'necklace7', 10, 3, 1, 1700, 25, 1275, 0, 0, 'Stones Necklace48', '2016-07-05 06:09:54', '20160622125831.jpg', 1, NULL),
(50, 'PK049', 'necklace8', 10, 4, 1, 1750, 10, 1575, 1, 0, 'Stones Necklace49', '2016-07-05 06:09:58', '20160622010030.jpg', 1, NULL),
(51, 'PK050', 'Bangles', 10, 2, 1, 1790, 10, 1611, 1, 0, 'Stones Necklace50', '2016-07-05 05:57:09', '20160622010202.jpg', 2, NULL),
(53, 'PK0051', 'Gold Bangles', 7, 8, 2, 300, 20, 240, 2, 1, 'nice bangles', '2016-07-04 10:38:47', '20160704100337.jpg', 3, NULL),
(54, 'PK0052', 'Gold Coated Bangles', 7, 8, 4, 600, 50, 300, 4, 1, 'beautiful bangles', '2016-07-04 10:38:41', '20160704100525.jpg', 3, NULL),
(55, 'PK0053', 'White & Green Bangles', 6, 9, 2, 900, 10, 810, 5, 1, 'nice bangles', '2016-07-04 10:38:10', '20160704100734.jpg', 3, NULL),
(56, 'PK0054', 'Peacock Designs', 8, 2, 4, 1200, 10, 1080, 7, 1, 'green color bangles', '2016-07-04 11:18:54', '20160704101023.jpg', 2, NULL),
(57, 'PK0055', 'Beads - Green Bangles', 8, 3, 3, 1500, 50, 750, 5, 1, 'nice bangles with red green colors', '2016-07-04 10:37:58', '20160704101830.jpg', 3, NULL),
(58, 'PK0056', 'Red Bangles', 9, 1, 2, 500, 6, 470, 6, 1, 'red and gold bangles', '2016-07-04 10:37:52', '20160704102032.jpg', 3, NULL),
(60, 'PK0057', 'New Bangles', 8, 6, 3, 600, 12, 528, 3, 1, 'nice bangles', '2016-07-04 10:36:34', '20160704123634.jpg', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE IF NOT EXISTS `item_category` (
  `itemcat_id` int(10) NOT NULL AUTO_INCREMENT,
  `itemcat_name` varchar(45) NOT NULL,
  `status_id` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`itemcat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`itemcat_id`, `itemcat_name`, `status_id`) VALUES
(1, 'Cotton', 1),
(2, 'Silk', 1),
(3, 'Chiffon', 1),
(4, 'Gold Plated', 1),
(5, 'Diamond', 1),
(6, 'Silver', 1),
(7, 'beads', 1),
(8, 'stones', 1),
(9, 'casual', 1),
(10, 'patiala', 1),
(11, 'drops', 1),
(12, 'Metal', 1),
(13, 'test11qq', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_subcategory`
--

CREATE TABLE IF NOT EXISTS `item_subcategory` (
  `itemsubcat_id` int(10) NOT NULL AUTO_INCREMENT,
  `subcat_id` int(10) NOT NULL,
  `itemcat_id` int(10) NOT NULL,
  `date_arrived` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `number_of_items` int(10) DEFAULT NULL,
  `status_id` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`itemsubcat_id`),
  UNIQUE KEY `subcat` (`subcat_id`,`itemcat_id`),
  KEY `FKitem_sub_c101154` (`subcat_id`),
  KEY `FKitem_sub_c116689` (`itemcat_id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `item_subcategory`
--

INSERT INTO `item_subcategory` (`itemsubcat_id`, `subcat_id`, `itemcat_id`, `date_arrived`, `number_of_items`, `status_id`) VALUES
(1, 1, 1, '2016-07-05 11:47:41', 1, 1),
(2, 2, 1, '2016-07-05 11:47:41', 2, 1),
(3, 4, 8, '2016-06-21 06:03:39', NULL, 1),
(4, 4, 11, '2016-06-21 06:04:01', NULL, 1),
(5, 4, 7, '2016-06-21 06:04:16', NULL, 1),
(6, 5, 8, '2016-06-21 06:43:29', NULL, 1),
(7, 5, 4, '2016-06-21 06:43:39', NULL, 1),
(8, 5, 7, '2016-06-21 06:43:54', NULL, 1),
(9, 5, 12, '2016-06-21 06:56:48', NULL, 1),
(10, 6, 8, '2016-06-21 07:20:21', NULL, 1),
(11, 6, 7, '2016-06-21 07:21:02', NULL, 1),
(12, 6, 4, '2016-06-21 07:21:48', NULL, 1),
(13, 1, 2, '2016-07-05 11:47:41', NULL, 1),
(14, 1, 3, '2016-07-05 11:47:41', NULL, 1),
(15, 2, 2, '2016-07-05 11:47:41', NULL, 1),
(16, 2, 10, '2016-07-05 11:47:41', NULL, 1),
(17, 2, 3, '2016-07-05 11:47:41', NULL, 1),
(18, 3, 1, '2016-07-05 11:47:41', NULL, 1),
(19, 6, 9, '2016-06-29 11:09:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `role_id` int(10) NOT NULL,
  `status_id` int(10) NOT NULL DEFAULT '1',
  `phone_number` bigint(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `FKlogin544819` (`role_id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `user_name`, `password`, `email`, `role_id`, `status_id`, `phone_number`) VALUES
(1, 'Maruthi', '123', 'maruthibabu.tirupati@gmail.com', 1, 1, 9618728982),
(2, 'koushik', '123', 'koushik3236@gmail.com', 2, 1, 8801441660),
(3, 'maruthi', 'babu', 'maruthi@gmail.com', 2, 2, 7842227133),
(4, 'priya', '123', 'priya@gmail.com', 2, 2, 1234567890),
(5, 'pradeep', '123', 'pre@gmail.com', 1, 1, 9638527414),
(6, 'vpmmmm', '123', 'vp@gmail.com', 2, 1, 9638528741),
(7, 'priyankat', 'priya', 'priyanka.cse888@gmail.com', 2, 1, 8096636672),
(8, 'satish', '123', 'sa@gmail.com', 2, 1, 1231231231);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(25) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `address_id` int(10) NOT NULL,
  `status_id` int(10) NOT NULL DEFAULT '6',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_closed` int(10) DEFAULT NULL,
  `description1` int(10) DEFAULT NULL,
  `description2` int(10) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `cart_id` (`cart_id`,`address_id`,`status_id`),
  KEY `status` (`status_id`),
  KEY `address_id` (`address_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `order_number`, `cart_id`, `address_id`, `status_id`, `date_add`, `date_closed`, `description1`, `description2`, `user_id`) VALUES
(1, 'ODR0001', 12, 2, 5, '2016-06-30 05:53:01', NULL, NULL, NULL, 2),
(2, 'ODR0002', 10, 2, 5, '2016-06-30 08:14:08', NULL, NULL, NULL, 2),
(6, 'ODR0006', 14, 2, 5, '2016-06-30 11:17:25', NULL, NULL, NULL, 2),
(7, 'ODR0007', 14, 2, 6, '2016-06-30 11:19:04', NULL, NULL, NULL, 2),
(8, 'ODR0008', 17, 1, 5, '2016-06-30 11:36:16', NULL, NULL, NULL, 1),
(9, 'ODR0009', 16, 1, 5, '2016-06-30 11:36:17', NULL, NULL, NULL, 1),
(10, 'ODR0010', 15, 2, 6, '2016-07-01 02:24:20', NULL, NULL, NULL, 2),
(11, 'ODR0011', 18, 2, 6, '2016-07-01 02:38:06', NULL, NULL, NULL, 2),
(12, 'ODR0012', 19, 2, 6, '2016-07-01 02:40:28', NULL, NULL, NULL, 2),
(13, 'ODR0013', 20, 2, 6, '2016-07-01 02:42:11', NULL, NULL, NULL, 2),
(14, 'ODR0014', 21, 2, 6, '2016-07-01 02:44:28', NULL, NULL, NULL, 2),
(15, 'ODR0015', 22, 2, 6, '2016-07-01 02:47:40', NULL, NULL, NULL, 2),
(16, 'ODR0016', 22, 2, 6, '2016-07-01 02:49:22', NULL, NULL, NULL, 2),
(17, 'ODR0017', 23, 2, 6, '2016-07-01 03:01:59', NULL, NULL, NULL, 2),
(18, 'ODR0018', 24, 2, 6, '2016-07-01 05:51:43', NULL, NULL, NULL, 2),
(19, 'ODR0019', 25, 2, 6, '2016-07-01 05:53:32', NULL, NULL, NULL, 2),
(20, 'ODR0020', 25, 2, 6, '2016-07-01 05:54:57', NULL, NULL, NULL, 2),
(21, 'ODR0021', 26, 2, 6, '2016-07-01 05:56:12', NULL, NULL, NULL, 2),
(22, 'ODR0022', 26, 2, 6, '2016-07-01 05:57:15', NULL, NULL, NULL, 2),
(23, 'ODR0023', 27, 2, 6, '2016-07-01 08:04:45', NULL, NULL, NULL, 2),
(24, 'ODR0024', 28, 1, 6, '2016-07-04 05:18:13', NULL, NULL, NULL, 1),
(25, 'ODR0025', 30, 1, 6, '2016-07-04 05:25:38', NULL, NULL, NULL, 1),
(26, 'ODR0026', 29, 1, 6, '2016-07-04 05:25:38', NULL, NULL, NULL, 1),
(27, 'ODR0027', 33, 2, 6, '2016-07-04 05:56:32', NULL, NULL, NULL, 2),
(28, 'ODR0028', 35, 2, 6, '2016-07-04 07:04:02', NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(10) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE IF NOT EXISTS `size` (
  `size_id` int(10) NOT NULL AUTO_INCREMENT,
  `size` varchar(45) NOT NULL,
  `status_id` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`size_id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size`, `status_id`) VALUES
(1, 'N.A', 1),
(2, 'S', 1),
(3, 'M', 1),
(4, 'L', 1),
(5, 'XL', 1),
(6, 'XXL', 1),
(7, 'dfgdfdfgdfg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(10) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(1, 'active'),
(2, 'Inactive'),
(3, 'available'),
(4, 'out of stock'),
(5, 'delivered'),
(6, 'not delivered'),
(7, 'opened'),
(8, 'closed');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `subcat_id` int(10) NOT NULL AUTO_INCREMENT,
  `subcat_name` varchar(45) NOT NULL,
  `category_id` int(10) NOT NULL,
  `subcat_image` varchar(100) NOT NULL,
  `banner_image` varchar(100) NOT NULL,
  `status_id` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`subcat_id`),
  KEY `FKsubcategor485879` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcat_id`, `subcat_name`, `category_id`, `subcat_image`, `banner_image`, `status_id`) VALUES
(1, 'Kurtis', 1, 'img1.jpg', 'k.jpg', 1),
(2, 'Salwar', 1, 'img2.jpg', 's.jpg', 1),
(3, 'Leggings', 1, 'img3.jpg', 'l.jpg', 1),
(4, 'Earrings', 2, 'img4.jpg', 'e.jpg', 1),
(5, 'Bangles', 2, 'img5.jpg', 'b.jpg', 1),
(6, 'Necklace', 2, 'img6.jpg', 'n.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE IF NOT EXISTS `user_information` (
  `address_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `name` varchar(80) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `address` varchar(45) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `landmark` varchar(45) NOT NULL,
  `state` varchar(45) NOT NULL,
  `zip_code` int(6) NOT NULL,
  PRIMARY KEY (`address_id`),
  KEY `FKuser_infor264920` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`address_id`, `user_id`, `name`, `phone`, `address`, `city`, `country`, `landmark`, `state`, `zip_code`) VALUES
(1, 1, 'Maruthi Babu T', 9618728982, 'Door no:1-72', 'guntur', 'india', 'ramalayam', 'AP', 522615),
(2, 2, 'Kowsik Muvvala', 7842227133, 'Guntur', 'Guntur', 'India', 'Arundal pet', 'AP', 522522);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`),
  ADD CONSTRAINT `cart_detail_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status` (`status_id`),
  ADD CONSTRAINT `cart_detail_ibfk_4` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FKitem109511` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`),
  ADD CONSTRAINT `FKitem135633` FOREIGN KEY (`itemsubcat_id`) REFERENCES `item_subcategory` (`itemsubcat_id`),
  ADD CONSTRAINT `FKitem566115` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`),
  ADD CONSTRAINT `FKitem670537` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Constraints for table `item_subcategory`
--
ALTER TABLE `item_subcategory`
  ADD CONSTRAINT `FKitem_sub_c101154` FOREIGN KEY (`subcat_id`) REFERENCES `subcategory` (`subcat_id`),
  ADD CONSTRAINT `FKitem_sub_c116689` FOREIGN KEY (`itemcat_id`) REFERENCES `item_category` (`itemcat_id`),
  ADD CONSTRAINT `item_subcategory_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `FKlogin544819` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`),
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `user_information` (`address_id`),
  ADD CONSTRAINT `order_detail_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`),
  ADD CONSTRAINT `order_detail_ibfk_5` FOREIGN KEY (`cart_id`) REFERENCES `cart_detail` (`cart_id`);

--
-- Constraints for table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `FKsubcategor485879` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `user_information`
--
ALTER TABLE `user_information`
  ADD CONSTRAINT `FKuser_infor264920` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
