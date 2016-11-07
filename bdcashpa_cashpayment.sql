-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2016 at 11:41 AM
-- Server version: 5.5.52-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bdcashpa_cashpayment`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE IF NOT EXISTS `activity_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_03_11_172849_create_roles_table', 1),
('2016_03_28_205908_create_activity_log_table', 1),
('2016_04_11_183524_create_transactions_table', 1),
('2016_04_16_181603_add_pin_numbers_to_users_table', 2),
('2016_04_18_181603_add_mobile_to_transactions_table', 2),
('2016_04_19_161051_rename_transactions_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Root', 'Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.', '2016-04-12 10:01:58', '2016-04-12 10:01:58'),
(2, 'Administrator', 'Full access to create, edit, and update companies, and orders.', '2016-04-12 10:01:58', '2016-04-12 10:01:58'),
(3, 'Reseller', '', '2016-04-12 10:01:58', '2016-04-12 10:01:58'),
(4, 'Agent', 'A standard user that can have a licence assigned to them. No administrative features.', '2016-04-12 10:01:58', '2016-04-12 10:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=153 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `from`, `to_id`, `payment_method`, `amount`, `status`, `created_at`, `updated_at`, `mobile`, `no_type`, `remarks`) VALUES
(81, 2, 4, 'BCash', '222.00', 'accepted', '2016-04-28 00:08:21', '2016-04-28 00:09:10', '0002103131', 'Personal', ''),
(113, 2, 4, 'BCash', '10200.00', 'denied', '2016-05-06 22:09:34', '2016-05-06 22:13:33', '01847143611', 'Agent', 'canceel'),
(118, 2, 4, 'BCash', '500.00', 'accepted', '2016-05-06 22:20:39', '2016-05-06 22:25:12', '01716849160', 'Personal', '3333'),
(148, 1, 2, '', '1000.00', 'accepted', '2016-09-08 21:44:19', '2016-09-08 21:44:31', '01715483217', '', ''),
(149, 1, 2, '', '2000.00', 'success', '2016-09-09 19:26:27', '2016-09-09 19:26:27', '01715483217', '', ''),
(150, 1, 51, '', '5000.00', 'success', '2016-09-09 19:28:43', '2016-09-09 19:28:43', '01911771445', '', ''),
(151, 1, 52, 'BCash', '7000.00', 'success', '2016-09-09 19:29:45', '2016-09-09 19:29:45', '01711771445', '', ''),
(152, 2, 4, 'BCash', '3000.00', 'accepted', '2016-09-09 19:33:39', '2016-09-09 19:39:16', '01911771445', 'Personal', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `parent_id` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pin_number` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `role_id`, `balance`, `parent_id`, `remember_token`, `created_at`, `updated_at`, `pin_number`) VALUES
(1, 'Bulet', 'buletksa@gmail.com', '$2y$10$9ETJ0Vl/NRWpOi/m6dmMV.A84IRqXAu.Jnn/XFtelcqOfR4Wuez1O', '01700877996', '2', '3992.00', 1, 'iZmsXojzkJ4si45C2MaK6NIflgleScXWa0eYKjxwu7s2mh8cZnhY29pEgKmA', NULL, '2016-09-27 21:11:39', 5678),
(2, 'bulu', 'bulu@gmail.com', '$2y$10$9ETJ0Vl/NRWpOi/m6dmMV.A84IRqXAu.Jnn/XFtelcqOfR4Wuez1O', '01715483217', '3', '25706.00', 1, 'qrM34tdTvV5Kzcidv5A7YE8h7P7Zg07mtanKTknHQrLFgkgBtGEAhwsPxy3O', '2016-04-22 03:48:32', '2016-09-09 19:33:39', 5678),
(51, 'raihan', 'raihan@gmail.com', '$2y$10$HeZqDKoTHFDq5tWMTRE63ONT1nZSa6n1j/tf4r7esuakKSlH6Php.', '01911771445', '3', '5000.00', 1, NULL, '2016-09-09 19:27:24', '2016-09-09 19:28:43', 5678),
(52, 'raju', 'raju@gmail.com', '$2y$10$R0swYU9mxsiSxh2EJd9F1OQaUTXGIovVPuHMHUqcZYPk7Fy4V5Dnu', '01711771445', '3', '7000.00', 1, NULL, '2016-09-09 19:28:05', '2016-09-09 19:29:44', 5678);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
