-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 04:25 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dblaptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan_tbl`
--

CREATE TABLE IF NOT EXISTS `binhluan_tbl` (
  `ma_bl` int(11) NOT NULL AUTO_INCREMENT,
  `ten_bl` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ma_bl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chitietbinhluan_tbl`
--

CREATE TABLE IF NOT EXISTS `chitietbinhluan_tbl` (
  `ma_ctbl` int(11) NOT NULL AUTO_INCREMENT,
  `ma_kh` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `ma_bl` int(11) NOT NULL,
  `ma_sp` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `ma_nv` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ma_ctbl`),
  KEY `ma_bl` (`ma_bl`),
  KEY `ma_sp` (`ma_sp`),
  KEY `ma_nv` (`ma_nv`),
  KEY `ma_kh` (`ma_kh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang_tbl`
--

CREATE TABLE IF NOT EXISTS `chitietdonhang_tbl` (
  `ma_ctdh` int(11) NOT NULL AUTO_INCREMENT,
  `ma_sp` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `ma_dh` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  PRIMARY KEY (`ma_ctdh`),
  KEY `ma_sp` (`ma_sp`),
  KEY `ma_dh` (`ma_dh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `danhmucsp_tbl`
--

CREATE TABLE IF NOT EXISTS `danhmucsp_tbl` (
  `ma_loai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tenloai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ma_loai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmucsp_tbl`
--

INSERT INTO `danhmucsp_tbl` (`ma_loai`, `tenloai`) VALUES
('LN', 'New'),
('LO', 'Old');

-- --------------------------------------------------------

--
-- Table structure for table `donhang_tbl`
--

CREATE TABLE IF NOT EXISTS `donhang_tbl` (
  `ma_dh` int(11) NOT NULL AUTO_INCREMENT,
  `ma_kh` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `ngaygiao` date NOT NULL,
  `diachigiao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chietkhau` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `ma_nv` int(11) NOT NULL,
  PRIMARY KEY (`ma_dh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `giaca_tbl`
--

CREATE TABLE IF NOT EXISTS `giaca_tbl` (
  `ma_giam` int(11) NOT NULL,
  `gia_giam` int(11) NOT NULL,
  PRIMARY KEY (`ma_giam`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaca_tbl`
--

INSERT INTO `giaca_tbl` (`ma_giam`, `gia_giam`) VALUES
(1, 0),
(2, 500),
(3, 750),
(4, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `giaodich_tbl`
--

CREATE TABLE IF NOT EXISTS `giaodich_tbl` (
  `ma_gd` int(11) NOT NULL AUTO_INCREMENT,
  `tinhtrang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tongtien` int(11) NOT NULL,
  `thanhtoan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `replay` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `thongtin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngaylap` date NOT NULL,
  `ma_dh` int(11) NOT NULL,
  `ma_kh` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ma_gd`),
  KEY `ma_dh` (`ma_dh`),
  KEY `ma_kh` (`ma_kh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang_tbl`
--

CREATE TABLE IF NOT EXISTS `khachhang_tbl` (
  `ma_kh` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `ten_kh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email_kh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password_kh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ma_kh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang_tbl`
--

INSERT INTO `khachhang_tbl` (`ma_kh`, `ten_kh`, `sdt`, `email_kh`, `password_kh`, `diachi`) VALUES
('KH1', 'Trần Văn An', '0903586356', 'antranvan@gmail.com', '123456', 'số 25 Nguyễn Hữu Thọ ,Quận 4 TPHCM'),
('KH2', 'Lê Kim Phương', '0120245798', 'phuonlekim@gmail.com', '234567', '123 Nguyễn Thị Thập, Quận 7 TP HCM');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien_tbl`
--

CREATE TABLE IF NOT EXISTS `nhanvien_tbl` (
  `ma_nv` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `ten_nv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_nv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password_nv` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phanquyen` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ma_nv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien_tbl`
--

INSERT INTO `nhanvien_tbl` (`ma_nv`, `ten_nv`, `email_nv`, `password_nv`, `phanquyen`) VALUES
('NV1', 'Trần Văn Hưng', 'hungtranvan@gmail.com', '123456', 'ADMIN'),
('NV2', 'Lưu Quốc Quan', 'luuquocquan@gmail.com', '345678', 'KTV');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham_tbl`
--

CREATE TABLE IF NOT EXISTS `sanpham_tbl` (
  `ma_sp` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `ma_loai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ten_sp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `anh_sp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gia_sp` int(11) NOT NULL,
  `thongso` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `thongtin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `baohanh` int(11) NOT NULL,
  `ma_giam` int(11) NOT NULL,
  PRIMARY KEY (`ma_sp`),
  KEY `ma_loai` (`ma_loai`),
  KEY `ma_giam_gia` (`ma_giam`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tintuc_tbl`
--

CREATE TABLE IF NOT EXISTS `tintuc_tbl` (
  `ma_tt` int(11) NOT NULL AUTO_INCREMENT,
  `tieude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` date NOT NULL,
  `ma_nv` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ma_tt`),
  KEY `ma_nv` (`ma_nv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietbinhluan_tbl`
--
ALTER TABLE `chitietbinhluan_tbl`
  ADD CONSTRAINT `FK_CT_Binh_Luan_Binh_Luan` FOREIGN KEY (`ma_bl`) REFERENCES `binhluan_tbl` (`ma_bl`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CT_Binh_Luan_Khach_Hang` FOREIGN KEY (`ma_kh`) REFERENCES `khachhang_tbl` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CT_Binh_Luan_Nhan_Vien` FOREIGN KEY (`ma_nv`) REFERENCES `nhanvien_tbl` (`ma_nv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CT_Binh_Luan_San_Pham` FOREIGN KEY (`ma_sp`) REFERENCES `sanpham_tbl` (`ma_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chitietdonhang_tbl`
--
ALTER TABLE `chitietdonhang_tbl`
  ADD CONSTRAINT `FK_CT_Don_Hang_Don_Hang` FOREIGN KEY (`ma_dh`) REFERENCES `donhang_tbl` (`ma_dh`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CT_Don_Hang_San_Pham` FOREIGN KEY (`ma_sp`) REFERENCES `sanpham_tbl` (`ma_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giaodich_tbl`
--
ALTER TABLE `giaodich_tbl`
  ADD CONSTRAINT `FK_Giao_Dich_Don_Hang` FOREIGN KEY (`ma_dh`) REFERENCES `donhang_tbl` (`ma_dh`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Giao_Dich_Khach_Hang` FOREIGN KEY (`ma_kh`) REFERENCES `khachhang_tbl` (`ma_kh`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `sanpham_tbl`
--
ALTER TABLE `sanpham_tbl`
  ADD CONSTRAINT `FK_San_Pham_Danh_Mucsp` FOREIGN KEY (`ma_loai`) REFERENCES `danhmucsp_tbl` (`ma_loai`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_San_Pham_Gia_Ca` FOREIGN KEY (`ma_giam`) REFERENCES `giaca_tbl` (`ma_giam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tintuc_tbl`
--
ALTER TABLE `tintuc_tbl`
  ADD CONSTRAINT `FK_Tin_Tuc_Nhan_Vien` FOREIGN KEY (`ma_nv`) REFERENCES `nhanvien_tbl` (`ma_nv`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
