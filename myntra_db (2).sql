-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 07:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myntra_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresstable`
--

CREATE TABLE `addresstable` (
  `id` int(11) NOT NULL,
  `number` int(10) NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `state` text NOT NULL,
  `fullname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresstable`
--

INSERT INTO `addresstable` (`id`, `number`, `email`, `address`, `city`, `pincode`, `state`, `fullname`) VALUES
(45, 2147483647, 't@mail.com', 'rajkot', 'rajkot', 123456, 'gujarat', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_picture` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `total_items` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_name`, `product_picture`, `price`, `total_price`, `total_items`) VALUES
(141, 25, 'light pink suit for Women', 'images/w10.jpg', '2100', 0, 0),
(143, 23, 'Purple suit with duptta', 'images/i14.jpg', '1000', 0, 0),
(145, 1, 'co-ord set for kids', 'images/b_k1.jpg', '999', 0, 0),
(146, 4, ' round neck brown T-shirt', 'images/t3.jpg', '700', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_name` text NOT NULL,
  `email` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_name`, `email`, `status`) VALUES
('', 'pauljfrnd@jourrapide.com	', 'Active'),
('', 'bryuellen@dayrep.com	', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_path`) VALUES
(3, 'images/j1.jpg'),
(4, 'images/j3.jpg'),
(5, 'images/j6.jpg'),
(6, 'images/j2.jpg'),
(7, 'images/j8.jpg'),
(8, 'images/j7.jpg'),
(9, 'images/insertimagej5.jpg'),
(10, 'images/j4.jpg'),
(14, 'images/p3.webp'),
(15, 'images/men.jpg'),
(16, 'images/i20.jpg'),
(17, 'images/i12.jpg'),
(18, 'images/i15jpg.jpg'),
(19, 'images/i21.jpg'),
(20, 'images/i16.jpg'),
(21, 'images/w10.jpg'),
(22, 'images/i17.jpg'),
(23, 'images/w7.jpg'),
(24, 'images/w1.jpg'),
(25, 'images/w5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kids`
--

CREATE TABLE `kids` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `price` text NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kids`
--

INSERT INTO `kids` (`id`, `description`, `image`, `price`, `category`) VALUES
(1, 'co-ord set for kids', 'images/b_k1.jpg', '1999', 'kids'),
(2, 'co-ord set for kids', 'images/b_k2.jpg', '999', 'kids'),
(3, 'blue shirt for kids', 'images/b_k4.jpg', '999', 'kids'),
(4, 'co-ord set for kids', 'images/b_k4.jpg', '999', 'kids');

-- --------------------------------------------------------

--
-- Table structure for table `men_product`
--

CREATE TABLE `men_product` (
  `p_id` int(11) NOT NULL,
  `price` text NOT NULL,
  `category` text NOT NULL,
  `p_name` text NOT NULL,
  `p_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `men_product`
--

INSERT INTO `men_product` (`p_id`, `price`, `category`, `p_name`, `p_image`) VALUES
(2, '700', 'men', 'Solid Round gray Neck ', 'images/insertimaget1.jpg'),
(3, '700', 'men', 'Solid Round gray Neck ', 'images/insertimagej5.jpg'),
(4, '700', 'men', ' round neck brown T-shirt', 'images/t3.jpg'),
(5, '999', 'men', 'solid V-neck t-shirt', 'images/t5.jpg'),
(6, '999', 'men', 'solid black t-shirt', 'images/t9.jpg'),
(7, '999', 'men', 'co-ord set for kids', 'images/b_j2pg');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `offer_description` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `offer_description`, `discount`) VALUES
(1, '10% Instant Discount on American Express Cards on a min spend of Rs 3,500 TCA 10% Instant Discount on Kotak Credit and Debit cards on a min spend of Rs 3,000 TCA 5% Unlimited Cashback on Flipkart Axis Bank Credit Card TCA 15% Cashback upto Rs 150 on Freec', 0),
(2, '10% Instant Discount on American Express Cards on a min spend of Rs 3,500 TCA 10% Instant Discount on Kotak Credit and Debit cards on a min spend of Rs 3,000 TCA 5% Unlimited Cashback on Flipkart Axis Bank Credit Card TCA 10% Cashback upto Rs 100 on Paytm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` text NOT NULL,
  `product_name` text NOT NULL,
  `product_picture` text NOT NULL,
  `status` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderconfirm`
--

CREATE TABLE `orderconfirm` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `Delivery` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customerName` text NOT NULL,
  `product` text NOT NULL,
  `quantity` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `image`, `price`) VALUES
(23, 'suit', 'Purple suit with duptta', 'images/i14.jpg', '1000'),
(24, 'women suit', 'Yellow kurta suit for Women', 'images/w5.jpg', '1050'),
(25, 'suit', 'light pink suit for Women', 'images/w10.jpg', '2100'),
(26, 'suit', 'Yellow kurta suit for Women', 'images/w7.jpg', '1000'),
(27, 'suit', 'black kurta with dupatta ', 'images/w12.jpg', '1220'),
(28, 'suit', 'light purple kurti for Women', 'images/i21.jpg', '999');

-- --------------------------------------------------------

--
-- Table structure for table `pymenttable`
--

CREATE TABLE `pymenttable` (
  `id` int(11) NOT NULL,
  `Cname` text NOT NULL,
  `Cnumber` int(11) NOT NULL,
  `Expyear` int(11) NOT NULL,
  `Cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pymenttable`
--

INSERT INTO `pymenttable` (`id`, `Cname`, `Cnumber`, `Expyear`, `Cvv`) VALUES
(34, 'dgfchvjtrdfv', 2147483647, 2002, 123),
(35, 'fvyhgujhk', 233456789, 5679, 123);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email_id` varchar(40) DEFAULT NULL,
  `user_password` text DEFAULT NULL,
  `profile_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `username`, `email_id`, `user_password`, `profile_photo`) VALUES
(19, 'tisha123', 'tishabhalani@gmail.com', '$2y$10$ie6FE/Sfdb091/AB7nB8Iet8Oc1jOeO4AKApZLwbgfszKcBo.cmRK', 'dp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registertable`
--

CREATE TABLE `registertable` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile_picture` text NOT NULL,
  `activation_token` varchar(255) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registertable`
--

INSERT INTO `registertable` (`id`, `username`, `email`, `password`, `profile_picture`, `activation_token`, `status`) VALUES
(17, 'bhalani dhruvi', 'dr@mail.com', '$2y$10$ENz1OYMk9fJeraukrCP2.uQDSGs9nL175RQWBXpuLbZiYIHqT3g/m', 'dp.jpg', '07e2b569cc686264f2670b6ed6a187d7', 'active'),
(20, 'tisha', 't@mail.com', '$2y$10$yCq3TDabKvrfh.0sbtQ6zunOUOfdBPdBRNjh78DHAduZewQ9Uox3m', '', '0f821c2a7da2f0bd4360dc1eb3b153ee', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `silder_images`
--

CREATE TABLE `silder_images` (
  `id` int(11) NOT NULL,
  `image_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `silder_images`
--

INSERT INTO `silder_images` (`id`, `image_name`) VALUES
(13, '6607fb918e143i3.jpg'),
(14, '6607fc4f816d5i2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sent_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(256) NOT NULL,
  `otp` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `email`, `sent_time`, `token`, `otp`) VALUES
(19, 'dbhalani742@rku.ac.in', '2024-04-08 04:09:13', 'b12c262400da774e22abb57681364a78eafa67852acd0962556ebb796ff827599fb9d7608847857f6ba8a6b888d4b6954c9a3f3cfd3704a862691c898c52c5da', 313221),
(20, 'dbhalani742@rku.ac.in', '2024-04-08 04:09:35', '253e4b19efa3df68fd48e4ecafe872041a821f67bc5ffcdf2fba99a6fc38f08d74ea9860aaca829c9fad5af8b81dbe9f0cb502cc3b368de58bb1bba11fa8eb10', 753199),
(21, 'dbhalani742@rku.ac.in', '2024-04-08 04:10:52', '00e96a202b1fdf597d54384e6401789a3d11c6b1a38faa138b6e89c41b3d1a59057e96abd33ff582c19b24a9e37227886bdbe4cd9e63f9895356a3ce92809ad3', 788035);

-- --------------------------------------------------------

--
-- Table structure for table `token1`
--

CREATE TABLE `token1` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sent_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(256) NOT NULL,
  `otp` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_picture` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `product_id`, `product_name`, `product_picture`, `price`) VALUES
(187, 23, 'Purple suit with duptta', 'images/i14.jpg', 1000.00),
(192, 1, 'co-ord set for kids', 'images/b_k1.jpg', 999.00);

-- --------------------------------------------------------

--
-- Table structure for table `womenproduct`
--

CREATE TABLE `womenproduct` (
  `Product_Id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Category` char(11) NOT NULL,
  `P_Name` varchar(50) NOT NULL,
  `Product_picture` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `womenproduct`
--

INSERT INTO `womenproduct` (`Product_Id`, `User_id`, `Price`, `Category`, `P_Name`, `Product_picture`) VALUES
(1, 0, 1000, 'women', 'Purple suit with duptta', 'i14.jpg'),
(2, 0, 1020, 'women', 'Yellow kurta suit for Women', 'w5.jpg'),
(3, 0, 1050, 'women', 'Yellow Punjabi Printed suit ', 'w7.jpg'),
(4, 0, 999, 'women', 'Light purple kurti for Women', 'i21.jpg'),
(5, 0, 2220, 'women', 'light pink full suit for Women', 'w10.jpg'),
(6, 0, 1220, 'women', ' black kurta suit with Duppta', 'w12.jpg'),
(7, 0, 1025, 'women', 'white suit for women', 'w1.jpg'),
(8, 0, 3000, 'women', 'Red Printed kurta suit', 'w.jpg'),
(9, 0, 2080, 'women', ' Blue kurta set for Women', 'w8.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresstable`
--
ALTER TABLE `addresstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kids`
--
ALTER TABLE `kids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `men_product`
--
ALTER TABLE `men_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orderconfirm`
--
ALTER TABLE `orderconfirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pymenttable`
--
ALTER TABLE `pymenttable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `registertable`
--
ALTER TABLE `registertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `silder_images`
--
ALTER TABLE `silder_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token1`
--
ALTER TABLE `token1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `womenproduct`
--
ALTER TABLE `womenproduct`
  ADD PRIMARY KEY (`Product_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresstable`
--
ALTER TABLE `addresstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kids`
--
ALTER TABLE `kids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `men_product`
--
ALTER TABLE `men_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `orderconfirm`
--
ALTER TABLE `orderconfirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pymenttable`
--
ALTER TABLE `pymenttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `registertable`
--
ALTER TABLE `registertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `silder_images`
--
ALTER TABLE `silder_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `token1`
--
ALTER TABLE `token1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `womenproduct`
--
ALTER TABLE `womenproduct`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
