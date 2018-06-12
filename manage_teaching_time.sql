-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 12, 2018 lúc 12:53 PM
-- Phiên bản máy phục vụ: 10.1.29-MariaDB
-- Phiên bản PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `account`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Việt Anh', 'anhnv@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(2, 'Trần Văn An', 'tranvananuet@gmail.com', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(3, 'Trần Thanh Hải', 'haitt@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(10, 'Bùi Quang Hưng', 'hungbq@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(11, 'Nguyễn Thúy Hạnh', 'hanhnt@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(12, 'Nguyễn Minh Hà', 'hanm@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(13, 'Phạm Thu Hà', 'hapt@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(14, 'Ngô Phương Thanh', 'thanhnp@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(15, 'Nguyễn Văn Quang', 'quangnv@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(16, 'Bùi Nguyên Quốc Trình', 'trinhbnq@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(17, 'Cao Văn Mai', 'maicv@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(18, 'Đặng Thị Ngọc Yến', 'yendtn@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(19, 'Lã Đức Việt', 'vietld@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(20, 'Nguyễn Quang Huân', 'huannq@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(21, 'Đỗ Thị Hương Giang', 'giangdth@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(22, 'Vũ Nguyên Thức', 'thucnv@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(23, 'Đỗ Hà Lan', 'landh@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(24, 'Nguyễn Hồng Phong', 'phongnh@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(25, 'Đinh Văn Châu', 'chaudv@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(26, 'Nguyễn Thị Minh Hồng', 'hongntm@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(27, 'Nguyễn Ngọc An', 'annn@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(28, 'Trần Thu Hà', 'hatt@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(29, 'Vũ Bá Duy', 'duyvb@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(30, 'Ngô Thị Duyên', 'duyennt@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(31, 'Nguyễn Đức Cường', 'cuongnd@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(32, 'Lê Việt Cường', 'cuonglv@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(33, 'Nguyễn Văn Tùng', 'tungnv@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(34, 'Đỗ Đức Đông', 'dongdd@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(35, 'Lê Nguyên Khôi', 'khoiln@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(36, 'Đào Như Mai', 'maidn@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(37, 'Lê Phê Đô', 'dolp@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(38, 'Bùi Đình Tú', 'tubd@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(39, 'Trần Quốc Long', 'longtq@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(40, 'Dư Phương Hạnh', 'hanhdp@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(41, 'Bùi Văn Quang', 'quangbv@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(42, 'Phạm Ngọc Hùng', 'hungpn@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(43, 'Nguyễn Nhật Nam', 'namnn@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(44, 'Nguyễn Đình Đông', 'dongnd@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(45, 'Nguyễn Văn Sáng', 'sangnv@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(46, 'Nguyễn Văn Nam', 'namnv@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(47, 'Trần Đăng Khoa', 'khoatd@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(48, 'Nguyễn Viết Tú', 'tunv@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(49, 'Nguyễn Diệu Hương', 'huongnd@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(50, 'Trần Đình Trọng', 'trongtd@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(51, 'Ngô Phương Tuấn', 'tuannp@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(52, 'Nguyễn Chiến Công', 'congnc@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(53, 'Đinh Văn Dư', 'dudv@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL),
(54, 'Lê Đình Hào', 'haold@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` int(11) NOT NULL,
  `semesterID` int(11) NOT NULL,
  `yearID` int(11) NOT NULL,
  `theory` float DEFAULT NULL,
  `practice` float DEFAULT NULL,
  `self_study` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`id`, `name`, `code_name`, `credit`, `semesterID`, `yearID`, `theory`, `practice`, `self_study`, `created_at`, `updated_at`) VALUES
(1, 'Cơ sở dữ liệu', 'INT202', 3, 1, 4, 30, 15, 5, NULL, '2018-05-09 12:19:24'),
(2, 'Toán cao cấp', 'INT203', 4, 1, 4, 40, 10, 1, '2017-12-07 07:47:41', '2018-05-09 12:20:12'),
(3, 'Phát triển ứng dụng web', 'INT204', 3, 1, 4, 30, 15, 3, NULL, '2018-05-09 12:20:32'),
(4, 'Tín hiệu hệ thống', 'INT206', 3, 1, 4, 30, 15, 4, '2017-12-31 15:38:01', '2018-05-09 12:20:42'),
(5, 'Toán rời rạc', 'INT207', 3, 1, 4, 30, 15, 4, '2018-01-01 13:30:27', '2018-05-09 12:20:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_lecturers`
--

CREATE TABLE `course_lecturers` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacherName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semesterID` int(11) NOT NULL,
  `number_of_students` int(11) NOT NULL,
  `course_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theory_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theory_in_hour` int(11) NOT NULL,
  `theory_overtime` int(11) NOT NULL,
  `theory_day_off` int(11) NOT NULL,
  `theory_standard` int(11) NOT NULL,
  `practice_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `practice_in_hour` int(11) NOT NULL,
  `practice_overtime` int(11) NOT NULL,
  `practice_day_off` int(11) NOT NULL,
  `practice_standard` int(11) NOT NULL,
  `self_learning_time` int(11) NOT NULL,
  `self_learning_standard` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `data_guides`
--

CREATE TABLE `data_guides` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacherID` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `data_guides`
--

INSERT INTO `data_guides` (`id`, `teacherID`, `type`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, NULL, NULL),
(2, 1, 1, 2, NULL, NULL),
(3, 1, 2, 4, NULL, NULL),
(4, 3, 3, 2, NULL, NULL),
(5, 2, 0, 1, '2018-03-26 01:34:00', '2018-03-26 01:34:00'),
(6, 2, 1, 2, '2018-03-26 01:34:00', '2018-03-26 01:34:00'),
(7, 2, 2, 3, '2018-03-26 01:34:00', '2018-03-26 01:34:00'),
(8, 2, 3, 4, '2018-03-26 01:34:00', '2018-03-26 01:34:00'),
(9, 33, 0, 1, '2018-05-09 05:32:42', '2018-05-09 05:32:42'),
(10, 33, 3, 2, '2018-05-09 05:32:42', '2018-05-09 05:32:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `data_teaches`
--

CREATE TABLE `data_teaches` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacherName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semesterID` int(11) NOT NULL,
  `number_of_students` int(11) DEFAULT NULL,
  `course_group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theory_group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_student_theory` int(11) DEFAULT NULL,
  `sum_theory_hour` float DEFAULT NULL,
  `theory_in_hour` float DEFAULT NULL,
  `theory_overtime` float DEFAULT NULL,
  `theory_day_off` float DEFAULT NULL,
  `practice_group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum_practice_hour` float DEFAULT NULL,
  `number_student_practice` float DEFAULT NULL,
  `practice_in_hour` float DEFAULT NULL,
  `practice_overtime` float DEFAULT NULL,
  `practice_day_off` float DEFAULT NULL,
  `self_learning_time` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `data_teaches`
--

INSERT INTO `data_teaches` (`id`, `teacherName`, `courseName`, `semesterID`, `number_of_students`, `course_group`, `theory_group`, `number_student_theory`, `sum_theory_hour`, `theory_in_hour`, `theory_overtime`, `theory_day_off`, `practice_group`, `sum_practice_hour`, `number_student_practice`, `practice_in_hour`, `practice_overtime`, `practice_day_off`, `self_learning_time`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Việt Anh', 'Phát triển ứng dụng web', 1, 109, 'CL', '1', 16, 30, 30, 0, 0, '0', 0, NULL, 0, 0, 0, 0, '2017-12-22 16:14:28', '2018-05-07 00:36:07'),
(2, 'Bùi Quang Hưng', 'Kho Dữ Liệu', 1, 16, 'CL', '1', 16, 15, 15, 0, 0, '1', 22, 15, 22, 0, 0, 8, '2018-01-02 15:45:43', '2018-05-07 00:25:21'),
(3, 'Bùi Văn Quang', 'Toán cao cấp', 1, 58, 'CL', '1', 58, 45, 45, 0, 0, '0', 0, NULL, 0, 0, 0, 0, '2018-01-02 16:09:58', '2018-05-06 23:43:31'),
(4, 'Phạm Ngọc Hùng', 'Phân tích thiết kế HĐT', 1, 80, 'CL', '1', 78, 35, 24, 0, 0, '1', 15, 20, 0, 0, 0, 2, '2018-01-02 16:13:33', '2018-05-07 00:34:08'),
(5, 'Nguyễn Nhật Nam', 'Tiếng Anh A1', 1, 35, 'CL', '1', 35, 20, 20, 0, 0, '0', 0, 0, 0, 0, 0, 0, '2018-03-31 02:31:50', '2018-05-07 00:27:11'),
(8, 'Nguyễn Đình Đông', 'Xác suất thống kê', 1, 69, 'CL', '1', 69, 45, 45, 0, 0, '0', 0, 0, 0, 0, 0, 0, NULL, NULL),
(9, 'Nguyễn Văn Sáng', 'Lập trình hướng đối tượng', 1, 23, 'CL', '0', 0, 0, 0, 0, 0, '2', 24, 23, 23, 0, 1, 3, NULL, NULL),
(10, 'Nguyễn Văn Nam', 'Xác suất thống kê', 1, 60, 'CL', '1', 69, 45, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Trần Đăng Khoa', 'Lập trình hướng đối tượng', 1, 70, 'CL', '1', 0, NULL, NULL, NULL, NULL, '2', 24, 23, 23, NULL, 1, 3, NULL, NULL),
(12, 'Nguyễn Viết Tú', 'Phát triển ứng dụng web', 1, 80, 'CL', '1', 78, 30, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Nguyễn Diệu Hương', 'Kho Dữ Liệu', 1, 45, 'CL', '1', 44, 15, 15, NULL, NULL, '1', 22, 15, NULL, NULL, NULL, 2, NULL, NULL),
(14, 'Trần Đình Trọng', 'Toán cao cấp', 1, 34, 'CL', '1', 33, 45, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Ngô Phương Tuấn', 'Phân tích thiết kế HĐT', 1, 67, 'CL', '1', 65, 35, 24, NULL, NULL, '1', 15, 20, NULL, NULL, NULL, 3, NULL, NULL),
(16, 'Nguyễn Chiến Công', 'Tiếng Anh A1', 1, 23, 'CL', '1', 35, 20, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Đinh Văn Dư', 'Xác suất thống kê', 1, 78, 'CL', '1', 69, 45, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Lê Đình Hào', 'Lập trình hướng đối tượng', 1, 67, 'CL', '1', 67, 45, 30, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `facultys`
--

CREATE TABLE `facultys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `facultys`
--

INSERT INTO `facultys` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Khoa công nghệ thông tin', NULL, '2017-12-31 08:49:02'),
(2, 'Khoa điện tử viễn thông', '2017-12-08 16:20:08', '2017-12-31 08:48:58'),
(3, 'Khoa vật lý kĩ thuật và công nghệ nano', '2017-12-31 08:49:20', '2017-12-31 08:49:20'),
(4, 'Khoa cơ học kĩ thuật và tự động hóa', '2017-12-31 08:49:36', '2017-12-31 08:49:36');

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
(1, 'Quản lý hệ đào tạo', NULL, '2017-12-08 14:23:11'),
(2, 'Quản lý năm học', NULL, '2017-12-08 14:23:48'),
(3, 'Quản lý học kỳ', NULL, '2017-12-08 14:24:07'),
(4, 'Quản lý chức danh', NULL, '2017-12-08 14:24:51'),
(5, 'Quản lý khoa, phòng ban', NULL, '2017-12-08 14:24:59'),
(6, 'Quản lý giảng viên', NULL, '2017-12-08 14:25:11'),
(7, 'Quản lý môn học', '2017-11-28 05:19:47', '2017-12-08 14:25:26'),
(8, 'Quản lý kiểu đề tài', '2017-12-08 14:25:41', '2018-03-27 21:11:22'),
(9, 'Quản lý định mức chi trả', '2017-12-08 14:25:58', '2017-12-08 14:25:58'),
(12, 'Quản lý hệ thống vai trò', '2017-12-08 14:26:35', '2017-12-08 14:26:35'),
(13, 'Quản lý hệ thống người dùng', '2017-12-08 14:26:45', '2017-12-08 14:26:45'),
(14, 'Quản lý hệ thống chức năng', '2017-12-08 14:27:00', '2017-12-08 14:27:00'),
(15, 'Quản lý hệ thống phân quyền', '2017-12-08 14:27:10', '2017-12-08 14:27:10'),
(16, 'Quản lý hệ thống nhật ký', '2017-12-08 14:27:20', '2017-12-08 14:27:20'),
(17, 'Quản lý nhập dữ liệu hướng dẫn', '2018-04-03 01:44:27', '2018-04-03 01:44:27'),
(18, 'Quản lý nhập dữ liệu giảng dạy', '2018-04-03 01:44:36', '2018-04-03 01:44:36'),
(19, 'Quản lý thống kê số liệu hướng dẫn của giảng viên', '2018-04-03 01:44:43', '2018-04-03 01:44:43'),
(20, 'Quản lý thống kê giờ giảng của giảng viên', '2018-04-03 01:44:51', '2018-04-03 01:44:51');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_05_062115_create_accounts_table', 1),
(4, '2018_03_11_181516_create_data_guides_table', 2),
(14, '2017_12_08_060821_create_course_lecturers_table', 4),
(15, '2017_12_08_060908_create_thesis_lecturers_table', 4),
(18, '2017_11_19_162728_create_fucntions_table', 5),
(20, '2017_11_15_042608_create_user_roles_table', 6),
(21, '2017_11_15_043140_create_roles_table', 6),
(22, '2017_11_19_162728_create_functions_table', 6),
(23, '2017_11_19_164739_create_role_functions_table', 6),
(24, '2017_11_05_152803_create_school_years_table', 7),
(25, '2017_11_10_111245_create_semesters_table', 7),
(26, '2017_11_28_061553_create_trainings_table', 7),
(27, '2017_12_07_133850_create_titles_table', 7),
(28, '2017_12_07_134543_create_facultys_table', 7),
(29, '2017_12_07_134604_create_teachers_table', 7),
(30, '2017_12_07_134635_create_courses_table', 7),
(31, '2017_12_07_134650_create_thesis_table', 7),
(32, '2017_12_08_060618_create_salarys_table', 7),
(35, '2018_03_28_051325_create_data_teaches_table', 8);

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
(1, 'Admin', NULL, '2017-11-23 09:11:01'),
(2, 'Phòng đào tạo', NULL, NULL),
(3, 'Giảng viên', NULL, '2018-02-05 20:02:57'),
(4, 'Khách', '2017-11-23 09:16:26', '2018-02-05 20:04:37');

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
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 1, 6, NULL, NULL),
(7, 1, 7, NULL, NULL),
(8, 1, 8, NULL, NULL),
(9, 1, 9, NULL, NULL),
(10, 1, 17, NULL, NULL),
(11, 1, 18, NULL, NULL),
(12, 1, 12, NULL, NULL),
(13, 1, 13, '2017-12-08 14:30:40', '2017-12-08 14:30:40'),
(14, 1, 14, '2017-12-08 14:30:40', '2017-12-08 14:30:40'),
(15, 1, 15, '2017-12-08 14:30:40', '2017-12-08 14:30:40'),
(16, 1, 16, '2017-12-08 14:30:40', '2017-12-08 14:30:40'),
(17, 2, 1, NULL, NULL),
(22, 3, 1, NULL, NULL),
(23, 3, 2, NULL, NULL),
(24, 3, 3, NULL, NULL),
(25, 4, 6, NULL, NULL),
(26, 4, 7, NULL, NULL),
(27, 4, 8, NULL, NULL),
(28, 4, 9, NULL, NULL),
(29, 4, 10, NULL, NULL),
(30, 4, 11, NULL, NULL),
(31, 2, 16, '2017-12-09 15:09:08', '2017-12-09 15:09:08'),
(32, 3, 10, '2018-02-05 20:10:48', '2018-02-05 20:10:48'),
(33, 3, 11, '2018-02-05 20:10:48', '2018-02-05 20:10:48'),
(34, 1, 19, NULL, NULL),
(35, 1, 20, NULL, NULL),
(36, 3, 19, '2018-04-03 08:51:09', '2018-04-03 08:51:09'),
(37, 3, 20, '2018-04-03 08:51:10', '2018-04-03 08:51:10'),
(38, 2, 1, '2018-04-22 11:53:23', '2018-04-22 11:53:23'),
(39, 2, 2, '2018-04-22 11:53:23', '2018-04-22 11:53:23'),
(40, 2, 3, '2018-04-22 11:53:23', '2018-04-22 11:53:23'),
(41, 2, 4, '2018-04-22 11:53:23', '2018-04-22 11:53:23'),
(42, 2, 5, '2018-04-22 11:53:23', '2018-04-22 11:53:23'),
(48, 2, 17, '2018-04-22 11:53:23', '2018-04-22 11:53:23'),
(49, 2, 18, '2018-04-22 11:53:23', '2018-04-22 11:53:23'),
(50, 2, 19, '2018-04-22 11:53:23', '2018-04-22 11:53:23'),
(51, 2, 20, '2018-04-22 11:53:23', '2018-04-22 11:53:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `salarys`
--

CREATE TABLE `salarys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titleID` int(11) NOT NULL,
  `money` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `salarys`
--

INSERT INTO `salarys` (`id`, `name`, `titleID`, `money`, `created_at`, `updated_at`) VALUES
(1, 'nguyễn văn A', 1, '1200', NULL, '2017-12-07 09:40:56'),
(2, 'Nguyễn văn B', 2, '121', '2017-12-08 17:04:03', '2017-12-08 17:04:17');

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
(1, 1, 'Năm học 2014 - 2015', 0, '2017-12-07 07:36:07', '2017-12-31 08:45:57'),
(2, 1, 'Năm học 2015 - 2016', 0, NULL, '2018-02-04 00:13:06'),
(3, 1, 'Năm học 2016 - 2017', 0, NULL, '2018-03-31 02:09:38'),
(4, 1, 'Năm học 2017 - 2018', 1, NULL, '2018-03-31 02:09:34'),
(5, 2, 'Năm học 2017 - 2018', 0, NULL, '2017-12-31 08:46:23');

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
(1, 'Học kỳ 1', 4, '2018-03-26 11:49:26', '2018-03-26 11:49:26'),
(2, 'Học kỳ 1', 3, '2018-03-31 02:08:34', '2018-03-31 02:08:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titleID` int(11) NOT NULL,
  `facultyID` int(11) NOT NULL,
  `reduce` int(11) DEFAULT NULL,
  `account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `titleID`, `facultyID`, `reduce`, `account`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Việt Anh', 2, 1, 12001, 'anhnv@vnu.edu.vn', '2017-12-06 17:22:24', '2017-12-31 08:50:01'),
(2, 'Trần Quốc Long', 1, 4, 12001, 'longtq@vnu.edu.vn', '2017-12-08 13:59:48', '2017-12-31 08:50:20'),
(3, 'Bùi Quang Hưng', 2, 1, 12001, 'hungbq@vnu.edu.vn', '2017-12-08 13:59:48', '2017-12-31 08:50:29'),
(4, 'Nguyễn Thúy Hạnh', 1, 2, 12001, 'hanhnt@vnu.edu.vn', NULL, NULL),
(5, 'Nguyễn Minh Hà', 1, 1, 12001, 'hanm@vnu.edu.vn', NULL, NULL),
(6, 'Phạm Thu Hà', 1, 2, 12001, 'hapt@vnu.edu.vn', NULL, NULL),
(7, 'Ngô Phương Thanh', 1, 1, 12001, 'thanhnp@vnu.edu.vn', NULL, NULL),
(8, 'Nguyễn Văn Quang', 1, 2, 12001, 'quangnv@vnu.edu.vn', NULL, NULL),
(9, 'Bùi Nguyên Quốc Trình', 1, 2, 12001, 'trinhbnq@vnu.edu.vn', NULL, NULL),
(10, 'Cao Văn Mai', 1, 3, 12001, 'maicv@vnu.edu.vn', NULL, NULL),
(11, 'Đặng Thị Ngọc Yến', 1, 2, 12001, 'yendtn@vnu.edu.vn', NULL, NULL),
(12, 'Lã Đức Việt', 1, 4, 12001, 'vietld@vnu.edu.vn', NULL, NULL),
(13, 'Nguyễn Quang Huân', 1, 3, 12001, 'huannq@vnu.edu.vn', NULL, NULL),
(14, 'Đỗ Thị Hương Giang', 1, 2, 12001, 'giangdth@vnu.edu.vn', NULL, NULL),
(15, 'Vũ Nguyên Thức', 1, 3, 12001, 'thucnv@vnu.edu.vn', NULL, NULL),
(16, 'Đỗ Hà Lan', 2, 2, 12001, 'landh@vnu.edu.vn', NULL, NULL),
(17, 'Nguyễn Hồng Phong', 2, 3, 12001, 'phongnh@vnu.edu.vn', NULL, NULL),
(18, 'Đinh Văn Châu', 2, 2, 12001, 'chaudv@vnu.edu.vn', NULL, NULL),
(19, 'Nguyễn Thị Minh Hồng', 2, 3, 12001, 'hongntm@vnu.edu.vn', NULL, NULL),
(20, 'Nguyễn Ngọc An', 2, 3, 12001, 'annn@vnu.edu.vn', NULL, NULL),
(21, 'Trần Thu Hà', 2, 2, 12001, 'hatt@vnu.edu.vn', NULL, NULL),
(22, 'Vũ Bá Duy', 2, 3, 12001, 'duyvb@vnu.edu.vn', NULL, NULL),
(23, 'Ngô Thị Duyên', 2, 2, 12001, 'duyennt@vnu.edu.vn', NULL, NULL),
(24, 'Nguyễn Đức Cường', 2, 3, 12001, 'cuongnd@vnu.edu.vn', NULL, NULL),
(25, 'Lê Việt Cường', 2, 2, 12001, 'cuonglv@vnu.edu.vn', NULL, NULL),
(26, 'Nguyễn Văn Tùng', 2, 2, 12001, 'tungnv@vnu.edu.vn', NULL, NULL),
(27, 'Đỗ Đức Đông', 2, 1, 12001, 'dongdd@vnu.edu.vn', NULL, NULL),
(28, 'Lê Nguyên Khôi', 2, 2, 12001, 'khoiln@vnu.edu.vn', NULL, NULL),
(29, 'Đào Như Mai', 2, 2, 12001, 'maidn@vnu.edu.vn', NULL, NULL),
(30, 'Lê Phê Đô', 2, 2, 12001, 'dolp@vnu.edu.vn', NULL, NULL),
(31, 'Bùi Đình Tú', 2, 1, 12001, 'tubd@vnu.edu.vn', NULL, NULL),
(32, 'Trần Thanh Hải', 2, 2, 12001, 'haitt@vnu.edu.vn', NULL, NULL),
(33, 'Dư Phương Hạnh', 2, 2, 12001, 'hanhdp@vnu.edu.vn', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thesis`
--

CREATE TABLE `thesis` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quota` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thesis`
--

INSERT INTO `thesis` (`id`, `type`, `name`, `quota`, `created_at`, `updated_at`) VALUES
(1, 0, 'Khóa luân', 1, '2017-12-08 16:01:04', '2017-12-08 16:01:04'),
(2, 1, 'Luận văn', 12, '2017-12-08 17:10:41', '2017-12-08 17:10:41'),
(3, 2, 'Luận án', 2, NULL, NULL),
(4, 3, 'Niên luận', 20, '2018-01-14 20:38:05', '2018-01-14 20:38:05'),
(5, 5, 'Luận văn tiến sĩ', 20, '2018-03-27 21:17:09', '2018-03-27 21:17:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thesis_lecturers`
--

CREATE TABLE `thesis_lecturers` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacherID` int(11) NOT NULL,
  `khoa_luan` int(11) NOT NULL,
  `luan_van` int(11) NOT NULL,
  `luan_an` int(11) NOT NULL,
  `nien_luan` int(11) NOT NULL,
  `sum_thesis` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `titles`
--

CREATE TABLE `titles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) DEFAULT NULL,
  `quota` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `titles`
--

INSERT INTO `titles` (`id`, `name`, `active`, `quota`, `created_at`, `updated_at`) VALUES
(1, 'Thạc sĩ', 1, 12, NULL, '2018-05-09 12:21:07'),
(2, 'Tiến sĩ', 1, 35, '2017-12-08 14:03:48', '2018-05-09 12:21:11');

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
(1, 'Đại học', '2017-12-07 07:35:55', '2017-12-08 16:07:22'),
(2, 'Sau đại học', '2017-12-08 14:28:40', '2017-12-08 14:29:11');

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
(2, 'Nguyễn Chiến Công', 'herolhp96@gmail.com', '$2y$10$S2fLYS.bmAmWFI4QfEhyZ./0U3Tet4TZan0UHp6xIWYmz5Sn6IEfy', NULL, NULL, NULL),
(3, 'Nam', 'admindemo@gmail.com', '$2y$10$HZ8z22GKEl4tWtBIVb3Le.6ptlf2aLE/bfW2b.KHY9hnpoK/N2E0a', NULL, '2017-12-08 14:28:03', '2017-12-08 14:28:03'),
(4, 'Trần Thanh Hải', 'haitt@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, '2018-04-02 22:04:15', '2018-04-02 22:04:15'),
(5, 'Nguyễn Việt Anh', 'anhnv@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, '2018-04-05 07:13:15', '2018-04-05 07:13:15'),
(6, 'Dư Phương Hạnh', 'hanhdp@vnu.edu.vn', '$2y$10$LgEdhHnNSSDcYm7ou6AJ8uEcu6YEK1sw3nSQV9B4jgWrea2Q7a40q', NULL, '2018-05-09 05:33:20', '2018-05-09 05:33:20');

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
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 3, NULL, NULL),
(4, 3, 2, '2017-12-08 14:28:03', '2017-12-09 14:54:57'),
(5, 4, 3, '2018-04-02 22:04:15', '2018-04-02 22:04:15'),
(6, 5, 3, '2018-04-05 07:13:15', '2018-04-05 07:13:15'),
(7, 6, 3, '2018-05-09 05:33:21', '2018-05-09 05:33:21');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_account_unique` (`account`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `course_lecturers`
--
ALTER TABLE `course_lecturers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `data_guides`
--
ALTER TABLE `data_guides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `data_teaches`
--
ALTER TABLE `data_teaches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `facultys`
--
ALTER TABLE `facultys`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `salarys`
--
ALTER TABLE `salarys`
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
-- Chỉ mục cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thesis`
--
ALTER TABLE `thesis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Chỉ mục cho bảng `thesis_lecturers`
--
ALTER TABLE `thesis_lecturers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `course_lecturers`
--
ALTER TABLE `course_lecturers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `data_guides`
--
ALTER TABLE `data_guides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `data_teaches`
--
ALTER TABLE `data_teaches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `facultys`
--
ALTER TABLE `facultys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `functions`
--
ALTER TABLE `functions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `role_functions`
--
ALTER TABLE `role_functions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `salarys`
--
ALTER TABLE `salarys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `school_years`
--
ALTER TABLE `school_years`
  MODIFY `yearID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `semesters`
--
ALTER TABLE `semesters`
  MODIFY `semesterID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `thesis`
--
ALTER TABLE `thesis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `thesis_lecturers`
--
ALTER TABLE `thesis_lecturers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `trainings`
--
ALTER TABLE `trainings`
  MODIFY `trainingID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
