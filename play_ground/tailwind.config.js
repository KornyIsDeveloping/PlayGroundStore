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
                DEFAULT: '#121826',
                'button': '#f08f7b',
                'text': '#E0E0E0',
                'boxes': '#424242',
            }
        }
    },
  },
  plugins: [],
}

