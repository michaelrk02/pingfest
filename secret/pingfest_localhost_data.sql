-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

INSERT INTO `pf_battle_data` (`user_id`, `team_name`, `school`, `phone`, `leader`, `member_1`, `member_2`) VALUES
('backman',	'Ted Backman\'s Team',	'Ted Backman\'s School',	'081233334444',	'Ted Backman',	'noname',	'noname'),
('bailey',	'Kelly Bailey\'s Team',	'Kelly Bailey\'s School',	'081233334444',	'Kelly Bailey',	'noname',	'noname'),
('bernier',	'Yahn Bernier\'s Team',	'Yahn Bernier\'s School',	'081233334444',	'Yahn Bernier',	'noname',	'noname'),
('birdwell',	'Ken Birdwell\'s Team',	'Ken Birdwell\'s School',	'081233334444',	'Ken Birdwell',	'noname',	'noname'),
('bond',	'Steve Bond\'s Team',	'Steve Bond\'s School',	'081233334444',	'Steve Bond',	'noname',	'noname'),
('johnson',	'Brett Johnson\'s Team',	'Brett Johnson\'s School',	'081233334444',	'Brett Johnson',	'noname',	'noname')
ON DUPLICATE KEY UPDATE `user_id` = VALUES(`user_id`), `team_name` = VALUES(`team_name`), `school` = VALUES(`school`), `phone` = VALUES(`phone`), `leader` = VALUES(`leader`), `member_1` = VALUES(`member_1`), `member_2` = VALUES(`member_2`);

INSERT INTO `pf_event_participants` (`user_id`, `event_id`, `status`, `timestamp`, `invoice`, `unique`, `total`) VALUES
('backman',	'battle',	1,	0,	100000,	926,	100926),
('backman',	'semnas',	1,	0,	0,	330,	330),
('bailey',	'battle',	1,	0,	100000,	8,	100008),
('bailey',	'semnas',	1,	0,	0,	876,	876),
('bernier',	'battle',	1,	0,	100000,	287,	100287),
('birdwell',	'battle',	1,	0,	100000,	301,	100301),
('bond',	'battle',	1,	0,	100000,	65,	100065),
('casali',	'music',	1,	0,	50000,	90,	50090),
('casali',	'paper',	1,	0,	75000,	198,	75198),
('cook',	'music',	1,	0,	50000,	286,	50286),
('coomer',	'paper',	1,	0,	75000,	203,	75203),
('cumberland',	'music',	1,	0,	50000,	906,	50906),
('guthrie',	'paper',	1,	0,	75000,	970,	75970),
('harrington',	'semnas',	1,	0,	0,	203,	203),
('johnson',	'battle',	1,	0,	100000,	218,	100218),
('jones',	'music',	1,	0,	50000,	316,	50316),
('laidlaw',	'paper',	1,	0,	75000,	466,	75466),
('laur',	'semnas',	1,	0,	0,	38,	38),
('lundeen',	'semnas',	1,	0,	0,	350,	350),
('mark',	'semnas',	1,	0,	0,	77,	77),
('mennet',	'semnas',	1,	0,	0,	164,	164),
('newell',	'semnas',	1,	0,	0,	613,	613)
ON DUPLICATE KEY UPDATE `user_id` = VALUES(`user_id`), `event_id` = VALUES(`event_id`), `status` = VALUES(`status`), `timestamp` = VALUES(`timestamp`), `invoice` = VALUES(`invoice`), `unique` = VALUES(`unique`), `total` = VALUES(`total`);

INSERT INTO `pf_music_data` (`user_id`, `group_name`, `leader`, `phone`, `members`, `link_gdrive`, `link_igtv`) VALUES
('casali',	'Dario Casali\'s Group',	'Dario Casali',	'081233334444',	'{\"data\":[\"Dario Casali\",\"noname\",\"noname\"]}',	'https://drive.google.com/',	'https://instagram.com/'),
('cook',	'John Cook\'s Group',	'John Cook',	'081233334444',	'{\"data\":[\"John Cook\",\"noname\",\"noname\"]}',	'https://drive.google.com/',	'https://instagram.com/'),
('cumberland',	'Wesley Cumberland\'s Group',	'Wesley Cumberland',	'081233334444',	'{\"data\":[\"Wesley Cumberland\",\"noname\",\"noname\"]}',	'https://drive.google.com/',	'https://instagram.com/'),
('jones',	'Chuck Jones\'s Group',	'Chuck Jones',	'081233334444',	'{\"data\":[\"Chuck Jones\",\"noname\",\"noname\"]}',	'https://drive.google.com/',	'https://instagram.com/')
ON DUPLICATE KEY UPDATE `user_id` = VALUES(`user_id`), `group_name` = VALUES(`group_name`), `leader` = VALUES(`leader`), `phone` = VALUES(`phone`), `members` = VALUES(`members`), `link_gdrive` = VALUES(`link_gdrive`), `link_igtv` = VALUES(`link_igtv`);

INSERT INTO `pf_paper_data` (`user_id`, `institution`, `leader`, `phone`, `members`, `title`, `abstract`) VALUES
('casali',	'Dario Casali\'s University',	'Dario Casali',	'081233334444',	'{\"data\":[\"Dario Casali\",\"noname\",\"noname\"]}',	'My Amazing Paper',	'No description'),
('coomer',	'Greg Coomer\'s University',	'Greg Coomer',	'081233334444',	'{\"data\":[\"Greg Coomer\",\"noname\",\"noname\"]}',	'My Amazing Paper',	'No description'),
('guthrie',	'John Guthrie\'s University',	'John Guthrie',	'081233334444',	'{\"data\":[\"John Guthrie\",\"noname\",\"noname\"]}',	'My Amazing Paper',	'No description'),
('laidlaw',	'Marc Laidlaw\'s University',	'Marc Laidlaw',	'081233334444',	'{\"data\":[\"Marc Laidlaw\",\"noname\",\"noname\"]}',	'My Amazing Paper',	'No description')
ON DUPLICATE KEY UPDATE `user_id` = VALUES(`user_id`), `institution` = VALUES(`institution`), `leader` = VALUES(`leader`), `phone` = VALUES(`phone`), `members` = VALUES(`members`), `title` = VALUES(`title`), `abstract` = VALUES(`abstract`);

INSERT INTO `pf_semnas_data` (`user_id`, `institution`) VALUES
('backman',	'Ted Backman\'s Institution'),
('bailey',	'Kelly Bailey\'s Institution'),
('harrington',	'Michael Harrington\'s Institution'),
('laur',	'Karen Laur\'s Institution'),
('lundeen',	'Randy Lundeen\'s Institution'),
('mark',	'Yatzse Mark\'s Institution'),
('mennet',	'Lisa Mennet\'s Institution'),
('newell',	'Gabe Newell\'s Institution')
ON DUPLICATE KEY UPDATE `user_id` = VALUES(`user_id`), `institution` = VALUES(`institution`);

INSERT INTO `pf_users` (`user_id`, `password`, `name`, `email`, `phone`, `hash`) VALUES
('backman',	'$2y$05$FTJThcD7c36nRAmEpq1Cmez7RTZBHj1x4O2pkOTgDGpd3tJSgt/wW',	'Ted Backman',	'backman@localhost.localdomain',	'0',	'0'),
('bailey',	'$2y$05$n/xgR5MKxeVYfZtojaLjiuEGrSZCXQmuU.t/99S55ROUUpr2sRFd6',	'Kelly Bailey',	'bailey@localhost.localdomain',	'0',	'0'),
('bernier',	'$2y$05$/fOMmkoe9f99d6z1k0Tbe.jPtPp0IHhX/OE4LLpR0YFTTb9/FWcAi',	'Yahn Bernier',	'bernier@localhost.localdomain',	'0',	'0'),
('birdwell',	'$2y$05$BHclFL/CceFhem1CqDvuTuFolIsJVdYLCSt7W30J/5.LYU2HvKGa6',	'Ken Birdwell',	'birdwell@localhost.localdomain',	'0',	'0'),
('bond',	'$2y$05$uyREj3sHNWJeMoFN8cEYQ.cLGGMi2P2wjIHB7z.n6UNCfAPwoErkO',	'Steve Bond',	'bond@localhost.localdomain',	'0',	'0'),
('casali',	'$2y$05$peLzAp5W9eEnIIDlFSrVWORcNVfI1DqzeZyl9D2oxbOiS7VFmWHTa',	'Dario Casali',	'casali@localhost.localdomain',	'0',	'0'),
('cook',	'$2y$05$c2oEgal5vTuQxKRweQ/1C.DziSYiHkHgOQAr6vtVXfru01hWUISUO',	'John Cook',	'cook@localhost.localdomain',	'0',	'0'),
('coomer',	'$2y$05$20ueg0t6upvSlQW/9muE3eK.8pey8rEFk.I2jQKRNFwznmow1wN9y',	'Greg Coomer',	'coomer@localhost.localdomain',	'0',	'0'),
('cumberland',	'$2y$05$xnNBQrQ1gplbRCyxJUTHteuRLqagE107BFKn6JqJbMMP3OY72hKNu',	'Wesley Cumberland',	'cumberland@localhost.localdomain',	'0',	'0'),
('guthrie',	'$2y$05$KNrvClrMOeaZzHLjWtv29.GPFdQ/i6WYYmepvHz2U791iggjNZ7Yy',	'John Guthrie',	'guthrie@localhost.localdomain',	'0',	'0'),
('harrington',	'$2y$05$SoDXxaa3BErS9c.C/I6YDOiO4GNyYcufbBP8em34DpyGiPeqoHfau',	'Michael Harrington',	'harrington@localhost.localdomain',	'0',	'0'),
('johnson',	'$2y$05$V94JNS1gp.NlmB71NHVkp.haxSDQwYS38/NVYyl465a1q5Ii8aTOK',	'Brett Johnson',	'johnson@localhost.localdomain',	'0',	'0'),
('jones',	'$2y$05$KCy53srK4Y93rQp9gEsUcOYS2OP4MusxZFaeSRcFGLLKEYlrwyXna',	'Chuck Jones',	'jones@localhost.localdomain',	'0',	'0'),
('laidlaw',	'$2y$05$TKRwr4FsEcdQNZqAARIqu./RWT9Oy8A3dTN338ZprHEywC.vfPKv.',	'Marc Laidlaw',	'laidlaw@localhost.localdomain',	'0',	'0'),
('laur',	'$2y$05$QKDBnlAhMVuE0IozUz12He4Dajy1Vfwzse16tA5WG1QsV.dagio7u',	'Karen Laur',	'laur@localhost.localdomain',	'0',	'0'),
('lundeen',	'$2y$05$Kl8BIdMcErlr/yhRjWWjAOWIbEg37QdCJCwISmQ8zXgGrLAJ1nb9C',	'Randy Lundeen',	'lundeen@localhost.localdomain',	'0',	'0'),
('mark',	'$2y$05$irUK1RgtQy.NCLiENaCI6.EP1RjRQBKuvdSCUYH0MornUuLVw/ye.',	'Yatzse Mark',	'mark@localhost.localdomain',	'0',	'0'),
('mennet',	'$2y$05$UVQEiSprQ5Rg6w0ao.qa8eyJLoPjRMhUa0EMp7Swy2ShEVN3Hnlti',	'Lisa Mennet',	'mennet@localhost.localdomain',	'0',	'0'),
('newell',	'$2y$05$MPTdRBpeUNT.aMPxTONlGeCoW/5IfqTsb1T/IjJTBIK68UAOHsI56',	'Gabe Newell',	'newell@localhost.localdomain',	'0',	'0'),
('riller',	'$2y$05$0d2nlvUXW/PbHw41JQIkzeZhkdbYAUcqTyRwawy0Gf31QWZXvEwxO',	'David Riller',	'riller@localhost.localdomain',	'0',	'0'),
('stackpole',	'$2y$05$jfBYmN5F3ZrpioxMREd/ZORZ8aSmhOpxYHfCsYMXOljwTYrLOQqDi',	'Aaron Stackpole',	'stackpole@localhost.localdomain',	'0',	'0'),
('stelly',	'$2y$05$Yn72jhLX0skw1J7./Jz7V.Pp9SggVJdsHh4B7OisjvAQthoqUPs7a',	'Jay Stelly',	'stelly@localhost.localdomain',	'0',	'0'),
('teasley',	'$2y$05$KiD2ErGEmXDK3okGrf0kdes7PI9iMU9cZqMVrDgm.ik9EuWJfyVzS',	'Harry E. Teasley',	'teasley@localhost.localdomain',	'0',	'0'),
('theodore',	'$2y$05$tEbo2o3lNTPVjuSBiaHmGOo/o3lF8ZYbWNaSjIB/SuHFgSY7yy7vG',	'Stephen Theodore',	'theodore@localhost.localdomain',	'0',	'0'),
('vanburen',	'$2y$05$9ZCm9J7tfLk5ogn1WsU/t.S3A4fNAyB618AtRgwiSleJP01J618Ca',	'Bill Van Buren',	'vanburen@localhost.localdomain',	'0',	'0'),
('walker',	'$2y$05$n4cjbvQBNPJT6qcPe9e7.eSH7gOB47tP.oaJr/UfZMT6lugDttHD.',	'Robin Walker',	'walker@localhost.localdomain',	'0',	'0'),
('wood',	'$2y$05$P4UCEVZe9s0LmUVa6AFAheCw.WA8thqbs1HaOcqB8ndkc2hKLjdOi',	'Douglas R. Wood',	'wood@localhost.localdomain',	'0',	'0')
ON DUPLICATE KEY UPDATE `user_id` = VALUES(`user_id`), `password` = VALUES(`password`), `name` = VALUES(`name`), `email` = VALUES(`email`), `phone` = VALUES(`phone`), `hash` = VALUES(`hash`);

-- 2021-07-26 07:48:38
