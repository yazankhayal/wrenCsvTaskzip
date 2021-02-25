-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 07:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wrentest`
--

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
(1, '2021_02_25_170106_create_tbl_product_data_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_data`
--

CREATE TABLE `tbl_product_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `strProductName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strProductDesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strProductCode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dtmAdded` datetime DEFAULT NULL,
  `dtmDiscontinued` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product_data`
--

INSERT INTO `tbl_product_data` (`id`, `strProductName`, `strProductDesc`, `strProductCode`, `dtmAdded`, `dtmDiscontinued`, `created_at`, `updated_at`) VALUES
(39, 'Cd Player', 'Nice CD player', 'P0002', '2021-02-25 18:04:16', '2021-02-25 18:04:16', '2021-02-25 18:04:16', '2021-02-25 18:04:16'),
(40, 'VCR', 'Top notch VCR', 'P0003', '2021-02-25 18:04:16', '2021-02-25 18:04:16', '2021-02-25 18:04:16', '2021-02-25 18:04:16'),
(41, 'Harddisk', 'More storage options', 'P0018', '2021-02-25 18:04:16', '2021-02-25 18:04:16', '2021-02-25 18:04:16', '2021-02-25 18:04:16'),
(42, 'PS3', 'Just don\'t go online', 'P0024', '2021-02-25 18:04:16', '2021-02-25 18:04:16', '2021-02-25 18:04:16', '2021-02-25 18:04:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_data`
--
ALTER TABLE `tbl_product_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_product_data_strproductcode_unique` (`strProductCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product_data`
--
ALTER TABLE `tbl_product_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
