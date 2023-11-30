-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2023 pada 02.54
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsswp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternative`
--

CREATE TABLE `alternative` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_alternative` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alternative`
--

INSERT INTO `alternative` (`id`, `kode_alternative`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A1', 'Fazda', '2023-11-24 17:18:55', '2023-11-24 17:18:55'),
(4, 'A2', 'Zaki', '2023-11-26 01:36:21', '2023-11-26 01:36:21'),
(5, 'A5', 'Zulfan', '2023-11-26 01:36:40', '2023-11-26 01:36:40'),
(6, 'A6', 'Andre', '2023-11-26 01:36:52', '2023-11-26 01:36:52'),
(7, 'A7', 'Alim', '2023-11-26 17:09:43', '2023-11-26 17:09:43'),
(8, 'A3', 'Saeful', '2023-11-26 17:15:07', '2023-11-26 17:15:07'),
(9, 'A8', 'Fathan', '2023-11-29 18:30:02', '2023-11-29 18:30:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `criteria`
--

CREATE TABLE `criteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_criteria` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` double(8,2) NOT NULL,
  `type_criteria` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `criteria`
--

INSERT INTO `criteria` (`id`, `kode_criteria`, `name`, `weight`, `type_criteria`, `created_at`, `updated_at`) VALUES
(1, 'K1', 'Kehadiran', 5.00, 'Benefit', NULL, '2023-11-26 16:50:54'),
(2, 'K2', 'Salary/Bulan', 4.00, 'Cost', '2023-11-24 17:45:25', '2023-11-26 16:50:45'),
(3, 'K3', 'Ketrampilan/Skills', 6.00, 'Benefit', '2023-11-24 19:37:58', '2023-11-26 16:50:37'),
(4, 'K4', 'Kualitas Pekerjaan', 5.00, 'Benefit', '2023-11-25 21:21:39', '2023-11-26 16:50:27'),
(5, 'K5', 'Team Work', 3.00, 'Benefit', '2023-11-26 01:49:56', '2023-11-26 16:50:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_20_022617_create_alternative_table', 1),
(6, '2023_11_20_022950_create_criteria_table', 1),
(7, '2023_11_20_023816_create_nilai_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jum_nilai` int(11) NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `alternative_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `jum_nilai`, `criteria_id`, `alternative_id`, `created_at`, `updated_at`) VALUES
(7, 4, 1, 1, '2023-11-25 21:14:12', '2023-11-26 01:27:41'),
(8, 5, 2, 1, '2023-11-25 21:14:12', '2023-11-25 21:14:12'),
(9, 4, 3, 1, '2023-11-25 21:14:12', '2023-11-25 21:15:42'),
(10, 5, 4, 1, '2023-11-25 21:21:54', '2023-11-26 01:33:36'),
(13, 4, 1, 4, '2023-11-26 01:37:33', '2023-11-26 01:37:33'),
(14, 5, 2, 4, '2023-11-26 01:37:33', '2023-11-26 01:37:33'),
(15, 4, 3, 4, '2023-11-26 01:37:33', '2023-11-26 01:37:33'),
(16, 3, 4, 4, '2023-11-26 01:37:33', '2023-11-26 01:37:33'),
(17, 4, 1, 5, '2023-11-26 01:37:48', '2023-11-26 01:37:48'),
(18, 5, 2, 5, '2023-11-26 01:37:48', '2023-11-26 01:37:48'),
(19, 3, 3, 5, '2023-11-26 01:37:48', '2023-11-26 01:37:48'),
(20, 2, 4, 5, '2023-11-26 01:37:48', '2023-11-26 01:37:48'),
(21, 4, 1, 6, '2023-11-26 01:38:06', '2023-11-26 01:38:06'),
(22, 3, 2, 6, '2023-11-26 01:38:06', '2023-11-26 01:38:06'),
(23, 3, 3, 6, '2023-11-26 01:38:06', '2023-11-26 01:38:06'),
(24, 3, 4, 6, '2023-11-26 01:38:06', '2023-11-26 01:38:06'),
(25, 6, 5, 1, '2023-11-26 01:50:15', '2023-11-26 16:55:34'),
(27, 6, 5, 4, '2023-11-26 01:50:34', '2023-11-26 01:50:34'),
(28, 6, 5, 5, '2023-11-26 01:50:42', '2023-11-26 01:50:42'),
(29, 6, 5, 6, '2023-11-26 01:50:50', '2023-11-26 01:50:50'),
(30, 5, 1, 7, '2023-11-26 17:12:20', '2023-11-26 17:12:20'),
(31, 3, 2, 7, '2023-11-26 17:12:20', '2023-11-26 17:12:20'),
(32, 3, 3, 7, '2023-11-26 17:12:20', '2023-11-26 17:12:20'),
(33, 4, 4, 7, '2023-11-26 17:12:20', '2023-11-26 17:12:20'),
(34, 5, 5, 7, '2023-11-26 17:12:20', '2023-11-26 17:12:20'),
(40, 3, 1, 8, '2023-11-26 17:33:10', '2023-11-26 17:33:10'),
(41, 4, 2, 8, '2023-11-26 17:33:10', '2023-11-26 17:33:10'),
(42, 4, 3, 8, '2023-11-26 17:33:10', '2023-11-26 17:33:10'),
(43, 3, 4, 8, '2023-11-26 17:33:10', '2023-11-26 17:33:10'),
(44, 5, 5, 8, '2023-11-26 17:33:10', '2023-11-26 17:33:10'),
(45, 5, 1, 9, '2023-11-29 18:30:29', '2023-11-29 18:30:29'),
(46, 3, 2, 9, '2023-11-29 18:30:29', '2023-11-29 18:30:29'),
(47, 4, 3, 9, '2023-11-29 18:30:29', '2023-11-29 18:30:29'),
(48, 3, 4, 9, '2023-11-29 18:30:29', '2023-11-29 18:30:29'),
(49, 4, 5, 9, '2023-11-29 18:30:29', '2023-11-29 18:30:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternative`
--
ALTER TABLE `alternative`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alternative_kode_alternative_unique` (`kode_alternative`);

--
-- Indeks untuk tabel `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `criteria_kode_criteria_unique` (`kode_criteria`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternative`
--
ALTER TABLE `alternative`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
