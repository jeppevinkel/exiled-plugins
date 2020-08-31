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
            fourth: '#EEA1B1',
            fifth: '#FFBBCB',
            sixth: '#FFD5E5',
        },
    },
  },
  variants: {},
  plugins: [
      require('@tailwindcss/ui'),
      require('tailwindcss-plugins/pagination'),
  ]
}
