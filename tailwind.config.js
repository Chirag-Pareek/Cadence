const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                // Brand & Accents
                coral: {
                    DEFAULT: '#cc785c',
                    active: '#a9583e',
                    disabled: '#e6dfd8',
                },
                teal: {
                    accent: '#5db8a6',
                },
                amber: {
                    accent: '#e8a55a',
                },

                // Surfaces
                canvas: '#faf9f5',
                'surface-soft': '#f5f0e8',
                'surface-card': '#efe9de',
                'surface-cream-strong': '#e8e0d2',
                'surface-dark': '#181715',
                'surface-dark-elevated': '#252320',
                'surface-dark-soft': '#1f1e1b',

                // Borders & Hairlines
                hairline: {
                    DEFAULT: '#e6dfd8',
                    soft: '#ebe6df',
                },

                // Typography Colors
                ink: '#141413',
                'body-strong': '#252523',
                body: '#3d3d3a',
                muted: {
                    DEFAULT: '#6c6a64',
                    soft: '#8e8b82',
                },
                'on-dark': {
                    DEFAULT: '#faf9f5',
                    soft: '#a09d96',
                },

                // Semantic
                success: '#5db872',
                warning: '#d4a017',
                error: '#c64545',
            },
            fontFamily: {
                serif: ['"Cormorant Garamond"', 'Copernicus', 'Tiempos Headline', 'Garamond', ...defaultTheme.fontFamily.serif],
                sans: ['Inter', 'StyreneB', ...defaultTheme.fontFamily.sans],
                mono: ['"JetBrains Mono"', ...defaultTheme.fontFamily.mono],
            },
            borderRadius: {
                'card': '12px',
                'hero': '16px',
            },
            spacing: {
                'section': '96px',
            },
            animation: {
                'float': 'float 6s ease-in-out infinite',
                'float-delayed': 'float 6s ease-in-out 2s infinite',
                'shimmer': 'shimmer 3s ease-in-out infinite',
                'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-10px)' },
                },
                shimmer: {
                    '0%, 100%': { opacity: '0.7' },
                    '50%': { opacity: '1' },
                },
                fadeInUp: {
                    '0%': { opacity: '0', transform: 'translateY(20px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
            },
        },
    },
    content: [
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.php',
        './resources/**/*.vue',
        './resources/**/*.twig',
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
