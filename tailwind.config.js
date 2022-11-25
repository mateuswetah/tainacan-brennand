/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './inc/*.php',
        './js/*.js',
        './tainacan/*.php',
        './template-parts/*.php'
    ],
    theme: {
      extend: {
        colors: {
          'ob-blue' : '#4777ff',
          'ob-red' : '#af3c20',
          'ob-green' : '#006240',
          'ob-background-gray' : '#d1ccbd',
          'ob-gray': '#dddad3',
        },
        width: {
          '1x1': 'calc(25% - 32px)',
          '2x2': 'calc(50% - 32px)',
        },
        height: {
          '1x1': '405px',
          '2x2': '842px'
        },
        maxWidth : {
          '1x1': '405px',
          '2x2': '842px',
        },
        fontSize: {
          // font-size: 90px
          'ob-text-2': ['5.625rem',{
            lineHeight: '3.125rem',
          }],
          // font-size: 55px
          'ob-title-1': ['3.43rem',{
            lineHeight: '3.625rem',
          }],
          // font-size: 45px
          'ob-text-1': ['2.81rem',{
            lineHeight: '3.125rem',
          }],
          // font-size: 40px
          'ob-text-5': ['2.5rem',{
            lineHeight: '2.68rem',
          }],
          //font-size: 38px
          'ob-text-3': ['2.375rem', {
            lineHeight: '2.5rem',
          }],
          //font-size: 32px
          'ob-text-4': ['2rem', {
            lineHeight: '2.5rem',
          }],
        },
        fontFamily : {
          'kobel': ['Kobel'],
          'sans': ['Kobel', 'Helvetica', 'Arial', 'sans-serif'],
        },
      },
    },
    plugins: [],
  }