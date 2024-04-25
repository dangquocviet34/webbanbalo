-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2024 at 03:04 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbanbalo`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id_banner` int NOT NULL AUTO_INCREMENT,
  `name_banner` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `link_banner` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `name_banner`, `link_banner`) VALUES
(1, 'giảm giá các sản phẩm 30%', 'slideshow1.jpg'),
(2, 'commingsoon', 'slideshow2.jpg'),
(3, 'opening soon', 'slideshow3.jpg'),
(4, 'banner01', 'banner01.jpg'),
(5, 'banner1', 'banner1.png'),
(7, 'banner03', 'banner03.jpg'),
(9, 'banner05', 'banner05.jpg'),
(10, 'banner06', 'banner06.png');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `id_chitiet` int NOT NULL AUTO_INCREMENT,
  `chitiet_soluong` int NOT NULL,
  `chitiet_tonggia` decimal(10,0) NOT NULL,
  `id_sp` int NOT NULL,
  `id_donhang` int NOT NULL,
  PRIMARY KEY (`id_chitiet`),
  KEY `fk_idsp` (`id_sp`),
  KEY `fk_iddonhang` (`id_donhang`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id_chitiet`, `chitiet_soluong`, `chitiet_tonggia`, `id_sp`, `id_donhang`) VALUES
(12, 1, 276500, 24, 6),
(2, 1, 2099300, 18, 1),
(3, 2, 2558400, 20, 1),
(4, 1, 1279200, 20, 2),
(5, 1, 1279200, 20, 2),
(6, 6, 1659000, 24, 3),
(7, 1, 276500, 24, 3),
(8, 4, 0, 53, 2),
(9, 1, 0, 19, 4),
(10, 1, 1500000, 16, 2),
(11, 2, 1592000, 25, 5),
(13, 2, 0, 52, 6),
(14, 2, 0, 53, 7),
(15, 1, 0, 19, 7),
(16, 1, 0, 19, 6);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

DROP TABLE IF EXISTS `discount`;
CREATE TABLE IF NOT EXISTS `discount` (
  `id_discount` int NOT NULL AUTO_INCREMENT,
  `id_sanpham` int NOT NULL,
  `discount_value` decimal(10,2) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id_discount`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id_discount`, `id_sanpham`, `discount_value`, `start_date`, `end_date`, `description`) VALUES
(1, 16, 20.00, '2024-04-14 00:00:00', '2024-04-30 00:00:00', ''),
(2, 18, 30.00, '2024-04-14 00:00:00', '2024-04-30 00:00:00', ''),
(3, 20, 20.00, '2024-04-16 00:00:00', '2024-04-30 00:00:00', ''),
(4, 24, 30.00, '2024-04-18 00:00:00', '2024-04-30 00:00:00', ''),
(5, 25, 20.00, '2024-04-16 00:00:00', '2024-04-30 00:00:00', ''),
(6, 28, 30.00, '2024-04-18 00:00:00', '2024-04-30 00:00:00', ''),
(7, 29, 20.00, '2024-04-13 00:00:00', '2024-04-30 00:00:00', ''),
(8, 28, 30.00, '2024-04-18 00:00:00', '2024-04-30 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `transaction_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `slspdh` int NOT NULL DEFAULT '0',
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `status` tinyint NOT NULL DEFAULT '0',
  `Ngay_dat_hang` datetime NOT NULL,
  `id_user` int NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`transaction_id`, `id`, `slspdh`, `amount`, `status`, `Ngay_dat_hang`, `id_user`, `address`) VALUES
(0, 1, 3, 6197000.00, 1, '2023-11-05 08:32:56', 26, '0'),
(0, 2, 7, 13833000.00, 1, '2023-10-18 15:55:11', 26, '0'),
(0, 3, 7, 2765000.00, 0, '2023-09-27 15:55:11', 0, NULL),
(0, 4, 1, 2200000.00, 0, '2023-08-22 15:56:40', 0, NULL),
(0, 5, 2, 1990000.00, 0, '2023-10-31 15:56:40', 27, '0'),
(0, 6, 4, 7393000.00, 0, '2023-07-18 15:57:19', 0, NULL),
(0, 7, 3, 6580000.00, 1, '2023-08-22 22:50:01', 27, '0');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giaodich`
--

DROP TABLE IF EXISTS `giaodich`;
CREATE TABLE IF NOT EXISTS `giaodich` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `status` tinyint NOT NULL DEFAULT '0',
  `user_id` int NOT NULL DEFAULT '0',
  `user_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `user_phone` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `amount` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `p\ayment` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `payment_info` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `created` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

DROP TABLE IF EXISTS `logo`;
CREATE TABLE IF NOT EXISTS `logo` (
  `id_logo` int NOT NULL AUTO_INCREMENT,
  `name_logo` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `image_logo` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_logo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id_logo`, `name_logo`, `image_logo`) VALUES
(1, 'logo web bán hàng', '/images/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_catalog` int NOT NULL AUTO_INCREMENT,
  `name_menu` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `invalid_menu` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`id_catalog`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_catalog`, `name_menu`, `invalid_menu`) VALUES
(25, 'Túi xách', 'tui-xach'),
(26, 'Balo', 'balo'),
(27, 'Ví Bóp', 'vi-bop');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `rule_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `rule_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 22),
(23, 1, 23),
(24, 1, 24),
(25, 1, 25),
(26, 1, 26),
(27, 1, 27),
(28, 1, 28),
(29, 1, 29),
(30, 1, 30),
(31, 1, 31),
(32, 1, 32),
(33, 2, 1),
(34, 2, 2),
(35, 2, 3),
(36, 2, 4),
(37, 2, 5),
(38, 2, 6),
(39, 2, 7),
(40, 2, 8),
(41, 2, 9),
(42, 2, 10),
(43, 2, 11),
(44, 2, 12),
(45, 2, 13),
(46, 2, 14),
(47, 2, 15),
(48, 2, 16),
(49, 2, 17),
(50, 2, 18),
(51, 2, 19),
(52, 2, 20),
(53, 2, 21),
(54, 2, 22),
(55, 2, 23),
(56, 2, 24),
(57, 2, 25),
(58, 2, 26),
(59, 2, 27),
(60, 2, 28),
(61, 2, 29),
(62, 2, 30),
(63, 2, 31),
(64, 2, 32),
(65, 3, 1),
(66, 3, 2),
(67, 3, 3),
(68, 3, 4),
(69, 3, 5),
(70, 3, 6),
(71, 3, 7),
(72, 3, 8),
(73, 3, 9),
(74, 3, 10),
(75, 3, 11),
(76, 3, 12),
(77, 3, 13),
(78, 3, 14),
(79, 3, 15),
(80, 3, 16),
(81, 3, 17),
(82, 3, 18),
(83, 3, 19),
(84, 3, 20),
(85, 3, 21),
(86, 3, 22),
(87, 3, 23);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phiship`
--

DROP TABLE IF EXISTS `phiship`;
CREATE TABLE IF NOT EXISTS `phiship` (
  `loaitinh_id` int NOT NULL AUTO_INCREMENT,
  `tentinhthanh` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `loaitinh` bit(1) NOT NULL,
  `phivanchuyen` decimal(10,2) NOT NULL,
  PRIMARY KEY (`loaitinh_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `phiship`
--

INSERT INTO `phiship` (`loaitinh_id`, `tentinhthanh`, `loaitinh`, `phivanchuyen`) VALUES
(1, 'Nội thành', b'0', 15000.00),
(2, 'Ngoại thành', b'1', 50000.00);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dateofbirth` date DEFAULT NULL,
  `gender` tinyint DEFAULT NULL,
  `address` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `province_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` date NOT NULL,
  `level` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `dateofbirth`, `gender`, `address`, `province_id`, `user_id`, `created_at`, `level`) VALUES
(1, '0000-00-00', 0, 'Thủ Đức', 124, 1, '2024-01-04', 99),
(2, '0000-00-00', 1, 'Thạnh Phú', 73, 2, '2024-11-05', 99),
(3, '2003-01-01', 0, 'Thủ Đức', 124, 1, '2024-01-04', 99);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `type`) VALUES
(119, 'Thai Binh', 2),
(118, 'Tay Ninh', 2),
(117, 'Son La', 2),
(116, 'Soc Trang', 2),
(115, 'Quang Tri', 2),
(114, 'Quang Ninh', 2),
(113, 'Quang Ngai', 2),
(112, 'Quang Nam', 2),
(111, 'Quang Binh', 2),
(110, 'Phu Yen', 2),
(109, 'Phu Tho', 2),
(108, 'Ninh Thuan', 2),
(107, 'Ninh Binh', 2),
(106, 'Nghe An', 2),
(105, 'Nam Dinh', 2),
(104, 'Long An', 2),
(103, 'Lao Cai', 2),
(102, 'Lang Son', 2),
(101, 'Lam Dong', 2),
(100, 'Lai Chau', 2),
(99, 'Kon Tum', 2),
(98, 'Kien Giang', 2),
(97, 'Khanh Hoa', 2),
(96, 'Hung Yen', 2),
(95, 'Hoa Binh', 2),
(94, 'Hau Giang', 2),
(93, 'Hai Phong', 2),
(92, 'Hai Duong', 2),
(91, 'Ha Tinh', 2),
(90, 'Ha Noi', 1),
(89, 'Ha Nam', 2),
(88, 'Ha Giang', 2),
(87, 'Gia Lai', 2),
(86, 'Dong Thap', 2),
(85, 'Dong Nai', 2),
(84, 'Dien Bien', 2),
(83, 'Dak Nong', 2),
(82, 'Dak Lak', 2),
(81, 'Da Nang', 2),
(80, 'Cao Bang', 2),
(79, 'Can Tho', 2),
(78, 'Ca Mau', 2),
(77, 'Binh Thuan', 2),
(76, 'Binh Phuoc', 2),
(75, 'Binh Duong', 2),
(74, 'Binh Dinh', 2),
(73, 'Ben Tre', 2),
(72, 'Bac Ninh', 2),
(71, 'Bac Lieu', 2),
(70, 'Bac Kan', 2),
(69, 'Bac Giang', 2),
(68, 'Ba Ria - Vung Tau', 2),
(67, 'An Giang', 2),
(120, 'Thai Nguyen', 2),
(121, 'Thanh Hoa', 2),
(122, 'Thua Thien Hue', 2),
(123, 'Tien Giang', 2),
(124, 'Thanh pho Ho Chi Minh', 1),
(125, 'Tra Vinh', 2),
(126, 'Tuyen Quang', 2),
(127, 'Vinh Long', 2),
(128, 'Vinh Phuc', 2),
(129, 'Yen Bai', 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `type`, `description`) VALUES
(1, 'admin', 'Admin'),
(2, 'moderator', 'Moderator'),
(3, 'user', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

DROP TABLE IF EXISTS `rules`;
CREATE TABLE IF NOT EXISTS `rules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `type`, `description`) VALUES
(1, 'USERS_CREATE', 'Can Create User & List'),
(2, 'USERS_READ', 'Can Read User & List'),
(3, 'USERS_UPDATE', 'Can Update User & List'),
(4, 'USERS_DELETE', 'Can Delete User & List'),
(5, 'PRODUCTS_CREATE', 'Can Create Product & List'),
(6, 'PRODUCTS_READ', 'Can Read Product & List'),
(7, 'PRODUCTS_UPDATE', 'Can Update Product & List'),
(8, 'PRODUCTS_DELETE', 'Can Delete Product & List'),
(9, 'PROMOTION_CREATE', 'Can Create Promotion & List'),
(10, 'PROMOTION_READ', 'Can Read Promotion & List'),
(11, 'PROMOTION_UPDATE', 'Can Update Promotion & List'),
(12, 'PROMOTION_DELETE', 'Can Delete Promotion & List'),
(13, 'DASHBOARD_CREATE', 'Can Create Dashboard & List'),
(14, 'DASHBOARD_READ', 'Can Read Dashboard & List'),
(15, 'DASHBOARD_UPDATE', 'Can Update Dashboard & List'),
(16, 'DASHBOARD_DELETE', 'Can Delete Dashboard & List'),
(17, 'SETTINGS_CREATE', 'Can Create Settings & List'),
(18, 'SETTINGS_READ', 'Can Read Settings & List'),
(19, 'SETTINGS_UPDATE', 'Can Update Settings & List'),
(20, 'SETTINGS_DELETE', 'Can Delete Settings & List'),
(21, 'REPORT_CREATE', 'Can Create Report'),
(22, 'REPORT_READ', 'Can Read Report'),
(23, 'REPORT_UPDATE', 'Can Update Report'),
(24, 'REPORT_DELETE', 'Can Delete Report'),
(25, 'ROLES_CREATE', 'Can Create Roles'),
(26, 'ROLES_READ', 'Can Read Roles'),
(27, 'ROLES_UPDATE', 'Can Update Roles'),
(28, 'ROLES_DELETE', 'Can Delete Roles'),
(29, 'RULES_CREATE', 'Can Create Rules'),
(30, 'RULES_READ', 'Can Read Rules'),
(31, 'RULES_UPDATE', 'Can Update Rules'),
(32, 'RULES_DELETE', 'Can Delete Rules');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `id_sanpham` int NOT NULL AUTO_INCREMENT,
  `id_catalog` int NOT NULL,
  `id_sub` int NOT NULL,
  `tensp` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `code_product` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `content` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `discount` int DEFAULT NULL,
  `image_sp` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `created` date DEFAULT NULL,
  `view` int DEFAULT '0',
  `xuatxu` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `sizess` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `mausac` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `parent_name_menu` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `parent_name_sub` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `discount_total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_sanpham`),
  KEY `id_catalog` (`id_catalog`),
  KEY `id_catalog_2` (`id_catalog`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `id_catalog`, `id_sub`, `tensp`, `code_product`, `price`, `description`, `content`, `discount`, `image_sp`, `created`, `view`, `xuatxu`, `sizess`, `mausac`, `parent_name_menu`, `parent_name_sub`, `status`, `discount_total`) VALUES
(16, 25, 2, 'Túi đeo chéo hình thang Philomena Puffy - Kem', '0101', 1875000.0000, '', NULL, 0, 'tui-deo-cheo-1.png', '2023-10-28', 0, 'Mỹ', 'L', 'Kem', 'túi xách', '', 1, 1500000.00),
(18, 25, 3, 'Túi xách hobo da thật dáng cong Elongated - Đen\r\n', '0176', 2999000.0000, NULL, NULL, NULL, 'tui-xach-1.png', NULL, 0, 'Mỹ', 'M', 'Đen', 'túi xách', '', 1, 2099300.00),
(19, 25, 3, 'Túi đeo vai nữ da thật phom nửa hình tròn Swing Padlock - Màu Be', '0075', 2200000.0000, NULL, 'Những chi tiết sắc sảo có thể biến những chiếc túi cổ điển trở nên nổi bật và chiếc túi Swing hình lưỡi liềm này là một ví dụ điển hình. Lớp hoàn thiện tông màu be vượt thời gian đi kèm với phần cứng tông vàng, chẳng hạn như chi tiết ổ khóa trên khóa kéo, dây đeo chuỗi xích, giúp tăng thêm vẻ sáng bóng và bắt mắt để thu hút mọi ánh nhìn. Được trang bị khóa kéo mở ra không gian bên trong rộng rãi, chiếc túi này sẽ chứa được nhiều vật dụng cần thiết của bạn. Với kết cấu chần bông sang trọng và những đường nét tinh tế, hãy để chiếc túi xinh xắn này đồng hành cùng bạn trong tất cả các dịp.', NULL, 'tui-xach-2.png', NULL, 0, 'Việt Nam', 'M,L', 'Be', 'túi xách', '', 1, 2200000.00),
(20, 25, 1, 'Túi đeo vai dáng cong Trice Metallic Accent Belted - Noir', '0185', 1599000.0000, NULL, NULL, NULL, 'tui-xach-tay-1.png', NULL, 0, 'Việt Nam', 'S', 'Đen', 'túi xách', '', 1, 1279200.00),
(21, 25, 3, 'Túi đeo vai nữ da thât phom nửa hình tròn Swing Padlock - Nhiều màu', '0081', 2905000.0000, NULL, 'Cá tính và sang trọng, chiếc túi Swing hình lưỡi liềm này chắc chắn sẽ tạo được ấn tượng mạnh. Họa tiết nhỏ giọt sắc sảo là tâm điểm của chiếc túi, được đặt trên nền đen để tạo sự tương phản thú vị. Bên cạnh phần cứng tông màu bạc, chi tiết ổ khóa, dây đeo dạng chuỗi táo bạo tạo thêm điểm nhấn cho những đường cong mềm mại của chiếc túi có hình dáng lưỡi liềm. Để tạo ấn tượng, hãy kết hợp túi với phụ kiện màu bạc và boots đế bệt màu đen.', NULL, 'tui-xach-3.png ', NULL, 0, 'Hàn Quốc', 'L,XL', 'Vàng, Đen, Be', 'túi xách', '', 1, 2905000.00),
(22, 27, 4, 'Ví Este Belted Quilted - Be', '0145', 1395000.0000, NULL, NULL, NULL, 'vi-1.png', NULL, 0, 'Mỹ', 'S', 'Be', 'túi xách', '', 1, 1395000.00),
(23, 27, 5, 'Ví dự tiệc dài phối dây đeo Tallulah Metallic - Hồng burgundy', '0035', 625000.0000, NULL, 'Nắm bắt phong cách lãng mạn của mùa thu với chiếc ví có khóa đẩy kim loại Tallulah. Phần cứng có tông màu vàng nổi bật trên nền ví màu đỏ tía quyến rũ, thiết kế khóa đẩy giúp tăng thêm sự thú vị về mặt hình ảnh đồng thời giữ an toàn cho tất cả các vật dụng có giá trị bên trong. Để thuận tiện khi di chuyển nhiều, hãy biến nó thành một chiếc túi đeo chéo siêu nhỏ với dây đeo dạng chuỗi có thể tháo rời cực kỳ tiện dụng.', NULL, 'vi-4.png', NULL, 0, 'Mỹ', 'M', 'Hồng burgundy', 'balo -ví', '', 1, 625000.00),
(24, 27, 4, 'Ví cầm tay nữ chữ nhật Micaela Quilted Phone - Nhiều màu', '0145', 395000.0000, NULL, 'Thành phần chất liệu: Faux leather\r\n\r\nKiểu dáng ví cầm tay nữ phom chữ nhật dáng dài thời trang\r\n\r\nNắp gập đơn giản\r\n\r\nChốt cài kim loại cao cấp\r\n\r\nThiết kế chần bông tinh tế, đẹp mắt\r\n\r\nPhối dây đeo vai chuỗi xích bản nhỏ, có thể tháo rời\r\n\r\nMàu sắc hiện đại, tinh tế, phù hợp để diện nhiều trang phục khác nhau\r\n\r\nKích thước: D3.2 x W19 x H10 (cm)\r\n\r\nXuất xứ thương hiệu: Singapore', NULL, 'vi-2.png', NULL, 0, 'Mỹ', 'S', '', 'balo -ví', '', 1, 276500.00),
(25, 27, 4, 'Ví ngắn Snap Button - Đen', '0145', 995000.0000, 'Hãy tạm rời xa những chiếc ví cồng kềnh và lựa chọn những chiếc ví nhỏ gọn, linh hoạt để có thể cho vào túi áo khoác của bạn khi đi ra ngoài. Hoàn thiện bằng tông màu đen linh hoạt, chiếc ví này sẽ dễ dàng phối với mọi loại trang phục và phục kiện khác nhau. Ngoài ra, ví được trang bị khóa zip tiện dụng giúp bạn có thể bảo quản mọi vật dụng bên trong an toàn.', NULL, NULL, 'vi-3.png', NULL, 0, 'Mỹ', 'M', 'Đen', 'balo -ví', '', 1, 796000.00),
(26, 27, 5, 'Ví Dự Tiệc CLU - Màu Bạc', '0028', 1199000.0000, NULL, NULL, NULL, 'vi5.jpg', NULL, 0, NULL, NULL, NULL, 'balo -ví', '', 1, 1199000.00),
(27, 25, 0, 'Túi Xách Da Thật SAT - Màu Đỏ', '0154', 2199000.0000, NULL, NULL, NULL, 'tui-xach-5.jpg', NULL, 0, NULL, NULL, NULL, 'balo -ví', '', 1, 2199000.00),
(28, 25, 3, 'Túi Xách Da Thật SAT - Màu Be', '0155', 1999000.0000, NULL, NULL, NULL, 'tui-xach-6.jpg', NULL, 0, NULL, NULL, NULL, 'balo -ví', '', 1, 1399300.00),
(52, 25, 1, 'Túi xách hình thang Cocoon Curved - Noir', '0185', 2399000.0000, NULL, NULL, NULL, 'tui-xach-tay-2.png', NULL, 0, 'Việt Nam', 'M', 'Đen', 'túi xách', '', 1, 2399000.00),
(53, 25, 3, 'Túi xách hobo hình thang Buzz - Trắng', '0081', 2190000.0000, NULL, 'Một chiếc túi hoàn hảo là phải vừa phong cách vừa tiện dụng, và chiếc túi hobo Buzz này đáp ứng được điều đó. Phom túi hình thang với khóa nam châm tiện dụng, mở ra không gian bên trong rộng rãi có thể chứa tất cả những vật dụng cần thiết của bạn và hơn thế nữa. Hoàn thiện bằng tông màu trắng trang nhã, nó sẽ dễ dàng kết hợp với nhiều loại trang phục và nâng tầm bất kỳ diện mạo nào của bạn. Ngoài ra, túi còn đi kèm dây đeo có thể điều chỉnh, bạn có thể dễ dàng tùy chỉnh độ dài để phù hợp với vóc dáng và sở thích của mình.', NULL, 'tui-xach-4.png ', NULL, 0, 'Mỹ ', 'L', 'Trắng', 'túi xách', '', 1, 2190000.00),
(54, 25, 1, 'Túi đeo vai dáng cong Anthea Hobo - Đen\r\n', '0185', 1599000.0000, NULL, 'Bạn đang tìm kiếm một người bạn đồng hành mới mẻ và phong cách, không đâu khác ngoài chiếc túi hobo Anthea đẹp mắt này. Với kiểu dáng linh hoạt và gu thẩm mỹ cao, chiếc túi màu đen cổ điển này sẽ dễ dàng bổ sung cho bất kỳ bộ trang phục nào trong tủ đồ của bạn. Tay cầm cong và kiểu dáng mềm mại, thoải mái là những thiết kế đặc trưng của phong cách túi hobo thuần túy. Thiết kế nhiều ngăn nhỏ phía trước giúp bạn có thể tùy ý sắp xếp những vật dụng cá nhân một cách thuận tiện nhất. Ngăn chính được bảo vệ bằng khóa kéo, đảm bảo độ an toàn và bảo mật cho những đồ đạc quan trọng. Dù đeo trên vai hay cầm trên tay, nó đều toát lên vẻ sang trọng và mang hơi hưởng của phong cách Y2K.', NULL, 'tui-xach-5.png', NULL, 0, 'Việt Nam', 'M', 'Đen', 'túi xách', '', 1, 1599000.00),
(57, 26, 7, 'Balo Heys Balo Super Tots Spinner Bumble Bee S Yellow', '0124', 600000.0000, 'Chất liệu cao cấp, bền đẹp\r\n\r\n- Chất liệu Polycarbonate composite mang đến độ bền cao, an toàn cho trẻ khi sử dụng\r\n\r\n- Tay cầm chắc chắn cùng đệm lưng thoáng khí \r\n\r\nThiết kế tiện lợi\r\n\r\n- Thiết kế nhỏ gọn giúp trẻ dễ dàng di chuyển trong suốt hành trình\r\n\r\n- Trang bị thêm đai gắn vali phía sau tạo sự thoải mái cho bé khi phải di chuyển liên tục\r\n\r\nMàu sắc tươi sáng, trendy\r\n\r\n- Họa tiết trong sáng, dễ thương vô cùng nổi bật ', NULL, 0, 'balo_con_ong.jpg', NULL, 0, 'Canada', NULL, NULL, '', '', 1, 600000.00),
(56, 26, 7, 'Balo Herschel City Eco Mid Volume Backpack S Ash Rose', '0123', 2499000.0000, 'Đơn giản nhưng không đơn điệu - City Mid Volume giữ mọi thứ ở mức tối giản, hạn chế tất cả sự rườm rà, hướng đến sự thanh lịch, tinh tế trong từng chi tiết nhỏ nhất. \r\n\r\nTương thích với dòng MacBook/Laptop kích thước 14 inch\r\n\r\nDây đeo nam châm gắn chặt với khoá kim loại\r\n\r\nChất liệu vải 100% Fabric tái chế thân thiện với môi trường\r\n\r\nDây đeo vai mỏng, điều chỉnh tuỳ ý\r\n\r\n', NULL, 0, 'balo-unicorn.jpg', NULL, 0, 'Canada', NULL, NULL, '', '', 1, 2499000.00);

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

DROP TABLE IF EXISTS `sub_menu`;
CREATE TABLE IF NOT EXISTS `sub_menu` (
  `id_sub` int NOT NULL AUTO_INCREMENT,
  `name_sub` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ivalid_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `id_catalog` int NOT NULL,
  PRIMARY KEY (`id_sub`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id_sub`, `name_sub`, `ivalid_name`, `id_catalog`) VALUES
(1, 'Túi xách tay', 'tui-xach-tay', 25),
(2, 'Túi đeo chéo', 'tui-deo-cheo', 25),
(3, 'Túi xách da thật', 'tui-xach-da-that', 25),
(4, 'Ví cầm tay', '#', 27),
(5, 'Ví dự tiệc', '#', 27),
(6, 'Balo laptop', 'ba-lo-laptop', 26),
(7, 'Balo trẻ em ', 'ba-lo-tre-em', 26),
(8, 'Balo du lịch', 'ba-lo-du-lich', 26),
(9, 'Balo đi học ', 'ba-lo-di-hoc', 26);

-- --------------------------------------------------------

--
-- Table structure for table `trangthaidonhang`
--

DROP TABLE IF EXISTS `trangthaidonhang`;
CREATE TABLE IF NOT EXISTS `trangthaidonhang` (
  `id_status` int NOT NULL,
  `Trang_thai` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trangthaidonhang`
--

INSERT INTO `trangthaidonhang` (`id_status`, `Trang_thai`) VALUES
(0, 'Đã hủy'),
(1, 'Đã giao hàng'),
(2, 'Đang xử lý');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fullname` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `remember_token`, `email`, `email_verified_at`, `created_at`, `updated_at`, `phone`, `fullname`, `role_id`, `status`, `address`, `photo`) VALUES
(1, 'admin', '', NULL, 'admin2k3@yopmail.com', NULL, NULL, NULL, '0123456789', 'Web Administator', 1, 1, '0', ''),
(2, 'baoxuyen', '', NULL, 'baoxuyen1608@yopmail.com', NULL, NULL, NULL, '0365368222', 'Vo Thi Bao Xuyen', 1, 1, '0', ''),
(25, 'quocviet', '', NULL, 'dangquocviet34@yopmail.com', NULL, NULL, NULL, '0987654321', 'Dang Quoc Viet', 1, 1, '0', ''),
(4, 'moderator', '', NULL, 'moderator2k3@yopmail.com', NULL, NULL, NULL, '0123456289', 'Web Moderator', 2, 1, '0', ''),
(26, 'user', '', NULL, 'normaluser2k3@yopmail.com', NULL, NULL, NULL, '0123456788', 'Web User', 3, 1, '0', ''),
(27, 'user2', '', NULL, 'deactivateduser2k3@yopmail.com', NULL, NULL, NULL, '0123456889', 'Deactivated User', 3, 0, '0', ''),
(28, 'Huy Dang', '$2y$10$GeYjAwyJi28aGbnWhHROn.JeF0TEChB4XaFSc58t0DERDud5iw3mm', NULL, 'nvviet124@gmail.com', NULL, '2024-04-22 15:35:50', '2024-04-22 15:35:50', '0787863448', NULL, NULL, NULL, 'àdsdsd', '28.png'),
(29, 'Huy Dang', '$2y$10$wD2NS2s5IvrFOkDVL0P.d.a1UmkjhPxZeWXN71jXZrePZFmNe65Wq', NULL, 'dqviet142@gmail.com', NULL, '2024-04-24 07:54:54', '2024-04-24 07:54:54', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham` ADD FULLTEXT KEY `name` (`tensp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
