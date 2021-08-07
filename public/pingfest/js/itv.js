const deskripsi = document.querySelector('.deskripsi-itv');

function isOnScreen(elem) {
  if (elem.length == 0) {
    return;
  }
  var $window = jQuery(window);
  var viewport_top = $window.scrollTop();
  var viewport_height = $window.height();
  var viewport_bottom = viewport_top + viewport_height;
  var $elem = jQuery(elem);
  var top = $elem.offset().top;
  var height = $elem.height();
  var bottom = top + height;

  return (
    (top >= viewport_top && top < viewport_bottom) ||
    (bottom > viewport_top && bottom <= viewport_bottom) ||
    (height > viewport_height &&
      top <= viewport_top &&
      bottom >= viewport_bottom)
  );
}

var autoScroll = true;

window.addEventListener('scroll', () => {
  if (!isOnScreen(jQuery('.auto-scroll'))) {
    if (autoScroll) {
      window.scrollTo({ top: this.window.innerHeight, behavior: 'smooth' });
      autoScroll = false;
    }
  } else {
    autoScroll = true;
  }
});

const headline = document.querySelector('.headline');

jQuery(document).ready(function () {
  window.addEventListener('scroll', function (e) {
    document.body.classList.toggle(
      'container-fixed',
      isOnScreen(jQuery('.headline'))
    );
  });
});

var daftarText = document.querySelector('.daftar-text');
var daftarBlock = document.querySelector('.daftar-block');

$('.daftar-block').mousemove(function (e) {
  var offset = $('.daftar-block').offset();

  daftarText.style.transform =
    'translate(' +
    (e.pageX - offset.left - 149) / 4 +
    'px, ' +
    (e.pageY - offset.top - 38) / 2.5 +
    'px)';
  daftarText.style.transitionDuration = '0s';
});

$(document).on('mouseleave', '.daftar-block', function () {
  daftarText.style.transform = 'translate(0px , 0px)';
  daftarText.style.transitionDuration = '0.2s';
});
