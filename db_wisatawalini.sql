-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 03:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wisatawalini`
--

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id_discount` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `discount_value` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id_discount`, `id_product`, `discount_value`, `created_at`, `updated_at`, `id_user`) VALUES
(113, 2, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(114, 3, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(115, 4, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(116, 5, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(117, 8, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(118, 9, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(119, 11, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(120, 12, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(121, 13, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(122, 14, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(123, 15, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(124, 16, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(125, 17, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(126, 18, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(127, 20, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(128, 21, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(129, 22, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(130, 23, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(131, 24, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(132, 25, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(133, 27, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(134, 29, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(135, 30, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(136, 31, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(137, 32, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(138, 33, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(139, 34, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(140, 35, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(141, 36, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(142, 37, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(143, 38, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1),
(144, 39, 10.00, '2024-11-27 19:51:44', '2024-11-27 12:51:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `nama_product` varchar(100) NOT NULL,
  `kategori_product` enum('Kolam Renang','Kendaraan','PlayGround','Penginapan','Kelengkapan') NOT NULL,
  `sub_kategori_product` enum('Penginapan Bungalow','Penginapan Kerucut','Penginapan Lumbung','Penginapan Panggung') DEFAULT NULL,
  `harga_weekday` decimal(10,2) NOT NULL,
  `harga_weekend` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_penginapan` enum('terisi','kosong') DEFAULT 'kosong'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `nama_product`, `kategori_product`, `sub_kategori_product`, `harga_weekday`, `harga_weekend`, `created_at`, `updated_by`, `img`, `updated_at`, `status_penginapan`) VALUES
(2, 'Kolam Renang', 'Kolam Renang', NULL, 25000.00, 25000.00, '2024-11-23 11:15:46', 1, 'product_67471ecad51f59.22442328.jpg', '2024-11-27 13:29:46', 'kosong'),
(3, 'Kolam Rendam', 'Kolam Renang', NULL, 20000.00, 20000.00, '2024-11-23 11:21:29', 1, 'product_6741824f9003e0.02778070.jpg', '2024-11-23 07:20:47', 'kosong'),
(4, 'Kolam Rendam Keluarga', 'Kolam Renang', NULL, 20000.00, 20000.00, '2024-11-23 11:30:07', 1, 'product_67418265b10c13.39284895.jpg', '2024-11-23 07:21:09', 'kosong'),
(5, 'Kolam Terapi Ikan', 'Kolam Renang', NULL, 20000.00, 20000.00, '2024-11-23 11:36:39', 1, 'product_674182805d0043.97255425.jpg', '2024-11-23 07:21:36', 'kosong'),
(8, 'Kendaraan Roda 4', 'Kendaraan', NULL, 100000.00, 100000.00, '2024-11-23 14:40:02', 1, 'product_674189287bce01.00775717.jpg', '2024-11-23 07:50:00', 'kosong'),
(9, 'Kendaraan Roda 6 (bis)', 'Kendaraan', NULL, 100000.00, 100000.00, '2024-11-23 14:50:53', 1, 'product_6741895dc27420.69542889.jpg', '2024-11-23 07:50:53', 'kosong'),
(11, 'Kendaraan Roda 2', 'Kendaraan', NULL, 100000.00, 100000.00, '2024-11-23 14:53:29', 1, 'product_674189f9e4d109.74292126.jpg', '2024-11-23 07:53:29', 'kosong'),
(12, 'ATV Adventure', 'PlayGround', NULL, 100000.00, 100000.00, '2024-11-23 15:01:37', 1, 'product_67418be1b30c70.24608268.jpg', '2024-11-23 08:02:22', 'kosong'),
(13, 'ATV Tea Tour', 'PlayGround', NULL, 100000.00, 100000.00, '2024-11-23 15:03:22', 1, 'product_67418c4a9e4843.31335712.jpg', '2024-11-23 08:03:22', 'kosong'),
(14, 'ATV Mini', 'PlayGround', NULL, 100000.00, 100000.00, '2024-11-23 15:03:50', 1, 'product_67418c66c07ca9.54021615.jpg', '2024-11-23 08:03:50', 'kosong'),
(15, 'F Fox Besar (Extrem)', 'PlayGround', NULL, 100000.00, 100000.00, '2024-11-23 15:04:38', 1, 'product_67418c96bf99b9.86901243.jpg', '2024-11-23 08:04:38', 'kosong'),
(16, 'F Fox Mini', 'PlayGround', NULL, 100000.00, 100000.00, '2024-11-23 15:04:59', 1, 'product_67418cab868ec0.87117961.jpg', '2024-11-23 08:04:59', 'kosong'),
(17, 'Go Car', 'PlayGround', NULL, 100000.00, 100000.00, '2024-11-23 15:05:20', 1, 'product_67418cc0791f08.72824869.jpg', '2024-11-23 08:05:20', 'kosong'),
(18, 'Kereta Api', 'PlayGround', NULL, 100000.00, 100000.00, '2024-11-23 15:05:45', 1, 'product_67418cd9ae9ac8.07742627.jpg', '2024-11-23 08:05:45', 'kosong'),
(20, 'Bajaj', 'PlayGround', NULL, 100000.00, 100000.00, '2024-11-23 15:06:23', 1, 'product_67418cffdcc6b3.01433560.jpg', '2024-11-23 08:06:23', 'kosong'),
(21, 'Loker', 'Kelengkapan', NULL, 20000.00, 20000.00, '2024-11-23 17:04:00', 1, 'product_6741a8901d8bc8.21382008.jpg', '2024-11-23 10:04:00', 'kosong'),
(22, 'Toilet', 'Kelengkapan', NULL, 20000.00, 20000.00, '2024-11-23 17:04:34', 1, 'product_6741a8b2052b71.43156169.jpg', '2024-11-23 10:04:34', 'kosong'),
(23, 'Tikar', 'Kelengkapan', NULL, 20000.00, 20000.00, '2024-11-23 17:04:53', 1, 'product_6741a8c55821b3.09590146.jpg', '2024-11-23 10:04:53', 'kosong'),
(24, 'Ban', 'Kelengkapan', NULL, 20000.00, 20000.00, '2024-11-23 17:05:14', 1, 'product_6741a8daac2095.04911333.jpg', '2024-11-23 10:05:14', 'kosong'),
(25, 'Kelengkapan Renang', 'Kelengkapan', NULL, 20000.00, 20000.00, '2024-11-23 17:05:42', 1, 'product_6741a8f692f2a2.46209094.jpg', '2024-11-23 10:05:42', 'kosong'),
(27, 'Penginapan Bungalow 1', 'Penginapan', 'Penginapan Bungalow', 100000.00, 100000.00, '2024-11-24 11:14:27', 1, 'product_6742c044552e95.16492865.jpg', '2024-11-28 13:55:32', 'terisi'),
(29, 'Penginapan Bungalow 2', 'Penginapan', 'Penginapan Bungalow', 20000.00, 20000.00, '2024-11-24 12:57:59', 1, 'product_6742c06741dc62.81840697.jpg', '2024-11-28 10:57:37', 'kosong'),
(30, 'Penginapan Bungalow 3', 'Penginapan', 'Penginapan Bungalow', 20000.00, 20000.00, '2024-11-24 12:58:16', 1, 'product_6742c0788c8dc7.43936369.jpg', '2024-11-28 10:57:40', 'kosong'),
(31, 'Penginapan Kerucut 1', 'Penginapan', 'Penginapan Kerucut', 100000.00, 100000.00, '2024-11-24 12:58:59', 1, 'product_6742c0b70afd38.22395720.jpg', '2024-11-28 13:55:39', 'terisi'),
(32, 'Penginapan Kerucut 2', 'Penginapan', 'Penginapan Kerucut', 20000.00, 20000.00, '2024-11-24 12:59:36', 1, 'product_6742c0c80d7544.97616039.jpg', '2024-11-28 09:43:57', 'kosong'),
(33, 'Penginapan Kerucut 3', 'Penginapan', 'Penginapan Kerucut', 20000.00, 20000.00, '2024-11-24 12:59:50', 1, 'product_6742c0d6bfe617.34722787.jpg', '2024-11-28 09:44:01', 'kosong'),
(34, 'Penginapan Lumbung 1', 'Penginapan', 'Penginapan Lumbung', 20000.00, 20000.00, '2024-11-24 13:00:17', 1, 'product_6742c0f1acccc4.84412809.jpg', '2024-11-28 09:44:04', 'kosong'),
(35, 'Penginapan Lumbung 2', 'Penginapan', 'Penginapan Lumbung', 20000.00, 20000.00, '2024-11-24 13:00:35', 1, 'product_6742c103d7a193.39621406.jpg', '2024-11-28 09:44:09', 'kosong'),
(36, 'Penginapan Lumbung 3', 'Penginapan', 'Penginapan Lumbung', 20000.00, 20000.00, '2024-11-24 13:00:52', 1, 'product_6742c1146baea2.88843989.jpg', '2024-11-24 06:00:52', 'kosong'),
(37, 'Penginapan panggung 1', 'Penginapan', 'Penginapan Panggung', 20000.00, 20000.00, '2024-11-24 13:01:34', 1, 'product_6742c13e114707.25887299.jpg', '2024-11-24 06:01:34', 'kosong'),
(38, 'Penginapan panggung 2', 'Penginapan', 'Penginapan Panggung', 20000.00, 20000.00, '2024-11-24 13:01:49', 1, 'product_6742c14d43fb86.23565583.jpg', '2024-11-24 06:01:49', 'kosong'),
(39, 'Penginapan panggung 3', 'Penginapan', 'Penginapan Panggung', 100000.00, 100000.00, '2024-11-24 13:02:02', 1, 'product_6742c1756bdab9.57959587.jpg', '2024-11-24 06:02:29', 'kosong');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_transaksi` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `nama_product` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime DEFAULT current_timestamp(),
  `id_discount` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT 0,
  `harga_product` decimal(10,2) DEFAULT 0.00,
  `total_harga_tambah_diskon` decimal(10,2) DEFAULT 0.00,
  `diskon` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id_transaksi`, `id_product`, `nama_product`, `id_user`, `username`, `tanggal_transaksi`, `id_discount`, `qty`, `harga_product`, `total_harga_tambah_diskon`, `diskon`) VALUES
(52, 2, 'Kolam Renang', 1, 'Ayilesmana', '2024-11-28 16:05:53', NULL, 1, 25000.00, 22500.00, 10.00),
(53, 2, 'Kolam Renang', 1, 'Ayilesmana', '2024-11-28 16:17:22', NULL, 1, 25000.00, 22500.00, 10.00),
(54, 3, 'Kolam Rendam', 1, 'Ayilesmana', '2024-11-28 16:17:36', NULL, 1, 20000.00, 18000.00, 10.00),
(55, 4, 'Kolam Rendam Keluarga', 1, 'Ayilesmana', '2024-11-28 16:17:48', NULL, 1, 20000.00, 18000.00, 10.00),
(56, 5, 'Kolam Terapi Ikan', 1, 'Ayilesmana', '2024-11-28 16:17:53', NULL, 1, 20000.00, 18000.00, 10.00),
(57, 8, 'Kendaraan Roda 4', 1, 'Ayilesmana', '2024-11-28 16:18:15', NULL, 1, 100000.00, 90000.00, 10.00),
(58, 9, 'Kendaraan Roda 6 (bis)', 1, 'Ayilesmana', '2024-11-28 16:18:18', NULL, 1, 100000.00, 90000.00, 10.00),
(59, 11, 'Kendaraan Roda 2', 1, 'Ayilesmana', '2024-11-28 16:18:21', NULL, 1, 100000.00, 90000.00, 10.00),
(60, 8, 'Kendaraan Roda 4', 1, 'Ayilesmana', '2024-11-28 16:18:51', NULL, 1, 100000.00, 90000.00, 10.00),
(61, 2, 'Kolam Renang', 1, 'Ayilesmana', '2024-11-28 16:24:30', NULL, 1, 25000.00, 22500.00, 10.00),
(63, 12, 'ATV Adventure', 1, 'Ayilesmana', '2024-11-28 16:32:56', NULL, 1, 100000.00, 90000.00, 10.00),
(64, 2, 'Kolam Renang', 1, 'Ayilesmana', '2024-11-28 16:37:33', 113, 1, 25000.00, 22500.00, 10.00),
(65, 2, 'Kolam Renang', 1, 'Ayilesmana', '2024-11-28 16:37:58', NULL, 1, 25000.00, 25000.00, 0.00),
(66, 2, 'Kolam Renang', 1, 'Ayilesmana', '2024-11-28 16:41:38', 113, 1, 25000.00, 22500.00, 10.00),
(67, 2, 'Kolam Renang', 1, 'Ayilesmana', '2024-11-28 16:41:55', NULL, 1, 25000.00, 25000.00, 0.00),
(68, 8, 'Kendaraan Roda 4', 1, 'Ayilesmana', '2024-11-28 16:42:17', 117, 1, 100000.00, 90000.00, 10.00),
(69, 8, 'Kendaraan Roda 4', 1, 'Ayilesmana', '2024-11-28 16:42:30', NULL, 1, 100000.00, 100000.00, 0.00),
(70, 12, 'ATV Adventure', 1, 'Ayilesmana', '2024-11-28 16:43:15', 120, 1, 100000.00, 90000.00, 10.00),
(71, 12, 'ATV Adventure', 1, 'Ayilesmana', '2024-11-28 16:43:21', NULL, 1, 100000.00, 100000.00, 0.00),
(72, 27, 'Penginapan Bungalow 1', 1, 'Ayilesmana', '2024-11-28 16:44:14', NULL, 1, 100000.00, 100000.00, 0.00),
(73, 29, 'Penginapan Bungalow 2', 1, 'Ayilesmana', '2024-11-28 16:44:26', NULL, 1, 20000.00, 20000.00, 0.00),
(74, 27, 'Penginapan Bungalow 1', 1, 'Ayilesmana', '2024-11-28 16:44:42', 133, 1, 100000.00, 90000.00, 10.00),
(75, 21, 'Loker', 1, 'Ayilesmana', '2024-11-28 16:45:06', 128, 1, 20000.00, 18000.00, 10.00),
(76, 21, 'Loker', 1, 'Ayilesmana', '2024-11-28 16:45:10', NULL, 1, 20000.00, 20000.00, 0.00),
(83, 30, 'Penginapan Bungalow 3', 1, 'Ayilesmana', '2024-11-28 17:07:11', NULL, 1, 20000.00, 20000.00, 0.00),
(86, 27, 'Penginapan Bungalow 1', 1, 'Ayilesmana', '2024-11-28 20:55:32', 133, 1, 100000.00, 90000.00, 10.00),
(87, 31, 'Penginapan Kerucut 1', 1, 'Ayilesmana', '2024-11-28 20:55:39', 136, 1, 100000.00, 90000.00, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kategori_user` enum('cashier','manager','administrator','officer','monitoring') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `kategori_user`, `password`, `created_at`) VALUES
(1, 'Ayi Lesmana', 'Ayilesmana', 'ayilesmana1@gmail.com', 'monitoring', '$2y$10$l0icScsO50OKlGbGxXiXC.VBU4BxgkQdjT4pcFK0lH.wa.OWvEedS', '2024-11-16 15:09:16'),
(2, 'Uus suryana', 'UusSuryana', 'uussuryana1@gmail.com', 'cashier', '$2y$10$on9ge22l0GUXVlvWYhYjGe3G7AmwGOZdiVlQ0KiCvnITSygAQsdjy', '2024-11-16 15:13:39'),
(3, 'Nandang Suryana', 'NandangSuryana', 'NandangSuryana1@gmail.com', 'monitoring', '$2y$10$lh83xUIJlIG.prZuFskioOwI6oXI9AA15NYueAdn7G9T4mx0l95wq', '2024-11-16 15:46:51'),
(4, 'Uus suryana', 'Uus suryana', 'uussuryana@gmail.com', 'manager', '$2y$10$yaHTPLs.JR3ZGtwVdY4Ak.5ZLVKlieizKygyq5.DRqfFBkZOTJ5HS', '2024-11-17 06:10:49'),
(5, 'Admin', 'Admin Walini', 'Walini@gmail.com', 'administrator', '$2y$10$wLFD/QBoyPqeucp9jmgXt.MiZmLDk0xyr8DJBa6/yElR1lAcfbPXm', '2024-11-17 07:47:03'),
(7, 'Nandang Suryana', 'Nandang Suryana', 'Nandangsuryana@gmail.com', 'cashier', '$2y$10$c0QUzvyWfotIdkOEVBODveh33Ge7P3vD3bRbhsBuLaByDTUex81B6', '2024-11-22 12:52:21'),
(8, 'Ayi Lesmana', 'ayi lesmana', 'Ayilesmana@gmail.com', 'cashier', '$2y$10$evJnnfDLcF6d9OrQ8cizHe8IYwjz5NlaeEWNkKjHQfBuxWgyAOKAG', '2024-11-22 15:20:22'),
(9, 'Acajumhaya', 'Aca Jumhaya', 'acajumhaya1@gmail.com', 'monitoring', '$2y$10$dfzXinMnmkADIiHy9H9/i.2SBvYvJUsaaoiLS6zrhbEtEUkaRLpPu', '2024-11-22 16:16:48'),
(10, 'Adminwalini', 'Walini', 'walinioffice@gmail.com', 'manager', '$2y$10$SNUwClrcW.pbZTouPfiwruMBdB58d1KjePcrBi.e4Y4RUFLR9dCqa', '2024-11-22 16:17:32'),
(11, 'Aca Jumhaya', 'Acajumhaya', 'acajumhaya@gmail.com', 'cashier', '$2y$10$JxCt/t3q5KKEnYX2sOC8Iux9wq04Xn45AfZtxI6I10ti/9TLkLMxq', '2024-11-22 16:33:17'),
(12, 'Dede Komara', 'Dede komara', 'dedekomara616@gmail.com', 'monitoring', '$2y$10$kA7h1rCxjzudRTuKtDDoXOXogc1zz6daBkQfMM7k0Y93Gw4aMaLcO', '2024-11-22 16:34:15'),
(13, 'Elang kusumah', 'Elang kusumah', 'elangkusumah@gmail.com', 'manager', '$2y$10$WpfqpZstZWRheFlk2.mXOOGNvwSbhTSRsOyozz/swJ6QkxEcb6G7W', '2024-11-22 16:35:00'),
(14, 'Lia Kusliah', 'Lia Kusliah S.H', 'liakusliahSH@gmail.com', 'manager', '$2y$10$QkzoptTzKEIA8rcdjCUJNeBUPg4QslswQ0ZjLa/bgyzxCCHxgtAjK', '2024-11-22 16:35:38'),
(15, 'Diky', 'Diky', 'dikyiky12@gmail.com', 'manager', '$2y$10$RSx9Np6oUAZDv2ruMJaLmuC8oaN/AE6OgfrXNPlXPew5T7WXgiavm', '2024-11-22 16:36:10'),
(16, 'setiawan', 'setiawan', 'merouter@gmail.com', 'cashier', '$2y$10$Z6LG.WoIhAiPBbQ7guipjeyvRM1c3hUIc6ATxZsT99cInMGdwRSG2', '2024-11-22 16:36:45'),
(17, 'Budi Sadjawidjaya', 'Budi Sadjawidjaya', 'budisadjawidjaya@gmail.com', 'manager', '$2y$10$/39IWM3ya0J0/HMEUM3TqemmhZOQYyFh.BIloCLBilCH3.CF3Fcau', '2024-11-22 16:37:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id_discount`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_discount` (`id_discount`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_product_2` (`id_product`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_discount` (`id_discount`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id_discount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `discounts_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`id_discount`) REFERENCES `discounts` (`id_discount`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
