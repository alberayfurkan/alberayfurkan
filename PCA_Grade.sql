-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2024 at 02:20 AM
-- Server version: 8.0.34-0ubuntu0.22.04.1
-- PHP Version: 7.3.33-14+ubuntu22.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PCA_Grade`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int UNSIGNED NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `message`, `created`) VALUES
(1, 'Beray Furkan Al', 'alberayfurkan@gmail.com', 'test53', '2024-06-28 01:52:33'),
(2, 'Beray Furkan Al', 'test1@gmail.com', 'test1', '2024-06-28 01:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int UNSIGNED NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `module` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `content_id` int NOT NULL,
  `sort` int DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `trash` tinyint DEFAULT '0',
  `status` tinyint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `description`, `module`, `content_id`, `sort`, `created`, `updated`, `trash`, `status`) VALUES
(39, '430x315img4.webp', 'GALERİ1', 'gallery', 0, 7, '2024-05-23 18:53:13', '2024-05-23 18:53:13', 0, 1),
(40, '430x315img4.webp', 'GALERİ1', 'gallery', 1, 7, '2024-05-23 18:53:13', '2024-05-23 18:53:13', 0, 1),
(41, '430x315img4.webp', 'GALERİ1', 'gallery', 2, 7, '2024-05-23 18:53:13', '2024-05-23 18:53:13', 0, 1),
(42, '430x315img2.webp', 'GALERİ3', 'gallery', 3, 3, '2024-05-23 18:53:13', '2024-05-23 18:53:13', 0, 1),
(43, '430x315img2.webp', 'GALERİ3', 'gallery', 4, 3, '2024-05-23 18:53:13', '2024-05-23 18:53:13', 0, 1),
(44, '430x315img2.webp', 'GALERİ3', 'gallery', 5, 3, '2024-05-23 18:53:13', '2024-05-23 18:53:13', 0, 1),
(45, '430x315img3.webp', 'GALERİ4', 'gallery', 6, 4, '2024-05-23 18:53:13', '2024-05-23 18:53:13', 0, 1),
(46, '430x315img3.webp', 'GALERİ4', 'gallery', 7, 4, '2024-05-23 18:53:13', '2024-05-23 18:53:13', 0, 1),
(47, '430x315img3.webp', 'GALERİ4', 'gallery', 8, 4, '2024-05-23 18:53:13', '2024-05-23 18:53:13', 0, 1),
(48, '430x315img3.webp', 'GALERİ4', 'gallery', 9, 1, '2024-05-23 18:53:13', '2024-05-23 18:53:13', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `short_name` varchar(3) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `keywords` varchar(3) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `flag` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `sort` int DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `trash` tinyint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `short_name`, `keywords`, `flag`, `sort`, `status`, `trash`) VALUES
(1, 'Türkçe', 'TR', 'tr', 'tr.png', 1, 1, 0),
(2, 'İngilizce', 'EN', 'en', 'en.png', 1, 1, 0),
(3, 'Almanca', 'DE', 'de', 'de.png', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `trash` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `title`, `slug`, `status`, `trash`) VALUES
(1, 'Anasayfa', 'home', 1, 1),
(2, 'Kullanıcı Yönetimi', 'users', 1, 0),
(3, 'Sabit İçerik Yönetimi', 'constant', 1, 0),
(4, 'İletişim Formu', 'contact', 1, 0),
(5, 'Ayarlar', 'settings', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int UNSIGNED NOT NULL,
  `admin_id` int UNSIGNED NOT NULL,
  `module_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `admin_id`, `module_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int UNSIGNED NOT NULL,
  `lang_id` int DEFAULT NULL,
  `pages_id` int DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `mod` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `met` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `did` int DEFAULT NULL,
  `sort` int DEFAULT '99',
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `lang_id`, `pages_id`, `title`, `slug`, `mod`, `met`, `did`, `sort`, `updated`) VALUES
(2, 0, 0, 'Home Page', 'home', 'home', 'index', 0, 99, NULL),
(3, 1, 0, NULL, '404', 'home', 'notfound', 0, 99, NULL),
(8, 1, 0, 'İletişim', 'iletisim', 'contact', 'index', 0, 99, NULL),
(60, 1, 0, NULL, 'arama', 'home', 'search', 0, 99, NULL),
(62, 1, 0, NULL, 'sitemap', 'home', 'map', 0, 99, NULL),
(75, 1, 1, 'Hakkımızda', 'hakkimizda', 'pages', 'detail', 1, 99, '2024-05-17 19:40:45'),
(76, 2, 1, 'About Us', 'about-us', 'pages', 'detail', 2, 99, '2024-05-17 19:41:14'),
(77, 3, 1, 'Uber Uns', 'uber-uns', 'pages', 'detail', 3, 99, '2024-05-17 19:41:37'),
(78, 1, 2, 'Misyon', 'misyon', 'pages', 'detail', 4, 99, '2024-05-17 19:41:53'),
(79, 2, 2, 'Mission', 'mission', 'pages', 'detail', 5, 99, '2024-05-17 19:42:09'),
(80, 3, 2, 'Missionde', 'missionde', 'pages', 'detail', 6, 99, '2024-05-20 18:21:07'),
(81, 2, 8, NULL, 'beray-furkan-al', 'speakers', 'detail', 2, 99, '2024-05-21 11:55:02'),
(82, 1, 8, NULL, 'beray-furkan-al', 'speakers', 'detail', 3, 99, '2024-05-21 12:04:27'),
(83, 3, 8, NULL, 'beray-furkan-al', 'speakers', 'detail', 4, 99, '2024-05-21 13:54:20'),
(84, 1, 9, NULL, 'zafer-altun', 'speakers', 'detail', 5, 99, '2024-05-21 15:43:08'),
(85, 3, 9, NULL, 'zafer-altun', 'speakers', 'detail', 6, 99, '2024-05-21 15:46:56'),
(86, 1, 10, NULL, 'mazlum-gunduz', 'speakers', 'detail', 7, 99, '2024-05-22 14:12:01'),
(87, 2, 10, NULL, 'mazlum-gunduz', 'speakers', 'detail', 8, 99, '2024-05-22 14:18:14'),
(88, 1, 11, 'Vizyon', 'vizyon', 'pages', 'detail', 7, 99, '2024-05-22 14:21:37'),
(89, 1, 0, 'Konuşmacılar', 'konusmacilar', 'speakers', 'index', 1, 1, '2023-04-12 01:25:08'),
(90, 2, 0, 'Speakers', 'speakers', 'speakers', 'index', 1, 1, '2023-04-12 01:25:08'),
(91, 3, 0, 'Lautsprecher', 'lautsprecher', 'speakers', 'index', 1, 1, '2023-04-12 01:25:08'),
(92, 2, 0, 'Backers', 'backers', 'backer', 'index', 1, 2, '2023-04-12 01:25:08'),
(93, 3, 0, 'Sponsoren', 'sponsoren', 'backer', 'index', 1, 2, '2023-04-12 01:25:08'),
(94, 1, 0, 'Sponsorlar', 'sponsorlar', 'backer', 'index', 1, 2, '2023-04-12 01:25:08'),
(95, 2, 0, 'Partner', 'partner', 'partner', 'index', 1, 3, '2023-04-12 01:25:08'),
(96, 3, 0, 'Geschäftspartner', 'geschaftspartner', 'partner', 'index', 1, 3, '2023-04-12 01:25:08'),
(97, 1, 0, 'İş Ortakları', 'is-ortaklari', 'partner', 'index', 1, 3, '2023-04-12 01:25:08'),
(98, 2, 0, 'Contact', 'contact', 'contact', 'index', 0, 99, NULL),
(99, 3, 0, 'Kommunikation', 'kommunikation', 'contact', 'index', 0, 99, NULL),
(100, 3, 11, 'Vision', 'vision', 'pages', 'detail', 99, 9, '2024-05-29 17:29:57'),
(101, 1, 1, 'Tasarımcılar için kodlama – yeni başlayanlar için hızlandırılmış kurs', 'tasarimcilar-icin-kodlama-yeni-baslayanlar-icin-hizlandirilmis-kurs', 'sessions', 'detail', 2, 1, '2024-06-03 13:49:15'),
(102, 2, 1, 'Coding for designers – a beginners crash course', 'coding-for-designers-a-beginners-crash-course', 'sessions', 'detail', 3, 99, '2024-06-03 13:52:40'),
(103, 1, 2, 'Kayıt', 'kayit', 'sessions', 'detail', 4, 1, '2024-06-03 13:58:36'),
(104, 1, 3, 'Kullanıcı arayüzü geliştirmeyi otomatikleştirme', 'kullanici-arayuzu-gelistirmeyi-otomatiklestirme', 'sessions', 'detail', 5, 2, '2024-06-03 15:21:10'),
(105, 1, 0, 'Oturumlar', 'oturumlar', 'sessions', 'index', 1, 1, '2023-04-12 01:25:08'),
(106, 2, 0, 'Sessions', 'sessions', 'sessions', 'index', 1, 1, '2023-04-12 01:25:08'),
(107, 3, 0, 'Sitzungen', 'sitzungen', 'sessions', 'index', 1, 1, '2023-04-12 01:25:08'),
(108, 1, 4, 'gün 5 Kullanıcı arayüzü geliştirmeyi otomatikleştirme', 'gun-5-kullanici-arayuzu-gelistirmeyi-otomatiklestirme', 'sessions', 'detail', 6, 2, '2024-06-03 15:21:10'),
(109, 1, 5, 'söyleşi', 'soylesi', 'sessions', 'detail', 7, 1, '2024-06-03 19:58:59'),
(110, 1, 6, 'Angular', 'angular', 'sessions', 'detail', 8, 99, '2024-06-03 20:00:03'),
(111, 3, 1, 'almanca etkinlik', 'almanca-etkinlik', 'sessions', 'detail', 9, 99, '2024-06-04 13:18:02'),
(112, 2, 0, NULL, 'search', 'home', 'search', 0, 99, NULL),
(113, 3, 0, NULL, 'suchen', 'home', 'search', 0, 99, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int UNSIGNED NOT NULL,
  `lang_id` int NOT NULL,
  `site_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `mobil_image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `logo_square` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `favicon` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `whatsapp` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `organization` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `status` tinyint DEFAULT NULL,
  `trash` tinyint DEFAULT NULL,
  `publisher` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `lang_id`, `site_name`, `meta_title`, `meta_description`, `image`, `mobil_image`, `logo_square`, `favicon`, `email`, `whatsapp`, `organization`, `author`, `status`, `trash`, `publisher`, `updated`) VALUES
(1, 1, 'Site Adı', 'Site Başlık', 'Site Açıklama', 'logo-2.webp', 'orneklogo.webp', 'yatayornek.webp', 'yatayornek.webp', 'info@ab.com', '+905347919653', 'cesmewls', 'cesmewls', 1, 0, 'cesmewls', '2024-06-04 15:08:48'),
(2, 2, 'Site Adı', 'Site Başlık', 'Site Açıklama', 'orneklogo.webp', 'orneklogo.webp', 'yatayornek.webp', 'yatayornek.webp', 'info@ab.com', '+905347919653', 'cesmewls', 'cesmewls', 1, 0, 'cesmewls', '2024-05-28 17:53:28'),
(3, 3, 'Site Adı', 'Site Başlık', 'Site Açıklama', 'logo-2.webp', 'orneklogo.webp', 'yatayornek.webp', 'yatayornek.webp', 'info@ab.com', '+905347919653', 'cesmewls', 'cesmewls', 1, 0, 'cesmewls', '2024-05-28 17:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `trash` tinyint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `phone`, `image`, `password`, `ip_address`, `token`, `created`, `updated`, `status`, `trash`) VALUES
(1, 'Beray Al', 'alberayfurkan@gmail.com', '905347919653', '', 'd16c5285889622e8c6aa4e3cb1e1fa05c5634f33', '::1', '49307d49e640f0737f5ef16205c10016acd12983', NULL, '2024-06-28 01:53:03', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `sort` (`sort`) USING BTREE,
  ADD KEY `trash` (`trash`) USING BTREE;

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `sort` (`sort`) USING BTREE,
  ADD KEY `status` (`status`) USING BTREE,
  ADD KEY `trash` (`trash`) USING BTREE;

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `module_id` (`module_id`) USING BTREE;

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`) USING BTREE,
  ADD UNIQUE KEY `phone` (`phone`) USING BTREE,
  ADD KEY `status` (`status`) USING BTREE,
  ADD KEY `trash` (`trash`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
