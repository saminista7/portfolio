-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 04:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice` varchar(200) DEFAULT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice`, `active`) VALUES
('A white wallet is found. Please take it back with proof', ''),
('hello', 'No'),
('hello', 'No'),
('কি চাই?', 'No'),
('একটি কালো মানিব্যাগ পাওয়া গিয়েছে। মানিব্যাগের মালিক যথাযথ প্রমাণ দিয়ে মানিব্যাগটি কাউন্টার হতে সংগ্রহ করুন।', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(12, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(13, 'Ahnaf Samin', 'ahnaf', 'c403af0bede78cb556e7d13dbf9d34e9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(4, 'Pizza', 'Food_Category_790.jpg', 'Yes', 'Yes'),
(5, 'Burger', 'Food_Category_344.jpg', 'Yes', 'Yes'),
(6, 'MoMo', 'Food_Category_77.jpg', 'Yes', 'Yes'),
(9, 'Rolls', 'Food_Category_957.jpg', 'Yes', 'Yes'),
(11, 'Sandwich', 'Food_Category_998.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`) VALUES
(1, '2022-09-10 06:30:39', 'Complaint about shingara being not stuffed', 'Ahnaf Samin', '01754466100', '190204031@aust.edu'),
(2, '2022-09-10 10:02:55', 'asdsdsd', 'Piash', '01532415133', '190204041@aust.edu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `health` varchar(256) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `health`, `featured`, `active`) VALUES
(3, 'Dumplings Specials', 'Chicken Dumpling with herbs from Mountains', '5.00', 'Food-Name-3649.jpg', 6, '', 'No', 'Yes'),
(4, 'Aust Burger', 'Burger with onion filling.', '60.00', 'Food-Name-6340.jpg', 5, 'Diarrhea', 'Yes', 'Yes'),
(5, 'Aust Cheap Pizza', 'Pizza with mayo and onion toppings', '50.00', 'Food-Name-603.jpg', 4, 'Food posoning, vomit', 'Yes', 'Yes'),
(6, 'Sadeko Momo', 'Best Spicy Momo for Winter', '6.00', 'Food-Name-7387.jpg', 6, '', 'No', 'Yes'),
(7, 'Mixed Pizza', 'Pizza with chicken, Ham, Buff, Mushroom and Vegetables', '500.00', 'Food-Name-7833.jpg', 4, '', 'Yes', 'Yes'),
(9, 'Puri', 'Typical desi deep-fried bread made from unleavened whole-wheat flour with daal filling', '6.00', 'Food-Name-9685.jpg', 11, 'Food poisoning!', 'Yes', 'Yes'),
(10, 'Vege Rolls', 'Morning vege filling', '30.00', '', 9, '', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(7, 'Puri', '6.00', 1, '6.00', '2022-08-23 04:47:01', 'Ordered', 'Phungshuk Wangdu', '01876096649', '190104072@aust.edu', '180/2 Niketan Bazar'),
(8, 'Mixed Pizza', '10.00', 1, '10.00', '2022-08-23 05:27:16', 'Delivered', 'Mohammed Fahmidur Rahman', '01876096649', '190104072@aust.edu', 'House no: 1592, Hamzarbag Colony, Ward No: 07, Post Office: Amin Jute Mills Thana: Panchlaish, District: Chittagong ( Chattagram )\r\n'),
(9, 'Aust Burger', '60.00', 2, '120.00', '2022-08-27 10:47:07', 'Ordered', 'Ahnaf Samin', '01754466100', 'ahnaf.samin7@aust.edu', 'Mohammadpur'),
(10, 'Aust Burger', '60.00', 2, '120.00', '2022-08-27 10:49:46', 'Ordered', 'Ahnaf Samin', '01754466100', 'ahnaf.samin7@aust.edu', 'Mohammadpur'),
(11, 'Aust Burger', '60.00', 1, '60.00', '2022-08-27 10:50:06', 'Ordered', 'Ahnaf Samin', '01754466100', 'ahnaf.samin7@aust.edu', 'Mohammadpur'),
(12, 'Aust Burger', '60.00', 1, '60.00', '2022-08-27 10:50:30', 'Ordered', 'Ahnaf Samin', '01754466100', 'ahnaf.samin7@aust.edu', 'Mohammadpur'),
(13, 'Aust Burger', '60.00', 1, '60.00', '2022-08-27 10:51:54', 'Ordered', 'Ahnaf Samin', '01754466100', 'ahnaf.samin7@gmail.edu', 'Mohammadpur'),
(14, 'Aust Burger', '60.00', 1, '60.00', '2022-08-27 10:58:01', 'Ordered', 'Ahnaf Samin', '01754466100', 'ahnaf.samin7@aust.edu', 'Mohammadpur'),
(15, 'Aust Burger', '60.00', 1, '60.00', '2022-08-27 10:59:42', 'Ordered', 'Ahnaf Samin', '01754466100', '12312@aust.edu', 'Mohammadpur'),
(16, 'Aust Burger', '60.00', 1, '60.00', '2022-08-27 11:04:33', 'Ordered', 'Ahnaf Samin', '01754466100', '12312@aust.edu', 'Mohammadpur'),
(17, 'Aust Burger', '60.00', 1, '60.00', '2022-08-27 11:04:43', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(18, 'Aust Burger', '60.00', 1, '60.00', '2022-08-27 11:05:30', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(19, 'Aust Burger', '60.00', 1, '60.00', '2022-08-27 11:05:36', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(20, 'Aust Burger', '60.00', 1, '60.00', '2022-08-27 11:08:50', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(21, 'Aust Burger', '60.00', 1, '60.00', '2022-08-27 11:08:57', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(22, 'Aust Burger', '60.00', 1, '60.00', '2022-08-27 11:09:23', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(23, 'Aust Burger', '60.00', 1, '60.00', '2022-08-27 11:10:17', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(24, 'Aust Burger', '60.00', 1, '60.00', '2022-08-27 11:10:37', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(25, 'Dumplings Specials', '5.00', 1, '5.00', '2022-08-27 11:12:22', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(26, 'Dumplings Specials', '5.00', 1, '5.00', '2022-08-27 11:13:18', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(27, 'Dumplings Specials', '5.00', 1, '5.00', '2022-08-27 11:13:25', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(28, 'Dumplings Specials', '5.00', 1, '5.00', '2022-08-27 11:15:17', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(29, 'Dumplings Specials', '5.00', 3, '15.00', '2022-08-27 11:15:34', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(30, 'Dumplings Specials', '5.00', 1, '5.00', '2022-08-27 11:28:19', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(31, 'Dumplings Specials', '5.00', 1, '5.00', '2022-08-27 11:29:39', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(32, 'Dumplings Specials', '5.00', 1, '5.00', '2022-08-27 11:29:51', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(33, 'Aust Burger', '60.00', 1, '60.00', '2022-08-28 05:23:04', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(34, 'Dumplings Specials', '5.00', 1, '5.00', '2022-08-28 05:24:43', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(35, 'Aust Burger', '60.00', 1, '60.00', '2022-08-28 05:26:43', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(36, 'Aust Burger', '60.00', 1, '60.00', '2022-08-28 05:31:28', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(37, 'Aust Burger', '60.00', 1, '60.00', '2022-08-28 05:31:53', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(38, 'Dumplings Specials', '5.00', 1, '5.00', '2022-08-28 05:32:11', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(39, 'Dumplings Specials', '5.00', 1, '5.00', '2022-08-28 05:41:03', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(40, 'Dumplings Specials', '5.00', 1, '5.00', '2022-08-28 05:44:18', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(41, 'Dumplings Specials', '5.00', 1, '5.00', '2022-08-28 05:44:39', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(42, 'Dumplings Specials', '5.00', 1, '5.00', '2022-08-28 05:45:05', 'Ordered', 'Ahnaf Samin', '01754466100', '190204031@aust.edu', 'Mohammadpur'),
(43, 'Dumplings Specials', '5.00', 1, '5.00', '2022-08-28 05:47:17', 'Ordered', 'Ahnaf Samin', '01754466100', '2000@aust.edu', 'Mohammadpur'),
(44, 'Dumplings Specials', '5.00', 1, '5.00', '2022-08-28 05:49:56', 'Ordered', 'Ahnaf Samin', '01754466100', '19002@aust.edu', 'Mohammadpur'),
(45, 'Aust Burger', '60.00', 10, '600.00', '2022-08-28 05:50:47', 'Ordered', 'Ahnaf Samin', '01754466100', '5555@aust.edu', 'Mohammadpur'),
(46, 'Aust Burger', '60.00', 10, '600.00', '2022-08-28 05:52:36', 'Ordered', 'Ahnaf Samin', '01754466100', '5555@aust.edu', 'Mohammadpur'),
(47, 'Aust Cheap Pizza', '50.00', 11, '550.00', '2022-08-28 05:53:03', 'Delivered', 'Ahnaf Samin', '01754466100', '4455@aust.edu', 'Mohammadpur'),
(48, 'Aust Burger', '60.00', 2, '120.00', '2022-09-07 11:52:17', 'Delivered', 'Ahnaf Samin', '01754466100', '190204031@aust.edu', 'Mohammadpur'),
(49, 'Aust Burger', '60.00', 1, '60.00', '2022-09-08 01:04:42', 'Ordered', 'Ahnaf Samin', '01754466100', '190204031@aust.edu', 'Naruto'),
(50, 'Mixed Pizza', '500.00', 3, '1500.00', '2022-09-08 01:12:45', 'Ordered', 'Piash', '01754466100', '190204041@aust.edu', 'Naruto Fullmetal Alchemist'),
(51, 'Aust Burger', '60.00', 1, '60.00', '2022-09-08 02:28:40', 'Ordered', 'Ahnaf Samin', '01754466100', '190204031@aust.edu', 'Ground Floor test'),
(52, 'Dumplings Specials', '5.00', 1, '5.00', '2022-09-08 02:49:31', 'Ordered', 'Piash', '01754466100', '190204031@aust.edu', '1st Floor Civil Balcony'),
(53, 'Aust Cheap Pizza', '50.00', 1, '50.00', '2022-09-08 02:56:59', 'Ordered', 'dsf', '01754466100', '12312@aust.edu', 'Ground Floor One Bank'),
(54, 'Aust Cheap Pizza', '50.00', 1, '50.00', '2022-09-08 03:01:23', 'Ordered', 'Ahnaf Samin', '01754466100', '190204031@aust.edu', '6th Floor A Block'),
(55, 'Dumplings Specials', '5.00', 1, '5.00', '2022-09-08 03:01:43', 'Ordered', 'Ahnaf Samin', '01754466100', '190204031@aust.edu', '1st Floor Hawa Bhaban'),
(56, 'Dumplings Specials', '5.00', 1, '5.00', '2022-09-08 03:02:02', 'Ordered', 'Shimul Paul', '01754466100', '12312@aust.edu', '2nd Floor Hawa Bhaban Architecture'),
(57, 'Sadeko Momo', '6.00', 1, '6.00', '2022-09-08 03:02:49', 'Ordered', 'Ahnaf Samin', '01754466100', '99991@aust.edu', '1st Floor Hawa Bhaban'),
(58, 'Sadeko Momo', '6.00', 20, '120.00', '2022-09-08 04:00:15', 'Ordered', 'Ahnaf Samin', '01532415133', '190204031@aust.edu', '7th Floor A Block'),
(59, 'Dumplings Specials', '5.00', 1, '5.00', '2022-09-10 09:56:43', 'Ordered', 'LOLA', '01754466100', '190204041@aust.edu', '7th Floor A Block'),
(60, 'Aust Burger', '60.00', 1, '60.00', '2022-09-11 08:41:59', 'Ordered', 'Austian', '01754466100', '190204031@aust.edu', '7th Floor B Block'),
(61, 'Aust Burger', '60.00', 10, '600.00', '2022-09-12 01:58:34', 'Delivered', 'test order', '01754466100', '190204031@aust.edu', '7th Floor A Block');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
