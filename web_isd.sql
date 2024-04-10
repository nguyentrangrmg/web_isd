-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2024 at 11:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tvc_1`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1712698127),
('m130524_201442_init', 1712698134),
('m190124_110200_add_verification_token_column_to_user_table', 1712698134),
('m240408_033659_student', 1712698134),
('m240408_040547_order', 1712698134),
('m240408_041822_enterprise', 1712698278),
('m240409_192433_lsxkld', 1712698278);

-- --------------------------------------------------------

--
-- Table structure for table `order`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
--
-- Dumping data for table `jporder`
--

INSERT INTO `jporder` (`mdh`, `ngay_nhan`, `so_luong_hv`, `ngay_DKXC`, `nghiep_doan`, `luong_du_kien`, `mo_ta`, `yeu_cau`) VALUES
('984382', '2023-00-00', 5, '0000-00-00', 'Katsunaka', 60, NULL ,'Tiếng Nhật N4, Tốt nghiệp cấp 3'),
('MDH001', '2024-03-27', 100, '2024-04-05', 'Nghề đoàn A', 5000000, 'Mô tả đơn hàng 1', 'Yêu cầu đơn hàng 1'),
('MDH002', '2024-03-28', 150, '2024-04-10', 'Nghề đoàn B', 7000000, 'Mô tả đơn hàng 2', 'Yêu cầu đơn hàng 2');
-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `mhv` varchar(9) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` varchar(5) NOT NULL,
  `ho_chieu` varchar(9) DEFAULT NULL,
  `CCCD` int(12) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `que_quan` varchar(255) NOT NULL,
  `dia_chi_tt` varchar(255) NOT NULL,
  `ng_bao_lanh` varchar(50) NOT NULL,
  `sdt_ng_bao_lanh` varchar(10) NOT NULL,
  `ngayXC` varchar(255) DEFAULT NULL,
  `ngay_ve_nươc` date DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `anh_hv` varchar(255) NOT NULL,
  `type_hv` varchar(2) NOT NULL,
  `mdh` varchar(7) DEFAULT NULL,
  `ngay_thi` date DEFAULT NULL,
  `ngay_nhaphoc` date NOT NULL,
  `ngay_DKXC` date DEFAULT NULL,
  `dukien_venuoc` date DEFAULT NULL,
  `nganh_nghe` varchar(255) DEFAULT NULL,
  `xi_nghiep` varchar(255) DEFAULT NULL,
  `nghiep_doan` varchar(255) DEFAULT NULL,
  `noi_lam_viec` varchar(255) DEFAULT NULL,
  `lich_su_XKLD_id` varchar(255) DEFAULT NULL,
  `co_quan` varchar(50) DEFAULT NULL,
  `order_name` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
--
-- Dumping data for table `student`
--

INSERT INTO `student` (`mhv`, `ho_ten`, `ngay_sinh`, `ho_chieu`, `CCCD`, `que_quan`, `sdt`, `ngay_thi`, `co_quan`, `ngay_DKXC`, `ngayXC`, `dukien_venuoc`, `nganh_nghe`, `xi_nghiep`, `nghiep_doan`, `noi_lam_viec`, `note`, `type_hv`, `ngay_nhaphoc`, `order_name`, `status`) VALUES
('2424001', '11111', '2024-04-18', 'qưeqưe', '123123', '13123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', '', ''),
('DD2416001', 'sadasdsa', '2016-07-02', 'adsasd', 'asdasd', '', '13132', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', 'dd', '0000-00-00', '13', 'option1'),
('DD2420002', 'sadasdsa', '2020-10-04', 'adsasd', 'asdasd', '', '13132', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', 'dd', '0000-00-00', '13', 'option1'),
('DD2424003', '1adsá', '2024-04-25', '', '', '', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', 'dd', '0000-00-00', '', 'option1'),
('T12405002', '3123123132', '2024-04-05', '1231231', 'ddd', '', '13132', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '0000-00-00', '', 'option1'),
('T12424001', '11111', '2024-04-25', 'qưeqưe', '123123', '13123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', '', ''),
('T12424008', '123123', '2024-04-19', '', '', '', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '1', '0000-00-00', '', 'option1'),
('T12424009', '123213123123', '2024-04-04', '', '', '', '31312', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '1', '0000-00-00', '', 'option1'),
('T12470000', '123123', '0000-00-00', NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '0000-00-00', '', 'option1'),
('T32424000', '123123', '2024-04-11', NULL, NULL, NULL, 'áđá', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '0000-00-00', '', 'option1'),
('T32424008', 'sadasdsa', '2024-04-19', '', '', '', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '3', '0000-00-00', '', 'option1'),
('T32424009', '123123', '2024-04-19', '', '', '', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '3', '0000-00-00', '', 'option1'),
('T32425006', '123123', '2024-04-25', '1', 'áđásadsađáád', '', 'áđá', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '3', '0000-00-00', '', 'option1'),
('T32427010', '123123', '2027-10-12', '', '', '', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '3', '0000-00-00', '', 'option1');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
-- Indexes for table `lsxkld`
--
ALTER TABLE `lsxkld`
  ADD PRIMARY KEY (`lich_su_XKLD_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `order`
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
 
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
