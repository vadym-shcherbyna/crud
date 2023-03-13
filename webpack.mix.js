const mix = require('laravel-mix');

// JS
mix.js('resources/js/app.js', 'public/js');

// CSS
mix.sass('resources/sass/app.scss', 'public/css')
mix.sass('resources/sass/auth/login.scss', 'public/css/user')
mix.sass('resources/sass/admin/general.scss', 'public/css/admin')

// RESOURCES
mix.copy('resources/images', 'public/images')
mix.copy('resources/images/logo.svg', 'public/favicon.svg')

const config = {
    //
}

mix.webpackConfig(config);

