const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        "./resources/**/*.blade.php",
      ],
  mode: 'jit',
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        background: colors.slate[50],
        theme: colors.slate[800],
        focused: colors.slate[600],
        light: colors.slate[500],
        lighter: colors.slate[200],
        lightest: colors.slate[100],
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}