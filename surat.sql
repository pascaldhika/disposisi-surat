-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2026 pada 17.15
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL DEFAULT 'pdf',
  `letter_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `attachments`
--

INSERT INTO `attachments` (`id`, `path`, `filename`, `extension`, `letter_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, '1780406853-SURAT-PERNYATAAN-NON-PKP-1.pdf', 'pdf', 1, 1, '2026-06-02 14:27:33', '2026-06-02 14:27:33'),
(2, NULL, '1780406924-Lembar+Penilaian+Kinerja+Guru+Pengganti-April.pdf', 'pdf', 1, 1, '2026-06-02 14:28:44', '2026-06-02 14:28:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `classifications`
--

CREATE TABLE `classifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `classifications`
--

INSERT INTO `classifications` (`id`, `code`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ADM', 'Administrasi', 'Jenis surat yang berkaitan dengan administrasi', '2025-02-23 03:14:07', '2025-02-23 03:14:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `configs`
--

INSERT INTO `configs` (`id`, `code`, `value`, `created_at`, `updated_at`) VALUES
(1, 'default_password', 'admin', NULL, '2026-06-02 14:34:55'),
(2, 'page_size', '5', NULL, '2026-06-02 14:34:55'),
(3, 'app_name', 'Aplikasi Surat Menyurat', NULL, '2026-06-02 14:34:55'),
(4, 'institution_name', 'UPT PPD Ponorogo', NULL, '2026-06-02 14:34:55'),
(5, 'institution_address', 'Jl. Ir. H Juanda No.39, Tonatan, Kec. Ponorogo, Kabupaten Ponorogo, Jawa Timur 63418', NULL, '2026-06-02 14:34:55'),
(6, 'institution_phone', '(0352) 481685', NULL, '2026-06-02 14:34:55'),
(7, 'institution_email', 'admin@admin.com', NULL, '2026-06-02 14:34:55'),
(8, 'language', 'id', NULL, NULL),
(9, 'pic', 'Sartono, S.Sos.', NULL, '2026-06-02 14:34:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dispositions`
--

CREATE TABLE `dispositions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `content` text NOT NULL,
  `note` text DEFAULT NULL,
  `letter_status` bigint(20) UNSIGNED NOT NULL,
  `letter_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `employees`
--

INSERT INTO `employees` (`id`, `nip`, `name`, `division`, `email`, `created_at`, `updated_at`) VALUES
(1, '199508172025041005', 'Pascal Prahardhika, S.Kom.', 'Seksi Pendataan dan Penetapan', 'pascaldhika@gmail.com', '2026-06-02 13:50:05', '2026-06-02 13:50:05'),
(2, '120210619840120143090', 'RADEN TRI BAGUS JUNIANSYAH NURCAHYO, SE', 'Seksi Pendataan dan Penetapan', 'pascalprahardhika@gmail.com', '2026-06-02 13:50:35', '2026-06-02 13:50:35'),
(3, '199404072025041004', 'GALANG BUDI PRAYOGA', 'Seksi Pembayaran dan Penagihan', 'galang@gmail.com', '2026-06-02 13:50:35', '2026-06-02 13:50:35');

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
-- Struktur dari tabel `letters`
--

CREATE TABLE `letters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_number` varchar(255) NOT NULL COMMENT 'Nomor Surat',
  `agenda_number` varchar(255) NOT NULL,
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `letter_date` date DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'incoming' COMMENT 'Surat Masuk (incoming)/Surat Keluar (outgoing)',
  `classification_code` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `letters`
--

INSERT INTO `letters` (`id`, `reference_number`, `agenda_number`, `from`, `to`, `letter_date`, `received_date`, `description`, `note`, `type`, `classification_code`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '800/9732/202.1/2026', '-', 'Kepala Badan Pendapatan Daerah Provinsi Jawa Timur', NULL, '2026-06-02', '2026-06-02', 'Pelaksanaan fleksibilitas tugas kedinasan di lingkungan Badan Pendapatan Daerah Provinsi Jawa Timur', NULL, 'incoming', 'ADM', 1, '2026-06-02 14:27:33', '2026-06-02 14:27:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `letter_statuses`
--

CREATE TABLE `letter_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `letter_statuses`
--

INSERT INTO `letter_statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rahasia', '2025-02-23 03:14:07', '2025-02-23 03:14:07'),
(2, 'Segera', '2025-02-23 03:14:07', '2025-02-23 03:14:07'),
(3, 'Biasa', '2025-02-23 03:14:07', '2025-02-23 03:14:07');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_12_05_081849_create_configs_table', 1),
(7, '2022_12_05_083409_create_letter_statuses_table', 1),
(8, '2022_12_05_083945_create_classifications_table', 1),
(9, '2022_12_05_084544_create_letters_table', 1),
(10, '2022_12_05_092303_create_dispositions_table', 1),
(11, '2022_12_05_093329_create_attachments_table', 1),
(12, '2026_06_02_204741_create_employees_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
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
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'staff',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `profile_picture` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `phone`, `role`, `is_active`, `profile_picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@admin.com', '2025-02-23 03:14:07', '$2y$10$r0vCZVkH9fmSsBH4CDJCgO03q9UAe9sDbFKGAdqf188y6heVAdvnm', NULL, NULL, '082121212121', 'admin', 1, NULL, 'cSYMipfhf5cv5srMRduol0QWVzS8f9irtgIWo6kMsEgmsrCNsnWRG028mCDp', '2025-02-23 03:14:07', '2025-02-23 03:14:07'),
(3, 'Pandu', 'pandu@gmail.com', NULL, '$2y$10$XH9ElHNgx2ag2RX0kNXzxujM.PlLWtq5wgZUyp1wtnp.EtCbq08Fm', NULL, NULL, '0', 'staff', 1, 'http://127.0.0.1:8000/storage/avatars/1780407526-php2181.tmp.png', NULL, '2026-06-02 13:35:48', '2026-06-02 13:38:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachments_letter_id_foreign` (`letter_id`),
  ADD KEY `attachments_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `classifications`
--
ALTER TABLE `classifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classifications_code_unique` (`code`);

--
-- Indeks untuk tabel `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `configs_code_unique` (`code`);

--
-- Indeks untuk tabel `dispositions`
--
ALTER TABLE `dispositions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dispositions_letter_status_foreign` (`letter_status`),
  ADD KEY `dispositions_letter_id_foreign` (`letter_id`),
  ADD KEY `dispositions_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_nip_unique` (`nip`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `letters`
--
ALTER TABLE `letters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `letters_reference_number_unique` (`reference_number`),
  ADD KEY `letters_classification_code_foreign` (`classification_code`),
  ADD KEY `letters_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `letter_statuses`
--
ALTER TABLE `letter_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT untuk tabel `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `classifications`
--
ALTER TABLE `classifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `dispositions`
--
ALTER TABLE `dispositions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `letters`
--
ALTER TABLE `letters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `letter_statuses`
--
ALTER TABLE `letter_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_letter_id_foreign` FOREIGN KEY (`letter_id`) REFERENCES `letters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attachments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dispositions`
--
ALTER TABLE `dispositions`
  ADD CONSTRAINT `dispositions_letter_id_foreign` FOREIGN KEY (`letter_id`) REFERENCES `letters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dispositions_letter_status_foreign` FOREIGN KEY (`letter_status`) REFERENCES `letter_statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dispositions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `letters`
--
ALTER TABLE `letters`
  ADD CONSTRAINT `letters_classification_code_foreign` FOREIGN KEY (`classification_code`) REFERENCES `classifications` (`code`),
  ADD CONSTRAINT `letters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
