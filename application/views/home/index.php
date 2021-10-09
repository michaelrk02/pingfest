<link rel="stylesheet" href="<?php echo base_url('public/pingfest/css/home.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('public/pingfest/css/sponsorlogo.min.css'); ?>" />

<svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="display: none">
    <path id="itv-jelly"
        d="M545.189 128.757C591.027 163.351 637.297 188.432 677.514 226.919 718.162 265.838 752.324 318.595 760.541 376.108 768.324 433.189 750.162 495.459 706.054 527.459 661.946 559.892 591.892 562.486 538.27 597.514 484.216 632.541 447.027 700 400.757 716 354.054 732 298.27 696.541 245.946 660.649 193.622 624.757 144.324 588.865 107.135 540.432 69.514 492.432 43.568 431.892 46.595 373.081 49.622 314.27 81.622 257.622 117.946 207.027 154.27 156.432 194.486 112.324 243.784 79.892 293.081 47.027 351.459 25.838 402.919 37.514 454.811 49.189 499.351 93.73 545.189 128.757Z" />
    <path id="sem-jelly"
        d="M711.901 316.012Q632.906 237.017 580.996 141.471 529.086 45.927 414.732 42.917 300.378 39.907 213.108 112.131 125.839 184.355 91.984 289.68 58.129 395.006 115.306 483.028 172.483 571.05 237.183 659.072 301.883 747.095 413.979 739.571 526.076 732.048 577.986 641.017 629.898 549.985 710.396 472.495 790.895 395.006 711.901 316.012Z" />
</svg>

<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
    style="display: none">
    <symbol viewBox="0 0 36.1 25.8" id="button-arrow">
        <line x1="0" y1="12.9" x2="34" y2="12.9"></line>
        <polyline fill="none" points="22.2,1.1 34,12.9 22.2,24.7"></polyline>
    </symbol>
</svg>


<div class="grid-container">
    <div class="item headline ">
        <h1>Ayo ikuti pekan teknologi</h1>
        <h1>P!NGFEST 2021</h1>
        <div class="riseit-container">
            <div style="--i:1" class="hay-text">R</div>
            <div style="--i:2" class="hay-text">i</div>
            <div style="--i:3" class="hay-text">s</div>
            <div style="--i:4" class="hay-text">e&nbsp;</div>
            <div style="--i:5" class="hay-text">I</div>
            <div style="--i:6" class="hay-text">T</div>
        </div>
        <iframe max-width: 100%; height: auto; src="https://www.youtube.com/embed/kAzUq7Sr4yk?controls=0&rel=0"
            frameborder="0">
        </iframe>

    </div>

    <!-- <div class="item countdown countdown-container">
        <div class="countdown-wrapper">
            <div class="countdown">
                <h1 class="header">Daftarkan Dirimu!</h1>
                <h2 class="header">Pendaftaran ditutup dalam</h2>
                <div class="count">
                    <div class="days sec">
                        <h2 id="days">00</h2>
                        <p>Hari</p>
                    </div>
                    <div class="hours sec">
                        <h2 id="hours">00</h2>
                        <p>Jam</p>
                    </div>
                    <div class="minutes sec">
                        <h2 id="minutes">00</h2>
                        <p>Menit</p>
                    </div>
                    <div class="seconds sec">
                        <h2 id="seconds">00</h2>
                        <p>Detik</p>
                    </div>
                </div>
                <div class="home-daftar button">
                    <a href="<?php echo site_url('profile/index').'?tab=registration'; ?>" class="btn daftar-block">
                        <span class="daftar-text">Daftar Sekarang</span>
                    </a>
                </div>

            </div>
        </div>
    </div> -->

    <div class="item logo-itv green-start">
        <video class="logo-acara" autoplay muted loop>
            <source src="<?php echo base_url('public/pingfest/video/itv.webm'); ?>" type="video/webm">
            Your browser does not support the video tag.
        </video>
    </div>



    <div class="item text-itv">
        <div class="itv-wrapper">
            <div class="itv-inner inner">
                <div class="itv-text wrapper">
                    <div class="title">IT⁠-⁠Venture</div>
                    <div class="description">
                        IT-Venture merupakan salah satu rangkaian acara P!NGFEST 2021 dalam bentuk lomba yang terdiri
                        dari Battle of Technology, IT-Paper dan IT-Music. Yang tujuannya untuk mengajak masyarakat agar
                        bisa menguasai teknologi informasi supaya lebih produktif dan menghasilkan karya.
                    </div>
                    <div class="text-button">
                        <a href="<?php echo site_url('itv'); ?>" class="btn btn-arrow">
                            <span>Selengkapnya
                                <svg>
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" href="#button-arrow"></use>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
                <canvas class="itv-jelly jelly-canvas"></canvas>
            </div>
        </div>
    </div>

    <div class="item text-semnas">
        <div class="sem-wrapper">
            <div class="sem-inner inner">
                <div class="sem-text wrapper">
                    <div class="title">Seminar Nasional</div>
                    <div class="description">
                        Seminar Nasional merupakan salah satu rangkaian acara P!NGFEST yang diadakan setiap tahun dengan
                        mengundang pembicara ternama. Pada tahun ini, Seminar Nasional mengusung tema Find Your Idea.
                        Penyelenggaraaan Find Your Idea berencana meraih pasar peserta yang kekinian dengan era digital.
                    </div>
                    <div class="text-button">
                        <a href="<?php echo site_url('semnas'); ?>" class="btn btn-arrow">
                            <span>
                                Selengkapnya
                                <svg>
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" href="#button-arrow"></use>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
                <canvas class="sem-jelly jelly-canvas"></canvas>
            </div>
        </div>
    </div>

    <div class="item logo-semnas ">
        <video class="logo-acara" autoplay muted loop>
            <source src="<?php echo base_url('public/pingfest/video/fyi.webm'); ?>" type="video/webm">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="item dokumentasi green-end">
        <p>Highlights</p>
        <div class="dokumentasi-container">
            <div class="square-wrapper"> <img class="square-image" width="300px" height="240px"></img></div>
            <div class="square-wrapper"> <img class="square-image" width="300px" height="240px"></img></div>
            <div class="square-wrapper"> <img class="square-image" width="300px" height="240px"></img></div>
            <div class="square-wrapper"> <img class="square-image" width="300px" height="240px"></img></div>
            <div class="square-wrapper"> <img class="square-image" width="300px" height="240px"></img></div>
            <div class="square-wrapper"> <img class="square-image" width="300px" height="240px"></img></div>
        </div>
    </div>
    <div class="item sponsor">
        <p>Our Sponsors</p>
        <div class="sponsor-container">
            <div class="big-wrapper">
                <a class="sponsor-logo sponsor-big" href="https://barito.tech/" target="_blank"><img
                        class="sponsor-image" src="<?php echo base_url('public/pingfest/img/sponsor/bit.png'); ?>"
                        alt=""></a>
                <a class="sponsor-logo sponsor-big" href="https://upscale.co.id/" target="_blank"><img
                        class="sponsor-image" src="<?php echo base_url('public/pingfest/img/sponsor/upscale.png'); ?>"
                        alt=""></a>
            </div>
            <div class="small-wrapper">
                <div class="small-section">
                    <a class="sponsor-logo sponsor-small" href="https://byu.id/" target="_blank"><img
                            class="sponsor-image" src="<?php echo base_url('public/pingfest/img/sponsor/byu.png'); ?>"
                            alt=""></a>
                    <a class="sponsor-logo sponsor-small" href=" https://dewaweb.com" target="_blank"><img
                            class="sponsor-image"
                            src="<?php echo base_url('public/pingfest/img/sponsor/dewaweb.png'); ?>" alt=""></a>
                </div>
                <div class="small-section">

                    <a class="sponsor-logo sponsor-small" href="https://pahamify.com/" target="_blank"><img
                            class="sponsor-image"
                            src="<?php echo base_url('public/pingfest/img/sponsor/pahamify.png'); ?>" alt=""></a>
                    <a class="sponsor-logo sponsor-small" href="https://www.instagram.com/whoknowswhat.id/"
                        target="_blank"><img class="sponsor-image"
                            src="<?php echo base_url('public/pingfest/img/sponsor/wkw.png'); ?>" alt=""></a>
                </div>

            </div>
        </div>
        <div class="sponsor-button">
            <a href="<?php echo site_url('sponsors/join'); ?>" class="btn btn-arrow">
                <span>
                    Sponsor Us
                    <svg>
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" href="#button-arrow"></use>
                    </svg>
                </span>
            </a>
        </div>
    </div>

</div>

<script src="<?php echo base_url('public/pingfest/js/blob.min.js'); ?>"></script>
<script src="<?php echo base_url('public/pingfest/js/home.min.js'); ?>"></script>