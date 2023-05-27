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

mix .copyDirectory('resources/assets/images', 'public/assets/images')
    .copyDirectory('resources/assets/fonts', 'public/assets/fonts')
    .js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .css('resources/assets/css/vendor/slick.css', 'public/assets/css/vendor/slick.css')
    .css('resources/assets/css/main.css', 'public/assets/css/main.css')
    .scripts(['resources/assets/js/vendor/jquery-3.4.1.min.js'], 'public/assets/js/vendor/jquery-3.4.1.min.js')
    .scripts(['resources/assets/js/vendor/slick.min.js'], 'public/assets/js/vendor/slick.min.js')
    .js(['resources/assets/js/plugins/facebook/init-facebook-sdk.js'], 'public/assets/js/plugins/facebook/init-facebook-sdk.js')
    .js(['resources/assets/js/plugins/facebook/sharing.js'], 'public/assets/js/plugins/facebook/sharing.js')
    .version()

