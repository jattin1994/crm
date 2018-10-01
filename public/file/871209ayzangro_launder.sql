-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 28, 2018 at 10:12 AM
-- Server version: 5.6.40
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayzangro_launder`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_master`
--

CREATE TABLE `address_master` (
  `uniqueId` bigint(10) NOT NULL,
  `objectId` bigint(20) NOT NULL,
  `objectType` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `companyAddress1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `companyAddress2` text COLLATE utf8mb4_unicode_ci,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countryId` int(5) DEFAULT NULL,
  `countryName` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isPickup` int(1) NOT NULL DEFAULT '0',
  `isDelivery` int(1) NOT NULL DEFAULT '0',
  `isPermanent` int(1) NOT NULL DEFAULT '0',
  `addressType` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buildingType` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buildingName` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buildingFloor` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buildingNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isLift` int(2) NOT NULL DEFAULT '0',
  `zoneId` int(5) DEFAULT NULL,
  `latitude` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address_master`
--

INSERT INTO `address_master` (`uniqueId`, `objectId`, `objectType`, `companyAddress1`, `companyAddress2`, `state`, `city`, `pincode`, `countryId`, `countryName`, `isPickup`, `isDelivery`, `isPermanent`, `addressType`, `buildingType`, `buildingName`, `buildingFloor`, `buildingNumber`, `isLift`, `zoneId`, `latitude`, `longitude`, `createdOn`, `updatedOn`) VALUES
(4, 14, 'user', '184/2 Jeevan Nagar', '184/2 Jeevan Nagar', 'Delhi', 'New Delhi', '110014', NULL, 'India', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, '28.5715', '77.2640', 1522310450, NULL),
(5, 15, 'user', '184/2 Jeevan Nagar', '184/2 Jeevan Nagar', 'Delhi', 'New Delhi', '110014', NULL, 'India', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, '28.5715', '77.2640', 1522314725, NULL),
(6, 4, 'corp', '184/2 Jeevan Nagar', '184/2 Jeevan Nagar', 'Delhi', 'New Delhi', '110014', NULL, 'India', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, '28.5715', '77.2640', 1522314939, NULL),
(7, 5, 'corp', '184/2 Jeevan Nagar', '', 'Delhi', 'New Delhi', '110014', NULL, 'India', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, '28.5715', '77.2640', 1522315998, NULL),
(8, 16, 'user', '184/2 Jeevan Nagar', '184/2 Jeevan Nagar', 'Delhi', 'New Delhi', '110014', NULL, 'India', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, '28.5715', '77.2640', 1522383473, NULL),
(9, 6, 'corp', '184/2 Jeevan Nagar', '', 'Delhi', 'New Delhi', '110014', NULL, 'India', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, '28.5715', '77.2640', 1522383729, NULL),
(12, 8, 'user', '184/2 Jeevan Nagar', '', 'Delhi', 'New Delhi', '110014', NULL, 'India', 0, 0, 0, 'office', 'flat', 'Shoeb', '3', '481 E1', 0, NULL, '28.5715', '77.2640', 1522741546, NULL),
(13, 8, 'user', '481 E1 Near Chhota Barat Ghar Batla House', '', 'Delhi', 'New Delhi', '110025', NULL, 'India', 0, 0, 0, 'home', 'flat', 'hoin', '1', '481 E1', 0, NULL, '28.571655', '77.264640', 1522741546, NULL),
(14, 8, 'corp', '184/2 Jeevan Nagar', '', 'Delhi', 'New Delhi', '110014', NULL, 'India', 0, 0, 0, 'office', 'flat', 'Shoeb', '3', '481 E1', 0, NULL, '28.5715', '77.2640', 1522744462, NULL),
(15, 8, 'corp', '481 E1 Near Chhota Barat Ghar Batla House', '', 'Delhi', 'New Delhi', '110025', NULL, 'India', 0, 0, 0, 'home', 'flat', 'hoin', '1', '481 E1', 0, NULL, '28.571655', '77.264640', 1522744462, NULL),
(16, 18, 'user', '184/2 Jeevan Nagar', '', 'Delhi', 'New Delhi', '110014', NULL, 'India', 0, 0, 0, 'office', 'flat', 'Shoeb', '3', '481 E1', 0, NULL, '28.5715', '77.2640', 1522744642, NULL),
(17, 18, 'user', '481 E1 Near Chhota Barat Ghar Batla House', '', 'Delhi', 'New Delhi', '110025', NULL, 'India', 0, 0, 0, 'home', 'flat', 'hoin', '1', '481 E1', 0, NULL, '28.571655', '77.264640', 1522744643, NULL),
(19, 19, 'user', '481 E1 Near Chhota Barat Ghar Batla House', '', 'Delhi', 'New Delhi', '110025', NULL, 'India', 0, 0, 0, 'home', 'flat', 'hoin', '1', '481 E1', 1, NULL, '28.571655', '77.264640', 1523592934, NULL),
(20, 10, 'corp', '184 2nd floor', 'Jeevan Nagar, Ashram', 'Delhi', 'New Delhi', '110014', NULL, 'India', 0, 0, 0, 'office', 'flat', 'Meghdoot', '2', '481', 1, NULL, '28.5715', '77.2640', 1523594234, NULL),
(21, 11, 'corp', '', '', '', '', '', NULL, '', 0, 0, 0, 'home', '', '', '', '', 0, NULL, '', '', 1524478561, NULL),
(22, 12, 'corp', '', '', '', '', '', NULL, '', 0, 0, 0, 'home', '', '', '', '', 0, NULL, '', '', 1524478576, NULL),
(23, 13, 'corp', '184 2nd floor', 'Jeevan Nagar, Ashram', 'Delhi', 'New Delhi', '110014', NULL, 'India', 0, 0, 0, 'office', 'flat', 'Meghdoot', '2', '481', 1, NULL, '28.5715', '77.2640', 1524571456, NULL),
(24, 19, 'user', '184 2nd floor', 'Jeevan Nagar, Ashram', 'Delhi', 'New Delhi', '110014', NULL, 'India', 0, 0, 0, 'office', 'flat', 'Meghdoot', '2', '481', 1, NULL, '28.5715', '77.2640', 1524633972, NULL),
(25, 35, 'corp', '', '', '', '', '', NULL, '', 0, 0, 0, 'home', '', '', '', '', 0, NULL, '', '', 1525249915, NULL),
(26, 36, 'corp', '', '', '', '', '', NULL, '', 0, 0, 0, 'home', '', '', '', '', 0, NULL, '', '', 1525250209, NULL),
(27, 37, 'corp', '', '', '', '', '', NULL, '', 0, 0, 0, 'home', '', '', '', '', 0, NULL, '', '', 1525252591, NULL),
(28, 38, 'corp', '', '', '', '', '', NULL, '', 0, 0, 0, 'home', '', '', '', '', 0, NULL, '', '', 1525253085, NULL),
(29, 39, 'corp', '', '', '', '', '', NULL, '', 0, 0, 0, 'home', '', '', '', '', 0, NULL, '', '', 1525255340, NULL),
(34, 40, 'corp', '', '', '', '', '', NULL, '', 0, 0, 0, 'home', '', '', '', '', 0, NULL, '', '', 1525256309, NULL),
(39, 41, 'corp', '', '', '', '', '', NULL, '', 0, 0, 0, 'home', '', '', '', '', 0, NULL, '', '', 1525256914, NULL),
(46, 42, 'corp', '', '', '', '', '', NULL, '', 0, 0, 0, 'home', '', '', '', '', 0, NULL, '', '', 1525257378, NULL),
(47, 74, 'user', '', '', '', '', '', NULL, '', 0, 0, 0, 'home', '', '', '', '', 0, NULL, '', '', 1525258216, NULL),
(48, 75, 'user', '', '', '', '', '', NULL, '', 0, 0, 0, 'home', '', '', '', '', 0, NULL, '', '', 1525258218, NULL),
(49, 76, 'user', '', '', '', '', '', NULL, '', 0, 0, 0, 'home', '', '', '', '', 0, NULL, '', '', 1525258267, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jattin', 'jarora1994@gmail.com', '$2y$10$O6L8yz1RVpR1ci/SPuaABunXixQTPWoY.WBU.90i5PnoKswXT.JOC', 'UmGr7mqiV38B6zWzlbYnxA2tGWQIhqliMtoqYQXx5rslkfvQZKczsPWS7lXS', '2018-04-23 02:29:13', '2018-04-23 02:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `bank_ details`
--

CREATE TABLE `bank_ details` (
  `uniqueId` int(10) NOT NULL,
  `objectId` bigint(20) NOT NULL,
  `objectType` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branchName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `createdBy` bigint(20) DEFAULT NULL,
  `modifiedOn` int(2) DEFAULT NULL,
  `modifiedBy` bigint(20) DEFAULT NULL,
  `beneficiary` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelledCheque` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branchId` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `description`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Our mission is to enable you to live life hassle free!', 'On demand dry cleaning and laundry services at your door step', '29091slider.jpg', '2018-04-30 08:58:08', '2018-05-01 12:09:14'),
(5, 'Our mission is to enable you to live life hassle free!', 'On demand dry cleaning and laundry services at your door step', '940761slider1.jpg', '2018-04-30 09:35:10', '2018-05-01 12:10:50'),
(8, 'Our mission is to enable you to live life hassle free!', 'On demand dry cleaning and laundry services at your door step', '478885slider2.jpg', '2018-05-01 12:11:16', '2018-05-01 12:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `heading` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `description`, `heading`, `image`, `created_at`, `updated_at`) VALUES
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor gravida nisl, accumsan viverra sem porta ac. Duis fermentum convallis leo, quis accumsan dolor consequat non.', 'We are on mobile too!', '584933app.png', '2018-05-02 06:53:32', '2018-05-02 06:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `categoryId` bigint(10) NOT NULL,
  `serviceId` int(5) DEFAULT NULL,
  `categoryName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `categorySlug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentCategoryId` bigint(10) DEFAULT NULL,
  `categoryPriority` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`categoryId`, `serviceId`, `categoryName`, `categorySlug`, `parentCategoryId`, `categoryPriority`) VALUES
(1, NULL, 'Men', 'men', NULL, 1),
(2, NULL, 'Women', 'women', NULL, 1),
(3, NULL, 'Household', 'household', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_master`
--

CREATE TABLE `cms_master` (
  `uniqueId` int(5) NOT NULL,
  `cmsLabel` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmsType` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmsTitle` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmsDescription` text COLLATE utf8mb4_unicode_ci,
  `faqSlug` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `iframe` text NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `data`, `email`, `iframe`, `created_at`, `updated_at`) VALUES
(16, '{\"Hindi\":\"3245677866\",\"english\":\"5456754321543\"}', 'jarora1994@gmail.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56046.353026603785!2d77.23758538194795!3d28.602864701783542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3a1b8d5f223%3A0xefce3ccee85618c4!2sMuser+Pvt.+Ltd.!5e0!3m2!1sen!2sin!4v1525162956901\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '2018-05-01 10:19:13', '2018-05-01 10:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `corporate_user_master`
--

CREATE TABLE `corporate_user_master` (
  `corpCustId` bigint(20) NOT NULL,
  `corpLsCustId` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corporationName` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `concernPerson` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concernPersonEmail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concerPersonMobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corpPassword` text COLLATE utf8mb4_unicode_ci,
  `corpoarateEmail` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corpCustStatus` int(1) NOT NULL DEFAULT '0',
  `isMobileVerified` int(1) NOT NULL DEFAULT '0',
  `isEmailVerified` int(1) NOT NULL DEFAULT '0',
  `taxRegNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vatRegNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `businessCategory` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vatBusinessCategory` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `dateId` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authUserId` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authId` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socialImage` text COLLATE utf8mb4_unicode_ci,
  `userType` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'corp',
  `sessionToken` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `corporate_user_master`
--

INSERT INTO `corporate_user_master` (`corpCustId`, `corpLsCustId`, `corporationName`, `concernPerson`, `concernPersonEmail`, `concerPersonMobile`, `corpPassword`, `corpoarateEmail`, `corpCustStatus`, `isMobileVerified`, `isEmailVerified`, `taxRegNumber`, `vatRegNumber`, `businessCategory`, `vatBusinessCategory`, `url`, `createdOn`, `updatedOn`, `dateId`, `authUserId`, `auth`, `authId`, `socialImage`, `userType`, `sessionToken`, `remember_token`) VALUES
(1, 'C1522214960', 'Muser Pvt', 'Divya Sharma', 'divyas@muser.co.in', '9898965963', '$2y$10$nR8raYrwPHHHhLJUTpndne1/wxzKysKPyaMxKeLViLABZ5BhdCR5u', 'hello@muser.co.in', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, 1522214960, 1522241553, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL),
(2, 'C1522215356', 'Testing Corp.', 'First', 'ui@test.com', '9632651458', '$2y$10$WkVO6xKUwNvUgjFAz1fVdu3Facrr4BVY3uhh.Tw3rrQyYu9h53g3u', 'hello@testing.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1522215356, 1522241584, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL),
(3, 'C1522241672', 'Anupam group.co.', 'AnupamSingh', 'anupam@anu.com', '8595963250', '$2y$10$IQikZimkFPmVMxE6rBxYc.jx9no4y5j6lhPzQmJ1oVR8WIi3Zlm7K', 'testanupam.co.in', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, 1522241672, 1522241699, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL),
(4, 'C1522314939', 'Tesla', 'Alam', 'test@tesla.com', '8447764785', '$2y$10$8k.hUhFbl8SAyhYyjYVjMOIcxVbaY/K7XT0wu6Cx0B/1intmEQ6sC', 'hello@tesla.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1522314939, 1522315950, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL),
(5, 'C1522315997', 'Tesla', 'Alam', 'alam@test.com', '8447764785', '$2y$10$gCKk89h0l9OouqJpEmTCE.rt/K2BLleZiDdD.alxGDk8A7j7vDAgy', 'hwll@tesla.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1522315997, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', 'N5tL7hQvbQO7AVZZdc0Ryg3pQTOM1E6NVB7wqTZX', NULL),
(6, 'C1522383729', 'Gimla', 'Asdf', 'shoeb@muser.co.in', '9897948452', '$2y$10$16FzlQAHYdSBiGSO..2dPO07kL076/ytbZ9E/DTsIEfn5aKM278Ha', 'shoeb@muser.co.in', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1522383729, 1522403963, NULL, NULL, 'facebook', 'fb_1251', NULL, 'corp', 'cf4N8MpQER7QfMKvqFBlAlqwytQ4EbUKxXAGN51b', NULL),
(7, 'C1522413295', 'Anonymous Name', NULL, NULL, '', NULL, 'alshoeb35@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1522413295, NULL, NULL, NULL, 'google', 'ggle_260719890', NULL, 'corp', 'ogYIBDKVkUvmBIvYScOPv1PXVNgDAaV1lOi9p8zy', NULL),
(8, 'C1522744462', 'Tesila', 'Abdul', 'abdul@gmail.com', '9897948452', '$2y$10$ZaVYQX8QdinoKkD6L7hZPuHf8VgyllmjiuQQU9fXEnP49ThGuS/Vi', 'tesilacomp@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1522744462, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL),
(10, 'C1523594234', 'Muser Pvt. Ltd.', 'Siddhartha', 'siddhartha@muser.co.in', '8595698545', '$2y$10$UdiqBlwAb3OE0L5CA2rb9O5eqimLnee5p4fUo62BoHQkK81sKHa9q', 'sales@muser.co.in', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1523594234, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL),
(11, 'C1524478561', 'Muser Pvt. Ltd.', 'Siddhartha', 'siddhartha@muser.co.in', '8595698545', '$2y$10$L3uvw3S5HTV9/X2va4QF9.jri5rEnCG239SCqdooP.M.aKOiB.biG', 'jar12ora@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1524478561, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL),
(12, 'C1524478576', 'Muser Pvt. Ltd.', 'Siddhartha', 'siddhartha@muser.co.in', '8595698545', '$2y$10$Cifdi78tTxxB7ue/gYdhzuj0qvFKp2hGO6honGUPJCfjJgXCkKhNe', 'jarora@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1524478576, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL),
(13, 'C1524571455', 'Muser Pvt. Ltd.', 'Siddhartha', 'siddhartha@muser.co.in', '8595698545', '$2y$10$2z6utmam8LRos74YnVaqSeB3LM3.Dh6Vux6BCfo/RgnB5KdMVCOSK', 'sales1@muser.co.in', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1524571455, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL),
(22, 'C1524718809', 'Shoeb Alam', NULL, NULL, '', NULL, 'ashoeb20@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1524718809, NULL, NULL, NULL, 'facebook', '114135516545740900560', 'https://lh4.googleusercontent.com/-GZtcocAay8w/AAAAAAAAAAI/AAAAAAAAAEY/-0umlSKdyEk/photo.jpg', 'corp', 'FAxHEnqTig5dkYC6O2JXobUGI8iCJpcRnLg7jxJm', 'rccwTwWoCx4arxf6CeJhjSvfebyTibcTjGrEQoeBfptKyqpwa4y7XBU3ywFj'),
(28, 'C1524823230', 'Jatin Arora', NULL, NULL, '', '$2y$10$PLQTjoEpyeIUL1becrhO0eai5.bl0CL2F5iafF4UIs5MroP2JbGE2', 'jarora1994@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1524823230, 1525259649, NULL, NULL, 'google', '114743041766528869483', 'https://lh5.googleusercontent.com/-exXXoayUY3U/AAAAAAAAAAI/AAAAAAAAAqU/KeB6_jUhiPA/photo.jpg', 'corp', 'xLDRaUotKymycLtLyou1cLCRwuLdgC1K3K7qwbp8', 'B7SqEDI19RQeVEgVx8BwQSwbiplRsSUhYTD743q7JSfQXAeke6RBBLlU7MVr'),
(29, 'C1525189664', 'Robin yadav', NULL, NULL, '', NULL, 'robin.delainetech@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1525189664, NULL, NULL, NULL, 'facebook', '106554283073062284491', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', 'corp', 'w7K7GeRr9WPxmrFiJYtGxm4TpYNAuXoPtxJQd2w5', NULL),
(30, 'C1525189726', 'Robin Yadav', NULL, NULL, '', NULL, 'robinydv007@yahoo.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1525189726, NULL, NULL, NULL, 'facebook', '1580422638722929', 'https://graph.facebook.com/v2.10/1580422638722929/picture?width=1920', 'corp', 'JcdtoOg0xLVINnMiBJ3tQqF6PIYgwTO2yPPf5c3A', 'VZs0Jqtp5GyDpQJgIdWFyTDuXSgtqiVaSCMUHZAc7At91TdEapD8Yrtz9qa4'),
(31, 'C1525240191', 'Gaurav Sharma', NULL, NULL, '', NULL, 'gauravsharma8813@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1525240191, NULL, NULL, NULL, 'facebook', '113098797231766027483', 'https://lh6.googleusercontent.com/-nHvyKEjrhhI/AAAAAAAAAAI/AAAAAAAAD00/bXx_r4g_kzo/photo.jpg', 'corp', 'Vw3AUvNoJ97PVCuyixxRdYSuAZ4N10nzcdFo6NYL', 'vVV55OGs4NMN9wkkKtsSfUV1qPFifpMRPZBOCdcwf8KpM87n22KPNbth0dbV');

-- --------------------------------------------------------

--
-- Table structure for table `corp_user_details`
--

CREATE TABLE `corp_user_details` (
  `uniqueId` bigint(20) NOT NULL,
  `corpCustId` bigint(20) NOT NULL,
  `appVersion` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcmId` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcmUpdatedAt` int(2) DEFAULT NULL,
  `sessionToken` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deviceToken` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deviceTokenUpdatedAt` int(2) DEFAULT NULL,
  `iosAppVersion` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double(4,2) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `referral` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `platform` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `corp_user_details`
--

INSERT INTO `corp_user_details` (`uniqueId`, `corpCustId`, `appVersion`, `gcmId`, `gcmUpdatedAt`, `sessionToken`, `deviceToken`, `deviceTokenUpdatedAt`, `iosAppVersion`, `rating`, `remarks`, `referral`, `createdOn`, `updatedOn`, `platform`, `created_at`, `updated_at`) VALUES
(1, 4, '1.01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 5, '1.02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 6, '1.02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 8, '1.02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 10, '1.0.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 11, '1.0.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 12, '1.0.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 13, '1.0.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 35, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 36, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 37, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 38, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 39, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 40, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 41, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 42, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE `country_master` (
  `countryId` int(5) NOT NULL,
  `countryName` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countryIsoCode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countryIsdCode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_master`
--

CREATE TABLE `coupon_master` (
  `uniqueId` int(10) NOT NULL,
  `couponCode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeType` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validFrom` int(2) DEFAULT NULL,
  `validUpto` int(2) DEFAULT NULL,
  `couponCategory` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minOrderValue` double(7,2) DEFAULT '0.00',
  `userLimit` int(2) NOT NULL DEFAULT '1',
  `useLimit` int(2) NOT NULL DEFAULT '0',
  `discVal` double(7,2) DEFAULT '0.00',
  `discCap` double(7,2) NOT NULL DEFAULT '0.00',
  `status` int(2) NOT NULL DEFAULT '0',
  `createdOn` int(2) DEFAULT NULL,
  `createdBy` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_master`
--

CREATE TABLE `delivery_master` (
  `deliveryId` int(10) NOT NULL,
  `customerId` bigint(20) NOT NULL,
  `customerType` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliveryLocation` bigint(10) NOT NULL,
  `driverId` bigint(15) DEFAULT NULL,
  `actDeliveryTime` int(2) DEFAULT NULL,
  `deliveryStartTime` int(2) NOT NULL,
  `deliveryEndTime` int(2) NOT NULL,
  `ifNotAvailable` int(1) NOT NULL DEFAULT '0',
  `prefNeighbourName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefNeighbourAddr` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `safePlaceDelivery` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isDelivery` int(2) NOT NULL DEFAULT '0',
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_transaction`
--

CREATE TABLE `driver_transaction` (
  `uniqueId` int(10) NOT NULL,
  `recordIdentifier` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driverId` int(10) NOT NULL,
  `executionOn` int(2) DEFAULT NULL,
  `transactionAmount` double(9,2) NOT NULL DEFAULT '0.00',
  `incomingCreditOn` int(2) DEFAULT NULL,
  `transactionOn` int(2) DEFAULT NULL,
  `transactionId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additionalInformation` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionStatus` int(2) DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `sub_title`, `description`, `created_at`, `updated_at`) VALUES
(10, '5', 'What are your operating hours?', '<p>We are open daily except for any emergency or Natural disaster. Our pickup and deliver hours is 8:00am &ndash; 12:00am and our customer service hours is 9am -12am.</p>', '2018-05-02 04:37:01', '2018-05-02 04:37:01'),
(7, '5', 'What does Launder Services do?', '<p>Launder Services provides on Demand Laundry Services, the most convenient and the highest quality dry cleaning and wash &amp; fold service for your garments. Simply place an order using our app and we will be at your door at your preferred time. We open late so you will never have to worry about running to your local dry cleaner before they close.</p>', '2018-05-02 04:28:06', '2018-05-02 04:28:06'),
(8, '5', 'How do I start?', '<p>You can create your account online on&nbsp;<a href=\"http://launderservices.com/launder-services/public/www.launderservices.com\">www.launderservices.com</a>&nbsp;or after downloading our app for&nbsp;iPhone&nbsp;and&nbsp;Android, and you will be ready to order in no time!</p>', '2018-05-02 04:30:42', '2018-05-02 05:18:45'),
(9, '5', 'What is Launder Services service area?', '<p>At present our services covers most of your city areas. But don&rsquo;t worry if you are not located there, Subscribe to our newsletter and you will be notified when we expand our service to your location.</p>', '2018-05-02 04:31:18', '2018-05-02 04:31:18'),
(11, '5', 'Do you have any expressed service?', '<p>Yes, we do! Please contact our staff on +91.XXX.XXX.XXX for more information.</p>', '2018-05-02 04:37:33', '2018-05-02 04:37:33'),
(12, '5', 'Can I place order by phone?', '<p>Yes, Actually We encourage customers to place their orders via our mobile apps available for iPhone and Android. It&rsquo;s really easy and convenient, give it a try!</p>', '2018-05-02 04:38:00', '2018-05-02 04:38:00'),
(13, '5', 'Is there an order minimum value?', '<p>Yes, the order minimum value is applicable as per city. It will be display as per your selected city.</p>', '2018-05-02 04:38:42', '2018-05-02 04:38:42'),
(14, '5', 'Is there a pickup & delivery fee in case of top urget?', '<p>Yes, there is Rs 5.00 additional fee/Item for our pickup and delivery in top urget service.</p>', '2018-05-02 04:43:00', '2018-05-02 04:43:00'),
(15, '5', 'What if my clothes are damaged or lost?', '<p>We strive to provide the best service to our customers, but in the rare event that your clothes are damaged or lost during our cleaning or logistic process, we will hold accountable and reimburse you. Please refer to the compensation policies in our terms and conditions section.</p>', '2018-05-02 04:43:26', '2018-05-02 04:43:26'),
(16, '6', 'Do I need to sort my clothes?', '<p>Yes, we just need you to separate your dry cleaning items and your wash &amp; fold items and we will take care of the rest!</p>', '2018-05-02 04:44:03', '2018-05-02 04:44:03'),
(17, '6', 'What should I prepare for the pickup?', '<p>Just make sure you have your clothes ready! Our staff will come to you with collection bags at your selected time slot through the app.</p>', '2018-05-02 04:44:27', '2018-05-02 04:44:27'),
(18, '6', 'I can\'t find a category that my garment belongs to on the app, how do I know if you can wash a specific item for me?', '<p>If you are not sure which category your item(s) belong to, feel free to CONTACT us +91XXX.XXX.XXX our staff are always happy and ready to assist.</p>', '2018-05-02 04:49:47', '2018-05-02 04:49:47'),
(19, '6', 'What should I do if I have special cleaning instruction for my item(s)?', '<p>Simply write Notes in &ldquo;<strong>LAUNDRY PREFERENCES</strong>&rdquo; what are your special cleaning instruction(s).</p>', '2018-05-02 04:50:17', '2018-05-02 04:50:17'),
(20, '6', 'I am ready for the pickup! What happens next?', '<p>Our staff will call or you will get notification when we are enroute ! We will come with Launder bag to pickup Items.</p>', '2018-05-02 04:50:43', '2018-05-02 04:50:43'),
(21, '6', 'When can I get my clothes back?', '<p>Please allow us 4 days to clean and deliver back to you from the time we pick up your items. Please contact us through IM if you require express service for your urgent needs.</p>\r\n<p>However, selected items such as leather, suede, down jacket, duvet and pillow would require 7 calendar days to turnaround as they require a more complex cleaning process and longer drying period.</p>', '2018-05-02 04:51:13', '2018-05-02 04:51:13'),
(22, '7', 'Can I reschedule a pickup/delivery?', '<p>Yes, you can change your pickup time in the app as long as it is 2 hours before your original scheduled time slot, but you may only reschedule to a time later than your original schedules time slot.</p>', '2018-05-02 04:54:36', '2018-05-02 04:54:36'),
(23, '7', 'What do I do if I missed a scheduled pickup/delivery?', '<p>No worries, simply contact us via our in-app IM function and we will arrange a new appointment for you as soon as possible.</p>', '2018-05-02 04:55:03', '2018-05-02 04:55:03'),
(24, '7', 'Can I change/cancel my order?', '<p>Yes, you may cancel your order at any time before we pick up your items. Once your items are picked up, we will proceed to cleaning immediately, so we are afraid we cannot make changes or cancel your order after that point. In emergency case, you can get back your clothes but without refund of paid charges.</p>\r\n<p>If you have additional item(s) to add, please contact us on IM or let our staff know during pickup. Please understand that the additional item(s) may need to be paid by cash. If you have clothes that do not need to be washed, please also contact us on IM before your scheduled pick up time so we can refund you properly. It is fine as long as your total bill is above our order minimum.</p>', '2018-05-02 04:55:35', '2018-05-02 04:55:35'),
(25, '7', 'I can’t wait for the scheduled delivery time and I need my clothes back now!', '<p>We will always promise to deliver your clothes nice and cleaned at your scheduled time but if something comes up please contact us via our in-app IM function, email&nbsp;<a href=\"mailto:support@launderservices.com\">support@launderservices.com&nbsp;</a>or give us a call at +91.XXX.XXX.XXX for urgent matters.</p>', '2018-05-02 04:56:07', '2018-05-02 04:56:07'),
(26, '7', 'Why are some of the pickup/delivery time slots greyed out?', '<p>Sorry, it is because we are busy at those time slots. Please choose another available time!</p>', '2018-05-02 04:56:32', '2018-05-02 04:56:32'),
(27, '7', 'Are there any items that are excluded from your services?', '<p>While we believe our scope of service covers most of the commonly washed items. For safety and hygiene reasons, we cannot process garments containing hazardous materials, blood or feces. If there is an item that we are not able to process, we will notify you and return the item uncleaned.</p>', '2018-05-02 04:56:56', '2018-05-02 04:56:56'),
(28, '8', 'When do I pay?', '<p>We require online payment to be made upon order placement.</p>', '2018-05-02 04:57:23', '2018-05-02 04:57:23'),
(29, '8', 'What are the methods of payment?', '<p>We ACCEPTE 100 currencies use PayTab to handle our online payments. We want you to order with confidence and peace of mind that for credit card number and details remain secure and private. Pay Tab supports a large number of credit cards, including Visa, Master Card, SADAD. We also, of course, accept cash in selected cities.</p>', '2018-05-02 04:57:44', '2018-05-02 04:57:44'),
(30, '8', 'How are my card details transmitted and stored?', '<p>We utilize PayTab to process online payments and we do not store any of our customers&rsquo; credit card information in our server. PayTab automatically encrypts your confidential information in transit from your device to ours using the Secure Sockets Layer protocol (SSL) with an encryption key length of 128-bits (the highest level commercially available).</p>', '2018-05-02 04:58:11', '2018-05-02 04:58:11'),
(31, '8', 'I have a general enquiry, how can I contact you?', '<p>The simplest way to get in touch with us is via our in-app IM function, or you can also email&nbsp;support@launderservices.com or give us a call at +91.XXX.XXX.XXX.</p>', '2018-05-02 04:58:35', '2018-05-02 04:58:35'),
(32, '8', 'What if I need to make a complaint or provide suggestions to your service?', '<p>We are sorry that you are not happy with our service! Please get in touch with us via any of the methods listed above. We treat all complaints and suggestions with the utmost importance and as an opportunity to improve the quality of our service.</p>', '2018-05-02 04:58:58', '2018-05-02 04:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `faq_title`
--

CREATE TABLE `faq_title` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq_title`
--

INSERT INTO `faq_title` (`id`, `title`, `created_at`, `updated_at`) VALUES
(8, 'Payments & Other', '2018-05-01 12:44:32', '2018-05-01 12:44:32'),
(7, 'Pickup &  Delivery', '2018-05-01 12:44:15', '2018-05-01 12:44:15'),
(5, 'General', '2018-05-01 05:06:28', '2018-05-01 12:43:36'),
(6, 'Getting Started', '2018-05-01 05:06:28', '2018-05-01 12:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `individual_user_master`
--

CREATE TABLE `individual_user_master` (
  `indvCustId` bigint(20) NOT NULL,
  `indvLsCustId` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indvCustName` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indvCustEmail` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indvCustMobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indvCustPassword` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indvCustStatus` int(2) NOT NULL DEFAULT '0',
  `isMobileVerified` int(2) NOT NULL DEFAULT '0',
  `isEmailVerified` int(2) NOT NULL DEFAULT '0',
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `dateId` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authUserId` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authId` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socialImage` text COLLATE utf8mb4_unicode_ci,
  `userType` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `sessionToken` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `individual_user_master`
--

INSERT INTO `individual_user_master` (`indvCustId`, `indvLsCustId`, `indvCustName`, `indvCustEmail`, `indvCustMobile`, `indvCustPassword`, `gender`, `indvCustStatus`, `isMobileVerified`, `isEmailVerified`, `createdOn`, `updatedOn`, `dateId`, `authUserId`, `auth`, `authId`, `socialImage`, `userType`, `sessionToken`, `remember_token`) VALUES
(3, 'D1001256', 'Anupam Kumar', 'anupam513@gmail.com', '9555419705', NULL, 'Male', 0, 0, 0, NULL, 1522239468, NULL, NULL, NULL, NULL, NULL, 'user', NULL, NULL),
(5, 'D1522152406', 'Gaurav Sharma', 'gaurav123@gmail.com', '9897987898', NULL, 'Male', 0, 0, 0, 1522152406, NULL, NULL, NULL, NULL, NULL, NULL, 'user', NULL, NULL),
(8, 'D1522153302', 'Shoeb Alam', 'ashoeb19@yahoo.com', '9894789563', 'e10adc3949ba59abbe56e057f20f883e', 'Male', 1, 0, 0, 1522153302, 1524825082, NULL, NULL, 'facebook', '1972894592780648', 'https://graph.facebook.com/v2.10/1972894592780648/picture?width=1920', 'user', 'Wi7P4mn52rWWOEwDXjqJzBEI4ehvxqgbBuIiwbOh', '6Otn7dd5uLOTE8lM5igyERX7UIt6eBwSkAS7nHn1QgHE0aOYEsyq9rGGcm1Z'),
(9, 'D1522239515', 'Abhishek Srivastava', 'abhishek@muser.co.in', '8860340015', '$2y$10$VajbNcp/Y/qxPAFH3qJQmeHi5grLXUwe.PH5V9Onk7t4sODS.0oVi', 'Male', 0, 0, 0, 1522239515, 1522239529, NULL, NULL, NULL, NULL, NULL, 'user', NULL, NULL),
(14, 'D1522310450', 'Shah Alam', 'alshoeb24@gmail.com', '8447764785', '$2y$10$ahgSOLEa4YC4xfyqDeTHrOjCaodbd1P5Q4GNwzbpr2Ft1qDXy0dD6', NULL, 0, 0, 0, 1522310450, NULL, NULL, NULL, NULL, NULL, NULL, 'user', NULL, 'jQfROfFjXVHGib6Lh70AX1vwCpFpEa7OMVwwsI4KpihKMysFEmWtKi3ZtGeK'),
(15, 'D1522314725', 'Shah Alam', 'alshoeb25@gmail.com', '8447764785', '$2y$10$CpDEZqhVIHfS9M6IetadDe7/.ZUV5JrAjOXTnANa7.1R99Hi6br0i', NULL, 0, 0, 0, 1522314725, NULL, NULL, NULL, NULL, NULL, NULL, 'user', NULL, NULL),
(16, 'D1522383473', 'Shoeb Alam', 'alshoeb20@gmail.com', '8447764785', '$2y$10$.ZSdAhbEP1xU9BSzKB.9ieH1vNJnaHGUmv1EP.bDPFcSOzzt51zNa', NULL, 0, 0, 0, 1522383473, NULL, NULL, NULL, NULL, NULL, NULL, 'user', NULL, '5sS1FQZbf9ygLIjZYLQEbfsJ6GgkMWud5xSEH1CInIZ9dQiOnsIEwhVCvqlw'),
(17, 'D1522413520', 'Anonymous Name', 'ashoeb21@yahoo.com', '', NULL, NULL, 0, 0, 0, 1522413520, NULL, NULL, NULL, 'facebook', 'fb_26071989012345', NULL, 'user', 'zlc1QYFbCz2iO4Y2V6sAQ7Ix6MFkceDmwHLDAL4i', NULL),
(18, 'D1522744642', 'Shoeb Alam', 'alshoeb30@gmail.com', '8447764785', '$2y$10$o1DT6MLmhDUPjXouwzAxGeLmBdruJx3sJEUHkrcVJROHhYaYjTGOW', NULL, 0, 0, 0, 1522744642, NULL, NULL, NULL, NULL, NULL, NULL, 'user', NULL, NULL),
(19, 'D1523592934', 'Shah Alam', 'alshoeb26@gmail.com', '8447764785', '$2y$10$Iq8coYltOjdYTY.tY6EmiuZK6XS.F8ueHdZMnUn1edXsP4mPQeo1W', NULL, 0, 0, 0, 1523592934, 1524572446, NULL, NULL, 'facebook', '123456', NULL, 'user', 'RgQHjlPriHo52mlP2izqabkG1oi0ikPkS0STZD2D', NULL),
(31, 'D1524823215', 'Muser India', 'muserindia@gmail.com', '', NULL, NULL, 0, 0, 0, 1524823215, NULL, NULL, NULL, 'facebook', '189758668491201', 'https://graph.facebook.com/v2.10/189758668491201/picture?width=1920', 'user', 'yV8WkrAjZncXoCPEz9YaDvX93uO06hTCOJzlbbP9', NULL),
(41, 'D1524824900', 'Nitin Sharma', 'nitin.sharma649@gmail.com', '', NULL, NULL, 0, 0, 0, 1524824900, 1524824997, NULL, NULL, 'facebook', '1671708206282750', 'https://graph.facebook.com/v2.10/1671708206282750/picture?width=1920', 'user', '7eoclzGL20V74ViOvlUBLD0GJt2Rsg0MHYIJgWdR', NULL),
(43, 'D1525240117', 'Gaurav Sharma', 'gaurav.motivation@gmail.com', '', NULL, NULL, 0, 0, 0, 1525240117, NULL, NULL, NULL, 'facebook', '1805970446128459', 'https://graph.facebook.com/v2.10/1805970446128459/picture?width=1920', 'user', 'eVBjum0hlb07raH4V0L576mun0y3x0xNoNYLmeeT', 'Ux2hCvHx1hO0UrSfP1ZPub2Fhu3QqsaTShCNPlyb57NTRtR2wHi4E0KFcHvx'),
(75, 'D1525258218', 'alshoeb29', 'alshoeb29@gmail.com', '9869896595', '$2y$10$0wpwrYk67RckJxD3blWtkOHhAX8VRiYUh1ANNKyVtxIp02/lFGDo6', NULL, 0, 0, 0, 1525258218, NULL, NULL, NULL, NULL, NULL, NULL, 'user', NULL, NULL),
(76, 'D1525258267', 'kalu', 'kali@gmail.com', '7289839897', '$2y$10$MGEuQ8u5UYMjRdZdVJPIR.27YK5EOAO1KKMYrEWmFigdp3aDbN1v2', NULL, 0, 0, 0, 1525258267, NULL, NULL, NULL, NULL, NULL, NULL, 'user', NULL, NULL),
(77, 'D1525259767', 'Jatin Gaba', 'gabajattin@gmail.com', '7289839897', NULL, NULL, 0, 0, 0, 1525259767, NULL, NULL, NULL, 'facebook', '1814359835323683', 'https://graph.facebook.com/v2.10/1814359835323683/picture?width=1920', 'user', 'dpqkePNiTpBDGjaN5T9KyohLgGDzqpMa47yZuq5L', 'nuDIUPn863arG6vnGaq4QAbDXb5n9c90DVdrKN6AS7Vez5RXezQTHoPYLYVY');

-- --------------------------------------------------------

--
-- Table structure for table `indv_user_details`
--

CREATE TABLE `indv_user_details` (
  `uniqueId` bigint(20) NOT NULL,
  `indvCustId` bigint(20) NOT NULL,
  `appVersion` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcmId` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcmUpdatedAt` int(2) DEFAULT NULL,
  `sessionToken` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deviceToken` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deviceTokenUpdatedAt` int(2) DEFAULT NULL,
  `iosAppVersion` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double(4,2) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `referral` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `platform` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indv_user_details`
--

INSERT INTO `indv_user_details` (`uniqueId`, `indvCustId`, `appVersion`, `gcmId`, `gcmUpdatedAt`, `sessionToken`, `deviceToken`, `deviceTokenUpdatedAt`, `iosAppVersion`, `rating`, `remarks`, `referral`, `createdOn`, `updatedOn`, `platform`, `created_at`, `updated_at`) VALUES
(1, 2, '1.011', NULL, NULL, NULL, NULL, NULL, NULL, 4.80, 'Hello World11', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, '1.012', NULL, NULL, NULL, NULL, NULL, NULL, 4.70, 'Hello World12', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, '1.021', NULL, NULL, NULL, NULL, NULL, NULL, 4.90, 'Hello World21', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 3, '1.022', NULL, NULL, NULL, NULL, NULL, NULL, 4.85, 'Hello World22', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 14, '1.01', 'safgE', 1522310450, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1522310450, NULL, 'WEB', NULL, NULL),
(10, 15, '1.01', 'safgE', 1522314725, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1522314725, NULL, 'WEB', NULL, NULL),
(11, 16, '1.01', 'safgEsahFJGVSDV', 1522383473, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1522383473, NULL, 'WEB', NULL, NULL),
(12, 18, '1.01', 'sdfkhgkhdshdsfjhghklhda', 1522744642, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1522744642, NULL, 'WEB', NULL, NULL),
(13, 19, '1.0.0', 'jdgjsf7895', 1523592934, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1523592934, NULL, 'WEB', NULL, NULL),
(14, 74, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1525258216, NULL, ' ', NULL, NULL),
(15, 75, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1525258218, NULL, ' ', NULL, NULL),
(16, 76, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1525258267, NULL, ' ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laundryman_transaction`
--

CREATE TABLE `laundryman_transaction` (
  `uniqueId` int(10) NOT NULL,
  `recordIdentifier` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `laundrymanId` int(10) NOT NULL,
  `executionOn` int(2) DEFAULT NULL,
  `transactionAmount` double(9,2) NOT NULL DEFAULT '0.00',
  `incomingCreditOn` int(2) DEFAULT NULL,
  `transactionOn` int(2) DEFAULT NULL,
  `transactionId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additionalInformation` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionStatus` int(2) DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_driver_master`
--

CREATE TABLE `ls_driver_master` (
  `driverId` int(10) NOT NULL,
  `driverName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailId` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addressId` bigint(10) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `isMobileVerified` int(1) NOT NULL DEFAULT '0',
  `sEmailVerified` int(1) NOT NULL DEFAULT '0',
  `profileImage` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licenseNumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licenseExpiryDate` int(2) DEFAULT NULL,
  `licenseImage` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalIdNumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalExpiryDate` int(2) DEFAULT NULL,
  `UIDImage` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAuthorized` int(2) NOT NULL DEFAULT '0',
  `panNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `platform` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_gen_items`
--

CREATE TABLE `ls_gen_items` (
  `itemId` bigint(15) NOT NULL,
  `itemCode` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemDesc` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoryId` int(5) NOT NULL,
  `isChargeable` int(1) NOT NULL DEFAULT '0',
  `itemStatus` int(1) NOT NULL DEFAULT '1',
  `isServiceAvailable` int(1) NOT NULL DEFAULT '0',
  `itemListStatus` int(1) NOT NULL DEFAULT '1',
  `createdOn` int(2) DEFAULT NULL,
  `createdBy` bigint(20) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_item_packaging`
--

CREATE TABLE `ls_item_packaging` (
  `uniqueId` int(10) NOT NULL,
  `itemId` bigint(15) NOT NULL,
  `packageId` int(5) NOT NULL,
  `price` double(7,2) DEFAULT NULL,
  `quantity` int(2) DEFAULT '1',
  `createdOn` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_item_pricelist`
--

CREATE TABLE `ls_item_pricelist` (
  `custPriceListId` bigint(15) NOT NULL,
  `itemId` bigint(15) NOT NULL,
  `customerType` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listNumber` int(10) DEFAULT NULL,
  `custPlReferenceNumber` int(10) DEFAULT NULL,
  `startTime` int(2) DEFAULT NULL,
  `endTime` int(2) DEFAULT NULL,
  `unitPrice` double(7,2) NOT NULL DEFAULT '0.00',
  `costPrice` double(7,2) DEFAULT '0.00',
  `discount` double(7,2) DEFAULT '0.00',
  `discountPercent` int(3) DEFAULT NULL,
  `discFixVale` double(7,2) NOT NULL DEFAULT '0.00',
  `margin` double(7,2) NOT NULL DEFAULT '0.00',
  `marginAmt` double(7,2) NOT NULL DEFAULT '0.00',
  `tax` double(7,2) NOT NULL DEFAULT '0.00',
  `taxOnMargin` double(7,2) NOT NULL DEFAULT '0.00',
  `vat` double(7,2) NOT NULL DEFAULT '0.00',
  `vatOnMargin` double(7,2) NOT NULL DEFAULT '0.00',
  `rate` double(7,2) NOT NULL DEFAULT '1.00',
  `status` int(2) NOT NULL DEFAULT '0',
  `createdOn` int(2) DEFAULT NULL,
  `createdBy` bigint(20) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_laundryman_master`
--

CREATE TABLE `ls_laundryman_master` (
  `laundryId` int(10) NOT NULL,
  `laundryName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailId` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addressId` bigint(10) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `isMobileVerified` int(1) NOT NULL DEFAULT '0',
  `sEmailVerified` int(1) NOT NULL DEFAULT '0',
  `profileImage` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licenseNumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licenseExpiryDate` int(2) DEFAULT NULL,
  `licenseImage` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalIdNumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalExpiryDate` int(2) DEFAULT NULL,
  `UIDImage` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAuthorized` int(2) NOT NULL DEFAULT '0',
  `panNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `platform` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_log`
--

CREATE TABLE `notification_log` (
  `uniqueId` bigint(15) NOT NULL,
  `objectId` bigint(20) NOT NULL,
  `notificationId` int(10) NOT NULL,
  `isViewed` int(1) NOT NULL DEFAULT '0',
  `sentOn` int(2) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `statusIOS` int(2) DEFAULT NULL,
  `statusRemarks` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statusIOSRemarks` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_master`
--

CREATE TABLE `notification_master` (
  `uniqueId` int(10) NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmd` int(1) DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `scheduleFor` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `orderDetailId` bigint(20) NOT NULL,
  `orderId` bigint(20) NOT NULL,
  `itemId` bigint(15) NOT NULL,
  `quantity` int(3) DEFAULT '0',
  `unitPrice` double(8,2) NOT NULL DEFAULT '0.00',
  `costPrice` double(8,2) NOT NULL DEFAULT '0.00',
  `subTotal` double(8,2) NOT NULL DEFAULT '0.00',
  `isRemoved` int(2) NOT NULL DEFAULT '0',
  `removedOn` int(2) DEFAULT NULL,
  `tax` double(7,2) DEFAULT NULL,
  `taxAmount` double(7,2) DEFAULT NULL,
  `rate` double(7,2) DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_log`
--

CREATE TABLE `order_log` (
  `uniqueId` bigint(15) NOT NULL,
  `orderId` bigint(20) NOT NULL,
  `orderStatusId` int(2) NOT NULL,
  `createdOn` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `orderId` bigint(20) NOT NULL,
  `orderLsId` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerId` bigint(20) NOT NULL,
  `customerType` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driverId` bigint(15) DEFAULT NULL,
  `laundryId` bigint(15) DEFAULT NULL,
  `itemCount` int(2) NOT NULL DEFAULT '1',
  `status` int(1) NOT NULL DEFAULT '0',
  `orderValue` double(10,2) DEFAULT NULL,
  `netAmount` double(10,2) DEFAULT NULL,
  `pickupId` int(10) DEFAULT NULL,
  `deliveryId` int(10) DEFAULT NULL,
  `taxAmount` double(10,2) DEFAULT NULL,
  `couponDiscValue` double(10,2) DEFAULT '0.00',
  `advDiscValue` double(10,2) DEFAULT '0.00',
  `paymentStatus` int(2) DEFAULT NULL,
  `transactionId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentDate` int(2) DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `paymentMode` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`orderId`, `orderLsId`, `customerId`, `customerType`, `driverId`, `laundryId`, `itemCount`, `status`, `orderValue`, `netAmount`, `pickupId`, `deliveryId`, `taxAmount`, `couponDiscValue`, `advDiscValue`, `paymentStatus`, `transactionId`, `paymentDate`, `createdOn`, `updatedOn`, `remarks`, `paymentMode`) VALUES
(123445, '123drdsg', 12334, 'individual', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `uniqueId` int(2) NOT NULL,
  `statusName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdOn` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `uniqueId` bigint(10) NOT NULL,
  `mobile` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countryCode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accessToken` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `source` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packaging_master`
--

CREATE TABLE `packaging_master` (
  `packagingId` int(5) NOT NULL,
  `categoryId` int(5) DEFAULT NULL,
  `packagingName` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packagingType` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `panel_user`
--

CREATE TABLE `panel_user` (
  `adUserId` bigint(10) NOT NULL,
  `userName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci,
  `firstName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userStatus` int(1) NOT NULL DEFAULT '0',
  `userImage` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isTrashed` int(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `panel_user`
--

INSERT INTO `panel_user` (`adUserId`, `userName`, `password`, `firstName`, `lastName`, `userStatus`, `userImage`, `isTrashed`, `remember_token`) VALUES
(1, 'admin@ls.com', '$2y$10$4biTUiBFtF0987.LHbEeBOq9oNwQFHs3HrfXI2/0Zo3LTbzhorH.G', 'Admin', NULL, 1, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pickup_master`
--

CREATE TABLE `pickup_master` (
  `pickupId` int(10) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `userType` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickupAddressId` bigint(10) NOT NULL,
  `actPickUpTime` int(2) DEFAULT NULL,
  `pickupStartTimestamp` int(2) NOT NULL,
  `pickupEndTimestamp` int(2) NOT NULL,
  `isReschedule` int(1) NOT NULL DEFAULT '0',
  `reScheduleTimestamp` int(2) DEFAULT NULL,
  `driverId` bigint(15) DEFAULT NULL,
  `pickupType` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondaryDriver` bigint(15) DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privacy`
--

CREATE TABLE `privacy` (
  `id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privacy`
--

INSERT INTO `privacy` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<h5>Dummy Text</h5>\r\n<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</strong></p>\r\n<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book.</strong></p>\r\n<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book.</strong></p>', '2018-04-30 09:58:36', '2018-04-30 13:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `processes`
--

CREATE TABLE `processes` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `processes`
--

INSERT INTO `processes` (`id`, `title`, `description`, `logo`, `created_at`, `updated_at`) VALUES
(5, 'Schedule', 'Launder Services is available 7 days a week between XXam & XXpm', '645231schedule.svg', '2018-05-01 12:14:22', '2018-05-01 12:14:22'),
(2, 'Pickup', 'Your friendly Launder Services valet will arrive between XXam & XXpm', '796128pickup.svg', '2018-05-01 06:12:48', '2018-05-01 12:15:09'),
(3, 'Delivery', 'Launder Services delivers on a consistent and predictable schedule, always between XXam & XXpm', '71142delivery.svg', '2018-05-01 07:03:03', '2018-05-01 12:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `rating_master`
--

CREATE TABLE `rating_master` (
  `uniqueId` int(10) NOT NULL,
  `objectById` bigint(20) NOT NULL,
  `objectByType` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objectToId` int(20) NOT NULL,
  `objectToType` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double(4,2) NOT NULL,
  `createdOn` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `uniqueId` int(10) NOT NULL,
  `objectId` bigint(20) NOT NULL,
  `validationToken` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `expiredOn` int(2) DEFAULT NULL,
  `isUsed` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `serves`
--

CREATE TABLE `serves` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading` text NOT NULL,
  `description` longtext NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serves`
--

INSERT INTO `serves` (`id`, `title`, `heading`, `description`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Individuals', 'We serve Individual customers or Bachelor, Families, Commercial', 'Our targeted Commercial customers are Serving Restaurants and Catering Companies, Hospitality Industries, Health Clubs, Spas, Salons, Rehab & Massage Centers, Hospitals & Nursing Homes, Children & Adult Day Care Centers, Hotels & Motels, Group Homes, Foreign Embassies, Government Agencies, House Cleaning & Maid Service Companies, Area Colleges & Universities, Private Security Companies and a Myriad of Other Commercial & Non-Profit Organizations.', '802573man_(1).svg', '2018-05-01 05:57:24', '2018-05-01 12:27:23'),
(2, 'Hospitals & Health care', 'Reducing Healthcare Linen Costs', 'From the veteran’s affairs hospital to a mid sized behavioural health clinic to a local therapist’s office, we have been able to dramatically decrease the linen budgets for hetalthcare providers. We are the only provider that can handle your linen contract and your patient’s personal laundry with the same care and attention to detail.', '727145hospital.svg', '2018-05-01 06:12:48', '2018-05-01 12:27:33'),
(5, 'Hotels', 'Managed On-Premise Hotel Laundry Services', 'Having served hospitality business of all sizes, Launder Services now manages laundry facilities al top hotel chains. Our approach is flexible. We can handle the rental linens or wash what you already own. We will continue to be the most sustainable, affordable, and responsible solution for local hotels.', '702874hotels.svg', '2018-05-01 12:29:03', '2018-05-01 12:29:03'),
(6, 'Fitness & Gym', 'Responsive, fast, affordable Services for Gyms & Fitness Centres', 'We offer gyms short or space and time on affordable, ultra responsive solution for linen rentals and laundry services. Not only will your fitness-minded clientele think our cyclists hauling over 200lbs on a bike are pretty awesome, they will appreciate our all natural laundering process that avoids chemical smell on linens. With us, the price we agree to is what you will see on your invoice. No hidden fees!\r\n\r\nRental or customer owned liners. We will wash the sheets and towels you own or rent you ours and work together to find the most affordable solution.', '637973gym.svg', '2018-05-01 12:30:31', '2018-05-01 12:30:31'),
(7, 'Salons', 'Clean & Fast Linen Solution & Salons, Barber shops & Spas', 'We are here to help you spend more time with your clients and less time dealing with your laundry and linens. Our all natural, hypo-allergenic detergents ensure that we provide you with clean, scent-free linens. We turn around your laundry in minimum time. Consider freeing up staff time and shelf space with our service.\r\n\r\nRental or customer owned liners. We will wash the sheets and towels you own or rent you ours and work together to find the most affordable solution.', '791321salons.svg', '2018-05-01 12:30:56', '2018-05-01 12:30:56'),
(8, 'Wellness', 'A green laundry & linen solution for spas, therapists & flotation studios', 'To create the relaxing, restorative environment for your clients or patients have come to expect, let us focus on your laundry and linens. Our hassle free recurring deliveries can happen as often as you need and we launder with our all natural, hypo-allergenic detergents ensure that we provide you with clean, scent-free linens. We turn around your laundry in minimum time.\r\n\r\nRental or customer owned liners. We will wash the sheets, blankets or yoga mats you own or rent you our sheets or towels. We will work together to find the most affordable solution.', '613299wellness.svg', '2018-05-01 12:31:21', '2018-05-01 12:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `service_master`
--

CREATE TABLE `service_master` (
  `serviceId` int(5) NOT NULL,
  `serviceName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceSlug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serviceDescription` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serviceStartTime` int(2) DEFAULT NULL,
  `serviceEndTime` int(2) DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_master`
--

INSERT INTO `service_master` (`serviceId`, `serviceName`, `serviceSlug`, `serviceDescription`, `serviceStartTime`, `serviceEndTime`, `createdOn`) VALUES
(1, 'Wash And Iron', 'wash-and-iron', NULL, NULL, NULL, 1523426108),
(2, 'Dry Clean And Iron', 'dry-clean-and-iron', NULL, NULL, NULL, 1523426108),
(3, 'Iron', 'iron', NULL, NULL, NULL, 1523426108);

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions`
--

CREATE TABLE `terms_and_conditions` (
  `id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms_and_conditions`
--

INSERT INTO `terms_and_conditions` (`id`, `description`, `created_at`, `updated_at`) VALUES
(12, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<h5>Dummy Text</h5>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<h5>Dummy Text</h5>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '2018-04-30 06:16:49', '2018-04-30 13:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jattin', 'jarora1994@gmail.com', '$2y$10$O6L8yz1RVpR1ci/SPuaABunXixQTPWoY.WBU.90i5PnoKswXT.JOC', 'LOBuKADn7gopPdxk65ULtLgtXoLgfkBjSkktdwuOQZocNcoNRO6OarBzdmfT', '2018-04-23 02:29:13', '2018-04-23 02:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_verifications`
--

CREATE TABLE `user_verifications` (
  `uniqueId` int(10) UNSIGNED NOT NULL,
  `objectId` int(10) UNSIGNED NOT NULL,
  `objectType` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiredOn` int(2) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_verifications`
--

INSERT INTO `user_verifications` (`uniqueId`, `objectId`, `objectType`, `token`, `expiredOn`, `created_on`) VALUES
(3, 2, 'user', 'TXCoKgHKfGyRaSOJCa4NrwHAqNnJs7', 1522404552, '2018-03-30 09:49:12'),
(4, 2, 'user', '9JbTd9JqyQtTP2uueGzWcdEczuUcvw', 1524631248, '2018-04-25 04:20:48'),
(5, 2, 'user', 'dZPYrxvED1IkHkdV8dOILADgSMXWam', 1524632663, '2018-04-25 04:44:23'),
(6, 2, 'user', 'zzXWP7nkWCUJGqL7985OmXBYa5pqHP', 1524632728, '2018-04-25 04:45:28'),
(7, 2, 'user', 'Oz7Xpekx3bs49PDnFJ9iLXtqXh5sU9', 1524636472, '2018-04-25 05:47:52'),
(8, 2, 'user', 'jtc11N8IhREOZeYulmG9wAXpNIEnMq', 1524636628, '2018-04-25 05:50:28'),
(9, 2, 'user', 'GEn8O2WP3sTVapd4Hclrg1wtmqtcu8', 1524637208, '2018-04-25 06:00:08'),
(10, 2, 'user', 'gSXUGSf3vqM9pzAuPXOb8CxYi9Oizs', 1524637477, '2018-04-25 06:04:37'),
(15, 28, 'corp', 'p40osAKlnvC235x88hBwWaSFjSc1Nx', 1525260668, '2018-05-02 11:11:08'),
(16, 28, 'corp', 'LxxZ34FqnF05P8dk9aOtWF1G9MBFcI', 1525260715, '2018-05-02 11:11:55'),
(17, 28, 'corp', 'MqavaoQjHCUKwpUGeg2zuzFJHz1WRw', 1525260744, '2018-05-02 11:12:24'),
(18, 28, 'corp', 'hu2COhJk51PoM4TVxpUcpgGwrdpifA', 1525260789, '2018-05-02 11:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `why_us`
--

CREATE TABLE `why_us` (
  `id` int(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `why_us`
--

INSERT INTO `why_us` (`id`, `heading`, `description`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Convenient Pickup and Delivery', 'We use “smart scheduling” to always deliver a consistent, high quality experience that fits within your busy schedule.', '279409clothes.jpg', '2018-05-01 07:34:58', '2018-05-01 07:34:58'),
(2, 'Quality Cleaning', 'We have years of clothing care experience and are committed to providing the highest-quality clothing care available.', '180653cleaning-clothes.jpg', '2018-05-01 06:12:48', '2018-05-01 07:38:09'),
(3, 'Simple Scheduling', 'Schedule a Launder Services via the web (launderservices.com) or our mobile app.', '317481watch.jpg', '2018-05-01 07:03:03', '2018-05-01 07:37:40'),
(6, 'Customer Service', 'We provide a worldclass customer experience. If you have questions, text us and a real person on our team will text you back.', '474819cutomer.jpg', '2018-05-01 07:38:38', '2018-05-01 07:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `zone_master`
--

CREATE TABLE `zone_master` (
  `zoneId` int(10) NOT NULL,
  `zoneName` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countryId` int(5) NOT NULL,
  `createdOn` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_master`
--
ALTER TABLE `address_master`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_ details`
--
ALTER TABLE `bank_ details`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `cms_master`
--
ALTER TABLE `cms_master`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corporate_user_master`
--
ALTER TABLE `corporate_user_master`
  ADD PRIMARY KEY (`corpCustId`);

--
-- Indexes for table `corp_user_details`
--
ALTER TABLE `corp_user_details`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `country_master`
--
ALTER TABLE `country_master`
  ADD PRIMARY KEY (`countryId`);

--
-- Indexes for table `coupon_master`
--
ALTER TABLE `coupon_master`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `delivery_master`
--
ALTER TABLE `delivery_master`
  ADD PRIMARY KEY (`deliveryId`);

--
-- Indexes for table `driver_transaction`
--
ALTER TABLE `driver_transaction`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_title`
--
ALTER TABLE `faq_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_user_master`
--
ALTER TABLE `individual_user_master`
  ADD PRIMARY KEY (`indvCustId`);

--
-- Indexes for table `indv_user_details`
--
ALTER TABLE `indv_user_details`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `laundryman_transaction`
--
ALTER TABLE `laundryman_transaction`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `ls_driver_master`
--
ALTER TABLE `ls_driver_master`
  ADD PRIMARY KEY (`driverId`);

--
-- Indexes for table `ls_gen_items`
--
ALTER TABLE `ls_gen_items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `ls_item_packaging`
--
ALTER TABLE `ls_item_packaging`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `ls_item_pricelist`
--
ALTER TABLE `ls_item_pricelist`
  ADD PRIMARY KEY (`custPriceListId`);

--
-- Indexes for table `ls_laundryman_master`
--
ALTER TABLE `ls_laundryman_master`
  ADD PRIMARY KEY (`laundryId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_log`
--
ALTER TABLE `notification_log`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `notification_master`
--
ALTER TABLE `notification_master`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orderDetailId`);

--
-- Indexes for table `order_log`
--
ALTER TABLE `order_log`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `packaging_master`
--
ALTER TABLE `packaging_master`
  ADD PRIMARY KEY (`packagingId`);

--
-- Indexes for table `panel_user`
--
ALTER TABLE `panel_user`
  ADD PRIMARY KEY (`adUserId`);

--
-- Indexes for table `pickup_master`
--
ALTER TABLE `pickup_master`
  ADD PRIMARY KEY (`pickupId`);

--
-- Indexes for table `privacy`
--
ALTER TABLE `privacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `processes`
--
ALTER TABLE `processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_master`
--
ALTER TABLE `rating_master`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `serves`
--
ALTER TABLE `serves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_master`
--
ALTER TABLE `service_master`
  ADD PRIMARY KEY (`serviceId`);

--
-- Indexes for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_verifications`
--
ALTER TABLE `user_verifications`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `why_us`
--
ALTER TABLE `why_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zone_master`
--
ALTER TABLE `zone_master`
  ADD PRIMARY KEY (`zoneId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_master`
--
ALTER TABLE `address_master`
  MODIFY `uniqueId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_ details`
--
ALTER TABLE `bank_ details`
  MODIFY `uniqueId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `categoryId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_master`
--
ALTER TABLE `cms_master`
  MODIFY `uniqueId` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `corporate_user_master`
--
ALTER TABLE `corporate_user_master`
  MODIFY `corpCustId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `corp_user_details`
--
ALTER TABLE `corp_user_details`
  MODIFY `uniqueId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `country_master`
--
ALTER TABLE `country_master`
  MODIFY `countryId` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_master`
--
ALTER TABLE `coupon_master`
  MODIFY `uniqueId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_master`
--
ALTER TABLE `delivery_master`
  MODIFY `deliveryId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_transaction`
--
ALTER TABLE `driver_transaction`
  MODIFY `uniqueId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `faq_title`
--
ALTER TABLE `faq_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `individual_user_master`
--
ALTER TABLE `individual_user_master`
  MODIFY `indvCustId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `indv_user_details`
--
ALTER TABLE `indv_user_details`
  MODIFY `uniqueId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `laundryman_transaction`
--
ALTER TABLE `laundryman_transaction`
  MODIFY `uniqueId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_driver_master`
--
ALTER TABLE `ls_driver_master`
  MODIFY `driverId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_gen_items`
--
ALTER TABLE `ls_gen_items`
  MODIFY `itemId` bigint(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_item_packaging`
--
ALTER TABLE `ls_item_packaging`
  MODIFY `uniqueId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_item_pricelist`
--
ALTER TABLE `ls_item_pricelist`
  MODIFY `custPriceListId` bigint(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_laundryman_master`
--
ALTER TABLE `ls_laundryman_master`
  MODIFY `laundryId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_log`
--
ALTER TABLE `notification_log`
  MODIFY `uniqueId` bigint(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_master`
--
ALTER TABLE `notification_master`
  MODIFY `uniqueId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `orderDetailId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_log`
--
ALTER TABLE `order_log`
  MODIFY `uniqueId` bigint(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `orderId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123446;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `uniqueId` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `uniqueId` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packaging_master`
--
ALTER TABLE `packaging_master`
  MODIFY `packagingId` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `panel_user`
--
ALTER TABLE `panel_user`
  MODIFY `adUserId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pickup_master`
--
ALTER TABLE `pickup_master`
  MODIFY `pickupId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacy`
--
ALTER TABLE `privacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `processes`
--
ALTER TABLE `processes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rating_master`
--
ALTER TABLE `rating_master`
  MODIFY `uniqueId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `uniqueId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serves`
--
ALTER TABLE `serves`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_master`
--
ALTER TABLE `service_master`
  MODIFY `serviceId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_verifications`
--
ALTER TABLE `user_verifications`
  MODIFY `uniqueId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `why_us`
--
ALTER TABLE `why_us`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zone_master`
--
ALTER TABLE `zone_master`
  MODIFY `zoneId` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
