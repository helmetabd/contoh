/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/views/*.blade.php",
    "./node_modules/tw-elements/dist/js/**/*.js",
    "./node_modules/flowbite/**/*.js",
    './app/Http/Livewire/**/*Table.php',
    './vendor/power-components/livewire-powergrid/resources/views/**/**/*.php',
    './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {},
    screens: {
      'xs': '300px',
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1280px',
      '2xl': '1536px'
    },
  },
  plugins: [
    require("tw-elements/dist/plugin.cjs"),
    // require("@tailwindcss/forms")({
    //   strategy: 'class',
    // }),
    require('flowbite/plugin')
  ],
  darkMode: "class"
}

