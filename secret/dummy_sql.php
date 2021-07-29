<?php

define('E_BATTLE', 'battle');
define('E_MUSIC', 'music');
define('E_PAPER', 'paper');
define('E_SEMNAS', 'semnas');

define('T_EVENTS', 'pf_events');
define('T_USERS', 'pf_users');
define('T_PARTICIPANTS', 'pf_event_participants');
define('T_BATTLE', 'pf_battle_data');
define('T_MUSIC', 'pf_music_data');
define('T_PAPER', 'pf_paper_data');
define('T_SEMNAS', 'pf_semnas_data');

$users = [
    ['Ted Backman', 'backman'],
    ['Kelly Bailey', 'bailey'],
    ['Yahn Bernier', 'bernier'],
    ['Ken Birdwell', 'birdwell'],
    ['Steve Bond', 'bond'],
    ['Dario Casali', 'casali'],
    ['John Cook', 'cook'],
    ['Greg Coomer', 'coomer'],
    ['Wesley Cumberland', 'cumberland'],
    ['John Guthrie', 'guthrie'],
    ['Michael Harrington', 'harrington'],
    ['Brett Johnson', 'johnson'],
    ['Chuck Jones', 'jones'],
    ['Marc Laidlaw', 'laidlaw'],
    ['Karen Laur', 'laur'],
    ['Randy Lundeen', 'lundeen'],
    ['Yatzse Mark', 'mark'],
    ['Lisa Mennet', 'mennet'],
    ['Gabe Newell', 'newell'],
    ['David Riller', 'riller'],
    ['Aaron Stackpole', 'stackpole'],
    ['Jay Stelly', 'stelly'],
    ['Harry E. Teasley', 'teasley'],
    ['Stephen Theodore', 'theodore'],
    ['Bill Van Buren', 'vanburen'],
    ['Robin Walker', 'walker'],
    ['Douglas R. Wood', 'wood']
];

function username($nick) {
    global $users;
    foreach ($users as $user) {
        if ($user[1] === $nick) {
            return $user[0];
        }
    }
    return NULL;
}

$users_battle = ['backman', 'bailey', 'bernier', 'birdwell', 'bond', 'johnson'];
$users_music = ['casali', 'cook', 'cumberland', 'jones'];
$users_paper = ['casali', 'coomer', 'guthrie', 'laidlaw'];
$users_semnas = ['backman', 'bailey', 'harrington', 'laur', 'lundeen', 'mark', 'mennet', 'newell'];

function generate_users($name, $nick) {
    echo 'INSERT INTO '.T_USERS.' (user_id, password, name, email, phone, hash) VALUES ("'.$nick.'", "'.password_hash($nick, PASSWORD_BCRYPT, ['cost' => 5]).'", "'.$name.'", "'.$nick.'@localhost.localdomain", "0", "0");'.PHP_EOL;
}

function generate_participant($nick, $event, $invoice) {
    $unique = rand(0, 999);
    $total = $invoice + $unique;
    echo 'INSERT INTO '.T_PARTICIPANTS.' (user_id, event_id, status, `timestamp`, invoice, `unique`, total) VALUES ("'.$nick.'", "'.$event.'", 1, 0, '.$invoice.', '.$unique.', '.$total.');'.PHP_EOL;
}

function generate_users_battle($nick) {
    $name = username($nick);
    $team_name = $name.'\'s Team';
    $school = $name.'\'s School';
    $leader = $name;
    generate_participant($nick, E_BATTLE, 100000);
    echo 'INSERT INTO '.T_BATTLE.' (user_id, team_name, school, phone, leader, member_1, member_2) VALUES ("'.$nick.'", "'.$team_name.'", "'.$school.'", "081233334444", "'.$leader.'", "noname", "noname");'.PHP_EOL;
}

function generate_users_music($nick) {
    $name = username($nick);
    $group_name = $name.'\'s Group';
    $leader = $name;
    generate_participant($nick, E_MUSIC, 50000);
    $members = ['data' => ['noname', 'noname', 'noname']];
    $members = json_encode($members);
    $members = addslashes($members);
    echo 'INSERT INTO '.T_MUSIC.' (user_id, group_name, leader, phone, members, link_gdrive, link_igtv) VALUES ("'.$nick.'", "'.$group_name.'", "'.$leader.'", "081233334444", "'.$members.'", "https://drive.google.com/", "https://instagram.com/");'.PHP_EOL;
}

function generate_users_paper($nick) {
    $name = username($nick);
    $institution = $name.'\'s University';
    generate_participant($nick, E_PAPER, 75000);
    $members = ['data' => ['noname', 'noname']];
    $members = json_encode($members);
    $members = addslashes($members);
    echo 'INSERT INTO '.T_PAPER.' (user_id, institution, leader, phone, members, title, abstract) VALUES ("'.$nick.'", "'.$institution.'", "'.$name.'", "081233334444", "'.$members.'", "My Amazing Paper", "No description");'.PHP_EOL;
}

function generate_users_semnas($nick) {
    $name = username($nick);
    $institution = $name.'\'s Institution';
    generate_participant($nick, E_SEMNAS, 0);
    echo 'INSERT INTO '.T_SEMNAS.' (user_id, institution) VALUES ("'.$nick.'", "'.$institution.'");'.PHP_EOL;
}

foreach ($users as $user) {
    generate_users($user[0], $user[1]);
}
echo PHP_EOL;

foreach ($users_battle as $user) {
    generate_users_battle($user);
}
echo PHP_EOL;

foreach ($users_music as $user) {
    generate_users_music($user);
}
echo PHP_EOL;

foreach ($users_paper as $user) {
    generate_users_paper($user);
}
echo PHP_EOL;

foreach ($users_semnas as $user) {
    generate_users_semnas($user);
}
echo PHP_EOL;

