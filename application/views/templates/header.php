<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    <title><?php echo htmlspecialchars($title); ?></title>

    <script src="<?php echo base_url('public/jquery/js/jquery-3.6.0.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/pingfest/js/static/pingfest-theme.js'); ?>"></script>
    <script src="<?php echo base_url('public/pingfest/js/header.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/popper/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/bootstrap/js/bootstrap.min.js'); ?>"></script>



    <link rel="stylesheet" href="<?php echo base_url('public/fontawesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/pingfest/css/header.min.css'); ?>" />

    <link href="<?php echo base_url('public/pingfest/img/ping.png'); ?>" rel="icon">
    <link href="<?php echo base_url('public/pingfest/img/ping.png'); ?>" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Chivo&display=swap" rel="stylesheet">


</head>

<body>
    <div style="display: flex; flex-direction: column; min-height: 100vh">
        <div style="flex: 1 0 auto">
            <header class="site-header sticky">
                <div class="logo-ping">
                    <a href="<?php echo site_url(); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="238.775" height="266.484"
                            viewBox="0 0 238.775 266.484">
                            <g transform="translate(-1157.573 -225.786)">
                                <path
                                    d="M1376.545,282.532c-23.578-24.82-89.84-.151-148,55.1s-86.2,120.16-62.617,144.98,89.84.151,148-55.1S1400.124,307.352,1376.545,282.532Zm-65.977,134.112c-49.563,47.084-105.993,68.146-126.038,47.045s3.883-76.377,53.446-123.46,105.993-68.146,126.038-47.045S1360.131,369.561,1310.568,416.644Z" />
                                <path
                                    d="M1319.153,394.746c-14.779-35.55-34.456-61.17-43.95-57.224s-5.209,35.966,9.57,71.516,34.456,61.171,43.95,57.224S1333.932,430.3,1319.153,394.746ZM1323.3,453.7c-8.132,3.38-24.817-18.16-37.269-48.111s-15.953-56.972-7.822-60.352,24.817,18.16,37.268,48.111S1331.433,450.323,1323.3,453.7Z" />
                                <path
                                    d="M1324.745,292.414c-54.379-55.479-117.855-81.445-141.779-58s.766,87.433,55.144,142.912,117.855,81.445,141.778,58S1379.123,347.893,1324.745,292.414Zm46.21,131.472c-17.951,17.6-66.117-2.436-107.582-44.74s-60.528-90.862-42.577-108.457,66.117,2.436,107.583,44.74S1388.906,406.291,1370.955,423.886Z" />
                                <path
                                    d="M1395.473,362.164c-7.209-23.447-57.016-28.938-111.248-12.265s-92.353,49.2-85.145,72.642,57.016,28.938,111.248,12.265S1402.681,385.61,1395.473,362.164Zm-85.184,62.388c-46.013,14.146-88.088,10.083-93.978-9.075s26.636-46.157,72.649-60.3,88.088-10.082,93.978,9.076S1356.3,410.407,1310.289,424.552Z" />
                            </g>
                        </svg>
                        <span>Pingfest</span>
                    </a>
                </div>
                <ul>
                    <li><a href="<?php echo site_url(); ?>" class="header-nav-link"> Home</a></li>
                    <li><a href="<?php echo site_url('itv'); ?>" class="header-nav-link"> IT-Venture</a></li>
                    <li><a href="<?php echo site_url('semnas'); ?>" class="header-nav-link"> Semnas</a></li>
                    <li>
                        <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="<?php echo site_url('profile'); ?>" class="login-link"> Profile</a>
                        <?php else: ?>
                        <a href="<?php echo site_url('auth'); ?>" class="login-link"> Login</a>
                        <?php endif; ?>
                    </li>
                </ul>
                <div class="menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </header>