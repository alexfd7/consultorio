const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
	.copy(  'resources/css/fontawesome-free/webfonts', 'public/webfonts');    



mix.styles([
    'resources/css/adminlte.css',
    'resources/css/overlayScrollbars/css/OverlayScrollbars.css',
    'resources/css/fontawesome-free/css/all.css'
], 'public/css/all.css');