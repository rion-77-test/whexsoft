/* Shared behaviour for every page */
(function () {
  'use strict';

  // Mobile menu
  var toggle = document.getElementById('menu-toggle');
  var menu = document.getElementById('mobile-menu');
  if (toggle && menu) {
    var icon = toggle.querySelector('.material-symbols-outlined');
    function setOpen(open) {
      menu.classList.toggle('d-none', !open);
      toggle.setAttribute('aria-expanded', String(open));
      toggle.setAttribute('aria-label', open ? 'মেনু বন্ধ করুন' : 'মেনু খুলুন');
      if (icon) icon.textContent = open ? 'close' : 'menu';
    }
    toggle.addEventListener('click', function () {
      setOpen(menu.classList.contains('d-none'));
    });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') setOpen(false); });
    window.addEventListener('resize', function () { if (window.innerWidth >= 992) setOpen(false); });
  }

  // Header shadow once the page is scrolled
  var header = document.getElementById('site-header');
  if (header) {
    var onScroll = function () {
      header.classList.toggle('site-header--scrolled', window.scrollY > 8);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }
  // Forms with data-mailto: open the visitor's mail app with the answers filled in
  document.querySelectorAll('form[data-mailto]').forEach(function (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var lines = [];
      new FormData(form).forEach(function (v, k) { if (String(v).trim()) lines.push(k + ': ' + v); });
      window.location.href = 'mailto:' + form.dataset.mailto +
        '?subject=' + encodeURIComponent(form.dataset.subject || 'নতুন অনুরোধ') +
        '&body=' + encodeURIComponent(lines.join('\n'));
    });
  });
})();
