-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2026 at 06:38 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemtiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id` bigint UNSIGNED NOT NULL,
  `idPemesanan` bigint UNSIGNED NOT NULL,
  `idTiket` bigint UNSIGNED NOT NULL,
  `kuantitas` int NOT NULL,
  `subtotal` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id`, `idPemesanan`, `idTiket`, `kuantitas`, `subtotal`, `created_at`, `updated_at`) VALUES
(11, 14, 3, 1, 30000, '2026-01-18 22:28:50', '2026-01-18 22:28:50'),
(13, 16, 4, 1, 50000, '2026-01-18 22:31:27', '2026-01-18 22:31:27'),
(15, 18, 4, 1, 50000, '2026-01-18 23:26:50', '2026-01-18 23:26:50'),
(24, 24, 4, 5, 250000, '2026-01-19 00:42:07', '2026-01-19 00:42:07'),
(25, 24, 3, 1, 30000, '2026-01-19 00:42:07', '2026-01-19 00:42:07'),
(26, 25, 4, 2, 100000, '2026-01-19 17:50:39', '2026-01-19 17:50:39'),
(27, 25, 6, 1, 30000, '2026-01-19 17:50:39', '2026-01-19 17:50:39'),
(28, 25, 3, 1, 30000, '2026-01-19 17:50:39', '2026-01-19 17:50:39'),
(29, 26, 4, 2, 100000, '2026-01-19 17:59:28', '2026-01-19 17:59:28'),
(30, 27, 4, 2, 100000, '2026-01-19 17:59:51', '2026-01-19 17:59:51'),
(31, 27, 3, 1, 30000, '2026-01-19 17:59:51', '2026-01-19 17:59:51'),
(32, 28, 4, 5, 250000, '2026-01-19 18:27:00', '2026-01-19 18:27:00'),
(33, 29, 3, 1, 30000, '2026-01-19 18:34:46', '2026-01-19 18:34:46'),
(34, 29, 4, 1, 50000, '2026-01-19 18:34:46', '2026-01-19 18:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kursi_vip`
--

CREATE TABLE `kursi_vip` (
  `id` bigint UNSIGNED NOT NULL,
  `pertandingan_id` bigint UNSIGNED NOT NULL,
  `nomor_kursi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('tersedia','dipesan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tersedia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kursi_vip`
--

INSERT INTO `kursi_vip` (`id`, `pertandingan_id`, `nomor_kursi`, `status`, `created_at`, `updated_at`) VALUES
(351, 4, 'ADC1', 'dipesan', '2026-01-18 22:30:18', '2026-01-19 00:42:07'),
(352, 4, 'ADC2', 'dipesan', '2026-01-18 22:30:19', '2026-01-19 00:42:07'),
(353, 4, 'ADC3', 'dipesan', '2026-01-18 22:30:19', '2026-01-19 00:42:07'),
(354, 4, 'ADC4', 'dipesan', '2026-01-18 22:30:19', '2026-01-19 00:42:07'),
(355, 4, 'ADC5', 'dipesan', '2026-01-18 22:30:19', '2026-01-19 00:42:07'),
(356, 4, 'ADC6', 'dipesan', '2026-01-18 22:30:19', '2026-01-19 17:50:39'),
(357, 4, 'ADC7', 'dipesan', '2026-01-18 22:30:19', '2026-01-19 17:50:39'),
(358, 4, 'ADC8', 'dipesan', '2026-01-18 22:30:19', '2026-01-19 17:59:28'),
(359, 4, 'ADC9', 'dipesan', '2026-01-18 22:30:19', '2026-01-19 17:59:28'),
(360, 4, 'ADC10', 'dipesan', '2026-01-18 22:30:19', '2026-01-19 17:59:51'),
(361, 4, 'ADC11', 'dipesan', '2026-01-18 22:30:19', '2026-01-19 17:59:51'),
(362, 4, 'ADC12', 'dipesan', '2026-01-18 22:30:19', '2026-01-19 18:27:00'),
(363, 4, 'ADC13', 'dipesan', '2026-01-18 22:30:19', '2026-01-19 18:27:00'),
(364, 4, 'ADC14', 'dipesan', '2026-01-18 22:30:19', '2026-01-19 18:27:00'),
(365, 4, 'ADC15', 'dipesan', '2026-01-18 22:30:19', '2026-01-19 18:27:00'),
(366, 4, 'ADC16', 'dipesan', '2026-01-18 22:30:19', '2026-01-19 18:27:00'),
(367, 4, 'ADC17', 'dipesan', '2026-01-18 22:30:19', '2026-01-19 18:34:46'),
(368, 4, 'ADC18', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(369, 4, 'ADC19', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(370, 4, 'ADC20', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(371, 4, 'ADC21', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(372, 4, 'ADC22', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(373, 4, 'ADC23', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(374, 4, 'ADC24', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(375, 4, 'ADC25', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(376, 4, 'ADC26', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(377, 4, 'ADC27', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(378, 4, 'ADC28', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(379, 4, 'ADC29', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(380, 4, 'ADC30', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(381, 4, 'ADC31', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(382, 4, 'ADC32', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(383, 4, 'ADC33', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(384, 4, 'ADC34', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(385, 4, 'ADC35', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(386, 4, 'ADC36', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(387, 4, 'ADC37', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(388, 4, 'ADC38', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(389, 4, 'ADC39', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(390, 4, 'ADC40', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(391, 4, 'ADC41', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(392, 4, 'ADC42', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(393, 4, 'ADC43', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(394, 4, 'ADC44', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(395, 4, 'ADC45', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(396, 4, 'ADC46', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(397, 4, 'ADC47', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(398, 4, 'ADC48', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(399, 4, 'ADC49', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(400, 4, 'ADC50', 'tersedia', '2026-01-18 22:30:19', '2026-01-18 22:30:19'),
(401, 4, 'ADC1', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(402, 4, 'ADC2', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(403, 4, 'ADC3', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(404, 4, 'ADC4', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(405, 4, 'ADC5', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(406, 4, 'ADC6', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(407, 4, 'ADC7', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(408, 4, 'ADC8', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(409, 4, 'ADC9', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(410, 4, 'ADC10', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(411, 4, 'ADC11', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(412, 4, 'ADC12', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(413, 4, 'ADC13', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(414, 4, 'ADC14', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(415, 4, 'ADC15', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(416, 4, 'ADC16', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(417, 4, 'ADC17', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(418, 4, 'ADC18', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(419, 4, 'ADC19', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(420, 4, 'ADC20', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(421, 4, 'ADC21', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(422, 4, 'ADC22', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(423, 4, 'ADC23', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(424, 4, 'ADC24', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(425, 4, 'ADC25', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(426, 4, 'ADC26', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(427, 4, 'ADC27', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(428, 4, 'ADC28', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(429, 4, 'ADC29', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(430, 4, 'ADC30', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(431, 4, 'ADC31', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(432, 4, 'ADC32', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(433, 4, 'ADC33', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(434, 4, 'ADC34', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(435, 4, 'ADC35', 'tersedia', '2026-01-19 17:49:33', '2026-01-19 17:49:33'),
(436, 4, 'ADC36', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(437, 4, 'ADC37', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(438, 4, 'ADC38', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(439, 4, 'ADC39', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(440, 4, 'ADC40', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(441, 4, 'ADC41', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(442, 4, 'ADC42', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(443, 4, 'ADC43', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(444, 4, 'ADC44', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(445, 4, 'ADC45', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(446, 4, 'ADC46', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(447, 4, 'ADC47', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(448, 4, 'ADC48', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(449, 4, 'ADC49', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(450, 4, 'ADC50', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(451, 4, 'ADC51', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(452, 4, 'ADC52', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(453, 4, 'ADC53', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(454, 4, 'ADC54', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(455, 4, 'ADC55', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(456, 4, 'ADC56', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(457, 4, 'ADC57', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(458, 4, 'ADC58', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(459, 4, 'ADC59', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(460, 4, 'ADC60', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(461, 4, 'ADC61', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(462, 4, 'ADC62', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(463, 4, 'ADC63', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(464, 4, 'ADC64', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(465, 4, 'ADC65', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(466, 4, 'ADC66', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(467, 4, 'ADC67', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(468, 4, 'ADC68', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(469, 4, 'ADC69', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(470, 4, 'ADC70', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(471, 4, 'ADC71', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(472, 4, 'ADC72', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(473, 4, 'ADC73', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(474, 4, 'ADC74', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(475, 4, 'ADC75', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(476, 4, 'ADC76', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(477, 4, 'ADC77', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(478, 4, 'ADC78', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(479, 4, 'ADC79', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(480, 4, 'ADC80', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(481, 4, 'ADC81', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(482, 4, 'ADC82', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(483, 4, 'ADC83', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(484, 4, 'ADC84', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(485, 4, 'ADC85', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(486, 4, 'ADC86', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(487, 4, 'ADC87', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(488, 4, 'ADC88', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(489, 4, 'ADC89', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(490, 4, 'ADC90', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(491, 4, 'ADC91', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(492, 4, 'ADC92', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(493, 4, 'ADC93', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(494, 4, 'ADC94', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(495, 4, 'ADC95', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(496, 4, 'ADC96', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(497, 4, 'ADC97', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(498, 4, 'ADC98', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(499, 4, 'ADC99', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(500, 4, 'ADC100', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(501, 4, 'ADC101', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(502, 4, 'ADC102', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(503, 4, 'ADC103', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(504, 4, 'ADC104', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(505, 4, 'ADC105', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(506, 4, 'ADC106', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(507, 4, 'ADC107', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(508, 4, 'ADC108', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(509, 4, 'ADC109', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(510, 4, 'ADC110', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(511, 4, 'ADC111', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(512, 4, 'ADC112', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(513, 4, 'ADC113', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(514, 4, 'ADC114', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(515, 4, 'ADC115', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(516, 4, 'ADC116', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(517, 4, 'ADC117', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(518, 4, 'ADC118', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(519, 4, 'ADC119', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(520, 4, 'ADC120', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(521, 4, 'ADC121', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(522, 4, 'ADC122', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(523, 4, 'ADC123', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(524, 4, 'ADC124', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(525, 4, 'ADC125', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(526, 4, 'ADC126', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(527, 4, 'ADC127', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(528, 4, 'ADC128', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(529, 4, 'ADC129', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(530, 4, 'ADC130', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(531, 4, 'ADC131', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(532, 4, 'ADC132', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(533, 4, 'ADC133', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(534, 4, 'ADC134', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(535, 4, 'ADC135', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(536, 4, 'ADC136', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(537, 4, 'ADC137', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(538, 4, 'ADC138', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(539, 4, 'ADC139', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(540, 4, 'ADC140', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(541, 4, 'ADC141', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(542, 4, 'ADC142', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(543, 4, 'ADC143', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(544, 4, 'ADC144', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(545, 4, 'ADC145', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(546, 4, 'ADC146', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(547, 4, 'ADC147', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(548, 4, 'ADC148', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(549, 4, 'ADC149', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(550, 4, 'ADC150', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(551, 4, 'ADC151', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(552, 4, 'ADC152', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(553, 4, 'ADC153', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(554, 4, 'ADC154', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(555, 4, 'ADC155', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(556, 4, 'ADC156', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(557, 4, 'ADC157', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(558, 4, 'ADC158', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(559, 4, 'ADC159', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(560, 4, 'ADC160', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(561, 4, 'ADC161', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(562, 4, 'ADC162', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(563, 4, 'ADC163', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(564, 4, 'ADC164', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(565, 4, 'ADC165', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(566, 4, 'ADC166', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(567, 4, 'ADC167', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(568, 4, 'ADC168', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(569, 4, 'ADC169', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(570, 4, 'ADC170', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(571, 4, 'ADC171', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(572, 4, 'ADC172', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(573, 4, 'ADC173', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(574, 4, 'ADC174', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(575, 4, 'ADC175', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(576, 4, 'ADC176', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(577, 4, 'ADC177', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(578, 4, 'ADC178', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(579, 4, 'ADC179', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(580, 4, 'ADC180', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(581, 4, 'ADC181', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(582, 4, 'ADC182', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(583, 4, 'ADC183', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(584, 4, 'ADC184', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(585, 4, 'ADC185', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(586, 4, 'ADC186', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(587, 4, 'ADC187', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(588, 4, 'ADC188', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(589, 4, 'ADC189', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(590, 4, 'ADC190', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(591, 4, 'ADC191', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(592, 4, 'ADC192', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(593, 4, 'ADC193', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(594, 4, 'ADC194', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(595, 4, 'ADC195', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(596, 4, 'ADC196', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(597, 4, 'ADC197', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(598, 4, 'ADC198', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(599, 4, 'ADC199', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34'),
(600, 4, 'ADC200', 'tersedia', '2026-01-19 17:49:34', '2026-01-19 17:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_07_031010_create_penggunas_table', 1),
(5, '2025_12_07_031222_create_stadion_table', 1),
(6, '2025_12_07_031237_create_pertandingan_table', 1),
(7, '2025_12_07_031300_create_tiket_table', 1),
(8, '2025_12_07_031400_create_pemesanan_table', 1),
(9, '2025_12_07_031405_create_detail_pemesanan_table', 1),
(10, '2025_12_07_031407_create_pembayaran_table', 1),
(11, '2025_12_07_050818_remove_venue_from_pertandingan_table', 1),
(12, '2026_01_05_035247_add_nama_pertandingan_to_pertandingans_table', 1),
(13, '2026_01_05_041957_create_kursi_vip_table', 1),
(14, '2026_01_05_055937_create_tiket_vip', 1),
(15, '2026_01_05_071520_alter_jumlah_tersedia_nullable_on_tiket_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint UNSIGNED NOT NULL,
  `idPemesanan` bigint UNSIGNED NOT NULL,
  `metodePembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahBayar` double NOT NULL,
  `statusPembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalPembayaran` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` bigint UNSIGNED NOT NULL,
  `statusPemesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'offline',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `statusPemesanan`, `created_at`, `updated_at`) VALUES
(1, 'offline', '2026-01-13 22:14:48', '2026-01-13 22:14:48'),
(2, 'offline', '2026-01-13 22:15:37', '2026-01-13 22:15:37'),
(4, 'offline', '2026-01-13 22:45:04', '2026-01-13 22:45:04'),
(5, 'offline', '2026-01-18 17:49:40', '2026-01-18 17:49:40'),
(6, 'offline', '2026-01-18 18:44:03', '2026-01-18 18:44:03'),
(7, 'offline', '2026-01-18 19:55:33', '2026-01-18 19:55:33'),
(8, 'offline', '2026-01-18 19:57:44', '2026-01-18 19:57:44'),
(10, 'offline', '2026-01-18 22:16:04', '2026-01-18 22:16:04'),
(11, 'offline', '2026-01-18 22:16:52', '2026-01-18 22:16:52'),
(12, 'offline', '2026-01-18 22:24:00', '2026-01-18 22:24:00'),
(13, 'offline', '2026-01-18 22:24:22', '2026-01-18 22:24:22'),
(14, 'offline', '2026-01-18 22:28:50', '2026-01-18 22:28:50'),
(15, 'offline', '2026-01-18 22:29:07', '2026-01-18 22:29:07'),
(16, 'offline', '2026-01-18 22:31:27', '2026-01-18 22:31:27'),
(17, 'offline', '2026-01-18 23:26:29', '2026-01-18 23:26:29'),
(18, 'offline', '2026-01-18 23:26:50', '2026-01-18 23:26:50'),
(19, 'offline', '2026-01-18 23:31:10', '2026-01-18 23:31:10'),
(20, 'offline', '2026-01-19 00:00:13', '2026-01-19 00:00:13'),
(21, 'offline', '2026-01-19 00:33:51', '2026-01-19 00:33:51'),
(22, 'offline', '2026-01-19 00:40:01', '2026-01-19 00:40:01'),
(23, 'offline', '2026-01-19 00:40:55', '2026-01-19 00:40:55'),
(24, 'offline', '2026-01-19 00:42:07', '2026-01-19 00:42:07'),
(25, 'offline', '2026-01-19 17:50:39', '2026-01-19 17:50:39'),
(26, 'offline', '2026-01-19 17:59:28', '2026-01-19 17:59:28'),
(27, 'offline', '2026-01-19 17:59:51', '2026-01-19 17:59:51'),
(28, 'offline', '2026-01-19 18:27:00', '2026-01-19 18:27:00'),
(29, 'offline', '2026-01-19 18:34:46', '2026-01-19 18:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `penggunas`
--

CREATE TABLE `penggunas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noTelepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertandingan`
--

CREATE TABLE `pertandingan` (
  `id` bigint UNSIGNED NOT NULL,
  `namaPertandingan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timHome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timAway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `idStadion` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertandingan`
--

INSERT INTO `pertandingan` (`id`, `namaPertandingan`, `timHome`, `timAway`, `tanggal`, `waktu`, `idStadion`, `created_at`, `updated_at`) VALUES
(4, 'Derby Jawatimur', 'Persebaya Surabaya', 'Arema FC', '2026-01-24', '18:30:00', 1, '2026-01-18 22:27:39', '2026-01-18 22:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1dNjnqv706XxXNiRFi4q22bPSsVDTRXFUh6QsLaJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiajFWOElCWDRxd3RmUjJmVGR4Z1B1dmY1TXRkVTVuZmhLVjVNWlNPaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fX0=', 1768890258),
('W1UA1HyRak3Kl7Pd0LNlO9PtyenHTXv4a1agJSo2', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMWZ4NTZPcFJwRzBGVEVpOXRJU2UzeUpjS0JWMVJhOUQwUDNsbEl4OSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90aWtldCI7czo1OiJyb3V0ZSI7czoxMToidGlrZXQuaW5kZXgiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1768873739);

-- --------------------------------------------------------

--
-- Table structure for table `stadion`
--

CREATE TABLE `stadion` (
  `id` bigint UNSIGNED NOT NULL,
  `namaStadion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stadion`
--

INSERT INTO `stadion` (`id`, `namaStadion`, `alamat`, `kapasitas`, `created_at`, `updated_at`) VALUES
(1, 'Gelora Bung Tomo  Surabaya', 'surabaya', 40000, '2026-01-13 22:12:14', '2026-01-13 22:12:14'),
(2, 'Gelora Delta Sidoarjo', 'sda', 50000, '2026-01-13 22:12:31', '2026-01-13 22:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` bigint UNSIGNED NOT NULL,
  `idPertandingan` bigint UNSIGNED NOT NULL,
  `kategoriKursi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double NOT NULL,
  `jumlahTersedia` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `idPertandingan`, `kategoriKursi`, `harga`, `jumlahTersedia`, `created_at`, `updated_at`) VALUES
(3, 4, 'Eko Selatan', 30000, 1995, '2026-01-18 22:28:30', '2026-01-19 18:34:46'),
(4, 4, 'VIP', 50000, 200, '2026-01-18 22:31:17', '2026-01-19 17:49:14'),
(5, 4, 'Eko Timur', 40000, 3500, '2026-01-19 17:48:11', '2026-01-19 17:48:11'),
(6, 4, 'Eko Utara', 30000, 2999, '2026-01-19 17:48:54', '2026-01-19 17:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `tiket_vip`
--

CREATE TABLE `tiket_vip` (
  `id` bigint UNSIGNED NOT NULL,
  `pertandingan_id` bigint UNSIGNED NOT NULL,
  `nomor_kursi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `status` enum('tersedia','dibooking','terjual') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tersedia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Sistem', 'admin@mail.com', NULL, '$2y$12$L.cYYDFLiDtMlZoYnMWqtufF.DdnJ7BxolPm8xX9FjlPgLSPykhBC', NULL, '2026-01-13 22:11:28', '2026-01-13 22:11:28'),
(2, 'User Biasa', 'user@mail.com', NULL, '$2y$12$C5YtWHLPhU3ZAfQYcx7mOekQPI1ar1pD07HK8R4Bcwxu6bJRN0kpe', NULL, '2026-01-13 22:11:29', '2026-01-13 22:11:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pemesanan_idpemesanan_foreign` (`idPemesanan`),
  ADD KEY `detail_pemesanan_idtiket_foreign` (`idTiket`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursi_vip`
--
ALTER TABLE `kursi_vip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kursi_vip_pertandingan_id_foreign` (`pertandingan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_idpemesanan_foreign` (`idPemesanan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penggunas`
--
ALTER TABLE `penggunas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penggunas_email_unique` (`email`);

--
-- Indexes for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertandingan_idstadion_foreign` (`idStadion`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stadion`
--
ALTER TABLE `stadion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tiket_idpertandingan_foreign` (`idPertandingan`);

--
-- Indexes for table `tiket_vip`
--
ALTER TABLE `tiket_vip`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tiket_vip_pertandingan_id_nomor_kursi_unique` (`pertandingan_id`,`nomor_kursi`);

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
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kursi_vip`
--
ALTER TABLE `kursi_vip`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `penggunas`
--
ALTER TABLE `penggunas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertandingan`
--
ALTER TABLE `pertandingan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stadion`
--
ALTER TABLE `stadion`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tiket_vip`
--
ALTER TABLE `tiket_vip`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_idpemesanan_foreign` FOREIGN KEY (`idPemesanan`) REFERENCES `pemesanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pemesanan_idtiket_foreign` FOREIGN KEY (`idTiket`) REFERENCES `tiket` (`id`);

--
-- Constraints for table `kursi_vip`
--
ALTER TABLE `kursi_vip`
  ADD CONSTRAINT `kursi_vip_pertandingan_id_foreign` FOREIGN KEY (`pertandingan_id`) REFERENCES `pertandingan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_idpemesanan_foreign` FOREIGN KEY (`idPemesanan`) REFERENCES `pemesanan` (`id`);

--
-- Constraints for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD CONSTRAINT `pertandingan_idstadion_foreign` FOREIGN KEY (`idStadion`) REFERENCES `stadion` (`id`);

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_idpertandingan_foreign` FOREIGN KEY (`idPertandingan`) REFERENCES `pertandingan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tiket_vip`
--
ALTER TABLE `tiket_vip`
  ADD CONSTRAINT `tiket_vip_pertandingan_id_foreign` FOREIGN KEY (`pertandingan_id`) REFERENCES `pertandingan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
