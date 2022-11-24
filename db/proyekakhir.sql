-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 12:44 PM
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
-- Database: `proyekakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode_booking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_kamar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `pemesanan_id`, `users_id`, `status_id`, `kode_booking`, `nomor_kamar`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 8, 'NPK1', '1', '2022-11-04 01:01:58', '2022-11-04 01:01:58'),
(2, 3, 4, 8, 'NPK3', '3', '2022-11-04 01:13:38', '2022-11-04 01:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `catatans`
--

CREATE TABLE `catatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_kamar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catatans`
--

INSERT INTO `catatans` (`id`, `nama`, `nomor_kamar`, `bulan`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 'afifah dewi yantika', '1', 'November', 400000, '2022-11-04 01:01:58', '2022-11-04 01:01:58'),
(2, 'afifah dewi yantika', '1', 'Desember', 400000, '2022-11-04 01:02:05', '2022-11-04 01:02:05'),
(3, 'afifah dewi yantika', '1', 'Januari', 400000, '2022-11-04 01:02:12', '2022-11-04 01:02:12'),
(4, 'afifah dewi yantika', '1', 'Februari', 400000, '2022-11-04 01:02:19', '2022-11-04 01:02:19'),
(5, 'alfiah yusiana', '3', 'November', 400000, '2022-11-04 01:13:38', '2022-11-04 01:13:38'),
(6, 'alfiah yusiana', '3', 'Desember', 400000, '2022-11-04 01:13:47', '2022-11-04 01:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_kos`
--

CREATE TABLE `foto_kos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kos_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto_kos`
--

INSERT INTO `foto_kos` (`id`, `foto`, `kos_id`, `created_at`, `updated_at`) VALUES
(1, 'WhatsApp Image 2022-10-31 at 10.24.15.jpeg', 1, '2022-11-04 00:58:01', '2022-11-04 00:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `kos`
--

CREATE TABLE `kos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_sewa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_kamar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kamar_kosong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kos`
--

INSERT INTO `kos` (`id`, `nama_kos`, `rekening`, `bank`, `alamat`, `nomor_telepon`, `fasilitas`, `deskripsi`, `harga_sewa`, `jumlah_kamar`, `kamar_kosong`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Kos ARINI', NULL, NULL, 'Jl. Raya Jember No.13, Kawang, Labanasem, Kec. Kabat, Kabupaten Banyuwangi, Jawa Timur 68461, Indonesia', '1232425523782', 'tv, kulkas, almari, dapur umum, kamar mandi', 'Dekat kampus Poliwangi, Dekat Stasiun Rogojampi', '400000', '10', '7', '-8.2951993', '114.3069417', '2022-11-04 00:58:01', '2022-11-04 01:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_10_080037_create_roles_table', 1),
(6, '2022_07_10_080038_create_tipe_kos_table', 1),
(7, '2022_07_10_080113_create_user_role_table', 1),
(8, '2022_07_12_065606_create_kos_table', 1),
(9, '2022_07_12_065607_create_pemilik_kos_table', 1),
(10, '2022_07_12_070116_create_foto_kos_table', 1),
(11, '2022_07_14_152628_create_statuses_table', 1),
(12, '2022_07_14_153009_create_pemesanans_table', 1),
(13, '2022_07_14_153016_create_pembayarans_table', 1),
(14, '2022_08_20_170514_create_tagihans_table', 1),
(15, '2022_08_21_062155_create_bookings_table', 1),
(16, '2022_08_28_080843_create_catatans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kos_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `sisa_tagihan` int(11) DEFAULT NULL,
  `expired_at` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `pemesanan_id`, `users_id`, `kos_id`, `status_id`, `bukti_pembayaran`, `total`, `sisa_tagihan`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 10, NULL, 1600000, 0, 1667635242, '2022-11-04 01:00:42', '2022-11-04 01:02:19'),
(2, 2, 4, 1, 4, NULL, 0, 0, 1667635483, '2022-11-04 01:04:43', '2022-11-04 01:04:43'),
(3, 3, 4, 1, 10, NULL, 800000, 0, 1667635945, '2022-11-04 01:12:25', '2022-11-04 01:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanans`
--

CREATE TABLE `pemesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kos_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal_masuk` bigint(20) DEFAULT NULL,
  `tanggal_keluar` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanans`
--

INSERT INTO `pemesanans` (`id`, `users_id`, `kos_id`, `status_id`, `tanggal_masuk`, `tanggal_keluar`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 2, 1667574000, 1677596400, '2022-11-04 00:59:40', '2022-11-04 01:00:42'),
(2, 4, 1, 2, 1667549078, 1667549078, '2022-11-04 01:04:38', '2022-11-04 01:04:43'),
(3, 4, 1, 2, 1667574480, 1672499460, '2022-11-04 01:06:09', '2022-11-04 01:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_kos`
--

CREATE TABLE `pemilik_kos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kos_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tipe_kos_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemilik_kos`
--

INSERT INTO `pemilik_kos` (`id`, `user_id`, `kos_id`, `tipe_kos_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2, '2022-11-04 00:58:01', '2022-11-04 00:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-11-04 00:47:54', '2022-11-04 00:47:54'),
(2, 'Pemilik', '2022-11-04 00:47:54', '2022-11-04 00:47:54'),
(3, 'Penyewa', '2022-11-04 00:47:54', '2022-11-04 00:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `tipe`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pemesanan', 'Pesanan Masuk', '2022-11-04 00:47:54', '2022-11-04 00:47:54'),
(2, 'Pemesanan', 'Pemesanan Berhasil', '2022-11-04 00:47:54', '2022-11-04 00:47:54'),
(3, 'Pemesanan', 'Pemesanan Batal', '2022-11-04 00:47:54', '2022-11-04 00:47:54'),
(4, 'Pembayaran', 'Menunggu Pembayaran', '2022-11-04 00:47:54', '2022-11-04 00:47:54'),
(5, 'Pembayaran', 'Menunggu Konfirmasi', '2022-11-04 00:47:54', '2022-11-04 00:47:54'),
(6, 'Pembayaran', 'Pembayaran Terkonfirmasi', '2022-11-04 00:47:54', '2022-11-04 00:47:54'),
(7, 'Pembayaran', 'Pembayaran Dibatalkan', '2022-11-04 00:47:54', '2022-11-04 00:47:54'),
(8, 'Booking', 'Booking Berlangsung', '2022-11-04 00:47:54', '2022-11-04 00:47:54'),
(9, 'Booking', 'Booking Berakhir', '2022-11-04 00:47:54', '2022-11-04 00:47:54'),
(10, 'Pembayaran', 'Dibayar Sebagian', '2022-11-04 00:47:54', '2022-11-04 00:47:54'),
(11, 'Pembayaran', 'Lunas', '2022-11-04 00:47:54', '2022-11-04 00:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `tagihans`
--

CREATE TABLE `tagihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembayaran_id` bigint(20) UNSIGNED DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagihans`
--

INSERT INTO `tagihans` (`id`, `pembayaran_id`, `users_id`, `status_id`, `total`, `bukti`, `bulan`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 6, 400000, 'WhatsApp Image 2022-10-07 at 09.49.55.jpeg', '11', '2022-11-04 01:00:42', '2022-11-04 01:01:57'),
(2, 1, 3, 6, 400000, 'WhatsApp Image 2022-10-07 at 09.49.55.jpeg', '12', '2022-11-04 01:00:42', '2022-11-04 01:02:05'),
(3, 1, 3, 6, 400000, 'WhatsApp Image 2022-10-07 at 09.49.55.jpeg', '13', '2022-11-04 01:00:42', '2022-11-04 01:02:12'),
(4, 1, 3, 6, 400000, 'WhatsApp Image 2022-10-07 at 09.49.55.jpeg', '14', '2022-11-04 01:00:42', '2022-11-04 01:02:19'),
(5, 3, 4, 6, 400000, 'WhatsApp Image 2022-10-31 at 10.24.15.jpeg', '11', '2022-11-04 01:12:25', '2022-11-04 01:13:38'),
(6, 3, 4, 6, 400000, 'WhatsApp Image 2022-10-31 at 10.24.15.jpeg', '12', '2022-11-04 01:12:25', '2022-11-04 01:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kos`
--

CREATE TABLE `tipe_kos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipe_kos`
--

INSERT INTO `tipe_kos` (`id`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 'Laki - Laki', '2022-11-04 00:47:54', '2022-11-04 00:47:54'),
(2, 'Perempuan', '2022-11-04 00:47:54', '2022-11-04 00:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `jenis_kelamin`, `nomor_telepon`, `alamat`, `foto_ktp`, `nik`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$w83.dkl2/AMzOy3ycnjg5OuUCaaecrT3Ob3w8QRDpN.tSNwcANNx2', NULL, '2022-11-04 00:47:54', '2022-11-04 00:47:54'),
(2, 'Arini Norma', 'arini@gmail.com', NULL, '1234567892136', 'Jl. Raya Rogojampi No.15, Jajang Surat, Karangbendo, Kec. Rogojampi, Kabupaten Banyuwangi, Jawa Timur 68461, Indonesia', NULL, NULL, NULL, '$2y$10$3hqGCD32Q/zKh0Q2LeHYQeiGpZ8J4jNnHyShJS3dXAo5MPIApqThS', NULL, '2022-11-04 00:54:27', '2022-11-04 00:54:27'),
(3, 'afifah dewi yantika', 'afifahdewiyantika@gmail.com', '2', '372162512342', 'afifahdewiyantika@gmail.com', 'WhatsApp Image 2022-10-07 at 09.49.55.jpeg', '56657993731257', NULL, '$2y$10$Z5RtZI6..I.Gnj3AjfXU4ehEQMnIKdy0OeXSn1qQna7q7ZY1Q/2/y', NULL, '2022-11-04 00:59:25', '2022-11-04 00:59:25'),
(4, 'alfiah yusiana', 'yusi@gmail.com', '2', '253246568', 'Rogojampi', 'WhatsApp Image 2022-10-07 at 09.49.55.jpeg', '13356853890', NULL, '$2y$10$DUGoZ0Fc2lO6X7vUxzwQwezc1lFlHxndImN/a/awLT1SfspMkH.qe', NULL, '2022-11-04 01:04:15', '2022-11-04 01:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-11-04 00:47:54', '2022-11-04 00:47:54'),
(2, 2, 2, '2022-11-04 00:54:27', '2022-11-04 00:54:27'),
(3, 3, 3, '2022-11-04 00:59:25', '2022-11-04 00:59:25'),
(4, 4, 3, '2022-11-04 01:04:15', '2022-11-04 01:04:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_pemesanan_id_foreign` (`pemesanan_id`),
  ADD KEY `bookings_users_id_foreign` (`users_id`),
  ADD KEY `bookings_status_id_foreign` (`status_id`);

--
-- Indexes for table `catatans`
--
ALTER TABLE `catatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foto_kos`
--
ALTER TABLE `foto_kos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foto_kos_kos_id_foreign` (`kos_id`);

--
-- Indexes for table `kos`
--
ALTER TABLE `kos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kos_nama_kos_unique` (`nama_kos`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayarans_pemesanan_id_foreign` (`pemesanan_id`),
  ADD KEY `pembayarans_users_id_foreign` (`users_id`),
  ADD KEY `pembayarans_kos_id_foreign` (`kos_id`),
  ADD KEY `pembayarans_status_id_foreign` (`status_id`);

--
-- Indexes for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanans_users_id_foreign` (`users_id`),
  ADD KEY `pemesanans_kos_id_foreign` (`kos_id`),
  ADD KEY `pemesanans_status_id_foreign` (`status_id`);

--
-- Indexes for table `pemilik_kos`
--
ALTER TABLE `pemilik_kos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemilik_kos_user_id_foreign` (`user_id`),
  ADD KEY `pemilik_kos_kos_id_foreign` (`kos_id`),
  ADD KEY `pemilik_kos_tipe_kos_id_foreign` (`tipe_kos_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagihans`
--
ALTER TABLE `tagihans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagihans_pembayaran_id_foreign` (`pembayaran_id`),
  ADD KEY `tagihans_users_id_foreign` (`users_id`),
  ADD KEY `tagihans_status_id_foreign` (`status_id`);

--
-- Indexes for table `tipe_kos`
--
ALTER TABLE `tipe_kos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_user_id_foreign` (`user_id`),
  ADD KEY `user_role_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catatans`
--
ALTER TABLE `catatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_kos`
--
ALTER TABLE `foto_kos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kos`
--
ALTER TABLE `kos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemesanans`
--
ALTER TABLE `pemesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemilik_kos`
--
ALTER TABLE `pemilik_kos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tagihans`
--
ALTER TABLE `tagihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tipe_kos`
--
ALTER TABLE `tipe_kos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto_kos`
--
ALTER TABLE `foto_kos`
  ADD CONSTRAINT `foto_kos_kos_id_foreign` FOREIGN KEY (`kos_id`) REFERENCES `kos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_kos_id_foreign` FOREIGN KEY (`kos_id`) REFERENCES `kos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayarans_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayarans_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayarans_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD CONSTRAINT `pemesanans_kos_id_foreign` FOREIGN KEY (`kos_id`) REFERENCES `kos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanans_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanans_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemilik_kos`
--
ALTER TABLE `pemilik_kos`
  ADD CONSTRAINT `pemilik_kos_kos_id_foreign` FOREIGN KEY (`kos_id`) REFERENCES `kos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemilik_kos_tipe_kos_id_foreign` FOREIGN KEY (`tipe_kos_id`) REFERENCES `tipe_kos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemilik_kos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tagihans`
--
ALTER TABLE `tagihans`
  ADD CONSTRAINT `tagihans_pembayaran_id_foreign` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayarans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagihans_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagihans_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
