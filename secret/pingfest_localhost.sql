-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `pf_battle_data`;
CREATE TABLE `pf_battle_data` (
  `user_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `team_name` varchar(100) NOT NULL DEFAULT '',
  `school` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '',
  `leader` varchar(100) NOT NULL DEFAULT '',
  `member_1` varchar(100) NOT NULL DEFAULT '',
  `member_2` varchar(100) NOT NULL DEFAULT '',
  UNIQUE KEY `user_id_unique` (`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `pf_battle_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pf_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `pf_config`;
CREATE TABLE `pf_config` (
  `key` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `pf_config`;
INSERT INTO `pf_config` (`key`, `value`) VALUES
('admin_password',	'$2y$05$s/BXR4v4.Ro5ZPeHaY7WFefbZNQkFTmGUvjKZmgVRN.ZK9HagS7S2'),
('admin_username',	'admin'),
('bank_account',	'1169865502 (BNI a.n. Sindy Nur Safaati)'),
('invoice_expire',	'86400');

DROP TABLE IF EXISTS `pf_events`;
CREATE TABLE `pf_events` (
  `event_id` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `price` int(11) NOT NULL DEFAULT 0,
  `available` tinyint(4) NOT NULL DEFAULT 1,
  `locked` tinyint(4) NOT NULL DEFAULT 0,
  `announcements` text NOT NULL DEFAULT '',
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `pf_events`;
INSERT INTO `pf_events` (`event_id`, `name`, `price`, `available`, `locked`, `announcements`) VALUES
('battle',	'Battle of Technology (ITV)',	100000,	1,	0,	''),
('music',	'IT-Music (ITV)',	75000,	1,	0,	''),
('paper',	'IT-Paper (ITV)',	100000,	1,	0,	''),
('semnas',	'Seminar Nasional',	0,	1,	0,	'');

DROP TABLE IF EXISTS `pf_event_participants`;
CREATE TABLE `pf_event_participants` (
  `user_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `event_id` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `timestamp` bigint(20) NOT NULL DEFAULT 0,
  `invoice` int(11) NOT NULL DEFAULT 0,
  `unique` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0,
  UNIQUE KEY `user_id_event_id_unique` (`user_id`,`event_id`),
  KEY `user_id` (`user_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `pf_event_participants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pf_users` (`user_id`),
  CONSTRAINT `pf_event_participants_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `pf_events` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `pf_music_data`;
CREATE TABLE `pf_music_data` (
  `user_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `group_name` varchar(100) NOT NULL DEFAULT '',
  `leader` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '',
  `members` text NOT NULL DEFAULT '',
  `link_gdrive` text NOT NULL DEFAULT '',
  `link_igtv` text NOT NULL DEFAULT '',
  UNIQUE KEY `user_id_unique` (`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `pf_music_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pf_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `pf_paper_data`;
CREATE TABLE `pf_paper_data` (
  `user_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `institution` varchar(100) NOT NULL DEFAULT '',
  `leader` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '',
  `members` text NOT NULL DEFAULT '',
  `title` varchar(100) NOT NULL DEFAULT '',
  `abstract` text NOT NULL DEFAULT '',
  UNIQUE KEY `user_id_unique` (`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `pf_paper_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pf_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `pf_semnas_data`;
CREATE TABLE `pf_semnas_data` (
  `user_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `institution` varchar(100) NOT NULL DEFAULT '',
  UNIQUE KEY `user_id_unique` (`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `pf_semnas_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pf_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `pf_sso_apps`;
CREATE TABLE `pf_sso_apps` (
  `app_id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `secret_key` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `pf_sso_apps`;
INSERT INTO `pf_sso_apps` (`app_id`, `name`, `secret_key`) VALUES
('botplatform',	'Battle of Technology',	'20d27EZOPZLKrO8fNp2Y8UWKvKH1pC9Ti6w1f7FSiOi8BS0tiNgriPqWzpTVWlRH'),
('bottour',	'BoT Virtual Tour',	'3cKCdunIvZC3jddWiw9Cmdq7VAFsB4pmE7pF5oaPCMIpfF8R8J3vLnLN2IJthWeI');

DROP TABLE IF EXISTS `pf_users`;
CREATE TABLE `pf_users` (
  `user_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(254) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '',
  `hash` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2021-08-03 07:17:16
