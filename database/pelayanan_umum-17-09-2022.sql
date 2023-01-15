-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 17, 2022 at 05:50 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelayanan_umum`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggaran_sumber_dana`
--

CREATE TABLE `anggaran_sumber_dana` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sumber_dana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggaran` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggaran_sumber_dana`
--

INSERT INTO `anggaran_sumber_dana` (`id`, `id_sumber_dana`, `anggaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 1000000, '2018-06-27 11:03:17', '2022-08-14 07:02:16', '2022-08-14 07:02:16'),
(2, '2', 2000000, '2018-07-02 12:28:25', '2022-08-14 07:02:18', '2022-08-14 07:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `id_kategori`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pulpen', '1', NULL, NULL, NULL),
(2, 'Flash Disk', '2', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `child_ruang`
--

CREATE TABLE `child_ruang` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_parent_ruang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `nama_subruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_ruang`
--

INSERT INTO `child_ruang` (`id`, `id_parent_ruang`, `kapasitas`, `nama_subruang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2', 0, '', '2019-02-21 08:56:29', '2019-02-21 09:01:54', '2019-02-21 09:01:54'),
(2, '2', 130, 'A', '2019-02-21 09:07:44', '2019-02-21 09:07:44', NULL),
(3, '2', 220, 'Anggota', '2019-02-21 09:57:34', '2019-02-21 09:57:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `nama_driver` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status_driver` enum('Ready','Not Ready') DEFAULT 'Ready',
  `created_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `nama_driver`, `email`, `status_driver`, `created_at`, `deleted_at`, `updated_at`) VALUES
(3, 'bambang 23', 'budi@gmail.com', 'Ready', '2022-09-07 23:37:40', '0000-00-00 00:00:00', '2022-09-10 18:09:22'),
(4, 'Lionel Messi', 'testuser@gmail.com', 'Ready', '2022-09-08 00:35:05', '0000-00-00 00:00:00', '2022-09-11 01:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_tanpa_gelar` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_induk` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_bidang` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `universitas` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_atasan` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_supervisor` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_manajer` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `nama_tanpa_gelar`, `no_induk`, `nid`, `jabatan`, `bidang`, `sub_bidang`, `grade`, `jenis_kelamin`, `pendidikan`, `universitas`, `password`, `id_atasan`, `id_supervisor`, `id_manajer`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SYSTEM OWNER BLOK I DAN PLTU', '', '1', '1', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', 'jIrRjQ1SAFACuuzWX6rGtzei0K8xLoG53zZX5A0e89ASMRa7LUku4cu4qQrd', '2022-08-09 23:42:36', '2022-08-09 23:42:36', NULL),
(2, 'SYSTEM OWNER BLOK II DAN III', '', '2', '2', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', 'W5jMRQXbsihXbJmt5iUPyGkBftQpUuOpUpQRGRZ7qKhcG6x42xm86Xx90wAk', '2022-08-09 23:44:33', '2022-08-09 23:44:33', NULL),
(3, 'TECHNOLOGY OWNER', '', '3', '3', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', 'bYayCT5PNOPHms6sUAv9o1PKeRzzUbheffWCOZfjHsnL86rzQ2m6KAZUPoGE', '2022-08-09 23:44:48', '2022-08-09 23:44:48', NULL),
(4, 'MANAJEMEN MUTU DAN KINERJA', '', '4', '4', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:45:02', '2022-08-09 23:45:02', NULL),
(5, 'MANAJEMEN RISIKO DAN KEPATUHAN', '', '5', '5', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:45:17', '2022-08-09 23:45:17', NULL),
(6, 'SDM', '', '6', '6', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:45:31', '2022-08-09 23:45:31', NULL),
(7, 'KEUANGAN', '', '7', '7', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:47:09', '2022-08-09 23:47:09', NULL),
(8, 'INVENTORI KONTROL & KATALOGER', '', '8', '8', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:47:22', '2022-08-09 23:47:22', NULL),
(9, 'PENGADAAN', '', '9', '9', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:47:32', '2022-08-09 23:47:32', NULL),
(10, 'ADMINISTRASI GUDANG', '', '10', '10', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:47:45', '2022-08-09 23:47:45', NULL),
(11, 'RENDAL OPERASI PLTGU BLOK I DAN PLTU', '', '11', '11', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:47:56', '2022-08-09 23:47:56', NULL),
(12, 'RENDAL OPERASI PLTGU BLOK II DAN III', '', '12', '12', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:48:12', '2022-08-09 23:48:12', NULL),
(13, 'NIAGA & BAHAN BAKAR', '', '13', '13', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:48:27', '2022-08-09 23:48:27', NULL),
(14, 'KIMIA & LABORATORIUM', '', '14', '14', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:48:38', '2022-08-09 23:48:38', NULL),
(15, 'PRODUKSI PLTGU BLOK I A', '', '15', '15', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:48:50', '2022-08-09 23:48:50', NULL),
(16, 'PRODUKSI PLTGU BLOK I B', '', '16', '16', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:49:03', '2022-08-09 23:49:13', NULL),
(17, 'PRODUKSI PLTGU BLOK I C', '', '17', '17', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:49:29', '2022-08-09 23:49:29', NULL),
(18, 'PRODUKSI PLTGU BLOK I D', '', '20', '20', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:49:42', '2022-08-09 23:49:58', '2022-08-09 23:49:58'),
(19, 'PRODUKSI PLTGU BLOK I D', '', '18', '18', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:50:09', '2022-08-09 23:50:09', NULL),
(20, 'PRODUKSI PLTGU BLOK II A', '', '19', '19', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:50:24', '2022-08-09 23:50:24', NULL),
(21, 'PRODUKSI PLTGU BLOK II B', '', '20', '20', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:50:39', '2022-08-09 23:50:39', NULL),
(22, 'PRODUKSI PLTGU BLOK II C', '', '21', '21', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:50:56', '2022-08-09 23:50:56', NULL),
(23, 'PRODUKSI PLTGU BLOK II D', '', '22', '22', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:51:07', '2022-08-09 23:51:07', NULL),
(24, 'PRODUKSI PLTGU BLOK III A', '', '23', '23', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:51:34', '2022-08-09 23:51:34', NULL),
(25, 'PRODUKSI PLTGU BLOK III B', '', '24', '24', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:51:48', '2022-08-09 23:51:48', NULL),
(26, 'PRODUKSI PLTGU BLOK III C', '', '25', '25', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:52:00', '2022-08-09 23:52:00', NULL),
(27, 'PRODUKSI PLTGU BLOK III D', '', '26', '26', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:52:17', '2022-08-09 23:52:17', NULL),
(28, 'PRODUKSI PLTU 4-5 A', '', '27', '27', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:52:28', '2022-08-09 23:52:28', NULL),
(29, 'PRODUKSI PLTU 4-5 B', '', '28', '28', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:52:41', '2022-08-09 23:52:41', NULL),
(30, 'PRODUKSI PLTU 4-5 C', '', '29', '29', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:52:56', '2022-08-09 23:52:56', NULL),
(31, 'PRODUKSI PLTU 4-5 D', '', '30', '30', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:53:08', '2022-08-09 23:53:08', NULL),
(32, 'RENDAL PEMELIHARAAN PLTGU BLOK I DAN PLTU', '', '31', '31', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:53:20', '2022-08-09 23:53:20', NULL),
(33, 'RENDAL PEMELIHARAAN PLTGU BLOK II DAN III', '', '32', '32', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:53:31', '2022-08-09 23:53:31', NULL),
(34, 'MESIN PLTGU BLOK I DAN PLTU', '', '33', '33', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:53:41', '2022-08-09 23:53:41', NULL),
(35, 'MESIN PLTGU BLOK II', '', '34', '34', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:53:52', '2022-08-09 23:53:52', NULL),
(36, 'MESIN PLTGU BLOK III', '', '35', '35', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:54:07', '2022-08-09 23:55:18', NULL),
(37, 'LISTRIK PLTGU BLOK I DAN PLTU', '', '37', '37', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:54:20', '2022-08-09 23:54:30', '2022-08-09 23:54:30'),
(38, 'LISTRIK PLTGU BLOK I DAN PLTU', '', '36', '36', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:54:39', '2022-08-09 23:54:39', NULL),
(39, 'LISTRIK PLTGU BLOK II', '', '37', '37', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:54:51', '2022-08-09 23:54:51', NULL),
(40, 'LISTRIK PLTGU BLOK III', '', '38', '38', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:55:50', '2022-08-09 23:55:50', NULL),
(41, 'KONTROL & INSTRUMEN PLTGU BLOK I DAN PLTU', '', '39', '39', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:56:05', '2022-08-09 23:56:05', NULL),
(42, 'KONTROL & INSTRUMEN PLTGU BLOK II', '', '40', '40', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:56:24', '2022-08-09 23:56:24', NULL),
(43, 'KONTROL & INSTRUMEN PLTGU BLOK III', '', '41', '41', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:56:39', '2022-08-09 23:56:39', NULL),
(44, 'OUTAGE MANAGEMENT', '', '42', '42', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:56:50', '2022-08-09 23:56:50', NULL),
(45, 'SARANA', '', '43', '43', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:57:06', '2022-08-09 23:57:06', NULL),
(46, 'LINGKUNGAN', '', '44', '44', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:57:18', '2022-08-09 23:57:18', NULL),
(47, 'K3', '', '45', '45', '', '', '', '', 'L', '', '', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', NULL, NULL, NULL, 'Karyawan', NULL, '2022-08-09 23:57:29', '2022-08-09 23:57:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kategori_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id`, `nama_kategori_barang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Alat Tulis', NULL, NULL, NULL),
(2, 'Alat Kantor', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `nama_kendaraan` varchar(255) NOT NULL,
  `tipe_bbm` varchar(255) NOT NULL,
  `no_pol` varchar(255) NOT NULL,
  `status_kendaraan` enum('Ready','Not Ready') DEFAULT 'Ready',
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nama_kendaraan`, `tipe_bbm`, `no_pol`, `status_kendaraan`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'CRV', 'bensin', 'B2163SJG', 'Ready', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Xpander Cross', 'bensin', 'B2567POF', 'Ready', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Xpander Cross', 'bensin', 'B2792POE', 'Ready', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Xpander Cross', 'bensin', 'B2565POF', 'Ready', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Xpander Cross', 'bensin', 'B2571POF', 'Ready', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Xpander Cross', 'bensin', 'B2790POE', 'Ready', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Innova Venturer', 'diesel', 'B2236UKN', 'Ready', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Innova', 'bensin', 'B1905UIV', 'Ready', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Innova', 'bensin', 'B1977UIV', 'Ready', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Innova', 'bensin', 'B1997UIV', 'Ready', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Innova', 'bensin', 'B1693UIS', 'Ready', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Innova', 'bensin', 'B1694UIS', 'Ready', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Innova', 'bensin', 'B2202UKN', 'Ready', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Innova', 'bensin', 'B2287UKN', 'Ready', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Hiace', 'diesel', 'B7953UDA', 'Ready', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Hiace', 'diesel', 'B7959UDA', 'Ready', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Beat Mbeer', 'bensin', 'B69696KUL', 'Ready', '2022-09-11 01:17:29', '2022-08-11 03:49:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `layout_ruang`
--

CREATE TABLE `layout_ruang` (
  `id` int(11) NOT NULL,
  `nama_layout_ruang` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layout_ruang`
--

INSERT INTO `layout_ruang` (`id`, `nama_layout_ruang`, `foto`, `created_at`, `updated_at`) VALUES
(2, 'Classroom', 'layoutruangan\\/foto_layout-ruang/6324f9b9980b9.png', '2022-09-16 15:33:29', '2022-09-16 15:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_05_172234_create_test_table', 1),
(4, '2018_06_06_091005_create_permohonan_konsumsi_table', 2),
(5, '2018_06_06_091006_create_anggaran_sumber_dana_table', 2),
(6, '2018_06_06_091006_create_karyawan_table', 2),
(7, '2018_06_06_091006_create_pemesanan_ruangan_table', 2),
(8, '2018_06_06_091006_create_ruang_table', 2),
(9, '2018_06_06_091006_create_sumber_dana_table', 2),
(10, '2018_07_19_110032_create_surat_perintah_jalan_table', 3),
(11, '2018_07_19_110100_create_permohonan_pemakaian_kendaraan_table', 3),
(12, '2018_07_19_110117_create_permohonan_atk_table', 3),
(13, '2018_07_19_110132_create_barang_table', 3),
(14, '2018_07_19_110141_create_kategori_barang_table', 3),
(15, '2019_02_16_073754_create_child_ruang_table', 4),
(16, '2019_02_21_112800_create_setting_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `pemesanan_ruangan_id` int(11) DEFAULT NULL,
  `permohonan_konsumsi_id` int(11) DEFAULT NULL,
  `permohonan_pemakaian_kendaraan_id` int(11) DEFAULT NULL,
  `surat_perintah_jalan_id` int(11) DEFAULT NULL,
  `permohonan_atk_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `pemesanan_ruangan_id`, `permohonan_konsumsi_id`, `permohonan_pemakaian_kendaraan_id`, `surat_perintah_jalan_id`, `permohonan_atk_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL, NULL, NULL, 1, '2022-09-11 01:11:14', '2022-09-11 01:13:49'),
(2, NULL, 2, NULL, NULL, NULL, 1, '2022-09-11 01:11:33', '2022-09-11 01:13:17'),
(3, NULL, NULL, 1, NULL, NULL, 1, '2022-09-11 01:12:47', '2022-09-11 01:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_ruangan`
--

CREATE TABLE `pemesanan_ruangan` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_pemesanan_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemohon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemohon_id` int(10) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `nama_acara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pemesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_awal` int(11) NOT NULL,
  `waktu_akhir` int(11) NOT NULL,
  `jumlah_peserta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_ruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pj` enum('Pending','Approved','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `supervisor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_supervisor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manajer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_manajer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_ruang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `design_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan_ruangan`
--

INSERT INTO `pemesanan_ruangan` (`id`, `no_pemesanan_ruangan`, `pemohon`, `pemohon_id`, `tanggal`, `tanggal_selesai`, `nama_acara`, `nama_pemesan`, `waktu_awal`, `waktu_akhir`, `jumlah_peserta`, `id_ruang`, `attachment`, `keterangan`, `status_pj`, `supervisor`, `status_supervisor`, `manajer`, `status_manajer`, `child_ruang`, `design_ruangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PR-20220911-151', 'SYSTEM OWNER BLOK I DAN PLTU', 1, '2022-09-11', NULL, 'test', 'test', 1662894660, 1662898320, '100', '15', '000684300_1494578255-Hibiscus-Flower-Free-Download-HD-Wallpaper-03.jpg', NULL, 'Approved', NULL, 'Pending', NULL, 'Pending', '', 'U-Shape', '2022-09-11 00:59:05', '2022-09-11 00:59:05', NULL),
(2, 'PR-20220911-62', 'SYSTEM OWNER BLOK I DAN PLTU', 1, '2022-09-11', NULL, '2', '21', 1662891000, 1662934200, '10', '6', '000684300_1494578255-Hibiscus-Flower-Free-Download-HD-Wallpaper-03.jpg', '100', 'Approved', NULL, 'Pending', NULL, 'Pending', '', 'U-Shape', '2022-09-11 01:11:14', '2022-09-11 01:11:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_atk`
--

CREATE TABLE `permohonan_atk` (
  `id` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_diberikan` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemohon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bagian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permohonan_atk`
--

INSERT INTO `permohonan_atk` (`id`, `jumlah`, `nama_barang`, `jumlah_diberikan`, `keterangan`, `pemohon`, `bagian`, `penanggung_jawab`, `status_pj`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12, '1', 0, 'Yang 1 TB', 'RAHMAT SOLEH', 'TU', '2', 'Approved', '2018-07-29 13:08:36', '2018-07-29 14:26:00', '2018-07-29 14:26:00'),
(2, 12, '1', 12, 'Banyakin Ye', 'RAHMAT SOLEH', 'TU', '2', 'Approved', '2018-07-29 14:27:05', '2018-07-29 14:27:05', NULL),
(3, 123, '1', 0, 'asd', 'TEDDY SUTENDI, ST', '12', '', 'Pending', '2022-04-05 04:55:01', '2022-04-05 04:55:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_konsumsi`
--

CREATE TABLE `permohonan_konsumsi` (
  `id` int(10) UNSIGNED NOT NULL,
  `pemohon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemohon_id` int(11) NOT NULL,
  `no_permohonan_konsumsi` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `sumber_dana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_konsumsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_peserta` int(11) DEFAULT NULL,
  `status_approval` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supervisor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_supervisor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manajer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_manajer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status_pj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pelaksana` enum('Terlaksana','Belum Terlaksana') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Terlaksana'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permohonan_konsumsi`
--

INSERT INTO `permohonan_konsumsi` (`id`, `pemohon`, `pemohon_id`, `no_permohonan_konsumsi`, `tanggal`, `jam`, `sumber_dana`, `kegiatan`, `jenis_konsumsi`, `jumlah_peserta`, `status_approval`, `supervisor`, `status_supervisor`, `manajer`, `status_manajer`, `keterangan`, `jumlah`, `created_at`, `updated_at`, `deleted_at`, `status_pj`, `status_pelaksana`) VALUES
(2, 'SYSTEM OWNER BLOK I DAN PLTU', 1, 1, '2022-09-11', NULL, 'test', 'test', 'Snack Pagi + Makan Siang + Snack Sore + Makan Malam', 100, NULL, NULL, 'Pending', NULL, 'Pending', NULL, 100, '2022-09-11 01:11:33', '2022-09-11 01:11:33', NULL, 'Approved', 'Terlaksana');

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_pemakaian_kendaraan`
--

CREATE TABLE `permohonan_pemakaian_kendaraan` (
  `id` int(10) UNSIGNED NOT NULL,
  `pemohon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemohon_id` int(11) NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_berangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kembali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_berangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_kembali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latlng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permohonan_pemakaian_kendaraan`
--

INSERT INTO `permohonan_pemakaian_kendaraan` (`id`, `pemohon`, `pemohon_id`, `tujuan`, `keperluan`, `hari`, `tanggal_berangkat`, `tanggal_kembali`, `jam_berangkat`, `jam_kembali`, `penanggung_jawab`, `status_pj`, `latlng`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SYSTEM OWNER BLOK I DAN PLTU', 1, 'test', 'test', '', '2022-09-11', '2022-09-12', '10:10', '15:15', 'test', 'Approved', '-6.116318173472779,106.78951263427734', 'test', '2022-09-11 01:12:47', '2022-09-11 01:12:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_ruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_ruang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kapasitas` int(10) NOT NULL,
  `deskripsi` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_ruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id`, `id_ruang`, `nama_ruang`, `child_ruang`, `kapasitas`, `deskripsi`, `foto_ruang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, '001', 'Generato Lt. 4', NULL, 40, 'Ruangan', 'ruangan\\/foto_ruang/62f9a551df581.jpeg', '2022-08-09 23:59:16', '2022-08-14 18:45:54', NULL),
(7, '002', 'Turbine Lt. 4', NULL, 40, 'ruangan', 'ruangan\\/foto_ruang/62f9a55c737eb.jpeg', '2022-08-09 23:59:49', '2022-08-14 18:46:04', NULL),
(8, '003', 'Transformator', NULL, 35, 'ruangan', 'ruangan\\/foto_ruang/62f9a56c730c4.jpeg', '2022-08-10 00:00:11', '2022-08-14 18:46:20', NULL),
(9, '004', 'Boiler Lt. 4', NULL, 35, 'Ruangan', 'ruangan\\/foto_ruang/62f9a579123d4.jpeg', '2022-08-10 00:00:32', '2022-08-14 18:46:33', NULL),
(10, '005', 'H2 Plant Lt. 2', NULL, 20, 'Ruangan', 'ruangan\\/foto_ruang/62f9a58472206.jpeg', '2022-08-10 00:00:52', '2022-08-14 18:46:44', NULL),
(11, '006', 'HRSG Lt. 2', NULL, 20, 'Ruangan', 'ruangan\\/foto_ruang/62f9a58f7f7b7.jpeg', '2022-08-10 00:01:11', '2022-08-14 18:46:55', NULL),
(12, '007', 'Clorination Lt. 1', NULL, 15, 'Ruangan', 'ruangan\\/foto_ruang/62f357cb27ab1.jpeg', '2022-08-10 00:01:31', '2022-08-10 00:01:31', NULL),
(13, '007', 'Generator - Turbine', NULL, 60, 'Ruangan', 'ruangan\\/foto_ruang/62f9a5b286e8f.jpeg', '2022-08-10 00:01:56', '2022-08-14 18:47:30', NULL),
(14, '008', 'Transformatror - Boiler', NULL, 50, 'Ruangan', 'ruangan\\/foto_ruang/62f9a5c048fe3.jpeg', '2022-08-10 00:02:28', '2022-08-14 18:47:44', NULL),
(15, '008', 'ALL LT. 4', NULL, 150, 'Ruangan', 'ruangan\\/foto_ruang/62f9a5cb6df4b.jpeg', '2022-08-10 00:02:54', '2022-08-14 18:47:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sumber_dana`
--

CREATE TABLE `sumber_dana` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_sumber_dana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sumber_dana`
--

INSERT INTO `sumber_dana` (`id`, `nama_sumber_dana`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PT. PLN Persero', '2018-06-27 11:02:24', '2018-06-27 11:02:24', NULL),
(2, 'PT. PJB', '2018-07-02 12:28:09', '2018-07-02 12:28:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surat_perintah_jalan`
--

CREATE TABLE `surat_perintah_jalan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_permohonan_pemakaian_kendaraan` int(11) NOT NULL,
  `nama_pengemudi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jarak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bbm_1` int(11) DEFAULT NULL,
  `bbm_2` int(11) DEFAULT NULL,
  `total_biaya` int(11) NOT NULL,
  `total_biaya_2` int(11) DEFAULT NULL,
  `biaya_toll` int(11) NOT NULL,
  `tanggal_berangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kembali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_berangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_kembali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengisian_bbm` float NOT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `penanggung_jawab_pool` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pj_pool` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `status_perjalanan` enum('Belum Sampai','Sudah Sampai') COLLATE utf8mb4_unicode_ci DEFAULT 'Belum Sampai',
  `kendaraan_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_perintah_jalan`
--

INSERT INTO `surat_perintah_jalan` (`id`, `id_permohonan_pemakaian_kendaraan`, `nama_pengemudi`, `tujuan`, `jarak`, `bbm_1`, `bbm_2`, `total_biaya`, `total_biaya_2`, `biaya_toll`, `tanggal_berangkat`, `tanggal_kembali`, `jam_berangkat`, `jam_kembali`, `pengisian_bbm`, `penanggung_jawab`, `status_pj`, `penanggung_jawab_pool`, `status_pj_pool`, `status_perjalanan`, `kendaraan_id`, `driver_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '', 'test', '3.336', NULL, NULL, 1240283, NULL, 1233333, '2022-09-11', '2022-09-12', '10:10', '15:15', 0.556, '', 'Pending', '', 'Pending', 'Sudah Sampai', 17, 4, '2022-09-11 01:17:25', '2022-09-11 01:17:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@admin.com', '$2y$10$jHLrUOeA1fhA402LkFouf.L9d8Zvrl2DlK5XggmLeBaarqhz8LK0K', 'superadmin', 'Qtw5gcO1OkUFF5vF3lQeK7nVVi9jbJbvOx2t2PwU6MbDFuP08YbeaTiMo2wl', '2018-06-05 05:06:19', '2018-06-05 05:06:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran_sumber_dana`
--
ALTER TABLE `anggaran_sumber_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_ruang`
--
ALTER TABLE `child_ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layout_ruang`
--
ALTER TABLE `layout_ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pemesanan_ruangan`
--
ALTER TABLE `pemesanan_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permohonan_atk`
--
ALTER TABLE `permohonan_atk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permohonan_konsumsi`
--
ALTER TABLE `permohonan_konsumsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permohonan_pemakaian_kendaraan`
--
ALTER TABLE `permohonan_pemakaian_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_perintah_jalan`
--
ALTER TABLE `surat_perintah_jalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggaran_sumber_dana`
--
ALTER TABLE `anggaran_sumber_dana`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `child_ruang`
--
ALTER TABLE `child_ruang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `layout_ruang`
--
ALTER TABLE `layout_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemesanan_ruangan`
--
ALTER TABLE `pemesanan_ruangan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permohonan_atk`
--
ALTER TABLE `permohonan_atk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permohonan_konsumsi`
--
ALTER TABLE `permohonan_konsumsi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permohonan_pemakaian_kendaraan`
--
ALTER TABLE `permohonan_pemakaian_kendaraan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat_perintah_jalan`
--
ALTER TABLE `surat_perintah_jalan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
