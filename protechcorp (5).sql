-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 04:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `protechcorp`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--
drop database if exists protechcorp;
create database if not exists protechcorp;
use protechcorp;
CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `phone` int(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `phone`, `email`, `street`, `city`, `zip_code`) VALUES
(10001, 'Protech Davao', 34234234, 'protechdavaobranch@gmail.com', 'Agdao', 'Davao City', '8000');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(4000001, 'Laptop'),
(4000002, 'Printer'),
(4000003, 'Softwares'),
(4000004, 'Peripherals');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` int(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `phone`, `email`, `street`, `city`, `zip_code`) VALUES
(90011, 'Mark', 'Villar', 324234, 'mark@emial.com', 'Davaost', 'Davao', '8805'),
(90012, 'Sample', 'Me', 34543, 'sample@emai.com', 'Monkayost.', 'Monkayo', '9905'),
(90013, 'Nancy', 'Mozo', 23423424, 'nanz@email.com', 'Magsaysay', 'Davao', '3455');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `customer_id`, `order_id`, `total_amount`, `date_recorded`) VALUES
(1, 90013, 15, 55000, '2022-05-22 16:00:00'),
(2, 90013, 16, 141998, '2022-05-22 16:00:00'),
(3, 90013, 17, 90000, '2022-05-22 16:00:00'),
(4, 90013, 18, 55000, '2022-05-22 16:00:00'),
(5, 90011, 19, 242997, '2022-05-22 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `monthy_sales_report`
--

CREATE TABLE `monthy_sales_report` (
  `report_id` int(11) NOT NULL,
  `total_sales` int(11) NOT NULL,
  `date_reported` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `branch_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`, `branch_id`, `staff_id`) VALUES
(1, 90013, '2022-05-22', 10001, 1001),
(2, 90013, '2022-05-22', 10001, 1003),
(3, 90013, '2022-05-22', 10001, 1003),
(4, 90013, '2022-05-22', 10001, 1003),
(5, 90013, '2022-05-22', 10001, 1003),
(6, 90013, '2022-05-22', 10001, 1003),
(7, 90013, '2022-05-22', 10001, 1003),
(8, 90013, '2022-05-22', 10001, 1003),
(9, 90013, '2022-05-22', 10001, 1003),
(10, 90013, '2022-05-22', 10001, 1003),
(11, 90013, '2022-05-22', 10001, 1003),
(12, 90013, '2022-05-22', 10001, 1003),
(13, 90013, '2022-05-22', 10001, 1003),
(14, 90013, '2022-05-22', 10001, 1003),
(15, 90013, '2022-05-23', 10001, 1003),
(16, 90013, '2022-05-23', 10001, 1003),
(17, 90013, '2022-05-23', 10001, 1003),
(18, 90013, '2022-05-23', 10001, 1003),
(19, 90011, '2022-05-23', 10001, 1003);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 9900093, 3),
(2, 2, 9900093, 1),
(3, 2, 9900094, 1),
(4, 2, 9900097, 1),
(5, 3, 9900097, 1),
(6, 3, 9900099, 1),
(7, 4, 9900093, 2),
(8, 4, 9900094, 3),
(9, 4, 9900097, 6),
(10, 4, 9900098, 1),
(11, 5, 9900093, 5),
(12, 5, 9900094, 3),
(13, 5, 9900099, 3),
(14, 6, 9900093, 1),
(15, 6, 9900094, 4),
(16, 7, 9900093, 1),
(17, 7, 9900094, 2),
(18, 7, 9900097, 1),
(19, 7, 9900098, 1),
(20, 7, 9900099, 1),
(21, 8, 9900098, 2),
(22, 9, 9900094, 3),
(23, 10, 9900093, 1),
(24, 11, 9900097, 1),
(25, 12, 9900093, 1),
(26, 12, 9900094, 1),
(27, 12, 9900097, 1),
(28, 12, 9900098, 1),
(29, 13, 9900093, 1),
(30, 13, 9900094, 1),
(31, 13, 9900097, 1),
(32, 14, 9900097, 1),
(33, 15, 9900100, 1),
(34, 16, 9900093, 2),
(35, 17, 9900097, 2),
(36, 18, 9900100, 1),
(37, 19, 9900093, 3),
(38, 19, 9900094, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `model_year` year(4) NOT NULL,
  `list_price` int(11) NOT NULL,
  `specifications` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `branch_id`, `product_name`, `brand`, `category_id`, `model_year`, `list_price`, `specifications`, `quantity`) VALUES
(9900093, 10001, 'Predator Triton 300', 'Asus', 4000001, 2022, 70999, '-intel i7 12th gen processor\r\n-16 gb of ram ddr4\r\n-rtx 3070 6gb vram\r\n-dual exhaust fan with liquid cooling\r\n-144hz screen FHD\r\n\r\n', 50),
(9900094, 10001, 'Windows 10 Activation Tool', 'Microsoft', 4000003, 2019, 10000, 'windows 10 pro with microsoft products such as word,\r\nexcel, powerpoint and etc.', 1001),
(9900097, 10001, 'Legion 5', 'Lenovo', 4000001, 2002, 45000, 'Ryzen 5', 23),
(9900098, 10001, 'Acer Nitro', 'Acer', 4000001, 2002, 45000, 'intel core i7', 3),
(9900099, 10001, 'Alienware', 'Acer', 4000001, 2020, 100000, 'Intel Core i9', 23),
(9900100, 10001, 'Hp Omen', 'HP', 4000001, 2020, 55000, 'ryzen 5', 34);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_number` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `amount_change` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`receipt_number`, `order_id`, `date_generated`, `first_name`, `last_name`, `amount_paid`, `amount_change`) VALUES
(1, 17, '2022-05-23 02:09:30', 'Mark ', 'Villar', 100000, 10000),
(2, 18, '2022-05-22 16:00:00', 'Nancy', 'Mozo', 60000, 5000),
(3, 19, '2022-05-22 16:00:00', 'Mark', 'Villar', 243000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `staff_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `position_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staff_id`, `first_name`, `last_name`, `email`, `phone`, `branch_id`, `position_name`, `username`, `password`) VALUES
(1000, 'Mark Jerome', 'Pondol', 'mjp@usep.edu.ph', '87865578', 10001, 'Admin', 'Mark', '$2y$10$dznTPYe/HWeb2EKMGGa.hOAcwYQ3sd8PB7wTCihDRRAZj9aLJJLs6'),
(1001, 'Kiara Ysabelle', 'Hagunob', 'kiaraysabelle@usep.edu.ph', '87865579', 10001, 'Admin', 'Kiara', '$2y$10$3TYMlllM1iu5KhRDXclYIOUVSnUg3CmqsXJMBerIo49QrAYgJLT9K'),
(1002, 'Marlo', 'Barua', 'marlobarua@usep.edu.ph', '87865571', 10001, 'Admin', 'Marlo', '$2y$10$ZbeQeHjcJIGRD9269uMbyuSmkDyXNk8zPo2.nKAGGqAIJM3jF2RZq'),
(1003, 'Staff', 'Test', 'staff@usep.edu.ph', '87865576', 10001, 'Staff', 'staff', '$2y$10$NTXvAo3SjXkikvcHxt.gOe9ACBpzyDBTLQecPRu1KuFwvueLUANDS'),
(1004, 'Admin', 'Test', 'staff@usep.edu.ph', '87865576', 10001, 'Admin', 'admin', '$2y$10$Q8FXoYSaL854KkrsANLhmO04xn/YK3NgFddu08rd.etBE3wed8uw6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `monthy_sales_report`
--
ALTER TABLE `monthy_sales_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_number`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4000005;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90014;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `monthy_sales_report`
--
ALTER TABLE `monthy_sales_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9900101;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1312319;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `monthy_sales_report`
--
ALTER TABLE `monthy_sales_report`
  ADD CONSTRAINT `monthy_sales_report_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staffs_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
