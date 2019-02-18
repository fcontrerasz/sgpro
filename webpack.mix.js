const mix = require('laravel-mix');


mix.copyDirectory('resources/assets/fonts', 'public/fonts');
mix.copyDirectory('resources/assets/img', 'public/img');
mix.copyDirectory('resources/assets/font-awesome', 'public/font-awesome');
mix.copyDirectory('resources/assets/js/demo', 'public/js/demo');
mix.copyDirectory('resources/assets/js/plugins', 'public/js/plugins');
mix.copyDirectory('resources/assets/css/patterns', 'public/css/patterns');

mix.styles([
    'resources/assets/css/fuentes.css',
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/animate.css',
    'resources/assets/css/style.css'
], 'public/css/all.css');

mix.scripts([
	'resources/assets/js/plugins/metisMenu/jquery.metisMenu.js',
	'resources/assets/js/plugins/slimscroll/jquery.slimscroll.min.js',
	'resources/assets/js/plugins/pace/pace.min.js',
	],'public/js/base.js');

mix.js('resources/js/app.js', 'public/js')
.js('resources/js/patache.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

