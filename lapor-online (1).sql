-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 03:32 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapor-online`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pengaduan`
--

CREATE TABLE `kategori_pengaduan` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_pengaduan`
--

INSERT INTO `kategori_pengaduan` (`id_kategori`, `kategori`) VALUES
(1, 'Kebersihan Lingkungan KIII'),
(2, 'Organisasi Masyarakat'),
(3, 'Hubungan Luar Negeri'),
(4, 'Sumber Daya Alam'),
(5, 'Fasilitas Publik'),
(6, 'Sarana dan Prasarana Daerah'),
(7, 'Bantuan Sosial'),
(8, 'Bencana Alam');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(150) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `email`, `username`, `password`, `telp`) VALUES
('0123456123456789', 'Andri Firmansyah', '', 'andrifirmansyah', '$2y$10$J9WIvYz1Vf2r4QgAEZqqDOi3R20TOjtx1aKwfUYhiYa/.9MuuYU0O', ''),
('1234567890123456', 'jjelek', '', 'jjelek', '$2y$10$V4LrKhTCYAhac8vmVBhfP.R.rxnj4f5MEwZZdswg3D1oYnl.yyLyS', ''),
('3209402601020003', 'Nashiruddin Sahal', 'nashiruddin@localhost.com', 'nashiruddin_sahal', '$2y$10$/LMUCO7N83clpsYBOYsqXOE6FaglG6v4taons0UDn5LDMr0/41AMa', '32432423'),
('3270987645670456', 'Rava', '', 'rava', '$2y$10$4KTY.iCR5jQtDYJ7aTaqQeV0RwbfSnG.0DRcUq24ctY8DNVGm/hnq', ''),
('9836467381765436', 'Hilyah Kamilah', '', 'hilyahkamilah', '$2y$10$EhZE0fgz919Yz9oIvXReRueMwxLtxuoVdtrNLG1vU/Exojr.A64Pi', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `subjek_pengaduan` varchar(256) NOT NULL,
  `tgl_pengaduan` timestamp NOT NULL DEFAULT current_timestamp(),
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('terkirim','terverifikasi','diproses','selesai','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_kategori`, `subjek_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(3, 5, 'Perbaikan Jalan Rusak', '2021-04-04 14:00:40', '3209402601020003', 'Assalamualaikum Warahmatullahi wabarakaatuh\r\n\r\nKepada pemerintah Kabupaten Cirebon, Bapak Fulan kami masyarakat berharap agar pemerintah segera memperaiki fasilitas publik yaitu jalan, saat ini kondisi jalan yang sangat memperihatinkan dan sangat berbahaya tentunya bagi para pengemudi yang berlalu lalang, oleh karena nya kami selaku masyarakat memohon agar segera di perbaiki agar jalan tersebut dapat digunakan dengan baik dan mengurangi angka kecelakaan akibat rusaknya jalan.\r\n\r\nterimakasih', '20210404_pengaduan_@3209402601020003_1617544840_166961d1847aaa5fbfc8.jpg', 'selesai'),
(5, 8, 'Kurang Semangat Lagi Dalam Urusan Hidup', '2021-04-06 14:35:24', '3209402601020003', 'selesaiselesaiselesaiselesaiselesaiselesaiselesaiselesaiselesai Kurang Semangat Lagi Dalam Urusan HidupKurang Semangat Lagi Dalam Urusan HidupKurang Semangat Lagi Dalam Urusan Hidup \r\n\r\nKurang Semangat Lagi Dalam Urusan HidupKurang Semangat Lagi Dalam Urusan HidupKurang Semangat Lagi Dalam Urusan HidupKurang Semangat Lagi Dalam Urusan HidupKurang Semangat Lagi Dalam Urusan Hidup\r\n\r\nKurang Semangat Lagi Dalam Urusan Hidup', '20210406_pengaduan_nashiruddin_sahal_1617719724_78e56d6380a6763f99b2.jpg', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `email`, `password`, `telp`, `level`) VALUES
(1, 'Sahal', 'sahal@bk-online.com', 'sahal@bk-online.com', '$2y$10$2mbJndRJha2zYNfa9OlCv.GWLWegWNC9ISSD.uZpWOBDui6iiXeKq', '085795567223', 'admin'),
(2, 'Arif', 'arif_as', 'arif@localhost.com', '$2y$10$wfxUmu/8W/IcXPMoacllsuV7JY8n0QBjmSQNgXwdyGpVcs5WcTC7m', '3242424', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(1, 3, '2021-04-06 13:33:51', 'terimakasih atas apresiasinya', 2),
(2, 5, '2021-04-06 14:41:10', 'Halo gannnn', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_pengaduan`
--
ALTER TABLE `kategori_pengaduan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`) USING BTREE,
  ADD KEY `id_kategori` (`id_kategori`) USING BTREE;

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD UNIQUE KEY `id_pengaduan` (`id_pengaduan`),
  ADD UNIQUE KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_pengaduan`
--
ALTER TABLE `kategori_pengaduan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengaduan_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_pengaduan` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
