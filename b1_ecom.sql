-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 06:24 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b1_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Break'),
(2, 'Lunch'),
(3, 'Dinne');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `price` float(10,2) NOT NULL,
  `description` char(100) NOT NULL,
  `image` char(235) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `description`, `image`, `category_id`) VALUES
(10, 'Cake', 60.00, 'aha', '../assets/images/tiger-transparent-png.png', 1),
(11, 'haha', 50.00, '20', '../assets/images/Tiger_Milk_Mushroom.png', 1),
(12, 'Bababa', 10.00, 'la', '../assets/images/78676879_2768986573152956_7634802438817447936_n.jpg', 1),
(13, 'running', 20.00, 'ds', '../assets/images/3-8-01.png', 1),
(14, 'dwq', 899.00, 'qeqwdq', '../assets/images/3-4-01.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_order`
--

CREATE TABLE `item_order` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_order`
--

INSERT INTO `item_order` (`id`, `item_id`, `order_id`, `quantity`) VALUES
(54, 10, 63, '3'),
(55, 10, 64, '2');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` float(10,2) NOT NULL,
  `date_purchased` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isPaypal` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `date_purchased`, `isPaypal`) VALUES
(14, 2, 9744.00, '2020-09-29 06:51:04', 0),
(15, 2, 1624.00, '2020-09-29 07:37:26', 0),
(16, 3, 2436.00, '2020-09-29 08:19:16', 0),
(17, 3, 1624.00, '2020-09-30 06:57:41', 0),
(18, 3, 812.00, '2020-09-30 07:01:47', 0),
(19, 3, 1624.00, '2020-09-30 08:00:30', 0),
(20, 3, 812.00, '2020-09-30 08:01:05', 0),
(21, 3, 2436.00, '2020-09-30 08:08:33', 0),
(22, 3, 2436.00, '2020-09-30 08:09:26', 0),
(23, 3, 0.00, '2020-09-30 08:21:47', 0),
(24, 3, 0.00, '2020-09-30 08:23:44', 0),
(25, 3, 0.00, '2020-09-30 08:23:49', 0),
(26, 3, 0.00, '2020-09-30 08:27:36', 0),
(27, 3, 0.00, '2020-09-30 08:28:22', 0),
(28, 3, 0.00, '2020-09-30 08:29:03', 0),
(29, 3, 0.00, '2020-09-30 08:33:13', 0),
(30, 3, 0.00, '2020-09-30 08:33:43', 0),
(31, 3, 0.00, '2020-09-30 08:35:03', 0),
(32, 3, 0.00, '2020-09-30 08:36:41', 0),
(33, 3, 0.00, '2020-09-30 08:37:24', 0),
(34, 3, 0.00, '2020-09-30 08:37:24', 0),
(35, 3, 0.00, '2020-09-30 08:37:25', 0),
(36, 3, 0.00, '2020-09-30 08:37:25', 0),
(37, 3, 0.00, '2020-09-30 08:37:25', 0),
(38, 3, 0.00, '2020-09-30 08:40:03', 0),
(39, 3, 0.00, '2020-09-30 08:40:51', 0),
(40, 3, 3248.00, '2020-09-30 08:41:39', 1),
(41, 3, 4060.00, '2020-09-30 08:42:01', 1),
(42, 3, 1624.00, '2020-09-30 08:42:36', 1),
(43, 3, 0.00, '2020-09-30 08:44:33', 0),
(44, 3, 1624.00, '2020-09-30 08:44:53', 0),
(45, 3, 2436.00, '2020-09-30 08:45:19', 0),
(46, 3, 1624.00, '2020-09-30 08:45:45', 0),
(47, 3, 3248.00, '2020-09-30 08:46:02', 0),
(48, 3, 3248.00, '2020-09-30 08:46:35', 0),
(49, 3, 3248.00, '2020-09-30 08:46:45', 0),
(50, 3, 3248.00, '2020-09-30 08:46:46', 0),
(51, 3, 3248.00, '2020-09-30 08:47:15', 0),
(52, 3, 3248.00, '2020-09-30 08:48:09', 0),
(53, 3, 3248.00, '2020-09-30 08:48:09', 0),
(54, 3, 3248.00, '2020-09-30 08:48:10', 0),
(55, 3, 3248.00, '2020-09-30 08:48:10', 0),
(56, 3, 3248.00, '2020-09-30 08:48:10', 0),
(57, 3, 0.00, '2020-09-30 08:48:32', 0),
(58, 3, 0.00, '2020-09-30 08:48:33', 0),
(59, 3, 0.00, '2020-09-30 08:48:33', 0),
(60, 3, 0.00, '2020-09-30 08:48:33', 0),
(61, 3, 3248.00, '2020-09-30 08:49:43', 0),
(62, 3, 270396.00, '2020-09-30 08:50:18', 1),
(63, 12, 180.00, '2020-10-02 03:43:50', 0),
(64, 12, 120.00, '2020-10-02 03:45:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `isAdmin`) VALUES
(2, 'Choo', 'Tze Sien', 'sienchoo', 'chootzesien@gmail.com', '4a0de66e3b27cdac79275ade1bfa6d3887d17922', 1),
(3, 'CHOO', 'SIEN', 'ctsctscts', 'chootzesien@gmail.com', 'bf4191e2d3630b54d8393f957fac6c8ff9ba705a', 0),
(4, 'CHOO', 'SIEN', 'bacani123', 'chootzesien@gmail.com', 'cb2f98588da382ca24471e59977b5fbd38cdc151', 0),
(5, 'CHOO', 'SIEN', 'bacani123', 'chootzesien@gmail.com', 'cb2f98588da382ca24471e59977b5fbd38cdc151', 0),
(6, 'CHOO', 'SIEN', 'bacani123', 'chootzesien@gmail.com', 'cb2f98588da382ca24471e59977b5fbd38cdc151', 0),
(7, 'CHOO', 'SIEN', 'ctsctscts', 's1i2e3n4c5h6o7o@gmail.com', 'bf4191e2d3630b54d8393f957fac6c8ff9ba705a', 0),
(8, 'CHOO', 'SIEN', 'sienchoo', 'felix@tfro.com', '7a38cbf61b938999f576a10a26c888439618f02f', 0),
(9, 'CHOO', 'SIEN', 'ctsctscts', 'chootzesienwwdwd@gmail.com', 'd7aa23fb715cac74faa6bed211b11c9af8032d58', 0),
(10, 'Choo', 'Tze Sien', 'sienchoo', 'choots-pg17@student.tarc.edu.my', '2531276cfc175b2c00cc6405244d3bb7a2bf83a7', 0),
(11, 'Choo', 'Tze Sien', 'sienchoo', 'choots-pg17@student.tarc.edu.my', '2531276cfc175b2c00cc6405244d3bb7a2bf83a7', 0),
(12, 'Forward ', 'School', 'forwardschool', 'sienchoo@gmail.com', 'c873573a08a50000feb14ab23f0bcf0f5507c1e7', 1),
(18, 'CHOO', 'SIEN', 'ctsctsctscts', 'chootzesien1111@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_ibfk_1` (`category_id`);

--
-- Indexes for table `item_order`
--
ALTER TABLE `item_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_order_ibfk_1` (`item_id`),
  ADD KEY `item_order_ibfk_2` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `item_order`
--
ALTER TABLE `item_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_order`
--
ALTER TABLE `item_order`
  ADD CONSTRAINT `item_order_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_order_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
