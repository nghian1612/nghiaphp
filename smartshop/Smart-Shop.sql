-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2018 at 12:48 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `happyshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

DROP TABLE IF EXISTS `giohang`;
CREATE TABLE IF NOT EXISTS `giohang` (
  `maGiohang` int(10) NOT NULL AUTO_INCREMENT,
  `ma_kh` int(10) NOT NULL,
  `ngaynhan` date NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `Tong` int(10) NOT NULL,
  PRIMARY KEY (`maGiohang`),
  KEY `FK_gh_kh` (`ma_kh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `giohangchitiet`
--

DROP TABLE IF EXISTS `giohangchitiet`;
CREATE TABLE IF NOT EXISTS `giohangchitiet` (
  `maGiohangchitiet` int(10) NOT NULL AUTO_INCREMENT,
  `maGiohang` int(10) NOT NULL,
  `maSP` int(10) NOT NULL,
  `soLuong` int(20) NOT NULL,
  `Tong` float NOT NULL,
  PRIMARY KEY (`maGiohangchitiet`),
  KEY `FK_chitiet_sanpham` (`maSP`),
  KEY `FK_gh-ghdes` (`maGiohang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hinh`
--

DROP TABLE IF EXISTS `hinh`;
CREATE TABLE IF NOT EXISTS `hinh` (
  `Ma_Hinh` int(10) NOT NULL AUTO_INCREMENT,
  `tenHinh_sp` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  PRIMARY KEY (`Ma_Hinh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `ma_kh` int(10) NOT NULL AUTO_INCREMENT,
  `ten_kh` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  `email` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  `SDT` int(13) NOT NULL COMMENT 'chỉ nhập số, bắt buộc nhập',
  `diachi` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  `ngaysinh` date NOT NULL,
  `matkhau` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  PRIMARY KEY (`ma_kh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

DROP TABLE IF EXISTS `loaisp`;
CREATE TABLE IF NOT EXISTS `loaisp` (
  `ma_Loai` int(10) NOT NULL AUTO_INCREMENT,
  `ten_Loai` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  PRIMARY KEY (`ma_Loai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nsx`
--

DROP TABLE IF EXISTS `nsx`;
CREATE TABLE IF NOT EXISTS `nsx` (
  `maNSX` int(10) NOT NULL AUTO_INCREMENT,
  `Ten_NSX` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  `logo` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  PRIMARY KEY (`maNSX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `maSP` int(10) NOT NULL AUTO_INCREMENT,
  `tensp` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  `dongia` float DEFAULT NULL,
  `mota` varchar(200) NOT NULL DEFAULT 'NOT NULL',
  `Ma_Hinh` int(10) NOT NULL,
  `ma_Loai` int(10) NOT NULL,
  `maNSX` int(10) NOT NULL,
  `sanphammoi` bit(20) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`maSP`),
  KEY `FK_sp_hinh` (`Ma_Hinh`),
  KEY `FK_sp_loai` (`ma_Loai`),
  KEY `FK_sp_nxb` (`maNSX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `FK_gh_kh` FOREIGN KEY (`ma_kh`) REFERENCES `khachhang` (`ma_kh`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `giohangchitiet`
--
ALTER TABLE `giohangchitiet`
  ADD CONSTRAINT `FK_chitiet_sanpham` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_gh-ghdes` FOREIGN KEY (`maGiohang`) REFERENCES `giohang` (`maGiohang`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_sp_hinh` FOREIGN KEY (`Ma_Hinh`) REFERENCES `hinh` (`Ma_Hinh`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_sp_loai` FOREIGN KEY (`ma_Loai`) REFERENCES `loaisp` (`ma_Loai`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_sp_nxb` FOREIGN KEY (`maNSX`) REFERENCES `nsx` (`maNSX`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
