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

mix
.js('resources/js/app.js', 'public/js')
    // .js('resources/js/globalCustom.js', 'public/js')
    .js('resources/js/pages/productItem/list.js', 'public/js/pages/productItem')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/globalCustom.scss', 'public/css')
    ;
