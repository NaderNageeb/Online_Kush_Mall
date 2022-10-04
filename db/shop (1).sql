-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 09:59 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_order_id` int(11) DEFAULT NULL,
  `cart_product_id` int(11) NOT NULL,
  `cart_user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT '0',
  `admin_feedback` varchar(255) DEFAULT NULL,
  `c_price` varchar(255) NOT NULL,
  `c_quantity` varchar(255) NOT NULL,
  `c_color` varchar(255) NOT NULL,
  `c_size` varchar(255) NOT NULL,
  `cart_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cart_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cateogories`
--

CREATE TABLE `cateogories` (
  `cat_id` int(11) NOT NULL,
  `cateogory` varchar(255) NOT NULL,
  `cat_icon` varchar(255) NOT NULL,
  `cat_desc` varchar(255) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cateogories`
--

INSERT INTO `cateogories` (`cat_id`, `cateogory`, `cat_icon`, `cat_desc`, `del`) VALUES
(1, 'Fashion & Beauty ', 'clothes.jpg', 'test', 0),
(3, 'Kids & Babies Clothes', 'category-2.jpg', 'Kids & Babies Clothes', 0),
(4, 'Men & Women Clothes', 'clothes2.jpg', 'Men & Women Clothes', 0),
(5, 'Gadgets & Accessories', 'category-7.jpg', 'Gadgets & Accessories', 0),
(6, 'Electronics & Accessories', 'category-5.jpg', 'Electronics & Accessories', 0),
(7, 'obama', '@WallpapersGram4k - 70ss-purple-knight-oh.jpg', 'obama', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `recieve_type` int(11) NOT NULL DEFAULT '0',
  `total_price` varchar(200) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_list`
-- (See below for the actual view)
--
CREATE TABLE `order_list` (
`order_id` int(11)
,`order_status` int(11)
,`user_id` int(11)
,`recieve_type` int(11)
,`order_date` timestamp
,`cart_id` int(11)
,`cart_order_id` int(11)
,`cart_product_id` int(11)
,`cart_user_id` int(11)
,`admin_id` int(11)
,`admin_feedback` varchar(255)
,`c_price` varchar(255)
,`c_quantity` varchar(255)
,`c_color` varchar(255)
,`c_size` varchar(255)
,`cart_date` timestamp
,`cart_del` int(11)
,`product_id` int(11)
,`cat_id` int(11)
,`product_name` varchar(255)
,`p_quantity` int(11)
,`size` varchar(255)
,`price` varchar(255)
,`color` varchar(255)
,`discription` varchar(255)
,`product_photo` varchar(255)
,`del` int(11)
,`product_date` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `product_photo` varchar(255) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  `product_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `product_name`, `p_quantity`, `size`, `price`, `color`, `discription`, `product_photo`, `del`, `product_date`) VALUES
(1, 1, 'best fashion', 11, 'small', ' 100', 'white', 'test', 'clothes.jpg', 0, '2021-08-23 12:14:43'),
(12, 1, 'mekup', 5, 'Large', '10', 'black', 'none', 'category-4.jpg', 0, '2021-08-25 07:33:58'),
(10, 3, 'baby clothes', 7, 'small', '222', 'white', 'none update', '2020-Cartoon-.webp', 0, '2021-08-24 10:41:26'),
(11, 3, 'best baby clothes', 10, 'medium', '11', 'blue', 'no', 'photo(6).jpg', 0, '2021-08-25 07:20:11'),
(9, 1, 'fashon and buety', 6, 'small', '100', 'white', 'none ', 'product-9.jpg', 0, '2021-08-24 10:39:05'),
(13, 5, ' best accessories', 5, 'small', '10', 'pink', 'none', 'gadgets-1-1.jpg', 0, '2021-08-25 08:31:35'),
(14, 6, 'hind test', 10, 'Large', '100', 'white', 'non', 'photo(120).jpg', 0, '2021-11-14 15:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_type` int(255) DEFAULT '3',
  `photo` varchar(255) DEFAULT NULL,
  `del` int(255) NOT NULL DEFAULT '0',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `full_name`, `gender`, `email`, `address`, `phone`, `user_type`, `photo`, `del`, `reg_date`) VALUES
(1, 'ahmed ', '123', 'ahmed hassan', 'male', 'ahmed@gmail.com', 'Khartoum ', '121235', 3, NULL, 0, '2021-08-05 09:46:52'),
(2, 'abcd', '123', 'abcd', 'male', 'abcd@gmail.com', 'bhri', '456', 3, NULL, 0, '2021-08-05 09:52:15'),
(14, 'osman', '123', 'osman ali', 'male', 'hass@gmail.com', 'Khartoum / bhri', '1245245', 2, NULL, 0, '2021-09-06 12:06:49'),
(12, 'admin', '123', 'admin', 'male', 'admin@gmail.com', 'Khartoum / bhri', '1212', 1, NULL, 0, '2021-08-14 10:37:09'),
(16, 'ali', '123', 'ali', 'male', 'ommnada2@gmail.com', 'kh', '09332', 1, NULL, 0, '2021-10-22 11:22:01'),
(18, 'hind', '123', 'hind babker hassan', 'fmale', 'hind@gmail.com', 'kh', '09332', 3, NULL, 0, '2021-11-14 15:23:40');

-- --------------------------------------------------------

--
-- Structure for view `order_list`
--
DROP TABLE IF EXISTS `order_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_list`  AS  select `a`.`order_id` AS `order_id`,`a`.`order_status` AS `order_status`,`a`.`user_id` AS `user_id`,`a`.`recieve_type` AS `recieve_type`,`a`.`order_date` AS `order_date`,`b`.`cart_id` AS `cart_id`,`b`.`cart_order_id` AS `cart_order_id`,`b`.`cart_product_id` AS `cart_product_id`,`b`.`cart_user_id` AS `cart_user_id`,`b`.`admin_id` AS `admin_id`,`b`.`admin_feedback` AS `admin_feedback`,`b`.`c_price` AS `c_price`,`b`.`c_quantity` AS `c_quantity`,`b`.`c_color` AS `c_color`,`b`.`c_size` AS `c_size`,`b`.`cart_date` AS `cart_date`,`b`.`cart_del` AS `cart_del`,`c`.`product_id` AS `product_id`,`c`.`cat_id` AS `cat_id`,`c`.`product_name` AS `product_name`,`c`.`p_quantity` AS `p_quantity`,`c`.`size` AS `size`,`c`.`price` AS `price`,`c`.`color` AS `color`,`c`.`discription` AS `discription`,`c`.`product_photo` AS `product_photo`,`c`.`del` AS `del`,`c`.`product_date` AS `product_date` from ((`orders` `a` join `cart` `b`) join `products` `c`) where ((`a`.`order_id` = `b`.`cart_order_id`) and (`b`.`cart_product_id` = `c`.`product_id`) and (`b`.`cart_del` = 0)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cateogories`
--
ALTER TABLE `cateogories`
  ADD PRIMARY KEY (`cat_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `cateogories`
--
ALTER TABLE `cateogories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
