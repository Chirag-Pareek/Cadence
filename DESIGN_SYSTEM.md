# Cadence Design System & UI Specification

## Overview

Cadence is built around a warm, editorial interface designed for daily focus and habit consistency. The base atmosphere is a **tinted cream canvas** (`{colors.canvas}` — `#faf9f5`) — distinctly warm, quiet, and tactile. Headlines feature an elegant **display serif** (Cormorant Garamond) at weight 400 with negative letter-spacing, paired with **Inter** body sans. The combination feels like an artisan publication and personal atelier rather than a generic utility.

Brand energy comes from the **cream + coral pairing** — coral (`{colors.primary}` — `#cc785c`) is the signature accent, used on primary CTAs, active states, and full-bleed callout surfaces.

The system features three primary surface modes:
1. **Cream canvas** (`{colors.canvas}`) — default page floor
2. **Light cream cards** (`{colors.surface-card}`) — feature and habit card backgrounds
3. **Dark contrast surfaces** (`{colors.surface-dark}`) — emphasis sections, focused callouts, and footer

---

### Key Characteristics:
- **Warm cream canvas** (`{colors.canvas}` — `#faf9f5`) with dark warm-ink text (`{colors.ink}` — `#141413`).
- **Coral primary accent** (`{colors.primary}` — `#cc785c`) for deliberate, focused action buttons.
- **Editorial serif headlines** (Cormorant Garamond) paired with humanist sans body (Inter).
- **Curated habit cards** (`{colors.surface-card}` — `#efe9de`) providing soft elevation without harsh shadows.
- **Cadence mark**: A 4-spoke radial glyph (`✦`) used as the brand wordmark prefix.
- **Hierarchical border radius**: `rounded-md` (8px) for buttons/inputs, `rounded-lg` (12px) for content cards, `rounded-xl` (16px) for hero containers, and `rounded-full` for pills and streaks.
- **Section rhythm**: Generous 96px (`{spacing.section}`) spacing with 32px card padding.

---

## Colors & Tokens

### Brand & Accent
- **Coral / Primary** (`{colors.primary}` — `#cc785c`): Signature warm coral for primary CTAs and active habit highlights.
- **Coral Active** (`{colors.primary-active}` — `#a9583e`): Hover/press variant.
- **Coral Disabled** (`{colors.primary-disabled}` — `#e6dfd8`): Desaturated cream-tinted disabled state.
- **Accent Teal** (`{colors.accent-teal}` — `#5db8a6`): Secondary indicator and focus highlights.
- **Accent Amber** (`{colors.accent-amber}` — `#e8a55a`): Warm companion tone for category badges.

### Surface
- **Canvas** (`{colors.canvas}` — `#faf9f5`): Default page floor. Tinted cream, warm and paper-like.
- **Surface Soft** (`{colors.surface-soft}` — `#f5f0e8`): Section dividers and soft band backgrounds.
- **Surface Card** (`{colors.surface-card}` — `#efe9de`): Feature cards and habit rows.
- **Surface Cream Strong** (`{colors.surface-cream-strong}` — `#e8e0d2`): Selected tabs and emphasized section bands.
- **Surface Dark** (`{colors.surface-dark}` — `#181715`): High-contrast emphasis sections and footer.
- **Hairline** (`{colors.hairline}` — `#e6dfd8`): 1px border tone on cream surfaces.
- **Hairline Soft** (`{colors.hairline-soft}` — `#ebe6df`): Subtle internal dividers.

### Text
- **Ink** (`{colors.ink}` — `#141413`): Headlines and primary text.
- **Body Strong** (`{colors.body-strong}` — `#252523`): Emphasized paragraphs and lead text.
- **Body** (`{colors.body}` — `#3d3d3a`): Default running text.
- **Muted** (`{colors.muted}` — `#6c6a64`): Subheadings, labels, and secondary text.
- **Muted Soft** (`{colors.muted-soft}` — `#8e8b82`): Captions, fine print, and timestamps.
- **On Primary** (`{colors.on-primary}` — `#ffffff`): Text on coral buttons.
- **On Dark** (`{colors.on-dark}` — `#faf9f5`): Light text on dark surfaces.
- **On Dark Soft** (`{colors.on-dark-soft}` — `#a09d96`): Secondary labels in dark cards.

### Semantic
- **Success** (`{colors.success}` — `#5db872`): Completed habit marks and positive streak indicators.
- **Warning** (`{colors.warning}` — `#d4a017`): Alerts and notifications.
- **Error** (`{colors.error}` — `#c64545`): Validation errors and destructive actions.

---

## Typography

### Font Family
- **Display Serif**: Cormorant Garamond (`h1`, `h2`, `h3`, hero display)
- **Sans Body**: Inter (running copy, navigation, buttons, forms)
- **Monospace**: JetBrains Mono (metrics, stats, codes)

---

## Tailwind CSS Configuration

```javascript
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                coral: {
                    DEFAULT: '#cc785c',
                    active: '#a9583e',
                    disabled: '#e6dfd8',
                },
                teal: { accent: '#5db8a6' },
                amber: { accent: '#e8a55a' },
                canvas: '#faf9f5',
                'surface-soft': '#f5f0e8',
                'surface-card': '#efe9de',
                'surface-cream-strong': '#e8e0d2',
                'surface-dark': '#181715',
                hairline: {
                    DEFAULT: '#e6dfd8',
                    soft: '#ebe6df',
                },
                ink: '#141413',
                body: '#3d3d3a',
                muted: {
                    DEFAULT: '#6c6a64',
                    soft: '#8e8b82',
                },
                'on-dark': {
                    DEFAULT: '#faf9f5',
                    soft: '#a09d96',
                },
                success: '#5db872',
                warning: '#d4a017',
                error: '#c64545',
            },
            fontFamily: {
                serif: ['"Cormorant Garamond"', 'Garamond', ...defaultTheme.fontFamily.serif],
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                mono: ['"JetBrains Mono"', ...defaultTheme.fontFamily.mono],
            },
            borderRadius: {
                card: '12px',
                hero: '16px',
            },
            spacing: {
                section: '96px',
            }
        },
    },
};
```
