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

window.addEventListener('resize', resize);
resize();
