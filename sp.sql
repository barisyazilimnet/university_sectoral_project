-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Haz 2021, 23:52:59
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sp`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_users`
--

CREATE TABLE `admin_users` (
  `user_id` int(11) NOT NULL,
  `photo` varchar(2000) NOT NULL,
  `name_surname` varchar(2000) NOT NULL,
  `user_name` varchar(2000) NOT NULL,
  `password` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(2000) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `web_site` text NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `twitter` text NOT NULL,
  `linkedin` text NOT NULL,
  `pinterest` text NOT NULL,
  `gender` varchar(1) NOT NULL,
  `status` varchar(1) NOT NULL,
  `authorization_id` int(11) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin_users`
--

INSERT INTO `admin_users` (`user_id`, `photo`, `name_surname`, `user_name`, `password`, `birthday`, `email`, `phone_number`, `web_site`, `facebook`, `instagram`, `twitter`, `linkedin`, `pinterest`, `gender`, `status`, `authorization_id`, `registration_date`) VALUES
(1, 'GameMaster_photo_16081cd76e7bca.jpg', 'Barış KURT', 'GameMaster', '03f05869450ea1b4d18c3f5191f29050', '2000-01-30', 'kurt-bar07@hotmail.com', '(532) 497-3873', 'http://barisyazilim.net/', 'https://www.facebook.com/kurt.baris07', 'https://www.instagram.com/kurtbar07/', 'https://twitter.com/Barkurt14443348', 'https://www.linkedin.com/in/bar%C4%B1%C5%9F-kurt-31ba65201/', '', '1', '1', 1, '2021-04-04 21:15:45'),
(6, 'shnbsra_photo_160723b36f2251.jpg', 'Büşra ŞAHİN', 'shnbsra', '03f05869450ea1b4d18c3f5191f29050', '2000-03-15', 'shnbsra270@gmail.com', '(546) 688-2028', '', 'https://www.facebook.com/busra.sahin.589', 'https://www.instagram.com/shn_busraa/', '', '', '', '0', '1', 2, '2021-04-09 19:26:08'),
(7, 'sem_photo_160723df92ce2a.jpg', 'Semih ACAR', 'sem', '03f05869450ea1b4d18c3f5191f29050', '1996-11-16', 'semih_acar01@hotmail.com', '(535) 683-4185', '', 'https://www.facebook.com/smhacar', 'https://www.instagram.com/smhacarr/', '', '', '', '1', '1', 2, '2021-04-09 19:30:27'),
(8, 'ibrahimbykdmr_photo_1607243d5d8b47.jpg', 'Ibrahim Bedir BÜYÜKDEMİR', 'ibrahimbykdmr', '59a917a0cad8087d935c9c462e4781f0', '1998-04-03', 'ibrahim.buyukdemir@outlook.com', '(537) 397-3550', '', 'https://www.facebook.com/ibrahimbedir.buyukdemir', 'https://www.instagram.com/ibrahim.buyukdemir/', '', '', '', '1', '1', 2, '2021-04-09 19:54:17'),
(17, 'Mr_profile_photo.png', 'Ömer IŞIK', 'omer61', '72f225f126fc4656ad07f32fc1c52c5e', '2000-08-12', 'omer.isik.1025@gmail.com', '(555) 193-9098', '', '', '', '', '', '', '1', '1', 2, '2021-04-16 18:52:27'),
(18, 'Mrs_profile_photo.png', 'Furkan AYDIN', 'furkan61', '2e6298ecc21b8a30a994b11d0658b430', '2000-03-12', 'furkan61@hotmail.com', '(123) 131-3122', '', '', '', '', '', '', '1', '1', 2, '2021-04-20 11:36:50'),
(19, 'Mr_profile_photo.png', 'Furkan AYDIN', 'furkan', 'c5311e196e077e44007035563082fc40', '2020-02-15', 'furkan@hotmail.com', '(131) 231-321_', '', '', '', '', '', '', '1', '1', 2, '2021-04-20 20:36:15'),
(20, 'Mr_profile_photo.png', 'Barış KURT', 'GameMaster0707', '8c16acaee44a80a91ce4da91daeae825', '2020-03-12', 'baris@hotmial.com', '(123) 131-2313', '', '', '', '', '', '', '1', '1', 2, '2021-04-20 20:38:21'),
(21, 'furkan07._photo_1608296d655020.png', 'Furkan AYDIN', 'furkan07', '1389668da337b69e216c4ed65a591ec8', '2000-02-20', 'furkan0707@hotmail.com', '(131) 231-3123', '', '', '', '', '', '', '1', '1', 2, '2021-04-23 12:43:50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `logo` varchar(2000) NOT NULL,
  `name` varchar(2000) NOT NULL,
  `homepage_visibility` int(1) NOT NULL,
  `category_order` int(11) NOT NULL,
  `background` varchar(2000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`category_id`, `logo`, `name`, `homepage_visibility`, `category_order`, `background`, `user_id`, `datetime`) VALUES
(9, 'desserts_logo.png', 'Tatlılar', 1, 2, 'Tatlılar_background_16085c3844b80b.jpg', 1, '2021-04-25 18:43:55'),
(18, 'Ana_Yemekler_logo_1609ac63e28aeb.png', 'Ana Yemekler', 1, 1, 'Ana_Yemekler_background_16085983755f64.jpg', 1, '2021-04-25 19:26:31'),
(21, 'Içecekler_logo_16092bc0a87f5e.png', 'Içecekler', 1, 3, 'Içecekler_background_16085aa9f646dd.jpg', 1, '2021-04-25 20:45:03'),
(26, 'Çorbalar_&_Salatalar_logo_16092bd33b9551.png', 'Çorbalar &amp; Salatalar', 1, 4, 'çorbalar_&_salatalar_background_1608dea9a09fd8.jpg', 1, '2021-05-02 02:56:10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `chefs`
--

CREATE TABLE `chefs` (
  `chef_id` int(11) NOT NULL,
  `chef_photo` varchar(3000) NOT NULL,
  `chef_name_surname` varchar(3000) NOT NULL,
  `chef_superscription` varchar(3000) NOT NULL,
  `chef_facebook` text NOT NULL,
  `chef_twitter` text NOT NULL,
  `chef_instagram` text NOT NULL,
  `chef_linkedin` text NOT NULL,
  `chef_pinterest` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `chefs`
--

INSERT INTO `chefs` (`chef_id`, `chef_photo`, `chef_name_surname`, `chef_superscription`, `chef_facebook`, `chef_twitter`, `chef_instagram`, `chef_linkedin`, `chef_pinterest`) VALUES
(1, 'Barış_KURT_photo_16093a008d48d1.jpg', 'Barış KURT', 'Executive Şef', 'https://www.facebook.com/kurt.baris07', 'https://twitter.com/Barkurt14443348', 'https://www.instagram.com/kurtbar07/', 'https://www.linkedin.com/in/bar%C4%B1%C5%9F-kurt-31ba65201/', ''),
(3, 'Furkan_AYDIN_photo_1609ae608d2969.jpg', 'Furkan AYDIN', 'Chef', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `coming_soon`
--

CREATE TABLE `coming_soon` (
  `id` int(11) NOT NULL,
  `header` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `background` varchar(2000) NOT NULL,
  `slider_photos` varchar(3000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `coming_soon`
--

INSERT INTO `coming_soon` (`id`, `header`, `description`, `background`, `slider_photos`, `user_id`, `time`) VALUES
(1, 'BAKIMDAYIZ...', 'Sizin Için Yenileniyoruz. Site Yapımızı Daha Iyi Hale Getiriyoruz', 'background_1607f530a2fc72.jpg', 'slider_photos_1608959d1a1cfa.jpg,slider_photos_1608959d1a1e92.jpg,slider_photos_1608959d1a1f7d.png', 1, '2021-05-01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `photo` varchar(2000) NOT NULL,
  `header` varchar(1000) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `gallery`
--

INSERT INTO `gallery` (`id`, `photo`, `header`, `description`, `user_id`, `date`) VALUES
(3, 'photo_16092d65b8c9da.jpg', '', '', 1, '2021-05-05 20:31:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `homepage_settings`
--

CREATE TABLE `homepage_settings` (
  `id` int(11) NOT NULL,
  `slider_background` varchar(2000) NOT NULL,
  `slider_header` varchar(2000) NOT NULL,
  `slider_bottom_header` varchar(2000) NOT NULL,
  `history` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `homepage_settings`
--

INSERT INTO `homepage_settings` (`id`, `slider_background`, `slider_header`, `slider_bottom_header`, `history`, `user_id`, `date`) VALUES
(1, 'slider_background_16081c5b763baa.jpg', 'BEEF STEAK', 'KARABİBER SOSLU', 'Kahramanmaraş, eski ve halk arasındaki adıyla Maraş, Türkiye&#039;nin Akdeniz Bölgesinde bulunan bir ili ve en kalabalık on sekizinci kentidir. Kurtuluş Savaşı&#039;nda işgale direnişi nedeniyle TBMM tarafından 5 Nisan 1925&#039;te şehre İstiklal Madalyası verilmiştir. Maraş olan adı, 7 Şubat 1973&#039;te Kahramanmaraş olarak değiştirilmiştir.', 1, '2021-04-20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `our_story`
--

CREATE TABLE `our_story` (
  `id` int(11) NOT NULL,
  `header` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `our_story`
--

INSERT INTO `our_story` (`id`, `header`, `description`, `photo`) VALUES
(1, 'Bizim Hikayemiz', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', 'our_story_photo_1608dd0ec256b2.jpeg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `p_name` varchar(3000) NOT NULL,
  `p_price` float NOT NULL,
  `p_photo` varchar(3000) NOT NULL,
  `menu_photo` varchar(2000) NOT NULL,
  `p_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `category_id`, `p_name`, `p_price`, `p_photo`, `menu_photo`, `p_datetime`) VALUES
(3, 18, 'Kuzu Çevirme', 49.99, 'Kuzu_çevirme_photo_1608ef2337e03f.jpg', '', '2021-05-02 22:04:42'),
(4, 9, 'Supangle', 14.99, 'supangle_photo_160914481bb1c2.jpg', 'Supangle_menu_photo_16092d1cbebe66.jpg', '2021-05-02 22:04:42'),
(5, 26, 'Akdeniz Salatası', 19.99, 'Akdeniz_Salatası_photo_16091454feba14.jpg', '', '2021-05-04 15:59:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `reservation_people` int(11) NOT NULL,
  `reservation_date` varchar(2000) NOT NULL,
  `reservation_time` varchar(2000) NOT NULL,
  `reservation_name` varchar(2000) NOT NULL,
  `reservation_phone_number` varchar(2000) NOT NULL,
  `reservation_email` varchar(3000) NOT NULL,
  `reservation_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `reservation_people`, `reservation_date`, `reservation_time`, `reservation_name`, `reservation_phone_number`, `reservation_email`, `reservation_datetime`) VALUES
(1, 0, '0000-00-00', '00:00:11', 'Barış Kurt', 'qweqwe', 'kurt-bar07@hotmail.com', '2021-05-12 01:30:41'),
(2, 0, '15 - 05 - 2021', '11 : 00 pm', 'Barış Kurt', '5324973873', 'kurt-bar07@hotmail.com', '2021-05-12 01:33:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `icon` varchar(2000) NOT NULL,
  `logo` varchar(2000) NOT NULL,
  `admin_logo` varchar(2000) NOT NULL,
  `login_background` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `status` int(1) NOT NULL,
  `theme` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `url`, `title`, `icon`, `logo`, `admin_logo`, `login_background`, `description`, `keywords`, `status`, `theme`, `user_id`, `datetime`) VALUES
(1, 'http://localhost/sp', 'Ikizler Restaurant', 'icon_1607f4bfd2c709.png', 'logo_1607f5ba7e163b.png', 'admin_logo_1607c125f1a0f2.png', 'login_background_16077376d822dd.jpg', 'Açıklama', 'Büşra,Barış,Semih', 1, 'default', 1, '2021-05-09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_contact`
--

CREATE TABLE `site_contact` (
  `id` int(11) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `pinterest` text NOT NULL,
  `twitter` text NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `linkedin` text NOT NULL,
  `datetime` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `site_contact`
--

INSERT INTO `site_contact` (`id`, `phone_number`, `email`, `address`, `pinterest`, `twitter`, `facebook`, `instagram`, `linkedin`, `datetime`, `user_id`) VALUES
(1, '(532) 497-3873', 'kurt-bar07@hotmail.com', 'Hacet Mah. Berk Sok.', '', 'https://twitter.com/Barkurt14443348', 'https://www.facebook.com/kurt.baris07', 'https://www.instagram.com/kurtbar07/', 'https://www.linkedin.com/in/bar%C4%B1%C5%9F-kurt-31ba65201/', '2021-04-24', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `system_archives`
--

CREATE TABLE `system_archives` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `operation` varchar(2000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `system_archives`
--

INSERT INTO `system_archives` (`id`, `description`, `operation`, `user_id`, `datetime`) VALUES
(1, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-05 15:08:27'),
(2, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-05 17:27:57'),
(3, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-05 17:32:43'),
(4, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-05 18:10:05'),
(5, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-05 19:32:55'),
(6, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-05 19:33:24'),
(7, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-05 19:40:29'),
(8, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-05 19:40:43'),
(9, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-05 23:16:25'),
(10, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-05 23:39:26'),
(11, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-05 23:39:40'),
(12, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-05 23:40:46'),
(13, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-05 23:41:48'),
(14, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-05 23:42:11'),
(15, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-06 03:13:35'),
(16, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-06 03:34:42'),
(17, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-06 03:34:47'),
(18, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-06 03:35:16'),
(19, 'Profil bilgileri güncellendi', 'Profil Güncellendi', 1, '2021-04-06 10:29:10'),
(20, 'Profil şifresi güncellendi', 'Profil Güncellendi', 1, '2021-04-06 10:31:15'),
(21, 'Profil şifresi güncellendi', 'Profil Güncellendi', 1, '2021-04-06 10:51:53'),
(22, 'Profil bilgileri güncellendi', 'Profil Güncellendi', 1, '2021-04-06 11:46:04'),
(23, 'Barış Kurt isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-04-07 03:15:02'),
(24, '4 id\'li Yazar yetkisi silindi', 'Yetki Silindi', 1, '2021-04-07 14:43:58'),
(25, 'Editör isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-04-07 14:48:00'),
(26, 'Yazar isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-04-07 14:51:33'),
(27, '7 id li Yazar yetkisi silindi', 'Yetki Silindi', 1, '2021-04-07 14:54:10'),
(28, '6 id li Editör yetkisi silindi', 'Yetki Silindi', 1, '2021-04-07 14:55:58'),
(29, 'Editör isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-04-07 14:56:46'),
(30, 'Yazar isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-04-07 14:59:53'),
(31, '9 id li Yazar yetkisi silindi', 'Yetki Silindi', 1, '2021-04-07 15:49:54'),
(32, 'Okur isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-04-07 15:59:37'),
(33, 'Okur isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-04-07 16:00:14'),
(34, '5 id li Okur yetkisi silindi', 'Yetki Silindi', 1, '2021-04-07 16:05:59'),
(35, '4 id li Yazar yetkisi silindi', 'Yetki Silindi', 1, '2021-04-07 16:06:20'),
(36, '2 id li Site Yöneticisi yetkisi silindi', 'Yetki Silindi', 1, '2021-04-07 16:29:38'),
(37, 'Site Yöneticisi isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-04-07 16:31:24'),
(38, '2 id li Editör yetkisi silindi', 'Yetki Silindi', 1, '2021-04-07 16:31:45'),
(39, 'Yazar isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-04-07 19:11:31'),
(40, 'Site Yöneticisi isimli yetki güncellendi', 'Yetki Güncellendi', 1, '2021-04-08 00:31:11'),
(41, 'Site Yöneticisi isimli yetki güncellendi', 'Yetki Güncellendi', 1, '2021-04-08 00:31:54'),
(42, 'Site Yöneticisi isimli yetki güncellendi', 'Yetki Güncellendi', 1, '2021-04-08 00:32:06'),
(43, '2 id li Site Yöneticisi yetkisi silindi', 'Yetki Silindi', 1, '2021-04-08 00:33:31'),
(44, 'Site Yöneticisi isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-04-08 00:42:49'),
(45, 'Site Yöneticisi isimli yetki güncellendi', 'Yetki Güncellendi', 1, '2021-04-08 19:59:41'),
(46, 'Site Yöneticisi isimli yetki güncellendi', 'Yetki Güncellendi', 1, '2021-04-08 20:00:41'),
(47, '2 id li Site Yöneticisi yetkisi silindi', 'Yetki Silindi', 1, '2021-04-08 20:01:14'),
(48, 'Site Yöneticisi isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-04-08 20:03:24'),
(49, 'Editör isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-04-08 20:04:14'),
(50, '2 id li Site Yöneticisi yetkisi silindi', 'Yetki Silindi', 1, '2021-04-08 20:05:40'),
(51, 'Profil bilgileri güncellendi', 'Profil Güncellendi', 1, '2021-04-08 20:14:04'),
(52, 'Profil bilgileri güncellendi', 'Profil Güncellendi', 1, '2021-04-08 20:14:26'),
(53, 'Profil bilgileri güncellendi', 'Profil Güncellendi', 1, '2021-04-09 01:03:12'),
(54, 'Profil bilgileri güncellendi', 'Profil Güncellendi', 1, '2021-04-09 01:03:22'),
(55, 'Yeni admin panel üyesi eklendi', 'Admin Üyesi Eklendi', 1, '2021-04-09 20:34:34'),
(56, 'Yeni admin panel üyesi eklendi', 'Admin Üyesi Eklendi', 1, '2021-04-09 20:36:23'),
(57, 'Editör isimli yetki güncellendi', 'Yetki Güncellendi', 1, '2021-04-10 11:51:24'),
(58, 'Editör isimli yetki güncellendi', 'Yetki Güncellendi', 1, '2021-04-10 11:53:16'),
(59, 'Editör isimli yetki güncellendi', 'Yetki Güncellendi', 1, '2021-04-10 11:53:32'),
(60, 'Editör isimli yetki güncellendi', 'Yetki Güncellendi', 1, '2021-04-10 14:07:56'),
(61, 'Elbise isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-04-10 16:00:19'),
(62, '3 id li Elbise yetkisi silindi', 'Yetki Silindi', 1, '2021-04-10 16:00:25'),
(63, 'Yazar isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-04-10 22:36:11'),
(64, 'Profil bilgileri güncellendi', 'Profil Güncellendi', 1, '2021-04-11 00:53:47'),
(65, 'Profil bilgileri güncellendi', 'Profil Güncellendi', 1, '2021-04-11 02:30:59'),
(66, 'Profil bilgileri güncellendi', 'Profil Güncellendi', 1, '2021-04-11 02:46:30'),
(67, 'Profil bilgileri güncellendi', 'Profil Güncellendi', 1, '2021-04-11 02:47:12'),
(68, 'Profil bilgileri güncellendi', 'Profil Güncellendi', 1, '2021-04-11 02:50:25'),
(69, 'Profil bilgileri güncellendi', 'Profil Güncellendi', 1, '2021-04-11 02:54:09'),
(70, 'shnbsra üyesi başarıyla güncellendi', 'Üye Güncellendi', 1, '2021-04-11 02:56:39'),
(71, 'Profil bilgileri güncellendi', 'Profil Güncellendi', 1, '2021-04-11 03:01:29'),
(72, 'sem üyesi başarıyla güncellendi', 'Üye Güncellendi', 1, '2021-04-11 03:08:25'),
(73, 'ibrahimbykdmr üyesi başarıyla güncellendi', 'Üye Güncellendi', 1, '2021-04-11 03:33:25'),
(74, 'asdasds admin paneli üyesi eklendi', 'Admin Üyesi Eklendi', 1, '2021-04-11 04:28:29'),
(75, 'asdasds admin paneli üyesi silindi', 'Admin Üyesi Silindi', 1, '2021-04-11 04:28:36'),
(76, 'Site Yöneticisi isimli yetki güncellendi', 'Yetki Güncellendi', 1, '2021-04-11 04:29:36'),
(77, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-11 14:11:04'),
(78, 'Site Yöneticisi isimli yetki güncellendi', 'Yetki Güncellendi', 1, '2021-04-11 15:04:27'),
(79, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-12 16:34:03'),
(80, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-12 16:52:34'),
(81, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-12 16:53:41'),
(82, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-12 22:40:11'),
(83, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-12 23:34:21'),
(84, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-13 00:32:10'),
(85, 'Bakımda sayfası güncellendi', 'Bakımda sayfası Güncellendi', 1, '2021-04-13 23:28:08'),
(86, 'Bakımda sayfası güncellendi', 'Bakımda sayfası Güncellendi', 1, '2021-04-13 23:32:36'),
(87, 'Bakımda sayfası güncellendi', 'Bakımda sayfası Güncellendi', 1, '2021-04-13 23:33:05'),
(88, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-13 23:53:26'),
(89, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-14 01:00:39'),
(90, 'Site Yöneticisi isimli yetki güncellendi', 'Yetki Güncellendi', 1, '2021-04-14 01:37:54'),
(91, 'tas_erkan üyesi eklendi', 'Üye Eklendi', 1, '2021-04-14 02:07:03'),
(92, 'isikomer üyesi eklendi', 'Üye Eklendi', 1, '2021-04-14 10:39:10'),
(93, 'tas_erkan üyesi başarıyla güncellendi', 'Üye Güncellendi', 1, '2021-04-14 11:32:31'),
(94, 'isikomer üyesi silindi', 'Üye Silindi', 1, '2021-04-14 11:41:21'),
(95, 'Resim 1 fotoğraf eklendi', 'Fotoğraf Eklendi', 1, '2021-04-14 15:15:05'),
(96, 'Resim 2 fotoğraf eklendi', 'Fotoğraf Eklendi', 1, '2021-04-14 15:20:40'),
(97, 'qweqwe üyesi eklendi', 'Üye Eklendi', 1, '2021-04-14 15:56:01'),
(98, 'qweqwe üyesi silindi', 'Üye Silindi', 1, '2021-04-14 16:19:31'),
(99, 'asdads üyesi eklendi', 'Üye Eklendi', 1, '2021-04-14 16:40:11'),
(100, 'asdads üyesi silindi', 'Üye Silindi', 1, '2021-04-14 16:40:33'),
(101, 'Resim 2 fotoğrafı başarıyla güncellendi', 'Fotoğraf Güncellendi', 1, '2021-04-14 20:03:36'),
(102, 'Resim 2 fotoğrafı silindi', 'Fotoğraf Silindi', 1, '2021-04-14 20:08:02'),
(103, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-14 21:41:03'),
(104, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-14 21:41:49'),
(105, 'Anasayfa ayarları güncellendi', 'Anasayfa Ayarları Güncellendi', 1, '2021-04-16 17:40:06'),
(106, 'Anasayfa ayarları güncellendi', 'Anasayfa Ayarları Güncellendi', 1, '2021-04-16 17:58:20'),
(107, 'Anasayfa ayarları güncellendi', 'Anasayfa Ayarları Güncellendi', 1, '2021-04-16 18:02:10'),
(108, 'omer61 admin paneli üyesi eklendi', 'Admin Üyesi Eklendi', 1, '2021-04-16 18:52:27'),
(109, 'Site Yöneticisi isimli yetki güncellendi', 'Yetki Güncellendi', 1, '2021-04-16 18:58:22'),
(110, 'Site Yöneticisi isimli yetki güncellendi', 'Yetki Güncellendi', 1, '2021-04-16 18:59:03'),
(111, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-18 14:02:18'),
(112, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-18 14:04:05'),
(113, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-18 14:05:03'),
(114, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-18 14:05:55'),
(115, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-18 20:20:28'),
(116, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-18 20:32:57'),
(117, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-19 11:23:30'),
(118, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-19 11:24:40'),
(119, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-19 11:25:49'),
(120, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-19 19:35:08'),
(121, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-19 19:35:23'),
(122, 'İletişim bilgileri güncellendi', 'İletişim Bilgileri Güncellendi', 1, '2021-04-19 20:43:08'),
(123, 'furkan61 admin paneli üyesi başarıyla güncellendi', 'Admin Üyesi Güncellendi', 1, '2021-04-20 12:04:21'),
(124, 'İletişim bilgileri güncellendi', 'İletişim Bilgileri Güncellendi', 1, '2021-04-20 21:17:11'),
(125, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-20 21:41:51'),
(126, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-20 21:43:49'),
(127, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-20 21:50:07'),
(128, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-20 22:00:04'),
(129, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-20 22:02:42'),
(130, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-20 22:03:09'),
(131, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-20 22:03:58'),
(132, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-20 22:11:26'),
(133, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-20 22:18:17'),
(134, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-20 22:19:39'),
(135, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-20 22:20:43'),
(136, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-20 22:29:20'),
(137, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-20 22:29:45'),
(138, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-20 22:31:01'),
(139, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-20 22:31:20'),
(140, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-20 22:32:06'),
(141, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-21 00:04:01'),
(142, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-21 00:05:47'),
(143, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-21 00:06:14'),
(144, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-21 00:06:32'),
(145, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-21 00:06:46'),
(146, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-21 00:07:01'),
(147, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-21 00:07:45'),
(148, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-21 00:10:03'),
(149, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-21 00:12:43'),
(150, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-21 00:47:41'),
(151, 'Bakımda sayfası güncellendi', 'Bakımda sayfası Güncellendi', 1, '2021-04-21 01:17:46'),
(152, 'Bakımda sayfası güncellendi', 'Bakımda sayfası Güncellendi', 1, '2021-04-21 01:21:55'),
(153, 'Bakımda sayfası güncellendi', 'Bakımda sayfası Güncellendi', 1, '2021-04-21 01:23:00'),
(154, 'Bakımda sayfası güncellendi', 'Bakımda sayfası Güncellendi', 1, '2021-04-21 01:26:00'),
(155, 'Bakımda sayfası güncellendi', 'Bakımda sayfası Güncellendi', 1, '2021-04-21 01:26:38'),
(156, 'Bakımda sayfası güncellendi', 'Bakımda sayfası Güncellendi', 1, '2021-04-21 01:30:49'),
(157, 'Bakımda sayfası güncellendi', 'Bakımda sayfası Güncellendi', 1, '2021-04-21 01:31:17'),
(158, 'Bakımda sayfası güncellendi', 'Bakımda sayfası Güncellendi', 1, '2021-04-21 01:32:01'),
(159, 'Bakımda sayfası güncellendi', 'Bakımda sayfası Güncellendi', 1, '2021-04-21 01:36:13'),
(160, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-21 01:54:31'),
(161, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-21 02:02:25'),
(162, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-21 02:05:20'),
(163, 'Bakımda sayfası güncellendi', 'Bakımda sayfası Güncellendi', 1, '2021-04-21 02:13:33'),
(164, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-21 02:27:53'),
(165, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-21 02:33:20'),
(166, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-21 02:33:56'),
(167, 'Anasayfa slider ayarları güncellendi', 'Anasayfa Ayarları Güncellendi', 1, '2021-04-22 21:51:35'),
(168, 'Anasayfa slider ayarları güncellendi', 'Anasayfa Ayarları Güncellendi', 1, '2021-04-22 21:52:31'),
(169, 'Anasayfa slider ayarları güncellendi', 'Anasayfa Ayarları Güncellendi', 1, '2021-04-22 21:53:19'),
(170, 'Profil bilgileri güncellendi', 'Profil Güncellendi', 1, '2021-04-22 22:25:04'),
(171, 'furkan07 admin paneli üyesi eklendi', 'Admin Üyesi Eklendi', 1, '2021-04-23 12:43:50'),
(172, 'Site Yöneticisi isimli yetki güncellendi', 'Yetki Güncellendi', 6, '2021-04-23 15:16:55'),
(173, 'GameMaster üyesi eklendi', 'Üye Eklendi', 1, '2021-04-23 15:49:50'),
(174, 'furkan61 üyesi eklendi', 'Üye Eklendi', 1, '2021-04-23 16:03:42'),
(175, 'Ana Yemekler isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-23 22:15:31'),
(176, 'Çorbalar &Amp; Salatalar isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-23 22:18:42'),
(177, 'Içecekler isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-23 22:19:13'),
(178, 'Tatlılar & Tatlılar isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-23 23:35:56'),
(179, 'Tatlar&#039;In &Amp; isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-24 00:14:36'),
(180, 'Tatlar\'In & isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-24 00:16:36'),
(181, 'Profil bilgileri güncellendi', 'Profil Güncellendi', 1, '2021-04-24 00:28:40'),
(182, 'Tatlar&#039;ın &amp; isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-24 00:50:59'),
(183, 'İletişim bilgileri güncellendi', 'İletişim Bilgileri Güncellendi', 1, '2021-04-24 01:17:31'),
(184, 'Profil bilgileri güncellendi', 'Profil Güncellendi', 1, '2021-04-24 13:27:58'),
(185, 'Çorbalar &amp; Salatalar isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-25 16:56:24'),
(186, 'Site Yöneticisi isimli yetki güncellendi', 'Yetki Güncellendi', 1, '2021-04-25 18:40:30'),
(187, 'Içecekler isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-25 18:43:55'),
(188, 'Içecekler isimli kategori güncellendi', 'Kategori Güncellendi', 1, '2021-04-25 18:48:59'),
(189, 'Tatlılar isimli kategori güncellendi', 'Kategori Güncellendi', 1, '2021-04-25 18:49:33'),
(190, 'Çorbalar  kategori silindi', 'Kategori Silindi', 1, '2021-04-25 18:58:21'),
(191, 'Ana Yemekler kategori silindi', 'Kategori Silindi', 1, '2021-04-25 18:59:22'),
(192, 'Çorbalar &amp; Salatalar isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-25 18:59:52'),
(193, 'Çorbalar  kategori silindi', 'Kategori Silindi', 1, '2021-04-25 18:59:59'),
(194, 'Çorbalar &amp; Salatalar isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-25 19:02:23'),
(195, 'Çorbalar  kategori silindi', 'Kategori Silindi', 1, '2021-04-25 19:02:30'),
(196, 'Çorbalar &amp; Salatalar isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-25 19:03:29'),
(197, 'Çorbalar  kategorisi silindi', 'Kategori Silindi', 1, '2021-04-25 19:03:35'),
(198, 'Çorbalar &amp; Salatalar isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-25 19:05:03'),
(199, 'Çorbalar  kategorisi silindi', 'Kategori Silindi', 1, '2021-04-25 19:05:12'),
(200, 'Çorbalar &amp; Salatalar isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-25 19:06:49'),
(201, 'Çorbalar  kategorisi silindi', 'Kategori Silindi', 1, '2021-04-25 19:06:57'),
(202, 'Çorbalar &amp; Salatalar isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-25 19:08:43'),
(203, 'Çorbalar  kategorisi silindi', 'Kategori Silindi', 1, '2021-04-25 19:08:58'),
(204, 'Çorbalar &amp; Salatalar isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-25 19:10:44'),
(205, 'Çorbalar &amp; Salatalar kategorisi silindi', 'Kategori Silindi', 1, '2021-04-25 19:12:58'),
(206, 'Çorbalar &amp; Salatalar isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-25 19:13:42'),
(207, 'Çorbalar &amp; Salatalar kategorisi silindi', 'Kategori Silindi', 1, '2021-04-25 19:13:48'),
(208, 'Ana Yemekler isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-25 19:26:31'),
(209, 'Çorbalar &amp; Salatalar isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-25 20:37:33'),
(210, 'Içecekler isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-25 20:38:05'),
(211, 'Içecekler kategorisi silindi', 'Kategori Silindi', 1, '2021-04-25 20:43:22'),
(212, 'Içecekler isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-25 20:45:03'),
(213, 'Çorbalar &amp; Salatalar kategorisi silindi', 'Kategori Silindi', 1, '2021-04-25 20:46:05'),
(214, 'Çorbalar &amp; Salatalar isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-25 20:46:19'),
(215, 'Çorbalar &amp; Salatalar kategorisi silindi', 'Kategori Silindi', 1, '2021-04-25 20:48:06'),
(216, 'Çorbalar &amp; Salatalar isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-04-25 20:48:16'),
(217, 'Çorbalar &amp; Salatalar isimli kategori güncellendi', 'Kategori Güncellendi', 1, '2021-04-25 22:28:45'),
(218, 'Tatlılar isimli kategori güncellendi', 'Kategori Güncellendi', 1, '2021-04-25 22:31:16'),
(219, 'Çorbalar &amp; Salatalar isimli kategori güncellendi', 'Kategori Güncellendi', 1, '2021-04-26 21:44:23'),
(220, 'furkan admin paneli üyesi başarıyla güncellendi', 'Admin Üyesi Güncellendi', 1, '2021-04-28 14:19:17'),
(221, 'Tatlılar isimli kategori güncellendi', 'Kategori Güncellendi', 1, '2021-04-28 15:39:39'),
(222, 'Çorbalar &amp; Salatalar isimli kategori güncellendi', 'Kategori Güncellendi', 1, '2021-04-28 15:39:52'),
(223, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-28 15:44:00'),
(224, 'Bakımda sayfası güncellendi', 'Bakımda sayfası Güncellendi', 1, '2021-04-28 15:49:21'),
(225, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-04-28 15:54:54'),
(226, 'Bizim hikayemiz bölümü başarıyla güncellendi', 'Anasayfa Güncellendi', 1, '2021-05-02 01:06:36'),
(227, 'Çorbalar &amp; Salatalar kategorisi silindi', 'Kategori Silindi', 1, '2021-05-02 02:51:59'),
(228, 'Çorbalar &amp; Salatalar isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-05-02 02:53:07'),
(229, 'Çorbalar &amp; Salatalar kategorisi silindi', 'Kategori Silindi', 1, '2021-05-02 02:54:40'),
(230, 'Çorbalar &amp; Salatalar isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-05-02 02:55:27'),
(231, 'Çorbalar &amp; Salatalar kategorisi silindi', 'Kategori Silindi', 1, '2021-05-02 02:55:48'),
(232, 'Çorbalar &amp; Salatalar isimli kategori eklendi', 'Kategori Eklendi', 1, '2021-05-02 02:56:10'),
(233, 'Kuzu Çevirme ürünü eklendi', 'Ürün Eklendi', 1, '2021-05-02 21:40:51'),
(234, 'Kuzu Çevirme ürünü başarıyla güncellendi', 'Ürün Güncellendi', 1, '2021-05-04 15:26:42'),
(235, 'Kuzu Çevirme ürünü başarıyla güncellendi', 'Ürün Güncellendi', 1, '2021-05-04 15:27:28'),
(236, 'Kuzu Çevirme ürünü silindi', 'Ürün Silindi', 1, '2021-05-04 15:44:32'),
(237, 'Supangle ürünü başarıyla güncellendi', 'Ürün Güncellendi', 1, '2021-05-04 15:56:33'),
(238, 'Akdeniz Salatası ürünü eklendi', 'Ürün Eklendi', 1, '2021-05-04 15:59:59'),
(239, 'Içecekler isimli kategori güncellendi', 'Kategori Güncellendi', 1, '2021-05-05 18:38:50'),
(240, 'Çorbalar &amp; Salatalar isimli kategori güncellendi', 'Kategori Güncellendi', 1, '2021-05-05 18:43:47'),
(241, 'Supangle ürünü başarıyla güncellendi', 'Ürün Güncellendi', 1, '2021-05-05 20:11:39'),
(242, 'Fotoğraf eklendi', 'Fotoğraf Eklendi', 1, '2021-05-05 20:31:07'),
(243, ' şef eklendi', 'Şef Eklendi', 1, '2021-05-06 10:51:36'),
(244, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-05-09 15:08:42'),
(245, 'Site ayarları güncellendi', 'Site Ayarları Güncellendi', 1, '2021-05-09 15:10:57'),
(246, 'Ana Yemekler isimli kategori güncellendi', 'Kategori Güncellendi', 1, '2021-05-11 21:00:30'),
(247, ' isimli şef başarıyla güncellendi', 'Şef Güncellendi', 1, '2021-05-11 21:28:03'),
(248, ' isimli şef başarıyla güncellendi', 'Şef Güncellendi', 1, '2021-05-11 21:29:26'),
(249, 'Barış KURT isimli şef başarıyla güncellendi', 'Şef Güncellendi', 1, '2021-05-11 21:30:25'),
(250, 'Furkan AYDIN şef eklendi', 'Şef Eklendi', 1, '2021-05-11 22:57:44'),
(251, 'Furkan AYDIN isimli şef silindi', 'Şef Silindi', 1, '2021-05-11 23:01:43'),
(252, 'Furkan AYDIN şef eklendi', 'Şef Eklendi', 1, '2021-05-11 23:16:08'),
(253, 'GameMaster0707 admin paneli üyesi başarıyla güncellendi', 'Admin Üyesi Güncellendi', 1, '2021-05-15 21:14:45'),
(254, '3 id li Yazar yetkisi silindi', 'Yetki Silindi', 1, '2021-05-15 21:14:58'),
(255, 'Yazar isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-05-15 21:16:48'),
(256, '3 id li Yazar yetkisi silindi', 'Yetki Silindi', 1, '2021-05-15 21:16:59'),
(257, 'Yazar isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-05-15 21:19:47'),
(258, '3 id li Yazar yetkisi silindi', 'Yetki Silindi', 1, '2021-05-15 21:21:53'),
(259, 'Yazar isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-05-15 21:32:43'),
(260, 'Editor isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-05-15 21:32:59'),
(261, 'furkan61 admin paneli üyesi başarıyla güncellendi', 'Admin Üyesi Güncellendi', 1, '2021-05-15 21:33:21'),
(262, 'furkan admin paneli üyesi başarıyla güncellendi', 'Admin Üyesi Güncellendi', 1, '2021-05-15 21:33:37'),
(263, 'GameMaster0707 admin paneli üyesi başarıyla güncellendi', 'Admin Üyesi Güncellendi', 1, '2021-05-15 21:33:50'),
(264, 'furkan07 admin paneli üyesi başarıyla güncellendi', 'Admin Üyesi Güncellendi', 1, '2021-05-15 21:34:07'),
(265, '3 id li Yazar yetkisi silindi', 'Yetki Silindi', 1, '2021-05-15 21:35:40'),
(266, 'Yazar isimli yetki eklendi', 'Yetki Eklendi', 1, '2021-05-15 21:38:26'),
(267, '3 id li Editor yetkisi silindi', 'Yetki Silindi', 1, '2021-05-15 21:39:14'),
(268, '3 id li Yazar yetkisi silindi', 'Yetki Silindi', 1, '2021-05-15 21:39:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `photo` varchar(2000) NOT NULL,
  `name_surname` varchar(2000) NOT NULL,
  `user_name` varchar(2000) NOT NULL,
  `password` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(2000) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `status` varchar(1) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `photo`, `name_surname`, `user_name`, `password`, `birthday`, `email`, `phone_number`, `gender`, `status`, `registration_date`) VALUES
(1, 'tas_erkan_photo_1607624176e5c3.jpg', 'Erkan TAŞ', 'tas_erkan', '202cb962ac59075b964b07152d234b70', '1999-05-23', 'erkant0665@gmail.com', '(538) 617-8224', '1', '1', '2021-04-14 02:07:03'),
(7, 'Mr_profile_photo.png', 'Barış KURT', 'GameMaster', 'e45a7d52f9248508c00bb5285dffc20e', '2021-04-01', 'kurt-bar07@hotmail.com', '(905) 324-9738', '1', '1', '2021-04-23 15:49:50'),
(8, 'Mr_profile_photo.png', 'Furkan AYDIN', 'furkan61', 'bb3fac028ad0efc67df8775e33c702e0', '2021-04-01', 'furkan0707@hotmail.com', '(131) 231-3123', '1', '1', '2021-04-23 16:03:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_authorization`
--

CREATE TABLE `user_authorization` (
  `authorization_id` int(11) NOT NULL,
  `name` varchar(2000) NOT NULL,
  `authorization_color` varchar(50) NOT NULL,
  `pages` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user_authorization`
--

INSERT INTO `user_authorization` (`authorization_id`, `name`, `authorization_color`, `pages`, `user_id`, `datetime`) VALUES
(1, 'Kurucu', 'info', 'settings,admin_authorization,admin_user_transactions,user_transactions,gallery_transactions,system_archives,category_transactions,our_story,product_transactions,chef_transactions', 1, '2021-04-07 12:44:53'),
(2, 'Site Yöneticisi', 'success', 'admin_authorization,system_archives,admin_user_transactions,user_transactions', 1, '2021-04-08 20:04:14');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`chef_id`);

--
-- Tablo için indeksler `coming_soon`
--
ALTER TABLE `coming_soon`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `homepage_settings`
--
ALTER TABLE `homepage_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `our_story`
--
ALTER TABLE `our_story`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `site_contact`
--
ALTER TABLE `site_contact`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `system_archives`
--
ALTER TABLE `system_archives`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user_authorization`
--
ALTER TABLE `user_authorization`
  ADD PRIMARY KEY (`authorization_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `chefs`
--
ALTER TABLE `chefs`
  MODIFY `chef_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `coming_soon`
--
ALTER TABLE `coming_soon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `homepage_settings`
--
ALTER TABLE `homepage_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `our_story`
--
ALTER TABLE `our_story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `site_contact`
--
ALTER TABLE `site_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `system_archives`
--
ALTER TABLE `system_archives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
