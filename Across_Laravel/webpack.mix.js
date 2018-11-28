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

mix.js('resources/js/app.js', 'public/js');
    mix.less('resources/sass/less/index.less', 'public/css')
        .less('resources/sass/less/header.less', 'public/css')
        .less('resources/sass/less/footer.less', 'public/css')
        .less('resources/sass/less/login.less', 'public/css')
        .less('resources/sass/less/users_index.less', 'public/css')
        .less('resources/sass/less/forgetPassword.less', 'public/css')
        .less('resources/sass/less/pages.less', 'public/css');
