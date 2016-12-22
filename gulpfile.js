// Le fichier gulpfile.js s'occupe de gérer les tâches à réaliser, leurs options, leurs sources et destination. C'est le chef d'orchestre (après nous).
// Requis
// gulp l'automatiseur de tâches
// Include des différents plugins du package.json
var gulp = require('gulp'),
    // gulp-sass : compile les fichiers Sass (.scss)
    sass = require('gulp-sass'),
    //gulp-autoprefixer : préfixe les CSS
    autoprefixer = require('gulp-autoprefixer'),
    //gulp-rename : renomme les fichiers
    rename = require('gulp-rename'),
    //gulp-minify-css : minifie les feuilles de styles (.css)
    //Pour les fichiers JavaScript :
    minifycss = require('gulp-minify-css'),
    //gulp-concat : concatène les fichiers
    concat = require('gulp-concat'),
    //gulp-uglify : minifie les fichiers javascript (.js)
    uglify = require('gulp-uglify'),
    //Pour tous :
    gutil = require('gulp-util'),
    //gulp-connect-php : Pour le serveur PHP et les fichiers php
    connect = require('gulp-connect-php'),
    //gulp-livereload : recharger automatiquement le navigateur lorsqu'un fichier est modifié.
    livereload = require('gulp-livereload'),
    //gulp-filesize : affiche la taille des fichiers minifiés
    size = require('gulp-filesize');

// Variables de chemin
var bower = './bower_components';

// Initialisation de livereload
var livereloadPage = function() {
    livereload({ start: true });
    livereload.reload();
};

//Une tâche Gulp ressemble à ça :
gulp.task('styles', function() {
    //chemin indiquant l'endroit où se trouve le(s) fichier(s) source à traiter
    return gulp.src('./assets/sass/**/*.scss')
        /* ici les plugins Gulp à exécuter */
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer('last 2 version'))
        //renommer le tout en un fichier
        .pipe(rename('app.css'))
        //Celui-ci se charge d'ajouter les préfixes uniquement lorsque nécessaire et avec une redoutable efficacité. 
        .pipe(autoprefixer())
        //minifier le css
        //.pipe(minifycss())
        //chemin vers lequel les fichiers seront créés après l'exécution des tâches Gulp
        .pipe(gulp.dest('css/'))
        .pipe(size())
        .pipe(livereload({ start: true }))
        .on('end', function() {
            gutil.log(gutil.colors.yellow('♠ La tâche CSS est terminée.'));
        });
});

// Tâche Javascript
gulp.task('scripts', function() {
    return gulp.src([
            bower + '/jquery/dist/jquery.js',
            bower + '/bootstrap-sass/assets/javascripts/bootstrap.js',
            bower + '/jasny-bootstrap/dist/js/jasny-bootstrap.min.js',
            bower + '/ekko-lightbox/ekko-lightbox.js',
            './assets/js/**/*.js'
        ])
        //.pipe(uglify())
        .pipe(concat('app.js'))
        .pipe(gulp.dest('js/'))
        .pipe(size())
        .pipe(livereload({ start: true }))
        .on('end', function() {
            gutil.log(gutil.colors.yellow('♠ La tâche JavaScript est terminée.'));
        });
});

gulp.task('serve', function() {

    php.server({
        port: 80,
        base: './'
    });

});


// Tâche par défaut
gulp.task('default', function() {
    gulp.start('serve', 'scripts', 'styles');
});

//Une tâche essentielle et qui va grandement vous faciliter la vie : la tâche de surveillance automatique ("watch").
/*
Cette fonction de survellance est directement intégrée à Gulp (pas besoin de plugin) et permettra de détecter toute modification de contenu d'un fichier 
et de lancer automatiquement une tâche prévue, sans avoir besoin de systématiquement lancer à la main un gulp ou un gulp styles ou un gulp scripts
*/
gulp.task('watch', function() {
    livereload.listen();
    gulp.watch('./**/*.php').on('change', function(file) {
        livereload.changed(file.path);
    });
    gulp.watch('./assets/sass/**/*.scss', ['styles']);
    gulp.watch([
        bower + '/jquery/dist/jquery.js',
        bower + '/bootstrap-sass/assets/javascripts/bootstrap.js',
        bower + '/jasny-bootstrap/dist/js/jasny-bootstrap.min.js',
        bower + '/ekko-lightbox/ekko-lightbox.js',
        './assets/js/**/*.js'
    ], ['scripts']);
});