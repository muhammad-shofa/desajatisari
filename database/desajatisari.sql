-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 06, 2024 at 02:07 PM
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
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_publish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`berita_id`, `judul`, `penulis`, `gambar`, `isi`, `tanggal_publish`) VALUES
(1, 'Harga beras di desa Jatisari meningkat', 'admin001', '', 'Harga beras di desa Jatisari meningkat, hal ini menyebabkan banyak orang membeli beras dari luar desa atau bahkan kecamatan.', '2024-03-06'),
(2, 'Jalan berlubang kini mulai ditambal', 'admin001', '', 'Jalan berlubang didesa Jatisari kini mulai ditambal', '2024-03-08'),
(3, 'Testing', 'admin001', '', 'ini hanya testing', '2024-03-08'),
(4, 'testing 2', 'admin001', '', 'ini testing 2', '2024-03-08'),
(5, 'ererer', 'admin001', '', 'aklsmlkand', '2024-03-06'),
(6, 'qwqw', 'admin001', '', 'qwqw', '2024-03-07'),
(7, 'qqqq', 'admin001', '', 'qqqqq', '2024-03-06'),
(8, 'testing gambar', 'admin001', '', 'ini hanya testing gambar pada berita', '2024-03-10'),
(9, 'asasasas', 'admin001', '', 'asass', '2024-03-13');

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
(44, 11, 'wyxli', 'Slebew', 'Dingin tetapi tidak kejam', 'Belum', '2024-09-06 13:09:08');

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
(13, 'andreas', '4a27412e7953eadb2302b7dc9ca237fb40e7026a5842dd4b0e54533a5679006c', 'Andreas Al Andreas', 'andreas@gmail.com', '1999-06-16', 'Laki-Laki', 'User'),
(14, 'hello', 'd2cf302eadfe3152a449e098e91d1998f04342c5765718aa96cec6335538176e', 'hello hello', 'asas@sdsd.com', '2002-06-05', 'Perempuan', 'User'),
(16, 'jaya', '620d784dc2bbb0d554fecc32dc5b37f65231d0e497202492666a4c95a8d014c0', 'wijaya', 'wijaya@gmail.com', '1993-09-09', 'Laki-Laki', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_id`);

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
  MODIFY `berita_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `pengaduan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
