import Swiper from 'swiper';
import { Autoplay, Pagination, Navigation, Thumbs, Zoom, Keyboard } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/zoom';
import 'swiper/css/thumbs';

/////////////////////////////////////
// Home page testimonial slider
document.addEventListener("DOMContentLoaded", () => {
    const el = document.querySelector(".testimonial-swiper");
    if (!el) return;

    new Swiper(el, {
        modules: [Autoplay, Pagination],
        slidesPerView: 1,
        spaceBetween: 24, // replaces Bootstrap's g-4
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        pagination: {
            el: ".testimonial-pagination",
            clickable: true,
        },
        breakpoints: {
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });
});

/////////////////////////////////////
// Home Page Trusted By Slider
document.addEventListener("DOMContentLoaded", () => {
    const el = document.querySelector(".partners-swiper");
    if (!el) return;

    const partnersSwiper = new Swiper(el, {
        modules: [Autoplay],
        slidesPerView: "auto",
        spaceBetween: 24,
        loop: true,
        loopAdditionalSlides: 6,
        watchOverflow: false,
        speed: 6000,
        allowTouchMove: false,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
    });

    // Recalculate once real images have loaded
    window.addEventListener("load", () => {
        partnersSwiper.update();
        partnersSwiper.autoplay.start();
    });
});


/////////////////////////////////////
// Service page ajax filtering
document.addEventListener("DOMContentLoaded", () => {
    const filters = document.querySelector("#service-filters");
    const results = document.querySelector("#services-results");
    const features = document.querySelector("#service-features");
    if (!filters || !results) return;

    let controller;

    const setActive = (url) => {
        const category =
            new URL(url, window.location.origin).searchParams.get("category") ||
            "";
        filters.querySelectorAll("[data-service-filter]").forEach((link) => {
            link.classList.toggle(
                "is-active",
                link.dataset.category === category,
            );
        });
    };

    const load = async (url, push = true) => {
        controller?.abort(); // cancel the previous request if the user clicks quickly
        const current = (controller = new AbortController());
        results.classList.add("is-loading");

        try {
            const res = await fetch(url, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    Accept: "application/json",
                },
                signal: current.signal,
            });
            if (!res.ok) throw new Error("Request failed");

            const data = await res.json();
            results.innerHTML = data.grid;
            if (features) features.innerHTML = data.features;

            setActive(url);
            if (push) history.pushState({}, "", url);
        } catch (error) {
            if (error.name !== "AbortError") window.location.href = url; // fall back to a normal page load
        } finally {
            if (controller === current) results.classList.remove("is-loading");
        }
    };

    filters.addEventListener("click", (event) => {
        const link = event.target.closest("[data-service-filter]");
        if (!link) return;
        if (
            event.metaKey ||
            event.ctrlKey ||
            event.shiftKey ||
            event.button !== 0
        )
            return; // allow open-in-new-tab

        event.preventDefault();
        if (link.classList.contains("is-active")) return;
        load(link.href);
    });

    // Back/forward buttons
    window.addEventListener("popstate", () =>
        load(window.location.href, false),
    );
});

/////////////////////////////////////
// Portfolio page ajax filtering
document.addEventListener('DOMContentLoaded', () => {
    const wrapper = document.querySelector('#portfolio-wrapper');
    if (!wrapper) return;

    const filters = wrapper.querySelector('#portfolio-filters');
    const results = wrapper.querySelector('#portfolio-results');
    let controller;

    // Highlight the chip that matches the URL's category
    const setActive = (url) => {
        const category = new URL(url, window.location.origin).searchParams.get('category') || '';
        filters.querySelectorAll('[data-portfolio-filter]').forEach((chip) => {
            chip.classList.toggle('is-active', chip.dataset.category === category);
        });
    };

    // One loader used by both chips and pagination
    const load = async (url, { push = true, scroll = false } = {}) => {
        controller?.abort(); // cancel the previous request so responses never arrive out of order
        const current = (controller = new AbortController());
        results.classList.add('is-loading');

        try {
            const res = await fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                },
                signal: current.signal,
            });
            if (!res.ok) throw new Error('Request failed');

            const data = await res.json();
            results.innerHTML = data.grid;

            setActive(url);
            if (push) history.pushState({}, '', url);
            if (scroll) filters.scrollIntoView({ behavior: 'smooth', block: 'start' });
        } catch (error) {
            if (error.name !== 'AbortError') window.location.href = url; // normal page load as a fallback
        } finally {
            if (controller === current) results.classList.remove('is-loading');
        }
    };

    // One click handler for both chips and pagination links
    wrapper.addEventListener('click', (event) => {
        // Let ctrl/cmd/shift/middle clicks open in a new tab as usual
        if (event.metaKey || event.ctrlKey || event.shiftKey || event.button !== 0) return;

        const chip = event.target.closest('[data-portfolio-filter]');
        if (chip) {
            event.preventDefault();
            if (!chip.classList.contains('is-active')) load(chip.href);
            return;
        }

        const pageLink = event.target.closest('[data-portfolio-pagination] a[href]');
        if (pageLink) {
            event.preventDefault();
            load(pageLink.href, { scroll: true });
        }
    });

    // Back/forward buttons
    window.addEventListener('popstate', () => load(window.location.href, { push: false }));
});

/////////////////////////////////////
// Project Page Gallery Slider
document.addEventListener('DOMContentLoaded', () => {
    const gallery = document.querySelector('[data-project-gallery]');
    if (!gallery) return;

    // ---- Main carousel with thumbnail navigation
    const thumbsEl = gallery.querySelector('.project-thumbs-swiper');
    const thumbsSwiper = thumbsEl
        ? new Swiper(thumbsEl, {
              slidesPerView: 'auto',
              spaceBetween: 12,
              watchSlidesProgress: true,
              centerInsufficientSlides: true,
          })
        : null;

    const mainSwiper = new Swiper(gallery.querySelector('.project-main-swiper'), {
        modules: [Navigation, Thumbs],
        spaceBetween: 16,
        navigation: {
            prevEl: gallery.querySelector('.project-nav-prev'),
            nextEl: gallery.querySelector('.project-nav-next'),
        },
        thumbs: thumbsSwiper ? { swiper: thumbsSwiper } : undefined,
    });

    // ---- Lightbox with zoom
    const lightbox = document.querySelector('#project-lightbox');
    if (!lightbox) return;

    const counter = lightbox.querySelector('[data-lb-count]');
    const total = lightbox.querySelectorAll('.swiper-slide').length;
    const MAX_ZOOM = 4;
    let lb = null;
    let lastTrigger = null;

    const updateCount = () => {
        counter.textContent = `${lb.activeIndex + 1} / ${total}`;
    };

    const stepZoom = (delta) => {
        if (!lb) return;
        const next = Math.min(MAX_ZOOM, Math.max(1, Math.round(lb.zoom.scale + delta)));
        next === 1 ? lb.zoom.out() : lb.zoom.in(next);
    };

    const open = (index, trigger) => {
        lastTrigger = trigger;
        lightbox.hidden = false; // must be visible before Swiper measures it
        document.body.style.overflow = 'hidden';

        if (!lb) {
            lb = new Swiper(lightbox.querySelector('.project-lightbox-swiper'), {
                modules: [Navigation, Zoom, Keyboard],
                spaceBetween: 24,
                zoom: { maxRatio: MAX_ZOOM, minRatio: 1 },
                keyboard: { enabled: true },
                navigation: {
                    prevEl: lightbox.querySelector('.lb-nav-prev'),
                    nextEl: lightbox.querySelector('.lb-nav-next'),
                },
                on: { slideChange: updateCount },
            });
        } else {
            lb.update();
            lb.zoom.out();
        }

        lb.slideTo(index, 0);
        updateCount();
        lightbox.querySelector('[data-lb-close]').focus();
    };

    const close = () => {
        if (lightbox.hidden || !lb) return;
        lb.zoom.out();
        lightbox.hidden = true;
        document.body.style.overflow = '';
        mainSwiper.slideTo(lb.activeIndex, 0); // keep the carousel on the last viewed image
        lastTrigger?.focus();
    };

    gallery.addEventListener('click', (event) => {
        const trigger = event.target.closest('[data-lightbox-open]');
        if (trigger) open(Number(trigger.dataset.lightboxOpen), trigger);
    });

    lightbox.addEventListener('click', (event) => {
        if (event.target.closest('[data-lb-close]')) close();
        else if (event.target.closest('[data-lb-zoom-in]')) stepZoom(1);
        else if (event.target.closest('[data-lb-zoom-out]')) stepZoom(-1);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') close();
    });

    // Mouse wheel zoom (throttled)
    let wheelLock = false;
    lightbox.addEventListener(
        'wheel',
        (event) => {
            event.preventDefault();
            if (wheelLock) return;
            wheelLock = true;
            setTimeout(() => (wheelLock = false), 150);
            stepZoom(event.deltaY < 0 ? 1 : -1);
        },
        { passive: false },
    );
});

/* Shared frontend behaviour for every page */
(function () {
    "use strict";

    // Mobile menu
    var toggle = document.getElementById("menu-toggle");
    var menu = document.getElementById("mobile-menu");
    if (toggle && menu) {
        var icon = toggle.querySelector(".material-symbols-outlined");
        function setOpen(open) {
            menu.classList.toggle("d-none", !open);
            toggle.setAttribute("aria-expanded", String(open));
            toggle.setAttribute(
                "aria-label",
                open ? "মেনু বন্ধ করুন" : "মেনু খুলুন",
            );
            if (icon) icon.textContent = open ? "close" : "menu";
        }
        toggle.addEventListener("click", function () {
            setOpen(menu.classList.contains("d-none"));
        });
        document.addEventListener("keydown", function (e) {
            if (e.key === "Escape") setOpen(false);
        });
        window.addEventListener("resize", function () {
            if (window.innerWidth >= 992) setOpen(false);
        });
    }

    // Header shadow once the page is scrolled
    var header = document.getElementById("site-header");
    if (header) {
        var onScroll = function () {
            header.classList.toggle(
                "site-header--scrolled",
                window.scrollY > 8,
            );
        };
        window.addEventListener("scroll", onScroll, { passive: true });
        onScroll();
    }

    // Blog reading progress indicator
    var progressElem = document.getElementById("readProgress");
    if (progressElem) {
        window.addEventListener(
            "scroll",
            function () {
                var winScroll =
                    document.documentElement.scrollTop ||
                    document.body.scrollTop;
                var height =
                    document.documentElement.scrollHeight -
                    document.documentElement.clientHeight;
                var scrolled = height > 0 ? (winScroll / height) * 100 : 0;
                progressElem.style.width = scrolled + "%";
            },
            { passive: true },
        );
    }

    // Copy the current article URL
    window.copyArticleUrl = function () {
        navigator.clipboard
            .writeText(window.location.href)
            .then(function () {
                var copyText = document.getElementById("copyText");
                if (!copyText) return;
                var original = copyText.innerText;
                copyText.innerText = "কপি হয়েছে!";
                setTimeout(function () {
                    copyText.innerText = original;
                }, 2000);
            })
            .catch(function () {
                alert("লিঙ্কটি কপি করা সম্ভব হয়নি।");
            });
    };

    // Facebook share helper
    window.shareOnFB = function () {
        var url = encodeURIComponent(window.location.href);
        window.open(
            "https://www.facebook.com/sharer/sharer.php?u=" + url,
            "_blank",
            "width=600,height=400",
        );
    };

    // Smooth scroll for table-of-contents links
    document.querySelectorAll(".toc-link").forEach(function (anchor) {
        anchor.addEventListener("click", function (e) {
            var targetElem = document.querySelector(this.getAttribute("href"));
            if (!targetElem) return;
            e.preventDefault();
            targetElem.scrollIntoView({ behavior: "smooth" });
        });
    });
})();

