-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 25, 2022 lúc 12:41 PM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlav`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baihoc`
--

DROP TABLE IF EXISTS `baihoc`;
CREATE TABLE IF NOT EXISTS `baihoc` (
  `MaBH` int(10) NOT NULL AUTO_INCREMENT,
  `TenBH` varchar(500) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`MaBH`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `baihoc`
--

INSERT INTO `baihoc` (`MaBH`, `TenBH`) VALUES
(1, 'hello'),
(2, 'Good morning'),
(3, 'Working'),
(5, 'Nature');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baitap`
--

DROP TABLE IF EXISTS `baitap`;
CREATE TABLE IF NOT EXISTS `baitap` (
  `MaBT` int(10) NOT NULL AUTO_INCREMENT,
  `MaBH` int(10) NOT NULL,
  `TV` varchar(500) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `TA` varchar(500) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`MaBT`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `baitap`
--

INSERT INTO `baitap` (`MaBT`, `MaBH`, `TV`, `TA`) VALUES
(1, 1, 'chào buổi sáng', 'good morning'),
(2, 1, 'tôi đến trường\r\n', 'i go to school'),
(3, 1, 'tôi uống sữa', 'i drink milk'),
(4, 1, 'Đây là con mèo', 'This is a cat'),
(5, 2, 'Bạn khỏe không ?', 'How are you ?');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `MaND` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `TK` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MK` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`MaND`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`MaND`, `Name`, `Email`, `TK`, `MK`) VALUES
(57, 'JojoA', 'meme@gmail.com', 'pugasus', 'd25fd633f5e243bc2c09961e9067755b');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
