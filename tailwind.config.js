/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",       // Theme root PHP files
    "./templates/**/*.php", 
    "./components/*.php", // Template parts
    "./components/**/*.php", // Template parts
    "./inc/**/*.php", // Custom functions or includes
    "./assets/js/**/*.js", // JavaScript files
  ],
  theme: {
    extend: {
      colors: {
        black: '#141414',
        blackDark: '#000000',
        gray: '#808080',
        midGray: '#6D6D6E', // Adjusted to its hex value
        red: '#B9090B',
        smokeWhite: '#E5E5E5',
        white: '#FFFFFF',
        white30: 'rgba(255, 255, 255, 0.3)', // 30% opacity
        black50: 'rgba(20, 20, 20, 0.5)', // 50% opacity
      },
      backgroundImage: {
        'linear-gradient': 'linear-gradient(to bottom, #000000 0%, #000000 50%, #B9090B 50%)',

      },
    },
  },
  plugins: [],
};
