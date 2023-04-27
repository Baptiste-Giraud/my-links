const {
  src,
  dest,
  parallel,
  series,
  watch
} = require('gulp');

const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const cssnano = require('gulp-cssnano');
const sourcemaps = require('gulp-sourcemaps');

// Concatenate and minify JS
function js() {
  return src([
      './assets/front/js/*.js',
    ])
    .pipe(concat('bundle.js'))
    .pipe(uglify())
    .pipe(dest('./dist/js'));
}

// Concatenate and minify CSS
function css() {
  return src('./dist/css/**/*.css')
    .pipe(concat('bundle.css'))
    .pipe(cssnano())
    .pipe(dest('./dist/css'));
}

// Sass to CSS
function scss() {
  return src('./assets/front/sass/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(concat('bundle.css'))
    .pipe(cssnano())
    .pipe(sourcemaps.write('.'))
    .pipe(dest('./dist/css'));
}

// Default task
exports.default = parallel(js, scss, css);

// Watch for changes
function watchJsFiles() {
  watch('./assets/front/js/**/*', js);
}
function watchSassFiles() {
  watch('./assets/front/sass/**/*', scss);
}
exports.watch = parallel(watchJsFiles, watchSassFiles);
