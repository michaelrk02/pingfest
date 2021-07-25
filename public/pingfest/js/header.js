$(document).ready(function () {
  const menuHamburgerBtn = document.querySelector('.menu-toggle');
  const siteHeader = document.querySelector('.site-header');

  menuHamburgerBtn.addEventListener('click', function () {
    siteHeader.classList.toggle('mobile-menu');
  });
});
