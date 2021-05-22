-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `pf_battle_data`;
CREATE TABLE `pf_battle_data` (
  `user_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `school` varchar(100) NOT NULL,
  `leader` varchar(100) NOT NULL,
  `member_1` varchar(100) NOT NULL,
  `member_2` varchar(100) NOT NULL,
  KEY `user_id` (`user_id`),
  CONSTRAINT `pf_battle_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pf_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `pf_config`;
CREATE TABLE `pf_config` (
  `key` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `pf_config`;
INSERT INTO `pf_config` (`key`, `value`) VALUES
('admin_password',	'$2y$05$s/BXR4v4.Ro5ZPeHaY7WFefbZNQkFTmGUvjKZmgVRN.ZK9HagS7S2'),
('admin_username',	'admin');

DROP TABLE IF EXISTS `pf_cover_data`;
CREATE TABLE `pf_cover_data` (
  `user_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `leader` varchar(100) NOT NULL,
  `member_1` varchar(100) NOT NULL,
  `member_2` varchar(100) NOT NULL,
  `song_name` varchar(100) NOT NULL,
  `link` text NOT NULL,
  KEY `user_id` (`user_id`),
  CONSTRAINT `pf_cover_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pf_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `pf_events`;
CREATE TABLE `pf_events` (
  `event_id` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `locked` tinyint(4) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `pf_event_participants`;
CREATE TABLE `pf_event_participants` (
  `user_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `event_id` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` tinyint(4) NOT NULL,
  `timestamp` bigint(20) NOT NULL,
  `invoice` int(11) NOT NULL,
  `unique` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `pf_event_participants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pf_users` (`user_id`),
  CONSTRAINT `pf_event_participants_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `pf_events` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `pf_paper_data`;
CREATE TABLE `pf_paper_data` (
  `user_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `institution` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `abstract` varchar(100) NOT NULL,
  `link` text NOT NULL,
  KEY `user_id` (`user_id`),
  CONSTRAINT `pf_paper_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pf_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `pf_semnas_data`;
CREATE TABLE `pf_semnas_data` (
  `user_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `institution` varchar(100) NOT NULL,
  KEY `user_id` (`user_id`),
  CONSTRAINT `pf_semnas_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pf_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `pf_users`;
CREATE TABLE `pf_users` (
  `user_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(254) NOT NULL,
  `hash` varchar(32) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2021-05-22 15:22:12
