import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './resources/js/**/*.ts',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            /**
             * GiftMed Dark Blue Theme Tokens
             * Utilities will be:
             * bg-gm-bg, bg-gm-surface, bg-gm-surface2, border-gm-border,
             * text-gm-text, text-gm-muted, bg-gm-primary, etc.
             */
            colors: {
                gm: {
                    bg: 'rgb(var(--gm-bg) / <alpha-value>)',
                    surface: 'rgb(var(--gm-surface) / <alpha-value>)',
                    surface2: 'rgb(var(--gm-surface-2) / <alpha-value>)',
                    border: 'rgb(var(--gm-border) / <alpha-value>)',

                    text: 'rgb(var(--gm-text) / <alpha-value>)',
                    muted: 'rgb(var(--gm-muted) / <alpha-value>)',

                    primary: 'rgb(var(--gm-primary) / <alpha-value>)',
                    primaryHover: 'rgb(var(--gm-primary-hover) / <alpha-value>)',
                    accent: 'rgb(var(--gm-accent) / <alpha-value>)',

                    success: 'rgb(var(--gm-success) / <alpha-value>)',
                    warning: 'rgb(var(--gm-warning) / <alpha-value>)',
                    danger: 'rgb(var(--gm-danger) / <alpha-value>)',
                },
            },

            boxShadow: {
                'gm-soft': '0 8px 30px rgba(0,0,0,0.25)',
            },

            borderRadius: {
                'gm': '14px',
            },
        },
    },

    plugins: [forms],
};
