/** @type {import('tailwindcss').Config} */
module.exports = {
  "darkMode": "class",
  "content": [
    "./*.html",
    "./js/**/*.js"
  ],
  "theme": {
    "extend": {
      "colors": {
        "surface-variant": "#31353b",
        "primary-fixed": "#c5f331",
        "primary-fixed-dim": "#aad600",
        "tertiary-fixed": "#b2f746",
        "primary": "#ffffff",
        "on-secondary-fixed-variant": "#39485a",
        "surface-bright": "#36393f",
        "secondary-container": "#39485a",
        "border-accent": "rgba(198, 244, 50, 0.25)",
        "background": "#101419",
        "on-tertiary-fixed": "#121f00",
        "tertiary-fixed-dim": "#98da27",
        "on-primary-container": "#556d00",
        "surface-container-lowest": "#0a0e13",
        "primary-container": "#c5f331",
        "on-tertiary-container": "#496f00",
        "on-tertiary": "#213600",
        "surface-default": "#0B0F14",
        "on-primary": "#283500",
        "error-container": "#93000a",
        "on-background": "#e0e2ea",
        "success-whatsapp": "#25D366",
        "on-tertiary-fixed-variant": "#334f00",
        "surface-container-low": "#181c21",
        "text-inverse": "#070A0E",
        "on-primary-fixed-variant": "#3b4d00",
        "on-secondary": "#233143",
        "on-error-container": "#ffdad6",
        "secondary-fixed": "#d4e4fa",
        "border-subtle": "rgba(255, 255, 255, 0.08)",
        "text-secondary": "#94A3B8",
        "inverse-surface": "#e0e2ea",
        "on-primary-fixed": "#161f00",
        "tertiary": "#ffffff",
        "surface-dim": "#101419",
        "text-primary": "#F8FAFC",
        "surface-container": "#1c2025",
        "inverse-primary": "#506600",
        "outline": "#8e937a",
        "on-surface": "#e0e2ea",
        "surface-card-elevated": "#161F2E",
        "surface-container-highest": "#31353b",
        "secondary": "#b9c8de",
        "on-secondary-fixed": "#0d1c2d",
        "on-surface-variant": "#c4c9ae",
        "inverse-on-surface": "#2d3136",
        "canvas-base": "#070A0E",
        "on-error": "#690005",
        "secondary-fixed-dim": "#b9c8de",
        "on-secondary-container": "#a7b6cc",
        "error": "#ffb4ab",
        "outline-variant": "#444934",
        "glow-lime": "rgba(198, 244, 50, 0.18)",
        "text-muted": "#64748B",
        "surface": "#101419",
        "surface-tint": "#aad600",
        "surface-card": "#111722",
        "surface-container-high": "#262a30",
        "tertiary-container": "#b2f746",
        "surface-dark": "#0B0F14",
        "surface-card-alt": "#11171f",
        "card-dark": "#111722",
        "card-hover": "#161F2E"
      },
      "fontFamily": {
        "label-md": ["Space Grotesk", "Anek Bangla"],
        "body-lg": ["Inter", "Anek Bangla"],
        "display-xl": ["Outfit", "Anek Bangla"],
        "headline-sm": ["Outfit", "Anek Bangla"],
        "title-md": ["Outfit", "Anek Bangla"],
        "caption": ["Inter", "Anek Bangla"],
        "headline-lg": ["Outfit", "Anek Bangla"],
        "headline-md": ["Outfit", "Anek Bangla"],
        "headline-lg-mobile": ["Outfit", "Anek Bangla"],
        "label-lg": ["Space Grotesk", "Anek Bangla"],
        "display-xl-mobile": ["Outfit", "Anek Bangla"],
        "body-md": ["Inter", "Anek Bangla"],
        "body-sm": ["Inter", "Anek Bangla"],
        "sans": ["Inter", "Anek Bangla", "sans-serif"],
        "outfit": ["Outfit", "Anek Bangla", "sans-serif"],
        "grotesk": ["Space Grotesk", "Anek Bangla", "sans-serif"],
        "display": ["Outfit", "Anek Bangla", "sans-serif"],
        "mono": ["Space Grotesk", "Anek Bangla", "monospace"],
        "heading": ["Outfit", "Anek Bangla", "sans-serif"]
      },
      "fontSize": {
        "label-md": [
          "12px",
          {
            "lineHeight": "16px",
            "letterSpacing": "0.06em",
            "fontWeight": "500"
          }
        ],
        "body-lg": [
          "18px",
          {
            "lineHeight": "30px",
            "letterSpacing": "0em",
            "fontWeight": "400"
          }
        ],
        "display-xl": [
          "56px",
          {
            "lineHeight": "68px",
            "letterSpacing": "-0.03em",
            "fontWeight": "800"
          }
        ],
        "headline-sm": [
          "22px",
          {
            "lineHeight": "30px",
            "letterSpacing": "0em",
            "fontWeight": "600"
          }
        ],
        "title-md": [
          "19px",
          {
            "lineHeight": "26px",
            "letterSpacing": "0em",
            "fontWeight": "600"
          }
        ],
        "caption": [
          "13px",
          {
            "lineHeight": "18px",
            "letterSpacing": "0.01em",
            "fontWeight": "400"
          }
        ],
        "headline-lg": [
          "40px",
          {
            "lineHeight": "50px",
            "letterSpacing": "-0.02em",
            "fontWeight": "700"
          }
        ],
        "headline-md": [
          "28px",
          {
            "lineHeight": "36px",
            "letterSpacing": "-0.01em",
            "fontWeight": "600"
          }
        ],
        "headline-lg-mobile": [
          "28px",
          {
            "lineHeight": "36px",
            "letterSpacing": "-0.01em",
            "fontWeight": "700"
          }
        ],
        "label-lg": [
          "14px",
          {
            "lineHeight": "20px",
            "letterSpacing": "0.04em",
            "fontWeight": "600"
          }
        ],
        "display-xl-mobile": [
          "38px",
          {
            "lineHeight": "46px",
            "letterSpacing": "-0.02em",
            "fontWeight": "800"
          }
        ],
        "body-md": [
          "17px",
          {
            "lineHeight": "28px",
            "letterSpacing": "0em",
            "fontWeight": "400"
          }
        ],
        "body-sm": [
          "15px",
          {
            "lineHeight": "24px",
            "letterSpacing": "0em",
            "fontWeight": "400"
          }
        ]
      },
      "spacing": {
        "space-lg": "1.5rem",
        "space-2xl": "4rem",
        "space-3xl": "6rem",
        "space-xs": "0.25rem",
        "space-md": "1rem",
        "margin-mobile": "1rem",
        "space-sm": "0.5rem",
        "gutter": "1.5rem",
        "gutter-mobile": "1rem",
        "space-xl": "2.5rem",
        "margin": "2rem"
      },
      "borderRadius": {
        "DEFAULT": "0.25rem",
        "lg": "0.5rem",
        "xl": "0.75rem",
        "full": "9999px"
      }
    }
  },
  "plugins": [require('@tailwindcss/forms'), require('@tailwindcss/container-queries')]
};
