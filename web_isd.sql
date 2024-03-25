-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 06:43 PM
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
('MHV002', 'Trần Thị B', '1995-10-10', '87654321', 'CCCD654321', 'Hồ Chí Minh', '0123456789', '2024-03-20', 'Công ty XYZ', '2024-02-01', '2024-03-01', '2024-05-01', 'Chuyên viên marketing', 'Công ty XYZ', 'Nhân viên', 'Hồ Chí Minh', 'Ghi chú 2', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`mhv`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
