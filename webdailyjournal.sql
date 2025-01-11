-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2025 at 04:08 PM
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
-- Database: `webdailyjournal`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'perpustakan kampus', 'this is a wider card', 'air.jpg', '2024-12-11 16:52:13', 'admin'),
(2, 'ruang kelas', 'this card has supporting text below', 'rob.jpg', '2024-12-11 16:55:03', 'admin'),
(3, 'kelompok belajar', 'this is a wider card with supporting text', 'ar.jpg', '2024-12-11 16:55:03', 'admin'),
(5, 'makan', 'nanti kita cerita makan siang', '20250111135712.jpg', '2025-01-11 13:57:12', 'ellen'),
(6, 'kelas menyanyi', 'kelas menyanyi mulai dibuka tapi khusus manusia setengah ikan', '20250111140032.jpg', '2025-01-11 14:00:32', 'admin'),
(7, 'nanti kita cerita hari ini', 'tidak seperti biasanya terik matahari memulai hari. gemericik air dan kubangan air menolak hadir dan memilih absen', '20250111140100.jpg', '2025-01-11 14:01:00', 'admin'),
(8, 'mendung', 'kenapa ya tiap siang yang semula membiru sekarang kelabu', '20250111135734.jpg', '2025-01-11 13:57:34', 'ellen'),
(9, 'cukup bahagia', 'mandi hujan minum teh panas berselancar jalanan licin', '20250111140541.jpg', '2025-01-11 14:05:41', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `username` text NOT NULL,
  `role` enum('admin','user','','') NOT NULL DEFAULT 'user',
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `tanggal`, `username`, `role`, `gambar`) VALUES
(6, '2025-01-11 14:02:53', 'admin', 'admin', '20250111140253.jpeg'),
(11, '2025-01-11 14:02:12', 'admin', 'admin', '20250111140212.jpeg'),
(22, '2025-01-11 14:01:56', 'admin', 'admin', '20250111140156.jpeg'),
(26, '2025-01-11 14:01:40', 'admin', 'admin', '20250111140140.jpeg'),
(32, '2025-01-11 13:59:04', 'ellen', 'user', '20250111135904.jpg'),
(33, '2025-01-11 13:59:17', 'ellen', 'user', '20250111135917.jpg'),
(34, '2025-01-11 13:59:26', 'ellen', 'user', '20250111135926.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `role` enum('admin','user','','') NOT NULL DEFAULT 'user',
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `role`, `password`, `foto`) VALUES
(1, 'admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'img/pp.jpg'),
(4, 'ellen', 'user', '202cb962ac59075b964b07152d234b70', 'img/pepe.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`,`username`(50)) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
