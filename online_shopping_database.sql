-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 06:03 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `status` enum('YES','NO') NOT NULL,
  `customer_id` int(11) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `status`, `customer_id`, `update_date`) VALUES
(1, 'Nike', 'YES', 1, '2023-03-31 03:46:57'),
(2, 'Puma', 'YES', 1, '2021-06-20 18:30:00'),
(3, 'Adidas', 'YES', 1, '2022-03-16 14:10:58'),
(11, 'No Brand', 'YES', 1, '2021-06-25 16:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `order_status` enum('PENDING','SUCCESS') NOT NULL,
  `pro_size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `product_id`, `customer_id`, `quantity`, `order_status`, `pro_size`) VALUES
(51, 8, 9, 1, 'SUCCESS', ''),
(52, 20, 9, 1, 'SUCCESS', ''),
(53, 4, 9, 1, 'SUCCESS', ''),
(58, 2, 9, 1, 'SUCCESS', ''),
(61, 17, 9, 1, 'SUCCESS', ''),
(62, 18, 9, 1, 'SUCCESS', ''),
(64, 3, 9, 3, 'SUCCESS', ''),
(65, 4, 9, 1, 'SUCCESS', ''),
(66, 3, 9, 2, 'SUCCESS', ''),
(67, 3, 9, 2, 'SUCCESS', ''),
(68, 18, 9, 1, 'SUCCESS', 'M'),
(69, 8, 9, 1, 'SUCCESS', ''),
(70, 4, 9, 1, 'SUCCESS', ''),
(71, 3, 9, 1, 'SUCCESS', ''),
(72, 8, 9, 1, 'SUCCESS', ''),
(73, 18, 9, 1, 'SUCCESS', ''),
(74, 2, 9, 1, 'SUCCESS', ''),
(75, 3, 9, 2, 'SUCCESS', ''),
(76, 18, 9, 1, 'SUCCESS', ''),
(77, 4, 9, 1, 'SUCCESS', ''),
(78, 8, 9, 1, 'SUCCESS', ''),
(79, 4, 9, 4, 'SUCCESS', ''),
(80, 8, 9, 1, 'SUCCESS', ''),
(81, 2, 9, 1, 'SUCCESS', ''),
(82, 6, 9, 1, 'SUCCESS', ''),
(83, 18, 9, 1, 'SUCCESS', ''),
(84, 7, 9, 1, 'SUCCESS', ''),
(85, 8, 9, 3, 'SUCCESS', ''),
(86, 2, 9, 3, 'SUCCESS', ''),
(87, 6, 9, 1, 'SUCCESS', ''),
(88, 17, 11, 1, 'SUCCESS', ''),
(89, 8, 11, 1, 'SUCCESS', ''),
(90, 4, 11, 1, 'SUCCESS', ''),
(91, 2, 11, 2, 'SUCCESS', ''),
(92, 6, 9, 2, 'SUCCESS', ''),
(93, 17, 9, 2, 'SUCCESS', ''),
(94, 6, 9, 1, 'SUCCESS', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `cat_img` varchar(150) DEFAULT NULL,
  `status` enum('YES','NO') NOT NULL,
  `customer_id` int(11) NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `category_name`, `cat_img`, `status`, `customer_id`, `update_date`) VALUES
(1, 'Women\'s clothingggg', '453999_cat_img.jpg', 'YES', 1, '2022-03-28 17:23:37'),
(2, '	Men\'s clothing', '725990_cat_img.jpg', 'YES', 1, '2021-06-25 17:25:51'),
(3, 'Kids Clothing', '741394_cat_img.jpg', 'YES', 1, '2021-06-25 17:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupon_code`
--

CREATE TABLE `tbl_coupon_code` (
  `coupon_id` int(11) NOT NULL,
  `coupon_type` varchar(150) NOT NULL,
  `percentage` varchar(150) NOT NULL,
  `maximum_amount` varchar(150) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `valid_date` date NOT NULL,
  `status` enum('YES','NO') NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_coupon_code`
--

INSERT INTO `tbl_coupon_code` (`coupon_id`, `coupon_type`, `percentage`, `maximum_amount`, `customer_id`, `valid_date`, `status`, `update_date`) VALUES
(1, 'All Products', '10', '110', 1, '2022-03-27', 'YES', '2022-03-26 05:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `customer_id` int(11) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` enum('YES','NO') DEFAULT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `photo` varchar(150) DEFAULT NULL,
  `role` enum('customer','admin','seller') NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `pincode` varchar(15) DEFAULT NULL,
  `land_mark` varchar(150) NOT NULL,
  `about_me` varchar(150) DEFAULT NULL,
  `company_logo` varchar(150) NOT NULL,
  `company_app_doct` varchar(50) NOT NULL,
  `company_details` text NOT NULL,
  `admin_approve_cmy` enum('1','2') DEFAULT NULL,
  `rejection_reason` text DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `money_type` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`customer_id`, `user_name`, `email_id`, `password`, `status`, `mobile_no`, `photo`, `role`, `address`, `city`, `country`, `pincode`, `land_mark`, `about_me`, `company_logo`, `company_app_doct`, `company_details`, `admin_approve_cmy`, `rejection_reason`, `otp`, `update_date`, `money_type`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$K2bwNTxn9RMEKkhgLro0oOZmPnasmmNToE0mDm/GtUS9WG26XXtxe', 'YES', '8928923979', '321506_photo.png', 'admin', 'VIT Vellore MH-Q block', 'Vellore', 'india', '632014', 'VIT main Gate', 'I m Nimesh.... The Admin', '979438_company_logo.png', '', '', NULL, NULL, 0, '2023-03-31 03:15:29', '₹'),
(9, 'customer', 'customer@gmail.com', '$2y$10$K2bwNTxn9RMEKkhgLro0oOZmPnasmmNToE0mDm/GtUS9WG26XXtxe', 'YES', '8928923979', '840903_photo.jpg', 'customer', 'Vellore', 'Vellore', 'india', '632014', 'VIT mainGate', 'I m Customer', '', '', '', NULL, NULL, 0, '2023-03-31 03:20:20', NULL),
(10, 'seller', 'seller@gmail.com', '$2y$10$K2bwNTxn9RMEKkhgLro0oOZmPnasmmNToE0mDm/GtUS9WG26XXtxe', 'NO', '7092887009', '140942_photo.png', 'seller', 'Smart Seller PVT LTD,\r\nSmartcraft #48/2 block - 2,\r\nVELLORE,\r\nTamilNadu.', 'Vellore', 'India', '632014', 'dfgdf', 'dfgdfg', '618687_company_logo.png', '282767_company_app_doct.pdf', '.', '2', NULL, NULL, '2023-03-31 00:13:45', NULL),
(11, 'Prikshit', 'herculessharma@gmail.com', '$2y$10$7kpFb08D9rZL87yhvCRO8Ov77eb2Z4h0WpnEbCHXOGj5BzXYSRrH.', 'YES', '8928923979', '', 'customer', 'Balaji towers Zirakpur', 'Panchkula', 'India', '134107', 'opp. to rock garden', 'ok', '', '', '', NULL, NULL, 0, '2023-03-31 06:28:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(11) NOT NULL,
  `tracking_id` varchar(15) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `offer_amount` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `quantity_in_no` int(11) NOT NULL,
  `reduced` enum('YES','NO') DEFAULT 'NO',
  `payment_type` text DEFAULT NULL,
  `date_of_order` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `seller_status` enum('PENDING','SHIPPED','REJECTED','SUCCESS','CANCEL') DEFAULT NULL,
  `rejection_reason` text DEFAULT NULL,
  `cutomer_status` enum('PENDING','SUCCESS','CANCEL') DEFAULT NULL,
  `shipped_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `bill_of_order` varchar(150) DEFAULT NULL,
  `date_of_received` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `feedback` varchar(150) DEFAULT NULL,
  `feedback_cmt` text DEFAULT NULL,
  `stars_in_number` int(11) DEFAULT NULL,
  `feedback_img1` varchar(150) NOT NULL,
  `feedback_img2` varchar(150) NOT NULL,
  `feedback_img3` varchar(150) NOT NULL,
  `card_number` varchar(150) DEFAULT NULL,
  `card_type` varchar(150) DEFAULT NULL,
  `expiry_month` varchar(150) DEFAULT NULL,
  `cvcode` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `tracking_id`, `customer_id`, `seller_id`, `product_id`, `amount`, `offer_amount`, `coupon_id`, `quantity_in_no`, `reduced`, `payment_type`, `date_of_order`, `seller_status`, `rejection_reason`, `cutomer_status`, `shipped_date`, `bill_of_order`, `date_of_received`, `feedback`, `feedback_cmt`, `stars_in_number`, `feedback_img1`, `feedback_img2`, `feedback_img3`, `card_number`, `card_type`, `expiry_month`, `cvcode`) VALUES
(67, '722220', 9, 1, 3, 329, 10, 0, 2, 'YES', 'COD', '2023-03-31 03:55:20', 'SHIPPED', '', 'PENDING', '2023-03-31 03:55:20', NULL, '2023-03-31 03:55:20', NULL, NULL, NULL, '', '', '', '1234567890981231', NULL, '2021-09', '123'),
(68, '872077', 9, 1, 18, 300, 200, 0, 1, NULL, 'COD', '2023-03-31 03:55:32', 'REJECTED', '', 'PENDING', '2023-03-31 03:55:32', NULL, '2023-03-31 03:55:32', NULL, NULL, NULL, '', '', '', '1234567890981231', NULL, '2021-09', '123'),
(69, '104335', 9, 1, 4, 1000, 500, 0, 1, NULL, 'COD', '2023-03-31 03:55:38', 'SUCCESS', '', 'PENDING', '2023-03-31 03:55:38', NULL, '2023-03-31 03:55:38', NULL, NULL, NULL, '', '', '', '1234567890981231', NULL, '2021-09', '123'),
(70, '92077', 9, 1, 8, 449, 1050, 0, 1, NULL, 'COD', '2023-03-31 03:55:53', 'REJECTED', '', 'CANCEL', '2023-03-31 03:55:53', NULL, '2023-03-31 03:55:53', NULL, NULL, NULL, '', '', '', '1234567890981231', NULL, '2021-09', '123'),
(71, '881381', 9, 1, 4, 1000, 500, 0, 4, NULL, 'COD', '2023-03-31 04:01:31', 'SUCCESS', '', 'PENDING', '2023-03-31 04:01:31', NULL, '2023-03-31 04:01:31', NULL, NULL, NULL, '', '', '', '1234567890981231', NULL, '2021-09', '123'),
(72, '753676', 9, 1, 8, 449, 1050, 0, 1, 'YES', 'COD', '2023-03-31 04:01:39', 'SHIPPED', '', 'PENDING', '2023-03-31 04:01:39', NULL, '2023-03-31 04:01:39', NULL, NULL, NULL, '', '', '', '1234567890981231', NULL, '2021-09', '123'),
(73, '154913', 9, 1, 2, 711, 788, 0, 1, NULL, 'COD', '2023-03-31 04:01:45', 'REJECTED', '', 'PENDING', '2023-03-31 04:01:45', NULL, '2023-03-31 04:01:45', NULL, NULL, NULL, '', '', '', '1234567890981231', NULL, '2021-09', '123'),
(74, '957259', 9, 1, 6, 1786, 1413, 0, 1, NULL, 'Googlepay', '2023-03-31 04:31:18', 'SUCCESS', '', 'PENDING', '2023-03-31 04:31:18', NULL, '2023-03-31 04:31:18', NULL, NULL, NULL, '', '', '', '1234567890981231', NULL, '2021-09', '123'),
(75, '852560', 9, 1, 18, 300, 200, 0, 1, NULL, 'Googlepay', '2023-03-31 04:31:12', 'SUCCESS', '', 'PENDING', '2023-03-31 04:31:12', NULL, '2023-03-31 04:31:12', NULL, NULL, NULL, '', '', '', '1234567890981231', NULL, '2021-09', '123'),
(76, '202918', 9, 1, 7, 584, 715, 0, 1, NULL, 'Googlepay', '2023-03-31 04:31:03', 'REJECTED', '', 'PENDING', '2023-03-31 04:31:03', NULL, '2023-03-31 04:31:03', NULL, NULL, NULL, '', '', '', '1234567890981231', NULL, '2021-09', '123'),
(77, '430002', 9, 1, 8, 449, 1050, 0, 3, 'YES', 'Googlepay', '2023-03-31 04:30:38', 'SHIPPED', '', 'PENDING', '2023-03-31 04:30:38', NULL, '2023-03-31 04:30:38', NULL, NULL, NULL, '', '', '', '1234567890981231', NULL, '2021-09', '123'),
(78, '145890', 9, 1, 2, 711, 788, 0, 3, NULL, 'Googlepay', '2023-03-31 06:19:02', 'SUCCESS', '', 'PENDING', '2023-03-31 06:19:02', NULL, '2023-03-31 06:19:02', NULL, NULL, NULL, '', '', '', '1234567890981231', NULL, '2021-09', '123'),
(79, '595048', 9, 1, 6, 1786, 1413, 0, 1, NULL, 'Googlepay', '2023-03-31 06:19:14', 'REJECTED', '', 'PENDING', '2023-03-31 06:19:14', NULL, '2023-03-31 06:19:14', NULL, NULL, NULL, '', '', '', '1234567890981231', NULL, '2021-09', '123'),
(80, '828651', 11, 1, 17, 300, 200, 0, 1, 'NO', 'cards', '2023-03-31 02:59:58', 'PENDING', NULL, 'PENDING', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', '', '', '1234567890123456', 'Credit Card', '2025-02', '777'),
(81, '630027', 11, 1, 8, 449, 1050, 0, 1, 'NO', 'cards', '2023-03-31 02:59:58', 'PENDING', NULL, 'PENDING', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', '', '', '1234567890123456', 'Credit Card', '2025-02', '777'),
(82, '314974', 11, 1, 4, 1000, 500, 0, 1, 'NO', 'cards', '2023-03-31 02:59:58', 'PENDING', NULL, 'PENDING', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', '', '', '1234567890123456', 'Credit Card', '2025-02', '777'),
(83, '983569', 11, 1, 2, 711, 788, 0, 2, 'NO', 'cards', '2023-03-31 02:59:58', 'PENDING', NULL, 'PENDING', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', '', '', '1234567890123456', 'Credit Card', '2025-02', '777'),
(84, '682537', 9, 1, 6, 1786, 1413, 0, 2, NULL, 'COD', '2023-03-31 07:04:47', 'SUCCESS', '', 'PENDING', '2023-03-31 07:04:47', NULL, '2023-03-31 07:04:47', NULL, NULL, NULL, '', '', '', '1234567890981231', NULL, '2021-09', '123'),
(85, '162333', 9, 1, 17, 300, 200, 0, 2, NULL, 'Googlepay', '2023-04-13 08:42:35', 'SUCCESS', '', 'SUCCESS', '2023-04-13 08:42:35', NULL, '2023-04-13 05:12:35', '', 'Thankyou', 4, '', '', '', '1234567890981231', NULL, '2021-09', '123'),
(86, '102083', 9, 1, 6, 1786, 1413, 0, 1, 'YES', 'Googlepay', '2023-04-13 08:42:58', 'SUCCESS', '', 'SUCCESS', '2023-04-13 08:42:58', NULL, '2023-04-13 05:12:58', '', 'Nice color', 3, '', '', '', '1234567890981231', NULL, '2021-09', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `pro_amount` varchar(15) NOT NULL,
  `pro_off_percentage` int(11) NOT NULL,
  `pro_final_amount` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `pro_img1` varchar(150) NOT NULL,
  `pro_img2` varchar(150) NOT NULL,
  `pro_img3` varchar(150) NOT NULL,
  `pro_img4` varchar(150) NOT NULL,
  `des_img1` varchar(150) NOT NULL,
  `des_img2` varchar(150) NOT NULL,
  `des_img3` varchar(150) NOT NULL,
  `des_img4` varchar(150) NOT NULL,
  `des_line1` text NOT NULL,
  `des_line2` text NOT NULL,
  `des_line3` text NOT NULL,
  `pro_keywords` text NOT NULL,
  `pro_details` text NOT NULL,
  `pro_delivery_dates` int(11) DEFAULT NULL,
  `status` enum('YES','NO') NOT NULL,
  `status_seller` enum('YES','NO') DEFAULT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `pro_size` text NOT NULL,
  `pro_color_ids` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `customer_id`, `cat_id`, `sub_cat_id`, `brand_id`, `pro_name`, `pro_amount`, `pro_off_percentage`, `pro_final_amount`, `product_description`, `pro_img1`, `pro_img2`, `pro_img3`, `pro_img4`, `des_img1`, `des_img2`, `des_img3`, `des_img4`, `des_line1`, `des_line2`, `des_line3`, `pro_keywords`, `pro_details`, `pro_delivery_dates`, `status`, `status_seller`, `update_date`, `pro_size`, `pro_color_ids`) VALUES
(2, 1, 3, 13, 11, 'JBN Creation Boys', '1499', 788, '711', 'Care Instructions: Dry Clean Only\r\nFabric: Silk Blend | Contents: Kurta and Pyjama Set\r\nBanarasi Silk with Slight Cotton mix for a Soft Comfortable Feel Solid Kurta and Churidar Pyjama Set\r\nWe manufacture kids wear for boys 1-2 years, 2-3 years, 3-4 years, 4-5 years, 5-6 years, 6-7 years, 7-8 years, 8-9 years, 9-10 years, 10-11 years, 11-12 years, 12-13 years, 13-14 years, 14-15 years and kids wear for baby boys 0-6 months, 6-12 months, 12-18 months, 18-24 months.\r\nAll our kurtas, Sherwani, Indowestern and Nehru Jackets have loosening over the body measurement. Measurements shown in images or the size chart section are garment measurements, so take adequate 5-6 inches loosening over the little champion\'s body measurement to get the right fit. Our kurtas are Medium length and Regular Fit. Our Kurta fitting is usually slightly relaxed compared to a Regular Shirt\'s fitting. Select your Kurta size based on your chest dimension.\r\nThese kids ethnic wear for boys under boys clothing are also used as pathani suit for boys stylish, jubba for boys, panjabi for boys or khan dress for boys stylish. Most material used for kurta under 300 tensil count only.\r\nWash Care Instructions: Dry Clean preferably or cold light wash. Disclaimer: We have made a consistent effort to make the colors and finishes similar to the image of the products you see on screen. However, the actual product and the images on the website can differ! Customer\'s discretion is advised.', '263030_pro_img1.jpg', '574834_pro_img2.jpg', '401837_pro_img3.jpg', '426684_pro_img4.jpg', '745198_des_img1.jpg', '911209_des_img2.jpg', '150449_des_img3.png', '637375_des_img4.png', 'Founded in 2015, at JBN we bring along an array of ethnic wear for kids. We are the exclusive makers of elite kids\' garments, bringing you impeccable designs and unmatched quality. Our products are as innocent and tender as your new born. Our collection is diligently curated and comprises merchandise sourced from across India, providing the largest variety of Indian ethnic wear and also culturally rich and vibrant with region specific varieties- straight from the local artisans, showcasing the diversity of our country.', 'Relaxed Fit\r\nThe kurta provides maximum comfort and fit to the wearer. This kurta fitting is relaxed compared to a regular shirt\'s fitting for easy movement. It has full sleeves and length reaching up to the knees.', 'Pyjama\r\nComfortable pyjama with elastic waistband for easy of wearing.Add an extra style factor by putting on a dupatta of any color. It will transform the look of the kurta completely.', 'Boys', 'Package Dimensions ? : ? 30.2 x 20.2 x 5.2 cm; 300 Grams\r\nDate First Available ? : ? 17 May 2018\r\nManufacturer ? : ? VASTRAMAY\r\nASIN ? : ? B07D4MDGWL\r\nItem part number ? : ? VASBKRG001nPRG_26\r\nCountry of Origin ? : ? India\r\nDepartment ? : ? Boys\r\nManufacturer ? : ? VASTRAMAY\r\nItem Weight ? : ? 300 g', 6, 'YES', NULL, '2022-01-27 03:54:47', '', ''),
(3, 1, 2, 8, 11, 'Katso Men', '339', 10, '329', 'Fall in love with the soft texture as you adorn this slim-fit t-shirt from Katso designs. Your skin will love the feel of this t-shirt as it is fashioned using the material that is famous for comfort. You can wear this t-shirt for any sporting activity or you can pair it with jeans or chinos to give the uber casual look\r\n\r\n', '333071_pro_img1.jpg', '734889_pro_img2.jpg', '526900_pro_img3.jpg', '296608_pro_img4.jpg', '475629_des_img1.jpg', '510496_des_img2.jpg', '734085_des_img3.jpg', '441296_des_img4.png', 'Men`s Cotton Round Neck Raglan T-shirt by Katso – Stay suave, stay stylish!\r\nAre you looking for a t-shirt that is comfortable to wear but has a trendy design as well? Katso has brought to you a trendy raglan-style cotton t-shirt which sports a round neckline along with full sleeves. A raglan t-shirt is known by many names such as the baseball t-shirt or raglan tee. This t-shirt is notably characterized by its sleeves which extend in one piece completely to the collar. This leaves a slanting seam from the underarm to the collarbone. Most men nowadays like to wear clothing that accentuates their toned physique. Show off your chiselled body with this slim fit raglan t-shirt from Katso which radiates a sporty appeal!', 'Raglan style\r\nA raglan t-shirt is notably characterized by its sleeves which extend in one piece completely to the collar. This leaves a slanting seam from the underarm to the collarbone. This t-shirt from Katso features the raglan style which sports a dual colour combination and radiates a sporty appeal!', 'Round neck\r\nThis t-shirt comes with a round neck design that looks trendy and accentuates your collarbones. Stay comfortable and flaunt your toned body in this slim fit round-neck t-shirt from Katso!', 'Men', 'Care Instructions: Hand Wash Only\r\nFit Type: Slim\r\nComfort : Best Fashionably Comfortable Hundred Percent Cotton T-Shirt that you have wore till now.\r\nQuality :All garments are subjected to the following tests Fabric dimensional stability test and print quality inspection for colours and wash fastness.\r\nSeller: Buy Original Tshirt by seller name Katso Designs', 6, 'YES', NULL, '2021-06-26 01:34:22', '', ''),
(4, 1, 1, 6, 11, 'Rajnandini Women', '1500', 500, '1000', 'Rajnandini Yellow Cotton Printed Unstitched Dress Material For Women\r\nCotton Printed Unstitched Dress Material\r\nLook gorgeous by wearing this salwar suit dress material with dupatta by Rajnandini. The printed pattern along with a beautiful colour combination enhances its overall design. Besides, it has been crafted with care using superior quality Cotton fabric that not only makes it comfortable to wear but also easy to maintain.', '189186_pro_img1.jpg', '464008_pro_img2.jpg', '874169_pro_img3.jpg', '869610_pro_img4.jpg', '259032_des_img1.png', '969169_des_img2.png', '359314_des_img3.jpg', '423219_des_img4.png', 'Enhance your wardrobe collection by adding this unstitched salwar suit dress material with dupatta from Rajnandini. It has been made of good quality cotton fabric, which gives it a fine finish and also makes it easy to maintain. In addition, it has a beautiful colour combination that further accentuates its design.', 'Consider getting this salwar suit dress material with dupatta from Rajnandini, if you are planning to give your ethnic collection a fine upgrade. It is an unstitched piece and features a printed pattern that makes it look pleasing to the eyes. In addition, the good quality Cotton fabric lends it an elegant finish.', 'Step out in style by wearing this unstitched salwar suit dress material with dupatta from Rajnandini. Tailored with superior quality Cotton fabric, it promises to provide you with utmost comfort for long hours. Furthermore, it comes with a printed pattern that is accentuated by a classy combination of shades.', 'Salwar,judi,girls cloth,ladis coth,ladis dress,womens dress,women,dress for women,dress for ladies', 'Package Dimensions ? : ? 26.3 x 19.6 x 14.8 cm; 500 Grams\r\nDate First Available ? : ? 16 October 2020\r\nManufacturer ? : ? Rajnandini\r\nASIN ? : ? B08L9BW24Z\r\nItem model number ? : ? JOPLVSM4079\r\nCountry of Origin ? : ? India\r\nDepartment ? : ? Women\r\nManufacturer ? : ? Rajnandini, UG-502, Shree Mahaveer Textile Market, Nr.Landmark Empire, Opp.Bhaktidham, Magob, Surat - 395010\r\nItem Weight ? : ? 500 g', 10, 'YES', NULL, '2021-06-26 01:34:38', '', ''),
(5, 1, 1, 1, 11, 'Amazon Brand - Symbol Women', '1840', 840, '1000', 'Care Instructions: Hand Wash Only\r\nFit Type: Regular\r\n97% Cotton and 3% Spandex\r\nSolid, Regular fit\r\nShort Sleeve\r\nRound Neck\r\nMachine wash cold, wash dark colors separately, do not bleach, tumble dry low, warm iron', '759260_pro_img1.jpg', '214254_pro_img2.jpg', '270753_pro_img3.jpg', '238109_pro_img4.jpg', '172841_des_img1.jpg', '671807_des_img2.jpg', '236219_des_img3.jpg', '806544_des_img4.jpg', 'Start every outfit with Symbol\'s elevated wardrobe basics that are versatile, stylish and compliment your everyday look. This pack of 2 t-shirts feature a round neck and short sleeves. Made in stretchable cotton jersey fabric with 3% lycra for a soft hand feel and added comfort. Style it with a pair of denim shorts or skinny jeans and sneakers for an easy-going casual look.\r\n\r\n', 'Symbol is a fashion essentials brand that makes you look good, everyday.', 'Start every outfit with Symbol\'s elevated wardrobe basics that are versatile, stylish and compliment your everyday look. This pack of 2 t-shirts feature a round neck and short sleeves. Made in stretchable cotton jersey fabric with 3% lycra for a soft hand feel and added comfort. Style it with a pair of denim shorts or skinny jeans and sneakers for an easy-going casual look.\r\n\r\n', 'Amazon Brand,womens tshirt,tshirt,girls tshirt,muti color tshirt', 'Package Dimensions ? : ? 27.8 x 26.1 x 3.2 cm; 240 Grams\r\nDate First Available ? : ? 9 January 2019\r\nManufacturer ? : ? CLOUDTAIL INDIA PRIVATE LIMITED\r\nASIN ? : ? B07MM1X6KB\r\nItem model number  :  RN-PO2-COMBO28\r\nCountry of Origin ? : ? India\r\nDepartment ? : ? Women\r\nManufacturer ? : ? CLOUDTAIL INDIA PRIVATE LIMITED, CLOUDTAIL INDIA PRIVATE LIMITED, Ground Floor, Rear Portion, H-9, Block B-1, Mohan Cooperative Industrial Area, Mathura Road, New Delhi-110044\r\nItem Weight ? : ? 240 g\r\nNet Quantity ? : ? 2 N\r\nGeneric Name ? : ? T-Shirt', 10, 'YES', NULL, '2021-06-26 01:34:45', '', ''),
(6, 1, 2, 10, 11, 'Levi\'s Men\'s Slim Fit Jeans', '3199', 1413, '1786', 'A modern slim with room to move; the 511 Slim Fit Jean has added stretch for all-day comfort. It offers a lean look and is a great alternative to skinny jeans. Levi\'s Men\'s Slim Fit Jeans\r\n', '804673_pro_img1.jpg', '553937_pro_img2.jpg', '816473_pro_img3.jpg', '343884_pro_img4.jpg', '796547_des_img1.jpg', '269133_des_img2.jpg', '938692_des_img3.jpg', '352917_des_img4.png', 'A modern slim with room to move; the 511 Slim Fit Jean has added stretch for all-day comfort. It offers a lean look and is a great alternative to skinny jeans. Levi\'s Men\'s Slim Fit Jeans\r\n', 'A modern slim with room to move; the 511 Slim Fit Jean has added stretch for all-day comfort. It offers a lean look and is a great alternative to skinny jeans.\r\n', 'A modern slim with room to move; the 511 Slim Fit Jean has added stretch for all-day comfort. It offers a lean look and is a great alternative to skinny jeans.\r\n', 'Levis,Mens Slim Fit Jeans,jeans for men,jeans,mens item,mens clothing', 'Product Dimensions ? : ? 30 x 30 x 1 cm; 650 Kilograms\r\nDate First Available ? : ? 13 December 2019\r\nManufacturer ? : ? KENPARK BANGLADESH (PVT) LTD\r\nASIN ? : ? B082QDS4RR\r\nItem model number ? : ? 18298-0815\r\nCountry of Origin ? : ? Bangladesh\r\nDepartment ? : ? Men\r\nManufacturer ? : ? KENPARK BANGLADESH (PVT) LTD, KENPARK BANGLADESH (PVT) LTD,Plot 31-42, Sector 8, Chittagong Export Processing Zone, Chittagong, Bangladesh-4223\r\nPacker ? : ? KENPARK BANGLADESH (PVT) LTD,Plot 31-42, Sector 8, Chittagong Export Processing Zone, Chittagong, Bangladesh-4223\r\nItem Weight ? : ? 650 kg\r\nItem Dimensions LxWxH ? : ? 30 x 30 x 1 Centimeters\r\nNet Quantity ? : ? 1 unit\r\nIncluded Components ? : ? 1 Jeans\r\nGeneric Name ? : ? Jeans', 6, 'YES', NULL, '2021-06-28 05:28:40', '', ''),
(7, 1, 3, 14, 11, 'Amazon Brand - Jam & Honey Boy', '1299', 715, '584', 'Jam & honey 100% cotton stylish shirt with half sleeves. You can pair it with a formal trouser or stylish denim for the complete look. Can be worn on all occasions such as diwali, birthday parties etc.\r\n\r\n', '545848_pro_img1.jpg', '998532_pro_img2.jpg', '876802_pro_img3.jpg', '386777_pro_img4.png', '364827_des_img1.jpg', '549317_des_img2.jpg', '910868_des_img3.jpg', '840421_des_img4.png', 'Jam & Honey brings to you clothing for your little one. Explore our selection across t-shirts, shirts, shorts & dresses for kids\' aged 2 to 12 years old.\r\n\r\n', 'Jam & Honey offers a range of t-shirts, shirts, polos, jeans, trousers, shorts & sweatshirts for boys.\r\n\r\n', 'Jam & Honey offers a range of tees, dresses, jeans & sweatshirts for girls.\r\n\r\n', 'shirt for kids,kids shirts,kids item,amazon kids shirts', 'Care Instructions: Machine Wash\r\nFit Type: Regular Fit\r\nMaterial Composition: 100% Cotton\r\nFit Type: Regular Fit\r\nSleeve: Half sleeve\r\nPattern: Solid\r\nStyle: Casual\r\nWash Care: Machine wash', 4, 'YES', NULL, '2021-06-26 01:35:10', '', ''),
(8, 1, 1, 3, 11, 'J B Fashion Women', '1499', 1050, '449', 'Search J B Fashion for more varieties in shirt for women shirt for women western wear shirt women shirt women shirt crop shirt for women shirt western shirt women\'s shirt cold shoulder shirt for women girls shirt long skirts for women with shirt tank shirt for women ladies shirt for girls crop shirt off shoulder shirt crop shirt for women western wear off shoulder shirt for women pantaloons shirt for women party wear shirt for women western girls shirt sleeveless shirt for women long shirt for women shirt and shirts black shirt for women ladies shirt for women western wear shirt for girls of 12 years shirt for girls stylish jeans shirt for women shirt for girls of 18 years cold shoulder shirt crop shirt lap shirt bags for men stylish shirt for women shirt for girls skirt and shirt set for women western shirt for women crop shirt for girls tank shirt for women party wear girl shirt new style cotton shirt for women shirt party wear western shirt for girls of years girls shirt for years western shirt for girls shirt for women combo latest shirt for girls western shirt for women for jeans ladies shirt for jeans kaftan shirt for women crop shirt for girls long shirt fancy shirt for girls ladies shirt and t-shirts women\'s shirt long shirt for women western shirt for women formal shirt for women shirt and tees white shirt for women western tee polo women\'s shirt and shirts for new styles shirt jeans and pyjama set lungi wear combo pack below 200 shorts green with flute sleeves in black long navy crepe cold shoulder ruffles off party sets under w xxl size women western girls 18 years tee polo leggings skirt tunics a brands brand jackets shoe crop coat cap c ro membrane designer dress discount offer ethnic e smart watch 12 stylish, hoodie hat harpa honey pantaloons colour inner fashion jins jacket j kurti Kurtis kids kurta natural ladies l material materials unstitched man style 2017 shoes offers today on of skirts pyjama petticoat quality rated sarees.\r\n\r\n', '521333_pro_img1.jpg', '338884_pro_img2.jpg', '385591_pro_img3.jpg', '279269_pro_img4.jpg', '953398_des_img1.jpg', '651791_des_img2.png', '282902_des_img3.jpg', '266286_des_img4.png', 'Lining Deigns are Feel Look Great and Stylish\r\nThis regular fit Crepe shirt for women from J B Fashion has been tailored from crepe that offer a soft and lightweight feel. The breathable nature of its texture keeps you cool and comfortable all day long.', 'All Women Looking are Pretty and Very Nice Look\r\nThis top from J B Fashion comes in a Multi-colored design and features Lining Designs. Lining designs at the shirt add to the style quotient. This garment can be worn with any solid colored denim, shorts or trousers.', 'Sleeve Look are Great and Better Deigns\r\nThe sleeves of this crepe shirt is designed to perfectly contour the arms and provide a flair fit. The material ensures unrestricted arm movement whether you are going bowling or partying with your friends. Besides, 3/4th sleeve and uniq collar-neck shirt look gorgeous.', 'shirt for women,shirts,girls shirts,shirts,ladis shrirts,under 500 shirts,under 500 shirts for women', 'Care Instructions: Dry Clean Only\r\nFit Type: regular fit\r\nColor Name: White\r\n100% Polyester\r\ndry clean only\r\nTunic\r\nLong Sleeve', 6, 'YES', NULL, '2021-06-26 01:35:17', '', ''),
(17, 1, 2, 8, 11, 'Solid Men Polo Neck Yellow T-Shirt', '500', 200, '300', 'Solid Men Polo Neck Yellow T-ShirtSolid Men Polo Neck Yellow T-ShirtSolid Men Polo Neck Yellow T-ShirtSolid Men Polo Neck Yellow T-ShirtSolid Men Polo Neck Yellow T-ShirtSolid Men Polo Neck Yellow T-Shirt', '502199_pro_img1.jpeg', '893673_pro_img2.jpeg', '573971_pro_img3.jpeg', '680681_pro_img4.jpeg', '981760_des_img1.jpeg', '681371_des_img2.jpeg', '183672_des_img3.jpeg', '664966_des_img4.jpeg', 'Solid Men Polo Neck Yellow T-ShirtSolid Men Polo Neck Yellow T-ShirtSolid Men Polo Neck Yellow T-Shirt', 'Solid Men Polo Neck Yellow T-ShirtSolid Men Polo Neck Yellow T-Shirt', 'Solid Men Polo Neck Yellow T-ShirtSolid Men Polo Neck Yellow T-Shirt', 'tshirt,mens tshirt,', 'Solid Men Polo Neck Yellow T-ShirtSolid Men Polo Neck Yellow T-ShirtSolid Men Polo Neck Yellow T-Shirt', 6, 'YES', NULL, '2021-12-19 12:40:17', 'M,L,XL,XXL', '17,18,19'),
(18, 1, 2, 8, 11, 'Solid Men Polo Neck White T-Shirt1', '500', 200, '300', 'Solid Men Polo Neck White T-Shirt', '607675_pro_img1.jpeg', '531834_pro_img2.jpeg', '753664_pro_img3.jpeg', '796397_pro_img4.jpeg', '818615_des_img1.jpeg', '264069_des_img2.jpeg', '334611_des_img3.jpeg', '494338_des_img4.jpeg', 'Solid Men Polo Neck White T-Shirt', 'Solid Men Polo Neck White T-Shirt', 'Solid Men Polo Neck White T-Shirt', 'Solid Men Polo Neck White T-Shirt', 'Solid Men Polo Neck White T-Shirt', 6, 'YES', NULL, '2022-03-14 06:34:06', 'M,L,XL,XXL', '17,18,19'),
(19, 1, 2, 8, 11, 'Solid Men Polo Neck Red T-Shirt', '500', 200, '300', 'Solid Men Polo Neck Red T-Shirt', '764227_pro_img1.jpeg', '443459_pro_img2.jpeg', '646516_pro_img3.jpeg', '397540_pro_img4.jpeg', '302263_des_img1.jpeg', '496592_des_img2.jpeg', '692550_des_img3.jpeg', '176133_des_img4.jpeg', 'Solid Men Polo Neck Red T-Shirt', 'Solid Men Polo Neck Red T-Shirt', 'Solid Men Polo Neck Red T-Shirt', 'Solid Men Polo Neck Red T-Shirt', 'Solid Men Polo Neck Red T-Shirt', 6, 'YES', NULL, '2021-12-19 12:42:21', 'M,L,XL,XXL', '17,18'),
(20, 1, 1, 2, 11, 'womens coats', '500', 200, '300', 'Solid Men Polo Neck Red T-Shirt', '998004_pro_img1.jpeg', '214566_pro_img2.jpeg', '261221_pro_img3.jpeg', '572744_pro_img4.jpeg', '667909_des_img1.jpeg', '365493_des_img2.jpeg', '803420_des_img3.jpeg', '312288_des_img4.jpeg', 'womens coats', 'womens coats', 'womens coats', 'womens coats', 'womens coats', 6, 'YES', NULL, '2021-12-19 12:43:38', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_qes_ans`
--

CREATE TABLE `tbl_product_qes_ans` (
  `pro_qes_ans_id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `date_of_question` timestamp NULL DEFAULT NULL,
  `date_of_reply` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_public_feedback`
--

CREATE TABLE `tbl_public_feedback` (
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `sender_comment` text DEFAULT NULL,
  `date_of_feedback` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qes_ans_votes`
--

CREATE TABLE `tbl_qes_ans_votes` (
  `qes_ans_vote_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `vote_type` enum('UP','DOWN') DEFAULT NULL,
  `date_of_voted` timestamp NULL DEFAULT NULL,
  `date_of_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `pro_qes_ans_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review_votes`
--

CREATE TABLE `tbl_review_votes` (
  `review_vote_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `vote_type` enum('UP','DOWN') DEFAULT NULL,
  `date_of_voted` timestamp NULL DEFAULT NULL,
  `date_of_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock_list`
--

CREATE TABLE `tbl_stock_list` (
  `stock_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `current_available` varchar(15) DEFAULT NULL,
  `total_stock` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stock_list`
--

INSERT INTO `tbl_stock_list` (`stock_id`, `product_id`, `customer_id`, `current_available`, `total_stock`) VALUES
(1, 13, 1, '10', '100'),
(3, 2, 1, '3', '100'),
(4, 3, 1, '-2', '100'),
(5, 4, 1, '2', '100'),
(6, 5, 1, '0', '100'),
(7, 6, 1, '4', '100'),
(8, 7, 1, '9', '100'),
(9, 8, 1, '7', '110'),
(15, 17, 1, '7', '100'),
(16, 18, 1, '6', '100'),
(17, 19, 1, '0', '100'),
(18, 20, 1, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_category`
--

CREATE TABLE `tbl_sub_category` (
  `sub_cat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(50) NOT NULL,
  `status` enum('YES','NO') NOT NULL,
  `customer_id` int(11) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_category`
--

INSERT INTO `tbl_sub_category` (`sub_cat_id`, `cat_id`, `sub_cat_name`, `status`, `customer_id`, `update_date`) VALUES
(1, 1, 'T-Shirts', 'YES', 1, '2023-03-30 23:53:58'),
(2, 1, 'Coats', 'YES', 1, '2021-06-12 18:30:00'),
(3, 1, 'Shirts', 'YES', 1, '2023-03-31 02:50:45'),
(4, 1, 'Suits & Blazers', 'YES', 1, '2021-06-28 06:42:09'),
(5, 1, 'Jackets', 'YES', 1, '2021-06-12 18:30:00'),
(6, 1, 'Salwar', 'YES', 1, '2021-06-25 15:39:19'),
(7, 2, 'Dresses', 'YES', 1, '2021-06-12 18:30:00'),
(8, 2, 'T-shirts', 'YES', 1, '2021-06-12 18:30:00'),
(10, 2, 'Jeans', 'YES', 1, '2021-06-12 18:30:00'),
(11, 2, 'Tunics', 'YES', 1, '2021-06-12 18:30:00'),
(12, 3, 'T-Shirts', 'YES', 1, '2021-06-12 18:30:00'),
(13, 3, 'Coats', 'YES', 1, '2021-06-12 18:30:00'),
(14, 3, 'Shirts', 'YES', 1, '2021-06-12 18:30:00'),
(15, 3, 'Suits & Blazers', 'YES', 1, '2021-06-12 18:30:00'),
(16, 3, 'Jackets', 'YES', 1, '2021-06-12 18:30:00'),
(17, 3, 'Trousers', 'YES', 1, '2021-06-12 18:30:00'),
(21, 2, 'shoes', 'YES', 1, '0000-00-00 00:00:00'),
(22, 2, 'Men\'s Ethnic Sets', 'YES', 1, '0000-00-00 00:00:00'),
(23, 2, 'Men\'s Formal Shirts', 'YES', 1, '0000-00-00 00:00:00'),
(24, 2, 'Men\'s T-Shirts', 'YES', 1, '0000-00-00 00:00:00'),
(25, 1, 'Women Kurtas & Kurtis', 'YES', 1, '0000-00-00 00:00:00'),
(26, 1, 'Women Lehenga Cholis', 'YES', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ticket_product`
--

CREATE TABLE `tbl_ticket_product` (
  `tick_pro_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `ticket_comments_seller` text DEFAULT NULL,
  `ticket_staus` enum('PENDING','SUCCESS') NOT NULL,
  `ticket_reply` text NOT NULL,
  `date_of_raised` timestamp NULL DEFAULT NULL,
  `date_of_reply` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`wishlist_id`, `product_id`, `customer_id`) VALUES
(15, 5, 9),
(16, 6, 9),
(17, 2, 9),
(18, 17, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_coupon_code`
--
ALTER TABLE `tbl_coupon_code`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_product_qes_ans`
--
ALTER TABLE `tbl_product_qes_ans`
  ADD PRIMARY KEY (`pro_qes_ans_id`);

--
-- Indexes for table `tbl_public_feedback`
--
ALTER TABLE `tbl_public_feedback`
  ADD PRIMARY KEY (`sender_id`);

--
-- Indexes for table `tbl_qes_ans_votes`
--
ALTER TABLE `tbl_qes_ans_votes`
  ADD PRIMARY KEY (`qes_ans_vote_id`);

--
-- Indexes for table `tbl_review_votes`
--
ALTER TABLE `tbl_review_votes`
  ADD PRIMARY KEY (`review_vote_id`);

--
-- Indexes for table `tbl_stock_list`
--
ALTER TABLE `tbl_stock_list`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `tbl_ticket_product`
--
ALTER TABLE `tbl_ticket_product`
  ADD PRIMARY KEY (`tick_pro_id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_coupon_code`
--
ALTER TABLE `tbl_coupon_code`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_product_qes_ans`
--
ALTER TABLE `tbl_product_qes_ans`
  MODIFY `pro_qes_ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_public_feedback`
--
ALTER TABLE `tbl_public_feedback`
  MODIFY `sender_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_qes_ans_votes`
--
ALTER TABLE `tbl_qes_ans_votes`
  MODIFY `qes_ans_vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_review_votes`
--
ALTER TABLE `tbl_review_votes`
  MODIFY `review_vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stock_list`
--
ALTER TABLE `tbl_stock_list`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_ticket_product`
--
ALTER TABLE `tbl_ticket_product`
  MODIFY `tick_pro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
