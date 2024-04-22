-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 02:36 AM
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
('T12424008', 'dasdas', '', '2024-04-18', '', '321', '');

-- --------------------------------------------------------

--
-- Table structure for table `bin_order`
--

CREATE TABLE `bin_order` (
  `mdh` varchar(7) NOT NULL,
  `ten_dh` varchar(20) DEFAULT NULL,
  `ngay_xc` date DEFAULT NULL,
  `ngay_vn` date DEFAULT NULL,
  `ngay_pv` date DEFAULT NULL,
  `hinh_thuc_tt` varchar(255) DEFAULT NULL,
  `so_luong_tuyen` int(100) DEFAULT NULL,
  `yeu_cau` varchar(100) DEFAULT NULL,
  `muc_luong` bigint(20) DEFAULT NULL,
  `che_do_phu_cap` varchar(255) DEFAULT NULL,
  `thoi_gian_lam_viec` varchar(255) DEFAULT NULL,
  `du_kien_tt` date DEFAULT NULL,
  `trang_thai` varchar(255) DEFAULT NULL,
  `nghiep_doan` varchar(50) DEFAULT NULL,
  `xi_nghiep` varchar(20) DEFAULT NULL,
  `nganh_nghe` varchar(20) DEFAULT NULL,
  `gioi_tinh` varchar(11) DEFAULT NULL,
  `do_tuoi` varchar(9) DEFAULT NULL,
  `type_hv` varchar(2) DEFAULT NULL,
  `ngay_tt` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bin_student`
--

CREATE TABLE `bin_student` (
  `mhv` varchar(9) NOT NULL,
  `ho_ten` varchar(50) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` varchar(5) DEFAULT NULL,
  `file_anh` varchar(200) DEFAULT NULL,
  `ho_chieu` varchar(8) DEFAULT NULL,
  `CCCD` varchar(12) DEFAULT NULL,
  `ho_khau` varchar(100) DEFAULT NULL,
  `que_quan` varchar(50) DEFAULT NULL,
  `ng_bao_lanh` varchar(20) DEFAULT NULL,
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
  `type_hv` varchar(2) DEFAULT NULL,
  `ngay_nhaphoc` date DEFAULT NULL,
  `order_name` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `tinh` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
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

--
-- Dumping data for table `enterprise`
--

INSERT INTO `enterprise` (`mdn`, `xi_nghiep`, `ten_giam_doc`, `nganh_nghe`, `nghiep_doan`, `sdt_xn`, `dia_chi_xn`, `noi_lam_viec`, `so_luong_don_hang`, `so_luong_hv`, `ghi_chu`) VALUES
('', 'ưeqe', '', '', '', '321312', '312312', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jporder`
--

CREATE TABLE `jporder` (
  `mdh` varchar(7) NOT NULL,
  `ten_dh` varchar(20) NOT NULL,
  `ngay_xc` date DEFAULT NULL,
  `ngay_vn` date NOT NULL,
  `ngay_pv` date DEFAULT NULL,
  `hinh_thuc_tt` varchar(255) DEFAULT NULL,
  `so_luong_tuyen` int(100) NOT NULL,
  `yeu_cau` varchar(100) DEFAULT NULL,
  `muc_luong` bigint(20) DEFAULT NULL,
  `che_do_phu_cap` varchar(255) DEFAULT NULL,
  `thoi_gian_lam_viec` varchar(255) DEFAULT NULL,
  `du_kien_tt` date DEFAULT NULL,
  `trang_thai` varchar(255) DEFAULT NULL,
  `nghiep_doan` varchar(50) NOT NULL,
  `xi_nghiep` varchar(20) NOT NULL,
  `nganh_nghe` varchar(20) NOT NULL,
  `gioi_tinh` varchar(11) NOT NULL,
  `do_tuoi` varchar(9) NOT NULL,
  `type_hv` varchar(2) NOT NULL,
  `ngay_tt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jporder`
--

INSERT INTO `jporder` (`mdh`, `ten_dh`, `ngay_xc`, `ngay_vn`, `ngay_pv`, `hinh_thuc_tt`, `so_luong_tuyen`, `yeu_cau`, `muc_luong`, `che_do_phu_cap`, `thoi_gian_lam_viec`, `du_kien_tt`, `trang_thai`, `nghiep_doan`, `xi_nghiep`, `nganh_nghe`, `gioi_tinh`, `do_tuoi`, `type_hv`, `ngay_tt`) VALUES
('DD24001', '123', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', 0, '', '', '0000-00-00', '', '1231231', '13231', '', '', '', 'dd', '0000-00-00'),
('T124001', '23123', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', 0, '', '', '0000-00-00', '', '123123', '', '', '', '', '1', '0000-00-00'),
('T124002', '123213', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', 0, '', '', '0000-00-00', '', '21312', '', '', '', '', '1', '0000-00-00'),
('T124003', '123', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', 0, '', '', '0000-00-00', '', '1231231', '13231', '', '', '', '1', '0000-00-00'),
('T124004', '123', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', 0, '', '', '0000-00-00', '', '1231231', '13231', '', '', '', '1', '0000-00-00'),
('T324001', 'e12312', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', 0, '', '', '0000-00-00', '', 'ưqeqưe', 'ưqeqưe', '', '', '', '3', '0000-00-00');

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
  `status` varchar(20) NOT NULL,
  `tinh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`mhv`, `ho_ten`, `ngay_sinh`, `gioi_tinh`, `file_anh`, `ho_chieu`, `ngay_cap_hc`, `noi_cap_hc`, `CCCD`, `ngay_cap_cccd`, `noi_cap_cccd`, `ho_khau`, `dia_chi`, `sdt`, `ngay_thi`, `co_quan`, `ngay_DKXC`, `ngayXC`, `dukien_venuoc`, `nganh_nghe`, `xi_nghiep`, `nghiep_doan`, `noi_lam_viec`, `note`, `type_hv`, `ngay_nhaphoc`, `order_name`, `status`, `tinh`) VALUES
('T12424001', 'aaa', '2024-04-26', 'Nam', 'Screenshot 2024-04-16 111540.png', '312312', NULL, '', '3123123', NULL, 0, '123123', '', '313123', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '1', '2024-04-25', '', 'Đang đào tạo', ''),
('T12424002', '2213123', '2024-04-24', 'Nam', 'Screenshot 2024-04-16 112955.png', '312312', NULL, '', '3123123', NULL, 0, '123123', '', '1231231231', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '1', '2024-04-26', '', 'Đang đào tạo', ''),
('T12424003', 'aaa', '2024-04-26', 'Nam', 'Screenshot 2024-04-16 142206.png', '312312', NULL, '', '3123123', NULL, 0, '123123', '', '313123', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '1', '2024-04-05', '', 'Đang đào tạo', ''),
('T12424004', 'aaa', '2024-04-26', 'Nam', 'Screenshot 2024-04-16 142206.png', '312312', NULL, '', '3123123', NULL, 0, '123123', '', '313123', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '1', '2024-04-19', '', 'Đang đào tạo', ''),
('T12424005', 'anh long', '2024-04-11', 'Nam', 'Screenshot 2024-04-16 111540.png', '', NULL, '', '23213123123', '2024-04-24', 0, '123123', '', '123123', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '1', '2024-04-18', '#', 'Đang đào tạo', ''),
('T12424006', 'anh long', '2024-04-26', 'Nam', 'Screenshot 2024-04-16 111540.png', '', NULL, '', '23213123123', '2024-04-05', 0, '123123', '', '123123', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '1', '2024-04-19', 'DD24001', 'Đang đào tạo', ''),
('T12424007', 'anh long g', '2024-04-16', 'Nam', 'Screenshot 2024-04-15 221058.png', '', NULL, '', '23213123123', '2024-04-05', 0, '123123', '', '123123', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', 'ưeqe', '', '', '', '1', '2024-04-19', 'T124002', 'Đang đào tạo', ''),
('T12424008', 'anh long ga', '2024-04-25', 'Nam', 'Screenshot 2024-04-15 221058.png', '', NULL, '', '23213123123', '2024-04-13', 0, '123123', '', '123123', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', 'ưeqe', '', '', '', '1', '2024-04-17', 'DD24001', 'Đang đào tạo', ''),
('T12424019', 'đại ca', '2024-04-18', 'Nam', 'Screenshot 2024-04-16 142930.png', '13123', NULL, '', '13123123', NULL, 0, NULL, '', 'bbb', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '1', '2024-04-11', '', 'Đang đào tạo', ''),
('T12424020', '213123', '2024-04-26', 'Nam', 'Screenshot 2024-04-15 213001.png', '312312', NULL, '', '3123123', NULL, 0, '123123', '', '313123', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '1', '2024-04-19', '', 'Đang làm việc', ''),
('T12424021', 'aaa', '2024-04-11', 'Nam', 'Screenshot 2024-04-16 111540.png', '312312', NULL, '', '3123123', NULL, 0, '123123', '', '313123', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '1', '2024-04-27', '', 'Đang đào tạo', ''),
('T12424022', 'aaa', '2024-04-25', 'Nam', 'Screenshot 2024-04-16 142206.png', '312312', NULL, '', '3123123', NULL, 0, '123123', '', '313123', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '1', '2024-04-11', '', 'Đang đào tạo', ''),
('T12470000', '123123', '0000-00-00', '', '', NULL, NULL, '', NULL, NULL, 0, '', '', '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '0000-00-00', '', 'option1', ''),
('T32424000', '123123', '2024-04-11', '', '', NULL, NULL, '', NULL, NULL, 0, '', '', 'áđá', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '0000-00-00', '', 'option1', ''),
('T32424001', '2213123', '2024-04-25', 'Nam', 'Screenshot 2024-04-16 111540.png', '312312', NULL, '', '3123123', '2024-04-04', 0, '123123', '', '1231231231', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '3', '2024-04-12', '', 'Đang làm việc', '');

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
CREATE DEFINER=`root`@`localhost` EVENT `delete_old_bin_data` ON SCHEDULE EVERY 1 DAY STARTS '2024-04-17 03:36:26' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Delete records from bin_student after 30 days' DO DELETE FROM bin_student WHERE created_at <= DATE_SUB(NOW(), INTERVAL 30 DAY)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
