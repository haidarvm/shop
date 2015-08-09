-- phpMyAdmin SQL Dump
-- version 4.4.13
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2015 at 10:00 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `shortdesc` varchar(255) NOT NULL,
  `longdesc` text NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `parentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `checkout_form`
--

CREATE TABLE IF NOT EXISTS `checkout_form` (
  `checkout_forms_id` bigint(20) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` varchar(64) NOT NULL DEFAULT '',
  `mandatory` varchar(1) NOT NULL DEFAULT '0',
  `display_log` char(1) NOT NULL DEFAULT '0',
  `default` varchar(128) NOT NULL DEFAULT '0',
  `active` varchar(1) NOT NULL DEFAULT '1',
  `checkout_order` int(10) unsigned NOT NULL DEFAULT '0',
  `unique_name` varchar(255) NOT NULL DEFAULT '',
  `options` varchar(255) NOT NULL DEFAULT '',
  `checkout_set` varchar(64) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(10) unsigned NOT NULL,
  `password` varchar(50) NOT NULL,
  `customer_first_name` varchar(50) NOT NULL,
  `customer_last_name` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `post_code` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=default, 0=not_show',
  `extension` varchar(20) NOT NULL,
  `size` varchar(40) NOT NULL,
  `type` varchar(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `medium_url` varchar(255) NOT NULL,
  `thumbnail_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `shortdesc` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `page_uri` varchar(100) NOT NULL,
  `ext_url` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` enum('active','inactive') NOT NULL,
  `parentid` int(10) NOT NULL,
  `order` int(11) NOT NULL,
  `position` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `total` double NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `order_item_id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `page_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(3) NOT NULL,
  `name` varchar(300) NOT NULL,
  `shortdesc` varchar(255) NOT NULL,
  `longdesc` text NOT NULL,
  `product_order` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `grouping` varchar(16) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `featured` enum('none','front','webshop') NOT NULL,
  `other_feature` enum('none','most sold','new product') NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `stock` int(4) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stock_status` varchar(45) DEFAULT 'in-stock',
  `ship_restrict` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_log`
--

CREATE TABLE IF NOT EXISTS `purchase_log` (
  `purchase_logs_id` bigint(20) unsigned NOT NULL,
  `totalprice` decimal(11,2) NOT NULL DEFAULT '0.00',
  `statusno` smallint(6) NOT NULL DEFAULT '0',
  `sessionid` varchar(255) NOT NULL DEFAULT '',
  `transactid` varchar(255) NOT NULL DEFAULT '',
  `authcode` varchar(255) NOT NULL DEFAULT '',
  `processed` bigint(20) unsigned NOT NULL DEFAULT '1',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `date` varchar(255) NOT NULL DEFAULT '',
  `gateway` varchar(64) NOT NULL DEFAULT '',
  `billing_country` char(6) NOT NULL DEFAULT '',
  `shipping_country` char(6) NOT NULL DEFAULT '',
  `base_shipping` decimal(11,2) NOT NULL DEFAULT '0.00',
  `email_sent` char(1) NOT NULL DEFAULT '0',
  `stock_adjusted` char(1) NOT NULL DEFAULT '0',
  `discount_value` decimal(11,2) NOT NULL DEFAULT '0.00',
  `discount_data` text,
  `track_id` varchar(50) NOT NULL DEFAULT '',
  `billing_region` char(6) NOT NULL DEFAULT '',
  `shipping_region` char(6) NOT NULL DEFAULT '',
  `find_us` varchar(255) NOT NULL DEFAULT '',
  `engravetext` varchar(255) DEFAULT '',
  `shipping_method` varchar(64) DEFAULT NULL,
  `shipping_option` varchar(128) DEFAULT NULL,
  `affiliate_id` varchar(32) DEFAULT NULL,
  `plugin_version` varchar(32) DEFAULT NULL,
  `notes` text,
  `wpec_taxes_total` decimal(11,2) DEFAULT NULL,
  `wpec_taxes_rate` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `setting_id` int(11) NOT NULL,
  `max_featured` tinyint(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `max_featured`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) unsigned NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(254) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `group` int(10) unsigned DEFAULT NULL,
  `activation_key` varchar(32) DEFAULT NULL,
  `last_visit` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `users_id` bigint(20) unsigned NOT NULL,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_name` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_activation_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`name`,`shortdesc`),
  ADD UNIQUE KEY `category_id` (`category_id`);

--
-- Indexes for table `checkout_form`
--
ALTER TABLE `checkout_form`
  ADD PRIMARY KEY (`name`,`type`,`unique_name`),
  ADD UNIQUE KEY `checkout_forms_id` (`checkout_forms_id`),
  ADD KEY `checkout_order` (`checkout_order`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `page_id` (`page_uri`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`customer_id`,`total`,`delivery_date`,`payment_date`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `password` (`password`),
  ADD KEY `group` (`group`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
