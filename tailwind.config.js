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
                'secondary-light': '#D15F71',
                'tertiary': '#9BB5C0',
                'tertiary-light': '#F0F4F6',
            }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}

