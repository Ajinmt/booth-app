/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {},
        colors: {
            primary: "#1d3557",
            secondary: "#457b9d",
            accent: "#a8dadc",
        },
    },
    plugins: [require("flowbite/plugin")],
};
