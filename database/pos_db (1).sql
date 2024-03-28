-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 03:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoryName` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `isDelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `description`, `isDelete`) VALUES
(1, 'Car', 'a four-wheeled road vehicle that is powered by an engine and is able to carry a small number of people.', 0),
(2, 'Phone', 'oppo, vivo, samsung, iphone', 0),
(3, 'Book', '...', 0),
(4, 'Clothes', 'a fabric formed by weaving, felting', 1),
(5, 'Fruit', ' a mature ovary and its associated parts.', 1),
(6, 'Oscar Ross', 'edit\r\n', 1),
(7, 'ghfgf', 'de', 1),
(8, 'Clothes', 'a fabric formed by weaving, felting', 0),
(9, 'Fruit', ' a mature ovary and its associated parts.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `subprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `orderID`, `productName`, `quantity`, `unitprice`, `subprice`) VALUES
(1, 1, '10001', 1, 580, 580),
(2, 1, '10002', 1, 580, 580),
(3, 2, '10003', 1, 100000, 100000),
(4, 3, '10006', 1, 999, 999),
(5, 4, '10004', 1, 3, 3),
(6, 5, '10006', 1, 999, 999),
(7, 6, '10004', 1, 3, 3),
(8, 7, '10004', 1, 3, 3),
(9, 7, '10006', 1, 999, 999),
(10, 8, '10006', 1, 999, 999),
(11, 9, '10006', 1, 999, 999),
(12, 10, '10003', 2, 100000, 200000),
(13, 11, '10006', 1, 999, 999),
(14, 12, '10006', 2, 999, 1998),
(15, 13, '10012', 5, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(50) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `totalPrice`, `date`, `qty`, `status`) VALUES
(1, 6, 1160, '2024-03-25', 2, 'cash'),
(2, 6, 100000, '2024-03-25', 1, 'cash'),
(3, 1, 999, '2024-03-25', 1, 'cash'),
(4, 1, 3, '2024-03-24', 1, 'online'),
(5, 1, 999, '2024-03-25', 1, 'online'),
(6, 1, 3, '2024-03-25', 1, 'cash'),
(7, 1, 1002, '2024-03-25', 2, 'cash'),
(8, 6, 999, '2024-03-25', 1, 'cash'),
(9, 6, 999, '2024-03-25', 1, 'online'),
(10, 6, 200000, '2024-03-25', 1, 'cash'),
(11, 6, 999, '2024-03-26', 1, 'online'),
(13, 6, 5, '2024-03-27', 1, 'online');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `categoryID` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `createAt` date DEFAULT NULL,
  `expire` date DEFAULT NULL,
  `isDelete` tinyint(1) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `userID`, `categoryID`, `image`, `createAt`, `expire`, `isDelete`, `qty`) VALUES
(1, 'iphone15pro', '10001', 580, 1, 2, '66011178e4387.png', '2024-01-17', '2024-02-14', 0, 11),
(2, 'Vivo12', '10002', 580, 2, 2, '6601119ca2424.png', '2024-03-04', '2024-03-29', 0, 13),
(3, 'Ford Edge 2023', '10003', 100000, 1, 1, '66016fa262272.png', '2024-03-25', '2024-06-08', 0, 0),
(5, 'Samsung Galaxy A54', '10006', 999, 0, 2, '660171fc0fd0d.png', '2024-03-25', '2027-06-05', 0, 8),
(6, 'Raja Fields', '2023100957', 456, 1, 2, '../../assets/products/65ee567c9ad28.png', '2024-03-26', '2024-12-07', 0, 918),
(7, 'Ian Austin', '2023100957', 620, 1, 3, '../../assets/products/65ee567c9ad28.png', '2024-03-26', '2024-06-17', 1, 29),
(15, 'Tesla', '10010', 30000, 1, 1, '../../assets/products/65ee567c9ad28.png', '2024-03-27', '2026-10-13', 0, 5),
(16, 'Nasa shirt', '10011', 5, 1, 4, '../../assets/products/65ee567c9ad28.png', '2024-03-27', '2024-10-04', 0, 30),
(17, 'Banana', '10012', 1, 4, 5, '../../assets/products/65ee567c9ad28.png', '2024-03-27', '2025-10-04', 0, 65);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL,
  `image` varchar(300) NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isDelete` tinyint(1) NOT NULL,
  `pin` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `email`, `phone`, `password`, `role`, `image`, `createAt`, `isDelete`, `pin`) VALUES
(0, 'available', 'available@gmail.com', '(603) 786-903-003', '$2y$10$7Sw1B5JWzexvB.07F9W.i.4XfoNWW7a/TSrAk.m14YAPkBlAhsZdi', 'user', '../../assets/profiles/65ed60412dbd7.png', '2024-03-25 12:43:15', 0, 0),
(1, 'KHAV saroeun', 'pssamsung04@gmail.com', '(855) 010-250-337', '$2y$10$6UfjJlfCl66Q6OS3vxws4.ltfZAo.kPmKpdVs0xdcjdHqi5A/TDCa', 'user', '66022fc919b12.jpg', '2024-03-27 01:57:23', 0, 0),
(2, 'Thida smos sne', 'thida@team.com', '(855) 010-250-337', '$2y$10$AMyb92n28/bknAX0VeDMYeIfBke2ZkcOSRlJuSYPASvqPCDEDYYTy', 'user', '../../assets/profiles/65ed60412dbd7.png', '2024-03-25 05:51:15', 0, 0),
(3, 'Thonda', 'thona@team.com', '(855) 010-250-337', '$2y$10$YXFO4FtESBrrKO45nzvd4elRmmf3wGlZ1R2EwaUaf6jQ94822Pmnu', 'user', '../../assets/profiles/65ed60412dbd7.png', '2024-03-25 05:51:57', 0, 0),
(4, 'rith', 'rith@team.com', '(855) 010-250-337', '$2y$10$TENWYopz8NMQEzb4gYrmp.aJPM0rAnY2MihCj/sEr/Y/0N6BKvNJG', 'user', '../../assets/profiles/65ed60412dbd7.png', '2024-03-25 05:52:41', 0, 0),
(5, 'laty haha', 'laty@team.com', '(855) 010-250-337', '$2y$10$qe49sXQC7JOPW1kdJgRS8eSAOt2u6fSONvrgoF0wQW61uyqkBPjG6', 'user', '../../assets/profiles/65ed60412dbd7.png', '2024-03-25 05:53:13', 0, 0),
(6, 'admin', 'admin@gmail.com', '(855) 010-250-337', '$2y$10$LffuvpKHO1/7Qs4qOjBX3eQSoRMe7j2BELOjgip6g2.3PGrOre4NK', 'admin', '66037b4be7108.jpg', '2024-03-27 01:50:03', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`(100));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
