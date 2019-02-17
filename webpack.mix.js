const mix = require('laravel-mix');

mix.copyDirectory('resources/assets/fonts', 'public/fonts');
mix.copyDirectory('resources/assets/img', 'public/img');

mix.styles([
    'resources/assets/css/fuentes.css',
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/animate.css',
    'resources/assets/css/style.css'
], 'public/css/all.css');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

