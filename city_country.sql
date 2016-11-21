-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `city_country`;
CREATE DATABASE `city_country` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `city_country`;

DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `city_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`city_id`),
  UNIQUE KEY `uniq_city_id` (`city_id`),
  UNIQUE KEY `uniq_city_name` (`city_name`),
  KEY `ind_city_name` (`city_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cities` (`city_id`, `city_name`, `country_id`) VALUES
(1,	'Киев',	1),
(2,	'Кишинёв',	2),
(3,	'Бухарест',	3),
(4,	'Будапешт',	4),
(5,	'Братислава',	5),
(6,	'Варшава',	6),
(7,	'Минск',	7),
(8,	'Москва',	8),
(9,	'Чернигов',	1),
(10,	'Житомир',	1),
(11,	'Винница',	1);

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `country_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `country_name` varchar(200) NOT NULL,
  PRIMARY KEY (`country_id`),
  UNIQUE KEY `unique_country_id` (`country_id`),
  UNIQUE KEY `unique_country_name` (`country_name`),
  KEY `index_country_name` (`country_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(7,	'Беларусь'),
(4,	'Венгрия'),
(2,	'Молдова'),
(6,	'Польша'),
(8,	'Россия'),
(3,	'Румыния'),
(5,	'Словакия'),
(1,	'Украина');

-- 2016-10-31 07:34:24
