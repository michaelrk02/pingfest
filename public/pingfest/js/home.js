const header = document.querySelector('.site-header');
const Grid = document.querySelector('.text-itv');

const itvContainer = document.querySelector('.itv-wrapper');
const semContainer = document.querySelector('.sem-wrapper');

$('.site-header').removeClass('sticky');

window.addEventListener('scroll', function () {
  header.classList.toggle('sticky', window.scrollY > 0);
});

$(window)
  .scroll(function () {
    var $window = $(window),
      $body = $('body'),
      $greenStart = $('.green-start'),
      $greenEnd = $('.green-end');
    var scroll = $window.scrollTop() + $window.height() / 3;

    if (
      scroll >= $greenStart.position().top - window.innerHeight / 6 &&
      scroll <= $greenEnd.position().top - window.innerHeight / 3
    ) {
      $body.addClass('color-green');
    } else if (
      scroll < $greenStart.position().top - window.innerHeight / 3 ||
      scroll > $greenEnd.position().top
    ) {
      $body.removeClass('color-green');
    }
  })
  .scroll();
(function () {
  var itvOptions = {
    paths: '#itv-jelly',
    pointsNumber: 30,
    maxDistance: 70,
    color: '#212121',
    // debug: true,
  };

  var semOptions = {
    paths: '#sem-jelly',
    pointsNumber: 30,
    maxDistance: 70,
    color: '#212121',
    // debug: true,
  };

  new Jelly('.itv-jelly', itvOptions);
  new Jelly('.sem-jelly', semOptions);
})();

function resize() {
  if (window.innerWidth <= 900 && window.innerWidth >= 350) {
    var scale = Math.max(0.4, Math.min(Grid.clientWidth / 550, 1));

    itvContainer.style.transform = 'scale(' + scale + ')';
    semContainer.style.transform = 'scale(' + scale + ')';

    itvContainer.style.left = (Grid.clientWidth - 800 * scale) / 2 + 'px';
    semContainer.style.left = (Grid.clientWidth - 800 * scale) / 2 + 'px';
  }
}

// const daysElement = document.querySelector("#days");
// const hoursElement = document.querySelector("#hours");
// const minutesElement = document.querySelector("#minutes");
// const secondsElement = document.querySelector("#seconds");

// let countDownDate = new Date("Oct 5, 2021").getTime();

// let interval = setInterval(() => {
//   let now = new Date().getTime();

//   let distance = countDownDate - now;
//   if (distance < 0) {
//     clearInterval(interval);
//     return;
//   }
//   let days = Math.floor(
//     (distance % (1000 * 60 * 60 * 24 * 30)) / (1000 * 60 * 60 * 24)
//   );
//   let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//   let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//   let seconds = Math.floor((distance % (1000 * 60)) / 1000);

//   daysElement.textContent = days > 9 ? days : "0" + days;
//   hoursElement.textContent = hours > 9 ? hours : "0" + hours;
//   minutesElement.textContent = minutes > 9 ? minutes : "0" + minutes;;
//   secondsElement.textContent = seconds > 9 ? seconds : "0" + seconds;;
// }, 1000);


// var daftarText = document.querySelector('.daftar-text');
// var daftarBlock = document.querySelector('.daftar-block');

// $('.daftar-block').mousemove(function (e) {
//   var offset = $('.daftar-block').offset();

//   daftarText.style.transform =
//     'translate(' +
//     (e.pageX - offset.left - 155) / 5 +
//     'px, ' +
//     (e.pageY - offset.top - 50) / 2.5 +
//     'px)';
//   daftarText.style.transitionDuration = '0s';
// });

// $(document).on('mouseleave', '.daftar-block', function () {
//   daftarText.style.transform = 'translate(0px , 0px)';
//   daftarText.style.transitionDuration = '0.2s';
// });



window.addEventListener('resize', resize);
resize();
