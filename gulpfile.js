// Gulp plugin setup
var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync');
// var jshint = require('gulp-jshint');
// var uglify = require('gulp-uglify');

gulp.task('hintjs', function(){
	return gulp.src(['js/script.js'])
		.pipe(jshint())
		.pipe(jshint.reporter('default'));
});

// Minify the JS and check for errors
// gulp.task('uglifyjs', ['hintjs'], function(){
// 	gulp.src(['js/script.js'])
// 		.pipe(uglify())
// 		.pipe(gulp.dest(script.min.js))
// 		.pipe(browserSync.reload({stream:true}));
// });
//
// gulp.task('watchjs', function() {
// 	gulp.watch(['js/script.js'], ['hintjs', 'uglifyjs']);
// });

var sassOptions = {
	errLogToConsole: true,
	outputStyle: 'compressed' //'expanded'
};

var autoprefixerOptions = {
	browsers: ['last 5 versions', '> 1%', 'IE 9', 'Firefox ESR'],
	cascade: false
};

// This task compiles the sass files and runs auto prefixing
gulp.task('compilesass', function() {
	return gulp.src('css/style.scss')
		.pipe(sass(sassOptions).on('error', sass.logError))
		.pipe(autoprefixer(autoprefixerOptions))
		.pipe(gulp.dest('./'))
		.pipe(browserSync.stream());
});

// Sass task
gulp.task('watchsass', function() {
	gulp.watch(['css/**/*.scss'], ['compilesass']);
});

// Browser sync handles auto refresh when modifying css, js, html, pictures, and more!
gulp.task('browser-sync', function () {
	// Read in the list of file patterns to watch from the config file
	var browserSyncConfig = {
			open: true,
			files: ['*.php'],
			proxy: 'derekmorash.dev'
		};

	browserSync(browserSyncConfig);
});


// Default gulp action when gulp is run
// We want to watch the js and less, and keep everything in sync with browser
gulp.task('default', [
	'compilesass',
	// 'watchjs',
	'watchsass',
	'browser-sync'
]);
