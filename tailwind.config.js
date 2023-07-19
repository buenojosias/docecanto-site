import defaultTheme from 'tailwindcss/defaultTheme';
const colors = require('tailwindcss/colors')
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                success: colors.green,
                'cdc': {
                    50: '#fff3ff',
                    100: '#fee5ff',
                    200: '#fccaff',
                    300: '#ffa1ff',
                    400: '#ff6aff',
                    500: '#f932ff',
                    600: '#e211e8',
                    700: '#c00ac1',
                    800: '#9d0b9c',
                    900: '#800f7d',
                    950: '#570055',
                },
                primary: {
                    50: '#F4A4F2',
                    100: '#F292F0',
                    200: '#EE6DEA',
                    300: '#EA49E5',
                    400: '#E524E0',
                    500: '#C918C4',
                    600: '#A513A1',
                    700: '#800F7D',
                    800: '#4E094C',
                    900: '#1C031B',
                    950: '#020002'
                },
            },
            flexBasis: {
                '1/7': '14.2857143%',
                '2/7': '28.5714286%',
                '3/7': '42.8571429%',
                '4/7': '57.1428571%',
                '5/7': '71.4285714%',
                '6/7': '85.7142857%',
              }
        },
    },

    plugins: [forms],
};
