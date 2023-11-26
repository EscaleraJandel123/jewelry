-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2023 at 02:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lashopee`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `prod_id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `prize` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int NOT NULL,
  `categories` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `categories`) VALUES
(11, 'Necklace'),
(12, 'Diamond'),
(13, 'Pearl');

-- --------------------------------------------------------

--
-- Table structure for table `prod`
--

CREATE TABLE `prod` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` text NOT NULL,
  `quantity` int NOT NULL,
  `prize` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prod`
--

INSERT INTO `prod` (`id`, `name`, `image`, `description`, `date`, `category`, `quantity`, `prize`) VALUES
(58, 'testing', 'img_656350ee960eb_4.jpg', '123', '2023-11-26 14:06:38', 'Diamond', 1, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int NOT NULL,
  `weight` text NOT NULL,
  `image` text NOT NULL,
  `qty` text NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `weight`, `image`, `qty`, `category`) VALUES
(1, 'dfsf', 'asdfasdfasfas', 2, '21', '', '21', 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `order_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `user_id`, `firstName`, `lastName`, `email`, `number`, `street`, `barangay`, `city`, `zip`, `order_at`) VALUES
(201, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:00:36'),
(202, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:02:26'),
(203, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:11:30'),
(204, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:12:38'),
(205, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:14:20'),
(206, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:14:42'),
(207, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:19:54'),
(208, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:20:07'),
(209, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:24:05'),
(210, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:24:28'),
(211, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:24:44'),
(212, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:25:21'),
(213, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:26:47'),
(214, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:27:45'),
(215, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:28:38'),
(216, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:29:23'),
(217, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:47:07'),
(218, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:49:41'),
(219, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:50:40'),
(220, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:54:40'),
(221, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:56:01'),
(222, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:57:08'),
(223, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:57:10'),
(224, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:57:11'),
(225, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:57:11'),
(226, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:57:12'),
(227, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:57:12'),
(228, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:57:13'),
(229, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:57:13'),
(230, 23, '', '', '', '', '', '', '', '', '2023-11-26 13:57:39'),
(231, 23, '', '', '', '', '', '', '', '', '2023-11-26 14:00:37'),
(232, 23, '', '', '', '', '', '', '', '', '2023-11-26 14:02:28'),
(233, 23, '', '', '', '', '', '', '', '', '2023-11-26 14:02:40'),
(234, 23, '', '', '', '', '', '', '', '', '2023-11-26 14:05:53'),
(235, 23, '', '', '', '', '', '', '', '', '2023-11-26 14:06:55'),
(236, 23, '', '', '', '', '', '', '', '', '2023-11-26 14:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` int NOT NULL,
  `purchase_id` int DEFAULT NULL,
  `Item_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `CustomerId` int NOT NULL,
  `Customer` varchar(100) NOT NULL,
  `quantity` int DEFAULT NULL,
  `prize` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `order_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prod_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `purchase_id`, `Item_image`, `Item_name`, `CustomerId`, `Customer`, `quantity`, `prize`, `total_price`, `order_at`, `prod_id`) VALUES
(200, 236, 'img_656350ee960eb_4.jpg', 'testing', 23, ' ', 2, '1200.00', '2400.00', '2023-11-26 14:15:45', 58),
(201, 236, 'img_656350ee960eb_4.jpg', 'testing', 23, ' ', 2, '1200.00', '2400.00', '2023-11-26 14:15:45', 58);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(23, 'jandeleido@gmail.com', '$2y$10$2AfLHVrLaP9FRXzs1qsHmunOHQ7UJh5wwauBlwTGG0PPBBlMUDhay', 'user'),
(24, 'alejandrogino950@gmail.com', '$2y$10$adUGqOXybvPjMFQmHufIPO0uh9BIQi4nDwFsqAwBPD3oJwkiIzNjm', 'user'),
(25, 'admin@gmail.com', '$2y$10$HOWOnXRztFtEB12saZdGuOrpaV5DgyF.bie8iQtxn83B.LrJ7XM76', 'admin'),
(26, 'jan@gmail.com', '$2y$10$xP.vyVcbdr/HRl/ILET/eeRhaVhgN.FNZigjjBhMSKX.qFBOwygQ.', 'user'),
(28, 'jan@gmail.com', '$2y$10$BXj/iD.5DPLE6FOBQo3FF.wE7p.rr7QdELLV8kg/7KERPu6/MrtcS', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prod`
--
ALTER TABLE `prod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `prod`
--
ALTER TABLE `prod`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD CONSTRAINT `purchase_items_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
