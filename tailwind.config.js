/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./public/styles/input.css",
    "./**/**/**/*.{html,js,php}",
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        primary: '#d954e4',
      },
      fontFamily: {
        custom: ['Rouge Script', 'cursive'],
      },
    },
    container: {
      maxWidth: {
        'sm': '640px',
        'md': '768px',
        'lg': '1024px',
        'xl': '1024px',
        
      }
    },
  },
}