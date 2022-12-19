-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 06:02 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicare`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodations`
--

CREATE TABLE `accomodations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accomodations`
--

INSERT INTO `accomodations` (`id`, `name`, `image`, `cost`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Vip and Delux Room', '389938851.jpg', 6000, 'Some thing Something', '2022-03-23 23:52:15', '2022-03-26 00:10:26'),
(2, 'Regular Room', '1555597000.jpg', 3000, 'This is A good Cabin', '2022-03-24 05:57:56', '2022-03-26 00:09:30'),
(3, 'Double Bed Room', '706446061.jpg', 4000, 'This a double bed room', '2022-03-26 00:15:08', '2022-03-26 00:15:08'),
(4, 'Child Care Room', '856534254.jpg', 3500, 'This is child care room', '2022-03-26 00:16:05', '2022-03-26 00:16:05'),
(5, 'ICU Room', '2002043117.jpg', 5000, 'This is ICU Room', '2022-03-26 00:16:47', '2022-03-26 00:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `ambulances`
--

CREATE TABLE `ambulances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dispatched` int(11) NOT NULL DEFAULT 0,
  `driver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ambulances`
--

INSERT INTO `ambulances` (`id`, `name`, `type`, `registration_no`, `dispatched`, `driver`, `driver_phone`, `cost`, `created_at`, `updated_at`) VALUES
(1, 'Ambulance 1', 'car', '1234', 0, 'Rahims', '123967345', 1500, '2022-03-23 19:42:59', '2022-03-23 19:46:03'),
(2, 'Ambulance 2', 'car', '3456', 0, 'Hamid', '124065123', 1500, '2022-03-23 19:48:07', '2022-03-23 19:48:07'),
(3, 'Helicopter 1', 'air', '1230674', 0, 'Paul', '123423409', 6000, '2022-03-23 19:48:40', '2022-03-23 19:48:40'),
(4, 'Helicopter 2', 'air', '76123', 1, 'Sam', '12378234', 6000, '2022-03-23 19:49:38', '2022-03-23 19:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `ambulance_bookings`
--

CREATE TABLE `ambulance_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ambulance_id` bigint(20) UNSIGNED NOT NULL,
  `booking_date` date NOT NULL,
  `patient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ambulance_bookings`
--

INSERT INTO `ambulance_bookings` (`id`, `ambulance_id`, `booking_date`, `patient`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(2, 2, '2022-03-24', 'Chelse', '123456', 'chelse@gmail.com', 'Something Something', '2022-03-23 22:16:49', '2022-03-23 22:16:49'),
(3, 1, '2022-03-24', 'boby', '1569789', 'boby@gmail.com', 'asfasdgsdgsadf', '2022-03-23 22:30:07', '2022-03-23 22:30:07'),
(4, 3, '2022-03-24', 'Fatin', '12345678', 'fatin@gmail.com', 'Some Where', '2022-03-23 22:42:24', '2022-03-23 22:42:24'),
(6, 2, '2022-03-26', 'Sonnet', '01715413808', 'sonnet@gmail.com', 'Somewheeerersdasdad', '2022-03-26 06:13:14', '2022-03-26 06:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `prescription_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `canceled` int(11) DEFAULT 0,
  `completed` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `department_id`, `doctor_id`, `prescription_id`, `patient_name`, `phone`, `email`, `appointment_date`, `appointment_time`, `message`, `status`, `canceled`, `completed`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, 'Fatin', '12345678', 'fatin@gmail.com', '2022-03-24', '05:02:00', 'Hello There', 0, 0, 0, '2022-03-23 17:03:22', '2022-03-23 17:03:22'),
(2, 1, 2, 1, 'Fatin', '12345678', 'fatin@gmail.com', '2022-03-24', '05:18:00', 'Something Something', 1, 0, 1, '2022-03-23 17:18:45', '2022-03-23 18:17:06'),
(3, 1, 2, NULL, 'boby', '890765', 'boby@gmail.com', '2022-03-24', '08:38:00', 'Hello Sir', 1, 0, 0, '2022-03-24 07:37:37', '2022-03-24 07:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_no` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `consultation_date` date NOT NULL,
  `patient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`id`, `doctor_id`, `department_id`, `schedule_id`, `schedule_no`, `status`, `consultation_date`, `patient`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, 1, 0, '2022-03-30', 'Sonnet', '1731804669', 'sonnet@gmail.com', '2022-03-30 11:12:50', '2022-03-30 11:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(3, 'Muntasir Feroz', '1731804669', 'muntasirferoz007@gmail.com', 'About Hospital', 'Hello Friends How are u', '2022-03-22 07:22:01', '2022-03-22 07:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_features` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `image`, `sub_title`, `content`, `service_features`, `created_at`, `updated_at`) VALUES
(1, 'Cardiology', '393045762.jpg', 'Age forming covered you entered the examine. Blessing scarcely confined her contempt wondered shy. Dashwoods contented sportsmen at up no convinced cordially affection.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum recusandae dolor autem laudantium, quaerat vel dignissimos. Magnam sint suscipit omnis eaque unde eos aliquam distinctio, quisquam iste, itaque possimus . Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet alias modi eaque, ratione recusandae cupiditate dolorum repellendus iure eius rerum hic minus ipsa at, corporis nesciunt tempore vero voluptas. Tempore.', '1)International Drug \r\n2)Database Stretchers and Stretcher Accessories\r\n3)Cushions and Mattresses \r\n4)Cholesterol and lipid tests\r\n5)Critical Care Medicine Specialists Emergency Assistance', '2022-03-18 13:35:23', '2022-03-18 13:35:23'),
(2, 'Opthomology', '1641632512.jpg', 'Age forming covered you entered the examine. Blessing scarcely confined her contempt wondered shy. Dashwoods contented sportsmen at up no convinced cordially affection.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum recusandae dolor autem laudantium, quaerat vel dignissimos. Magnam sint suscipit omnis eaque unde eos aliquam distinctio, quisquam iste, itaque possimus . Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet alias modi eaque, ratione recusandae cupiditate dolorum repellendus iure eius rerum hic minus ipsa at, corporis nesciunt tempore vero voluptas. Tempore.', NULL, '2022-03-18 13:43:42', '2022-03-18 13:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` double DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `title`, `email`, `salary`, `department_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'tommm', 'MBBS', 'tom@gmail.com', 25000, 2, 25, '2022-03-19 02:38:48', '2022-03-19 03:54:34'),
(2, 'doctor1', 'MBBS  FRCS', 'doctor1@gmail.com', 25000, 1, 29, '2022-03-23 17:16:01', '2022-03-23 17:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_03_18_134858_add_role_to_users_table', 2),
(5, '2022_03_18_175905_create_departments_table', 3),
(6, '2022_03_18_200538_create_doctors_table', 4),
(11, '2022_03_22_052019_create_contacts_table', 9),
(12, '2022_03_22_151015_create_tests_table', 10),
(13, '2022_03_23_120002_create_prescriptions_table', 10),
(15, '2022_03_19_110425_create_appointments_table', 11),
(16, '2022_03_21_132936_create_patients_table', 11),
(17, '2022_03_23_120515_create_test_results_table', 12),
(18, '2022_03_24_005026_create_ambulances_table', 13),
(19, '2022_03_24_015357_create_ambulance_bookings_table', 14),
(20, '2022_03_24_035211_add_name_to_ambulances_table', 14),
(21, '2022_03_24_050602_create_accomodations_table', 15),
(22, '2022_03_24_055533_create_rooms_table', 16),
(23, '2022_03_24_060652_create_seats_table', 16),
(26, '2022_03_24_102107_create_room_bookings_table', 17),
(28, '2022_03_27_130053_create_schedules_table', 18),
(30, '2022_03_30_150457_create_consultations_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `name`, `age`, `sex`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 28, 'Fatin', 20, 'male', '12345678', 'fatin@gmail.com', 'Address of Address', '2022-03-23 16:56:47', '2022-03-23 16:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `appointment_date` date NOT NULL,
  `diagnosis` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `patient_id`, `doctor_id`, `department_id`, `appointment_id`, `appointment_date`, `diagnosis`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 2, '2022-03-24', 'He is good', '2022-03-23 18:02:39', '2022-03-23 18:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accomodation_id` bigint(20) UNSIGNED NOT NULL,
  `room_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_seat` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `accomodation_id`, `room_no`, `floor_no`, `total_seat`, `created_at`, `updated_at`) VALUES
(1, 1, '501', '5', 1, '2022-03-24 03:54:08', '2022-03-24 03:54:08'),
(4, 2, '402', '4', 2, '2022-03-24 06:01:41', '2022-03-24 06:01:41'),
(5, 5, '302', '3', 6, '2022-03-26 00:23:09', '2022-03-26 00:29:49'),
(6, 3, '601', '6', 1, '2022-03-26 01:31:07', '2022-03-26 01:31:07'),
(7, 4, '201', '2', 2, '2022-03-26 01:31:43', '2022-03-26 01:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `room_bookings`
--

CREATE TABLE `room_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accomodation_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `seat_id` bigint(20) UNSIGNED NOT NULL,
  `room_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double NOT NULL,
  `booking_date` date NOT NULL,
  `entry_time` time NOT NULL,
  `patient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_bookings`
--

INSERT INTO `room_bookings` (`id`, `accomodation_id`, `room_id`, `seat_id`, `room_no`, `seat_no`, `cost`, `booking_date`, `entry_time`, `patient`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '501', '1', 6000, '2022-03-24', '17:54:00', 'Fatin', '12345678', 'fatin@gmail.com', '2022-03-24 05:54:45', '2022-03-24 05:54:45'),
(2, 2, 4, 6, '402', '2', 3000, '2022-03-24', '18:03:00', 'Fatin', '12345678', 'fatin@gmail.com', '2022-03-24 06:03:27', '2022-03-24 06:03:27'),
(3, 4, 7, 27, '201', '2', 3500, '2022-03-26', '16:20:00', 'Sonnet', '01715413808', 'sonnet@gmail.com', '2022-03-26 04:21:07', '2022-03-26 04:21:07'),
(4, 3, 6, 25, '601', '1', 4000, '2022-03-26', '06:33:00', 'Sonnet', '01715413808', 'sonnet@gmail.com', '2022-03-26 04:32:14', '2022-03-26 04:32:14');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `no_days` int(11) DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `user_id`, `no_days`, `day`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(3, 25, 2, '[\"Sunday\",\"Tuesday\"]', '[\"12:15\",\"13:16\"]', '[\"12:15\",\"13:16\"]', '2022-03-30 08:12:25', '2022-03-30 09:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accomodation_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `room_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupied` int(11) NOT NULL DEFAULT 0,
  `booked` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `accomodation_id`, `room_id`, `room_no`, `seat_no`, `floor_no`, `occupied`, `booked`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '501', '1', '5', 0, 1, '2022-03-24 03:54:08', '2022-03-24 04:09:53'),
(5, 2, 4, '402', '1', '4', 0, 0, '2022-03-24 06:01:41', '2022-03-24 06:01:41'),
(6, 2, 4, '402', '2', '4', 0, 1, '2022-03-24 06:01:41', '2022-03-24 06:03:27'),
(19, 5, 5, '302', '1', '3', 0, 0, '2022-03-26 00:29:49', '2022-03-26 00:29:49'),
(20, 5, 5, '302', '2', '3', 0, 0, '2022-03-26 00:29:49', '2022-03-26 00:29:49'),
(21, 5, 5, '302', '3', '3', 0, 0, '2022-03-26 00:29:49', '2022-03-26 00:29:49'),
(22, 5, 5, '302', '4', '3', 0, 0, '2022-03-26 00:29:49', '2022-03-26 00:29:49'),
(23, 5, 5, '302', '5', '3', 0, 0, '2022-03-26 00:29:49', '2022-03-26 00:29:49'),
(24, 5, 5, '302', '6', '3', 0, 0, '2022-03-26 00:29:49', '2022-03-26 00:29:49'),
(25, 3, 6, '601', '1', '6', 0, 1, '2022-03-26 01:31:08', '2022-03-26 04:32:14'),
(26, 4, 7, '201', '1', '2', 0, 0, '2022-03-26 01:31:43', '2022-03-26 01:31:43'),
(27, 4, 7, '201', '2', '2', 0, 1, '2022-03-26 01:31:43', '2022-03-26 04:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `test_name`, `cost`, `created_at`, `updated_at`) VALUES
(1, 'Endoscopy', 5000, '2022-03-23 16:00:12', '2022-03-23 16:00:12'),
(2, 'CT-scans', 6000, '2022-03-23 16:01:53', '2022-03-23 16:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `test_results`
--

CREATE TABLE `test_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `completed` int(11) DEFAULT 0,
  `test_date` date NOT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_results`
--

INSERT INTO `test_results` (`id`, `test_id`, `completed`, `test_date`, `patient_name`, `phone`, `email`, `age`, `sex`, `result`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-03-24', 'Fatin', '12345678', 'fatin@gmail.com', 20, 'male', 'Something Something', '2022-03-23 16:36:33', '2022-03-23 16:37:13'),
(2, 1, 0, '2022-03-24', 'Fatin', '12345678', 'fatin@gmail.com', 20, 'male', NULL, '2022-03-23 16:39:38', '2022-03-23 16:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `role`, `image`, `phone`, `address`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(20, 'sadmin', 'admin', '1497098527.jpg', '12345678', 'address', 'sadmin@gmail.com', NULL, '$2y$10$QmEb0YzvEU5loUgJ/9BnuuybVIMzAK82Qrr/IGZW9rLl53sMZ2FUi', NULL, '2022-03-18 08:05:25', '2022-03-18 08:28:03'),
(21, 'hospital', 'hospital', '1047392364.jpg', '123456', 'address', 'hospital@gmail.com', NULL, '$2y$10$TAmn.UrIa6UucEeonVHwtuozJjxsYeP.jH./F2gmYI.vqrrvfM0mK', NULL, '2022-03-18 08:20:46', '2022-03-18 08:26:58'),
(25, 'tommm', 'doctor', '1977847201.jpg', '12345678', 'Address', 'tom@gmail.com', NULL, '$2y$10$lIosP/n/d0zVfeOHAgBBVuUd7cQZVhkyJYU7HT.SUM1a3Bxg.z7NC', NULL, '2022-03-19 02:38:48', '2022-03-19 04:06:50'),
(28, 'Fatin', 'patient', '1973740697.jpg', '12345678', 'Address of Address', 'fatin@gmail.com', NULL, '$2y$10$.hQB09NePyZ8.dR2OPVRgOCffQm.qoTIJ6bFoSCNP98YVK7snu13m', NULL, '2022-03-23 16:56:47', '2022-03-23 16:56:47'),
(29, 'doctor1', 'doctor', '144404778.jpg', '15697890890', 'Something Something', 'doctor1@gmail.com', NULL, '$2y$10$i3YuyZuqL/cIvvGARRV3gea6AFmcBR07oiOFQrFlsezCS8uYDzaRu', NULL, '2022-03-23 17:16:01', '2022-03-23 17:16:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodations`
--
ALTER TABLE `accomodations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambulances`
--
ALTER TABLE `ambulances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambulance_bookings`
--
ALTER TABLE `ambulance_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_email_unique` (`email`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`),
  ADD KEY `doctors_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_bookings`
--
ALTER TABLE `room_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_results`
--
ALTER TABLE `test_results`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `accomodations`
--
ALTER TABLE `accomodations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ambulances`
--
ALTER TABLE `ambulances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ambulance_bookings`
--
ALTER TABLE `ambulance_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room_bookings`
--
ALTER TABLE `room_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test_results`
--
ALTER TABLE `test_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
