-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2019 at 10:43 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ceramika`
--
CREATE DATABASE IF NOT EXISTS `ceramika` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ceramika`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'Sony'),
(5, 'LG'),
(6, 'Biba'),
(7, 'Flying Machine'),
(8, 'Nike'),
(9, 'Adidas'),
(10, 'Kidzee'),
(11, 'Ikea'),
(12, 'Philips');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_image` varchar(300) NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Teapots'),
(2, 'Mugs'),
(3, 'Statues'),
(4, 'Flower Pots'),
(5, 'Dinner Sets'),
(6, 'Tiles'),
(8, 'Bathtub'),
(9, 'Tiles 1'),
(10, 'Tiles 1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_qty` int(100) NOT NULL,
  `p_status` varchar(100) NOT NULL,
  `tr_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `uid`, `pid`, `p_name`, `p_price`, `p_qty`, `p_status`, `tr_id`) VALUES
(30, 2, 6, 'LG Aqua 2', 15000, 1, 'CONFIRMED', '15179'),
(31, 2, 15, 'Football Shoes', 2500, 1, 'CONFIRMED', '15179'),
(32, 2, 16, 'Football', 600, 1, 'CONFIRMED', '15179'),
(33, 6, 1, 'Samsung Duos 2', 5000, 1, 'CONFIRMED', '902455605'),
(34, 7, 16, 'Football', 600, 1, 'CONFIRMED', '751108296'),
(35, 7, 1, 'Samsung Duos 2', 5000, 1, 'CONFIRMED', '178219293'),
(36, 7, 3, 'iPad', 30000, 1, 'CONFIRMED', '1439416496'),
(37, 7, 3, 'iPad', 30000, 1, 'CONFIRMED', '418781176'),
(38, 7, 1, 'Samsung Duos 2', 5000, 1, 'CONFIRMED', '868439245'),
(39, 9, 1, 'Samsung Duos 2', 5000, 1, 'CONFIRMED', '984459844'),
(40, 9, 1, 'Teapot1', 5000, 1, 'CONFIRMED', '1282891998'),
(41, 10, 2, 'Teapot2', 75000, 3, 'CONFIRMED', '972881204'),
(42, 10, 3, 'Teapot3', 30000, 1, 'CONFIRMED', '972881204'),
(43, 10, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '1742334784'),
(44, 10, 3, 'Teapot3', 30000, 1, 'CONFIRMED', '1742334784'),
(45, 10, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '852174216'),
(46, 10, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '2088370475'),
(47, 10, 2, 'Teapot2', 50000, 2, 'CONFIRMED', '685382654'),
(48, 10, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '37725335'),
(49, 10, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '1502108139'),
(50, 10, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '356923657'),
(51, 10, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '215594650'),
(52, 10, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '627106102'),
(53, 10, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '1070534490'),
(54, 10, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '883574374'),
(55, 10, 3, 'Teapot34', 30000, 1, 'CONFIRMED', '883574374'),
(56, 10, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '1722604697'),
(57, 10, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '999668935'),
(58, 10, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '639891150'),
(59, 11, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '1978336470'),
(60, 11, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '1839011730'),
(61, 11, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '608451924'),
(62, 11, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '2112428634'),
(63, 11, 2, 'Teapot2', 25000, 1, 'CONFIRMED', '781660992'),
(64, 11, 3, 'Teapot34', 30000, 1, 'CONFIRMED', '781660992'),
(65, 11, 4, 'Teapot4', 10000, 1, 'CONFIRMED', '781660992');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` varchar(100) NOT NULL,
  `sm_id` int(100) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_price` int(100) NOT NULL,
  `pro_qty` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `sm_id`, `product_brand`, `product_title`, `product_price`, `pro_qty`, `product_desc`, `product_image`, `product_keywords`) VALUES
(2, '1', 1, '3', 'Teapot2', 25000, 15, 'Teapot Desc', 't2.jpg', 'Teapot,Ceramic Teapot'),
(3, '1', 2, '3', 'Teapot34', 30000, 50, 'Teapot Desc', 't3.jpg', 'Teapot,Ceramic Teapot'),
(4, '1', 2, '2', 'Teapot4', 10000, 100, 'Teapot Desc', 't4.jpg', 'Teapot,Ceramic Teapot'),
(5, '1', 1, '4', 'Teapot5', 25000, 100, 'Teapot Desc', 't5.jpg', 'Teapot,Ceramic Teapot'),
(6, '1', 1, '5', 'Teapot6', 15000, 100, 'Teapot Desc', 't6.jpg', 'Teapot,Ceramic Teapot'),
(7, '2', 2, '6', 'Mug1', 1500, 100, 'Mug Desc', 'Mug1.jpg', 'Mug, Ceramic Mug'),
(8, '2', 2, '6', 'Mug2', 1000, 100, 'Mug Desc', 'Mug2.jpg', 'Mug, Ceramik Mug'),
(9, '3', 1, '7', 'Statue1', 700, 100, 'Statue Desc', 's1.jpg', 'Statue, Ceramic Statue'),
(10, '3', 2, '7', 'Statue1', 1800, 100, 'Statue Desc', 's2.jpg', 'Statue, Ceramic Statue'),
(11, '4', 2, '10', 'Flower Pots1', 500, 100, 'Flower Pots Desc', 'f1.jpg', 'Flower Pots, Ceramic Flower Pots '),
(12, '4', 2, '10', 'Flower Pots2', 800, 100, 'Flower Pots Desc', 'f2.jpg', 'Flower Pots, Ceramic Flower Pots '),
(13, '5', 1, '11', 'Dinner Set1', 2000, 100, 'Dinner Set Desc', 'ds1.jpg', 'Dinner set, Ceramic Dinner Set'),
(15, '6', 2, '8', 'Tile1', 2500, 100, 'Tiles Desc', 'tiles1.jpg', 'Tile, Ceramic Tile'),
(16, '6', 2, '9', 'Tile2', 600, 100, 'Tile Desc', '55567872.png', 'Tile, Ceramic Tile');

-- --------------------------------------------------------

--
-- Table structure for table `received_payment`
--

CREATE TABLE `received_payment` (
  `id` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `amt` int(100) NOT NULL,
  `tr_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_manager`
--

CREATE TABLE `sales_manager` (
  `id` int(10) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_manager`
--

INSERT INTO `sales_manager` (`id`, `email`, `password`, `name`) VALUES
(1, 'sm@gmail.com', 'b24331b1a138cde62aa1f679164fc62f', 'sms'),
(2, 'sm1@gmail.com', 'b24331b1a138cde62aa1f679164fc62f', 'sm1');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(4, 'Pranav', 'Prem', 'pranav.prem@gmail.com', '929847725b8d48b47ecba736b0d04520', '8235639917', 'Prem Electronics Block Road Ratu', 'sdsd'),
(5, 'Shubham', 'Raj', 'shubham@gmail.com', '5568fda880263b9be0b72104354fa3dc', '8235639917', 'Prem Electronics Block Road Ratu', 'bangalore'),
(6, 'Parth', 'Pathak', 'sompuraparth7@gmail.com', '17c15b8b6a419bd52a3848084a60db7e', '9574370069', 'Bhavnagar', 'Gujarat'),
(11, 'Rohit', 'Galani', 'rohitgalani6032@gmail.com', '202cb962ac59075b964b07152d234b70', '9574370069', 'dd', 'gg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `received_payment`
--
ALTER TABLE `received_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_manager`
--
ALTER TABLE `sales_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `received_payment`
--
ALTER TABLE `received_payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_manager`
--
ALTER TABLE `sales_manager`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
