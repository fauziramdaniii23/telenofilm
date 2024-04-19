
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
     "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/tw-elements/dist/js/**/*.js",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
    extend: {
      animation:{
        'spin-slow': 'spin 12s linear infinite'
      },
    },
  },
  darkMode: "class",
  plugins: [require("tw-elements/dist/plugin.cjs")]
}