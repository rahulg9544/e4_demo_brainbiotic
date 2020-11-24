-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 10:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babiesmoments`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about_title1` text NOT NULL,
  `about_content1` text NOT NULL,
  `about_title2` text NOT NULL,
  `about_content2` text NOT NULL,
  `about_banner_image` text NOT NULL,
  `about_content_image` text NOT NULL,
  `about_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_title1`, `about_content1`, `about_title2`, `about_content2`, `about_banner_image`, `about_content_image`, `about_date`) VALUES
(1, 'Babies Moments', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Designer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. test', '20201123_084747d573d69507319c99a12401818c0347fd.jpg', '20201123_08532535bc13a9bda0215a79536bdd46bfd998.jpg', '2020-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `addressprofile`
--

CREATE TABLE `addressprofile` (
  `addressprofile_id` int(11) NOT NULL,
  `addressprofile_userid` int(11) NOT NULL,
  `addressprofile_fname` text NOT NULL,
  `addressprofile_lname` varchar(100) NOT NULL,
  `addressprofile_mail` varchar(100) NOT NULL,
  `addressprofile_mobile` varchar(60) NOT NULL,
  `addressprofile_city` text NOT NULL,
  `addressprofile_street` text NOT NULL,
  `addressprofile_block` varchar(100) NOT NULL,
  `addressprofile_hb` varchar(100) NOT NULL,
  `addressprofile_avenue` varchar(100) NOT NULL,
  `addressprofile_more` varchar(100) NOT NULL,
  `addressprofile_date` date NOT NULL,
  `addressprofile_inv_status` int(11) NOT NULL,
  `addressprofile_inv_fname` varchar(100) NOT NULL,
  `addressprofile_inv_lname` varchar(100) NOT NULL,
  `addressprofile_inv_mail` varchar(100) NOT NULL,
  `addressprofile_inv_mobile` varchar(100) NOT NULL,
  `addressprofile_inv_city` varchar(100) NOT NULL,
  `addressprofile_inv_street` varchar(100) NOT NULL,
  `addressprofile_inv_block` varchar(100) NOT NULL,
  `addressprofile_inv_hb` varchar(100) NOT NULL,
  `addressprofile_inv_avenue` varchar(100) NOT NULL,
  `addressprofile_inv_more` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addressprofile`
--

INSERT INTO `addressprofile` (`addressprofile_id`, `addressprofile_userid`, `addressprofile_fname`, `addressprofile_lname`, `addressprofile_mail`, `addressprofile_mobile`, `addressprofile_city`, `addressprofile_street`, `addressprofile_block`, `addressprofile_hb`, `addressprofile_avenue`, `addressprofile_more`, `addressprofile_date`, `addressprofile_inv_status`, `addressprofile_inv_fname`, `addressprofile_inv_lname`, `addressprofile_inv_mail`, `addressprofile_inv_mobile`, `addressprofile_inv_city`, `addressprofile_inv_street`, `addressprofile_inv_block`, `addressprofile_inv_hb`, `addressprofile_inv_avenue`, `addressprofile_inv_more`) VALUES
(41, 67, 'Anseb', 'a', 'ansebali2@gmail.com', '9747738699', '972', 'Kalladikkunnath house palappilly', '1313dds', '6', 'asima avenue', '', '2020-11-20', 1, 'Anseb', 'a', 'ansebkali@gmail.com', '9747738699', '941', 'Kalladikkunnath house palappilly', 'sdfsfs', 'ds32', '43', ''),
(42, 67, 'Anseb', 'a', 'ansebali2@gmail.com', '9747738699', '954', 'Kalladikkunnath house palappilly', '1313dds', '6', 'dfsdfsd', '', '2020-11-20', 1, 'Anseb', 'a', 'ansebkali@gmail.com', '9747738699', '954', 'Kalladikkunnath house palappilly', '1313dds', '6', 'dfsdfsd', ''),
(43, 68, 'Anseb', 'a', 'ansebkali@gmail.com', '132312442', '972', 'Kalladikkunnath house palappilly', '1313dds', '6', 'asima avenue', '', '2020-11-21', 0, 'Anseb', 'a', 'ansebali2@gmail.com', '132312442', '941', 'Kalladikkunnath house palappilly', '1313dds', '6', 'asima avenue', ''),
(44, 68, 'emil ', 'joy', 'joemil007@gmail.com', '213123123', '949', 'test', '1313dds', '6', 'asima avenue', '', '2020-11-21', 1, 'emil', 'maliyekkal', 'ansebkali@gmail.com', '23213123', '951', 'malikkal', 'sdfsfs', 'ds32', '43', ''),
(46, 70, 'emil ', 'joy', 'joemil007@gmail.com', '23242442', '961', 'maliyekkal', 'test block', '6', 'asima avenue', '', '2020-11-21', 1, 'akhil', 'joy', 'joemil007@gmail.com', '42313211', '948', 'malikkal', 'sdfsfs', 'ds32', '43', '');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_title` varchar(250) NOT NULL,
  `banner_shortdesc` text NOT NULL,
  `banner_titlear` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `banner_shortdescar` text CHARACTER SET utf8mb4 NOT NULL,
  `banner_image` text NOT NULL,
  `banner_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_title`, `banner_shortdesc`, `banner_titlear`, `banner_shortdescar`, `banner_image`, `banner_date`) VALUES
(1, 'Babies Moments', 'Britax Safe-n-Sound<br> B First Car Seat', 'المجوهرات المعاصرة المصنوعة يدويا', 'خصم يصل إلى 50٪ على الربيع والصيف', '392f992ed11d9eb2698954d4d356d49e.jpg', '2020-11-18'),
(3, 'Babies Moments', 'Baby Wear', 'المجوهرات والاكسسوارات', '2020 تتجه', 'b32742d742ef2ff2ddde7e78c48a9246.jpg', '2020-11-18'),
(2, 'Babies Moments', 'Designing your<br> baby\'s nursery', 'أطلق العنان لخيالك', 'الوافدون الجدد كل أسبوع!', 'ebb455bf54379d773aec9b04912783b4.jpg', '2020-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(250) NOT NULL,
  `brand_category` varchar(250) NOT NULL,
  `brand_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_category`, `brand_date`) VALUES
(3, 'w', 'Accessories', '2020-10-11'),
(2, 'Titan', 'Categories', '2020-10-11'),
(5, 'Raymonds', 'Categories', '2020-10-10'),
(7, 'Kids Toys BRAND', 'Kids Categories', '2020-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_prod_unique_id` text NOT NULL,
  `cart_user_id` int(11) NOT NULL,
  `cart_product_id` int(11) NOT NULL,
  `cart_quantity` int(11) NOT NULL,
  `cart_sizecolorstat` int(10) NOT NULL,
  `cart_price` double(10,2) NOT NULL,
  `cart_size` varchar(100) NOT NULL,
  `cart_color` varchar(1000) NOT NULL,
  `cart_addedcomm` double(10,2) NOT NULL,
  `cart_tax` double(10,2) NOT NULL,
  `cart_status` int(11) NOT NULL,
  `cart_ordr_status` int(11) NOT NULL,
  `cart_amount` double(10,2) NOT NULL,
  `cart_coupon` int(10) NOT NULL,
  `cart_coupon_no` varchar(300) NOT NULL,
  `cart_coupon_amount` double(12,3) NOT NULL,
  `cart_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_prod_unique_id`, `cart_user_id`, `cart_product_id`, `cart_quantity`, `cart_sizecolorstat`, `cart_price`, `cart_size`, `cart_color`, `cart_addedcomm`, `cart_tax`, `cart_status`, `cart_ordr_status`, `cart_amount`, `cart_coupon`, `cart_coupon_no`, `cart_coupon_amount`, `cart_date`) VALUES
(42, '', 26, 34, 2, 0, 0.00, '20', 'black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-05'),
(43, '', 9, 34, 1, 0, 0.00, '20', 'black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-05'),
(44, '', 27, 32, 4, 0, 0.00, '20', 'Black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-05'),
(47, '', 27, 32, 6, 0, 0.00, '20', 'Black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-05'),
(56, '', 73072840, 41, 1, 0, 0.00, '28', 'white', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-07'),
(57, '', 73072840, 50, 1, 0, 0.00, '40', 'White', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-07'),
(58, '', 73072840, 46, 1, 0, 0.00, '22', 'red', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-07'),
(59, '', 73072840, 36, 2, 0, 0.00, '22', '3b6a13dcf2895f77400739e798e6c504.png', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-07'),
(60, '', 73072840, 36, 1, 0, 0.00, '24', 'Black', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-07'),
(66, '', 66124223, 40, 2, 0, 0.00, '22', 'white', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-08'),
(69, '', 87072308, 43, 8, 0, 0.00, '28', 'white', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-08'),
(77, '', 9, 51, 1, 0, 0.00, '22', 'Black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-10'),
(78, '', 9, 36, 1, 0, 0.00, '22', 'green', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-10'),
(79, '', 33, 47, 1, 0, 0.00, '22', 'pink', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-10'),
(82, '', 34, 51, 1, 0, 0.00, '22', 'Black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-10'),
(83, '', 33, 40, 1, 0, 0.00, '22', 'red', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-10'),
(84, '', 33, 48, 1, 0, 0.00, '26', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-10'),
(85, '', 33, 36, 1, 0, 0.00, '24', 'Black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-10'),
(86, '', 34, 40, 1, 0, 0.00, '22', 'red', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-10'),
(87, '', 33, 36, 1, 0, 0.00, '24', 'Black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-10'),
(92, '', 36, 48, 1, 0, 0.00, '22', 'pink', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-10'),
(96, '', 27, 51, 1, 0, 0.00, '22', 'Black', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-10'),
(102, '', 38, 40, 1, 0, 0.00, '22', 'red', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(108, '', 39, 54, 1, 0, 0.00, '20', 'pink', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(111, '', 39, 55, 1, 0, 0.00, '22', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(112, '', 39, 36, 1, 0, 0.00, '24', 'Brown', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(113, '', 39, 49, 1, 0, 0.00, '38', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(114, '', 39, 57, 3, 0, 0.00, '22', 'Black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(115, '', 39, 55, 1, 0, 0.00, '22', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(116, '', 34045153, 36, 1, 0, 0.00, '22', 'Gray', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-11'),
(117, '', 41, 54, 1, 0, 0.00, '20', 'pink', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(118, '', 38, 36, 1, 0, 0.00, '22', 'Gray', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(120, '', 38, 58, 1, 0, 0.00, '22', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(121, '', 38, 36, 1, 0, 0.00, '22', 'Gray', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(122, '', 38, 57, 1, 0, 0.00, '22', 'Black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(126, '', 38, 36, 1, 1, 0.00, '22', 'Gray', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(127, '', 38, 60, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(128, '', 38, 60, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(129, '', 38, 55, 1, 1, 0.00, '22', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(132, '', 39, 49, 1, 1, 0.00, '40', 'White', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(135, '', 43, 55, 2, 1, 0.00, '22', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(136, '', 39, 34, 1, 1, 0.00, '38', 'Green', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(138, '', 46, 62, 3, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(142, '', 43, 57, 5, 1, 0.00, '22', 'Black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(147, '', 43, 61, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(148, '', 43, 57, 1, 1, 0.00, '22', 'Black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(149, '', 46, 63, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-11'),
(150, '', 43, 64, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-11'),
(151, '', 9, 36, 101, 1, 0.00, '22', 'Gray', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-12'),
(152, '', 9, 34, 100, 1, 0.00, '38', 'Green', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-12'),
(153, '', 9, 58, 200, 1, 0.00, '22', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-12'),
(154, '', 9, 57, 400, 1, 0.00, '22', 'Black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-12'),
(155, '', 9, 58, 1, 1, 0.00, '22', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-12'),
(156, '', 9, 61, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-12'),
(159, '', 48, 54, 1, 1, 0.00, '20', 'pink', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-12'),
(162, '', 9, 62, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-12'),
(163, '', 9, 62, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-12'),
(164, '', 9, 63, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-12'),
(168, '', 98055925, 56, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-12'),
(169, '', 98055925, 55, 1, 1, 0.00, '22', 'Blue', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-12'),
(170, '', 98055925, 67, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-12'),
(171, '', 98055925, 36, 1, 1, 0.00, '24', 'Yellow', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-12'),
(175, '', 49, 67, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-12'),
(177, '', 49, 40, 1, 1, 0.00, '38', 'Blue', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-12'),
(181, '', 39, 36, 1, 1, 0.00, '22', 'Gray', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-12'),
(182, '', 34045153, 67, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-12'),
(185, '', 97073140, 73, 2, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-15'),
(186, '', 39, 74, 2, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-15'),
(187, '', 97073140, 72, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-15'),
(188, '', 39, 57, 1, 1, 0.00, '22', 'Black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-15'),
(189, '', 39, 49, 2, 1, 0.00, '38', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-15'),
(190, '', 39, 49, 1, 1, 0.00, '40', 'White', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-15'),
(191, '', 9, 78, 1, 1, 0.00, '18', 'white', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-16'),
(192, '', 9, 49, 1, 1, 0.00, '38', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-16'),
(197, '', 9, 49, 10, 1, 0.00, '38', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-16'),
(198, '', 9, 49, 5, 1, 0.00, '40', 'White', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-16'),
(199, '', 9, 49, 10, 1, 0.00, '38', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-16'),
(200, '', 9, 49, 7, 1, 0.00, '40', 'White', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-16'),
(204, '', 58112614, 78, 1, 1, 0.00, '18', 'white', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-17'),
(207, '', 9, 68, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-18'),
(208, '', 9, 80, 2, 1, 0.00, '40', 'black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-18'),
(215, '', 13013228, 40, 1, 1, 0.00, '38', 'Blue', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-20'),
(216, '', 15035528, 80, 2, 1, 0.00, '40', 'black', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-20'),
(217, '', 53, 40, 1, 1, 0.00, '38', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-21'),
(218, '', 53, 67, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-21'),
(219, '', 53, 40, 1, 1, 0.00, '38', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-21'),
(220, '', 39, 49, 1, 1, 0.00, '38', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-21'),
(221, '', 53, 40, 1, 1, 0.00, '38', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-22'),
(233, '', 39, 61, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-27'),
(236, '', 9, 61, 2, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-29'),
(237, '', 56, 61, 2, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-27'),
(243, '', 52, 40, 1, 1, 0.00, '38', 'Blue', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-29'),
(244, '', 52, 80, 1, 1, 0.00, '38', 'Blue', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-29'),
(245, '', 52, 56, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-10-29'),
(246, '', 9, 40, 5, 1, 0.00, '38', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-10-31'),
(251, '', 39, 40, 1, 1, 0.00, '38', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-02'),
(252, '', 39, 71, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-02'),
(254, '', 72022413, 71, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-11-03'),
(255, '', 59, 61, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-11-05'),
(256, '', 9, 70, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-06'),
(258, '', 39, 57, 1, 1, 0.00, '22', 'Black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-06'),
(259, '', 91092420, 93, 7, 3, 0.00, '22', 'n/a', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-11-06'),
(260, '', 93075729, 93, 7, 3, 0.00, '22', 'n/a', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-11-06'),
(262, '', 9, 94, 16, 3, 0.00, '20', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-06'),
(263, '', 9, 93, 5, 3, 0.00, '22', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-06'),
(264, '', 9, 94, 4, 3, 0.00, '20', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-06'),
(265, '', 9, 40, 70, 1, 0.00, '38', 'Blue', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-06'),
(266, '', 9, 95, 25, 1, 0.00, '22', 'green', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-06'),
(267, '', 9, 60, 6, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-06'),
(268, '', 9, 95, 100, 1, 0.00, '22', 'Gray', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-06'),
(269, '', 9, 70, 10, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-06'),
(271, '', 9, 61, 2, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-06'),
(272, '', 60, 84, 1, 1, 0.00, '34', 'Yellow', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-06'),
(273, '', 39, 71, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-06'),
(274, '', 60, 83, 29, 1, 0.00, '34', 'black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-06'),
(275, '', 9, 91, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-07'),
(281, '', 9, 69, 1, 1, 0.00, '20', '2c71194becc5d9e799aa40352f25111e.jpg', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-07'),
(282, '', 39, 83, 1, 1, 0.00, '34', 'black', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-11-07'),
(283, '', 98093856, 71, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-11-09'),
(285, '', 12055829, 90, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-11-11'),
(286, '', 76052058, 84, 1, 1, 0.00, '34', 'Blue', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-11-11'),
(287, '', 9, 56, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-11-16'),
(288, '', 9, 70, 1, 0, 0.00, 'n/a', 'n/a', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-11-16'),
(289, '', 9, 36, 2, 1, 0.00, '22', 'White', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-11-17'),
(290, '', 9, 36, 2, 1, 0.00, '22', 'Gray', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-11-17'),
(291, '', 61, 83, 1, 1, 0.00, '34', 'black', 0.00, 0.00, 1, 1, 0.00, 0, '', 0.000, '2020-11-17'),
(292, '', 9, 36, 1, 1, 0.00, '22', 'White', 0.00, 0.00, 1, 0, 0.00, 0, '', 0.000, '2020-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_label` varchar(250) NOT NULL,
  `category_label_ar` text CHARACTER SET utf8 NOT NULL,
  `category_homepic` text NOT NULL,
  `category_bannerpic` text NOT NULL,
  `category_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_label`, `category_label_ar`, `category_homepic`, `category_bannerpic`, `category_date`) VALUES
(3, 'Playing Moments', 'التصنيفات', '729f93290cf2a130e0fe5ca442769692.jpg', 'fc8dcf1082fed4b1d9da753d467ea374.jpg', '2020-11-21'),
(5, 'Skin & Oral Caring Moments', 'مستلزمات', '19495ff769d3784450150ae7c4320660.jpg', '265975ef7cd2d35b7cfb6cd74b26e517.jpg', '2020-11-21'),
(11, 'Diapering Moments', 'asdasd', '5fca1c2e104bb0ab114fa91f7c58c04c.jpg', '76ac24dd7790c5a1165b8d081df5c1c4.jpg', '2020-11-21'),
(12, 'Feeding & Drinking Moments', 'wddqw', '6ff777cc4ba7e7f4bb0cf6e8aee78be3.jpg', '11e7d78388c4bef1e4ded789ee53f99a.jpg', '2020-11-21'),
(13, 'Travelling Moments', 'dsadas', '6675e06ee0d5d75a63e376f714b123d1.jpg', 'f19c5398807997072f2f2ad914f59982.jpg', '2020-11-21'),
(14, 'Bathing Moments', 'adsadaS', '9a1c3c8238981c3b52f40eeda345359f.jpg', 'c94cee95d03946ba3e9288f8362357a8.jpg', '2020-11-21'),
(15, 'Nursery Moments', 'DASDASD', '160085572a45177cfd174dfee2552fc8.jpg', '6b0d237f051bcf46e106aa161bc65618.jpg', '2020-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(200) NOT NULL,
  `min_value` double(10,3) NOT NULL,
  `delivery_charge` double(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `min_value`, `delivery_charge`) VALUES
(941, 'Salmiya', 10.000, 1.000),
(948, 'Jabriya', 10.000, 1.000),
(949, 'Rumaithiya', 10.000, 1.000),
(951, 'Maidan Hawally', 10.000, 1.000),
(953, 'Sabah Al Salem', 10.000, 1.500),
(954, 'Mishref', 10.000, 1.500),
(955, 'Hateen', 10.000, 1.500),
(956, 'Messila', 10.000, 1.500),
(957, 'Salwa', 10.000, 1.500),
(958, 'Surra', 10.000, 1.500),
(959, 'Bayan', 10.000, 1.500),
(960, 'Al salam', 10.000, 1.500),
(961, 'Al Siddiqi', 10.000, 1.500),
(962, 'Rawda', 10.000, 1.500),
(963, 'Nuzha', 10.000, 1.500),
(964, 'Shaab', 10.000, 1.500),
(965, 'Abdullah Al-Salem', 10.000, 1.500),
(966, 'Adiliya', 10.000, 1.500),
(967, 'Bnied Al-Gar', 10.000, 1.500),
(968, 'Al Da\'iya', 10.000, 1.500),
(969, 'Al Dasma', 10.000, 1.500),
(970, 'Dasman', 10.000, 1.500),
(971, 'Al Faiha', 10.000, 1.500),
(972, 'Kaifan', 10.000, 1.500),
(973, 'Khaldiya', 10.000, 1.500),
(974, 'Al Mansouriah', 10.000, 1.500),
(975, 'Qadsia', 10.000, 1.500),
(976, 'Qortuba', 10.000, 1.500),
(977, 'Al Yarmouk', 10.000, 1.500),
(979, 'Adan', 15.000, 2.000),
(980, 'Masayel', 15.000, 2.000),
(981, 'Qurain', 15.000, 2.000),
(982, 'Fnaitees', 15.000, 2.000),
(983, 'Abu \'Fteira', 15.000, 2.000),
(984, 'Mubarak Al Kabeer', 15.000, 2.000),
(985, 'Daher', 14.000, 2.000),
(986, 'Qusour', 15.000, 2.000),
(987, 'Sulaibikhat', 15.000, 2.000),
(988, 'Andalous', 15.000, 2.000),
(989, 'Ardiya', 15.000, 2.000),
(990, 'Al Rai', 15.000, 2.000),
(991, 'Firdous', 15.000, 2.000),
(992, 'Sabah Al Nasser', 15.000, 2.000),
(993, 'Rabia', 15.000, 2.000),
(994, 'Omariya', 15.000, 2.000),
(995, 'Farwaniyah', 15.000, 2.000),
(996, 'Khaitan', 15.000, 2.000),
(997, 'Sulaibeya', 15.000, 2.000),
(998, 'Jahra', 20.000, 2.500),
(999, 'Saba Abdullah', 20.000, 2.500),
(1000, 'Saba Abdullah', 20.000, 2.500),
(1001, 'Doha', 20.000, 2.500),
(1005, 'Hawally', 10.000, 1.000);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(10) NOT NULL,
  `contact_address` text NOT NULL,
  `contact_phon` varchar(100) NOT NULL,
  `contact_whatsapp` varchar(100) NOT NULL,
  `contact_mail` text NOT NULL,
  `contact_cmail` text NOT NULL,
  `contact_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_address`, `contact_phon`, `contact_whatsapp`, `contact_mail`, `contact_cmail`, `contact_date`) VALUES
(1, 'P.O. Box 2117, Postal Code 92400,\r\nALARDIYA, KUWAIT.', '+965 6665 0677', '+965 6665 0677', 'info@babiesmoments.com', 'career@dentaklik.com', '2020-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `deliverycharge`
--

CREATE TABLE `deliverycharge` (
  `dc_id` int(11) NOT NULL,
  `dc_cart_id` int(11) NOT NULL,
  `dc_user_id` int(11) NOT NULL,
  `dc_prod_id` int(11) NOT NULL,
  `dc_order_id` text NOT NULL,
  `dc_agent_id` int(11) NOT NULL,
  `dc_address_id` int(11) NOT NULL,
  `dc_prod_name` text NOT NULL,
  `dc_prod_desc` text NOT NULL,
  `dc_prod_measure` text NOT NULL,
  `dc_prod_quantity` int(11) NOT NULL,
  `dc_prod_image` text NOT NULL,
  `dc_prod_size` varchar(100) NOT NULL,
  `dc_prod_color` text NOT NULL,
  `dc_prod_commoffer` double(10,2) NOT NULL,
  `dc_prod_tax` double(10,2) NOT NULL,
  `dc_prod_actualcommission` double(10,2) NOT NULL,
  `dc_prod_actualstoreprice` double(10,2) NOT NULL,
  `dc_time` time NOT NULL,
  `dc_date` date NOT NULL,
  `dc_shipped_date` date NOT NULL,
  `dc_shipped_time` time NOT NULL,
  `dc_delivery_date` date NOT NULL,
  `dc_delivery_time` time NOT NULL,
  `dc_status` int(11) NOT NULL COMMENT 'delivered status',
  `order_status` int(11) NOT NULL COMMENT 'shipped status',
  `dc_cancel_order` int(11) NOT NULL,
  `dc_delivery_distance` text NOT NULL,
  `dc_deliveryboy_charge` double(10,2) NOT NULL,
  `dc_deliveryowner_charge` double(10,2) NOT NULL,
  `dc_payment_mode` int(11) NOT NULL,
  `delivery_charge` double(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `division_id` int(11) NOT NULL,
  `division_name` varchar(100) NOT NULL,
  `division_cat` int(11) NOT NULL,
  `division_subcat` int(11) NOT NULL,
  `division_desc` text NOT NULL,
  `division_status` int(11) NOT NULL,
  `division_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`division_id`, `division_name`, `division_cat`, `division_subcat`, `division_desc`, `division_status`, `division_date`) VALUES
(6, 'Infant pillow', 3, 42, 'xczxczx', 1, '2020-11-20'),
(8, 'Baby Pillow', 15, 42, 'asdasdas', 1, '2020-11-20'),
(9, 'Toddler Pillow', 15, 42, 'adasdaSDAS', 1, '2020-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `newssub`
--

CREATE TABLE `newssub` (
  `newssub_id` int(11) NOT NULL,
  `newssub_mail` varchar(250) NOT NULL,
  `newssub_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newssub`
--

INSERT INTO `newssub` (`newssub_id`, `newssub_mail`, `newssub_date`) VALUES
(4, 'anseb999@yahoo.com', '2020-10-18'),
(5, 'ansebkali@gmail.com', '2020-10-18'),
(6, '', '2020-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offers_id` int(11) NOT NULL,
  `offers_sub_cat_id` int(11) NOT NULL,
  `offers_image` text NOT NULL,
  `offers_text1` text NOT NULL,
  `offers_text1_ar` text NOT NULL,
  `offers_text2` text NOT NULL,
  `offers_text2_ar` text NOT NULL,
  `offers_start_percetage` text NOT NULL,
  `offers_end_percentage` text NOT NULL,
  `offers_status` int(11) NOT NULL COMMENT '"0" for active "1" for deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offertext`
--

CREATE TABLE `offertext` (
  `offertext_id` int(11) NOT NULL,
  `offertext_text` text NOT NULL,
  `offertext_text_arabic` text CHARACTER SET utf8mb4 NOT NULL,
  `offertext_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offertext`
--

INSERT INTO `offertext` (`offertext_id`, `offertext_text`, `offertext_text_arabic`, `offertext_date`) VALUES
(1, 'SALES: 50% off on Spring-Summer 20 collection', 'المبيعات: خصم 50٪ على مجموعة ربيع وصيف 20', '2020-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(10) NOT NULL,
  `orders_uniq_id` varchar(200) NOT NULL,
  `orders_user_id` varchar(100) NOT NULL,
  `orders_adrs_id` int(10) NOT NULL,
  `orders_total_amount` double(12,3) NOT NULL,
  `orders_total_offer_amount` double(12,3) NOT NULL,
  `orders_promocode` text NOT NULL,
  `orders_total_qty` varchar(100) NOT NULL,
  `orders_delcharge` double(10,2) NOT NULL,
  `orders_invoice` text NOT NULL,
  `orders_status` int(11) NOT NULL,
  `orders_cancel_status` int(10) NOT NULL,
  `orders_date` date NOT NULL,
  `orders_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delivery_charge` double(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_user_id` int(11) NOT NULL,
  `payment_order_id` text NOT NULL,
  `PaymentID` text NOT NULL,
  `Result` text NOT NULL,
  `PostDate` text NOT NULL,
  `TranID` text NOT NULL,
  `Ref` text NOT NULL,
  `TrackID` text NOT NULL,
  `Auth` text NOT NULL,
  `OrderID` text NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_user_id`, `payment_order_id`, `PaymentID`, `Result`, `PostDate`, `TranID`, `Ref`, `TrackID`, `Auth`, `OrderID`, `payment_date`) VALUES
(3, 53, 'toot53145', '100202029627779085', 'CAPTURED', '1022', '202029627814379', '029610000323', '3ed9162606d00f84bd46b2f058eee851', 'B34871', '1603355524', '2020-10-22 11:33:31'),
(4, 39, 'toot39830', '100202030149364137', 'CAPTURED', '1028', '202030150625449', '030110000814', '5522fee06297dcc7c374cbe1dedf779a', 'B52088', '1603798693', '2020-10-27 02:38:47'),
(5, 9, 'toot9445', '100202031042752174', 'CAPTURED', '1106', '202031042763198', '031010001050', '314875ccaee68b91be4818e7541166bd', 'B85577', '1604585450', '2020-11-05 05:11:39'),
(6, 9, 'toot9738', '100202031179128597', 'CAPTURED', '1106', '202031179118370', '031110000133', 'c7f5c6414c84917567705da7a9e56699', 'B04894', '1604641697', '2020-11-06 08:48:54'),
(7, 9, '', '100202031174427947', 'CANCELED', '', '', '', '8e4f8549ba67925e7f5e167c45d2d8aa', '', '1604651096', '2020-11-06 11:25:50'),
(8, 9, 'toot9154', '100202031174384721', 'CAPTURED', '1106', '202031174360420', '031110000259', '6c348d44f9c8b68402574a854d02552a', 'B21769', '1604651178', '2020-11-06 11:27:30'),
(9, 9, 'toot9349', '100202031125699264', 'CAPTURED', '1106', '202031125710328', '031110000262', '6510155599f56968397a78fa512c35a3', 'B13991', '1604651350', '2020-11-06 11:29:51'),
(10, 9, 'toot9349', '100202031125699264', 'CAPTURED', '1106', '202031125710328', '031110000262', '6510155599f56968397a78fa512c35a3', 'B13991', '1604651350', '2020-11-06 11:30:32'),
(11, 9, 'toot9352', '100202031126628647', 'CAPTURED', '1106', '202031173352435', '031110000286', '3fb56fbff2d44184cf3671e1103c4a2e', 'B21105', '1604653210', '2020-11-06 12:01:06'),
(12, 9, 'toot9282', '100202031126762770', 'CAPTURED', '1106', '202031126774790', '031110000295', '8b7f704fb350920884567698ba4c3779', 'B22560', '1604653478', '2020-11-06 12:05:20'),
(13, 9, 'toot9605', '100202031172964508', 'CAPTURED', '1106', '202031172947551', '031110000299', 'c5b8d03464621525e7b8f22e7edef6ea', 'B31475', '1604654024', '2020-11-06 12:14:35'),
(14, 9, 'toot9605', '100202031172964508', 'CAPTURED', '1106', '202031172947551', '031110000299', 'c5b8d03464621525e7b8f22e7edef6ea', 'B31475', '1604654024', '2020-11-06 12:15:11'),
(15, 60, 'toot60684', '100202031142094633', 'CAPTURED', '1107', '202031157884656', '031110000587', '4f5db3f74a47da20875fc13f5e9a36e4', 'B13681', '1604684138', '2020-11-06 08:36:46'),
(16, 39, 'toot39326', '100202031157813946', 'CAPTURED', '1107', '202031157797360', '031110000589', 'ddb38bd2daa08f23db2b271fb7e5307f', 'B61975', '1604684327', '2020-11-06 08:39:36'),
(17, 60, 'toot60984', '100202031142366992', 'CAPTURED', '1107', '202031142400623', '031110000594', 'c86f715724b4c6027064629dd2f95a97', 'B94651', '1604684683', '2020-11-06 08:46:14'),
(18, 9, 'toot9969', '100202031286586961', 'CAPTURED', '1107', '202031213428597', '031210000104', '829f514ff449c079827a97d2faad186d', 'B17107', '1604726775', '2020-11-07 08:27:07'),
(19, 9, 'toot9486', '100202031213865720', 'CAPTURED', '1107', '202031286120751', '031210000108', '8aa6fa67eb51090b6a528b50b0af36e2', 'B99208', '1604727682', '2020-11-07 08:42:09'),
(20, 61, 'toot61192', '100202032208438049', 'CAPTURED', '1118', '202032291523215', '032210000745', '8b7343022fedb1ea9b22c6547863b950', 'B64196', '1605616823', '2020-11-17 03:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_unique_id` varchar(250) NOT NULL,
  `product_category` varchar(250) NOT NULL,
  `product_subcategory` varchar(250) NOT NULL,
  `product_division` int(11) NOT NULL,
  `product_brand` varchar(250) NOT NULL,
  `product_priority` varchar(250) NOT NULL,
  `product_size_status` int(11) NOT NULL COMMENT '"0" - no attribute "1" - both "2" - colour "3" - size',
  `product_name` varchar(250) NOT NULL,
  `product_name_arab` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `product_rate` double(10,3) NOT NULL,
  `product_purchase_rate` varchar(250) NOT NULL,
  `product_discount` double(10,2) NOT NULL,
  `product_discount_price` varchar(250) NOT NULL,
  `product_sell_price` double(10,3) NOT NULL,
  `product_desc` text NOT NULL,
  `product_desc_arab` text CHARACTER SET utf8mb4 NOT NULL,
  `product_iconic` int(10) NOT NULL,
  `product_composition` text NOT NULL,
  `product_composition_arab` text CHARACTER SET utf8mb4 NOT NULL,
  `product_instruction` text NOT NULL,
  `product_instruction_arab` text CHARACTER SET utf8mb4 NOT NULL,
  `product_shipping` text NOT NULL,
  `product_shipping_arab` text CHARACTER SET utf8mb4 NOT NULL,
  `product_image` text NOT NULL,
  `product_sizeno` varchar(250) NOT NULL,
  `product_sizeletter` varchar(250) NOT NULL,
  `product_shoesizeno` varchar(250) NOT NULL,
  `product_quantity` varchar(250) NOT NULL,
  `product_mrpwise` varchar(1000) NOT NULL,
  `product_sellpricewise` varchar(1000) NOT NULL,
  `product_discountwise` varchar(1000) NOT NULL,
  `product_available` varchar(250) NOT NULL,
  `product_color` varchar(250) NOT NULL,
  `product_status` varchar(250) NOT NULL,
  `product_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_unique_id`, `product_category`, `product_subcategory`, `product_division`, `product_brand`, `product_priority`, `product_size_status`, `product_name`, `product_name_arab`, `product_rate`, `product_purchase_rate`, `product_discount`, `product_discount_price`, `product_sell_price`, `product_desc`, `product_desc_arab`, `product_iconic`, `product_composition`, `product_composition_arab`, `product_instruction`, `product_instruction_arab`, `product_shipping`, `product_shipping_arab`, `product_image`, `product_sizeno`, `product_sizeletter`, `product_shoesizeno`, `product_quantity`, `product_mrpwise`, `product_sellpricewise`, `product_discountwise`, `product_available`, `product_color`, `product_status`, `product_date`) VALUES
(36, 'PRD443988712', '3', '7', 0, '', '0', 1, 'Tops & Shirts', '', 15.000, '8', 0.00, '', 15.000, 'Tops & Shirts', '', 0, 'Tops & Shirts', '', '', '', '', '', '20201011_081555shirt3.jpg,20201011_081555shirt21.jpg', '22,22,24,24,24', 'S,S,S,S,S', '', '10,10,10,10,10', '15,15,10,15,15', '15,15,10,15,15', '0,0,0,0,0', '0', 'White,Gray,Black,Blue,Yellow', '', '2020-10-11'),
(57, 'PRD103566732', '5', '10', 0, '', '0', 1, 'Bangles', 'أساور', 8.000, '4', 50.00, '', 4.000, 'Bangles', '', 1, '', '', '', '', '', '', '20201011_120956product3.jpg,20201011_120956product8.jpg', '22,22', 'S,S', '', '10,10', '8,8', '6,6', '25,25', '0', 'Black,White', '', '2020-10-28'),
(58, 'PRD4988110107', '5', '23', 0, '', '0', 1, 'Earrings', '', 8.000, '4', 25.00, '', 6.000, 'Earrings', '', 0, '', '', '', '', '', '', '20201011_121940ear1.jpg,20201011_121940ear1.jpg', '22,22', 'S,S', '', '10,10', '8,8', '6,6', '25,25', '0', 'Blue,Black', '', '2020-10-11'),
(34, 'PRD1281079590', '3', '29', 0, 'Titan', '0', 1, 'Bag', '', 20.000, '8', 0.00, '', 20.000, 'Bags', '', 0, '', '', '', '', '', '', '20201011_083535bag21.jpg,bag.jpg', '38,40', 'S,S', '', '10,10', '20,20', '20,20', '0,0', '0', 'Green,Brown', '', '2020-10-11'),
(40, 'PRD4410951038', '3', '5', 0, 'w', '0', 1, 'A-CE Dress', 'فستان A-CE', 20.000, '20', 8.00, '', 18.400, 'Printed floral pattern, light material with inner lining', '', 0, 'fghgfhh', '', 'hgghj', '', 'vvbvb', '', '20201011_082648dress1.jpg,20201011_082648dress2.jpg', '38,40', 'S,S', '', '0,0', '20,20', '20,20', '0,0', '0', 'Blue,White', '', '2020-10-28'),
(54, 'PRD8811410743', '5', '9', 0, '', '0', 1, 'Rings', '', 15.000, '12', 0.00, '', 15.000, 'Rings', '', 0, '', '', '', '', '', '', '20201011_081155product4.jpg,20201011_081155ring.jpg', '20', 'S', '', '10', '15', '15', '0', '0', 'pink', '', '2020-10-11'),
(56, 'PRD619982103', '3', '21', 0, '', '0', 0, 'Decoration', '', 80.000, '40', 37.00, '', 50.400, 'Decoration', '', 1, '', '', '', '', '', '', '20201012_123407decoration.jpg,20201012_123339art.jpg', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-10-12'),
(60, 'PRD1101188576', '3', '29', 0, 'Raymonds', '0', 0, 'test prod123', '', 10.000, '8', 1.00, '', 9.900, 'dfadfsdf', '', 0, 'sczczxc', '', 'zxczxc', '', 'sdfsdfsd', '', '20201011_044222bag2.jpg', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-10-11'),
(61, 'PRD37447758', '3', '7', 0, '', '0', 0, 'Dress 7', '', 8.000, '7.000', 10.00, '', 7.200, 'Dress 7', '', 1, 'Dress 7', '', 'Dress 7', '', '', '', '20201011_055823dress7.jpg,20201011_055823dress72.jpg', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-10-11'),
(62, 'PRD44644839', '3', '7', 0, '', '0', 0, 'Dress', '', 10.000, '8', 5.00, '', 9.500, '', '', 1, '', '', '', '', '', '', '20201011_063256tShirt.png', '20', 'M', '', '5', '10', '9.5', '5', '0', 'black', '', '2020-10-11'),
(63, 'PRD966351165', '3', '18', 0, '', '0', 0, 'Jacket', '', 15.000, '12', 8.00, '', 13.800, '', '', 1, '', '', '', '', '', '', '20201011_063717jacket1.jpg', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-10-11'),
(65, 'PRD35568697', '5', '10', 0, '', '0', 0, 'Bangles', '', 10.000, '4', 5.00, '', 9.500, '', '', 1, '', '', '', '', '', '', '20201012_122221bangles.jpg,20201012_122221bangles2.jpg', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-10-12'),
(66, 'PRD84104121195', '5', '8', 0, '', '0', 0, 'Belt', '', 8.000, '4', 25.00, '', 6.000, '', '', 1, '', '', '', '', '', '', '20201012_123058belt1.jpg,20201012_123058belt2.jpg', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-10-12'),
(67, 'PRD5412576125', '3', '5', 5, 'Raymonds', '0', 0, 'test arabic', 'اختبار اللغة العربية', 10.000, '8', 0.00, '', 10.000, 'sdasdas', 'اختبار ديسكريون', 0, 'asdasdas', 'التركيب العربي', 'asdasdas', 'تعليمات عربية', 'asdasdasd', 'الشحن والارجاع باللغة العربية', '20201012_124428trend811.jpg', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-10-12'),
(68, 'PRD12712652511', '5', '10', 0, '', '0', 0, 'Bangles', 'أساور', 6.000, '3', 5.00, '', 5.700, '', '', 1, '', '', '', '', '', '', '20201012_011150product6.jpg,20201012_011150product61.jpg', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-10-12'),
(69, 'PRD10611108729', '3', '20', 0, '', '0', 1, 'Kids', 'أطفال', 25.000, '10', 40.00, '', 15.000, '', '', 1, '', '', '', '', '', '', '20201012_012313kids.jpg', '20', 'S', '', '10', '25', '15', '40', '0', '2c71194becc5d9e799aa40352f25111e.jpg', '', '2020-10-12'),
(70, 'PRD810281012118', '5', '24', 0, '', '0', 0, 'Large Pandent Necklace ', 'قلادة باندينت كبيرة', 20.000, '10', 0.00, '', 20.000, 'Large Pandent Necklace  Brown Color ', '', 1, '', '', '', '', '', '', '20201102_0715161.png,20201102_0715162.png,20201102_0715163.png,20201102_0715164.png', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-11-02'),
(71, 'PRD63952507', '5', '24', 0, '', '0', 0, 'Necklace TOOT 3 ', 'قلادة TOOT 3', 20.000, '10', 20.00, '', 16.000, 'Necklace TOOT 3 available in Yellow Color', '', 1, '', '', '', '', '', '', '20201102_0746351.png,20201102_0746352.png,20201102_0746353.png,20201102_0746354.png,20201102_0746355.png', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-11-02'),
(73, 'PRD1116534012', '5', '22', 0, '', '0', 0, 'summer bracelet', 'سوار الصيف', 6.000, '5', 0.00, '', 6.000, 'this bracelets have different colors and it fits in your hand perfectly', '', 0, '', '', '', '', '', '', '20201012_051326summerbracelet.jpg', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-10-12'),
(74, 'PRD9124310889', '3', '18', 0, '', '0', 0, 'joyabo 5006', 'جويابو 5006', 35.000, '35', 0.00, '', 35.000, 'well sewed beads', '', 1, '', '', '', '', '', '', '20201015_075209joyabojacket.jpg', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-10-15'),
(75, 'PRD1192031252', '3', '18', 0, '', '1', 0, 'joyabo 5017', 'جيا باو 5017', 35.000, '35', 0.00, '', 35.000, '2 pieces  ', '', 0, '', '', '', '', '', '', '20201015_0803319c145f939f084b098d1cc2ad9acda74d.jpg', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '1', 'n/a', '', '2020-10-15'),
(76, 'PRD97458722', '3', '18', 0, '', '1', 0, 'joyabo 5017', 'جيا باو 5017', 35.000, '35', 0.00, '', 35.000, '2 pieces  ', '', 0, '', '', '', '', '', '', '20201015_0803329c145f939f084b098d1cc2ad9acda74d.jpg', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '1', 'n/a', '', '2020-10-15'),
(77, 'PRD89681578', '3', '20', 0, '', '1', 1, 'baba & mumu', 'بابا ومومو', 15.000, '15', 40.00, '', 9.000, '2 color ', '', 0, '', '', '', '', '', '', '20201015_08202981f8d8b9a35545f0922ee6011760c558.jpg', '38,40', 'S,S', '', '0,0', '20,20', '20,20', '0,0', '0', 'Blue,White', '', '2020-10-28'),
(84, 'PRD810667548', '5', '24', 0, '', '0', 1, 'Necklaces', 'Necklaces', 10.000, '8', 0.00, '', 10.000, 'Necklaces', '', 0, '', '', '', '', '', '', '20201102_0706425.png,20201102_0704471.png,20201102_0704472.png,20201102_0704473.png,20201102_0704474.png', '34,34,34', 'S,S,S', '', '0,0,0', '10,10,10', '10,10,10', '0,0,0', '0', 'black,Yellow,Blue', '', '2020-11-02'),
(85, 'PRD556931192', '5', '22', 0, '', '0', 2, 'Bracelet', 'Bracelet', 8.000, '6', 0.00, '', 8.000, 'Bracelet', '', 0, '', '', '', '', '', '', '20201102_0623191.png,20201102_0623194.png,20201102_0618252.png,20201102_0618253.png', '', '', '', '0,0,0', '8,8,8', '8,8,8', '0,0,0', '0', 'yellow,Red,Blue', '', '2020-11-02'),
(80, 'PRD12341261276', '3', '5', 0, '', '0', 1, 'xidian dress', 'فستان xidian', 23.000, '23', 10.00, '', 20.700, '2 color black and purple \r\nsize available large\r\nabove knee dress', '', 1, '', '', '', '', '', '', '20201017_074959537e100ba4014432971d9a4d3bd835e3.jpg', '38,40', 'S,S', '', '0,0', '20,20', '20,20', '0,0', '0', 'Blue,White', '', '2020-10-28'),
(81, 'PRD89009417', '3', '7', 0, '', '1', 1, 'joyabo 8039', 'ندى عبدالمحسن 8039', 20.000, '20', 0.00, '', 20.000, 'with red beads\r\nsparkling white and red crystal ', '', 0, '', '', '', '', '', '', '20201017_080737826a94a975dc46118917e819462b2cb9.jpg', '', 'S', '', '0', '0', '0', '0', '0', '', '', '2020-10-17'),
(83, 'PRD995144911', '3', '5', 0, '', '0', 1, 'Black Dress', 'Black Dress', 10.000, '7', 0.00, '', 10.000, 'Black Dresses', '', 0, 'Black Dresses', '', '', '', '', '', '20201102_0638441.png,20201102_0638442.png,20201102_0638443.png,20201102_0638444.png,20201102_0638445.png,20201102_0638446.png', '34', 'S', '', '0', '10', '10', '0', '0', 'black', '', '2020-11-02'),
(86, 'PRD12726336', '5', '24', 0, '', '0', 0, 'Large Pandent Necklace', 'Large Pandent Necklace', 10.000, '8', 0.00, '', 10.000, 'Large Pandent Necklace', '', 1, '', '', '', '', '', '', '20201102_0726091.png,20201102_0725332.png,20201102_0725333.png,20201102_0725334.png,20201102_0725335.png,20201102_0725336.png', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-11-02'),
(87, 'PRD11478108312', '5', '8', 0, '', '1', 2, 'Belt', 'Belt', 15.000, '8', 0.00, '', 15.000, '', '', 1, '', '', '', '', '', '', '20201102_0810323.png,20201102_0809331.png,20201102_0809332.png,20201102_0809334.png,20201102_0809335.png,20201102_0809336.png', '', '', '', '0', '0', '0', '0', '0', '', '', '2020-11-02'),
(91, 'PRD777843104', '5', '24', 0, '', '0', 0, 'Necklaces', 'Necklaces', 20.000, '8', 0.00, '', 20.000, '', '', 1, '', '', '', '', '', '', '20201102_0852485.png,20201102_0851271.png,20201102_0851272.png,20201102_0851273.png,20201102_0851274.png,20201102_0851276.png', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-11-02'),
(88, 'PRD21052312512', '5', '28', 0, '', '0', 0, 'Decoration', 'Decoration', 10.000, '6', 0.00, '', 10.000, '', '', 0, '', '', '', '', '', '', '20201102_0821571.png,20201102_0821572.png,20201102_0821573.png,20201102_0821574.png,20201102_0821575.png,20201102_0821576.png', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-11-02'),
(89, 'PRD8613117107', '5', '28', 0, '', '0', 0, 'Decoration', 'Decoration', 20.000, '12', 0.00, '', 20.000, '', '', 0, '', '', '', '', '', '', '20201102_0831321.png,20201102_0831322.png,20201102_0831323.png,20201102_0831324.png,20201102_0831325.png,20201102_0831326.png', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-11-02'),
(90, 'PRD57165817', '5', '24', 0, '', '0', 0, 'NecklacesJN1502 Birth Stone Necklace Gold', 'JN1502 Birth Stone Necklace Gold', 7.500, '6', 0.00, '', 7.500, 'PRD635078117', '', 0, '', '', '', '', '', '', '20201102_0843166.png,20201102_0842412.png,20201102_0841151.png,20201102_0841153.png,20201102_0841154.png,20201102_0841155.png', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-11-02'),
(92, 'PRD40443975', '5', '24', 0, '', '0', 0, 'Necklaces', 'Necklaces', 40.000, '20', 0.00, '', 40.000, '', '', 1, '', '', '', '', '', '', '20201102_0859581.png,20201102_0859582.png,20201102_0859583.png,20201102_0859584.png,20201102_0859585.png', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '0', 'n/a', '', '2020-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `promocode`
--

CREATE TABLE `promocode` (
  `promo_id` int(11) NOT NULL,
  `promo_code` text NOT NULL,
  `promo_discount` float NOT NULL,
  `promo_type` int(11) NOT NULL COMMENT '"0" for amount "1" for percentage',
  `promo_expiry` date NOT NULL,
  `promo_max_amount` float NOT NULL,
  `promo_min_cart_value` float NOT NULL,
  `promo_use_per_user` varchar(100) NOT NULL COMMENT 'maximum number of using allowed for a user',
  `promo_status` int(11) NOT NULL COMMENT '"1" for active "0" for deactive',
  `promo_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promocode`
--

INSERT INTO `promocode` (`promo_id`, `promo_code`, `promo_discount`, `promo_type`, `promo_expiry`, `promo_max_amount`, `promo_min_cart_value`, `promo_use_per_user`, `promo_status`, `promo_created`) VALUES
(2, 'test12345', 10, 1, '2020-10-10', 5, 10, '10', 0, '2020-06-17 10:07:06'),
(3, 'test101010', 10, 0, '2020-07-28', 10, 20, '5', 0, '2020-10-06 10:49:46'),
(5, 'PROMOCODE10', 10, 0, '2020-10-20', 100, 80, '100', 1, '2020-10-17 12:16:30'),
(6, 'Har', 80, 0, '2020-10-30', 200, 100, '100', 1, '2020-10-26 06:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `store_name` text NOT NULL,
  `store_address` text NOT NULL,
  `store_city` text NOT NULL,
  `store_pincode` int(11) NOT NULL,
  `store_lat` text NOT NULL,
  `store_lon` text NOT NULL,
  `store_gst` text NOT NULL,
  `store_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `store_address`, `store_city`, `store_pincode`, `store_lat`, `store_lon`, `store_gst`, `store_date`) VALUES
(1, 'TooT', 'Kuwait', 'Hawally', 0, '10.4295745', '76.344784', 'GST 12345678', '2019-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(250) NOT NULL,
  `subcategory_name_ar` text CHARACTER SET utf8 NOT NULL,
  `subcategory_category` varchar(250) NOT NULL,
  `subcategory_image` text NOT NULL,
  `subcategory_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `subcategory_name`, `subcategory_name_ar`, `subcategory_category`, `subcategory_image`, `subcategory_date`) VALUES
(47, 'Wearables', 'مستلزمات', '15', '3b5d17d59982af14bb8f0359607f4ba2.png', '2020-11-20'),
(46, 'Pods & Positions', 'SDXSDs', '15', '3b5d17d59982af14bb8f0359607f4ba2.png', '2020-11-20'),
(45, 'Crib Essentials', 'ASDAS', '15', '3b5d17d59982af14bb8f0359607f4ba2.png', '2020-11-20'),
(44, 'Swaddles', 'ASSD', '15', '3b5d17d59982af14bb8f0359607f4ba2.png', '2020-11-20'),
(43, 'Mats', 'SDASAS', '15', '3b5d17d59982af14bb8f0359607f4ba2.png', '2020-11-20'),
(42, 'Pillows', 'vgffg', '15', '3b5d17d59982af14bb8f0359607f4ba2.png', '2020-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `termsale`
--

CREATE TABLE `termsale` (
  `termsale_id` int(10) NOT NULL,
  `termsale_content` text NOT NULL,
  `termsale_content_arab` text CHARACTER SET utf8mb4 NOT NULL,
  `termsale_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `termsale`
--

INSERT INTO `termsale` (`termsale_id`, `termsale_content`, `termsale_content_arab`, `termsale_date`) VALUES
(1, '<h4 style=\"box-sizing: border-box; margin-bottom: 0.5rem; font-family: &quot;Work Sans&quot;, sans-serif; line-height: 19px; color: rgb(51, 51, 51); font-size: 16px;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4><p style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: &quot;Work Sans&quot;, sans-serif;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h4 style=\"box-sizing: border-box; margin-bottom: 0.5rem; font-family: &quot;Work Sans&quot;, sans-serif; line-height: 19px; color: rgb(51, 51, 51); font-size: 16px;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4><p style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: &quot;Work Sans&quot;, sans-serif;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h4 style=\"box-sizing: border-box; margin-bottom: 0.5rem; font-family: &quot;Work Sans&quot;, sans-serif; line-height: 19px; color: rgb(51, 51, 51); font-size: 16px;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4><p style=\"box-sizing: border-box; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: &quot;Work Sans&quot;, sans-serif;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<h4 style=\"box-sizing: border-box; margin-bottom: 0.5rem; font-family: Almarai, sans-serif; line-height: 19px; color: rgb(51, 51, 51); font-size: 16px; text-align: right;\">لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد.</h4><h4 style=\"box-sizing: border-box; margin-bottom: 0.5rem; line-height: 19px;\"><p style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Almarai, sans-serif; font-weight: 400; text-align: right;\">لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لعمل كتاب عينة. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات</p></h4><h4 style=\"box-sizing: border-box; margin-bottom: 0.5rem; font-family: Almarai, sans-serif; line-height: 19px; color: rgb(51, 51, 51); font-size: 16px; text-align: right;\">لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد.</h4><h4 style=\"box-sizing: border-box; margin-bottom: 0.5rem; line-height: 19px;\"><p style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Almarai, sans-serif; font-weight: 400; text-align: right;\">لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لعمل كتاب عينة. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات</p></h4><h4 style=\"box-sizing: border-box; margin-bottom: 0.5rem; font-family: Almarai, sans-serif; line-height: 19px; color: rgb(51, 51, 51); font-size: 16px; text-align: right;\">لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد.</h4><h4 style=\"box-sizing: border-box; margin-bottom: 0.5rem; line-height: 19px;\"><p style=\"box-sizing: border-box; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: Almarai, sans-serif; font-weight: 400; text-align: right;\">لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لعمل كتاب عينة. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات</p></h4>', '2020-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `termuse`
--

CREATE TABLE `termuse` (
  `termuse_id` int(11) NOT NULL,
  `termuse_content` text NOT NULL,
  `termuse_content_arab` text CHARACTER SET utf8mb4 NOT NULL,
  `termuse_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `termuse`
--

INSERT INTO `termuse` (`termuse_id`, `termuse_content`, `termuse_content_arab`, `termuse_date`) VALUES
(1, '<h6 style=\"box-sizing: border-box; margin-bottom: 0.5rem; line-height: 1.2; font-size: 1rem; font-family: Marcellus, Arial, Helvetica, sans-serif; color: rgb(51, 51, 51);\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h6><h4 style=\"box-sizing: border-box; margin-bottom: 0.5rem; font-family: &quot;Work Sans&quot;, sans-serif; line-height: 19px; color: rgb(51, 51, 51); font-size: 16px;\"><p style=\"box-sizing: border-box; color: rgb(105, 105, 105); font-family: Futura, Arial, Helvetica, sans-serif; font-size: 18px; font-weight: 300;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></h4><h6 style=\"box-sizing: border-box; margin-bottom: 0.5rem; line-height: 1.2; font-size: 1rem; font-family: Marcellus, Arial, Helvetica, sans-serif; color: rgb(51, 51, 51);\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h6><h4 style=\"box-sizing: border-box; margin-bottom: 0.5rem; font-family: &quot;Work Sans&quot;, sans-serif; line-height: 19px; color: rgb(51, 51, 51); font-size: 16px;\"><p style=\"box-sizing: border-box; color: rgb(105, 105, 105); font-family: Futura, Arial, Helvetica, sans-serif; font-size: 18px; font-weight: 300;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></h4><h6 style=\"box-sizing: border-box; margin-bottom: 0.5rem; line-height: 1.2; font-size: 1rem; font-family: Marcellus, Arial, Helvetica, sans-serif; color: rgb(51, 51, 51);\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h6><h4 style=\"box-sizing: border-box; margin-bottom: 0.5rem; font-family: &quot;Work Sans&quot;, sans-serif; line-height: 19px; color: rgb(51, 51, 51); font-size: 16px;\"><p style=\"box-sizing: border-box; margin-bottom: 0px; color: rgb(105, 105, 105); font-family: Futura, Arial, Helvetica, sans-serif; font-size: 18px; font-weight: 300;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></h4>', '<h4 style=\"box-sizing: border-box; margin-bottom: 0.5rem; font-family: Almarai, sans-serif; line-height: 19px; color: rgb(51, 51, 51); font-size: 16px; text-align: right;\">لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد.</h4><p style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Almarai, sans-serif; text-align: right;\">لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لعمل كتاب عينة. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات</p><h4 style=\"box-sizing: border-box; margin-bottom: 0.5rem; font-family: Almarai, sans-serif; line-height: 19px; color: rgb(51, 51, 51); font-size: 16px; text-align: right;\">لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد.</h4><p style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Almarai, sans-serif; text-align: right;\">لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لعمل كتاب عينة. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات</p><h4 style=\"box-sizing: border-box; margin-bottom: 0.5rem; font-family: Almarai, sans-serif; line-height: 19px; color: rgb(51, 51, 51); font-size: 16px; text-align: right;\">لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد.</h4><p style=\"box-sizing: border-box; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: Almarai, sans-serif; text-align: right;\">لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لعمل كتاب عينة. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات</p>', '2020-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_mail` varchar(150) NOT NULL,
  `user_fname` text NOT NULL,
  `user_lname` text NOT NULL,
  `user_displayname` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_dob` date NOT NULL,
  `user_mobile` varchar(100) NOT NULL,
  `user_pass_key` varchar(200) NOT NULL,
  `user_forgotkey_datetime` datetime NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_mail`, `user_fname`, `user_lname`, `user_displayname`, `user_gender`, `user_password`, `user_dob`, `user_mobile`, `user_pass_key`, `user_forgotkey_datetime`, `user_status`, `user_date`) VALUES
(68, 'ansebkali@gmail.com', 'Anseb', 'a', 'anzz', '', 'YW5zZWIzMjg=', '0000-00-00', '7356102387', '6478', '2020-11-23 08:15:46', 1, '2020-11-20'),
(70, 'joemil007@gmail.com', 'emil ', 'joy', 'emil ', '', 'MTIzNDU2Nzg=', '0000-00-00', '', '', '0000-00-00 00:00:00', 1, '2020-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `user_id` int(11) NOT NULL,
  `user_agent_id` int(11) NOT NULL,
  `user_type` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pwd` varchar(250) NOT NULL,
  `user_displayname` text NOT NULL,
  `user_businessnameame` text NOT NULL,
  `user_contry` text NOT NULL,
  `user_address` text NOT NULL,
  `user_addressline1` text NOT NULL,
  `user_addressline2` text NOT NULL,
  `user_state` text NOT NULL,
  `user_city` text NOT NULL,
  `user_pincode` text NOT NULL,
  `user_zipcode` varchar(200) NOT NULL,
  `user_businessyears` varchar(100) NOT NULL,
  `user_custserve_hours` varchar(100) NOT NULL,
  `user_website` varchar(100) NOT NULL,
  `user_federal_taxid` varchar(100) NOT NULL,
  `user_business_type` varchar(100) NOT NULL,
  `user_prodline_desc` text NOT NULL,
  `user_no_prodlist` text NOT NULL,
  `user_prod_sku` text NOT NULL,
  `user_propret_prods` varchar(100) NOT NULL,
  `user_sales_channels` varchar(300) NOT NULL,
  `user_cards_process` varchar(100) NOT NULL,
  `user_ship_point` text NOT NULL,
  `user_freeship_threshold` text NOT NULL,
  `user_additional_shipcharge` varchar(100) NOT NULL,
  `user_expedited_ship` varchar(100) NOT NULL,
  `user_30days_return` varchar(100) NOT NULL,
  `user_authorize_reqd` varchar(100) NOT NULL,
  `user_other_shipinfo` text NOT NULL,
  `user_business_logo` text NOT NULL,
  `user_phone` text NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_img` text NOT NULL,
  `user_modified` date NOT NULL,
  `user_prodview_type` varchar(100) NOT NULL,
  `user_prodview_site` text NOT NULL,
  `user_passkey_res` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`user_id`, `user_agent_id`, `user_type`, `user_name`, `user_pwd`, `user_displayname`, `user_businessnameame`, `user_contry`, `user_address`, `user_addressline1`, `user_addressline2`, `user_state`, `user_city`, `user_pincode`, `user_zipcode`, `user_businessyears`, `user_custserve_hours`, `user_website`, `user_federal_taxid`, `user_business_type`, `user_prodline_desc`, `user_no_prodlist`, `user_prod_sku`, `user_propret_prods`, `user_sales_channels`, `user_cards_process`, `user_ship_point`, `user_freeship_threshold`, `user_additional_shipcharge`, `user_expedited_ship`, `user_30days_return`, `user_authorize_reqd`, `user_other_shipinfo`, `user_business_logo`, `user_phone`, `user_status`, `user_img`, `user_modified`, `user_prodview_type`, `user_prodview_site`, `user_passkey_res`) VALUES
(177, 1, 'user', 'user@gmail.com', '1a09ccc9d39e14547939f8c9c9bc00fab7237a7c8c5835e32679d3790fe599f1e0ce9ba21b3f4a9c6ad879179ed4efe8603805bd61634c7f64aaaf43225002535V011kmR2qID4Xw1lHBYFoRMZh7phvdCMsLCdpqmqYg=', 'User Test', '', 'Germany', 'NA', '', '', '', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '12345678', 1, '', '2020-05-27', '', '', ''),
(183, 1, 'user', 'hari@gmail.com', '7c87f8da9af53f59a530bc0bb661fc1170d40833cc76536f7e5a51242b5d74622eee85192b4a8c0d12ec8bdaef49a042d1946a5846e6ac4f4824a96698ad3495ZNplMOGPJ8jVjW9HSiLkhfVWfNnJGJUeNOi30+qDONY=', 'Harish', '', '', 'NA', '', '', '', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1234568', 1, '', '2020-05-25', '', '', ''),
(189, 1, 'agent', 'anzz@mail.com', 'd3c6aebf2d284413dff2e10b6cfff91e9cd9ef96223727e0f34c0383131ac99a9b9c60dcb165d3bc1cfe3dcff1f701855c7781e6a031c36d49f7aa3f21e19306lejrVUlGuHkMmv1mpN1jCBPpPh7QDyb0NuxgkNHjkJQ=', 'Anseb k a', 'Test vendor 1', 'Germany', 'n/a', 'Kalladikkunnath house palappilly', 'wedasdasda', 'ASasAS', 'Thrissur District', 'n/a', 'asaa312', '1', '8', 'anzzprod.com', 'fedx5432', 'Full line vendor', 'sdasddsa', 'n/a', 'sadasdasdas', 'All', 'Full line vendor', '', 'asdasd', 'asdasdas', 'Yes', 'No', 'Yes', 'No', 'asdasdasda', '22b33bda9befaf85cd27ab1c2607825b.jpg', '1231231312', 1, 'n/a', '2020-07-22', '', '', ''),
(194, 1, 'agent', 'emil@mail.com', '0316885d3fe8480a37f0f5aca40ff90f799986131ceab2f40ff2248661c27ed0d03abcebd7652ae64601e7365aa789bb549a0c807d7db7a17d5f389053ac4a985YEBtvfK+qrYudF5UCm2SdX/YPzK84NipDO8/Q0KpU4=', 'emil joy', 'Test vendor 2', 'Germany', 'na', 'address 1', 'address 2', 'state1', 'city 1', '0', '1232seds', '1', '8', 'emilprod.com', 'fedx5432432', '2', 'n/a', 'n/a', 'n/a', 'n/a', '', '', 'office', 'n/a', '0', '1', '1', '1', 'dasd jlklkklj nklakdkjad addaddad wdaddsdas sadsdasdas adadssadasd', 'f092b6eb201d2635e6afeec5839df2e2.jpg', '534324233', 1, '', '2020-07-29', 'Sending catalog to:', '', ''),
(197, 1, 'user', 'info@nuevoinformatica.com', 'b68b0b47f0d9ef3104dcb4be7d5d2119c3cc4e9d08a9167e6040fca21d3de14bda26547463cd1da863ba96eef3f1f11cb7b1bf33b768d0afd87d5b42e380ceebvpeECwBWJibMQMz2q4NUXMWvcClQAyN8C+d+2R8kTa8=', 'Testman', 'n/a', 'Germany', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '3234233233', 1, 'n/a', '2020-07-30', '', '', ''),
(198, 1, 'user', 'h.mohammed@aaj-kw.com', 'cf432e7049a099e446dd909260e2056d8cfec247fec4a7e9479fb9e9f2c7c3f1e7556dd6918883fcc73f43665f53587817c062b311fe943d34afb3fafa5e11c18NpL9S+/aaOgID6cKSmuxyj8z4wf7rHlyKddQRzL+Lo=', 'Hashim', 'n/a', 'Kuwait', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '66805546', 1, 'n/a', '2020-07-30', '', '', ''),
(199, 1, 'user', 'joemi007@gmail.com', '59bfc57d8fb4abba9b32154c17a4969ac6908697a3e7013bda9f1703179f5af0a46003b6138c38d4ed683119718888e250b3c40ac6730af9bf7de4563921d1f0jcNj/7A/i/Lkja9udEgQ3WkWXZxEIsE55FXfPUB4Kgc=', 'Anseb k a', 'n/a', 'India', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '9747738699', 1, 'n/a', '2020-07-31', '', '', ''),
(201, 1, 'user', 'h.harish@e4technosolutions.com', 'ba40e668b3200d52ba8c37a9297c71276a44e21af3932f7c49a42752336dc388beae9c229276f4748ef5c2a2aa31e42247d28ce4e79653fcc28a7d34cafee089SFk1Z+53Ow2cHL5VM2sW3jUITGxl3dMYT0gcrOkQhlI=', 'Harish R. Haridathan', 'n/a', 'Kuwait', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '111111111111111111111111111111111111111', 1, 'n/a', '2020-08-01', '', '', ''),
(204, 1, 'agent', 'msuk@gmail.com', 'e5412bebf5611b14595855011e37cb1ae483944212955c688e60f4e06910cf1c7830dbe7399226f4042474c3632df4b5bc423f331c705c57c9290e6bb27feb2eX87zeXCo8kol1S3gcPViKCsVXN5TCfANpXmpEdx7iwA=', 'elon musk', 'tesla motors', 'Germany', 'n/a', 'wedfwfdwd', 'sdsdf', 'sdfsfs', 'sfsfdsfd', 'n/a', 'sdfsdfsf', '1', '09:00-21:00', 'teslamotors.com', '', '1', 'n/a', 'n/a', 'n/a', 'n/a', '', '', 'office', 'n/a', '1', '0', '1', '0', 'eefefre eeferf eeefer referfe', '753026195b8c87d103f0b23b22a4990c.jpg', '31233242', 0, 'n/a', '2020-08-03', 'customEx', '', ''),
(206, 1, 'user', 'ansebkali@gmail.com', '3e15de504c4989046028f29a07974e3f368d2b5e72b6eb8d3161bfbab6c54e6dec1f608a51ecc76c6fa84092b93edd96f9f567d749ae9b72f9bc540c55004308qp9YoDamKFgauPnwTD/KsOxdkB8R0eqMJUqai3MwpuY=', 'Anseb k a', 'n/a', 'Germany', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '234235453', 1, 'n/a', '2020-08-03', '', '', ''),
(207, 1, 'user', 'hrhhari@gmail.com', 'ae99a8ef5601d9d52533bde975e0cad2761228417622691fc92aaf2983d1e3518976425f3ebd3b8de5636e71144462d7ef008c55bb4991b8afd5ab31143d90c2++bGzfK7J4FHloNDKxi3VZ//PxfTE5z6Srtat/oPvnI=', 'Harish R. Haridathan', 'n/a', 'Kuwait', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '1111111111111111111111110000000000000', 1, 'n/a', '2020-08-03', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `wishlist_prod_id` int(11) NOT NULL,
  `wishlist_user_id` int(111) NOT NULL,
  `wishlist_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `addressprofile`
--
ALTER TABLE `addressprofile`
  ADD PRIMARY KEY (`addressprofile_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `deliverycharge`
--
ALTER TABLE `deliverycharge`
  ADD PRIMARY KEY (`dc_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `newssub`
--
ALTER TABLE `newssub`
  ADD PRIMARY KEY (`newssub_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offers_id`);

--
-- Indexes for table `offertext`
--
ALTER TABLE `offertext`
  ADD PRIMARY KEY (`offertext_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `promocode`
--
ALTER TABLE `promocode`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `termsale`
--
ALTER TABLE `termsale`
  ADD PRIMARY KEY (`termsale_id`);

--
-- Indexes for table `termuse`
--
ALTER TABLE `termuse`
  ADD PRIMARY KEY (`termuse_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `addressprofile`
--
ALTER TABLE `addressprofile`
  MODIFY `addressprofile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deliverycharge`
--
ALTER TABLE `deliverycharge`
  MODIFY `dc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `division_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `newssub`
--
ALTER TABLE `newssub`
  MODIFY `newssub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `offertext`
--
ALTER TABLE `offertext`
  MODIFY `offertext_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `promocode`
--
ALTER TABLE `promocode`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `termsale`
--
ALTER TABLE `termsale`
  MODIFY `termsale_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `termuse`
--
ALTER TABLE `termuse`
  MODIFY `termuse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
