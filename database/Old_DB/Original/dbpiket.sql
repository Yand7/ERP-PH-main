-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 04:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_guru`
--

CREATE TABLE `data_guru` (
  `id_guru` int(11) NOT NULL,
  `nm_guru` varchar(100) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tmpt_lahir` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `jabatan` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `rombel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_guru`
--

INSERT INTO `data_guru` (`id_guru`, `nm_guru`, `nik`, `tgl_lahir`, `tmpt_lahir`, `no_hp`, `jabatan`, `user`, `rombel`) VALUES
(1, 'Darell', '2323', '2000-03-16', 'Balai', '08232323232323', 3, 5, 1),
(2, 'Kevin Fernando, S.Pd', '4545', '1999-08-12', 'Batam', '0845454545', 1, 6, NULL),
(4, 'Norman Ang', '99999', '2000-08-16', 'Pinang', '08999999', 2, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_murid`
--

CREATE TABLE `data_murid` (
  `id_murid` int(11) NOT NULL,
  `nm_murid` varchar(100) DEFAULT NULL,
  `nis` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tmpt_lahir` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `jabatan` int(4) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `kelas` int(11) NOT NULL,
  `jadwal_piket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_murid`
--

INSERT INTO `data_murid` (`id_murid`, `nm_murid`, `nis`, `tgl_lahir`, `tmpt_lahir`, `no_hp`, `jabatan`, `user`, `kelas`, `jadwal_piket`) VALUES
(1, 'Ong Yan Da', '21161069', '2006-07-07', 'Singapura', '0815349680333', 4, 2, 1, 1),
(2, 'Andi Lau', '21161070', '2006-07-08', 'Cina', '0812345678', 5, 3, 6, 5),
(5, 'Jeky Chan', '21161071', '2006-08-16', 'Belakang Padang', '089191919191', 5, 7, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hari` int(11) NOT NULL,
  `hari` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hari`, `hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nm_jabatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nm_jabatan`) VALUES
(1, 'Kepala Sekolah'),
(2, 'Seksi Sarana dan Prasarana'),
(3, 'Wali Kelas'),
(4, 'Sekretaris Kelas'),
(5, 'Murid');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nm_jurusan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nm_jurusan`) VALUES
(1, 'RPL'),
(2, 'BDP'),
(3, 'AKL');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(4) NOT NULL,
  `nm_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nm_level`) VALUES
(1, 'Admin'),
(2, 'Kepala Sekolah'),
(3, 'Wali Kelas'),
(4, 'Seksi Sarana dan Prasarana'),
(5, 'Sekretaris Kelas'),
(6, 'Murid');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `aktivitas` text DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `aktivitas`, `tanggal`, `user`) VALUES
(1, 'User 5 Masuk ke Homepage', '2023-09-17 07:44:14', 5),
(2, 'User 1 Masuk ke Homepage', '2023-09-17 07:46:12', 1),
(3, 'User 1 Akses Data User', '2023-09-17 07:47:32', 1),
(4, 'User 1 Akses Data User', '2023-09-17 07:47:34', 1),
(5, 'User 1 Masuk ke Homepage', '2023-09-17 07:47:36', 1),
(6, 'User 1 Akses Data User', '2023-09-17 07:47:37', 1),
(7, 'User 1 Akses Data User', '2023-09-17 07:48:49', 1),
(8, 'User 1 Akses User Profile', '2023-09-17 07:48:51', 1),
(9, 'User 1 Akses Data Password', '2023-09-17 07:49:47', 1),
(10, 'User 1 Akses User Profile', '2023-09-17 07:50:19', 1),
(11, 'User 1 Akses Data Password', '2023-09-17 07:50:44', 1),
(12, 'User 1 Mengubah Password', '2023-09-17 07:50:48', 1),
(13, 'User 1 Akses User Profile', '2023-09-17 07:50:49', 1),
(14, 'User 1 Mengubah Profile', '2023-09-17 07:51:23', 1),
(15, 'User 1 Akses User Profile', '2023-09-17 07:51:23', 1),
(16, 'User 1 Mengubah Profile', '2023-09-17 07:51:25', 1),
(17, 'User 1 Akses User Profile', '2023-09-17 07:51:25', 1),
(18, 'User 1 Akses Data Laporan', '2023-09-17 07:52:19', 1),
(19, 'User 1 Masuk ke List Murid', '2023-09-17 07:52:55', 1),
(20, 'User 1 Masuk ke List Murid', '2023-09-17 07:54:23', 1),
(21, 'User 1 Akses Data Rombel 1', '2023-09-17 07:54:25', 1),
(22, 'User 1 Masuk ke List Murid', '2023-09-17 07:55:00', 1),
(23, 'User 1 Akses Data Penilaian', '2023-09-17 07:56:04', 1),
(24, 'User 1 Melakukan Pencarian Data Untuk Dinilai', '2023-09-17 07:57:24', 1),
(25, 'User 1 Akses Tampilan Nilai', '2023-09-17 07:58:54', 1),
(26, 'User 1 Akses Tampilan Nilai', '2023-09-17 08:00:16', 1),
(27, 'User 1 Akses Data User', '2023-09-17 08:01:41', 1),
(28, 'User 1 Akses Data User', '2023-09-17 08:01:44', 1),
(29, 'User 1 Akses Data User', '2023-09-17 08:01:54', 1),
(30, 'User 1 Masuk ke Import', '2023-09-17 08:01:54', 1),
(31, 'User 1 Masuk ke Import', '2023-09-17 08:02:35', 1),
(32, 'User 1 Masuk ke List Murid', '2023-09-17 08:04:04', 1),
(33, 'User  Masuk ke Tambah Rombel', '2023-09-17 08:04:05', NULL),
(34, 'User  Masuk ke Tambah Rombel', '2023-09-17 08:04:42', NULL),
(35, 'User 1 Melakukan Tambah Rombel', '2023-09-17 08:04:47', 1),
(36, 'User 1 Masuk ke List Murid', '2023-09-17 08:04:47', 1),
(37, 'User 1 Akses Data Rombel 1', '2023-09-17 08:06:04', 1),
(38, 'User 1 Masuk ke List Murid', '2023-09-17 08:06:05', 1),
(39, 'User 5 Masuk ke Homepage', '2023-09-17 08:06:24', 5),
(40, 'User 5 Akses Data Rombel 5', '2023-09-17 08:07:19', 5),
(41, 'User 5 Melakukan Set Siswa 1', '2023-09-17 08:07:32', 5),
(42, 'User 5 Akses Data Rombel 1', '2023-09-17 08:07:32', 5),
(43, 'User 5 Masuk ke Homepage', '2023-09-17 08:09:07', 5),
(44, 'User 5 Akses User Profile', '2023-09-17 08:09:08', 5),
(45, 'User 5 Akses Data Profile Details', '2023-09-17 08:09:09', 5),
(46, 'User 5 Mengedit Data Guru 1', '2023-09-17 08:10:41', 5),
(47, 'User 5 Akses Data Profile Details', '2023-09-17 08:10:41', 5),
(48, 'User 2 Masuk ke Homepage', '2023-09-17 08:11:28', 2),
(49, 'User 2 Akses User Profile', '2023-09-17 08:11:31', 2),
(50, 'User 2 Akses Data Profile Details', '2023-09-17 08:11:35', 2),
(51, 'User 2 Mengedit Data Murid 1', '2023-09-17 08:11:46', 2),
(52, 'User 2 Akses Data Profile Details', '2023-09-17 08:11:47', 2),
(53, 'User 2 Masuk ke Homepage', '2023-09-17 08:13:37', 2),
(54, 'User 2 Akses Data Laporan', '2023-09-17 08:13:39', 2),
(55, 'User 2 Print PDF', '2023-09-17 08:13:47', 2),
(56, 'User 2 Akses Data Laporan', '2023-09-17 08:14:10', 2),
(57, 'User  Masuk ke List Murid', '2023-09-17 08:15:52', NULL),
(58, 'User  Masuk ke Tambah Rombel', '2023-09-17 08:15:55', NULL),
(59, 'User 1 Masuk ke Homepage', '2023-09-17 08:16:20', 1),
(60, 'User 1 Logout', '2023-09-17 08:16:21', 1),
(61, 'User 5 Masuk ke Homepage', '2023-09-17 08:16:36', 5),
(62, 'User 5 Akses User Profile', '2023-09-17 08:16:37', 5),
(63, 'User 5 Akses Data Profile Details', '2023-09-17 08:16:38', 5),
(64, 'User 5 Akses Data Profile Details', '2023-09-17 08:18:06', 5),
(65, 'User 5 Akses Data Profile Details', '2023-09-17 08:18:29', 5),
(66, 'User 5 Akses Data Profile Details', '2023-09-17 08:18:40', 5),
(67, 'User 5 Akses Data Profile Details', '2023-09-17 08:19:17', 5),
(68, 'User 5 Akses Data Profile Details', '2023-09-17 08:19:38', 5),
(69, 'User 5 Akses Data Profile Details', '2023-09-17 08:19:58', 5),
(70, 'User 5 Akses Data Profile Details', '2023-09-17 08:20:36', 5),
(71, 'User 5 Akses Data Profile Details', '2023-09-17 08:21:07', 5),
(72, 'User 5 Akses User Profile', '2023-09-17 08:21:08', 5),
(73, 'User 5 Akses Data Profile Details', '2023-09-17 08:21:10', 5),
(74, 'User 5 Akses Data Profile Details', '2023-09-17 08:21:15', 5),
(75, 'User 2 Masuk ke Homepage', '2023-09-17 08:21:45', 2),
(76, 'User 2 Akses User Profile', '2023-09-17 08:21:46', 2),
(77, 'User 2 Akses Data Profile Details', '2023-09-17 08:21:47', 2),
(78, 'User 5 Akses Data Profile Details', '2023-09-17 08:22:35', 5),
(79, 'User 5 Akses Data Profile Details', '2023-09-17 08:23:16', 5),
(80, 'User 5 Akses Data Profile Details', '2023-09-17 08:23:30', 5),
(81, 'User 2 Akses Data Profile Details', '2023-09-17 08:24:30', 2),
(82, 'User 2 Akses Data Profile Details', '2023-09-17 08:24:38', 2),
(83, 'User 2 Akses Data Profile Details', '2023-09-17 08:24:43', 2),
(84, 'User 2 Akses Data Profile Details', '2023-09-17 08:25:01', 2),
(85, 'User 2 Akses Data Profile Details', '2023-09-17 08:25:51', 2),
(86, 'User 2 Akses Data Profile Details', '2023-09-17 08:25:54', 2),
(87, 'User 2 Akses User Profile', '2023-09-17 08:25:55', 2),
(88, 'User 2 Akses User Profile', '2023-09-17 08:25:56', 2),
(89, 'User 2 Akses Data Profile Details', '2023-09-17 08:25:57', 2),
(90, 'User 2 Akses Data Profile Details', '2023-09-17 08:26:20', 2),
(91, 'User 2 Akses User Profile', '2023-09-17 08:26:23', 2),
(92, 'User 2 Logout', '2023-09-17 08:26:27', 2),
(93, 'User 5 Akses Data Profile Details', '2023-09-17 08:26:33', 5),
(94, 'User 5 Logout', '2023-09-17 08:27:00', 5),
(95, 'User 6 Masuk ke Homepage', '2023-09-17 08:27:06', 6),
(96, 'User 6 Masuk ke List Murid', '2023-09-17 08:27:08', 6),
(97, 'User  Masuk ke Tambah Rombel', '2023-09-17 08:30:47', NULL),
(98, 'User 6 Melakukan Tambah Rombel', '2023-09-17 08:31:02', 6),
(99, 'User 6 Masuk ke List Murid', '2023-09-17 08:31:02', 6),
(100, 'User 6 Akses Data Rombel 10', '2023-09-17 08:31:04', 6),
(101, 'User 6 Masuk ke List Murid', '2023-09-17 08:31:05', 6),
(102, 'User  Masuk ke Tambah Rombel', '2023-09-17 08:34:31', NULL),
(103, 'User 6 Melakukan Tambah Rombel', '2023-09-17 08:34:35', 6),
(104, 'User 6 Masuk ke List Murid', '2023-09-17 08:34:35', 6),
(105, 'User  Masuk ke Tambah Rombel', '2023-09-17 08:36:30', NULL),
(106, 'User 6 Melakukan Tambah Rombel', '2023-09-17 08:36:34', 6),
(107, 'User 6 Masuk ke List Murid', '2023-09-17 08:36:34', 6),
(108, 'User  Masuk ke Tambah Rombel', '2023-09-17 08:39:21', NULL),
(109, 'User 6 Melakukan Tambah Rombel', '2023-09-17 08:39:25', 6),
(110, 'User 6 Masuk ke List Murid', '2023-09-17 08:39:25', 6),
(111, 'User 6 Akses Data Rombel 13', '2023-09-17 08:39:46', 6),
(112, 'User 6 Masuk ke List Murid', '2023-09-17 08:39:48', 6),
(113, 'User 5 Masuk ke Homepage', '2023-09-17 08:40:08', 5),
(114, 'User 5 Akses Data Rombel 5', '2023-09-17 08:40:10', 5),
(115, 'User 5 Akses User Profile', '2023-09-17 08:40:11', 5),
(116, 'User 5 Akses Data Profile Details', '2023-09-17 08:40:12', 5),
(117, 'User 5 Masuk ke Homepage', '2023-09-17 08:40:34', 5),
(118, 'User 5 Akses Data Penilaian', '2023-09-17 08:40:35', 5),
(119, 'User 5 Melakukan Pencarian Data Untuk Dinilai', '2023-09-17 08:40:44', 5),
(120, 'User 5 Akses Data Penilaian', '2023-09-17 08:41:52', 5),
(121, 'User 5 Melakukan Pencarian Data Untuk Dinilai', '2023-09-17 08:41:59', 5),
(122, 'User 5 Melakukan Pencarian Data Untuk Dinilai', '2023-09-17 08:42:19', 5),
(123, 'User 5 Melakukan Pencarian Data Untuk Dinilai', '2023-09-17 08:42:23', 5),
(124, 'User 5 Melakukan Pencarian Data Untuk Dinilai', '2023-09-17 08:42:30', 5),
(125, 'User 5 Melakukan Pencarian Data Untuk Dinilai', '2023-09-17 08:44:33', 5),
(126, 'User 5 Melakukan Pencarian Data Untuk Dinilai', '2023-09-17 08:44:54', 5),
(127, 'User 5 Melakukan Pencarian Data Untuk Dinilai', '2023-09-17 08:45:07', 5),
(128, 'User 5 Akses Data Rombel 5', '2023-09-17 08:45:29', 5),
(129, 'User 5 Akses Data Laporan', '2023-09-17 08:45:31', 5),
(130, 'User 5 Akses User Profile', '2023-09-17 08:45:32', 5),
(131, 'User 5 Akses Data Profile Details', '2023-09-17 08:45:34', 5),
(132, 'User 5 Akses Data Profile Details', '2023-09-17 08:46:08', 5),
(133, 'User 5 Akses User Profile', '2023-09-17 08:46:11', 5),
(134, 'User 5 Akses Data Password', '2023-09-17 08:46:16', 5),
(135, 'User 5 Logout', '2023-09-17 08:46:18', 5),
(136, 'User 6 Akses User Profile', '2023-09-17 08:46:22', 6),
(137, 'User 6 Logout', '2023-09-17 08:46:22', 6),
(138, 'User 1 Masuk ke Homepage', '2023-09-17 08:46:29', 1),
(139, 'User 1 Akses Data User', '2023-09-17 08:46:31', 1),
(140, 'User 1 Masuk ke Import', '2023-09-17 08:46:32', 1),
(141, 'User 1 Akses Data User', '2023-09-17 08:46:33', 1),
(142, 'User 1 Masuk ke Import', '2023-09-17 08:46:48', 1),
(143, 'User 1 Akses User Profile', '2023-09-17 08:46:50', 1),
(144, 'User 1 Akses Data User', '2023-09-17 08:46:51', 1),
(145, 'User 1 Akses Data User', '2023-09-17 08:48:22', 1),
(147, 'User 1 Akses Data Log Activity', '2023-09-17 08:53:31', 1),
(148, 'User 1 Akses Data Log Activity', '2023-09-17 08:53:39', 1),
(149, 'User 1 Akses Data Log Activity', '2023-09-17 08:53:52', 1),
(150, 'User 1 Logout', '2023-09-17 08:53:57', 1),
(151, 'User 5 Masuk ke Homepage', '2023-09-19 10:26:23', 5),
(152, 'User 5 Masuk ke Homepage', '2023-09-19 10:30:58', 5),
(153, 'User 5 Masuk ke Homepage', '2023-09-19 10:32:13', 5),
(154, 'User 5 Masuk ke Homepage', '2023-09-19 10:47:38', 5),
(155, 'User 5 Logout', '2023-09-19 11:47:53', 5),
(156, 'User 6 Melakukan Pencarian Data Ranking Piket', '2023-09-19 11:48:43', 6),
(157, 'User 6 Logout', '2023-09-19 11:48:45', 6),
(158, 'User 1 Masuk ke Homepage', '2023-09-19 11:49:06', 1),
(159, 'User 1 Masuk ke Homepage', '2023-09-19 11:50:11', 1),
(160, 'User 1 Masuk ke Homepage', '2023-09-19 11:50:34', 1),
(161, 'User 1 Akses Data Log Activity', '2023-09-19 11:50:37', 1),
(162, 'User 1 Masuk ke Homepage', '2023-09-19 11:50:42', 1),
(163, 'User 1 Masuk ke Homepage', '2023-09-19 11:52:03', 1),
(164, 'User 1 Masuk ke Homepage', '2023-09-19 11:52:38', 1),
(165, 'User 1 Akses Data User', '2023-09-19 11:52:41', 1),
(166, 'User 1 Masuk ke Homepage', '2023-09-19 11:52:42', 1),
(167, 'User 1 Akses Data Log Activity', '2023-09-19 11:52:43', 1),
(168, 'User 1 Masuk ke Homepage', '2023-09-19 11:52:46', 1),
(169, 'User 1 Logout', '2023-09-19 11:52:47', 1),
(170, 'User 1 Masuk ke Homepage', '2023-09-20 03:54:35', 1),
(171, 'User 1 Akses Data User', '2023-09-20 03:54:43', 1),
(172, 'User 1 Masuk ke Import', '2023-09-20 03:54:48', 1),
(173, 'User 1 Akses Data Log Activity', '2023-09-20 03:54:52', 1),
(174, 'User 1 Akses User Profile', '2023-09-20 03:55:00', 1),
(175, 'User 1 Akses Data Password', '2023-09-20 03:55:08', 1),
(176, 'User 1 Akses User Profile', '2023-09-20 03:55:11', 1),
(177, 'User 1 Logout', '2023-09-20 03:55:14', 1),
(178, 'User 2 Masuk ke Homepage', '2023-09-20 03:55:21', 2),
(179, 'User 2 Akses Data Laporan', '2023-09-20 03:55:23', 2),
(180, 'User 2 Akses User Profile', '2023-09-20 03:55:44', 2),
(181, 'User 2 Akses Data Profile Details', '2023-09-20 03:55:48', 2),
(182, 'User 2 Akses Data Profile Details', '2023-09-20 03:56:56', 2),
(183, 'User 2 Akses User Profile', '2023-09-20 03:57:01', 2),
(184, 'User 2 Logout', '2023-09-20 03:57:03', 2),
(185, 'User 5 Melakukan Pencarian Data Ranking Piket', '2023-09-20 03:57:45', 5),
(186, 'User 5 Akses Data Penilaian', '2023-09-20 03:58:15', 5),
(187, 'User 5 Akses Data Rombel 5', '2023-09-20 03:58:19', 5),
(188, 'User 5 Akses Data Laporan', '2023-09-20 03:58:27', 5),
(189, 'User 5 Akses User Profile', '2023-09-20 03:58:30', 5),
(190, 'User 5 Akses Data Profile Details', '2023-09-20 03:58:43', 5),
(191, 'User 5 Akses User Profile', '2023-09-20 03:58:53', 5),
(192, 'User 5 Logout', '2023-09-20 03:58:55', 5),
(193, 'User 1 Masuk ke Homepage', '2023-09-20 04:04:17', 1),
(194, 'User 1 Akses Data User', '2023-09-20 04:04:37', 1),
(195, 'User 1 Masuk ke Import', '2023-09-20 04:05:20', 1),
(196, 'User 1 Masuk ke Import', '2023-09-20 04:05:31', 1),
(197, 'User 1 Masuk ke Import', '2023-09-20 04:06:24', 1),
(198, 'User 1 Logout', '2023-09-20 04:06:25', 1),
(199, 'User 1 Masuk ke Homepage', '2023-09-20 04:07:23', 1),
(200, 'User 1 Akses Data User', '2023-09-20 04:07:39', 1),
(201, 'User 1 Masuk ke Import', '2023-09-20 04:07:49', 1),
(202, 'User 1 Melakukan Import User', '2023-09-20 04:08:15', 1),
(203, 'User 1 Akses Data User', '2023-09-20 04:08:15', 1),
(204, 'User 1 Akses Data User', '2023-09-20 04:08:23', 1),
(205, 'User 1 Masuk ke Import', '2023-09-20 04:08:48', 1),
(206, 'User 1 Melakukan Import User', '2023-09-20 04:08:53', 1),
(207, 'User 1 Akses Data User', '2023-09-20 04:08:53', 1),
(208, 'User 1 Masuk ke Import', '2023-09-20 04:09:22', 1),
(209, 'User 1 Akses Data User', '2023-09-20 04:09:26', 1),
(210, 'User 1 Akses Data User', '2023-09-20 04:09:29', 1),
(211, 'User 1 Masuk ke Import', '2023-09-20 04:10:01', 1),
(212, 'User 1 Melakukan Import User', '2023-09-20 04:10:06', 1),
(213, 'User 1 Akses Data User', '2023-09-20 04:10:06', 1),
(214, 'User 1 Masuk ke Import', '2023-09-20 04:10:45', 1),
(215, 'User 1 Melakukan Import User', '2023-09-20 04:10:49', 1),
(216, 'User 1 Akses Data User', '2023-09-20 04:10:50', 1),
(217, 'User 1 Akses Data User', '2023-09-20 04:11:03', 1),
(218, 'User 1 Masuk ke Import', '2023-09-20 04:11:04', 1),
(219, 'User 1 Akses Data User', '2023-09-20 04:11:08', 1),
(220, 'User 1 Masuk ke Import', '2023-09-20 04:12:39', 1),
(221, 'User 1 Akses Data User', '2023-09-20 04:13:05', 1),
(222, 'User 1 Masuk ke Import', '2023-09-20 04:13:50', 1),
(223, 'User 1 Akses Data User', '2023-09-20 04:13:54', 1),
(224, 'User 1 Logout', '2023-09-20 04:14:10', 1),
(225, 'User 1 Masuk ke Homepage', '2023-09-20 04:14:32', 1),
(226, 'User 1 Akses Data User', '2023-09-20 04:14:54', 1),
(227, 'User 1 Masuk ke Import', '2023-09-20 04:15:01', 1),
(228, 'User 1 Akses Data User', '2023-09-20 04:15:18', 1),
(229, 'User 1 Akses Data Log Activity', '2023-09-20 04:15:25', 1),
(230, 'User 1 Akses User Profile', '2023-09-20 04:15:43', 1),
(231, 'User 1 Mengubah Profile', '2023-09-20 04:15:54', 1),
(232, 'User 1 Akses User Profile', '2023-09-20 04:15:55', 1),
(233, 'User 1 Mengubah Profile', '2023-09-20 04:15:58', 1),
(234, 'User 1 Akses User Profile', '2023-09-20 04:15:58', 1),
(235, 'User 1 Akses Data Password', '2023-09-20 04:16:07', 1),
(236, 'User 1 Mengubah Password', '2023-09-20 04:16:29', 1),
(237, 'User 1 Akses User Profile', '2023-09-20 04:16:29', 1),
(238, 'User 1 Logout', '2023-09-20 04:16:34', 1),
(239, 'User 2 Masuk ke Homepage', '2023-09-20 04:16:44', 2),
(240, 'User 2 Akses Data Laporan', '2023-09-20 04:17:06', 2),
(241, 'User 2 Print Excel', '2023-09-20 04:17:21', 2),
(242, 'User 2 Print PDF', '2023-09-20 04:17:50', 2),
(243, 'User 2 Akses Data Laporan', '2023-09-20 04:18:00', 2),
(244, 'User 2 Akses User Profile', '2023-09-20 04:18:04', 2),
(245, 'User 2 Akses Data Profile Details', '2023-09-20 04:18:12', 2),
(246, 'User 2 Logout', '2023-09-20 04:18:41', 2),
(247, 'User 6 Melakukan Pencarian Data Ranking Piket', '2023-09-20 04:19:20', 6),
(248, 'User 6 Akses Data Penilaian', '2023-09-20 04:19:54', 6),
(249, 'User 6 Melakukan Pencarian Data Untuk Dinilai', '2023-09-20 04:20:18', 6),
(250, 'User 6 Akses Tampilan Nilai', '2023-09-20 04:20:21', 6),
(251, 'User 6 Melakukan Penilaian Pada Data 16', '2023-09-20 04:20:31', 6),
(252, 'User 6 Akses Data Penilaian', '2023-09-20 04:20:31', 6),
(253, 'User 2 Masuk ke Homepage', '2023-09-20 04:21:02', 2),
(254, 'User 2 Logout', '2023-09-20 04:21:10', 2),
(255, 'User 6 Masuk ke List Murid', '2023-09-20 04:21:14', 6),
(256, 'User 6 Akses Data Rombel 1', '2023-09-20 04:21:21', 6),
(257, 'User 6 Masuk ke List Murid', '2023-09-20 04:21:27', 6),
(258, 'User  Masuk ke Tambah Rombel', '2023-09-20 04:21:31', NULL),
(259, 'User 6 Melakukan Tambah Rombel', '2023-09-20 04:21:39', 6),
(260, 'User 6 Masuk ke List Murid', '2023-09-20 04:21:39', 6),
(261, 'User 6 Akses Data Rombel 14', '2023-09-20 04:21:43', 6),
(262, 'User 6 Masuk ke List Murid', '2023-09-20 04:21:45', 6),
(263, 'User 6 Akses Data Laporan', '2023-09-20 04:21:51', 6),
(264, 'User 6 Akses User Profile', '2023-09-20 04:21:55', 6),
(265, 'User 6 Akses Data Profile Details', '2023-09-20 04:22:00', 6),
(266, 'User 6 Logout', '2023-09-20 04:22:08', 6),
(267, 'User 5 Akses Data Penilaian', '2023-09-20 04:22:37', 5),
(268, 'User 5 Melakukan Pencarian Data Untuk Dinilai', '2023-09-20 04:22:47', 5),
(269, 'User 5 Akses Data Rombel 5', '2023-09-20 04:22:53', 5),
(270, 'User 5 Melakukan Set Siswa 1', '2023-09-20 04:23:12', 5),
(271, 'User 5 Akses Data Rombel 1', '2023-09-20 04:23:12', 5),
(272, 'User 5 Melakukan Set Siswa 1', '2023-09-20 04:23:17', 5),
(273, 'User 5 Akses Data Rombel 1', '2023-09-20 04:23:17', 5),
(274, 'User 5 Akses Data Laporan', '2023-09-20 04:23:20', 5),
(275, 'User 5 Akses User Profile', '2023-09-20 04:23:28', 5),
(276, 'User 5 Akses Data Profile Details', '2023-09-20 04:23:32', 5),
(277, 'User 5 Logout', '2023-09-20 04:23:43', 5),
(278, 'User 6 Masuk ke List Murid', '2023-09-20 04:25:08', 6),
(279, 'User 6 Akses Data Rombel 1', '2023-09-20 04:25:10', 6),
(280, 'User 6 Masuk ke List Murid', '2023-09-20 04:25:11', 6),
(281, 'User 6 Akses Data Rombel 14', '2023-09-20 04:25:13', 6),
(282, 'User 6 Masuk ke List Murid', '2023-09-20 04:25:14', 6),
(283, 'User 1 Masuk ke Homepage', '2023-09-21 05:56:38', 1),
(284, 'User 1 Akses Data User', '2023-09-21 06:07:17', 1),
(285, 'User 1 Masuk ke Import', '2023-09-21 06:13:00', 1),
(286, 'User 1 Akses Data Log Activity', '2023-09-21 06:15:53', 1),
(287, 'User 1 Akses Data Log Activity', '2023-09-21 06:24:53', 1),
(288, 'User 1 Akses Data Log Activity', '2023-09-21 06:25:19', 1),
(289, 'User 1 Akses User Profile', '2023-09-21 06:25:23', 1),
(290, 'User 1 Akses Data Password', '2023-09-21 06:34:32', 1),
(291, 'User 1 Logout', '2023-09-21 06:39:45', 1),
(292, 'User 6 Melakukan Pencarian Data Ranking Piket', '2023-09-21 08:04:52', 6),
(293, 'User 6 Akses Data Penilaian', '2023-09-21 08:07:33', 6),
(294, 'User 6 Melakukan Pencarian Data Untuk Dinilai', '2023-09-21 08:21:08', 6),
(295, 'User 6 Melakukan Pencarian Data Untuk Dinilai', '2023-09-21 08:21:32', 6),
(296, 'User 6 Akses Tampilan Nilai', '2023-09-21 08:27:56', 6),
(297, 'User 6 Akses Tampilan Nilai', '2023-09-21 08:29:25', 6),
(298, 'User 6 Akses Tampilan Nilai', '2023-09-21 08:39:48', 6),
(299, 'User 6 Melakukan Pencarian Data Untuk Dinilai', '2023-09-21 08:42:37', 6),
(300, 'User 6 Melakukan Pencarian Data Untuk Dinilai', '2023-09-21 08:42:52', 6),
(301, 'User 6 Melakukan Pencarian Data Untuk Dinilai', '2023-09-21 08:43:18', 6),
(302, 'User 6 Masuk ke List Murid', '2023-09-21 08:44:59', 6),
(303, 'User  Masuk ke Tambah Rombel', '2023-09-21 08:49:18', NULL),
(304, 'User 6 Masuk ke List Murid', '2023-09-21 08:51:20', 6),
(305, 'User 6 Akses Data Rombel 1', '2023-09-21 08:51:22', 6),
(306, 'User 6 Akses Data Laporan', '2023-09-21 08:54:44', 6),
(307, 'User 6 Akses User Profile', '2023-09-21 09:02:13', 6),
(308, 'User 6 Akses Data Profile Details', '2023-09-21 09:05:06', 6),
(309, 'User 6 Logout', '2023-09-21 09:07:11', 6),
(310, 'User 5 Akses Data Rombel 5', '2023-09-21 09:14:04', 5),
(311, 'User 5 Akses User Profile', '2023-09-21 09:22:46', 5),
(312, 'User 5 Akses Data Profile Details', '2023-09-21 09:22:48', 5),
(313, 'User 5 Logout', '2023-09-21 09:30:54', 5),
(314, 'User 2 Masuk ke Homepage', '2023-09-21 09:31:01', 2),
(315, 'User 1 Masuk ke Homepage', '2023-09-21 09:31:21', 1),
(316, 'User 1 Akses Data User', '2023-09-21 09:31:22', 1),
(317, 'User 1 Logout', '2023-09-21 09:31:29', 1),
(318, 'User 7 Masuk ke Homepage', '2023-09-21 09:31:40', 7),
(319, 'User 7 Logout', '2023-09-21 09:38:51', 7),
(320, 'User 2 Akses Data Laporan', '2023-09-21 09:38:57', 2),
(321, 'User 2 Akses User Profile', '2023-09-21 09:40:51', 2),
(322, 'User 2 Akses User Profile', '2023-09-21 09:41:50', 2),
(323, 'User 2 Akses Data Profile Details', '2023-09-21 09:47:30', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id_notif` int(11) NOT NULL,
  `murid` int(11) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id_notif`, `murid`, `isi`, `tanggal`) VALUES
(4, 3, 'Anda Mendapatkan Nilai Baik ', '2023-09-16'),
(5, 7, 'Anda Mendapatkan Nilai Baik ', '2023-09-16'),
(6, 2, 'Anda Mendapatkan Nilai Baik ', '2023-09-17'),
(7, 2, 'Anda Mendapatkan Nilai Baik ', '2023-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `piket`
--

CREATE TABLE `piket` (
  `id_piket` int(11) NOT NULL,
  `tanggal` date DEFAULT current_timestamp(),
  `rombel` int(11) DEFAULT NULL,
  `nilai` enum('Baik','Tidak Baik') DEFAULT NULL,
  `hari` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `piket`
--

INSERT INTO `piket` (`id_piket`, `tanggal`, `rombel`, `nilai`, `hari`) VALUES
(2, '2023-09-15', 6, 'Baik', 5),
(6, '2023-09-16', 3, 'Tidak Baik', 5),
(7, '2023-09-17', 1, 'Tidak Baik', 1),
(14, '2023-09-17', 1, 'Baik', 2),
(15, '2023-09-19', 1, 'Tidak Baik', 1),
(16, '2023-09-20', 1, 'Baik', 1),
(17, '2023-09-21', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id_rombel` int(11) NOT NULL,
  `nm_rombel` varchar(100) DEFAULT NULL,
  `jurusan` int(11) DEFAULT NULL,
  `guru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id_rombel`, `nm_rombel`, `jurusan`, `guru`) VALUES
(1, 'AKL 10A', 3, 5),
(2, 'AKL 10B', 3, NULL),
(3, 'BDP 11A', 2, NULL),
(4, 'BDP 11B', 2, NULL),
(5, 'RPL 12A', 1, NULL),
(6, 'RPL 12B', 1, NULL),
(7, 'RPL 12C', 1, NULL),
(8, 'BDP 11C', 2, NULL),
(14, 'aa', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(4) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `level`, `foto`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 'd3.jpg'),
(2, 'yan', 'yan@gmail.com', '911f6332e7f90b94b87f15377263995c', 5, 'DSC00039.jpg'),
(3, 'andi', 'andi@gmail.com', 'ce0e5bf55e4f71749eade7a8b95c4e46', 6, NULL),
(4, 'norman', 'norman@gmail.com', '9ac915832a9a1c970c1564708917c3aa', 4, 'nrm.jpg'),
(5, 'darel', 'darel@gmail.com', '6f7d16334740021db14730f717d3c793', 3, 'drl.jpeg'),
(6, 'kevin', 'kevin@gmail.com', '9d5e3ecdeb4cdb7acfd63075ae046672', 2, 'kep.jpg'),
(7, 'jeky', 'jeky@gmail.com', '767454b250481aa4d50fc9626846c56a', 6, 'jk.jpg'),
(18, 'budi', 'budi@gmail.com', 'budi', 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id_guru`) USING BTREE;

--
-- Indexes for table `data_murid`
--
ALTER TABLE `data_murid`
  ADD PRIMARY KEY (`id_murid`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `piket`
--
ALTER TABLE `piket`
  ADD PRIMARY KEY (`id_piket`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id_rombel`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_murid`
--
ALTER TABLE `data_murid`
  MODIFY `id_murid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `piket`
--
ALTER TABLE `piket`
  MODIFY `id_piket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
