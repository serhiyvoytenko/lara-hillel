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
    .js('resources/js/images-preview.js', 'public/js')
    .js('resources/js/images-actions.js', 'public/js')
    .js('resources/js/category-images-preview.js', 'public/js')
    .js('resources/js/product-actions.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
