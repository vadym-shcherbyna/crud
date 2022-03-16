const mix = require('laravel-mix');

// JS
mix.js('resources/js/app.js', 'public/js');

// CSS
mix.sass('resources/sass/app.scss', 'public/css')
mix.sass('resources/sass/user/login.scss', 'public/css/user')

// RESOURCES
mix.copy('resources/images', 'public/images')
mix.copy('resources/images/logo.svg', 'public/favicon.svg')

const config = {
    //
}

mix.webpackConfig(config);

