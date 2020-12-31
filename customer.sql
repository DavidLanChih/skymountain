-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2020-12-25 17:04:10
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
-- 資料表結構 `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `co_id` int NOT NULL AUTO_INCREMENT,
  `co_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `co_iden` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `co_mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `co_bank` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `co_account` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `co_phone` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `co_Room` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_RoomVIP1` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_RoomVIP2` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_RoomPresident` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_roomtime` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `co_ordernumber` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `co_total` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `co_pay` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `co_jointime` datetime NOT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `customer`
--

INSERT INTO `customer` (`co_id`, `co_name`, `co_iden`, `co_mail`, `co_bank`, `co_account`, `co_phone`, `co_Room`, `co_RoomVIP1`, `co_RoomVIP2`, `co_RoomPresident`, `co_roomtime`, `co_ordernumber`, `co_total`, `co_pay`, `co_jointime`) VALUES
(1, 'David', 'B123456789', 'cljh20220@gmail.com', '中國信託', '0000900123456789', '0900123456', '雅緻雙人客房17間', 'VIP精緻雙人客房0間', 'VIP豪華雙人客房0間', '總統級四人客房0間', '2020-12-26', 'TR34X1HIWZ', '', '', '2020-12-25 22:24:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
