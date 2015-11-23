process.env.DISABLE_NOTIFIER = true; // NOTICE: this disable even error notifications

// include the required packages.
var elixir = require('laravel-elixir');
require('laravel-elixir-bower');
require('laravel-elixir-header');

var gulp = require('gulp');
var gutil = require('gulp-util');
var stylus = require('gulp-stylus');
var clean = require('gulp-clean');
var ftp = require('vinyl-ftp');
var ftpconfig = require('./ftpconfig');
var phpunit = require('gulp-phpunit');
var imageop = require('gulp-image-optimization');

/*
  |--------------------------------------------------------------------------
  | Elixir Asset Management
  |--------------------------------------------------------------------------
*/// CONFIGURATION D’ELIXIR

elixir.config.sourcemaps = false;
elixir.config.babel = false;

/*
  |
  | Elixir provides a clean, fluent API for defining some basic Gulp tasks
  | for your Laravel application. By default, we are compiling the Less
  | file for our application, as well as publishing vendor resources.
  |
*/

gulp.task('clean', function() {
    return gulp.src([
	'public/css/*',
	'public/js/*'
    ], {read: false})
        .pipe(clean());
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
//	mix.bower();
    });
});

gulp.task('stylus', function(){
    // stylus compiling doesn’t work - use rather:
    // stylus --watch resources/assets/stylus/ --out public/css/
    gulp.src('./resources/assets/stylus/*.styl')
	.pipe(stylus({
	    compress: true
	}))
	.pipe(gulp.dest('./public/css/'));
});

gulp.task('vendor-css', function(){
    gulp.src('./resources/assets/bower/bootstrap/dist/css/bootstrap.min.css')
	.pipe(gulp.dest('./public/css/vendor/'));

    gulp.src('vendor/sleeping-owl/admin/public/all.min.css')
	.pipe(gulp.dest('./public/css/vendor/'));

    gulp.src([
	'vendor/almasaeed2010/adminlte/dist/css/AdminLTE.min.css',
	'vendor/almasaeed2010/adminlte/dist/css/skins/_all-skins.min.css',
	'vendor/almasaeed2010/adminlte/plugins/iCheck/flat/blue.css',
	'vendor/almasaeed2010/adminlte/plugins/morris/morris.css',
	'vendor/almasaeed2010/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
	'vendor/almasaeed2010/adminlte/plugins/datepicker/datepicker3.css',
	'vendor/almasaeed2010/adminlte/plugins/daterangepicker/daterangepicker-bs3.css',
	'vendor/almasaeed2010/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'
    ]).pipe(gulp.dest('./public/css/vendor/'));
});

gulp.task('css', function(){
    gulp.src('./resources/assets/css/**/*')
	.pipe(gulp.dest('./public/css/'));
});

gulp.task('fonts', function(){
    elixir(function(mix) {
	mix.copy('vendor/almasaeed2010/adminlte/bootstrap/fonts','public/css/fonts');
    });
});

gulp.task('js', function(){
    elixir(function(mix) {
	// VENDOR JS
	mix.scripts([
	   'jquery/dist/jquery.min.js',
	   'bootstrap/dist/js/bootstrap.min.js',
	], 'public/js/vendor.js', 'resources/assets/bower'); // #1 = liste des sources, #2 = destination, #3 = source
	// DEV TOOLS JS
	mix.scripts([
	   'holderjs/holder.min.js'
	], 'public/js/utilities.js', 'resources/assets/bower'); // #1 = liste des sources, #2 = destination, #3 = source
	// VARIOUS JS
	mix.copy([
	    'resources/assets/bower/typeahead.js/dist/bloodhound.min.js',
	    'resources/assets/bower/bootstrap3-typeahead/bootstrap3-typeahead.min.js',
	    'resources/assets/bower/chartjs/Chart.js',
	    'resources/assets/bower/tagsinput/dist/bootstrap-tagsinput.js',
	    'resources/assets/js/',
	], 'public/js'); // #1 = liste des sources, #2 = destination

	// ADMIN INTERFACE JS
	mix.copy([
	    'vendor/sleeping-owl/admin/public/all.min.js',
	    'vendor/almasaeed2010/adminlte/plugins/morris/morris.min.js',
	    'vendor/almasaeed2010/adminlte/plugins/sparkline/jquery.sparkline.min.js',
	    'vendor/almasaeed2010/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
	    'vendor/almasaeed2010/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
	    'vendor/almasaeed2010/adminlte/plugins/knob/jquery.knob.js',
	    'vendor/almasaeed2010/adminlte/plugins/daterangepicker/daterangepicker.js',
	    'vendor/almasaeed2010/adminlte/plugins/datepicker/bootstrap-datepicker.js',
	    'vendor/almasaeed2010/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
	    'vendor/almasaeed2010/adminlte/plugins/iCheck/icheck.min.js',
	    'vendor/almasaeed2010/adminlte/plugins/slimScroll/jquery.slimscroll.min.js',
	    'vendor/almasaeed2010/adminlte/plugins/fastclick/fastclick.min.js',
	    'vendor/almasaeed2010/adminlte/dist/js/app.min.js'
	], 'public/js'); // #1 = liste des sources, #2 = destination
    });
});

gulp.task('styles', ['bower','stylus','vendor-css','css','fonts']);
gulp.task('cots', ['styles','js']);
gulp.task('default', ['images','cots']);

/* PHPUnit */
gulp.task('phpunit', function() {
    //notify defaults to false. If you don't want to use a notifier or worry with errors in this task leave it off
    //EDIT: I left it off
    var options = {debug: false, notify: false, colors: true} 
    gulp.src('tests/*.php')
        .pipe(phpunit('', options)) //empty phpunit path defaults ./vendor/bin/phpunit for windows specify with double back slashes
        
        //both notify and notify.onError will take optional notifier: growlNotifier for windows notifications
        //if options.notify is true be sure to handle the error here or suffer the consequenses!
    /**.on('error', notify.onError({
            title: 'PHPUnit Failed',
            message: 'One or more tests failed, see the cli for details.'
        }))
        
        //will fire only if no error is caught
        .pipe(notify({
            title: 'PHPUnit Passed',
            message: 'All tests passed!'
            }))**/;
});
