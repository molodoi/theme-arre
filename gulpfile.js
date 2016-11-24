var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    rename = require('gulp-rename'),
    minifycss = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    gutil = require('gulp-util'),
    size = require('gulp-filesize');

// Paths
var bower = './app/bower_components';

// css task
gulp.task('styles', function () {
    return gulp.src('scss/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer('last 2 version'))
    .pipe(rename('app.css'))
    .pipe(minifycss())
    .pipe(gulp.dest('css/'))
    .pipe(size())
    .on('end', function(){
        gutil.log(gutil.colors.yellow('♠ La tâche CSS est terminée.'));
    });
});

// javascript task
gulp.task('scripts', function() {
    return gulp.src([bower + '/jquery/dist/jquery.js', bower + '/bootstrap-sass/assets/javascripts/bootstrap.js','app/scripts/lib/*.js'])
    .pipe(uglify())
    .pipe(concat('app.js'))
    .pipe(gulp.dest('js/'))
    .pipe(size())
    .on('end', function(){
        gutil.log(gutil.colors.yellow('♠ La tâche JavaScript est terminée.'));
    });
});

// default task
gulp.task('default', function() {
    gulp.start('styles', 'scripts');
});

gulp.task('watch', function () {
    livereload.listen(35729);
    gulp.watch('**/*.php').on('change', function(file) {
          livereload.changed(file.path);
      });
    gulp.watch('./assets/sass/**/*.scss', ['sass']);
    gulp.watch('./assets/js/**/*.js', ['scripts']);
});