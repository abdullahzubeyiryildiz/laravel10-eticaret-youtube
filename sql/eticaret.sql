-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 05 Eyl 2024, 14:26:13
-- Sunucu sürümü: 8.0.30
-- PHP Sürümü: 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `eticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `text_1_icon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `text_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_1_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `text_2_icon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `text_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_2_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `text_3_icon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `text_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_3_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `abouts`
--

INSERT INTO `abouts` (`id`, `image`, `name`, `content`, `text_1_icon`, `text_1`, `text_1_content`, `text_2_icon`, `text_2`, `text_2_content`, `text_3_icon`, `text_3`, `text_3_content`, `created_at`, `updated_at`) VALUES
(1, 'img/about/1686310973-pratik-shop-e-ticaret.webp', 'Pratik Shop E-ticaret', '<p>Hakkımızda yazısı buradaa</p>', 'icon-truck', 'Ücretsiz Kargo', 'Ürünlerinizi ücretsiz kargo sağlarız.', 'icon-refresh2', 'Geri İade', 'Ürünlerinizi ücretsiz kargo sağlarız.', 'icon-help', 'Destek', 'Ürünlerinizi ücretsiz kargo sağlarız.', '2023-05-09 11:39:55', '2023-06-09 11:42:57');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_ust` int DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `image`, `thumbnail`, `name`, `slug`, `content`, `description`, `cat_ust`, `status`, `created_at`, `updated_at`) VALUES
(1, 'img/kategori/1688465197-erkek.webp', NULL, 'Erkek', 'erkek', 'Erkek Giyim', '', NULL, '1', '2023-05-09 11:39:55', '2023-07-04 10:06:38'),
(2, NULL, NULL, 'Erkek Kazak', 'erkek-kazak', 'Erkek Kazaklar', '', 1, '1', '2023-05-09 11:39:55', '2023-05-09 11:39:55'),
(3, NULL, NULL, 'Erkek Pantolon', 'erkek-pantolon', 'Erkek Pantolonlar', '', 1, '1', '2023-05-09 11:39:55', '2023-05-09 11:39:55'),
(4, 'img/kategori/1688465220-kadin.webp', NULL, 'Kadın', 'kadin', 'Kadın Giyim', '', NULL, '1', '2023-05-09 11:39:55', '2023-07-04 10:07:00'),
(5, NULL, NULL, 'Kadın Çanta', 'kadin-canta', 'Kadın Çantalar', '', 4, '1', '2023-05-09 11:39:55', '2023-05-09 11:39:55'),
(6, NULL, NULL, 'Kadın Pantolon', 'kadin-pantolon', 'Kadın Pantolonlar', '', 4, '1', '2023-05-09 11:39:55', '2023-05-09 11:39:55'),
(7, 'img/kategori/1688465237-cocuk.webp', NULL, 'Çocuk', 'cocuk', 'Çocuk Giyim', '', NULL, '1', '2023-05-09 11:39:55', '2023-07-04 10:07:18'),
(8, NULL, NULL, 'Çocuk Oyuncaklar', 'cocuk-oyuncaklar', 'Çocuk Oyuncaklar', '', 7, '1', '2023-05-09 11:39:55', '2023-05-09 11:39:55'),
(9, NULL, NULL, 'Çocuk Pantolon', 'cocuk-pantolon', 'Çocuk Pantolonlar', '', 7, '1', '2023-05-09 11:39:55', '2023-05-09 11:39:55');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `ip`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Deneme Test', 'test@gmail.com', 'Konu 1', 'Mesaj', '127.0.0.1', '0', '2023-06-10 10:02:25', '2023-06-10 10:02:25'),
(2, 'Abc Dd', 'ad@gmail.com', 'ÖZ', 'MESADADSA', '127.0.0.1', '0', '2023-06-10 10:02:49', '2023-06-10 10:02:49'),
(3, 'Hello Mee', 'tess@gmail.com', 'DENEME', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '127.0.0.1', '0', '2023-06-10 10:03:27', '2023-06-10 10:20:34'),
(4, 'Test', 'test@gmail.com', 'konu', 'mesaj', '127.0.0.1', '0', '2023-08-26 22:17:49', '2023-08-26 22:17:49'),
(5, 'Signe Henderson', 'jevyl@mailinator.com', 'Voluptates est fugia', 'Quas aut eos magna', '127.0.0.1', '0', '2023-08-26 22:18:23', '2023-08-26 22:18:23'),
(6, 'Alden Booth', 'sevyq@mailinator.com', 'Et consequatur Anim', 'Doloribus duis natus', '127.0.0.1', '0', '2023-08-26 22:18:54', '2023-08-26 22:18:54'),
(7, 'Caesar Moran', 'lytynima@mailinator.net', 'Ea sed quos veniam', 'Esse et facilis et a', '127.0.0.1', '0', '2023-08-26 22:21:28', '2023-08-26 22:21:28'),
(8, 'Drake Haley', 'genope@mailinator.net', 'Laboriosam est nec', 'Architecto cum possi', '127.0.0.1', '0', '2023-08-26 22:22:19', '2023-08-26 22:22:19'),
(9, 'Whilemina Puckett', 'mygaf@mailinator.net', 'Itaque odio eum exer', 'Cumque culpa conseq', '127.0.0.1', '0', '2023-08-26 22:22:59', '2023-08-26 22:22:59'),
(10, 'Abdullah Test', 'mail@gmail.com', 'konu', 'mesaj', '127.0.0.1', '0', '2023-09-27 17:51:55', '2023-09-27 17:51:55'),
(11, 'Ttt', 'test@gmail.com', '12313', 'mesaj', '127.0.0.1', '0', '2023-09-27 17:53:12', '2023-09-27 17:53:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `discount_rate` int DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `price`, `discount_rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', 10.00, NULL, '1', NULL, NULL),
(2, 'abc', 25.00, NULL, '1', NULL, NULL),
(3, 'tumurun', 0.00, 50, '1', NULL, '2023-08-11 16:52:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `image_media`
--

CREATE TABLE `image_media` (
  `id` bigint UNSIGNED NOT NULL,
  `table_id` int NOT NULL,
  `model_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `image_media`
--

INSERT INTO `image_media` (`id`, `table_id`, `model_name`, `data`, `created_at`, `updated_at`) VALUES
(1, 1, 'About', '[]', '2023-08-01 09:17:04', '2023-08-01 09:33:00'),
(2, 1, 'Category', '[]', '2023-08-01 09:26:03', '2023-08-08 17:06:32'),
(3, 104, 'Product', '[{\"image_no\":1691869161,\"image\":\"img\\/urun\\/dikdortgen-dark-1691869161.webp\",\"thumbnail\":\"img\\/urun\\/thumb_dikdortgen-dark-1691869161.webp\",\"alt\":\"\",\"status\":\"1\",\"vitrin\":1}]', '2023-08-04 09:35:04', '2023-08-12 19:39:21'),
(4, 1, 'Pageseo', '[]', '2023-08-05 09:55:00', '2023-08-05 09:55:50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `order_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL,
  `zip_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `invoices`
--

INSERT INTO `invoices` (`id`, `order_no`, `name`, `email`, `phone`, `company_name`, `address`, `country`, `city`, `district`, `status`, `zip_code`, `note`, `created_at`, `updated_at`) VALUES
(1, '6483030', 'Test Yıldız', 'test@gmail.com', '05460000000', NULL, 'Adresss', 'Turkey', 'Samsun', 'Samsun', 1, '123456', 'Sipariş Notu', '2023-07-11 09:40:51', '2023-07-15 12:38:29'),
(2, '9727568', 'Wynter Harvey', 'todegus@mailinator.net', '+1 (612) 404-1085', 'Davis Carrillo Co', 'Ad alias quaerat qui', 'Turkey', 'Consectetur explicab', 'Labore quae cumque m', 0, '96439', 'Nulla dicta veniam', '2023-07-11 09:41:56', '2023-07-11 09:41:56'),
(3, '6135747', 'Wynter Harvey', 'todegus@mailinator.net', '+1 (612) 404-1085', 'Davis Carrillo Co', 'Ad alias quaerat qui', 'Turkey', 'Consectetur explicab', 'Labore quae cumque m', 0, '96439', 'Nulla dicta veniam', '2023-07-11 09:42:46', '2023-07-11 09:42:46'),
(4, '1815901', 'Wynter Harvey', 'todegus@mailinator.net', '+1 (612) 404-1085', 'Davis Carrillo Co', 'Ad alias quaerat qui', 'Turkey', 'Consectetur explicab', 'Labore quae cumque m', 0, '96439', 'Nulla dicta veniam', '2023-07-11 09:42:58', '2023-07-11 09:42:58'),
(5, '1109644', 'Wynter Harvey', 'todegus@mailinator.net', '+1 (612) 404-1085', 'Davis Carrillo Co', 'Ad alias quaerat qui', 'Turkey', 'Consectetur explicab', 'Labore quae cumque m', 0, '96439', 'Nulla dicta veniam', '2023-07-11 09:44:05', '2023-07-11 09:44:05'),
(6, '1740394', 'Wynter Harvey', 'todegus@mailinator.net', '+1 (612) 404-1085', 'Davis Carrillo Co', 'Ad alias quaerat qui', 'Turkey', 'Consectetur explicab', 'Labore quae cumque m', 0, '96439', 'Nulla dicta veniam', '2023-07-11 09:45:00', '2023-07-11 09:45:00'),
(7, '4289105', 'Test Tes', 'test@gmail.com', '0540000000', 'Kurum', 'adres', 'Turkey', 'Samsun', 'İlçe', 0, '55500', 'not', '2023-07-15 12:28:42', '2023-07-15 12:28:42'),
(8, '5047639', 'Test TY', 'test@gmail.com', '05050000000', 'ST', 'adres', 'Turkey', 'Samsun', 'ts', 0, '123456', 'not', '2023-07-21 08:41:35', '2023-07-21 08:41:35');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(102, '2024_07_26_184206_create_abouts_table', 0),
(103, '2024_07_26_184206_create_categories_table', 0),
(104, '2024_07_26_184206_create_contacts_table', 0),
(105, '2024_07_26_184206_create_coupons_table', 0),
(106, '2024_07_26_184206_create_failed_jobs_table', 0),
(107, '2024_07_26_184206_create_image_media_table', 0),
(108, '2024_07_26_184206_create_invoices_table', 0),
(109, '2024_07_26_184206_create_jobs_table', 0),
(110, '2024_07_26_184206_create_orders_table', 0),
(111, '2024_07_26_184206_create_page_seos_table', 0),
(112, '2024_07_26_184206_create_password_reset_tokens_table', 0),
(113, '2024_07_26_184206_create_password_resets_table', 0),
(114, '2024_07_26_184206_create_personal_access_tokens_table', 0),
(115, '2024_07_26_184206_create_products_table', 0),
(116, '2024_07_26_184206_create_sepets_table', 0),
(117, '2024_07_26_184206_create_site_settings_table', 0),
(118, '2024_07_26_184206_create_sliders_table', 0),
(119, '2024_07_26_184206_create_users_table', 0),
(120, '2024_07_26_184206_create_views_table', 0),
(121, '2024_07_23_154847_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kdv` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `product_id`, `name`, `price`, `qty`, `kdv`, `created_at`, `updated_at`) VALUES
(1, '6483030', 104, 'Deme2', '41', '1', 20, '2023-07-11 09:40:51', '2023-07-11 09:40:51'),
(2, '6483030', 102, 'Mor L Urun', '37', '1', 0, '2023-07-11 09:40:51', '2023-07-11 09:40:51'),
(3, '9727568', 104, 'Deme2', '41', '2', 0, '2023-07-11 09:41:56', '2023-07-11 09:41:56'),
(4, '9727568', 102, 'Mor L Urun', '37', '1', 0, '2023-07-11 09:41:56', '2023-07-11 09:41:56'),
(5, '6135747', 104, 'Deme2', '41', '2', 0, '2023-07-11 09:42:46', '2023-07-11 09:42:46'),
(6, '6135747', 102, 'Mor L Urun', '37', '1', 0, '2023-07-11 09:42:46', '2023-07-11 09:42:46'),
(7, '1815901', 104, 'Deme2', '41', '2', 0, '2023-07-11 09:42:59', '2023-07-11 09:42:59'),
(8, '1815901', 102, 'Mor L Urun', '37', '1', 0, '2023-07-11 09:42:59', '2023-07-11 09:42:59'),
(9, '1740394', 104, 'Deme2', '41', '2', 0, '2023-07-11 09:45:00', '2023-07-11 09:45:00'),
(10, '1740394', 102, 'Mor L Urun', '37', '1', 0, '2023-07-11 09:45:00', '2023-07-11 09:45:00'),
(11, '4289105', 104, 'Deme2', '41', '1', 20, '2023-07-15 12:28:42', '2023-07-15 12:28:42'),
(12, '4289105', 102, 'Mor L Urun', '37', '1', 0, '2023-07-15 12:28:42', '2023-07-15 12:28:42'),
(13, '5047639', 104, 'Deme2', '41', '1', 20, '2023-07-21 08:41:35', '2023-07-21 08:41:35'),
(14, '5047639', 102, 'Mor L Urun', '37', '1', 0, '2023-07-21 08:41:35', '2023-07-21 08:41:35');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `page_seos`
--

CREATE TABLE `page_seos` (
  `id` bigint UNSIGNED NOT NULL,
  `dil` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tr',
  `page` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_ust` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `page_seos`
--

INSERT INTO `page_seos` (`id`, `dil`, `page`, `page_ust`, `title`, `description`, `keywords`, `contents`, `created_at`, `updated_at`) VALUES
(1, 'tr', 'anasayfa', NULL, 'E-Ticaret Anasayfa', 'E-Ticaret Description', 'E-Ticaret Keywords', 'E-Ticaret Contents', NULL, '2023-08-05 09:54:47'),
(2, 'tr', 'urunler', NULL, 'E-Ticaret Ürünler', 'E-Ticaret Ürünler Description', 'E-Ticaret Ürünler Keywords', 'E-Ticaret Ürünler Contents', NULL, NULL),
(3, 'tr', 'erkek', NULL, 'E-Ticaret Erkek Ürünler', 'E-Ticaret Erkek Ürünler Description', 'E-Ticaret Erkek Ürünler Keywords', 'E-Ticaret Erkek Ürünler Contents', NULL, NULL),
(4, 'tr', 'kadin', NULL, 'E-Ticaret Kadın Ürünler', 'E-Ticaret Kadın Ürünler Description', 'E-Ticaret Kadın Ürünler Keywords', 'E-Ticaret Kadın Ürünler Contents', NULL, NULL),
(5, 'tr', 'cocuk', NULL, 'E-Ticaret Çocuk Ürünler', 'E-Ticaret Çocuk Ürünler Description', 'E-Ticaret Çocuk Ürünler Keywords', 'E-Ticaret Çocuk Ürünler Contents', NULL, NULL),
(6, 'tr', 'hakkimizda', NULL, 'Hakkımızda', 'Hakkımızda Description', 'Hakkımızda Keywords', 'Hakkımızda Contents', NULL, NULL),
(7, 'tr', 'iletisim', NULL, 'İletişim', 'İletişim Description', 'İletişim Keywords', 'İletişim Contents', NULL, NULL),
(9, 'tr', 'tumurunler-indirim', NULL, NULL, NULL, NULL, NULL, '2023-08-11 16:55:22', '2023-08-11 16:55:22'),
(10, 'tr', 'sepet', NULL, NULL, NULL, NULL, NULL, '2023-08-11 16:57:28', '2023-08-11 16:57:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `short_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` double(8,2) DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `kdv` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `image`, `category_id`, `short_text`, `price`, `size`, `color`, `qty`, `kdv`, `description`, `keywords`, `title`, `status`, `content`, `created_at`, `updated_at`) VALUES
(3, 'Mor S Urun', 'mor-s-urun', NULL, 7, '1 idli ürün', 84.00, 'S', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:55', '2023-05-09 11:39:55'),
(4, 'Mor XS Urun', 'mor-xs-urun', NULL, 9, '6 idli ürün', 85.00, 'XS', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(5, 'Beyaz L Urun', 'beyaz-l-urun', NULL, 2, '8 idli ürün', 249.00, 'L', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(6, 'Kahverengi L Urun', 'kahverengi-l-urun', NULL, 2, '6 idli ürün', 308.00, 'L', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(7, 'Kahverengi XXL Urun', 'kahverengi-xxl-urun', NULL, 5, '9 idli ürün', 90.00, 'XXL', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(8, 'Beyaz XS Urun', 'beyaz-xs-urun', NULL, 2, '9 idli ürün', 79.00, 'XS', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(9, 'Mor L Urun', 'mor-l-urun', NULL, 9, '8 idli ürün', 444.00, 'L', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(10, 'Mor S Urun', 'mor-s-urun-2', NULL, 4, '1 idli ürün', 77.00, 'S', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(11, 'Mor S Urun', 'mor-s-urun-3', NULL, 2, '3 idli ürün', 272.00, 'S', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(12, 'Kahverengi XS Urun', 'kahverengi-xs-urun', NULL, 5, '9 idli ürün', 410.00, 'XS', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(13, 'Siyah M Urun', 'siyah-m-urun', NULL, 1, '6 idli ürün', 179.00, 'M', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(14, 'Kahverengi XS Urun', 'kahverengi-xs-urun-2', NULL, 7, '4 idli ürün', 31.00, 'XS', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(15, 'Kahverengi XXL Urun', 'kahverengi-xxl-urun-2', NULL, 6, '9 idli ürün', 370.00, 'XXL', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(16, 'Siyah M Urun', 'siyah-m-urun-2', NULL, 2, '2 idli ürün', 142.00, 'M', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(17, 'Siyah M Urun', 'siyah-m-urun-3', NULL, 6, '9 idli ürün', 484.00, 'M', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(18, 'Kahverengi XS Urun', 'kahverengi-xs-urun-3', NULL, 8, '4 idli ürün', 269.00, 'XS', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(19, 'Kahverengi XS Urun', 'kahverengi-xs-urun-4', NULL, 8, '8 idli ürün', 76.00, 'XS', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(20, 'Mor L Urun', 'mor-l-urun-2', NULL, 6, '4 idli ürün', 252.00, 'L', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(21, 'Kahverengi XXL Urun', 'kahverengi-xxl-urun-3', NULL, 3, '3 idli ürün', 84.00, 'XXL', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(22, 'Kahverengi M Urun', 'kahverengi-m-urun', NULL, 2, '7 idli ürün', 139.00, 'M', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(23, 'Kahverengi L Urun', 'kahverengi-l-urun-2', NULL, 4, '1 idli ürün', 158.00, 'L', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(24, 'Kahverengi L Urun', 'kahverengi-l-urun-3', NULL, 1, '6 idli ürün', 251.00, 'L', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(25, 'Mor S Urun', 'mor-s-urun-4', NULL, 4, '9 idli ürün', 208.00, 'S', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(26, 'Kahverengi L Urun', 'kahverengi-l-urun-4', NULL, 5, '8 idli ürün', 395.00, 'L', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(27, 'Mor S Urun', 'mor-s-urun-5', NULL, 2, '6 idli ürün', 365.00, 'S', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(28, 'Kahverengi XXL Urun', 'kahverengi-xxl-urun-4', NULL, 1, '8 idli ürün', 422.00, 'XXL', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(29, 'Mor M Urun', 'mor-m-urun', NULL, 9, '9 idli ürün', 119.00, 'M', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(30, 'Beyaz XXL Urun', 'beyaz-xxl-urun', NULL, 4, '8 idli ürün', 482.00, 'XXL', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(31, 'Siyah L Urun', 'siyah-l-urun', NULL, 5, '2 idli ürün', 160.00, 'L', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(32, 'Siyah S Urun', 'siyah-s-urun', NULL, 5, '7 idli ürün', 365.00, 'S', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(33, 'Kahverengi XS Urun', 'kahverengi-xs-urun-5', NULL, 6, '5 idli ürün', 467.00, 'XS', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(34, 'Kahverengi L Urun', 'kahverengi-l-urun-5', NULL, 7, '3 idli ürün', 176.00, 'L', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(35, 'Siyah XXL Urun', 'siyah-xxl-urun', NULL, 6, '6 idli ürün', 483.00, 'XXL', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(36, 'Beyaz XXL Urun', 'beyaz-xxl-urun-2', NULL, 4, '5 idli ürün', 86.00, 'XXL', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(37, 'Mor L Urun', 'mor-l-urun-3', NULL, 3, '1 idli ürün', 18.00, 'L', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(38, 'Mor M Urun', 'mor-m-urun-2', NULL, 4, '3 idli ürün', 341.00, 'M', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(39, 'Siyah M Urun', 'siyah-m-urun-4', NULL, 9, '8 idli ürün', 360.00, 'M', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(40, 'Siyah XS Urun', 'siyah-xs-urun', NULL, 4, '3 idli ürün', 110.00, 'XS', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(41, 'Kahverengi XXL Urun', 'kahverengi-xxl-urun-5', NULL, 6, '9 idli ürün', 230.00, 'XXL', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(42, 'Beyaz XS Urun', 'beyaz-xs-urun-2', NULL, 2, '3 idli ürün', 443.00, 'XS', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(43, 'Siyah S Urun', 'siyah-s-urun-2', NULL, 1, '2 idli ürün', 215.00, 'S', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(44, 'Siyah S Urun', 'siyah-s-urun-3', NULL, 6, '1 idli ürün', 265.00, 'S', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(45, 'Mor M Urun', 'mor-m-urun-3', NULL, 1, '7 idli ürün', 80.00, 'M', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(46, 'Kahverengi XS Urun', 'kahverengi-xs-urun-6', NULL, 3, '4 idli ürün', 264.00, 'XS', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(47, 'Mor L Urun', 'mor-l-urun-4', NULL, 4, '8 idli ürün', 199.00, 'L', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(48, 'Mor XS Urun', 'mor-xs-urun-2', NULL, 1, '9 idli ürün', 300.00, 'XS', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(49, 'Beyaz XS Urun', 'beyaz-xs-urun-3', NULL, 5, '2 idli ürün', 283.00, 'XS', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(50, 'Beyaz XXL Urun', 'beyaz-xxl-urun-3', NULL, 1, '4 idli ürün', 40.00, 'XXL', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(51, 'Kahverengi L Urun', 'kahverengi-l-urun-6', NULL, 4, '4 idli ürün', 18.00, 'L', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(52, 'Mor L Urun', 'mor-l-urun-5', NULL, 1, '7 idli ürün', 424.00, 'L', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(53, 'Siyah XS Urun', 'siyah-xs-urun-2', NULL, 2, '2 idli ürün', 29.00, 'XS', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(54, 'Siyah M Urun', 'siyah-m-urun-5', NULL, 6, '6 idli ürün', 94.00, 'M', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(55, 'Beyaz S Urun', 'beyaz-s-urun', NULL, 8, '5 idli ürün', 181.00, 'S', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(56, 'Mor M Urun', 'mor-m-urun-4', NULL, 5, '1 idli ürün', 210.00, 'M', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(57, 'Beyaz L Urun', 'beyaz-l-urun-2', NULL, 2, '8 idli ürün', 224.00, 'L', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(58, 'Siyah XS Urun', 'siyah-xs-urun-3', NULL, 2, '2 idli ürün', 486.00, 'XS', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(59, 'Beyaz XS Urun', 'beyaz-xs-urun-4', NULL, 8, '4 idli ürün', 396.00, 'XS', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(60, 'Kahverengi S Urun', 'kahverengi-s-urun', NULL, 6, '9 idli ürün', 121.00, 'S', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(61, 'Siyah S Urun', 'siyah-s-urun-4', NULL, 9, '4 idli ürün', 183.00, 'S', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(62, 'Siyah S Urun', 'siyah-s-urun-5', NULL, 4, '5 idli ürün', 219.00, 'S', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:56', '2023-05-09 11:39:56'),
(63, 'Kahverengi XS Urun', 'kahverengi-xs-urun-7', NULL, 3, '6 idli ürün', 174.00, 'XS', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(64, 'Mor XXL Urun', 'mor-xxl-urun', NULL, 2, '9 idli ürün', 209.00, 'XXL', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(65, 'Siyah S Urun', 'siyah-s-urun-6', NULL, 9, '3 idli ürün', 368.00, 'S', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(66, 'Kahverengi M Urun', 'kahverengi-m-urun-2', NULL, 2, '1 idli ürün', 68.00, 'M', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(67, 'Siyah S Urun', 'siyah-s-urun-7', NULL, 6, '1 idli ürün', 453.00, 'S', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(68, 'Kahverengi XXL Urun', 'kahverengi-xxl-urun-6', NULL, 9, '5 idli ürün', 411.00, 'XXL', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(69, 'Beyaz XS Urun', 'beyaz-xs-urun-5', NULL, 4, '4 idli ürün', 43.00, 'XS', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(70, 'Siyah XS Urun', 'siyah-xs-urun-4', NULL, 1, '9 idli ürün', 49.00, 'XS', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(71, 'Mor L Urun', 'mor-l-urun-6', NULL, 5, '3 idli ürün', 469.00, 'L', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(72, 'Siyah XS Urun', 'siyah-xs-urun-5', NULL, 9, '1 idli ürün', 286.00, 'XS', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(73, 'Mor XS Urun', 'mor-xs-urun-3', NULL, 8, '9 idli ürün', 402.00, 'XS', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(74, 'Siyah XXL Urun', 'siyah-xxl-urun-2', NULL, 5, '6 idli ürün', 171.00, 'XXL', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(75, 'Beyaz M Urun', 'beyaz-m-urun', NULL, 3, '1 idli ürün', 350.00, 'M', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(76, 'Kahverengi M Urun', 'kahverengi-m-urun-3', NULL, 7, '4 idli ürün', 267.00, 'M', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(77, 'Beyaz M Urun', 'beyaz-m-urun-2', NULL, 3, '2 idli ürün', 273.00, 'M', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(78, 'Beyaz XS Urun', 'beyaz-xs-urun-6', NULL, 7, '1 idli ürün', 368.00, 'XS', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(79, 'Mor XXL Urun', 'mor-xxl-urun-2', NULL, 6, '5 idli ürün', 472.00, 'XXL', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(80, 'Mor L Urun', 'mor-l-urun-7', NULL, 7, '9 idli ürün', 318.00, 'L', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(81, 'Siyah L Urun', 'siyah-l-urun-2', NULL, 4, '8 idli ürün', 193.00, 'L', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(82, 'Beyaz M Urun', 'beyaz-m-urun-3', NULL, 4, '2 idli ürün', 462.00, 'M', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(83, 'Siyah XS Urun', 'siyah-xs-urun-6', NULL, 3, '1 idli ürün', 171.00, 'XS', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(84, 'Kahverengi S Urun', 'kahverengi-s-urun-2', NULL, 2, '1 idli ürün', 27.00, 'S', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(85, 'Siyah M Urun', 'siyah-m-urun-6', NULL, 1, '8 idli ürün', 171.00, 'M', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(86, 'Beyaz L Urun', 'beyaz-l-urun-3', NULL, 9, '6 idli ürün', 235.00, 'L', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(87, 'Kahverengi L Urun', 'kahverengi-l-urun-7', NULL, 9, '5 idli ürün', 243.00, 'L', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(88, 'Mor M Urun', 'mor-m-urun-5', NULL, 5, '5 idli ürün', 306.00, 'M', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(89, 'Kahverengi M Urun', 'kahverengi-m-urun-4', NULL, 4, '2 idli ürün', 193.00, 'M', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(90, 'Kahverengi S Urun', 'kahverengi-s-urun-3', NULL, 1, '7 idli ürün', 57.00, 'S', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(91, 'Kahverengi L Urun', 'kahverengi-l-urun-8', NULL, 5, '4 idli ürün', 365.00, 'L', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(92, 'Beyaz XXL Urun', 'beyaz-xxl-urun-4', NULL, 8, '7 idli ürün', 24.00, 'XXL', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(93, 'Kahverengi XXL Urun', 'kahverengi-xxl-urun-7', NULL, 1, '8 idli ürün', 390.00, 'XXL', 'Kahverengi', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(94, 'Siyah XS Urun', 'siyah-xs-urun-7', NULL, 1, '1 idli ürün', 229.00, 'XS', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(95, 'Beyaz M Urun', 'beyaz-m-urun-4', NULL, 3, '6 idli ürün', 484.00, 'M', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(96, 'Mor S Urun', 'mor-s-urun-6', NULL, 5, '1 idli ürün', 193.00, 'S', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(97, 'Siyah M Urun', 'siyah-m-urun-7', NULL, 9, '5 idli ürün', 457.00, 'M', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(98, 'Mor S Urun', 'mor-s-urun-7', NULL, 3, '6 idli ürün', 219.00, 'S', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(99, 'Beyaz S Urun', 'beyaz-s-urun-2', NULL, 8, '4 idli ürün', 321.00, 'S', 'Beyaz', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(100, 'Siyah S Urun', 'siyah-s-urun-8', NULL, 8, '8 idli ürün', 303.00, 'S', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(101, 'Siyah XS Urun', 'siyah-xs-urun-8', NULL, 1, '4 idli ürün', 194.00, 'XS', 'Siyah', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(102, 'Mor L Urun', 'mor-l-urun-8', NULL, 2, '6 idli ürün', 37.00, 'L', 'Mor', 1, 0, '', '', '', '1', 'Yazıları', '2023-05-09 11:39:57', '2023-05-09 11:39:57'),
(104, 'Deme2', 'deme2', 'img/urun/1688224597-deme2.webp', 4, 'kısabilgi', 41.00, 'L', 'Pembe', NULL, 0, 'Dene2 Description Tesst', 'Dene2 Keywords Tesst', 'Dene2 Title Tesst', '1', '<p>yazzz</p>', '2023-07-01 15:16:38', '2023-08-12 19:39:21'),
(113, 'TestÜrün', 'testurun', NULL, 1, NULL, 99.00, 'M', 'Siyah', NULL, NULL, NULL, NULL, NULL, '0', NULL, '2023-12-16 21:31:12', '2023-12-16 21:31:12'),
(114, 'Erkkekooo', 'erkkekooo', NULL, 3, 'test', 100.00, 'M', 'Kablumba', NULL, NULL, NULL, NULL, NULL, '1', '<p>tttt</p>', '2024-07-01 21:45:38', '2024-07-01 21:45:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepets`
--

CREATE TABLE `sepets` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sepets`
--

INSERT INTO `sepets` (`id`, `name`, `price`, `qty`, `created_at`, `updated_at`) VALUES
(6, 'test', 11.00, 1, '2023-09-09 18:58:05', '2023-09-09 18:58:05');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1bImzf1yJkiUTAZYnWCdq5UVMSBWadIf2ZSje5sb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidm02UGNKN2dka3FwSGh6THNzVDNKTzFJc2F5NmtTWG95UWZjektCRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sYXJhdmVsMTEudGVzdC8/cGFnZT0xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1723564861),
('tCjmvuUkxrnau6bY4ptBbRk522e9pAkBV1S2aLIX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiU0NIWlJjZ2twUnlkekZEcjZxVXBBYVRDQklvTzg1dXBodHNzRGxNRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1723593798);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `set_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `site_settings`
--

INSERT INTO `site_settings` (`id`, `name`, `data`, `set_type`, `created_at`, `updated_at`) VALUES
(1, 'adres', '<p>Samsun Adres bilgilerim burada</p>', 'ckeditor', '2023-05-09 11:39:55', '2023-06-27 09:39:30'),
(2, 'phone', '0544 000 00 01', 'text', '2023-05-09 11:39:55', '2023-05-09 11:39:55'),
(3, 'email', 'test@domain.com', 'email', '2023-05-09 11:39:55', '2023-05-09 11:39:55'),
(4, 'harita', 'test', 'textarea', '2023-05-09 11:39:55', '2023-06-27 20:08:35'),
(5, 'kampanya_image', 'img/site/1688464817-1688464817.webp', 'image', '2023-06-23 13:39:43', '2023-07-04 10:00:17'),
(6, 'logo', 'img/site/1688464691-1688464691.webp', 'image', '2023-06-23 13:40:41', '2023-07-04 09:58:19'),
(7, 'kampanya_title', 'Tüm Ürünlerimizde 50%', 'text', '2023-07-04 10:01:49', '2023-07-04 10:02:54'),
(8, 'kampanya_text', 'Seçili ürünlerde indirim fırsatlarını kaçırmayın!', 'text', '2023-07-04 10:02:09', '2023-07-04 10:02:09'),
(9, 'twitter_adres', '@twitteradres', 'text', '2023-07-04 10:02:09', '2023-07-04 10:02:09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `name`, `content`, `link`, `status`, `created_at`, `updated_at`) VALUES
(15, 'img/slider/1685784681-terst.webp', 'Terstee', 'Slogan', '#', '1', '2023-06-03 09:27:10', '2023-07-04 09:57:04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int NOT NULL DEFAULT '0',
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Deneme', 'test@gmail.com', NULL, '$2y$10$rW0nirTAe42wn2erS5MhFuZuj5CGtUo3mA5iJXkRKf7okJzhRnW0y', 0, '0', NULL, '2023-05-20 09:05:20', '2023-05-20 09:05:20'),
(2, 'ABC YT', 'abc@gmail.com', NULL, '$2y$10$Jv0mwe2dc8nC2jfAtF77o.1tniEQVwCzy/B0NlAPEUQRDogmvarg2', 0, '0', NULL, '2023-08-01 13:54:10', '2023-08-01 13:54:10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `views`
--

CREATE TABLE `views` (
  `id` bigint UNSIGNED NOT NULL,
  `viewable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewable_id` bigint UNSIGNED NOT NULL,
  `visitor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `collection` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viewed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `views`
--

INSERT INTO `views` (`id`, `viewable_type`, `viewable_id`, `visitor`, `collection`, `viewed_at`) VALUES
(9, 'App\\Models\\Product', 104, 'ek9LQUqBi2R3MpizBoNWZCtsB8YHpuEgOFEnM9FKvefE5Y0IIBJB2jW4iqNTCgle7kdbhiAbXCiRjViX', NULL, '2023-12-13 00:13:51'),
(10, 'App\\Models\\Product', 104, 'ek9LQUqBi2R3MpizBoNWZCtsB8YHpuEgOFEnM9FKvefE5Y0IIBJB2jW4iqNTCgle7kdbhiAbXCiRjViX', NULL, '2023-12-13 00:13:54'),
(11, 'App\\Models\\Product', 104, 'ek9LQUqBi2R3MpizBoNWZCtsB8YHpuEgOFEnM9FKvefE5Y0IIBJB2jW4iqNTCgle7kdbhiAbXCiRjViX', NULL, '2023-12-13 00:13:55'),
(12, 'App\\Models\\Product', 104, 'ek9LQUqBi2R3MpizBoNWZCtsB8YHpuEgOFEnM9FKvefE5Y0IIBJB2jW4iqNTCgle7kdbhiAbXCiRjViX', NULL, '2023-12-13 00:14:18'),
(13, 'App\\Models\\Product', 104, 'ek9LQUqBi2R3MpizBoNWZCtsB8YHpuEgOFEnM9FKvefE5Y0IIBJB2jW4iqNTCgle7kdbhiAbXCiRjViX', NULL, '2023-12-13 00:14:19'),
(14, 'App\\Models\\Product', 104, 'ek9LQUqBi2R3MpizBoNWZCtsB8YHpuEgOFEnM9FKvefE5Y0IIBJB2jW4iqNTCgle7kdbhiAbXCiRjViX', NULL, '2023-12-13 00:14:20'),
(15, 'App\\Models\\Product', 104, 'ek9LQUqBi2R3MpizBoNWZCtsB8YHpuEgOFEnM9FKvefE5Y0IIBJB2jW4iqNTCgle7kdbhiAbXCiRjViX', NULL, '2023-12-13 00:16:25'),
(16, 'App\\Models\\Product', 104, 'ek9LQUqBi2R3MpizBoNWZCtsB8YHpuEgOFEnM9FKvefE5Y0IIBJB2jW4iqNTCgle7kdbhiAbXCiRjViX', NULL, '2023-12-13 00:17:26'),
(17, 'App\\Models\\Product', 104, 'ek9LQUqBi2R3MpizBoNWZCtsB8YHpuEgOFEnM9FKvefE5Y0IIBJB2jW4iqNTCgle7kdbhiAbXCiRjViX', NULL, '2023-12-16 20:07:12');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `image_media`
--
ALTER TABLE `image_media`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `page_seos`
--
ALTER TABLE `page_seos`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sepets`
--
ALTER TABLE `sepets`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Tablo için indeksler `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Tablo için indeksler `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `views_viewable_type_viewable_id_index` (`viewable_type`,`viewable_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `image_media`
--
ALTER TABLE `image_media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `page_seos`
--
ALTER TABLE `page_seos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- Tablo için AUTO_INCREMENT değeri `sepets`
--
ALTER TABLE `sepets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
