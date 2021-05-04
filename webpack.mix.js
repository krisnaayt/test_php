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
    .js('resources/js/auth/login.js', 'public/js/auth')
    .js('resources/js/pages/suratPanjar/list.js', 'public/js/pages/suratPanjar')
    .js('resources/js/pages/suratPanjar/add.js', 'public/js/pages/suratPanjar')
    .js('resources/js/pages/suratPanjar/edit.js', 'public/js/pages/suratPanjar')
    .js('resources/js/pages/suratPanjar/preview.js', 'public/js/pages/suratPanjar')
    .js('resources/js/pages/suratReport/export.js', 'public/js/pages/suratReport')
    .js('resources/js/pages/berkasPerkara/list.js', 'public/js/pages/berkasPerkara')
    .js('resources/js/pages/berkasPerkara/add.js', 'public/js/pages/berkasPerkara')
    .js('resources/js/pages/berkasPerkara/detail.js', 'public/js/pages/berkasPerkara')
    .js('resources/js/pages/berkasPerkara/edit.js', 'public/js/pages/berkasPerkara')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/globalCustom.scss', 'public/css')
    .sass('resources/sass/pages/berkasPerkara.scss', 'public/css/pages')
    .sass('resources/sass/pages/suratPanjar/preview.scss', 'public/css/pages/suratPanjar')
    ;
