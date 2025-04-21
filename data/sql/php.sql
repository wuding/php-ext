-- Adminer 4.17.1 MySQL 5.7.36-log dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `date_format`;
CREATE TABLE `date_format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `format_character` varchar(250) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `example_returned_values` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `format_character` (`format_character`),
  KEY `created` (`created`),
  KEY `modified` (`modified`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `timezone`;
CREATE TABLE `timezone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(10) DEFAULT NULL,
  `dst` int(11) DEFAULT NULL,
  `offset` int(11) DEFAULT NULL,
  `abbr` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `md5` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `md5` (`md5`),
  KEY `timezone_id` (`timezone_id`),
  KEY `offset` (`offset`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `timezone_abbr`;
CREATE TABLE `timezone_abbr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(10) DEFAULT NULL,
  `abbr` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hour` double DEFAULT NULL,
  `md5` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `md5` (`md5`),
  KEY `abbr` (`abbr`),
  KEY `name` (`name`),
  KEY `location` (`location`),
  KEY `timezone` (`timezone`),
  KEY `hour` (`hour`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2025-04-21 09:46:22
