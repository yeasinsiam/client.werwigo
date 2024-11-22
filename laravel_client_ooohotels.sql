-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2024 at 01:55 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_client_ooohotels`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `name`, `email`, `mobile_number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'werwigo', 'Admin', 'accounts@werwigo.com', NULL, '2023-09-27 07:30:53', '$2y$10$EuKsZ0.XO46dNZ5nCg1cGuh8XHH7wWvuBJAGRhQa/CruQrQibAkyi', NULL, '2023-09-27 07:30:53', '2023-09-28 12:23:07'),
(2, 'ambassador', 'ambassador user', 'asdf@asdf.com', '24234234', NULL, '$2y$10$Wk6z/DvZ4vyMuzP8OpSB5urREvWkbyqhyRM1szIpfS5X6EFQefgUK', 'Qr92VIJv2SmbKEKcrHDEtN5hmNu40ih7lrYcml2bLKdXQH77Fyf3Jhvi87zk', '2023-09-27 11:38:49', '2023-09-27 11:38:49'),
(3, 'dimartinosono', 'Salvatore Dimartino', 'dimartino.slv@gmail.com', NULL, NULL, '$2y$10$c.y2Lvb7myO4NyWV8S/eduRN5FEGMbUuxblNTzOBP31wGU0ReMrFK', 'RTnPkFvDeKkHwswlmvmddOPLWKWa5u5A3QmqB7WM96KC8cdOoeXW9Bj7bIxg', '2023-09-30 09:04:35', '2023-09-30 09:05:27'),
(4, 'marikatraveltips', 'Marika', 'prova@example.com', NULL, NULL, '$2y$10$PZy6sXjafnl59VKzq/r6iOkr8sx5hYDerGO32X8AIZs/llawnQ31K', 'rAWoUDDurZWCVgR8A47C1h8bqbg0ZGg1wbBPMKsFKIW37gCmBi32qT2JJxq9', '2023-10-03 15:39:13', '2023-10-04 18:33:02'),
(5, 'giusepped41', 'Giuseppe Dimartino', 'g.dimartino41@yahoo.com', NULL, NULL, '$2y$10$M4rqJFLAc3GvZbl8QNDzTu/7EuMGbmiyaPwjQsP3xppjSCOJKKYI.', 'gfXRiFjsG7Hdn3kWA0KrF1OOFOQ10xvRWBaDDqKjbEEnRdwxYAK9S7rwVHml', '2023-10-09 10:45:28', '2023-10-09 10:45:28'),
(6, 'raya', 'touria dadssi', 'prova@provaaa.com', '3243242', NULL, '$2y$10$gwjBWb0lJNis/x/vPACpZeNZah2hl8NTYyVvv/fKKWOCl9ZbW/Zp.', '6WwuSxa1k9eU2NjOsOAP5rTPVT00h6RfMtT8QqoPYTNhlfghWxN2y19ln9xm', '2023-10-09 12:10:30', '2023-10-09 12:10:30'),
(7, 'Tore', 'Ahah sjshs', 'orova@exampleee.com', NULL, NULL, '$2y$10$FYuCETkPm/8UOQdS22LV6esHT94pVjroy/Jxuw.qa66sqmhlyQf/q', 'Tc4TJcA1sUASxiPhgQMefFMHA7MQlLEE8eFbujx8zTFAGolZLwQSTUTdAKVK', '2023-10-10 09:04:35', '2023-10-10 09:04:35'),
(8, 'Raya05', 'Raya90', 'dadssitouria3@gmail.com', '566545', NULL, '$2y$10$79Iw9AUg2pI7XWy6It9TqeqFMxOmyF7H0Qpxh3Q.iYzArZMULJ3Uu', 'Zp65X1KpNAmZgIOnzKoKLlGmnmiWOir8AYlUQ43K8BRZT3IyfYuXeaJOHXJL', '2023-10-10 19:34:15', '2023-10-10 19:34:15'),
(9, 'dimar92', 'Enrico Dimar', 'dimar@example.com', NULL, NULL, '$2y$10$P7x46cGMLHOp1ZvtjgutbuP2SQRP.8aIsyIM2qPpkhWWVRlMF2Npa', 'PwwzA6xyUMrtQTdCt8QWmAiaEkXxJ6CGvadZuoBaU72XwjDuUrhCYb41U47D', '2023-10-12 16:19:02', '2023-10-12 16:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `customer_favorite_hotels`
--

CREATE TABLE `customer_favorite_hotels` (
  `id` bigint UNSIGNED NOT NULL,
  `hotel_id` bigint UNSIGNED NOT NULL,
  `customer_user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_favorite_hotels`
--

INSERT INTO `customer_favorite_hotels` (`id`, `hotel_id`, `customer_user_id`, `created_at`, `updated_at`) VALUES
(12, 6, 1, '2023-10-02 10:39:48', '2023-10-02 10:39:48'),
(14, 8, 2, '2023-10-03 17:44:24', '2023-10-03 17:44:24'),
(15, 6, 2, '2023-10-04 13:03:38', '2023-10-04 13:03:38'),
(21, 5, 1, '2023-10-06 12:35:06', '2023-10-06 12:35:06'),
(25, 8, 3, '2023-10-13 06:40:48', '2023-10-13 06:40:48'),
(26, 12, 9, '2023-10-13 07:39:54', '2023-10-13 07:39:54'),
(27, 9, 9, '2023-10-13 07:39:59', '2023-10-13 07:39:59'),
(30, 13, 5, '2023-10-13 13:41:25', '2023-10-13 13:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `customer_users`
--

CREATE TABLE `customer_users` (
  `id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_users`
--

INSERT INTO `customer_users` (`id`, `full_name`, `mobile_number`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Salvatore Dimartino', NULL, 'dimartino.slv@gmail.com', NULL, '$2y$10$90jEGfrydwMkQnU77UUoHu9V6xUDj3XmZzqlASA8q6G13kHhYT6PG', 'S1m3ugzMNGWadXC3nTSb4rkCM7EktDHPIsC3CvIBWufBBXASIEtp9yUadCZf', '2023-09-28 09:33:41', '2023-09-28 09:33:41'),
(2, 'asdf', NULL, 'asdf@asdf.com', NULL, '$2y$10$UljL.TvZicagAyCbENQ3VexSq4CHGMs2Nmt3fh3SVxKOy3FtpKIUK', 'yXDbrWxtkGF8hIZQMNkfy9O9dk4DMyFskIp3tZkeLfAx6L3gQmdMtYMwVm11', '2023-09-28 09:37:33', '2023-09-28 09:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Aenean ac tellus augue. Donec sit amet urna ac nibh tristique tristique a ac dolor. Nam nec mollis tellus. Cras et.', 'Aenean ac tellus augue. Donec sit amet urna ac nibh tristique tristique a ac dolor. Nam nec mollis tellus. Cras et.Aenean ac tellus augue. Donec sit amet urna ac nibh tristique tristique a ac dolor. Nam nec mollis tellus. Cras et.', '2023-09-28 13:31:46', '2023-09-28 13:31:46'),
(2, 'Aenean ac tellus augue. Donec sit amet urna ac nibh tristique tristique a ac dolor. Namaa', 'Aenean ac tellus augue. Donec sit amet urna ac nibh tristique tristique a ac dolor. Nam nec mollis tellus. Cras et. Aenean ac tellus augue. Donec sit amet urna ac nibh tristique tristique a ac dolor. Nam nec mollis tellus. Cras et.Aenean ac tellus augue. Donec sit amet urna ac nibh tristique tristique a ac dolor. Nam nec mollis tellus. Cras et.Aenean ac tellus augue. Donec sit amet urna ac nibh tristique tristique a ac dolor. Nam nec mollis tellus. Cras et.', '2023-09-28 13:31:59', '2023-10-13 10:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint UNSIGNED NOT NULL,
  `headline` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` bigint NOT NULL DEFAULT '0',
  `admin_id` bigint UNSIGNED NOT NULL,
  `parent_hotel_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `headline`, `description`, `slug`, `view_count`, `admin_id`, `parent_hotel_id`, `created_at`, `updated_at`) VALUES
(4, 'Spa incastonata in una dimora con pietra tradizionale siciliana della seconda guerra mondiale.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque a tortor non rhoncus. Etiam pellentesque, quam vitae convallis tempus, sapien eros malesuada velit, in feugiat neque tellus et nisi. In orci est, iaculis laoreet egestas cursus, ornare at libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum in tellus eget nisl iaculis vestibulum nec in mi. Duis varius, est non porta viverra, orci dui gravida lacus, eu maximus quam ante eget tortor. Integer ac nunc quis risus mollis efficitur eu non risus. Sed interdum felis augue, at elementum eros egestas sed. Nulla sed arcu ligula. Aenean auctor metus sed tortor fringilla, eu condimentum risus consectetur. Morbi vel suscipit nunc.\r\n\r\nDonec nec mi eu enim rutrum efficitur. In ut metus non nisl pharetra porttitor. Donec eu aliquam eros. Nunc aliquet consequat fringilla. Aenean ac tellus augue. Donec sit amet urna ac nibh tristique tristique a ac dolor. Nam nec mollis tellus. Cras et dui ut massa tempus congue. Donec ac est convallis ante venenatis bibendum. In tincidunt vehicula justo nec molestie. Pellentesque lobortis convallis arcu mattis congue. Suspendisse pellentesque ante nec mauris mattis rutrum. Aenean imperdiet maximus nulla, nec laoreet massa molestie a. Nam tempus, tortor ac pulvinar interdum, nulla massa vehicula tortor, et ornare magna massa lobortis velit. Etiam malesuada lacus in sem ultricies dignissim.\r\n\r\nVivamus consequat mi vitae libero auctor, ac sodales risus cursus. Mauris tellus magna, vehicula eu tempus a, euismod eu lacus. Duis arcu enim, tempus nec ultricies eu, venenatis vitae massa. Nulla elit sapien, lacinia a placerat in, egestas vitae metus. Integer ac ultricies nibh. Donec ac facilisis augue. Maecenas aliquet vel nisi eu mattis. Ut volutpat mauris ut elementum fermentum. Suspendisse urna augue, scelerisque in blandit nec, fringilla in est. Vivamus tristique, turpis vel dignissim auctor, justo diam volutpat lacus, sit amet dapibus nisi mi eu erat. Morbi vel neque tempus, ullamcorper nulla sit amet, fermentum ligula. Donec consequat nibh tellus, et convallis tellus tempor in. Morbi vehicula, lorem non gravida tincidunt, augue tellus gravida arcu, in ullamcorper elit mi nec dui. Maecenas in arcu semper, tempus diam id, cursus nunc. Integer in ligula sodales, aliquam nulla ut, vestibulum tellus.', 'spa-incastonata-sicilia', 1, 1, 3, '2023-09-28 12:36:55', '2023-10-16 01:53:52'),
(5, 'Spa in una dimora privata ristrutturata con pietra tradizionale siciliana', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque a tortor non rhoncus. Etiam pellentesque, quam vitae convallis tempus, sapien eros malesuada velit, in feugiat neque tellus et nisi. In orci est, iaculis laoreet egestas cursus, ornare at libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum in tellus eget nisl iaculis vestibulum nec in mi. Duis varius, est non porta viverra, orci dui gravida lacus, eu maximus quam ante eget tortor. Integer ac nunc quis risus mollis efficitur eu non risus. Sed interdum felis augue, at elementum eros egestas sed. Nulla sed arcu ligula. Aenean auctor metus sed tortor fringilla, eu condimentum risus consectetur. Morbi vel suscipit nunc. Donec nec mi eu enim rutrum efficitur. In ut metus non nisl pharetra porttitor. Donec eu aliquam eros. Nunc aliquet consequat fringilla. Aenean ac tellus augue. Donec sit amet urna ac nibh tristique tristique a ac dolor. Nam nec mollis tellus. Cras et dui ut massa tempus congue. Donec ac est convallis ante venenatis bibendum. In tincidunt vehicula justo nec molestie. Pellentesque lobortis convallis arcu mattis congue. Suspendisse pellentesque ante nec mauris mattis rutrum. Aenean imperdiet maximus nulla, nec laoreet massa molestie a. Nam tempus, tortor ac pulvinar interdum, nulla massa vehicula tortor, et ornare magna massa lobortis velit. Etiam malesuada lacus in sem ultricies dignissim. Vivamus consequat mi vitae libero auctor, ac sodales risus cursus. Mauris tellus magna, vehicula eu tempus a, euismod eu lacus. Duis arcu enim, tempus nec ultricies eu, venenatis vitae massa. Nulla elit sapien, lacinia a placerat in, egestas vitae metus. Integer ac ultricies nibh. Donec ac facilisis augue. Maecenas aliquet vel nisi eu mattis. Ut volutpat mauris ut elementum fermentum. Suspendisse urna au\r\n\r\n\r\ngue, scelerisque in blandit nec, fringilla in est. Vivamus tristique, turpis vel dignissim auctor, justo diam volutpat lacus, sit amet dapibus nisi mi eu erat. Morbi vel neque tempus, ullamcorper nulla sit amet, fermentum ligula. Donec consequat nibh tellus, et convallis tellus tempor in. Morbi vehicula, lorem non gravida tincidunt, augue tellus gravida arcu, in ullamcorper elit mi nec dui. Maecenas in arcu semper, tempus diam id, cursus nunc. Integer in ligula sodales, aliquam nulla ut, vestibulum tellus.', 'spa-privata', 2, 3, 3, '2023-09-30 09:07:55', '2024-03-12 23:25:34'),
(6, 'Camera sul mare delle Maldive con piscina privata all\'interno di intime Suite.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque a tortor non rhoncus. Etiam pellentesque, quam vitae convallis tempus, sapien eros malesuada velit, in feugiat neque tellus et nisi. In orci est, iaculis laoreet egestas cursus, ornare at libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum in tellus eget nisl iaculis vestibulum nec in mi. Duis varius, est non porta viverra, orci dui gravida lacus, eu maximus quam ante eget tortor. Integer ac nunc quis risus mollis efficitur eu non risus. Sed interdum felis augue, at elementum eros egestas sed. Nulla sed arcu ligula. Aenean auctor metus sed tortor fringilla, eu condimentum risus consectetur. Morbi vel suscipit nunc.', 'camera-sul-mare-delle-maldive-con-piscina-privata-allinterno-di-intime-suite', 3, 1, 4, '2023-10-02 08:58:06', '2023-10-17 17:10:24'),
(8, 'Camera in un antico resort nel mezzo delle maldive con piscina privata', 'Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una cassetta di caratteri e li assemblò per preparare un testo campione. È sopravvissuto non solo a più di cinque secoli, ma anche al passaggio alla videoimpaginazione, pervenendoci sostanzialmente inalterato. Fu reso popolare, negli anni ’60, con la diffusione dei fogli di caratteri trasferibili “Letraset”, che contenevano passaggi del Lorem Ipsum, e più recentemente da software di impaginazione come Aldus PageMaker, che includeva versioni del Lorem Ipsum.', 'camera-borgo-citta', 24, 4, 5, '2023-10-03 15:40:48', '2023-10-23 10:50:03'),
(9, 'Hotel with rooftop spa & swimming pool', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis et magna sed dui condimentum faucibus et fringilla elit. Integer viverra leo vel purus dictum, in tristique est egestas. Nunc vulputate, turpis in eleifend ultricies, justo turpis fringilla lectus, at cursus libero orci sit amet nisi. Proin luctus tempus nibh eu ultrices. Maecenas blandit dui massa, mollis finibus ex suscipit sit amet. Suspendisse placerat faucibus mauris id tincidunt. Maecenas pulvinar maximus quam, ac accumsan velit sagittis sit amet. Mauris a dolor auctor, convallis dolor sit amet, elementum enim. Integer in efficitur diam, id tristique urna. Etiam blandit sollicitudin pulvinar. Vivamus fringilla dolor felis, vitae tincidunt nulla sagittis at. Nulla cursus volutpat ultrices. Ut viverra euismod faucibus. Ut in lorem ex.', 'hotel-roma', 1, 3, 6, '2023-10-10 09:36:21', '2023-10-16 01:53:52'),
(12, 'Fantastic suite sea view adapt for couples', 'Lorensimput make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing softw', 'Suite-Siracusa-mare', 6, 3, 9, '2023-10-11 08:54:49', '2023-10-16 17:02:30'),
(13, 'Fantastic suite with swimming pool sea for couples in the middle of the sea', 'Al contrario di quanto si pensi, Lorem Ipsum non è semplicemente una sequenza casuale di caratteri. Risale ad un classico della letteratura latina del 45 AC, cosa che lo rende vecchio di 2000 anni. Richard McClintock, professore di latino al Hampden-Sydney College in Virginia, ha ricercato una delle più oscure parole latine, consectetur, da un passaggio del Lorem Ipsum e ha scoperto tra i vari testi in cui è citata, la fonte da cui è tratto il testo, le sezioni 1.10.32 and 1.10.33 del \"de Finibus Bonorum et Malorum\" di Cicerone. Questo testo è un trattato su teorie di etica, molto popolare nel Rinascimento. La prima riga del Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", è tratta da un passaggio della sezione 1.10.32.', 'piscina-taormina', 17, 9, 10, '2023-10-12 16:22:00', '2023-10-17 18:49:55'),
(14, 'Hotel with SPA underground in one old cave of 1829', 'Hotel with SPA underground in one old cave of 1829', 'unahotels-sr', 103, 5, 11, '2023-10-13 11:36:33', '2024-11-20 11:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_categories`
--

CREATE TABLE `hotel_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_categories`
--

INSERT INTO `hotel_categories` (`id`, `title`, `slug`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Love Escape', 'love-escape', 1, '2023-09-27 11:36:38', '2023-09-28 08:32:23'),
(2, 'Winter Wispers', 'winter-wispers', 2, '2023-09-28 08:32:42', '2023-09-28 08:32:42'),
(3, 'Chill Time', 'chill-time', 3, '2023-09-28 08:33:51', '2023-09-28 08:33:51'),
(4, 'Into the Wild', 'into-the-wild', 4, '2023-09-28 08:38:33', '2023-09-28 08:38:33'),
(5, 'Bali Vibes', 'bali-vibes', 5, '2023-09-28 08:39:01', '2023-09-28 08:39:01'),
(6, 'Mikonos Moments', 'mikonos-moments', 6, '2023-09-28 08:39:19', '2023-09-28 08:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_category`
--

CREATE TABLE `hotel_category` (
  `id` bigint UNSIGNED NOT NULL,
  `hotel_id` bigint UNSIGNED NOT NULL,
  `hotel_category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_category`
--

INSERT INTO `hotel_category` (`id`, `hotel_id`, `hotel_category_id`, `created_at`, `updated_at`) VALUES
(4, 4, 1, NULL, NULL),
(5, 5, 3, NULL, NULL),
(6, 6, 1, NULL, NULL),
(9, 8, 3, NULL, NULL),
(10, 8, 1, NULL, NULL),
(11, 9, 2, NULL, NULL),
(15, 12, 1, NULL, NULL),
(16, 13, 3, NULL, NULL),
(17, 13, 1, NULL, NULL),
(18, 14, 3, NULL, NULL),
(19, 14, 2, NULL, NULL),
(20, 14, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_opinions`
--

CREATE TABLE `hotel_opinions` (
  `id` bigint UNSIGNED NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_hotel_id` bigint UNSIGNED NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_opinions`
--

INSERT INTO `hotel_opinions` (`id`, `comment`, `parent_hotel_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(5, 'Donec nec mi eu enim rutrum efficitur. In ut metus non nisl pharetra porttitor. Donec eu aliquam eros. Nunc aliquet consequat fringilla. Aenean ac tellus augue. Donec sit amet urna ac nibh tristique tristique a ac dolor. Nam nec mollis tellus. Cras et.\r\nAenean ac tellus augue. Donec sit amet urna ac nibh tristique tristique a ac dolor. Nam nec mollis tellus. Cras et.', 3, 1, '2023-09-28 12:36:55', '2023-09-28 12:36:55'),
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque a tortor non rhoncus. Etiam pellentesque, quam vitae convallis tempus, sapien eros malesuada velit, in feugiat neque tellus et nisi. In orci est, iaculis laoreet egestas cursus, ornare at libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum in tellus eget nisl iaculis vestibulum nec in mi. Duis varius, est non porta viverra, orci dui gravida lacus, eu maximus quam ante eget tortor. Integer ac nunc quis risus mollis efficitur eu non risus. Sed interdum felis augue, at elementum eros egestas sed. Nulla sed arcu ligula. Aenean auctor metus sed tortor fringilla, eu condimentum risus consectetur. Morbi vel suscipit nunc. Donec nec mi eu enim rutrum efficitur. In ut metus non nisl pharetra porttitor. Donec eu aliquam eros. Nunc aliquet consequat fringilla. Aenean ac tellus augue. Donec sit amet urna ac nibh tristique tristique a ac dolor. Nam nec mollis tellus. Cras et dui ut massa tempus congue. Donec ac est convallis ante venenatis bibendum. In tincidunt vehicula justo nec molestie. Pellentesque lobortis convallis arcu mattis congue. Suspendisse pellentesque ante nec mauris mattis rutrum. Aenean imperdiet maximus nulla, nec laoreet massa molestie a. Nam tempus, tortor ac pulvinar interdum, nulla massa vehicula tortor, et ornare magna massa lobortis velit. Etiam malesuada lacus in sem ultricies dignissim. Vivamus consequat mi vitae libero auctor, ac sodales risus cursus. Mauris tellus magna, vehicula eu tempus a, euismod eu lacus. Duis arcu enim, tempus nec ultricies eu, venenatis vitae massa. Nulla elit sapien, lacinia a placerat in, egestas vitae metus. Integer ac ultricies nibh. Donec ac facilisis augue. Maecenas aliquet vel nisi eu mattis. Ut volutpat mauris ut elementum fermentum. Suspendisse urna augue, scelerisque in blandit nec, fringilla in est. Vivamus tristique, turpis vel dignissim auctor, justo diam volutpat lacus, sit amet dapibus nisi mi eu erat. Morbi vel neque tempus, ullamcorper nulla sit amet, fermentum ligula. Donec consequat nibh tellus, et convallis tellus tempor in. Morbi vehicula, lorem non gravida tincidunt, augue tellus gravida arcu, in ullamcorper elit mi nec dui. Maecenas in arcu semper, tempus diam id, cursus nunc. Integer in ligula sodales, aliquam nulla ut, vestibulum tellus.', 3, 3, '2023-09-30 09:07:55', '2023-09-30 09:07:55'),
(7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque a tortor non rhoncus. Etiam pellentesque, quam vitae convallis tempus, sapien eros malesuada velit, in feugiat neque tellus et nisi. In orci est, iaculis laoreet egestas cu', 4, 1, '2023-10-02 08:58:06', '2023-10-02 08:58:06'),
(8, 'Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una cassetta di caratteri e li assemblò per preparare un testo campione. È sopravvissuto non solo a più di cinque secoli, ma anche al passaggio alla videoimpaginazione, pervenendoci sostanzialmente inalterato. Fu reso popolare, negli anni ’60, con la diffusione dei fogli di caratteri trasferibili “Letraset”, che contenevano passaggi del Lorem Ipsum, e più recentemente da software di impaginazione come Aldus PageMaker, che includeva versioni del Lorem Ipsum.', 5, 1, '2023-10-03 15:34:26', '2023-10-03 15:34:26'),
(9, 'Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una cassetta di caratteri e li assemblò per preparare un testo campione. È sopravvissuto non solo a più di cinque secoli, ma anche al passaggio alla videoimpaginazione, pervenendoci sostanzialmente inalterato. Fu reso popolare, negli anni ’60, con la diffusione dei fogli di caratteri trasferibili “Letraset”, che contenevano passaggi del Lorem Ipsum, e più recentemente da software di impaginazione come Aldus PageMaker, che includeva versioni del Lorem Ipsum.', 5, 4, '2023-10-03 15:40:48', '2023-10-03 15:40:48'),
(10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis et magna sed dui condimentum faucibus et fringilla elit. Integer viverra leo vel pmet nisi. Proin luctus tempus nibh eu ultrices. Maecenas blandit dui massa, mollis finibus ex suscipit sit amet. Suspendisse placerat faucibus mauris id tincidunt. Maecenas pulvinar maximus quam, ac accumsan velit sagittis sit amet. Mauris a dolor auctor, convallis dolor sit amet, elementum enim. Integer in efficitur diam, id tristique urna. Etiam blandit sollicitudin pulvinar. Vivamus fringilla dolor felis, vitae tincidunt nulla sagittis at. Nulla cursus volutpat. Ut viverra euismod faucibus. Ut in lorem ex.', 6, 3, '2023-10-10 09:36:21', '2023-10-10 09:36:21'),
(13, 'typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing softw', 9, 3, '2023-10-11 08:54:49', '2023-10-11 08:54:49'),
(14, 'Al contrario di quanto si pensi, Lorem Ipsum non è semplicemente una sequenza casuale di caratteri. Risale ad un classico della letteratura latina del 45 AC, cosa che lo rende vecchio di 2000 anni. Richard McClintock, professore di latino al Hampden-Sydney College', 10, 9, '2023-10-12 16:22:00', '2023-10-12 16:22:00'),
(15, 'inserire un massimo di caratteri per esprime la propria opinione', 11, 5, '2023-10-13 11:36:33', '2023-10-13 11:36:33'),
(16, 'sdfg', 11, 1, '2024-03-05 00:12:41', '2024-03-05 00:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_ratings`
--

CREATE TABLE `hotel_ratings` (
  `id` bigint UNSIGNED NOT NULL,
  `type` enum('romantic','intimate','luxury') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double(10,1) NOT NULL DEFAULT '0.0',
  `parent_hotel_id` bigint UNSIGNED NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_ratings`
--

INSERT INTO `hotel_ratings` (`id`, `type`, `rate`, `parent_hotel_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(13, 'luxury', 5.0, 3, 1, '2023-09-28 12:36:55', '2023-09-28 12:36:55'),
(14, 'intimate', 4.0, 3, 1, '2023-09-28 12:36:55', '2023-09-28 12:36:55'),
(15, 'romantic', 3.0, 3, 1, '2023-09-28 12:36:55', '2023-09-28 12:36:55'),
(16, 'luxury', 5.0, 3, 3, '2023-09-30 09:07:55', '2023-09-30 09:07:55'),
(17, 'intimate', 8.0, 3, 3, '2023-09-30 09:07:55', '2023-09-30 09:07:55'),
(18, 'romantic', 5.0, 3, 3, '2023-09-30 09:07:55', '2023-09-30 09:07:55'),
(19, 'luxury', 3.0, 4, 1, '2023-10-02 08:58:06', '2023-10-02 08:58:06'),
(20, 'intimate', 3.0, 4, 1, '2023-10-02 08:58:06', '2023-10-02 08:58:06'),
(21, 'romantic', 4.0, 4, 1, '2023-10-02 08:58:06', '2023-10-02 08:58:06'),
(22, 'luxury', 5.0, 5, 1, '2023-10-03 15:34:26', '2023-10-03 15:34:26'),
(23, 'intimate', 7.0, 5, 1, '2023-10-03 15:34:26', '2023-10-03 15:34:26'),
(24, 'romantic', 8.0, 5, 1, '2023-10-03 15:34:26', '2023-10-03 15:34:26'),
(25, 'luxury', 9.0, 5, 4, '2023-10-03 15:40:48', '2023-10-03 15:40:48'),
(26, 'intimate', 4.0, 5, 4, '2023-10-03 15:40:48', '2023-10-03 15:40:48'),
(27, 'romantic', 8.0, 5, 4, '2023-10-03 15:40:48', '2023-10-03 15:40:48'),
(28, 'luxury', 6.0, 6, 3, '2023-10-10 09:36:21', '2023-10-10 09:36:21'),
(29, 'intimate', 4.0, 6, 3, '2023-10-10 09:36:21', '2023-10-10 09:36:21'),
(30, 'romantic', 8.0, 6, 3, '2023-10-10 09:36:21', '2023-10-10 09:36:21'),
(37, 'luxury', 9.0, 9, 3, '2023-10-11 08:54:49', '2023-10-11 08:54:49'),
(38, 'intimate', 8.0, 9, 3, '2023-10-11 08:54:49', '2023-10-11 08:54:49'),
(39, 'romantic', 7.0, 9, 3, '2023-10-11 08:54:49', '2023-10-11 08:54:49'),
(40, 'luxury', 6.0, 10, 9, '2023-10-12 16:22:00', '2023-10-12 16:22:00'),
(41, 'intimate', 5.0, 10, 9, '2023-10-12 16:22:00', '2023-10-12 16:22:00'),
(42, 'romantic', 4.0, 10, 9, '2023-10-12 16:22:00', '2023-10-12 16:22:00'),
(43, 'luxury', 2.0, 11, 5, '2023-10-13 11:36:33', '2023-10-13 11:36:33'),
(44, 'intimate', 10.0, 11, 5, '2023-10-13 11:36:33', '2023-10-13 11:36:33'),
(45, 'romantic', 5.0, 11, 5, '2023-10-13 11:36:33', '2023-10-13 11:36:33'),
(46, 'luxury', 3.0, 11, 1, '2024-03-05 00:12:41', '2024-03-05 00:12:41'),
(47, 'intimate', 3.0, 11, 1, '2024-03-05 00:12:41', '2024-03-05 00:12:41'),
(48, 'romantic', 3.0, 11, 1, '2024-03-05 00:12:41', '2024-03-05 00:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_service`
--

CREATE TABLE `hotel_service` (
  `id` bigint UNSIGNED NOT NULL,
  `hotel_id` bigint UNSIGNED NOT NULL,
  `hotel_service_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_service`
--

INSERT INTO `hotel_service` (`id`, `hotel_id`, `hotel_service_id`, `created_at`, `updated_at`) VALUES
(9, 4, 1, NULL, NULL),
(10, 4, 2, NULL, NULL),
(11, 4, 3, NULL, NULL),
(12, 5, 1, NULL, NULL),
(13, 5, 2, NULL, NULL),
(14, 5, 3, NULL, NULL),
(15, 6, 1, NULL, NULL),
(17, 8, 2, NULL, NULL),
(18, 8, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_services`
--

CREATE TABLE `hotel_services` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_services`
--

INSERT INTO `hotel_services` (`id`, `title`, `icon_class`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Air Condition', 'far fa-air-conditioner', 'air-condition', '2023-09-27 07:30:53', '2023-09-27 07:30:53'),
(2, 'WIFI', 'far fa-wifi', 'wifi', '2023-09-27 07:30:53', '2023-09-27 07:30:53'),
(3, 'Breakfast', 'far fa-utensils', 'breakfast', '2023-09-27 07:30:53', '2023-09-27 07:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_tag`
--

CREATE TABLE `hotel_tag` (
  `id` bigint UNSIGNED NOT NULL,
  `hotel_id` bigint UNSIGNED NOT NULL,
  `hotel_tag_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_tag`
--

INSERT INTO `hotel_tag` (`id`, `hotel_id`, `hotel_tag_id`, `created_at`, `updated_at`) VALUES
(9, 4, 1, NULL, NULL),
(10, 4, 2, NULL, NULL),
(11, 4, 3, NULL, NULL),
(12, 5, 1, NULL, NULL),
(13, 5, 2, NULL, NULL),
(21, 8, 1, NULL, NULL),
(22, 8, 3, NULL, NULL),
(24, 5, 5, NULL, NULL),
(25, 6, 5, NULL, NULL),
(26, 6, 6, NULL, NULL),
(27, 9, 2, NULL, NULL),
(28, 9, 7, NULL, NULL),
(29, 9, 8, NULL, NULL),
(30, 9, 10, NULL, NULL),
(31, 9, 11, NULL, NULL),
(35, 12, 1, NULL, NULL),
(36, 12, 6, NULL, NULL),
(37, 12, 13, NULL, NULL),
(38, 12, 14, NULL, NULL),
(39, 13, 3, NULL, NULL),
(40, 13, 5, NULL, NULL),
(41, 13, 6, NULL, NULL),
(42, 13, 11, NULL, NULL),
(43, 13, 13, NULL, NULL),
(44, 13, 15, NULL, NULL),
(45, 13, 16, NULL, NULL),
(46, 12, 17, NULL, NULL),
(47, 14, 2, NULL, NULL),
(48, 14, 5, NULL, NULL),
(49, 14, 13, NULL, NULL),
(50, 14, 16, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_tags`
--

CREATE TABLE `hotel_tags` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_tags`
--

INSERT INTO `hotel_tags` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Couple Friendly', 'couple-friendly', '2023-09-27 07:30:53', '2023-09-27 07:30:53'),
(2, 'Couple Breakfast', 'couple-breakfast', '2023-09-27 07:30:53', '2023-09-27 07:30:53'),
(3, 'Couple Candle Light Dinner', 'couple-candle-light-dinner', '2023-09-27 07:30:53', '2023-09-27 07:30:53'),
(5, 'romantic welcome', 'romantic-welcome', '2023-10-09 09:29:26', '2023-10-09 09:29:26'),
(6, 'Room sea view', 'room-sea-view', '2023-10-09 09:38:20', '2023-10-09 09:38:20'),
(7, 'Wifi fast', 'wifi-fast', '2023-10-09 10:40:46', '2023-10-09 10:40:46'),
(8, 'Air conditioner', 'air-conditioner', '2023-10-09 10:40:54', '2023-10-09 10:40:54'),
(10, 'rooftop', 'rooftop', '2023-10-10 09:36:21', '2023-10-10 09:36:21'),
(11, 'Private SPA', 'private-spa', '2023-10-10 09:36:21', '2023-10-10 09:36:21'),
(13, 'Suite', 'suite', '2023-10-11 08:54:49', '2023-10-11 08:54:49'),
(14, 'spa suite', 'spa-suite', '2023-10-11 08:54:49', '2023-10-11 08:54:49'),
(15, 'taormina', 'taormina', '2023-10-12 16:22:00', '2023-10-12 16:22:00'),
(16, 'summer vibes', 'summer-vibes', '2023-10-12 16:22:00', '2023-10-12 16:22:00'),
(17, 'Floating Breakfast', 'floating-breakfast', '2023-10-13 08:40:19', '2023-10-13 08:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
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
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(11, 'App\\Models\\Admin', 1, 'afd5a279-94dd-4a6a-abaf-cfaa2a88be1a', 'avatar', 'Google play 2', 'Google-play-2.png', 'image/png', 'media', 'media', 8210, '[]', '[]', '[]', '[]', 2, '2023-09-28 12:23:07', '2023-09-28 12:23:07'),
(15, 'App\\Models\\Admin', 3, '56e1f9d2-dbe2-4bf9-a353-4f3d805d674f', 'avatar', '12054DF8-8E2E-4EB2-A699-F9AB626B2198', '12054DF8-8E2E-4EB2-A699-F9AB626B2198.jpeg', 'image/jpeg', 'media', 'media', 206702, '[]', '[]', '[]', '[]', 2, '2023-09-30 09:05:27', '2023-09-30 09:05:27'),
(17, 'App\\Models\\Hotel', 5, '56bf6739-cfbd-4d8c-bf67-c688fd2390bf', 'gallery', 'AorPhatthawut_Rights-approved_hotel_UGC', 'AorPhatthawut_Rights-approved_hotel_UGC.jpg', 'image/jpeg', 'media', 'media', 474884, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_1200_772.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_1003_645.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_839_540.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_702_452.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_587_378.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_491_316.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_411_264.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_344_221.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_288_185.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_241_155.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_201_129.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMTIwMCA3NzIiPgoJPGltYWdlIHdpZHRoPSIxMjAwIiBoZWlnaHQ9Ijc3MiIgeGxpbms6aHJlZj0iZGF0YTppbWFnZS9qcGVnO2Jhc2U2NCwvOWovNEFBUVNrWkpSZ0FCQVFFQVlBQmdBQUQvL2dBN1ExSkZRVlJQVWpvZ1oyUXRhbkJsWnlCMk1TNHdJQ2gxYzJsdVp5QkpTa2NnU2xCRlJ5QjJOaklwTENCeGRXRnNhWFI1SUQwZ09UQUsvOXNBUXdBREFnSURBZ0lEQXdNREJBTURCQVVJQlFVRUJBVUtCd2NHQ0F3S0RBd0xDZ3NMRFE0U0VBME9FUTRMQ3hBV0VCRVRGQlVWRlF3UEZ4Z1dGQmdTRkJVVS85c0FRd0VEQkFRRkJBVUpCUVVKRkEwTERSUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVLzhBQUVRZ0FGUUFnQXdFaUFBSVJBUU1SQWYvRUFCOEFBQUVGQVFFQkFRRUJBQUFBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUUFBSUJBd01DQkFNRkJRUUVBQUFCZlFFQ0F3QUVFUVVTSVRGQkJoTlJZUWNpY1JReWdaR2hDQ05Dc2NFVlV0SHdKRE5pY29JSkNoWVhHQmthSlNZbktDa3FORFUyTnpnNU9rTkVSVVpIU0VsS1UxUlZWbGRZV1ZwalpHVm1aMmhwYW5OMGRYWjNlSGw2ZzRTRmhvZUlpWXFTazVTVmxwZVltWnFpbzZTbHBxZW9xYXF5czdTMXRyZTR1YnJDdzhURnhzZkl5Y3JTMDlUVjF0ZlkyZHJoNHVQazVlYm42T25xOGZMejlQWDI5L2o1K3YvRUFCOEJBQU1CQVFFQkFRRUJBUUVBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUkFBSUJBZ1FFQXdRSEJRUUVBQUVDZHdBQkFnTVJCQVVoTVFZU1FWRUhZWEVUSWpLQkNCUkNrYUd4d1Frak0xTHdGV0p5MFFvV0pEVGhKZkVYR0JrYUppY29LU28xTmpjNE9UcERSRVZHUjBoSlNsTlVWVlpYV0ZsYVkyUmxabWRvYVdwemRIVjJkM2g1ZW9LRGhJV0doNGlKaXBLVGxKV1dsNWlabXFLanBLV21wNmlwcXJLenRMVzJ0N2k1dXNMRHhNWEd4OGpKeXRMVDFOWFcxOWpaMnVMajVPWG01K2pwNnZMejlQWDI5L2o1K3YvYUFBd0RBUUFDRVFNUkFEOEE5ZThaZUp0SjhMNmEwOWxKNXMrT0FLODIwejlvTHhKTGNlVkRidVl3ZXVPMVhMaUMxbWtDM0RBK3hyTXQ5UnNkTDFaNHhHcEdPQUJYcFltRmZtaTY5YTNrajR5aGFzcGV3aGV4MnNQeE8xclZidTNiemhHd3hsVFVueFg4UjZyZitGV2plVU1wSElCcno0WEVXcFh4bWhMUlliN29ycXB2QzJxK0pOTU1NSWNJUjk5K2xUaWJ4amRUVmoxOEJLTTJsS0R1amovRmNMUjZuRnNrWmZwWE1tZVNEV0M1WXVjZnhVVVVzUWxPZDVIajRTck9GUGxpN0k5ditCZmcydzhSK2ZkM2FsbVhrTDJyMGpWYnJ5STN0SVkxaGpRNEcwVVVWOE5tbFdjWXVLZWgrbjVYVGhKcVRXdWgvOWs9Ij4KCTwvaW1hZ2U+Cjwvc3ZnPg==\"}}', 2, '2023-09-30 09:07:58', '2023-09-30 09:08:00'),
(18, 'App\\Models\\Hotel', 4, '262d425c-ddae-4517-a556-899ea7f7a849', 'thumbnail', 'maldive', 'maldive.jpg', 'image/jpeg', 'media', 'media', 32189, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"maldive___media_library_original_312_243.jpg\",\"maldive___media_library_original_261_203.jpg\",\"maldive___media_library_original_218_170.jpg\",\"maldive___media_library_original_182_142.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMzEyIDI0MyI+Cgk8aW1hZ2Ugd2lkdGg9IjMxMiIgaGVpZ2h0PSIyNDMiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQTdRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQnhkV0ZzYVhSNUlEMGdPVEFLLzlzQVF3QURBZ0lEQWdJREF3TURCQU1EQkFVSUJRVUVCQVVLQndjR0NBd0tEQXdMQ2dzTERRNFNFQTBPRVE0TEN4QVdFQkVURkJVVkZRd1BGeGdXRkJnU0ZCVVUvOXNBUXdFREJBUUZCQVVKQlFVSkZBMExEUlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVS84QUFFUWdBR1FBZ0F3RWlBQUlSQVFNUkFmL0VBQjhBQUFFRkFRRUJBUUVCQUFBQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVFBQUlCQXdNQ0JBTUZCUVFFQUFBQmZRRUNBd0FFRVFVU0lURkJCaE5SWVFjaWNSUXlnWkdoQ0NOQ3NjRVZVdEh3SkROaWNvSUpDaFlYR0JrYUpTWW5LQ2txTkRVMk56ZzVPa05FUlVaSFNFbEtVMVJWVmxkWVdWcGpaR1ZtWjJocGFuTjBkWFozZUhsNmc0U0Zob2VJaVlxU2s1U1ZscGVZbVpxaW82U2xwcWVvcWFxeXM3UzF0cmU0dWJyQ3c4VEZ4c2ZJeWNyUzA5VFYxdGZZMmRyaDR1UGs1ZWJuNk9ucThmTHo5UFgyOS9qNSt2L0VBQjhCQUFNQkFRRUJBUUVCQVFFQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVJBQUlCQWdRRUF3UUhCUVFFQUFFQ2R3QUJBZ01SQkFVaE1RWVNRVkVIWVhFVElqS0JDQlJDa2FHeHdRa2pNMUx3RldKeTBRb1dKRFRoSmZFWEdCa2FKaWNvS1NvMU5qYzRPVHBEUkVWR1IwaEpTbE5VVlZaWFdGbGFZMlJsWm1kb2FXcHpkSFYyZDNoNWVvS0RoSVdHaDRpSmlwS1RsSldXbDVpWm1xS2pwS1dtcDZpcHFyS3p0TFcydDdpNXVzTER4TVhHeDhqSnl0TFQxTlhXMTlqWjJ1TGo1T1htNStqcDZ2THo5UFgyOS9qNSt2L2FBQXdEQVFBQ0VRTVJBRDhBK3IvaWo4VzdId2Jwd2RtQkxjQVpySzhNK0pGOFg2VkhlS1FpdU00TmVVL0Y3d0RxUGpiVWxoamRsZ2dPZnJXZExxdXArQmRHdDRVSlNPTWJTYTRaWWoyYzd2WTlpR0M5dlRVWTducitwU1IyMGpLWEJybkxqWG80WEtrOGV0ZVgyZnhOVzR1TTNWNHVXT05wTmRmTG9OenJGaWwzWnY1cU1NOFY3T0Z4ZEdycHpIeCtaNWJpcUZyVTczTzc4YmVPZE44T0F2UGlMZDFKcjUyK0xIeFYwL1dyVVJXczZsUWNFS2E2Nzlwci9qeFg2VjhpM25mNjE4ek44NnN6OUZwSlUycFIzUFJkRDhNemVKdFZoZUYyOHZJSk9hK3NQQUhtYUpwc1ZzNDNLcTQ1cjU3K0MvOEF5ei9Ddm8vUy91TDlLeW8yaG9qZkZTZFJlOGYvMlE9PSI+Cgk8L2ltYWdlPgo8L3N2Zz4=\"}}', 3, '2023-10-02 08:51:44', '2023-10-02 08:51:45'),
(19, 'App\\Models\\Hotel', 4, 'b91a18d7-08d9-452c-a82f-8eee8629b127', 'gallery', 'maldive', 'maldive.jpg', 'image/jpeg', 'media', 'media', 32189, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"maldive___media_library_original_312_243.jpg\",\"maldive___media_library_original_261_203.jpg\",\"maldive___media_library_original_218_170.jpg\",\"maldive___media_library_original_182_142.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMzEyIDI0MyI+Cgk8aW1hZ2Ugd2lkdGg9IjMxMiIgaGVpZ2h0PSIyNDMiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQTdRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQnhkV0ZzYVhSNUlEMGdPVEFLLzlzQVF3QURBZ0lEQWdJREF3TURCQU1EQkFVSUJRVUVCQVVLQndjR0NBd0tEQXdMQ2dzTERRNFNFQTBPRVE0TEN4QVdFQkVURkJVVkZRd1BGeGdXRkJnU0ZCVVUvOXNBUXdFREJBUUZCQVVKQlFVSkZBMExEUlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVS84QUFFUWdBR1FBZ0F3RWlBQUlSQVFNUkFmL0VBQjhBQUFFRkFRRUJBUUVCQUFBQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVFBQUlCQXdNQ0JBTUZCUVFFQUFBQmZRRUNBd0FFRVFVU0lURkJCaE5SWVFjaWNSUXlnWkdoQ0NOQ3NjRVZVdEh3SkROaWNvSUpDaFlYR0JrYUpTWW5LQ2txTkRVMk56ZzVPa05FUlVaSFNFbEtVMVJWVmxkWVdWcGpaR1ZtWjJocGFuTjBkWFozZUhsNmc0U0Zob2VJaVlxU2s1U1ZscGVZbVpxaW82U2xwcWVvcWFxeXM3UzF0cmU0dWJyQ3c4VEZ4c2ZJeWNyUzA5VFYxdGZZMmRyaDR1UGs1ZWJuNk9ucThmTHo5UFgyOS9qNSt2L0VBQjhCQUFNQkFRRUJBUUVCQVFFQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVJBQUlCQWdRRUF3UUhCUVFFQUFFQ2R3QUJBZ01SQkFVaE1RWVNRVkVIWVhFVElqS0JDQlJDa2FHeHdRa2pNMUx3RldKeTBRb1dKRFRoSmZFWEdCa2FKaWNvS1NvMU5qYzRPVHBEUkVWR1IwaEpTbE5VVlZaWFdGbGFZMlJsWm1kb2FXcHpkSFYyZDNoNWVvS0RoSVdHaDRpSmlwS1RsSldXbDVpWm1xS2pwS1dtcDZpcHFyS3p0TFcydDdpNXVzTER4TVhHeDhqSnl0TFQxTlhXMTlqWjJ1TGo1T1htNStqcDZ2THo5UFgyOS9qNSt2L2FBQXdEQVFBQ0VRTVJBRDhBK3IvaWo4VzdId2Jwd2RtQkxjQVpySzhNK0pGOFg2VkhlS1FpdU00TmVVL0Y3d0RxUGpiVWxoamRsZ2dPZnJXZExxdXArQmRHdDRVSlNPTWJTYTRaWWoyYzd2WTlpR0M5dlRVWTducitwU1IyMGpLWEJybkxqWG80WEtrOGV0ZVgyZnhOVzR1TTNWNHVXT05wTmRmTG9OenJGaWwzWnY1cU1NOFY3T0Z4ZEdycHpIeCtaNWJpcUZyVTczTzc4YmVPZE44T0F2UGlMZDFKcjUyK0xIeFYwL1dyVVJXczZsUWNFS2E2Nzlwci9qeFg2VjhpM25mNjE4ek44NnN6OUZwSlUycFIzUFJkRDhNemVKdFZoZUYyOHZJSk9hK3NQQUhtYUpwc1ZzNDNLcTQ1cjU3K0MvOEF5ei9Ddm8vUy91TDlLeW8yaG9qZkZTZFJlOGYvMlE9PSI+Cgk8L2ltYWdlPgo8L3N2Zz4=\"}}', 4, '2023-10-02 08:51:45', '2023-10-02 08:51:45'),
(20, 'App\\Models\\Hotel', 6, 'cc5d4592-ffe0-4a39-8c4f-ba52a9255019', 'thumbnail', 'maldive copy', 'maldive-copy.jpg', 'image/jpeg', 'media', 'media', 39594, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"maldive-copy___media_library_original_319_231.jpg\",\"maldive-copy___media_library_original_266_193.jpg\",\"maldive-copy___media_library_original_223_161.jpg\",\"maldive-copy___media_library_original_186_135.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMzE5IDIzMSI+Cgk8aW1hZ2Ugd2lkdGg9IjMxOSIgaGVpZ2h0PSIyMzEiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQTdRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQnhkV0ZzYVhSNUlEMGdPVEFLLzlzQVF3QURBZ0lEQWdJREF3TURCQU1EQkFVSUJRVUVCQVVLQndjR0NBd0tEQXdMQ2dzTERRNFNFQTBPRVE0TEN4QVdFQkVURkJVVkZRd1BGeGdXRkJnU0ZCVVUvOXNBUXdFREJBUUZCQVVKQlFVSkZBMExEUlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVS84QUFFUWdBRndBZ0F3RWlBQUlSQVFNUkFmL0VBQjhBQUFFRkFRRUJBUUVCQUFBQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVFBQUlCQXdNQ0JBTUZCUVFFQUFBQmZRRUNBd0FFRVFVU0lURkJCaE5SWVFjaWNSUXlnWkdoQ0NOQ3NjRVZVdEh3SkROaWNvSUpDaFlYR0JrYUpTWW5LQ2txTkRVMk56ZzVPa05FUlVaSFNFbEtVMVJWVmxkWVdWcGpaR1ZtWjJocGFuTjBkWFozZUhsNmc0U0Zob2VJaVlxU2s1U1ZscGVZbVpxaW82U2xwcWVvcWFxeXM3UzF0cmU0dWJyQ3c4VEZ4c2ZJeWNyUzA5VFYxdGZZMmRyaDR1UGs1ZWJuNk9ucThmTHo5UFgyOS9qNSt2L0VBQjhCQUFNQkFRRUJBUUVCQVFFQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVJBQUlCQWdRRUF3UUhCUVFFQUFFQ2R3QUJBZ01SQkFVaE1RWVNRVkVIWVhFVElqS0JDQlJDa2FHeHdRa2pNMUx3RldKeTBRb1dKRFRoSmZFWEdCa2FKaWNvS1NvMU5qYzRPVHBEUkVWR1IwaEpTbE5VVlZaWFdGbGFZMlJsWm1kb2FXcHpkSFYyZDNoNWVvS0RoSVdHaDRpSmlwS1RsSldXbDVpWm1xS2pwS1dtcDZpcHFyS3p0TFcydDdpNXVzTER4TVhHeDhqSnl0TFQxTlhXMTlqWjJ1TGo1T1htNStqcDZ2THo5UFgyOS9qNSt2L2FBQXdEQVFBQ0VRTVJBRDhBK2tXOGIzMFk1d1Q2VkFmaWhkV3NvU1FCU2VtYThaMWp4ekpiNnNKUk4rNFhrZ1Z4SGlyNDZXTVdweHFBV0s4Y1Y5Sk9yVGpHVXJiSDVGaGFtYlZhdE9tNUswbHEreDlWVzN4VXVuZmFpaGlLMTRQaVRlbE0rWFh5Vm9QeHh0N2VUekdnY2h1NUZlaTZGOGRkQnVnRmxjUk4zRFVxRTZWYUhNMVppeDlmTjhEWDVLZHFrZTZPR2swdUNjUEd3SnlPcHJtTGo0WmFaUGRlYThZSnpubWlpdlFVWTh1eCtUeHgrS1ZSdFZHZEJwL2hUVDFVUStRcEFHT2xZdXUvQzIwdUpESkE1aFBzYUtLeWxDTnRqMU1IbUdLcDFQZG16Ly9aIj4KCTwvaW1hZ2U+Cjwvc3ZnPg==\"}}', 1, '2023-10-02 08:58:06', '2023-10-02 08:58:06'),
(21, 'App\\Models\\Hotel', 6, '4721ef53-fd21-4a81-afd7-fc632fb9ec3f', 'gallery', 'maldive copy', 'maldive-copy.jpg', 'image/jpeg', 'media', 'media', 39594, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"maldive-copy___media_library_original_319_231.jpg\",\"maldive-copy___media_library_original_266_193.jpg\",\"maldive-copy___media_library_original_223_161.jpg\",\"maldive-copy___media_library_original_186_135.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMzE5IDIzMSI+Cgk8aW1hZ2Ugd2lkdGg9IjMxOSIgaGVpZ2h0PSIyMzEiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQTdRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQnhkV0ZzYVhSNUlEMGdPVEFLLzlzQVF3QURBZ0lEQWdJREF3TURCQU1EQkFVSUJRVUVCQVVLQndjR0NBd0tEQXdMQ2dzTERRNFNFQTBPRVE0TEN4QVdFQkVURkJVVkZRd1BGeGdXRkJnU0ZCVVUvOXNBUXdFREJBUUZCQVVKQlFVSkZBMExEUlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVS84QUFFUWdBRndBZ0F3RWlBQUlSQVFNUkFmL0VBQjhBQUFFRkFRRUJBUUVCQUFBQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVFBQUlCQXdNQ0JBTUZCUVFFQUFBQmZRRUNBd0FFRVFVU0lURkJCaE5SWVFjaWNSUXlnWkdoQ0NOQ3NjRVZVdEh3SkROaWNvSUpDaFlYR0JrYUpTWW5LQ2txTkRVMk56ZzVPa05FUlVaSFNFbEtVMVJWVmxkWVdWcGpaR1ZtWjJocGFuTjBkWFozZUhsNmc0U0Zob2VJaVlxU2s1U1ZscGVZbVpxaW82U2xwcWVvcWFxeXM3UzF0cmU0dWJyQ3c4VEZ4c2ZJeWNyUzA5VFYxdGZZMmRyaDR1UGs1ZWJuNk9ucThmTHo5UFgyOS9qNSt2L0VBQjhCQUFNQkFRRUJBUUVCQVFFQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVJBQUlCQWdRRUF3UUhCUVFFQUFFQ2R3QUJBZ01SQkFVaE1RWVNRVkVIWVhFVElqS0JDQlJDa2FHeHdRa2pNMUx3RldKeTBRb1dKRFRoSmZFWEdCa2FKaWNvS1NvMU5qYzRPVHBEUkVWR1IwaEpTbE5VVlZaWFdGbGFZMlJsWm1kb2FXcHpkSFYyZDNoNWVvS0RoSVdHaDRpSmlwS1RsSldXbDVpWm1xS2pwS1dtcDZpcHFyS3p0TFcydDdpNXVzTER4TVhHeDhqSnl0TFQxTlhXMTlqWjJ1TGo1T1htNStqcDZ2THo5UFgyOS9qNSt2L2FBQXdEQVFBQ0VRTVJBRDhBK2tXOGIzMFk1d1Q2VkFmaWhkV3NvU1FCU2VtYThaMWp4ekpiNnNKUk4rNFhrZ1Z4SGlyNDZXTVdweHFBV0s4Y1Y5Sk9yVGpHVXJiSDVGaGFtYlZhdE9tNUswbHEreDlWVzN4VXVuZmFpaGlLMTRQaVRlbE0rWFh5Vm9QeHh0N2VUekdnY2h1NUZlaTZGOGRkQnVnRmxjUk4zRFVxRTZWYUhNMVppeDlmTjhEWDVLZHFrZTZPR2swdUNjUEd3SnlPcHJtTGo0WmFaUGRlYThZSnpubWlpdlFVWTh1eCtUeHgrS1ZSdFZHZEJwL2hUVDFVUStRcEFHT2xZdXUvQzIwdUpESkE1aFBzYUtLeWxDTnRqMU1IbUdLcDFQZG16Ly9aIj4KCTwvaW1hZ2U+Cjwvc3ZnPg==\"}}', 2, '2023-10-02 08:58:06', '2023-10-02 08:58:06'),
(24, 'App\\Models\\Admin', 4, 'bbd70e5b-9495-4b92-9b30-499652b2ed11', 'avatar', 'Cool-profile-picture-Instagram', 'Cool-profile-picture-Instagram.jpeg', 'image/jpeg', 'media', 'media', 52907, '[]', '[]', '[]', '[]', 1, '2023-10-03 15:39:13', '2023-10-03 15:39:13'),
(25, 'App\\Models\\Hotel', 8, '605ca737-c1c8-4e58-a38a-9eda5cd73eb0', 'thumbnail', 'maldive copy 2', 'maldive-copy-2.jpg', 'image/jpeg', 'media', 'media', 38122, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"maldive-copy-2___media_library_original_311_240.jpg\",\"maldive-copy-2___media_library_original_260_201.jpg\",\"maldive-copy-2___media_library_original_217_167.jpg\",\"maldive-copy-2___media_library_original_182_140.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMzExIDI0MCI+Cgk8aW1hZ2Ugd2lkdGg9IjMxMSIgaGVpZ2h0PSIyNDAiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQTdRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQnhkV0ZzYVhSNUlEMGdPVEFLLzlzQVF3QURBZ0lEQWdJREF3TURCQU1EQkFVSUJRVUVCQVVLQndjR0NBd0tEQXdMQ2dzTERRNFNFQTBPRVE0TEN4QVdFQkVURkJVVkZRd1BGeGdXRkJnU0ZCVVUvOXNBUXdFREJBUUZCQVVKQlFVSkZBMExEUlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVS84QUFFUWdBR1FBZ0F3RWlBQUlSQVFNUkFmL0VBQjhBQUFFRkFRRUJBUUVCQUFBQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVFBQUlCQXdNQ0JBTUZCUVFFQUFBQmZRRUNBd0FFRVFVU0lURkJCaE5SWVFjaWNSUXlnWkdoQ0NOQ3NjRVZVdEh3SkROaWNvSUpDaFlYR0JrYUpTWW5LQ2txTkRVMk56ZzVPa05FUlVaSFNFbEtVMVJWVmxkWVdWcGpaR1ZtWjJocGFuTjBkWFozZUhsNmc0U0Zob2VJaVlxU2s1U1ZscGVZbVpxaW82U2xwcWVvcWFxeXM3UzF0cmU0dWJyQ3c4VEZ4c2ZJeWNyUzA5VFYxdGZZMmRyaDR1UGs1ZWJuNk9ucThmTHo5UFgyOS9qNSt2L0VBQjhCQUFNQkFRRUJBUUVCQVFFQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVJBQUlCQWdRRUF3UUhCUVFFQUFFQ2R3QUJBZ01SQkFVaE1RWVNRVkVIWVhFVElqS0JDQlJDa2FHeHdRa2pNMUx3RldKeTBRb1dKRFRoSmZFWEdCa2FKaWNvS1NvMU5qYzRPVHBEUkVWR1IwaEpTbE5VVlZaWFdGbGFZMlJsWm1kb2FXcHpkSFYyZDNoNWVvS0RoSVdHaDRpSmlwS1RsSldXbDVpWm1xS2pwS1dtcDZpcHFyS3p0TFcydDdpNXVzTER4TVhHeDhqSnl0TFQxTlhXMTlqWjJ1TGo1T1htNStqcDZ2THo5UFgyOS9qNSt2L2FBQXdEQVFBQ0VRTVJBRDhBL1JyVWJhMFpDMlFNVjVQNGcrSWVuYWRxejJDRU5LRDYxNXJmL0duVnZ0SXQ3Z21KWDR5YTVNZ1hQaXQ3eVc0M2hsem5OZXJWbFV3NlYyZk40V3BReDhueXh2WStqNE5mMGhiRko3bTVqakpHY0Uxeit0L0dIdzdvZ0FXNVIvb2ErVHZpWGQ2OFo1WmJlN2tTekhRZzhWNDFxdDNyRjVheVA5c2R3RDEzVjVGZkc0dVR0VDJQb01QZ01ERlhxYm4xaHJtaXphNUUxN2NSL1owWGtERmM0ZE12SWJhVjR3V1VyZ0VWNmw0bC93Q1JlYjZWekduL0FQSUZQMHJqeEdJcVZYZVRPbkJZS2hoSTJwUnRjNWJUdFBieEY0ZnVOT3VZejVuT0QzcnhieHBvMFhnNjJtdEpnVlZtNm12b2p3ci9BTWYwMWVGZnRMZjY5cTZNSlZjZExYdWNPYVlTTlZjM00xWmRELy9aIj4KCTwvaW1hZ2U+Cjwvc3ZnPg==\"}}', 1, '2023-10-03 15:40:48', '2023-10-03 15:40:48'),
(26, 'App\\Models\\Hotel', 8, '8ab4332e-0287-4bb1-87ff-cfa1e61a79da', 'gallery', 'maldive copy 2', 'maldive-copy-2.jpg', 'image/jpeg', 'media', 'media', 38122, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"maldive-copy-2___media_library_original_311_240.jpg\",\"maldive-copy-2___media_library_original_260_201.jpg\",\"maldive-copy-2___media_library_original_217_167.jpg\",\"maldive-copy-2___media_library_original_182_140.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMzExIDI0MCI+Cgk8aW1hZ2Ugd2lkdGg9IjMxMSIgaGVpZ2h0PSIyNDAiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQTdRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQnhkV0ZzYVhSNUlEMGdPVEFLLzlzQVF3QURBZ0lEQWdJREF3TURCQU1EQkFVSUJRVUVCQVVLQndjR0NBd0tEQXdMQ2dzTERRNFNFQTBPRVE0TEN4QVdFQkVURkJVVkZRd1BGeGdXRkJnU0ZCVVUvOXNBUXdFREJBUUZCQVVKQlFVSkZBMExEUlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVS84QUFFUWdBR1FBZ0F3RWlBQUlSQVFNUkFmL0VBQjhBQUFFRkFRRUJBUUVCQUFBQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVFBQUlCQXdNQ0JBTUZCUVFFQUFBQmZRRUNBd0FFRVFVU0lURkJCaE5SWVFjaWNSUXlnWkdoQ0NOQ3NjRVZVdEh3SkROaWNvSUpDaFlYR0JrYUpTWW5LQ2txTkRVMk56ZzVPa05FUlVaSFNFbEtVMVJWVmxkWVdWcGpaR1ZtWjJocGFuTjBkWFozZUhsNmc0U0Zob2VJaVlxU2s1U1ZscGVZbVpxaW82U2xwcWVvcWFxeXM3UzF0cmU0dWJyQ3c4VEZ4c2ZJeWNyUzA5VFYxdGZZMmRyaDR1UGs1ZWJuNk9ucThmTHo5UFgyOS9qNSt2L0VBQjhCQUFNQkFRRUJBUUVCQVFFQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVJBQUlCQWdRRUF3UUhCUVFFQUFFQ2R3QUJBZ01SQkFVaE1RWVNRVkVIWVhFVElqS0JDQlJDa2FHeHdRa2pNMUx3RldKeTBRb1dKRFRoSmZFWEdCa2FKaWNvS1NvMU5qYzRPVHBEUkVWR1IwaEpTbE5VVlZaWFdGbGFZMlJsWm1kb2FXcHpkSFYyZDNoNWVvS0RoSVdHaDRpSmlwS1RsSldXbDVpWm1xS2pwS1dtcDZpcHFyS3p0TFcydDdpNXVzTER4TVhHeDhqSnl0TFQxTlhXMTlqWjJ1TGo1T1htNStqcDZ2THo5UFgyOS9qNSt2L2FBQXdEQVFBQ0VRTVJBRDhBL1JyVWJhMFpDMlFNVjVQNGcrSWVuYWRxejJDRU5LRDYxNXJmL0duVnZ0SXQ3Z21KWDR5YTVNZ1hQaXQ3eVc0M2hsem5OZXJWbFV3NlYyZk40V3BReDhueXh2WStqNE5mMGhiRko3bTVqakpHY0Uxeit0L0dIdzdvZ0FXNVIvb2ErVHZpWGQ2OFo1WmJlN2tTekhRZzhWNDFxdDNyRjVheVA5c2R3RDEzVjVGZkc0dVR0VDJQb01QZ01ERlhxYm4xaHJtaXphNUUxN2NSL1owWGtERmM0ZE12SWJhVjR3V1VyZ0VWNmw0bC93Q1JlYjZWekduL0FQSUZQMHJqeEdJcVZYZVRPbkJZS2hoSTJwUnRjNWJUdFBieEY0ZnVOT3VZejVuT0QzcnhieHBvMFhnNjJtdEpnVlZtNm12b2p3ci9BTWYwMWVGZnRMZjY5cTZNSlZjZExYdWNPYVlTTlZjM00xWmRELy9aIj4KCTwvaW1hZ2U+Cjwvc3ZnPg==\"}}', 2, '2023-10-03 15:40:48', '2023-10-03 15:40:48'),
(28, 'App\\Models\\Admin', 2, 'f2b242f4-bb78-4803-abd8-e0daa912e063', 'avatar', '20230925_090314', '20230925_090314.jpg', 'image/jpeg', 'media', 'media', 4540915, '[]', '[]', '[]', '[]', 3, '2023-10-04 14:59:52', '2023-10-04 14:59:52'),
(30, 'App\\Models\\Admin', 6, '10c7d1a0-c79b-4595-8fd6-cb2624897e2c', 'avatar', 'avatar', 'avatar.png', 'image/png', 'media', 'media', 43126, '[]', '[]', '[]', '[]', 1, '2023-10-09 12:10:30', '2023-10-09 12:10:30'),
(31, 'App\\Models\\Admin', 7, 'd2baae02-d93a-457c-80e5-c433e48c1fca', 'avatar', 'avatar', 'avatar.png', 'image/png', 'media', 'media', 43126, '[]', '[]', '[]', '[]', 1, '2023-10-10 09:04:35', '2023-10-10 09:04:35'),
(32, 'App\\Models\\Hotel', 9, '662649c8-0549-44a3-b2f0-d1c40f1d7395', 'thumbnail', '5d8f8aab6f24eb26d52ba8e7', '5d8f8aab6f24eb26d52ba8e7.jpg', 'image/jpeg', 'media', 'media', 187488, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"5d8f8aab6f24eb26d52ba8e7___media_library_original_1000_750.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_836_627.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_700_525.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_585_439.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_489_367.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_409_307.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_342_257.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_286_215.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_240_180.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMTAwMCA3NTAiPgoJPGltYWdlIHdpZHRoPSIxMDAwIiBoZWlnaHQ9Ijc1MCIgeGxpbms6aHJlZj0iZGF0YTppbWFnZS9qcGVnO2Jhc2U2NCwvOWovNEFBUVNrWkpSZ0FCQVFFQVlBQmdBQUQvL2dBN1ExSkZRVlJQVWpvZ1oyUXRhbkJsWnlCMk1TNHdJQ2gxYzJsdVp5QkpTa2NnU2xCRlJ5QjJOaklwTENCeGRXRnNhWFI1SUQwZ09UQUsvOXNBUXdBREFnSURBZ0lEQXdNREJBTURCQVVJQlFVRUJBVUtCd2NHQ0F3S0RBd0xDZ3NMRFE0U0VBME9FUTRMQ3hBV0VCRVRGQlVWRlF3UEZ4Z1dGQmdTRkJVVS85c0FRd0VEQkFRRkJBVUpCUVVKRkEwTERSUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVLzhBQUVRZ0FHQUFnQXdFaUFBSVJBUU1SQWYvRUFCOEFBQUVGQVFFQkFRRUJBQUFBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUUFBSUJBd01DQkFNRkJRUUVBQUFCZlFFQ0F3QUVFUVVTSVRGQkJoTlJZUWNpY1JReWdaR2hDQ05Dc2NFVlV0SHdKRE5pY29JSkNoWVhHQmthSlNZbktDa3FORFUyTnpnNU9rTkVSVVpIU0VsS1UxUlZWbGRZV1ZwalpHVm1aMmhwYW5OMGRYWjNlSGw2ZzRTRmhvZUlpWXFTazVTVmxwZVltWnFpbzZTbHBxZW9xYXF5czdTMXRyZTR1YnJDdzhURnhzZkl5Y3JTMDlUVjF0ZlkyZHJoNHVQazVlYm42T25xOGZMejlQWDI5L2o1K3YvRUFCOEJBQU1CQVFFQkFRRUJBUUVBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUkFBSUJBZ1FFQXdRSEJRUUVBQUVDZHdBQkFnTVJCQVVoTVFZU1FWRUhZWEVUSWpLQkNCUkNrYUd4d1Frak0xTHdGV0p5MFFvV0pEVGhKZkVYR0JrYUppY29LU28xTmpjNE9UcERSRVZHUjBoSlNsTlVWVlpYV0ZsYVkyUmxabWRvYVdwemRIVjJkM2g1ZW9LRGhJV0doNGlKaXBLVGxKV1dsNWlabXFLanBLV21wNmlwcXJLenRMVzJ0N2k1dXNMRHhNWEd4OGpKeXRMVDFOWFcxOWpaMnVMajVPWG01K2pwNnZMejlQWDI5L2o1K3YvYUFBd0RBUUFDRVFNUkFEOEErZjdqU1pyNjFndFlvMkxrNDZWNkphZUNkVThQK0hvaThEQU9PcEZldWVHZmhsWi8ybmF1VlhkdUhCRmZSTng4S2JQWGRGV09VS2lvZ3h4WFpWd3NhY1UxSzU1dUF6R1dLbkpUZzQyN255SDRSOE02dFBwYnpHM2J5Z0Q4MkttOEg2UGMydXBYTFNLY0ZxK25iancvWitIdkM5MVl3YlhaVlBJNjE0RGFYYjJGL2NCZ2Z2SHRYSEtoN3ZOYzlaNHZrcUtGcm50UGhqUVd2Wkd1Z20xWVJ1ckl0ZmpxOW40b2wwVzZrMndrN0FhS0tWQ043SnMzck5SVGFTTzFQaGk2dnJLNTFHM21NdHN5RnNHdk5WdHRQTHlDYUpTKzQ1NG9vcXNRM0dGa1pVWXFyTzhrZi8vWiI+Cgk8L2ltYWdlPgo8L3N2Zz4=\"}}', 1, '2023-10-10 09:36:21', '2023-10-10 09:36:23'),
(33, 'App\\Models\\Hotel', 9, 'a722f80f-bbe1-40ba-87b0-88d59ec7e742', 'gallery', '5d8f8aab6f24eb26d52ba8e7', '5d8f8aab6f24eb26d52ba8e7.jpg', 'image/jpeg', 'media', 'media', 187488, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"5d8f8aab6f24eb26d52ba8e7___media_library_original_1000_750.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_836_627.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_700_525.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_585_439.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_489_367.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_409_307.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_342_257.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_286_215.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_240_180.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMTAwMCA3NTAiPgoJPGltYWdlIHdpZHRoPSIxMDAwIiBoZWlnaHQ9Ijc1MCIgeGxpbms6aHJlZj0iZGF0YTppbWFnZS9qcGVnO2Jhc2U2NCwvOWovNEFBUVNrWkpSZ0FCQVFFQVlBQmdBQUQvL2dBN1ExSkZRVlJQVWpvZ1oyUXRhbkJsWnlCMk1TNHdJQ2gxYzJsdVp5QkpTa2NnU2xCRlJ5QjJOaklwTENCeGRXRnNhWFI1SUQwZ09UQUsvOXNBUXdBREFnSURBZ0lEQXdNREJBTURCQVVJQlFVRUJBVUtCd2NHQ0F3S0RBd0xDZ3NMRFE0U0VBME9FUTRMQ3hBV0VCRVRGQlVWRlF3UEZ4Z1dGQmdTRkJVVS85c0FRd0VEQkFRRkJBVUpCUVVKRkEwTERSUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVLzhBQUVRZ0FHQUFnQXdFaUFBSVJBUU1SQWYvRUFCOEFBQUVGQVFFQkFRRUJBQUFBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUUFBSUJBd01DQkFNRkJRUUVBQUFCZlFFQ0F3QUVFUVVTSVRGQkJoTlJZUWNpY1JReWdaR2hDQ05Dc2NFVlV0SHdKRE5pY29JSkNoWVhHQmthSlNZbktDa3FORFUyTnpnNU9rTkVSVVpIU0VsS1UxUlZWbGRZV1ZwalpHVm1aMmhwYW5OMGRYWjNlSGw2ZzRTRmhvZUlpWXFTazVTVmxwZVltWnFpbzZTbHBxZW9xYXF5czdTMXRyZTR1YnJDdzhURnhzZkl5Y3JTMDlUVjF0ZlkyZHJoNHVQazVlYm42T25xOGZMejlQWDI5L2o1K3YvRUFCOEJBQU1CQVFFQkFRRUJBUUVBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUkFBSUJBZ1FFQXdRSEJRUUVBQUVDZHdBQkFnTVJCQVVoTVFZU1FWRUhZWEVUSWpLQkNCUkNrYUd4d1Frak0xTHdGV0p5MFFvV0pEVGhKZkVYR0JrYUppY29LU28xTmpjNE9UcERSRVZHUjBoSlNsTlVWVlpYV0ZsYVkyUmxabWRvYVdwemRIVjJkM2g1ZW9LRGhJV0doNGlKaXBLVGxKV1dsNWlabXFLanBLV21wNmlwcXJLenRMVzJ0N2k1dXNMRHhNWEd4OGpKeXRMVDFOWFcxOWpaMnVMajVPWG01K2pwNnZMejlQWDI5L2o1K3YvYUFBd0RBUUFDRVFNUkFEOEErZjdqU1pyNjFndFlvMkxrNDZWNkphZUNkVThQK0hvaThEQU9PcEZldWVHZmhsWi8ybmF1VlhkdUhCRmZSTng4S2JQWGRGV09VS2lvZ3h4WFpWd3NhY1UxSzU1dUF6R1dLbkpUZzQyN255SDRSOE02dFBwYnpHM2J5Z0Q4MkttOEg2UGMydXBYTFNLY0ZxK25iancvWitIdkM5MVl3YlhaVlBJNjE0RGFYYjJGL2NCZ2Z2SHRYSEtoN3ZOYzlaNHZrcUtGcm50UGhqUVd2Wkd1Z20xWVJ1ckl0ZmpxOW40b2wwVzZrMndrN0FhS0tWQ043SnMzck5SVGFTTzFQaGk2dnJLNTFHM21NdHN5RnNHdk5WdHRQTHlDYUpTKzQ1NG9vcXNRM0dGa1pVWXFyTzhrZi8vWiI+Cgk8L2ltYWdlPgo8L3N2Zz4=\"}}', 2, '2023-10-10 09:36:23', '2023-10-10 09:36:24'),
(34, 'App\\Models\\Admin', 5, '3f73dcaf-7f0c-43c7-8380-6c29d7b7103b', 'avatar', '069a1b3a-7d1a-4705-a1d8-4193f8213526', '069a1b3a-7d1a-4705-a1d8-4193f8213526.jpeg', 'image/jpeg', 'media', 'media', 383002, '[]', '[]', '[]', '[]', 2, '2023-10-10 13:10:02', '2023-10-10 13:10:02'),
(36, 'App\\Models\\Admin', 8, 'd02ae394-3e2c-4b34-84b3-506705affaf8', 'avatar', 'IMG_7914', 'IMG_7914.jpeg', 'image/jpeg', 'media', 'media', 3951095, '[]', '[]', '[]', '[]', 2, '2023-10-10 19:35:38', '2023-10-10 19:35:38'),
(42, 'App\\Models\\Hotel', 12, 'ff701804-0681-418d-9fb9-b15922404ab4', 'gallery', 'IMG_1725_jpg', 'IMG_1725_jpg.jpeg', 'image/jpeg', 'media', 'media', 2480896, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"IMG_1725_jpg___media_library_original_2268_4032.jpeg\",\"IMG_1725_jpg___media_library_original_1897_3372.jpeg\",\"IMG_1725_jpg___media_library_original_1587_2821.jpeg\",\"IMG_1725_jpg___media_library_original_1328_2361.jpeg\",\"IMG_1725_jpg___media_library_original_1111_1975.jpeg\",\"IMG_1725_jpg___media_library_original_929_1652.jpeg\",\"IMG_1725_jpg___media_library_original_777_1381.jpeg\",\"IMG_1725_jpg___media_library_original_650_1156.jpeg\",\"IMG_1725_jpg___media_library_original_544_967.jpeg\",\"IMG_1725_jpg___media_library_original_455_809.jpeg\",\"IMG_1725_jpg___media_library_original_381_677.jpeg\",\"IMG_1725_jpg___media_library_original_318_565.jpeg\",\"IMG_1725_jpg___media_library_original_266_473.jpeg\",\"IMG_1725_jpg___media_library_original_223_396.jpeg\",\"IMG_1725_jpg___media_library_original_186_331.jpeg\",\"IMG_1725_jpg___media_library_original_156_277.jpeg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMjI2OCA0MDMyIj4KCTxpbWFnZSB3aWR0aD0iMjI2OCIgaGVpZ2h0PSI0MDMyIiB4bGluazpocmVmPSJkYXRhOmltYWdlL2pwZWc7YmFzZTY0LC85ai80QUFRU2taSlJnQUJBUUVBWUFCZ0FBRC8vZ0E3UTFKRlFWUlBVam9nWjJRdGFuQmxaeUIyTVM0d0lDaDFjMmx1WnlCSlNrY2dTbEJGUnlCMk5qSXBMQ0J4ZFdGc2FYUjVJRDBnT1RBSy85c0FRd0FEQWdJREFnSURBd01EQkFNREJBVUlCUVVFQkFVS0J3Y0dDQXdLREF3TENnc0xEUTRTRUEwT0VRNExDeEFXRUJFVEZCVVZGUXdQRnhnV0ZCZ1NGQlVVLzlzQVF3RURCQVFGQkFVSkJRVUpGQTBMRFJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVUvOEFBRVFnQU9RQWdBd0VpQUFJUkFRTVJBZi9FQUI4QUFBRUZBUUVCQVFFQkFBQUFBQUFBQUFBQkFnTUVCUVlIQ0FrS0MvL0VBTFVRQUFJQkF3TUNCQU1GQlFRRUFBQUJmUUVDQXdBRUVRVVNJVEZCQmhOUllRY2ljUlF5Z1pHaENDTkNzY0VWVXRId0pETmljb0lKQ2hZWEdCa2FKU1luS0NrcU5EVTJOemc1T2tORVJVWkhTRWxLVTFSVlZsZFlXVnBqWkdWbVoyaHBhbk4wZFhaM2VIbDZnNFNGaG9lSWlZcVNrNVNWbHBlWW1acWlvNlNscHFlb3FhcXlzN1MxdHJlNHVickN3OFRGeHNmSXljclMwOVRWMXRmWTJkcmg0dVBrNWVibjZPbnE4Zkx6OVBYMjkvajUrdi9FQUI4QkFBTUJBUUVCQVFFQkFRRUFBQUFBQUFBQkFnTUVCUVlIQ0FrS0MvL0VBTFVSQUFJQkFnUUVBd1FIQlFRRUFBRUNkd0FCQWdNUkJBVWhNUVlTUVZFSFlYRVRJaktCQ0JSQ2thR3h3UWtqTTFMd0ZXSnkwUW9XSkRUaEpmRVhHQmthSmljb0tTbzFOamM0T1RwRFJFVkdSMGhKU2xOVVZWWlhXRmxhWTJSbFptZG9hV3B6ZEhWMmQzaDVlb0tEaElXR2g0aUppcEtUbEpXV2w1aVptcUtqcEtXbXA2aXBxckt6dExXMnQ3aTV1c0xEeE1YR3g4akp5dExUMU5YVzE5aloydUxqNU9YbTUranA2dkx6OVBYMjkvajUrdi9hQUF3REFRQUNFUU1SQUQ4QThiOEIrQ3IzVDlYaWVWRENjL3hDdnFid1Rwa3FYMXN6anpPbVdGYzE4UXRPMmFhTHExc3pFNi8zVnJKOEFmRitMd2h6cXBHT3dhdjBWMDUxb1hwcTUrYlFjS1UrV1RQcHI0aVhLNlY0U1VxaGZjblFDdmx6VWJ5NjFlU1MyampLNU9hOWMwZjQ5Nko0MXQ3aTN1SkkxaFZTRjNHdklML3hscDl2NHBsK3pTb1lsWTg5cTN3T0VyUnZGdzFKeHRlbTdTVXRBMHY0NzMyclFOYVhlbkxLcmNjTFhrL3hGMGU4OFJha1pMZTNraGl6bmFCVTJpK09iZTNuRWlRQVk5Ulduckh4T2xnaUo4aEJ1SHlraXZvZnIrVzRHZk5SVi9tZk4wZjdReGE1YXFzL1E0M1NQQ21wMjdlV2tqb2ZRR3IzaHp3OWU2dHJrdGlwWXpMMTU1cmxaZmlOcWo2eXhnWUZpZWdyVjhDK09yM1EvRjdYdHdwZG42OFZ4MU9LNE54OW5EbHR1ZGNzanhFaythVjc3SHNXdmZBdTFOeVBzRjJpcDM1ckMxMzRTMlE4cTJ1ZFRSWHh3TjFaR28vRXRmSWRvYmx3K09QbXJ4VHg1NHcxelVKamNSWGtnWkRrWWF2eHFsZHpUcVNkajlkcncvZFNWQ0tVdWpaNmRxL2dXMDhHM2F6UklMM2NlU09haDhTeFdtbmFmSGZpSFlTUHVnY2l2S2ZEUHh4dTdLUmJmVjh5cU9OelYyMXo4WWZEbDVicXMrMXhqN3A2Vjk5aDhObDFXbnpVNmxuMmtmbHVLeGVjNGVyeTRpaTVlY1RqcE5UeGxDOVVKWmhlTVl3MlJWUzgrL1Vla2Y4QUh4Slh3VFAxZ3lmRVdnUnlJU28rYXVCMURUcDdjbkJKSDFyMVhVL3V2WEQ2cjBhaERQL1oiPgoJPC9pbWFnZT4KPC9zdmc+\"}}', 2, '2023-10-11 08:55:06', '2023-10-11 08:55:25'),
(47, 'App\\Models\\Hotel', 13, 'd5bfe7df-37f5-4205-a7b0-e155342e3371', 'thumbnail', 'IMG_8D8D1BCA27E0-1', 'IMG_8D8D1BCA27E0-1.jpeg', 'image/jpeg', 'media', 'media', 1035264, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"IMG_8D8D1BCA27E0-1___media_library_original_1170_1441.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_978_1205.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_818_1007.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_685_844.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_573_706.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_479_590.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_401_494.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_335_413.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_280_345.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_235_289.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_196_241.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_164_202.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_137_169.jpeg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMTE3MCAxNDQxIj4KCTxpbWFnZSB3aWR0aD0iMTE3MCIgaGVpZ2h0PSIxNDQxIiB4bGluazpocmVmPSJkYXRhOmltYWdlL2pwZWc7YmFzZTY0LC85ai80QUFRU2taSlJnQUJBUUVBWUFCZ0FBRC8vZ0E3UTFKRlFWUlBVam9nWjJRdGFuQmxaeUIyTVM0d0lDaDFjMmx1WnlCSlNrY2dTbEJGUnlCMk5qSXBMQ0J4ZFdGc2FYUjVJRDBnT1RBSy85c0FRd0FEQWdJREFnSURBd01EQkFNREJBVUlCUVVFQkFVS0J3Y0dDQXdLREF3TENnc0xEUTRTRUEwT0VRNExDeEFXRUJFVEZCVVZGUXdQRnhnV0ZCZ1NGQlVVLzlzQVF3RURCQVFGQkFVSkJRVUpGQTBMRFJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVUvOEFBRVFnQUp3QWdBd0VpQUFJUkFRTVJBZi9FQUI4QUFBRUZBUUVCQVFFQkFBQUFBQUFBQUFBQkFnTUVCUVlIQ0FrS0MvL0VBTFVRQUFJQkF3TUNCQU1GQlFRRUFBQUJmUUVDQXdBRUVRVVNJVEZCQmhOUllRY2ljUlF5Z1pHaENDTkNzY0VWVXRId0pETmljb0lKQ2hZWEdCa2FKU1luS0NrcU5EVTJOemc1T2tORVJVWkhTRWxLVTFSVlZsZFlXVnBqWkdWbVoyaHBhbk4wZFhaM2VIbDZnNFNGaG9lSWlZcVNrNVNWbHBlWW1acWlvNlNscHFlb3FhcXlzN1MxdHJlNHVickN3OFRGeHNmSXljclMwOVRWMXRmWTJkcmg0dVBrNWVibjZPbnE4Zkx6OVBYMjkvajUrdi9FQUI4QkFBTUJBUUVCQVFFQkFRRUFBQUFBQUFBQkFnTUVCUVlIQ0FrS0MvL0VBTFVSQUFJQkFnUUVBd1FIQlFRRUFBRUNkd0FCQWdNUkJBVWhNUVlTUVZFSFlYRVRJaktCQ0JSQ2thR3h3UWtqTTFMd0ZXSnkwUW9XSkRUaEpmRVhHQmthSmljb0tTbzFOamM0T1RwRFJFVkdSMGhKU2xOVVZWWlhXRmxhWTJSbFptZG9hV3B6ZEhWMmQzaDVlb0tEaElXR2g0aUppcEtUbEpXV2w1aVptcUtqcEtXbXA2aXBxckt6dExXMnQ3aTV1c0xEeE1YR3g4akp5dExUMU5YVzE5aloydUxqNU9YbTUranA2dkx6OVBYMjkvajUrdi9hQUF3REFRQUNFUU1SQUQ4QTlJZlF5bjhKcFUwNTAvaE5jNC83UitneVhnUTJ4VSttSzJJZmpsNGN1WXlmTEFJcjZaWTZuTFkvT0paUlhnYmxyYnlESHltdEQ3UWxrbTZaeEd2cTFZTnY4WU5CYUZwRlQ1UU1tdkVQajU4Y0xUVWRIYUxSWnpITURnN1RSUEdVNEs1TU1xclRra3pncEJhdGNlYVljRSsxYU1GL2FRUm5FQk9mYXZxV1g5bVd4ZzR3SmVlQ0swOU4vWnBzRGd0QXVQY1Z4MHFsRjAxSjJUUFJyeHhjS3pwcE4raDhmeWVMM1paTFNDeWNCaGpjRnJJdGZnOXJIaU9PVzR0cmFTUU9jN2NWOXp3ZkFMVHJTNlVMWlJsYzhuYlhxUGhINGE2UDRmVU1rS0FrY3JpdlByY2xydDNQVndjY1JVbGJsY1V1NC9TbWUxdFVTUTcyOVRXbXQyUTRVY2NVVVZ3cEgwbDNvVGJpZWFYZXc3MFVWRE9teC8vWiI+Cgk8L2ltYWdlPgo8L3N2Zz4=\"}}', 1, '2023-10-12 16:22:00', '2023-10-12 16:22:05'),
(48, 'App\\Models\\Hotel', 13, '4038430d-f772-4be4-b97b-fe0c52c72501', 'gallery', 'IMG_8D8D1BCA27E0-1', 'IMG_8D8D1BCA27E0-1.jpeg', 'image/jpeg', 'media', 'media', 1035264, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"IMG_8D8D1BCA27E0-1___media_library_original_1170_1441.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_978_1205.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_818_1007.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_685_844.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_573_706.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_479_590.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_401_494.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_335_413.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_280_345.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_235_289.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_196_241.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_164_202.jpeg\",\"IMG_8D8D1BCA27E0-1___media_library_original_137_169.jpeg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMTE3MCAxNDQxIj4KCTxpbWFnZSB3aWR0aD0iMTE3MCIgaGVpZ2h0PSIxNDQxIiB4bGluazpocmVmPSJkYXRhOmltYWdlL2pwZWc7YmFzZTY0LC85ai80QUFRU2taSlJnQUJBUUVBWUFCZ0FBRC8vZ0E3UTFKRlFWUlBVam9nWjJRdGFuQmxaeUIyTVM0d0lDaDFjMmx1WnlCSlNrY2dTbEJGUnlCMk5qSXBMQ0J4ZFdGc2FYUjVJRDBnT1RBSy85c0FRd0FEQWdJREFnSURBd01EQkFNREJBVUlCUVVFQkFVS0J3Y0dDQXdLREF3TENnc0xEUTRTRUEwT0VRNExDeEFXRUJFVEZCVVZGUXdQRnhnV0ZCZ1NGQlVVLzlzQVF3RURCQVFGQkFVSkJRVUpGQTBMRFJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVUvOEFBRVFnQUp3QWdBd0VpQUFJUkFRTVJBZi9FQUI4QUFBRUZBUUVCQVFFQkFBQUFBQUFBQUFBQkFnTUVCUVlIQ0FrS0MvL0VBTFVRQUFJQkF3TUNCQU1GQlFRRUFBQUJmUUVDQXdBRUVRVVNJVEZCQmhOUllRY2ljUlF5Z1pHaENDTkNzY0VWVXRId0pETmljb0lKQ2hZWEdCa2FKU1luS0NrcU5EVTJOemc1T2tORVJVWkhTRWxLVTFSVlZsZFlXVnBqWkdWbVoyaHBhbk4wZFhaM2VIbDZnNFNGaG9lSWlZcVNrNVNWbHBlWW1acWlvNlNscHFlb3FhcXlzN1MxdHJlNHVickN3OFRGeHNmSXljclMwOVRWMXRmWTJkcmg0dVBrNWVibjZPbnE4Zkx6OVBYMjkvajUrdi9FQUI4QkFBTUJBUUVCQVFFQkFRRUFBQUFBQUFBQkFnTUVCUVlIQ0FrS0MvL0VBTFVSQUFJQkFnUUVBd1FIQlFRRUFBRUNkd0FCQWdNUkJBVWhNUVlTUVZFSFlYRVRJaktCQ0JSQ2thR3h3UWtqTTFMd0ZXSnkwUW9XSkRUaEpmRVhHQmthSmljb0tTbzFOamM0T1RwRFJFVkdSMGhKU2xOVVZWWlhXRmxhWTJSbFptZG9hV3B6ZEhWMmQzaDVlb0tEaElXR2g0aUppcEtUbEpXV2w1aVptcUtqcEtXbXA2aXBxckt6dExXMnQ3aTV1c0xEeE1YR3g4akp5dExUMU5YVzE5aloydUxqNU9YbTUranA2dkx6OVBYMjkvajUrdi9hQUF3REFRQUNFUU1SQUQ4QTlJZlF5bjhKcFUwNTAvaE5jNC83UitneVhnUTJ4VSttSzJJZmpsNGN1WXlmTEFJcjZaWTZuTFkvT0paUlhnYmxyYnlESHltdEQ3UWxrbTZaeEd2cTFZTnY4WU5CYUZwRlQ1UU1tdkVQajU4Y0xUVWRIYUxSWnpITURnN1RSUEdVNEs1TU1xclRra3pncEJhdGNlYVljRSsxYU1GL2FRUm5FQk9mYXZxV1g5bVd4ZzR3SmVlQ0swOU4vWnBzRGd0QXVQY1Z4MHFsRjAxSjJUUFJyeHhjS3pwcE4raDhmeWVMM1paTFNDeWNCaGpjRnJJdGZnOXJIaU9PVzR0cmFTUU9jN2NWOXp3ZkFMVHJTNlVMWlJsYzhuYlhxUGhINGE2UDRmVU1rS0FrY3JpdlByY2xydDNQVndjY1JVbGJsY1V1NC9TbWUxdFVTUTcyOVRXbXQyUTRVY2NVVVZ3cEgwbDNvVGJpZWFYZXc3MFVWRE9teC8vWiI+Cgk8L2ltYWdlPgo8L3N2Zz4=\"}}', 2, '2023-10-12 16:22:05', '2023-10-12 16:22:08'),
(49, 'App\\Models\\Hotel', 13, '252dcacb-b0a0-4d5f-982d-c89373e699ab', 'gallery', 'maldive copy 2', 'maldive-copy-2.jpg', 'image/jpeg', 'media', 'media', 38122, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"maldive-copy-2___media_library_original_311_240.jpg\",\"maldive-copy-2___media_library_original_260_201.jpg\",\"maldive-copy-2___media_library_original_217_167.jpg\",\"maldive-copy-2___media_library_original_182_140.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMzExIDI0MCI+Cgk8aW1hZ2Ugd2lkdGg9IjMxMSIgaGVpZ2h0PSIyNDAiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQTdRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQnhkV0ZzYVhSNUlEMGdPVEFLLzlzQVF3QURBZ0lEQWdJREF3TURCQU1EQkFVSUJRVUVCQVVLQndjR0NBd0tEQXdMQ2dzTERRNFNFQTBPRVE0TEN4QVdFQkVURkJVVkZRd1BGeGdXRkJnU0ZCVVUvOXNBUXdFREJBUUZCQVVKQlFVSkZBMExEUlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVS84QUFFUWdBR1FBZ0F3RWlBQUlSQVFNUkFmL0VBQjhBQUFFRkFRRUJBUUVCQUFBQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVFBQUlCQXdNQ0JBTUZCUVFFQUFBQmZRRUNBd0FFRVFVU0lURkJCaE5SWVFjaWNSUXlnWkdoQ0NOQ3NjRVZVdEh3SkROaWNvSUpDaFlYR0JrYUpTWW5LQ2txTkRVMk56ZzVPa05FUlVaSFNFbEtVMVJWVmxkWVdWcGpaR1ZtWjJocGFuTjBkWFozZUhsNmc0U0Zob2VJaVlxU2s1U1ZscGVZbVpxaW82U2xwcWVvcWFxeXM3UzF0cmU0dWJyQ3c4VEZ4c2ZJeWNyUzA5VFYxdGZZMmRyaDR1UGs1ZWJuNk9ucThmTHo5UFgyOS9qNSt2L0VBQjhCQUFNQkFRRUJBUUVCQVFFQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVJBQUlCQWdRRUF3UUhCUVFFQUFFQ2R3QUJBZ01SQkFVaE1RWVNRVkVIWVhFVElqS0JDQlJDa2FHeHdRa2pNMUx3RldKeTBRb1dKRFRoSmZFWEdCa2FKaWNvS1NvMU5qYzRPVHBEUkVWR1IwaEpTbE5VVlZaWFdGbGFZMlJsWm1kb2FXcHpkSFYyZDNoNWVvS0RoSVdHaDRpSmlwS1RsSldXbDVpWm1xS2pwS1dtcDZpcHFyS3p0TFcydDdpNXVzTER4TVhHeDhqSnl0TFQxTlhXMTlqWjJ1TGo1T1htNStqcDZ2THo5UFgyOS9qNSt2L2FBQXdEQVFBQ0VRTVJBRDhBL1JyVWJhMFpDMlFNVjVQNGcrSWVuYWRxejJDRU5LRDYxNXJmL0duVnZ0SXQ3Z21KWDR5YTVNZ1hQaXQ3eVc0M2hsem5OZXJWbFV3NlYyZk40V3BReDhueXh2WStqNE5mMGhiRko3bTVqakpHY0Uxeit0L0dIdzdvZ0FXNVIvb2ErVHZpWGQ2OFo1WmJlN2tTekhRZzhWNDFxdDNyRjVheVA5c2R3RDEzVjVGZkc0dVR0VDJQb01QZ01ERlhxYm4xaHJtaXphNUUxN2NSL1owWGtERmM0ZE12SWJhVjR3V1VyZ0VWNmw0bC93Q1JlYjZWekduL0FQSUZQMHJqeEdJcVZYZVRPbkJZS2hoSTJwUnRjNWJUdFBieEY0ZnVOT3VZejVuT0QzcnhieHBvMFhnNjJtdEpnVlZtNm12b2p3ci9BTWYwMWVGZnRMZjY5cTZNSlZjZExYdWNPYVlTTlZjM00xWmRELy9aIj4KCTwvaW1hZ2U+Cjwvc3ZnPg==\"}}', 3, '2023-10-12 16:22:08', '2023-10-12 16:22:09'),
(50, 'App\\Models\\Hotel', 13, 'f452e154-757c-43dc-a04c-10dcf9100664', 'gallery', 'maldive copy', 'maldive-copy.jpg', 'image/jpeg', 'media', 'media', 39594, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"maldive-copy___media_library_original_319_231.jpg\",\"maldive-copy___media_library_original_266_193.jpg\",\"maldive-copy___media_library_original_223_161.jpg\",\"maldive-copy___media_library_original_186_135.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMzE5IDIzMSI+Cgk8aW1hZ2Ugd2lkdGg9IjMxOSIgaGVpZ2h0PSIyMzEiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQTdRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQnhkV0ZzYVhSNUlEMGdPVEFLLzlzQVF3QURBZ0lEQWdJREF3TURCQU1EQkFVSUJRVUVCQVVLQndjR0NBd0tEQXdMQ2dzTERRNFNFQTBPRVE0TEN4QVdFQkVURkJVVkZRd1BGeGdXRkJnU0ZCVVUvOXNBUXdFREJBUUZCQVVKQlFVSkZBMExEUlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVS84QUFFUWdBRndBZ0F3RWlBQUlSQVFNUkFmL0VBQjhBQUFFRkFRRUJBUUVCQUFBQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVFBQUlCQXdNQ0JBTUZCUVFFQUFBQmZRRUNBd0FFRVFVU0lURkJCaE5SWVFjaWNSUXlnWkdoQ0NOQ3NjRVZVdEh3SkROaWNvSUpDaFlYR0JrYUpTWW5LQ2txTkRVMk56ZzVPa05FUlVaSFNFbEtVMVJWVmxkWVdWcGpaR1ZtWjJocGFuTjBkWFozZUhsNmc0U0Zob2VJaVlxU2s1U1ZscGVZbVpxaW82U2xwcWVvcWFxeXM3UzF0cmU0dWJyQ3c4VEZ4c2ZJeWNyUzA5VFYxdGZZMmRyaDR1UGs1ZWJuNk9ucThmTHo5UFgyOS9qNSt2L0VBQjhCQUFNQkFRRUJBUUVCQVFFQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVJBQUlCQWdRRUF3UUhCUVFFQUFFQ2R3QUJBZ01SQkFVaE1RWVNRVkVIWVhFVElqS0JDQlJDa2FHeHdRa2pNMUx3RldKeTBRb1dKRFRoSmZFWEdCa2FKaWNvS1NvMU5qYzRPVHBEUkVWR1IwaEpTbE5VVlZaWFdGbGFZMlJsWm1kb2FXcHpkSFYyZDNoNWVvS0RoSVdHaDRpSmlwS1RsSldXbDVpWm1xS2pwS1dtcDZpcHFyS3p0TFcydDdpNXVzTER4TVhHeDhqSnl0TFQxTlhXMTlqWjJ1TGo1T1htNStqcDZ2THo5UFgyOS9qNSt2L2FBQXdEQVFBQ0VRTVJBRDhBK2tXOGIzMFk1d1Q2VkFmaWhkV3NvU1FCU2VtYThaMWp4ekpiNnNKUk4rNFhrZ1Z4SGlyNDZXTVdweHFBV0s4Y1Y5Sk9yVGpHVXJiSDVGaGFtYlZhdE9tNUswbHEreDlWVzN4VXVuZmFpaGlLMTRQaVRlbE0rWFh5Vm9QeHh0N2VUekdnY2h1NUZlaTZGOGRkQnVnRmxjUk4zRFVxRTZWYUhNMVppeDlmTjhEWDVLZHFrZTZPR2swdUNjUEd3SnlPcHJtTGo0WmFaUGRlYThZSnpubWlpdlFVWTh1eCtUeHgrS1ZSdFZHZEJwL2hUVDFVUStRcEFHT2xZdXUvQzIwdUpESkE1aFBzYUtLeWxDTnRqMU1IbUdLcDFQZG16Ly9aIj4KCTwvaW1hZ2U+Cjwvc3ZnPg==\"}}', 4, '2023-10-12 16:22:09', '2023-10-12 16:22:09'),
(51, 'App\\Models\\Hotel', 13, '3ee77523-f4dc-45fa-be1a-d781ca61f555', 'gallery', 'maldive', 'maldive.jpg', 'image/jpeg', 'media', 'media', 32189, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"maldive___media_library_original_312_243.jpg\",\"maldive___media_library_original_261_203.jpg\",\"maldive___media_library_original_218_170.jpg\",\"maldive___media_library_original_182_142.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMzEyIDI0MyI+Cgk8aW1hZ2Ugd2lkdGg9IjMxMiIgaGVpZ2h0PSIyNDMiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQTdRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQnhkV0ZzYVhSNUlEMGdPVEFLLzlzQVF3QURBZ0lEQWdJREF3TURCQU1EQkFVSUJRVUVCQVVLQndjR0NBd0tEQXdMQ2dzTERRNFNFQTBPRVE0TEN4QVdFQkVURkJVVkZRd1BGeGdXRkJnU0ZCVVUvOXNBUXdFREJBUUZCQVVKQlFVSkZBMExEUlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVS84QUFFUWdBR1FBZ0F3RWlBQUlSQVFNUkFmL0VBQjhBQUFFRkFRRUJBUUVCQUFBQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVFBQUlCQXdNQ0JBTUZCUVFFQUFBQmZRRUNBd0FFRVFVU0lURkJCaE5SWVFjaWNSUXlnWkdoQ0NOQ3NjRVZVdEh3SkROaWNvSUpDaFlYR0JrYUpTWW5LQ2txTkRVMk56ZzVPa05FUlVaSFNFbEtVMVJWVmxkWVdWcGpaR1ZtWjJocGFuTjBkWFozZUhsNmc0U0Zob2VJaVlxU2s1U1ZscGVZbVpxaW82U2xwcWVvcWFxeXM3UzF0cmU0dWJyQ3c4VEZ4c2ZJeWNyUzA5VFYxdGZZMmRyaDR1UGs1ZWJuNk9ucThmTHo5UFgyOS9qNSt2L0VBQjhCQUFNQkFRRUJBUUVCQVFFQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVJBQUlCQWdRRUF3UUhCUVFFQUFFQ2R3QUJBZ01SQkFVaE1RWVNRVkVIWVhFVElqS0JDQlJDa2FHeHdRa2pNMUx3RldKeTBRb1dKRFRoSmZFWEdCa2FKaWNvS1NvMU5qYzRPVHBEUkVWR1IwaEpTbE5VVlZaWFdGbGFZMlJsWm1kb2FXcHpkSFYyZDNoNWVvS0RoSVdHaDRpSmlwS1RsSldXbDVpWm1xS2pwS1dtcDZpcHFyS3p0TFcydDdpNXVzTER4TVhHeDhqSnl0TFQxTlhXMTlqWjJ1TGo1T1htNStqcDZ2THo5UFgyOS9qNSt2L2FBQXdEQVFBQ0VRTVJBRDhBK3IvaWo4VzdId2Jwd2RtQkxjQVpySzhNK0pGOFg2VkhlS1FpdU00TmVVL0Y3d0RxUGpiVWxoamRsZ2dPZnJXZExxdXArQmRHdDRVSlNPTWJTYTRaWWoyYzd2WTlpR0M5dlRVWTducitwU1IyMGpLWEJybkxqWG80WEtrOGV0ZVgyZnhOVzR1TTNWNHVXT05wTmRmTG9OenJGaWwzWnY1cU1NOFY3T0Z4ZEdycHpIeCtaNWJpcUZyVTczTzc4YmVPZE44T0F2UGlMZDFKcjUyK0xIeFYwL1dyVVJXczZsUWNFS2E2Nzlwci9qeFg2VjhpM25mNjE4ek44NnN6OUZwSlUycFIzUFJkRDhNemVKdFZoZUYyOHZJSk9hK3NQQUhtYUpwc1ZzNDNLcTQ1cjU3K0MvOEF5ei9Ddm8vUy91TDlLeW8yaG9qZkZTZFJlOGYvMlE9PSI+Cgk8L2ltYWdlPgo8L3N2Zz4=\"}}', 5, '2023-10-12 16:22:09', '2023-10-12 16:22:09'),
(52, 'App\\Models\\Admin', 9, '3a59f2aa-8940-4e9f-8222-40e0a665727b', 'avatar', '5d8f8aab6f24eb26d52ba8e7', '5d8f8aab6f24eb26d52ba8e7.jpg', 'image/jpeg', 'media', 'media', 187488, '[]', '[]', '[]', '[]', 2, '2023-10-12 16:23:12', '2023-10-12 16:23:12'),
(53, 'App\\Models\\Hotel', 14, 'e2a20640-db28-4172-8cb5-934ec6656aa2', 'thumbnail', 'AorPhatthawut_Rights-approved_hotel_UGC', 'AorPhatthawut_Rights-approved_hotel_UGC.jpg', 'image/jpeg', 'media', 'media', 474884, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_1200_772.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_1003_645.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_839_540.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_702_452.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_587_378.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_491_316.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_411_264.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_344_221.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_288_185.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_241_155.jpg\",\"AorPhatthawut_Rights-approved_hotel_UGC___media_library_original_201_129.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMTIwMCA3NzIiPgoJPGltYWdlIHdpZHRoPSIxMjAwIiBoZWlnaHQ9Ijc3MiIgeGxpbms6aHJlZj0iZGF0YTppbWFnZS9qcGVnO2Jhc2U2NCwvOWovNEFBUVNrWkpSZ0FCQVFFQVlBQmdBQUQvL2dBN1ExSkZRVlJQVWpvZ1oyUXRhbkJsWnlCMk1TNHdJQ2gxYzJsdVp5QkpTa2NnU2xCRlJ5QjJOaklwTENCeGRXRnNhWFI1SUQwZ09UQUsvOXNBUXdBREFnSURBZ0lEQXdNREJBTURCQVVJQlFVRUJBVUtCd2NHQ0F3S0RBd0xDZ3NMRFE0U0VBME9FUTRMQ3hBV0VCRVRGQlVWRlF3UEZ4Z1dGQmdTRkJVVS85c0FRd0VEQkFRRkJBVUpCUVVKRkEwTERSUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVLzhBQUVRZ0FGUUFnQXdFaUFBSVJBUU1SQWYvRUFCOEFBQUVGQVFFQkFRRUJBQUFBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUUFBSUJBd01DQkFNRkJRUUVBQUFCZlFFQ0F3QUVFUVVTSVRGQkJoTlJZUWNpY1JReWdaR2hDQ05Dc2NFVlV0SHdKRE5pY29JSkNoWVhHQmthSlNZbktDa3FORFUyTnpnNU9rTkVSVVpIU0VsS1UxUlZWbGRZV1ZwalpHVm1aMmhwYW5OMGRYWjNlSGw2ZzRTRmhvZUlpWXFTazVTVmxwZVltWnFpbzZTbHBxZW9xYXF5czdTMXRyZTR1YnJDdzhURnhzZkl5Y3JTMDlUVjF0ZlkyZHJoNHVQazVlYm42T25xOGZMejlQWDI5L2o1K3YvRUFCOEJBQU1CQVFFQkFRRUJBUUVBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUkFBSUJBZ1FFQXdRSEJRUUVBQUVDZHdBQkFnTVJCQVVoTVFZU1FWRUhZWEVUSWpLQkNCUkNrYUd4d1Frak0xTHdGV0p5MFFvV0pEVGhKZkVYR0JrYUppY29LU28xTmpjNE9UcERSRVZHUjBoSlNsTlVWVlpYV0ZsYVkyUmxabWRvYVdwemRIVjJkM2g1ZW9LRGhJV0doNGlKaXBLVGxKV1dsNWlabXFLanBLV21wNmlwcXJLenRMVzJ0N2k1dXNMRHhNWEd4OGpKeXRMVDFOWFcxOWpaMnVMajVPWG01K2pwNnZMejlQWDI5L2o1K3YvYUFBd0RBUUFDRVFNUkFEOEE5ZThaZUp0SjhMNmEwOWxKNXMrT0FLODIwejlvTHhKTGNlVkRidVl3ZXVPMVhMaUMxbWtDM0RBK3hyTXQ5UnNkTDFaNHhHcEdPQUJYcFltRmZtaTY5YTNrajR5aGFzcGV3aGV4MnNQeE8xclZidTNiemhHd3hsVFVueFg4UjZyZitGV2plVU1wSElCcno0WEVXcFh4bWhMUlliN29ycXB2QzJxK0pOTU1NSWNJUjk5K2xUaWJ4amRUVmoxOEJLTTJsS0R1amovRmNMUjZuRnNrWmZwWE1tZVNEV0M1WXVjZnhVVVVzUWxPZDVIajRTck9GUGxpN0k5ditCZmcydzhSK2ZkM2FsbVhrTDJyMGpWYnJ5STN0SVkxaGpRNEcwVVVWOE5tbFdjWXVLZWgrbjVYVGhKcVRXdWgvOWs9Ij4KCTwvaW1hZ2U+Cjwvc3ZnPg==\"}}', 1, '2023-10-13 11:36:33', '2023-10-13 11:36:36');
INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(54, 'App\\Models\\Hotel', 14, 'fddbf4ba-5e57-4ad5-875e-65dc0ef47a5d', 'gallery', 'maldive copy 2', 'maldive-copy-2.jpg', 'image/jpeg', 'media', 'media', 38122, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"maldive-copy-2___media_library_original_311_240.jpg\",\"maldive-copy-2___media_library_original_260_201.jpg\",\"maldive-copy-2___media_library_original_217_167.jpg\",\"maldive-copy-2___media_library_original_182_140.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMzExIDI0MCI+Cgk8aW1hZ2Ugd2lkdGg9IjMxMSIgaGVpZ2h0PSIyNDAiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQTdRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQnhkV0ZzYVhSNUlEMGdPVEFLLzlzQVF3QURBZ0lEQWdJREF3TURCQU1EQkFVSUJRVUVCQVVLQndjR0NBd0tEQXdMQ2dzTERRNFNFQTBPRVE0TEN4QVdFQkVURkJVVkZRd1BGeGdXRkJnU0ZCVVUvOXNBUXdFREJBUUZCQVVKQlFVSkZBMExEUlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVS84QUFFUWdBR1FBZ0F3RWlBQUlSQVFNUkFmL0VBQjhBQUFFRkFRRUJBUUVCQUFBQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVFBQUlCQXdNQ0JBTUZCUVFFQUFBQmZRRUNBd0FFRVFVU0lURkJCaE5SWVFjaWNSUXlnWkdoQ0NOQ3NjRVZVdEh3SkROaWNvSUpDaFlYR0JrYUpTWW5LQ2txTkRVMk56ZzVPa05FUlVaSFNFbEtVMVJWVmxkWVdWcGpaR1ZtWjJocGFuTjBkWFozZUhsNmc0U0Zob2VJaVlxU2s1U1ZscGVZbVpxaW82U2xwcWVvcWFxeXM3UzF0cmU0dWJyQ3c4VEZ4c2ZJeWNyUzA5VFYxdGZZMmRyaDR1UGs1ZWJuNk9ucThmTHo5UFgyOS9qNSt2L0VBQjhCQUFNQkFRRUJBUUVCQVFFQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVJBQUlCQWdRRUF3UUhCUVFFQUFFQ2R3QUJBZ01SQkFVaE1RWVNRVkVIWVhFVElqS0JDQlJDa2FHeHdRa2pNMUx3RldKeTBRb1dKRFRoSmZFWEdCa2FKaWNvS1NvMU5qYzRPVHBEUkVWR1IwaEpTbE5VVlZaWFdGbGFZMlJsWm1kb2FXcHpkSFYyZDNoNWVvS0RoSVdHaDRpSmlwS1RsSldXbDVpWm1xS2pwS1dtcDZpcHFyS3p0TFcydDdpNXVzTER4TVhHeDhqSnl0TFQxTlhXMTlqWjJ1TGo1T1htNStqcDZ2THo5UFgyOS9qNSt2L2FBQXdEQVFBQ0VRTVJBRDhBL1JyVWJhMFpDMlFNVjVQNGcrSWVuYWRxejJDRU5LRDYxNXJmL0duVnZ0SXQ3Z21KWDR5YTVNZ1hQaXQ3eVc0M2hsem5OZXJWbFV3NlYyZk40V3BReDhueXh2WStqNE5mMGhiRko3bTVqakpHY0Uxeit0L0dIdzdvZ0FXNVIvb2ErVHZpWGQ2OFo1WmJlN2tTekhRZzhWNDFxdDNyRjVheVA5c2R3RDEzVjVGZkc0dVR0VDJQb01QZ01ERlhxYm4xaHJtaXphNUUxN2NSL1owWGtERmM0ZE12SWJhVjR3V1VyZ0VWNmw0bC93Q1JlYjZWekduL0FQSUZQMHJqeEdJcVZYZVRPbkJZS2hoSTJwUnRjNWJUdFBieEY0ZnVOT3VZejVuT0QzcnhieHBvMFhnNjJtdEpnVlZtNm12b2p3ci9BTWYwMWVGZnRMZjY5cTZNSlZjZExYdWNPYVlTTlZjM00xWmRELy9aIj4KCTwvaW1hZ2U+Cjwvc3ZnPg==\"}}', 2, '2023-10-13 11:36:36', '2023-10-13 11:36:36'),
(55, 'App\\Models\\Hotel', 14, 'ab76189c-df47-4c1b-b3d2-53caf93d826a', 'gallery', 'maldive copy', 'maldive-copy.jpg', 'image/jpeg', 'media', 'media', 39594, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"maldive-copy___media_library_original_319_231.jpg\",\"maldive-copy___media_library_original_266_193.jpg\",\"maldive-copy___media_library_original_223_161.jpg\",\"maldive-copy___media_library_original_186_135.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMzE5IDIzMSI+Cgk8aW1hZ2Ugd2lkdGg9IjMxOSIgaGVpZ2h0PSIyMzEiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQTdRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQnhkV0ZzYVhSNUlEMGdPVEFLLzlzQVF3QURBZ0lEQWdJREF3TURCQU1EQkFVSUJRVUVCQVVLQndjR0NBd0tEQXdMQ2dzTERRNFNFQTBPRVE0TEN4QVdFQkVURkJVVkZRd1BGeGdXRkJnU0ZCVVUvOXNBUXdFREJBUUZCQVVKQlFVSkZBMExEUlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVS84QUFFUWdBRndBZ0F3RWlBQUlSQVFNUkFmL0VBQjhBQUFFRkFRRUJBUUVCQUFBQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVFBQUlCQXdNQ0JBTUZCUVFFQUFBQmZRRUNBd0FFRVFVU0lURkJCaE5SWVFjaWNSUXlnWkdoQ0NOQ3NjRVZVdEh3SkROaWNvSUpDaFlYR0JrYUpTWW5LQ2txTkRVMk56ZzVPa05FUlVaSFNFbEtVMVJWVmxkWVdWcGpaR1ZtWjJocGFuTjBkWFozZUhsNmc0U0Zob2VJaVlxU2s1U1ZscGVZbVpxaW82U2xwcWVvcWFxeXM3UzF0cmU0dWJyQ3c4VEZ4c2ZJeWNyUzA5VFYxdGZZMmRyaDR1UGs1ZWJuNk9ucThmTHo5UFgyOS9qNSt2L0VBQjhCQUFNQkFRRUJBUUVCQVFFQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVJBQUlCQWdRRUF3UUhCUVFFQUFFQ2R3QUJBZ01SQkFVaE1RWVNRVkVIWVhFVElqS0JDQlJDa2FHeHdRa2pNMUx3RldKeTBRb1dKRFRoSmZFWEdCa2FKaWNvS1NvMU5qYzRPVHBEUkVWR1IwaEpTbE5VVlZaWFdGbGFZMlJsWm1kb2FXcHpkSFYyZDNoNWVvS0RoSVdHaDRpSmlwS1RsSldXbDVpWm1xS2pwS1dtcDZpcHFyS3p0TFcydDdpNXVzTER4TVhHeDhqSnl0TFQxTlhXMTlqWjJ1TGo1T1htNStqcDZ2THo5UFgyOS9qNSt2L2FBQXdEQVFBQ0VRTVJBRDhBK2tXOGIzMFk1d1Q2VkFmaWhkV3NvU1FCU2VtYThaMWp4ekpiNnNKUk4rNFhrZ1Z4SGlyNDZXTVdweHFBV0s4Y1Y5Sk9yVGpHVXJiSDVGaGFtYlZhdE9tNUswbHEreDlWVzN4VXVuZmFpaGlLMTRQaVRlbE0rWFh5Vm9QeHh0N2VUekdnY2h1NUZlaTZGOGRkQnVnRmxjUk4zRFVxRTZWYUhNMVppeDlmTjhEWDVLZHFrZTZPR2swdUNjUEd3SnlPcHJtTGo0WmFaUGRlYThZSnpubWlpdlFVWTh1eCtUeHgrS1ZSdFZHZEJwL2hUVDFVUStRcEFHT2xZdXUvQzIwdUpESkE1aFBzYUtLeWxDTnRqMU1IbUdLcDFQZG16Ly9aIj4KCTwvaW1hZ2U+Cjwvc3ZnPg==\"}}', 3, '2023-10-13 11:36:36', '2023-10-13 11:36:36'),
(56, 'App\\Models\\Hotel', 14, '8f5bcfef-5330-49a2-b4fe-5fab2308efef', 'gallery', 'maldive', 'maldive.jpg', 'image/jpeg', 'media', 'media', 32189, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"maldive___media_library_original_312_243.jpg\",\"maldive___media_library_original_261_203.jpg\",\"maldive___media_library_original_218_170.jpg\",\"maldive___media_library_original_182_142.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMzEyIDI0MyI+Cgk8aW1hZ2Ugd2lkdGg9IjMxMiIgaGVpZ2h0PSIyNDMiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQTdRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQnhkV0ZzYVhSNUlEMGdPVEFLLzlzQVF3QURBZ0lEQWdJREF3TURCQU1EQkFVSUJRVUVCQVVLQndjR0NBd0tEQXdMQ2dzTERRNFNFQTBPRVE0TEN4QVdFQkVURkJVVkZRd1BGeGdXRkJnU0ZCVVUvOXNBUXdFREJBUUZCQVVKQlFVSkZBMExEUlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVS84QUFFUWdBR1FBZ0F3RWlBQUlSQVFNUkFmL0VBQjhBQUFFRkFRRUJBUUVCQUFBQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVFBQUlCQXdNQ0JBTUZCUVFFQUFBQmZRRUNBd0FFRVFVU0lURkJCaE5SWVFjaWNSUXlnWkdoQ0NOQ3NjRVZVdEh3SkROaWNvSUpDaFlYR0JrYUpTWW5LQ2txTkRVMk56ZzVPa05FUlVaSFNFbEtVMVJWVmxkWVdWcGpaR1ZtWjJocGFuTjBkWFozZUhsNmc0U0Zob2VJaVlxU2s1U1ZscGVZbVpxaW82U2xwcWVvcWFxeXM3UzF0cmU0dWJyQ3c4VEZ4c2ZJeWNyUzA5VFYxdGZZMmRyaDR1UGs1ZWJuNk9ucThmTHo5UFgyOS9qNSt2L0VBQjhCQUFNQkFRRUJBUUVCQVFFQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVJBQUlCQWdRRUF3UUhCUVFFQUFFQ2R3QUJBZ01SQkFVaE1RWVNRVkVIWVhFVElqS0JDQlJDa2FHeHdRa2pNMUx3RldKeTBRb1dKRFRoSmZFWEdCa2FKaWNvS1NvMU5qYzRPVHBEUkVWR1IwaEpTbE5VVlZaWFdGbGFZMlJsWm1kb2FXcHpkSFYyZDNoNWVvS0RoSVdHaDRpSmlwS1RsSldXbDVpWm1xS2pwS1dtcDZpcHFyS3p0TFcydDdpNXVzTER4TVhHeDhqSnl0TFQxTlhXMTlqWjJ1TGo1T1htNStqcDZ2THo5UFgyOS9qNSt2L2FBQXdEQVFBQ0VRTVJBRDhBK3IvaWo4VzdId2Jwd2RtQkxjQVpySzhNK0pGOFg2VkhlS1FpdU00TmVVL0Y3d0RxUGpiVWxoamRsZ2dPZnJXZExxdXArQmRHdDRVSlNPTWJTYTRaWWoyYzd2WTlpR0M5dlRVWTducitwU1IyMGpLWEJybkxqWG80WEtrOGV0ZVgyZnhOVzR1TTNWNHVXT05wTmRmTG9OenJGaWwzWnY1cU1NOFY3T0Z4ZEdycHpIeCtaNWJpcUZyVTczTzc4YmVPZE44T0F2UGlMZDFKcjUyK0xIeFYwL1dyVVJXczZsUWNFS2E2Nzlwci9qeFg2VjhpM25mNjE4ek44NnN6OUZwSlUycFIzUFJkRDhNemVKdFZoZUYyOHZJSk9hK3NQQUhtYUpwc1ZzNDNLcTQ1cjU3K0MvOEF5ei9Ddm8vUy91TDlLeW8yaG9qZkZTZFJlOGYvMlE9PSI+Cgk8L2ltYWdlPgo8L3N2Zz4=\"}}', 4, '2023-10-13 11:36:36', '2023-10-13 11:36:36'),
(57, 'App\\Models\\Hotel', 14, '74844237-90b8-48f2-a0a4-aaa589c48ecb', 'gallery', '5d8f8aab6f24eb26d52ba8e7', '5d8f8aab6f24eb26d52ba8e7.jpg', 'image/jpeg', 'media', 'media', 187488, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"5d8f8aab6f24eb26d52ba8e7___media_library_original_1000_750.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_836_627.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_700_525.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_585_439.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_489_367.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_409_307.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_342_257.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_286_215.jpg\",\"5d8f8aab6f24eb26d52ba8e7___media_library_original_240_180.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMTAwMCA3NTAiPgoJPGltYWdlIHdpZHRoPSIxMDAwIiBoZWlnaHQ9Ijc1MCIgeGxpbms6aHJlZj0iZGF0YTppbWFnZS9qcGVnO2Jhc2U2NCwvOWovNEFBUVNrWkpSZ0FCQVFFQVlBQmdBQUQvL2dBN1ExSkZRVlJQVWpvZ1oyUXRhbkJsWnlCMk1TNHdJQ2gxYzJsdVp5QkpTa2NnU2xCRlJ5QjJOaklwTENCeGRXRnNhWFI1SUQwZ09UQUsvOXNBUXdBREFnSURBZ0lEQXdNREJBTURCQVVJQlFVRUJBVUtCd2NHQ0F3S0RBd0xDZ3NMRFE0U0VBME9FUTRMQ3hBV0VCRVRGQlVWRlF3UEZ4Z1dGQmdTRkJVVS85c0FRd0VEQkFRRkJBVUpCUVVKRkEwTERSUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVLzhBQUVRZ0FHQUFnQXdFaUFBSVJBUU1SQWYvRUFCOEFBQUVGQVFFQkFRRUJBQUFBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUUFBSUJBd01DQkFNRkJRUUVBQUFCZlFFQ0F3QUVFUVVTSVRGQkJoTlJZUWNpY1JReWdaR2hDQ05Dc2NFVlV0SHdKRE5pY29JSkNoWVhHQmthSlNZbktDa3FORFUyTnpnNU9rTkVSVVpIU0VsS1UxUlZWbGRZV1ZwalpHVm1aMmhwYW5OMGRYWjNlSGw2ZzRTRmhvZUlpWXFTazVTVmxwZVltWnFpbzZTbHBxZW9xYXF5czdTMXRyZTR1YnJDdzhURnhzZkl5Y3JTMDlUVjF0ZlkyZHJoNHVQazVlYm42T25xOGZMejlQWDI5L2o1K3YvRUFCOEJBQU1CQVFFQkFRRUJBUUVBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUkFBSUJBZ1FFQXdRSEJRUUVBQUVDZHdBQkFnTVJCQVVoTVFZU1FWRUhZWEVUSWpLQkNCUkNrYUd4d1Frak0xTHdGV0p5MFFvV0pEVGhKZkVYR0JrYUppY29LU28xTmpjNE9UcERSRVZHUjBoSlNsTlVWVlpYV0ZsYVkyUmxabWRvYVdwemRIVjJkM2g1ZW9LRGhJV0doNGlKaXBLVGxKV1dsNWlabXFLanBLV21wNmlwcXJLenRMVzJ0N2k1dXNMRHhNWEd4OGpKeXRMVDFOWFcxOWpaMnVMajVPWG01K2pwNnZMejlQWDI5L2o1K3YvYUFBd0RBUUFDRVFNUkFEOEErZjdqU1pyNjFndFlvMkxrNDZWNkphZUNkVThQK0hvaThEQU9PcEZldWVHZmhsWi8ybmF1VlhkdUhCRmZSTng4S2JQWGRGV09VS2lvZ3h4WFpWd3NhY1UxSzU1dUF6R1dLbkpUZzQyN255SDRSOE02dFBwYnpHM2J5Z0Q4MkttOEg2UGMydXBYTFNLY0ZxK25iancvWitIdkM5MVl3YlhaVlBJNjE0RGFYYjJGL2NCZ2Z2SHRYSEtoN3ZOYzlaNHZrcUtGcm50UGhqUVd2Wkd1Z20xWVJ1ckl0ZmpxOW40b2wwVzZrMndrN0FhS0tWQ043SnMzck5SVGFTTzFQaGk2dnJLNTFHM21NdHN5RnNHdk5WdHRQTHlDYUpTKzQ1NG9vcXNRM0dGa1pVWXFyTzhrZi8vWiI+Cgk8L2ltYWdlPgo8L3N2Zz4=\"}}', 5, '2023-10-13 11:36:36', '2023-10-13 11:36:37'),
(58, 'App\\Models\\Hotel', 12, 'a1bf4670-86bc-4dd3-b51d-175996e546f5', 'thumbnail', 'White-Lotus-Hue-Hotel-Exterior', 'White-Lotus-Hue-Hotel-Exterior.jpeg', 'image/jpeg', 'media', 'media', 131668, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"White-Lotus-Hue-Hotel-Exterior___media_library_original_1280_853.jpeg\",\"White-Lotus-Hue-Hotel-Exterior___media_library_original_1070_713.jpeg\",\"White-Lotus-Hue-Hotel-Exterior___media_library_original_896_597.jpeg\",\"White-Lotus-Hue-Hotel-Exterior___media_library_original_749_499.jpeg\",\"White-Lotus-Hue-Hotel-Exterior___media_library_original_627_418.jpeg\",\"White-Lotus-Hue-Hotel-Exterior___media_library_original_524_349.jpeg\",\"White-Lotus-Hue-Hotel-Exterior___media_library_original_439_293.jpeg\",\"White-Lotus-Hue-Hotel-Exterior___media_library_original_367_245.jpeg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMTI4MCA4NTMiPgoJPGltYWdlIHdpZHRoPSIxMjgwIiBoZWlnaHQ9Ijg1MyIgeGxpbms6aHJlZj0iZGF0YTppbWFnZS9qcGVnO2Jhc2U2NCwvOWovNEFBUVNrWkpSZ0FCQVFFQVlBQmdBQUQvL2dBN1ExSkZRVlJQVWpvZ1oyUXRhbkJsWnlCMk1TNHdJQ2gxYzJsdVp5QkpTa2NnU2xCRlJ5QjJOaklwTENCeGRXRnNhWFI1SUQwZ09UQUsvOXNBUXdBREFnSURBZ0lEQXdNREJBTURCQVVJQlFVRUJBVUtCd2NHQ0F3S0RBd0xDZ3NMRFE0U0VBME9FUTRMQ3hBV0VCRVRGQlVWRlF3UEZ4Z1dGQmdTRkJVVS85c0FRd0VEQkFRRkJBVUpCUVVKRkEwTERSUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVLzhBQUVRZ0FGUUFnQXdFaUFBSVJBUU1SQWYvRUFCOEFBQUVGQVFFQkFRRUJBQUFBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUUFBSUJBd01DQkFNRkJRUUVBQUFCZlFFQ0F3QUVFUVVTSVRGQkJoTlJZUWNpY1JReWdaR2hDQ05Dc2NFVlV0SHdKRE5pY29JSkNoWVhHQmthSlNZbktDa3FORFUyTnpnNU9rTkVSVVpIU0VsS1UxUlZWbGRZV1ZwalpHVm1aMmhwYW5OMGRYWjNlSGw2ZzRTRmhvZUlpWXFTazVTVmxwZVltWnFpbzZTbHBxZW9xYXF5czdTMXRyZTR1YnJDdzhURnhzZkl5Y3JTMDlUVjF0ZlkyZHJoNHVQazVlYm42T25xOGZMejlQWDI5L2o1K3YvRUFCOEJBQU1CQVFFQkFRRUJBUUVBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUkFBSUJBZ1FFQXdRSEJRUUVBQUVDZHdBQkFnTVJCQVVoTVFZU1FWRUhZWEVUSWpLQkNCUkNrYUd4d1Frak0xTHdGV0p5MFFvV0pEVGhKZkVYR0JrYUppY29LU28xTmpjNE9UcERSRVZHUjBoSlNsTlVWVlpYV0ZsYVkyUmxabWRvYVdwemRIVjJkM2g1ZW9LRGhJV0doNGlKaXBLVGxKV1dsNWlabXFLanBLV21wNmlwcXJLenRMVzJ0N2k1dXNMRHhNWEd4OGpKeXRMVDFOWFcxOWpaMnVMajVPWG01K2pwNnZMejlQWDI5L2o1K3YvYUFBd0RBUUFDRVFNUkFEOEE0YjlrUHhwY2VIUGlQYnJPQ2daZ0NEWDZrYWY0MXQ1REZNeHdDb3I4d3ZnWG9pK0l2aVFubGhZSFJnZlN2MEYreFc5anBzS1RYS0x0VVpPYTRLVlJxTHVPbkZ5MlpUK1BIamtyb053MXV1OVFoeml2ejY4RmF2OEEyMzhWSnBiaFBMakRuclgzRDQ4dDdieFJvTjFZNmRNSHVDaEdjMThrYVo4RS9FR2llTEpMeTRVbVBjU05vcktkT05TYW1kcWNsSGxLM2dQVFUwRHhCTmYycnNreWpJcnM5WitMdXV6MnJvMHZBNHptaWl2SGpKOHU1M1VJUlVVa2lmNFplT3RVT29zV21MYmp6azE3OXAwbjlvb2p6S0dKOXFLSzY4RzIyeDR5S1NWai85az0iPgoJPC9pbWFnZT4KPC9zdmc+\"}}', 5, '2023-10-14 16:46:40', '2023-10-14 16:46:42'),
(59, 'App\\Models\\Hotel', 5, 'f47b0d67-df47-40a4-8539-a6b80809a7be', 'thumbnail', 'elangeveld_2347_1568446295', 'elangeveld_2347_1568446295.jpg', 'image/jpeg', 'media', 'media', 269550, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"elangeveld_2347_1568446295___media_library_original_968_643.jpg\",\"elangeveld_2347_1568446295___media_library_original_809_537.jpg\",\"elangeveld_2347_1568446295___media_library_original_677_450.jpg\",\"elangeveld_2347_1568446295___media_library_original_566_376.jpg\",\"elangeveld_2347_1568446295___media_library_original_474_315.jpg\",\"elangeveld_2347_1568446295___media_library_original_396_263.jpg\",\"elangeveld_2347_1568446295___media_library_original_332_221.jpg\",\"elangeveld_2347_1568446295___media_library_original_277_184.jpg\",\"elangeveld_2347_1568446295___media_library_original_232_154.jpg\",\"elangeveld_2347_1568446295___media_library_original_194_129.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgOTY4IDY0MyI+Cgk8aW1hZ2Ugd2lkdGg9Ijk2OCIgaGVpZ2h0PSI2NDMiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQTdRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQnhkV0ZzYVhSNUlEMGdPVEFLLzlzQVF3QURBZ0lEQWdJREF3TURCQU1EQkFVSUJRVUVCQVVLQndjR0NBd0tEQXdMQ2dzTERRNFNFQTBPRVE0TEN4QVdFQkVURkJVVkZRd1BGeGdXRkJnU0ZCVVUvOXNBUXdFREJBUUZCQVVKQlFVSkZBMExEUlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVS84QUFFUWdBRlFBZ0F3RWlBQUlSQVFNUkFmL0VBQjhBQUFFRkFRRUJBUUVCQUFBQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVFBQUlCQXdNQ0JBTUZCUVFFQUFBQmZRRUNBd0FFRVFVU0lURkJCaE5SWVFjaWNSUXlnWkdoQ0NOQ3NjRVZVdEh3SkROaWNvSUpDaFlYR0JrYUpTWW5LQ2txTkRVMk56ZzVPa05FUlVaSFNFbEtVMVJWVmxkWVdWcGpaR1ZtWjJocGFuTjBkWFozZUhsNmc0U0Zob2VJaVlxU2s1U1ZscGVZbVpxaW82U2xwcWVvcWFxeXM3UzF0cmU0dWJyQ3c4VEZ4c2ZJeWNyUzA5VFYxdGZZMmRyaDR1UGs1ZWJuNk9ucThmTHo5UFgyOS9qNSt2L0VBQjhCQUFNQkFRRUJBUUVCQVFFQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVJBQUlCQWdRRUF3UUhCUVFFQUFFQ2R3QUJBZ01SQkFVaE1RWVNRVkVIWVhFVElqS0JDQlJDa2FHeHdRa2pNMUx3RldKeTBRb1dKRFRoSmZFWEdCa2FKaWNvS1NvMU5qYzRPVHBEUkVWR1IwaEpTbE5VVlZaWFdGbGFZMlJsWm1kb2FXcHpkSFYyZDNoNWVvS0RoSVdHaDRpSmlwS1RsSldXbDVpWm1xS2pwS1dtcDZpcHFyS3p0TFcydDdpNXVzTER4TVhHeDhqSnl0TFQxTlhXMTlqWjJ1TGo1T1htNStqcDZ2THo5UFgyOS9qNSt2L2FBQXdEQVFBQ0VRTVJBRDhBOUorQzNpVCt5TFJtQ0ZsSFUxMC9qcjR3MldxK0g3NnhqR0pGSE5jRjRaY2VEdERtanU0ejVwVWpHSzh6bjEwalVMaG1oY3hTdHlTSzh5RlNwUnB4Vmo2ZXRoNldKcjFKcDc3SDBoOEpmSFZ2YmVGbzBsNFB2WEpmR0xYSTladkl6SDBBckYwYzNNMmh4Sll3SFlCbklGWWV0V09yM0RNWGpMT09paW5pS3ZQVGxHSkdCdy9zc1JDYzlrZTJlS2REdExyVEpKWGlHNCsxY0ZkK0Y5UC9BTEljZVNwSjV6am1paXV0cE5hbkpGdFBRNno0VlFJc0p0aW9hTWRNaXU4VHdwWVBxUG5HSUZ2VEZGRmMxTmFIVlhiVFAvL1oiPgoJPC9pbWFnZT4KPC9zdmc+\"}}', 3, '2023-10-14 16:49:41', '2023-10-14 16:49:43'),
(60, 'App\\Models\\Hotel', 5, '47024af6-5c22-41fe-9cb9-4ceec2f40f0c', 'gallery', 'maldive', 'maldive.jpg', 'image/jpeg', 'media', 'media', 32189, '[]', '[]', '[]', '{\"media_library_original\":{\"urls\":[\"maldive___media_library_original_312_243.jpg\",\"maldive___media_library_original_261_203.jpg\",\"maldive___media_library_original_218_170.jpg\",\"maldive___media_library_original_182_142.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMzEyIDI0MyI+Cgk8aW1hZ2Ugd2lkdGg9IjMxMiIgaGVpZ2h0PSIyNDMiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQTdRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQnhkV0ZzYVhSNUlEMGdPVEFLLzlzQVF3QURBZ0lEQWdJREF3TURCQU1EQkFVSUJRVUVCQVVLQndjR0NBd0tEQXdMQ2dzTERRNFNFQTBPRVE0TEN4QVdFQkVURkJVVkZRd1BGeGdXRkJnU0ZCVVUvOXNBUXdFREJBUUZCQVVKQlFVSkZBMExEUlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVUZCUVVGQlFVRkJRVS84QUFFUWdBR1FBZ0F3RWlBQUlSQVFNUkFmL0VBQjhBQUFFRkFRRUJBUUVCQUFBQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVFBQUlCQXdNQ0JBTUZCUVFFQUFBQmZRRUNBd0FFRVFVU0lURkJCaE5SWVFjaWNSUXlnWkdoQ0NOQ3NjRVZVdEh3SkROaWNvSUpDaFlYR0JrYUpTWW5LQ2txTkRVMk56ZzVPa05FUlVaSFNFbEtVMVJWVmxkWVdWcGpaR1ZtWjJocGFuTjBkWFozZUhsNmc0U0Zob2VJaVlxU2s1U1ZscGVZbVpxaW82U2xwcWVvcWFxeXM3UzF0cmU0dWJyQ3c4VEZ4c2ZJeWNyUzA5VFYxdGZZMmRyaDR1UGs1ZWJuNk9ucThmTHo5UFgyOS9qNSt2L0VBQjhCQUFNQkFRRUJBUUVCQVFFQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVJBQUlCQWdRRUF3UUhCUVFFQUFFQ2R3QUJBZ01SQkFVaE1RWVNRVkVIWVhFVElqS0JDQlJDa2FHeHdRa2pNMUx3RldKeTBRb1dKRFRoSmZFWEdCa2FKaWNvS1NvMU5qYzRPVHBEUkVWR1IwaEpTbE5VVlZaWFdGbGFZMlJsWm1kb2FXcHpkSFYyZDNoNWVvS0RoSVdHaDRpSmlwS1RsSldXbDVpWm1xS2pwS1dtcDZpcHFyS3p0TFcydDdpNXVzTER4TVhHeDhqSnl0TFQxTlhXMTlqWjJ1TGo1T1htNStqcDZ2THo5UFgyOS9qNSt2L2FBQXdEQVFBQ0VRTVJBRDhBK3IvaWo4VzdId2Jwd2RtQkxjQVpySzhNK0pGOFg2VkhlS1FpdU00TmVVL0Y3d0RxUGpiVWxoamRsZ2dPZnJXZExxdXArQmRHdDRVSlNPTWJTYTRaWWoyYzd2WTlpR0M5dlRVWTducitwU1IyMGpLWEJybkxqWG80WEtrOGV0ZVgyZnhOVzR1TTNWNHVXT05wTmRmTG9OenJGaWwzWnY1cU1NOFY3T0Z4ZEdycHpIeCtaNWJpcUZyVTczTzc4YmVPZE44T0F2UGlMZDFKcjUyK0xIeFYwL1dyVVJXczZsUWNFS2E2Nzlwci9qeFg2VjhpM25mNjE4ek44NnN6OUZwSlUycFIzUFJkRDhNemVKdFZoZUYyOHZJSk9hK3NQQUhtYUpwc1ZzNDNLcTQ1cjU3K0MvOEF5ei9Ddm8vUy91TDlLeW8yaG9qZkZTZFJlOGYvMlE9PSI+Cgk8L2ltYWdlPgo8L3N2Zz4=\"}}', 4, '2023-10-14 16:49:43', '2023-10-14 16:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_admins_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_12_123319_create_permission_tables', 1),
(6, '2023_08_12_141617_create_parent_hotels_table', 1),
(7, '2023_08_12_141618_create_hotels_table', 1),
(8, '2023_08_12_170119_create_hotel_categories_table', 1),
(9, '2023_08_12_170132_create_hotel_tags_table', 1),
(10, '2023_08_12_170156_create_hotel_services_table', 1),
(11, '2023_08_12_193746_create_media_table', 1),
(12, '2023_08_13_004708_create_hotel_category_table', 1),
(13, '2023_08_13_004726_create_hotel_service_table', 1),
(14, '2023_08_13_004742_create_hotel_tag_table', 1),
(15, '2023_08_13_011121_create_hotel_ratings_table', 1),
(16, '2023_08_21_111926_create_customer_users_table', 1),
(17, '2023_09_06_132032_create_customer_favorite_hotels_table', 1),
(18, '2023_09_06_152146_create_faqs_table', 1),
(19, '2023_09_07_172434_create_terms_of_service_sections_table', 1),
(20, '2023_09_24_151514_create_hotel_opinions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parent_hotels`
--

CREATE TABLE `parent_hotels` (
  `id` bigint UNSIGNED NOT NULL,
  `google_place_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_rating` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_total_reviews` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `best_rating` float(10,1) NOT NULL DEFAULT '0.0',
  `best_rating_type` enum('romantic','intimate','luxury') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_count` int NOT NULL DEFAULT '0',
  `romantic_avg` float(10,1) NOT NULL DEFAULT '0.0',
  `intimate_avg` float(10,1) NOT NULL DEFAULT '0.0',
  `luxury_avg` float(10,1) NOT NULL DEFAULT '0.0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_hotels`
--

INSERT INTO `parent_hotels` (`id`, `google_place_id`, `title`, `address`, `city_country`, `google_rating`, `google_total_reviews`, `best_rating`, `best_rating_type`, `rating_count`, `romantic_avg`, `intimate_avg`, `luxury_avg`, `created_at`, `updated_at`, `sync_date`) VALUES
(3, 'ChIJ3bqk52iJERMRKVW86R_66yU', 'SPA ROOM SICILIA', 'Via Derna, 18, 96019 Rosolini SR, Italy', 'Rosolini, Italy', '4.8', '94', 5.0, 'intimate', 6, 4.0, 6.0, 5.0, '2023-09-28 12:36:55', '2023-10-17 16:46:04', '2023-10-14 16:49:41'),
(4, 'ChIJr-fnlkm3RzsR_afdNoiJ91s', 'Hotel Riu Atoll', 'Gadifuri-Maafushi Island, Maldives', 'Maldives', '4.6', '1105', 3.3, 'romantic', 3, 4.0, 3.0, 3.0, '2023-10-02 08:58:06', '2023-10-17 16:46:05', '2023-10-13 03:33:14'),
(5, 'ChIJAXj2HSV4AzER9criVmitojQ', 'Maldives Beach Resort', '33/2 Moo 4 Leam Sadej Beach T.Klong Kud A Tambon Khlong Khut, Amphoe Tha Mai, Chang Wat Chanthaburi 22120, Thailand', 'Tambon Khlong Khut, Thailand', '4.1', '1035', 6.8, 'romantic', 6, 8.0, 5.5, 7.0, '2023-10-03 15:34:26', '2023-10-17 16:46:05', '2023-10-13 03:33:14'),
(6, 'ChIJ2Ti8x_hgLxMRXimOeq7uheo', 'Hotel de Russie', 'Via del Babuino, 9, 00187 Roma RM, Italia', 'Lazio, Italia', '4.6', '1443', 6.0, 'romantic', 3, 8.0, 4.0, 6.0, '2023-10-10 09:36:21', '2023-10-17 16:46:04', '2023-10-13 03:33:14'),
(9, 'ChIJ-SA4x6POExMR0dc0vz3G1ro', 'Re Dionisio Boutique Hotel', 'Riviera Dionisio Il Grande, 66, 96100 Siracusa SR, Italy', 'Sicilia, Italy', '4.5', '118', 8.0, 'luxury', 3, 7.0, 8.0, 9.0, '2023-10-11 08:54:49', '2023-10-17 16:46:04', '2023-10-14 16:46:40'),
(10, 'ChIJ9YP8o5ARFBMR_E1xbBOrJh8', 'UNAHOTELS Capotaormina', 'Via Nazionale, 105, 98039 Taormina ME, Italia', 'Sicilia, Italia', '4.7', '1332', 5.0, 'luxury', 3, 4.0, 5.0, 6.0, '2023-10-12 16:22:00', '2023-10-17 16:46:04', '2023-10-13 03:33:14'),
(11, 'ChIJOZhS377OExMRvBBGJX7bUIo', 'UNAHOTELS One Siracusa', 'Via Diodoro Siculo, 4, 96100 Siracusa SR, Italia', 'Sicilia, Italia', '4.3', '760', 4.3, 'intimate', 6, 4.0, 6.5, 2.5, '2023-10-13 11:36:33', '2024-03-13 00:12:41', '2023-10-13 13:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2023-09-27 07:30:53', '2023-09-27 07:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms_of_service_sections`
--

CREATE TABLE `terms_of_service_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_of_service_sections`
--

INSERT INTO `terms_of_service_sections` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>\r\n<p>&nbsp;</p>\r\n<p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>\r\n<p>&nbsp;</p>\r\n<p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim a</p>\r\n<p>\"WWG unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>', '2023-09-27 07:30:54', '2023-10-23 15:45:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `customer_favorite_hotels`
--
ALTER TABLE `customer_favorite_hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_favorite_hotels_hotel_id_foreign` (`hotel_id`),
  ADD KEY `customer_favorite_hotels_customer_user_id_foreign` (`customer_user_id`);

--
-- Indexes for table `customer_users`
--
ALTER TABLE `customer_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_users_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hotels_slug_unique` (`slug`),
  ADD KEY `hotels_admin_id_foreign` (`admin_id`),
  ADD KEY `hotels_parent_hotel_id_foreign` (`parent_hotel_id`);

--
-- Indexes for table `hotel_categories`
--
ALTER TABLE `hotel_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hotel_categories_slug_unique` (`slug`);

--
-- Indexes for table `hotel_category`
--
ALTER TABLE `hotel_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_category_hotel_id_foreign` (`hotel_id`),
  ADD KEY `hotel_category_hotel_category_id_foreign` (`hotel_category_id`);

--
-- Indexes for table `hotel_opinions`
--
ALTER TABLE `hotel_opinions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_opinions_parent_hotel_id_foreign` (`parent_hotel_id`),
  ADD KEY `hotel_opinions_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `hotel_ratings`
--
ALTER TABLE `hotel_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_ratings_parent_hotel_id_foreign` (`parent_hotel_id`),
  ADD KEY `hotel_ratings_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `hotel_service`
--
ALTER TABLE `hotel_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_service_hotel_id_foreign` (`hotel_id`),
  ADD KEY `hotel_service_hotel_service_id_foreign` (`hotel_service_id`);

--
-- Indexes for table `hotel_services`
--
ALTER TABLE `hotel_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hotel_services_icon_class_unique` (`icon_class`),
  ADD UNIQUE KEY `hotel_services_slug_unique` (`slug`);

--
-- Indexes for table `hotel_tag`
--
ALTER TABLE `hotel_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_tag_hotel_id_foreign` (`hotel_id`),
  ADD KEY `hotel_tag_hotel_tag_id_foreign` (`hotel_tag_id`);

--
-- Indexes for table `hotel_tags`
--
ALTER TABLE `hotel_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hotel_tags_slug_unique` (`slug`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `parent_hotels`
--
ALTER TABLE `parent_hotels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parent_hotels_google_place_id_unique` (`google_place_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `terms_of_service_sections`
--
ALTER TABLE `terms_of_service_sections`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_favorite_hotels`
--
ALTER TABLE `customer_favorite_hotels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `customer_users`
--
ALTER TABLE `customer_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hotel_categories`
--
ALTER TABLE `hotel_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hotel_category`
--
ALTER TABLE `hotel_category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hotel_opinions`
--
ALTER TABLE `hotel_opinions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hotel_ratings`
--
ALTER TABLE `hotel_ratings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `hotel_service`
--
ALTER TABLE `hotel_service`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hotel_services`
--
ALTER TABLE `hotel_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotel_tag`
--
ALTER TABLE `hotel_tag`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `hotel_tags`
--
ALTER TABLE `hotel_tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `parent_hotels`
--
ALTER TABLE `parent_hotels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_of_service_sections`
--
ALTER TABLE `terms_of_service_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_favorite_hotels`
--
ALTER TABLE `customer_favorite_hotels`
  ADD CONSTRAINT `customer_favorite_hotels_customer_user_id_foreign` FOREIGN KEY (`customer_user_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_favorite_hotels_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotels_parent_hotel_id_foreign` FOREIGN KEY (`parent_hotel_id`) REFERENCES `parent_hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotel_category`
--
ALTER TABLE `hotel_category`
  ADD CONSTRAINT `hotel_category_hotel_category_id_foreign` FOREIGN KEY (`hotel_category_id`) REFERENCES `hotel_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hotel_category_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotel_opinions`
--
ALTER TABLE `hotel_opinions`
  ADD CONSTRAINT `hotel_opinions_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotel_opinions_parent_hotel_id_foreign` FOREIGN KEY (`parent_hotel_id`) REFERENCES `parent_hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotel_ratings`
--
ALTER TABLE `hotel_ratings`
  ADD CONSTRAINT `hotel_ratings_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hotel_ratings_parent_hotel_id_foreign` FOREIGN KEY (`parent_hotel_id`) REFERENCES `parent_hotels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotel_service`
--
ALTER TABLE `hotel_service`
  ADD CONSTRAINT `hotel_service_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hotel_service_hotel_service_id_foreign` FOREIGN KEY (`hotel_service_id`) REFERENCES `hotel_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotel_tag`
--
ALTER TABLE `hotel_tag`
  ADD CONSTRAINT `hotel_tag_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hotel_tag_hotel_tag_id_foreign` FOREIGN KEY (`hotel_tag_id`) REFERENCES `hotel_tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
