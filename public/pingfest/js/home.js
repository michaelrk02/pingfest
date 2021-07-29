const header = document.querySelector('.site-header');
const Grid = document.querySelector('.text-itv');

const itvJellyContainer = document.querySelector('.itv-jelly');
const itvTextContainer = document.querySelector('.itv-inner');
const itvTextDescription = document.querySelector('.itv-text');

const semJellyContainer = document.querySelector('.sem-jelly');
const semTextContainer = document.querySelector('.sem-inner');

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
  var scale = Math.min(
    (Grid.clientWidth / itvJellyContainer.clientWidth) * 1.2,
    (Grid.clientHeight / itvJellyContainer.clientHeight) * 1.2
  );

  var mobile = 0.4;
  if (window.innerWidth < 900) {
    mobile += window.innerWidth / 1200;
    itvJellyContainer.style.right = '-' + (920 - Grid.clientWidth) / 4 + 'px';
    itvTextContainer.style.right = '-' + (920 - Grid.clientWidth) / 4 + 'px';

    semJellyContainer.style.left = '-' + (920 - Grid.clientWidth) / 4 + 'px';
    semTextContainer.style.left = '-' + (920 - Grid.clientWidth) / 4 + 'px';
  }
  if (window.innerWidth < 400) {
    scale = Math.max(scale, mobile);
    itvJellyContainer.style.transform = 'scale(' + scale + ')';
    itvTextContainer.style.transform = 'scale(' + scale + ')';
    itvTextDescription.style.width = (1 / scale) * 99 + 'vw';

    semJellyContainer.style.transform = 'scale(' + scale + ')';
    semTextContainer.style.transform = 'scale(' + scale + ')';
  } else {
    itvTextDescription.style.width = 60 + '%';
  }
}

window.addEventListener('resize', resize);
resize();
