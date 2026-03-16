import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class", // Wajib ditambahkan untuk fitur switch gelap/terang
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                // Menambahkan custom font kita
                "space-grotesk": [
                    '"Space Grotesk"',
                    ...defaultTheme.fontFamily.sans,
                ],
                roboto: ["Roboto", ...defaultTheme.fontFamily.sans],
                mono: ['"Fira Code"', ...defaultTheme.fontFamily.mono],
            },
        },
    },

    plugins: [forms],
};
