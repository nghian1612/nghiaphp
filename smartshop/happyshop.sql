-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 06:54 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `giohang` (
  `maGiohang` int(10) NOT NULL,
  `ma_kh` int(10) NOT NULL,
  `ngaynhan` date NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `Tong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `giohangchitiet`
--

CREATE TABLE `giohangchitiet` (
  `maGiohangchitiet` int(10) NOT NULL,
  `maGiohang` int(10) NOT NULL,
  `maSP` int(10) NOT NULL,
  `soLuong` int(20) NOT NULL,
  `Tong` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hinh`
--

CREATE TABLE `hinh` (
  `Ma_Hinh` int(10) NOT NULL,
  `tenHinh_sp` varchar(50) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `ma_kh` int(10) NOT NULL,
  `ten_kh` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  `matkhau` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  `kichhoat` tinytext NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`ma_kh`, `ten_kh`, `matkhau`, `kichhoat`, `hinh`, `email`) VALUES
(22, 'nghia', '1234', '0', '../view/assets/upload/1542783891exx.jpg', 'nghian1612@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `ma_Loai` int(10) NOT NULL,
  `ten_Loai` varchar(50) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nsx`
--

CREATE TABLE `nsx` (
  `maNSX` int(10) NOT NULL,
  `Ten_NSX` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  `logo` varchar(50) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `maSP` int(10) NOT NULL,
  `tensp` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  `dongia` float DEFAULT NULL,
  `giamgia` double NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `ngaynhap` date NOT NULL,
  `luotxem` int(20) NOT NULL,
  `mota` varchar(200) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`maGiohang`),
  ADD KEY `FK_gh_kh` (`ma_kh`);

--
-- Indexes for table `giohangchitiet`
--
ALTER TABLE `giohangchitiet`
  ADD PRIMARY KEY (`maGiohangchitiet`),
  ADD KEY `FK_chitiet_sanpham` (`maSP`),
  ADD KEY `FK_gh-ghdes` (`maGiohang`);

--
-- Indexes for table `hinh`
--
ALTER TABLE `hinh`
  ADD PRIMARY KEY (`Ma_Hinh`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`ma_Loai`);

--
-- Indexes for table `nsx`
--
ALTER TABLE `nsx`
  ADD PRIMARY KEY (`maNSX`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `maGiohang` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giohangchitiet`
--
ALTER TABLE `giohangchitiet`
  MODIFY `maGiohangchitiet` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hinh`
--
ALTER TABLE `hinh`
  MODIFY `Ma_Hinh` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `ma_kh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `ma_Loai` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nsx`
--
ALTER TABLE `nsx`
  MODIFY `maNSX` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
