# WhexSoft – HTML / CSS / JS template

Static multi-page site (Bengali, dark theme, lime accent). Every page is its own HTML file.

## Pages
| File | Page |
|---|---|
| index.html | Home (full-image hero) |
| services.html | Services hub (stats, service cards, why us, process, quote form, FAQ) |
| service-ecommerce.html, service-landing-page.html, service-corporate.html, service-web-app.html, service-ui-ux.html, service-maintenance.html | Single service pages (same layout, duplicate one to add a service) |
| portfolio.html | Portfolio (category filter – js/portfolio.js) |
| pricing.html | Pricing + FAQ accordion (js/pricing.js) |
| process.html | Work process (js/process.js) |
| blog.html | Blog list |
| blog-post.html | Blog article (progress bar, copy/share – js/blog-post.js) |
| about.html | About |
| faq.html | FAQ accordion (js/faq.js) |
| contact.html | Contact |
| privacy-policy.html, terms.html | Placeholder legal pages – replace the text |

## Structure
```
css/style.css      compiled + minified Tailwind (ready to use, no CDN)
js/main.js         shared: mobile menu, header shadow
js/<page>.js       page-specific behaviour
src/input.css      CSS source (backgrounds, scrollbar, custom components)
tailwind.config.js design tokens (colors, fonts, spacing from the design system)
```

## Editing
Open any `.html` file directly in a browser – no server needed.
If you add/change Tailwind classes, rebuild the CSS:
```
npm install
npm run build     # or: npm run dev  (watch mode)
```
The header, footer and floating call/WhatsApp buttons are repeated in every page – edit them in each file.
Bangla font: Anek Bangla (Latin text stays Inter/Outfit). Fonts (Google Fonts) and images (googleusercontent URLs) load from the internet.
