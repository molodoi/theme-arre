var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    rename = require('gulp-rename'),
    minifycss = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    gutil = require('gulp-util'),
    connect = require('gulp-connect-php'),
    livereload = require('gulp-livereload'),
    size = require('gulp-filesize');

// Paths
var bower = './bower_components';

var livereloadPage = function () {
    livereload({start: true});
    livereload.reload();
  };

// css task
gulp.task('styles', function () {
    return gulp.src('./assets/sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer('last 2 version'))
    .pipe(rename('app.css'))
    .pipe(minifycss())
    .pipe(gulp.dest('css/'))
    .pipe(size())
    .pipe(livereload({start: true}))
    .on('end', function(){
        gutil.log(gutil.colors.yellow('♠ La tâche CSS est terminée.'));
    });
});

// javascript task
gulp.task('scripts', function() {
    return gulp.src([
        bower + '/jquery/dist/jquery.min.js', 
        bower + '/bootstrap-sass/assets/javascripts/bootstrap.min.js',
        bower + '/swiper/dist/js/swiper.min.js', 
        bower + '/swiper/dist/js/swiper.jquery.min.js', 
        './assets/js/**/*.js'])
    .pipe(uglify())
    .pipe(concat('app.js'))
    .pipe(gulp.dest('js/'))
    .pipe(size())
    .pipe(livereload({start: true}))
    .on('end', function(){
        gutil.log(gutil.colors.yellow('♠ La tâche JavaScript est terminée.'));
    });
});

gulp.task('serve', function() {

  php.server({
      port: 80,
      base: './'
  });

});


// default task
gulp.task('default', function() {
    gulp.start('serve', 'scripts', 'styles');
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('./**/*.php').on('change', function(file) {
          livereload.changed(file.path);
      });
    gulp.watch('./assets/sass/**/*.scss', ['styles']);
    gulp.watch([
        bower + '/jquery/dist/jquery.min.js', 
        bower + '/bootstrap-sass/assets/javascripts/bootstrap.min.js', 
        bower + '/swiper/dist/js/swiper.min.js', 
        bower + '/swiper/dist/js/swiper.jquery.min.js', 
        './assets/js/**/*.js'], ['scripts']);
});