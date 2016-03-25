var gulp         = require('gulp')
var sass		 = require('gulp-sass')
var clone        = require('gulp-clone')              
var rename       = require('gulp-rename') 
var plumber      = require('gulp-plumber')            
var beautify     = require('gulp-cssbeautify')
var sourcemap    = require('gulp-sourcemaps') 
var minifycss    = require('gulp-minify-css')
var autoprefix   = require('gulp-autoprefixer')
var combinemq	 = require('gulp-combine-media-queries')


// =================================================================
//                        CSS Task
// =================================================================
gulp.task('css', function(){

	var stream = gulp.src('styles/main.scss')
		.pipe(sass())
		.pipe(autoprefix('last 2 versions'))
		.pipe(minifycss())
		.pipe(rename('main.min.css'))
		.pipe(gulp.dest('css/'));
	
	return stream
})

// =================================================================
//                        SCSS Watch
// =================================================================
gulp.task('watch', ['css'], function(){
	gulp.watch(['styles/**/*.scss'], ['css'])
})

gulp.task('default', ['css'])