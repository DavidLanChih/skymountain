-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2020-12-22 04:18:09
-- 伺服器版本： 8.0.21
-- PHP 版本： 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+08:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `skymountain`
--

-- --------------------------------------------------------

--
-- 資料表結構 `employee_member`
--

DROP TABLE IF EXISTS `employee_member`;
CREATE TABLE IF NOT EXISTS `employee_member` (
  `em_id` int NOT NULL AUTO_INCREMENT,
  `em_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `em_username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `em_passwd` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `em_sex` enum('男','女') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `em_birthday` date DEFAULT NULL,
  `em_level` enum('admin','member') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member',
  `em_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `em_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `em_phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `em_address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `em_login` int UNSIGNED NOT NULL DEFAULT '0',
  `em_logintime` datetime DEFAULT NULL,
  `em_jointime` datetime NOT NULL,
  PRIMARY KEY (`em_id`),
  UNIQUE KEY `em_username` (`em_username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `employee_member`
--

INSERT INTO `employee_member` (`em_id`, `em_name`, `em_username`, `em_passwd`, `em_sex`, `em_birthday`, `em_level`, `em_email`, `em_url`, `em_phone`, `em_address`, `em_login`, `em_logintime`, `em_jointime`) VALUES
(1, '系統管理員', 'admin', '$2y$10$FO70lc.3/vTeE0Vaf7O3Jes.UArylzLnnxfZffTF7410vndnvhScm', '男', NULL, 'admin', NULL, NULL, NULL, NULL, 31, '2020-12-22 12:11:13', '2008-10-20 16:36:15'),
(2, '張惠玲', 'elven', '$2y$10$YdUhOvUTvwK5oWp/i3LafOd2ImwsE/85YmmoY2konsxdmMSsvczFO', '女', '1987-04-05', 'member', 'elven@superstar.com', '', '0966765556', '台北市濟洲北路12號2樓', 12, '2016-08-29 11:44:33', '2008-10-21 12:03:12'),
(3, '彭建志', 'jinglun', '$2y$10$WqB2bnMSO/wgBiHSOBV2iuLbrUCsp8VmNJdK2AyIW6IANUL9jeFjC', '男', '1987-07-01', 'member', 'jinglun@superstar.com', '', '0918181111', '台北市敦化南路93號5樓', 0, NULL, '2008-10-21 12:06:08'),
(4, '謝耿鴻', 'sugie', '$2y$10$6uWtdYATI3b/wMRk.AaqIei852PLf.WjeKm8X.Asl0VTmpxCkqbW6', '男', '1987-08-11', 'member', 'edreamer@gmail.com', '', '0914530768', '台北市中央路201號7樓', 2, '2016-08-29 14:03:53', '2008-10-21 12:06:08'),
(5, '蔣志明', 'shane', '$2y$10$pWefN9xkeXOKCx59GF6ZJuSGNnIFBY4q/DCmCvAwOFtnoTCujb3Te', '男', '1984-06-20', 'member', 'shane@superstar.com', NULL, '0946820035', '台北市建國路177號6樓', 0, NULL, '2008-10-21 12:06:08'),
(6, '王佩珊', 'ivy', '$2y$10$RPrt3YfaSs0d82inYIK6he.JaPqOrisWMqASuxN5g62EyRio.lyEa', '女', '1988-02-15', 'member', 'ivy@superstar.com', NULL, '0920981230', '台北市忠孝東路520號6樓', 0, NULL, '2008-10-21 12:06:08'),
(7, '林志宇', 'zhong', '$2y$10$pee.jvO6f4sSKahlc4cLLO9RUMyx8aphyqkSUdwHTNSy4Ax7YPdpq', '男', '1987-05-05', 'member', 'zhong@superstar.com', NULL, '0951983366', '台北市三民路1巷10號', 0, NULL, '2008-10-21 12:06:08'),
(8, '李曉薇', 'lala', '$2y$10$oiC9CaGiOdWu.6w5b3.b/Ora6fSuh8Lrbj8Kg5BUPT15O3QptksQS', '女', '1985-08-30', 'member', 'lala@superstar.com', NULL, '0918123456', '台北市仁愛路100號', 0, NULL, '2008-10-21 12:06:08'),
(9, '賴秀英', 'crystal', '$2y$10$8Q0.JEGILRM91qAlMmWnB.wpcY.rJEbgNgV5ntIlqZmdGaHPwikji', '女', '1986-12-10', 'member', 'crystal@superstar.com', NULL, '0907408965', '台北市民族路204號', 0, NULL, '2008-10-21 12:06:08'),
(10, '張雅琪', 'peggy', '$2y$10$RNqnXDNHkcTI2Zh2bkTKnOesz0FLXhihhT8ZL8OHoMeYSq7jsILMi', '女', '1988-12-01', 'member', 'peggy@superstar.com', NULL, '0916456723', '台北市建國北路10號', 0, NULL, '2008-10-21 12:06:08'),
(11, '陳燕博', 'albert', '$2y$10$seMLwqcQRQiWa0jMBAcMMertjLbrPLRGNZoKc0NZ5FxTwWha7W3lm', '男', '1993-08-10', 'member', 'albert@superstar.com', NULL, '0918976588', '台北市北環路2巷80號', 4, '2020-12-22 12:04:01', '2008-10-21 12:06:08'),
(13, '黃信溢', 'dkdreamer', '$2y$10$Fx0rLJtV5mVtJzAJ52B/hup1AmviTe7Ciu0mtWBCZAkYC0qmg6OJy', '女', '1987-04-05', 'member', 'edreamer@gmail.com', '', '955648889', '愛蘭里梅村路213巷8號', 1, '2016-08-29 17:42:24', '2016-08-29 17:41:46'),
(14, '藍大衛', 'david', '$2y$10$eYkxyDGzG7mFovYYoaWci.CIDARI30lZUYc5X2Wv9NGPYx7Sb5pf.', '男', '1986-06-02', 'member', 'cljh20220@gmail.com', '', '', '', 27, '2020-12-22 12:15:45', '2020-12-17 20:12:06'),
(15, '藍雪莉', 'shiry', '$2y$10$ezSZY3VSBlh2M5agDLnSmuKQZC5/l0J6z92.BzUNiIIlH0t/wUHIG', '女', '1988-04-12', 'member', 'cljh20220@gmail.com', '', '', '', 0, NULL, '2020-12-17 20:23:47'),
(16, '藍巨嬰', 'bigbaby', '$2y$10$VbJltS.Wq8plYvjd2dcp7eGJrc9G4uPYD74DM2ozCG2ceAOV2LeW2', '女', '1989-08-04', 'member', 'cljh20220@gmail.com', '', '', '', 0, NULL, '2020-12-17 20:33:16'),
(17, '林快樂', 'happy', '$2y$10$Ytf/QYzY.2omldccCZVFU.kGejm6/eKoXekPxWdiHfvyNSyTLnuqS', '男', '1990-01-01', 'member', 'cljh20220@gmail.com', '', '', '', 0, NULL, '2020-12-17 23:53:02'),
(18, '電腦程式', 'mysql', '$2y$10$S0Wh.xZ.lQMWwCc6AzP6reATk8.nOng15l98UAnNK8EjwHlLjHzqm', '男', '1900-01-01', 'member', 'cljh20220@gmail.com', '', '', '', 0, NULL, '2020-12-18 10:55:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
