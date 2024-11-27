-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 06:19 AM
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
(50, 2147483647, 'dhruvi@gmail.com', 'in Rku hostel', 'rajkot', 6789, 'gujrat', 'dhruvibhalani'),
(51, 2147483647, 'dhruvi@gmail.com', 'in Rku hostel', 'rajkot', 45678987, 'gujrat', 'dhruvibhalani'),
(52, 2147483647, 'dhruvi@gmail.com', 'in Rku hostel', 'rajkot', 54321, 'gujrat', 'dhruvibhalani'),
(53, 2147483647, 'dhruvi@gmail.com', ' Rku hostel', 'rajkot', 43232, 'gujrat', 'dhruvibhalani');

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
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_name`, `product_picture`, `price`, `quantity`) VALUES
(190, 1, 'co-ord set for kids', 'images/b_k1.jpg', '1999', 1),
(191, 25, 'light pink suit for Women', 'images/w10.jpg', '2100', 1);

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
('', 'bryuellen@dayrep.com	', 'Active'),
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
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `username`, `password`, `role`) VALUES
(1, 'dbhalani742@rku.ac.in', 'dhruvi', '', 'user'),
(2, 'dbhalani742@rku.ac.in', 'dhruvi', 'D7594007b', ''),
(3, 'dhruvi@gmail.com', 'Bhalani', 'D7594007b', ''),
(4, 'dhruvi@gmail.com', 'bhalani', 'D7594007b', ''),
(5, 'dhruvi@gmail.com', 'bhalani', 'D7594007b', ''),
(6, 'dhruvi@gmail.com', 'dhruvi', 'D7594007b', ''),
(7, 'dhruvi@gmail.com', 'dhruvi', 'D7594007b', ''),
(8, 'dhruvi@gmail.com', 'Bhalani', 'D7594007b', ''),
(9, 'dhruvi@gmail.com', 'Bhalani', 'D7594007b', ''),
(10, 'dhruvi@gmail.com', 'Bhalani', 'D7594007b', ''),
(11, 'dhruvi@gmail.com', 'Bhalani', 'D7594007b', ''),
(12, 'dhruvi@gmail.com', 'Bhalani', 'D7594007b', ''),
(13, 'dhruvi@gmail.com', 'Bhalani', 'D7594007b', ''),
(14, 'dhruvi@gmail.com', 'Bhalani', 'D7594007b', ''),
(15, 'dhruvi@gmail.com', 'Bhalani', 'D7594007b', ''),
(16, 'dhruvi@gmail.com', 'Bhalani', 'D7594007b', ''),
(17, 'dhruvi@gmail.com', 'Bhalani', 'D7594007b', ''),
(18, 'dhruvi@gmail.com', 'Bhalani', 'D7594007b', '');

-- --------------------------------------------------------

--
-- Table structure for table `men_products`
--

CREATE TABLE `men_products` (
  `p1_id` int(11) NOT NULL,
  `price` text NOT NULL,
  `category` text NOT NULL,
  `p_name` text NOT NULL,
  `p_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `men_products`
--

INSERT INTO `men_products` (`p1_id`, `price`, `category`, `p_name`, `p_image`) VALUES
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
  `product_id` int(11) NOT NULL,
  `discount_percentage` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`product_id`, `discount_percentage`, `start_date`, `end_date`) VALUES
(2, '10', '2024-05-03', '2024-05-04');

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
-- Table structure for table `order_confirm`
--

CREATE TABLE `order_confirm` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `state` text NOT NULL,
  `fullname` text NOT NULL,
  `card_number` int(11) NOT NULL,
  `exp_year` int(11) NOT NULL,
  `cvv` int(11) NOT NULL,
  `products` text NOT NULL,
  `price` int(11) NOT NULL,
  `product_image` text NOT NULL,
  `delivery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_confirm`
--

INSERT INTO `order_confirm` (`id`, `user`, `number`, `email`, `address`, `city`, `pincode`, `state`, `fullname`, `card_number`, `exp_year`, `cvv`, `products`, `price`, `product_image`, `delivery`) VALUES
(110, 0, 2147483647, 'dhruvi@gmail.com', 'in Rku hostel', 'rajkot', 45678, 'gujrat', 'dhruvibhalani', 0, 0, 0, 'light pink suit for Women', 2100, 'images/w10.jpg', 'Cash on Delivery');

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
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `id` int(8) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(55) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `activation_token` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registertable`
--

INSERT INTO `registertable` (`id`, `username`, `email`, `password`, `profile_picture`, `activation_token`, `status`) VALUES
(38, 'Bhalani', 'dhruvi@gmail.com', '$2y$10$eGwQYZyfST25uT3IV5DE7Ol/iGxvgYRjH17T/jpvPoZhudIaJDEPK', '', 'ef509234402269fb96435a058a2c34b0', 'inactive');

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
(200, 23, 'Purple suit with duptta', 'images/i14.jpg', 1000.00);

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
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `men_products`
--
ALTER TABLE `men_products`
  ADD PRIMARY KEY (`p1_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_confirm`
--
ALTER TABLE `order_confirm`
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
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kids`
--
ALTER TABLE `kids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `men_products`
--
ALTER TABLE `men_products`
  MODIFY `p1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_confirm`
--
ALTER TABLE `order_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

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
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `registertable`
--
ALTER TABLE `registertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `womenproduct`
--
ALTER TABLE `womenproduct`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
