-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: 
-- 伺服器版本: 5.7.10-log
-- PHP 版本: 5.5.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `hualien_softball_news`
--

-- --------------------------------------------------------

--
-- 資料表結構 `maps_authentication`
--

CREATE TABLE IF NOT EXISTS `maps_authentication` (
  `UID` tinyint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `id` varchar(100) NOT NULL,
  `long` varchar(17) NOT NULL,
  `lat` varchar(17) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 資料表的匯出資料 `maps_authentication`
--

INSERT INTO `maps_authentication` (`UID`, `id`, `long`, `lat`, `date_time`) VALUES
(002, 'daoshun@mail.tsinghua.edu.cn', '116.332330', '40.002879', '0000-00-00 00:00:00'),
(003, 'cnyang@mail.ndhu.edu.tw', '121.545267', '23.899492', '0000-00-00 00:00:00'),
(004, 'stelvio.cimato@unimi.it', '9.685610476104833', '45.37347137116924', '0000-00-00 00:00:00'),
(001, 'test@123', '121.4811906069496', '24.20270920605846', '0000-00-00 00:00:00'),
(011, 'justin928501@gmail.com', '121.4812890440225', '24.20257049256995', '0000-00-00 00:00:00'),
(007, '12354', '-140.203126072883', '-51.4430512475805', '0000-00-00 00:00:00'),
(008, 'justin928501@yahoo.com.tw', '121.6649955511093', '24.67013858306715', '0000-00-00 00:00:00'),
(009, 'justin928501@ems.ndhu.edu.tw', '121.5397618710994', '25.01732269978642', '0000-00-00 00:00:00'),
(010, '123@123.com', '139.7529602050781', '35.68478611493887', '0000-00-00 00:00:00'),
(012, 'qq@qq.cn', '121.5355682373046', '25.04151536540612', '0000-00-00 00:00:00'),
(013, 'Qq@qq.com', '126.9786071777343', '37.52225246712464', '0000-00-00 00:00:00'),
(018, 'zhou_zhili@163.com', '32.208725', '118.73413', '0000-00-00 00:00:00'),
(015, 'zhou_zhili@163.co', '', '', '0000-00-00 00:00:00'),
(016, 'test01@tw.tw', '39.924158', '116.402958', '0000-00-00 00:00:00'),
(017, 'cnyang@mail.ndhu.ed', '96.328125', '56.55948248376224', '0000-00-00 00:00:00'),
(019, 'samshu1232000@yahoo.com.tw', '23.865366', '121.55048', '0000-00-00 00:00:00'),
(020, 'qqq@123.com', '32.20874', '118.734139', '0000-00-00 00:00:00'),
(021, 'test@test.com', '23.776793', '120.361362', '0000-00-00 00:00:00'),
(026, 'iechizen@nii.ac.jp', '139.7587490826845', '35.69397924885861', '0000-00-00 00:00:00'),
(025, 'yama@graco.c.u-tokyo.ac.jp', '139.6848233789205', '35.65974960659548', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `soft_ball`
--

CREATE TABLE IF NOT EXISTS `soft_ball` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `text` text NOT NULL,
  `time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `popularity` int(10) unsigned DEFAULT NULL,
  `filename` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

--
-- 資料表的匯出資料 `soft_ball`
--

INSERT INTO `soft_ball` (`id`, `user`, `title`, `text`, `time`, `popularity`, `filename`) VALUES
(2, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(3, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(6, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(7, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(8, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(9, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(11, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(12, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(13, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(14, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(15, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(16, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(17, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(18, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(19, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(20, 'admin20', 'hello20', 'from the other side20', '2016-02-04 17:08:24', 0, NULL),
(21, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(22, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(23, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(24, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(25, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(26, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(27, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(28, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(32, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(33, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(34, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(44, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(46, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(47, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(48, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(49, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(50, 'admin50', 'hello50', 'from the other side50', '2016-02-04 17:08:50', 0, NULL),
(51, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(52, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(53, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(54, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(55, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(56, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(57, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(58, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(59, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(60, 'admin60', 'hello60', 'from the other side60', '2016-02-04 17:08:58', 0, NULL),
(61, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(62, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(63, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(64, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(65, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(66, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(67, 'admin', 'hello', 'from the other side', '2016-02-04 15:40:20', 0, NULL),
(68, 'admin', 'test', 'hello from the other side, i consider im gonna try', NULL, NULL, 'test.docx'),
(69, 'admin', '', '', NULL, NULL, ''),
(70, 'admin', '', '', NULL, NULL, ''),
(71, 'admin', '', '', NULL, NULL, ''),
(72, 'admin', '', '', NULL, NULL, ''),
(74, 'admin', 'time test', '', '2016-02-08 20:30:57', NULL, ''),
(75, 'admin', 'time test', 'hello from the other side', '2016-02-10 00:33:16', NULL, '新文字文件.txt'),
(92, 'admin', '	105年花蓮縣第6屆『新春盃』慢速壘球錦', '因本次活動與縣長盃相近，105年花蓮縣第六屆新春盃不辦理選手之夜！', '2016-02-23 00:33:17', 1, '2010-4-24 105年花蓮縣第6屆『新春盃』慢速壘球錦標賽.doc'),
(93, 'admin', '子涵好可愛', 'so cute', '2016-02-23 00:37:38', NULL, '123.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
