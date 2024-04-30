-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 01:35 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jusmarkdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `bannerimage` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner`, `bannerimage`, `created_at`, `updated_at`, `date`, `status`) VALUES
(1, 'Groceries', '545840459519475985prod-1.jpg', '2021-01-09 16:14:34', '2021-01-09 16:14:34', '09-Jan-2021', 1),
(2, 'Groceries', '233886573519475985prod-1.jpg', '2021-01-09 16:14:34', '2021-01-09 16:14:34', '09-Jan-2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `brandimage` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `brandimage`, `description`, `created_at`, `updated_at`, `date`, `status`) VALUES
(1, 'Brand I', '321142395434280card.png', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '08-Jan-2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `categoryimage` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `categoryimage`, `description`, `created_at`, `updated_at`, `date`, `status`) VALUES
(1, 'Clothing', '910160344941100983prod-3.jpg', NULL, '2021-01-08 15:16:39', '2021-01-08 15:16:39', '08-Jan-2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pincode` int(15) NOT NULL,
  `profileimage` varchar(255) NOT NULL,
  `groups` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `sex`, `dob`, `mobile`, `state`, `city`, `address`, `pincode`, `profileimage`, `groups`, `created_at`, `updated_at`, `date`, `status`) VALUES
(2, 'Akhtar Parveen', 'akhtar@gmail.com', NULL, 'Male', '2021-01-20', 8417894455, 'Select State', 'Select City', 'HNo 21, Krishna Nagar', 456222, '11390374836.png', NULL, '2021-01-07 13:10:35', '2021-01-07 13:10:35', '07-Jan-2021', 1),
(3, 'Raj Prajapati', 'raj@jusmark.com', NULL, 'Male', '2021-01-18', 9165965325, 'Madhya Preadesh', 'Bhopal', 'raisen road bhopal', 462023, '18947517124.png', NULL, '2021-01-07 13:30:57', '2021-01-07 13:30:57', '07-Jan-2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryboys`
--

CREATE TABLE `deliveryboys` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `pincode` int(15) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `companyowner` varchar(255) NOT NULL,
  `companyaddress` varchar(255) NOT NULL,
  `profileimage` varchar(255) NOT NULL,
  `groups` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `pincode` int(15) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `companyowner` varchar(255) NOT NULL,
  `companyaddress` varchar(255) NOT NULL,
  `profileimage` varchar(255) NOT NULL,
  `groups` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`, `sex`, `dob`, `mobile`, `pincode`, `state`, `city`, `address`, `companyname`, `companyowner`, `companyaddress`, `profileimage`, `groups`, `created_at`, `updated_at`, `date`, `status`) VALUES
(1, 'Raj Prajapati', 'raj@jusmark.com', NULL, 'Male', '2021-01-04', 9165965325, 462023, 'Madhya Pradesh', 'Select City', 'raisen road bhopal', 'JusMark Tech', 'Rahul Rajput', '121, Zone 2, MP Nagar', '5466021902.png', NULL, '2021-01-07 17:18:54', '2021-01-07 17:18:54', '07-Jan-2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `pincode` int(15) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `shopname` varchar(255) NOT NULL,
  `shopowner` varchar(255) NOT NULL,
  `shopaddress` varchar(255) NOT NULL,
  `profileimage` varchar(255) NOT NULL,
  `groups` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`id`, `name`, `email`, `password`, `sex`, `dob`, `mobile`, `pincode`, `state`, `city`, `address`, `shopname`, `shopowner`, `shopaddress`, `profileimage`, `groups`, `created_at`, `updated_at`, `date`, `status`) VALUES
(1, 'Akhtar Parveen', 'akhtar@gmail.com', NULL, 'Male', '2021-01-20', 8417894455, 456222, 'Madhya Pradesh', 'Bhopal', ' HNo 21, Krishna Nagar', 'JAP Enterprises', 'Akhtar Parveen', 'Shop No 21, Krishna Nagar', '10148911348.png', NULL, '2021-01-07 15:34:33', '2021-01-07 15:34:33', '07-Jan-2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `productimage` varchar(255) NOT NULL,
  `catid` int(11) DEFAULT NULL,
  `brid` int(11) DEFAULT NULL,
  `quantity` int(100) NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product`, `productimage`, `catid`, `brid`, `quantity`, `price`, `description`, `created_at`, `updated_at`, `date`, `status`) VALUES
(1, 'Medimix', '2042973833cash.png', 1, 1, 20, 500.00, 'sadsdssdds', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '08-Jan-2021', 1),
(2, 'Medimix', '996890181cash.png', 1, 1, 20, 500.00, 'sadsdssdds', '2021-01-08 13:41:58', '2021-01-08 13:41:58', '08-Jan-2021', 1),
(3, 'Medimix', '139866780prod-big-1.jpg', 1, 1, 1, 500.00, NULL, '2021-01-08 14:32:01', '2021-01-08 14:51:51', '08-Jan-2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `id` int(11) NOT NULL,
  `promo` varchar(255) NOT NULL,
  `promoimage` varchar(255) NOT NULL,
  `discount` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`id`, `promo`, `promoimage`, `discount`, `created_at`, `updated_at`, `date`, `status`) VALUES
(1, 'Half Deal', '1606821843139866780prod-big-1.jpg', '50%', '2021-01-09 15:18:59', '2021-01-09 15:52:00', '09-Jan-2021', 1),
(2, 'Half Deal', '20494277102042973833cash.png', '50%', '2021-01-09 15:28:20', '2021-01-09 15:52:11', '09-Jan-2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service` varchar(255) NOT NULL,
  `serviceimage` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `serviceimage`, `created_at`, `updated_at`, `date`, `status`) VALUES
(1, 'Food Outlets', '1119907326cash.png', '2021-01-09 17:29:30', '2021-01-09 17:29:30', '09-Jan-2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `shop` varchar(255) NOT NULL,
  `shopimage` varchar(255) NOT NULL,
  `manager` varchar(255) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `pincode` bigint(6) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `shop`, `shopimage`, `manager`, `contact`, `pincode`, `city`, `state`, `address`, `created_at`, `updated_at`, `date`, `status`) VALUES
(1, 'Vishal Mega Mart', '8354953182042973833cash.png', 'Suraj', 7894561122, 462023, 'Bhopal', 'Madhya Pradesh', 'raisen road bhopal', '2021-01-08 17:31:40', '2021-01-08 17:31:43', '08-Jan-2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `emailstatus` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `username`, `email`, `message`, `emailstatus`, `created_at`, `updated_at`, `date`, `status`) VALUES
(1, 'Akhtar Parveen', 'akhtar@jusmark.com', 'Testing of Message', 0, '2021-01-09 17:43:00', '2021-01-09 17:43:00', '09-Jan-2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(10) NOT NULL,
  `type` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin@123', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveryboys`
--
ALTER TABLE `deliveryboys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deliveryboys`
--
ALTER TABLE `deliveryboys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
