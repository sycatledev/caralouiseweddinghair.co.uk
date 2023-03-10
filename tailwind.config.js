/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./input.css",
    "./**/**/**/*.{html,js,php}",
    "./node_modules/flowbite/**/*.js"
  ],
  darkMode: 'class',
  plugins: [
    require('flowbite/plugin')
  ],
}