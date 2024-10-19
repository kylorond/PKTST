-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 08:31 AM
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
-- Database: `pktst`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `pass_backup` varchar(45) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'user',
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `pass_backup`, `level`, `foto`) VALUES
(9, 'Admin', 'satu@dua.tiga', '0192023a7bbd73250516f069df18b500', '0192023a7bbd73250516f069df18b500', 'admin', ''),
(2128, 'Nama Lengkap', 'satu@dua.com', 'b93939873fd4923043b9dec975811f66', 'tes123', 'user', NULL),
(2132, 'Pengguna Kedua', 'helo@tes.com', '6e7906b7fb3f8e1c6366c0910050e595', 'testes', 'user', NULL),
(2133, 'Pengguna Ketiga', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'user', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi`
--

CREATE TABLE `verifikasi` (
  `id` int(11) NOT NULL,
  `nama_desa` varchar(45) NOT NULL,
  `nama_pemilik` varchar(45) NOT NULL,
  `tanggal_regis` date NOT NULL,
  `alamat_tanah` text NOT NULL,
  `panjang` int(50) NOT NULL,
  `lebar` int(50) NOT NULL,
  `luas` int(50) NOT NULL,
  `sertifikat` varchar(255) NOT NULL,
  `status` enum('Pengajuan Baru','Lolos Verifikasi','Tidak Lolos Verifikasi','Pendaftar Baru') NOT NULL DEFAULT 'Pendaftar Baru',
  `warga_id` int(11) NOT NULL,
  `tanggal_submit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_verifikasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verifikasi`
--

INSERT INTO `verifikasi` (`id`, `nama_desa`, `nama_pemilik`, `tanggal_regis`, `alamat_tanah`, `panjang`, `lebar`, `luas`, `sertifikat`, `status`, `warga_id`, `tanggal_submit`, `tanggal_verifikasi`) VALUES
(20, 'Nama Desa', 'Nama Pemilik SPT', '2024-10-19', 'Alamat Tanah', 30, 30, 900, '.png', 'Tidak Lolos Verifikasi', 17, '2024-10-19 03:32:26', '2024-10-19'),
(21, 'Nama Desa', 'Nama Pemilik SPT', '2024-10-19', 'Alamat Tanah', 20, 20, 40, '.png', 'Pengajuan Baru', 18, '2024-10-19 03:22:25', '0000-00-00'),
(22, 'Nama Desa', 'Nama Pemilik SPT', '2024-10-19', 'Alamat Tanah', 10, 10, 100, '.png', 'Lolos Verifikasi', 19, '2024-10-19 03:32:17', '2024-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `pekerjaan` text NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id`, `nama`, `jenis_kelamin`, `pekerjaan`, `no_ktp`, `alamat`, `users_id`) VALUES
(10, 'Ronaldo Dwi ANaku Aminu', 'Laki-laki', 'Pekerjaan', '123123123', 'Alamat', 19),
(17, 'Nama Lengkap', 'Laki-laki', 'Pekerjaan', '123123123123', 'Alamat', 2128),
(18, 'Nama Lengkap Kedua', 'Laki-laki', 'Pekerjaan ', '321321321', 'Alamat ', 2132),
(19, 'Nama Lengkap Ketiga', 'Perempuan', 'Pekerjaan', '112233112233', 'Alamat', 2133),
(20, 'Tes ja bro', 'Laki-laki', '', '', '', 2134);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tanah_id` (`warga_id`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_id` (`users_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2135;

--
-- AUTO_INCREMENT for table `verifikasi`
--
ALTER TABLE `verifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
