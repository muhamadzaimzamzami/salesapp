-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 27 Jul 2024 pada 18.31
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salesapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_28_145226_create_store_table', 1),
(5, '2024_05_28_145720_create_product_table', 1),
(6, '2024_05_28_145743_create_product_store_table', 1),
(7, '2024_05_28_145804_create_order_table', 1),
(8, '2024_05_28_145820_create_order_detail_table', 1),
(9, '2024_05_28_145846_create_sales_merch_table', 1),
(10, '2024_05_28_145903_create_checkin_table', 1),
(11, '2024_06_05_143158_change_checkin_to_absent_table', 2),
(12, '2024_06_05_143805_add_image_to_absent_table', 3),
(13, '2024_06_05_162316_add_columns_ptoduct_store_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_product`
--

CREATE TABLE `m_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `barcode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_oncartoon` int(11) NOT NULL,
  `price_onpieces` int(11) NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_product`
--

INSERT INTO `m_product` (`id`, `product_name`, `category`, `barcode`, `price_oncartoon`, `price_onpieces`, `weight`, `image`, `stock`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BoBae Puree ACM', 1, '0725765175700', 464000, 29000, '16 x 80gr', 'assets/images/product/product.png', 90, 1, NULL, NULL),
(2, 'BoBae Puree ABC', 1, '0725765175700', 464000, 29000, '16 x 80gr', 'product.png', 50, 1, NULL, NULL),
(3, 'BoBae Puree DEF', 1, '0725765175700', 464000, 29000, '16 x 80gr', 'product.png', 100, 1, NULL, NULL),
(4, 'BoBae Puree GHI', 1, '0725765175700', 464000, 29000, '16 x 80gr', 'product.png', 100, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_store`
--

CREATE TABLE `m_store` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_store`
--

INSERT INTO `m_store` (`id`, `name`, `owner`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Toko ABCDEFG', 'Owner 1', '08532525252', 'Jakarta', 1, NULL, NULL),
(2, 'Toko XYZ', 'Owner 2', '08532525252', 'Jakarta', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('faZZHcxXRlbRivyXLMrBDgFRNfbnOKbLjCARWTtV', 2, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiR3RxMURpRkx0UUM5SkNVcjJORVJDdEVHdHdEUVRMODc2MkI0Q3pKNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6ImlkX2Fic2VudCI7aToyODtzOjg6ImlkX3N0b3JlIjtpOjE7czoxMDoibmFtZV9zdG9yZSI7czoxMjoiVG9rbyBBQkNERUZHIjtzOjY6InN0YXR1cyI7aToxO3M6NDoicm9sZSI7aToyO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcHJvZHVrLXRva28iO319', 1721145707),
('KQ0afAl3O7oflFAfwKfLbbCuVmrrSHwl6dowXKLK', 2, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiZmJBSWNWRm1OMkEzU1Fja2w3V0J4Yk5uVktKNVpyMlZhUGtQanI2MSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90YW1iYWgtcGVzYW5hbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czo0OiJyb2xlIjtpOjI7czo5OiJpZF9hYnNlbnQiO2k6Mjg7czo4OiJpZF9zdG9yZSI7aToxO3M6MTA6Im5hbWVfc3RvcmUiO3M6MTI6IlRva28gQUJDREVGRyI7czo2OiJzdGF0dXMiO2k6MTt9', 1721143444);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_absent`
--

CREATE TABLE `t_absent` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_store` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_absent`
--

INSERT INTO `t_absent` (`id`, `id_users`, `id_store`, `status`, `image`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 0, '', '2024-06-04 15:01:42', '2024-06-04 16:14:27'),
(4, 1, 2, 0, '', '2024-06-04 16:18:21', '2024-06-04 16:18:23'),
(5, 2, 1, 0, '', '2024-06-04 16:49:52', '2024-06-04 17:08:38'),
(6, 3, 1, 0, 'NULL', '2024-06-05 15:00:21', '2024-06-05 15:07:55'),
(7, 3, 1, 0, 'photo_absen.png', '2024-06-05 15:52:02', '2024-06-05 16:01:36'),
(8, 3, 2, 0, 'photo_absen.png', '2024-06-05 16:01:58', '2024-06-12 14:44:56'),
(9, 2, 1, 0, 'photo_absen.png', '2024-06-05 16:05:30', '2024-06-05 16:36:11'),
(10, 2, 1, 0, 'photo_absen.png', '2024-06-06 13:22:27', '2024-06-06 16:11:39'),
(11, 3, 1, 0, 'photo_absen.png', '2024-06-12 14:45:01', '2024-06-12 15:14:16'),
(12, 2, 1, 0, 'photo_absen.png', '2024-06-24 15:02:51', '2024-06-24 15:14:32'),
(13, 2, 1, 0, 'photo_absen.png', '2024-06-24 15:14:41', '2024-06-24 15:14:43'),
(14, 3, 1, 0, 'photo_absen.png', '2024-07-02 11:40:11', '2024-07-05 17:07:10'),
(15, 2, 1, 0, 'photo_absen.png', '2024-07-02 13:05:56', '2024-07-02 16:01:49'),
(16, 2, 2, 0, 'photo_absen.png', '2024-07-05 15:39:06', '2024-07-05 17:24:44'),
(17, 3, 0, 1, 'assets/images/absent/1720199946.png', '2024-07-05 17:19:06', NULL),
(18, 3, 0, 1, 'assets/images/absent/1720199965.png', '2024-07-05 17:19:25', NULL),
(19, 3, 0, 1, 'assets/images/absent/1720200087.jpg', '2024-07-05 17:21:27', NULL),
(20, 3, 0, 1, 'assets/images/absent/1720200111.png', '2024-07-05 17:21:51', NULL),
(21, 3, 0, 1, 'assets/images/absent/1720200159.jpg', '2024-07-05 17:22:39', NULL),
(22, 3, 0, 1, 'assets/images/absent/1720200210.png', '2024-07-05 17:23:30', NULL),
(23, 2, 2, 0, 'assets/images/absent/1720200307.jpg', '2024-07-05 17:25:07', '2024-07-05 17:25:14'),
(24, 2, 1, 0, 'assets/images/absent/1720200459.png', '2024-07-05 17:27:39', '2024-07-05 17:27:41'),
(25, 2, 2, 0, 'assets/images/absent/1720200553.png', '2024-07-05 17:29:13', '2024-07-16 14:51:06'),
(26, 1, 1, 0, 'assets/images/absent/1720699204.jpg', '2024-07-11 12:00:04', '2024-07-11 12:12:05'),
(27, 1, 2, 0, 'assets/images/absent/1721141341.png', '2024-07-16 14:49:01', '2024-07-16 14:51:21'),
(28, 2, 1, 1, 'assets/images/absent/1721142248.png', '2024-07-16 15:04:08', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_order`
--

CREATE TABLE `t_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_store` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_order`
--

INSERT INTO `t_order` (`id`, `id_users`, `id_store`, `status`, `total_price`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2, 100000, 'Description', '2024-06-07 15:35:14', '2024-07-03 17:50:46'),
(2, 2, 1, 2, 725000, 'Description', '2024-06-06 15:35:14', '2024-06-22 16:08:22'),
(3, 2, 1, 1, 0, 'Description', '2024-07-16 15:21:53', NULL),
(4, 2, 1, 1, 0, 'Description', '2024-07-16 15:22:00', NULL),
(5, 2, 1, 1, 0, 'Description', '2024-07-16 15:28:32', NULL),
(6, 2, 1, 1, 0, 'Description', '2024-07-16 15:41:56', NULL),
(7, 2, 1, 1, 725000, 'Description', '2024-07-16 15:46:57', NULL),
(8, 2, 1, 1, 290000, 'Description', '2024-07-16 15:51:50', NULL),
(9, 2, 1, 1, 116000, 'Description', '2024-07-16 15:52:19', NULL),
(10, 2, 1, 1, 58000, 'Description', '2024-07-16 15:56:57', NULL),
(11, 2, 1, 1, 58000, 'Description', '2024-07-16 15:57:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_order_detail`
--

CREATE TABLE `t_order_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_order_detail`
--

INSERT INTO `t_order_detail` (`id`, `id_order`, `id_product`, `quantity`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10, 'Description', NULL, NULL),
(2, 1, 2, 50, 'Description', NULL, NULL),
(3, 2, 1, 10, 'description', NULL, NULL),
(4, 2, 4, 15, 'description', NULL, NULL),
(5, 7, 1, 10, 'description', NULL, NULL),
(6, 7, 2, 12, 'description', NULL, NULL),
(7, 7, 3, 1, 'description', NULL, NULL),
(8, 7, 4, 2, 'description', NULL, NULL),
(9, 8, 1, 10, 'description', NULL, NULL),
(10, 9, 1, 2, 'description', NULL, NULL),
(11, 9, 2, 2, 'description', NULL, NULL),
(12, 10, 1, 2, 'description', NULL, NULL),
(13, 11, 1, 2, 'description', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_product_store`
--

CREATE TABLE `t_product_store` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_store` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_product_store`
--

INSERT INTO `t_product_store` (`id`, `created_at`, `updated_at`, `id_store`, `id_product`, `stock`, `status`) VALUES
(1, NULL, NULL, 1, 1, 21, 1),
(2, NULL, NULL, 1, 2, 65, 1),
(3, NULL, NULL, 1, 4, 30, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sales_merch`
--

CREATE TABLE `t_sales_merch` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_store` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_sales_merch`
--

INSERT INTO `t_sales_merch` (`id`, `id_users`, `id_store`, `id_product`, `quantity`, `total_price`, `status`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 2, 3, 100000, 1, 'Keterangan', 'assets/images/evidence/1718204719.png', NULL, NULL),
(3, 3, 1, 1, 12, 1000000, 1, 'ahhahha', 'assets/images/evidence/1719920442.png', NULL, NULL),
(4, 3, 1, 1, 2, 99999, 1, 'kkk', 'assets/images/evidence/1720199032.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `email_verified_at`, `password`, `phone`, `level`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Super', 'admin', 'admin@mail.com', NULL, '$2y$12$nWZsoXVIa88hNLM0zPjdmO9HXVIbIFa0JU8p0Y75jpjvZ5ph.JIu6', '08663636633', 1, 1, NULL, NULL, NULL),
(2, 'Sales 1', 'sales1', 'sales1@mail.com', NULL, '$2y$12$azVQFKYgvrp1B2anZrp6.uWGD3M.iNpyanMPHlNJYC0TLI8wsQQlq', '08663636633', 2, 1, NULL, NULL, NULL),
(3, 'Sales Merch', 'salesmerch', 'salesmerch@mail.com', NULL, '$2y$12$azVQFKYgvrp1B2anZrp6.uWGD3M.iNpyanMPHlNJYC0TLI8wsQQlq', '08663636633', 3, 1, NULL, NULL, NULL),
(5, 'Muhamad Zaim Zamzami', 'muhamadzaimzamzami', 'mzaimzamzami92+1@gmail.com', NULL, '$2y$12$fG2bN/kYcY0OwZLJUDMpGuHMiAfmhoDG9SC7BpW23ZaYkrwlLn0cK', '085325169635', 0, 1, NULL, NULL, NULL),
(6, 'Muhamad Zaim Zamzami', 'K03350248', 'mzthreeofficial@gmail.com', NULL, '$2y$12$iL0CB2YQ5cDbP.vJK8lJF.PnTHlS/9h/gkU6rWAUWTPu.t1BZ5qga', '085325169635', 0, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_product`
--
ALTER TABLE `m_product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_store`
--
ALTER TABLE `m_store`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `t_absent`
--
ALTER TABLE `t_absent`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_order`
--
ALTER TABLE `t_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_order_detail`
--
ALTER TABLE `t_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_product_store`
--
ALTER TABLE `t_product_store`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_sales_merch`
--
ALTER TABLE `t_sales_merch`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `m_product`
--
ALTER TABLE `m_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `m_store`
--
ALTER TABLE `m_store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_absent`
--
ALTER TABLE `t_absent`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `t_order`
--
ALTER TABLE `t_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `t_order_detail`
--
ALTER TABLE `t_order_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `t_product_store`
--
ALTER TABLE `t_product_store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_sales_merch`
--
ALTER TABLE `t_sales_merch`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
