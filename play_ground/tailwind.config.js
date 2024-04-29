/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: 'class',
  theme: {
    extend: {
        colors: {
            'custom-light': {
                DEFAULT: '#f4f4fb',
                'button': '#ec5f44',
                'text': '#1d2742',
            },
            'custom-dark': {
                DEFAULT: '#1d2742',
                'button': '#f08f7b',
                'text': '#f4f4fb',
            }
        }
    },
  },
  plugins: [],
}

