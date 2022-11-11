-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 07:53 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pams_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `code`, `degree`, `program`, `description`, `created_at`, `updated_at`) VALUES
(2, '01', 'Doctoral', 'EdD - Ed Ad', 'Doctor of Education (Educational Administration)', '2022-11-06 10:44:30', '2022-11-06 10:44:30'),
(3, '02', 'Doctoral', 'DA - LT', 'Doctor of Arts (Language Teaching)', '2022-11-06 10:44:49', '2022-11-06 10:45:14'),
(4, '03', 'Doctoral', 'Ph.D. – SSR', 'Doctor of Philosophy (Social Science Research)', '2022-11-06 10:45:35', '2022-11-06 10:45:35'),
(5, '04', 'Doctoral', 'DM - HRM', 'Doctor of Management (Human Resource Management)', '2022-11-06 10:45:58', '2022-11-06 10:45:58'),
(6, '05', 'Master\'s /w Thesis', 'MAT - LT', 'Master of Arts in Teaching (Language Teaching)', '2022-11-06 10:46:49', '2022-11-06 10:46:49'),
(7, '06', 'Master\'s Program with Thesis', 'MAT - READING', 'Master of Arts in Teaching (Reading)', '2022-11-06 10:47:10', '2022-11-06 10:47:10'),
(8, '07', 'Master\'s Program with Thesis', 'MAT - NAT SCI', 'Master of Arts in Teaching (Natural Science)', '2022-11-06 10:47:27', '2022-11-06 10:47:27'),
(9, '08', 'Master\'s Program with Thesis', 'MAT – SOC SCI', 'Master of Arts in Teaching (Social Science)', '2022-11-06 10:47:40', '2022-11-06 10:47:40'),
(10, '09', 'Master\'s Program with Thesis', 'MAT - FILIPINO', 'Master of Arts in Teaching (Filipino)', '2022-11-06 10:47:56', '2022-11-06 10:47:56'),
(11, '10', 'Master\'s Program with Thesis', 'MAED - MATH', 'Master of Arts in Education (Mathematics)', '2022-11-06 10:48:19', '2022-11-06 10:48:19'),
(12, '11', 'Master\'s Program with Thesis', 'MAED - EDM', 'Master of Arts in Education (Educational Management)', '2022-11-06 10:48:41', '2022-11-06 10:48:41'),
(13, '12', 'Master\'s Program with Thesis', 'MA - PRE-ELEM', 'Master of Arts (Pre-Elementary Education)', '2022-11-06 10:49:00', '2022-11-06 10:49:00'),
(14, '13', 'Master\'s Program with Thesis', 'MPE', 'Master in Physical Education', '2022-11-06 10:49:31', '2022-11-06 10:49:31'),
(15, '14', 'Master\'s Program with Thesis', 'MSIT', 'Master of Science in Information Technology', '2022-11-06 10:49:46', '2022-11-06 10:49:46'),
(16, '15', 'Master\'s Program with Thesis', 'MSW', 'Master of Social Work', '2022-11-06 10:50:00', '2022-11-06 10:50:00'),
(17, '16', 'Master\'s non-thesis', 'MED - MATHEMATHICS', 'Master in Education (Mathematics)', '2022-11-06 10:50:55', '2022-11-06 10:50:55'),
(18, '17', 'Master\'s non-thesis', 'MA - SPED', 'Master of Arts (Special Education)', '2022-11-06 10:51:11', '2022-11-06 10:51:11'),
(19, '18', 'Master\'s non-thesis', 'ME', 'Master in English', '2022-11-06 10:51:29', '2022-11-06 10:51:29'),
(20, '19', 'Master\'s non-thesis', 'MM', 'Master in Management', '2022-11-06 10:51:59', '2022-11-06 10:51:59'),
(21, '20', 'Master\'s non-thesis', 'MB', 'Master in Biology', '2022-11-06 10:52:11', '2022-11-06 10:52:11'),
(22, '21', 'Master\'s non-thesis', 'MIT', 'Master of Information Technology', '2022-11-06 10:52:26', '2022-11-06 10:52:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
