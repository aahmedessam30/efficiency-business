/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            colors: {
                'primary': '#0C313D',
                'primary-light': '#344F5A',
                'secondary': '#C1495B',
                'secondary-hover': '#D15F71',
                'secondary-light': '#FFEFF0',
            }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}

