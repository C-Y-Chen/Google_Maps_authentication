-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Feb 03, 2016, 06:15 AM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `410121005`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `maps_authentication`
-- 

CREATE TABLE `maps_authentication` (
  `UID` tinyint(3) unsigned zerofill NOT NULL auto_increment,
  `id` varchar(100) NOT NULL,
  `long` varchar(17) NOT NULL,
  `lat` varchar(17) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`UID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

-- 
-- 列出以下資料庫的數據： `maps_authentication`
-- 

INSERT INTO `maps_authentication` VALUES (002, 'daoshun@mail.tsinghua.edu.cn', '116.332330', '40.002879', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (003, 'cnyang@mail.ndhu.edu.tw', '121.545267', '23.899492', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (004, 'stelvio.cimato@unimi.it', '9.685610476104833', '45.37347137116924', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (001, 'test@123', '121.4811906069496', '24.20270920605846', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (011, 'justin928501@gmail.com', '121.4812890440225', '24.20257049256995', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (007, '12354', '-140.203126072883', '-51.4430512475805', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (008, 'justin928501@yahoo.com.tw', '121.6649955511093', '24.67013858306715', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (009, 'justin928501@ems.ndhu.edu.tw', '121.5397618710994', '25.01732269978642', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (010, '123@123.com', '139.7529602050781', '35.68478611493887', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (012, 'qq@qq.cn', '121.5355682373046', '25.04151536540612', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (013, 'Qq@qq.com', '126.9786071777343', '37.52225246712464', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (018, 'zhou_zhili@163.com', '32.208725', '118.73413', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (015, 'zhou_zhili@163.co', '', '', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (016, 'test01@tw.tw', '39.924158', '116.402958', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (017, 'cnyang@mail.ndhu.ed', '96.328125', '56.55948248376224', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (019, 'samshu1232000@yahoo.com.tw', '23.865366', '121.55048', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (020, 'qqq@123.com', '32.20874', '118.734139', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (021, 'test@test.com', '23.776793', '120.361362', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (026, 'iechizen@nii.ac.jp', '139.7587490826845', '35.69397924885861', '0000-00-00 00:00:00');
INSERT INTO `maps_authentication` VALUES (025, 'yama@graco.c.u-tokyo.ac.jp', '139.6848233789205', '35.65974960659548', '0000-00-00 00:00:00');
