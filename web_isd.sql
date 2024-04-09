-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2024 at 06:44 PM
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
  `yeu_cau` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jporder`
--

INSERT INTO `jporder` (`mdh`, `ngay_nhan`, `so_luong_hv`, `ngay_DKXC`, `nghiep_doan`, `luong_du_kien`, `mo_ta`, `yeu_cau`) VALUES
('MDH001', '2024-03-27', 100, '2024-04-05', 'Nghề đoàn A', 5000000, 'Mô tả đơn hàng 1', 'Yêu cầu đơn hàng 1'),
('MDH002', '2024-03-28', 150, '2024-04-10', 'Nghề đoàn B', 7000000, 'Mô tả đơn hàng 2', 'Yêu cầu đơn hàng 2');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `mhv` varchar(9) NOT NULL,
  `ho_ten` varchar(50) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `ho_chieu` varchar(8) DEFAULT NULL,
  `CCCD` varchar(12) DEFAULT NULL,
  `que_quan` varchar(50) DEFAULT NULL,
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
