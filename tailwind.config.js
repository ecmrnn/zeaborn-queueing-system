import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins'],
            },
            colors: {
                primary: {
                    DEFAULT: "#00b0de",
                    100: '#009ec8',
                    200: '#008db2',
                    300: '#007b9b',
                    400: '#006a85',
                    500: '#00586f',
                    600: '#004659',
                    700: '#003543',
                    800: '#00232c',
                    900: '#001216',
                }
            }
        },
    },

    plugins: [forms, typography],
};
