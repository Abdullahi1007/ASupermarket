-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 03:48 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20168107`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Customer_ID` int(5) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `PostCode` varchar(15) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customer_ID`, `Email`, `Password`, `FirstName`, `LastName`, `PhoneNumber`, `Address`, `PostCode`, `State`) VALUES
(1, 'abdullahi@example.com', '123456789', 'Abdullahi', 'Abdullahi', '07500000000', '100 Curzon Street', 'B7 5HY', 'West Midlands'),
(2, 'number@example.com', '12345678910', 'number', 'one', '07900000000', '15 high street', 'b2 5lp', 'West Midlands');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name_on_card` varchar(100) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `security_code` varchar(55) NOT NULL,
  `total_price` decimal(9,2) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `name_on_card`, `card_number`, `month`, `year`, `security_code`, `total_price`, `created_time`) VALUES
(1, 1, 'Mr A Abdullahi', '65465121564843', 7, 2025, '669', '2.89', '2021-12-05 15:44:28'),
(2, 1, 'mr mohammed abdull', '5465132165451384654', 9, 2026, '325', '3.00', '2021-12-05 15:46:15'),
(3, 2, 'Mr number one', '5684216546521568', 9, 2024, '548', '1.00', '2021-12-05 20:08:44'),
(5, 1, 'Mr Abdullahi Abdullahi', '1234567891234567', 5, 2024, '321', '2.99', '2021-12-05 21:16:42'),
(7, 1, 'Mr Ab Abdullahi', '1234567891123456', 7, 2027, '123', '2.00', '2021-12-05 21:24:32'),
(8, 1, 'Mr Abd Abdullahi', '15346546546548941', 3, 2026, '123', '1.89', '2021-12-07 11:25:32'),
(9, 1, 'Mr A Abdullahi', '6864548946516848453', 6, 2025, '564', '2.00', '2021-12-07 14:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`, `sub_total`) VALUES
(1, 1, 1, '1.00'),
(1, 2, 1, '1.89'),
(2, 5, 1, '3.00'),
(3, 1, 1, '1.00'),
(4, 1, 1, '1.00'),
(4, 2, 1, '1.89'),
(5, 3, 1, '0.99'),
(5, 4, 1, '2.00'),
(6, 2, 1, '1.89'),
(7, 4, 1, '2.00'),
(8, 2, 1, '1.89'),
(9, 4, 1, '2.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(55) NOT NULL,
  `product_price` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_image`, `product_price`) VALUES
(1, 'Milk', 'Semi Skimmed Milk 4 Pints. Halal. Kosher. Suitable for Vegetarians.', 'milk.jpg', '1.00'),
(2, 'Eggs', 'Free Range Eggs 12 pack. Suitable for Vegetarians.', 'egg.jpg', '1.89'),
(3, 'Bread', 'Soft White Bread. Halal. Kosher. Suitable for Vegans. Suitable for Vegetarians.', 'bread.jfif', '0.99'),
(4, 'Orange juice', '1 litre of freshly squeezed orange juice . Not from concentrate. Smooth orange with no bits.', 'orange.jfif', '2.00'),
(5, 'Coco pops', 'Chocolate Flavour Toasted Rice. No artificial colours or sweeteners. Suitable for vegetarians.B', 'cereal.jfif', '3.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_ID`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customer_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
