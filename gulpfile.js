const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const cssnano = require('gulp-cssnano');

// Sass to CSS
gulp.task('sass', function () {
  return gulp.src('assets/front/sass/**/*.scss')
    .pipe(gulp.dest('dist/css'));
});

// Concatenate and minify JS
gulp.task('js', function () {
  return gulp.src('assets/front/js/**/*.js')
    .pipe(concat('bundle.js'))
    .pipe(uglify())
    .pipe(gulp.dest('dist/js'));
});

// Concatenate and minify CSS
gulp.task('css', function () {
  return gulp.src('dist/css/**/*.css')
    .pipe(concat('bundle.css'))
    .pipe(cssnano())
    .pipe(gulp.dest('dist/css'));
});

// Default task
gulp.task('default', gulp.parallel('sass', 'js', 'css'));

// Watch for changes
gulp.task('watch', function() {
  gulp.watch('assets/front/sass/**/*.scss', gulp.series('sass'));
  gulp.watch('assets/front/js/**/*.js', gulp.series('js'));
  gulp.watch('dist/css/**/*.css', gulp.series('css'));
});
