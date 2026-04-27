module.exports = {
  purge: {
    enable: true,
    content: [
      __dirname + '/../assets/src/js/**/*',
      __dirname + '/../template-parts/**/**/*',
      __dirname + '/../page-templates/**/**/*',
      __dirname + '/../*.php',
    ]
  },
  important: true,
  darkMode: false, // or 'media' or 'class'
  theme: {
    colors: {
      black: 'var(--color-black)',
      midblack: 'var(--color-midblack)',
      white: 'var(--color-white)',
      grey: 'var(--color-grey)',
      purple: 'var(--color-purple)',
      blue: 'var(--color-blue)',
      error: 'var(--color-error)',
      warning: 'var(--color-warning)',
      success: 'var(--color-success)',
    },
    screens: {
      'sm': '576px',
      'md': '768px',
      'lg': '991px',
      'xl': '1480px',
      '2xl': '1530px',
    },
    fontFamily: {
      body: 'var(--font-body)',
      heading: 'var(--font-heading)',
    },
    fontWeight: {
      normal: 400,
      medium: 600,
      bold: 700
    },
    lineHeight: {
      'tight': 'var(--font-lineheighttight)',
      'regular': 'var(--font-lineheightregular)',
    },
    variables: {
      DEFAULT: {
        size: {
          "300": 'clamp(0.7em, 0.66rem + 0.2vw, 0.8em)',
          "400": 'clamp(1rem, 0.963rem + 0.1852vw, 1.125rem)',
          "500": 'clamp(1.25rem, 1.1759rem + 0.3704vw, 1.5rem)',
          "600": 'clamp(1.37em, 1.21em + 0.8vw, 1.78em)',
          "700": 'clamp(1.71em, 1.45em + 1.29vw, 2.37em)',
          "800": 'clamp(1.875rem, 1.3194rem + 2.7778vw, 3.75rem)',
        
        },
        color: {
          black: '#000000',
          midblack: '#101010',
          purple: '#7C3AED',
          blue: '#438BFF',
          white: '#ffffff',
          grey: '#f0f0f0',
          error: '#d81e1e',
          warning: '#ff6700',
          success: '#4bb543'
        },
        font:{
          body: ['archivo', 'Arial', "Helvetica Neue", 'sans-serif', "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"],
          heading: ['archivo', 'Arial', "Helvetica Neue", 'sans-serif', "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"],
          lineheightregular: 1.7,
          lineheighttight: 1.2
        },
      },
    },
  },
  variants: {
    extend: {

    },
  },
  plugins: [require('@mertasan/tailwindcss-variables')],
  corePlugins: {
    preflight: false
  }

};
