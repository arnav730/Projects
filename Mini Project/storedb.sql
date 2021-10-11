-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 03:12 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storedb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `products` ()  NO SQL
BEGIN
Select * from product_info;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMIN_ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `PHONE` bigint(20) NOT NULL,
  `ADDRESS` varchar(300) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `TIMESTAMP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `NAME`, `EMAIL`, `PHONE`, `ADDRESS`, `PASSWORD`, `TIMESTAMP`) VALUES
(1, 'Arnav', 'arnav@gmail.com', 8797003158, 'HKG ', 'arnav730', 1542477655),
(48, 'Arnav', 'arnav.kumar735@gmail.com', 8797003158, 'hkg', 'arnav730', 1543614704),
(49, 'arnav', 'arnav123@gmail.com', 8797003158, 'HKG BOYS HOSTEL', '12345678', 1542182892);

-- --------------------------------------------------------

--
-- Table structure for table `category_info`
--

CREATE TABLE `category_info` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_info`
--

INSERT INTO `category_info` (`c_id`, `c_name`) VALUES
(5, 'STATIONARY'),
(6, 'SNACKS'),
(7, 'FOOD'),
(8, 'BEVERAGES'),
(9, 'DAILY UTITLITIES');

-- --------------------------------------------------------

--
-- Table structure for table `delete_log`
--

CREATE TABLE `delete_log` (
  `order_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `price` varchar(10) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `cust_name` varchar(300) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delete_log`
--

INSERT INTO `delete_log` (`order_id`, `p_id`, `price`, `unit`, `cust_name`, `phone`, `address`) VALUES
(112, 27, '100', '1', 'uyfy', '453', 'rdfsfg'),
(112, 29, '3435', '1', 'uyfy', '453', 'rdfsfg'),
(114, 27, '100', '1', 'arnav', '576436466', 'thfhxw'),
(115, 27, '100', '4', 'Akash Kumar Singh', '1234567895', 'ghi'),
(116, 29, '3435', '8', 'abc', '8683646', 'asdfghjk'),
(116, 29, '3435', '8', 'abc', '8683646', 'asdfghjk'),
(116, 29, '3435', '8', 'abc', '8683646', 'asdfghjk'),
(116, 29, '3435', '8', 'abc', '8683646', 'asdfghjk'),
(117, 27, '100', '5', 'abc', '8683646', 'hefbuwjehf'),
(117, 27, '100', '5', 'abc', '8683646', 'hefbuwjehf'),
(118, 27, '100', '1', 'hjsd cja', '3456789', 'dfghjk'),
(119, 29, '3435', '7', 'wertyh', '3456789', 'sdfghjk'),
(119, 29, '3435', '7', 'wertyh', '3456789', 'sdfghjk'),
(119, 29, '3435', '7', 'wertyh', '3456789', 'sdfghjk'),
(119, 29, '3435', '7', 'wertyh', '3456789', 'sdfghjk'),
(119, 29, '3435', '7', 'wertyh', '3456789', 'sdfghjk'),
(119, 29, '3435', '7', 'wertyh', '3456789', 'sdfghjk'),
(119, 29, '3435', '7', 'wertyh', '3456789', 'sdfghjk'),
(119, 29, '3435', '7', 'wertyh', '3456789', 'sdfghjk'),
(119, 29, '3435', '7', 'wertyh', '3456789', 'sdfghjk'),
(119, 29, '3435', '7', 'wertyh', '3456789', 'sdfghjk'),
(120, 27, '100', '12', 'uydcgj', '345678', 'dfghjkl'),
(121, 30, '12', '300', 'abc', '1234567895', 'iuegdwsakejdbc'),
(122, 33, '30', '1222', 'Arnav', '8683646', 'asdfghjk'),
(123, 34, '18', '1', 'abc', '1234567895', 'iuegdwsakejdbc'),
(123, 35, '50', '1', 'abc', '1234567895', 'iuegdwsakejdbc'),
(125, 34, '18', '1', 'Akash Kumar Singh', '1234567895', 'iuegdwsakejdbc'),
(125, 35, '50', '1', 'Akash Kumar Singh', '1234567895', 'iuegdwsakejdbc'),
(125, 37, '70', '1', 'Akash Kumar Singh', '1234567895', 'iuegdwsakejdbc');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORDER_ID` int(11) NOT NULL,
  `CUST_NAME` varchar(200) NOT NULL,
  `PHONE_NO` bigint(20) NOT NULL,
  `ADDRESS` varchar(200) NOT NULL,
  `ORDER_DATE` varchar(40) NOT NULL,
  `DELIVERY_INTERVAL` int(11) NOT NULL,
  `TIMESTAMP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ORDER_ID`, `CUST_NAME`, `PHONE_NO`, `ADDRESS`, `ORDER_DATE`, `DELIVERY_INTERVAL`, `TIMESTAMP`) VALUES
(124, 'Akash Kumar Singh', 9896354653, 'BANGALORE', '01-12-2018', 7, 1543610646),
(125, 'Akash Kumar Singh', 1234567895, 'iuegdwsakejdbc', '01-12-2018', 7, 1543615146);

-- --------------------------------------------------------

--
-- Table structure for table `order_received`
--

CREATE TABLE `order_received` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `unit` int(11) NOT NULL,
  `CUST_NAME` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_received`
--

INSERT INTO `order_received` (`id`, `order_id`, `p_id`, `price`, `unit`, `CUST_NAME`, `phone`, `address`) VALUES
(25, 124, 32, 10, 3, 'Akash Kumar Singh', '9896354653', 'BANGALORE'),
(26, 124, 35, 50, 1, 'Akash Kumar Singh', '9896354653', 'BANGALORE');

--
-- Triggers `order_received`
--
DELIMITER $$
CREATE TRIGGER `logRec` BEFORE DELETE ON `order_received` FOR EACH ROW INSERT INTO delete_log(order_id,p_id,price,unit,cust_name,phone,address) VALUES(old.order_id,old.p_id,old.price,old.unit,old.cust_name,old.phone,old.address)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `p_id` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `p_category` varchar(200) NOT NULL,
  `p_supplier` varchar(200) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`p_id`, `pname`, `p_category`, `p_supplier`, `p_price`, `p_qty`, `added_date`) VALUES
(32, 'BISCUIT', 'SNACKS', 'BISK FARM', 10, 227, '2018-11-30'),
(34, 'MILK', 'FOOD', 'AMUL', 18, 198, '2018-11-30'),
(35, 'SOAP', 'DAILY UTITLITIES', 'DOVE', 50, 197, '2018-11-30'),
(37, 'MIXTURE', 'FOOD', 'HALDIRAM', 70, 199, '2018-11-30'),
(38, 'NOTE-BOOK', 'STATIONARY', 'CLASSMATE', 50, 500, '2018-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_info`
--

CREATE TABLE `supplier_info` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_info`
--

INSERT INTO `supplier_info` (`s_id`, `s_name`) VALUES
(6, 'HALDIRAM'),
(7, 'AMUL'),
(8, 'NESTLE'),
(9, 'PARLE'),
(10, 'CLASSMATE'),
(11, 'CLASSIC'),
(12, 'COLA'),
(13, 'LUX'),
(14, 'DOVE'),
(15, 'PEARS'),
(17, 'NAVNEET'),
(18, 'BISK FARM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indexes for table `category_info`
--
ALTER TABLE `category_info`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDER_ID`);

--
-- Indexes for table `order_received`
--
ALTER TABLE `order_received`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `supplier_info`
--
ALTER TABLE `supplier_info`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `category_info`
--
ALTER TABLE `category_info`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ORDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `order_received`
--
ALTER TABLE `order_received`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `supplier_info`
--
ALTER TABLE `supplier_info`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
