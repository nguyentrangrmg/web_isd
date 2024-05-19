-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 12:09 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `enterprise`
--

CREATE TABLE `enterprise` (
  `mdn` varchar(20) NOT NULL,
  `xi_nghiep` varchar(20) NOT NULL,
  `ten_giam_doc` varchar(50) NOT NULL,
  `nganh_nghe_e` varchar(200) NOT NULL,
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
('HEH002', 'HEHE', 'hả', 'may mặc; ngủ', 'bumbum', '0123456778', 'trên núi', '(hà nội)(vĩnh phúc, an giang)', NULL, NULL, NULL);

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
  `mdn` varchar(50) NOT NULL,
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

INSERT INTO `jporder` (`mdh`, `ten_dh`, `ngay_xc`, `ngay_vn`, `hinh_thuc_tt`, `so_luong_tuyen`, `yeu_cau`, `luong_co_ban`, `luong_thuc_te`, `che_do_phu_cap`, `du_kien_tt`, `trang_thai`, `nghiep_doan`, `xi_nghiep`, `mdn`, `nganh_nghe`, `sl_nam`, `sl_nu`, `do_tuoi_nam`, `do_tuoi_nu`, `type_hv`, `ngay_tt`, `noi_lv`, `lv_theo_ngay`, `lv_theo_tuan`, `nghi`, `ghi_chu`) VALUES
('T124001', '1 con vịt', '0000-00-00', '0000-00-00', 'offline', 12, '', '21000000', '10000000', 'không có', '2024-05-04', 'Đang tuyển', 'hehe', 'HEHE', '', 'ngủ', 3, 4, '12 đến 13', '13 đến 33', '1', '2024-05-17', 'hà nội', 8, 48, 1, '');

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `role` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `user`, `pass`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', '$2y$10$6lc4vE9dArCSA76FrJqSUuTCn3oVDcm7kNhFK1Zmy2BC75.WTR0Pe', 1);

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
