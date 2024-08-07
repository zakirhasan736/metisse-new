/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php"],
  theme: {
    screens: {
      xl: { 'max': '1920px' },
      'desktop-l': { 'max': '1880px' },
      'desktop-m': { 'max': '1680px' },
      'laptop-x': { 'max': '1440px' },
      'laptop-m': { 'max': '1280px' },
      'aspect-pc': { 'min': '992px' },
      lg: { 'max': '1199px' },
      md: { 'max': '991px' },
      sm: { 'max': '767px' },
      xs: { 'max': '375px' },
      '2xl': '1921px',
      DEFAULT: '1230px'
    },
    container: {
      center: true,
      padding: {
        DEFAULT: '30px',
        xl: '25px',
        lg: '25px',
        md: '20px',
        sm: '16px',
        'xs': '15px',
      },
    },
    fontFamily: {
      primary: ['Lato', 'sans-serif'],
      secondary: ['Roboto', 'sans-serif'],
      accend: ['Futur', 'sans-serif'],
    },
    fontSize: {
      'large-title': '96px',
     
    },
    extend: {
      colors: {
        'primary': '#0F172A',
        'primary2': '#2B2B2B',
      },
      backgroundImage: {
        
      },
    },
  },
  plugins: [],
}
