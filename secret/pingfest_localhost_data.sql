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
('backman',	'battle',	1,	0,	100000,	701,	100701),
('backman',	'semnas',	1,	0,	0,	579,	579),
('bailey',	'battle',	1,	0,	100000,	822,	100822),
('bailey',	'semnas',	1,	0,	0,	660,	660),
('bernier',	'battle',	1,	0,	100000,	953,	100953),
('birdwell',	'battle',	1,	0,	100000,	43,	100043),
('bond',	'battle',	1,	0,	100000,	757,	100757),
('casali',	'music',	1,	0,	50000,	792,	50792),
('casali',	'paper',	1,	0,	75000,	687,	75687),
('cook',	'music',	1,	0,	50000,	948,	50948),
('coomer',	'paper',	1,	0,	75000,	985,	75985),
('cumberland',	'music',	1,	0,	50000,	806,	50806),
('guthrie',	'paper',	1,	0,	75000,	653,	75653),
('harrington',	'semnas',	1,	0,	0,	72,	72),
('johnson',	'battle',	1,	0,	100000,	583,	100583),
('jones',	'music',	1,	0,	50000,	259,	50259),
('laidlaw',	'paper',	1,	0,	75000,	870,	75870),
('laur',	'semnas',	1,	0,	0,	373,	373),
('lundeen',	'semnas',	1,	0,	0,	673,	673),
('mark',	'semnas',	1,	0,	0,	696,	696),
('mennet',	'semnas',	1,	0,	0,	502,	502),
('newell',	'semnas',	1,	0,	0,	872,	872)
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
('backman',	'$2y$05$1pb5ncAU.EpLnFoqLaqsJuR8/WGU7PEXLiauNv7fxinrUrLsXG.Pa',	'Ted Backman',	'backman@localhost',	'0',	'0'),
('bailey',	'$2y$05$IjA3vWaSSG.VWstShQRirO9tPd5nXAtgGxEJZ1Kae9ygXPATr8He6',	'Kelly Bailey',	'bailey@localhost',	'0',	'0'),
('bernier',	'$2y$05$hOkRYcNsW5nlnFXPqIHG8OUPlmOqkFYmIqohMxz2Y2lpoWBFLa1gm',	'Yahn Bernier',	'bernier@localhost',	'0',	'0'),
('birdwell',	'$2y$05$z9RRmONT.C427GStNqHEI.KawKRkvx/kglVyAos6PEyzDsRLJhDje',	'Ken Birdwell',	'birdwell@localhost',	'0',	'0'),
('bond',	'$2y$05$OxmHWukyj0Xz9ZmEL3W4JOfHDA/5MzvO77yFKH4rzC4XPATLsHqZi',	'Steve Bond',	'bond@localhost',	'0',	'0'),
('casali',	'$2y$05$rOS5Ayi.8VBJp7v1Z36eUuIn.pYAhp/BNyL592RlTWaz0goWaeGLi',	'Dario Casali',	'casali@localhost',	'0',	'0'),
('cook',	'$2y$05$ReWqaYYxveIUaBA3ny7ff.f6UWzBU0QFkKxAwH3YEDHvgExy1A2xe',	'John Cook',	'cook@localhost',	'0',	'0'),
('coomer',	'$2y$05$bvsANDVn.q.IwCFVgcq/Mee7QAjLSZOxsetuOx8aiDf9FfYgP0WJC',	'Greg Coomer',	'coomer@localhost',	'0',	'0'),
('cumberland',	'$2y$05$4nS5WSQx5SWNbES4eWpSe.IJ0T0jRCFY6hbneIMh2OLgr8WKmJ15e',	'Wesley Cumberland',	'cumberland@localhost',	'0',	'0'),
('guthrie',	'$2y$05$1qlnos4F/cphMHfxTOmtfuMDW1/6AoE/Ik4wP2sjOTcMqI4FLJWvS',	'John Guthrie',	'guthrie@localhost',	'0',	'0'),
('harrington',	'$2y$05$Mg6.lzm5wjBVCFp/nQbyBOsZZKaXSMKbX0/Jyqz1da.NE5JtNp9S.',	'Michael Harrington',	'harrington@localhost',	'0',	'0'),
('johnson',	'$2y$05$6UIUWggus.gOxnWvuZJEa.j88Cy9uETvcalvCBYnOwbbBBVDbf3RO',	'Brett Johnson',	'johnson@localhost',	'0',	'0'),
('jones',	'$2y$05$4eYGax9Vsp8CFBmFdzLKeeyctO.12xWQFlI0FvBle1Ij6EGaeAqNa',	'Chuck Jones',	'jones@localhost',	'0',	'0'),
('laidlaw',	'$2y$05$tmxHyi.eQM6vfLKkAUnmy.YiJfQTVDXRLzPPX3RtN14huN2IwbYyS',	'Marc Laidlaw',	'laidlaw@localhost',	'0',	'0'),
('laur',	'$2y$05$ls7F06fjxQ4uR2aZ6mIyauOEHWynno3/PWmWv47pfr3QzIup2/JIG',	'Karen Laur',	'laur@localhost',	'0',	'0'),
('lundeen',	'$2y$05$tLvmrL20M1K3YQmgedDT.O4SK75jdLqx7PMle0c76tJDWBlTHv9hm',	'Randy Lundeen',	'lundeen@localhost',	'0',	'0'),
('mark',	'$2y$05$bSoiFVfWsGVvxAHZVkt3ZO2xwcdC66UzyUHY4ZNwkEDMKtQgEQK96',	'Yatzse Mark',	'mark@localhost',	'0',	'0'),
('mennet',	'$2y$05$bm187bgx5IDuBXOFnVDZduSyYvFeKarcQchBC/gtskwjv.GzK5uG.',	'Lisa Mennet',	'mennet@localhost',	'0',	'0'),
('newell',	'$2y$05$BoBoyNyZwDlIcIj0G.oAgukVqYmo0hWq6G8BNpU9g7UGzD.H4p1IW',	'Gabe Newell',	'newell@localhost',	'0',	'0'),
('riller',	'$2y$05$N5zpBBG3A6jhk2dU/tm7f.vgGBUcGzpCAD/lPmukVA1zTwq9FaOi6',	'David Riller',	'riller@localhost',	'0',	'0'),
('stackpole',	'$2y$05$i9ayzuyxNYWwi191Ub0yvuGtlLF/pge64UikYJyVj0j7Icojk40nK',	'Aaron Stackpole',	'stackpole@localhost',	'0',	'0'),
('stelly',	'$2y$05$21o0KAKpagZt2JkGU2qIZuGSqTgncyP2Qhnpmh1xFm5ASGGduRgvS',	'Jay Stelly',	'stelly@localhost',	'0',	'0'),
('teasley',	'$2y$05$CQyCQWVYZlgPmTpdPW/JuegQS4HMt325D3/e0T1UkCJhuWI7ZIGKG',	'Harry E. Teasley',	'teasley@localhost',	'0',	'0'),
('theodore',	'$2y$05$qXf7ysL98NfCLN2tXimBSubB0h9B3aoYiiZgYJ1Ow.75J9uIaEI3e',	'Stephen Theodore',	'theodore@localhost',	'0',	'0'),
('vanburen',	'$2y$05$Ag1AONWrpl05k9Hy3WGfpOE0Rcblpp3u4DedVW5eDYeS7eza5wfza',	'Bill Van Buren',	'vanburen@localhost',	'0',	'0'),
('walker',	'$2y$05$EQYXCGtBeUmyHU18zkrRteR36tuk6UyPYPuViP4MP9QCCSYxEd2uy',	'Robin Walker',	'walker@localhost',	'0',	'0'),
('wood',	'$2y$05$ecpSNGhGWZXjhkj7o3O0q.0n80T71VNI5jn8so8UI95Xa2Dx.eOtO',	'Douglas R. Wood',	'wood@localhost',	'0',	'0')
ON DUPLICATE KEY UPDATE `user_id` = VALUES(`user_id`), `password` = VALUES(`password`), `name` = VALUES(`name`), `email` = VALUES(`email`), `phone` = VALUES(`phone`), `hash` = VALUES(`hash`);

-- 2021-07-04 06:35:00
