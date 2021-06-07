-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

INSERT INTO `pf_battle_data` (`user_id`, `team_name`, `school`, `leader`, `member_1`, `member_2`) VALUES
('backman',	'Ted Backman\'s Team',	'Ted Backman\'s School',	'Ted Backman',	'noname',	'noname'),
('bailey',	'Kelly Bailey\'s Team',	'Kelly Bailey\'s School',	'Kelly Bailey',	'noname',	'noname'),
('bernier',	'Yahn Bernier\'s Team',	'Yahn Bernier\'s School',	'Yahn Bernier',	'noname',	'noname'),
('birdwell',	'Ken Birdwell\'s Team',	'Ken Birdwell\'s School',	'Ken Birdwell',	'noname',	'noname'),
('bond',	'Steve Bond\'s Team',	'Steve Bond\'s School',	'Steve Bond',	'noname',	'noname'),
('johnson',	'Brett Johnson\'s Team',	'Brett Johnson\'s School',	'Brett Johnson',	'noname',	'noname');

INSERT INTO `pf_event_participants` (`user_id`, `event_id`, `status`, `timestamp`, `invoice`, `unique`, `total`) VALUES
('backman',	'battle',	0,	0,	100000,	371,	100371),
('bailey',	'battle',	0,	0,	100000,	47,	100047),
('bernier',	'battle',	0,	0,	100000,	631,	100631),
('birdwell',	'battle',	0,	0,	100000,	350,	100350),
('bond',	'battle',	0,	0,	100000,	381,	100381),
('johnson',	'battle',	0,	0,	100000,	922,	100922),
('casali',	'music',	0,	0,	50000,	413,	50413),
('cook',	'music',	0,	0,	50000,	80,	50080),
('cumberland',	'music',	0,	0,	50000,	617,	50617),
('jones',	'music',	0,	0,	50000,	917,	50917),
('casali',	'paper',	0,	0,	75000,	7,	75007),
('coomer',	'paper',	0,	0,	75000,	823,	75823),
('guthrie',	'paper',	0,	0,	75000,	572,	75572),
('laidlaw',	'paper',	0,	0,	75000,	503,	75503),
('backman',	'semnas',	0,	0,	0,	322,	322),
('bailey',	'semnas',	0,	0,	0,	129,	129),
('harrington',	'semnas',	0,	0,	0,	902,	902),
('laur',	'semnas',	0,	0,	0,	953,	953),
('lundeen',	'semnas',	0,	0,	0,	604,	604),
('mark',	'semnas',	0,	0,	0,	476,	476),
('mennet',	'semnas',	0,	0,	0,	774,	774),
('newell',	'semnas',	0,	0,	0,	308,	308);

INSERT INTO `pf_music_data` (`user_id`, `group_name`, `leader`, `member_1`, `member_2`, `song_name`, `link`) VALUES
('casali',	'Dario Casali\'s Group',	'Dario Casali',	'noname',	'noname',	'My Amazing Song',	'http://localhost/'),
('cook',	'John Cook\'s Group',	'John Cook',	'noname',	'noname',	'My Amazing Song',	'http://localhost/'),
('cumberland',	'Wesley Cumberland\'s Group',	'Wesley Cumberland',	'noname',	'noname',	'My Amazing Song',	'http://localhost/'),
('jones',	'Chuck Jones\'s Group',	'Chuck Jones',	'noname',	'noname',	'My Amazing Song',	'http://localhost/');

INSERT INTO `pf_paper_data` (`user_id`, `institution`, `title`, `abstract`, `link`) VALUES
('casali',	'Dario Casali\'s University',	'My Amazing Paper',	'No description',	'http://localhost/'),
('coomer',	'Greg Coomer\'s University',	'My Amazing Paper',	'No description',	'http://localhost/'),
('guthrie',	'John Guthrie\'s University',	'My Amazing Paper',	'No description',	'http://localhost/'),
('laidlaw',	'Marc Laidlaw\'s University',	'My Amazing Paper',	'No description',	'http://localhost/');

INSERT INTO `pf_semnas_data` (`user_id`, `institution`) VALUES
('backman',	'Ted Backman\'s Institution'),
('bailey',	'Kelly Bailey\'s Institution'),
('harrington',	'Michael Harrington\'s Institution'),
('laur',	'Karen Laur\'s Institution'),
('lundeen',	'Randy Lundeen\'s Institution'),
('mark',	'Yatzse Mark\'s Institution'),
('mennet',	'Lisa Mennet\'s Institution'),
('newell',	'Gabe Newell\'s Institution');

INSERT INTO `pf_users` (`user_id`, `password`, `name`, `email`, `phone`, `hash`) VALUES
('backman',	'$2y$05$by0ExgqlINJ6XARcl25jX.myh0z30MmMI3H4pxbz0H5zivFy9xTtW',	'Ted Backman',	'backman@localhost',	'0',	'0'),
('bailey',	'$2y$05$GfQzAtTxiMPPnOFDi2gkzODtJCSSBP5vP7teLiw7HiZ7pbP0hAYSu',	'Kelly Bailey',	'bailey@localhost',	'0',	'0'),
('bernier',	'$2y$05$mK608ARlMRVxInjch5Ca3.UMl4Uak02Z1cmG4xrJhYIxwNIaQoGTO',	'Yahn Bernier',	'bernier@localhost',	'0',	'0'),
('birdwell',	'$2y$05$gEpdspNNe5gGjpMK3r18aOgi/iYYCFKE4w0cu67W1W6gdnTYX75F6',	'Ken Birdwell',	'birdwell@localhost',	'0',	'0'),
('bond',	'$2y$05$pqoyoqsmFC44BmfphzT4J.nH48tCW8mD/x0q1YkJwEw/Y7W3ucsOa',	'Steve Bond',	'bond@localhost',	'0',	'0'),
('casali',	'$2y$05$Xf2Kyuq22E/w4H2E2hvP6uJnRnpkJS2k5CEYfqJs1VcC7716ofEni',	'Dario Casali',	'casali@localhost',	'0',	'0'),
('cook',	'$2y$05$m2//6.XCB7byAY2T9OvhduJZnWd/gdBD.qqNkoX8YlhBc6s38KPc2',	'John Cook',	'cook@localhost',	'0',	'0'),
('coomer',	'$2y$05$JTKadQ39tv6OQF2Tovj8dulO28VBuKY/N.aa.s8gXUUAyQrMoyKfq',	'Greg Coomer',	'coomer@localhost',	'0',	'0'),
('cumberland',	'$2y$05$evhKFC.sAua/VCPA0PmPdeDzjDlT0KurbkDNafoHYbirnykNhRrNC',	'Wesley Cumberland',	'cumberland@localhost',	'0',	'0'),
('guthrie',	'$2y$05$9BoZcOqJGAkAtjMKicxrTuORFwYuaJAmFTup9B6BZ2SmgC/vQbEkq',	'John Guthrie',	'guthrie@localhost',	'0',	'0'),
('harrington',	'$2y$05$frcNfMYVSGUGDOrSmBYb9uCOQT2uLdsUrw4SLINMdp4uCfY3H6s9C',	'Michael Harrington',	'harrington@localhost',	'0',	'0'),
('johnson',	'$2y$05$7fgOK6cIi5PmewBI2.ffU.3b70vHIPBwJDhDBr0won76SlwnYLuF.',	'Brett Johnson',	'johnson@localhost',	'0',	'0'),
('jones',	'$2y$05$DnIIaZ6PJtBBwFWeSANy3.Euaklxpjh6DQEcnmP9SnSlvRUGdV5nu',	'Chuck Jones',	'jones@localhost',	'0',	'0'),
('laidlaw',	'$2y$05$lsREm2u9nNeo0MRK95m5j.T72mSexAycJVVgNzJ6y4Q69Eqy0HkLC',	'Marc Laidlaw',	'laidlaw@localhost',	'0',	'0'),
('laur',	'$2y$05$WH9Yv28Y/tpfQTun6eq1IOQbQ7nhUFC/5F1iIkGYWkbLPJ2SIcm0G',	'Karen Laur',	'laur@localhost',	'0',	'0'),
('lundeen',	'$2y$05$3go827jD5Mti7bwBs0o4X.59SudM4YyK0F42GlODP6UmVDRywZTtq',	'Randy Lundeen',	'lundeen@localhost',	'0',	'0'),
('mark',	'$2y$05$Wx.XkOL6aIfpCDrcu0u2ReNyye6wynRTg5BYUXUZ0nmR/XUtTiH4C',	'Yatzse Mark',	'mark@localhost',	'0',	'0'),
('mennet',	'$2y$05$6zTBhGfBIHkKg9RnI8TMMedValcFVcw5iKkIJ6fm7G/TuVHvUNsWe',	'Lisa Mennet',	'mennet@localhost',	'0',	'0'),
('newell',	'$2y$05$ri6aQ2CHTMKgwDew7.2r6OigP1QO1wu0orv97vMjVPuc42.fNkuIq',	'Gabe Newell',	'newell@localhost',	'0',	'0'),
('riller',	'$2y$05$zNvv2WmiwrguBMffz9xKsOtFRXxorouRu7n0SRL0iDqZA7Yqaifme',	'David Riller',	'riller@localhost',	'0',	'0'),
('stackpole',	'$2y$05$odup1i3.oAAuHG4ZsFOv8.ykXlqRPhBJCGBNV1RvmzI2ZrvhSPYhS',	'Aaron Stackpole',	'stackpole@localhost',	'0',	'0'),
('stelly',	'$2y$05$5fXmXpc56ev4ctZLWl8bB.EXsoJWEx6B88GO6xu3o/6Ffqy8eG2PS',	'Jay Stelly',	'stelly@localhost',	'0',	'0'),
('teasley',	'$2y$05$h2zv3fnQATyDHGmksx4Fsu37Q7ofLsMvAkrJGBIYWSOFwWs64OdXO',	'Harry E. Teasley',	'teasley@localhost',	'0',	'0'),
('theodore',	'$2y$05$QfzLcxKShrxL2K4FSHGPie1jXyQUmyPBi1dIgVlJrTUl2QVCMussa',	'Stephen Theodore',	'theodore@localhost',	'0',	'0'),
('vanburen',	'$2y$05$FOSs2/bJIkdtiYG1bHbX7eH41ksemcwgWBrfYCpSj3PvlB.ahCsDC',	'Bill Van Buren',	'vanburen@localhost',	'0',	'0'),
('walker',	'$2y$05$63EzQv9D/JqUTy98rr4ObunCf15KiAVSPhLDlXetm1G3hiX0uO16u',	'Robin Walker',	'walker@localhost',	'0',	'0'),
('wood',	'$2y$05$NJDQF3KxC39f1VUQ6dM49uNpGDxO.vaQ7c51Qh4.sC.OdRsqe03EK',	'Douglas R. Wood',	'wood@localhost',	'0',	'0');

-- 2021-06-07 09:08:30
