-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 07 月 03 日 11:00
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `vote`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '序號',
  `acc` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '帳號',
  `pw` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `logs`
--

CREATE TABLE `logs` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '序號',
  `user_id` int(11) UNSIGNED NOT NULL COMMENT '投票者',
  `subject_id` int(11) UNSIGNED NOT NULL,
  `option_id` int(11) UNSIGNED NOT NULL,
  `vote_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `subject_id`, `option_id`, `vote_time`) VALUES
(1, 0, 3, 10, '2022-07-01 03:16:07'),
(2, 0, 2, 7, '2022-07-01 03:16:17'),
(3, 0, 2, 6, '2022-07-01 05:01:12'),
(4, 0, 2, 6, '2022-07-01 05:06:27'),
(5, 0, 3, 12, '2022-07-02 07:14:13'),
(6, 0, 4, 14, '2022-07-02 07:14:24'),
(7, 0, 4, 14, '2022-07-02 07:14:31'),
(8, 0, 4, 15, '2022-07-02 07:14:31'),
(9, 0, 3, 11, '2022-07-02 07:29:22'),
(10, 0, 4, 14, '2022-07-02 09:03:58'),
(11, 0, 4, 15, '2022-07-02 09:03:58'),
(12, 0, 11, 36, '2022-07-02 09:05:25'),
(13, 0, 11, 36, '2022-07-02 09:05:38'),
(14, 0, 11, 37, '2022-07-02 09:05:38'),
(15, 0, 11, 37, '2022-07-02 09:17:36'),
(16, 0, 11, 36, '2022-07-02 09:18:04'),
(17, 0, 11, 37, '2022-07-02 09:18:04');

-- --------------------------------------------------------

--
-- 資料表結構 `options`
--

CREATE TABLE `options` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '序號',
  `option` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '選項描述',
  `subject_id` int(11) UNSIGNED NOT NULL,
  `total` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `options`
--

INSERT INTO `options` (`id`, `option`, `subject_id`, `total`) VALUES
(1, '貓貓最高', 1, 4),
(2, '狗狗最可愛', 1, 0),
(3, '小孩子才做選擇', 1, 1),
(4, '動物先不要', 1, 0),
(5, '逛市集買東西吃東西', 2, 0),
(6, '百岳爬起來', 2, 2),
(7, '上班那麼累，當然在家躺', 2, 1),
(8, '海邊曬肉～～～', 2, 0),
(9, '日本撒錢爆買', 3, 0),
(10, '回香港吃手撕雞腸粉', 3, 2),
(11, '朝聖之路走到腳爛掉', 3, 1),
(12, '做夢比較快到', 3, 1),
(13, '美咖耍美', 2, 0),
(36, 'BL', 11, 3),
(37, '百合', 11, 3),
(41, '殺鬼主題的動畫', 13, 0),
(42, '殭屍主題的展覽', 13, 0),
(43, '蕃茄薯仔湯', 14, 0),
(44, '魷魚肉餅', 14, 0),
(45, '哈哈哈蝦蝦蝦', 14, 0),
(46, '西洋菜排骨湯', 14, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '序號',
  `subject` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '主題描述',
  `type_id` int(11) UNSIGNED NOT NULL,
  `multiple` tinyint(1) NOT NULL DEFAULT 0 COMMENT '單/複選',
  `multi_limit` tinyint(2) NOT NULL DEFAULT 1 COMMENT '單/複選項目數',
  `start` date NOT NULL,
  `end` date NOT NULL,
  `total` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `type_id`, `multiple`, `multi_limit`, `start`, `end`, `total`) VALUES
(1, '貓派vs狗派', 5, 0, 1, '2022-06-30', '2022-07-10', 5),
(2, '週末要幹嘛呀？', 6, 0, 1, '2022-06-30', '2022-07-10', 3),
(3, '解封要去哪裡玩？', 6, 0, 1, '2022-06-30', '2022-07-05', 4),
(11, '嘎嘎嗚拉拉', 1, 1, 1, '2022-07-02', '2022-07-12', 4),
(13, '哪一個比較會教壞小孩？', 7, 0, 1, '2022-07-03', '2022-07-13', 0),
(14, '最鍾意的料理', 6, 1, 1, '2022-07-03', '2022-07-13', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `types`
--

CREATE TABLE `types` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '序號',
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分類名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(5, '動物'),
(6, '生活'),
(7, '究極の選擇');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '序號',
  `acc` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '帳號',
  `pw` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `gender` tinyint(1) UNSIGNED NOT NULL,
  `addr` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '序號';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '序號', AUTO_INCREMENT=18;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '序號', AUTO_INCREMENT=47;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '序號', AUTO_INCREMENT=15;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '序號', AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '序號';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
