-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 02:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `order_count` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `menuid`, `order_count`, `size`, `total`) VALUES
(125, 50, 28, 1, '', 100),
(132, 50, 26, 1, '', 30),
(133, 50, 54, 1, '', 70),
(134, 50, 28, 6, '', 600),
(135, 51, 62, 1, '', 100),
(136, 51, 55, 1, '', 70),
(137, 51, 56, 1, '', 30),
(138, 51, 61, 4, '', 400),
(139, 51, 58, 1, '', 20),
(140, 51, 26, 1, '', 30),
(141, 51, 55, 1, '', 70),
(145, 52, 60, 1, '', 100),
(149, 55, 60, 1, '', 100),
(150, 40, 26, 4, '', 120),
(151, 40, 57, 2, '', 60),
(152, 50, 61, 3, '', 300),
(155, 55, 65, 1, '', 200),
(156, 55, 26, 1, '', 30),
(157, 55, 67, 4, '', 300),
(158, 55, 64, 4, '', 388),
(159, 56, 65, 4, '', 800);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `userid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`userid`, `menuid`) VALUES
(52, 60),
(40, 57),
(50, 61),
(55, 67),
(56, 65);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Pending',
  `time_send` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `message`, `status`, `time_send`) VALUES
(11, 'Johnrex Bautista', 'johnrexgerard03@gmail.com', 2147483647, 'Concern', 'Masyado nyo naman sinarapan sa milktea', 'accepted', '2023-02-08 08:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` varchar(50) NOT NULL,
  `category` varchar(120) NOT NULL,
  `prices` float NOT NULL,
  `stocks` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `category`, `prices`, `stocks`, `discount`, `image`, `status`) VALUES
(26, 'Buffalo Wings', '12pc. Hot and Spicy Buffalo wings', 'Foods', 30, 95, 0, '277562702_4962793860424383_8903278954933402441_n.jpg', 'Available'),
(28, 'Ube Halaya Milktea', 'Teatime\'s Newly Ube Halaya Milktea.', 'Milktea', 100, 0, 0, '277579085_4962793920424377_3659415690650629557_n.jpg', 'out of stock'),
(32, 'Teatime Fries', 'Teatime Original Fries with less salt.', 'Adds', 75, 0, 0, 'pexels-valeria-boltneva-1893556.jpg', 'out of stock'),
(54, 'Crushed Oreo', 'TeaTime Add Ons', 'Adds', 70, 46, 0, 'Crushed Oreo.jpg', 'Available'),
(55, 'Mayonnaise Dip', 'TeaTime Add Ons', 'Adds', 70, 48, 0, 'Mayonnaise Dip.jpg', 'Available'),
(56, 'Pearl', 'TeaTime Add Ons', 'Adds', 30, 93, 0, 'Pearl.jpg', 'Available'),
(57, 'Rice', 'TeaTime Add Ons', 'Adds', 30, 98, 0, 'Rice.jpg', 'Available'),
(58, 'Bottled Water', 'TeaTime Add Ons', 'Adds', 20, 47, 0, 'Bottled Water.jpg', 'Available'),
(59, 'Fettuccine Alfredo Pasta', 'Fettuccine Alfredo Pasta comes with a 2% discount!', 'Foods', 199, 50, 2, 'Fettuccine Alfredo.png', 'Available'),
(60, 'Garlic Parmesan Wings', 'TeaTime Foods', 'Milktea', 100, 49, 0, 'Garlic Parmesan Chicken Wings.jpg', 'Available'),
(61, 'Taro Milk Tea', 'TeaTime Milk Tea', 'Milktea', 100, 50, 0, 'Taro Milk Tea.jpg', 'Available'),
(62, 'Chocolate Milk Tea', 'TeaTime Milk Tea', 'Milktea', 100, 50, 0, 'Chocolate Milk Tea.jpg', 'Available'),
(63, 'Okinawa Milk Tea', 'Newly Release', 'Milktea', 100, 50, 0, 'Okinawa Milk Tea.jpg', 'Available'),
(64, 'Green Tea Latte', 'Newly Release 3% off', 'Milktea', 100, 50, 3, 'Green Tea Latte.jpg', 'Available'),
(65, 'Loaded Cheese Fries', 'Newly Release', 'Foods', 200, 50, 0, 'Chicken Bacon Ranch Loaded Cheese Fries.jpg', 'Available'),
(66, 'Creamy Mushroom Pasta', 'Newly Release', 'Foods', 100, 50, 0, 'Creamy Mushroom Pasta.png', 'Available'),
(67, 'Cola 1.5', 'Coka Cola 1.5', 'Adds', 75, 96, 0, 'Coca-Cola 1.5.jpg', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `proof` text NOT NULL,
  `total` int(11) NOT NULL,
  `state` varchar(50) NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`cartid`, `userid`, `menuid`, `name`, `reference`, `proof`, `total`, `state`, `created_at`, `updated_at`) VALUES
(125, 50, 28, '', '', '', 100, 'approved', '2023-02-08 03:06:38', '2023-02-07 13:28:31'),
(125, 50, 28, '', '', '', 100, 'approved', '2023-02-08 03:06:42', '2023-02-07 13:28:31'),
(132, 50, 26, 'Johnrex Bautista', '019388475749', 'qr.jpg', 30, 'Cancelled', '2023-02-07 13:08:01', '2023-02-07 18:46:06'),
(133, 50, 54, 'Johnrex Bautista', '019388475749', 'qr.jpg', 70, 'approved', '2023-02-07 13:20:18', '2023-02-07 13:22:32'),
(134, 50, 28, 'Johnrex Bautista', '019388475749', 'qr.jpg', 100, 'approved', '2023-02-07 13:27:35', '2023-02-07 13:28:31'),
(134, 50, 28, 'Johnrex Bautista', '019388475749', 'qr.jpg', 600, 'approved', '2023-02-07 13:27:35', '2023-02-07 13:28:31'),
(149, 55, 61, 'Johnrex Bautista', '019388475749', '328786959_3329047530745838_6222720862107255246_n.jpg', 400, 'Cancelled', '2023-02-07 18:32:19', '2023-02-07 18:32:29'),
(149, 55, 60, 'Johnrex Bautista', '019388475749', '328786959_3329047530745838_6222720862107255246_n.jpg', 100, 'approved', '2023-02-07 18:32:19', '2023-02-07 18:34:23'),
(149, 55, 61, 'Johnrex Bautista', '019388475749', '328786959_3329047530745838_6222720862107255246_n.jpg', 200, 'Cancelled', '2023-02-07 18:32:19', '2023-02-07 18:32:29'),
(149, 55, 61, 'Johnrex Bautista', '019388475749', '328786959_3329047530745838_6222720862107255246_n.jpg', 100, 'Cancelled', '2023-02-07 18:32:19', '2023-02-07 18:32:29'),
(149, 55, 60, 'Johnrex Bautista', '019388475749', '328786959_3329047530745838_6222720862107255246_n.jpg', 100, 'approved', '2023-02-07 18:32:19', '2023-02-07 18:34:23'),
(150, 40, 26, 'Johnrex Bautista', '019388475749', 'qr.jpg', 30, 'Cancelled', '2023-02-07 18:45:04', '2023-02-07 18:46:06'),
(150, 40, 26, 'Johnrex Bautista', '019388475749', 'qr.jpg', 30, 'Cancelled', '2023-02-07 18:45:04', '2023-02-07 18:46:06'),
(150, 40, 26, 'Johnrex Bautista', '019388475749', 'qr.jpg', 120, 'Cancelled', '2023-02-07 18:45:04', '2023-02-07 18:46:06'),
(151, 40, 57, 'Johnrex Bautista', '019388475749', 'qr.jpg', 60, 'Cancelled', '2023-02-07 18:47:32', '2023-02-08 00:54:09'),
(152, 50, 61, 'Johnrex Bautista', '019388475749', 'qr.jpg', 400, 'Order Ready', '2023-02-07 18:52:17', '2023-02-08 00:49:25'),
(152, 50, 61, 'Johnrex Bautista', '019388475749', 'qr.jpg', 200, 'Order Ready', '2023-02-07 18:52:17', '2023-02-08 00:49:25'),
(152, 50, 61, 'Johnrex Bautista', '019388475749', 'qr.jpg', 100, 'Order Ready', '2023-02-07 18:52:17', '2023-02-08 00:49:25'),
(152, 50, 61, 'Johnrex Bautista', '019388475749', 'qr.jpg', 300, 'Order Ready', '2023-02-07 18:52:17', '2023-02-08 00:49:25'),
(153, 55, 57, 'Johnrex Bautista', '019388475749', 'qr.jpg', 60, 'Cancelled', '2023-02-07 18:57:29', '2023-02-08 00:54:09'),
(153, 55, 57, 'Johnrex Bautista', '019388475749', 'qr.jpg', 60, 'Cancelled', '2023-02-07 18:57:29', '2023-02-08 00:54:09'),
(155, 55, 65, 'Johnrex Bautista', '019388475749', '328786959_3329047530745838_6222720862107255246_n.jpg', 200, 'Order Ready', '2023-02-08 00:55:54', '2023-02-15 07:09:42'),
(156, 55, 26, 'test2', '8947512680695', 'writing.png', 30, 'approved', '2023-02-08 01:10:51', '2023-02-08 01:11:35'),
(156, 55, 26, 'test2', '8947512680695', 'writing.png', 30, 'approved', '2023-02-08 01:10:51', '2023-02-08 01:11:35'),
(156, 55, 26, 'test2', '8947512680695', 'writing.png', 120, 'approved', '2023-02-08 01:10:51', '2023-02-08 01:11:35'),
(156, 55, 26, 'test2', '8947512680695', 'writing.png', 30, 'approved', '2023-02-08 01:10:51', '2023-02-08 01:11:35'),
(157, 55, 67, 'test2', '8947512680695', 'qr.jpg', 300, 'approved', '2023-02-08 01:49:08', '2023-02-08 01:50:23'),
(159, 56, 65, 'Kim', '019388475749', 'qr.jpg', 200, 'declined', '2023-02-15 07:07:41', '2023-02-15 07:09:47'),
(159, 56, 65, 'Kim', '019388475749', 'qr.jpg', 800, 'declined', '2023-02-15 07:07:41', '2023-02-15 07:09:47');

-- --------------------------------------------------------

--
-- Table structure for table `qrcode`
--

CREATE TABLE `qrcode` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `image` text NOT NULL,
  `phone_num` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qrcode`
--

INSERT INTO `qrcode` (`id`, `name`, `image`, `phone_num`) VALUES
(1, 'Teatime Shop Socorro', 'qr.jpg', '09674079373'),
(2, 'Teatime Shop Socorro', 'qr.jpg', '09674079373');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `tables` text NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `time_send` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `name`, `email`, `phone`, `subject`, `tables`, `message`, `date`, `status`, `time_send`) VALUES
(2, 'Johnny Rex', 'nunezjohnrex03@gmail.com', 2147483647, 'Book tables', '1', 'asd', '2023-02-08 00:00:00', 'accepted', '2023-02-08 03:52:30'),
(3, 'Johnrex Bautista', 'johnrexgerard03@gmail.com', 2147483647, 'Book tables', '2', 'Pang date lang this feb 14', '2023-02-14 02:00:00', 'accepted', '2023-02-08 08:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `usertype` varchar(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'inactive',
  `username` varchar(30) DEFAULT NULL,
  `phone_number` varchar(13) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `usertype`, `status`, `username`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(40, 'Johnrex Bautista', '$2y$10$NxMmarJAH7JAADudGzv.Je1SoB5kLCb2Yumn9Ciu3u4JRbGHs057u', 'johnrexmalik12@gmail.com', 'admin', 'active', 'dyad', '09614030499', 'ddddds', '2023-01-21 17:09:40', '2023-02-08 03:01:20'),
(50, 'Nicole Sauquillo', '$2y$10$SNzXVhcitQxYWU9oKIW7VeEIseA6elnF/vuCd89H8hGFtdN1IMEAq', 'sauquillonicole@gmail.com', 'user', 'active', NULL, NULL, NULL, '2023-02-06 10:16:37', '2023-02-06 10:17:19'),
(51, 'Johnny Rex', '$2y$10$HPDsaU4/YUBILoDrSXqg4.r6sWs3vf2lhSHB.rkzg81cp2psT1/mm', 'nunezjohnrex03@gmail.com', 'user', 'active', 'johnrex', '09614030499', 'test', '2023-02-08 03:46:52', '2023-02-08 03:56:22'),
(52, 'jamesjames', '$2y$10$XQY8HvZAGgx2kv7TTolVpu96EdVPli6QQKkFSKydWZYgG.r7CZDeS', 'jamesducusin090500@gmail.com', 'user', 'active', NULL, NULL, NULL, '2023-02-08 07:17:35', '2023-02-08 07:18:42'),
(53, 'Giolo Evora', '$2y$10$fTwZO8B/erMEdcCNkgZwVO2l/S6naWE1Basr.euXxDLC92VVWwjXC', 'giolo.evora@gmail.com', 'user', 'active', NULL, NULL, NULL, '2023-02-08 07:31:29', '2023-02-08 07:32:12'),
(55, 'Johnrex Bautista', '$2y$10$FJIqvS1I5ZxpJkNyPBUKZuTJ37mY9Am.F9j7w.DnrHfMOkM5IAnE.', 'johnrexgerard03@gmail.com', 'user', 'active', NULL, NULL, NULL, '2023-02-08 08:27:19', '2023-02-08 08:27:56'),
(56, 'Kim', '$2y$10$6RCeV/LPWgmzWz6hXLCKNeY3Sl1NNyV2Hh9p38WYyeLTQFTjib0Ai', 'kimjohnpaulcarandang@gmail.com', 'user', 'active', NULL, NULL, NULL, '2023-02-15 21:04:11', '2023-02-15 21:05:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD KEY `userid` (`userid`),
  ADD KEY `menuid` (`menuid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD KEY `userid` (`userid`),
  ADD KEY `menuid` (`menuid`);

--
-- Indexes for table `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`menuid`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkout_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
