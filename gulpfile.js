// include the required packages. 
var gulp = require('gulp');
var data = require('gulp-data');
var stylus = require('gulp-stylus');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();
var gutil=require('gulp-util');
var gulpif = require('gulp-if');
var util = require('util');
gulp.task('stylus', function() {
  return gulp.src('./stylus/*.styl')
    .pipe(stylus({
      'include css': true

    }))
    .on('error', gutil.log)
    .pipe(autoprefixer({
	cascade: false
    }))
    .pipe(browserSync.reload({
      stream: true
    }))
    .pipe(gulp.dest('./app/compiled'));
 
});
gulp.task('browserSync', function() {
  browserSync.init({
    server: {
      proxy:'http://progresshtml.site/'
    },
  })
})
gulp.task('watch',[ 'stylus'],function(){
	gulp.watch('stylus/**/*.styl', ['stylus']); 
//	gulp.watch('app/*.html', browserSync.reload); 
//	gulp.watch('app/**/*.php', browserSync.reload); 
//	gulp.watch('app/js/**/*.js', browserSync.reload);
})
