-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 14, 2019 at 10:07 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csv_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(5, 'Leather'),
(6, 'Chain Mail'),
(7, 'Iron'),
(8, 'Gold'),
(9, 'Diamonds'),
(10, 'Other'),
(11, 'Wood'),
(12, 'Stone');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `prod_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Helmets'),
(2, 'Chestplates'),
(5, 'Leggings'),
(6, 'Boots'),
(7, 'Pickaxes'),
(8, 'Shovels'),
(9, 'Weapons'),
(10, 'Axes'),
(11, 'Hoes');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`) VALUES
(17, '::1', '12334', 'gdsgsd', 'wertwert', 'ryujk', 'rtyhj', 'fghn', 'ertdfgh', ''),
(18, '::1', 'no', '3456', '1234', 'etryer', 'gffdsg', 'rwtsgdf', 'sdfg', ''),
(20, '::1', 'calvin', 'test@wtc.com', '1234', 'za', 'ct', '5', 'yes', 'Screen Shot 2019-10-14 at 00.55.47.png'),
(21, '::1', 'calvin', 'test@wtc.com', '1234', 'za', 'ct', '5', 'yes', 'Screen Shot 2019-10-14 at 00.55.47.png');

-- --------------------------------------------------------

--
-- Table structure for table `mods`
--

CREATE TABLE `mods` (
  `user_id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mods`
--

INSERT INTO `mods` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` text NOT NULL,
  `prod_id` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `prod_id`, `qty`, `date`) VALUES
(1, 'test@wtc.com', 55, 1, '14 10 2019');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(10, 1, 5, 'Leather Helmet', 5000, 'helmet made of leather that supplies 0.5 protection', 'leatherhelm.png', 'leather helmet .5 armour'),
(11, 2, 5, 'Leather Chestplate', 8000, 'Chestplate made of leather, supplies 1.5 protection', 'leatherchest.png', 'leather chestplate 1.5 armour'),
(12, 5, 5, 'Leather Leggings', 7000, 'Leggings made of leather, supplies 1 protection', 'leatherp.png', 'leggings leather 1 armour'),
(13, 6, 5, 'Leather Boots', 4000, 'Boots made of leather that supplies 0.5\r\nprotection', 'leatherb.png', 'leather boots .5 armour'),
(14, 1, 6, 'Chain Mail Helmet', 10000, 'A helmet made of Chain Mail that supplies 1 protection', 'chainmailhelm.png', 'chainmail helmet 1 armour'),
(15, 2, 6, 'Chain Mail Chestplate', 16000, 'A Chestplate made of Chain Mail that supplies 2.5 protection', 'chainchest.png', 'chainmail chestplate 2.5 armour'),
(16, 5, 6, 'Chain Mail Leggings', 14000, 'Leggings made of Chain Mail, supplies 2 protection', 'chainleggings.png', 'chainmail leggings 1 armour'),
(17, 6, 6, 'Chain Mail Boots', 8000, 'Boots made of Chain Mail that supplies 0.5\r\nprotection', 'chainmailboots.png', 'chainmail boots .5 armour'),
(18, 1, 8, 'Gold Helmet', 20000, 'A helmet made of Gold that supplies 1 protection', 'goldhelm.png', 'gold helmet 1 armour rare'),
(19, 2, 8, 'Gold Chestplate', 32000, 'A Chestplate made of Gold that supplies 2.5 protection', 'goldchest.png', 'gold chestplate 2.5 armour rare'),
(20, 5, 8, 'Gold Leggings', 28000, 'Leggings made of Gold that supplies 1.5 protection', 'goldleggings.png', 'gold leggings 1.5 armour rare'),
(21, 6, 8, 'Gold Boots', 16000, 'Boots made of Gold that supplies 0.5\r\nprotection', 'goldboots.png', 'gold boots .5 armour rare'),
(22, 1, 7, 'Iron Helmet', 40000, 'A helmet made of Iron that supplies 1 protection', 'ironhelm.jpg', 'Iron helmet 1 armour'),
(23, 2, 7, 'Iron Chestplate', 62000, 'A Chestplate made of Iron that supplies 3 protection', 'ironchestplate.png', 'iron chestplate 3 armour'),
(24, 5, 7, 'Iron Leggings', 56000, 'Leggings made of Iron that supplies 2.5 protection', 'ironleggings.jpg', 'iron leggings 2.5 armour'),
(25, 6, 7, 'Iron Boots', 32000, 'Boots made of Iron that supplies 1\r\nprotection', 'ironboots.png', 'iron boots 1 armour'),
(26, 1, 9, 'Diamond Helmet', 80000, 'A helmet made of Diamonds that supplies 1.5 protection', 'diamondhelm.png', 'diamond helmet 1.5 armour rare'),
(27, 2, 9, 'Diamond Chestplate', 124000, 'A Chestplate made of Diamonds that supplies 4 protection', 'diamondchest.png', 'diamond chestplate 4 armour rare'),
(28, 5, 9, 'Diamond Leggings', 112000, 'Leggings made of diamonds that supplies 3 protection', 'diamondleggings.png', 'diamond leggings 3 armour rare'),
(29, 6, 9, 'Diamond Boots', 64000, 'Boots made of Iron that supplies 1.5\r\nprotection', 'diamondboots.png', 'diamond boots 1.5 armour rare'),
(30, 7, 11, 'Wooden Pickaxe', 3000, 'A pickaxe made of wood with a durability of 59', 'woodpick.png', 'wood pickaxe tool 59'),
(31, 7, 12, 'Stone Pickaxe', 6000, 'A pickaxe made of stone with a durability of 131', 'stonepick.png', 'stone pickaxe tool 131'),
(32, 7, 7, 'Iron Pickaxe', 12000, 'A pickaxe made of iron with a durability of 250', 'ironpick.png', 'iron pickaxe tool 250'),
(33, 7, 8, 'Gold Pickaxe', 24000, 'A pickaxe made of gold with a durability of 32', 'goldpick.png', 'gold pickaxe tool rare'),
(34, 7, 9, 'Diamond Pickaxe', 24000, 'A pickaxe made of diamonds with a durability of 1561', 'diamondpick.png', 'diamond pickaxe tool rare'),
(35, 8, 11, 'Wooden Shovel', 1000, 'A shovel made of wood with a durability of 59', 'woodshovel', 'wood shovel tool 59'),
(36, 8, 12, 'Stone Shovel', 2000, 'A shovel made of stone with a durability of 131', 'stoneshovel', 'stone shovel tool 131'),
(37, 8, 7, 'Iron Shovel', 4000, 'A shovel made of iron with a durability of 250', 'ironshovel', 'iron shovel tool 250'),
(38, 8, 8, 'Gold Shovel', 8000, 'A shovel made of gold with a durability of 32', 'goldshovel', 'gold shovel tool rare'),
(39, 8, 9, 'Diamond Shovel', 16000, 'A shovel made of diamonds with a durability of 1561', 'diamondshovel.png', 'diamond shovel tool rare'),
(40, 9, 11, 'Wooden Sword', 2000, 'A sword made of wood with an attack damage of 4', 'woodsword.png', 'wood sword weapon 4'),
(41, 9, 12, 'Stone Sword', 4000, 'A sword made of stone with an attack damage of 5', 'stonesword.png', 'stone sword weapon 5'),
(42, 9, 7, 'Iron Sword', 8000, 'A sword made of iron with an attack damage of 6', 'ironsword.jpg', 'iron sword weapon 6'),
(43, 9, 8, 'Gold Sword', 16000, 'A sword made of gold with an attack damage of 4', 'goldsword.png', 'gold sword weapon rare 4'),
(44, 9, 9, 'Diamond Sword', 32000, 'A sword made of diamonds with an attack damage of 7', 'diamondsword.png', 'diamond sword weapon rare 7'),
(45, 9, 10, 'Trident', 32000, 'A ranged throwing weapon an attack damage of 9', 'trident.png', 'trident weapon ranged 9'),
(46, 9, 10, 'Bow', 32000, 'A ranged weapon an attack damage of 9', 'bow.png', 'bow weapon ranged 9'),
(47, 10, 11, 'Wooden Axe', 3000, 'An Axe made of wood with a durability of 59', 'woodaxe.png', 'axe wood tool 59'),
(48, 10, 12, 'Stone Axe', 6000, 'An axe made of stone with a durability of 131', 'stoneaxe.png', 'stone axe tool 131'),
(49, 10, 7, 'Iron Axe', 12000, 'An axe made of iron with a durability of 250', 'ironaxe.png', 'iron axe tool 250'),
(50, 10, 8, 'Gold Axe', 24000, 'An axe made of gold with a durability of 32', 'goldaxe.png', 'gold axe tool rare'),
(51, 10, 9, 'Diamond Axe', 48000, 'An axe made of diamonds with a durability of 1561', 'diamondpick.jpg', 'diamond axe tool rare'),
(52, 11, 11, 'Wooden Hoe', 2000, 'A Hoe for your wood', 'woodhoe.png', 'hoe wood tool 69'),
(53, 11, 12, 'Stone Hoe', 4000, 'this stone hoe will make you rock hard', 'stonehoe.png', 'stone hoe tool 69'),
(54, 11, 7, 'Iron Hoe', 1, 'your mom', 'ym.png', 'iron hoe tool 69'),
(55, 11, 8, 'Gold Hoe', 16000, 'A gold digger', 'goldhoe.png', 'gold hoe tool 69'),
(56, 11, 9, 'Diamond Hoe', 32000, 'Never waste diamonds on a hoe', 'diamondhoe.png', 'diamond hoe tool 69');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_name`
--

CREATE TABLE `tbl_name` (
  `COL 1` int(2) DEFAULT NULL,
  `COL 2` varchar(9) DEFAULT NULL,
  `COL 3` varchar(5) DEFAULT NULL,
  `COL 4` varchar(7) DEFAULT NULL,
  `COL 5` varchar(8) DEFAULT NULL,
  `COL 6` varchar(6) DEFAULT NULL,
  `COL 7` varchar(8) DEFAULT NULL,
  `COL 8` varchar(7) DEFAULT NULL,
  `COL 9` varchar(7) DEFAULT NULL,
  `COL 10` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_name`
--

INSERT INTO `tbl_name` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`, `COL 8`, `COL 9`, `COL 10`) VALUES
(1, 'HP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Dell', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'LG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Samsung', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 'Laptops', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Cameras', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Phones', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Computers', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '::1', '12334', 'gdsgsd', 'wertwert', 'ryujk', 'rtyhj', 'fghn', 'ertdfgh', ''),
(18, '::1', 'no', '3456', '1234', 'etryer', 'gffdsg', 'rwtsgdf', 'sdfg', ''),
(10, '1', '2', 'OMEN 15', '2220', 'dfgdfg', 'test.png', 'dfds', NULL, NULL),
(11, '2', '4', 'fsfds', '23423', 'sadsa', 'test.png', 'dfs', NULL, NULL),
(12, '3', '2', 'dhtj', '4543', 'cvdv', 'test.png', 'dsf', NULL, NULL),
(13, '3', '1', 'OMEN 15', '2220', 'stgs', 'test.png', 'sfgh', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `mods`
--
ALTER TABLE `mods`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mods`
--
ALTER TABLE `mods`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
