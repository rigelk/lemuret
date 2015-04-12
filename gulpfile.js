// include the required packages.
var elixir = require('laravel-elixir');
require('laravel-elixir-stylus');
require('laravel-elixir-bower');
require('gulp-elixir-cssmin');
require('laravel-elixir-serve');
require('laravel-elixir-browsersync');
require('laravel-elixir-header');
require('laravel-elixir-clean');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
*/// CONFIGURATION D’ELIXIR

elixir.config.sourcemaps = false;

/*
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.bower();
    
    mix.stylus('app.styl');
    //mix.cssmin();
    
    mix.scripts([
	'jquery/dist/jquery.min.js',
	'bootstrap/dist/js/bootstrap.min.js'
    ], 'public/js/vendor.js', 'resources/assets/bower'); // #1 = liste des sources, #2 = destination, #3 = source
    mix.scripts([
	'holderjs/holder.min.js'
    ], 'public/js/utilities.js', 'resources/assets/bower'); // #1 = liste des sources, #2 = destination, #3 = source
    mix.copy([
	'resources/assets/bower/bootstrap3-typeahead/bootstrap3-typeahead.min.js'
    ], 'public/js'); // #1 = liste des sources, #2 = destination

    mix.header('/** Pierre-Antoine RAULT - 2015 */\n\n');
    
    mix.serve({
	port: 8000,
	hostname: 'localhost'
    }).BrowserSync(
    {
        proxy           : "localhost:8000",
        logPrefix       : "Laravel Eixir BrowserSync",
        logConnections  : false,
        reloadOnRestart : false,
        notify          : false
    });;
});

// lancer `gulp serve` pour tout faire :)
