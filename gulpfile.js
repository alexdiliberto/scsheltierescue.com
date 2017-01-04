var gulp         = require('gulp');
var sass         = require('gulp-sass');
var minifycss    = require('gulp-minify-css');
var uglify       = require('gulp-uglify');
var del          = require('del');
var autoprefixer = require('gulp-autoprefixer');

// Clean
gulp.task('clean', function() {
  return del(['css']);
});

// Styles
gulp.task('styles', ['clean'], function() {
  return gulp.src('scss/app.scss')
    .pipe(sass({
      includePaths: ['bower_components/foundation-sites/scss', 'bower_components/motion-ui/src']
    }))
    .pipe(autoprefixer({
      browsers: ['last 2 versions', 'IE >= 9'],
      cascade: false
    }))
    .pipe(minifycss())
    .pipe(gulp.dest('css'));
});

// Default
gulp.task('default', ['styles']);

// Watch
gulp.task('watch', ['styles'], function() {
  gulp.watch([
    'bower_components/foundation-sites/scss/**/*.scss',
    'bower_components/motion-ui/src/**/*.scss',
    'scss/**/*.scss'
    ], ['styles']);
});
