/* Shared behaviour for every page */
(function () {
  'use strict';

  // Theme preference
  var themeToggle = document.getElementById('theme-toggle');
  if (themeToggle) {
    var themeIcon = document.getElementById('theme-toggle-icon');
    var themeColorMeta = document.getElementById('theme-color-meta');

    function syncThemeControl(theme) {
      var isLight = theme === 'light';
      themeToggle.setAttribute('aria-pressed', String(isLight));
      themeToggle.setAttribute('title', isLight ? 'ডার্ক মোড চালু করুন' : 'লাইট মোড চালু করুন');
      if (themeIcon) themeIcon.textContent = isLight ? 'dark_mode' : 'light_mode';
      if (themeColorMeta) themeColorMeta.setAttribute('content', isLight ? '#ffffff' : '#070A0E');
    }

    syncThemeControl(document.documentElement.dataset.theme === 'light' ? 'light' : 'dark');
    themeToggle.addEventListener('click', function () {
      var theme = document.documentElement.dataset.theme === 'light' ? 'dark' : 'light';
      document.documentElement.dataset.theme = theme;
      document.documentElement.classList.toggle('dark', theme === 'dark');
      syncThemeControl(theme);
      localStorage.setItem('whexsoft-theme', theme);
    });
  }

  // Mobile menu
  var toggle = document.getElementById('menu-toggle');
  var menu = document.getElementById('mobile-menu');
  if (toggle && menu) {
    var icon = toggle.querySelector('.material-symbols-outlined');
    function setOpen(open) {
      menu.classList.toggle('hidden', !open);
      toggle.setAttribute('aria-expanded', String(open));
      toggle.setAttribute('aria-label', open ? 'মেনু বন্ধ করুন' : 'মেনু খুলুন');
      if (icon) icon.textContent = open ? 'close' : 'menu';
    }
    toggle.addEventListener('click', function () {
      setOpen(menu.classList.contains('hidden'));
    });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') setOpen(false); });
    window.addEventListener('resize', function () { if (window.innerWidth >= 1024) setOpen(false); });
  }

  // Header shadow once the page is scrolled
  var header = document.getElementById('site-header');
  if (header) {
    var onScroll = function () {
      header.classList.toggle('shadow-[0_4px_24px_rgba(0,0,0,0.5)]', window.scrollY > 8);
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
