const deskripsi = document.querySelector('.deskripsi-sem');

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
const headline = document.querySelector('.headline');

window.addEventListener('scroll', () => {
  if (!isOnScreen(jQuery('.auto-scroll'))) {
    if (autoScroll) {
      autoScroll = false;
      $('html, body').animate({ scrollTop: headline.clientHeight }, '50');
    }
  } else {
    autoScroll = true;
  }
});

jQuery(document).ready(function () {
  window.addEventListener('scroll', function (e) {
    document.body.classList.toggle(
      'container-fixed',
      isOnScreen(jQuery('.headline'))
    );
  });
});

class TextScramble {
  constructor(el) {
    this.el = el;
    this.chars = 'FindYourIdea';
    this.update = this.update.bind(this);
  }
  setText(newText) {
    const oldText = this.el.innerText;
    const length = Math.max(oldText.length, newText.length);
    const promise = new Promise((resolve) => (this.resolve = resolve));
    this.queue = [];
    for (let i = 0; i < length; i++) {
      const from = oldText[i] || '';
      const to = newText[i] || '';
      const start = Math.floor(Math.random() * 20);
      const end = start + Math.floor(Math.random() * 20);
      this.queue.push({ from, to, start, end });
    }
    cancelAnimationFrame(this.frameRequest);
    this.frame = 0;
    this.update();
    return promise;
  }
  update() {
    let output = '';
    let complete = 0;
    for (let i = 0, n = this.queue.length; i < n; i++) {
      let { from, to, start, end, char } = this.queue[i];
      if (this.frame >= end) {
        complete++;
        output += to;
      } else if (this.frame >= start) {
        if (!char || Math.random() < 0.28) {
          char = this.randomChar();
          this.queue[i].char = char;
        }
        output += `<span class="dud">${char}</span>`;
      } else {
        output += from;
      }
    }
    this.el.innerHTML = output;
    if (complete === this.queue.length) {
      this.resolve();
    } else {
      this.frameRequest = requestAnimationFrame(this.update);
      this.frame++;
    }
  }
  randomChar() {
    return this.chars[Math.floor(Math.random() * this.chars.length)];
  }
}

var idea = document.querySelector('.idea');
var textArray = document.getElementsByClassName('hay-text');

var indexText = 1;
var hayText = ['Find', 'Your'];
var counter = 2;
$(document).on('mouseenter', '.idea', function () {
  if (counter == 0) {
    counter = 3;
  }
  counter--;
  const fxIdea = new TextScramble(idea);
  const fxText = new TextScramble(textArray[counter]);

  fxIdea.setText(hayText[indexText]);
  fxText.setText('Idea');

  indexText = Math.abs(indexText - 1);

  idea.classList.remove('idea');
  textArray[counter].classList.add('idea');
  idea = document.querySelector('.idea');
});


var daftarText = document.querySelector('.daftar-text');
var daftarBlock = document.querySelector('.daftar-block');

$('.daftar-block').mousemove(function (e) {
  console.log(daftarText);

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
