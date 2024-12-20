import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './storage/framework/views/motor/*.php',
        './storage/framework/views/frontend/*.php',
        './storage/framework/views/admin/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                background: "var(--background)",
                foreground: "var(--foreground)",
                logo: "#FF4400",
                primary: '#373737',
                bgone: '#F5F5F5',
                footer: '#FF5B22',
        
              },
          fontFamily: {
            sans: ['Montserrat', 'sans-serif'], // Montserrat as the default sans-serif font
            serif: ['Bree Serif', 'serif'],// Use Montserrat for sans
          },
        },
      },
    plugins: [],
};
