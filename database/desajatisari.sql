-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2024 at 04:02 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desajatisari`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `berita_id` int NOT NULL,
  `uuid` char(36) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_publish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`berita_id`, `uuid`, `judul`, `penulis`, `isi`, `tanggal_publish`) VALUES
(16, 'd85262c0-2fb3-49c9-b35e-42917394ab32', 'tes 1', 'tes', 'tes', '2024-09-22'),
(17, 'd8d0d55c-a137-484c-ba8c-5e4ca8abbbfb', 'tes ke 2', 'admin001', 'tes ke 2', '2024-09-22'),
(18, '45536a09-c6c1-40be-a217-015fbe860dae', 'tes ke 3', 'tes ke 3', 'tes ke 3', '2024-09-22'),
(19, '3fdc4a0b-c9cd-48db-83a2-cb2c8957e259', 'tes ke 4', 'tes ke 4', 'tes ke 4', '2024-09-22'),
(20, '4ff4ce6b-85a5-4cec-a628-46b68230b229', 'Kemajuan UMKM di Tuban Dorong Pertumbuhan Ekonomi Lokal', 'admin001', 'Tuban, sebuah kota di Jawa Timur, telah menjadi salah satu pusat pertumbuhan ekonomi melalui Usaha Mikro, Kecil, dan Menengah (UMKM). Dalam beberapa tahun terakhir, UMKM di Tuban mengalami kemajuan pesat berkat dukungan pemerintah daerah serta berbagai program pemberdayaan. Salah satu contoh sukses adalah sektor kerajinan batik yang kini menembus pasar nasional. Selain itu, digitalisasi usaha semakin membantu pelaku UMKM untuk memasarkan produk secara online, memperluas jangkauan pasar. Dampaknya, lapangan kerja meningkat dan perekonomian lokal tumbuh signifikan.\r\n\r\nPemerintah Kabupaten Tuban terus mendorong inovasi dalam UMKM dengan memberikan pelatihan, pendampingan, serta akses modal bagi para pelaku usaha. Program seperti Tuban Go Digital juga memfasilitasi UMKM dalam memahami penggunaan platform digital untuk mengembangkan bisnis mereka. Dalam sektor kuliner, produk lokal seperti olahan hasil laut dan makanan khas Tuban kini semakin dikenal, didorong oleh pemasaran yang lebih modern.\r\n\r\nMeskipun demikian, UMKM di Tuban masih menghadapi beberapa tantangan, seperti keterbatasan infrastruktur dan akses terhadap bahan baku yang terkadang menghambat produksi. Namun, dengan adanya kerjasama antara pemerintah, pihak swasta, dan komunitas UMKM, harapan untuk menjadikan Tuban sebagai pusat UMKM yang kompetitif di tingkat nasional semakin terbuka lebar.\r\n\r\nInisiatif lain yang mendorong pertumbuhan ini adalah integrasi dengan sektor pariwisata lokal, di mana produk-produk UMKM sering kali dijadikan suvenir bagi para wisatawan. Dengan terus mendorong inovasi, memperluas jaringan pemasaran, serta meningkatkan kualitas produk, UMKM di Tuban diyakini akan terus berkembang pesat dan menjadi motor penggerak utama perekonomian daerah.', '2024-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `komentar_id` int NOT NULL,
  `user_id` int NOT NULL,
  `berita_id` int NOT NULL,
  `isi_komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`komentar_id`, `user_id`, `berita_id`, `isi_komentar`) VALUES
(1, 11, 19, 'Biasa saja'),
(2, 12, 19, 'tes'),
(3, 12, 19, 'tes dari web menggunaan user admin001'),
(4, 12, 19, 'tes lagi pake akun admin hehe'),
(5, 12, 19, 'testinggggg'),
(6, 12, 19, 'testing 2'),
(7, 12, 19, 'WWWWWWWW'),
(8, 12, 19, 'GGGGG'),
(9, 12, 19, 'keren'),
(10, 12, 19, 'jajajaajajaj'),
(11, 12, 18, 'ini teskomentar untuk berita 3 dari admin hehe'),
(12, 11, 18, 'halo saya wyxli'),
(13, 12, 20, 'keren'),
(14, 18, 20, 'mantap');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `pengaduan_id` int NOT NULL,
  `user_id` int NOT NULL,
  `pengirim` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `judul` varchar(255) NOT NULL,
  `aduan` text NOT NULL,
  `status_dibaca` enum('Sudah','Belum') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Belum',
  `tanggal_pengaduan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`pengaduan_id`, `user_id`, `pengirim`, `judul`, `aduan`, `status_dibaca`, `tanggal_pengaduan`) VALUES
(41, 12, 'admin001', 'Testing judul 1 dari admin', 'Testing aduan 1 dari admin', 'Sudah', '2024-09-06 12:58:57'),
(42, 11, 'wyxli', 'Dari wyxli hehehe', 'Ini aduannya hehehe', 'Belum', '2024-09-06 13:08:12'),
(43, 11, 'wyxli', 'Lagi ah', 'Lagi dan lagi', 'Sudah', '2024-09-06 13:08:54'),
(44, 11, 'wyxli', 'Slebew', 'Dingin tetapi tidak kejam', 'Belum', '2024-09-06 13:09:08'),
(45, 18, 'lin', 'tes', 'tes', 'Belum', '2024-09-09 07:56:25'),
(46, 12, 'admin001', 'bocil caper', 'bocil caper', 'Belum', '2024-09-09 09:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_lengkap` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `role` enum('Admin','Petugas','User') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `nama_lengkap`, `email`, `tanggal_lahir`, `jenis_kelamin`, `role`) VALUES
(11, 'wyxli', '28c7de832b835a54df2ea5cbc670cb2804a8e9bd4f769dfe5f3d0947d6517196', 'Wyxli Al Wyxli', 'wyxli@gmail.com', '2006-07-04', 'Laki-Laki', 'User'),
(12, 'admin001', '9843d7cad8fbd2f41e5f1e3867464553d0226ca09b0337f0ec0a24d2d35cff28', 'Admin Desa Jatisari', 'admindesajatisari@gmail.com', '1996-07-09', 'Laki-Laki', 'Admin'),
(16, 'wijaya', '620d784dc2bbb0d554fecc32dc5b37f65231d0e497202492666a4c95a8d014c0', 'wijaya', 'wijaya@gmail.com', '1993-09-09', 'Laki-Laki', 'User'),
(18, 'lin', 'a25f40e477e345f22d13fadb1c3d066a8bc98a92759990185fb45c905609e004', 'linda', 'linda@gmail.com', '2007-09-07', 'Perempuan', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentar_id`),
  ADD KEY `berita_id` (`berita_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`pengaduan_id`),
  ADD KEY `fr` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `berita_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentar_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `pengaduan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `berita_id` FOREIGN KEY (`berita_id`) REFERENCES `berita` (`berita_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
