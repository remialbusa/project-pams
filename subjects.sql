-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 01:29 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `code`, `program`, `subject`, `unit`, `period`, `created_at`, `updated_at`) VALUES
(3, 'FD 601', '3', 'Advanced Research', '2', '1st Period', '2022-12-03 08:00:43', '2022-12-03 08:00:43'),
(4, 'DA 601', '3', 'Socio-Psycholinguistics', '2', '1st Period', '2022-12-03 08:01:17', '2022-12-03 08:01:17'),
(5, 'FD 602', '3', 'Advanced Statistics', '2', '2nd Period', '2022-12-03 08:01:53', '2022-12-03 08:01:53'),
(6, 'DA 606', '3', 'Development and Evaluation of Language Learning Materials', '2', '2nd Period', '2022-12-03 08:02:24', '2022-12-03 08:02:24'),
(7, 'FD 603', '3', 'Foundations of Education II', '3', '3rd Period', '2022-12-03 08:02:54', '2022-12-03 08:02:54'),
(8, 'DA 608a', '3', 'Language Teaching Strategies', '3', '3rd Period', '2022-12-03 08:03:59', '2022-12-03 08:03:59'),
(9, 'DW 001', '3', 'Dissertation Writing I', '3', '3rd Period', '2022-12-03 08:04:28', '2022-12-03 08:04:28'),
(10, 'DW 002', '3', 'Dissertation Writing II', '3', '3rd Period', '2022-12-03 08:04:56', '2022-12-03 08:04:56'),
(11, 'RES (D)', '3', 'Residency', '3', '3rd Period', '2022-12-03 08:06:34', '2022-12-03 08:06:34'),
(12, 'FD 601', '2', 'Advanced Research', '2', '1st Period', '2022-12-03 08:10:33', '2022-12-03 08:10:33'),
(13, 'ED AD 605', '2', 'Human Relations in Education', '2', '1st Period', '2022-12-03 08:11:09', '2022-12-03 08:11:09'),
(14, 'FD 602', '2', 'Advanced Statistics', '2', '2nd Period', '2022-12-03 08:11:45', '2022-12-03 08:11:45'),
(15, 'ED AD 604', '2', 'Advanced Financial Management', '2', '2nd Period', '2022-12-03 08:12:19', '2022-12-03 08:12:19'),
(16, 'FD 603', '2', 'Foundations of Education II', '3', '3rd Period', '2022-12-03 08:13:23', '2022-12-03 08:13:23'),
(17, 'ED AD 609', '2', 'Problem Analysis and Decision Making', '3', '3rd Period', '2022-12-03 08:13:46', '2022-12-03 08:13:46'),
(18, 'DW 001', '2', 'Dissertation Writing I', '3', '3rd Period', '2022-12-03 08:14:47', '2022-12-03 08:14:47'),
(19, 'DW 002', '2', 'Dissertation Writing II', '3', '3rd Period', '2022-12-03 08:15:10', '2022-12-03 08:15:10'),
(20, 'RES (D)', '2', 'Residency', '3', '3rd Period', '2022-12-03 08:15:51', '2022-12-03 08:15:51'),
(21, 'FD 601', '5', 'Advanced Research Seminar', '3', '1st Period', '2022-12-03 08:17:30', '2022-12-03 08:17:30'),
(22, 'DM 606', '5', 'Seminar: Human Behavior in Organization', '3', '1st Period', '2022-12-03 08:17:56', '2022-12-03 08:17:56'),
(23, 'DM 607', '5', 'Seminar: Industrial Relation', '3', '1st Period', '2022-12-03 08:18:19', '2022-12-03 08:18:19'),
(24, 'FD 602', '5', 'Advanced Statistical Tools in Management', '3', '2nd Period', '2022-12-03 08:19:12', '2022-12-03 08:19:12'),
(25, 'DM 610', '5', 'Practicum', '3', '2nd Period', '2022-12-03 08:19:38', '2022-12-03 08:19:38'),
(26, 'DM 614', '5', 'Seminar in Executive Development', '3', '2nd Period', '2022-12-03 08:21:08', '2022-12-03 08:21:08'),
(27, 'FD 603', '5', 'Management Philosophy', '3', '3rd Period', '2022-12-03 08:21:35', '2022-12-03 08:21:35'),
(28, 'DM 609a', '5', 'Special Topics in Human Resource Management', '3', '3rd Period', '2022-12-03 08:22:16', '2022-12-03 08:22:16'),
(29, 'DM 613', '5', 'Technology and Management', '3', '3rd Period', '2022-12-03 08:22:49', '2022-12-03 08:22:49'),
(30, 'DW 001', '5', 'Dissertation Writing I', '3', '3rd Period', '2022-12-03 08:23:58', '2022-12-03 08:23:58'),
(31, 'DW 002', '5', 'Dissertation Writing II', '3', '3rd Period', '2022-12-03 08:24:18', '2022-12-03 08:24:18'),
(32, 'RES (D)', '5', 'Residency', '3', '3rd Period', '2022-12-03 08:24:50', '2022-12-03 08:24:50'),
(33, 'FD 601', '4', 'Advanced Research Seminar', '2', '1st Period', '2022-12-03 08:25:52', '2022-12-03 08:25:52'),
(34, 'SSR 601', '4', 'Survey Research Designs', '2', '1st Period', '2022-12-03 08:26:48', '2022-12-03 08:26:48'),
(35, 'FD 602', '4', 'Advanced Statistics I', '1', '2nd Period', '2022-12-03 08:27:32', '2022-12-03 08:27:32'),
(36, 'FD 603', '4', 'Foundations of the Social Sciences', '3', '3rd Period', '2022-12-03 08:28:05', '2022-12-03 08:28:05'),
(37, 'SSR 602', '4', 'Experimental Research Designs', '3', '3rd Period', '2022-12-03 08:28:25', '2022-12-03 08:28:25'),
(38, 'DW 001', '4', 'Dissertation Writing I', '3', '3rd Period', '2022-12-03 08:28:51', '2022-12-03 08:28:51'),
(39, 'DW 002', '4', 'Dissertation Writing II', '3', '3rd Period', '2022-12-03 08:29:29', '2022-12-03 08:29:29'),
(40, 'RES (D)', '4', 'Residency', '3', '3rd Period', '2022-12-03 08:30:00', '2022-12-03 08:30:00'),
(41, 'FD 501', '13', 'Basic Research', '3', '1st Period', '2022-12-03 08:30:54', '2022-12-03 08:30:54'),
(42, 'FD 502', '13', 'Basic Statistics', '3', '1st Period', '2022-12-03 08:31:16', '2022-12-03 08:31:16'),
(43, 'PRE ELEM 501', '13', 'Psychology of Pre-Elementary School Children', '3', '1st Period', '2022-12-03 08:31:41', '2022-12-03 08:31:41'),
(44, 'LT 503', '13', 'Strategies and Methods in Language Teaching', '3', '1st Period', '2022-12-03 08:32:59', '2022-12-03 08:32:59'),
(45, 'FD 501', '13', 'Basic Research', '3', '2nd Period', '2022-12-03 08:33:40', '2022-12-03 08:33:40'),
(46, 'FD 502', '13', 'Basic Statistics', '3', '2nd Period', '2022-12-03 08:34:00', '2022-12-03 08:34:00'),
(47, 'FD 501', '13', 'Basic Research', '3', '3rd Period', '2022-12-03 08:35:14', '2022-12-03 08:35:14'),
(48, 'FD 502', '13', 'Basic Statistics', '3', '3rd Period', '2022-12-03 08:35:32', '2022-12-03 08:35:32'),
(49, 'FD 503', '13', 'Construction, Utilization, Evaluation, and Storage of Materials in Pre-Elementary Education', '3', '3rd Period', '2022-12-03 08:35:50', '2022-12-03 08:35:50'),
(50, 'LT 501', '13', 'Language Acquisition', '3', '3rd Period', '2022-12-03 08:36:15', '2022-12-03 08:36:15'),
(51, 'RDG 501', '13', 'Linguistics in Reading', '3', '3rd Period', '2022-12-03 08:36:37', '2022-12-03 08:36:37'),
(52, 'TW 001', '13', 'Thesis Writing I', '3', '3rd Period', '2022-12-03 08:37:39', '2022-12-03 08:37:39'),
(53, 'TW 002', '13', 'Thesis Writing II', '3', '3rd Period', '2022-12-03 08:37:57', '2022-12-03 08:37:57'),
(54, 'RES (M)', '13', 'Residency', '3', '3rd Period', '2022-12-03 08:38:24', '2022-12-03 08:38:24'),
(55, 'FD 501', '12', 'Basic Research', '3', '1st Period', '2022-12-03 08:39:19', '2022-12-03 08:39:19'),
(56, 'FD 502', '12', 'Basic Statistics', '3', '1st Period', '2022-12-03 08:39:38', '2022-12-03 08:39:38'),
(57, 'EDM 503', '12', 'Personnel Administration', '3', '1st Period', '2022-12-03 08:40:04', '2022-12-03 08:40:04'),
(58, 'FD 501', '12', 'Basic Research', '3', '2nd Period', '2022-12-03 08:40:55', '2022-12-03 08:40:55'),
(59, 'FD 502', '12', 'Basic Statistics', '3', '2nd Period', '2022-12-03 08:42:46', '2022-12-03 08:42:46'),
(60, 'EDM 504', '12', 'Financial Planning and Control', '3', '2nd Period', '2022-12-03 08:43:13', '2022-12-03 08:43:13'),
(61, 'COMP 501', '12', 'Computer Technology', '3', '2nd Period', '2022-12-03 08:43:29', '2022-12-03 08:43:29'),
(62, 'FD 501', '12', 'Basic Research', '3', '3rd Period', '2022-12-03 08:44:31', '2022-12-03 08:44:31'),
(63, 'FD 502', '12', 'Basic Statistics', '3', '3rd Period', '2022-12-03 08:44:49', '2022-12-03 08:44:49'),
(64, 'FD 503', '12', 'Philo-Socio-Psycho Foundations of Education', '3', '3rd Period', '2022-12-03 08:45:09', '2022-12-03 08:45:09'),
(65, 'EDM 505', '12', 'Philippine Educational Legislation', '3', '3rd Period', '2022-12-03 08:45:27', '2022-12-03 08:45:27'),
(66, 'TW 001', '12', 'Thesis Writing I', '3', '3rd Period', '2022-12-03 08:45:43', '2022-12-03 08:45:43'),
(67, 'TW 002', '12', 'Thesis Writing II', '3', '3rd Period', '2022-12-03 08:46:31', '2022-12-03 08:46:31'),
(68, 'RES (M)', '12', 'Residency', '3', '3rd Period', '2022-12-03 08:46:48', '2022-12-03 08:46:48'),
(69, 'MM 507', '12', 'Human Relations in Management', '3', '1st Period', '2022-12-03 08:52:13', '2022-12-03 08:52:13'),
(70, 'FD 501', '10', 'Basic Research', '3', '1st Period', '2022-12-03 09:01:32', '2022-12-03 09:01:32'),
(71, 'FD 502', '10', 'Basic Statistics', '3', '1st Period', '2022-12-03 09:01:52', '2022-12-03 09:01:52'),
(72, 'FIL 504', '10', 'Paghahanda ng mga Kagamitang Pampagtuturo', '3', '1st Period', '2022-12-03 09:02:41', '2022-12-03 09:02:41'),
(73, 'LT 503', '10', 'Strategies and Methods in Language Teaching', '3', '1st Period', '2022-12-03 09:03:22', '2022-12-03 09:03:22'),
(74, 'FD 501', '10', 'Basic Research', '3', '2nd Period', '2022-12-03 09:04:22', '2022-12-03 09:04:22'),
(75, 'FD 502', '10', 'Basic Statistics', '3', '2nd Period', '2022-12-03 09:05:16', '2022-12-03 09:05:16'),
(76, 'FIL 502', '10', 'Panunuring Pampanitikan', '3', '2nd Period', '2022-12-03 09:06:00', '2022-12-03 09:06:00'),
(77, 'FD 501', '10', 'Basic Research', '3', '3rd Period', '2022-12-03 09:09:26', '2022-12-03 09:09:26'),
(78, 'FD 502', '10', 'Basic Statistics', '3', '3rd Period', '2022-12-03 09:09:51', '2022-12-03 09:09:51'),
(79, 'FD 503', '10', 'Philo-Socio-Psycho Foundations of Education', '3', '3rd Period', '2022-12-03 09:10:36', '2022-12-03 09:10:36'),
(80, 'FIL 505', '10', 'Pagtatayang Pangwika sa Filipino', '3', '3rd Period', '2022-12-03 09:10:57', '2022-12-03 09:10:57'),
(81, 'RDG 501', '10', 'Linguistics in Reading', '3', '3rd Period', '2022-12-03 09:11:15', '2022-12-03 09:11:15'),
(82, 'TW 001', '10', 'Thesis Writing I', '3', '3rd Period', '2022-12-03 09:11:38', '2022-12-03 09:11:38'),
(83, 'TW 002', '10', 'Thesis Writing II', '3', '3rd Period', '2022-12-03 09:11:57', '2022-12-03 09:11:57'),
(84, 'RES (M)', '10', 'Residency', '3', '3rd Period', '2022-12-03 09:12:22', '2022-12-03 09:12:22'),
(85, 'FD 501', '6', 'Basic Research', '3', '1st Period', '2022-12-03 09:14:16', '2022-12-03 09:14:16'),
(86, 'FD 502', '6', 'Basic Statistics', '3', '1st Period', '2022-12-03 09:14:38', '2022-12-03 09:14:38'),
(87, 'LT 503', '6', 'Strategies and Methods in Language Teaching', '3', '1st Period', '2022-12-03 09:14:56', '2022-12-03 09:14:56'),
(88, 'FD 501', '6', 'Basic Research', '3', '2nd Period', '2022-12-03 09:15:16', '2022-12-03 09:15:16'),
(89, 'FD 502', '6', 'Basic Statistics', '3', '2nd Period', '2022-12-03 09:15:33', '2022-12-03 09:15:33'),
(90, 'LT 502', '6', 'Linguistics and Speech Improvement', '3', '2nd Period', '2022-12-03 09:15:57', '2022-12-03 09:15:57'),
(91, 'RDG 504', '6', 'Construction, Utilization, Evaluation, and Storage of Materials in Reading', '3', '2nd Period', '2022-12-03 09:16:21', '2022-12-03 09:16:21'),
(92, 'FD 501', '6', 'Basic Research', '3', '3rd Period', '2022-12-03 09:16:38', '2022-12-03 09:16:38'),
(93, 'FD 502', '6', 'Basic Statistics', '3', '3rd Period', '2022-12-03 09:16:54', '2022-12-03 09:16:54'),
(94, 'FD 503', '6', 'Philo-Socio-Psycho Foundations of Education', '3', '3rd Period', '2022-12-03 09:17:18', '2022-12-03 09:17:18'),
(95, 'LT 501', '6', 'Language Acquisition', '3', '3rd Period', '2022-12-03 09:17:34', '2022-12-03 09:17:34'),
(96, 'RDG 501', '6', 'Linguistics in Reading', '3', '3rd Period', '2022-12-03 09:17:54', '2022-12-03 09:17:54'),
(97, 'TW 001', '6', 'Thesis Writing I', '3', '3rd Period', '2022-12-03 09:18:18', '2022-12-03 09:18:18'),
(98, 'TW 002', '6', 'Thesis Writing II', '3', '3rd Period', '2022-12-03 09:18:35', '2022-12-03 09:18:35'),
(99, 'RES (M)', '6', 'Residency', '3', '3rd Period', '2022-12-03 09:18:52', '2022-12-03 09:18:52'),
(100, 'FD 501', '7', 'Basic Research', '3', '1st Period', '2022-12-03 09:21:36', '2022-12-03 09:21:36'),
(101, 'FD 502', '7', 'Basic Statistics', '3', '1st Period', '2022-12-03 09:21:54', '2022-12-03 09:21:54'),
(102, 'LT 503', '7', 'Strategies and Methods in Language Teaching', '3', '1st Period', '2022-12-03 09:22:15', '2022-12-03 09:22:15'),
(103, 'FD 501', '7', 'Basic Research', '3', '2nd Period', '2022-12-03 09:22:31', '2022-12-03 09:22:31'),
(104, 'FD 502', '7', 'Basic Statistics', '3', '2nd Period', '2022-12-03 09:22:49', '2022-12-03 09:22:49'),
(105, 'RDG 504', '7', 'Construction, Utilization, Evaluation, and Storage of Materials in Reading', '3', '2nd Period', '2022-12-03 09:23:10', '2022-12-03 09:23:10'),
(106, 'FD 501', '7', 'Basic Research', '3', '3rd Period', '2022-12-03 09:23:29', '2022-12-03 09:23:29'),
(107, 'FD 502', '7', 'Basic Statistics', '3', '3rd Period', '2022-12-03 09:23:49', '2022-12-03 09:23:49'),
(108, 'FD 503', '7', 'Philo-Socio-Psycho Foundations of Education', '3', '3rd Period', '2022-12-03 09:24:02', '2022-12-03 09:24:02'),
(109, 'RDG 501', '7', 'Linguistics in Reading', '3', '3rd Period', '2022-12-03 09:24:24', '2022-12-03 09:24:24'),
(110, 'LT 501', '7', 'Language Acquisition', '3', '3rd Period', '2022-12-03 09:24:43', '2022-12-03 09:24:43'),
(111, 'TW 001', '7', 'Thesis Writing I', '3', '3rd Period', '2022-12-03 09:25:00', '2022-12-03 09:25:00'),
(112, 'TW 002', '7', 'Thesis Writing II', '3', '3rd Period', '2022-12-03 09:25:17', '2022-12-03 09:25:17'),
(113, 'RES (M)', '7', 'Residency', '3', '3rd Period', '2022-12-03 09:25:32', '2022-12-03 09:25:32'),
(114, 'FD 501', '8', 'Basic Research', '3', '1st Period', '2022-12-03 09:26:07', '2022-12-03 09:26:07'),
(115, 'FD 502', '8', 'Basic Statistics', '3', '1st Period', '2022-12-03 09:26:26', '2022-12-03 09:26:26'),
(116, 'NAT SCI 502', '8', 'Selected Topics in Science II', '3', '1st Period', '2022-12-03 09:26:44', '2022-12-03 09:26:44'),
(117, 'MATH 534', '8', 'Mathematical Logic', '3', '1st Period', '2022-12-03 09:27:01', '2022-12-03 09:27:01'),
(118, 'FD 501', '8', 'Basic Research', '3', '2nd Period', '2022-12-03 09:27:19', '2022-12-03 09:27:19'),
(119, 'FD 502', '8', 'Basic Statistics', '3', '2nd Period', '2022-12-03 09:27:40', '2022-12-03 09:27:40'),
(120, 'NAT SCI 503', '8', 'strategies and Methods in Teaching Science', '3', '2nd Period', '2022-12-03 09:28:05', '2022-12-03 09:28:05'),
(121, 'MATH 536', '8', 'History of Mathematics', '3', '2nd Period', '2022-12-03 09:28:22', '2022-12-03 09:28:22'),
(122, 'FD 501', '8', 'Basic Research', '3', '3rd Period', '2022-12-03 09:28:40', '2022-12-03 09:28:40'),
(123, 'FD 502', '8', 'Basic Statistics', '3', '3rd Period', '2022-12-03 09:28:55', '2022-12-03 09:28:55'),
(124, 'FD 503', '8', 'Philo-Socio-Psycho Foundations of Education', '3', '3rd Period', '2022-12-03 09:29:17', '2022-12-03 09:29:17'),
(125, 'NAT SCI 504', '2', 'Construction, Utilization, Evaluation and Storage of Materials in Science', '3', '3rd Period', '2022-12-03 09:29:38', '2022-12-03 09:30:09'),
(126, 'MATH 524', '8', 'Probability and Statistics', '3', '3rd Period', '2022-12-03 09:30:44', '2022-12-03 09:30:44'),
(127, 'TW 001', '8', 'Thesis Writing I', '3', '3rd Period', '2022-12-03 09:31:03', '2022-12-03 09:31:03'),
(128, 'TW 002', '8', 'Thesis Writing II', '3', '3rd Period', '2022-12-03 09:31:23', '2022-12-03 09:31:23'),
(129, 'RES (M)', '8', 'Residency', '3', '3rd Period', '2022-12-03 09:31:42', '2022-12-03 09:31:42'),
(130, 'FD 501', '9', 'Basic Research', '3', '1st Period', '2022-12-03 09:33:01', '2022-12-03 09:33:01'),
(131, 'FD 502', '9', 'Basic Statistics', '3', '1st Period', '2022-12-03 09:33:19', '2022-12-03 09:33:19'),
(132, 'SOC SCI 501', '9', 'Foundations in Social Science', '3', '1st Period', '2022-12-03 09:33:49', '2022-12-03 09:33:49'),
(133, 'FIL 504', '9', 'Paghahanda ng mga Kagamitang Pampagtuturo', '3', '1st Period', '2022-12-03 09:34:11', '2022-12-03 09:34:11'),
(134, 'FD 501', '9', 'Basic Research', '3', '2nd Period', '2022-12-03 09:35:15', '2022-12-03 09:35:15'),
(135, 'FD 502', '9', 'Basic Statistics', '3', '2nd Period', '2022-12-03 09:35:36', '2022-12-03 09:35:36'),
(136, 'SOC SCI 504', '9', 'Construction, Utilization, Evaluation, and Storage of Materials in Social Science', '3', '2nd Period', '2022-12-03 09:35:56', '2022-12-03 09:35:56'),
(137, 'FIL 502', '9', 'Panunuring Pampanitikan', '3', '2nd Period', '2022-12-03 09:36:13', '2022-12-03 09:36:13'),
(138, 'FD 501', '9', 'Basic Research', '3', '3rd Period', '2022-12-03 09:37:27', '2022-12-03 09:37:27'),
(139, 'FD 502', '9', 'Basic Statistics', '3', '3rd Period', '2022-12-03 09:37:48', '2022-12-03 09:37:48'),
(140, 'FD 503', '9', 'Foundations of Education', '3', '3rd Period', '2022-12-03 09:38:04', '2022-12-03 09:38:04'),
(142, 'SOC SCI 503', '9', 'Strategies and Methods in Teaching Social Science', '3', '3rd Period', '2022-12-03 09:55:22', '2022-12-03 09:55:22'),
(143, 'SOC SCI 505', '9', 'Evaluation of Learning in Social Science', '3', '3rd Period', '2022-12-03 09:55:50', '2022-12-03 09:55:50'),
(144, 'FIL 505', '9', 'Pagtatayang Pangwika sa Filipino', '3', '3rd Period', '2022-12-03 09:56:08', '2022-12-03 09:56:08'),
(145, 'TW 001', '9', 'Thesis Writing I', '3', '3rd Period', '2022-12-03 09:56:31', '2022-12-03 09:56:31'),
(146, 'TW 002', '9', 'Thesis Writing II', '3', '3rd Period', '2022-12-03 09:56:50', '2022-12-03 09:56:50'),
(147, 'RES (M)', '9', 'Residency', '3', '3rd Period', '2022-12-03 09:57:14', '2022-12-03 09:57:14'),
(148, 'FD 501', '11', 'Basic Research', '3', '1st Period', '2022-12-04 05:54:46', '2022-12-04 05:54:46'),
(149, 'FD 502', '11', 'Basic Statistics', '3', '1st Period', '2022-12-04 05:55:02', '2022-12-04 05:55:02'),
(150, 'MATH 534', '11', 'Mathematical Logic', '3', '1st Period', '2022-12-04 05:55:18', '2022-12-04 05:55:18'),
(151, 'FD 501', '11', 'Basic Research', '3', '2nd Period', '2022-12-04 05:55:33', '2022-12-04 05:55:33'),
(152, 'FD 502', '11', 'Basic Statistics', '3', '2nd Period', '2022-12-04 05:55:54', '2022-12-04 05:55:54'),
(153, 'MATH 536', '11', 'History of Mathematics', '3', '2nd Period', '2022-12-04 05:56:11', '2022-12-04 05:56:11'),
(154, 'FD 501', '11', 'Basic Research', '3', '3rd Period', '2022-12-04 05:56:29', '2022-12-04 05:56:29'),
(155, 'FD 502', '11', 'Basic Statistics', '3', '3rd Period', '2022-12-04 05:57:17', '2022-12-04 05:57:17'),
(156, 'MATH 524', '11', 'Probability and Statistics', '3', '3rd Period', '2022-12-04 05:57:32', '2022-12-04 05:57:32'),
(157, 'TW 001', '11', 'Thesis Writing I', '3', '3rd Period', '2022-12-04 05:57:54', '2022-12-04 05:57:54'),
(158, 'TW 002', '11', 'Thesis Writing II', '3', '3rd Period', '2022-12-04 05:58:12', '2022-12-04 05:58:12'),
(159, 'RES (M)', '11', 'Residency', '3', '3rd Period', '2022-12-04 05:58:28', '2022-12-04 05:58:28'),
(161, 'FD 502', '17', 'Basic Statistics', '3', '1st Period', '2022-12-04 06:03:51', '2022-12-04 06:03:51'),
(162, 'MATH 534', '17', 'Mathematical Logic', '3', '1st Period', '2022-12-04 06:04:09', '2022-12-04 06:04:09'),
(163, 'FD 501', '17', 'Basic Research', '3', '1st Period', '2022-12-04 06:04:27', '2022-12-04 06:04:27'),
(164, 'FD 501', '17', 'Basic Research', '3', '2nd Period', '2022-12-04 06:06:51', '2022-12-04 06:06:51'),
(165, 'FD 502', '17', 'Basic Statistics', '3', '2nd Period', '2022-12-04 06:07:06', '2022-12-04 06:07:06'),
(166, 'MATH 536', '17', 'History of Mathematics', '3', '2nd Period', '2022-12-04 06:07:24', '2022-12-04 06:07:24'),
(167, 'FD 501', '17', 'Basic Research', '3', '3rd Period', '2022-12-04 06:07:41', '2022-12-04 06:07:41'),
(168, 'FD 502', '17', 'Basic Statistics', '3', '3rd Period', '2022-12-04 06:07:57', '2022-12-04 06:07:57'),
(169, 'MATH 524', '17', 'Probability and Statistics', '3', '3rd Period', '2022-12-04 06:08:27', '2022-12-04 06:08:27'),
(170, 'MATH 531', '17', 'Seminar on Research in Mathematics Education', '3', '3rd Period', '2022-12-04 06:09:12', '2022-12-04 06:09:12'),
(171, 'RES (M)', '17', 'Residency', '3', '3rd Period', '2022-12-04 06:09:32', '2022-12-04 06:09:32'),
(172, 'FD 501', '14', 'Basic Research', '3', '1st Period', '2022-12-04 06:11:45', '2022-12-04 06:11:45'),
(173, 'FD 502', '14', 'Basic Statistics', '3', '1st Period', '2022-12-04 06:12:02', '2022-12-04 06:12:02'),
(174, 'MPE 509', '14', 'Psychological Foundations of Coaching', '3', '1st Period', '2022-12-04 06:12:19', '2022-12-04 06:12:19'),
(175, 'FD 501', '14', 'Basic Research', '3', '2nd Period', '2022-12-04 06:12:36', '2022-12-04 06:12:36'),
(176, 'FD 502', '14', 'Basic Statistics', '3', '2nd Period', '2022-12-04 06:13:11', '2022-12-04 06:13:11'),
(177, 'MPE 507', '14', 'Dance in Culture', '3', '2nd Period', '2022-12-04 06:13:56', '2022-12-04 06:13:56'),
(178, 'FD 501', '14', 'Basic Research', '3', '3rd Period', '2022-12-04 06:14:12', '2022-12-04 06:14:12'),
(179, 'FD 502', '14', 'Basic Statistics', '3', '3rd Period', '2022-12-04 06:14:29', '2022-12-04 06:14:29'),
(180, 'FD 503', '14', 'Philo-Socio-Psycho Foundations of Education', '3', '3rd Period', '2022-12-04 06:14:57', '2022-12-04 06:14:57'),
(181, 'MPE 501', '14', 'Historical and Philosophical Foundations of Physical Education', '3', '3rd Period', '2022-12-04 06:15:26', '2022-12-04 06:15:26'),
(182, 'TW 001', '14', 'Thesis Writing I', '3', '3rd Period', '2022-12-04 06:15:49', '2022-12-04 06:15:49'),
(183, 'TW 002', '14', 'Thesis Writing II', '3', '3rd Period', '2022-12-04 06:16:04', '2022-12-04 06:16:04'),
(184, 'RES (M)', '14', 'Residency', '3', '3rd Period', '2022-12-04 06:16:21', '2022-12-04 06:16:21'),
(185, 'FD 501', '16', 'Basic Research', '3', '1st Period', '2022-12-04 06:16:56', '2022-12-04 06:16:56'),
(186, 'FD 502', '16', 'Basic Statistics', '3', '1st Period', '2022-12-04 06:17:14', '2022-12-04 06:17:14'),
(187, 'SW 502', '2', 'Human Behavior and Social Change', '3', '1st Period', '2022-12-04 06:17:34', '2022-12-04 08:13:26'),
(188, 'FD 501', '16', 'Basic Research', '3', '2nd Period', '2022-12-04 06:17:54', '2022-12-04 06:17:54'),
(189, 'FD 502', '16', 'Basic Statistics', '3', '2nd Period', '2022-12-04 06:18:11', '2022-12-04 06:18:11'),
(190, 'SW 504', '16', 'Social Agency Administration and Management', '3', '2nd Period', '2022-12-04 06:18:52', '2022-12-04 06:18:52'),
(191, 'FD 501', '16', 'Basic Research', '3', '3rd Period', '2022-12-04 06:20:19', '2022-12-04 06:20:19'),
(192, 'FD 502', '16', 'Basic Statistics', '3', '3rd Period', '2022-12-04 06:24:55', '2022-12-04 06:24:55'),
(193, 'SW 506', '16', 'Social Work Practice with Individuals and Families', '3', '3rd Period', '2022-12-04 06:25:23', '2022-12-04 06:25:23'),
(194, 'SW 516', '16', 'Thesis Writing I', '3', '3rd Period', '2022-12-04 06:29:09', '2022-12-04 06:29:09'),
(195, 'SW 501', '16', 'Philippine Social Realities', '3', '3rd Period', '2022-12-04 06:29:43', '2022-12-04 06:29:43'),
(196, 'RES (M)', '16', 'Residency', '3', '3rd Period', '2022-12-04 06:30:08', '2022-12-04 06:30:08'),
(197, 'MIT 501', '22', 'Advanced Programming I', '1', '1st Period', '2022-12-04 07:14:02', '2022-12-04 07:14:02'),
(200, 'MIT 502', '22', 'Methods of Research for IT', '1', '2nd Period', '2022-12-04 07:16:02', '2022-12-04 07:16:02'),
(201, 'MIT 507', '22', 'System Analysis and Design', '2', '3rd Period', '2022-12-04 07:16:24', '2022-12-04 07:16:24'),
(202, 'RES (M)', '22', 'Residency', '2', '3rd Period', '2022-12-04 07:16:42', '2022-12-04 07:16:42'),
(203, 'MB 507', '21', 'Special Topics in Biology', '2', '1st Period', '2022-12-04 07:19:23', '2022-12-04 07:19:23'),
(204, 'MB 502', '21', 'Instructional Aid Construction in Biology', '2', '1st Period', '2022-12-04 07:19:40', '2022-12-04 07:19:40'),
(205, 'MB 513', '21', 'Plant Physiology', '1', '2nd Period', '2022-12-04 07:20:02', '2022-12-04 07:20:02'),
(206, 'MB 516', '21', 'Advances in Plant Growth and Development', '2', '3rd Period', '2022-12-04 07:20:21', '2022-12-04 07:20:21'),
(207, 'RES (M)', '21', 'Residency', '2', '3rd Period', '2022-12-04 07:20:40', '2022-12-04 07:20:40'),
(208, 'FD 501', '19', 'Basic Research', '3', '1st Period', '2022-12-04 07:21:26', '2022-12-04 07:21:26'),
(210, 'LT 508', '19', 'Theories and Practices of Writing', '3', '1st Period', '2022-12-04 07:22:14', '2022-12-04 07:22:14'),
(211, 'FD 502', '19', 'Basic Statistics', '3', '1st Period', '2022-12-04 07:27:42', '2022-12-04 07:27:42'),
(212, 'LT 514', '19', 'Applied Language Studies', '3', '1st Period', '2022-12-04 07:29:39', '2022-12-04 07:29:39'),
(213, 'FD 501', '19', 'Basic Research', '3', '2nd Period', '2022-12-04 07:29:56', '2022-12-04 07:29:56'),
(214, 'FD 502', '19', 'Basic Statistics', '3', '2nd Period', '2022-12-04 07:30:22', '2022-12-04 07:30:22'),
(215, 'LIT 504', '19', 'Strategies and Methods in Teaching Literature', '3', '2nd Period', '2022-12-04 07:30:39', '2022-12-04 07:30:39'),
(216, 'LT 506', '19', 'Language Acquisition Theories and Principles', '3', '2nd Period', '2022-12-04 07:30:58', '2022-12-04 07:30:58'),
(217, 'FD 501', '19', 'Basic Research', '3', '3rd Period', '2022-12-04 07:31:23', '2022-12-04 07:31:23'),
(218, 'FD 502', '19', 'Basic Statistics', '3', '3rd Period', '2022-12-04 07:31:40', '2022-12-04 07:31:40'),
(219, 'LIT 507', '19', 'Sociolinguistics', '3', '3rd Period', '2022-12-04 07:31:56', '2022-12-04 07:31:56'),
(220, 'RES (M)', '19', 'Residency', '3', '3rd Period', '2022-12-04 07:32:13', '2022-12-04 07:32:13'),
(221, 'FD 501', '18', 'Basic Research', '1', '1st Period', '2022-12-04 07:37:11', '2022-12-04 07:37:11'),
(222, 'SPED 507', '18', 'Teaching Children with Behavioral Problems', '3', '1st Period', '2022-12-04 07:37:33', '2022-12-04 07:37:33'),
(223, 'LT 503', '18', 'Strategies and Methods in Language Teaching', '3', '1st Period', '2022-12-04 07:37:52', '2022-12-04 07:37:52'),
(224, 'FD 501', '18', 'Basic Research', '1', '2nd Period', '2022-12-04 07:38:10', '2022-12-04 07:38:10'),
(225, 'SPED 508', '18', 'Teaching the Hearing Impaired', '3', '2nd Period', '2022-12-04 07:38:52', '2022-12-04 07:38:52'),
(226, 'SPED 504', '18', 'Organization, Administration & Supervision in SPED', '3', '2nd Period', '2022-12-04 07:39:13', '2022-12-04 07:39:13'),
(227, 'FD 501', '18', 'Basic Research', '1', '3rd Period', '2022-12-04 07:40:37', '2022-12-04 07:40:37'),
(228, 'SPED 509', '18', 'Teaching the Visually Impaired', '3', '3rd Period', '2022-12-04 07:40:55', '2022-12-04 07:40:55'),
(229, 'RDG 501', '18', 'Linguistics in Reading', '3', '3rd Period', '2022-12-04 07:41:13', '2022-12-04 07:41:13'),
(230, 'RES (M)', '18', 'Residency', '3', '3rd Period', '2022-12-04 07:41:31', '2022-12-04 07:41:31'),
(231, 'FD 501', '20', 'Basic Research', '1', '1st Period', '2022-12-04 07:42:30', '2022-12-04 07:42:30'),
(232, 'FD 502', '20', 'Basic Statistics', '1', '1st Period', '2022-12-04 07:42:47', '2022-12-04 07:42:47'),
(233, 'MM 501', '20', 'Principles and Theories of Management', '3', '1st Period', '2022-12-04 07:43:03', '2022-12-04 07:43:03'),
(234, 'MM 506', '20', 'Development Planning', '3', '1st Period', '2022-12-04 07:43:20', '2022-12-04 07:43:20'),
(235, 'MM 507', '20', 'Human Relations in Management', '3', '1st Period', '2022-12-04 07:43:36', '2022-12-04 07:43:36'),
(236, 'FD 501', '20', 'Basic Research', '2', '2nd Period', '2022-12-04 07:43:56', '2022-12-04 07:43:56'),
(237, 'FD 502', '20', 'Basic Statistics', '3', '2nd Period', '2022-12-04 07:44:12', '2022-12-04 07:44:12'),
(238, 'MM 505', '20', 'Philippine Legislation and Management', '3', '2nd Period', '2022-12-04 07:44:40', '2022-12-04 07:44:40'),
(239, 'MM 508', '20', 'Practicum I', '3', '2nd Period', '2022-12-04 07:44:56', '2022-12-04 07:44:56'),
(240, 'MM 503', '20', 'Personnel Management', '3', '2nd Period', '2022-12-04 07:45:11', '2022-12-04 07:45:11'),
(241, 'FD 501', '20', 'Basic Research', '3', '3rd Period', '2022-12-04 07:45:30', '2022-12-04 07:45:30'),
(242, 'FD 502', '20', 'Basic Statistics', '3', '3rd Period', '2022-12-04 07:45:48', '2022-12-04 07:45:48'),
(243, 'FD 503', '20', 'Philo-Socio-Psycho Foundations of Management', '3', '3rd Period', '2022-12-04 07:46:04', '2022-12-04 07:46:04'),
(244, 'MM 509', '20', 'Practicum II', '3', '3rd Period', '2022-12-04 07:46:26', '2022-12-04 07:46:26'),
(245, 'RES (M)', '20', 'Residency', '3', '3rd Period', '2022-12-04 07:46:41', '2022-12-04 07:46:41'),
(246, 'PRE ELEM 503', '13', 'Strategies and Methods in Teaching Pre-Elementary School Children', '3', '2nd Period', '2022-12-04 07:53:52', '2022-12-04 07:53:52'),
(247, 'RDG 504', '13', 'Construction, Utilization, Evaluation, and Storage of Materials in Reading', '3', '2nd Period', '2022-12-04 07:54:20', '2022-12-04 07:54:20'),
(248, 'FD 503', '13', 'Philo-Socio-Psycho Foundations of Education', '3', '3rd Period', '2022-12-04 07:55:56', '2022-12-04 07:55:56'),
(249, 'NAT SCI 504', '8', 'Construction, Utilization, Evaluation and Storage of Materials in Science', '3', '3rd Period', '2022-12-04 08:04:21', '2022-12-04 08:04:21'),
(250, 'SW 502', '16', 'Human Behavior and Social Change', '3', '1st Period', '2022-12-04 08:16:40', '2022-12-04 08:16:40'),
(251, 'MSIT 501', '15', 'Advanced Programming I', '3', '1st Period', '2022-12-04 08:18:14', '2022-12-04 08:18:14'),
(252, 'MSIT 510', '15', 'Information Technology in Management', '2', '1st Period', '2022-12-04 08:18:34', '2022-12-04 08:18:34'),
(253, 'MSIT 502', '15', 'Methods of Research for IT', '2', '2nd Period', '2022-12-04 08:18:56', '2022-12-04 08:18:56'),
(254, 'MSIT 507', '15', 'System Analysis and Design', '3', '3rd Period', '2022-12-04 08:19:11', '2022-12-04 08:19:11'),
(255, 'TW 001', '15', 'Thesis Writing I', '3', '3rd Period', '2022-12-04 08:19:32', '2022-12-04 08:19:32'),
(256, 'TW 002', '15', 'Thesis Writing II', '3', '3rd Period', '2022-12-04 08:19:51', '2022-12-04 08:19:51'),
(257, 'RES (M)', '15', 'Residency', '3', '3rd Period', '2022-12-04 08:20:08', '2022-12-04 08:20:08'),
(258, 'SPED 502', '18', 'Curriculum Development', '3', '3rd Period', '2022-12-04 08:25:41', '2022-12-04 08:25:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
