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

	var stream = gulp.src('scss/main.scss')   
		.pipe(plumber())                                                  
		.pipe(sass())
		.pipe(combinemq())                                                  
		.pipe(autoprefix('last 2 versions'))          
	
	// make main css file
	stream.pipe(clone())                             
		.pipe(minifycss())                                             
		.pipe(rename('main.min.css'))                
		.pipe(gulp.dest('css/'))              
	
	return stream
})


// =================================================================
//               Vendors CSS Task
// =================================================================
gulp.task('vendor-css', function(){

	var stream = gulp.src('css/main.scss')   
		.pipe(plumber())                                                  
		.pipe(sass())
		.pipe(combinemq())                                                  
		.pipe(autoprefix('last 2 versions'))          
	
	// make main css file
	stream.pipe(clone())                             
		.pipe(minifycss())                                             
		.pipe(rename('main.min.css'))                
		.pipe(gulp.dest('css/'))              
	
	return stream
})
// =================================================================
//                        SCSS Watch
// =================================================================
gulp.task('watch', ['css'], function(){
	gulp.watch(['scss/**/*.scss'], ['css'])  
})

gulp.task('default', ['css'])