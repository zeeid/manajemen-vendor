-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 04:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vendor_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_vendor`
--

CREATE TABLE `pembayaran_vendor` (
  `id` int(11) NOT NULL,
  `kode_pasangan` varchar(55) NOT NULL,
  `kode_vendor` varchar(55) NOT NULL,
  `jml_bayar` int(99) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `di_input_oleh` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran_vendor`
--

INSERT INTO `pembayaran_vendor` (`id`, `kode_pasangan`, `kode_vendor`, `jml_bayar`, `tgl_bayar`, `created_at`, `updated_at`, `deleted_at`, `di_input_oleh`) VALUES
(1, 'MASTER99', '1653443629', 111111, '2022-05-25', '2022-05-25 04:51:20', '2022-05-25 04:51:20', '2022-05-25 04:51:20', ''),
(2, 'MASTER99', '1653443629', 100000, '2022-05-25', '2022-05-25 04:51:20', '2022-05-25 04:51:20', '2022-05-25 04:51:20', ''),
(3, 'MASTER99', '1653443629', 200000, '2022-05-25', '2022-05-25 13:56:08', '2022-05-25 13:56:08', '0000-00-00 00:00:00', ''),
(4, 'MASTER99', '1653443595', 100000, '2022-05-26', '2022-05-26 17:02:05', '2022-05-26 17:02:05', '0000-00-00 00:00:00', ''),
(5, 'MASTER99', '1653443595', 100000, '2022-05-26', '2022-05-26 21:49:33', '2022-05-26 21:49:33', '0000-00-00 00:00:00', 'JUNDI HUSNI '),
(6, 'MASTER99', '1653443595', 200000, '2022-05-26', '2022-05-26 21:53:41', '2022-05-26 21:53:41', '0000-00-00 00:00:00', 'KARINA AYUK AZIZAH'),
(7, 'MASTER99', '1653443595', 600000, '2022-05-26', '2022-05-26 21:54:14', '2022-05-26 21:54:14', '0000-00-00 00:00:00', 'KARINA AYUK AZIZAH');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `sandi` varchar(55) NOT NULL,
  `wa` varchar(55) NOT NULL,
  `kode_pasangan` varchar(55) NOT NULL,
  `role` int(6) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 0,
  `nama_user` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `sandi`, `wa`, `kode_pasangan`, `role`, `created_at`, `updated_at`, `deleted_at`, `is_active`, `nama_user`) VALUES
(1, 'jundi', 'jundi', 'jundi', '', 'MASTER99', 911, NULL, NULL, NULL, 1, 'JUNDI HUSNI '),
(2, 'karin', 'karin', 'karin', '', 'MASTER99', 911, NULL, NULL, NULL, 1, 'KARINA AYUK AZIZAH');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `kode_vendor` varchar(55) NOT NULL,
  `nama_vendor` varchar(55) NOT NULL,
  `harga_vendor` int(9) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `kode_pasangan` varchar(55) NOT NULL,
  `jenis_vendor` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `kode_vendor`, `nama_vendor`, `harga_vendor`, `created_at`, `updated_at`, `deleted_at`, `kode_pasangan`, `jenis_vendor`) VALUES
(12, '1653443595', 'Fahmi', 7000000, '2022-05-25 08:53:15', '2022-05-25 08:53:15', '0000-00-00 00:00:00', 'MASTER99', 'MUA'),
(13, '1653443629', 'Joglo Dekorasi', 7500000, '2022-05-25 08:53:49', '2022-05-25 08:53:49', '0000-00-00 00:00:00', 'MASTER99', 'Dekorasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembayaran_vendor`
--
ALTER TABLE `pembayaran_vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran_vendor`
--
ALTER TABLE `pembayaran_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
