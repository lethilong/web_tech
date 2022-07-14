-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 04:17 PM
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
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  `description` varchar(200) NOT NULL,
  `brand` varchar(66) NOT NULL,
  `category` int(11) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `image2` varchar(500) DEFAULT NULL,
  `image3` varchar(500) DEFAULT NULL,
  `image4` varchar(500) DEFAULT NULL,
  `date` datetime NOT NULL,
  `slag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `token` varchar(60) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `date` datetime NOT NULL,
  `role` varchar(8) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `token`, `name`, `email`, `phone`, `address`, `password`, `date`, `role`) VALUES
(1, '4PXfYWIQBI4z1tYQSawkJMAlnnqDAkysrBIEf3p6fc5W3Je9', 'Long', 'long@gmail.com', '0396647444', 'Số 12, đường Phan Đà, phường Bến Thủy', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2022-07-07 15:25:09', 'admin'),
(2, 'fBgt0SQgwGeFbUb7fzS8zWbXKJ57PjkrVaY78MkIyZlEPJCsHIcdX1', 'Long Le', 'long1@gmail.com', '0234567891', 'Số 12, đường Phan Đà, phường Bến Thủy', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2022-07-07 15:25:09', 'customer'),
(3, 'Ff8pDcP75EDJTjVz5H', 'Binh', 'binh@gmail.com', '0382374244', '36, Hoàng Quốc Việt', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2022-07-13 02:22:04', 'customer'),
(4, 'OOReLPw8Y2r0ozxIV1GId3Z4TY6AQ4', 'Son', 'son@gmail.com', '0283374244', 'Số 1, Giải Phóng', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2022-07-13 02:24:11', 'customer'),
(5, 'SdKohf0aOjm4D', 'Long', 'long2@gmail.com', '0296647444', '12, Phan Da', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2022-07-13 02:38:26', 'customer'),
(6, 'LaVArrUXcRuo2j', 'Hoai Linh Le', 'linhle@gmail.com', '0975374215', 'Số 12, đường Phan Đà, phường Bến Thủy', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2022-07-13 07:51:26', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slag` (`slag`),
  ADD KEY `date` (`date`),
  ADD KEY `quantity` (`quantity`),
  ADD KEY `price` (`price`),
  ADD KEY `category` (`category`),
  ADD KEY `description` (`description`),
  ADD KEY `token` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `token` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
