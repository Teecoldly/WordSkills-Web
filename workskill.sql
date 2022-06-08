-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 03:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workskill`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderproduct`
--

CREATE TABLE `orderproduct` (
  `OrderProduct_ID` int(11) NOT NULL COMMENT 'รหัสสั่งซื้อ',
  `product_ID` int(11) NOT NULL COMMENT 'รหัสสินค้าที่สั่ง',
  `orderProduct_totalbuy` int(11) NOT NULL DEFAULT 0 COMMENT 'จำนวนสินค้า',
  `order_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่ซื้อ',
  `userid_buy` int(11) NOT NULL COMMENT 'รหัสผู้ซื้อ',
  `Order_send` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'สถานะการจัดส่ง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderproduct`
--

INSERT INTO `orderproduct` (`OrderProduct_ID`, `product_ID`, `orderProduct_totalbuy`, `order_at`, `userid_buy`, `Order_send`) VALUES
(3, 8, 12, '2022-06-08 20:36:58', 4, 1),
(4, 7, 12, '2022-06-08 20:36:58', 4, 0),
(5, 6, 13, '2022-06-08 20:36:58', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_ID` int(11) NOT NULL COMMENT 'รหัสสินค้า(pk)',
  `product_name` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อ',
  `product_price` double NOT NULL COMMENT 'ราคา',
  `product_amout` int(11) NOT NULL COMMENT 'จำนวน',
  `product_details` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'รายละเอียดสินค้า',
  `product_file_path` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ที่อยู่รูปสินค้า',
  `UserID` int(11) NOT NULL COMMENT 'userid(fk)',
  `poston` datetime NOT NULL COMMENT 'วันเวลา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_ID`, `product_name`, `product_price`, `product_amout`, `product_details`, `product_file_path`, `UserID`, `poston`) VALUES
(6, 'แอปเปิ้ล', 30, 87, 'แอปเปิ้ล แอปเปิ้ล แอปเปิ้ล', 'b7aec31fe377ea73a54233f2875674e3.jpg', 5, '2022-06-08 20:35:13'),
(7, 'เชอรี่', 100, 8, 'เชอรี่ เชอรี่ เชอรี่', '94e395d843749ab249b8d41b83621a56.jpg', 5, '2022-06-08 20:35:46'),
(8, 'เงาะ', 20, 29988, 'เงาะ เงาะ เงาะ', 'bbcee250a5472dc2d84fa0d353a45447.jpg', 5, '2022-06-08 20:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `rm_grouplist`
--

CREATE TABLE `rm_grouplist` (
  `GrouplistiD` int(11) NOT NULL COMMENT 'กลุ่ม ID',
  `Groupname` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อกลุ่ม',
  `GroupDetails` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'รายละเอียดกลุ่ม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rm_grouplist`
--

INSERT INTO `rm_grouplist` (`GrouplistiD`, `Groupname`, `GroupDetails`) VALUES
(1, 'กลุ่ม ๑', 'รายละเอียด 1'),
(2, 'กลุ่ม ๒', 'รายละเอียด 2'),
(3, 'กลุ่ม ๓', 'รายละเอียด 3'),
(4, 'กลุ่ม ๔', 'รายละเอียด 4'),
(5, 'กลุ่ม ๕', 'รายละเอียด 5'),
(6, 'กลุ่ม ๖', 'รายละเอียด 6'),
(7, 'กลุ่ม ๗', 'รายละเอียด 7'),
(8, 'กลุ่ม ๘', 'รายละเอียด 8'),
(9, 'กลุ่ม ๙', 'รายละเอียด 9'),
(10, 'กลุ่ม ๑๐', 'รายละเอียด 10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL COMMENT 'userid(pk)',
  `name` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อ',
  `lastname` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'นามสกุล',
  `telphone` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'เบอร์โทร',
  `email` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'อีเมล์',
  `password` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสผ่าน',
  `GrouplistiD` int(11) NOT NULL COMMENT 'รหัสกลุ่ม',
  `pm_buy` tinyint(1) NOT NULL COMMENT 'ผู้ซื้อสินค้า',
  `pm_sell` int(11) NOT NULL COMMENT 'ผู้ขายสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `name`, `lastname`, `telphone`, `email`, `password`, `GrouplistiD`, `pm_buy`, `pm_sell`) VALUES
(4, 'test1', '123', '123', '1231@gmail.com', '123', 7, 1, 1),
(5, 'test2', 'asd', 'asd', 'asd@gmail.com', 'asd', 7, 1, 1),
(6, '111', '111', '111', '111@111.com', '111', 1, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD PRIMARY KEY (`OrderProduct_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `rm_grouplist`
--
ALTER TABLE `rm_grouplist`
  ADD PRIMARY KEY (`GrouplistiD`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderproduct`
--
ALTER TABLE `orderproduct`
  MODIFY `OrderProduct_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสั่งซื้อ', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า(pk)', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rm_grouplist`
--
ALTER TABLE `rm_grouplist`
  MODIFY `GrouplistiD` int(11) NOT NULL AUTO_INCREMENT COMMENT 'กลุ่ม ID', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'userid(pk)', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
