var mix = require('laravel-mix');

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

mix.scripts([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/angular/angular.min.js',
    'node_modules/angular-locale-pt-br/angular-locale_pt-br.js',
    'node_modules/angular-utils-pagination/dirPagination.js',
    'node_modules/angular-sanitize/angular-sanitize.js',
    'node_modules/angular-input-masks/releases/angular-input-masks-standalone.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/ui-select/dist/select.js'
], 'public/js/vendor.js');

mix.scripts([
    'resources/assets/js/app.js',
    'resources/assets/js/categories.js',
    'resources/assets/js/products.js',
    'resources/assets/js/settings.js'
], 'public/js/app.js');

mix
    .sass('resources/assets/sass/app.scss', 'public/css');
