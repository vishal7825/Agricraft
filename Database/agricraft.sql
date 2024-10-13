-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 07:40 AM
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
-- Database: `agricraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `crtno` int(50) NOT NULL,
  `cusid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` double(20,2) NOT NULL,
  `totalprice` double(10,2) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`crtno`, `cusid`, `pid`, `qty`, `price`, `totalprice`, `date`, `status`) VALUES
(125, 1, 5, 5, 140.00, 700.00, '2023-09-01', 'ordered'),
(126, 1, 3, 1, 150.00, 150.00, '2023-09-01', 'ordered'),
(127, 1, 3, 5, 150.00, 750.00, '2023-09-01', 'ordered'),
(128, 1, 3, 6, 150.00, 900.00, '2023-09-09', 'removed'),
(129, 4, 1, 4, 100.00, 400.00, '2023-09-10', 'ordered'),
(130, 4, 2, 5, 100.00, 500.00, '2023-09-10', 'ordered'),
(131, 4, 1, 1, 100.00, 100.00, '2023-09-10', 'ordered'),
(132, 4, 2, 1, 100.00, 100.00, '2023-09-10', 'ordered'),
(133, 4, 2, 1, 100.00, 100.00, '2023-09-10', 'ordered'),
(134, 4, 2, 1, 100.00, 100.00, '2023-09-10', 'ordered'),
(135, 4, 6, 1, 100.00, 100.00, '2023-09-10', 'ordered'),
(136, 4, 27, 1, 80.00, 80.00, '2023-09-10', 'ordered'),
(137, 4, 2, 1, 100.00, 100.00, '2023-09-10', 'ordered'),
(138, 4, 39, 1, 159.00, 159.00, '2023-09-10', 'ordered'),
(139, 1, 2, 4, 100.00, 400.00, '2023-09-10', 'ordered'),
(140, 1, 4, 2, 160.00, 320.00, '2023-09-10', 'ordered'),
(141, 1, 2, 2, 100.00, 200.00, '2023-09-10', 'ordered'),
(142, 1, 5, 2, 29.00, 58.00, '2023-09-10', 'ordered'),
(143, 1, 3, 1, 150.00, 150.00, '2023-09-10', 'ordered'),
(144, 1, 1, 1, 100.00, 100.00, '2023-09-10', 'ordered'),
(145, 1, 2, 1, 100.00, 100.00, '2023-09-10', 'ordered'),
(146, 1, 1, 1, 100.00, 100.00, '2023-09-10', 'ordered'),
(147, 1, 1, 9, 100.00, 900.00, '2023-09-10', 'ordered'),
(148, 4, 1, 1, 100.00, 100.00, '2023-09-10', 'ordered'),
(149, 4, 2, 1, 60.00, 60.00, '2023-09-10', 'ordered'),
(150, 4, 1, 1, 40.00, 40.00, '2023-09-12', 'ordered'),
(151, 4, 5, 2, 29.00, 58.00, '2023-09-12', 'ordered'),
(152, 3, 2, 1, 60.00, 60.00, '2023-09-13', 'ordered'),
(153, 3, 3, 1, 150.00, 150.00, '2023-09-13', 'ordered'),
(154, 3, 3, 1, 150.00, 150.00, '2023-09-13', 'ordered'),
(155, 3, 6, 1, 50.00, 50.00, '2023-09-13', 'removed'),
(156, 3, 4, 2, 160.00, 320.00, '2023-09-13', 'ordered'),
(157, 3, 1, 2, 40.00, 80.00, '2023-09-13', 'ordered'),
(158, 4, 2, 1, 60.00, 60.00, '2023-09-13', 'removed'),
(159, 4, 27, 1, 50.00, 50.00, '2023-09-13', 'ordered'),
(160, 4, 4, 1, 160.00, 160.00, '2023-09-13', 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(2) NOT NULL,
  `cname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`) VALUES
(1, 'fruits'),
(2, 'vegetables'),
(3, 'grains');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `oid` int(10) NOT NULL,
  `cusid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` double(10,2) NOT NULL,
  `totalprice` double(10,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `address` varchar(10000) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`oid`, `cusid`, `pid`, `qty`, `price`, `totalprice`, `date`, `address`, `status`) VALUES
(53, 3, 2, 1, 60.00, 60.00, '2023-09-13 08:08:08', 'chitaliya-jasdan', 'confirmed'),
(54, 3, 3, 1, 150.00, 150.00, '2023-09-13 08:08:16', 'chitaliya-jasdan', 'delivered'),
(55, 3, 1, 18, 40.00, 720.00, '2023-09-13 08:13:09', 'chitaliya-jasdan', 'delivered'),
(56, 3, 27, 1, 50.00, 50.00, '2023-09-13 08:14:28', 'chitaliya-jasdan', 'confirmed'),
(57, 3, 3, 1, 150.00, 150.00, '2023-09-13 08:32:03', 'chitaliya-jasdan', 'ordered'),
(58, 3, 4, 4, 160.00, 640.00, '2023-09-13 08:34:43', 'chitaliya-jasdan', 'ordered'),
(59, 3, 1, 3, 40.00, 120.00, '2023-09-13 08:36:45', 'chitaliya-jasdan', 'delivered'),
(60, 4, 5, 1, 29.00, 29.00, '2023-09-13 08:42:40', 'jasdan', 'delivered'),
(61, 4, 2, 1, 60.00, 60.00, '2023-09-13 08:44:51', 'jasdan', 'canceled'),
(62, 4, 27, 1, 50.00, 50.00, '2023-09-13 08:53:27', 'jasdan', 'confirmed'),
(63, 4, 4, 1, 160.00, 160.00, '2023-09-13 10:50:48', 'jasdan', 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `no` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`no`, `email`, `message`, `date`) VALUES
(14, 'jaypalkukadiya123@gmail.com', 'hiiii', '2023-07-16 13:07:20'),
(15, 'vishubavaliya7763@gmail.com', 'hello,agricraft \r\n\r\n', '2023-09-10 15:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(3) NOT NULL,
  `cid` int(2) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `descr` varchar(1000) NOT NULL,
  `price` double(20,2) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `cid`, `pname`, `descr`, `price`, `photo`) VALUES
(1, 2, 'ladyfinger', 'Okra also commonly known as Lady Finger arrives in the pod, for a fun and unique cooking experience.', 40.00, 'ladyfinger.jpeg'),
(2, 3, 'Bajra', 'Bajra is a strong cereal with many health benefits. Bajra or pearl millet is popular in rural India.', 60.00, 'bajra.png'),
(3, 1, 'green apple', 'Green Apple Granny Smith offers an inherent tart flavour. Its skin is thick, smooth, and bright green.', 150.00, 'greenapple.png'),
(4, 1, 'Orange', 'Oranges are a favourite snack for many people. They can be eaten out-of-hand or used as a garnish.', 160.00, 'orange.png'),
(5, 2, 'Tomato', 'Fresh, and delicious tomatoes are a summertime favourite.', 29.00, 'tomato.png'),
(6, 3, 'Wheat', 'Wheat is for making chapatis, parathas, pastas, and breads.', 50.00, 'wheat.jpg'),
(25, 1, 'Banana', 'The banana may be a simple fruit, but it\'s surprisingly versatile. The process of eating a banana is relatively simple.', 140.00, 'banana.jpeg'),
(26, 3, 'Rice', 'Rice has been an integral part of different rice recipes in every Indian household. ', 40.00, 'rice.jpeg'),
(27, 2, 'Brinjal', 'Brinjal is a terrific vegetable to bring into your weekly cooking rotation.', 50.00, 'brinjal.jpeg'),
(31, 1, 'guava', 'Guava has always been one of the most delicious tropical fruits, recognized worldwide for its flavour. ', 70.00, 'guava.png'),
(32, 1, 'pineapple', 'Pineapples have a tough rind made up of hexagonal units and a fibrous, juicy flesh which may be yellow to white in color.', 75.00, 'pineapple.png'),
(33, 1, 'kiwi', 'Kiwi Green offers a sharp, sweet, and tart flavour with a slight acidic edge. It is refreshingly juicy.', 800.00, 'kiwi.png'),
(34, 3, 'barley', 'Good Life Barley is hygienically packed and is very delicious.', 220.00, 'barley.png'),
(35, 2, 'cabbage', 'Cabbage is your secret weapon for any recipe that needs a handful of leafy greens. ', 30.00, 'cabbage.png'),
(36, 2, 'green chilli', 'Add a dash of spice to your food with the much loved Green Chillies. Green Chillies add a tanginess to the dish, which you cannot get from any other vegetable.', 80.00, 'greenchili.png'),
(37, 2, 'corn', 'Also known as Maize, Sweet Corn is a cereal grain that originates from the Mexican region. ', 48.00, 'corn.png'),
(38, 3, 'popcorn maize', 'Popcorn maize is a variety of corn kernel, which expands and puffs up when heated.', 140.00, 'popcorn_maize.png'),
(39, 3, 'multigrain flour', 'Multigrain Atta (Multigrain Flour) is specially formulated with mix of grain', 159.00, 'multigrain_floar.png');

-- --------------------------------------------------------

--
-- Table structure for table `regis`
--

CREATE TABLE `regis` (
  `cusid` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mno` bigint(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `pcode` int(6) NOT NULL,
  `role` varchar(10) NOT NULL,
  `image` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regis`
--

INSERT INTO `regis` (`cusid`, `name`, `mno`, `email`, `pass`, `addr`, `pcode`, `role`, `image`) VALUES
(1, 'Agricraft', 7878787878, 'agricraft@gmail.com', '12121212', 'chitaliya road,jasdan', 360050, 'admin', NULL),
(3, 'jaypal kukadiya', 7878271131, 'jaypalkukadiya905@gmail.com', '12121212', 'chitaliya-jasdan', 360060, 'buyer', NULL),
(4, 'vishal', 7567770162, 'vishubavaliya7763@gmail.com', '14714714', 'jasdan', 360050, 'buyer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`name`, `email`, `address`, `city`, `pincode`) VALUES
('asd', 'agricraft@gmail.com', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 'jasdan', 121212),
('jaypal', 'jaypalkukadiya905@gmail.com', 'chitaliya road jasdan', 'jasdan', 360050),
('jaypal', 'vishubavaliya7763@gmail.com', 'chitaliya road jasdan', 'jasdan', 121212);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `pid` int(5) NOT NULL,
  `qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`pid`, `qty`) VALUES
(1, 27),
(2, 17),
(3, 8),
(4, 6),
(5, 26),
(6, 12),
(25, 20),
(26, 18),
(27, 12),
(31, 30),
(32, 57),
(33, 53),
(34, 67),
(35, 87),
(36, 65),
(37, 69),
(38, 65),
(39, 87);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`crtno`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD UNIQUE KEY `pid` (`pid`),
  ADD UNIQUE KEY `pid_2` (`pid`) USING BTREE,
  ADD KEY `cat` (`cid`);

--
-- Indexes for table `regis`
--
ALTER TABLE `regis`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `cid` (`cusid`) USING BTREE;

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD UNIQUE KEY `pid_2` (`pid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `crtno` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `oid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `regis`
--
ALTER TABLE `regis`
  MODIFY `cusid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `pid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `cat` FOREIGN KEY (`cid`) REFERENCES `category` (`cid`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_pr` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
