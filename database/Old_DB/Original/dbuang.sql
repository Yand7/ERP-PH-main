-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 12:56 AM
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
-- Database: `dbuang`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `rombel` int(11) NOT NULL,
  `blok` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `persen` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `siswa`, `tanggal`, `status`, `rombel`, `blok`, `tahun`, `persen`, `created_at`, `updated_at`, `deleted_at`) VALUES
(34, 2, '2023-10-15', 'I', 3, 2, 2, '1', '2023-10-15 17:35:08', '2023-10-15 17:35:08', NULL),
(35, 9, '2023-10-15', 'S', 3, 2, 2, '1', '2023-10-15 17:35:08', '2023-10-15 17:35:08', NULL),
(36, 2, '2023-10-16', 'H', 3, 2, 2, '2', '2023-10-15 17:35:08', '2023-10-15 17:35:08', NULL),
(37, 9, '2023-10-16', 'H', 3, 2, 2, '2', '2023-10-15 17:35:08', '2023-10-15 17:35:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `nama_agama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Islam', '2023-11-05 15:32:07', NULL, NULL),
(2, 'Kristen', '2023-11-05 15:32:07', NULL, NULL),
(3, 'Katolik', '2023-11-05 15:32:07', NULL, NULL),
(4, 'Hindu', '2023-11-05 15:32:07', NULL, NULL),
(5, 'Buddha', '2023-11-05 15:32:07', NULL, NULL),
(6, 'Konghucu', '2023-11-05 15:32:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blok`
--

CREATE TABLE `blok` (
  `id_blok` int(11) NOT NULL,
  `nama_b` varchar(255) NOT NULL,
  `statuss` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blok`
--

INSERT INTO `blok` (`id_blok`, `nama_b`, `statuss`, `semester`, `created_at`) VALUES
(2, '1', 'Aktif', 1, '2023-10-15 02:06:42'),
(3, '2', 'Tidak-Aktif', 1, '2023-10-15 02:06:43'),
(4, '3', 'Tidak-Aktif\r\n', 1, '2023-10-15 02:06:44'),
(5, '4', 'Tidak-Aktif\r\n', 1, '2023-10-15 02:06:45'),
(6, '5', 'Tidak-Aktif\r\n', 2, '2023-10-15 02:06:46'),
(7, '6', 'Tidak-Aktif\r\n', 2, '2023-10-15 02:06:47'),
(8, '7', 'Tidak-Aktif\r\n', 2, '2023-10-15 02:06:48'),
(9, '8', 'Tidak-Aktif\r\n', 2, '2023-10-15 02:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_denda` int(4) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `nama_denda` varchar(1000) NOT NULL,
  `jenis_transaksi` varchar(20) NOT NULL,
  `mata_uang` varchar(100) NOT NULL,
  `nominal` varchar(1000) NOT NULL,
  `remark_denda` varchar(1000) NOT NULL,
  `persetujuan_k` varchar(50) NOT NULL,
  `tanggal_denda` date NOT NULL DEFAULT current_timestamp(),
  `maker_denda` int(4) NOT NULL,
  `denda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id_denda`, `id_kelas`, `nama_denda`, `jenis_transaksi`, `mata_uang`, `nominal`, `remark_denda`, `persetujuan_k`, `tanggal_denda`, `maker_denda`, `denda`) VALUES
(13, 12, '12', '12', '12', '12', '12', '', '2023-08-09', 1, ''),
(15, 5, 'Kelsey', 'Cash', 'Rupiah (RP)', '10.000', 'telat', 'Approved', '2023-08-09', 2, '10.000'),
(17, 10, 'Oktarianto Lika Ng', 'Cash', 'Rupiah (RP)', '10.000', 'toxic in the class', 'Approved', '2023-08-09', 2, '10.000'),
(18, 12, '12', '', '', '', '12', '', '2023-08-09', 15, '12');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `rombel` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nik`, `nama`, `rombel`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, '11223334', 'Pak If', 3, 8, '2023-10-02 22:06:49', NULL, NULL),
(9, '2658', 'Pak Ray', 4, 14, '2023-10-10 00:11:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jk` int(11) NOT NULL,
  `nama_jk` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jk`, `nama_jk`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Laki - laki', '2023-11-05 15:34:54', NULL, NULL),
(2, 'Perempuan', '2023-11-05 15:34:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `nama_jenjang` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SMP', '2023-10-02 23:01:48', NULL, NULL),
(2, 'SMK', '2023-10-02 23:01:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'RPL', '2023-10-02 10:56:57', NULL, NULL),
(3, 'AKL', '2023-10-02 11:18:54', NULL, NULL),
(4, 'BDP', '2023-10-03 01:42:21', NULL, NULL),
(5, 'SMP', '2023-10-03 01:44:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `total_siswa` varchar(100) NOT NULL,
  `remark_k` varchar(1000) NOT NULL,
  `tanggal_k` date NOT NULL DEFAULT current_timestamp(),
  `wali_kelas` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `maker_kelas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `total_siswa`, `remark_k`, `tanggal_k`, `wali_kelas`, `created_at`, `updated_at`, `deleted_at`, `maker_kelas`) VALUES
(2, '12', '10', '10', '2024-01-13', 'Pak Ray', '2023-10-02 10:56:48', NULL, NULL, 15),
(5, '11', '', '', '2024-01-13', NULL, '2023-10-03 01:41:46', NULL, NULL, 0),
(7, '10', '', '', '2024-01-13', NULL, '2023-10-03 01:41:57', NULL, NULL, 0),
(8, '9', '10', '10', '2024-01-13', 'Pak Ray', '2023-10-03 01:42:02', NULL, NULL, 0),
(9, '8', '', '', '2024-01-13', NULL, '2023-10-03 01:43:32', NULL, NULL, 0),
(14, '7', '', '', '2024-01-13', NULL, '2023-10-03 01:43:57', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_perizinan`
--

CREATE TABLE `keterangan_perizinan` (
  `id_keterangan` int(11) NOT NULL,
  `nama_keterangan` varchar(255) NOT NULL,
  `kode_keterangan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keterangan_perizinan`
--

INSERT INTO `keterangan_perizinan` (`id_keterangan`, `nama_keterangan`, `kode_keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Izin', 'I', '2023-10-10 08:45:36', NULL, NULL),
(2, 'Sakit', 'S', '2023-10-10 08:45:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', '2023-10-09 19:57:33', NULL, NULL),
(2, 'Admin', '2023-10-09 19:57:33', NULL, NULL),
(3, 'Guru', '2023-10-09 19:57:33', NULL, NULL),
(4, 'Orang Tua', '2023-10-09 19:57:33', NULL, NULL),
(5, 'Sekretaris', '2023-10-15 14:22:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `jenis`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bahasa Inggris', 'Bahasa Asing', '2023-11-01 05:35:50', NULL, NULL),
(3, 'Bahasa Indonesia', 'Muatan Lokal', '2023-11-05 21:32:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `pengetahuan` varchar(255) NOT NULL,
  `keterampilan` varchar(255) NOT NULL,
  `blok` int(11) NOT NULL,
  `mapel` int(11) NOT NULL,
  `rombel` int(11) NOT NULL,
  `guru` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `siswa`, `pengetahuan`, `keterampilan`, `blok`, `mapel`, `rombel`, `guru`, `tahun`, `created_at`) VALUES
(24, 8, '100', '100', 9, 3, 4, 9, 2, '2023-11-10 22:10:36'),
(26, 2, '55', '66', 2, 1, 3, 4, 2, '2023-11-10 22:11:08'),
(28, 9, '40', '80', 2, 3, 3, 9, 2, '2023-11-12 21:38:52'),
(29, 2, '88', '77', 2, 3, 3, 9, 2, '2023-11-12 21:38:52'),
(30, 9, '55', '67', 3, 1, 3, 4, 2, '2023-11-12 22:36:38'),
(31, 2, '35', '45', 3, 1, 3, 4, 2, '2023-11-12 22:36:38'),
(32, 9, '42', '23', 3, 3, 3, 9, 2, '2023-11-12 22:37:01'),
(33, 2, '99', '88', 3, 3, 3, 9, 2, '2023-11-12 22:37:01'),
(34, 9, '56', '65', 9, 1, 3, 9, 2, '2023-11-14 10:53:38'),
(35, 2, '88', '99', 9, 1, 3, 9, 2, '2023-11-14 10:53:38'),
(36, 9, '99', '87', 9, 3, 3, 9, 2, '2023-11-14 10:56:18'),
(37, 2, '68', '99', 9, 3, 3, 9, 2, '2023-11-14 10:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `rombel` int(11) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` int(11) NOT NULL,
  `agama` int(11) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `asal_sekolah` text NOT NULL,
  `nama_ayah` text NOT NULL,
  `nama_ibu` text NOT NULL,
  `pekerjaan_ortu` text NOT NULL,
  `alamat_kantor_ortu` text NOT NULL,
  `gambar_akta_lahir` text DEFAULT NULL,
  `gambar_kk` text DEFAULT NULL,
  `gambar_ijazah` text DEFAULT NULL,
  `gambar_3x4` text DEFAULT NULL,
  `gambar_invoice` text DEFAULT NULL,
  `kondisi` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `nik`, `password`, `nama_lengkap`, `rombel`, `tempat_lahir`, `tanggal_lahir`, `jk`, `agama`, `no_hp`, `alamat`, `asal_sekolah`, `nama_ayah`, `nama_ibu`, `pekerjaan_ortu`, `alamat_kantor_ortu`, `gambar_akta_lahir`, `gambar_kk`, `gambar_ijazah`, `gambar_3x4`, `gambar_invoice`, `kondisi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '789', 'c4ca4238a0b923820dcc509a6f75849b', 'Ari Setia Firmansyah', 14, 'Batam', '2023-11-06', 1, 1, '0215', 'Perumahan Ari', 'Sekolah Lama', 'Ayah Ari', 'Ibu Ari', 'Miliyarder', 'Kantor Ari', 'akta lahir_1.jpg', 'KK_1.png', 'Ijazah_1.png', '09cc212f504c5a6f4097745675f8a093.jpg', '06-home-1591235609.png', 1, '2023-11-06 23:50:06', '2023-11-20 21:12:49', NULL),
(7, '9018', 'c4ca4238a0b923820dcc509a6f75849b', 'Richard', 14, 'Batam', '2023-11-13', 1, 5, '08219', 'Rumah Richard', 'Sekolah Richard', 'Ayah Richard', 'Ibu Richard', 'Bos', 'Kantor Richard', 'akta lahir.jpg', 'KK.png', 'Ijazah.png', NULL, NULL, 1, '2023-11-13 08:27:25', '2023-11-14 11:17:28', NULL),
(8, '159', 'c4ca4238a0b923820dcc509a6f75849b', 'Fauzi', 16, 'Batam', '2023-11-15', 1, 1, '0147', 'Rumah Fauzi', 'Sekolah Fauzi', 'Ayah Fauzi', 'Ibu Fauzi', 'Bos', 'Kantor Fauzi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-15 21:47:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(4) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `jenis_transaksi` varchar(20) NOT NULL,
  `mata_uang` varchar(100) NOT NULL,
  `nominal` varchar(1000) NOT NULL,
  `remark_p` varchar(1000) NOT NULL,
  `persetujuan_k` varchar(20) NOT NULL,
  `tanggal_p` date NOT NULL DEFAULT current_timestamp(),
  `maker_p` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `id_kelas`, `jenis_transaksi`, `mata_uang`, `nominal`, `remark_p`, `persetujuan_k`, `tanggal_p`, `maker_p`) VALUES
(8, 5, 'Cash', 'Rupiah (RP)', '1.000.000', 'make yearbook photos', 'Approved', '2023-07-22', 2),
(11, 12, 'Debit', 'Malaysian Ringgits (MYR)', '11', '111', 'Approved', '2023-07-23', 2),
(12, 10, 'Cash', 'Brunei Dolar (BND)', '2.000', 'beli baju', 'Approved', '2023-08-04', 25);

-- --------------------------------------------------------

--
-- Table structure for table `perizinan`
--

CREATE TABLE `perizinan` (
  `id_perizinan` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(11) NOT NULL,
  `alasan` text NOT NULL,
  `foto` text DEFAULT '-',
  `rombel` int(11) NOT NULL,
  `blok` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perizinan`
--

INSERT INTO `perizinan` (`id_perizinan`, `siswa`, `tanggal`, `status`, `alasan`, `foto`, `rombel`, `blok`, `tahun`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '2023-10-15', 'I', 'Buat Paspor', 'surat1.jpg', 3, 2, 2, '2023-10-11 20:17:15', NULL, NULL),
(2, 9, '2023-10-15', 'S', 'Buat KTP', 'surat1.jpg', 3, 3, 3, '2023-10-12 20:17:15', NULL, NULL),
(3, 8, '2023-10-15', 'I', 'Buat KTP2', 'surat1.jpg', 4, 3, 3, '2023-10-12 20:17:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id_rombel` int(11) NOT NULL,
  `nama_r` varchar(255) NOT NULL,
  `kelas` int(11) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `jenjang` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id_rombel`, `nama_r`, `kelas`, `jurusan`, `jenjang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'A', 2, 2, 2, '2023-10-02 11:20:10', NULL, NULL),
(3, 'B', 2, 2, 2, '2023-10-02 21:22:33', NULL, NULL),
(4, 'C', 2, 2, 2, '2023-10-03 01:42:57', NULL, NULL),
(5, 'A', 5, 2, 2, '2023-10-03 01:43:05', NULL, NULL),
(6, 'B', 5, 2, 2, '2023-10-03 01:43:12', NULL, NULL),
(7, 'C', 9, 5, 1, '2023-10-03 01:45:03', NULL, NULL),
(8, 'A', 14, 5, 1, '2023-10-03 01:45:09', NULL, NULL),
(9, 'B', 8, 5, 1, '2023-10-03 01:45:19', NULL, NULL),
(10, 'C', 14, 5, 1, '2023-10-03 01:45:33', NULL, NULL),
(11, 'A', 9, 5, 1, '2023-10-03 01:45:41', NULL, NULL),
(12, 'B', 14, 5, 1, '2023-10-03 01:45:48', NULL, NULL),
(14, 'Baru', 7, 2, 2, '2023-10-02 11:20:10', NULL, NULL),
(15, 'Baru', 7, 3, 2, '2023-10-03 01:43:12', NULL, NULL),
(16, 'Baru', 7, 4, 2, '2023-10-03 01:45:19', NULL, NULL),
(17, 'Baru', 8, 5, 1, '2023-10-03 01:45:41', NULL, NULL),
(18, 'Baru', 9, 5, 1, '2023-10-03 01:45:48', NULL, NULL),
(19, 'Baru', 14, 5, 1, '2023-10-03 01:45:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL,
  `nama_s` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `nama_s`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ganjil (Blok 1,2,3,4)', '2023-10-11 23:01:24', NULL, NULL),
(2, 'Genap (Blok 5,6,7,8)', '2023-10-11 23:01:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_user_user` int(4) DEFAULT NULL,
  `id_kelas` int(4) DEFAULT NULL,
  `nis` varchar(255) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `usia` varchar(15) DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  `alamat` varchar(1000) DEFAULT NULL,
  `ttl` varchar(100) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tanggal_pgu` date NOT NULL DEFAULT current_timestamp(),
  `maker_pgu` int(4) DEFAULT NULL,
  `uangkas` varchar(30) DEFAULT NULL,
  `rombel` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_user_user`, `id_kelas`, `nis`, `nama_siswa`, `usia`, `jk`, `alamat`, `ttl`, `nik`, `email`, `tanggal_pgu`, `maker_pgu`, `uangkas`, `rombel`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 0, 0, '12345678', 'Kevin', '10', '', 'test', '', '10', '', '2024-01-14', 0, '', 3, 9, '2023-10-02 22:14:28', NULL, NULL),
(8, 15, 2, '26558', 'Kelsey', '10', '', 'test', NULL, '111', 'test@gmail.com', '2024-01-14', 15, '', 4, 15, '2023-10-10 00:12:23', NULL, NULL),
(9, 0, 0, '8645', 'Bong', '', '', '', '', NULL, '', '2024-01-14', 0, '', 3, 16, '2023-10-10 23:03:50', NULL, NULL),
(17, 0, 0, '24161001', 'Richard', '', '', '', '', NULL, '', '2024-01-14', 0, '', 14, 24, '2023-11-14 11:17:28', NULL, NULL),
(21, 0, 0, '24161002', 'Ari Setia Firmansyah', '', '', '', '', NULL, '', '2024-01-14', 0, '', 14, 28, '2023-11-20 21:12:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` int(11) NOT NULL,
  `nama_t` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id_tahun`, `nama_t`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '2023', 'Aktif', '2023-10-09 01:16:23', NULL, NULL),
(3, '2024', 'Tidak-Aktif', '2023-10-09 02:28:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uangkas`
--

CREATE TABLE `uangkas` (
  `id_uangkas` int(4) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `nama_bayar` varchar(100) NOT NULL,
  `pembayar_per` varchar(50) NOT NULL,
  `jenis_transaksi` varchar(100) NOT NULL,
  `mata_uang` varchar(100) NOT NULL,
  `nominal` varchar(1000) NOT NULL,
  `persetujuan_uk` varchar(20) NOT NULL,
  `tanggal_uk` date NOT NULL DEFAULT current_timestamp(),
  `maker_uk` int(4) NOT NULL,
  `total_uang` varchar(1000) NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uangkas`
--

INSERT INTO `uangkas` (`id_uangkas`, `id_kelas`, `nama_bayar`, `pembayar_per`, `jenis_transaksi`, `mata_uang`, `nominal`, `persetujuan_uk`, `tanggal_uk`, `maker_uk`, `total_uang`, `bukti`) VALUES
(10, 2, 'norman ang', 'Month', 'Cash', 'Rupiah (RP)', '40.000', 'Approved', '2023-07-22', 15, '11', '11'),
(14, 12, '22', 'Year', 'Debit', 'Vietnamese Dong (VND)', '22', 'Not Approved', '2023-07-23', 0, '', ''),
(15, 10, 'jilian', 'Day', 'Cash', 'Malaysian Ringgits (MYR)', '1000', 'Approved', '2023-08-04', 25, '', ''),
(17, 10, 'ong yan da', 'Day', 'Cash', 'Rupiah (RP)', '1.000', 'Approved', '2023-08-09', 15, '', ''),
(21, 10, 'ong yan da', 'Day', 'Cash', 'Rupiah (RP)', '2.000', 'Approved', '2023-08-09', 16, '', ''),
(23, 10, 'keristin wahyuni.H.', 'Day', 'Cash', 'Rupiah (RP)', '2.000', 'Approved', '2023-08-10', 15, '', ''),
(26, 10, '12', 'Day', 'Cash', 'Rupiah (RP)', '2.000', 'Approved', '2023-08-10', 2, '', ''),
(27, 10, '12', 'Day', 'Cash', 'Rupiah (RP)', '12', 'Approved', '2023-08-15', 15, '', ''),
(28, 5, 'Kelsey', 'Day', 'Debit', 'Laotian Kip (KIP)', '10000', 'Not Approved', '2024-01-16', 15, '', ''),
(29, 5, 'Kelsey', 'Day', 'Debit', 'Laotian Kip (KIP)', '10000', 'Not Approved', '2024-01-16', 15, '', ''),
(30, 2, 'Darrell', 'Day', 'Cash', 'Singapore Dollar (SGD)', '10', 'Not Approved', '2024-01-16', 15, '', ''),
(31, 2, 'Kelsey', 'Week', 'Cash', 'Myanmar Kyat (MMK)', '10000', 'Not Approved', '2024-01-16', 15, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `tanggal_user` date NOT NULL DEFAULT current_timestamp(),
  `foto` text NOT NULL,
  `jenjang` int(11) NOT NULL,
  `pendaftaran` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `tanggal_user`, `foto`, `jenjang`, `pendaftaran`, `nama_lengkap`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super SMK', 'e3afed0047b08059d0fada10f400c1e5', 1, '2024-01-14', 'default.png', 2, NULL, '', '2023-10-09 14:09:16', NULL, NULL),
(8, 'Pak If', '827ccb0eea8a706c4c34a16891f84e7b', 3, '2024-01-14', 'default.png', 2, NULL, '', '2023-10-09 14:09:16', NULL, NULL),
(9, 'Kevin', 'c4ca4238a0b923820dcc509a6f75849b', 5, '2024-01-14', 'default.png', 2, NULL, '', '2023-10-09 14:09:16', NULL, NULL),
(14, 'Pak Ray', 'c4ca4238a0b923820dcc509a6f75849b', 3, '2024-01-14', 'ae86.png', 2, NULL, '', '2023-10-10 00:11:40', NULL, NULL),
(15, 'Kelsey', 'f311f079854661d7b4c0e8222a70c420', 4, '2024-01-14', 'default.png', 2, NULL, 'pepek', '2023-10-10 00:12:23', NULL, NULL),
(16, 'Bong', 'c4ca4238a0b923820dcc509a6f75849b', 4, '2024-01-14', 'default.png', 2, NULL, '', '2023-10-10 23:03:50', NULL, NULL),
(24, '24161001', 'c4ca4238a0b923820dcc509a6f75849b', 4, '2024-01-14', 'default.png', 2, 7, '', '2023-11-14 11:17:28', NULL, NULL),
(28, '24161002', '3d3b09b06fb6bb0661799b9ea28cb355', 4, '2024-01-14', 'default.png', 2, 2, '', '2023-11-20 21:12:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id_website` int(11) NOT NULL,
  `nama_website` varchar(255) NOT NULL,
  `logo_website` text DEFAULT NULL,
  `logo_pdf` text DEFAULT NULL,
  `favicon_website` text DEFAULT NULL,
  `komplek` text DEFAULT NULL,
  `jalan` text DEFAULT NULL,
  `kelurahan` text DEFAULT NULL,
  `kecamatan` text DEFAULT NULL,
  `kota` text DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id_website`, `nama_website`, `logo_website`, `logo_pdf`, `favicon_website`, `komplek`, `jalan`, `kelurahan`, `kecamatan`, `kota`, `kode_pos`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Absensi Siswa', 'logo_contoh.svg', 'logo_pdf_contoh.svg', 'favicon_contoh.svg', 'Komp. Pahlawan Mas', 'Jl. Raya Pahlawan No. 123', 'Kel. Sukajadi', 'Kec. Sukasari', 'Kota Batam', '29424', '2023-05-01 16:33:53', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `blok`
--
ALTER TABLE `blok`
  ADD PRIMARY KEY (`id_blok`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `keterangan_perizinan`
--
ALTER TABLE `keterangan_perizinan`
  ADD PRIMARY KEY (`id_keterangan`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `perizinan`
--
ALTER TABLE `perizinan`
  ADD PRIMARY KEY (`id_perizinan`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `NIk` (`nik`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `uangkas`
--
ALTER TABLE `uangkas`
  ADD PRIMARY KEY (`id_uangkas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id_website`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blok`
--
ALTER TABLE `blok`
  MODIFY `id_blok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_denda` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `keterangan_perizinan`
--
ALTER TABLE `keterangan_perizinan`
  MODIFY `id_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `perizinan`
--
ALTER TABLE `perizinan`
  MODIFY `id_perizinan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uangkas`
--
ALTER TABLE `uangkas`
  MODIFY `id_uangkas` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id_website` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
