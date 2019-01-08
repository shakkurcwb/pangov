
// https://laravel.com/docs/5.7/mix
// https://laravel.com/docs/5.7/frontend

const mix = require('laravel-mix');

mix.js('resources/js/boot.js', 'public/js')
   .js('resources/js/init.js', 'public/js')

   .js('resources/js/calendar.js', 'public/js')

   .sass('resources/sass/app.scss', 'public/css');
