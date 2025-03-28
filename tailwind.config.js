import defaultTheme from "tailwindcss/defaultTheme";
const colors = require("tailwindcss/colors");
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    presets: [require("./vendor/tallstackui/tallstackui/tailwind.config.js")],

    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/tallstackui/tallstackui/src/**/*.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                success: colors.green,
                cdc: {
                    50: "#fff3ff",
                    100: "#fee5ff",
                    200: "#fccaff",
                    300: "#ffa1ff",
                    400: "#ff6aff",
                    500: "#f932ff",
                    600: "#e211e8",
                    700: "#c00ac1",
                    800: "#9d0b9c",
                    900: "#800f7d",
                    950: "#570055",
                },
                primary: {
                    50: "#FDD8FD",
                    100: "#FBB6FB",
                    200: "#F76EF7",
                    300: "#F425F4",
                    400: "#C00AC1",
                    500: "#A008A0",
                    600: "#830783",
                    700: "#610561",
                    800: "#3F033F",
                    900: "#220222",
                    950: "#0F010F",
                },
            },
            flexBasis: {
                "1/7": "14.2857143%",
                "2/7": "28.5714286%",
                "3/7": "42.8571429%",
                "4/7": "57.1428571%",
                "5/7": "71.4285714%",
                "6/7": "85.7142857%",
            },
        },
    },

    plugins: [forms],
};
