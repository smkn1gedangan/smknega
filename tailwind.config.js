import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            boxShadow:{
                'inset': 'inset 0 10px 20px rgba(0, 0, 0, 0.5)',
            }

        },
    },

    plugins: [forms,
        require('flowbite/plugin'),
        require('@tailwindcss/typography')
    ],
};
