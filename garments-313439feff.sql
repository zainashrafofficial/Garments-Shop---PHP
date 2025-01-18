-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2025 at 09:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garments-313439feff`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_email` varchar(50) NOT NULL,
  `admin_nameF` varchar(30) NOT NULL,
  `admin_nameL` varchar(30) NOT NULL,
  `admin_mobile` varchar(15) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_email`, `admin_nameF`, `admin_nameL`, `admin_mobile`, `admin_password`) VALUES
('zainashraf@gmail.com', 'Zain', 'Ashraf', '03210000259', 'admin7788');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `req_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `user_email`, `req_quantity`) VALUES
(29, 15, 'user123@gmail.com', 2),
(31, 34, 'user123@gmail.com', 3),
(66, 1, 'zainashraf@gmail.com', 1),
(67, 2, 'zainashraf@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Men\'s Stuff'),
(2, 'Women\'s Stuff'),
(3, 'Kids Stuff');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(15) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `f_email` varchar(50) NOT NULL,
  `f_subject` varchar(50) NOT NULL,
  `f_message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `req_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `cat_id` int(11) NOT NULL,
  `subCat_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `discription` varchar(250) NOT NULL,
  `img_url` varchar(80) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`cat_id`, `subCat_id`, `product_id`, `product_name`, `discription`, `img_url`, `price`, `quantity`) VALUES
(1, 1, 1, 'Brown Shirt', 'Amazing Stuff Brown Color', 'images/men/casual1.jpg', 670, 49),
(1, 1, 2, 'White Shirt', 'Amazing Styles in Large Quantity', 'images/men/casual2.jpg', 899, 48),
(1, 1, 3, 'Sky Blue Shirt', 'Blue shirt , Marvelous stuff', 'images/men/casual3.jpg', 999, 50),
(1, 1, 4, 'Dark Blue Shirt', 'Blue shirts are always Amazing', 'images/men/casual4.jpg', 1100, 50),
(1, 1, 5, 'New Fashion Shirt', 'Stock Available , Lovely Shirts', 'images/men/casual5.jpg', 950, 50),
(1, 1, 6, 'Check Shirt', 'Lovely New 2019 Design Shirt', 'images/men/casual6.jpg', 850, 50),
(1, 2, 8, 'Jeans With Unique Style', 'Amazing Stuff Available, Color Blue', 'images/men/jeans2.jpg', 1200, 30),
(1, 2, 9, 'Jeans Black', 'Jeans Black | Amazing Stuff , Come First , Get First', 'images/men/jeans3.jpg', 999, 25),
(1, 2, 10, 'Lovely Jeans Stuff', 'Lovely Jeans Stuff | Available for short Time, selling Fast, Come Fast', 'images/men/jeans4.jpg', 1650, 50),
(1, 2, 11, 'Army Jeans', 'Jeans Army | Amazing Stuff , Come First , Get First', 'images/men/jeans5.jpg', 1550, 25),
(1, 2, 12, 'Simple Clean Stuff Jeans', 'Jeans Simple Clean | Amazing Stuff , Come First , Get First', 'images/men/jeans6.jpg', 990, 25),
(1, 3, 15, 'Check White T-Shirt', 'Denim T Shirt | Amazing Stuff, Buy one Get One Free', 'images/men/tshirt3.jpg', 670, 25),
(1, 3, 16, 'Colar T-Shirt', 'Denim T Shirt | Amazing Stuff, Buy one Get One Free', 'images/men/tshirt4.jpg', 589, 25),
(1, 3, 17, 'New Design', 'Denim T Shirt | Amazing Stuff, Buy one Get One Free', 'images/men/tshirt5.jpg', 899, 25),
(1, 3, 18, 'Round Neck T-Shirt', 'Denim T Shirt | Amazing Stuff, Buy one Get One Free', 'images/men/tshirt6.jpg', 890, 12),
(1, 4, 22, 'Stylo Footwear', 'Stunning Article, Most Selling, Unique Style & Stuff', 'images/men/foot4.jpg', 890, 19),
(1, 4, 23, 'Blue Shoes', 'Stunning Article, Most Selling, Unique Style & Stuff', 'images/men/foot5.jpg', 990, 20),
(1, 4, 24, 'Black Velvet', 'Stunning Article, Most Selling, Unique Style & Stuff', 'images/men/foot6.jpg', 1440, 24),
(1, 5, 25, 'Sports Watch', 'Good Watch | in Amazing Colors, Good Quality Watches Available in Stock', 'images/men/watch1.jpg', 1780, 40),
(1, 5, 26, 'Classic Watch', 'Good Watch | in Amazing Colors, Good Quality Watches Available in Stock', 'images/men/watch2.jpg', 1550, 30),
(1, 5, 27, 'Office Watch', 'Good Watch | in Amazing Colors, Good Quality Watches Available in Stock', 'images/men/watch3.jpg', 2550, 20),
(1, 5, 28, 'Student Watch', 'Good Watch | in Amazing Colors, Good Quality Watches Available in Stock', 'images/men/watch4.jpg', 799, 20),
(1, 5, 29, 'Brown Watch', 'Good Watch | in Amazing Colors, Good Quality Watches Available in Stock', 'images/men/watch5.jpg', 999, 20),
(1, 5, 30, 'Branded Watch', 'Good Watch | in Amazing Colors, Good Quality Watches Available in Stock', 'images/men/watch6.jpg', 2399, 25),
(2, 6, 33, 'Dress Women', 'Unique Style | Latest Fashioned | Amazing Quantity Available', 'images/women/dress3.jpg', 4099, 25),
(2, 6, 34, 'Dress Women', 'Unique Style | Latest Fashioned | Amazing Quantity Available', 'images/women/dress4.jpg', 5500, 25),
(2, 6, 35, 'Dress Women', 'Unique Style | Latest Fashioned | Amazing Quantity Available', 'images/women/dress5.jpg', 3350, 24),
(2, 6, 36, 'Dress Women', 'Unique Style | Latest Fashioned | Amazing Quantity Available', 'images/women/dress6.jpg', 4550, 25),
(2, 7, 37, 'Churi Pajama | New Design', 'Churi Pajama | New Design | Amazing Quantity available now', 'images/women/churi1.png', 3250, 25),
(2, 7, 38, 'Churi Pajama | New Design', 'Churi Pajama | New Design | Amazing Quantity available now', 'images/women/churi2.png', 4320, 25),
(2, 7, 39, 'Churi Pajama | New Design ', 'Churi Pajama | New Design | Amazing Quantity available now', 'images/women/churi3.png', 4550, 25),
(2, 7, 40, 'Churi Pajama | New Design', 'Churi Pajama | New Design | Amazing Quantity available now', 'images/women/churi4.jpg', 4590, 25),
(2, 7, 41, 'Churi Pajama | New Design', 'Churi Pajama | New Design | Amazing Quantity available now', 'images/women/churi5.jpg', 3360, 25),
(2, 7, 42, 'Churi Pajama | New Design', 'Churi Pajama | New Design | Amazing Quantity available now', 'images/women/churi6.jpg', 3460, 25),
(2, 8, 43, 'Maroon Color | Latest Fashion', 'Latest Fashion | Amazing Stuff & Sole ! A_One Style Available', 'images/women/shoes1.jpg', 2250, 24),
(2, 8, 44, 'Article 77 | Latest Fashion', 'Latest Fashion | Amazing Stuff & Sole ! A_One Style Available', 'images/women/shoes2.jpg', 1440, 25),
(2, 8, 45, 'Black Color | High Heel', 'Latest Fashion | Amazing Stuff & Sole ! A_One Style Available', 'images/women/shoes3.jpg', 1550, 25),
(2, 8, 46, 'Shoes | New Article', 'Latest Fashion | Amazing Stuff & Sole ! A_One Style Available', 'images/women/shoes4.jpg', 1250, 12),
(2, 8, 47, 'Black Color | High Heel', 'Latest Fashion | Amazing Stuff & Sole ! A_One Style Available', 'images/women/shoes5.jpg', 1350, 15),
(2, 8, 48, 'Shoes | New Article', 'Latest Fashion | Amazing Stuff & Sole ! A_One Style Available', 'images/women/shoes6.jpg', 1790, 15),
(2, 9, 82, 'Bridal Necklace', 'Amazing Style, Un-Replaceable , so much variety available in stock!', 'images/women/jewlery2.jpg', 9000, 15),
(2, 9, 83, 'Bridal Complete Set Jewelry', 'Amazing Style, Un-Replaceable , so much variety available in stock!', 'images/women/jewlery4.jpg', 12999, 15),
(2, 9, 84, 'Fashion Set of Jewelry', 'Amazing Style, Un-Replaceable , so much variety available in stock!', 'images/women/jewlery5.jpg', 9500, 15),
(2, 9, 85, 'Jewelry, Office Time', 'Amazing Style, Un-Replaceable , so much variety available in stock!', 'images/women/jewlery6.jpg', 7999, 10),
(2, 9, 86, 'Amazing New Fashion', 'Amazing Style, Un-Replaceable , so much variety available in stock!', 'images/women/jewlery3.jpg', 11999, 15),
(3, 10, 87, 'Guitar Logo, Baby Apparel', 'Smooth Stuff For Smooth Skin, We are always caring for our generation as the mothers...', 'images/kids/baby1.png', 1200, 15),
(3, 10, 88, 'Check, Baby Apparel', 'Smooth Stuff For Smooth Skin, We are always caring for our generation as the mothers...', 'images/kids/baby2.jpg', 1199, 15),
(3, 10, 89, 'Mini Pooper, Baby Apparel', 'Smooth Stuff For Smooth Skin, We are always caring for our generation as the mothers...', 'images/kids/baby3.jpg', 999, 15),
(3, 10, 90, 'White Dotted, Baby Apparel', 'Smooth Stuff For Smooth Skin, We are always caring for our generation as the mothers...', 'images/kids/baby4.jpg', 899, 15),
(3, 10, 91, 'New Year, Baby Apparel', 'Smooth Stuff For Smooth Skin, We are always caring for our generation as the mothers...', 'images/kids/baby5.jpg', 799, 15),
(3, 10, 92, 'Yummy Mummy Baby Apparel', 'Smooth Stuff For Smooth Skin, We are always caring for our generation as the mothers...', 'images/kids/baby6.jpg', 1099, 15),
(3, 11, 94, 'Baby Frawk | Girls Apparel', 'Smooth Stuff For Smooth Skin, We are always caring for our generation as the mothers...', 'images/kids/girls2.jpg', 1299, 15),
(3, 11, 95, 'Pink Sweety | Girls Apparel', 'Smooth Stuff For Smooth Skin, We are always caring for our generation as the mothers...', 'images/kids/girls3.jpg', 1199, 15),
(3, 11, 96, 'Hey Kitty | Girls Apparel', 'Smooth Stuff For Smooth Skin, We are always caring for our generation as the mothers...', 'images/kids/girls4.jpg', 1399, 15),
(3, 11, 97, 'Pretty Girl Frawk | Girls Apparel', 'Smooth Stuff For Smooth Skin, We are always caring for our generation as the mothers...', 'images/kids/girls5.jpg', 1850, 15),
(3, 11, 98, 'Pretty Girl Frawk | Girls Apparel', 'Smooth Stuff For Smooth Skin, We are always caring for our generation as the mothers...', 'images/kids/girls6.jpg', 185021, 15),
(3, 12, 99, 'Fashion 2019 | Boys Apparel', 'Pack of two, Coat with shirt, Dressing Style 2019', 'images/kids/boys1.jpg', 2200, 15),
(3, 12, 100, 'Shirt | Boys Apparel', 'Amazing Stuff , Available in large stock now. All time wash  Guarantee.', 'images/kids/boys2.jpg', 1500, 15),
(3, 12, 101, 'Daishing Shirt+ Jeans | Boys Apparel', 'Amazing Stuff , Available in large stock now. All time wash  Guarantee.', 'images/kids/boys3.jpg', 2499, 13),
(3, 12, 102, 'Party Time | Boys Apparel', 'Amazing Stuff , Available in large stock now. All time wash  Guarantee.', 'images/kids/boys4.jpg', 2499, 13),
(3, 12, 103, 'Shaadi Dressing | Boys Apparel', 'Amazing Stuff , Available in large stock now. All time wash  Guarantee.', 'images/kids/boys5.jpg', 2599, 50),
(3, 12, 104, 'Fish Shirt, Beach | Boys Apparel', 'Amazing Stuff , Available in large stock now. All time wash  Guarantee.', 'images/kids/boys6.jpg', 1299, 0),
(3, 13, 105, 'Racing Car | Kids Toys', 'Super Dooper Japani Stock Sale. Amazing Quality Toys now Available in Amazing price.', 'images/kids/kids1.jpg', 699, 50),
(3, 13, 106, 'Boats Pack | Kids Toys', 'Super Dooper Japani Stock Sale. Amazing Quality Toys now Available in Amazing price.', 'images/kids/kids2.jpg', 399, 50),
(3, 13, 107, 'Train | Kids Toys', 'Super Dooper Japani Stock Sale. Amazing Quality Toys now Available in Amazing price.', 'images/kids/kids3.jpg', 599, 50),
(3, 13, 108, 'Piano | Kids Toys', 'Super Dooper Japani Stock Sale. Amazing Quality Toys now Available in Amazing price.', 'images/kids/kids4.jpg', 350, 50),
(3, 13, 109, 'Box of Toys | Kids Toys', 'Super Dooper Japani Stock Sale. Amazing Quality Toys now Available in Amazing price.', 'images/kids/kids5.jpg', 750, 50),
(3, 13, 110, 'Blocks Toys | Kids Toys', 'Super Dooper Japani Stock Sale. Amazing Quality Toys now Available in Amazing price.', 'images/kids/kids6.jpg', 430, 0),
(1, 3, 115, 'Full Sleeve T-Shirt', 'Superb Stuff | Amazing Quality Available in Large Stock', 'images/men/tshirt1.jpg', 890, 50),
(1, 3, 116, 'Another T-Shirt', 'Superb Stuff | Amazing Quality Available in Large Stock', 'images/men/tshirt2.jpg', 990, 50),
(1, 4, 117, 'Brown Shoes', 'Superb Stuff | Amazing Quality Available in Large Stock', 'images/men/foot1.jpg', 1299, 50),
(1, 4, 118, 'Yummy Black Shoes', 'Superb Stuff | Amazing Quality Available in Large Stock', 'images/men/foot2.jpg', 1300, 50),
(1, 4, 119, 'Black Mixed Blue Sports Shoes', 'Superb Stuff | Amazing Quality Available in Large Stock', 'images/men/foot3.jpg', 1899, 50),
(1, 2, 120, 'Blue Jeans | Fashion 2019', 'Superb Stuff | Amazing Quality Available in Large Stock', 'images/men/jeans1.jpg', 1250, 50),
(2, 6, 121, 'Unique Fabric Dress | Women', 'Superb Stuff | Amazing Quality Available in Large Stock', 'images/women/dress1.jpg', 3250, 50),
(2, 6, 122, 'Unique Fabric Dress New | Women ', 'Superb Stuff | Amazing Quality Available in Large Stock', 'images/women/dress2.jpg', 3850, 50),
(3, 11, 123, 'Apparel | Baby Girls', 'Superb Stuff | Amazing Quality Available in Large Stock', 'images/kids/girls1.jpg', 1250, 50),
(1, 1, 124, 'Flowers', 'asdasd', 'images/men/roses-821705_1920.jpg', 70, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `cat_id` int(11) NOT NULL,
  `subCat_id` int(11) NOT NULL,
  `subCat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`cat_id`, `subCat_id`, `subCat_name`) VALUES
(1, 1, 'Casual Shirts'),
(1, 2, 'Jeans'),
(1, 3, 'T-Shirts'),
(1, 4, 'Footwear'),
(2, 6, 'Dresses'),
(2, 7, 'Churidar Suits'),
(2, 8, 'Shoes'),
(2, 9, 'Artificial Jewelry'),
(3, 10, 'Baby Apparel'),
(3, 11, 'Gilrs Apparel'),
(3, 12, 'Boys Apparel'),
(3, 13, 'Kids Toys');

-- --------------------------------------------------------

--
-- Table structure for table `subcribers`
--

CREATE TABLE `subcribers` (
  `subcriber_id` int(15) NOT NULL,
  `subcriber_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcribers`
--

INSERT INTO `subcribers` (`subcriber_id`, `subcriber_email`) VALUES
(5, 'user123@gmail.com'),
(6, 'testingpoint7788@gmail.com'),
(8, 'ahsuasj@89894'),
(9, 'asjkxnkl@7832'),
(10, 'ajkskaxsjk@8934'),
(11, 'jkjkjklkjklsd@ksdd'),
(12, 'user123@gmaijkalsj'),
(13, 'jasjkas@jksd'),
(14, 'asjkkjas@jkds'),
(15, 'user123@gmail.comkljjkl');

-- --------------------------------------------------------

--
-- Table structure for table `theme_view`
--

CREATE TABLE `theme_view` (
  `id` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `theme_view`
--

INSERT INTO `theme_view` (`id`, `phone_number`) VALUES
(1, '+92 321 0000259');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_email` varchar(50) NOT NULL,
  `user_nameF` varchar(50) NOT NULL,
  `user_nameL` varchar(50) NOT NULL,
  `user_mobile` varchar(15) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_email`, `user_nameF`, `user_nameL`, `user_mobile`, `user_password`) VALUES
('user1234@gmail.com', 'Rana', 'Saleem', '1122 998 7688', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

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
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subCat_id`);

--
-- Indexes for table `subcribers`
--
ALTER TABLE `subcribers`
  ADD PRIMARY KEY (`subcriber_id`);

--
-- Indexes for table `theme_view`
--
ALTER TABLE `theme_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subCat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subcribers`
--
ALTER TABLE `subcribers`
  MODIFY `subcriber_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `theme_view`
--
ALTER TABLE `theme_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
