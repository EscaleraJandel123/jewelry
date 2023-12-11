-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2023 at 07:03 PM
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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `prod_id`, `user_id`, `name`, `image`, `quantity`, `prize`) VALUES
(137, 63, 29, 'Whispering Willow Pendant', 'img_656409b878ac8_pendamnt.jpg', 3, 30);

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
(15, 'Earrings'),
(16, 'Ring'),
(17, 'Tiara'),
(18, 'Watch'),
(19, 'Bracelet');

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
(62, 'Celestial Cascade Earrings', 'img_6567e794252fb_modern-brilliance-asymmetrical-sapphire-wedding-ring-platinum_941561-1995.jpg', ' Earrings', '2023-11-27 03:13:27', 'Necklace', 100, 1200),
(63, 'Whispering Willow Pendant', 'img_656409b878ac8_pendamnt.jpg', 'A nature-inspired pendant shaped like a graceful willow tree, with intricate branches and leaves that evoke a sense of serenity.', '2023-11-27 03:15:04', 'Necklace', 99, 1300),
(65, 'Ethereal Eclipse Tiara', 'img_65640a760e8ea_tiara.avif', 'A regal tiara inspired by the celestial beauty of a solar eclipse, with delicate details that exude an ethereal and enchanting aura.', '2023-11-27 03:18:14', 'Necklace', 100, 1500),
(66, 'Adorned Amethyst Pocket Watch', 'img_65640b0178bec_watch.jpeg', 'A vintage-style pocket watch adorned with a deep purple amethyst, adding a touch of sophistication to both casual and formal attire', '2023-11-27 03:20:33', 'Watch', 98, 1200),
(67, 'Mystic Moonstone Ring', 'img_65640b99147ef_ring2.webp', 'A captivating ring featuring a shimmering moonstone, known for its ethereal glow, surrounded by intricate silver or gold detailing', '2023-11-27 03:22:28', 'Ring', 100, 1600),
(68, 'Whirlwind Opal Cluster Ring', 'img_65640bd511805_ring 3.webp', 'A statement ring with a cluster of opals arranged in a swirling design, reminiscent of a mesmerizing whirlwind', '2023-11-27 03:24:05', 'Ring', 100, 1400),
(69, 'Eternal Love Knot Ring', 'img_65640c0b51912_ring3.png', 'A symbolic ring with an eternal love knot design, representing the unbreakable bond and commitment between two individuals', '2023-11-27 03:24:59', 'Ring', 100, 1500),
(70, 'Lunar Lapis Lazuli Bracelet', 'img_65640cac0c81f_brace.jpg', 'A bracelet adorned with lapis lazuli beads, each representing a moonlit night sky, bringing a sense of calm and celestial beauty', '2023-11-27 03:27:40', 'Bracelet', 100, 1600);

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

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `compAdd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `payment` varchar(255) NOT NULL,
  `order_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `user_id`, `fullname`, `email`, `number`, `compAdd`, `payment`, `order_at`) VALUES
(238, 23, 'Jandel', 'jandeleido@gmail.com', '09366581432', 'St. Pagkakaisa', '', '2023-11-27 03:30:43'),
(239, 23, 'Jandel', 'jandeleido@gmail.com', '123', 'Str132', '', '2023-11-27 03:33:18'),
(240, 23, 'Jandel L. Escalera', 'jandeleido@gmail.com', '09366581432', 'Sitio Pagkakaisa, Lumangbayan, Calapan City', '', '2023-11-28 09:50:52'),
(241, 23, 'Jandel L. Escalera', 'jandeleido@gmail.com', '09366581432', 'Sitio Pagkakaisa, Lumangbayan, Calapan City', '', '2023-11-28 10:08:31'),
(242, 24, 'Alejandro Gino', 'alejandrogino950@gmail.com', '09366581432', 'Lumangbayan Calapan City', '', '2023-11-30 01:07:20'),
(243, 23, 'Jandel L. Escalera', 'jandeleido@gmail.com', '09366581432', 'Sitio Pagkakaisa, Lumangbayan, Calapan City', '', '2023-11-30 01:26:39'),
(244, 23, 'Jandel L. Escalera', 'jandeleido@gmail.com', '09366581432', 'Sitio Pagkakaisa, Lumangbayan, Calapan City', '', '2023-11-30 01:27:02'),
(245, 23, 'Jandel L. Escalera', 'jandeleido@gmail.com', '09366581432', 'Sitio Pagkakaisa, Lumangbayan, Calapan City', 'paypal', '2023-12-10 17:19:56'),
(246, 23, 'Jandel L. Escalera', 'jandeleido@gmail.com', '09366581432', 'Sitio Pagkakaisa, Lumangbayan, Calapan City', '', '2023-12-10 17:39:00');

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
  `prod_id` int DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `purchase_id`, `Item_image`, `Item_name`, `CustomerId`, `Customer`, `quantity`, `prize`, `total_price`, `order_at`, `prod_id`, `status`) VALUES
(208, 240, 'img_65640c0b51912_ring3.png', 'Eternal Love Knot Ring', 23, 'Jandel L. Escalera', 1, '1500.00', '1500.00', '2023-11-28 09:50:52', 69, 'Pending'),
(209, 241, 'img_656409b878ac8_pendamnt.jpg', 'Whispering Willow Pendant', 23, 'Jandel L. Escalera', 10, '30.00', '300.00', '2023-11-28 10:08:31', 63, 'Pending'),
(210, 242, 'img_65640b0178bec_watch.jpeg', 'Adorned Amethyst Pocket Watch', 24, 'Alejandro Gino', 3, '1200.00', '3600.00', '2023-11-30 01:07:20', 66, 'Pending'),
(214, 245, 'img_656409b878ac8_pendamnt.jpg', 'Whispering Willow Pendant', 23, 'Jandel L. Escalera', 1, '1300.00', '1300.00', '2023-12-10 17:19:56', 63, 'Pending'),
(215, 246, 'img_65640b0178bec_watch.jpeg', 'Adorned Amethyst Pocket Watch', 23, 'Jandel L. Escalera', 2, '1200.00', '2400.00', '2023-12-10 17:39:00', 66, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `compAdd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `fullname`, `compAdd`, `number`) VALUES
(23, 'jandeleido@gmail.com', '$2y$10$xs4o8Cr/n19QKD1u/hi8fuqZmn5fgayzcFbjZ3/D3BhuqPnr9WKfS', 'user', 'Jandel L. Escalera', 'Sitio Pagkakaisa, Lumangbayan, Calapan City', '09366581432'),
(24, 'alejandrogino950@gmail.com', '$2y$10$adUGqOXybvPjMFQmHufIPO0uh9BIQi4nDwFsqAwBPD3oJwkiIzNjm', 'user', 'Alejandro Gino', 'Lumangbayan Calapan City', '09366581432'),
(25, 'admin@gmail.com', '$2y$10$HOWOnXRztFtEB12saZdGuOrpaV5DgyF.bie8iQtxn83B.LrJ7XM76', 'admin', '', '', ''),
(26, 'jan@gmail.com', '$2y$10$xP.vyVcbdr/HRl/ILET/eeRhaVhgN.FNZigjjBhMSKX.qFBOwygQ.', 'user', '', '', ''),
(28, 'jan@gmail.com', '$2y$10$BXj/iD.5DPLE6FOBQo3FF.wE7p.rr7QdELLV8kg/7KERPu6/MrtcS', 'user', '', '', ''),
(29, 'adley@gmail.com', '$2y$10$WeFoFplsh.76QAoCdikcWeZ8UG/4BYYkI5IwEDqHv3BvzEUSp4bqK', 'user', NULL, NULL, NULL);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `prod`
--
ALTER TABLE `prod`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
