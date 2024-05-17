-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 06:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_isd`
--

-- --------------------------------------------------------

--
-- Table structure for table `baolanh`
--

CREATE TABLE `baolanh` (
  `mhv` text DEFAULT NULL,
  `ten` varchar(50) NOT NULL,
  `quan_he` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `dia_chi_bl` varchar(100) NOT NULL,
  `sdt_bl` varchar(12) NOT NULL,
  `ho_khau_bl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baolanh`
--

INSERT INTO `baolanh` (`mhv`, `ten`, `quan_he`, `dob`, `dia_chi_bl`, `sdt_bl`, `ho_khau_bl`) VALUES
('T12424018', '21312312', '', '0012-02-13', '', '321312', ''),
('T12424019', 'bbb', 'cha con', '2024-04-10', 'bbb', '1111', 'bbb'),
('T12424020', '123123', '', '2024-05-02', '', '123123', ''),
('T12424001', '123123', '', '2024-04-10', '', '123123', ''),
('T12424001', '123123', '', '2024-04-15', '', '123123', ''),
('T12424001', '123123', '', '2024-04-23', '', '123123', ''),
('T12424001', '123123', '', '2024-04-08', '', '123123', ''),
('T12424003', '123123', '', '2024-04-16', '', '123123', ''),
('T12424002', '123123', '', '2024-04-10', '', '123123', ''),
('T32424001', '123123', '', '2024-04-11', '', '123123', ''),
('T12424005', 'dasdas', '', '2024-04-13', '', '321', ''),
('T12424006', 'dasdas', '', '2024-04-19', '', '321', ''),
('T12424007', 'dasdas', '', '2024-04-17', '', '321', ''),
('T12424008', 'dasdas', '', '2024-04-18', '', '321', ''),
('T12424009', 'dasdas', '', '2024-04-11', '', '321', ''),
('T12424010', 'dasdas', '', '2024-04-18', '', '321', ''),
('T12424001', 'dasdas', '', '2024-04-11', '', '321', ''),
('T12424002', 'dasdas', '', '2024-05-17', '', '321', ''),
('T12424001', 'dasdas', '', '2024-05-10', '', '321', ''),
('T12424004', 'cvb', '', '2024-05-09', '', '1313', ''),
('T12424005', 'vcc', '', '2024-05-04', '', '1313', ''),
('T12424006', 'vcc', '', '2024-05-08', '', '1313', ''),
('T32424002', 'Khá Bảnh', 'anh trai', '2024-05-24', 'đâu đó trên trái đất này', '2222', 'gò vấp'),
('DD2424001', 'Khá Bảnh', 'anh trai', '2024-05-09', 'đâu đó trên trái đất này', '2222', 'gò vấp'),
('DD2424002', 'Khá Bảnh', 'anh trai', '2024-05-08', 'đâu đó trên trái đất này', '2222', 'gò vấp'),
('T32424003', 'Khá Bảnh', 'anh trai', '2024-05-08', 'đâu đó trên trái đất này', '2222', 'gò vấp'),
('T12424007', 'Khá Bảnh', 'anh trai', '2024-05-08', 'đâu đó trên trái đất này', '2222', 'gò vấp');

-- --------------------------------------------------------

--
-- Table structure for table `bin_order`
--

CREATE TABLE `bin_order` (
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `mdh` varchar(7) NOT NULL,
  `ten_dh` varchar(20) NOT NULL,
  `ngay_xc` date DEFAULT NULL,
  `ngay_vn` date NOT NULL,
  `hinh_thuc_tt` varchar(255) DEFAULT NULL,
  `so_luong_tuyen` int(100) NOT NULL,
  `yeu_cau` varchar(100) DEFAULT NULL,
  `luong_co_ban` varchar(30) NOT NULL,
  `luong_thuc_te` varchar(30) NOT NULL,
  `che_do_phu_cap` varchar(255) DEFAULT NULL,
  `du_kien_tt` date DEFAULT NULL,
  `trang_thai` varchar(255) DEFAULT NULL,
  `nghiep_doan` varchar(50) NOT NULL,
  `xi_nghiep` varchar(20) NOT NULL,
  `nganh_nghe` varchar(20) NOT NULL,
  `sl_nam` int(20) NOT NULL,
  `sl_nu` int(20) NOT NULL,
  `do_tuoi_nam` varchar(20) NOT NULL,
  `do_tuoi_nu` varchar(20) NOT NULL,
  `type_hv` varchar(2) NOT NULL,
  `ngay_tt` date DEFAULT NULL,
  `noi_lv` varchar(80) NOT NULL,
  `lv_theo_ngay` int(24) NOT NULL,
  `lv_theo_tuan` int(50) NOT NULL,
  `nghi` int(24) NOT NULL,
  `ghi_chu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bin_order`
--

INSERT INTO `bin_order` (`created_at`, `mdh`, `ten_dh`, `ngay_xc`, `ngay_vn`, `hinh_thuc_tt`, `so_luong_tuyen`, `yeu_cau`, `luong_co_ban`, `luong_thuc_te`, `che_do_phu_cap`, `du_kien_tt`, `trang_thai`, `nghiep_doan`, `xi_nghiep`, `nganh_nghe`, `sl_nam`, `sl_nu`, `do_tuoi_nam`, `do_tuoi_nu`, `type_hv`, `ngay_tt`, `noi_lv`, `lv_theo_ngay`, `lv_theo_tuan`, `nghi`, `ghi_chu`) VALUES
('2024-05-17 01:03:39', 'T124013', '2131231', '0000-00-00', '0000-00-00', 'online', 12, '', '21000000', '10000000', 'không có', '2024-05-18', 'Đang tuyển', 'hehe', 'doremon', 'abc', 12, 1, '1 đến 20', '1 đến 21', '1', '2024-05-10', 'ở một nơi nào đó rất xa', 8, 48, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `bin_student`
--

CREATE TABLE `bin_student` (
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `mhv` varchar(9) NOT NULL,
  `ho_ten` varchar(50) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` varchar(5) NOT NULL,
  `file_anh` varchar(200) NOT NULL,
  `ho_chieu` varchar(8) DEFAULT NULL,
  `ngay_cap_hc` date DEFAULT NULL,
  `noi_cap_hc` text NOT NULL,
  `CCCD` varchar(12) DEFAULT NULL,
  `ngay_cap_cccd` date DEFAULT NULL,
  `noi_cap_cccd` int(50) NOT NULL,
  `ho_khau` varchar(100) DEFAULT NULL,
  `dia_chi` text NOT NULL,
  `sdt` varchar(10) DEFAULT NULL,
  `ngay_thi` date DEFAULT NULL,
  `ngay_DKXC` date DEFAULT NULL,
  `ngayXC` date DEFAULT NULL,
  `dukien_venuoc` date DEFAULT NULL,
  `nganh_nghe` varchar(50) DEFAULT NULL,
  `xi_nghiep` varchar(50) DEFAULT NULL,
  `nghiep_doan` varchar(50) DEFAULT NULL,
  `noi_lam_viec` varchar(50) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `type_hv` varchar(2) NOT NULL,
  `ngay_nhaphoc` date NOT NULL,
  `mdh` varchar(20) NOT NULL,
  `ten_dh` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `lich_su_xk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bin_student`
--

INSERT INTO `bin_student` (`created_at`, `mhv`, `ho_ten`, `ngay_sinh`, `gioi_tinh`, `file_anh`, `ho_chieu`, `ngay_cap_hc`, `noi_cap_hc`, `CCCD`, `ngay_cap_cccd`, `noi_cap_cccd`, `ho_khau`, `dia_chi`, `sdt`, `ngay_thi`, `ngay_DKXC`, `ngayXC`, `dukien_venuoc`, `nganh_nghe`, `xi_nghiep`, `nghiep_doan`, `noi_lam_viec`, `note`, `type_hv`, `ngay_nhaphoc`, `mdh`, `ten_dh`, `status`, `lich_su_xk`) VALUES
('2024-05-17 01:02:41', 'T12424006', 'abc', '2024-05-02', 'Nam', 'Screenshot 2024-04-16 112955.png', '', NULL, '', '213', '2024-05-20', 0, '123123', '', '123123', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, '', '1', '2024-05-17', 'DD24001', '', 'Đang đào tạo', ''),
('2024-05-17 01:02:43', 'T32424003', '1adsá', '2024-05-09', 'Nam', 'Screenshot 2024-04-16 142623.png', '21312', '2024-05-31', '21312', '1321', '2024-05-24', 3123, '31312', '', '23123', '2024-05-23', '2024-05-17', '2024-05-15', '2024-05-03', NULL, NULL, NULL, NULL, '', '3', '2024-05-11', 'T124012', '', 'Đang đào tạo', 'Xí nghiệp asuna, từ  đến  / Xí nghiệp dd, từ  đến ');

-- --------------------------------------------------------

--
-- Table structure for table `bin_xn`
--

CREATE TABLE `bin_xn` (
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `mdn` varchar(20) NOT NULL,
  `xi_nghiep` varchar(20) NOT NULL,
  `ten_giam_doc` varchar(50) NOT NULL,
  `nganh_nghe_e` varchar(20) NOT NULL,
  `nghiep_doan` varchar(20) NOT NULL,
  `sdt_xn` varchar(11) NOT NULL,
  `dia_chi_xn` varchar(255) NOT NULL,
  `noi_lam_viec` varchar(255) DEFAULT NULL,
  `so_luong_don_hang` int(11) DEFAULT NULL,
  `so_luong_hv` int(11) DEFAULT NULL,
  `ghi_chu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bin_xn`
--

INSERT INTO `bin_xn` (`created_at`, `mdn`, `xi_nghiep`, `ten_giam_doc`, `nganh_nghe_e`, `nghiep_doan`, `sdt_xn`, `dia_chi_xn`, `noi_lam_viec`, `so_luong_don_hang`, `so_luong_hv`, `ghi_chu`) VALUES
('2024-05-16 11:18:27', 'DOR001', 'doremon', '12', '13; cc; ccc', '123', '12', 'he', '(ưqeqư)', NULL, NULL, NULL),
('2024-05-16 11:18:27', 'NOB002', 'nobita', '12', '13', '123', '12', 'he', '(ưqeqư)', NULL, NULL, NULL),
('2024-05-16 11:18:27', 'EEE003', 'eee', '12', '13', '123', '12', 'he', '(ưqeqư)', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enterprise`
--

CREATE TABLE `enterprise` (
  `mdn` varchar(20) NOT NULL,
  `xi_nghiep` varchar(20) NOT NULL,
  `ten_giam_doc` varchar(50) NOT NULL,
  `nganh_nghe_e` varchar(20) NOT NULL,
  `nghiep_doan` varchar(20) NOT NULL,
  `sdt_xn` varchar(11) NOT NULL,
  `dia_chi_xn` varchar(255) NOT NULL,
  `noi_lam_viec` varchar(255) DEFAULT NULL,
  `so_luong_don_hang` int(11) DEFAULT NULL,
  `so_luong_hv` int(11) DEFAULT NULL,
  `ghi_chu_e` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enterprise`
--

INSERT INTO `enterprise` (`mdn`, `xi_nghiep`, `ten_giam_doc`, `nganh_nghe_e`, `nghiep_doan`, `sdt_xn`, `dia_chi_xn`, `noi_lam_viec`, `so_luong_don_hang`, `so_luong_hv`, `ghi_chu_e`) VALUES
('DOR004', 'doremon', '12', 'abc; dcb; ccc', '123', '12', 'he', '(ưqeqư)', NULL, NULL, NULL),
('DOR008', 'doremon', '12', 'cvcv; vvv; êcc ec; v', '123', '12', 'he', '(ưqeqư)', NULL, NULL, NULL),
('NOB005', 'nobita', '12', 'cvcv; 111; 222', '123', '12', 'he', '(ưqeqư)', NULL, NULL, NULL),
('NOB006', 'nobita', '12', 'cvcv', '123', '12', 'he', '(ưqeqư)(ád)(ad)', NULL, NULL, NULL),
('NOB007', 'nobita', '12', 'cvcv; cccc; 123; ggg', '123', '12', 'he', '(ưqeqư)', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jporder`
--

CREATE TABLE `jporder` (
  `mdh` varchar(7) NOT NULL,
  `ten_dh` varchar(20) NOT NULL,
  `ngay_xc` date DEFAULT NULL,
  `ngay_vn` date NOT NULL,
  `hinh_thuc_tt` varchar(255) DEFAULT NULL,
  `so_luong_tuyen` int(100) NOT NULL,
  `yeu_cau` varchar(100) DEFAULT NULL,
  `luong_co_ban` varchar(30) NOT NULL,
  `luong_thuc_te` varchar(30) NOT NULL,
  `che_do_phu_cap` varchar(255) DEFAULT NULL,
  `du_kien_tt` date DEFAULT NULL,
  `trang_thai` varchar(255) DEFAULT NULL,
  `nghiep_doan` varchar(50) NOT NULL,
  `xi_nghiep` varchar(20) NOT NULL,
  `nganh_nghe` varchar(20) NOT NULL,
  `sl_nam` int(20) NOT NULL,
  `sl_nu` int(20) NOT NULL,
  `do_tuoi_nam` varchar(20) NOT NULL,
  `do_tuoi_nu` varchar(20) NOT NULL,
  `type_hv` varchar(2) NOT NULL,
  `ngay_tt` date DEFAULT NULL,
  `noi_lv` varchar(80) NOT NULL,
  `lv_theo_ngay` int(24) NOT NULL,
  `lv_theo_tuan` int(50) NOT NULL,
  `nghi` int(24) NOT NULL,
  `ghi_chu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jporder`
--

INSERT INTO `jporder` (`mdh`, `ten_dh`, `ngay_xc`, `ngay_vn`, `hinh_thuc_tt`, `so_luong_tuyen`, `yeu_cau`, `luong_co_ban`, `luong_thuc_te`, `che_do_phu_cap`, `du_kien_tt`, `trang_thai`, `nghiep_doan`, `xi_nghiep`, `nganh_nghe`, `sl_nam`, `sl_nu`, `do_tuoi_nam`, `do_tuoi_nu`, `type_hv`, `ngay_tt`, `noi_lv`, `lv_theo_ngay`, `lv_theo_tuan`, `nghi`, `ghi_chu`) VALUES
('DD24001', '2131231', '0000-00-00', '0000-00-00', 'offline', 12, '', '21000000', '10000000', 'không có', '2024-05-09', 'Đang tuyển', 'hehe', 'doremon', 'abc', 12, 1, '1 đến 20', '1 đến 21', 'dd', '2024-05-10', 'ở một nơi nào đó rất xa', 8, 48, 1, 'hehe'),
('T124004', '1 con vịt', '2024-05-11', '2024-05-04', 'hehe', 12, '', '21000000', '10000000', 'không có', '2024-05-17', 'Đang tuyển', 'hehe', 'doremon', 'ccc', 12, 1, '1 đến 20', '1 đến 21', '1', '2024-05-11', 'ở một nơi nào đó rất xa', 8, 48, 1, 'ghi chu that dai'),
('T124005', '1 con vịt', '0000-00-00', '0000-00-00', 'online', 12, '', '21000000', '10000000', 'không có', '2024-05-04', 'Đang tuyển', 'hehe', 'doremon', 'abc', 12, 1, '1 đến 20', '1 đến 21', '1', '2024-05-10', 'ở một nơi nào đó rất xa', 8, 48, 1, ''),
('T124006', '1 con vịt', '0000-00-00', '0000-00-00', 'offline', 12, '', '21000000', '10000000', 'không có', '2024-05-11', 'Đang tuyển', 'hehe', 'nobita', 'cvcv', 12, 1, '1 đến 20', '1 đến 21', '1', '2024-05-10', 'ở một nơi nào đó rất xa', 8, 48, 1, ''),
('T124007', '1 con vịt', '0000-00-00', '0000-00-00', 'offline', 12, '', '21000000', '10000000', 'không có', '2024-05-25', 'Đang tuyển', 'hehe', 'default', 'default', 12, 1, '1 đến 20', '1 đến 21', '1', '2024-05-17', 'ở một nơi nào đó rất xa', 8, 48, 1, ''),
('T124008', '1 con vịt', '0000-00-00', '0000-00-00', 'offline', 12, '', '21000000', '10000000', 'không có', '2024-05-17', 'Đang tuyển', 'hehe', 'default', 'default', 12, 1, '1 đến 20', '1 đến 21', '1', '2024-05-17', 'ở một nơi nào đó rất xa', 8, 48, 1, ''),
('T124009', '1 con vịt', '0000-00-00', '0000-00-00', 'offline', 12, '', '21000000', '10000000', 'không có', '2024-05-10', 'Đang tuyển', 'hehe', 'doremon', 'ccc', 12, 1, '1 đến 20', '1 đến 21', '1', '2024-05-10', 'ở một nơi nào đó rất xa', 8, 48, 1, ''),
('T124010', '1 con vịt', '0000-00-00', '0000-00-00', 'offline', 12, '', '21000000', '10000000', 'không có', '2024-05-11', 'Đang tuyển', 'hehe', 'doremon', 'abc', 12, 1, '1 đến 20', '1 đến 21', '1', '2024-05-17', 'ở một nơi nào đó rất xa', 8, 48, 1, ''),
('T124011', '2131231', '2024-05-24', '2024-05-10', 'online', 12, '', '21000000', '10000000', 'không có', '2024-05-30', 'Đang tuyển', 'hehe', 'doremon', 'abc', 12, 1, '1 đến 20', '1 đến 21', '1', '2024-05-10', 'ở một nơi nào đó rất xa', 8, 48, 1, 'hú hú khẹc khẹc'),
('T124012', '2131231', '0000-00-00', '0000-00-00', 'offline', 12, '', '21000000', '10000000', 'không có', '2024-06-07', 'Đang tuyển', 'hehe', 'doremon', 'abc', 12, 1, '1 đến 20', '1 đến 21', '1', '2024-05-25', 'ở một nơi nào đó rất xa', 8, 48, 1, ''),
('T124014', '2131231', '0000-00-00', '0000-00-00', 'offline', 12, '', '21000000', '10000000', 'không có', '2024-05-11', 'Đang tuyển', 'hehe', 'nobita', 'cvcv', 12, 1, '1 đến 20', '1 đến 21', '1', '2024-05-18', 'ở một nơi nào đó rất xa', 8, 48, 1, ''),
('T124017', '1 con vịt', '2024-05-11', '2024-05-04', 'hehe', 12, '', '21000000', '10000000', 'không có', '2024-05-17', 'Đang tuyển', 'hehe', 'doremon', 'ccc', 12, 1, '1 đến 20', '1 đến 21', '1', '2024-05-11', 'ở một nơi nào đó rất xa', 8, 48, 1, 'ghi chu that dai'),
('T124018', '2131231', '0000-00-00', '0000-00-00', 'offline', 12, '', '21000000', '10000000', 'không có', '2024-05-18', 'Đang tuyển', 'hehe', 'doremon', 'abc', 12, 1, '1 đến 20', '1 đến 21', '1', '2024-05-09', 'ở một nơi nào đó rất xa', 8, 48, 1, ''),
('T324007', '1 con vịt', '0000-00-00', '0000-00-00', 'offline', 12, '', '21000000', '10000000', 'không có', '2024-05-18', 'Đang tuyển', '', 'nobita', 'cvcv', 12, 1, '1 đến 20', '1 đến 21', '3', '2024-05-10', 'ở một nơi nào đó rất xa', 8, 48, 1, ''),
('T324011', '1 con vịt', '0000-00-00', '0000-00-00', 'offline', 12, '', '21000000', '10000000', 'không có', '2024-05-18', 'Đang tuyển', '', 'nobita', 'cvcv', 12, 1, '1 đến 20', '1 đến 21', '3', '2024-05-10', 'ở một nơi nào đó rất xa', 8, 48, 1, ''),
('T324012', '2131231', '0000-00-00', '0000-00-00', 'offline', 12, '', '21000000', '10000000', 'không có', '2024-05-09', 'Đang tuyển', 'hehe', 'doremon', 'abc', 12, 1, '1 đến 20', '1 đến 21', '3', '2024-05-11', 'ở một nơi nào đó rất xa', 8, 48, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `lsxkld`
--

CREATE TABLE `lsxkld` (
  `lich_su_XKLD_id` varchar(255) NOT NULL,
  `ngay_XC` varchar(255) DEFAULT NULL,
  `thoi_gian_lam_viec` varchar(255) DEFAULT NULL,
  `xi_nghiep` varchar(20) NOT NULL,
  `nganh_nghe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `mhv` varchar(9) NOT NULL,
  `ho_ten` varchar(50) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` varchar(5) NOT NULL,
  `file_anh` varchar(200) NOT NULL,
  `ho_chieu` varchar(8) DEFAULT NULL,
  `ngay_cap_hc` date DEFAULT NULL,
  `noi_cap_hc` text NOT NULL,
  `CCCD` varchar(12) DEFAULT NULL,
  `ngay_cap_cccd` date DEFAULT NULL,
  `noi_cap_cccd` int(50) NOT NULL,
  `ho_khau` varchar(100) DEFAULT NULL,
  `dia_chi` text NOT NULL,
  `sdt` varchar(10) DEFAULT NULL,
  `ngay_thi` date DEFAULT NULL,
  `ngay_DKXC` date DEFAULT NULL,
  `ngayXC` date DEFAULT NULL,
  `dukien_venuoc` date DEFAULT NULL,
  `nganh_nghe` varchar(50) DEFAULT NULL,
  `xi_nghiep` varchar(50) DEFAULT NULL,
  `nghiep_doan` varchar(50) DEFAULT NULL,
  `noi_lam_viec` varchar(50) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `type_hv` varchar(2) NOT NULL,
  `ngay_nhaphoc` date NOT NULL,
  `mdh` varchar(20) NOT NULL,
  `ten_dh` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `lich_su_xk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`mhv`, `ho_ten`, `ngay_sinh`, `gioi_tinh`, `file_anh`, `ho_chieu`, `ngay_cap_hc`, `noi_cap_hc`, `CCCD`, `ngay_cap_cccd`, `noi_cap_cccd`, `ho_khau`, `dia_chi`, `sdt`, `ngay_thi`, `ngay_DKXC`, `ngayXC`, `dukien_venuoc`, `nganh_nghe`, `xi_nghiep`, `nghiep_doan`, `noi_lam_viec`, `note`, `type_hv`, `ngay_nhaphoc`, `mdh`, `ten_dh`, `status`, `lich_su_xk`) VALUES
('DD2424001', '1adsá', '2024-05-10', 'Nam', 'Screenshot 2024-04-16 142238.png', '21312', '2024-05-09', '21312', '1321', '2024-05-23', 3123, '31312', 'hehe', '23123', '2024-05-04', '2024-05-18', '2024-05-30', '2024-05-04', NULL, NULL, NULL, NULL, 'không có ghi chú', 'dd', '2024-05-03', '', '', 'Đang đào tạo', 'Xí nghiệp asuna, từ 2024-05-10 đến 2024-05-16 / Xí nghiệp dd, từ 2024-05-23 đến 2024-05-29'),
('DD2424002', '1adsá', '2024-05-03', 'Nam', 'Screenshot 2024-04-16 112955.png', '21312', '2024-05-24', '21312', '1321', '2024-05-24', 3123, '31312', '', '23123', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, '', 'dd', '2024-05-18', '', '', 'Đang đào tạo', 'Xí nghiệp asuna, từ  đến  / Xí nghiệp dd, từ  đến '),
('T12424001', 'anh long ga', '2024-05-16', 'Nam', 'Screenshot 2024-04-15 130157.png', '', NULL, '', '23213123123', '2024-05-16', 0, '123123', '', '123123', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 'ưeqe', '', '', '', '1', '2024-05-10', 'DD24001', '', 'Đang đào tạo', ''),
('T12424002', 'anh long ga', '2024-05-16', 'Nam', 'Screenshot 2024-04-15 130157.png', '', NULL, '', '23213123123', '2024-05-16', 0, '123123', '', '123123', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 'ưeqe', '', '', '', '1', '2024-05-17', 'DD24001', '', 'Đang đào tạo', ''),
('T12424003', 'anh long ga', '2024-04-25', 'Nam', 'Screenshot 2024-04-16 111540.png', '', NULL, '', '23213123123', '2024-04-26', 0, '123123', '', '123123', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 'ưeqe', '', '', '', '1', '2024-04-25', 'DD24001', '', 'Đang đào tạo', ''),
('T12424005', 'abc', '2024-05-11', 'Nam', 'Screenshot 2024-04-16 142238.png', '', NULL, '', '213', '2024-05-17', 0, '123123', '', '123123', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '32131231', '', '', '', '1', '2024-05-17', 'DD24001', '', 'Đang đào tạo', ''),
('T32424001', '2213123', '2024-04-25', 'Nam', 'Screenshot 2024-04-16 111540.png', '312312', NULL, '', '3123123', '2024-04-04', 0, '123123', '', '1231231231', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '3', '2024-04-12', '', '', 'Đang làm việc', ''),
('T32424002', '1adsá', '2024-05-24', 'Nam', 'Screenshot 2024-04-16 112955.png', '21312', NULL, '', '1321', '2024-05-23', 0, '31312', 'đâu đó trên trái đất này', '23123', '2024-05-10', '2024-05-22', '2024-05-14', '2024-05-13', NULL, NULL, NULL, NULL, 'cccc', '3', '2024-05-23', '', '', 'Đang làm việc', 'Xí nghiệp asuna, từ 2024-05-16 đến 2024-05-21 / Xí nghiệp dd, từ 2024-05-24 đến 2024-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `role` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `user`, `pass`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enterprise`
--
ALTER TABLE `enterprise`
  ADD PRIMARY KEY (`mdn`);

--
-- Indexes for table `jporder`
--
ALTER TABLE `jporder`
  ADD PRIMARY KEY (`mdh`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`mhv`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `delete_old_records_student` ON SCHEDULE EVERY 1 DAY STARTS '2024-05-14 01:17:17' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    DELETE FROM bin_student WHERE created_at < (NOW() - INTERVAL 30 DAY);
END$$

CREATE DEFINER=`root`@`localhost` EVENT `delete_old_records_order` ON SCHEDULE EVERY 1 DAY STARTS '2024-05-14 01:17:17' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    DELETE FROM bin_order WHERE created_at < (NOW() - INTERVAL 30 DAY);
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
