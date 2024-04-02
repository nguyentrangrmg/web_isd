-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 09:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `jporder`
--

CREATE TABLE `jporder` (
  `mdh` varchar(20) NOT NULL,
  `ngay_nhan` date NOT NULL,
  `so_luong_hv` int(100) NOT NULL,
  `ngay_DKXC` date DEFAULT NULL,
  `nghiep_doan` varchar(50) NOT NULL,
  `luong_du_kien` bigint(20) DEFAULT NULL,
  `mo_ta` varchar(1000) DEFAULT NULL,
  `yeu_cau` varchar(100) DEFAULT NULL,
  `nganh_nghe` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jporder`
--

INSERT INTO `jporder` (`mdh`, `ngay_nhan`, `so_luong_hv`, `ngay_DKXC`, `nghiep_doan`, `luong_du_kien`, `mo_ta`, `yeu_cau`, `nganh_nghe`) VALUES
('984382', '0000-00-00', 5, '0000-00-00', 'Katsunaka', 60, NULL, 'Tiếng Nhật N4, Tốt nghiệp cấp 3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `mhv` varchar(6) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `ho_chieu` varchar(8) DEFAULT NULL,
  `CCCD` varchar(12) DEFAULT NULL,
  `que_quan` varchar(50) DEFAULT NULL,
  `sdt` varchar(10) NOT NULL,
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
  `sdt_nguoigiamho` int(11) NOT NULL,
  `trang_thai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`mhv`, `ho_ten`, `ngay_sinh`, `ho_chieu`, `CCCD`, `que_quan`, `sdt`, `ngay_thi`, `co_quan`, `ngay_DKXC`, `ngayXC`, `dukien_venuoc`, `nganh_nghe`, `xi_nghiep`, `nghiep_doan`, `noi_lam_viec`, `note`, `sdt_nguoigiamho`, `trang_thai`) VALUES
('202309', 'Nguyễn Bảo Trâm', '0000-00-00', '10848237', '03389247832', 'Hà Nam', '0932873232', '0000-00-00', 'TVC', '0000-00-00', '0000-00-00', '0000-00-00', 'Chăm cây', 'Nagaoka', 'Kaibuki-chou Co.', 'Osaka', NULL, 287239743, 'Chưa xuất cảnh'),
('848723', 'Nguyễn Ngọc Tâm', '0000-00-00', '39275284', '0288472942', 'Bắc Giang', '0238486862', '0000-00-00', 'TVC', '0000-00-00', '0000-00-00', '0000-00-00', 'Xây dựng', 'Karabuki', 'Okinawa Co.', 'Kawasaki', '', 24872325, 'Học viên'),
('MHV002', 'Trần Thị B', '1995-10-10', '87654321', 'CCCD654321', 'Hồ Chí Minh', '0123456789', '2024-03-20', 'Công ty XYZ', '2024-02-01', '2024-03-01', '2024-05-01', 'Chuyên viên marketing', 'Công ty XYZ', 'Nhân viên', 'Hồ Chí Minh', 'Ghi chú 2', 0, '');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
