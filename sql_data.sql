-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2016 at 09:29 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--
CREATE DATABASE IF NOT EXISTS `elearning` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `elearning`;

-- --------------------------------------------------------

--
-- Table structure for table `class_message`
--

CREATE TABLE IF NOT EXISTS `class_message` (
  `message_content_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `time` datetime NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`message_content_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_message`
--

INSERT INTO `class_message` (`message_content_id`, `subject_id`, `user_id`, `time`, `content`) VALUES
(1, 1, 10, '2016-05-10 12:43:54', 'hhh\n'),
(2, 1, 10, '2016-05-10 12:44:02', 'nhóm lớp\n'),
(3, 1, 11, '2016-05-10 13:55:13', 'ff\n'),
(4, 1, 14, '2016-05-10 14:25:04', 'chat lớp\n'),
(5, 1, 14, '2016-05-10 15:21:27', 'abnnnnnnnnn\n'),
(6, 1, 14, '2016-05-10 15:21:31', 'hhhhhhhhhh\n'),
(7, 1, 14, '2016-05-10 15:21:39', 'lluwaj chọn môn\n'),
(8, 1, 14, '2016-05-10 15:21:42', 'chọn môn\n'),
(9, 1, 14, '2016-05-10 15:21:45', 'được không\n'),
(10, 1, 14, '2016-05-10 15:21:54', 'chat real time\n'),
(11, 1, 14, '2016-05-10 15:22:02', 'sang chat nhóm \n'),
(12, 1, 14, '2016-05-10 15:22:09', 'chuyển chat riêng\n'),
(13, 1, 14, '2016-05-10 15:22:13', '123\n'),
(14, 1, 14, '2016-05-10 15:22:16', '456\n'),
(15, 1, 11, '2016-05-11 16:49:58', '123\n'),
(16, 1, 11, '2016-05-11 16:51:51', '123\n'),
(17, 1, 14, '2016-05-12 14:16:32', 'gg\n'),
(18, 1, 13, '2016-05-13 00:37:51', 'hihi\n'),
(19, 1, 13, '2016-05-15 21:39:44', 'mới vào\n'),
(20, 1, 10, '2016-05-16 22:37:30', '/\n'),
(21, 1, 10, '2016-05-16 22:37:31', '/\n'),
(22, 1, 10, '2016-05-16 22:37:33', '/\n'),
(23, 1, 10, '2016-05-16 22:37:35', '/\n'),
(24, 1, 10, '2016-05-16 22:37:37', '/\n'),
(25, 1, 10, '2016-05-16 22:37:39', '/\n'),
(26, 1, 10, '2016-05-16 22:37:40', '/\n'),
(27, 1, 10, '2016-05-16 22:37:43', '/\n'),
(28, 1, 10, '2016-05-16 22:37:45', '/\n'),
(29, 1, 10, '2016-05-16 22:39:12', 'Các bạn được chia nhóm 1 và 2 vào thảo luận slide số 7 mục 2.1.Ý tưởng , nguyên tắc điều phối của thuật toán điều phối FCFS\n'),
(30, 1, 10, '2016-05-16 22:40:08', 'Các bạn nhóm trưởng quản lý hoạt động của nhóm, sau 10 phút các nhóm đưa ý kiến thảo luận lên cả lớp\n'),
(31, 1, 10, '2016-05-16 22:47:23', 'Các bạn bấm vào Tài liệu tham khảo để xem thêm lấy ý kiến thảo luận nhé\n');

-- --------------------------------------------------------

--
-- Table structure for table `message_content`
--

CREATE TABLE IF NOT EXISTS `message_content` (
  `message_content_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message_id` int(10) UNSIGNED NOT NULL,
  `time` datetime NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`message_content_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message_content`
--

INSERT INTO `message_content` (`message_content_id`, `user_id`, `message_id`, `time`, `content`) VALUES
(1, 10, 1, '2016-05-10 12:44:09', 'nhóm rieeng\n'),
(2, 11, 1, '2016-05-10 14:20:36', 'ok\n'),
(3, 14, 1, '2016-05-10 14:24:58', 'chat nhom\n'),
(4, 11, 1, '2016-05-11 16:50:28', '123\n'),
(5, 14, 1, '2016-05-11 16:52:02', '123\n'),
(6, 14, 1, '2016-05-11 16:52:06', 'abj\n'),
(7, 14, 1, '2016-05-12 13:07:56', 'đ\n'),
(8, 14, 1, '2016-05-12 14:16:37', 'hh\n'),
(9, 13, 2, '2016-05-13 00:37:36', 'hi\n'),
(10, 13, 2, '2016-05-13 00:37:45', 'nhóm hdh2\n'),
(11, 13, 2, '2016-05-15 21:39:35', 'hia\n'),
(12, 10, 2, '2016-05-15 21:49:37', 'hi \n'),
(13, 10, 1, '2016-05-15 21:50:00', 'chào các em\n'),
(14, 10, 1, '2016-05-16 22:41:13', 'Nhóm hdh1\n'),
(15, 10, 1, '2016-05-16 22:41:27', 'Các bạn trả lời câu hỏi thảo luận\n'),
(16, 10, 2, '2016-05-16 22:44:22', 'Các bạn bắt đầu thực hành nhé\n'),
(17, 11, 1, '2016-05-16 22:46:29', 'Theo video thì mình thấy cái nào xuất hiện trước thì được dùng CPU trước\n'),
(18, 12, 1, '2016-05-16 22:49:28', 'xuất hiện trước thì là đợi ở hàng đợi lâu nhất vậy thì suy ra tiến trinh nào đợi ở hàng đợi lâu nhất thì sẽ thự hiện trước đúng không nhỉ\n'),
(19, 17, 0, '2016-05-17 12:50:23', 'hhh\n');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `subject_id`, `name`) VALUES
(1, 1, 'hdh1'),
(2, 1, 'hdh2');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `permission_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`permission_id`, `name`) VALUES
(1, 'teacher'),
(2, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`) VALUES
(1, 'Hệ Điều Hành'),
(2, 'Tin Đại Cương'),
(3, 'Mạng Máy Tính');

-- --------------------------------------------------------

--
-- Table structure for table `user_in_message`
--

CREATE TABLE IF NOT EXISTS `user_in_message` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_in_message`
--

INSERT INTO `user_in_message` (`id`, `user_id`, `message_id`) VALUES
(1, 11, 1),
(2, 14, 1),
(4, 12, 1),
(5, 10, 1),
(6, 13, 2),
(7, 10, 2),
(8, 16, 2),
(9, 15, 2),
(10, 11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE IF NOT EXISTS `user_permission` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`id`, `user_id`, `permission_id`) VALUES
(1, 10, 1),
(2, 11, 2),
(3, 12, 2),
(4, 13, 2),
(5, 14, 2),
(6, 15, 2),
(7, 16, 2),
(8, 17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(10, 'Hue_gv', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'hue@gmail.com'),
(11, 'Hoa_hs1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'hoa@gmail.com'),
(12, 'Lan_hs1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'lan@gmail.com'),
(13, 'Tien_hs2', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tien@gmail.com'),
(14, 'Hoai_hs1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'hoai@gmail.com'),
(15, 'Mai_hs2', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'mai@gmail.com'),
(16, 'Thuy_hs2', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'thuy@gmail.com'),
(17, 'Thang_hs', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'thang@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
