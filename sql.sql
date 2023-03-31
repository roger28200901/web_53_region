-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023 年 03 月 31 日 06:32
-- 伺服器版本： 8.0.27
-- PHP 版本： 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `07`
--

-- --------------------------------------------------------

--
-- 資料表結構 `edms`
--

CREATE TABLE `edms` (
  `id` int NOT NULL,
  `edm_name` text COLLATE utf8_unicode_ci NOT NULL,
  `layout_name` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `edms`
--

INSERT INTO `edms` (`id`, `edm_name`, `layout_name`, `title`, `content`, `image`, `link`, `time`) VALUES
(3, 'Coffee1', 'basic1版型', '1000', 'This is Coffee1', 'images/coffee.jpeg', 'https://www.instagram.com/chen.yunhong/', '2023-03-24 10:37:29'),
(4, 'Coffee2', 'basic3版型', '2000', 'This is Coffee2', 'images/coffee.jpeg', 'https://www.instagram.com/chen.yunhong/', '2023-03-24 10:37:29'),
(5, 'Coffee3', 'basic2版型', '3000', 'This Content\r\nThis ContentThis ContentThis Content\r\nThis Content\r\nThis Content\r\nThis Content', 'images/coffee.jpeg', 'https://www.instagram.com/chen.yunhong/', '2023-03-24 10:41:29'),
(6, 'Coffee3', 'basic2版型', '3000', 'This Content\r\nThis ContentThis ContentThis Content\r\nThis Content\r\nThis Content\r\nThis Content', 'images/coffee.jpeg', 'https://www.instagram.com/chen.yunhong/', '2023-03-24 10:41:29'),
(7, 'Coffee3', 'basic2版型', '3000', 'This Content\r\nThis ContentThis ContentThis Content\r\nThis Content\r\nThis Content\r\nThis Content', 'images/coffee.jpeg', 'https://www.instagram.com/chen.yunhong/', '2023-03-24 10:41:29'),
(8, 'Coffee1', 'basic1版型', '1000', 'This is Coffee1', 'images/coffee.jpeg', 'https://www.instagram.com/chen.yunhong/', '2023-03-24 10:37:29'),
(9, 'Coffee2', 'basic3版型', '2000', 'This is Coffee2', 'images/coffee.jpeg', 'https://www.instagram.com/chen.yunhong/', '2023-03-24 10:37:29'),
(10, 'Coffee3', 'basic2版型', '3000', 'This Content\r\nThis ContentThis ContentThis Content\r\nThis Content\r\nThis Content\r\nThis Content', 'images/coffee.jpeg', 'https://www.instagram.com/chen.yunhong/', '2023-03-24 10:41:29'),
(11, 'Coffee3', 'basic2版型', '3000', 'This Content\r\nThis ContentThis ContentThis Content\r\nThis Content\r\nThis Content\r\nThis Content', 'images/coffee.jpeg', 'https://www.instagram.com/chen.yunhong/', '2023-03-24 10:41:29');

-- --------------------------------------------------------

--
-- 資料表結構 `layouts`
--

CREATE TABLE `layouts` (
  `id` int NOT NULL,
  `layout_name` text COLLATE utf8_unicode_ci NOT NULL,
  `layout_path` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `layouts`
--

INSERT INTO `layouts` (`id`, `layout_name`, `layout_path`) VALUES
(1, 'basic1版型', 'layouts/basic1.html'),
(2, 'basic2版型', 'layouts/basic2.html'),
(3, 'basic3版型', 'layouts/basic3.html'),
(4, '屬於我的版型', 'layouts/1679625357641d0c8df27d5.html'),
(5, 'Test', 'layouts/1679625968641d0ef035be3.html');

-- --------------------------------------------------------

--
-- 資料表結構 `logs`
--

CREATE TABLE `logs` (
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `action` text COLLATE utf8_unicode_ci NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `logs`
--

INSERT INTO `logs` (`username`, `name`, `action`, `time`) VALUES
('admin', '超級管理者', '登入', '2023-03-24'),
('admin', '超級管理者', '登出', '2023-03-24'),
('admin', '超級管理者', '登入', '2023-03-24'),
('admin', '超級管理者', '登出', '2023-03-24'),
('admin', '超級管理者', '登入', '2023-03-24'),
('admin', '超級管理者', '登出', '2023-03-24'),
('admin', '超級管理者', '登入', '2023-03-24'),
('admin', '超級管理者', '登入', '2023-03-24'),
('admin', '超級管理者', '登入', '2023-03-24'),
('admin', '超級管理者', '登出', '2023-03-24'),
('user', '測試使用者', '登入', '2023-03-24'),
('user', '測試使用者', '登出', '2023-03-24'),
('admin', '超級管理者', '登入', '2023-03-24'),
('admin', '超級管理者', '登入', '2023-03-24'),
('admin', '超級管理者', '登入', '2023-03-24'),
('admin', '超級管理者', '登入', '2023-03-24'),
('admin', '超級管理者', '登出', '2023-03-24'),
('admin', '超級管理者', '登入', '2023-03-24'),
('admin', '超級管理者', '登出', '2023-03-24'),
('admin', '超級管理者', '登入', '2023-03-24');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `power` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `power`) VALUES
(1, '超級管理者', 'admin', '1234', 0),
(2, '測試使用者', 'user', '1234', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `edms`
--
ALTER TABLE `edms`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `layouts`
--
ALTER TABLE `layouts`
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
-- 使用資料表自動遞增(AUTO_INCREMENT) `edms`
--
ALTER TABLE `edms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `layouts`
--
ALTER TABLE `layouts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
