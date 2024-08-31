/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/Views/**/*.php"],
  theme: {
    extend: {
      fontFamily: {
        mono: [ 'Sono', 'monospace' ],
        sans: [ 'SonoSans', 'sans' ],
      },
    },
  },
  plugins: [],
}

