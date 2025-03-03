const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue'
  ],

  theme: {
    extend: {
      colors: {
        // ...defaultTheme.colors,
        primary: colors.blue,
        sybac: '#0393cf'
      },
      fontFamily: {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans]
      },
      spacing: {
        ...defaultTheme.spacing,
        navigation: '320px'
      }
    }
  },

  plugins: [require('@tailwindcss/forms')]
}
