module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {
        colors: {
            background: '#1A1A1D',
            foreground: '#4E4E50',
            highlight: '#68686A',
            first: '#6F2232',
            second: '#950740',
            third: '#C3073F',
        },
    },
  },
  variants: {},
  plugins: [
      require('@tailwindcss/ui'),
      require('tailwindcss-plugins/pagination'),
  ]
}
