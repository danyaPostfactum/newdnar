var gulp = require('gulp');
var less = require('gulp-less');
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
// var prefix = require('gulp-autoprefixer');

gulp.task('less', function() {
	gulp.src('./src/dnar.less')
		.pipe(plumber())
		.pipe(less())
		// .pipe(prefix('Firefox > 20', 'last 5 versions', 'Opera 12.1'))
		.pipe(rename('main.css'))
		.pipe(gulp.dest('./dist/css'));
});


gulp.task('watch', function() {
	gulp.watch('src/**/*.less', ['less']);
});

gulp.task('default', ['less', 'watch']);