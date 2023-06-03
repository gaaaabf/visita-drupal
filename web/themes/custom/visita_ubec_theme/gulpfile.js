'use strict';
var gulp = require('gulp');
var sass = require('gulp-sass')(require('sass'));
var notify = require('gulp-notify');
var concat = require('gulp-concat');
sass.compiler = require('node-sass');

var config = {
  sassPath: './resources/sass',
  bowerDir: './bower_components',
  nodeModules: './node_modules'
}

gulp.task('sass', function () {
   return gulp.src('./scss/**/*.scss')
   .pipe(sass({
      outputStyle: 'compressed',
    }).on("error", notify.onError(function (error) { return "Error: " + error.message; })))
   .pipe(gulp.dest('./css/'));
});
