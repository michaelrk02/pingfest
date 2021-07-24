const menuBtn = document.querySelector('.menu-toggle');
const header = document.querySelector('.site-header');

const Grid = document.querySelector('.text-itv');

const itvJellyContainer = document.querySelector('.itv-jelly');
const itvTextContainer = document.querySelector('.itv-inner');

const semJellyContainer = document.querySelector('.sem-jelly');
const semTextContainer = document.querySelector('.sem-inner');

window.addEventListener('scroll', function () {
  header.classList.toggle('sticky', window.scrollY > 0);
});

menuBtn.addEventListener('click', function () {
  header.classList.toggle('mobile-menu');
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
    1,
    (Grid.clientWidth / itvJellyContainer.clientWidth) * 1.3,
    (Grid.clientHeight / itvJellyContainer.clientHeight) * 1.3
  );
  if (window.innerWidth > 900) {
    itvJellyContainer.style.right = '-' + scale * 25 + 'px';
    itvTextContainer.style.right = '-' + scale * 25 + 'px';

    semJellyContainer.style.left = '-' + scale * 25 + 'px';
    semTextContainer.style.left = '-' + scale * 25 + 'px';
  } else {
    itvJellyContainer.style.right = '-' + (880 - Grid.clientWidth) / 4 + 'px';
    itvTextContainer.style.right = '-' + (880 - Grid.clientWidth) / 4 + 'px';

    semJellyContainer.style.left = '-' + (900 - Grid.clientWidth) / 4 + 'px';
    semTextContainer.style.left = '-' + (900 - Grid.clientWidth) / 4 + 'px';
  }
  var mobile = 0.4;
  if (window.innerWidth < 900) {
    mobile += window.innerWidth / 1200;
  }
  scale = Math.max(scale, mobile, 0.7);

  itvJellyContainer.style.transform = 'scale(' + scale + ')';
  itvTextContainer.style.transform = 'scale(' + scale + ')';

  semJellyContainer.style.transform = 'scale(' + scale + ')';
  semTextContainer.style.transform = 'scale(' + scale + ')';
}

window.addEventListener('resize', resize);
resize();
