-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 04:36 AM
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

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Laptop'),
(3, 'Điện Thoại'),
(14, 'Tai Nghe'),
(15, 'Loa');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `user_token` varchar(60) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `isPaid` tinyint(1) NOT NULL DEFAULT 0,
  `delivery_name` varchar(100) NOT NULL,
  `delivery_phone` varchar(10) NOT NULL,
  `delivery_address` varchar(200) NOT NULL,
  `total_price` int(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_token`, `status`, `isPaid`, `delivery_name`, `delivery_phone`, `delivery_address`, `total_price`, `date`) VALUES
(1, 'fBgt0SQgwGeFbUb7fzS8zWbXKJ57PjkrVaY78MkIyZlEPJCsHIcdX1', 'pending', 0, 'Linh', '0396647555', 'Duy Tân', 23000000, '2022-07-20 13:34:02'),
(9, '4PXfYWIQBI4z1tYQSawkJMAlnnqDAkysrBIEf3p6fc5W3Je9', 'pending', 0, 'Long', '0396647444', 'Số 12, đường Phan Đà, phường Bến Thủy', 23000000, '2022-07-20 18:22:21'),
(10, '4PXfYWIQBI4z1tYQSawkJMAlnnqDAkysrBIEf3p6fc5W3Je9', 'pending', 0, 'Long', '0396647444', 'Số 12, đường Phan Đà, phường Bến Thủy', 7900000, '2022-07-20 18:26:46'),
(11, '4PXfYWIQBI4z1tYQSawkJMAlnnqDAkysrBIEf3p6fc5W3Je9', 'pending', 0, 'Long', '0396647444', 'Số 12, đường Phan Đà, phường Bến Thủy', 7900000, '2022-07-20 18:28:56'),
(12, '4PXfYWIQBI4z1tYQSawkJMAlnnqDAkysrBIEf3p6fc5W3Je9', 'pending', 0, 'Long', '0396647444', 'Số 12, đường Phan Đà, phường Bến Thủy', 23000000, '2022-07-20 18:29:10'),
(13, '4PXfYWIQBI4z1tYQSawkJMAlnnqDAkysrBIEf3p6fc5W3Je9', 'pending', 0, 'Long', '0396647444', 'Số 12, đường Phan Đà, phường Bến Thủy', 38800000, '2022-07-20 18:33:52'),
(14, '4PXfYWIQBI4z1tYQSawkJMAlnnqDAkysrBIEf3p6fc5W3Je9', 'pending', 0, 'Long', '0396647444', 'Số 12, đường Phan Đà, phường Bến Thủy', 15800000, '2022-07-20 18:38:33'),
(15, '4PXfYWIQBI4z1tYQSawkJMAlnnqDAkysrBIEf3p6fc5W3Je9', 'pending', 0, 'Long Long', '0396647444', 'Số 12, đường Phan Đà, phường Bến Thủy', 23000000, '2022-07-20 18:49:37'),
(16, '4PXfYWIQBI4z1tYQSawkJMAlnnqDAkysrBIEf3p6fc5W3Je9', 'pending', 0, 'Long', '0396647444', 'Số 12, đường Phan Đà, phường Bến Thủy', 15800000, '2022-07-20 18:52:14'),
(17, '4PXfYWIQBI4z1tYQSawkJMAlnnqDAkysrBIEf3p6fc5W3Je9', 'pending', 0, 'Long', '0396647444', 'Số 12, đường Phan Đà, phường Bến Thủy', 7900000, '2022-07-20 18:56:35'),
(18, 'fBgt0SQgwGeFbUb7fzS8zWbXKJ57PjkrVaY78MkIyZlEPJCsHIcdX1', 'pending', 0, 'Long Le', '0234567891', 'Số 12, đường Phan Đà, phường Bến Thủy', 7900000, '2022-07-20 19:08:35'),
(19, '4PXfYWIQBI4z1tYQSawkJMAlnnqDAkysrBIEf3p6fc5W3Je9', 'pending', 0, 'Long', '0396647444', 'Số 12, đường Phan Đà, phường Bến Thủy', 23000000, '2022-07-20 19:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(20) NOT NULL,
  `orderId` int(20) NOT NULL,
  `qty` int(10) NOT NULL,
  `amount` int(20) NOT NULL,
  `total` int(20) NOT NULL,
  `productId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `orderId`, `qty`, `amount`, `total`, `productId`) VALUES
(1, 1, 1, 23000000, 23000000, 13),
(4, 9, 1, 23000000, 23000000, 13),
(5, 10, 1, 7900000, 7900000, 12),
(6, 11, 1, 7900000, 7900000, 12),
(7, 12, 1, 23000000, 23000000, 13),
(8, 13, 2, 7900000, 15800000, 12),
(9, 13, 1, 23000000, 23000000, 13),
(10, 14, 2, 7900000, 15800000, 12),
(11, 15, 1, 23000000, 23000000, 13),
(12, 16, 2, 7900000, 15800000, 12),
(13, 17, 1, 7900000, 7900000, 12),
(14, 18, 1, 7900000, 7900000, 12),
(15, 19, 1, 23000000, 23000000, 13);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `brand` varchar(66) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL,
  `price` int(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `image2` varchar(500) DEFAULT NULL,
  `image3` varchar(500) DEFAULT NULL,
  `image4` varchar(500) DEFAULT NULL,
  `date` datetime NOT NULL,
  `slag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `description`, `category`, `price`, `quantity`, `image`, `image2`, `image3`, `image4`, `date`, `slag`) VALUES
(12, 'Samsung Galaxy A33 5G 6GB', 'Samsung', 'Samsung Galaxy', 3, 7900000, 30, 'uploads/fJhEVQffMSzEbG0dRa89otrc3gq4QWbJ1aFAMK417c68JEJBrIgWEeIwdcT3.jpg', 'uploads/C18H0CeDZe9fLKb6wyEwiQv9wgjNPKjDDRAyz3r52oTDa5CDbBy4wVoN4ei1.jpg', 'uploads/cCKZ1MsVDiNufC5XPk16WoH87QQUyjorAEEbAMlz9blRFbSh1ZzrVPoB6Xa8.jpg', '', '2022-07-19 19:22:31', 'samsung-galaxy'),
(13, 'Apple MacBook Air M1', 'Apple', 'Macbook Air M1 2020', 1, 23000000, 23, 'uploads/fEM5mPDSZ8MD7onhUXOMASY5R1DYLjqpCsMyUkYFiuUGpwqsz0FF3HQGKQ2Q.jpg', '', '', '', '2022-07-20 02:03:17', 'macbook-air-m1-2020');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting` varchar(30) DEFAULT NULL,
  `value` varchar(2048) DEFAULT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting`, `value`, `type`) VALUES
(1, 'phone_number', '+3867 676636 76373', ''),
(2, 'email', 'info@mywebsite.com', ''),
(3, 'facebook_link', 'https://www.facebook.com', ''),
(4, 'twitter_link', 'https://www.twitter.com', ''),
(5, 'linkedin_link', '', ''),
(6, 'google_plus_link', '', ''),
(7, 'website_link', '', ''),
(8, 'youtube_link', '', ''),
(9, 'contact_info', 'E-Shopper Inc.\r\n\r\n<b>1 Đại Cồ Việt, Hai Bà Trưng, Hà Nội</b>\r\n\r\nMobile: +8412345678\r\n\r\nEmail: info@congngheweb.com', 'textarea');

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` int(11) NOT NULL,
  `header1_text` varchar(20) NOT NULL,
  `header2_text` varchar(30) DEFAULT NULL,
  `text` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `link` varchar(200) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `image2` varchar(500) DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `header1_text`, `header2_text`, `text`, `link`, `image`, `image2`, `disabled`) VALUES
(1, 'GE76 RAIDER', 'I9 11900K-RTX3090', 'Laptop strongest ever', 'http://localhost/web_tech/product', 'uploads/0AujWQltzBanXxIW6wpJ4jwoBh8PaR9AdVBnULk3M85A2gYtorEDFFznYoAQ.jpg', '', 0),
(2, 'IPhone 13', 'Chip Apple A15 Bionic', 'Hiệu năng vượt trội - Chip Apple A15 Bionic mạnh mẽ, hỗ trợ mạng 5G tốc độ cao', 'http://localhost/web_tech/product', 'uploads/0rK93kjmvdeqGMZYcRetvthBwXs6vESFZ7QsMBAo2Gn7j4HQMBo3rKPkebFg.jpg', '', 0),
(3, 'Galaxy Z Fold3', 'Snapdragon 888', 'Thiết kế độc đáo tiện lợi, khẳng định đẳng cấp', 'http://localhost/web_tech', 'uploads/1cLT87YWTqR56v5DhTV1AKjp4qv6ZdgnJoRXO3Guq3u4EKwOFdXXlbgB0Tlr.jpg', '', 0);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_token` (`user_token`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `productId` (`productId`);

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
  ADD KEY `description` (`description`(768)),
  ADD KEY `name` (`name`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disabled` (`disabled`);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_token`) REFERENCES `users` (`token`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
