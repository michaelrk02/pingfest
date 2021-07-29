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
('backman',	'battle',	1,	0,	100000,	593,	100593),
('backman',	'semnas',	1,	0,	0,	454,	454),
('bailey',	'battle',	1,	0,	100000,	247,	100247),
('bailey',	'semnas',	1,	0,	0,	224,	224),
('bernier',	'battle',	1,	0,	100000,	392,	100392),
('birdwell',	'battle',	1,	0,	100000,	191,	100191),
('bond',	'battle',	1,	0,	100000,	835,	100835),
('casali',	'music',	1,	0,	50000,	621,	50621),
('casali',	'paper',	1,	0,	75000,	53,	75053),
('cook',	'music',	1,	0,	50000,	541,	50541),
('coomer',	'paper',	1,	0,	75000,	283,	75283),
('cumberland',	'music',	1,	0,	50000,	413,	50413),
('guthrie',	'paper',	1,	0,	75000,	496,	75496),
('harrington',	'semnas',	1,	0,	0,	65,	65),
('johnson',	'battle',	1,	0,	100000,	411,	100411),
('jones',	'music',	1,	0,	50000,	560,	50560),
('laidlaw',	'paper',	1,	0,	75000,	120,	75120),
('laur',	'semnas',	1,	0,	0,	595,	595),
('lundeen',	'semnas',	1,	0,	0,	436,	436),
('mark',	'semnas',	1,	0,	0,	948,	948),
('mennet',	'semnas',	1,	0,	0,	613,	613),
('newell',	'semnas',	1,	0,	0,	170,	170)
ON DUPLICATE KEY UPDATE `user_id` = VALUES(`user_id`), `event_id` = VALUES(`event_id`), `status` = VALUES(`status`), `timestamp` = VALUES(`timestamp`), `invoice` = VALUES(`invoice`), `unique` = VALUES(`unique`), `total` = VALUES(`total`);

INSERT INTO `pf_music_data` (`user_id`, `group_name`, `leader`, `phone`, `members`, `link_gdrive`, `link_igtv`) VALUES
('casali',	'Dario Casali\'s Group',	'Dario Casali',	'081233334444',	'{\"data\":[\"noname\",\"noname\",\"noname\"]}',	'https://drive.google.com/',	'https://instagram.com/'),
('cook',	'John Cook\'s Group',	'John Cook',	'081233334444',	'{\"data\":[\"noname\",\"noname\",\"noname\"]}',	'https://drive.google.com/',	'https://instagram.com/'),
('cumberland',	'Wesley Cumberland\'s Group',	'Wesley Cumberland',	'081233334444',	'{\"data\":[\"noname\",\"noname\",\"noname\"]}',	'https://drive.google.com/',	'https://instagram.com/'),
('jones',	'Chuck Jones\'s Group',	'Chuck Jones',	'081233334444',	'{\"data\":[\"noname\",\"noname\",\"noname\"]}',	'https://drive.google.com/',	'https://instagram.com/')
ON DUPLICATE KEY UPDATE `user_id` = VALUES(`user_id`), `group_name` = VALUES(`group_name`), `leader` = VALUES(`leader`), `phone` = VALUES(`phone`), `members` = VALUES(`members`), `link_gdrive` = VALUES(`link_gdrive`), `link_igtv` = VALUES(`link_igtv`);

INSERT INTO `pf_paper_data` (`user_id`, `institution`, `leader`, `phone`, `members`, `title`, `abstract`) VALUES
('casali',	'Dario Casali\'s University',	'Dario Casali',	'081233334444',	'{\"data\":[\"noname\",\"noname\"]}',	'My Amazing Paper',	'No description'),
('coomer',	'Greg Coomer\'s University',	'Greg Coomer',	'081233334444',	'{\"data\":[\"noname\",\"noname\"]}',	'My Amazing Paper',	'No description'),
('guthrie',	'John Guthrie\'s University',	'John Guthrie',	'081233334444',	'{\"data\":[\"noname\",\"noname\"]}',	'My Amazing Paper',	'No description'),
('laidlaw',	'Marc Laidlaw\'s University',	'Marc Laidlaw',	'081233334444',	'{\"data\":[\"noname\",\"noname\"]}',	'My Amazing Paper',	'No description')
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
('backman',	'$2y$05$mGGpaALPeIJAngvglM0xPOLIeIk/B7pAuFPSA7BUTdBRixKXj2EZO',	'Ted Backman',	'backman@localhost.localdomain',	'0',	'0'),
('bailey',	'$2y$05$xYun7/xngqs9Htcx..lT1.aNbBfn5yG7sHloadWypXy.1H47DdM2e',	'Kelly Bailey',	'bailey@localhost.localdomain',	'0',	'0'),
('bernier',	'$2y$05$FAkvtr3sTfKUjesun1GFa.eq3mYhtKnZ2PTffR.KAomUeyReY9Qoq',	'Yahn Bernier',	'bernier@localhost.localdomain',	'0',	'0'),
('birdwell',	'$2y$05$GmEFvcdHWz0Wqo5e5ig.Q.G244ruGW4H4sgqf8Kd9BjcAg5aYuiRu',	'Ken Birdwell',	'birdwell@localhost.localdomain',	'0',	'0'),
('bond',	'$2y$05$CO8nhl4C2q5YA.jxnOXdvuIp3u40SyKZe3OZs3y4fDnWkIY9PgAdC',	'Steve Bond',	'bond@localhost.localdomain',	'0',	'0'),
('casali',	'$2y$05$xndN2gQIayNt7EAY6W6JE.BbEF4.cTaqu7dMswpG/YIAor0a/X9u.',	'Dario Casali',	'casali@localhost.localdomain',	'0',	'0'),
('cook',	'$2y$05$fPqz0/fJKA5.S0muIi416O7Jg./O.2AKbkdl13YpqqwnknnFhmYam',	'John Cook',	'cook@localhost.localdomain',	'0',	'0'),
('coomer',	'$2y$05$i0BnJJCO7sZx95bARh5f7.ViRqraKiGy6r4oXlcO7tlfQcbif75mq',	'Greg Coomer',	'coomer@localhost.localdomain',	'0',	'0'),
('cumberland',	'$2y$05$qKeIiph7TTVrlnwkoU2KMOPXlNC2ZDKrddBTby8T66rjUVOHsub7a',	'Wesley Cumberland',	'cumberland@localhost.localdomain',	'0',	'0'),
('guthrie',	'$2y$05$2B3.TUvyDdWrMDW7T1uQAuF/60gEsY52BofoKWowcgxDDuskvMbB2',	'John Guthrie',	'guthrie@localhost.localdomain',	'0',	'0'),
('harrington',	'$2y$05$MdLFF5Qj9Qjqjss1jAuxAeTNcSg46Bn53yYDjzv3pcbWhcgV0fZb6',	'Michael Harrington',	'harrington@localhost.localdomain',	'0',	'0'),
('johnson',	'$2y$05$MogwJ6076GMVG.LwQ4E6zO9di1wk7HtOySiQXKNspfJ0aO7Sb3ltu',	'Brett Johnson',	'johnson@localhost.localdomain',	'0',	'0'),
('jones',	'$2y$05$aDeHtHlBCldjoNZZWTATlOiQUq99z8tvRpT7DOFX7vu9bgl4atsc2',	'Chuck Jones',	'jones@localhost.localdomain',	'0',	'0'),
('laidlaw',	'$2y$05$qBEzkGlMHL5q8a6ex510ZOhREYdUuNT4eJrV88tDIzBQqcx9CDIri',	'Marc Laidlaw',	'laidlaw@localhost.localdomain',	'0',	'0'),
('laur',	'$2y$05$6Zhy0lJtsuE/O2xvwfhMxehIeiiFamPgRkt7BS8KnTzDQ/KUg694u',	'Karen Laur',	'laur@localhost.localdomain',	'0',	'0'),
('lundeen',	'$2y$05$omqL3XWJLsuzWv38CQFyE.7mc3dHRFIbw1y19pgJ3gZN.UzEhj4jW',	'Randy Lundeen',	'lundeen@localhost.localdomain',	'0',	'0'),
('mark',	'$2y$05$/OfLhHnlXbl.wuhIH4k6auvwAx7qofsXHzlq2GW9xwJMvFoYPKUhe',	'Yatzse Mark',	'mark@localhost.localdomain',	'0',	'0'),
('mennet',	'$2y$05$IqhE5XPtDCyCudl6Fw4vU.WDfQCuU.zt/uGTKhayCQfFQ0t2rqgzi',	'Lisa Mennet',	'mennet@localhost.localdomain',	'0',	'0'),
('newell',	'$2y$05$cHom.Q6x7bjrc0Ixkov.xuy6uEiBltcYSmeu/FDblpQHVSqfsNQ8G',	'Gabe Newell',	'newell@localhost.localdomain',	'0',	'0'),
('riller',	'$2y$05$KOjRdZP6M7IfP./Mlg7OHuyoSvuf4dwQgtmbqhi9.Tm72GizPBbYK',	'David Riller',	'riller@localhost.localdomain',	'0',	'0'),
('stackpole',	'$2y$05$eAZ1OiHByTFFtT3rKxbC4.LFqJAcRhm1k7gkcCZ/LYMX/RP9SdHWG',	'Aaron Stackpole',	'stackpole@localhost.localdomain',	'0',	'0'),
('stelly',	'$2y$05$cRKr.HFNXnaSwJJbasz5fOHhrIOPXue16spOr/QS5/J10CH.B4wPa',	'Jay Stelly',	'stelly@localhost.localdomain',	'0',	'0'),
('teasley',	'$2y$05$Eho.HFGwjeCCsN0kh13h/Oms8WUL4W4DjsLR..JI7NlC3U2tQTPbi',	'Harry E. Teasley',	'teasley@localhost.localdomain',	'0',	'0'),
('theodore',	'$2y$05$zalTTUp99IdAsl6K/6gy..fUYHfEjNBr0DMbyb8i8pPpg4NLIidue',	'Stephen Theodore',	'theodore@localhost.localdomain',	'0',	'0'),
('vanburen',	'$2y$05$tfT.McT26uba4MsybH2sAu1qN706hNqIfFtMRtfCfwHAB2H7ik9SS',	'Bill Van Buren',	'vanburen@localhost.localdomain',	'0',	'0'),
('walker',	'$2y$05$bj/ZUXVyBG5xtXaMv61zWOF3p.SxF9r44jMFmqL3tKk.irxtWpzEe',	'Robin Walker',	'walker@localhost.localdomain',	'0',	'0'),
('wood',	'$2y$05$ecZrQgyt1Q5TbZ3GmPJ64Ob2v5Ab3dnn1mS0lo0P69GjzS19rxFp2',	'Douglas R. Wood',	'wood@localhost.localdomain',	'0',	'0')
ON DUPLICATE KEY UPDATE `user_id` = VALUES(`user_id`), `password` = VALUES(`password`), `name` = VALUES(`name`), `email` = VALUES(`email`), `phone` = VALUES(`phone`), `hash` = VALUES(`hash`);

-- 2021-07-29 13:43:14
