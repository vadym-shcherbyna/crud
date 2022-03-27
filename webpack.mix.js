const mix = require('laravel-mix');

// JS
mix.js('resources/js/app.js', 'public/js');
mix.js('resources/js/admin/items.js', 'public/js/admin/items.js').vue();

// CSS
mix.sass('resources/sass/app.scss', 'public/css')
mix.sass('resources/sass/user/login.scss', 'public/css/user')
mix.sass('resources/sass/admin/general.scss', 'public/css/admin')

// RESOURCES
mix.copy('resources/images', 'public/images')
mix.copy('resources/images/logo.svg', 'public/favicon.svg')

const config = {
    //
}

mix.webpackConfig(config);

