-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 03:49 PM
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
-- Database: `dbabsensi1`
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
-- Table structure for table `data_absensi_kantor`
--

CREATE TABLE `data_absensi_kantor` (
  `id_absensi` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `user_update` int(11) DEFAULT NULL,
  `user_delete` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_absensi_kantor`
--

INSERT INTO `data_absensi_kantor` (`id_absensi`, `siswa`, `tanggal`, `keterangan`, `user_create`, `user_update`, `user_delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12, '2023-07-31', 1, 9, NULL, NULL, '2023-07-31 22:55:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_absensi_sekolah`
--

CREATE TABLE `data_absensi_sekolah` (
  `id_absensi` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` int(11) NOT NULL DEFAULT 4,
  `user_create` int(11) NOT NULL,
  `user_update` int(11) DEFAULT NULL,
  `user_delete` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_absensi_sekolah`
--

INSERT INTO `data_absensi_sekolah` (`id_absensi`, `siswa`, `jurusan`, `tanggal`, `keterangan`, `user_create`, `user_update`, `user_delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12, 1, '2023-07-31', 1, 2, NULL, NULL, '2023-07-31 21:08:00', NULL, NULL),
(2, 12, 1, '2023-07-31', 2, 2, 2, NULL, '2023-07-31 21:09:27', '2023-07-31 23:36:49', NULL),
(3, 15, 1, '2023-07-31', 2, 2, NULL, NULL, '2023-07-31 21:09:27', NULL, NULL),
(4, 14, 3, '2023-07-31', 3, 2, NULL, NULL, '2023-07-31 21:40:57', NULL, NULL),
(5, 13, 2, '2023-07-31', 1, 2, NULL, NULL, '2023-07-31 21:44:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_agenda`
--

CREATE TABLE `data_agenda` (
  `id_agenda` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `renper_1` text NOT NULL,
  `renper_2` text DEFAULT '-',
  `renper_3` text DEFAULT '-',
  `renper_4` text DEFAULT '-',
  `renper_5` text DEFAULT '-',
  `reape_1` text NOT NULL,
  `reape_2` text DEFAULT '-',
  `reape_3` text DEFAULT '-',
  `reape_4` text DEFAULT '-',
  `reape_5` text DEFAULT '-',
  `pk_1` text NOT NULL DEFAULT '-',
  `pk_2` text DEFAULT '-',
  `pk_3` text DEFAULT '-',
  `pm_1` text DEFAULT '-',
  `pm_2` text DEFAULT '-',
  `pm_3` text DEFAULT '-',
  `senyum` enum('Baik','Kurang') DEFAULT NULL,
  `keramahan` enum('Baik','Kurang') DEFAULT NULL,
  `penampilan` enum('Baik','Kurang') DEFAULT NULL,
  `komunikasi` enum('Baik','Kurang') DEFAULT NULL,
  `realisasi_kerja` enum('Baik','Kurang') DEFAULT NULL,
  `catatan` text DEFAULT '-',
  `kondisi` int(11) DEFAULT NULL,
  `approve_g` int(11) DEFAULT NULL,
  `user_create` int(11) NOT NULL,
  `user_update` int(11) DEFAULT NULL,
  `user_delete` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_agenda`
--

INSERT INTO `data_agenda` (`id_agenda`, `siswa`, `tanggal`, `jam_masuk`, `jam_keluar`, `renper_1`, `renper_2`, `renper_3`, `renper_4`, `renper_5`, `reape_1`, `reape_2`, `reape_3`, `reape_4`, `reape_5`, `pk_1`, `pk_2`, `pk_3`, `pm_1`, `pm_2`, `pm_3`, `senyum`, `keramahan`, `penampilan`, `komunikasi`, `realisasi_kerja`, `catatan`, `kondisi`, `approve_g`, `user_create`, `user_update`, `user_delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12, '2023-07-31', '22:49:46', '22:51:16', 'Rakit pc', '-', '-', '-', '-', 'Rakit pc siap', '-', '-', '-', '-', '-', '-', '-', NULL, NULL, NULL, NULL, 'Baik', 'Kurang', 'Kurang', 'Baik', '-', 1, NULL, 12, 9, NULL, '2023-07-31 22:49:46', '2023-07-31 22:55:38', NULL),
(2, 12, '2023-08-10', '22:49:46', '22:51:16', 'Rakit pc', '-', '-', '-', '-', 'Rakit pc siap', '-', '-', '-', '-', '-', '-', '-', NULL, NULL, NULL, 'Baik', 'Baik', 'Kurang', 'Kurang', 'Baik', '-', 1, NULL, 12, 9, NULL, '2023-07-31 22:49:46', '2023-07-31 22:55:38', NULL),
(3, 12, '2023-08-24', '22:49:46', '22:51:16', 'Rakit pc', '-', '-', '-', '-', 'Rakit pc siap', '-', '-', '-', '-', '-', '-', '-', NULL, NULL, NULL, 'Baik', 'Baik', 'Kurang', 'Kurang', 'Baik', '-', 1, NULL, 12, 9, NULL, '2023-07-31 22:49:46', '2023-07-31 22:55:38', NULL),
(4, 12, '2023-08-13', '21:37:21', '00:00:00', '', '-', '-', '-', '-', '', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', NULL, NULL, NULL, NULL, NULL, '-', NULL, NULL, 12, NULL, NULL, '2023-08-13 21:37:21', NULL, NULL),
(5, 12, '2023-08-14', '09:12:34', '09:12:41', '', '-', '-', '-', '-', '', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', NULL, NULL, NULL, NULL, NULL, '-', 1, NULL, 12, NULL, NULL, '2023-08-14 09:12:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_guru`
--

CREATE TABLE `data_guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `jabatan` int(11) DEFAULT NULL,
  `jurusan` int(11) DEFAULT NULL,
  `user_guru` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `user_update` int(11) DEFAULT NULL,
  `user_delete` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_guru`
--

INSERT INTO `data_guru` (`id_guru`, `nama_guru`, `nik`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin`, `telpon`, `jabatan`, `jurusan`, `user_guru`, `user_create`, `user_update`, `user_delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pak Dedi', '1111', '2023-07-31', 'Batam', 1, '081245785', 2, NULL, 2, 1, 1, NULL, '2023-07-31 20:28:27', '2023-08-07 16:58:05', NULL),
(2, 'Pak If', '1542', '2023-07-31', 'Batam', 1, '0154785', 3, 1, 3, 1, 1, NULL, '2023-07-31 20:29:00', '2023-07-31 21:47:12', NULL),
(3, 'Bu Rina', '2158', '2023-07-31', 'Batam', 2, '0845273', 3, 2, 4, 1, 1, NULL, '2023-07-31 20:29:34', '2023-07-31 21:47:16', NULL),
(4, 'Pak Tri', '3547', '2023-07-31', 'Batam', 2, '04169875', 3, 3, 5, 1, 1, NULL, '2023-07-31 20:31:55', '2023-08-07 16:58:35', NULL),
(5, 'Pak Ray', '7451', '2023-07-31', 'Batam', 1, '0125746', 4, 1, 6, 1, NULL, NULL, '2023-07-31 20:33:12', NULL, NULL),
(6, 'Bu Mei', '4796', '2023-07-31', 'Batam', 1, '54783', 4, 2, 7, 1, NULL, NULL, '2023-07-31 21:02:09', NULL, NULL),
(7, 'Bu Martha', '476312', '2023-07-31', 'Batam', 1, '147552', 4, 3, 8, 1, NULL, NULL, '2023-07-31 21:02:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_instruktur`
--

CREATE TABLE `data_instruktur` (
  `id_instruktur` int(11) NOT NULL,
  `nama_instruktur` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `user_instruktur` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `user_update` int(11) DEFAULT NULL,
  `user_delete` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_instruktur`
--

INSERT INTO `data_instruktur` (`id_instruktur`, `nama_instruktur`, `nama_perusahaan`, `jenis_kelamin`, `telpon`, `user_instruktur`, `user_create`, `user_update`, `user_delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pak Haris', 'Batam Coding', 1, '15635', 9, 1, NULL, NULL, '2023-07-31 21:03:04', NULL, NULL),
(2, 'Pak Han', 'Cipta Land', 1, '47268', 10, 1, NULL, NULL, '2023-07-31 21:03:38', NULL, NULL),
(3, 'Pak Jof', 'Jaya Maju', 1, '1789', 11, 1, NULL, NULL, '2023-07-31 21:04:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_jurusan`
--

CREATE TABLE `data_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `nama_singkat` varchar(255) NOT NULL,
  `user_create` int(11) NOT NULL,
  `user_update` int(11) DEFAULT NULL,
  `user_delete` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_jurusan`
--

INSERT INTO `data_jurusan` (`id_jurusan`, `nama_jurusan`, `nama_singkat`, `user_create`, `user_update`, `user_delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rekayasa Perangkat Lunak', 'RPL', 1, NULL, NULL, '2023-07-19 11:18:07', NULL, NULL),
(2, 'Bisnis Daring & Pemasaran', 'BDP', 1, NULL, NULL, '2023-07-19 11:18:38', NULL, NULL),
(3, 'Akuntansi & Keuangan Lembaga', 'AKL', 1, NULL, NULL, '2023-07-19 11:19:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_keterangan`
--

CREATE TABLE `data_keterangan` (
  `id_keterangan` int(11) NOT NULL,
  `nama_keterangan` varchar(255) NOT NULL,
  `user_create` int(11) NOT NULL,
  `user_update` int(11) DEFAULT NULL,
  `user_delete` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_keterangan`
--

INSERT INTO `data_keterangan` (`id_keterangan`, `nama_keterangan`, `user_create`, `user_update`, `user_delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hadir', 1, NULL, NULL, '2023-07-19 23:11:49', NULL, NULL),
(2, 'Izin', 1, NULL, NULL, '2023-07-19 23:12:01', NULL, NULL),
(3, 'Sakit', 1, NULL, NULL, '2023-07-19 23:12:17', NULL, NULL),
(4, 'Alpa', 1, NULL, NULL, '2023-07-19 23:12:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `telpon_siswa` varchar(13) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `nama_pt` varchar(255) NOT NULL,
  `user_siswa` int(11) NOT NULL,
  `guru_pembimbing` int(11) NOT NULL,
  `instruktur` int(11) NOT NULL,
  `kajur` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `user_update` int(11) DEFAULT NULL,
  `user_delete` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id_siswa`, `nama_siswa`, `nis`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin`, `telpon_siswa`, `jurusan`, `nama_pt`, `user_siswa`, `guru_pembimbing`, `instruktur`, `kajur`, `user_create`, `user_update`, `user_delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kevin ', '456812', '2023-08-09', 'Batam', 1, '79632', 1, 'Batam Coding', 12, 6, 9, 3, 1, NULL, NULL, '2023-07-31 21:05:28', NULL, NULL),
(2, 'Jofinson', '45632', '2023-07-31', 'Batam', 1, '787615', 2, 'Cipta Land', 13, 7, 10, 4, 1, NULL, NULL, '2023-07-31 21:06:22', NULL, NULL),
(3, 'Darren', '324786', '2023-07-31', 'Batam', 1, '95472', 3, 'Jaya Maju', 14, 8, 11, 5, 1, NULL, NULL, '2023-07-31 21:07:12', NULL, NULL),
(4, 'Ferdi', '512430', '2023-07-31', 'Batam', 1, '201033', 1, 'Batam Coding1', 15, 6, 10, 0, 1, 3, NULL, '2023-07-31 21:09:13', '2023-08-07 21:15:29', NULL),
(5, 'Evan', '21475', '2023-08-07', 'Batam', 2, '784120', 1, '', 18, 0, 0, 3, 1, NULL, NULL, '2023-08-07 22:00:42', NULL, NULL),
(7, 'Zhongli', '41396', '2023-08-08', 'Batam', 1, '01587', 1, '', 20, 0, 0, 3, 1, NULL, 1, '2023-08-11 22:53:24', NULL, '2023-08-11 22:53:36'),
(8, 'tesdek', '41396', '2023-08-08', 'Batam', 1, '01587', 1, '', 22, 0, 0, 3, 1, NULL, 1, '2023-08-11 22:58:13', NULL, '2023-08-13 10:02:59');

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
(4, '11223334', 'Pak If', 1, 8, '2023-10-02 22:06:49', NULL, NULL),
(9, '2658', 'Pak Ray', 4, 14, '2023-10-10 00:11:40', NULL, NULL);

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
-- Table structure for table `hasil_vote`
--

CREATE TABLE `hasil_vote` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kandidat_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_vote`
--

INSERT INTO `hasil_vote` (`id`, `user_id`, `kandidat_id`, `created_at`) VALUES
(16, 5, 24, '2023-10-04 23:55:40');

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
(2, 'SMK', '2023-10-02 23:01:59', NULL, NULL),
(5, 'SMA', '2024-04-22 16:17:05', NULL, NULL);

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
(5, 'SMP', '2023-10-03 01:44:43', NULL, NULL),
(9, 'DKV', '2024-04-21 17:20:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `id` int(11) NOT NULL,
  `foto` text NOT NULL,
  `ketua` varchar(255) NOT NULL,
  `wakil` varchar(255) NOT NULL,
  `wakil2` varchar(255) NOT NULL,
  `visimisi` text NOT NULL,
  `periode_id` int(11) NOT NULL,
  `suara` int(11) NOT NULL,
  `status2` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`id`, `foto`, `ketua`, `wakil`, `wakil2`, `visimisi`, `periode_id`, `suara`, `status2`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 'o2.jpg', '15', '16', '28', 'Tetap Semangat', 6, 0, 'Tampil', '2023-04-21 10:36:09', '2024-01-17 12:04:26', NULL),
(24, 'tess.jpg', '24', '15', '16', 'Halo\r\n', 6, 1, 'Tampil', '2023-09-26 21:16:13', '2024-01-17 12:04:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `maker_kelas` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `maker_kelas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '12', '', '2023-10-02 10:56:48', NULL, NULL),
(5, '11', '', '2023-10-03 01:41:46', NULL, NULL),
(7, '10', '', '2023-10-03 01:41:57', NULL, NULL),
(8, '9', '', '2023-10-03 01:42:02', NULL, NULL),
(9, '8', '', '2023-10-03 01:43:32', NULL, NULL),
(14, '7', '', '2023-10-03 01:43:57', NULL, NULL);

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
(3, 'Guru / Wali Kelas', '2023-10-09 19:57:33', NULL, NULL),
(4, 'Siswa / Orang Tua', '2023-10-09 19:57:33', NULL, NULL),
(5, 'Sekretaris', '2023-10-15 14:22:31', NULL, NULL),
(6, 'Kesiswaan', '2024-01-14 11:47:32', NULL, NULL),
(7, 'Kajur', '2024-01-14 11:47:32', NULL, NULL),
(8, 'Instruktur', '2024-01-14 11:47:32', NULL, NULL),
(10, 'Kepala Sekolah\r\n', '2024-01-21 11:55:21', NULL, NULL),
(11, 'Seksi Sarana dan Prasarana', '2024-01-21 11:55:48', NULL, NULL);

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
(323, 'User 2 Akses Data Profile Details', '2023-09-21 09:47:30', 2),
(324, 'User 2 Logout', '2023-09-21 10:06:33', 2),
(325, 'User 1 Masuk ke Homepage', '2023-09-21 22:35:51', 1),
(326, 'User 1 Logout', '2023-09-21 22:35:54', 1),
(327, 'User 5 Akses Data Penilaian', '2023-09-21 22:47:36', 5),
(328, 'User 5 Akses Data Penilaian', '2023-09-21 22:50:04', 5),
(329, 'User 5 Akses Data Penilaian', '2023-09-21 22:50:13', 5),
(330, 'User 5 Akses Data Rombel 5', '2023-09-21 22:51:42', 5),
(331, 'User 5 Akses Data Laporan', '2023-09-21 22:51:47', 5),
(332, 'User 5 Akses User Profile', '2023-09-21 22:51:53', 5),
(333, 'User 5 Akses Data Penilaian', '2023-09-21 22:52:21', 5),
(334, 'User 5 Akses Data Penilaian', '2023-09-21 22:59:39', 5),
(335, 'User 5 Akses Data Rombel 5', '2023-09-21 23:00:06', 5),
(336, 'User 5 Logout', '2023-09-21 23:00:17', 5),
(337, 'User 2 Masuk ke Homepage', '2023-09-21 23:00:28', 2),
(338, 'User 2 Akses Data Laporan', '2023-09-21 23:00:42', 2),
(339, 'User 2 Print PDF', '2023-09-21 23:05:38', 2),
(340, 'User 2 Akses Data Laporan', '2023-09-21 23:05:50', 2),
(341, 'User 2 Print Excel', '2023-09-21 23:06:00', 2),
(342, 'User 6 Akses Data Laporan', '2023-10-18 21:24:10', 6),
(343, 'User 1 Masuk ke Homepage', '2023-11-23 08:17:28', 1),
(344, 'User 1 Akses Data User', '2023-11-23 08:17:30', 1),
(345, 'User 1 Akses Data Log Activity', '2023-11-23 08:17:32', 1),
(346, 'User 1 Akses User Profile', '2023-11-23 08:17:33', 1),
(347, 'User 1 Masuk ke Homepage', '2023-11-23 08:20:33', 1),
(348, 'User 1 Logout', '2023-11-23 08:20:35', 1),
(349, 'User 1 Masuk ke Homepage', '2023-11-23 08:24:43', 1),
(350, 'User 1 Logout', '2023-11-23 08:26:43', 1),
(351, 'User 1 Masuk ke Homepage', '2023-11-23 08:26:47', 1),
(352, 'User 1 Masuk ke Homepage', '2023-11-23 21:36:13', 1),
(353, 'User 1 Akses Data User', '2023-11-23 21:36:30', 1),
(354, 'User 1 Masuk ke Homepage', '2023-11-23 21:36:32', 1),
(355, 'User 1 Akses Data Log Activity', '2023-11-23 21:36:34', 1),
(356, 'User 1 Akses Data User', '2023-11-23 21:36:36', 1),
(357, 'User 1 Logout', '2023-11-23 21:36:37', 1),
(358, 'User 4 Akses Data Penilaian', '2023-11-23 21:36:44', 4),
(359, 'User 4 Masuk ke List Murid', '2023-11-23 21:36:49', 4),
(360, 'User 4 Akses Data Laporan', '2023-11-23 21:36:56', 4),
(361, 'User 4 Akses Data Penilaian', '2023-11-23 21:37:02', 4),
(362, 'User 4 Melakukan Pencarian Data Ranking Piket', '2023-11-23 21:37:45', 4),
(363, 'User 4 Logout', '2023-11-23 21:39:15', 4),
(364, 'User 5 Melakukan Pencarian Data Ranking Piket', '2023-11-23 21:46:20', 5),
(365, 'User 5 Akses Data Penilaian', '2023-11-23 21:46:42', 5),
(366, 'User 5 Melakukan Pencarian Data Untuk Dinilai', '2023-11-23 21:46:56', 5),
(367, 'User 5 Akses Data Rombel 5', '2023-11-23 21:47:01', 5),
(368, 'User 5 Akses Data Penilaian', '2023-11-23 21:47:17', 5),
(369, 'User 5 Melakukan Pencarian Data Untuk Dinilai', '2023-11-23 21:47:23', 5),
(370, 'User 5 Akses Tampilan Nilai', '2023-11-23 21:47:25', 5),
(371, 'User 5 Melakukan Penilaian Pada Data 19', '2023-11-23 21:47:29', 5),
(372, 'User 5 Akses Data Penilaian', '2023-11-23 21:47:29', 5),
(373, 'User 2 Masuk ke Homepage', '2023-11-23 21:47:43', 2),
(374, 'User 5 Akses Data Laporan', '2023-11-23 21:47:54', 5),
(375, 'User 5 Akses Data Rombel 5', '2023-11-23 21:48:11', 5),
(376, 'User 5 Akses Data Penilaian', '2023-11-23 21:48:12', 5),
(377, 'User 5 Logout', '2023-11-23 21:49:01', 5),
(378, 'User 1 Masuk ke Homepage', '2023-12-03 05:49:56', 1),
(379, 'User 1 Logout', '2023-12-03 05:49:59', 1),
(380, 'User 1 Masuk ke Homepage', '2023-12-03 05:50:03', 1),
(381, 'User 1 Akses Data Log Activity', '2023-12-03 05:50:07', 1),
(382, 'User 1 Akses Data User', '2023-12-03 05:50:19', 1),
(383, 'User 1 Masuk ke Import', '2023-12-03 05:50:25', 1),
(384, 'User 1 Akses Data User', '2023-12-03 05:50:28', 1),
(385, 'User 1 Masuk ke Import', '2023-12-03 05:50:29', 1),
(386, 'User 1 Masuk ke Import', '2023-12-03 05:51:08', 1),
(387, 'User 1 Masuk ke Import', '2023-12-03 05:52:53', 1),
(388, 'User 1 Akses Data User', '2023-12-03 05:52:55', 1),
(389, 'User 1 Akses User Profile', '2023-12-03 05:53:24', 1),
(390, 'User 1 Mengubah Profile', '2023-12-03 05:53:27', 1),
(391, 'User 1 Akses User Profile', '2023-12-03 05:53:27', 1),
(392, 'User 1 Mengubah Profile', '2023-12-03 05:53:31', 1),
(393, 'User 1 Akses User Profile', '2023-12-03 05:53:31', 1),
(394, 'User 1 Mengubah Profile', '2023-12-03 05:53:34', 1),
(395, 'User 1 Akses User Profile', '2023-12-03 05:53:34', 1),
(396, 'User 1 Akses Data Password', '2023-12-03 05:53:38', 1),
(397, 'User 1 Akses User Profile', '2023-12-03 05:53:41', 1),
(398, 'User 1 Logout', '2023-12-03 05:53:43', 1),
(399, 'User 4 Melakukan Pencarian Data Ranking Piket', '2023-12-03 05:54:01', 4),
(400, 'User 4 Akses Data Penilaian', '2023-12-03 05:54:06', 4),
(401, 'User 4 Melakukan Pencarian Data Untuk Dinilai', '2023-12-03 05:54:13', 4),
(402, 'User 4 Akses Tampilan Nilai', '2023-12-03 05:54:17', 4),
(403, 'User 4 Melakukan Penilaian Pada Data 20', '2023-12-03 05:54:21', 4),
(404, 'User 4 Akses Data Penilaian', '2023-12-03 05:54:22', 4),
(405, 'User 4 Melakukan Pencarian Data Untuk Dinilai', '2023-12-03 05:54:27', 4),
(406, 'User 4 Melakukan Pencarian Data Untuk Dinilai', '2023-12-03 05:55:09', 4),
(407, 'User 4 Melakukan Pencarian Data Untuk Dinilai', '2023-12-03 05:55:22', 4),
(408, 'User 4 Akses Data Laporan', '2023-12-03 05:56:27', 4),
(409, 'User 4 Print PDF', '2023-12-03 05:56:41', 4),
(410, 'User 4 Akses Data Laporan', '2023-12-03 05:56:46', 4),
(411, 'User 4 Akses User Profile', '2023-12-03 05:56:49', 4),
(412, 'User 4 Logout', '2023-12-03 05:56:59', 4),
(413, 'User 2 Masuk ke Homepage', '2023-12-03 05:57:01', 2),
(414, 'User 2 Akses Data Laporan', '2023-12-03 05:57:03', 2),
(415, 'User 2 Akses User Profile', '2023-12-03 05:57:10', 2),
(416, 'User 2 Masuk ke Homepage', '2023-12-03 05:57:13', 2),
(417, 'User 2 Logout', '2023-12-03 05:57:15', 2),
(418, 'User 3 Masuk ke Homepage', '2023-12-03 05:57:40', 3),
(419, 'User 3 Logout', '2023-12-03 05:57:49', 3),
(420, 'User 4 Akses Data Laporan', '2023-12-03 06:01:34', 4),
(421, 'User 4 Print PDF', '2023-12-03 06:02:07', 4),
(422, 'User 4 Akses Data Laporan', '2023-12-03 06:02:58', 4),
(423, 'User 4 Logout', '2023-12-03 06:03:00', 4),
(424, 'User 4 Akses Data Laporan', '2023-12-03 06:15:36', 4),
(425, 'User 4 Print PDF', '2023-12-03 06:15:43', 4),
(426, 'User 4 Print PDF', '2023-12-03 06:19:17', 4),
(427, 'User 4 Print PDF', '2023-12-03 06:22:18', 4),
(428, 'User 4 Print PDF', '2023-12-03 06:22:24', 4),
(429, 'User 4 Print PDF', '2023-12-03 06:22:44', 4),
(430, 'User 4 Print PDF', '2023-12-03 06:23:00', 4),
(431, 'User 4 Print PDF', '2023-12-03 06:23:04', 4),
(432, 'User 4 Print PDF', '2023-12-03 06:25:04', 4),
(433, 'User 4 Print PDF', '2023-12-03 06:25:33', 4),
(434, 'User 4 Akses Data Laporan', '2023-12-03 06:25:49', 4),
(435, 'User 4 Print PDF', '2023-12-03 06:26:00', 4),
(436, 'User 4 Akses Data Laporan', '2023-12-03 06:26:01', 4),
(437, 'User 4 Print Excel', '2023-12-03 06:26:10', 4),
(438, 'User 4 Logout', '2023-12-03 06:26:30', 4),
(439, 'User 1 Masuk ke Homepage', '2023-12-03 06:26:37', 1),
(440, 'User 1 Akses Data User', '2023-12-03 06:26:40', 1),
(441, 'User 1 Masuk ke Import', '2023-12-03 06:26:42', 1),
(442, 'User 1 Melakukan Import User', '2023-12-03 06:29:47', 1),
(443, 'User 1 Akses Data User', '2023-12-03 06:29:47', 1),
(444, 'User 1 Masuk ke Import', '2023-12-03 06:29:53', 1),
(445, 'User 1 Melakukan Import User', '2023-12-03 06:29:57', 1),
(446, 'User 1 Akses Data User', '2023-12-03 06:29:57', 1),
(447, 'User 1 Akses Data User', '2023-12-03 06:30:16', 1),
(448, 'User 1 Masuk ke Import', '2023-12-03 06:30:17', 1),
(449, 'User 1 Melakukan Import User', '2023-12-03 06:30:22', 1),
(450, 'User 1 Akses Data User', '2023-12-03 06:30:22', 1),
(451, 'User 1 Akses Data User', '2023-12-03 06:30:34', 1),
(452, 'User 1 Masuk ke Homepage', '2024-01-20 11:48:13', 1),
(453, 'User 1 Akses Data User', '2024-01-20 11:48:24', 1),
(454, 'User 1 Akses Data Log Activity', '2024-01-20 14:43:21', 1),
(455, 'User 1 Masuk ke Homepage', '2024-01-20 14:43:31', 1),
(456, 'User 1 Akses Data Log Activity', '2024-01-20 14:43:32', 1),
(457, 'User 1 Masuk ke Homepage', '2024-01-20 14:43:33', 1),
(458, 'User 1 Akses User Profile', '2024-01-20 14:43:35', 1),
(459, 'User 1 Akses Data Password', '2024-01-20 14:43:40', 1),
(460, 'User 1 Akses User Profile', '2024-01-20 14:43:41', 1),
(461, 'User 1 Akses Data Log Activity', '2024-01-20 14:44:08', 1),
(462, 'User 1 Akses Data User', '2024-01-20 14:44:09', 1),
(463, 'User 1 Akses Data User', '2024-01-20 14:51:41', 1),
(464, 'User 1 Akses Data User', '2024-01-20 14:52:12', 1),
(465, 'User 1 Masuk ke Import', '2024-01-20 14:52:15', 1),
(466, 'User 1 Akses Data User', '2024-01-20 14:52:16', 1),
(467, 'User 1 Akses Data Log Activity', '2024-01-20 14:52:42', 1),
(468, 'User 1 Masuk ke Homepage', '2024-01-20 14:52:45', 1),
(469, 'User 1 Akses Data User', '2024-01-20 14:52:46', 1),
(470, 'User 16 Masuk ke Homepage', '2024-01-20 14:55:07', 16),
(471, 'User 16 Masuk ke Homepage', '2024-01-20 14:55:24', 16),
(472, 'User 16 Masuk ke Homepage', '2024-01-20 14:55:35', 16),
(473, 'User 16 Masuk ke Homepage', '2024-01-20 14:55:35', 16),
(474, 'User 16 Masuk ke Homepage', '2024-01-20 14:56:10', 16),
(475, 'User 16 Masuk ke List Murid', '2024-01-20 14:56:13', 16),
(476, 'User 16 Akses Data Laporan', '2024-01-20 14:56:15', 16),
(477, 'User 16 Akses User Profile', '2024-01-20 14:56:17', 16),
(478, 'User 16 Akses Data Laporan', '2024-01-20 14:56:32', 16),
(479, 'User 16 Masuk ke Homepage', '2024-01-20 14:56:42', 16),
(480, 'User 16 Masuk ke Homepage', '2024-01-20 14:56:45', 16),
(481, 'User 16 Masuk ke List Murid', '2024-01-20 14:56:46', 16),
(482, 'User 16 Masuk ke Homepage', '2024-01-20 14:57:16', 16),
(483, 'User 16 Masuk ke Homepage', '2024-01-20 14:57:39', 16),
(484, 'User 16 Masuk ke Homepage', '2024-01-20 14:58:36', 16),
(485, 'User 16 Masuk ke Homepage', '2024-01-20 14:58:37', 16),
(486, 'User 16 Akses Data Laporan', '2024-01-20 14:58:39', 16),
(487, 'User 16 Masuk ke Homepage', '2024-01-20 14:58:40', 16),
(488, 'User 16 Akses Data Laporan', '2024-01-20 14:58:47', 16),
(489, 'User 16 Akses Data Laporan', '2024-01-20 14:59:19', 16),
(490, 'User 16 Akses Data Laporan', '2024-01-20 14:59:22', 16),
(491, 'User 16 Print PDF', '2024-01-20 15:03:25', 16),
(492, 'User 16 Print PDF', '2024-01-20 15:03:40', 16),
(493, 'User 16 Print PDF', '2024-01-20 15:04:09', 16),
(494, 'User 16 Print PDF', '2024-01-20 15:05:41', 16),
(495, 'User 16 Akses Data Laporan', '2024-01-20 15:06:00', 16),
(496, 'User 16 Akses User Profile', '2024-01-20 15:06:03', 16),
(497, 'User 16 Akses User Profile', '2024-01-20 15:06:27', 16),
(498, 'User 16 Akses User Profile', '2024-01-20 15:06:37', 16),
(499, 'User 16 Akses User Profile', '2024-01-20 15:07:20', 16),
(500, 'User 16 Akses User Profile', '2024-01-20 15:07:30', 16),
(501, 'User 16 Akses Data Password', '2024-01-20 15:12:52', 16),
(502, 'User 16 Mengubah Password', '2024-01-20 15:12:58', 16),
(503, 'User 16 Akses User Profile', '2024-01-20 15:12:58', 16),
(504, 'User 16 Akses Data Password', '2024-01-20 15:13:03', 16),
(505, 'User 16 Akses User Profile', '2024-01-20 15:13:21', 16),
(506, 'User 16 Akses User Profile', '2024-01-20 15:13:59', 16),
(507, 'User 16 Akses Data Password', '2024-01-20 15:13:59', 16),
(508, 'User 16 Masuk ke Homepage', '2024-01-20 15:14:02', 16),
(509, 'User 16 Masuk ke Homepage', '2024-01-20 15:15:17', 16),
(510, 'User 16 Masuk ke Homepage', '2024-01-20 15:16:14', 16),
(511, 'User 1 Masuk ke Homepage', '2024-01-20 15:16:39', 1),
(512, 'User 1 Akses Data Log Activity', '2024-01-20 15:16:41', 1),
(513, 'User 1 Masuk ke Homepage', '2024-01-20 15:16:42', 1),
(514, 'User 1 Masuk ke Homepage', '2024-01-20 15:17:38', 1),
(515, 'User 1 Akses Data Log Activity', '2024-01-20 15:17:39', 1),
(516, 'User 1 Masuk ke Homepage', '2024-01-20 15:17:41', 1),
(517, 'User 1 Masuk ke Homepage', '2024-01-20 15:18:03', 1),
(518, 'User 1 Masuk ke Homepage', '2024-01-20 15:19:30', 1),
(519, 'User 16 Masuk ke Homepage', '2024-01-20 15:21:25', 16),
(520, 'User 16 Akses Data Laporan', '2024-01-20 15:21:28', 16),
(521, 'User 16 Akses Data Laporan', '2024-01-20 15:22:16', 16),
(522, 'User 16 Masuk ke Homepage', '2024-01-20 15:22:21', 16),
(523, 'User 16 Masuk ke Homepage', '2024-01-20 15:23:53', 16),
(524, 'User 16 Masuk ke Homepage', '2024-01-20 15:26:37', 16),
(525, 'User 16 Masuk ke Homepage', '2024-01-20 15:26:53', 16),
(526, 'User 30 Masuk ke Homepage', '2024-01-20 16:50:01', 30),
(527, 'User 30 Masuk ke Homepage', '2024-01-20 16:50:07', 30),
(528, 'User 30 Masuk ke Homepage', '2024-01-20 16:50:29', 30),
(529, 'User 30 Masuk ke Homepage', '2024-01-20 16:50:59', 30),
(530, 'User 30 Masuk ke Homepage', '2024-01-20 16:55:42', 30),
(531, 'User 30 Masuk ke Homepage', '2024-01-20 16:56:24', 30),
(532, 'User 30 Akses Data Laporan', '2024-01-20 16:56:35', 30),
(533, 'User 30 Masuk ke Homepage', '2024-01-20 16:56:52', 30),
(534, 'User 30 Akses Data Laporan', '2024-01-20 16:56:53', 30),
(535, 'User 30 Masuk ke Homepage', '2024-01-20 16:58:16', 30),
(536, 'User 30 Akses Data Laporan', '2024-01-20 16:58:19', 30),
(537, 'User 30 Masuk ke Homepage', '2024-01-20 17:02:11', 30),
(538, 'User 30 Masuk ke Homepage', '2024-01-20 17:02:16', 30),
(539, 'User 30 Akses Data Laporan', '2024-01-20 17:02:18', 30),
(540, 'User 30 Print Excel', '2024-01-20 17:02:34', 30),
(541, 'User 30 Masuk ke Homepage', '2024-01-20 17:03:30', 30),
(542, 'User 30 Masuk ke Homepage', '2024-01-21 11:47:37', 30),
(543, 'User 30 Masuk ke Homepage', '2024-01-21 11:49:26', 30),
(544, 'User 30 Akses Data Laporan', '2024-01-21 11:49:27', 30),
(545, 'User 30 Masuk ke Homepage', '2024-01-21 11:51:54', 30),
(546, 'User 30 Masuk ke Homepage', '2024-01-21 11:52:26', 30),
(547, 'User 16 Masuk ke Homepage', '2024-01-21 11:59:05', 16),
(548, 'User 16 Masuk ke Homepage', '2024-01-21 11:59:08', 16),
(549, 'User 31 Akses Data Penilaian', '2024-01-21 12:09:13', 31),
(550, 'User 31 Akses Data Penilaian', '2024-01-21 12:09:44', 31),
(551, 'User 31 Akses Data Penilaian', '2024-01-21 12:09:44', 31),
(552, 'User 31 Masuk ke List Murid', '2024-01-21 12:09:45', 31),
(553, 'User 31 Akses Data Laporan', '2024-01-21 12:09:46', 31),
(554, 'User 31 Melakukan Pencarian Data Ranking Piket', '2024-01-21 12:11:56', 31),
(555, 'User 31 Masuk ke List Murid', '2024-01-21 12:13:21', 31),
(556, 'User 31 Masuk ke List Murid', '2024-01-21 12:17:05', 31),
(557, 'User 31 Masuk ke List Murid', '2024-01-21 12:18:00', 31),
(558, 'User 31 Masuk ke List Murid', '2024-01-21 12:18:29', 31),
(559, 'User 31 Masuk ke List Murid', '2024-01-21 12:18:43', 31),
(560, 'User 31 Masuk ke List Murid', '2024-01-21 12:18:53', 31),
(561, 'User 31 Akses Data Laporan', '2024-01-21 12:18:58', 31),
(562, 'User 31 Akses Data Laporan', '2024-01-21 12:19:14', 31),
(563, 'User 31 Akses Data Laporan', '2024-01-21 12:19:50', 31),
(564, 'User 31 Akses Data Laporan', '2024-01-21 12:20:02', 31),
(565, 'User 31 Masuk ke List Murid', '2024-01-21 12:20:45', 31),
(566, 'User 31 Masuk ke List Murid', '2024-01-21 12:22:29', 31),
(567, 'User 31 Melakukan Pencarian Data Ranking Piket', '2024-01-21 12:23:34', 31),
(568, 'User 31 Melakukan Pencarian Data Ranking Piket', '2024-01-21 12:27:18', 31),
(569, 'User 31 Melakukan Pencarian Data Ranking Piket', '2024-01-21 12:29:52', 31),
(570, 'User 31 Melakukan Pencarian Data Ranking Piket', '2024-01-21 12:30:48', 31),
(571, 'User 31 Melakukan Pencarian Data Ranking Piket', '2024-01-21 12:32:14', 31),
(572, 'User 31 Melakukan Pencarian Data Ranking Piket', '2024-01-21 12:32:41', 31),
(573, 'User 31 Melakukan Pencarian Data Ranking Piket', '2024-01-21 12:32:48', 31),
(574, 'User 31 Akses Data Penilaian', '2024-01-21 12:33:08', 31),
(575, 'User 31 Akses Data Laporan', '2024-01-21 12:33:11', 31),
(576, 'User 31 Akses Data Penilaian', '2024-01-21 12:33:12', 31),
(577, 'User 31 Masuk ke List Murid', '2024-01-21 12:33:12', 31),
(578, 'User 31 Akses Data Penilaian', '2024-01-21 12:33:13', 31),
(579, 'User 31 Akses Data Penilaian', '2024-01-21 13:09:09', 31),
(580, 'User 31 Akses Data Penilaian', '2024-01-21 13:09:15', 31),
(581, 'User 31 Akses Data Penilaian', '2024-01-21 13:09:48', 31),
(582, 'User 31 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 13:11:41', 31),
(583, 'User 31 Akses Data Penilaian', '2024-01-21 13:22:52', 31),
(584, 'User 31 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 13:22:55', 31),
(585, 'User 31 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 13:35:23', 31),
(586, 'User 31 Akses Data Penilaian', '2024-01-21 13:35:56', 31),
(587, 'User 31 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 13:36:02', 31),
(588, 'User 31 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 13:37:06', 31),
(589, 'User 31 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 13:38:03', 31),
(590, 'User 31 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 13:38:22', 31),
(591, 'User 31 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 13:39:01', 31),
(592, 'User 31 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 13:39:48', 31),
(593, 'User 31 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 13:39:53', 31),
(594, 'User 31 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 13:40:39', 31),
(595, 'User 31 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 13:40:51', 31),
(596, 'User 31 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 13:41:04', 31),
(597, 'User 31 Akses Tampilan Nilai', '2024-01-21 13:41:06', 31),
(598, 'User 31 Akses Tampilan Nilai', '2024-01-21 13:42:39', 31),
(599, 'User 31 Akses Tampilan Nilai', '2024-01-21 13:42:49', 31),
(600, 'User 31 Akses Tampilan Nilai', '2024-01-21 13:42:55', 31),
(601, 'User 31 Akses Tampilan Nilai', '2024-01-21 13:43:17', 31),
(602, 'User 31 Melakukan Penilaian Pada Data 23', '2024-01-21 13:43:50', 31),
(603, 'User 31 Akses Data Penilaian', '2024-01-21 13:43:50', 31),
(604, 'User 31 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 13:43:57', 31),
(605, 'User 9 Masuk ke Homepage', '2024-01-21 13:44:13', 9),
(606, 'User 31 Masuk ke List Murid', '2024-01-21 13:44:20', 31),
(607, 'User 31 Masuk ke List Murid', '2024-01-21 13:45:05', 31),
(608, 'User 31 Akses Data Rombel 1', '2024-01-21 13:47:40', 31),
(609, 'User 31 Akses Data Rombel 1', '2024-01-21 13:48:03', 31),
(610, 'User 31 Akses Data Rombel 1', '2024-01-21 13:48:23', 31),
(611, 'User 31 Akses Data Rombel 1', '2024-01-21 13:50:19', 31),
(612, 'User 31 Akses Data Rombel 1', '2024-01-21 13:50:37', 31),
(613, 'User 31 Akses Data Rombel 1', '2024-01-21 13:51:19', 31),
(614, 'User 31 Akses Data Rombel 1', '2024-01-21 13:51:33', 31),
(615, 'User 31 Akses Data Rombel 1', '2024-01-21 13:51:59', 31),
(616, 'User 31 Akses Data Rombel 1', '2024-01-21 13:52:05', 31),
(617, 'User 31 Masuk ke List Murid', '2024-01-21 13:54:08', 31),
(618, 'User 1 Masuk ke Homepage', '2024-01-21 13:59:51', 1),
(619, 'User 1 Akses Data Log Activity', '2024-01-21 13:59:55', 1),
(620, 'User 16 Masuk ke Homepage', '2024-01-21 14:01:04', 16),
(621, 'User 9 Masuk ke Homepage', '2024-01-21 14:01:49', 9),
(622, 'User 9 Akses Data Laporan', '2024-01-21 14:02:22', 9),
(623, 'User 9 Print PDF', '2024-01-21 14:02:37', 9),
(624, 'User 9 Akses Data Laporan', '2024-01-21 14:02:49', 9),
(625, 'User 8 Melakukan Pencarian Data Ranking Piket', '2024-01-21 14:03:44', 8),
(626, 'User 8 Akses Data Penilaian', '2024-01-21 14:03:51', 8),
(627, 'User 8 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 14:04:03', 8),
(628, 'User 8 Akses Tampilan Nilai', '2024-01-21 14:04:07', 8),
(629, 'User 8 Melakukan Penilaian Pada Data 24', '2024-01-21 14:04:15', 8),
(630, 'User 8 Akses Data Penilaian', '2024-01-21 14:04:15', 8),
(631, 'User 8 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 14:04:25', 8),
(632, 'User 8 Akses Data Penilaian', '2024-01-21 14:04:40', 8),
(633, 'User 8 Akses Data Laporan', '2024-01-21 14:04:42', 8),
(634, 'User 8 Print PDF', '2024-01-21 14:05:04', 8),
(635, 'User 8 Akses Data Laporan', '2024-01-21 14:05:13', 8),
(636, 'User 31 Masuk ke List Murid', '2024-01-21 14:07:19', 31),
(637, 'User 31 Akses Data Rombel 1', '2024-01-21 14:07:23', 31),
(638, 'User 31 Masuk ke List Murid', '2024-01-21 14:07:32', 31),
(639, 'User 1 Masuk ke Homepage', '2024-01-21 14:12:05', 1),
(640, 'User 1 Akses Data Log Activity', '2024-01-21 14:12:12', 1),
(641, 'User 31 Melakukan Pencarian Data Ranking Piket', '2024-01-21 14:13:22', 31),
(642, 'User 31 Akses Data Penilaian', '2024-01-21 14:13:44', 31),
(643, 'User 31 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 14:14:03', 31),
(644, 'User 31 Akses Tampilan Nilai', '2024-01-21 14:14:09', 31),
(645, 'User 31 Melakukan Penilaian Pada Data 24', '2024-01-21 14:14:30', 31),
(646, 'User 31 Akses Data Penilaian', '2024-01-21 14:14:31', 31),
(647, 'User 31 Melakukan Pencarian Data Untuk Dinilai', '2024-01-21 14:14:44', 31),
(648, 'User 31 Masuk ke List Murid', '2024-01-21 14:14:59', 31),
(649, 'User 31 Akses Data Rombel 1', '2024-01-21 14:15:12', 31),
(650, 'User 31 Akses Data Laporan', '2024-01-21 14:15:23', 31),
(651, 'User 31 Print PDF', '2024-01-21 14:15:41', 31),
(652, 'User 31 Akses Data Laporan', '2024-01-21 14:15:54', 31),
(653, 'User 9 Masuk ke Homepage', '2024-01-21 14:17:02', 9),
(654, 'User 9 Akses Data Laporan', '2024-01-21 14:17:17', 9),
(655, 'User 16 Masuk ke Homepage', '2024-01-21 14:17:45', 16),
(656, 'User 1 Akses Data User', '2024-04-11 02:44:50', 1),
(657, 'User 1 Akses Data User', '2024-04-11 02:45:30', 1),
(658, 'User 1 Akses Data User', '2024-04-11 02:46:30', 1),
(659, 'User 1 Akses Data User', '2024-04-11 02:47:04', 1),
(660, 'User 1 Masuk ke Homepage', '2024-04-12 17:02:37', 1),
(661, 'User 14 Akses Data Penilaian', '2024-04-12 17:12:45', 14),
(662, 'User 14 Akses Data Laporan', '2024-04-12 17:12:51', 14),
(663, 'User 31 Masuk ke List Murid', '2024-04-12 17:13:16', 31),
(664, 'User 31 Akses Data Rombel 1', '2024-04-12 17:13:19', 31),
(665, 'User 31 Masuk ke List Murid', '2024-04-12 17:13:34', 31),
(666, 'User 31 Akses Data Rombel 19', '2024-04-12 17:13:39', 31),
(667, 'User 31 Akses Data Penilaian', '2024-04-13 16:20:32', 31);

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
(37, 2, '68', '99', 9, 3, 3, 9, 2, '2023-11-14 10:56:18'),
(38, 8, '', '', 0, 0, 1, 0, 2, '2024-04-22 15:37:28'),
(39, 2, '', '', 0, 0, 1, 0, 2, '2024-04-22 15:37:28'),
(40, 8, '99', '99', 9, 3, 1, 9, 2, '2024-04-22 16:28:30'),
(41, 2, '99', '99', 9, 3, 1, 9, 2, '2024-04-22 16:28:30');

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
(4, 16, 'Anda Mendapatkan Nilai Baik ', '2023-09-16'),
(5, 16, 'Anda Mendapatkan Nilai Baik ', '2023-09-16'),
(6, 2, 'Anda Mendapatkan Nilai Baik ', '2023-09-17'),
(7, 2, 'Anda Mendapatkan Nilai Baik ', '2023-09-20'),
(8, 2, 'Anda Mendapatkan Nilai Baik ', '2023-11-23'),
(9, 2, 'Anda Mendapatkan Nilai Baik ', '2023-12-03'),
(10, 9, 'Anda Mendapatkan Nilai Baik ', '2024-01-21'),
(11, 9, 'Anda Mendapatkan Nilai Baik ', '2024-01-21'),
(12, 9, 'Anda Mendapatkan Nilai Tidak Baik ', '2024-01-21'),
(15, 2, 'Anda Mendapatkan Nilai Baik ', '2024-04-20'),
(16, 8, 'Anda Mendapatkan Nilai Baik ', '2024-04-20'),
(17, 8, 'Anda Mendapatkan Nilai Tidak Baik ', '2024-04-22'),
(18, 8, 'Anda Mendapatkan Nilai Baik ', '2024-04-22');

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
(7, '9018', 'c4ca4238a0b923820dcc509a6f75849b', 'Richard', 14, 'Batam', '2023-11-13', 1, 5, '08219', 'Rumah Richard', 'Sekolah Richard', 'Ayah Richard', 'Ibu Richard', 'Bos', 'Kantor Richard', 'akta lahir.jpg', 'KK.png', 'Ijazah.png', NULL, NULL, 1, '2023-11-13 08:27:25', '2023-12-03 17:08:52', NULL),
(8, '159', 'c4ca4238a0b923820dcc509a6f75849b', 'Fauzi', 16, 'Batam', '2023-11-15', 1, 1, '0147', 'Rumah Fauzi', 'Sekolah Fauzi', 'Ayah Fauzi', 'Ibu Fauzi', 'Bos', 'Kantor Fauzi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-15 21:47:31', NULL, NULL),
(9, '1234567891234567', 'c4ca4238a0b923820dcc509a6f75849b', 'Dodi', 14, 'Batam', '2023-12-03', 1, 2, '12345', 'Rumah Dodi', 'Sekolah Lama Dodi', 'Ayah Dodi', 'Ibu Dodi', 'Wirausahawan', 'Kantor Dodi', 'akta lahir.jpg', 'KK.png', 'Ijazah.png', '09cc212f504c5a6f4097745675f8a093.jpg', '06-home-1591235609.png', 1, '2023-12-03 16:08:30', '2023-12-03 17:08:52', NULL),
(10, '', '', 'a', 18, 'a', '2025-05-22', 1, 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', NULL, NULL, NULL, NULL, NULL, 2, '2024-04-21 16:48:33', '2024-04-21 16:52:01', NULL),
(11, '777', 'f1c1592588411002af340cbaedd6fc33', 'abah', 18, 'cina', '2009-05-23', 1, 1, '0811111', 'nagoya', 'ph', 'bapak abah', 'ibu abah', 'karyaswasta', 'tiban', 'WhatsApp Image 2024-03-06 at 21.57.43.jpeg', 'WhatsApp Image 2024-03-06 at 21.57.43.jpeg', 'WhatsApp Image 2024-03-06 at 21.57.43.jpeg', 'WhatsApp Image 2024-03-06 at 21.57.43.jpeg', 'WhatsApp Image 2024-03-06 at 21.57.43.jpeg', NULL, '2024-04-22 15:34:12', NULL, NULL),
(12, '123', 'c4ca4238a0b923820dcc509a6f75849b', 'yanda', 18, 'batam', '2006-05-23', 1, 3, '0824242', 'batam', 'ph', 'bapak yanda', 'ibu yanda', 'pekerja', 'batam', 'nasgor.jpg', 'nasgor.jpg', 'nasgor.jpg', 'nasgor.jpg', 'nasgor.jpg', 1, '2024-04-22 16:22:04', '2024-04-22 16:24:05', NULL);

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
(2, '2023-09-15', 1, 'Tidak Baik', 5),
(6, '2023-09-16', 3, 'Tidak Baik', 5),
(7, '2023-09-17', 3, 'Tidak Baik', 1),
(14, '2023-09-17', 1, 'Baik', 2),
(15, '2023-09-19', 1, 'Tidak Baik', 1),
(16, '2023-09-20', 1, 'Baik', 1),
(17, '2023-09-21', 1, 'Baik', 1),
(19, '2023-11-23', 1, 'Baik', 1),
(20, '2023-12-03', 1, 'Baik', 1),
(23, '2024-04-20', 5, 'Baik', 5),
(24, '2024-04-20', 3, 'Tidak Baik', 5),
(29, '2024-04-20', 1, 'Baik', 5),
(30, '2024-04-22', 1, 'Baik', 1),
(31, '2024-04-22', 1, 'Tidak Baik', 1),
(32, '2024-04-22', 1, 'Baik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id_rombel` int(11) NOT NULL,
  `nama_r` varchar(255) NOT NULL,
  `kelas` int(11) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `jenjang` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id_rombel`, `nama_r`, `kelas`, `jurusan`, `jenjang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'A', 2, 2, 2, '2023-10-02 11:20:10', NULL, NULL),
(3, 'B', 16, 2, 2, '2023-10-02 21:22:33', NULL, NULL),
(4, 'C', 16, 2, 2, '2023-10-03 01:42:57', NULL, NULL),
(5, 'A', 16, 2, 2, '2023-10-03 01:43:05', NULL, NULL),
(6, 'B', 16, 2, 2, '2023-10-03 01:43:12', NULL, NULL),
(7, 'C', 2, 5, 1, '2023-10-03 01:45:03', NULL, NULL),
(8, 'A', 5, 5, 1, '2023-10-03 01:45:09', NULL, NULL),
(9, 'B', 16, 5, 1, '2023-10-03 01:45:19', NULL, NULL),
(10, 'C', 5, 5, 1, '2023-10-03 01:45:33', NULL, NULL),
(11, 'A', 2, 5, 1, '2023-10-03 01:45:41', NULL, NULL),
(12, 'B', 5, 5, 1, '2023-10-03 01:45:48', NULL, NULL),
(14, 'Baru', 16, 2, 2, '2023-10-02 11:20:10', NULL, NULL),
(15, 'Baru', 16, 3, 2, '2023-10-03 01:43:12', NULL, NULL),
(16, 'Baru', 16, 4, 2, '2023-10-03 01:45:19', NULL, NULL),
(17, 'Baru', 16, 5, 1, '2023-10-03 01:45:41', NULL, NULL),
(18, 'Baru', 2, 5, 1, '2023-10-03 01:45:48', NULL, NULL),
(19, 'Baru', 5, 5, 1, '2023-10-03 01:45:48', NULL, NULL),
(21, 'B', 2, 9, NULL, '2024-04-22 16:18:36', NULL, NULL);

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
  `nis` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `rombel` int(11) NOT NULL,
  `jabatan` int(4) DEFAULT NULL,
  `user` int(11) NOT NULL,
  `jadwal_piket` int(4) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `rombel`, `jabatan`, `user`, `jadwal_piket`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '12345678', 'Kevin', 1, 4, 9, 5, '2023-10-02 22:14:28', NULL, NULL),
(8, '26558', 'Kelsey', 1, NULL, 15, 1, '2023-10-10 00:12:23', '2024-04-22 16:50:34', NULL),
(9, '8645', 'Bong', 3, NULL, 16, NULL, '2023-10-10 23:03:50', NULL, NULL),
(17, '24161001', 'Richard', 3, NULL, 24, NULL, '2023-11-14 11:17:28', NULL, NULL),
(21, '24161002', 'Ari Setia Firmansyah', 3, NULL, 28, NULL, '2023-11-20 21:12:49', NULL, NULL),
(22, '24161003', 'Dodi', 14, NULL, 29, NULL, '2023-12-03 17:08:52', NULL, NULL),
(25, '123123', 'yanda', 18, NULL, 39, NULL, '2024-04-22 16:24:05', NULL, NULL);

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
(3, '2024', 'Tidak-Aktif', '2023-10-09 02:28:21', NULL, NULL),
(5, '2025', 'Tidak-Aktif', '2024-04-22 16:19:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `foto` text NOT NULL,
  `jenjang` int(11) NOT NULL,
  `pendaftaran` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `foto`, `jenjang`, `pendaftaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'Super SMK', 'c4ca4238a0b923820dcc509a6f75849b', 1, 'default.png', 2, NULL, '2023-10-09 14:09:16', NULL, NULL),
(8, 'Pak If', 'Pak If', 'c4ca4238a0b923820dcc509a6f75849b', 3, 'default.png', 2, NULL, '2023-10-09 14:09:16', NULL, NULL),
(9, 'Kevin', 'Kevin', 'c4ca4238a0b923820dcc509a6f75849b', 5, 'default.png', 2, NULL, '2023-10-09 14:09:16', NULL, NULL),
(14, 'Pak ray', 'Pak Ray', 'c4ca4238a0b923820dcc509a6f75849b', 3, 'ae86.png', 2, NULL, '2023-10-10 00:11:40', NULL, NULL),
(15, 'Kelsey', 'Kelsey', 'c4ca4238a0b923820dcc509a6f75849b', 4, 'default.png', 2, NULL, '2023-10-10 00:12:23', NULL, NULL),
(16, 'Bong', 'Bong', 'c4ca4238a0b923820dcc509a6f75849b', 4, 'default.png', 2, NULL, '2023-10-10 23:03:50', NULL, NULL),
(24, 'Darr', '24161001', 'c4ca4238a0b923820dcc509a6f75849b', 4, 'default.png', 2, 7, '2023-11-14 11:17:28', NULL, NULL),
(28, 'ell', '24161002', '3d3b09b06fb6bb0661799b9ea28cb355', 4, 'default.png', 2, 2, '2023-11-20 21:12:49', NULL, NULL),
(30, 'jeky chen', 'jeky', 'c4ca4238a0b923820dcc509a6f75849b', 5, 'jk.jpg', 2, NULL, '2024-01-20 16:44:54', NULL, NULL),
(31, 'Srima', 'Bu Srima', 'c4ca4238a0b923820dcc509a6f75849b', 10, '', 2, NULL, '2024-01-21 11:57:03', NULL, NULL),
(32, 'Pak Restu', 'Pak Restu', 'c4ca4238a0b923820dcc509a6f75849b', 11, '', 2, NULL, '2024-01-21 11:58:19', NULL, NULL),
(39, '', '123123', '4297f44b13955235245b2497399d7a93', 4, 'default.png', 1, 12, '2024-04-22 16:24:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `periode` varchar(255) NOT NULL,
  `p_mulai` datetime NOT NULL,
  `p_selesai` datetime NOT NULL,
  `status` enum('Aktif','Tidak-Aktif') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id`, `periode`, `p_mulai`, `p_selesai`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, '2025', '2023-09-26 12:00:00', '2024-02-29 12:00:00', 'Tidak-Aktif', '2023-09-26 23:29:02', '2024-01-17 11:45:55', NULL),
(8, '2026', '2024-04-22 12:00:00', '2024-04-24 12:00:00', 'Aktif', '2024-04-22 16:26:10', '2024-04-22 16:26:10', NULL);

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
(1, 'Absensi Siswa', 'logo_contoh.svg', 'logo_pdf_contoh.svg', 'favicon_contoh.svg', 'Komp. Pahlawan Mas', 'Jl. Raya Pahlawan No. 123', 'Kel. Sukajadi', 'Kec. Sukasari', 'Kota Batam', '29424', '2023-05-01 16:33:53', NULL, NULL),
(2, 'sadsa\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-21 16:01:03', '2024-04-21 16:01:12', '2024-04-21 16:01:12');

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
-- Indexes for table `data_absensi_kantor`
--
ALTER TABLE `data_absensi_kantor`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `data_absensi_sekolah`
--
ALTER TABLE `data_absensi_sekolah`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `data_agenda`
--
ALTER TABLE `data_agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `data_instruktur`
--
ALTER TABLE `data_instruktur`
  ADD PRIMARY KEY (`id_instruktur`);

--
-- Indexes for table `data_jurusan`
--
ALTER TABLE `data_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `data_keterangan`
--
ALTER TABLE `data_keterangan`
  ADD PRIMARY KEY (`id_keterangan`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `hasil_vote`
--
ALTER TABLE `hasil_vote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

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
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

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
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `perizinan`
--
ALTER TABLE `perizinan`
  ADD PRIMARY KEY (`id_perizinan`);

--
-- Indexes for table `piket`
--
ALTER TABLE `piket`
  ADD PRIMARY KEY (`id_piket`);

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
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_blok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_absensi_kantor`
--
ALTER TABLE `data_absensi_kantor`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_absensi_sekolah`
--
ALTER TABLE `data_absensi_sekolah`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_agenda`
--
ALTER TABLE `data_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_instruktur`
--
ALTER TABLE `data_instruktur`
  MODIFY `id_instruktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_jurusan`
--
ALTER TABLE `data_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_keterangan`
--
ALTER TABLE `data_keterangan`
  MODIFY `id_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hasil_vote`
--
ALTER TABLE `hasil_vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `keterangan_perizinan`
--
ALTER TABLE `keterangan_perizinan`
  MODIFY `id_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=668;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `perizinan`
--
ALTER TABLE `perizinan`
  MODIFY `id_perizinan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `piket`
--
ALTER TABLE `piket`
  MODIFY `id_piket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id_website` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
