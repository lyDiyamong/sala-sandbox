import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "resources/js/**/*.{vue,js,ts,jsx,tsx}",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#3191FE", // Main blue color
                "auth-bg": "#F1F3F5", // Background color
                success: "#2FC14F", // Success green
                error: "#E53E3E", // Error red
                info: "#3182CE", // Info blue
                "dark-gray": "#2D3748", // Dark text
                "light-gray": "#A0AEC0", // Light text
                "border-gray": "#E2E8F0", // Border color
            },
        },
    },

    plugins: [forms],
};