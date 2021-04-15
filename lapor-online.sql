-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 03:42 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
(1, 'Kebersihan Lingkungan'),
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
('1234567890123456', 'Hilyah Kamilah', 'hilyah@localhost.com', 'hilyahkamilah', '$2y$10$eQpXTVvWbxe1k.JU26QeXuDUYATr1eMzuOfMDf6.4LYdw2slPLJtC', '08232323'),
('7777777777777777', 'Nashiruddin Sahal', 'nashiruddin@localhost.com', 'nashiruddin.sahal', '$2y$10$xte5sAHEYsSgcoP7Eo5WEu2kv60kGAURqqx4KzoHfX5fV2atDlw4.', '32432423');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `subjek_pengaduan` varchar(256) NOT NULL,
  `tgl_pengaduan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('terkirim','terverifikasi','diproses','selesai','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_kategori`, `subjek_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(2, 5, 'Agar Pengadaan Tong Sampah Di Perbanyak', '2021-04-15 01:17:47', '7777777777777777', 'Kepada yth\r\nkepala dinas lingkungan hidup kota p. siantar prov. sumut\r\ndi tempat\r\n\r\ndengan hormat\r\npak kadis mohon agar dinas lingkungan hidup memperbanyak pengadaan tong sampah di sekitar jalan sutomo siantar karena kadang pejalan kaki bingung mau membuang sampah dimana. terimakasih', '20210415_pengaduan_@3209402601020003_1618447925_e3cfb38bae6f11dfe57e.jpeg', 'diproses'),
(3, 6, 'Kantor Karantina Batam Sampah', '2021-04-15 01:13:34', '7777777777777777', 'Dear bapak/ibu,\r\nsejak covid 19 kantor karantina batam dengan semena-mena menggunakan kekuasaan mereka dengan alasan covid dan aturan dari pusat. awalnya swab test di lakukan oleh kantor karantina dan di kenakan tarif 3jt/pax dan setelah di tegur oleh dprd batam mereka tidak berani lagi melakukan swab test. dan sekarang mereka mempermainkan aturan untuk mendapatkan uang.\r\n\r\nmohon untuk dapat di periksa kantor karantina batam, atas nama dr. yuli dan dr. yenni.\r\nmereka dengan sesuka hati merubah aturan untuk orang asing sehingga membuat kami pengusaha di batam sangat sangat terganggu dengan bisnis kami. mereka bisa merubah aturan dalam waktu jam dan hari tanpa ada pemberitahuan dan surat edaran. tetapi begitu di kasih uang semua jadi lancar.. mohon untuk di periksa hal ini.\r\n\r\nkarena hal ini pebisnis asing jadi takut masuk ke batam karena mereka anggap aturan pemerintah indonesia seperti jebakan bagi mereka, begitu masuk aturan langsung berubah dan hal ini membuat kami para pengusaha harus jadi kambing hitam kantor karantina.\r\n\r\nmohon di tinjau kembali aturan khusus batam jangan di samakan dengan jakarta dan kota lainnya.', '20210415_pengaduan_@3209402601020003_1618448029_32005b6a3ccba5b464c8.jpeg', 'terverifikasi'),
(4, 2, 'Permohonan Informasi', '2021-04-15 01:37:24', '1234567890123456', 'Ayah saya wafat tahun 1967 di pematang siantar dengan kependudukan pematang siantar. tidak ada surat keterangan kematian dari kepala desa maupun rumah sakit. tidak ada ktp maupun kk. tidak ada akte lahir maupun akta nikah.\r\n\r\nibu saya juga sudah meninggal di bogor tahun 2001 dan hanya ada surat keterangan kematian dari kepala desa (asli) dan dari rumah sakit (fotokopi). tidak ada dokumen lain. sebagai anaknya, saya memiliki ktp, kk dan surat kenal lahir. saya tinggal di depok (jawa barat).\r\n\r\nsaat ini saya membutuhkan surat keterangan kematian ayah saya untuk membuat surat pernyataan waris. menurut info yang saya peroleh, surat keterangan kematian bisa diurus ke dukcapil pematang siantar.\r\n- bagaimana cara mengurusnya?\r\n- dokumen apa saja yang perlu dipersiapkan?\r\n- apakah bias diwakilkan pengurusannya oleh sanak keluarga yang di sana?', '20210415_pengaduan_hilyahkamilah_1618448333_5f82be0dd5fbbd4d9ce0.png', 'selesai'),
(6, 7, 'Gawang Rusak', '2021-04-15 01:36:57', '1234567890123456', 'Gawang Rusak', '20210415_pengaduan_hilyahkamilah_1618450583_d128df53f972fb03cf6a.jpg', 'ditolak');

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
(1, 'Administrator', 'admin', 'admin@localhost.com', '$2y$10$HstTfUVluV.40QuhfzCzQu2eDfv4ItOcyomm04mKf9KFqvlMg7H0K', '0882636232', 'admin'),
(2, 'Petugas', 'petugas', 'petugas@localhost.com', '$2y$10$XUfyFBTHac7J7rOna7WsT.AAtWb/qYMRhOG.ynoiaqKEpdieNAci6', '23424324', 'petugas');

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
(1, 4, '2021-04-15 01:06:35', 'Silahkan lihat di www.google.com', 2),
(3, 2, '2021-04-15 01:19:00', 'Terimakasih atas laporan nya,segera kami selaku pemerintah menanggapinya', 2);

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
  ADD KEY `id_petugas` (`id_petugas`) USING BTREE,
  ADD KEY `id_pengaduan` (`id_pengaduan`) USING BTREE;

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
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
