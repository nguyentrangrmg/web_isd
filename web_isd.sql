-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 04:37 AM
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
  `mhv` varchar(9) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `quan_he` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `dia_chi` varchar(100) NOT NULL,
  `sdt` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enterprise`
--

CREATE TABLE `enterprise` (
  `mdn` varchar(20) NOT NULL,
  `xi_nghiep` varchar(20) NOT NULL,
  `ten_giam_doc` varchar(50) NOT NULL,
  `nganh_nghe` varchar(20) NOT NULL,
  `nghiep_doan` varchar(20) NOT NULL,
  `sdt_xn` varchar(11) NOT NULL,
  `dia_chi_xn` varchar(255) NOT NULL,
  `noi_lam_viec` varchar(255) DEFAULT NULL,
  `so_luong_don_hang` int(11) DEFAULT NULL,
  `so_luong_hv` int(11) DEFAULT NULL,
  `ghi_chu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jporder`
--

CREATE TABLE `jporder` (
  `mdh` varchar(7) NOT NULL,
  `ten_dh` varchar(20) NOT NULL,
  `ngay_dktt` date DEFAULT NULL,
  `ngay_nhan` date NOT NULL,
  `ngay_pv` date DEFAULT NULL,
  `hinh_thuc_tt` varchar(255) DEFAULT NULL,
  `ngay_DKXC` date DEFAULT NULL,
  `ngay_dukien_VN` date DEFAULT NULL,
  `so_luong_hv` int(100) NOT NULL,
  `yeu_cau` varchar(100) DEFAULT NULL,
  `noi lam viec` varchar(255) DEFAULT NULL,
  `luong_du_kien` bigint(20) DEFAULT NULL,
  `che_do_phu_cap` varchar(255) DEFAULT NULL,
  `thoi_gian_lam_viec` varchar(255) DEFAULT NULL,
  `trang_thai` varchar(255) DEFAULT NULL,
  `ghi_chu` varchar(255) DEFAULT NULL,
  `nghiep_doan` varchar(50) NOT NULL,
  `xi_nghiep` varchar(20) NOT NULL,
  `nganh_nghe` varchar(20) NOT NULL,
  `noi_lam_viec` varchar(255) DEFAULT NULL,
  `mo_ta` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jporder`
--

INSERT INTO `jporder` (`mdh`, `ten_dh`, `ngay_dktt`, `ngay_nhan`, `ngay_pv`, `hinh_thuc_tt`, `ngay_DKXC`, `ngay_dukien_VN`, `so_luong_hv`, `yeu_cau`, `noi lam viec`, `luong_du_kien`, `che_do_phu_cap`, `thoi_gian_lam_viec`, `trang_thai`, `ghi_chu`, `nghiep_doan`, `xi_nghiep`, `nganh_nghe`, `noi_lam_viec`, `mo_ta`) VALUES
('984382', '', NULL, '0000-00-00', NULL, NULL, '0000-00-00', NULL, 5, 'Tiếng Nhật N4, Tốt nghiệp cấp 3', NULL, 60, NULL, NULL, NULL, NULL, 'Katsunaka', '', '', NULL, NULL),
('MDH001', '', NULL, '2024-03-27', NULL, NULL, '2024-04-05', NULL, 100, 'Yêu cầu đơn hàng 1', NULL, 5000000, NULL, NULL, NULL, NULL, 'Nghề đoàn A', '', '', NULL, 'Mô tả đơn hàng 1'),
('MDH002', '', NULL, '2024-03-28', NULL, NULL, '2024-04-10', NULL, 150, 'Yêu cầu đơn hàng 2', NULL, 7000000, NULL, NULL, NULL, NULL, 'Nghề đoàn B', '', '', NULL, 'Mô tả đơn hàng 2');

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
  `CCCD` varchar(12) DEFAULT NULL,
  `ho_khau` varchar(100) NOT NULL,
  `que_quan` varchar(50) DEFAULT NULL,
  `ng_bao_lanh` varchar(20) NOT NULL,
  `sdt` varchar(10) DEFAULT NULL,
  `ngay_thi` date DEFAULT NULL,
  `co_quan` varchar(50) DEFAULT NULL,
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
  `order_name` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`mhv`, `ho_ten`, `ngay_sinh`, `gioi_tinh`, `file_anh`, `ho_chieu`, `CCCD`, `ho_khau`, `que_quan`, `ng_bao_lanh`, `sdt`, `ngay_thi`, `co_quan`, `ngay_DKXC`, `ngayXC`, `dukien_venuoc`, `nganh_nghe`, `xi_nghiep`, `nghiep_doan`, `noi_lam_viec`, `note`, `type_hv`, `ngay_nhaphoc`, `order_name`, `status`) VALUES
('2424001', '11111', '2024-04-18', '', '', 'qưeqưe', '123123', '', '13123', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', '', ''),
('DD2420002', 'sadasdsa', '2020-10-04', '', '', 'adsasd', 'asdasd', '', '', '', '13132', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', 'dd', '0000-00-00', '13', 'option1'),
('DD2424003', '1adsá', '2024-04-25', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', 'dd', '0000-00-00', '', 'option1'),
('DD2424004', '213123', '2024-04-24', '', 'lo.png', '213123', '23213', '', '', '', 'qdáewqe', '2024-04-25', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', 'dd', '2024-04-24', '13132', 'Đang làm việc'),
('T12424001', '1', '2024-04-05', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '1', '0000-00-00', '', 'Đang đào tạo'),
('T12424003', 'ssa', '2024-04-05', '', '', '', '13213123123', '', '', '', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '1', '0000-00-00', '', 'Đang đào tạo'),
('T12424004', 'weqeqw', '2024-04-11', 'Nữ', 'tach nen logo.png', '21312321', '11', '2312312321', '', '', '31313231ĐA', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '1', '0000-00-00', 'ÁấS', 'Đang đào tạo'),
('T12424005', 'sađâs', '2024-04-18', 'Nam', '406140541_747648444057059_2570272159416383423_n.jpg', 'q1', '21312312sađá', 'áda', '', 'chú A', '123123', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '1', '0000-00-00', '', 'Đã về nước'),
('T12470000', '123123', '0000-00-00', '', '', NULL, NULL, '', NULL, '', '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '0000-00-00', '', 'option1'),
('T32424000', '123123', '2024-04-11', '', '', NULL, NULL, '', NULL, '', 'áđá', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '0000-00-00', '', 'option1'),
('T32424007', '12312312', '2024-04-26', '', 'pngegg.png', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '3', '0000-00-00', '', 'Đang làm việc'),
('T32424008', '111', '2024-04-18', '', '406140541_747648444057059_2570272159416383423_n.jpg', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '3', '0000-00-00', '', 'Đang đào tạo');

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
-- Indexes for table `baolanh`
--
ALTER TABLE `baolanh`
  ADD PRIMARY KEY (`mhv`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
