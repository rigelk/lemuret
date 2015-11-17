// include the required packages.
var elixir = require('laravel-elixir');
require('laravel-elixir-stylus');
require('laravel-elixir-bower');
require('gulp-elixir-cssmin');
require('laravel-elixir-serve');
require('laravel-elixir-browsersync');
require('laravel-elixir-header');
require('laravel-elixir-clean');

var gulp = require('gulp');
var gutil = require('gulp-util');
var ftp = require('vinyl-ftp');
var ftpconfig = require('./ftpconfig');
var imageop = require('gulp-image-optimization');

/*
  |--------------------------------------------------------------------------
  | Elixir Asset Management
  |--------------------------------------------------------------------------
*/// CONFIGURATION D’ELIXIR

elixir.config.sourcemaps = false;
elixir.config.registerWatcher("default", "resources/**");

/*
  |
  | Elixir provides a clean, fluent API for defining some basic Gulp tasks
  | for your Laravel application. By default, we are compiling the Less
  | file for our application, as well as publishing vendor resources.
  |
*/

gulp.task('default', ['images','cots'], function() {
    elixir(function(mix) {	
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
	    });
    });
});


gulp.task('upload', ['default'], function(){
    process.stdout.write('Transfert de fichiers vers Hostinger...\n');
    
    var conn = ftp.create(ftpconfig);
    
    var globs = [
	'app/**',
	'bootstrap/**',
	'config/**',
	'public/**',
	'resources/lang/**',
	'resources/views/**',
	'vendor/**',
    ];
    
    return gulp.src(globs, {base: '.', buffer: false})
    
	.pipe(conn.newer('public_html/'))
	.pipe(conn.dest('public_html/'));
    
    process.stdout.write('Transfert terminé vers Hostinger...\n');
});

gulp.task('images', function(cb) {
    gulp.src(['resources/assets/img/**/*.png','resources/assets/img/**/*.jpg','resources/assets/img/**/*.gif','resources/assets/img/**/*.jpeg']).pipe(imageop({
        optimizationLevel: 10,
        progressive: true,
        interlaced: true
    })).pipe(gulp.dest('public/img')).on('end', cb).on('error', cb);
});

gulp.task('bower', function(){
    elixir(function(mix) {
	mix.bower();
    });
});


gulp.task('stylus', ['bower'], function(){
    elixir(function(mix) {
	// stylus compiling doesn’t work - use rather:
	// stylus --watch resources/assets/stylus/ --out public/css/	
	mix.stylus();
	mix.styles([
	    'bootstrap/dist/css/bootstrap.min.css'
	], 'public/js/bootstrap.min.css', 'resources/assets/bower');
	mix.cssmin();
    });
});

gulp.task('js', function(){
    elixir(function(mix) {
	mix.scripts([
	   'jquery/dist/jquery.min.js',
	   'bootstrap/dist/js/bootstrap.min.js',
	], 'public/js/vendor.js', 'resources/assets/bower'); // #1 = liste des sources, #2 = destination, #3 = source
	mix.scripts([
	   'holderjs/holder.min.js'
	], 'public/js/utilities.js', 'resources/assets/bower'); // #1 = liste des sources, #2 = destination, #3 = source
	mix.copy([
	    'resources/assets/bower/typeahead.js/dist/bloodhound.min.js',
	    'resources/assets/bower/bootstrap3-typeahead/bootstrap3-typeahead.min.js',
	    'resources/assets/bower/chartjs/Chart.min.js',
	    'resources/assets/js/',
	], 'public/js'); // #1 = liste des sources, #2 = destination
    });
});

gulp.task('cots', ['bower', 'stylus', 'js']);
