-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 08:55 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbaga`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian_departemen`
--

CREATE TABLE `bagian_departemen` (
  `id_bagian_dept` int(11) NOT NULL,
  `nama_bagian_dept` varchar(30) NOT NULL,
  `id_dept` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian_departemen`
--

INSERT INTO `bagian_departemen` (`id_bagian_dept`, `nama_bagian_dept`, `id_dept`) VALUES
(5, 'SOFTWARE', 3),
(6, 'LAB', 4);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_dept` int(11) NOT NULL,
  `nama_dept` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_dept`, `nama_dept`) VALUES
(3, 'IT'),
(4, 'PPIC');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` int(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `kode`, `deskripsi`) VALUES
(1, 'G1', 'Sebagian tombol keyboard tidak berfungsi'),
(2, 'G2', 'Keyboard mengetik sendiri'),
(3, 'G3', 'PC menyala'),
(4, 'G4', 'Komponen hardware lain berjalan normal'),
(5, 'G5', 'Gambar pada monitor tidak muncul'),
(6, 'G6', 'Sinyal gambar tidak muncul'),
(7, 'G7', 'Komputer restart terus menerus'),
(8, 'G8', 'Banyak file yang corrupt'),
(9, 'G9', 'Kinerja PC melambat'),
(10, 'G10', 'PC tidak dapat connect jaringan'),
(11, 'G11', 'Router terpasang dengan baik'),
(12, 'G12', 'Telah melakukan restart PC'),
(13, 'G13', 'Aplikasi PGBS tidak dapat muncul');

-- --------------------------------------------------------

--
-- Table structure for table `history_feedback`
--

CREATE TABLE `history_feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_ticket` varchar(13) NOT NULL,
  `feedback` int(11) NOT NULL,
  `reported` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_feedback`
--

INSERT INTO `history_feedback` (`id_feedback`, `id_ticket`, `feedback`, `reported`) VALUES
(5, 'T201612020001', 1, 'K0001'),
(6, 'T201612020002', 1, 'K0001'),
(7, 'T201612040003', 1, 'K0001'),
(8, 'T201612040004', 0, 'K0001'),
(9, 'T201612180007', 1, 'K0002'),
(10, 'T201612180006', 0, 'K0002'),
(11, 'T201612190008', 1, 'K0001'),
(12, 'T202206090013', 1, 'K0009'),
(13, 'T202301110022', 1, 'K0009');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `subject` varchar(35) NOT NULL,
  `pesan` text NOT NULL,
  `status` decimal(2,0) NOT NULL,
  `id_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `tanggal`, `subject`, `pesan`, `status`, `id_user`) VALUES
(3, '2022-09-14 15:51:20', 'MARKICOB', 'INI ADALAH VIEW\r\nCOBA DI LIHAT SAMPE BAWAH\r\nAKU GATAU', '1', 'K0008'),
(4, '2022-09-14 15:51:38', 'BABAYO', 'BABAYO\r\nBBBBABAYO\r\nHUEKK', '1', 'K0008');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'KEPALA BAGIAN'),
(2, 'KEPALA DEPARTEMEN'),
(3, 'KEPALA REGU'),
(4, 'OPERATOR'),
(5, 'KEPALA DIVISI');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(5) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(10) NOT NULL,
  `id_bagian_dept` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `email`, `alamat`, `jk`, `id_bagian_dept`, `id_jabatan`) VALUES
('K0001', 'SURYA', 'surya@gmail.com', 'TANGERANG', 'LAKI-LAKI', 5, 2),
('K0002', 'Desy', 'desy@gmail.com', 'JAKARTA', 'PEREMPUAN', 5, 3),
('K0003', 'Teknisi 1', 'hendi@gmail.com', 'TANGERANG', 'LAKI-LAKI', 5, 4),
('K0005', 'Rio', 'rio@gmail.com', 'TANGERANG', 'LAKI-LAKI', 5, 2),
('K0006', 'Deni', 'deni@gmail.com', 'TANGERANG', 'LAKI-LAKI', 6, 4),
('K0007', 'Deden', 'deden@gmail.com', 'TES', 'LAKI-LAKI', 5, 1),
('K0008', 'Admin', 'admin@gmail.com', 'Admin', 'LAKI-LAKI', 5, 2),
('K0009', 'Bobo', 'bobo@gmail.com', 'BANDUNG', 'LAKI-LAKI', 5, 1),
('K0010', 'Teknisi 3', 'jeje@gmail.com', 'BOGOR', 'PEREMPUAN', 5, 4),
('K0011', 'Cory', 'cory@gmail.com', 'BANDUNG', 'LAKI-LAKI', 5, 4),
('K0012', 'Teknisi 2', 'david@gmail.com', 'JAKARTA', 'LAKI-LAKI', 6, 3),
('K0014', 'user', 'user@gmail.com', 'JL.APA ADANYA', 'PEREMPUAN', 5, 4),
('K0015', 'teknisi', 'teknisi@gmail.com', 'JL. TEKNISI', 'LAKI-LAKI', 5, 4),
('K0016', 'Yohana Adella', 'elloyyabest02@gmail.com', 'SAWOJAJAR', 'PEREMPUAN', 5, 3),
('K0017', 'Yabes', 'elloyyabest@gmail.com', 'PANDAN', 'LAKI-LAKI', 5, 3),
('K0018', 'Teknisi 4', 'gayusreinaldy@gmail.com', 'PANDAN', 'LAKI-LAKI', 5, 1),
('K0019', 'yabes baru', 'asdasd@gmail.com', 'YESSS', 'PEREMPUAN', 5, 4),
('K0020', 'anton', 'anton@gmail.com', 'PANDAN JUGAK', 'LAKI-LAKI', 6, 2),
('K0021', 'Garry', 'garry@gmail.com', 'SUMBERSARI', 'LAKI-LAKI', 5, 1),
('K0022', 'Kayla', 'key@gmail.com', 'PANDAN', 'LAKI-LAKI', 6, 3),
('K0023', 'kepala nich', 'elloyyabest@outlook.com', 'ASDASD', 'LAKI-LAKI', 5, 5),
('K0024', 'Donald', 'mitraolie01@gmail.com', 'JAKARTA UTARA', 'LAKI-LAKI', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'HARDWARE'),
(5, 'SOFTWARE');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `nama_kondisi` varchar(30) NOT NULL,
  `waktu_respon` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id_kondisi`, `nama_kondisi`, `waktu_respon`) VALUES
(1, 'MENDESAK', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_sub_kategori` int(11) NOT NULL,
  `nama_sub_kategori` varchar(35) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_sub_kategori`, `nama_sub_kategori`, `id_kategori`) VALUES
(2, 'KERUSAKAN KOMPONEN MONITOR', 4),
(3, 'KERUSAKAN MOUSE', 4),
(4, 'KERUSAKAN KEYBOARD', 4),
(5, 'APLIKASI CLOUD', 5);

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id_teknisi` varchar(5) NOT NULL,
  `nik` varchar(5) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `point` decimal(2,0) NOT NULL,
  `gejala` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id_teknisi`, `nik`, `id_kategori`, `status`, `point`, `gejala`) VALUES
('T0001', 'K0003', 4, '', '2', '1,2,3,4,5,6'),
('T0002', 'K0012', 4, '', '0', '3,4,5,6,9,10'),
('T0003', 'K0010', 5, '', '1', '1,2,3,4,7,8,9,10,11,12'),
('T0004', 'K0018', 5, '', '0', '3,4,12,13');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` varchar(13) NOT NULL,
  `tanggal` datetime NOT NULL,
  `tanggal_proses` datetime NOT NULL,
  `tanggal_solved` datetime NOT NULL,
  `reported` varchar(5) NOT NULL,
  `id_sub_kategori` int(11) NOT NULL,
  `problem_summary` varchar(50) NOT NULL,
  `problem_detail` text NOT NULL,
  `id_teknisi` varchar(5) NOT NULL,
  `status` int(11) NOT NULL,
  `progress` decimal(10,0) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `gejala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `tanggal`, `tanggal_proses`, `tanggal_solved`, `reported`, `id_sub_kategori`, `problem_summary`, `problem_detail`, `id_teknisi`, `status`, `progress`, `email_user`, `gejala`) VALUES
('T201612020001', '2016-12-02 16:59:18', '2016-12-02 17:00:39', '0000-00-00 00:00:00', 'K0001', 2, 'SASAS', 'NBNB', 'T0002', 6, '90', '', ''),
('T201612020002', '2016-12-02 17:05:29', '2016-12-02 17:09:06', '0000-00-00 00:00:00', 'K0001', 2, 'CXZCX', 'CXZC', 'T0002', 6, '100', '', ''),
('T201612040003', '2016-12-04 07:06:47', '2016-12-04 08:20:29', '2016-12-04 08:22:11', 'K0001', 4, 'KLKL', 'ASA', 'T0002', 6, '100', '', ''),
('T201612040004', '2016-12-04 08:24:44', '2016-12-04 08:25:57', '2016-12-04 09:47:27', 'K0001', 2, 'KLKL', 'BBB', 'T0002', 6, '100', '', ''),
('T201612040005', '2016-12-04 09:43:02', '2016-12-04 09:46:50', '0000-00-00 00:00:00', 'K0001', 2, 'SASAS', 'NJKHKJK', 'T0002', 4, '0', '', ''),
('T201612180006', '2016-12-18 07:00:49', '2016-12-18 07:25:21', '2016-12-18 07:26:11', 'K0002', 4, 'TES', 'TES', 'T0001', 6, '100', '', ''),
('T201612180007', '2016-12-18 08:09:25', '2016-12-18 08:17:45', '2016-12-18 08:20:37', 'K0002', 2, 'RUSAK MONITOR', 'TOLONG CEPAT DI PROSES KARENA TIDAK ADA MONITOR BACKUP', 'T0001', 6, '0', '', ''),
('T201612190008', '2016-12-19 13:02:25', '2016-12-19 13:03:37', '2016-12-19 13:03:54', 'K0001', 4, 'NH', 'NH', 'T0001', 6, '100', '', ''),
('T201612190009', '2016-12-19 14:09:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0001', 4, 'GDGFGHH', 'ASDFGHJKL', '', 2, '0', '', ''),
('T201612190010', '2016-12-19 14:35:33', '2016-12-19 15:09:27', '2016-12-19 15:09:59', 'K0001', 2, '35535', '53', 'T0001', 6, '100', '', ''),
('T201612280011', '2016-12-28 15:15:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0001', 2, '6UYUGTY', 'NJHJHJHJHJHJHJ BHGHJG B JHJHJ JHJHJNN', 'T0001', 3, '0', '', ''),
('T202112210012', '2021-12-21 11:23:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0014', 4, 'ADADADADADADADADDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '', 1, '0', '', ''),
('T202206090013', '2022-06-09 15:36:17', '2022-06-09 15:37:58', '2022-06-09 15:39:18', 'K0009', 3, 'MOUSEKU RUSA', 'TULUNG', 'T0001', 6, '100', '', ''),
('T202206140014', '2022-06-14 16:46:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0016', 4, 'ASD', 'ASDASD', '', 2, '0', 'elloyyabest02@gmail.com', ''),
('T202206140015', '2022-06-14 17:03:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0017', 4, 'KEYBOARD RUSHAK', 'DISINI SAYA SANGAT SEDIH KARENA KEYBOARD SAYA RUSAK', '', 2, '0', 'elloyyabest@gmail.com', ''),
('T202206140016', '2022-06-14 17:11:51', '2022-06-14 17:26:16', '2022-06-14 17:40:44', 'K0017', 2, 'MONITOR NGEBLUR', 'INI MONITORNYA YANG NGEBLUR SEKARANG WAK', 'T0002', 6, '100', 'elloyyabest@gmail.com', ''),
('T202206140017', '2022-06-14 18:05:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0016', 3, 'MOUSE RUSAK', 'MOUSE DIMAKAN KUCING', 'T0001', 5, '0', 'elloyyabest02@gmail.com', ''),
('T202206140018', '2022-06-14 18:24:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0016', 2, 'MONITOR BIRU', 'MONITORKU YANG CANTIK BERUBAH JADI BIRU', '', 1, '0', 'elloyyabest02@gmail.com', ''),
('T202301110019', '2023-01-11 10:55:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0002', 2, 'INI MASALAH NI', 'INI ADALAH DESKRIPSI MASALAH', '', 1, '0', 'desy@gmail.com', ''),
('T202301110020', '2023-01-11 11:00:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', '', '', 1, '0', 'desy@gmail.com', ''),
('T202301110021', '2023-01-11 11:07:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0002', 4, 'INI MASALAH', 'KERUSAKAN KEYBOARD', '', 1, '0', 'desy@gmail.com', ''),
('T202301110022', '2023-01-11 13:34:20', '2023-01-11 13:38:14', '2023-01-20 13:38:30', 'K0009', 5, 'CLOUD', 'NOT FOUND', 'T0003', 6, '100', 'bobo@gmail.com', ''),
('T202301190023', '2023-01-19 19:03:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0009', 5, 'INI SUBJECT', 'INI DESKRIPSI', '', 1, '0', 'bobo@gmail.com', ''),
('T202301190024', '2023-01-19 19:05:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0009', 2, 'MONITOR LAGI', 'YOK YOKY OK', '', 1, '0', 'bobo@gmail.com', ''),
('T202301190025', '2023-01-19 19:17:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0008', 2, 'ASD', 'ASDA', '', 1, '0', 'admin@gmail.com', ''),
('T202301260026', '2023-01-26 20:52:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0002', 2, 'ASD', 'ASDASDASD', '', 2, '0', 'desy@gmail.com', ''),
('T202307220027', '2023-07-22 10:31:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0024', 2, 'MASALAH', '', '', 2, '0', 'mitraolie01@gmail.com', ''),
('T202307220028', '2023-07-22 13:42:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0024', 5, 'TESTING GEJALA KEDUA', '', '', 2, '0', 'mitraolie01@gmail.com', '1,2,3,4,5,6'),
('T202307220029', '2023-07-22 17:21:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0024', 5, 'ASDASD', '', '', 2, '0', 'mitraolie01@gmail.com', '3,4,5,6,13,12');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id_tracking` int(11) NOT NULL,
  `id_ticket` varchar(13) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id_tracking`, `id_ticket`, `tanggal`, `status`, `deskripsi`, `id_user`) VALUES
(1, 'T201612020001', '2016-12-02 16:59:18', 'Created Ticket', '', 'K0001'),
(2, 'T201612020001', '2016-12-02 16:59:34', 'Ticket disetujui', '', 'K0001'),
(3, 'T201612020001', '2016-12-02 16:59:55', 'Pemilihan Teknisi', 'Ticket Anda sudah di berikan kepada Teknisi', 'K0001'),
(4, 'T201612020001', '2016-12-02 17:00:39', 'Diproses oleh teknisi', '', 'K0001'),
(5, 'T201612020001', '2016-12-02 17:01:32', 'Up Progress To 100 %', 'SELESAI SILAHKAN AMBIL', 'K0001'),
(6, 'T201612020002', '2016-12-02 17:05:29', 'Created Ticket', '', 'K0001'),
(7, 'T201612020002', '2016-12-02 17:05:41', 'Ticket tidak disetujui', '', 'K0001'),
(8, 'T201612020002', '2016-12-02 17:05:47', 'Ticket dikembalikan ke posisi belum di setujui', '', 'K0001'),
(9, 'T201612020002', '2016-12-02 17:05:48', 'Ticket disetujui', '', 'K0001'),
(10, 'T201612020002', '2016-12-02 17:06:08', 'Pemilihan Teknisi', 'Ticket Anda sudah di berikan kepada Teknisi', 'K0001'),
(11, 'T201612020002', '2016-12-02 17:06:35', 'Pending oleh teknisi', '', 'K0001'),
(12, 'T201612020002', '2016-12-02 17:09:06', 'Diproses oleh teknisi', '', 'K0001'),
(13, 'T201612020002', '2016-12-02 17:09:32', 'Up Progress To 90 %', '', 'K0001'),
(14, 'T201612020002', '2016-12-04 06:32:39', 'Up Progress To 100 %', '', 'K0001'),
(15, 'T201612040003', '2016-12-04 07:06:47', 'Created Ticket', '', 'K0001'),
(16, 'T201612040003', '2016-12-04 08:19:03', 'Ticket disetujui', '', 'K0001'),
(17, 'T201612040003', '2016-12-04 08:19:17', 'Pemilihan Teknisi', 'Ticket Anda sudah di berikan kepada Teknisi', 'K0001'),
(18, 'T201612040003', '2016-12-04 08:20:29', 'Diproses oleh teknisi', '', 'K0001'),
(19, 'T201612040003', '2016-12-04 08:21:14', 'Up Progress To 10 %', '', 'K0001'),
(20, 'T201612040003', '2016-12-04 08:22:11', 'Up Progress To 100 %', '', 'K0001'),
(21, 'T201612040004', '2016-12-04 08:24:44', 'Created Ticket', '', 'K0001'),
(22, 'T201612040004', '2016-12-04 08:25:04', 'Ticket disetujui', '', 'K0001'),
(23, 'T201612040004', '2016-12-04 08:25:35', 'Pemilihan Teknisi', 'Ticket Anda sudah di berikan kepada Teknisi', 'K0001'),
(24, 'T201612040004', '2016-12-04 08:25:57', 'Diproses oleh teknisi', '', 'K0001'),
(25, 'T201612040004', '2016-12-04 08:43:02', 'Up Progress To 10 %', 'MENUNGGU KOMPONEN MAINBOARD', 'K0001'),
(26, 'T201612040005', '2016-12-04 09:43:02', 'Created Ticket', '', 'K0001'),
(27, 'T201612040005', '2016-12-04 09:44:22', 'Ticket tidak disetujui', '', 'K0001'),
(28, 'T201612040005', '2016-12-04 09:44:23', 'Ticket tidak disetujui', '', 'K0001'),
(29, 'T201612040005', '2016-12-04 09:44:35', 'Ticket dikembalikan ke posisi belum di setujui', '', 'K0001'),
(30, 'T201612040005', '2016-12-04 09:44:37', 'Ticket disetujui', '', 'K0001'),
(31, 'T201612040005', '2016-12-04 09:45:31', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(32, 'T201612040005', '2016-12-04 09:45:58', 'Pending oleh teknisi', '', 'K0001'),
(33, 'T201612040005', '2016-12-04 09:46:50', 'Diproses oleh teknisi', '', 'K0001'),
(34, 'T201612040004', '2016-12-04 09:47:27', 'Up Progress To 100 %', '', 'K0001'),
(35, 'T201612180006', '2016-12-18 07:00:49', 'Created Ticket', '', 'K0002'),
(36, 'T201612180006', '2016-12-18 07:01:49', 'Ticket disetujui', '', 'K0001'),
(37, 'T201612180006', '2016-12-18 07:23:02', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(38, 'T201612180006', '2016-12-18 07:25:21', 'Diproses oleh teknisi', '', 'K0003'),
(39, 'T201612180006', '2016-12-18 07:25:48', 'Up Progress To 10 %', '', 'K0003'),
(40, 'T201612180006', '2016-12-18 07:25:58', 'Up Progress To 70 %', '', 'K0003'),
(41, 'T201612180006', '2016-12-18 07:26:11', 'Up Progress To 100 %', 'SELESAI', 'K0003'),
(42, 'T201612180007', '2016-12-18 08:09:25', 'Created Ticket', '', 'K0002'),
(43, 'T201612180007', '2016-12-18 08:11:12', 'Ticket disetujui', '', 'K0005'),
(44, 'T201612180007', '2016-12-18 08:16:57', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(45, 'T201612180007', '2016-12-18 08:17:45', 'Diproses oleh teknisi', '', 'K0003'),
(46, 'T201612180007', '2016-12-18 08:18:21', 'Up Progress To 70 %', 'TINGGAL TUNGGU KOMPONEN', 'K0003'),
(47, 'T201612180007', '2016-12-18 08:20:37', 'Up Progress To 100 %', 'SOLVED TINGGAL AMBIL', 'K0003'),
(48, 'T201612190008', '2016-12-19 13:02:25', 'Created Ticket', '', 'K0001'),
(49, 'T201612190008', '2016-12-19 13:02:36', 'Ticket disetujui', '', 'K0001'),
(50, 'T201612190008', '2016-12-19 13:02:53', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(51, 'T201612190008', '2016-12-19 13:03:37', 'Diproses oleh teknisi', '', 'K0003'),
(52, 'T201612190008', '2016-12-19 13:03:54', 'Up Progress To 100 %', 'SELESAI', 'K0003'),
(53, 'T201612190009', '2016-12-19 14:09:09', 'Created Ticket', '', 'K0001'),
(54, 'T201612190009', '2016-12-19 14:11:49', 'Ticket disetujui', '', 'K0001'),
(55, 'T201612190010', '2016-12-19 14:35:33', 'Created Ticket', '', 'K0001'),
(56, 'T201612190010', '2016-12-19 14:35:38', 'Ticket disetujui', '', 'K0001'),
(57, 'T201612190010', '2016-12-19 14:47:17', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(58, 'T201612190010', '2016-12-19 15:09:27', 'Diproses oleh teknisi', '', 'K0003'),
(59, 'T201612190010', '2016-12-19 15:09:44', 'Up Progress To 50 %', 'TGGU KOMP', 'K0003'),
(60, 'T201612190010', '2016-12-19 15:09:59', 'Up Progress To 100 %', 'OKJE', 'K0003'),
(61, 'T201612280011', '2016-12-28 15:15:32', 'Created Ticket', '', 'K0001'),
(62, 'T201612280011', '2016-12-28 15:15:54', 'Ticket disetujui', '', 'K0001'),
(63, 'T201612280011', '2016-12-28 15:16:46', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(64, 'T202112210012', '2021-12-21 11:23:41', 'Created Ticket', '', 'K0014'),
(65, 'T202206090013', '2022-06-09 15:36:17', 'Created Ticket', '', 'K0009'),
(66, 'T202206090013', '2022-06-09 15:37:05', 'Ticket disetujui', '', 'K0008'),
(67, 'T202206090013', '2022-06-09 15:37:26', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0008'),
(68, 'T202206090013', '2022-06-09 15:37:58', 'Diproses oleh teknisi', '', 'K0003'),
(69, 'T202206090013', '2022-06-09 15:38:14', 'Up Progress To 40 %', 'WES 40% MASZEH', 'K0003'),
(70, 'T202206090013', '2022-06-09 15:39:18', 'Up Progress To 100 %', 'MARI MASZEH', 'K0003'),
(86, 'T202206140014', '2022-06-14 16:46:56', 'Created Ticket', '', 'K0016'),
(87, 'T202206140014', '2022-06-14 16:58:25', 'Ticket disetujui', '', 'K0008'),
(88, 'T202206140015', '2022-06-14 17:03:31', 'Created Ticket', '', 'K0017'),
(89, 'T202206140015', '2022-06-14 17:04:09', 'Ticket disetujui', '', 'K0008'),
(90, 'T202206140015', '2022-06-14 17:05:03', 'Ticket disetujui', '', 'K0008'),
(91, 'T202206140016', '2022-06-14 17:11:51', 'Created Ticket', '', 'K0017'),
(92, 'T202206140016', '2022-06-14 17:12:24', 'Ticket disetujui', '', 'K0008'),
(93, 'T202206140016', '2022-06-14 17:15:45', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0008'),
(94, 'T202206140016', '2022-06-14 17:26:16', 'Diproses oleh teknisi', '', 'K0012'),
(95, 'T202206140016', '2022-06-14 17:36:27', 'Up Progress To 20 %', 'BARU NGUMPULIN NIAT DULU BANG', 'K0012'),
(96, 'T202206140016', '2022-06-14 17:38:11', 'Up Progress To 80 %', 'HAMPIR SELESE BANG, TUNGGU BESOK YA', 'K0012'),
(97, 'T202206140016', '2022-06-14 17:40:44', 'Up Progress To 100 %', 'NAH UDAH SELESE BANG, MAKASI UDAH PERCAYA AMA GUA', 'K0012'),
(98, 'T202206140017', '2022-06-14 18:05:06', 'Created Ticket', '', 'K0016'),
(99, 'T202206140017', '2022-06-14 18:07:17', 'Ticket disetujui', '', 'K0008'),
(100, 'T202206140017', '2022-06-14 18:07:17', 'Ticket disetujui', '', 'K0008'),
(101, 'T202206140017', '2022-06-14 18:08:19', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0008'),
(102, 'T202206140017', '2022-06-14 18:10:41', 'Pending oleh teknisi', '', 'K0003'),
(103, 'T202206140018', '2022-06-14 18:24:26', 'Created Ticket', '', 'K0016'),
(104, 'T202206140018', '2022-06-14 18:26:44', 'Ticket tidak disetujui', '', 'K0008'),
(105, 'T202206140018', '2022-06-14 18:26:54', 'Ticket dikembalikan ke posisi belum di setujui', '', 'K0008'),
(106, 'T202301110019', '2023-01-11 10:55:05', 'Created Ticket', '', 'K0002'),
(107, 'T202301110020', '2023-01-11 11:00:49', 'Created Ticket', '', ''),
(108, 'T202301110021', '2023-01-11 11:07:46', 'Created Ticket', '', 'K0002'),
(109, 'T202301110022', '2023-01-11 13:34:20', 'Created Ticket', '', 'K0009'),
(110, 'T202301110022', '2023-01-11 13:36:49', 'Ticket disetujui', '', 'K0008'),
(111, 'T202301110022', '2023-01-11 13:37:47', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0008'),
(112, 'T202301110022', '2023-01-11 13:38:14', 'Diproses oleh teknisi', '', 'K0010'),
(113, 'T202301110022', '2023-01-11 13:38:30', 'Up Progress To 100 %', 'DAH KELAR BOS', 'K0010'),
(114, 'T202301190023', '2023-01-19 19:03:26', 'Created Ticket', '', 'K0009'),
(115, 'T202301190024', '2023-01-19 19:05:41', 'Created Ticket', '', 'K0009'),
(116, 'T202301190025', '2023-01-19 19:17:24', 'Created Ticket', '', 'K0008'),
(117, 'T202301260026', '2023-01-26 20:52:49', 'Created Ticket', '', 'K0002'),
(118, 'T202301260026', '2023-01-26 20:53:39', 'Ticket disetujui', '', 'K0008'),
(119, 'T202307220027', '2023-07-22 10:31:52', 'Created Ticket', '', 'K0024'),
(120, 'T202307220027', '2023-07-22 10:33:39', 'Ticket disetujui', '', 'K0008'),
(121, 'T202307220028', '2023-07-22 13:42:54', 'Created Ticket', '', 'K0024'),
(122, 'T202307220028', '2023-07-22 13:46:21', 'Ticket disetujui', '', 'K0008'),
(123, 'T202307220028', '2023-07-22 13:46:39', 'Ticket disetujui', '', 'K0008'),
(124, 'T202307220028', '2023-07-22 13:46:49', 'Ticket disetujui', '', 'K0008'),
(125, 'T202307220029', '2023-07-22 17:21:11', 'Created Ticket', '', 'K0024'),
(126, 'T202307220029', '2023-07-22 17:21:26', 'Ticket disetujui', '', 'K0008');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(10) NOT NULL,
  `kantor` varchar(30) NOT NULL,
  `cabang` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `username`, `email`, `password`, `level`, `kantor`, `cabang`, `jabatan`) VALUES
(2, '', 'K0003', 'hendi@gmail.com', '12345678', 'TEKNISI', 'BANDULAN', 'BANDULAN BARAT', '5'),
(3, '', 'K0002', 'desy@gmail.com', '12345678', 'USER', '', '', ''),
(4, '', 'K0005', 'rio@gmail.com', '12345678', 'USER', '', '', ''),
(7, '', 'K0008', 'admin@gmail.com', 'admin', 'ADMIN', '', '', ''),
(11, '', 'K0009', 'bobo@gmail.com', '12345678', 'USER', '', '', ''),
(13, '', 'K0010', 'jeje@gmail.com', '12345678', 'TEKNISI', '', '', ''),
(15, '', 'K0012', 'david@gmail.com', '12345678', 'TEKNISI', '', '', ''),
(16, '', 'K0014', 'user@gmail.com', 'user', 'USER', '', '', ''),
(17, '', 'K0015', 'teknisi@gmail.com', 'teknisi', 'TEKNISI', '', '', ''),
(18, '', 'K0014', 'user@gmail.com', 'test', 'USER', '', '', ''),
(20, '', 'K0016', 'elloyyabest02@gmail.com', '123456', 'USER', 'PT BPR Trikarya Waranugraha', 'Sukun', '3'),
(23, '', 'K0017', 'elloyyabest@gmail.com', '123456', 'USER', 'pandan', 'pandan', '3'),
(26, '', 'K0018', 'gayusreinaldy@gmail.com', '123456', 'USER', 'pandan', 'pandan', '1'),
(27, '', 'K0020', 'anton@gmail.com', '123456', 'USER', 'PT PENULIS CERDAS', 'pandan', '2'),
(28, '', 'K0021', 'garry@gmail.com', '123444', 'USER', 'PT BPR Trikarya Waranugraha', 'Sumbersari', ''),
(29, '', 'K0022', 'key@gmail.com', '123456', 'USER', 'PT PENULIS CERDAS', 'Sukun', '2'),
(30, 'kepala nich', 'K0023', 'elloyyabest@outlook.com', '123456', 'USER', 'Pandan Landung', 'Malang', '5'),
(31, 'Donald', 'K0024', 'mitraolie01@gmail.com', '123456', 'USER', 'Jakarta', 'Jakarta Utara', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian_departemen`
--
ALTER TABLE `bagian_departemen`
  ADD PRIMARY KEY (`id_bagian_dept`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_dept`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_feedback`
--
ALTER TABLE `history_feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_sub_kategori`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id_tracking`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian_departemen`
--
ALTER TABLE `bagian_departemen`
  MODIFY `id_bagian_dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `history_feedback`
--
ALTER TABLE `history_feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_sub_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
