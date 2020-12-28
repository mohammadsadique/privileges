-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2020 at 05:01 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `privilege`
--

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `logid` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `logid`, `role`, `name`, `email`, `password`, `image`, `mobile`, `address`, `created_at`, `updated_at`) VALUES
(1, 0, 'admin', 'MD Sadique', 'admin@gmail.com', '$2y$10$JMzg9tcZfQlVCQx5XWDDRu7furkDMa5ie.RKPcLG/A5jmrhS/3Nu2', '1609070414-20201109114739-avatar2.png', '7748012831', '', '2020-12-27 12:00:50', '2020-12-27 12:00:50'),
(3, 1, 'staff', 'nicky nande', 'rajdansena@gmail.com', '$2y$10$gLr4YptQ8Qgi/4nL3hbCtuWnF9ow1CWYTNsy5QmFkjbL4a2PN4sJ2', '1606220908-c807dd05-6527-4c16-a2c1-68dab94c58c7.jpg', '8435210988', 'tiwari complex near shiv talkies chowk bilaspur', '2020-11-24 19:28:28', '2020-11-24 19:28:28'),
(4, 1, 'staff', 'Prince agrawal', 'admin@gmail.com', '$2y$10$PUaX9Z1MRWeLVcg8galU2.1UVkoMQQVEfFX8S6mkMUUldCorG0yi6', NULL, '', 'bilaspur', '2020-12-24 18:27:29', '2020-12-24 18:27:29'),
(5, 1, 'staff', 'nicky nande', 'huma@gmail.com', '$2y$10$bEddadkeFenavTg0kN3iNuN2v1qOah4XF4FNPvG3yZ5Brmz0UdnIy', NULL, '8435210988', 'tiwari complex near shiv talkies chowk bilaspur', '2020-12-19 21:05:22', '2020-12-19 21:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(0, '2020_12_28_182614_create_privileges_table', 36),
(11, '2020_10_09_070239_create_login_table', 1),
(12, '2020_10_09_075339_create_logins_table', 2),
(13, '2020_10_09_080110_create_login_table', 3),
(14, '2020_10_09_081512_create_logins_table', 4),
(15, '2020_10_10_062204_create_social_links_table', 5),
(16, '2020_10_10_080212_create_web_changes_table', 6),
(17, '2020_10_10_082140_update_social_links_table', 7),
(18, '2020_10_10_083453_add_logid_to_social_links_table', 8),
(19, '2020_10_12_052709_create_web_banners_table', 9),
(20, '2020_10_12_075432_create_web_subscribers_table', 10),
(21, '2020_10_12_082510_create_web_brands_table', 11),
(22, '2020_10_13_063410_create_web_contacts_table', 12),
(23, '2020_10_13_085805_create_user_registrations_table', 13),
(24, '2020_10_14_111631_create_add_categories_table', 14),
(25, '2020_10_14_112117_create_p_add_categories_table', 15),
(26, '2020_10_14_120526_create_p_add_sub_categories_table', 16),
(27, '2020_10_15_114117_create_p_attribute_names_table', 17),
(28, '2020_10_15_120529_create_p_attribute_values_table', 18),
(29, '2020_10_16_131913_create_p_add_propduct1s_table', 19),
(30, '2020_10_16_132205_create_p_add_propduct2s_table', 19),
(31, '2020_10_16_133216_create_p_add_propduct2s_table', 20),
(32, '2020_10_19_064239_create_p_add_product3s_table', 21),
(33, '2020_10_19_064508_create_p_add_product2s_table', 21),
(34, '2020_10_19_064619_create_p_add_product1s_table', 21),
(35, '2020_10_22_135943_create_web_make_pages_table', 22),
(36, '2020_10_24_072315_create_s_add_staff_table', 23),
(37, '2020_10_24_074351_add_email_column__to_s_add_staff', 24),
(38, '2020_10_28_123536_create_userbuy_products_table', 25),
(39, '2020_10_29_080242_create_web_buy_product2s_table', 26),
(40, '2020_10_29_080730_create_user_buy_product2s_table', 27),
(41, '2020_10_29_080827_create_user_buy_product1s_table', 28),
(42, '2020_11_01_105745_create_p_add_product4s_table', 29),
(43, '2020_11_03_131005_create_offer_on_products_table', 30),
(44, '2020_11_04_060636_create_offer_on_prices_table', 31),
(45, '2020_11_04_080656_create_offer_advertisements_table', 32),
(46, '2020_11_05_053400_create_tests_table', 33),
(47, '2020_11_05_064101_create_user_add_to_carts_table', 34),
(48, '2020_11_06_131853_create_user_buy_product3s_table', 35);

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submodule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1=module, 0=submodule',
  `tag` int(11) NOT NULL,
  `onoff` int(11) NOT NULL COMMENT '1=page show, 0=page hide',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `module`, `submodule`, `status`, `tag`, `onoff`, `created_at`, `updated_at`) VALUES
(1, 'Admission', NULL, 1, 1, 1, NULL, NULL),
(2, NULL, 'Direct Registration', 0, 1, 1, NULL, NULL),
(3, NULL, 'View Registration History', 0, 1, 1, NULL, NULL),
(4, 'Transport', NULL, 1, 4, 1, '2020-12-28 14:45:04', '2020-12-28 14:45:04'),
(7, 'Account', NULL, 1, 7, 0, '2020-12-28 14:48:23', '2020-12-28 14:48:23'),
(8, NULL, 'Direct Transport Registration', 0, 4, 1, '2020-12-28 15:34:42', '2020-12-28 15:34:42');

-- --------------------------------------------------------

--
-- Table structure for table `s_add_staff`
--

CREATE TABLE `s_add_staff` (
  `id` int(10) UNSIGNED NOT NULL,
  `logid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_add_staff`
--
ALTER TABLE `s_add_staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `s_add_staff`
--
ALTER TABLE `s_add_staff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
