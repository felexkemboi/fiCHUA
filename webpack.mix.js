const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss'); /* Add this line at the top */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss')
    ])
    // .sass('resources/css/app.css', 'public/css')
    .options({
        postCss: [ tailwindcss('./tailwind.config.js') ]
    })
    .vue();

