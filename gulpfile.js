var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
    'jquery': './vendor/bower_components/jquery/',
    'isotope': './vendor/bower_components/isotope/',
    'moment': './vendor/bower_components/moment/',
    'bower': './vendor/bower_components/skrollr/'
};

elixir(function(mix) {

    // Compile STYLESHEETS
    mix.sass(
        'app.scss',
        'public/stylesheets'
    );

    // Compile JAVASCRIPTS
    mix.scripts(
        [
            paths.jquery + 'dist/jquery.js',
            paths.isotope + 'dist/isotope.pkgd.min.js',
            paths.moment + 'min/moment-with-locales.min.js',
            paths.bower + 'dist/skrollr.min.js',
            'app.js'
        ],
        'public/javascripts/app.js'
    );

});