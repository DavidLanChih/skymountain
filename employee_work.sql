-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2020-12-22 04:17:59
-- 伺服器版本： 8.0.21
-- PHP 版本： 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `skymountain`
--

-- --------------------------------------------------------

--
-- 資料表結構 `employee_work`
--

DROP TABLE IF EXISTS `employee_work`;
CREATE TABLE IF NOT EXISTS `employee_work` (
  `ew_id` int NOT NULL AUTO_INCREMENT,
  `ew_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ew_username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ew_passwd` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ew_level` enum('admin','member') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member',
  `ew_login` int UNSIGNED NOT NULL DEFAULT '0',
  `ew_logintime` datetime DEFAULT NULL,
  `ew_jointime` datetime NOT NULL,
  `ew_month` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ew_day` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ew_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ew_roomnumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ew_roomcondition` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ew_checkman` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ew_ip_location` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ew_ip_logintime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ew_work` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ew_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `employee_work`
--

INSERT INTO `employee_work` (`ew_id`, `ew_name`, `ew_username`, `ew_passwd`, `ew_level`, `ew_login`, `ew_logintime`, `ew_jointime`, `ew_month`, `ew_day`, `ew_time`, `ew_roomnumber`, `ew_roomcondition`, `ew_checkman`, `ew_ip_location`, `ew_ip_logintime`, `ew_work`) VALUES
(59, '藍大衛', 'david', '', 'member', 0, NULL, '2020-12-21 23:24:05', '', '', '', '', '', '', '::1', '2020-12-21 15:23:52', '上班打卡'),
(60, '藍大衛', 'david', '', 'member', 0, NULL, '2020-12-21 23:24:35', '1', '1', '10:00', '1F-1', '無', '', '::1', '', ''),
(61, '藍大衛', 'david', '', 'member', 0, NULL, '2020-12-21 23:25:03', '1', '1', '11:00', '2F-1', '水杯少一個', '', '::1', '', ''),
(62, '藍大衛', 'david', '', 'member', 0, NULL, '2020-12-21 23:26:13', '', '', '', '', '', '', '::1', '2020-12-21 15:25:59', '下班打卡'),
(63, '藍大衛', 'david', '', 'member', 0, NULL, '2020-12-22 11:12:58', '', '', '', '', '', '', '::1', '2020-12-22 03:12:44', '上班打卡'),
(64, '藍大衛', 'david', '', 'member', 0, NULL, '2020-12-22 11:14:03', '1', '2', '09:00', '3F-1', '無', '', '::1', '', ''),
(65, '藍大衛', 'david', '', 'member', 0, NULL, '2020-12-22 12:16:41', '1', '2', '12:00', '4F-2', '枕頭少一個', '', '::1', '', ''),
(66, '藍大衛', 'david', '', 'member', 0, NULL, '2020-12-22 12:17:10', '', '', '', '', '', '', '::1', '2020-12-22 04:16:57', '下班打卡');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
