/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    50: '#f0f5fb',
                    100: '#e0eaf7',
                    200: '#c1d5ef',
                    300: '#7fa4d8',
                    400: '#3d73c1',
                    500: '#1b42aa',
                    600: '#1a3a8a',
                    700: '#001a40',
                    800: '#001029',
                    900: '#000812',
                },
                accent: {
                    50: '#fff0f7',
                    100: '#ffe0ef',
                    200: '#ffc1e0',
                    300: '#ff92c7',
                    400: '#ff62ad',
                    500: '#e84c89',
                    600: '#d93270',
                    700: '#c91857',
                    800: '#a81d47',
                    900: '#8b1a3c',
                },
                success: {
                    50: '#f0fdf4',
                    500: '#22c55e',
                    600: '#16a34a',
                    700: '#15803d',
                },
                warning: {
                    50: '#fffbeb',
                    500: '#f59e0b',
                    600: '#d97706',
                    700: '#b45309',
                },
                danger: {
                    50: '#fef2f2',
                    500: '#ef4444',
                    600: '#dc2626',
                    700: '#b91c1c',
                },
            },
            fontFamily: {
                sans: ['Figtree', 'sans-serif'],
            },
            boxShadow: {
                soft: '0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)',
                card: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}
