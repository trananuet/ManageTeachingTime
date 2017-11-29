-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2017 lúc 04:26 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `manage_teaching_time`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `functions`
--

CREATE TABLE `functions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_function` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `functions`
--

INSERT INTO `functions` (`id`, `name_function`, `created_at`, `updated_at`) VALUES
(11, 'Xem năm học', NULL, NULL),
(12, 'Thêm, sửa năm học', NULL, NULL),
(13, 'Xóa năm học', NULL, NULL),
(21, 'Xem học kỳ', NULL, NULL),
(22, 'Thêm, sửa học kỳ', NULL, NULL),
(23, 'Xóa học kỳ', NULL, NULL),
(25, '134', '2017-11-28 19:19:47', '2017-11-28 19:19:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_11_05_152803_create_school_years_table', 1),
(2, '2017_11_10_111245_create_semesters_table', 1),
(3, '2014_10_12_000000_create_users_table', 2),
(4, '2014_10_12_100000_create_password_resets_table', 2),
(5, '2017_11_15_042608_create_user_roles_table', 3),
(6, '2017_11_15_043140_create_roles_table', 3),
(7, '2017_11_19_162728_create_fucntions_table', 4),
(8, '2017_11_19_164739_create_role_functions_table', 4),
(9, '2017_11_28_061553_create_trainings_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(0, 'Admin', NULL, '2017-11-23 23:11:01'),
(1, 'Phòng đào tạo', NULL, NULL),
(2, 'Khách', NULL, NULL),
(16, '1231123125554', '2017-11-23 23:16:26', '2017-11-28 14:47:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_functions`
--

CREATE TABLE `role_functions` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `function_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_functions`
--

INSERT INTO `role_functions` (`id`, `role_id`, `function_id`, `created_at`, `updated_at`) VALUES
(1, 0, 11, NULL, NULL),
(2, 0, 12, NULL, NULL),
(3, 0, 13, NULL, NULL),
(4, 0, 21, NULL, NULL),
(5, 0, 22, NULL, NULL),
(6, 0, 23, NULL, NULL),
(7, 1, 11, NULL, NULL),
(8, 1, 12, NULL, NULL),
(9, 1, 21, NULL, NULL),
(10, 1, 22, NULL, NULL),
(11, 2, 11, NULL, NULL),
(12, 2, 21, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `school_years`
--

CREATE TABLE `school_years` (
  `yearID` int(10) UNSIGNED NOT NULL,
  `trainingID` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `school_years`
--

INSERT INTO `school_years` (`yearID`, `trainingID`, `name`, `active`, `created_at`, `updated_at`) VALUES
(5, 1, 'Năm học 2017 - 2018', 1, '2017-11-11 02:26:59', '2017-11-11 02:26:59'),
(23, 1, 'Năm học 2015-2016', 1, '2017-11-16 14:39:15', '2017-11-16 14:39:15'),
(26, 1, 'Năm học 2014-2015', 0, '2017-11-21 01:54:26', '2017-11-21 01:54:26'),
(28, 2, '11122', 1, '2017-11-28 09:41:36', '2017-11-28 09:55:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `semesters`
--

CREATE TABLE `semesters` (
  `semesterID` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `semesters`
--

INSERT INTO `semesters` (`semesterID`, `name`, `yearID`, `created_at`, `updated_at`) VALUES
(2, 'Học kì 2', 23, NULL, '2017-11-23 09:52:42'),
(17, '123', 5, '2017-11-21 02:17:06', '2017-11-21 02:17:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trainings`
--

CREATE TABLE `trainings` (
  `trainingID` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trainings`
--

INSERT INTO `trainings` (`trainingID`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Trong chương trình đại học', NULL, NULL),
(2, 'Sau đại học', NULL, NULL),
(4, '12312123213123qewqwe', '2017-11-28 01:10:45', '2017-11-28 01:13:43'),
(6, '12312123211232', '2017-11-28 01:11:22', '2017-11-28 01:11:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Trần Văn An', 'tranvananuet@gmail.com', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL, NULL),
(2, 'B', 'herolhp96@gmail.com', '$2y$10$S2fLYS.bmAmWFI4QfEhyZ./0U3Tet4TZan0UHp6xIWYmz5Sn6IEfy', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 0, NULL, NULL),
(2, 1, 1, NULL, NULL),
(3, 2, 2, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `functions`
--
ALTER TABLE `functions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_functions`
--
ALTER TABLE `role_functions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `school_years`
--
ALTER TABLE `school_years`
  ADD PRIMARY KEY (`yearID`);

--
-- Chỉ mục cho bảng `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`semesterID`);

--
-- Chỉ mục cho bảng `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`trainingID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `functions`
--
ALTER TABLE `functions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT cho bảng `role_functions`
--
ALTER TABLE `role_functions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `school_years`
--
ALTER TABLE `school_years`
  MODIFY `yearID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT cho bảng `semesters`
--
ALTER TABLE `semesters`
  MODIFY `semesterID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT cho bảng `trainings`
--
ALTER TABLE `trainings`
  MODIFY `trainingID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
